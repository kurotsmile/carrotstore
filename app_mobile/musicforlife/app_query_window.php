<?php
include "config.php";


Class App{
    public $list=array();
    public $list_country=array();
}

Class Item{
    public $name='';
    public $icon='';
    public $id='';
    public $type='';
    public $lyrics='';
    public $img_video='';
    public $link_ytb='';
    public $link_store='';
    public $lang='';
}

$app=new App();

$func='';
if(isset($_POST['func'])){
    $func=$_POST['func'];
}


if($func=='list_music'){
    $sel_lang=$_POST['lang_music'];
    $app->list=Array();
    $query_music=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_$sel_lang` WHERE `effect` = '2' ORDER BY rand() LIMIT 20");
    while($row=mysql_fetch_array($query_music)){
        $item_music=new Item();
        $item_music->id=$row['id'];
        $item_music->name=$row['chat'];
        if($row['file_url']!=''){
            $item_music->{"url"} = $row['file_url'];
        }else {
            $item_music->{"url"} = 'https://carrotstore.com/app_mygirl/app_my_girl_' . $row['author'] . '/' . $row['id'] . '.mp3';
        }
        $item_music->{"color"}=$row['color'];
        $item_music->type='0';
        $item_music->link_store='http://carrotstore.com/music/'.$row['id'].'/'.$row['author'];
        $item_music->lang=$row['author'];
        
        $query_lyrics=mysql_query("SELECT `lyrics` FROM carrotsy_virtuallover.`app_my_girl_".$row['author']."_lyrics` WHERE `id_music` = '".$row['id']."' LIMIT 1");
        if(mysql_num_rows($query_lyrics)>0){
            $data_lyrics=mysql_fetch_array($query_lyrics);
            $item_music->lyrics=$data_lyrics[0];
        }else{
            $item_music->lyrics="";
        }
                
        $query_video=mysql_query("SELECT `link` FROM carrotsy_virtuallover.`app_my_girl_video_".$row['author']."` WHERE `id_chat` = '".$row["id"]."' LIMIT 1");
        if(mysql_num_rows($query_video)){
                $data_video=mysql_fetch_array($query_video);
                $item_music->link_ytb=$data_video['link'];
                if($data_video['link']!=''){
                        $my_array_of_vars=null;
                        parse_str( parse_url($data_video['link'], PHP_URL_QUERY ), $my_array_of_vars );
                        $item_music->img_video='https://img.youtube.com/vi/'.$my_array_of_vars['v'].'/hqdefault.jpg'; 
                }
        }else{
            $item_music->img_video="";
            $item_music->link_ytb="";
        }
        array_push($app->list,$item_music);
    }
    
    $query_list_country=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
    while($row_lang=mysql_fetch_array($query_list_country)){
        $country_item=new Item();
        $country_item->id=$row_lang['id'];
        $country_item->name=$row_lang['name'];
        $country_item->{"key"}=$row_lang['key'];
        $country_item->{"type"}='0';
        $country_item->icon='http://carrotstore.com//app_mygirl/img/'.$row_lang['key'].'.png';
        array_push($app->list_country,$country_item);
    }
}

if($func=='list_radio'){
    $sel_lang=$_POST['lang_radio'];
    $app->list=Array();
    $query_radio=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_radio` WHERE `lang` = '$sel_lang' LIMIT 20");
    while($row_radio=mysql_fetch_array($query_radio)){
        $item_radio=new Item();
        $item_radio->id=$row_radio['id'];
        $item_radio->{"url"}=$row_radio['stream'];
        $item_radio->name=$row_radio['name_radio'];
        $item_radio->{"color"}='#C70039';
        $item_radio->type='1';
        $item_radio->{"img_video"}="http://carrotstore.com/thumb.php?src=http://carrotstore.com//app_mygirl/obj_radio/icon_".$item_radio->id.".png&size=50&trim=1";
        array_push($app->list,$item_radio);
    }
    mysql_free_result($query_radio);
    
    $query_list_country=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
    while($row_lang=mysql_fetch_array($query_list_country)){
        $country_item=new Item();
        $country_item->id=$row_lang['id'];
        $country_item->name=$row_lang['name'];
        $country_item->{"key"}=$row_lang['key'];
        $country_item->{"type"}='1';
        $country_item->icon='http://carrotstore.com//app_mygirl/img/'.$row_lang['key'].'.png';
        array_push($app->list_country,$country_item);
    }
}

