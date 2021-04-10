<?php
include "config.php";
include "database.php";

$function='';
$id_device='';
$lang_name='Vietnamese';

if(isset($_POST['function']))$function=$_POST['function'];
if(isset($_POST['id_device']))$id_device=$_POST['id_device'];
if(isset($_POST['lang_name']))$lang_name=$_POST['lang_name'];

function get_code_lang_by_name($link,$key_name){
    $query_code=mysqli_query($link,"SELECT `key` FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `name` = '$key_name' LIMIT 1");
    $data_code=mysqli_fetch_assoc($query_code);
    if($data_code==''){
        return "vi";
    }else{
        return $data_code['key'];
    }
}

function get_data_user($data_user){
    global $url_carrot_store;
    global $link;
    global $lang_name;
    $arr_data=array();

    $item_data=new stdClass();
    $item_data->{"id_name"}="name";
    $item_data->{"title"}="Full name";
    $item_data->{"val"}=$data_user['name'];
    $item_data->{"type_update"}="1";
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="sdt";
    $item_data->{"title"}="Phone number";
    $item_data->{"val"}=$data_user['sdt'];
    $item_data->{"type_update"}="4";
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="address";
    $item_data->{"title"}="Address";
    $item_data->{"val"}=$data_user['address'];
    $item_data->{"type_update"}="1";
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="email";
    $item_data->{"title"}="email";
    $item_data->{"val"}=$data_user['email'];
    $item_data->{"type_update"}="5";
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="sex";
    $item_data->{"title"}="Sex";
    if($data_user['sex']=="0"){
        $item_data->{"val"}="Male";
    }else{
        $item_data->{"val"}="Female";
    }
    $item_data->{"type_update"}="2";
    $item_data->{"val_update"}=array("Male","Female");
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="status";
    $item_data->{"title"}="Information status";
    if($data_user['status']=="0"){
        $item_data->{"val"}="Share information";
    }else{
        $item_data->{"val"}="Do not share information";
    }
    $item_data->{"type_update"}="2";
    $item_data->{"val_update"}=array("Share information","Do not share information");
    array_push($arr_data,$item_data);

    if($data_user['date_start']!=""){
        $item_data=new stdClass();
        $item_data->{"title"}="Date to join the system";
        $item_data->{"val"}=$data_user['date_start'];
        $item_data->{"type_update"}="0";
        array_push($arr_data,$item_data);
    }

    if($data_user['date_cur']!=""){
        $item_data=new stdClass();
        $item_data->{"title"}="Recent login date";
        $item_data->{"val"}=$data_user['date_cur'];
        $item_data->{"type_update"}="0";
        array_push($arr_data,$item_data);
    }

    if($data_user['status']=="0"){
        $item_data=new stdClass();
        $item_data->{"title"}="Contact link on carrotstore";
        $item_data->{"val"}=$url_carrot_store.'/user/'.$data_user['id_device'].'/'.get_code_lang_by_name($link,$lang_name);
        $item_data->{"type_update"}="0";
        $item_data->{"act"}="2";
        array_push($arr_data,$item_data);
    }

    return $arr_data;
}

if($function=='list_app_carrot'){
    $arr_app=array();
    $os=$_POST['os'];
    $query_list_ads=mysqli_query($link,"SELECT `id`,`name`,`$os` FROM carrotsy_virtuallover.`app_my_girl_ads` WHERE `$os` != '' ORDER BY RAND() LIMIT 10");
    while($row_ads=mysqli_fetch_array($query_list_ads)){
        $row_ads["icon"]=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/obj_ads/icon_'.$row_ads['id'].'.png&size=80';
        $row_ads["url"]=$row_ads[$os];
        array_push($arr_app,$row_ads);
    }
    echo json_encode($arr_app);
}

