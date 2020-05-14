<?php
include "config.php";
include "database.php";

Class App{
    public $list;
}

Class Item{
    public $name='';
    public $icon='';
    public $id='';
    public $type='';
}

$func='';
if(isset($_POST['func'])){ $func=$_POST['func'];}
if(isset($_GET['func'])){ $func=$_GET['func'];}

$app=new App();

if($func=='get_list_image'){
    $app->list=Array();
    $limit=$_POST['limit'];
    $query_list_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_effect` ORDER BY RAND() LIMIT $limit");
    while($row_effect=mysqli_fetch_array($query_list_effect)){
        $url_effect=$url.'/app_mygirl/obj_effect/'.$row_effect['id'].'.png';
        array_push($app->list,$url_effect);
    }
}

if($func=='list_ads'){
    $os=$_POST['os'];
    $app->list=array();
    $query_app_more=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_ads` where `$os`!='' LIMIT 50");
    while($row_app=mysqli_fetch_array($query_app_more)){
        $item_ads=new Item();
        $item_ads->icon=$url.'/img.php?url=app_mygirl/obj_ads/icon_'.$row_app['id'].'.png&size=60';
        $item_ads->name=$row_app["name"];
        $item_ads->type=$row_app[$os];
        array_push($app->list,$item_ads);
    }
    echo json_encode($app);
}


echo json_encode($app);
?>