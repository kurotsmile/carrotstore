<?php
include "page_template.php";
$show_edit='1';

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
    if($user_id==$data_user['user_id']){
        $show_edit='1';
    }else{
        $show_edit='0'; 
    }
    $query_user=mysqli_query($link,"SELECT * FROM `work_user` WHERE `user_id` = '$user_id' LIMIT 1");
    $data_user=mysqli_fetch_array($query_user);
    $user_email=$data_user['email'];
    $user_phone=$data_user['phone'];
    $user_note=$data_user['note'];
    $user_link_facebook=$data_user['link_facebook'];
    $user_id=$data_user['user_id'];
    $full_name=$data_user['full_name'];
    $url_avart_user=$url.'/image/avatar_default.png';
    if(file_exists("avatar_user/".$data_user['user_id'].".png")){
        $url_avart_user=$url."/avatar_user/".$data_user['user_id'].".png";;
    }
    
}


?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<div style="float: left;padding: 20px;">

<?php
if(isset($_POST['note'])){
    $user_email=$_POST['email'];
    $user_phone=$_POST['phone'];
    $user_note=$_POST['note'];
    $user_link_facebook=$_POST['link_facebook'];
    $user_id=$data_user['user_id'];
    $full_name=$_POST['full_name'];
    $show_info_policy_show=$_POST['show_info_policy_show'];
    $show_edit='1';

    if($_FILES["avatar"]["tmp_name"]!=''){
        $target_dir_avatar="avatar_user/".$user_id.".png";
        move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_dir_avatar);
    }
    
    
    $query_update=mysqli_query($link,"UPDATE `work_user` SET  `link_facebook` = '$user_link_facebook', `email` = '$user_email', `phone` = '$user_phone', `note` = '$user_note' ,`full_name`='$full_name' , `policy_show`='$show_info_policy_show' WHERE `user_id` = '$user_id';");
    echo alert("Cập nhật thông tin tài khoản thành công!!!","alert");
    
    $query_user=mysqli_query($link,"SELECT * FROM `work_user` WHERE `user_id` = '$user_id' LIMIT 1");
    $data_user=mysqli_fetch_array($query_user);
}
?>
<form class="box_form_add_chat" enctype="multipart/form-data" style="margin-left: 5px;width: 450px;" method="post" >

    <?php if($show_edit=='1'){?>
    <div class="row line">
        <strong style="font-size: 16px;"><i class="fas fa-pen-square"></i> Cập nhật thông tin cá nhân</strong>
    </div>
    <?php }else{?>
    <div class="row line">
        <strong style="font-size: 16px;"><i class="fas fa-info-circle"></i> Thông tin cá nhân</strong>
    </div>
    <?php }?>
    

    <div class="row line">
        <label><i class="fas fa-id-card-alt"></i> Tên đăng nhập</label>
        <strong><?php echo $data_user['user_name']; ?></strong>
        <?php if($show_edit=='1'){?>
        <i style="width: 100%;font-size: 10px;color: gray;"> Tên đăng nhập do Admin cấp không thể thay đổi</i>
        <?php }?>
    </div>

    <div class="row line">
        <label><i class="fas fa-chess-queen"></i> Chức vụ</label>
        <strong><?php echo $data_user['user_role']; ?></strong>
    </div>
    
    <div class="row line">
        <label><i class="fas fa-chess-pawn"></i> Họ và tên đầy đủ</label>
        <?php if($show_edit=='1'){?>
        <input type="text" name="full_name" value="<?php echo $data_user['full_name']; ?>" />
        <?php }else{?>
            <?php if($data_user['full_name']!=''){?>
            <strong><?php echo $data_user['full_name']; ?></strong>
            <?php }else{?>
            <strong style="color: red;">Chưa cập nhật</strong>
            <?php }?>
        <?php }?>
    </div>
    
    <div class="row line">
        <label>Ảnh đại diện</label>
        <br />
        <img style="width: 100%;" <?php if($show_edit=='1'){?>onclick="$('#file_avatar').click();"<?php }?> src="<?php echo $url_avart_user;?>"/>
        <?php if($show_edit=='1'){?><input type="file" id="file_avatar" name="avatar" class="buttonPro small blue" /><?php }?>
    </div>

    <div class="row line">
        <label><i class="fas fa-phone"></i> Số điện thoại</label>
        <?php if($show_edit=='1'){?>
        <input type="text" name="phone" value="<?php echo $data_user['phone']; ?>" />
        <?php }else{?>
            <?php if($data_user['phone']!=''){?>
            <strong><?php echo $data_user['phone']; ?></strong>
            <?php }else{?>
            <strong style="color: red;">Chưa cập nhật</strong>
            <?php }?>
        <?php }?>
    </div>
    
    <div class="row line">
        <label><i class="fas fa-at"></i> Gmail</label>
        <?php if($show_edit=='1'){?>
        <input type="text" name="email" value="<?php echo $data_user['email']; ?>" />
        <?php }else{?>
            <?php if($data_user['email']!=''){?>
            <strong><?php echo $data_user['email']; ?></strong>
            <?php }else{?>
            <strong style="color: red;">Chưa cập nhật</strong>
            <?php }?>
        <?php }?>
    </div>
    
    <div class="row line">
        <label><i class="fab fa-facebook-messenger"></i> Facebook (link)</label>
        <?php if($show_edit=='1'){?>
        <input type="text" name="link_facebook" value="<?php echo $data_user['link_facebook']; ?>" />
        <?php }else{?>
            <?php if($data_user['link_facebook']!=''){?>
            <strong><a href="<?php echo $data_user['link_facebook']; ?>" target="_blank"><?php echo $data_user['link_facebook']; ?></a></strong>
            <?php }else{?>
            <strong style="color: red;">Chưa cập nhật</strong>
            <?php }?>
        <?php }?>
    </div>

    <?php if($show_edit=='1'){?>
    <div class="row line">
        <label style="width:100%;float:left"><i class="fa fa-info-circle"></i> Hiển thị thông tin trên trang giới thiệu carrotstore</label>
        <select name="show_info_policy_show">
            <option value="1" <?php if($data_user['policy_show']=="1"){?>selected="true"<?php }?>>Hiển thị</option>
            <option value="0" <?php if($data_user['policy_show']!="1"){?>selected="true"<?php }?>>Không hiển thị</option>
        </select>
    </div>
    <?php }?>
    

    <div class="row line">
        <label style="width: 100%;"><i class="fas fa-sticky-note"></i> Giới thiệu ngắn về bản thân</label>
        <?php if($show_edit=='1'){?>
        <textarea style="width: 100%;height: 150px;"  name="note" id="user_node"><?php echo $data_user['note']; ?></textarea>
        <script src="<?php echo $url;?>/js/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'user_node',{
                language: 'vi',
                customConfig: 'build-config.js',
            });
        </script>
        <?php }else{?>
            <?php if($data_user['note']!=''){?>
            <strong><?php echo nl2br($data_user['note']); ?></strong>
            <?php }else{?>
            <strong style="color: red;">Chưa cập nhật</strong>
            <?php }?>
        <?php }?>
    </div>
    
    
    <?php if($show_edit=='1'){?>
    <div class="row">
        <input type="hidden" value="<?php echo $user_name;?>" name="user_work" />
        <label>&nbsp;</label>
        <input name="submit_change_work" type="submit" class="buttonPro blue" value="Cập nhật"/>
    </div>
    <?php }?>