if($function=='show_register'){
    $key_lang=get_code_lang_by_name($link,$lang_name);
    $check_user=mysqli_query($link,"SELECT `name`,`sdt`,`email`,`sex` FROM carrotsy_virtuallover.`app_my_girl_user_$key_lang` WHERE `id_device` = '$id_device' LIMIT 1");
    $data_user=mysqli_fetch_assoc($check_user);

    $user=new stdClass();
    $arr_data=array();

    $item_data=new stdClass();
    $item_data->{"id_name"}="name";
    $item_data->{"title"}="Full name";
    if(isset($data_user['name'])){
        $item_data->{"val"}=$data_user['name'];
    }else{
        $item_data->{"val"}='';
    }
    $item_data->{"type_update"}="1";
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="sdt";
    $item_data->{"title"}="Phone number";
    if(isset($data_user['sdt'])){
        $item_data->{"val"}=$data_user['sdt'];
    }else{
        $item_data->{"val"}='';
    }
    $item_data->{"type_update"}="4";
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="email";
    $item_data->{"title"}="Email";
    if(isset($data_user['email'])){
        $item_data->{"val"}=$data_user['email'];
    }else{
        $item_data->{"val"}='';
    }
    $item_data->{"type_update"}="5";
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="sex";
    $item_data->{"title"}="Sex";
    $item_data->{"val"}="Male";
    $item_data->{"type_update"}="2";
    $item_data->{"val_update"}=array("Male","Female");
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="password";
    $item_data->{"title"}="Password";
    $item_data->{"val"}='';
    $item_data->{"type_update"}="3";
    array_push($arr_data,$item_data);

    $item_data=new stdClass();
    $item_data->{"id_name"}="re_password";
    $item_data->{"title"}="Re Password";
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
        $login->{"msg"}="Phone number (or email) and password cannot be left blank";
    }else{
        $key_lang=get_code_lang_by_name($link,$lang_name);
        $query_user=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_user_$key_lang` WHERE (`email` = '$login_username' OR `sdt` = '$login_username') AND (`password`='$login_password') LIMIT 1");
        $data_user=mysqli_fetch_assoc($query_user);

        if($data_user!=null){
            $login->{"error"}="0";
            $login->{"list_info"}=get_data_user($data_user);
            $login->{"user_id"}=$data_user['id_device'];
            $login->{"user_password"}=$data_user['password'];
        }else{
            $login->{"error"}="1";
            $login->{"msg"}="Password is incorrect, please check your login information";
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
    echo json_encode($show_user);
}

if($function=='get_password'){
    $inp_info=$_POST['inp_info'];
    if(strlen(trim($inp_info))<5){
        echo 'Account information cannot be left blank, and email or phone number must be greater than 6 characters';
    }else{
        $key_lang=get_code_lang_by_name($link,$lang_name);
        $query_get_password=mysqli_query($link,"SELECT `password` FROM carrotsy_virtuallover.`app_my_girl_user_$key_lang` WHERE `email` = '$inp_info' OR `sdt` = '$inp_info' LIMIT 1");
        if(mysqli_num_rows($query_get_password)>0){
            $data_user=mysqli_fetch_assoc($query_get_password);
            if(isset($data_user["password"])){
                echo "The account's password is : ".$data_user["password"];
            }else{
                echo 'The account has not set up a password';
            }
        }else{
            echo "This account information is not in the system!\n This account does not exist";
        }
    }
}

if($function=='update_account'){
    $error=0;
    $user_id=$_POST['user_id'];
    $key_lang=get_code_lang_by_name($link,$lang_name);
    $name=$_POST['name'];
    $sdt=$_POST['sdt'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $sex=$_POST['sex'];
    $status=$_POST['status'];

    $user=new stdClass();

    if(strlen(trim($name))<6){
        $user->{"error"}="1";
        $user->{"msg"}="The account name cannot be empty and be greater than 5 characters";
        $error=1;
    }

    if(strlen(trim($sdt))<6&&$error==0){
        $user->{"error"}="1";
        $user->{"msg"}="Phone number must not be blank and be larger than 9 characters";
        $error=1;
    }

    if($error==0){
        $query_update=mysqli_query($link,"UPDATE carrotsy_virtuallover.`app_my_girl_user_$key_lang` SET `name` = '$name',`sex` = '$sex',`address` = '$address',`sdt` = '$sdt',`status` = '$status',`email` = '$email' WHERE `id_device` = '$user_id' LIMIT 1;");
        
        if($query_update){
            $query_user=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_user_$key_lang` WHERE `id_device`='$user_id' LIMIT 1");
            $data_user=mysqli_fetch_assoc($query_user);

            $user->{"error"}="0";
            $user->{"msg"}="Successful account information update!";
            $user->{"list_info"}=get_data_user($data_user);
            $user->{"user_id"}=$user_id;
            $user->{"user_name"}=$data_user['name'];
            $user->{"user_password"}=$data_user['password'];
        }else{
            $user->{"error"}="1";
            $user->{"msg"}="Account information update failed, try again at another time";
        }
    }
    echo json_encode($user);
}

