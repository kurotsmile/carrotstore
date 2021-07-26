<?php
include "config.php";
include "database.php";

$function='';
$id_device='';
$lang='en';

if(isset($_POST['function']))$function=$_POST['function'];
if(isset($_POST['id_device']))$id_device=$_POST['id_device'];
if(isset($_POST['lang']))$lang=$_POST['lang'];

function get_data_user($data_user){
    global $url_carrot_store;
    global $link;
    global $lang;

    $arr_data=array();

    $item_data=new stdClass();
    $item_data->{"id_name"}="name";
    $item_data->{"title"}="user_name";
    $item_data->{"title_en"}="Full name";
    $item_data->{"val"}=$data_user['name'];
    $item_data->{"type_update"}="1";
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="sdt";
    $item_data->{"title"}="user_phone";
    $item_data->{"title_en"}="Phone number";
    $item_data->{"val"}=$data_user['sdt'];
    $item_data->{"type_update"}="4";
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="address";
    $item_data->{"title"}="user_address";
    $item_data->{"title_en"}="Address";
    $item_data->{"val"}=$data_user['address'];
    $item_data->{"type_update"}="1";
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="email";
    $item_data->{"title"}="user_email";
    $item_data->{"title_en"}="Email (Email)";
    $item_data->{"val"}=$data_user['email'];
    $item_data->{"type_update"}="5";
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="sex";
    $item_data->{"title"}="user_sex";
    $item_data->{"title_en"}="Sex";
    $item_data->{"val"}=$data_user['sex'];
    $item_data->{"type_update"}="2";
    $item_data->{"val_update"}=array("user_sex_boy","user_sex_girl");
    $item_data->{"val_update_en"}=array("Male","Female");
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="status";
    $item_data->{"title"}="user_info_status";
    $item_data->{"title_en"}="Information status";
    $item_data->{"val"}=$data_user['status'];
    $item_data->{"type_update"}="2";
    $item_data->{"val_update"}=array("user_info_status_yes","user_info_status_no");
    $item_data->{"val_update_en"}=array("Share information","Do not share information");
    array_push($arr_data,$item_data);

    if($data_user['date_start']!=""){
        $item_data=new stdClass();
        $item_data->{"title"}="user_date_start";
        $item_data->{"title_en"}="Join date";
        $item_data->{"val"}=$data_user['date_start'];
        $item_data->{"type_update"}="0";
        array_push($arr_data,$item_data);
    }

    if($data_user['date_cur']!=""){
        $item_data=new stdClass();
        $item_data->{"title"}="user_date_cur";
        $item_data->{"title_en"}="Recent interaction date";
        $item_data->{"val"}=$data_user['date_cur'];
        $item_data->{"type_update"}="0";
        array_push($arr_data,$item_data);
    }

    if($data_user['status']=="0"){
        $item_data=new stdClass();
        $item_data->{"title"}="user_link";
        $item_data->{"title_en"}="Contact link";
        $item_data->{"val"}=$url_carrot_store.'/user/'.$data_user['id_device'].'/'.$lang;
        $item_data->{"type_update"}="0";
        $item_data->{"act"}="2";
        array_push($arr_data,$item_data);
    }

    return $arr_data;
}

function get_url_avatar_user($id_user,$lang){
    global $url_carrot_store;
    $url_file="app_mygirl/app_my_girl_".$lang."_user/".$id_user.".png";
    $path_file="../../app_mygirl/app_my_girl_".$lang."_user/".$id_user.".png";
    if (file_exists($path_file)){
        return $url_carrot_store.'/'.$url_file;
    } else {
        return "";
    }
}

function get_url_avatar_user_thumb($id_user,$lang,$size){
    global $url_carrot_store;
    $url_file="app_mygirl/app_my_girl_".$lang."_user/".$id_user.".png";
    $path_file="../../app_mygirl/app_my_girl_".$lang."_user/".$id_user.".png";
    if (file_exists($path_file)){
        return $url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/'.$url_file.'&size='.$size;
    } else {
        return "";
    }
}

