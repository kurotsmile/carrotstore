<?php
include "config.php";
include "database.php";

ini_set('post_max_size', '90M');
ini_set('upload_max_filesize', '90M');
header("Access-Control-Allow-Origin: *");

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
$func=$_POST['function'];
if($func=='logincallback'){
    $user_phone=$_POST['user_phone'];
    $user_password=$_POST['user_password'];
    if($user_phone.trim()==""){
        echo "none";
        exit;
    }
    $query_login=mysqli_query($link,"SELECT `id_device`,`avatar_url`,`sdt`,`name`,`address` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE (`sdt` = '$user_phone' AND `password` = '$user_password')  LIMIT 1");
    if(mysqli_num_rows($query_login)){
       $row_user=mysqli_fetch_assoc($query_login);
       if(does_url_exists('https://carrotstore.com/app_mygirl/app_my_girl_'.$lang.'_user/'.$row_user['id_device'].'.png')) {
           $row_user["avatar_url"] = "https://carrotstore.com/img.php?url=app_mygirl/app_my_girl_".$lang."_user/" . $row_user['id_device'] . ".png&size=60";
           $row_user["avatar"]= "https://carrotstore.com/app_mygirl/app_my_girl_".$lang."_user/" . $row_user['id_device'] . ".png";
       }else{
           $row_user["avatar"]= $row_user["avatar_url"];
       }
        $row_user["link"]="https://carrotstore.com/user/".$row_user['id_device']."/".$lang;
       echo json_encode($row_user);
    }else{
        echo "none";
    }
}


if($func=='show_select_lang'){
    $app->list_data=array();
    $query_country=mysqli_query($link,"SELECT a.`id`,a.`name`,a.`key` FROM carrotsy_virtuallover.`app_my_girl_country` as a INNER JOIN carrotsy_shortenlinks.`country` as b ON b.key = a.key");
    while($item_country=mysqli_fetch_assoc($query_country)){
        $item=new Item();
        $item->id=$item_country['id'];
        $item->name=$item_country['name'];
        $item->key=$item_country['key'];
        $item->url='https://carrotstore.com/thumb.php?src=https://carrotstore.com/app_mygirl/img/'.$item_country['key'].'.png&size=50&trim=1';
        $item->{"icon"}='https://carrotstore.com/app_mygirl/img/'.$item_country['key'].'.png';
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

if($func=='create_link'){
    include "../../phpqrcode/qrlib.php";
    $link_web=$_POST['link'];
    $id_device=$_POST['id_device'];
    $query_add_log=mysqli_query($link,"INSERT INTO `log` (`id_device`, `url`, `date`, `id_user`,`os`,`lang`) VALUES ('$id_device', '$link_web', NOW(), '1','$os','$lang');");
    $query_add_link_shorten=mysqli_query($link,"INSERT INTO carrotsy_virtuallover.`link` (`link`, `id_user`, `password`, `status`,`date`,`lang`) VALUES ('$link_web', '$id_device', '', '0',NOW(),'$lang');");
    $new_id_link=mysqli_insert_id($link);
    $app->link=$url_carrot_store.'/link/'.$new_id_link;
    $new_url_link=$url_carrot_store.'/link/'.$new_id_link;
    QRcode::png($new_url_link, '../../phpqrcode/img_link/'.$new_id_link.'.png', 'L', 4, 2);
    $app->{"qr"}=$url_carrot_store.'/phpqrcode/img_link/'.$new_id_link.'.png';
    $app->{'link_detail'}=$url_carrot_store.'/l/'.$new_id_link;
    echo json_encode($app);
}

if($func=='show_list_link_by_account'){
    $id_device=$_POST['id_device'];
    $query_link=mysqli_query($link,"SELECT `id`,`link` FROM carrotsy_virtuallover.`link` WHERE `id_user` = '$id_device' AND `lang`='$lang' LIMIT 50");
    $arr_link=array();
    while ($item_link=mysqli_fetch_assoc($query_link)){
        $item=new Item();
        $item->id=$item_link['id'];
        $item->url=$item_link['link'];
        $item->{"detail"}="https://carrotstore.com/l/".$item_link['id'];
        $item->{"link"}=$url_carrot_store.'/l/'.$item_link['id'];
        array_push($arr_link,$item);
    }
    echo json_encode($arr_link);
    exit;
}

if($func=='delete_link_by_account'){
    $id_link=$_POST['id_link'];
    $query_delete=mysqli_query($link,"DELETE FROM carrotsy_virtuallover.`link` WHERE `id` = '$id_link'");
    exit;
}

if($func=='other_app'){
    $query_list_ads=mysqli_query($link,"SELECT `android`,`id` FROM carrotsy_virtuallover.`app_my_girl_ads` WHERE `android` != '' ORDER BY RAND() LIMIT 10");
    $arr_app=array();
    while($row_ads=mysqli_fetch_assoc($query_list_ads)){
        $item=new Item();
        $item->id='https://carrotstore.com/thumb.php?src=https://carrotstore.com/app_mygirl/obj_ads/icon_'.$row_ads['id'].'.png&size=50&trim=1';
        $item->url=$row_ads['android'].'&hl='.$lang;
        array_push($arr_app,$item);
    }
    echo json_encode($arr_app);
    exit;
}
?>