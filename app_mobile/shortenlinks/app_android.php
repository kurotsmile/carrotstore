<?php
include "config.php";
include "database.php";

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
    public $link;
    public $list_data=array();
}

class Item{
    public $id;
    public $key;
    public $name;
    public $url;
    public $type;
}

$app=new App();

$func='';
$os='';
$id_device='';
$lang='';

if(isset($_REQUEST['func'])){ $func=$_REQUEST['func'];}
if(isset($_REQUEST['os'])){ $os=$_REQUEST['os'];}
if(isset($_REQUEST['id_device'])){ $id_device=$_REQUEST['id_device'];}
if(isset($_REQUEST['lang'])){ $lang=$_REQUEST['lang'];}

if($func=='list_country'){
    $query_country=mysqli_query($link,"SELECT a.`id`,a.`name`,a.`key` FROM carrotsy_virtuallover.`app_my_girl_country` as a INNER JOIN carrotsy_shortenlinks.`country` as b ON b.key = a.key");
    while($item_country=mysqli_fetch_array($query_country)){
        $item=new Item();
        $item->id=$item_country['id'];
        $item->name=$item_country['name'];
        $item->key=$item_country['key'];
        $item->url=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/img/'.$item_country['key'].'.png&size=50&trim=1';
        array_push($app->list_data,$item);
    }
}

if($func=='download_lang'){
    $lang_key=$_POST['lang_key'];
    $query_value_lang=mysqli_query($link,"SELECT `value` FROM `value_lang` WHERE `id_country` = '$lang_key' LIMIT 1");
    $data_val=mysqli_fetch_array($query_value_lang);
    $data_display=json_decode($data_val['value']);
    unset($app->link);
    unset($app->list_data);
    foreach($data_display as $k=>$v){
        $app->{$k}=$v;
    }
}

if($func=='create_link'){
    include "../../phpqrcode/qrlib.php";
    $link_web=$_POST['link'];
    $query_add_log=mysqli_query($link,"INSERT INTO `log` (`id_device`, `url`, `date`, `id_user`,`os`,`lang`) VALUES ('$id_device', '$link_web', NOW(), '1','$os','$lang');");
    $user_id=$id_device;

    $new_id_link=uniqid();
    $query_add_link_shorten=mysqli_query($link,"INSERT INTO `link_$lang`  (`id`,`link`, `id_user`, `password`, `status`,`date`) VALUES ('$new_id_link','$link_web', '$id_device', '', '0',NOW());");

    $app->link=$url_carrot_store.'/link/'.$new_id_link;
    $new_url_link=$url_carrot_store.'/link/'.$new_id_link;
    QRcode::png($new_url_link, '../../phpqrcode/img_link/'.$new_id_link.'.png', 'L', 4, 2);
    $app->{"qr"}=$url_carrot_store.'/phpqrcode/img_link/'.$new_id_link.'.png';
    $app->{'link_detail'}=$url_carrot_store.'/l/'.$new_id_link;
}

if($func=='check_login') {
    $user_phone = $_POST['user_phone'];
    $query_user_login=mysqli_query($link,"SELECT `name`,`sdt`,`address`,`sex`,`email`,`status`,`avatar_url`,`date_start`,`id_device`,`password` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `sdt`='$user_phone' AND `password`!='' ");

    if(mysqli_num_rows($query_user_login)){
        $arr_user=array();
        while($row_user=mysqli_fetch_assoc($query_user_login)){
            if(does_url_exists($url_carrot_store.'/app_mygirl/app_my_girl_'.$lang.'_user/'.$row_user['id_device'].'.png')) {
                $row_user["avatar_url"] = $url_carrot_store."/img.php?url=app_mygirl/app_my_girl_".$lang."_user/" . $row_user['id_device'] . ".png&size=60";
            }
            array_push($arr_user,$row_user);
        }
        echo json_encode($arr_user);
    }else{
        echo "none";
    }
    exit;
}

