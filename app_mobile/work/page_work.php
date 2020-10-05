<?php
include "page_template.php";

//Đã đọc thông báo
if(isset($_GET['off_alert_id'])){
    $off_alert_id=$_GET['off_alert_id'];
    $query_off_alert=mysqli_query($link,"UPDATE `work_notification` SET `is_see` = '1' WHERE `id` = '$off_alert_id';");
}

$type_chat='';
$lang_chat='';
$type_action='';
$id_chat='';
$id_row='';

$view_by_user='';
$view_by_user_date='';

$date_cur=date("Y-m-d");
if(isset($_GET['date'])){
    $date_cur=$_GET['date'];
}


if(isset($_GET['del'])){
    $id_delete=$_GET['del'];
    $delet_query=mysqli_query($link,"DELETE FROM `work_chat` WHERE ((`id` = '$id_delete'));");
    echo '<p><b class="alert">Xóa thành công!!!</b></p>';
}

$mysql_query_chat_all=mysqli_query($link,"SELECT * FROM `work_chat` WHERE `user_name` = '$user_name' AND `dates` = '$date_cur' ");
$query_notification=mysqli_query($link,"SELECT * FROM `work_notification` WHERE `user_to` = '".$data_user["user_id"]."' AND `is_see` = '0' LIMIT 1");
?>
  <script>
  $(document).ready(function(){
    $("#date_select_show").datepicker();
    $("#date_select_show").datepicker("option", "dateFormat","yy-mm-dd");
    $("#date_select_show").val("<?php echo $date_cur;?>");

    $("#view_user_date").datepicker();
    $("#view_user_date").datepicker("option", "dateFormat","yy-mm-dd");
    $("#view_user_date").val("<?php echo $date_cur;?>");

    <?php if(isset($_GET['id_object'])||isset($_GET['edit'])){?>
    $("#frm_add_task").effect('shake','fast').effect('pulsate','slow').effect('highlight','slow');
    <?php }?>


    <?php
    if(mysqli_num_rows($query_notification)>0){
    $data_notification=mysqli_fetch_array($query_notification);
    ?>
    $( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 600,
      modal: true,
      buttons: {
        "Đã rõ - không hiện thông báo này cho '<?php echo $data_user["user_name"] ?>' nữa": function() {
          window.location="<?php echo $url;?>?off_alert_id=<?php echo $data_notification['id']; ?>";
        },
        "Bỏ qua": function() {
          $( this ).dialog( "close" );
        }
      }
    });
    <?php }?>

  });

  function sel_dates(a){
    location.href="<?php echo $url; ?>/?page_show=work&date="+a.value;
  }
  </script>

<?php
if(mysqli_num_rows($query_notification)>0){

?>
    <div id="dialog-confirm" title="Thông báo">
      <p><?php echo nl2br($data_notification['contain']); ?></p>
      <p style="font-size: 12px;color: #59ffc7;font-style: italic;">
        <?php echo box_user_info($link,$data_notification['user_send'],'20'); ?> đã viết thông báo này!
      </p>
    </div>
<?php
}
?>