if($func=='list_sound'){
    $query_sound=mysql_query("SELECT * FROM carrotsy_sheep.`sound` LIMIT 50");
    while($row_sound=mysql_fetch_array($query_sound)){
        $item_sound=new Item();
        $item_sound->id=$row_sound['id'];
        $item_sound->{"url"}='http://sheep.carrotstore.com/music/'.$row_sound['id'].'.mp3';
        $item_sound->name=$row_sound['name'];
        $item_sound->{"color"}='#3498DB';
        $item_sound->type='2';
        $item_sound->{"img_video"}="";
        array_push($app->list,$item_sound);
    }
    mysql_free_result($query_sound);
}


if($func=='list_lang'){
    $app->list=array();
    $query_list_country=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
    while($row_lang=mysql_fetch_array($query_list_country)){
        $country_item=new Item();
        $country_item->id=$row_lang['id'];
        $country_item->name=$row_lang['name'];
        $country_item->{"key"}=$row_lang['key'];
        $country_item->icon='http://carrotstore.com//app_mygirl/img/'.$row_lang['key'].'.png';
        array_push($app->list_country,$country_item);
    }
}

if($func=='download_lang'){
    $lang_sel=$_POST['lang_sel'];
    $query_value_lang=mysql_query("SELECT * FROM carrotsy_music.`key_value` WHERE `lang` = '$lang_sel' LIMIT 1");
    $data_val=mysql_fetch_array($query_value_lang);
    $data_display=json_decode($data_val['data']);
    foreach($data_display as $k=>$v){
        $app->{$k}=$v;
    }
}

if($func=='list_search_key'){
    $sel_lang=$_POST['lang'];
    $app->list=Array();
    $query_list_key=mysql_query("SELECT * FROM carrotsy_music.`log_key` WHERE `lang` = '$sel_lang' ORDER BY RAND() LIMIT 12");
    while($row_key=mysql_fetch_array($query_list_key)){
        $key_item=new Item();
        $key_item->name=$row_key['key'];
        array_push($app->list,$key_item);
    }
}

if($func=='search'){
    $key_search=$_POST['key'];
    $save_key=$_POST['save_key'];
    $app->list=Array();

    if($save_key=='1'){
        $lang_app=$_POST['lang'];
        $query_inster_key=mysql_query("INSERT INTO carrotsy_music.`log_key` (`key`, `lang`,`date`) VALUES ('$key_search', '$lang_app',now())");
    }
    
    $list_country=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `active`='1' AND `ver0` = '1'");
    $txt_query='';
    $txt_query_2='';
    $count_l=mysql_num_rows($list_country);
    $count_index=0;
    while($l=mysql_fetch_array($list_country)){
        $key=$l['key'];
        $txt_query.="(SELECT * FROM carrotsy_virtuallover.`app_my_girl_$key` WHERE  `chat` LIKE '%$key_search%' AND  `effect`='2' AND `disable` = '0' limit 21)";
        $txt_query_2.=" (SELECT * FROM carrotsy_virtuallover.`app_my_girl_$key` WHERE MATCH (`chat`) AGAINST ('$key_search' IN BOOLEAN MODE) AND  `effect`='2' AND `disable` = '0' limit 21)";
        $count_index++;
        if($count_index!=$count_l){
        $txt_query.=" UNION ALL ";
        $txt_query_2.=" UNION ALL ";
        }
    }
    
    $query_music=mysql_query($txt_query);
    
    if(mysql_num_rows($query_music)==0){
        $query_music=mysql_query($txt_query_2);
    }
    
    while($row=mysql_fetch_array($query_music)){
        $item_music=new Item();
        $item_music->id=$row['id'];
        $item_music->name=$row['chat'];
        if($row['file_url']!=''){
            $item_music->{"url"} = $row['file_url'];
        }else {
            $item_music->{"url"} = 'https://carrotstore.com/app_mygirl/app_my_girl_' . $row['author'] . '/' . $row['id'] . '.mp3';
        }
        $item_music->{"color"}=$row['color'];
        $item_music->type='0';
        $item_music->link_store='http://carrotstore.com/music/'.$row['id'].'/'.$row['author'];
        $item_music->lang=$row['author'];
        
        $query_lyrics=mysql_query("SELECT `lyrics` FROM carrotsy_virtuallover.`app_my_girl_".$row['author']."_lyrics` WHERE `id_music` = '".$row['id']."' LIMIT 1");
        if(mysql_num_rows($query_lyrics)>0){
            $data_lyrics=mysql_fetch_array($query_lyrics);
            $item_music->lyrics=$data_lyrics[0];
        }else{
            $item_music->lyrics="";
        }
                
        $query_video=mysql_query("SELECT `link` FROM carrotsy_virtuallover.`app_my_girl_video_".$row['author']."` WHERE `id_chat` = '".$row["id"]."' LIMIT 1");
        if(mysql_num_rows($query_video)){
                $data_video=mysql_fetch_array($query_video);
                $item_music->link_ytb=$data_video['link'];
                if($data_video['link']!=''){
                        $my_array_of_vars=null;
                        parse_str( parse_url($data_video['link'], PHP_URL_QUERY ), $my_array_of_vars );
                        $item_music->img_video='https://img.youtube.com/vi/'.$my_array_of_vars['v'].'/hqdefault.jpg'; 
                }
        }else{
            $item_music->img_video="";
            $item_music->link_ytb="";
        }
        array_push($app->list,$item_music);
    }
}