</form>


<?php 
$query_task=mysqli_query($link,"SELECT * FROM `work_task` WHERE `user_work` = '".$data_user["user_id"]."' ORDER BY `id` DESC LIMIT 50");
?>

    <form id="work_current" class="box_form_add_chat" style="width: 500px;margin-right: 5px;margin-left: 5px;">
    <div class="row line">
        <strong><i class="fas fa-flag"></i> Tác vụ đang và đã thực thi</strong><br />
        <i style="font-size:10px;">Đây là các công việc <b><?php echo $data_user['user_name']; ?></b> đang làm</i>
    </div>
    <div id="list_task" style="background-color: #ffffcb;width: 100%;border-radius: 10px;float: left; height: 200px;overflow-y: auto;overflow-x: hidden;">
    <table>
    <?php
    while($item_task=mysqli_fetch_array($query_task)){
        $color_icon_task='red';
        $status_task='fa-pulse';
        if($item_task['type']=="0") $color_icon_task="red";
        if($item_task['type']=="1") $color_icon_task="#ffa46d";
        if($item_task['type']=="2") $color_icon_task="#bba668";
        echo '<tr style="border-bottom: dotted 1px #969696;">';
        if($item_task['status']=="0"){
            $status_task="fa-pulse";
        }else{
            $status_task="";
        }
        
        echo '<td><i style="color:'.$color_icon_task.'" class="far fa-life-ring '.$status_task.'"></i></td>';
        echo '<td><a href="'.$url.'/?page_show=task&id='.$item_task['id'].'">'.$item_task['contain'].'</a></td>';
        
        if($item_task['links']!=''){
            echo '<td>';
            $list_link=(array)json_decode($item_task['links']);
            for($i=0;$i<sizeof($list_link);$i++){
                echo '<a style="width:100%;float:left;min-width: 90px;" target="_blank" href="'.$list_link[$i].'" title="Nhất vào để đi đến liên kết"><i class="fas fa-link"></i> Liên kết '.($i+1).'</a>';
            }
            echo '</td>';
        }else{
            echo '<td></td>';
        }
        
        if($item_task['status']=="2"){
            echo '<td><i class="fa fa-check-circle" aria-hidden="true" style="color:green"></i></td>';
        }else if($item_task['status']=="1"){
            echo '<td><i class="fa fa-window-close" aria-hidden="true" style="color:red"></i></td>'; 
        }else{
            echo '<td></td>';
        }
        echo '</tr>';
    }
    ?>
    </table>
    </div>
    <div class="row line">
        <a class="buttonPro small blue" href="<?php echo $url;?>/?page_show=manager_task&user_id=<?php echo $data_user["user_id"]; ?>"><i class="far fa-list-alt"></i> Xem tất cả</a>
    </div>
    </form>

    <?php
    $query_count_task=mysqli_query($link,"SELECT * FROM `work_task` WHERE `user_work` = '".$data_user["user_id"]."'");
    $query_count_task_cancel=mysqli_query($link,"SELECT * FROM `work_task` WHERE `user_work` = '".$data_user["user_id"]."' AND status='1'");
    $query_count_task_complete=mysqli_query($link,"SELECT * FROM `work_task` WHERE `user_work` = '".$data_user["user_id"]."' AND status='2'");
    $query_count_task_work=mysqli_query($link,"SELECT * FROM `work_task` WHERE `user_work` = '".$data_user["user_id"]."' AND status='0'");
    
    $n_count_complete=mysqli_num_rows($query_count_task_complete);
    if($n_count_complete>0){
        $num_complete=($n_count_complete*100)/mysqli_num_rows($query_count_task);
        $num_complete=round($num_complete,0);
    }else{
        $num_complete=0;
    }
    
    $n_count_cancel=mysqli_num_rows($query_count_task_cancel);
    if($n_count_cancel>0){
        $num_cancel=($n_count_cancel*100)/mysqli_num_rows($query_count_task);
        $num_cancel=round($num_cancel,0);
    }else{
        $num_cancel=0;
    }
    
    $n_count_work=mysqli_num_rows($query_count_task_work);
    if($n_count_work>0){
        $num_work=($n_count_work*100)/mysqli_num_rows($query_count_task);
        $num_work=round($num_work,0);
    }else{
        $num_work=0;
    }
    
    ?>
    
    <form id="work_current" class="box_form_add_chat" style="width: 500px;margin-right: 5px;margin-left: 5px;">
    <div class="row line">
        <strong><i class="fa fa-star"></i>Thành tích</strong><br />
        <i style="font-size:10px;">Đánh giá thành tích của <b><?php echo $data_user['user_name']; ?></b></i>
    </div>
    <div id="list_task" style="background-color: #ffffcb;width: 100%;border-radius: 10px;float: left; height: 232px;overflow-y: auto;overflow-x: hidden;">
        <table >
            <tr>
                <td style="font-size: 10px;"><i class="fa fa-star" style="font-size: 30px;"></i></td>
                <td style="width: 100px;font-size: 10px;">Tổng số nhiệm vụ </td>
                <td ></td>
                <td>(<b style="color: red;"><?php echo mysqli_num_rows($query_count_task);?></b>)</td>
            </tr>
          <tr>
            <td><i style="font-size: 50px;" class="far fa-smile"></i></td>
            <td><a href="<?php echo $url;?>/?page_show=manager_task&user_id=<?php echo $data_user['user_id'];?>&status=2">Hoàn tất</a><br />(<b style="color: red;"><?php echo $n_count_complete;?></b> <i class="fas fa-ambulance" style="color: #7E7E7E;"></i> <?php echo $num_complete;?>%)</td>
            <td colspan="3" rowspan="3" >
                <canvas id="myChart_task" style="position: relative;" width="100%" height="45px"></canvas>
                <script>
                    var ctx2 = document.getElementById("myChart_task");
                    var myChart2 = new Chart(ctx2, {
                        type: 'doughnut',
                        data: {
                            labels: ['Hoàn tất','Đang làm','Tạm hoãn'],
                            datasets: [{
                                data: [<?php echo $num_complete;?>, <?php echo $num_work;?>, <?php echo $num_cancel;?>],
                                backgroundColor: ['green','orange','red']
                            }]
                        }
                    });
                </script>
            </td>
          </tr>
          <tr>
            <td><i style="font-size: 50px;" class="far fa-meh"></i></td>
            <td><a href="<?php echo $url;?>/?page_show=manager_task&user_id=<?php echo $data_user['user_id'];?>&status=0">Đang làm</a><br />(<b style="color: red;"><?php echo $n_count_work;?></b> <i class="fas fa-ambulance" style="color: #7E7E7E;"></i> <?php echo $num_work;?>%)</td>
          </tr>
          <tr>
            <td><i style="font-size: 50px;" class="far fa-frown"></i></td>
            <td><a href="<?php echo $url;?>/?page_show=manager_task&user_id=<?php echo $data_user['user_id'];?>&status=1">Tạm hoãn</a><br />(<b style="color: red;"><?php echo $n_count_cancel;?></b> <i class="fas fa-ambulance" style="color: #7E7E7E;"></i> <?php echo $num_cancel;?>%)</td>
          </tr>
        </table>
    </div>
    </form>

    
