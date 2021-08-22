<?php
include "carrot_framework.php";

if($function=='upload_password'){
    $obj=new stdClass();
    $id_password=uniqid().''.uniqid();
    $user_id=$_POST['user_id'];
    $user_lang=$_POST['user_lang'];
    $pass_tag=$_POST['pass_tag'];
    $pass_type=$_POST['pass_type'];
    $pass_password=$_POST['pass_password'];

    $q_check=mysqli_query($link,"SELECT `id` FROM `password_$user_lang` WHERE `password` = '$pass_password' AND  `tag` = '$pass_tag' AND `id_user` = '$user_id' LIMIT 1");
    if(mysqli_num_rows($q_check)>0){
        $obj->{"error"}=2;
    }else{
        $q_add=mysqli_query($link,"INSERT INTO `password_$user_lang` (`id`, `password`, `tag`, `username`, `date`, `id_user`,`type`) VALUES ('$id_password', '$pass_password', '$pass_tag', '$pass_tag', NOW() , '$user_id','$pass_type');");
        if($q_add)
            $obj->{"error"}=0;
        else
            $obj->{"error"}=1;
    }
    echo json_encode($obj);
    exit;
}

if($function=='list_password'){
    $user_id=$_POST['user_id'];
    $user_lang=$_POST['user_lang'];
    $arr_list_pass=array();
    $q_list_password=mysqli_query($link,"SELECT * FROM `password_$user_lang` WHERE `id_user` = '$user_id'");
    while($pass=mysqli_fetch_assoc($q_list_password)){
        array_push($arr_list_pass,$pass);
    }
    echo json_encode($arr_list_pass);
    exit;
}

if($function=='del_password'){
    $id_del=$_POST['id_del'];
    $lang_del=$_POST['lang_del'];
    $q_del=mysqli_query($link,"DELETE FROM `password_$lang_del` WHERE `id` = '$id_del' LIMIT 1;");
    exit;
}
?>