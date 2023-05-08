<?php
include "config.php";

$function='';
$id_device='';
$lang='en';

if(isset($_POST['function']))$function=$_POST['function'];
if(isset($_POST['id_device']))$id_device=$_POST['id_device'];
if(isset($_POST['lang']))$lang=$_POST['lang'];

function get_field_contacts($id_name_field,$lang){
    global $link;
    $query_field_type=mysqli_query($link,"SELECT `type` FROM carrotsy_contacts.`field` WHERE `name_id` = '$id_name_field' LIMIT 1");
    $data_field_type=mysqli_fetch_assoc($query_field_type);

    $query_field_title=mysqli_query($link,"SELECT `name` FROM carrotsy_contacts.`field_lang` WHERE `name_id` = '$id_name_field' AND `lang` = '$lang'");
    $data_field_title=mysqli_fetch_assoc($query_field_title);

    $data_field=new stdClass();
    $data_field->{"title"}=$data_field_title["name"];
    $data_field->{"title_en"}=$data_field_title["name"];
    if($data_field_type["type"]=="2"){
        $query_field_select=mysqli_query($link,"SELECT `name_key`,`val` FROM carrotsy_contacts.`field_data_lang` WHERE `name_id` = '$id_name_field' AND `lang` = '$lang' ORDER BY `order`");
        $arr_val=array();
        $arr_key=array();
        while($field_val=mysqli_fetch_assoc($query_field_select)){
            array_push($arr_key,$field_val["name_key"]);
            array_push($arr_val,$field_val["val"]);
        }
        $data_field->{"val_update"}=$arr_key;
        $data_field->{"val_update_en"}=$arr_val;
    }
    $data_field->{"type"}=$data_field_type["type"];
    return $data_field;
}

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
    $item_data->{"icon"}=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mobile/contactstore/field_data/name.png&size=64';
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="sdt";
    $item_data->{"title"}="user_phone";
    $item_data->{"title_en"}="Phone number";
    $item_data->{"val"}=$data_user['sdt'];
    $item_data->{"type_update"}="8";
    $item_data->{"icon"}=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mobile/contactstore/field_data/phone.png&size=64';
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="address";
    $item_data->{"title"}="user_address";
    $item_data->{"title_en"}="Address";
    $item_data->{"val"}=$data_user['address'];
    $item_data->{"type_update"}="9";
    $item_data->{"icon"}=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mobile/contactstore/field_data/address.png&size=64';
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="email";
    $item_data->{"title"}="user_email";
    $item_data->{"title_en"}="Email (Email)";
    $item_data->{"val"}=$data_user['email'];
    $item_data->{"type_update"}="5";
    $item_data->{"icon"}=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mobile/contactstore/field_data/email.png&size=64';
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="sex";
    $item_data->{"title"}="user_sex";
    $item_data->{"title_en"}="Sex";
    $item_data->{"val"}=$data_user['sex'];
    $item_data->{"type_update"}="2";
    $item_data->{"val_update"}=array("user_sex_boy","user_sex_girl");
    $item_data->{"val_update_en"}=array("Male","Female");
    $item_data->{"icon"}=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mobile/contactstore/field_data/sex.png&size=64';
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
        $item_data->{"id_name"}="user_link";
        $item_data->{"title"}="user_link";
        $item_data->{"title_en"}="Contact link";
        $item_data->{"val"}=$url_carrot_store.'/user/'.$data_user['id_device'].'/'.$lang;
        $item_data->{"type_update"}="7";
        $item_data->{"icon"}=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mobile/contactstore/field_data/web.png&size=64';
        array_push($arr_data,$item_data);
    }

    $list_info_contact=mysqli_query($link,"SELECT `data` FROM carrotsy_contacts.`info_$lang` WHERE `user_id` = '".$data_user['id_device']."' LIMIT 1");
    $list_data_contact=mysqli_fetch_assoc($list_info_contact);
    if($list_data_contact!=null){
        $list_data_contact=json_decode($list_data_contact['data']);
        for($i=0;$i<count($list_data_contact);$i++){
            $item_info=$list_data_contact[$i];

            $key_field=$item_info->{"key"};
            $data_field=get_field_contacts($key_field,$lang);

            $item_data=new stdClass();
            $item_data->{"id_name"}=$item_info->{"key"};
            $item_data->{"title"}=$data_field->{"title"};
            $item_data->{"title_en"}=$data_field->{"title_en"};
            $item_data->{"val"}=$item_info->{"val"};
            $item_data->{"type_update"}=$data_field->{"type"};
            if(isset($data_field->{"val_update"})){
                $item_data->{"val_update"}=$data_field->{"val_update"};
                $item_data->{"val_update_en"}=$data_field->{"val_update_en"};
            }
            $item_data->{"icon"}=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mobile/contactstore/field_data/'.$key_field.'.png&size=64';
            array_push($arr_data,$item_data);
        }
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

function check_table_exit($table_app){
    global $link;
    $q_check_table=mysqli_query($link,"SELECT count(*) as c FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'carrotsy_work') AND (TABLE_NAME = '$table_app')");
    $data_count=mysqli_fetch_assoc($q_check_table);
    if($data_count['c']>0)
        return true;
    else
        return false;
}

if($function=='list_app_carrot'){
    $arr_app=array();
    $os=$_POST['os'];
    $store='';if(isset($_POST['store'])) $store=$_POST['store'];
    if($store==''){
        $query_list_ads=mysqli_query($link,"SELECT `id`,`name`,`$os`,`app_id` FROM carrotsy_virtuallover.`app_my_girl_ads` WHERE `$os` != '' ORDER BY RAND() LIMIT 12");
        while($row_ads=mysqli_fetch_array($query_list_ads)){
            $row_ads["icon"]=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/obj_ads/icon_'.$row_ads['id'].'.png&size=80';
            $row_ads["url"]=$row_ads[$os];
            $row_ads['link_carrot_app']=$url_carrot_store.'/product/'.$row_ads['app_id'];
            array_push($arr_app,$row_ads);
        }
    }else{
        $type_app='';if(isset($_POST['type'])) $type_app=$_POST['type'];
        if($type_app=='')
            $query_list_ads=mysqli_query($link,"SELECT `$store`,`id_app` FROM carrotsy_virtuallover.`app_ads` WHERE `$store` != '' ORDER BY RAND() LIMIT 12");
        else
            $query_list_ads=mysqli_query($link,"SELECT `$store`,`id_app` FROM carrotsy_virtuallover.`app_ads` WHERE `$store` != '' AND `type`='$type_app' ORDER BY RAND() LIMIT 12");
            
        while($row_ads=mysqli_fetch_array($query_list_ads)){
            $id_app=$row_ads['id_app'];
            $name_app='';
            $q_name_app=mysqli_query($link,"SELECT `data` FROM carrotsy_virtuallover.`product_name_$lang` WHERE `id_product` = '$id_app' LIMIT 1");
            $data_name_app=mysqli_fetch_assoc($q_name_app);
            if($data_name_app!=null){
                $name_app=$data_name_app['data'];
            }else{
                $q_name_app=mysqli_query($link,"SELECT `data` FROM carrotsy_virtuallover.`product_name_en` WHERE `id_product` = '$id_app' LIMIT 1");
                $data_name_app=mysqli_fetch_assoc($q_name_app);
                if($data_name_app!=null)$name_app=$data_name_app['data'];
            }

            $row_ads["name"]=$name_app;
            $row_ads["icon"]=$url_carrot_store."/thumb.php?src=".$url_carrot_store."/product_data/".$id_app."/icon.jpg&size=60&trim=1";
            $row_ads["url"]=$row_ads[$store];
            $row_ads['link_carrot_app']=$url_carrot_store.'/product/'.$id_app;
            array_push($arr_app,$row_ads);
        }  
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
            if($query_user){
                $data_user=mysqli_fetch_assoc($query_user);
                $lang=$key_lang;
            }else{
                $data_user=null;
            }
            
            if($data_user!=null) break;
        }

        if($data_user!=null){
            $login->{"error"}="0";
            $login->{"list_info"}=get_data_user($data_user);
            $login->{"user_id"}=$data_user['id_device'];
            $login->{"user_lang"}=$key_lang;
            $login->{"user_password"}=$data_user['password'];
            $login->{"avatar"}=get_url_avatar_user_thumb($data_user['id_device'],$lang,'50x50');
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
    $user_lang=$_POST['user_lang'];
    $query_user=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_user_$user_lang` WHERE `id_device`='$user_id' LIMIT 1");
    $data_user=mysqli_fetch_assoc($query_user);
    $show_user=new stdClass();
    $show_user->{"list_info"}=get_data_user($data_user);
    $show_user->{"user_id"}=$data_user['id_device'];
    $show_user->{"avatar"}=get_url_avatar_user($user_id,$user_lang);
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
    $name=$_POST['name'];
    $sdt=$_POST['sdt'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $sex=$_POST['sex'];
    $status=$_POST['status'];
    if(isset($_POST['user_lang'])) $lang=$_POST['user_lang'];

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
            $user->{"avatar"}=get_url_avatar_user($user_id,$lang);
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
    $password='';if(isset($_POST['password']))$password=$_POST['password'];
    $re_password='';if(isset($_POST['re_password']))$re_password=$_POST['re_password'];

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

    if(isset($_POST['password'])){
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
    if(isset($_POST['user_lang'])) $lang=$_POST['user_lang'];

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
    $data_lang->{"key"}=$key;

    $query_data_lang=mysqli_query($link,"SELECT `data` FROM carrotsy_virtuallover.`cr_framework_lang_val` WHERE `lang` = '$key' LIMIT 1");
    $data_lang_framework=mysqli_fetch_assoc($query_data_lang);
    $data_lang->{"lang_framework"}=$data_lang_framework["data"];

    $query_data_lang_app=mysqli_query($link,"SELECT `data` FROM carrotsy_music.`game_key_value` WHERE `lang` = '$key' LIMIT 1");
    if($query_data_lang_app){
        $data_lang_app=mysqli_fetch_assoc($query_data_lang_app);
        $data_lang->{"lang_app"}=$data_lang_app['data'];
    }
    echo json_encode($data_lang);
    exit;
}

if($function=='dowwnload_lang_by_key'){
    $data_lang=new stdClass();
    $key=$_POST['key'];

    $query_country=mysqli_query($link,"SELECT `name` FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `key`='$key'");
    $data_country=mysqli_fetch_assoc($query_country);

    $query_data_lang=mysqli_query($link,"SELECT `data` FROM carrotsy_virtuallover.`cr_framework_lang_val` WHERE `lang` = '$key' LIMIT 1");
    $data_lang_framework=mysqli_fetch_assoc($query_data_lang);
    $data_lang->{"lang_framework"}=$data_lang_framework["data"];

    $query_data_lang_app=mysqli_query($link,"SELECT `data` FROM carrotsy_music.`game_key_value` WHERE `lang` = '$key' LIMIT 1");
    if($query_data_lang_app){
        $data_lang_app=mysqli_fetch_assoc($query_data_lang_app);
        $data_lang->{"lang_app"}=$data_lang_app["data"];
    }

    $data_lang->{"lang_key"}=$key;
    $data_lang->{"lang_icon"}=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/img/'.$key.'.png&size=50&trim=1';;
    $data_lang->{"lang_name"}=$data_country['name'];
    echo json_encode($data_lang);
    exit;
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

if($function=='list_share'){
    $os=$_POST['os'];
    $arr_share=array();
    $query_share=mysqli_query($link,"SELECT `id`,`$os` FROM carrotsy_virtuallover.`share` WHERE `$os` != '' LIMIT 10");
    while($share=mysqli_fetch_assoc($query_share)){
        $item_share=new stdClass();
        $item_share->url=$share[$os];
        $item_share->icon=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mobile/carrot_framework/share_icon/'.$share['id'].'.png&size=64';
        array_push($arr_share,$item_share);
    }
    echo json_encode($arr_share);
    exit;
}

if($function=='submit_rate'){
    $app_id=$_POST['app_id'];
    $inp_review=$_POST['inp_review'];
    $star_feedback=$_POST['star_feedback'];
    $user_id=$_POST['user_id'];
    if(isset($_POST['user_lang'])) $lang=$_POST['user_lang'];

    if($star_feedback!="-1"){
        $star_feedback=intval($star_feedback)+1;
        $query_check_rate=mysqli_query($link,"SELECT `product` FROM carrotsy_virtuallover.`product_rate` WHERE `product` = '$app_id' AND `user` = '$user_id' LIMIT 1");
        if(mysqli_num_rows($query_check_rate)>0){
            mysqli_query($link,"UPDATE carrotsy_virtuallover.`product_rate` SET `rate` = '$star_feedback',`lang`='$lang' WHERE `product`='$app_id' AND `user`='$user_id' AND `lang`='$lang' LIMIT 1;");
        }else{
            mysqli_query($link,"INSERT INTO carrotsy_virtuallover.`product_rate` (`product`, `user`, `rate`, `lang`) VALUES ('$app_id', '$user_id', '$star_feedback', '$lang');");
        }
    }

    if($inp_review!=""){
        $inp_review=addslashes($inp_review);
        $id_c="c".uniqid();

        $query_check_comment=mysqli_query($link,"SELECT `id` FROM carrotsy_virtuallover.`comment` WHERE `username` = '$user_id' AND `productid` = '$app_id' LIMIT 1");
        if(mysqli_num_rows($query_check_comment)>0)
            mysqli_query($link,"UPDATE carrotsy_virtuallover.`comment` SET `comment` = '$inp_review',`lang`='$lang' WHERE `username` = '$user_id' AND `productid` = '$app_id' ");
        else
            mysqli_query($link,"INSERT INTO carrotsy_virtuallover.`comment` (`id_c`, `username`, `comment`, `productid`, `created`, `upvote_count`, `parent`, `type_comment`, `lang`) VALUES ('$id_c', '$user_id', '$inp_review', '$app_id', NOW(), '0', '0', 'products', '$lang');");
    }
    exit;
}

if($function=='get_rate'){
    $user_id=$_POST['user_id'];
    $app_id=$_POST['app_id'];

    $query_rate=mysqli_query($link,"SELECT `rate` FROM carrotsy_virtuallover.`product_rate` WHERE `user` = '$user_id' AND `product` = '$app_id' LIMIT 1");
    $data_rate=mysqli_fetch_assoc($query_rate);

    $query_comment=mysqli_query($link,"SELECT `comment`  FROM carrotsy_virtuallover.`comment` WHERE `username` = '$user_id' AND `productid` = '$app_id' LIMIT 1");
    $data_comment=mysqli_fetch_assoc($query_comment);

    $obj_rate=new stdClass();
    if($data_rate!=null) $obj_rate->{"star"}=$data_rate['rate'];
    if($data_comment!=null) $obj_rate->{"comment"}=$data_comment['comment'];

    echo json_encode($obj_rate);
    exit;
}

if($function=='load_ads'){
    $store='google_Play';if(isset($_POST['store'])) $store=$_POST['store'];
    $q_app=mysqli_query($link,"SELECT `$store`,`id_app` FROM carrotsy_virtuallover.`app_ads` WHERE `$store` != '' ORDER BY RAND() LIMIT 1");
    $data_ads=mysqli_fetch_assoc($q_app);
    $id_app=$data_ads["id_app"];

    $q_app_name=mysqli_query($link,"SELECT `data` FROM carrotsy_virtuallover.`product_name_$lang` WHERE `id_product` = '$id_app' LIMIT 1");
    $data_app_name=mysqli_fetch_assoc($q_app_name);
    if($data_app_name==null){
        $q_app_name=mysqli_query($link,"SELECT `data` FROM carrotsy_virtuallover.`product_name_en` WHERE `id_product` = '$id_app' LIMIT 1");
        $data_app_name=mysqli_fetch_assoc($q_app_name);
    }

    $q_app_tip=mysqli_query($link,"SELECT SUBSTRING(`data`, 1, 160) as tip FROM carrotsy_virtuallover.`product_desc_$lang` WHERE `id_product` = '$id_app' LIMIT 1");
    $data_app_tip=mysqli_fetch_assoc($q_app_tip);
    if($data_app_tip==null){
        $q_app_tip=mysqli_query($link,"SELECT SUBSTRING(`data`, 1, 160) as tip FROM carrotsy_virtuallover.`product_desc_en` WHERE `id_product` = '$id_app' LIMIT 50");
        $data_app_tip=mysqli_fetch_assoc($q_app_tip);
    }
    $data_ads['name']=$data_app_name['data'];
    $data_ads['tip']=preg_replace( "/\r|\n/", "",strip_tags($data_app_tip['tip']))."...";
    $data_ads['icon']=$url_carrot_store."/thumb.php?src=".$url_carrot_store."/product_data/".$id_app."/icon.jpg&size=200x200&trim=1";
    $data_ads['url']=$data_ads[$store];
    echo json_encode($data_ads);
    exit;
}

if($function=='list_top_player'){
    $id_app=$_POST["id_app"];
    $table_app="app_".$id_app."_scores";

    if(check_table_exit($table_app)){
        $q_list_top_player=mysqli_query($link,"SELECT `user_id`,`lang`,`scores` FROM carrotsy_work.`$table_app` ORDER BY `scores` DESC LIMIT 20");
        $list_top_player=array();
        while($t_player=mysqli_fetch_assoc($q_list_top_player)){
            $p_user_id=$t_player['user_id'];
            $p_user_lang=$t_player['lang'];
            $query_name_user=mysqli_query($link,"SELECT `name` FROM carrotsy_virtuallover.`app_my_girl_user_$p_user_lang` WHERE `id_device` = '$p_user_id' LIMIT 1");
            $data_name=mysqli_fetch_assoc($query_name_user);
            if($data_name['name']!=null){
                $t_player['name']=$data_name['name'];
                $t_player['avatar']=get_url_avatar_user_thumb($p_user_id,$p_user_lang,'50');
                array_push($list_top_player,$t_player);
            }
        }
        echo json_encode($list_top_player);
    }else{
        echo 'create_top_player';
        $q_create_table=mysqli_query($link,"CREATE TABLE carrotsy_work.`app_".$id_app."_scores` (`user_id` varchar(100) NOT NULL,`lang` varchar(2) NOT NULL,`scores` int NOT NULL,`type` int(2) NOT NULL,`date_update` date NOT NULL);");
    }
    exit;
}

if($function=='update_scores_player'){
    $id_app=$_POST["id_app"];
    $id_user=$_POST['id_user'];
    $lang_user=$_POST['lang_user'];
    $scores=$_POST['scores'];
    $table_app="app_".$id_app."_scores";

    $q_scores=mysqli_query($link,"SELECT `scores` FROM carrotsy_work.`".$table_app."` WHERE `user_id` = '".$id_user."' AND `lang` = '".$lang_user."' LIMIT 1");
    if($q_scores){
        $data_scores=mysqli_fetch_assoc($q_scores);
        if($data_scores==null){
            mysqli_query($link,"INSERT INTO carrotsy_work.`".$table_app."` (`user_id`, `lang`, `scores`, `type`, `date_update`) VALUES ('".$id_user."', '".$lang_user."', '".$scores."', '0', NOW());");
        }
        else{
            $user_scores=$data_scores['scores'];
            if(intval($scores)>intval($user_scores)){
                mysqli_query($link,"UPDATE carrotsy_work.`".$table_app."` SET `scores` = '$scores',`date_update` = NOW() WHERE `user_id` = '$id_user' AND  `lang` = '$lang_user' LIMIT 1;");
            }
        }
    }else{
        echo mysqli_error($link);
    }
}
?>