if($func=='list_ads'){
    $os=$_POST['os'];
    $app->list=array();
    $query_app_more=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_ads` WHERE `$os`!='' LIMIT 50");
    while($row_app=mysql_fetch_array($query_app_more)){
        $item_ads=new Item();
        $item_ads->icon='http://carrotstore.com/img.php?url=app_mygirl/obj_ads/icon_'.$row_app['id'].'.png&size=60';
        $item_ads->name=$row_app["name"];
        $item_ads->type=$row_app[$os];
        array_push($app->list,$item_ads);
    }
    mysql_free_result($query_app_more);
    echo json_encode($app);
}

if($func=='rate_music'){
    $id_music=$_POST['id_music'];
    $lang_music=$_POST['lang_music'];
    $id_device=$_POST['id_device'];
    $sel_rate=$_POST['sel_rate'];
    $query_data_select=mysql_query("SELECT `value` FROM `app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `device_id` = '$id_device' LIMIT 1");
    if(mysql_num_rows($query_data_select)){
        $update_rate=mysql_query("UPDATE `app_my_girl_music_data_$lang_music` SET  `value` = '$sel_rate' WHERE `device_id` = '$id_device'  AND `id_chat` = '$id_music' LIMIT 1;");
    }else{
        $add_rate=mysql_query("INSERT INTO `app_my_girl_music_data_$lang_music` (`device_id`, `value`, `id_chat`) VALUES ('$id_device', '$sel_rate', '$id_music');");
    }
}

if($func=='rate_get'){
    $id_music=$_POST['id_music'];
    $lang_music=$_POST['lang_music'];
    $id_device=$_POST['id_device'];
    $query_data_select=mysql_query("SELECT `value` FROM `app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `device_id` = '$id_device' LIMIT 1");
    $query_data_0=mysql_query("SELECT COUNT(`device_id`) FROM `app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `value` = '0'");
    $query_data_1=mysql_query("SELECT COUNT(`device_id`) FROM `app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `value` = '1'");
    $query_data_2=mysql_query("SELECT COUNT(`device_id`) FROM `app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `value` = '2'");
    $query_data_3=mysql_query("SELECT COUNT(`device_id`) FROM `app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `value` = '3'");
    $arr_data=array();
    if(mysql_num_rows($query_data_0)){
        $data_0=mysql_fetch_array($query_data_0);
        array_push($arr_data,$data_0[0]);
    }else{
        array_push($arr_data,0);
    }
    
    if(mysql_num_rows($query_data_1)){
        $data_1=mysql_fetch_array($query_data_1);
        array_push($arr_data,$data_1[0]);
    }else{
        array_push($arr_data,0);
    }
    
    if(mysql_num_rows($query_data_2)){
        $data_2=mysql_fetch_array($query_data_2);
        array_push($arr_data,$data_2[0]);
    }else{
        array_push($arr_data,0);
    }
    
    if(mysql_num_rows($query_data_3)){
        $data_3=mysql_fetch_array($query_data_3);
        array_push($arr_data,$data_3[0]);
    }else{
        array_push($arr_data,0);
    }
    
    if(mysql_num_rows($query_data_select)){
        $data_select=mysql_fetch_array($query_data_select);
        array_push($arr_data,$data_select['value']);
    }else{
        array_push($arr_data,-1); 
    }
    echo json_encode($arr_data);
    exit;
}

echo json_encode($app);
