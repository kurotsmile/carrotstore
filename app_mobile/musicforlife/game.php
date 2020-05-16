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


if($func=='list_song'){
    $sel_lang=$_POST['lang_music'];
    $key_search='';
    if(isset($_POST['key'])){
        $key_search=$_POST['key'];
    }
    $app->list=Array();
    
    
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
    while($row=mysql_fetch_array($query_music)){
        $item_music=new Item();
        $item_music->id=$row['id'].''.$row['author'];
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
    $query_value_lang=mysql_query("SELECT * FROM carrotsy_music.`game_key_value` WHERE `lang` = '$lang_sel' LIMIT 1");
    $data_val=mysql_fetch_array($query_value_lang);
    $data_display=json_decode($data_val['data']);
    foreach($data_display as $k=>$v){
        $app->{$k}=$v;
    }
}

if($func=='list_ads'){
    $os=$_POST['os'];
    $app->list=array();
    $query_app_more=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_ads` LIMIT 50");
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


echo json_encode($app);
