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
    $query_list_lang=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1'");
    
    
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

function get_key_lang_app($key,$lang){
    $value='';
    $data_display=mysql_fetch_array(mysql_query("SELECT `data` FROM `app_my_girl_display_lang` WHERE `lang` = '".$lang."' AND `version` = '0' LIMIT 1"));
    $data_display=(Array)json_decode($data_display['data']);
    if(isset($data_display[$key])){
        $value=$data_display[$key];
    }
    mysql_fetch_array($data_display);
    return $value;
}
function get_key_lang($key,$lang){
    $val='';
    $query_get_value=mysql_query("SELECT `value` FROM `app_my_girl_key_lang` WHERE `key` = '$key' AND `lang` = '$lang' LIMIT 1");
    if(mysql_num_rows($query_get_value)>0){
        $data_val=mysql_fetch_array($query_get_value);
        $val=$data_val[0];
    }else{
        $val=$key;
    }
    mysql_free_result($query_get_value);
    return $val;
}

if($func=="test"){
    echo get_url_voice_mp3('60300','thanh','android','0','1','0','chat','vi');
}

function get_url_voice_mp3($id_chat,$txt_chat,$os,$sex,$character_sex,$effect,$type_chat,$lang_sel){
    $url_mp3='';
    $table_app='';
    if($type_chat=="chat"){
        $table_app='app_mygirl/app_my_girl_'.$lang_sel;
    }else{
        $table_app='app_mygirl/app_my_girl_msg_'.$lang_sel;
    }
    
    if($os=='ios'){
        if($effect!='2'){
            $voice_lang=get_key_lang('voice_character_sex_'.$character_sex,$lang_sel);
            if($voice_lang=='google'){
                $voice_api=get_key_lang_app('url_voice_sex_'.$sex,$lang_sel);
                $url_mp3=str_replace('{text}',$txt_chat,$voice_api);
            }else{
                if (file_exists($table_app.'/'.$id_chat.'.mp3')) {
                    $url_mp3=URL.'/'.$table_app.'/'.$id_chat.'.mp3';
                } 
            }
        }else{
            if (file_exists($table_app.'/'.$id_chat.'.mp3')) {
                $url_mp3=URL.'/'.$table_app.'/'.$id_chat.'.mp3';
            } 
        }
    }else{
        echo 'a';
        if (file_exists($table_app.'/'.$id_chat.'.mp3')) {
            $url_mp3=URL.'/'.$table_app.'/'.$id_chat.'.mp3';
        }else{
                $voice_lang=get_key_lang('voice_character_sex_'.$character_sex,$lang_sel);
                if($voice_lang=='google'){
                    $voice_api=get_key_lang_app('url_voice_sex_'.$sex,$lang_sel);
                    $url_mp3=str_replace('{text}',$txt_chat,$voice_api);
                }else{
                    $url_mp3='';
                }
        }
    }
    return $url_mp3;
}

function geolocationaddress($lat, $long)
{
    $geocode = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&sensor=false&key=AIzaSyCpmUSZHDwPkUn6jzW2rb6SigCCRjMBjZU";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $geocode);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($response);
    $dataarray = get_object_vars($output);
    if ($dataarray['status'] != 'ZERO_RESULTS' && $dataarray['status'] != 'INVALID_REQUEST') {
        if (isset($dataarray['results'][0]->formatted_address)) {

            $address = $dataarray['results'][0]->formatted_address;

        } else {
            $address = 'Not Found';

        }
    } else {
        $address = 'Not Found';
    }

    return $address;
}


if($func=='address'){
    echo geolocationaddress('13.77317','107.5903');
}
