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


if($func=='show_select_lang'){
    $app->list_data=array();
    $query_country=mysqli_query($link,"SELECT a.`id`,a.`name`,a.`key` FROM carrotsy_virtuallover.`app_my_girl_country` as a INNER JOIN carrotsy_saveweboffline.`country` as b ON b.key = a.key");
    while($item_country=mysqli_fetch_assoc($query_country)){
        $item=new Item();
        $item->id=$item_country['id'];
        $item->name=$item_country['name'];
        $item->key=$item_country['key'];
        $item->url=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/img/'.$item_country['key'].'.png&size=50&trim=1';
        $item->{"icon"}=$url_carrot_store.'/app_mygirl/img/'.$item_country['key'].'.png';
        array_push($app->list_data,$item);
    }
    echo mysqli_error($link);
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

if($func=='save_web'){
    $link_web=$_POST['link'];
    $id_device=$_POST['id_device'];
    $c = curl_init($link_web);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    $html = curl_exec($c);
    if (curl_error($c))die(curl_error($c));
    $status = curl_getinfo($c, CURLINFO_HTTP_CODE);
    curl_close($c);
    if(trim($id_device)==''){
        echo $html;
    }else{
        $id_create=uniqid().uniqid();
        $html=mysqli_real_escape_string($link,$html);
        $query_add_web=mysqli_query($link,"INSERT INTO `web_$lang` (`id`, `data`, `url`,`id_user`) VALUES ('$id_create', '$html','$link_web','$id_device');");
        if($query_add_web){
            echo "done";
        }else{
            echo mysqli_error($link);
        }
    }

}

if($func=='show_list_web_by_account'){
    $id_device=$_POST['id_device'];
    $query_link=mysqli_query($link,"SELECT `id`,`data`,`url` FROM `web_$lang` WHERE `id_user` = '$id_device' ");
    $arr_web=array();
    while ($item_web=mysqli_fetch_assoc($query_link)){
        $item=new Item();
        $item->id=$item_web['id'];
        $item->{'url'}=$item_web['url'];
        $item->{'data'}=$item_web['data'];
        array_push($arr_web,$item_web);
    }
    echo json_encode($arr_web);
    exit;
}

if($func=='delete_web_by_account'){
    $id_web=$_POST['id_web'];
    $query_delete=mysqli_query($link,"DELETE FROM `web_$lang` WHERE `id` = '$id_web'");
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
?>