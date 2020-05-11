<?php
include "config.php";
include "database.php";

Class App{
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
$lang_key='';
$os='';

if(isset($_POST['func'])){
    $func=$_POST['func'];
}

if(isset($_POST['os'])){
    $os=$_POST['os']; 
}

if(isset($_POST['lang_key'])){
    $lang_key=$_POST['lang_key'];
}

if($func=='list_country'){
    $query_country=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` as a INNER JOIN carrotsy_bible.`country` as b ON b.key = a.key");
    while($item_country=mysql_fetch_array($query_country)){
        $item=new Item();
        $item->id=$item_country['id'];
        $item->name=$item_country['name'];
        $item->key=$item_country['key'];
        $item->url='https://carrotstore.com/thumb.php?src=https://carrotstore.com/app_mygirl/img/'.$item_country['key'].'.png&size=50&trim=1';
        array_push($app->list_data,$item);
    }
}

if($func=='download_lang'){
    $query_value_lang=mysql_query("SELECT * FROM `lang_value` WHERE `id_country` = '$lang_key' LIMIT 1");
    $data_val=mysql_fetch_array($query_value_lang);
    $data_display=json_decode($data_val['value']);
    foreach($data_display as $k=>$v){
        $app->{$k}=$v;
    }
}


if($func=='load_book'){
    $app->{"list_book1"}=array();
    $app->{"list_book2"}=array();
    $app->{"bk_home_item1"}="";
    
    $quer_p_of_day=mysql_query("SELECT `contain`  FROM `paragraph_$lang_key` ORDER BY RAND() LIMIT 1");
    if(mysql_num_rows($quer_p_of_day)>0){
        $data_p=mysql_fetch_array($quer_p_of_day);
        $app->{"p_of_day"}=$data_p['contain'];
    }else{
        $app->{"p_of_day"}="";
    }
    
    
    $query_bk=mysql_query("SELECT `id` FROM  carrotsy_virtuallover.`app_my_girl_background` WHERE `category` = '1' ORDER BY RAND() LIMIT 1");
    $data_bk=mysql_fetch_array($query_bk);
    $app->{"bk_home_item1"}="https://carrotstore.com/thumb.php?src=https://carrotstore.com/app_mygirl/obj_background/icon_".$data_bk['id'].".png&size=200";
    
    
    $query_list_book_0=mysql_query("SELECT * FROM `book` WHERE `lang` = '$lang_key' AND `type`=0 ORDER BY `orders`");
    while($row_book_0=mysql_fetch_array($query_list_book_0)){
        $item=new Item();
        $item->name=$row_book_0['name'];
        $item->id=$row_book_0['id'];
        $item->{"chapter"}=$row_book_0['chapter'];
        array_push($app->{"list_book1"},$item);
    }
    mysql_free_result($query_list_book_0);
    
    $query_list_book_1=mysql_query("SELECT * FROM `book` WHERE `lang` = '$lang_key' AND `type`=1 ORDER BY `orders` ");
    while($row_book_1=mysql_fetch_array($query_list_book_1)){
        $item=new Item();
        $item->name=$row_book_1['name'];
        $item->id=$row_book_1['id'];
        $item->{"chapter"}=$row_book_1['chapter'];
        array_push($app->{"list_book2"},$item);
    }
    mysql_free_result($query_list_book_1);
}

if($func=='read_book'){

    $id_book=$_POST['id_book'];
    $id_chapter=$_POST['id_chapter'];
    
    $query_list_p=mysql_query("SELECT * FROM `paragraph_$lang_key` WHERE `book_id` = '$id_book' AND `chapter` = '$id_chapter'  ORDER BY `orders`");
    while($row_p=mysql_fetch_array($query_list_p)){
        $item=new Item();
        $item->id=$row_p['id'];
        $item->name=$row_p['contain'];
        $item->{"order"}=$row_p['orders'];
        array_push($app->list_data,$item);
    }
    
    $url_audio_chapter="";
    $url_audio_check="data/chapter_".$lang_key."/".$id_book."_".$id_chapter.".mp3";
    if(file_exists($url_audio_check)){
        $url_audio_chapter=$urls.'/'.$url_audio_check;
    }
    
    $url_image='';
    $query_order_book=mysql_query("SELECT `orders`,`type` FROM `book` WHERE `lang` = '$lang_key' AND `id`='$id_book'  LIMIT 1");
    $data_book=mysql_fetch_array($query_order_book);
    $order_book=$data_book['orders'];
    $type_book=$data_book['type'];
    $query_media=mysql_query("SELECT `id` FROM `media` WHERE `order_chap` = '$id_chapter' AND `order_book` = '".$order_book."' AND `type`='$type_book' LIMIT 1");
    if(mysql_num_rows($query_media)>0){
        $id_media=mysql_fetch_array($query_media);
        $id_media=$id_media['id'];
        $url_image=$urls.'/data/media/'.$id_media.'.png';
    }
    $app->{"audio"}=$url_audio_chapter;
    $app->{"image"}=$url_image;
    $app->{"datass"}=$order_book;
    mysql_free_result($query_list_p);
}

if($func=='search_book'){
    $key_search=$_POST['key_search'];

    $query_list_book=mysql_query("SELECT * FROM `book` WHERE `name` LIKE '%$key_search%' AND `lang` = '$lang_key'");
    while($row_book=mysql_fetch_array($query_list_book)){
        $item=new Item();
        $item->name=$row_book['name'];
        $item->id=$row_book['id'];
        $item->type=$row_book['type'];
        $item->{"chapter"}=$row_book['chapter'];
        array_push($app->list_data,$item);
    }
    mysql_free_result($query_list_book);
    
    $app->{"list_p"}=array();
    $query_list_p=mysql_query("SELECT * FROM `paragraph_$lang_key` WHERE `contain` LIKE '%$key_search%' LIMIT 25");
    while($row_p=mysql_fetch_array($query_list_p)){
        $item=new Item();
        $item->name=$row_p['contain'];
        
        $query_book=mysql_query("SELECT * FROM `book` WHERE `id`='".$row_p['book_id']."'");
        $data_book=mysql_fetch_array($query_book);
        $item->{"id_p"}=$row_p['orders'];
        $item->{"chapter"}=$row_p['chapter'];
        $item->{"num_chapter"}=$data_book["chapter"];
        $item->{"name_book"}=$data_book['name'];
        $item->{"id_book"}=$data_book['id'];
        $item->{"type"}=$data_book['type'];
        array_push($app->{"list_p"},$item);
    }
    mysql_free_result($query_list_p);
}

if($func=='list_ads'){
    if($os=='android'){
        $query_list_ads=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_ads` WHERE `android` != ''  ORDER BY RAND() LIMIT 10");
    }else{
        $query_list_ads=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_ads` WHERE `ios` != '' ORDER BY RAND() LIMIT 10");
    }
    while($row_ads=mysql_fetch_array($query_list_ads)){
        $item=new Item();
        $item->id="https://carrotstore.com/thumb.php?src=https://carrotstore.com/app_mygirl/obj_ads/icon_".$row_ads['id'].".png&size=80";
        $item->name=$row_ads['name'];
        if($os=='window'){
            $item->{"url"}=$row_ads['android'];
        }else{
            $item->{"url"}=$row_ads[$os];
        }
        array_push($app->list_data,$item);
    }
}

if($func=='get_image_bk'){
    $query_bk=mysql_query("SELECT `id` FROM  carrotsy_virtuallover.`app_my_girl_background` WHERE `category` = '1' ORDER BY RAND() LIMIT 1");
    $data_bk=mysql_fetch_array($query_bk);
    $app->{"img"}="https://carrotstore.com/app_mygirl/obj_background/icon_".$data_bk['id'].".png";
}

echo json_encode($app);
mysql_close($link);
?>