<?php
$query_task=mysqli_query($link,"SELECT * FROM `work_task` WHERE `user_work` = '".$data_user["user_id"]."' AND (`status`='0' OR `status`='3') ORDER BY `type` LIMIT 50");
if(mysqli_num_rows($query_task)>0){
    ?>
    <form id="work_current" class="box_form_add_chat" style="width: 510px;margin-right: 5px;margin-left: 5px;">
    <div class="row line">
        <strong><i class="fas fa-briefcase"></i> Công việc phân công</strong><br />
        <i style="font-size:10px;">Các tác vụ ưu tiên cần thực hiện trước</i>
    </div>
    <?php
    if(isset($_GET['id_task'])){
        $id_task=$_GET['id_task'];
        $statu=$_GET['statu'];
        $query_update_task=mysqli_query($link,"UPDATE `work_task` SET `status` = '$statu' WHERE `id` = '$id_task';");

        if($query_update_task){
            if($statu=='3'){
                echo alert('Chờ xác nhận của quản trị viên','alert');
                mail("tranthienthanh93@gmail.com","Carrot Work","Làm việc - Báo xong của $user_work tác vụ : $id_task");
                $query_get_task_notification=mysqli_query($link,"SELECT `user_work`, `user_send` FROM `work_task` WHERE `id` = '$id_task' LIMIT 1");
                $data_task_notification=mysqli_fetch_array($query_get_task_notification);
                $alert_contain=get_full_name_user_by_id($data_user["user_work"]).' Thông báo hoàn tất công việc  <a class="buttonPro small blue" href="'.$url.'/task/'.$id_task.'"><i class="fas fa-comments"></i> Xem công việc</a>';
                $query_add_alert= mysqli_query($link,"INSERT INTO `work_notification` (`contain`, `user_to`, `user_send`, `is_see`, `dates`) VALUES ('$alert_contain', '".$data_task_notification['user_send']."', '".$data_task_notification['user_work']."',0,NOW());");
            }else{
                echo alert('Đã hủy xác nhận','alert');
            }
        }
        $query_task=mysqli_query($link,"SELECT * FROM `work_task` WHERE `user_work` = '".$data_user["user_id"]."' AND (`status`='0' OR `status`='3') ORDER BY `type` LIMIT 50");

    }
    ?>
    <div id="list_task" style="background-color: #ffffcb;width: 100%;border-radius: 10px;float: left; height: 200px;overflow-y: auto;overflow-x: hidden;">
    <table>
    <?php
    while($item_task=mysqli_fetch_array($query_task)){
        $data_price='0';
        if($item_task['report_parameters']!='') {
            $query_price = mysqli_query($link,"SELECT `price` FROM `work_report_parameters` WHERE `key` = '" . $item_task['report_parameters'] . "' LIMIT 1");
            $data_price = mysqli_fetch_assoc($query_price);
            $data_price = $data_price['price'];
        }

        $color_icon_task='red';
        if($item_task['type']=="0") $color_icon_task="red";
        if($item_task['type']=="1") $color_icon_task="#ffa46d";
        if($item_task['type']=="2") $color_icon_task="#bba668";
        echo '<tr style="border-bottom: dotted 1px #969696;">';
        echo '<td><i style="color:'.$color_icon_task.'" class="fas fa-thumbtack"></i></td>';
        echo '<td><a href="'.$url.'?page_show=task&id='.$item_task['id'].'">'.$item_task['contain'].'</a></td>';

        if($item_task['links']!=''){
            echo '<td>';
            $list_link=(array)json_decode($item_task['links']);
            for($i=0;$i<sizeof($list_link);$i++){
                echo '<a class="buttonPro small" style="display: inline-flex;" title="Liên kết '.($i+1).' - nhấn vào để xem" target="_blank" href="'.$list_link[$i].'" ><i class="fas fa-link"></i>'.($i+1).'</a>';
            }
            echo '</td>';
        }else{
            echo '<td></td>';
        }

        echo '<td>';
            if($item_task['type']=="0"){echo "cao";}
            if($item_task['type']=="1"){echo "trung bình";}
            if($item_task['type']=="2"){echo "thấp";}
        echo '</td>';
        if($item_task['status']=="3"){
            echo '<td><a href="'.$url.'/?page_show=work&statu=0&id_task='.$item_task['id'].'" class="buttonPro small yellow" title="Hủy hoàn tất"><i class="fas fa-hourglass-start"></i></a></td>';
        }else{
            echo '<td><a href="'.$url.'/?page_show=work&statu=3&id_task='.$item_task['id'].'" class="buttonPro small green" title="Báo cáo hoàn tất"><i class="fas fa-clipboard-check"></i></a></td>';
        }
        echo '<td>'.$data_price.'₫</td>';
        echo '</tr>';
    }
    ?>
    </table>
    </div>
    <a href="<?php echo $url;?>/?page_show=manager_task" class="buttonPro small light_blue"><i class="far fa-list-alt"></i> Xem tất cả</a>
    </form>
<?php
}
?>

<?php
if(isset($_GET['fix'])){
    $id_fix=$_GET['fix'];
    $type_fix=$_GET['type_fix'];
    $lang_fix=$_GET['lang_fix'];
    $delete_report=mysqli_query($link,"DELETE FROM carrotsy_virtuallover.`app_my_girl_report` WHERE `id_question` = '$id_fix' AND `type_question` = '$type_fix' AND `lang` = '$lang_fix'  LIMIT 1;");
    if(mysql_error($link)==''){
        echo '<strong style="color:green">Đã sửa thành công!!!</strong>';
    }
}