if($function=='register'){
    $user=new stdClass();
    $error=0;

    $key_lang=get_code_lang_by_name($link,$lang_name);
    $name=$_POST['name'];
    $sdt=$_POST['sdt'];
    $email=$_POST['email'];
    $sex=$_POST['sex'];
    $password=$_POST['password'];
    $re_password=$_POST['re_password'];

    if(strlen(trim($name))<6){
        $user->{"error"}="1";
        $user->{"msg"}="The account name cannot be empty and be greater than 5 characters";
        $error=1;
    }

    if(strlen(trim($sdt))<6&&$error==0){
        $user->{"error"}="1";
        $user->{"msg"}="Phone number must not be blank and be larger than 9 characters";
        $error=1;
    }

    if(strlen(trim($password))<6&&$error==0){
        $user->{"error"}="1";
        $user->{"msg"}="Password must not be blank and be greater than 6 characters";
        $error=1;
    }

    if(($password!=$re_password)&&$error==0){
        $user->{"error"}="1";
        $user->{"msg"}="Re-enter the password does not match. Please enter your correct password";
        $error=1;
    }

    if($error==0){
        $check_user=mysqli_query($link,"SELECT `id_device` FROM carrotsy_virtuallover.`app_my_girl_user_$key_lang` WHERE `id_device` = '$id_device' LIMIT 1");
        $data_user=mysqli_fetch_assoc($check_user);

        if($data_user==null){
            $check_user_by_email_and_sdt=mysqli_query($link,"SELECT `id_device` FROM carrotsy_virtuallover.`app_my_girl_user_$key_lang` WHERE (`email` = '$email' AND `password` = '$password') OR (`sdt` = '$sdt' AND `password` = '$password') LIMIT 1");
            $data_user=mysqli_fetch_assoc($check_user_by_email_and_sdt);
            if($data_user!=null){
                $id_device=$data_user['id_device'];
                $query_update_user=mysqli_query($link,"UPDATE carrotsy_virtuallover.`app_my_girl_user_$key_lang` SET `name` = '$name',`sex` = '$sex',`sdt` = '$sdt',`email` = '$email',`password`='$password' WHERE `id_device` = '$id_device' LIMIT 1;");
                if($query_update_user){
                    $user->{"error"}="0";
                    $user->{"msg"}="Account registration is successful!\n Please login to your account you just created";
                }else{
                    $user->{"error"}="1";
                    $user->{"msg"}="Account registration is not successful!\n try again";
                }
            }

            if($data_user==null){
                $query_add_user =mysqli_query($link,"INSERT INTO carrotsy_virtuallover.app_my_girl_user_$key_lang (`id_device`, `name`,`sdt`,`email`,`status`,`sex`,`date_start`,`date_cur`,`password`) VALUES ('".$id_device."', '$name', '$sdt','$email', '0','$sex',NOW(),NOW(),'$password');");
                if($query_add_user){
                    $user->{"error"}="0";
                    $user->{"msg"}="Account registration is successful!\n Please login to your account you just created";
                }else{
                    $user->{"error"}="1";
                    $user->{"msg"}="Account registration is not successful!\n try again";
                }
            }
        }else{
            $query_update_user=mysqli_query($link,"UPDATE carrotsy_virtuallover.`app_my_girl_user_$key_lang` SET `name` = '$name',`sex` = '$sex',`sdt` = '$sdt',`email` = '$email',`password`='$password' WHERE `id_device` = '$id_device' LIMIT 1;");
            if($query_update_user){
                $user->{"error"}="0";
                $user->{"msg"}="Account registration is successful!\n Please login to your account you just created";
            }else{
                $user->{"error"}="1";
                $user->{"msg"}="Account registration is not successful!\n try again";
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
    $key_lang=get_code_lang_by_name($link,$lang_name);

    if((strlen($password_new)<6)){
        $user->{"error"}="1";
        $user->{"msg"}="Your new password field cannot be blank and be greater than 5 characters long!";
        $error=1;
    }

    if(($password==$password_new)&&$error==0){
        $user->{"error"}="1";
        $user->{"msg"}="The new password cannot be the same as your current password!";
        $error=1;
    }

    if(($password_new!=$password_re_new)&&$error==0){
        $user->{"error"}="1";
        $user->{"msg"}="The new password re-enter field does not match!";
        $error=1;
    }

    if($error==0){
        $query_check_user_password=mysqli_query($link,"SELECT `id_device` FROM carrotsy_virtuallover.`app_my_girl_user_$key_lang` WHERE `password` = '$password' AND `id_device` = '$user_id' LIMIT 1");
        $data_user=mysqli_fetch_assoc($query_check_user_password);
        if($data_user==null){
            $user->{"error"}="1";
            $user->{"msg"}="Your current password is incorrect!";
        }else{
            $query_update_password=mysqli_query($link,"UPDATE carrotsy_virtuallover.`app_my_girl_user_$key_lang` SET `password` = '$password_new' WHERE `id_device` = '$user_id' LIMIT 1;");
            if($query_update_password){
                $user->{"error"}="0";
                $user->{"msg"}="Password changed successfully!";
            }else{
                $user->{"error"}="1";
                $user->{"msg"}="Password change failed!";
            }
        }
    }
    echo json_encode($user);
}
?>