<?php
include "config.php";
include "data.php";

$func=$_REQUEST['func'];

if($func=='list_country'){
   echo json_encode($app);
}


if($func=='list_music_home'){
    $lang_app='';
    $sel_lang=$_REQUEST['sel_lang'];
    $sel_func=$_REQUEST['func_app'];
    $key_search='';
    $os=$_REQUEST['os'];
    if(isset($_REQUEST['lang'])){
        $lang_app=$_REQUEST['lang'];
    }
    
    if(isset($_REQUEST['key_search'])){
        $key_search=$_REQUEST['key_search'];
        $query_inster_key=mysql_query("INSERT INTO carrotsy_music.`log_key` (`key`, `lang`,`date`) VALUES ('$key_search', '$lang_app',now())");
    }
    
    if($sel_func=='0'){
        $query_music=null;
        if($key_search==''){
            $query_music=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_$sel_lang` WHERE `effect` = '2' ORDER BY rand() LIMIT 20");
        }else{
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
        }
        
        $rate='';
        if(isset($_REQUEST['rate'])){$rate=$_REQUEST['rate'];}
        
        if($rate!=''){
            if($rate=='4'){
                $query_music=mysql_query("SELECT `chat`.*,COUNT(`top_music`.`id_chat`)  as c  FROM `app_my_girl_music_data_$sel_lang` as `top_music` left JOIN   `app_my_girl_$sel_lang` as `chat`  on `chat`.`id`=`top_music`.`id_chat` WHERE `chat`.`effect` = '2' GROUP BY `top_music`.`id_chat` HAVING COUNT(`top_music`.`id_chat`) >= 1 ORDER BY c DESC LIMIT 40");
            }else{
                $txt_query_view=" AND `top_music`.`value`='$rate' ";
                $query_music=mysql_query("SELECT DISTINCT `chat`.* FROM `app_my_girl_music_data_$sel_lang` as `top_music` left JOIN   `app_my_girl_$sel_lang` as `chat`  on `chat`.`id`=`top_music`.`id_chat` WHERE `chat`.`effect` = '2'  $txt_query_view LIMIT 40");
            }
        }
        
        while($row_music=mysql_fetch_array($query_music)){
            $song=new Song();
            $song->id=$row_music['id'];
            if($row_music['file_url']!=''){
                $song->url = $row_music['file_url'];
            }else {
                $song->url = 'http://carrotstore.com/app_mygirl/app_my_girl_'.$row_music['author'].'/'.$row_music['id'].'.mp3';
            }
            $song->name=$row_music['chat'];
            $song->color=$row_music['color'];
            $song->type='0';
            $song->lang=$row_music['author'];
            if($os!="ios"){
                $query_lyrics=mysql_query("SELECT `lyrics` FROM carrotsy_virtuallover.`app_my_girl_".$row_music['author']."_lyrics` WHERE `id_music` = '".$row_music['id']."' LIMIT 1");
                if(mysql_num_rows($query_lyrics)>0){
                    $data_lyrics=mysql_fetch_array($query_lyrics);
                    $song->lyrics=$data_lyrics[0];
                }else{
                    $song->lyrics="";
                }
            }else{
                $song->lyrics="";
            }
            $query_video=mysql_query("SELECT `link` FROM carrotsy_virtuallover.`app_my_girl_video_".$song->lang."` WHERE `id_chat` = '".$song->id."' LIMIT 1");
            if(mysql_num_rows($query_video)){
                $data_video=mysql_fetch_array($query_video);
                $song->id_video=$data_video['link'];
                if($song->id_video!=''){
                        $my_array_of_vars=null;
                        parse_str( parse_url( $song->id_video, PHP_URL_QUERY ), $my_array_of_vars );
                        $url_video=$my_array_of_vars['v'];
                        $song->id_video=$my_array_of_vars['v'];
                        $song->img_video='https://img.youtube.com/vi/'.$my_array_of_vars['v'].'/hqdefault.jpg'; 
                }
            }else{
                $song->img_video='';
                $song->id_video='';
            }
            mysql_free_result($query_lyrics);
            array_push($app->list_music,$song);
        }
        mysql_free_result($query_music);
    }
    
    if($sel_func=='1'){
        $query_radio=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_radio` WHERE `lang` = '$sel_lang' LIMIT 20");
        while($row_radio=mysql_fetch_array($query_radio)){
            $song=new Song();
            $song->id=$row_radio['id'];
            $song->url=$row_radio['stream'];
            $song->name=$row_radio['name_radio'];
            $song->color='#C70039';
            $song->type='1';
            $song->lang=$sel_lang;
            $song->lyrics="http://carrotstore.com/thumb.php?src=http://carrotstore.com//app_mygirl/obj_radio/icon_".$song->id.".png&size=50&trim=1";
            array_push($app->list_music,$song);
        }
        mysql_free_result($query_radio);
    }
    
    if($sel_func=='2'){
        $query_sound=mysql_query("SELECT * FROM carrotsy_sheep.`sound` LIMIT 50");
        while($row_sound=mysql_fetch_array($query_sound)){
            $song=new Song();
            $song->id=$row_sound['id'];
            $song->url='http://sheep.carrotstore.com/music/'.$row_sound['id'].'.mp3';
            $song->name=$row_sound['name'];
            $song->color='#3498DB';
            $song->type='2';
            array_push($app->list_music,$song);
        }
        mysql_free_result($query_sound);
    }
    echo json_encode($app);
}


if($func=='download_lang'){
    $sel_lang=$_REQUEST['sel_lang'];
    $data_display=mysql_fetch_array(mysql_query("SELECT `data` FROM carrotsy_music.`key_value` WHERE `lang` = '".$sel_lang."' LIMIT 1"));
    $data_display=json_decode($data_display['data']);
    foreach($data_display as $k=>$v){
        $app->data_lang->{$k}=$v;
    }
    echo json_encode($app->data_lang);
}

if($func=='app_more'){
    $os=$_REQUEST['os'];
    $query_app_more=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_ads` LIMIT 50");
    while($row_app=mysql_fetch_array($query_app_more)){
        $song=new Song();
        $song->url='http://carrotstore.com/img.php?url=app_mygirl/obj_ads/icon_'.$row_app['id'].'.png&size=60';
        $song->name=$row_app['name'];
        if($os=='android'){
            $song->type=$row_app['android'];
        }else{
            $song->type=$row_app['ios'];
        }
        array_push($app->list_music,$song);
    }
    mysql_free_result($query_app_more);
    echo json_encode($app);
}

if($func=='rate_music'){
    $id_music=$_REQUEST['id_music'];
    $lang_music=$_REQUEST['lang_music'];
    $id_device=$_REQUEST['id_device'];
    $sel_rate=$_REQUEST['sel_rate'];
    $query_data_select=mysql_query("SELECT `value` FROM `app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `device_id` = '$id_device' LIMIT 1");
    if(mysql_num_rows($query_data_select)){
        $update_rate=mysql_query("UPDATE `app_my_girl_music_data_$lang_music` SET  `value` = '$sel_rate' WHERE `device_id` = '$id_device'  AND `id_chat` = '$id_music' LIMIT 1;");
    }else{
        $add_rate=mysql_query("INSERT INTO `app_my_girl_music_data_$lang_music` (`device_id`, `value`, `id_chat`) VALUES ('$id_device', '$sel_rate', '$id_music');");
    }
}

if($func=='rate_get'){
    $id_music=$_REQUEST['id_music'];
    $lang_music=$_REQUEST['lang_music'];
    $id_device=$_REQUEST['id_device'];
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
}

echo mysql_error();
mysql_close($link_music_app);