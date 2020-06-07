<?php
include "../config.php";
include "../database.php";
$url_s=$url;
function thumb($urls,$size){
    return URL."/thumb.php?src=$urls&size=$size&trim=1";
}

class Skin_app{
    public $arr_skin=array();
    public $arr_hair=array();
}

class Skin_item{
    public $name='';
    public $icon='';
    public $url='';
    public $url2='';
    public $id_store='';
}


$skin_app=new Skin_app();

$func=$_POST['func'];
$search='';
if(isset($_POST['search'])){
    $search=$_POST['search'];
}

if($func=='load_skin'){
    
    $list_skin=mysqli_query($link,"SELECT * FROM `app_my_girl_skin`");
    if($search!=''){
        $list_skin=mysqli_query($link,"SELECT * FROM `app_my_girl_skin` WHERE `name` LIKE '%$search%'");
    }
    if($list_skin){
        while($row=mysqli_fetch_array($list_skin)){
            $skin_item=new Skin_item();
            $skin_item->name=$row['name'];
            $skin_item->url=$url_s.'/app_mygirl/obj_skin/skin_'.$row[0].'.png';
            $skin_item->icon=thumb('app_mygirl/obj_skin/icon_'.$row[0].'.png','200');
            array_push($skin_app->arr_skin,$skin_item);
        }
    }
    echo json_encode($skin_app);
    exit;
}


if($func=='load_head'){
    $character=$_POST['character'];
    if($search==''){
        $list_head=mysqli_query($link,"SELECT * FROM `app_my_girl_head` WHERE `character`='$character'");
    }else{
        $list_head=mysqli_query($link,"SELECT * FROM `app_my_girl_head` WHERE `character`='$character' AND `name` LIKE '%$search%'");
    }
    if($list_head){
        while($row=mysqli_fetch_array($list_head)){
            $skin_item=new Skin_item();
            $skin_item->name=$row['name'];
            $skin_item->url=$url_s.'/app_mygirl/obj_head/head_'.$row[0].'.png';
            $skin_item->icon=thumb('app_mygirl/obj_head/icon_'.$row[0].'.png','200');
            array_push($skin_app->arr_skin,$skin_item);
        }
    }
    echo json_encode($skin_app);
    exit;
}

if($func=='load_view'){
	$txt_query_search='';
    if($search!=''){
		$txt_query_search=" AND `name` LIKE '%$search%' ";
    }
    $list_view=mysqli_query($link,"SELECT * FROM `app_my_girl_background` WHERE `version`='2' $txt_query_search ORDER BY RAND() LIMIT 15");
    if($list_view){
        while($row=mysqli_fetch_array($list_view)){
            $skin_item=new Skin_item();
            $skin_item->name=$row['name'];
            $skin_item->url=$url_s.'/app_mygirl/obj_background/view_'.$row[0].'.png';
            $skin_item->url2=$url_s.'/app_mygirl/obj_background/place_'.$row[0].'.png';
            $skin_item->icon=thumb('app_mygirl/obj_background/icon_'.$row[0].'.png','200');
            array_push($skin_app->arr_skin,$skin_item);
        }
    }
    echo json_encode($skin_app);
    exit;
}

if($func=='load_music'){
    $lang_sel='vi';
    if(isset($_POST['lang'])){$lang_sel=$_POST['lang'];}
    
    $list_view=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE  `effect`='2' ORDER BY RAND() LIMIT 15");
    if(mysqli_num_rows($list_view)>0){
        while ($row = mysqli_fetch_array($list_view)) {
            $skin_item=new Skin_item();
            $skin_item->name=$row['chat'];
            $skin_item->url=$row['id'];
            $skin_item->url2=$row['color'];
            array_push($skin_app->arr_skin,$skin_item);
        }
    }
    echo json_encode($skin_app);
    mysqli_free_result($list_view);
    exit;
}

if($func=='load_ads'){
    $os=$_REQUEST['os'];
    if($search==''){
        if($os=="android"){
            $list_view=mysqli_query($link,"SELECT * FROM `app_my_girl_ads` WHERE `android`!='' ORDER BY RAND()");
        }else{
           $list_view=mysqli_query($link,"SELECT * FROM `app_my_girl_ads` WHERE `ios`!='' ORDER BY RAND()");
        }
    }else{
        $list_view=mysqli_query($link,"SELECT * FROM `app_my_girl_ads` WHERE `name` LIKE '%$search%' ORDER BY RAND()");
    }

    if($list_view){
        while($row=mysqli_fetch_array($list_view)){
            $skin_item=new Skin_item();
            $skin_item->name=$row['name'];
            $skin_item->url=$row['android'];
            $skin_item->url2=$row['ios'];
            $skin_item->icon=thumb('app_mygirl/obj_ads/icon_'.$row[0].'.png','200');
            array_push($skin_app->arr_skin,$skin_item);
        }
    }
    echo json_encode($skin_app);
    exit;
}

if($func=='list_view_3d'){
    $os='android';
    if(isset($_POST['os'])){
        $os=$_POST['os'];
    }
    $list_view=mysqli_query($link,"SELECT * FROM `app_my_girl_view_3d` ORDER BY RAND()");
    while($row=mysqli_fetch_array($list_view)){
        $skin_item=new Skin_item();
        $skin_item->name=$row['name'];
        if($os=='android'){
            $skin_item->url=$row['android'];
        }else{
            $skin_item->url=$row['ios'];
        }
        $skin_item->url2=$row['is_free'];
        $skin_item->icon=thumb('app_mygirl/obj_view_3d/icon_'.$row[0].'.png','200');
        array_push($skin_app->arr_skin,$skin_item);
    }
    echo json_encode($skin_app);
    mysqli_free_result($list_view);
    exit;
}


if($func=='list_radio'){
    $lang_sel='vi';
    $search_option="0";
    if(isset($_POST['lang'])){$lang_sel=$_POST['lang'];}
    if(isset($_POST['search_option'])){$search_option=$_POST['search_option'];}
    if($search_option=="0"){
        $list_radio=mysqli_query($link,"SELECT * FROM `app_my_girl_radio` WHERE `lang`='$lang_sel' ORDER BY RAND()");
    }else{
        $list_radio=mysqli_query($link,"SELECT * FROM `app_my_girl_radio` ORDER BY RAND() LIMIT 20");
    }
    while($row=mysqli_fetch_array($list_radio)){
        $skin_item=new Skin_item();
        $skin_item->name=$row['name_radio'];
        $skin_item->url=$row['stream'];
        $skin_item->icon=thumb('app_mygirl/obj_radio/icon_'.$row[0].'.png','80');
        array_push($skin_app->arr_skin,$skin_item);
    }
    echo json_encode($skin_app);
    mysqli_free_result($list_radio);
    exit;
}

if($func=='list_unitychan'){
    $list_unitychan=mysqli_query($link,"SELECT * FROM `app_my_girl_unitychan` ORDER BY RAND() LIMIT 20");
    while($row=mysqli_fetch_array($list_unitychan)){
        $skin_item=new Skin_item();
        $skin_item->name=$row['name'];
        $skin_item->url=$row['link'];
        $skin_item->icon=thumb('app_mygirl/obj_unitychan/icon_'.$row[0].'.png','80');
        array_push($skin_app->arr_skin,$skin_item);
    }
    echo json_encode($skin_app);
    mysqli_free_result($list_unitychan);
    exit;
}
?>