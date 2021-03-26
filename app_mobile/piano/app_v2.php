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

    $item_data=new stdClass();
    $item_data->{"title"}="Click here to view";
    $item_data->{"val"}="Your publishing Midi list";
    $item_data->{"type_update"}="0";
    $item_data->{"act"}="1";
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
        $item_data->{"id_name"}="link_store";
        $item_data->{"title"}="Contact link on carrotstore";
        $item_data->{"val"}=$url_carrot_store.'/user/'.$data_user['id_device'].'/'.get_code_lang_by_name($link,$lang_name);
        $item_data->{"type_update"}="0";
        $item_data->{"act"}="2";
        array_push($arr_data,$item_data);
    }

    return $arr_data;
}

if($function=='upload_midi'){
    $user_id=$_POST['user_id'];
    if($user_id==''){$user_id=$id_device;}
    $name_midi=$_POST['name_midi'];
    $arr_index_piano=json_decode($_POST['data_index']);
    $arr_type_piano=json_decode($_POST['data_type']);

    $data_0='';$data_1='';$data_2='';$data_3='';$data_4='';$data_5='';$data_6='';$data_7='';$data_8='';$data_9='';
    $type_0='';$type_1='';$type_2='';$type_3='';$type_4='';$type_5='';$type_6='';$type_7='';$type_8='';$type_9='';

    if(isset($arr_index_piano[0]))$data_0=json_encode($arr_index_piano[0]);
    if(isset($arr_index_piano[1]))$data_1=json_encode($arr_index_piano[1]);
    if(isset($arr_index_piano[2]))$data_2=json_encode($arr_index_piano[2]);
    if(isset($arr_index_piano[3]))$data_3=json_encode($arr_index_piano[3]);
    if(isset($arr_index_piano[4]))$data_4=json_encode($arr_index_piano[4]);
    if(isset($arr_index_piano[5]))$data_5=json_encode($arr_index_piano[5]);
    if(isset($arr_index_piano[6]))$data_6=json_encode($arr_index_piano[6]);
    if(isset($arr_index_piano[7]))$data_7=json_encode($arr_index_piano[7]);
    if(isset($arr_index_piano[8]))$data_8=json_encode($arr_index_piano[8]);
    if(isset($arr_index_piano[9]))$data_9=json_encode($arr_index_piano[9]);


    if(isset($arr_type_piano[0]))$type_0=json_encode($arr_type_piano[0]);
    if(isset($arr_type_piano[1]))$type_1=json_encode($arr_type_piano[1]);
    if(isset($arr_type_piano[2]))$type_2=json_encode($arr_type_piano[2]);
    if(isset($arr_type_piano[3]))$type_3=json_encode($arr_type_piano[3]);
    if(isset($arr_type_piano[4]))$type_4=json_encode($arr_type_piano[4]);
    if(isset($arr_type_piano[5]))$type_5=json_encode($arr_type_piano[5]);
    if(isset($arr_type_piano[6]))$type_6=json_encode($arr_type_piano[6]);
    if(isset($arr_type_piano[7]))$type_7=json_encode($arr_type_piano[7]);
    if(isset($arr_type_piano[8]))$type_8=json_encode($arr_type_piano[8]);
    if(isset($arr_type_piano[9]))$type_9=json_encode($arr_type_piano[9]);

    $midi_length=count($arr_index_piano[0]);
    $midi_length_line=count($arr_index_piano);
    $speed=$_POST['speed'];
    $id_midi=uniqid().uniqid();
    $query_add=mysqli_query($link,"INSERT INTO `midi` (`id_midi`,`id_device`,`name`,`data0`,`data1`,`data2`,`data3`,`data4`,`data5`,`data6`,`data7`,`data8`,`data9`,`type0`,`type1`,`type2`,`type3`,`type4`,`type5`,`type6`,`type7`,`type8`,`type9`,`speed`,`sell`,`length`,`length_line`) VALUES ('$id_midi','$user_id','$name_midi','$data_0','$data_1','$data_2','$data_3','$data_4','$data_5','$data_6','$data_7','$data_8','$data_9','$type_0','$type_1','$type_2','$type_3','$type_4','$type_5','$type_6','$type_7','$type_8','$type_9','$speed','0','$midi_length','$midi_length_line');");
    echo mysqli_error($link);
    echo "Thank you for contributing the draft midi piano, We will review and release to the world in the fastest time possible.";
}


