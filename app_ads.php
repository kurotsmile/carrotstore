<?php
include "config.php";
include "database.php";

$func='';

function thumb($urls,$size){
    return URLS."/thumb.php?src=$urls&size=$size";
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

if($func=='list_ads'){
    $os=$_POST['os'];
    if($os=='android'){
        $query_list_ads=mysql_query("SELECT * FROM `app_my_girl_ads` WHERE `android` != ''  ORDER BY RAND() LIMIT 10");
    }else{
        $query_list_ads=mysql_query("SELECT * FROM `app_my_girl_ads` WHERE `ios` != '' ORDER BY RAND() LIMIT 10");
    }
    while($row_ads=mysql_fetch_array($query_list_ads)){
        $item=new Item();
        $item->id=thumb($urls.'/app_mygirl/obj_ads/icon_'.$row_ads['id'].'.png','80');
        $item->name=$row_ads['name'];
        $item->url=$row_ads[$os];
        array_push($app->list,$item);
    }
    echo mysql_error();
    echo json_encode($app);
}

mysql_close($link);