<?php
$user_id=$_GET['user_id'];
$user_lang=$_GET['user_lang'];
$user_avatar='';
$user_status='';
?>
<div style="float:left;padding:10px">
<?php
if(isset($_POST['func_user'])){
    $func_user=$_POST['func_user'];
    $user_id=$_POST['user_id'];
    $user_lang=$_POST['user_lang'];
    if($func_user=='status_sex'){
        $update_status_acc=$this->q("UPDATE carrotsy_virtuallover.`app_my_girl_user_$user_lang` SET `status` = '2' WHERE `id_device` = '$user_id' LIMIT 1");
        if($update_status_acc) echo $this->msg("Đã gắn nhãn 18+ cho tài khoản này thành công!");
        else  echo $this->msg("Gắn nhãn 18+ cho tài khoản này không thành công!");
    }

    if($func_user=='status_public'){
        $update_status_acc=$this->q("UPDATE carrotsy_virtuallover.`app_my_girl_user_$user_lang` SET `status` = '0' WHERE `id_device` = '$user_id' LIMIT 1");
        if($update_status_acc) echo $this->msg("Đã thay đổi trạng thái tài khoản thành toàn cục!");
    }

    if($func_user=='status_private'){
        $update_status_acc=$this->q("UPDATE carrotsy_virtuallover.`app_my_girl_user_$user_lang` SET `status` = '1' WHERE `id_device` = '$user_id' LIMIT 1");
        if($update_status_acc) echo $this->msg("Đã Thay đổi trạng thái tài khoản thành cục bộ!");
    }

    if($func_user=='delete_avatar'){
        if(file_exists("../../app_mygirl/app_my_girl_".$user_lang."_user/".$user_id.".png")){
            unlink("../../app_mygirl/app_my_girl_".$user_lang."_user/".$user_id.".png");
        }
        echo $this->msg("Đã xóa ảnh đại diện!");
    }

    if($func_user=='fix_avatar'){
        $file=$this->url_carrot_store."/app_mygirl/app_my_girl_".$user_lang."_user/".$user_id.".png";
        smart_resize_image($file,"",300,300,false,'file',true,false,90);
        echo $this->msg("Đã tối ưu kích thước ảnh đại diện!");
    }

    if($func_user=='delete_user'){
        $del_user=$this->q("DELETE FROM carrotsy_virtuallover.`app_my_girl_user_$user_lang` WHERE `id_device` = '$user_id'");
        if($del_user){
            if(file_exists("../../app_mygirl/app_my_girl_".$user_lang."_user/".$user_id.".png")){
                unlink("../../app_mygirl/app_my_girl_".$user_lang."_user/".$user_id.".png");
            }
            echo $this->msg("Đã xóa tài khoản!");
        }
    }
}
?>
<h3>Thông tin người dùng</h3><br/>
<strong>Cơ bảng</strong>
<table>
<?php
    if(file_exists("../../app_mygirl/app_my_girl_".$user_lang."_user/".$user_id.".png")){
        $user_avatar=$this->url_carrot_store."/app_mygirl/app_my_girl_".$user_lang."_user/".$user_id.".png";
        echo '<tr><td>Ảnh đại diện</td><td><img style="max-width:500px;" src="'.$user_avatar.'"/></td></tr>';
    }
    
$data_user=$this->q_data("SELECT * FROM carrotsy_virtuallover.`app_my_girl_user_$user_lang` WHERE `id_device` = '$user_id' LIMIT 1");
if($data_user!=null){
    $user_status=$data_user['status'];
    echo '<tr><td>Quốc gia</td><td><img style="width:30px;" src="'.$this->url_carrot_store.'/app_mygirl/img/'.$user_lang.'.png"/></td></tr>';
foreach($data_user as $k=>$v){
    echo '<tr><td>'.$k.'</td><td>'.$v.'</td></tr>';
}}else{
    echo '<tr><td><i class="fa fa-frown-o" aria-hidden="true"></i> Chưa nhập thông tin</td></tr>'; 
}
?>
</table>
<br/>
<strong>Thông tin bổ sung ở ứng dụng (Tìm kiếm - Danh bạ)</strong>
<table>
<?php
    $data_app_contacts=$this->q_data("SELECT COUNT(`user_id`) as c FROM `info_$user_lang` WHERE `user_id`='$user_id' LIMIT 1");
    $count_info=$data_app_contacts['c'];
    if($count_info>0){
        $data_contact=$this->q_data("SELECT `data` FROM carrotsy_contacts.`info_$user_lang` WHERE `user_id` = '$user_id' LIMIT 1");
        $list_info_contact=json_decode($data_contact['data']);
        for($i=0;$i<count($list_info_contact);$i++){
        $item_info_contact=$list_info_contact[$i];
    ?>
        <tr><td><?php echo $item_info_contact->{"key"};?></td><td><?php echo $item_info_contact->{"val"};?></td></tr>
    <?php 
        }
    }
    $count_backup_contact=0;
    $data_backup_contact=$this->q_data("SELECT COUNT(`user_id`) as c FROM carrotsy_contacts.`backup_$user_lang` WHERE `user_id` = '$user_id' LIMIT 1");
    if($data_app_contacts!=null) $count_backup_contact=$data_backup_contact['c'];
?>
    <tr><td>Số bảng sao lưu danh bạ</td><td><?php echo $count_backup_contact;?></td></tr>
</table>
<br/>
<form id="frm_user" method="post" action="">
<input value="" type="hidden" name="func_user" id="func_user">
<input value="<?php echo $user_id;?>" type="hidden" name="user_id">
<input value="<?php echo $user_lang;?>" type="hidden" name="user_lang">
    <?php if(trim($user_status)!=''){?>
        <a target="_blank" href="<?php echo $this->url_carrot_store.'/user/'.$user_id.'/'.$user_lang;?>" class="buttonPro small blue"><i class="fa fa-link" aria-hidden="true"></i> Liên kết liên hệ </a>
        <a target="_blank" onclick="$('#func_user').val('delete_user');$('#frm_user').submit();" class="buttonPro small red"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa tài khoản</a>
        <?php if($user_status!='2'&&$user_status!='1'){?><a class="buttonPro small yellow" onclick="$('#func_user').val('status_sex');$('#frm_user').submit();"><i class="fa fa-shield" aria-hidden="true"></i> Trạng thái 18+</a><?php }?>
        <?php if($user_status!='1'){?><a class="buttonPro small yellow" onclick="$('#func_user').val('status_private');$('#frm_user').submit();"><i class="fa fa-user-secret" aria-hidden="true"></i> Trạng thái cục bộ</a><?php }?>
        <?php if($user_status!='0'){?><a class="buttonPro small yellow" onclick="$('#func_user').val('status_public');$('#frm_user').submit();"><i class="fa fa-globe" aria-hidden="true"></i> Trạng thái toàn cục</a><?php }?>
    <?php }?>
    <?php if($user_avatar!=''){?>
        <a class="buttonPro small red" onclick="$('#func_user').val('delete_avatar');$('#frm_user').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa ảnh đại diện</a>
    <?php }?>

</form>
</div>