if($func=='update_account') {
    $user_phone=$_POST['user_phone'];
    $user_pass=$_POST['user_password'];
    $account_name=$_POST['name'];
    $account_sex=$_POST['sex'];
    $account_sdt=$_POST['sdt'];
    $account_address=$_POST['address'];
    $account_status=$_POST['status'];
    $account_email=$_POST['email'];
    $txt_error='';

    if(trim($account_name)==""||strlen($account_name)<5){
        $txt_error="account_error_name";
    }

    if(trim($account_email)!=""&&$txt_error==''){
        if (!filter_var($account_email, FILTER_VALIDATE_EMAIL)) {
            $txt_error="account_error_email";
        }
    }

    if($txt_error==''){
        $query_update_user = mysqli_query($link,"UPDATE carrotsy_virtuallover.app_my_girl_user_$lang SET `name` = '$account_name',`sdt` = '$account_sdt',`sex`='$account_sex',`status`='$account_status',`address`='$account_address' WHERE `sdt` = '$user_phone' AND `password`='$user_pass' LIMIT 1");
        unset($_POST['os']);
        unset($_POST['func']);
        unset($_POST['user_password']);
        unset($_POST['user_phone']);
        unset($_POST['lang']);
        $_POST['password'] = $user_pass;
        $app->{"error"}="";
        $app->{"data"} = json_encode($_POST);
    }else{
        $app->{"error"}=$txt_error;
    }
    echo json_encode($app);
    exit;
}

if($func=='add_account') {
    $id_device=uniqid().uniqid();
    $user_phone=$_POST['user_phone'];
    $user_pass=$_POST['user_password'];
    $account_name=$_POST['name'];
    $account_sex=$_POST['sex'];
    $account_address=$_POST['address'];
    $account_status=$_POST['status'];
    $account_email=$_POST['email'];
    if(trim($account_name)==""||strlen($account_name)<5){
        $app->{"error"}="account_error_name";
    }else {
        $query_add_user = mysqli_query($link,"INSERT INTO carrotsy_virtuallover.app_my_girl_user_$lang (`id_device`, `name`,`sdt`,`status`,`sex`,`date_start`,`date_cur`,`address`,`password`) VALUES ('" . $id_device . "', '$account_name', '$user_phone', '$account_status','$account_sex',NOW(),NOW(),'$account_address','$user_pass');");
        if (mysqli_error($link) != '') {
            $app->{"error"} = mysqli_error($link);
        } else {
            unset($_POST['os']);
            unset($_POST['func']);
            unset($_POST['user_password']);
            unset($_POST['user_phone']);
            unset($_POST['lang']);
            $_POST['password'] = $user_pass;
            $_POST['sdt'] = $user_phone;

            $app->{"error"}="";
            $app->{"user_id"} = $id_device;
            $app->{"data"} = json_encode($_POST);
        }
    }
    echo json_encode($app);
    exit;
}

if($func=='change_password') {
    $user_phone=$_POST['user_phone'];
    $user_pass=$_POST['user_password'];
    $new_password=$_POST['new_password'];
    $query_change_password = mysqli_query($link,"UPDATE carrotsy_virtuallover.app_my_girl_user_$lang SET `password`='$new_password' WHERE `sdt` = '$user_phone' AND `password`='$user_pass' LIMIT 1");
    if($query_change_password){
        echo '1';
    }else{
        echo '0';
    }
    exit;
}

if($func=='list_link'){
    $query_list_link=mysqli_query($link,"SELECT `id`,`link`,`view` FROM `link_$lang` WHERE `id_user` = '$id_device' ORDER BY `date` DESC");
    while($data_link=mysqli_fetch_assoc($query_list_link)){
        $item=new Item();
        $item->id=$data_link['id'];
        $item->key=$data_link['view'];
        $item->url=$data_link['link'];
        $item->name=$url_carrot_store.'/l/'.$data_link['id'];
        $item->{"link"}=$url_carrot_store.'/link/'.$data_link['id'];
        array_push($app->list_data,$item);
    }
}


if($func=='delete_link'){
    $id_delete=$_REQUEST['id_delete'];
    $query_delete_link=mysqli_query($link,"DELETE FROM carrotsy_virtuallover.`link` WHERE `id` = '$id_delete';");
}

echo json_encode($app);