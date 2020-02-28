<?php

$lang_sel=$_POST['lang'];
$id_music=$_POST['id_music'];
$target_file='app_mygirl/app_my_girl_'.$lang_sel.'_img/'.$id_music.'.png';
if (move_uploaded_file($_FILES["file_upload_avatar_music"]["tmp_name"], $target_file)) {
    echo "http://carrotstore.com/".$target_file;
}
?>