if($function=='list_app_carrot'){
    $arr_app=array();
    $os=$_POST['os'];
    $query_list_ads=mysqli_query($link,"SELECT `id`,`name`,`$os`,`app_id` FROM carrotsy_virtuallover.`app_my_girl_ads` WHERE `$os` != '' ORDER BY RAND() LIMIT 10");
    while($row_ads=mysqli_fetch_array($query_list_ads)){
        $row_ads["icon"]=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/obj_ads/icon_'.$row_ads['id'].'.png&size=80';
        $row_ads["url"]=$row_ads[$os];
        $row_ads['link_carrot_app']=$url_carrot_store.'/product/'.$row_ads['app_id'];
        array_push($arr_app,$row_ads);
    }
    echo json_encode($arr_app);
}

if($function=='show_register'){
    $check_user=mysqli_query($link,"SELECT `name`,`sdt`,`email`,`sex` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `id_device` = '$id_device' LIMIT 1");
    $data_user=mysqli_fetch_assoc($check_user);
    if($data_user==null){
        $data_user=array();
        $data_user['name']='';
        $data_user['sdt']='';
        $data_user['email']='';
        $data_user['sex']='0';
    }
    $user=new stdClass();
    $arr_data=array();

    $item_data=new stdClass();
    $item_data->{"id_name"}="name";
    $item_data->{"title"}="user_name";
    $item_data->{"title_en"}="Full name";
    $item_data->{"val"}=$data_user['name'];

    $item_data->{"type_update"}="1";
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="sdt";
    $item_data->{"title"}="user_phone";
    $item_data->{"title_en"}="Phone number";
    $item_data->{"val"}=$data_user['sdt'];
    $item_data->{"type_update"}="4";
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="email";
    $item_data->{"title"}="user_email";
    $item_data->{"title_en"}="Email (Email)";
    $item_data->{"val"}=$data_user['email'];
    $item_data->{"type_update"}="5";
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="sex";
    $item_data->{"title"}="user_sex";
    $item_data->{"title_en"}="Sex";
    $item_data->{"val"}=$data_user['sex'];
    $item_data->{"type_update"}="2";
    $item_data->{"val_update"}=array("user_sex_boy","user_sex_girl");
    $item_data->{"val_update_en"}=array("Male","Female");
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="password";
    $item_data->{"title"}="user_password";
    $item_data->{"title_en"}="Password";
    $item_data->{"val"}='';
    $item_data->{"type_update"}="3";
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="re_password";
    $item_data->{"title"}="user_rep_password";
    $item_data->{"title_en"}="Enter the password";
    $item_data->{"val"}='';
    $item_data->{"type_update"}="3";
    array_push($arr_data,$item_data);

    $user->{"list_info"}=$arr_data;
    $user->{"user_id"}=$id_device;
    echo json_encode($user);
}

