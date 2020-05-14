<?php
include "config.php";
include "database.php";

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
$id_user='';

if(isset($_REQUEST['func'])){ $func=$_REQUEST['func'];}
if(isset($_REQUEST['os'])){ $os=$_REQUEST['os'];}
if(isset($_REQUEST['id_device'])){ $id_device=$_REQUEST['id_device'];}
if(isset($_REQUEST['lang'])){ $lang=$_REQUEST['lang'];}
if(isset($_REQUEST['is_user'])){ $id_user=$_REQUEST['is_user'];}

if($func=='list_country'){
    $query_country=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` as a INNER JOIN carrotsy_shortenlinks.`country` as b ON b.key = a.key");
    while($item_country=mysqli_fetch_array($query_country)){
        $item=new Item();
        $item->id=$item_country['id'];
        $item->name=$item_country['name'];
        $item->key=$item_country['key'];
        $item->url='https://carrotstore.com/thumb.php?src=https://carrotstore.com/app_mygirl/img/'.$item_country['key'].'.png&size=50&trim=1';
        array_push($app->list_data,$item);
    }
}

if($func=='download_lang'){
    $lang_key=$_POST['lang_key'];
    $query_value_lang=mysqli_query($link,"SELECT * FROM `value_lang` WHERE `id_country` = '$lang_key' LIMIT 1");
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
    $query_add_link_shorten=mysqli_query($link,"INSERT INTO carrotsy_virtuallover.`link` (`link`, `id_user`, `password`, `status`,`date`,`lang`) VALUES ('$link_web', '$user_id', '', '0',NOW(),'$lang');");
    $new_id_link=mysqli_insert_id($link);
    $app->link=$url_carrot_store.'/link/'.$new_id_link;
    $new_url_link=$url_carrot_store.'/link/'.$new_id_link;
    QRcode::png($new_url_link, '../../phpqrcode/img_link/'.$new_id_link.'.png', 'L', 4, 2);
    $app->{"qr"}=$url_carrot_store.'/phpqrcode/img_link/'.$new_id_link.'.png';
    $app->{'link_detail'}=$url_carrot_store.'/l/'.$new_id_link;
}

if($func=='login'){
    
}

if($func=='list_link'){
    $query_list_link=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`link` WHERE `id_user` = '$is_user'");
    while($data_link=mysqli_fetch_array($query_list_link)){
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