if($function=='list_midi_online'){
    $user_id='';
    if(isset($_POST['user_id'])){ $user_id=$_POST['user_id'];}

    $arr_data=array();
    if($user_id!=''){
        $query_list=mysqli_query($link,"SELECT `id_midi`,`id_device`,`name`,`sell`,`speed`,`level` FROM `midi` WHERE `id_device`='$user_id' OR `id_device`='$id_device' ORDER BY RAND() LIMIT 20");
    }else{
        $query_list=mysqli_query($link,"SELECT `id_midi`,`id_device`,`name`,`sell`,`speed`,`level` FROM `midi` WHERE `sell` > '0' ORDER BY RAND() LIMIT 15");
    }
    while($row_data=mysqli_fetch_assoc($query_list)){
        $row_data["link"]=$url_carrot_store.'/piano/'.$row_data['id_midi'];
        array_push($arr_data,$row_data);
    }
    echo json_encode($arr_data);
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
        }else{
            $login->{"error"}="1";
            $login->{"msg"}="Password is incorrect, please check your login information";
        }
    }
    echo json_encode($login);
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
        }else{
            $user->{"error"}="1";
            $user->{"msg"}="Account information update failed, try again at another time";
        }
    }
    echo json_encode($user);
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

    if($error==0){
        $check_user=mysqli_query($link,"SELECT `id_device` FROM carrotsy_virtuallover.`app_my_girl_user_$key_lang` WHERE `id_device` = '$id_device' LIMIT 1");
        $data_user=mysqli_fetch_assoc($check_user);

        if($data_user==null){
            $query_add_user =mysqli_query($link,"INSERT INTO carrotsy_virtuallover.app_my_girl_user_$key_lang (`id_device`,`name`,`sdt`,`email`,`status`,`sex`,`date_start`,`date_cur`,`password`) VALUES ('".$id_device."','$name','$sdt','$email','0','$sex',NOW(),NOW(),'$password');");
            if($query_add_user){
                $user->{"error"}="0";
                $user->{"msg"}="Account registration is successful!\n Please login to your account you just created";
            }else{
                $user->{"error"}="1";
                $user->{"msg"}="Account registration is not successful!\n try again";
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

if($function=='get_midi'){
    $id_midi=$_POST['id_midi'];
    $query_midi=mysqli_query($link,"SELECT * FROM `midi` WHERE `id_midi` = '$id_midi' LIMIT 1");
    $data_midi=mysqli_fetch_assoc($query_midi);

    $arr_index=array();
    if($data_midi["data0"]){ array_push($arr_index,json_decode($data_midi["data0"])); }
    if($data_midi["data1"]){ array_push($arr_index,json_decode($data_midi["data1"])); }
    if($data_midi["data2"]){ array_push($arr_index,json_decode($data_midi["data2"])); }
    if($data_midi["data3"]){ array_push($arr_index,json_decode($data_midi["data3"])); }
    if($data_midi["data4"]){ array_push($arr_index,json_decode($data_midi["data4"])); }
    if($data_midi["data5"]){ array_push($arr_index,json_decode($data_midi["data5"])); }
    if($data_midi["data6"]){ array_push($arr_index,json_decode($data_midi["data6"])); }
    if($data_midi["data7"]){ array_push($arr_index,json_decode($data_midi["data7"])); }
    if($data_midi["data8"]){ array_push($arr_index,json_decode($data_midi["data8"])); }
    if($data_midi["data9"]){ array_push($arr_index,json_decode($data_midi["data9"])); }

    $arr_type=array();
    if($data_midi["type0"]){ array_push($arr_type,json_decode($data_midi["type0"])); }
    if($data_midi["type1"]){ array_push($arr_type,json_decode($data_midi["type1"])); }
    if($data_midi["type2"]){ array_push($arr_type,json_decode($data_midi["type2"])); }
    if($data_midi["type3"]){ array_push($arr_type,json_decode($data_midi["type3"])); }
    if($data_midi["type4"]){ array_push($arr_type,json_decode($data_midi["type4"])); }
    if($data_midi["type5"]){ array_push($arr_type,json_decode($data_midi["type5"])); }
    if($data_midi["type6"]){ array_push($arr_type,json_decode($data_midi["type6"])); }
    if($data_midi["type7"]){ array_push($arr_type,json_decode($data_midi["type7"])); }
    if($data_midi["type8"]){ array_push($arr_type,json_decode($data_midi["type8"])); }
    if($data_midi["type9"]){ array_push($arr_type,json_decode($data_midi["type9"])); }

    $data_midi["data_index"]=json_encode($arr_index);
    $data_midi["data_type"]=json_encode($arr_type);
    echo json_encode($data_midi);
}
?>