<?php
header('Access-Control-Allow-Origin: *');
include "config.php";
include "database.php";

ini_set('post_max_size', '90M');
ini_set('upload_max_filesize', '90M');

function does_url_exists($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($code == 200) {
        $status = true;
    } else {
        $status = false;
    }
    curl_close($ch);
    return $status;
}

Class App{
    public $data='';
    public $list_data='';
}

class Item{
    public $id;
    public $key;
    public $name;
    public $url;
    public $type;
}

$lang='vi';
$os='chrome';
if(isset($_POST['lang'])){
    $lang=$_POST['lang'];
}
$app=new App();
$func='';
if(isset($_POST['function']))$func=$_POST['function'];

if($func=='logincallback'){
    $user_phone=$_POST['user_phone'];
    $user_password=$_POST['user_password'];
    if(trim($user_phone)==""){
        echo "none";
        exit;
    }
    $query_login=mysqli_query($link,"SELECT `id_device`,`avatar_url`,`sdt`,`name`,`address` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE (`sdt` = '$user_phone' AND `password` = '$user_password')  LIMIT 1");
    if(mysqli_num_rows($query_login)){
       $row_user=mysqli_fetch_assoc($query_login);
       if(does_url_exists($url_carrot_store.'/app_mygirl/app_my_girl_'.$lang.'_user/'.$row_user['id_device'].'.png')) {
           $row_user["avatar_url"] = $url_carrot_store."/img.php?url=app_mygirl/app_my_girl_".$lang."_user/" . $row_user['id_device'] . ".png&size=60";
           $row_user["avatar"]= $url_carrot_store."/app_mygirl/app_my_girl_".$lang."_user/" . $row_user['id_device'] . ".png";
       }else{
           $row_user["avatar"]= $row_user["avatar_url"];
       }
        $row_user["link"]=$url_carrot_store."/user/".$row_user['id_device']."/".$lang;
       echo json_encode($row_user);
    }else{
        echo "none";
    }
}

if($func=='register_account'){
    $type_act='add';
    $lang=$_POST['lang'];
    $id_device=uniqid().uniqid();
    $user_phone='';
    $user_password='';
    $user_address='';
    $user_email='';
    $user_name='';
    $user_sex='';
    $user_rep_password='';

    if(isset($_POST['user_phone'])) $user_phone=$_POST['user_phone'];
    if(isset($_POST['user_password'])) $user_password=$_POST['user_password'];
    if(isset($_POST['user_address'])) $user_address=$_POST['user_address'];
    if(isset($_POST['user_email'])) $user_email=$_POST['user_email'];
    if(isset($_POST['user_name'])) $user_name=$_POST['user_name'];
    if(isset($_POST['user_sex'])) $user_sex=$_POST['user_sex'];
    if(isset($_POST['user_rep_password'])) $user_rep_password=$_POST['user_rep_password'];
    if(isset($_POST['type_act'])) $type_act=$_POST['type_act'];

    if(trim($user_phone)==''){
        echo 'error_user_phone';
        exit;
    }

    if(trim($user_name)==''||strlen($user_name)<=5){
        echo 'error_user_name';
        exit;
    }

    if(trim($user_email)!=''){
        if (!filter_var($user_email,FILTER_VALIDATE_EMAIL)) {
            echo 'error_user_email';
            exit;
        }
    }

    if($type_act=='add'){
        if(trim($user_password)==''||strlen($user_password)<=6){
            echo 'error_user_password';
            exit;
        }
        
        if(trim($user_rep_password)!=trim($user_password)){
            echo 'error_user_rep_password';
            exit;
        }
    }

    if($type_act=='add'){
        $query_check_account=mysqli_query($link,"SELECT `id_device` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `sdt` = '$user_phone' AND `password` = '$user_password' LIMIT 1");
        if(mysqli_num_rows($query_check_account)>0){
            echo 'error_user_already';
            exit;
        }

        $query_register_account=mysqli_query($link,"INSERT INTO carrotsy_virtuallover.`app_my_girl_user_$lang` (`id_device`, `name`, `sex`, `date_start`, `date_cur`, `address`, `sdt`, `status`, `email`, `avatar_url`, `password`) VALUES ('$id_device', '$user_name', '$user_sex', NOW(), NOW(), '$user_address', '$user_phone', '0', '$user_email', '', '$user_password');");
        if($query_register_account){
            echo 'done';
        }
    }else{
        $id_device=$_POST['id_device'];
        $user_status_share=$_POST['user_status_share'];
        $query_update=mysqli_query($link,"UPDATE carrotsy_virtuallover.`app_my_girl_user_$lang` SET `name`='$user_name',`sex` = '$user_sex',`date_cur`=NOW(),`address`='$user_address',`sdt` = '$user_phone',`status` = '$user_status_share', `email` = '$user_email' WHERE `id_device` = '$id_device' LIMIT 1;");
        if($query_update){
            echo 'done_update';
        }else{
            echo 'done_update_fail';
        }
    }
}

