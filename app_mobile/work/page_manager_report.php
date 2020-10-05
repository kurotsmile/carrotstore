<?php
include "page_template.php";
$id_report='';
$note_report='';
$username_report='';
$chat_type='';
$chat_lang='';
$fuc='add';
$type_report='1';

if(isset($_GET['id'])){
    $id_report=$_GET['id'];
}

if(isset($_GET['username'])){
    $username_report=$_GET['username'];
}

if(isset($_GET['edit'])){
    $id_report=$_GET['edit'];
    $query_report=mysqli_query($link,"SELECT * FROM `work_report` WHERE `id_work` = '$id_report' ");
    $data_report=mysqli_fetch_array($query_report);
    $note_report=$data_report['note'];
    $username_report=$data_report['user_name'];
    $type_report=$data_report['type'];
    $fuc='edit';
}

if(isset($_GET['find'])){
    $id_obj=$_GET['find'];
    $query_find_obj=mysqli_query($link,"SELECT * FROM `work_chat` WHERE `id_chat` = '$id_obj' LIMIT 1");
    if(mysqli_num_rows($query_find_obj)>0){
        $data_report=mysqli_fetch_array($query_find_obj);
        $username_report=$data_report['user_name'];
        $id_report=$data_report['id'];
        $type_report='1';
    }else{
        echo alert("Không tìm thấy đối tượng này trong hệ thống làm việc!","info");
        $id_report=$id_obj;
        $username_report=$_GET['username'];
        $type_report='0';
        $chat_lang=$_GET['lang'];
        $chat_type=$_GET['chat_type'];
    }
    $func='add';
}

if(isset($_POST['note_report'])){
    $id_report=$_POST['id_report'];
    $note_report=addslashes($_POST['note_report']);
    $username_report=$_POST['user_name_report'];
    $type_report=$_POST['type_report'];
    $chat_type=$_POST['chat_type'];
    $chat_lang=$_POST['chat_lang'];
    if($fuc=='add'){
        $query_add_report=mysqli_query($link,"INSERT INTO `work_report` (`id_work`, `note`, `status`, `user_name`,`type`,`chat_lang`,`chat_type`) VALUES ('$id_report', '$note_report', '0', '$username_report','$type_report','$chat_lang','$chat_type');");
        echo alert("Báo lỗi thành công!",'alert');
    }else{
        $query_update_report=mysqli_query($link,"UPDATE `work_report` SET `note` = '$note_report', `user_name` = '$username_report',`type`='$type_report',`chat_lang`='$chat_lang',`chat_type`='$chat_type' WHERE `id_work` = '$id_report'");
        echo alert("Cập nhật báo lỗi thành công!",'alert');
    }
}

if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $query_delete=mysqli_query($link,"DELETE FROM `work_report` WHERE `id_work` = '$id_delete' ");
    echo alert("Xóa thành công báo lỗi ($id_delete)","alert");
}


if($id_report!=''){
?>
<form  class="box_form_add_chat" style="width: 500px;margin-right: 5px;margin-left: 5px;" method="post">
    <div class="row line">
        <strong><i class="fas fa-bug"></i> Nhắc nhở lỗi cho các thành viên biết</strong><br />
        <i style="font-size:10px;">Chỉ rõ các lỗi sai để nhân viên khắc phục</i>
    </div>
    
    <div class="row line">
        <label>Id đối tượng lỗi</label>
        <input name="id_chat" type="text" <?php if($fuc=='edit'){ echo 'disabled="true"';}?> placeholder="Nhập id đối tượng làm việc" value="<?php echo $id_report;?>" />
    </div>
    
    <div class="row line">
        <label>Ghi chú</label>
        <textarea style="width: 100%;min-height: 300px;" name="note_report"><?php echo $note_report;?></textarea>
    </div>

    <div class="row line">
        <label>Loại báo cáo</label>
        <select name="type_report">
            <option value="1" <?php if($type_report=='1'){ ?>selected="true"<?php }?>>Đối tượng trong cms work</option>
            <option value="0" <?php if($type_report=='0'){ ?>selected="true"<?php }?>>Đối tượng chưa có trong cms work</option>
        </select>
    </div>
    
    <div class="row line">
        <label>username</label>
        <input name="user_name_report" type="text"  placeholder="Nhập user name người làm tác vụ này" value="<?php echo $username_report;?>" />
    </div>
    
    <div class="row line">
        <input name="chat_type" type="hidden" value="<?php echo $chat_type;?>" />
        <input name="chat_lang" type="hidden" value="<?php echo $chat_lang;?>" />
        <input name="id_report" type="hidden" value="<?php echo $id_report;?>" />
        <input name="fuc_report" type="hidden" value="<?php echo $fuc;?>" />
        <?php
        if($fuc=='add'){
        ?>
        <input type="submit" value="hoàn tất" class="buttonPro  blue" />
        <?php }else{?>
        <input type="submit" value="Cập nhật" class="buttonPro  blue" />
        <?php }?>
    </div>
</form>
<?php
}else{
    if($data_user['user_role']=='admin'||$data_user['user_role']=='leader'){
    ?>
    <div style="width: 100%;float: left;">
        <span style="padding: 10px;float: left;">
            <a class="buttonPro small green" href="<?php echo $url;?>/?page_show=manager_report&id=0"><i class="fa fa-bug" aria-hidden="true"></i> Tạo báo lỗi</a>
        </span>
    </div>
    <?php
    }

}

    if($username_report==''){
        $txt_query_list_report='SELECT * FROM `work_report` ORDER BY `status` ';
    }else{
        $txt_query_list_report='SELECT * FROM `work_report` WHERE `user_name`="'.$username_report.'" ORDER BY `status`  ';
    }
    $query_list_report=mysqli_query($link,$txt_query_list_report);
    $row_in_page=20;
    $toal_row=mysqli_num_rows($query_list_report);
    $number_page=$toal_row/$row_in_page;
    $page=0;
    if(isset($_GET['page'])){
        $page=intval($_GET['page']);
        $row_statr=intval($_GET['page'])*$row_in_page;
        $row_end=$row_statr+$row_in_page;
        $txt_limit=" limit $row_statr,$row_end";
        $txt_query_list_report.=" ".$txt_limit;
    }else{
        $txt_limit=" limit 0,$row_in_page";
        $txt_query_list_report.=" ".$txt_limit;
    }
        
    $query_show_report=mysqli_query($link,$txt_query_list_report);
    