if($function=='login'){
    $login_username=$_POST['login_username'];
    $login_password=$_POST['login_password'];

    $login=new stdClass();

    if($login_username==""&&$login_password==""){
        $login->{"error"}="1";
        $login->{"msg"}="error_username";
        $login->{"msg_en"}="Phone number (or email) and password cannot be left blank";
    }else{
        $query_country=mysqli_query($link,"SELECT `key` FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `ver0`=1");
        $key_lang="en";
        while($item_country=mysqli_fetch_assoc($query_country)){
            $key_lang=$item_country['key'];
            $query_user=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_user_$key_lang` WHERE (`email` = '$login_username' OR `sdt` = '$login_username') AND (`password`='$login_password') LIMIT 1");
            $data_user=mysqli_fetch_assoc($query_user);
            $lang=$key_lang;
            if($data_user!=null) break;
        }

        if($data_user!=null){
            $login->{"error"}="0";
            $login->{"list_info"}=get_data_user($data_user);
            $login->{"user_id"}=$data_user['id_device'];
            $login->{"user_lang"}=$key_lang;
            $login->{"user_password"}=$data_user['password'];
            $login->{"avatar"}=get_url_avatar_user_thumb($data_user['id_device'],$lang,'50');
            mysqli_query($link,"UPDATE carrotsy_virtuallover.`app_my_girl_user_$lang` SET `date_cur`=NOW() WHERE `id_device`='".$data_user['id_device']."' LIMIT 1");
        }else{
            $login->{"error"}="1";
            $login->{"msg"}="error_password_login";
            $login->{"msg_en"}="Password incorrect, please check your login information";
        }
    }
    echo json_encode($login);
}

if($function=='get_user_by_id'){
    $user_id=$_POST['user_id'];
    $lang=$_POST['user_lang'];
    $query_user=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `id_device`='$user_id' LIMIT 1");
    $data_user=mysqli_fetch_assoc($query_user);
    $show_user=new stdClass();
    $show_user->{"list_info"}=get_data_user($data_user);
    $show_user->{"user_id"}=$data_user['id_device'];
    $show_user->{"avatar"}=get_url_avatar_user_thumb($user_id,$lang,'50');
    echo json_encode($show_user);
}

if($function=='get_password'){
    $inp_info=$_POST['inp_info'];
    $user=new stdClass();

    if(strlen(trim($inp_info))<5){
        $user->{"error"}="1";
        $user->{"msg"}="error_inp_lost_pass";
        $user->{"msg_en"}="Account information cannot be left blank and email or phone number must be greater than 6 characters";
    }else{
        $query_get_password=mysqli_query($link,"SELECT `password` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `email` = '$inp_info' OR `sdt` = '$inp_info' LIMIT 1");
        if(mysqli_num_rows($query_get_password)>0){
            $data_user=mysqli_fetch_assoc($query_get_password);
            if($data_user["password"]!=""){
                $user->{"error"}="0";
                $user->{"msg"}="pass_acc_msg";
                $user->{"msg_en"}="The password for the account is:";
                $user->{"password"}=$data_user["password"];
            }else{
                $user->{"error"}="1";
                $user->{"msg"}="pass_acc_no";
                $user->{"msg_en"}="The account has not set up a password";
            }
        }else{
            $user->{"error"}="1";
            $user->{"msg"}="acc_no";
            $user->{"msg_en"}="This account information is not in the system! ";
        }
    }
    echo json_encode($user);
}

if($function=='update_account'){
    $error=0;
    $user_id=$_POST['user_id'];
    $lang=$_POST['user_lang'];
    $name=$_POST['name'];
    $sdt=$_POST['sdt'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $sex=$_POST['sex'];
    $status=$_POST['status'];

    if(isset($_FILES['avatar'])){
        $target_file = '../../app_mygirl/app_my_girl_'.$lang.'_user/'.$user_id.'.png';
        move_uploaded_file($_FILES['avatar']['tmp_name'],$target_file);
    }

    $user=new stdClass();

    if(strlen(trim($name))<6){
        $user->{"error"}="1";
        $user->{"msg"}="error_name";
        $user->{"msg_en"}="The account name cannot be empty and be greater than 5 characters";
        $error=1;
    }

    if(strlen(trim($sdt))<6&&$error==0){
        $user->{"error"}="1";
        $user->{"msg"}="error_phone";
        $user->{"msg_en"}="Phone number must not be blank and be larger than 9 characters";
        $error=1;
    }

    if($error==0){
        $query_update=mysqli_query($link,"UPDATE carrotsy_virtuallover.`app_my_girl_user_$lang` SET `name` = '$name',`sex` = '$sex',`address` = '$address',`sdt` = '$sdt',`status` = '$status',`email` = '$email' WHERE `id_device` = '$user_id' LIMIT 1;");
        if($query_update){
            $query_user=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `id_device`='$user_id' LIMIT 1");
            $data_user=mysqli_fetch_assoc($query_user);
            $user->{"error"}="0";
            $user->{"msg"}="acc_edit_success";
            $user->{"msg_en"}="Successful account information update!";
            $user->{"list_info"}=get_data_user($data_user);
            $user->{"user_id"}=$user_id;
            $user->{"user_lang"}=$lang;
            $user->{"user_name"}=$data_user['name'];
            $user->{"user_password"}=$data_user['password'];
            $user->{"avatar"}=get_url_avatar_user_thumb($user_id,$lang,'50');
            mysqli_query($link,"UPDATE carrotsy_virtuallover.`app_my_girl_user_$lang` SET `date_cur`=NOW() WHERE `id_device`='$user_id' LIMIT 1");
        }else{
            $user->{"error"}="1";
            $user->{"msg"}="acc_edit_fail";
            $user->{"msg_en"}="Account information update failed, try again at another time";
        }
    }
    echo json_encode($user);
}

if($function=='register'){
    $user=new stdClass();
    $error=0;

    $name=$_POST['name'];
    $sdt=$_POST['sdt'];
    $email=$_POST['email'];
    $sex=$_POST['sex'];
    $password=$_POST['password'];
    $re_password=$_POST['re_password'];

    if(strlen(trim($name))<6){
        $user->{"error"}="1";
        $user->{"msg"}="error_name";
        $user->{"msg_en"}="The account name cannot be empty and be greater than 5 characters";
        $error=1;
    }

    if(strlen(trim($sdt))<6&&$error==0){
        $user->{"error"}="1";
        $user->{"msg"}="error_phone";
        $user->{"msg_en"}="Phone number must not be blank and be larger than 9 characters";
        $error=1;
    }

    if(strlen(trim($password))<6&&$error==0){
        $user->{"error"}="1";
        $user->{"msg"}="error_password";
        $user->{"msg_en"}="Password cannot be blank and be greater than 6 characters";
        $error=1;
    }

    if(($password!=$re_password)&&$error==0){
        $user->{"error"}="1";
        $user->{"msg"}="error_rep_password";
        $user->{"msg_en"}="Re-enter the password does not match.";
        $error=1;
    }

    if($error==0){
        $check_user=mysqli_query($link,"SELECT `id_device` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `id_device` = '$id_device' LIMIT 1");
        $data_user=mysqli_fetch_assoc($check_user);

        if($data_user==null){
            $check_user_by_email_and_sdt=mysqli_query($link,"SELECT `id_device` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE (`email` = '$email' AND `password` = '$password') OR (`sdt` = '$sdt' AND `password` = '$password') LIMIT 1");
            $data_user=mysqli_fetch_assoc($check_user_by_email_and_sdt);
            if($data_user!=null){
                $id_device=$data_user['id_device'];
                $query_update_user=mysqli_query($link,"UPDATE carrotsy_virtuallover.`app_my_girl_user_$lang` SET `name` = '$name',`sex` = '$sex',`sdt` = '$sdt',`email` = '$email',`password`='$password' WHERE `id_device` = '$id_device' LIMIT 1;");
                if($query_update_user){
                    $user->{"error"}="0";
                    $user->{"msg"}="register_success";
                    $user->{"msg_en"}="Account registration is successful!\n Please login to your account you just created";
                }else{
                    $user->{"error"}="1";
                    $user->{"msg"}="register_fail";
                    $user->{"msg_en"}="Account registration is not successful!\n try again";
                }
            }

            if($data_user==null){
                $query_add_user =mysqli_query($link,"INSERT INTO carrotsy_virtuallover.app_my_girl_user_$lang (`id_device`, `name`,`sdt`,`email`,`status`,`sex`,`date_start`,`date_cur`,`password`) VALUES ('".$id_device."', '$name', '$sdt','$email', '0','$sex',NOW(),NOW(),'$password');");
                if($query_add_user){
                    $user->{"error"}="0";
                    $user->{"msg"}="register_success";
                    $user->{"msg_en"}="Account registration is successful!\n Please login to your account you just created";
                }else{
                    $user->{"error"}="1";
                    $user->{"msg"}="register_fail";
                    $user->{"msg_en"}="Account registration is not successful!\n try again";
                }
            }
        }else{
            $query_update_user=mysqli_query($link,"UPDATE carrotsy_virtuallover.`app_my_girl_user_$lang` SET `name` = '$name',`sex` = '$sex',`sdt` = '$sdt',`email` = '$email',`password`='$password' WHERE `id_device` = '$id_device' LIMIT 1;");
            if($query_update_user){
                $user->{"error"}="0";
                $user->{"msg"}="register_success";
                $user->{"msg_en"}="Account registration is successful!\n Please login to your account you just created";
            }else{
                $user->{"error"}="1";
                $user->{"msg"}="register_fail";
                $user->{"msg_en"}="Account registration is not successful!\n try again";
            }
        }
    }
    echo json_encode($user);
}

if($function=='change_password'){
    $user=new stdClass();
    $error=0;

    $password='';
    if(isset($_POST['password']))$password=$_POST['password'];
    $password_new=$_POST['password_new'];
    $password_re_new=$_POST['password_re_new'];
    $user_id=$_POST['user_id'];
    $lang=$_POST['user_lang'];

    if((strlen($password_new)<6)){
        $user->{"error"}="1";
        $user->{"msg"}="error_password_new";
        $user->{"msg_en"}="Your new password field cannot be blank and be greater than 5 characters long!";
        $error=1;
    }

    if(($password==$password_new)&&$error==0){
        $user->{"error"}="1";
        $user->{"msg"}="error_password_new_2";
        $user->{"msg_en"}="The new password cannot be the same as your current password!";
        $error=1;
    }

    if(($password_new!=$password_re_new)&&$error==0){
        $user->{"error"}="1";
        $user->{"msg"}="error_rep_password";
        $user->{"msg_en"}="The new password re-enter field does not match!";
        $error=1;
    }

    if($error==0){
        $query_check_user_password=mysqli_query($link,"SELECT `id_device` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `password` = '$password' AND `id_device` = '$user_id' LIMIT 1");
        $data_user=mysqli_fetch_assoc($query_check_user_password);
        if($data_user==null){
            $user->{"error"}="1";
            $user->{"msg"}="error_password_curent";
            $user->{"msg_en"}="Your current password is incorrect!";
        }else{
            $query_update_password=mysqli_query($link,"UPDATE carrotsy_virtuallover.`app_my_girl_user_$lang` SET `password` = '$password_new' WHERE `id_device` = '$user_id' LIMIT 1;");
            if($query_update_password){
                $user->{"error"}="0";
                $user->{"msg"}="change_pass_success";
                $user->{"msg_en"}="Password changed successfully!";
            }else{
                $user->{"error"}="1";
                $user->{"msg"}="change_pass_fail";
                $user->{"msg_en"}="Password change failed!";
            }
        }
    }
    echo json_encode($user);
}

if($function=='list_country'){
    $lang_sys=$_POST['lang_sys'];
    $query_country=mysqli_query($link,"SELECT `id`,`name`,`key` FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `ver0`=1");
    $arr_data=array();
    while($item_country=mysqli_fetch_assoc($query_country)){
        $item_country["icon"]=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/img/'.$item_country['key'].'.png&size=50&trim=1';
        if($lang_sys==$item_country["name"]) $item_country["sel"]="1"; else $item_country["sel"]="0"; 
        array_push($arr_data,$item_country);
    }
    echo json_encode($arr_data);
}

if($function=='download_lang'){
    $data_lang=new stdClass();
    $key=$_POST['key'];
    $query_data_lang=mysqli_query($link,"SELECT `data` FROM carrotsy_virtuallover.`cr_framework_lang_val` WHERE `lang` = '$key' LIMIT 1");
    $data_lang_framework=mysqli_fetch_assoc($query_data_lang);
    $data_lang->{"lang_framework"}=$data_lang_framework["data"];

    $data_lang->{"lang_app"}="";
    $data_lang->{"key"}=$key;
    echo json_encode($data_lang);
}

if($function=='dowwnload_lang_by_key'){
    $data_lang=new stdClass();
    $key=$_POST['key'];

    $query_country=mysqli_query($link,"SELECT `name` FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `key`='$key'");
    $data_country=mysqli_fetch_assoc($query_country);

    $query_data_lang=mysqli_query($link,"SELECT `data` FROM carrotsy_virtuallover.`cr_framework_lang_val` WHERE `lang` = '$key' LIMIT 1");
    $data_lang_framework=mysqli_fetch_assoc($query_data_lang);
    $data_lang->{"lang_framework"}=$data_lang_framework["data"];

    $data_lang->{"lang_app"}="";
    $data_lang->{"lang_key"}=$key;
    $data_lang->{"lang_icon"}=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/img/'.$key.'.png&size=50&trim=1';;
    $data_lang->{"lang_name"}=$data_country['name'];
    echo json_encode($data_lang);
}

if($function=='list_music_game'){
    $arr_list_music=array();
    $query_list_music=mysqli_query($link,"SELECT * FROM carrotsy_sheep.`sound` ORDER BY RAND() LIMIT 25");
    while ($row=mysqli_fetch_assoc($query_list_music)) {
        $row["link"]=$url_carrot_store."/app_mobile/sheep/music/".$row['id'].".mp3";
        array_push($arr_list_music,$row);
    }
    echo json_encode($arr_list_music);
    exit;
}

if($function=='check_inapp'){
    $inapp_id=$_POST['inapp_id'];
    $user_id=$_POST['user_id'];
    $user_lang=$_POST['user_lang'];
    $inapp=new stdClass();
    $query_check_inapp=mysqli_query($link,"SELECT `is_get`,`id` FROM carrotsy_virtuallover.`inapp_order` WHERE `inapp_id` = '$inapp_id' AND `user_id` = '$user_id' AND `is_get`='0' LIMIT 1");
    $data_check_inapp=mysqli_fetch_assoc($query_check_inapp);
    if($data_check_inapp!=null){
        $id_order=$data_check_inapp['id'];
        $query_update_inapp=mysqli_query($link,"UPDATE carrotsy_virtuallover.`inapp_order` SET `is_get` = '1' WHERE `id` = '$id_order' LIMIT 1;");
        $inapp->{"error"}=0;
        $inapp->{"msg"}="shop_buy_success";
        $inapp->{"msg_en"}="Payment success! Thank you for your purchase";
    }else{
        $inapp->{"error"}=1;
        $inapp->{"msg"}="shop_buy_fail";
        $inapp->{"msg_en"}="Purchase failed, Please check your account balance or try again at another time";
    }
    echo json_encode($inapp);
    exit;
}

if($function=='restore_inapp'){
    $user_id=$_POST['user_id'];
    $user_lang=$_POST['user_lang'];
    $inapp_id=$_POST['inapp_id'];
    $inapp=new stdClass();

    $array_inapp_success=array();
    for($i=0;$i<count($inapp_id);$i++){
        $id_inapp_check=$inapp_id[$i];
        $query_check_restore=mysqli_query($link,"SELECT `inapp_id` FROM carrotsy_virtuallover.`inapp_order` WHERE `inapp_id`='$id_inapp_check' AND `user_id`='$user_id' LIMIT 1");
        if($query_check_restore){
            $data_check_restore=mysqli_fetch_assoc($query_check_restore);
            if($data_check_restore!=null){
                array_push($array_inapp_success,$id_inapp_check);
            }
        }
    }
    
    if(count($array_inapp_success)>0){
        $inapp->{"error"}=0;
        $inapp->{"inapp_success"}=$array_inapp_success;
        $inapp->{"msg"}="shop_restore_success";
        $inapp->{"msg_en"}="Successful recovery!";
    }else{
        $inapp->{"error"}=1;
        $inapp->{"msg"}="shop_restore_fail";
        $inapp->{"msg_en"}="Restore failed!";
    }
    
    echo json_encode($inapp);
    exit;
}
?>