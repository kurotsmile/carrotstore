<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With,Accept, X-Access-Token, X-Application-Name, X-Request-Sent-Time');
include "../config.php";
include "../database.php";

$func='';
if(isset($_GET['func']))$func=$_GET['func'];
if(isset($_POST['func']))$func=$_POST['func'];

Class Lang_app{
    public $menu_lang=array();
}

Class Item_lang{
    public $id='';
    public $key='';
    public $name='';
    public $url_icon='';
    public $setting_url_sound_test_sex0='';
    public $setting_url_sound_test_sex1='';
}

$lang_app=new Lang_app();

if($func=="load_menu"){
    $query_list_lang=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
    
    
    while($row_lang=mysql_fetch_array($query_list_lang)){
        $item_lang=new Item_lang();
        $item_lang->id=$row_lang['id'];
        $item_lang->name=$row_lang['name'];
        $item_lang->key=$row_lang['key'];
        $item_lang->url_icon=$url.'/app_mygirl/img/'.$row_lang['key'].'.png'; 
        $data_display=mysql_fetch_array(mysql_query("SELECT `data` FROM `app_my_girl_display_lang` WHERE `lang` = '".$row_lang['key']."' AND `version` = '0' LIMIT 1"));
        $arr_data=(Array)json_decode($data_display['data']);
        $item_lang->setting_url_sound_test_sex0=$arr_data['setting_url_sound_test_sex0'];
        $item_lang->setting_url_sound_test_sex1=$arr_data['setting_url_sound_test_sex1'];
        array_push($lang_app->menu_lang,$item_lang);
    }
    
    echo json_encode($lang_app);
    exit;
}

if($func=="download_lang"){
    $id=1;
    if(isset($_GET['id'])) $id=$_GET['id'];
    if(isset($_POST['id'])) $id=$_POST['id'];
    $query_key=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `id` = '$id'");
    $data_lang=mysql_fetch_array($query_key);
    $key_lang_download=$data_lang['key'];
    $item_lang=new Item_lang();
    $item_lang->id=$data_lang['id'];
    $item_lang->name=$data_lang['name'];
    $item_lang->key=$data_lang['key'];
    $item_lang->url_icon=$url.'/app_mygirl/img/'.$data_lang['key'].'.png'; 
    $lang_app->menu_lang=$item_lang;
    
    $data_display=mysql_fetch_array(mysql_query("SELECT `data` FROM `app_my_girl_display_lang` WHERE `lang` = '".$item_lang->key."' AND `version` = '0' LIMIT 1"));
    $data_display=json_decode($data_display['data']);
    foreach($data_display as $k=>$v){
        $lang_app->menu_lang->{$k}=$v;
    }
    echo json_encode($lang_app->menu_lang);
    exit;
}
