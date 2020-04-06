<?php

if(isset($_POST['function'])&&$_POST['function']=='update_info_user'){
    $user_id=$_POST['user_id'];
    $user_lang=$_POST['user_lang'];
    $user_name=$_POST['user_name'];
    $user_sex=$_POST['user_sex'];
    $user_sdt=$_POST['user_sdt'];
    $user_address=$_POST['user_address'];
    $user_email=$_POST['user_email'];
    $user_status=$_POST['user_status'];
    $user_avatar=$_POST['user_avatar'];
    $user_password=$_POST['user_password'];
    $query_update_user=mysql_query("UPDATE `app_my_girl_user_".$user_lang."` SET `name` = '$user_name',`sex` = '$user_sex',`address` = '$user_address',`sdt` = '$user_sdt',`status` = '$user_status',`email` = '$user_email', `password`='$user_password' WHERE `id_device` = '$user_id' LIMIT 1;");
    if($query_update_user){
        $user_login=new User_login();
        $user_login->id=$user_id;
        $user_login->name=$user_name;
        $user_login->type=$user_login->type;
        $user_login->link=$url.'/user/'.$user_id.'/'.$user_lang;
        $user_login->avatar = get_url_avatar_user($user_id, $user_lang);
        $user_login->email=$user_email;
        $user_login->lang=$user_lang;
        $_SESSION['user_login']=json_encode($user_login);
    }
    echo var_dump($_POST);
    exit;
}


