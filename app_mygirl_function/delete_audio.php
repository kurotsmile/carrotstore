<?php
$id_chat=$_GET['id'];
$lang=$_GET['lang'];
$type_chat=$_GET['type'];
$txt_type='';
$txt_table='';

if($type_chat=='msg'){
    $txt_type='&msg=1';
    $txt_table='app_my_girl_msg_'.$lang;
}else{
    $txt_type='';
    $txt_table='app_my_girl_'.$lang;
}

$url_audio=$url.'/app_mygirl/'.$txt_table.'/'.$id_chat.'.mp3';

if(!is_file($url_audio)){
    echo 'Xóa thành công tệp âm thanh ở đừng dẫn "'.$url_audio.'"<br/>';
    unlink('app_mygirl/'.$txt_table.'/'.$id_chat.'.mp3');
}else{
    echo 'File âm thanh không tồn tại!<br/>';
}
?>
<a href="<?php echo $url;?>/app_my_girl_update.php?id=<?php echo $id_chat;?>&lang=<?php echo $lang;?><?php echo $txt_type;?>" class="buttonPro small grey">Trở về trang chỉnh sửa đối tượng</a>