if($func=='get_user_info'){
    $lang=$_POST['lang'];
    $id_device=$_POST['id_device'];
    $query_user=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `id_device` = '$id_device' LIMIT 1");
    $data_user=mysqli_fetch_assoc($query_user);
    if(does_url_exists($url_carrot_store.'/app_mygirl/app_my_girl_'.$lang.'_user/'.$data_user['id_device'].'.png')) {
        $data_user["avatar_url"] = $url_carrot_store."/img.php?url=app_mygirl/app_my_girl_".$lang."_user/" . $data_user['id_device'] . ".png&size=60";
        $data_user["avatar"]= $url_carrot_store."/app_mygirl/app_my_girl_".$lang."_user/" . $data_user['id_device'] . ".png";
    }else{
        $data_user["avatar"]= $data_user["avatar_url"];
    }
     $data_user["link"]=$url_carrot_store."/user/".$data_user['id_device']."/".$lang;
    echo json_encode($data_user);
    exit;
}


if($func=='show_select_lang'){
    $app->list_data=array();
    $query_country=mysqli_query($link,"SELECT a.`id`,a.`name`,a.`key` FROM carrotsy_virtuallover.`app_my_girl_country` as a INNER JOIN carrotsy_createpassword.`country` as b ON b.key = a.key");
    while($item_country=mysqli_fetch_assoc($query_country)){
        $item=new Item();
        $item->id=$item_country['id'];
        $item->name=$item_country['name'];
        $item->key=$item_country['key'];
        $item->url=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/img/'.$item_country['key'].'.png&size=50&trim=1';
        $item->{"icon"}=$url_carrot_store.'/app_mygirl/img/'.$item_country['key'].'.png';
        array_push($app->list_data,$item);
    }
    echo json_encode($app);
}

if($func=='download_lang'){
    $lang_key=$_POST['lang_key'];
    $query_value_lang=mysqli_query($link,"SELECT `value` FROM `value_lang` WHERE `id_country` = '$lang_key' LIMIT 1");
    $data_val=mysqli_fetch_array($query_value_lang);
    $data_display=json_decode($data_val['value']);
    unset($app->link);
    unset($app->list_data);
    $app->{'lang'}=$lang_key;
    foreach($data_display as $k=>$v){
        $app->{$k}=$v;
    }
    echo json_encode($app);
}

if($func=='create_password'){
    $id_device=$_POST['id_device'];
    $tag=$_POST['tag'];
    $password=$_POST['password'];
    $id_create=uniqid().uniqid();
    $username=$_POST['username'];
    $query_add_password=mysqli_query($link,"INSERT INTO `password_$lang` (`id`, `password`, `tag`, `date`,`username`,`id_user`) VALUES ('$id_create', '$password', '$tag', NOW(),'$username','$id_device');");
    if($query_add_password){
        echo "done";
    }else{
        echo mysqli_error($link);
    }
}

if($func=='show_list_passwor_by_account'){
    $id_device=$_POST['id_device'];
    $query_link=mysqli_query($link,"SELECT `id`,`tag`,`password`,`username` FROM `password_$lang` WHERE `id_user` = '$id_device' ");
    $arr_password=array();
    while ($item_passwod=mysqli_fetch_assoc($query_link)){
        $item=new Item();
        $item->id=$item_passwod['id'];
        $item->{'tag'}=$item_passwod['tag'];
        $item->{'pass'}=$item_passwod['password'];
        $item->{'username'}=$item_passwod['username'];
        array_push($arr_password,$item);
    }
    echo json_encode($arr_password);
    exit;
}

if($func=='delete_password_by_account'){
    $id_password=$_POST['id_password'];
    $query_delete=mysqli_query($link,"DELETE FROM `password_$lang` WHERE `id` = '$id_password'");
    exit;
}

if($func=='other_app'){
    $query_list_ads=mysqli_query($link,"SELECT `android`,`id` FROM carrotsy_virtuallover.`app_my_girl_ads` WHERE `android` != '' ORDER BY RAND() LIMIT 10");
    $arr_app=array();
    while($row_ads=mysqli_fetch_assoc($query_list_ads)){
        $item=new Item();
        $item->id=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/obj_ads/icon_'.$row_ads['id'].'.png&size=50&trim=1';
        $item->url=$row_ads['android'].'&hl='.$lang;
        array_push($arr_app,$item);
    }
    echo json_encode($arr_app);
    exit;
}


if($func=='change_password_user'){
    $lang=$_POST['lang'];
    $id_device=$_POST['id_device'];
    $user_password_old=$_POST['user_password_old'];
    $user_password=$_POST['user_password'];
    $user_rep_password=$_POST['user_rep_password'];

    $query_check_password=mysqli_query($link,"SELECT `id_device` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `id_device` = '$id_device' AND `password` = '$user_password_old' LIMIT 1");   
    if(mysqli_num_rows($query_check_password)==0){
        echo 'error_password_old';
        exit;
    }

    if(trim($user_password)==''||strlen($user_password)<=6){
        echo 'error_user_password';
        exit;
    }
    
    if(trim($user_rep_password)!=trim($user_password)){
        echo 'error_user_rep_password';
        exit;
    }

    $query_change_password=mysqli_query($link,"UPDATE carrotsy_virtuallover.`app_my_girl_user_$lang` SET `password` = '$user_password' WHERE `id_device` = '$id_device'");
    if($query_change_password){
        echo "done_update";
        exit;
    }else{
        echo "error";
        exit;
    }
    
}
?>