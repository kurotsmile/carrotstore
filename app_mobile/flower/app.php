<?php
include "config.php";

class Comment{
    public $avatar='';
    public $username='';
    public $id_device=''; 
    public $data='';   
}

Class App{
    public $data='';
    public $comments=array();
}

class Item{
    public $txt='';
}

$app=new App();

$func='';
$lang='vi';
$id_device='';
$os='android';

if(isset($_POST['func'])){
    $func=$_POST['func'];
}

if(isset($_POST['lang'])){
    $lang=$_POST['lang'];
}

if(isset($_POST['id_device'])){
    $id_device=$_POST['id_device'];
}

if(isset($_POST['os'])){
    $os=$_POST['os'];
}

if($func=='list_lang'){
    $app->data=array();
    $query_country=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` as a INNER JOIN carrotsy_flower.`country` as b ON b.key = a.key");
    while($item_country=mysql_fetch_array($query_country)){
        $item=new Item();
        $item->{"id"}=$item_country['id'];
        $item->{"name"}=$item_country['name'];
        $item->{"key"}=$item_country['key'];
        $item->{"url"}='https://carrotstore.com/thumb.php?src=https://carrotstore.com/app_mygirl/img/'.$item_country['key'].'.png&size=50&trim=1';
        array_push($app->data,$item);
    }
}

if($func=='download_lang'){
    $lang_key=$_POST['lang_key'];
    $query_value_lang=mysql_query("SELECT * FROM `lang_value` WHERE `id_country` = '$lang_key' LIMIT 1");
    $data_val=mysql_fetch_array($query_value_lang);
    $data_display=json_decode($data_val['value']);
    foreach($data_display as $k=>$v){
        $app->{$k}=$v;
    }
    echo json_encode($app);
    exit;
}

if($func=='get_quote'){
    $id_show='';
    if(isset($_POST['id_show'])){
        $id_show=$_POST['id_show'];
    }
    if($id_show==''){
        $mysql_get_flower=mysql_query("SELECT * FROM carrotsy_virtuallover.app_my_girl_$lang WHERE `effect` = '36' AND `disable` = '0' AND `id_redirect`='' ORDER BY RAND() LIMIT 1");
    }else{
        $mysql_get_flower=mysql_query("SELECT * FROM carrotsy_virtuallover.app_my_girl_$lang WHERE `effect` = '36' AND `disable` = '0' AND `id_redirect`='' AND `id`='$id_show' LIMIT 1");
    }
    $data_flower=mysql_fetch_array($mysql_get_flower);
    $item=new Item();
    $item->txt=$data_flower['chat'];
    $item->{"icon"}="https://carrotstore.com//app_mygirl/obj_effect/".$data_flower['effect_customer'].".png";
    $item->{"id"}=$data_flower['id'];
    $app->data=$item;
    
    $query_count_like=mysql_query("SELECT COUNT(*)FROM `flower_action_$lang` WHERE `type` = 'like' AND `id_maxim` = '".$data_flower['id']."'");
    $data_count_like=mysql_fetch_array($query_count_like);
    $app->{'count_like'}=$data_count_like[0];
    mysql_free_result($query_count_like);
    
    $query_count_distlike=mysql_query("SELECT COUNT(*)FROM `flower_action_$lang` WHERE `type` = 'distlike' AND `id_maxim` = '".$data_flower['id']."'");
    $data_count_distlike=mysql_fetch_array($query_count_distlike);
    $app->{'count_distlike'}=$data_count_distlike[0];
    mysql_free_result($query_count_distlike);
    
    $query_count_comment=mysql_query("SELECT COUNT(*)FROM `flower_action_$lang` WHERE `type` = 'comment' AND `id_maxim` = '".$data_flower['id']."'");
    $data_count_comment=mysql_fetch_array($query_count_comment);
    $app->{'count_comment'}=$data_count_comment[0];
    mysql_free_result($query_count_comment);
    
    $query_list_comment=mysql_query("SELECT * FROM `flower_action_$lang` WHERE `type` = 'comment' AND `id_maxim` = '".$data_flower['id']."'");
    while ($row_comment = mysql_fetch_array($query_list_comment)) {
        $query_account=mysql_query("SELECT * FROM  carrotsy_virtuallover.app_my_girl_user_$lang WHERE `id_device` = '".$row_comment['id_device']."'");
        if(mysql_num_rows($query_account)>0){
            $cm=new Comment();
            $cm->id_device=$row_comment['id_device'];
            $data_account=mysql_fetch_array($query_account);
            $cm->id_device=$data_account['id_device'];
            $cm->username=$data_account['name'];
            $cm->avatar="https://carrotstore.com/img.php?url=app_mygirl/app_my_girl_".$lang."_user/".$cm->id_device.".png&size=80";
            $cm->data=$row_comment['data'];
            array_push($app->comments,$cm);
        }
        mysql_free_result($query_account);
        
    }
    mysql_free_result($query_list_comment);
    
    $mysql_add_log=mysql_query("INSERT INTO `log_day` (`id_user`, `msg`, `dates`, `lang`) VALUES ('$id_device', '".$data_flower['id']."', NOW(), '$lang');");
}

if($func=='list_icon'){
    $app->data=array();
    $query_list_icon=mysql_query("SELECT `id` FROM carrotsy_virtuallover.`app_my_girl_effect` ORDER BY RAND() LIMIT 30");
    while($row_icon=mysql_fetch_array($query_list_icon)){
        $item=new Item();
        $item->{"id_icon"}=$row_icon['id'];
        $item->txt="https://carrotstore.com//app_mygirl/obj_effect/".$row_icon['id'].".png";
        array_push($app->data,$item);
    }
}

if($func=="list_music"){
    $app->data=array();
    $query_list_music=mysql_query('SELECT * FROM carrotsy_sheep.sound  ORDER BY RAND()');
    while ($row_music = mysql_fetch_array($query_list_music)) {
        $item_m=new Item();
        $item_m->{"id"}=$row_music['id'];
        $item_m->{"name"}=$row_music['name'];
        $item_m->{"buy"}=$row_music['buy'];
        $item_m->{"url"}='https://sheep.carrotstore.com/music/'.$row_music['id'].'.mp3';
        array_push($app->data,$item_m);
    }
}

if($func=='add_maxim'){
    $maxim_msg=$_POST['msg'];
    $maxim_author=$_POST['author'];
    $query_add_maxim=mysql_query("INSERT INTO `flower` (`msg`, `user_name`,`author`,`active`, `lang`) VALUES ('$maxim_msg', '$id_device', '$maxim_author', '1', '$lang');");
    mysql_free_result($query_add_maxim);
}

if($func=='list_ads'){
    $app->data=array();
    if($os=='android'){
        $query_list_ads=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_ads` WHERE `android` != ''  ORDER BY RAND() LIMIT 10");
    }else{
        $query_list_ads=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_ads` WHERE `ios` != '' ORDER BY RAND() LIMIT 10");
    }
    while($row_ads=mysql_fetch_array($query_list_ads)){
        $item=new Item();
        $item->{"id"}="https://carrotstore.com/thumb.php?src=https://carrotstore.com/app_mygirl/obj_ads/icon_".$row_ads['id'].".png&size=80";
        $item->{"name"}=$row_ads['name'];
        $item->{"url"}=$row_ads[$os];
        array_push($app->data,$item);
    }
}

if($func=='view_account'){
    $id_show=$_POST['id_show'];
    if($id_show==''){
        $query_account=mysql_query("SELECT * FROM  carrotsy_virtuallover.app_my_girl_user_$lang WHERE `id_device` = '$id_device' Limit 1");
    }else{
        $query_account=mysql_query("SELECT * FROM  carrotsy_virtuallover.app_my_girl_user_$lang WHERE `id_device` = '$id_show' Limit 1");
    }
    if(mysql_num_rows($query_account)==0){
        $app->{"type_view"}="add_account";
    }else{
        $app->{"type_view"}="view_account";
        $data_account=mysql_fetch_array($query_account);
        if($id_show==''){
            $app->{"account_avatar"}="https://carrotstore.com/img.php?url=app_mygirl/app_my_girl_".$lang."_user/".$id_device.".png&size=80";
        }else{
            $app->{"account_avatar"}="https://carrotstore.com/img.php?url=app_mygirl/app_my_girl_".$lang."_user/".$id_show.".png&size=80";
        }
        $app->{"account_id"}=$data_account['id_device'];
        $app->{"account_full_name"}=$data_account['name'];
        $app->{"account_addresss"}=$data_account['address'];
        $app->{"account_phone"}=$data_account['sdt'];
        $app->{"account_sex"}=$data_account['sex'];
        $app->{"account_status"}=$data_account['status'];
    }
}

if($func=='add_account'){
    $account_full_name=$_POST['account_full_name'];
    $account_phone=$_POST['account_phone'];
    $account_sex=$_POST['account_sex'];
    $account_address=$_POST['account_address'];
    $query_add_account=mysql_query("INSERT INTO carrotsy_virtuallover.`app_my_girl_user_$lang` (`id_device`, `name`, `sex`, `date_start`, `date_cur`, `address`, `sdt`, `status`) VALUES ('$id_device', '$account_full_name', '$account_sex', now(), now(), '$account_address', '$account_phone', '0');");
    if($query_add_account){
        $app->{"status_add_account"}='success';
    }else{
        $app->{"status_add_account"}='failure';
    }
}

if($func=='update_account'){
    $account_full_name=$_POST['account_full_name'];
    $account_phone=$_POST['account_phone'];
    $account_sex=$_POST['account_sex'];
    $account_address=$_POST['account_address'];
    $account_status=$_POST['account_status'];
    $query_update_account=mysql_query("UPDATE carrotsy_virtuallover.`app_my_girl_user_$lang` SET  `name` = '$account_full_name', `sex` = '$account_sex',  `date_cur` = now(), `address` = '$account_address', `sdt` = '$account_phone', `status` = '$account_status' WHERE `id_device` = '$id_device' LIMIT 1;");
    if($query_update_account){
        $app->{"status_uppdate_account"}='success';
    }else{
        $app->{"status_uppdate_account"}='failure';
    }
}

if($func=='flower_action'){
    $id_maxim=$_POST['id_maxim'];
    $type=$_POST['type'];
    $data='';
    
    if(isset($_POST['data_txt'])){
        $data=$_POST['data_txt'];
    }
    
    if($type=='like'){
        $query_count_like_user=mysql_query("SELECT * FROM `flower_action_$lang` WHERE `type` = 'like' AND `id_maxim` = '".$id_maxim."' AND `id_device` = '".$id_device."'");
        if(mysql_num_rows($query_count_like_user)>0){
            $query_delete_like=mysql_query("DELETE FROM `flower_action_$lang` WHERE `id_device` = '".$id_device."' AND `id_maxim` = '$id_maxim' AND `type` = 'like'");
        }else{
            $query_act_like=mysql_query("INSERT INTO `flower_action_$lang` (`id_device`, `id_maxim`, `type`, `data`,`date`) VALUES ('$id_device', '$id_maxim', '$type', '$data',NOW());");
        }
        mysql_free_result($query_count_like_user);
    }

    if($type=='distlike'){
        $query_count_like_user=mysql_query("SELECT * FROM `flower_action_$lang` WHERE `type` = 'distlike' AND `id_maxim` = '".$id_maxim."' AND `id_device` = '".$id_device."'");
        if(mysql_num_rows($query_count_like_user)>0){
            $query_delete_like=mysql_query("DELETE FROM `flower_action_$lang` WHERE `id_device` = '".$id_device."' AND `id_maxim` = '$id_maxim' AND `type` = 'distlike'");
        }else{
            $query_act_like=mysql_query("INSERT INTO `flower_action_$lang` (`id_device`, `id_maxim`, `type`, `data`,`date`) VALUES ('$id_device', '$id_maxim', '$type', '$data',NOW());");
        }
        mysql_free_result($query_count_like_user);
    }
    
    if($type=='comment'){
        $query_act_comment=mysql_query("INSERT INTO `flower_action_$lang` (`id_device`, `id_maxim`, `type`, `data`,`date`) VALUES ('$id_device', '$id_maxim', '$type', '$data',NOW());");
    }
    
    if($type=='delete_comment'){
        $query_act_delete_comment=mysql_query("DELETE FROM `flower_action_$lang` WHERE `id_device` = '".$id_device."' AND `id_maxim` = '$id_maxim' AND `type` = 'comment'");
    }
    
    echo $id_maxim;
}

if($func=='get_gprs'){

    $location_lat=$_POST['lat'];
    $location_lon=$_POST['lng'];

    
    $place="https://maps.googleapis.com/maps/api/geocode/json?latlng=$location_lat,$location_lon&sensor=true&key=$key_api_google";
        
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $place);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_ENCODING, "");
    $curlData = curl_exec($curl);
    curl_close($curl);
                
    $place = json_decode($curlData);
    $txt_dc=$place->results[0]->formatted_address;
    $txt_address=str_replace('Unnamed Road,','',$txt_dc);
    echo $txt_address;
    exit;
} 

echo json_encode($app);

mysql_close($link_app_flower);