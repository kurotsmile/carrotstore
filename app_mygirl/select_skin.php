<?php
include "../config.php";
class Skin_app{
    public $arr_skin=array();
    public $arr_hair=array();
}

class Skin_item{
    public $name='';
    public $icon='';
    public $url='';
    public $id_store='';
}


$skin_app=new Skin_app();

$func=$_POST['func'];

if($func=='load_skin'){
    $skin_item=new Skin_item();
    $skin_item->name="costume 1";
    $skin_item->url=$url."/app_mygirl/img/skin_1.png";
    $skin_item->icon=$url."/app_mygirl/img/skin_1_icon.png";
    array_push($skin_app->arr_skin,$skin_item);
    
    $skin_item=new Skin_item();
    $skin_item->name="costume 2";
    $skin_item->url=$url."/app_mygirl/img/skin_2.png";
    $skin_item->icon=$url."/app_mygirl/img/skin_2_icon.png";
    $skin_item->id_store=""; //com.kurotsmile.nguoiyeuao.vay2
    array_push($skin_app->arr_skin,$skin_item);

    $skin_item=new Skin_item();
    $skin_item->name="costume 3";
    $skin_item->url=$url."/app_mygirl/img/skin_4.png";
    $skin_item->icon=$url."/app_mygirl/img/skin_4_icon.png";
    $skin_item->id_store=""; //com.kurotsmile.nguoiyeuao.skin_body_1
    array_push($skin_app->arr_skin,$skin_item);
    
    
    $skin_item=new Skin_item();
    $skin_item->name="costume 3";
    $skin_item->url=$url."/app_mygirl/img/skin_6.png";
    $skin_item->icon=$url."/app_mygirl/img/skin_6_icon.png";
    array_push($skin_app->arr_skin,$skin_item);
    
    $skin_item=new Skin_item();
    $skin_item->name="costume 4";
    $skin_item->url=$url."/app_mygirl/img/skin_5.png";
    $skin_item->icon=$url."/app_mygirl/img/skin_5_icon.png";
    array_push($skin_app->arr_skin,$skin_item);
    
    $skin_item=new Skin_item();
    $skin_item->name="costume 5";
    $skin_item->url=$url."/app_mygirl/img/skin_3.png";
    $skin_item->icon=$url."/app_mygirl/img/skin_3_icon.png";
    array_push($skin_app->arr_skin,$skin_item);
    echo json_encode($skin_app);
}


if($func=='load_head'){
    $skin_item=new Skin_item();
    $skin_item->name="head 1";
    $skin_item->url=$url."/app_mygirl/img/skin_hair_1.png";
    $skin_item->icon=$url."/app_mygirl/img/skin_hair_icon_1.png";
    array_push($skin_app->arr_skin,$skin_item);
    
    $skin_item=new Skin_item();
    $skin_item->name="head 2";
    $skin_item->url=$url."/app_mygirl/img/skin_hair_2.png";
    $skin_item->icon=$url."/app_mygirl/img/skin_hair_icon_2.png";
    array_push($skin_app->arr_skin,$skin_item);
    
    $skin_item=new Skin_item();
    $skin_item->name="head 3";
    $skin_item->url=$url."/app_mygirl/img/skin_hair_3.png";
    $skin_item->icon=$url."/app_mygirl/img/skin_hair_icon_3.png";
    array_push($skin_app->arr_skin,$skin_item);
    
    $skin_item=new Skin_item();
    $skin_item->name="head 4";
    $skin_item->url=$url."/app_mygirl/img/skin_hair_4.png";
    $skin_item->icon=$url."/app_mygirl/img/skin_hair_icon_4.png";
    array_push($skin_app->arr_skin,$skin_item);
    
    $skin_item=new Skin_item();
    $skin_item->name="head 5";
    $skin_item->url=$url."/app_mygirl/img/skin_hair_5.png";
    $skin_item->icon=$url."/app_mygirl/img/skin_hair_icon_5.png";
    array_push($skin_app->arr_skin,$skin_item);
    
    echo json_encode($skin_app);
}
?>