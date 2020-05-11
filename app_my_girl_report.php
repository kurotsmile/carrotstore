<?php
include "app_my_girl_template.php";
$lang_sel='vi';
$type_error='';
$id_question='';
$type_question='';
$txt_query_question='';

$loi=array(
            'không sát định',
            'Sai ngữ pháp, lỗi chính tả',
            'Âm thanh thoại lỗi,không nghe được,không khớp với nội dung',
            'Lọc nội dung thô tục và tình dục bị sai',
            'Vấn đề khác',
            'Cảnh báo bản quyền bài hát đang phát',
            'Bài hát đang phát bị lỗi'
            );
            
if(isset($_GET['lang'])){
    $lang_sel=$_GET['lang'];
}

if(isset($_GET['type_error'])){
    $type_error=$_GET['type_error'];
}

if(isset($_GET['id_question'])){
    $id_question=$_GET['id_question'];
    $type_question=$_GET['type_question'];
    $lang_sel=$_GET['lang'];
    $txt_query_question=" AND `id_question` = '$id_question' AND `type_question` = '$type_question' ";
}

if(isset($_POST['lang'])){
    $lang_sel=$_POST['lang'];
    if($_POST['type_error']!=''){
        $type_error=$_POST['type_error'];
    }
}

if(isset($_POST)&&isset($_POST['clear'])){
    mysqli_query($link,"DELETE FROM `app_my_girl_report` WHERE `lang`='$lang_sel' ");
    echo "Delete all success!";
}
?>
<script>
function delete_report(id_chat,type_chat){
    var lang='<?php echo $lang_sel;?>';
    if(confirm("Có chắc là sẽ xóa cài này không mày?")){
        $.ajax({
            url: "app_my_girl_jquery.php",
            type: "get", //kiểu dũ liệu truyền đi
            data: "function=delete_report&lang="+lang+"&id_chat="+id_chat+"&type_chat="+type_chat, //tham số truyền vào
            success: function(data, textStatus, jqXHR)
            {
                   $(".report_"+id_chat+"_"+type_chat).fadeOut(200);
                   alert(data);
            }
        });
    
    }
    return false;
}
</script>

<form method="post" id="form_loc">

