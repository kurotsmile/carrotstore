<?php
include "config.php";
Class App_sheep{
    public $list_data=array();
}
class Item{
    public $id;
    public $key;
    public $name;
    public $url;
    public $type;
}

$func=$_POST['func'];
$app_sheep=new App_sheep();
$lang='';
if(isset($_POST['lang'])){
    $lang=$_POST['lang'];
}

if(isset($_POST['key'])){
    $lang=$_POST['key'];
}

if($func=='load_lang'){
    $query_country=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` as a INNER JOIN carrotsy_sheep.`country` as b ON b.key = a.key");
    while($item_country=mysql_fetch_array($query_country)){
        $item=new Item();
        $item->id=$item_country['id'];
        $item->name=$item_country['name'];
        $item->key=$item_country['key'];
        $item->url=$url_homes.'/thumb.php?src='.$url_homes.'/app_mygirl/img/'.$item_country['key'].'.png&size=50&trim=1';
        array_push($app_sheep->list_data,$item);
    }
}

if($func=="download_lang"){
    $lang_key=$_POST['key_lang'];
    $query_value_lang=mysql_query("SELECT * FROM `value_lang` WHERE `id_country` = '$lang_key' LIMIT 1");
    $data_val=mysql_fetch_array($query_value_lang);
    $data_display=json_decode($data_val['value']);
    foreach($data_display as $k=>$v){
        $app_sheep->{$k}=nl2br($v);
    }
}


if($func=="list_music"){
    Class Item_music{
        public $id='';
        public $name='';
        public $url='';
        public $buy='';    
    }
    
    $query_list_music=mysql_query('SELECT * FROM `sound` ORDER BY RAND()');
    while ($row_music = mysql_fetch_array($query_list_music)) {
        $item_m=new Item_music();
        $item_m->id=$row_music['id'];
        $item_m->name=$row_music['name'];
        $item_m->buy=$row_music['buy'];
        $item_m->url=$urls.'/music/'.$row_music['id'].'.mp3';
        array_push($app_sheep->list_data,$item_m);
    }
    echo json_encode($app_sheep);
    exit;
}

if($func=="get_good_night"){
    Class Good_night{
        public $id_user;
        public $name_user;
        public $msg;
        public $date;
        public $avatar_user;
    }
    
    $lang=$_POST['lang'];
    
    $query_good_night=mysql_query("SELECT * FROM `good_night` WHERE `lang`='$lang' order by Rand() LIMIT 1");
    $data_good_night=mysql_fetch_array($query_good_night);
    $good_night=new Good_night();
    $good_night->msg=$data_good_night["msg"];
    if($data_good_night["user_type"]=='0'){
        $good_night->name_user=$data_good_night["user_name"];
        $good_night->avatar_user="";
        $good_night->id_user="";
    }else{
        $id_good_night_user=$data_good_night["user_name"];
        $query_get_user=mysql_query("SELECT * FROM carrotsy_virtuallover.app_my_girl_user_$lang WHERE `id_device` = '$id_good_night_user' LIMIT 1");
        $arr_data_user=mysql_fetch_array($query_get_user);
        $good_night->name_user=$arr_data_user['name'];
        $good_night->avatar_user="https://carrotstore.com/img.php?url=app_mygirl/app_my_girl_".$lang."_user/$id_good_night_user.png&size=50";
        $good_night->id_user=$id_good_night_user;
        mysql_free_result($query_get_user);
    }
    $good_night->date=$data_good_night["date"];
    mysql_freeresult($query_good_night);
    echo json_encode($good_night);
    exit;
}

if($func=="send_good_night"){
    $user_name=$_POST['user_name'];
    $lang=$_POST['lang'];
    $msg=$_POST['msg'];
    $user_type=$_POST['user_type'];
    $add_good_night=mysql_query("INSERT INTO `good_night` (`msg`, `lang`, `user_type`, `user_name`, `date`,`active`) VALUES ('$msg', '$lang', '$user_type', '$user_name',NOW(),'0');");
    mysql_freeresult($add_good_night);
    echo "Send success!";
    exit;
}

if($func=='get_user'){
    class Item_info{
        public $icon='';
        public $value='';
        public $label='';
        public $type='';
        public $lang_value='0';
    }
    
    Class Account{
        public $name='';
        public $avatar='';
        public $arr_item_info=array();
        public $status='';
        public $ready='';
        public $phone='';
        public $sex='';
    }

    $id_device=$_POST['id_device'];
    
    $query_get_user=mysql_query("SELECT * FROM carrotsy_virtuallover.app_my_girl_user_$lang WHERE `id_device` = '$id_device' LIMIT 1");
    
    $account=new Account();
    
    if(mysql_num_rows($query_get_user)>0){
        $arr_user=mysql_fetch_array($query_get_user);
        $account->name=$arr_user['name'];
        $account->avatar="https://carrotstore.com/img.php?url=app_mygirl/app_my_girl_".$lang."_user/$id_device.png&size=80";
        $account->phone=$arr_user['sdt'];
        $account->sex=$arr_user['sex'];
        
        $item_info=new Item_info();
        $item_info->icon='https://sheep.carrotstore.com/image/address.png';
        $item_info->value=$arr_user['address'];
        $item_info->label='address';
        array_push($account->arr_item_info,$item_info);
        
        $item_info=new Item_info();
        $item_info->label='sex';
        if($arr_user['sex']=='0'){
            $item_info->icon='https://sheep.carrotstore.com/image/sex_boy.png';
            $item_info->value='sex_boy';
        }else{
            $item_info->icon='https://sheep.carrotstore.com/image/sex_girl.png';
            $item_info->value='sex_girl';
        }
        $item_info->lang_value='1';
        array_push($account->arr_item_info,$item_info);
        
        $item_info=new Item_info();
        $item_info->icon='https://sheep.carrotstore.com/image/phone_number.png';
        $item_info->value=$arr_user['sdt'];
        $item_info->label='phone_number';
        array_push($account->arr_item_info,$item_info);
        
        $item_info=new Item_info();
        $item_info->icon='https://sheep.carrotstore.com/image/account_status.png';
        if($arr_user['status']=='0'){
            $item_info->value='account_status_1';
        }else{
            $item_info->value='account_status_2';
        }
        $item_info->label='account_status';
        $item_info->lang_value='1';
        array_push($account->arr_item_info,$item_info);
        
        //?ng d?ng d?m c?u
        $query_app_sheep=mysql_query("SELECT * FROM scores WHERE `id_user` = '$id_device' AND `lang`='$lang' LIMIT 1");
        if(mysql_num_rows($query_app_sheep)>0){
            $data_app_sheep=mysql_fetch_array($query_app_sheep);
            $item_info=new Item_info();
            $item_info->icon='https://contact.carrotstore.com/image/sheep.png';
            $item_info->label='scores';
            $item_info->value='Counting sheep - go to bed (scores:'.$data_app_sheep['scores'].')';
            array_push($account->arr_item_info,$item_info);
        }
        mysql_free_result($query_app_sheep);
        
        //Hi?n các tru?ng b? sung
        //Ki?m tra t?n t?i
        $query_check_field=mysql_query("SELECT * FROM carrotsy_contacts.user_field_data WHERE `id_device` = '$id_device' LIMIT 1");
        if(mysql_num_rows($query_check_field)>0){
            $data_user=mysql_fetch_array($query_check_field);
            $data_field=json_decode($data_user['data']);
            foreach($data_field as $i_key=>$i_val){
                $query_get_field=mysql_query("SELECT * FROM carrotsy_contacts.field_contacts WHERE `name`='$i_key' LIMIT 1");
                if(mysql_num_rows($query_get_field)>0){
                    $data_item_field=mysql_fetch_array($query_get_field);
                    $item_info=new Item_info();
                    $item_info->icon='https://contact.carrotstore.com/field_icon/'.$data_item_field['id'].'.png';
                    $item_info->label=$i_key;
                    $item_info->value=$i_val;
                    if($data_item_field['link']!=''){
                        $item_info->link=$data_item_field['link'].''.$i_val;
                    }
                    array_push($account->arr_item_info,$item_info);
                }
                mysql_free_result($query_get_field);
            }
        }
        /*
        $item_info=new Item_info();
        $item_info->icon='https://sheep.carrotstore.com/image/iconcarrot.png';
        $item_info->value='account_carrot';
        $item_info->label='account_carrot';
        $item_info->lang_value='1';
        $item_info->link="https://carrotstore.com/user/$id_device/$lang";
        array_push($account->arr_item_info,$item_info);
        */
        
        
        $account->ready='1';
    }else{
        $account->ready='0';
    }

    mysql_free_result($query_get_user);
    echo json_encode($account);
    exit;
}

if($func=='edit_and_create_user'){
    Class Alert{
        public $msg='';
        public $type='';
    }
    
    $id_device=$_POST['id_device'];
    $lang=$_POST['lang'];
    $user_name=$_POST['username'];
    $phone=$_POST['phone'];
    $sex=$_POST['sex'];
    $error=0;
    
    $alert=new Alert();
    if($user_name==''|| strlen($user_name)<=4){
        $alert->msg='error_name';
        $alert->type='0';
        $error=1;
    }
    
    if($error==0){
        if($phone==''|| strlen($phone)<=6){
            $alert->msg='error_phone';
            $alert->type='0';
            $error=1;
        }
    }
    
    if($error==0){
        $query_get_user=mysql_query("SELECT * FROM carrotsy_virtuallover.app_my_girl_user_$lang WHERE `id_device` = '$id_device' LIMIT 1");
        if(mysql_num_rows($query_get_user)>0){
            $query_update_user=mysql_query("UPDATE carrotsy_virtuallover.app_my_girl_user_$lang SET `name` = '$user_name',`sdt` = '$phone',`sex`='$sex' WHERE `id_device` = '$id_device'");
            $alert->msg='account_update_success';
            $alert->type='1';
            mysql_free_result($query_update_user);
        }else{
            $query_add_user=mysql_query("INSERT INTO carrotsy_virtuallover.app_my_girl_user_$lang (`id_device`, `name`,`sdt`,`status`,`sex`,`date_start`,`date_cur`,`address`) VALUES ('$id_device', '$user_name', '$phone', '0','$sex',NOW(),NOW(),'');");
            $alert->msg='account_add_success';
            $alert->type='1';
            mysql_free_result($query_add_user);
        }
        mysql_free_result($query_get_user);
    }
    echo json_encode($alert);
    exit;
}

if($func=='list_top_player'){    
    Class Item_player{
        public $id_user;
        public $name_user;
        public $scores;
        public $index;
        public $avatar_user;
    }
    
    Class List_top{
        public $arr_top_player=array();
    }
    
    $list_top=new List_top();
    $type_view=$_POST['type'];
    
    if($type_view=='1'){
        $query_get_list_top_player=mysql_query("SELECT * FROM `scores2` WHERE `lang`='$lang' ORDER BY `scores` DESC LIMIT 20");
    }else{
        $query_get_list_top_player=mysql_query("SELECT * FROM `scores` WHERE `lang`='$lang' ORDER BY `scores` DESC LIMIT 20");
    }
    $index=0;
    while ($row_player = mysql_fetch_array($query_get_list_top_player)) {
        $item_player=new Item_player();
        $item_player->id_user=$row_player['id_user'];
        $item_player->scores=$row_player['scores'];
        
        $id_user=$row_player['id_user'];
        $query_get_user=mysql_query("SELECT * FROM carrotsy_virtuallover.app_my_girl_user_$lang WHERE `id_device` = '$id_user' LIMIT 1");
        if(mysql_num_rows($query_get_user)){
            $arr_data_user=mysql_fetch_array($query_get_user);
            $item_player->name_user=$arr_data_user['name'];
            //$item_player->avatar_user="http://carrotstore.com/app_mygirl/app_my_girl_".$lang."_user/$id_user.png";
            $item_player->avatar_user="https://carrotstore.com/img.php?url=app_mygirl/app_my_girl_".$lang."_user/$id_user.png&size=50";
            $index++;
            $item_player->index=$index;
            array_push($list_top->arr_top_player,$item_player);
        }
        
        
        mysql_free_result($query_get_user);
    }
    mysql_free_result($query_get_list_top_player);
    echo json_encode($list_top);
    exit;
}

if($func=='update_scores'){
    $lang=$_POST['lang'];
    $id_device=$_POST['id_device'];
    $new_scores=$_POST['new_scores'];
    
    $check_scores=mysql_query("SELECT * FROM `scores` WHERE `id_user` = '$id_device' AND `lang`='$lang' LIMIT 1");
    if(mysql_num_rows($check_scores)>0){
        $update_scores=mysql_query("UPDATE `scores` SET `scores` = '$new_scores' WHERE `id_user` = '$id_device' AND `lang` = '$lang' ");
        mysql_free_result($update_scores);
    }else{
        $add_scores=mysql_query("INSERT INTO `scores` (`id_user`, `scores`, `lang`) VALUES ('$id_device', '$new_scores', '$lang');");
        mysql_free_result($add_scores);
    }
    mysql_free_result($check_scores);
    exit;
}

if($func=='update_scores2'){
    $lang=$_POST['lang'];
    $id_device=$_POST['id_device'];
    $new_scores=$_POST['new_scores'];
    
    $check_scores=mysql_query("SELECT * FROM `scores2` WHERE `id_user` = '$id_device' AND `lang`='$lang' LIMIT 1");
    if(mysql_num_rows($check_scores)>0){
        $update_scores=mysql_query("UPDATE `scores2` SET `scores` = '$new_scores' WHERE `id_user` = '$id_device' AND `lang` = '$lang' ");
        mysql_free_result($update_scores);
    }else{
        $add_scores=mysql_query("INSERT INTO `scores2` (`id_user`, `scores`, `lang`) VALUES ('$id_device', '$new_scores', '$lang');");
        mysql_free_result($add_scores);
    }
    mysql_free_result($check_scores);
    exit;
}

if($func=='get_list_app'){
    $os=$_POST['os'];
    
    if($os=='android'){
        $query_list_ads=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_ads` WHERE `android` != ''  ORDER BY RAND() LIMIT 10");
    }else{
        $query_list_ads=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_ads` WHERE `ios` != '' ORDER BY RAND() LIMIT 10");
    }
    while($row_ads=mysql_fetch_array($query_list_ads)){
        $item=new Item();
        $item->{"icon"}="https://carrotstore.com/thumb.php?src=https://carrotstore.com/app_mygirl/obj_ads/icon_".$row_ads['id'].".png&size=80";
        $item->name=$row_ads['name'];
        $item->{"url"}=$row_ads[$os];
        array_push($app_sheep->list_data,$item);
    }
}


echo json_encode($app_sheep);
mysql_close($link_app_sheep);
?>