<?php
/*
$query_user_login=mysqli_query($link,"SELECT * FROM `work_user` WHERE `user_name` = '".$_SESSION['login_user']."' LIMIT 1");
$data_user_login=mysqli_fetch_array($query_user_login);
$is_show_char=false;
if($data_user_login['user_role']=='admin'){
        $is_show_char=true;
}else{
   if($data_user['user_role']!='admin'){
        $is_show_char=true;
    } 
}
*/
$is_show_char=true;

if($is_show_char){
?>
    
    <form id="work_current" class="box_form_add_chat" style="width: 500px;margin-right: 5px;margin-left: 5px;">
    <div class="row line">
        <strong><i class="fa fa-signal"></i> Lượt đồ hiệu năng</strong><br />
        <i style="font-size:10px;">Lượt đồ thống kê làm việc về dữ liệu đã làm theo từng tháng</b></i>
    </div>
    <div id="list_task" style="background-color: #ffffcb;width: 100%;border-radius: 10px;float: left; height: 232px;overflow-y: auto;overflow-x: hidden;">
    
    <?php
    $query_char_work_month=mysqli_query($link,"SELECT `count_action`, `month_end` FROM `work_salary` WHERE `user_name` = '".$data_user['user_name']."'");
    $data_char_work_month=mysqli_fetch_array($query_char_work_month);
    $arr_data=array();
    $arr_dates=array();
    while($row_char=mysqli_fetch_array($query_char_work_month)){
        array_push($arr_data,$row_char[0]);
        $newDate = date("m/y", strtotime($row_char[1]));
        array_push($arr_dates,$newDate);
    }
    
    
    ?>
    <canvas id="myChart" style="position: relative;" width="100%" height="45px"></canvas>
    <script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($arr_dates);?>,
            datasets: [{
                label: '<?php echo $data_user['user_name'];?>',
                data: <?php echo json_encode($arr_data);?>,
                backgroundColor: "rgba(20, 144, 225, 1)",
                borderWidth:1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
    </script>
    </div>
    </form>
<?php
}
?>

<?php
include "template_user_bank.php";
?>

</div>