if(mysqli_num_rows($query_show_report)>0){
?>

<div style="float: left;width:100%;background-color: #ACACD7;">
    <div style="padding: 10px;">
        <strong>Trang:</strong>
        <?php
            for($i=0;$i<$number_page;$i++){
                ?>
                <a <?php if($i==$page){ echo 'class="buttonPro small yellow"';}else{ echo 'class="buttonPro small black"'; }?> href="<?php echo 'http://work.carrotstore.com/?page_show=manager_report&page='.$i;?>"  ><?php echo $i+1;?></a>
                <?php
            }
        ?>
        <span> / trong </span>
        <span><?php echo $toal_row; ?></span>
        <span> Báo lỗi</span>
    </div>
</div>
    

<table class="table_work" style="background-color: white;">
<tr>
    <tr>
        <th>Loại</th>
        <th>ID</th>
        <th>Lỗi</th>
        <th>Trạng thái</th>
        <th>Người sửa</th>
        <th>Thao tác</th>
    </tr>
</tr>
<?php

$query_list_parameters = mysqli_query($link,"SELECT `key`,`url_action` FROM `work_report_parameters`");
$obj_para=new stdClass();
while($row_para=mysqli_fetch_assoc($query_list_parameters)){
    $obj_para->{$row_para['key']}=$row_para['url_action'];
}

while($row_report=mysqli_fetch_array($query_show_report)){
    $query_obj=mysqli_query($link,"SELECT * FROM `work_chat` WHERE `id` = '".$row_report['id_work']."' LIMIT 1");
    $data_obj=mysqli_fetch_array($query_obj);
    echo '<tr>';
    echo '<td>';
    if($row_report['type']=='1'){
        echo '<i class="fas fa-briefcase"></i>';
    }else{
        echo '<i class="fas fa-globe"></i>';
    }
    echo '</td>';
    echo '<td style="color: gray;font-size: 9px;">'.$row_report['id_work'].'</td>';
    echo '<td>'.$row_report['note'].'</td>';
    echo '<td>';
    if($row_report['status']=='0'){
        echo '<i class="fas fa-spinner fa-pulse"></i>';
    }else{
        echo '<i style="color:green" class="fas fa-check-circle"></i>';
    }
    echo '</td>';
    echo '<td>'.box_user_info_by_username($link,$row_report['user_name']).'</td>';
    echo '<td style="width: 236px;">';
    if($row_report['type']=='1'){
        if(isset($data_obj['id_chat'])){
            echo btn_go_to_obj($link,$data_obj['id_chat'],$data_obj['type_chat'],$data_obj['lang_chat'],$obj_para);
        }
    }else{
        echo btn_go_to_obj($link,$row_report['id_work'],$row_report['chat_type'],$row_report['chat_lang'],$obj_para);
    }
    echo '<a href="'.$url.'?page_show=manager_report&edit='.$row_report['id_work'].'" class="buttonPro small yellow"><i class="fas fa-wrench"></i> Sửa</a>'; 
    echo '<a href="'.$url.'?page_show=manager_report&delete='.$row_report['id_work'].'" class="buttonPro small red"><i class="fas fa-trash-alt"></i> Xóa</a>';
    echo '</td>';
    echo '</tr>';
}
?>
</table>

<div style="float: left;width:100%;background-color: #ACACD7;">
    <div style="padding: 10px;">
        <strong>Trang:</strong>
        <?php
            for($i=0;$i<$number_page;$i++){
                ?>
                <a <?php if($i==$page){ echo 'class="buttonPro small yellow"';}else{ echo 'class="buttonPro small black"'; }?> href="<?php echo 'http://work.carrotstore.com/?page_show=manager_report&page='.$i;?>"  ><?php echo $i+1;?></a>
                <?php
            }
        ?>
        <span> / trong </span>
        <span><?php echo $toal_row; ?></span>
        <span> Báo lỗi</span>
    </div>
</div>
<?php
}else{
    echo '<p style="width:100%;padding:10px"><i class="far fa-sticky-note"></i> Chưa có dữ liệu về mục này!</p>';
}
