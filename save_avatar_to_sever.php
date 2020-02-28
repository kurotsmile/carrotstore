<?php

echo "Uploda avatar...";
echo var_dump($_POST);
$lang=$_POST['lang'];
$id_device=$_POST['id_device'];
if(isset($_FILES['img'])){
    $target_file = 'app_mygirl/app_my_girl_'.$lang.'_user/'.$id_device.'.png';
    move_uploaded_file($_FILES['img']['tmp_name'],$target_file);
}
?>