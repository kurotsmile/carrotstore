<?php
include "config.php";
include "database.php";

$func='';


function get_key_lang($link,$key,$lang){
    $val='';
    $query_get_value=mysqli_query($link,"SELECT `value` FROM `app_my_girl_key_lang` WHERE `key` = '$key' AND `lang` = '$lang' LIMIT 1");
    if(mysqli_num_rows($query_get_value)>0){
        $data_val=mysqli_fetch_array($query_get_value);
        $val=$data_val[0];
    }else{
        $val=$key;
    }
    mysqli_free_result($query_get_value);
    return $val;
}

function thumb($urls,$size){
    return URL."/thumb.php?src=$urls&size=$size";
}

Class Item{
    public $name='';
    public $url='';
    public $desc='';
    public $id=''; 
    public $url_list=''; 
}

Class App{
    public $list=array();
}

if(isset($_GET['func'])){
    $func=$_GET['func'];
}

if(isset($_POST['func'])){
    $func=$_POST['func'];
}

$app=new App();

if($func=='list_category'){
    $query_list_category=mysqli_query($link,"SELECT * FROM `app_my_girl_bk_category` ORDER BY RAND()");
    while($row_category=mysqli_fetch_array($query_list_category)){
        $item=new Item();
        $item->id=$row_category['id'];
        $item->name=get_key_lang($link,$row_category['name'],'en');
        $query_bk_in_cat=mysqli_query($link,"SELECT `id` FROM `app_my_girl_background` WHERE `category` = '".$row_category['id']."' AND `version` = '1' ORDER BY  RAND() LIMIT 3");
        $arr_url=array();
        while($row_bk=mysqli_fetch_array($query_bk_in_cat)){
            $url_bk=thumb($url.'/app_mygirl/obj_background/icon_'.$row_bk['id'].'.png','160x80');
            array_push($arr_url,$url_bk);
            $item->url_list.=$url.'/app_mygirl/obj_background/icon_'.$row_bk['id'].'.png;';
        }
        mysqli_free_result($query_bk_in_cat);
        $item->url=$arr_url;
        $query_count_cat=mysqli_query($link,"SELECT `id` FROM `app_my_girl_background` WHERE `category` = '".$row_category['id']."' AND `version` = '1' ");
        $item->desc=mysqli_num_rows($query_count_cat).' Background images and games in this category';
        array_push($app->list,$item);
    }
    
    echo json_encode($app);
}


if($func=='get_background'){
    $cat_id=$_POST['id_cat'];
    $query_bk_in_cat=mysqli_query($link,"SELECT `id` FROM `app_my_girl_background` WHERE `category` = '".$cat_id."' AND `version` = '1' ORDER BY  RAND() LIMIT 1");
    $item=new Item();
    $data_bk=mysqli_fetch_array($query_bk_in_cat);
    $item->url=$url.'/app_mygirl/obj_background/icon_'.$data_bk['id'].'.png';
    echo json_encode($item);
}

if($func=='list_ads'){
    $os=$_POST['os'];
    $query_list_ads=mysqli_query($link,"SELECT * FROM `app_my_girl_ads` WHERE `$os` != ''  ORDER BY RAND() LIMIT 10");
    while($row_ads=mysqli_fetch_array($query_list_ads)){
        $item=new Item();
        $item->id=thumb($url.'/app_mygirl/obj_ads/icon_'.$row_ads['id'].'.png','80');
        $item->name=$row_ads['name'];
        $item->url=$row_ads[$os];
        array_push($app->list,$item);
    }
    echo mysqli_error($link);
    echo json_encode($app);
}

if($func=='search'){
    $key_search=$_POST['key_search'];
    $query_list_search=mysqli_query($link,"SELECT * FROM `app_my_girl_background` WHERE `name` LIKE '%$key_search%' AND `version` = '1' ORDER BY  RAND() LIMIT 30");
    while($row_bk=mysqli_fetch_array($query_list_search)){
        $item=new Item();
        $item->id=$url.'/app_mygirl/obj_background/icon_'.$row_bk['id'].'.png';
        $item->name=$row_bk['name'];
        $item->url=thumb($url.'/app_mygirl/obj_background/icon_'.$row_bk['id'].'.png','60');
        array_push($app->list,$item);
    }
    
    echo json_encode($app);
}

mysqli_close($link);