$query_task=mysqli_query($link,"SELECT * FROM `work_task` WHERE `user_work` = '0' AND (`status`='0' OR `status`='3') ORDER BY RAND() LIMIT 50");
if(mysqli_num_rows($query_task)>0){
    ?>
    <form id="work_current" class="box_form_add_chat" style="width: 490px;margin-right: 5px;margin-left: 5px;">
        <div class="row line">
            <strong><i class="fas fa-cube"></i> Công việc chung</strong><br />
            <i style="font-size:10px;">Các công việc khác biên tập viên có thể làm khi đã hoàn tất việc phân công hoặt khi tạm chán công việc đang làm</i>
        </div>
        <div id="list_task" style="background-color: #ffffcb;width: 100%;border-radius: 10px;float: left; height: 200px;overflow-y: auto;overflow-x: hidden;">
            <table>
                <?php
                while($item_task=mysqli_fetch_assoc($query_task)){
                    $data_price='';
                    if($item_task['report_parameters']!='') {
                        $query_price = mysqli_query($link,"SELECT `price` FROM `work_report_parameters` WHERE `key` = '" . $item_task['report_parameters'] . "' LIMIT 1");
                        $data_price = mysqli_fetch_assoc($query_price);
                        $data_price = $data_price['price'];
                    }
                    echo '<tr style="border-bottom: dotted 1px #969696;">';
                    echo '<td><i class="far fa-circle"></i></td>';
                    echo '<td><a href="'.$url.'?page_show=task&id='.$item_task['id'].'">'.$item_task['contain'].'</a></td>';

                    if($item_task['links']!=''){
                        echo '<td>';
                        $list_link=(array)json_decode($item_task['links']);
                        for($i=0;$i<sizeof($list_link);$i++){
                            echo '<a class="buttonPro small" style="display: inline-flex;" title="Liên kết '.($i+1).' - nhấn vào để xem" target="_blank" href="'.$list_link[$i].'" ><i class="fas fa-link"></i>'.($i+1).'</a>';
                        }
                        echo '</td>';
                    }else{
                        echo '<td></td>';
                    }
                    echo '<td>'.$data_price.'₫</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </form>
    <?php
}
?>

<?php
if(isset($_GET['fix'])){
    $id_fix=$_GET['fix'];
    $query_updat_report=mysqli_query($link,"UPDATE `work_report` SET `status` = '1' WHERE `id_work` = '$id_fix'");
    echo alert("Đã thông báo cho quản trị viên, chờ xác nhận lỗi vừa sửa!","alert");
}
$query_list_report=mysqli_query($link,"SELECT * FROM `work_report` WHERE `user_name` = '$user_name' AND `status`='0'  LIMIT 50");
if(mysqli_num_rows($query_list_report)>0){
    $query_list_parameters = mysqli_query($link,"SELECT `key`,`url_action` FROM `work_report_parameters`");
    $obj_para=new stdClass();
    while($row_para=mysqli_fetch_assoc($query_list_parameters)){
        $obj_para->{$row_para['key']}=$row_para['url_action'];
    }
?>
<div style="float: left;width: 100%;margin-bottom: 10px;">
    <div class="box_form_add_chat" style="width: auto;margin-left: 5px;min-height: auto;">
        <div class="row line">
            <strong><i class="fas fa-bug"></i> Sửa lỗi những vấn đề nhắc nhở từ quản trị viên</strong><br />
            <i style="font-size:10px;">Dưới đây là <?php echo mysqli_num_rows($query_list_report);?> lỗi sai cần thực hiện sửa chữa . Bấm vào nút xem để sửa, khi đã sửa xong bấm vào nút đã sử để chờ quản trị viên xác nhận!</i>
        </div>

        <div class="row line">
        <table style="width: auto;margin-left: 5px;">
            <?php
            while($row_report=mysqli_fetch_array($query_list_report)){
            ?>
            <tr>
                <td style="font-size: 10px;color: gray;"><?php echo $row_report['id_work'] ?></td>
                <td><i class="fas fa-quote-left"></i> <?php echo $row_report['note'];?></td>
                <td>
                <?php
                    if($row_report['type']=='1'){
                        $query_obj=mysqli_query($link,"SELECT `id_chat`,`type_chat`,`lang_chat` FROM `work_chat` WHERE `id` = '".$row_report['id_work']."' LIMIT 1");
                        $data_obj=mysqli_fetch_array($query_obj);
                        echo btn_go_to_obj($link,$data_obj['id_chat'],$data_obj['type_chat'],$data_obj['lang_chat'],$obj_para);
                    }else{
                        echo btn_go_to_obj($link,$row_report['id_work'],$row_report['chat_type'],$row_report['chat_lang'],$obj_para);
                    } 
                ?>
                </td>
                <td><a class="buttonPro small Yellow" href="<?php echo $url;?>?fix=<?php echo $row_report['id_work'] ?>"><i class="fas fa-check-square"></i> Đã sửa</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
        </div>
    </div>
</div>
<?php
}
?>
<div style="float: left;width: 100%;" id="area_table_work">
    <?php
    $user_role=$data_user['user_role'];
    include "template_table_work.php";
    ?>
</div>
