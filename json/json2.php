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
    $query_update_user=mysqli_query($link,"UPDATE `app_my_girl_user_".$user_lang."` SET `name` = '$user_name',`sex` = '$user_sex',`address` = '$user_address',`sdt` = '$user_sdt',`status` = '$user_status',`email` = '$user_email', `password`='$user_password' WHERE `id_device` = '$user_id' LIMIT 1;");
    if($query_update_user){
        $user_login=new User_login();
        $user_login->id=$user_id;
        $user_login->name=$user_name;
        $user_login->type=$user_login->type;
        $user_login->link=$url.'/user/'.$user_id.'/'.$user_lang;
        $user_login->avatar = get_url_avatar_user($link,$user_id, $user_lang);
        $user_login->email=$user_email;
        $user_login->lang=$user_lang;
        $_SESSION['user_login']=json_encode($user_login);
    }
    echo var_dump($_POST);
    exit;
}


if(isset($_POST['function'])&&$_POST['function']=='speed_quote'){
    $quote_id=$_POST['id'];
    $url_mp3='';
    if(file_exists('app_mygirl/app_my_girl_'.$lang.'/'.$quote_id.'.mp3')){
        $url_mp3=$url.'/app_mygirl/app_my_girl_'.$lang.'/'.$quote_id.'.mp3';
    }else{
        $query_quote=mysqli_query($link,"SELECT `chat` FROM `app_my_girl_$lang` WHERE `id`='$quote_id' LIMIT 1");
        $data_quote=mysqli_fetch_assoc($query_quote);
        $text=urlencode($data_quote['chat']);
        $link_audio="https://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen=".strlen($text)."&client=tw-ob&q=$text&tl=$lang";
        $ch = curl_init($link_audio);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOBODY, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $file_new='voice_'.uniqid().'.mp3';
        if ($status == 200) {
            file_put_contents('data_temp/'.$file_new, $output);
        }
        $url_mp3=$url.'/data_temp/'.$file_new;
    }
    echo $url_mp3;
    exit;
}