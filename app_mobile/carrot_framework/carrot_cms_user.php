<div style="float:left;padding:10px">
<h3>Thông tin người dùng</h3><br/>
<strong>Cơ bảng</strong>
<table>
<?php
$user_id=$_GET['user_id'];
$user_lang=$_GET['user_lang'];
$data_user=$this->q_data("SELECT * FROM carrotsy_virtuallover.`app_my_girl_user_$user_lang` WHERE `id_device` = '$user_id' LIMIT 1");
foreach($data_user as $k=>$v){
    echo '<tr><td>'.$k.'</td><td>'.$v.'</td></tr>';
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
    $data_backup_contact=$this->q_data("SELECT COUNT(`user_id`) as c FROM carrotsy_contacts.`backup_$user_lang` WHERE `user_id` = '$user_id' LIMIT 1");
    $count_backup_contact=$data_backup_contact['c'];
?>
    <tr><td>Số bảng sao lưu danh bạ</td><td><?php echo $count_backup_contact;?></td></tr>
</table>
<br/>
<a target="_blank" href="<?php echo $this->url_carrot_store.'/user/'.$user_id.'/'.$user_lang;?>" class="buttonPro small blue"><i class="fa fa-phone" aria-hidden="true"></i> Liên kết liên hệ </a>
</div>