<div style="display: inline-block;float: left;margin: 2px;">
<label>Ngôn ngữ:</label> 

    <select name="lang">
    <option value=""  selected="true"  <?php if($lang_sel==""){?> selected="true"<?php }?>>Tất cả</option>
    <?php 
    $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active` = '1'");
    while($row_lang=mysqli_fetch_array($list_country)){
    ?>
    <option value="<?php echo $row_lang['key'];?>" <?php if($lang_sel==$row_lang['key']){?> selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
    <?php }?>
    </select>
</div>

<?php if($id_question==''){?>
<div style="display: inline-block;float: left;margin: 2px;">
<label>Loại lỗi:</label> 
<select name="type_error" >
    <?php for($i=0;$i<count($loi);$i++){?>
    <option value="<?php echo $i;?>" <?php if($i==$type_error){?> selected="true"<?php }?>><?php echo $loi[$i];?></option>
    <?php }?>
</select>
</div>
<?php }?>

<div style="display: inline-block;float: left;margin: 2px;">
    <input type="submit" name="loc" value="Lọc" class="link_button" />
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <input type="submit" name="clear" value="Dọn sạch" class="link_button" />
</div>
</form>



<?php

    if($type_error==""){
        $result_tip_count=mysqli_query($link,"SELECT * FROM `app_my_girl_report` WHERE `lang`='$lang_sel' $txt_query_question");  
    }else{
        $result_tip_count=mysqli_query($link,"SELECT * FROM `app_my_girl_report` WHERE `lang`='$lang_sel' AND `sel_report` = '$type_error'"); 
    }

    $total_records=mysqli_num_rows($result_tip_count);
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 80;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;
    if($type_error==""){
        $list_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_report` WHERE `lang`='$lang_sel' $txt_query_question"); 
    }else{
        $list_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_report` WHERE `lang`='$lang_sel' AND `sel_report` = '$type_error'"); 
    }
?>
    <div id="form_loc">
    <strong>Trang hiển thị:</strong>
        <?php
            for($i=1;$i<=$total_page;$i++){
                if($i==$current_page){
                    echo '<a href="'.$url.'/app_my_girl_report.php?page='.$i.'" class="buttonPro small">'.$i.'</a>';
                }else{
                    echo '<a href="'.$url.'/app_my_girl_report.php?page='.$i.'" class="buttonPro small blue">'.$i.'</a>';
                }
            }
        ?>
         / <?php echo $limit;?> Lỗi được báo cáo
    </div>
    
<table>
<tr>
    <th style="width: 20px;">Loại</th>
    <th>đối tượng lỗi</th>
    <th>Lỗi</th>
    <th>Mô tả</th>
    <th>Os</th>
    <th>Người báo lỗi</th>
    <th>Thao tác</th>
</tr>
<?php

while($row=mysqli_fetch_array($list_effect)){
?>
    <tr class="report_<?php echo $row['id_question'] ?>_<?php echo $row['type_question']?>">
        <td>
        <?php 
        if($row[0]=="1"){
            echo 'Câu thoại';
        }else{
            echo 'Bài hát';
        }
        ?>
        </td>
        <td>
        <?php
            $txt_chat_show='';
            if($row['type_question']=='msg'){
                $txt_chat_show='<a href="'.$url.'/app_my_girl_update.php?id='.$row['id_question'].'&lang='.$row['lang'].'&msg=1" target="_blank" class="buttonPro small orange"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> '.$row['id_question'].' - '.$row['type_question'].'</a>';
            }
            
            if($row['type_question']=='chat'){
                $txt_chat_show='<a href="'.$url.'/app_my_girl_update.php?id='.$row['id_question'].'&lang='.$row['lang'].'" target="_blank" class="buttonPro small orange"><i class="fa fa-pencil-square" aria-hidden="true"></i> '.$row['id_question'].' - '.$row['type_question'].'</a>'; 
            }
            echo $txt_chat_show;
        ?>
        </td>
        <td>
        <?php 
            $id_error=intval($row['sel_report']);
            echo $loi[$id_error];
            $id_error=intval($row['sel_report'])-1;
        ?>
        </td>
        <td>
        <?php 
            if($id_error==2){
                $color_true="";
                echo '<input style="width:30%;float:left" name="limit_chat" type ="range" min ="1" max="4" step ="1" value ="'.$row['value_report'].'"/>';
                if(intval($row['limit_chat'])<intval($row['value_report'])){
                    $color_true=";color:red;outline:solid";
                }else{
                    $color_true=";color:blue;outline:solid";
                }
                echo '<input style="width:30%;float:left;'.$color_true.'" name="limit_chat" type ="range" min ="1" max="4" step ="1" value ="'.$row['limit_chat'].'"/>';
            }else if($id_error==3||$id_error==0){
                echo $row['value_report']; 
            }else{
                echo 'Không có!'; 
            }
        ?>
        </td>
        <td>
            <?php
                $txt_os='';
                if($row['os']=="android"){
                    $txt_os='<i class="fa fa-android" aria-hidden="true"></i> Android';
                }else if($row['os']=="ios"){
                    $txt_os='<i class="fa fa-apple" aria-hidden="true"></i> Ios';
                }else{
                    $txt_os='<i class="fa fa-ban" aria-hidden="true"></i>';
                }
                echo $txt_os;
            ?>
        </td>
        <td>
        <?php 
            echo show_info_user($link,$row['lang'],$row['id_device'],'');
        ?>
        </td>
        <td>
            <button class="buttonPro small yellow" onclick="delete_report('<?php echo $row['id_question']?>','<?php echo $row['type_question']?>')">đã sửa</button>
        </td>
    </tr>
<?php
}
?>
</table>