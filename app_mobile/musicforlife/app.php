<?php
include_once("carrot_framework_app.php");

$c_country_show='1';
if(isset($_POST['c_country'])){$c_country_show=$_POST['c_country'];}

function get_list_country($link_mysql,$type_view){
    global $c_country_show;
    global $url_carrot_store;
    $arr_country=array();
    if(intval($c_country_show)<=1) {
        $query_list_country = mysqli_query($link_mysql,"SELECT `id`,`name`,`key` FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
        while ($row_lang = mysqli_fetch_array($query_list_country)) {
            $country_item = new stdClass();
            $country_item->id = $row_lang['id'];
            $country_item->name = $row_lang['name'];
            $country_item->{"key"} = $row_lang['key'];
            $country_item->{"type"} =$type_view;
            $country_item->icon=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/img/'.$row_lang['key'].'.png&size=60';
            array_push($arr_country, $country_item);
        }
    }
    return $arr_country;
}

function get_song_by_data($row){
    global $url_carrot_store;
    global $link;
    $item_music=new stdClass();
    $item_music->id=$row['id'];
    $item_music->name=$row['chat'];
    if($row['file_url']!=''){
        $item_music->{"url"} = $row['file_url'];
    }else {
        $item_music->{"url"} =$url_carrot_store.'/app_mygirl/app_my_girl_' . $row['author'] . '/' . $row['id'] . '.mp3';
    }
    $item_music->{"color"}=$row['color'];
    $item_music->type='0';
    $item_music->link_store=$url_carrot_store.'/music/'.$row['id'].'/'.$row['author'];
    $item_music->lang=$row['author'];

    $query_lyrics=mysqli_query($link,"SELECT `lyrics`,`genre`,`year`,`album`,`artist` FROM carrotsy_virtuallover.`app_my_girl_".$row['author']."_lyrics` WHERE `id_music` = '".$row['id']."' LIMIT 1");
    if(mysqli_num_rows($query_lyrics)>0){
        $data_lyrics=mysqli_fetch_assoc($query_lyrics);
        $item_music->lyrics=$data_lyrics['lyrics'];
        $item_music->genre=$data_lyrics['genre'];
        $item_music->year=$data_lyrics['year'];
        $item_music->album=$data_lyrics['album'];
        $item_music->artist=$data_lyrics['artist'];
    }

    $query_video=mysqli_query($link,"SELECT `link` FROM carrotsy_virtuallover.`app_my_girl_video_".$row['author']."` WHERE `id_chat` = '".$row["id"]."' LIMIT 1");
    if(mysqli_num_rows($query_video)){
        $data_video=mysqli_fetch_assoc($query_video);
        $item_music->link_ytb=$data_video['link'];
    }

    if(file_exists("../../app_mygirl/app_my_girl_".$row['author']."_img/".$row['id'].".png")){
        $item_music->img_video=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/app_my_girl_'.$row['author'].'_img/'.$row['id'].'.png&size=60';
    }
    return $item_music;
}

if($function=='list_music'){
    $sel_lang=$_POST['lang_music'];
    $list_music=new stdClass();
    $arr_music=array();
    $query_music=mysqli_query($link,"SELECT `id`,`chat`,`color`,`file_url`,`author` FROM carrotsy_virtuallover.`app_my_girl_$sel_lang` WHERE `effect` = '2' ORDER BY rand() LIMIT 15");
    while($row=mysqli_fetch_assoc($query_music)){
        $item_music=get_song_by_data($row);
        array_push($arr_music,$item_music);
    }

    $list_music->musics=$arr_music;
    $list_music->countrys=get_list_country($link,0);
    echo json_encode($list_music);
    exit;
}

if($function=='get_song_by_id'){
    $s_id=$_POST['s_id'];
    $s_lang=$_POST['s_lang'];
    $query_music=mysqli_query($link,"SELECT `id`,`chat`,`color`,`file_url`,`author` FROM carrotsy_virtuallover.`app_my_girl_$s_lang` WHERE `id` = '$s_id' LIMIT 1");
    $data_music=mysqli_fetch_assoc($query_music);
    if($data_music!=null) echo json_encode(get_song_by_data($data_music));
    exit;
}

if($function=='list_radio'){
    $sel_lang=$_POST['lang_radio'];
    $list_radio=new stdClass();
    $arr_radio=array();
    $query_radio=mysqli_query($link,"SELECT `id`,`stream`,`name_radio` FROM carrotsy_virtuallover.`app_my_girl_radio` WHERE `lang` = '$sel_lang' ORDER BY RAND() LIMIT 30");
    while($row_radio=mysqli_fetch_assoc($query_radio)){
        $item_radio=new stdClass();
        $item_radio->id=$row_radio['id'];
        $item_radio->{"url"}=$row_radio['stream'];
        $item_radio->name=$row_radio['name_radio'];
        $item_radio->{"color"}='#C70039';
        $item_radio->type='1';
        $item_radio->{"img_video"}=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/obj_radio/icon_'.$row_radio['id'].'.png&size=50&trim=1';
        array_push($arr_radio,$item_radio);
    }

    $list_radio->arr_radio=$arr_radio;
    $list_radio->arr_country=get_list_country($link,1);
    echo json_encode($list_radio);
    exit;
}

if($function=='list_sound'){
    $list_sound=array();
    $query_sound=mysqli_query($link,"SELECT `id`,`name` FROM carrotsy_sheep.`sound` LIMIT 50");
    while($row_sound=mysqli_fetch_assoc($query_sound)){
        $item_sound=new stdClass();
        $item_sound->id=$row_sound['id'];
        $item_sound->{"url"}=$url_carrot_store.'/app_mobile/sheep/music/'.$row_sound['id'].'.mp3';
        $item_sound->name=$row_sound['name'];
        $item_sound->{"color"}='#3498DB';
        $item_sound->type='2';
        array_push($list_sound,$item_sound);
    }
    echo json_encode($list_sound);
    exit;
}

if($function=='list_search_key'){
    $sel_lang=$_POST['lang'];
    $arr_key_search=array();
    $query_list_key=mysqli_query($link,"SELECT `key` FROM carrotsy_music.`log_key` WHERE `lang` = '$sel_lang' ORDER BY RAND() LIMIT 12");
    while($row_key=mysqli_fetch_assoc($query_list_key)){
        array_push($arr_key_search,$row_key['key']);
    }
    echo json_encode($arr_key_search);
    exit;
}

if($function=='show_list_playlist') {
    if(isset($_POST['user_id'])){
        $lang=$_POST['user_lang'];
        $id_device=$_POST['user_id'];
    }else{
        $id_device=$_POST['id_device'];
    }
    $query_playlist=mysqli_query($link,"SELECT `id`,`name`,`data`,`length` FROM `playlist_$lang` WHERE `user_id` = '$id_device'");
    $array_playlist=array();
    while($playlist=mysqli_fetch_assoc($query_playlist)){
        $item_playlist=new stdClass();
        $item_playlist->name=$playlist['name'];
        $item_playlist->desc=$playlist['data'];
        $item_playlist->id=$playlist['id'];
        $item_playlist->{"length"}=$playlist['length'];
        array_push($array_playlist,$item_playlist);
    }
    echo json_encode($array_playlist);
    exit;
}

if($function=='create_playlist'){
    if(isset($_POST['user_id'])){
        $lang=$_POST['user_lang'];
        $id_device=$_POST['user_id'];
    }
    $name_playlist=$_POST['name_playlist'];
    $id_new=uniqid().''.uniqid();
    $array_playlist=array();
    $data=json_encode($array_playlist);
    $query_add_playlist=mysqli_query($link,"INSERT INTO `playlist_$lang` (`id`, `user_id`, `data`, `name`, `length`) VALUES ('$id_new', '$id_device', '$data', '$name_playlist', '0');");
    exit;
}

if($function=='delete_playlist'){
    $id_playlist=$_POST['id'];
    mysqli_query($link,"DELETE FROM `playlist_$lang` WHERE `id` = '$id_playlist'");
    exit;
}

if($function=='add_song_playlist'){
    $id_music_add=$_POST['id_music_add'];
    $lang_music_add=$_POST['lang_music_add'];
    $id_playlist=$_POST['id_playlist'];
    $s_data=preg_replace( "/\r|\n/", "", $_POST['data_playlist']);
    $data_playlist=json_decode($s_data,JSON_UNESCAPED_UNICODE);
    $query_music=mysqli_query($link,"SELECT `id`,`chat`,`color`,`file_url`,`author` FROM carrotsy_virtuallover.`app_my_girl_$lang_music_add` WHERE `id`='$id_music_add' LIMIT 1");
    $data_music=mysqli_fetch_assoc($query_music);

    array_push($data_playlist,$data_music);
    $length=count($data_playlist);
    $data_playlist=json_encode($data_playlist,JSON_UNESCAPED_UNICODE);
    $query_update_playlist=mysqli_query($link,"UPDATE `playlist_$lang` SET `data` = '$data_playlist' , `length` = '$length' WHERE `id` = '$id_playlist'  LIMIT 1;");
    exit;
}

if($function=='delete_song_in_playlist'){
    $id_delete=$_POST['id_delete'];
    $lang_delete=$_POST['lang_delete'];
    $id_playlist=$_POST['id_playlist'];
    $s_data=preg_replace( "/\r|\n/", "", $_POST['data']);
    $data_playlist=json_decode($s_data);
    $array_new=array();
    for($i=0;$i<count($data_playlist);$i++){
        $item_song=$data_playlist[$i];
        if(isset($item_song->id)){
            if($id_delete==$item_song->id&&$lang_delete==$item_song->author){
            }else{
                array_push($array_new,$item_song);
            }
        }
    }
    $length=count($array_new);
    $data_new=json_encode($array_new,JSON_UNESCAPED_UNICODE);
    $query_update_playlist=mysqli_query($link,"UPDATE `playlist_$lang` SET `data` = '$data_new' , `length` = '$length' WHERE `id` = '$id_playlist'  LIMIT 1;");
    echo json_encode($array_new);
    exit;
}

if($function=='update_name_playlist'){
    $name_playlist=$_POST['name_playlist'];
    $id_playlist=$_POST['id_playlist'];
    mysqli_query($link,"UPDATE `playlist_$lang` SET `name` = '$name_playlist' WHERE `id` = '$id_playlist' LIMIT 1;");
    exit;
}

if($function=='list_background'){
    $query_bk=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.app_my_girl_background WHERE `version` = '1' ORDER BY RAND() LIMIT 21");
    $array_bk=array();
    while ($row_bk=mysqli_fetch_assoc($query_bk)){
        $item_bk=new stdClass();
        $item_bk->url=$url_carrot_store."/thumb.php?src=".$url_carrot_store."/app_mygirl/obj_background/icon_".$row_bk['id'].".png&size=100x130&trim=1";
        $item_bk->{"url_bk"}=$url_carrot_store."/app_mygirl/obj_background/icon_".$row_bk['id'].".png";
        array_push($array_bk,$item_bk);
    }
    echo json_encode($array_bk);
    exit;
}

if($function=='rate_get'){
    $id_music=$_REQUEST['id_music'];
    $lang_music=$_REQUEST['lang_music'];
    $id_device=$_REQUEST['id_device'];
    $query_data_select=mysqli_query($link,"SELECT `value` FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `device_id` = '$id_device' LIMIT 1");
    $query_data_0=mysqli_query($link,"SELECT COUNT(`device_id`) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `value` = '0'");
    $query_data_1=mysqli_query($link,"SELECT COUNT(`device_id`) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `value` = '1'");
    $query_data_2=mysqli_query($link,"SELECT COUNT(`device_id`) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `value` = '2'");
    $query_data_3=mysqli_query($link,"SELECT COUNT(`device_id`) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `value` = '3'");
    $arr_data=array();
    if(mysqli_num_rows($query_data_0)){
        $data_0=mysqli_fetch_assoc($query_data_0);
        array_push($arr_data,$data_0['c']);
    }else
        array_push($arr_data,0);
    
    if(mysqli_num_rows($query_data_1)){
        $data_1=mysqli_fetch_assoc($query_data_1);
        array_push($arr_data,$data_1['c']);
    }else
        array_push($arr_data,0);

    if(mysqli_num_rows($query_data_2)){
        $data_2=mysqli_fetch_assoc($query_data_2);
        array_push($arr_data,$data_2['c']);
    }else
        array_push($arr_data,0);

    if(mysqli_num_rows($query_data_3)){
        $data_3=mysqli_fetch_assoc($query_data_3);
        array_push($arr_data,$data_3['c']);
    }else
        array_push($arr_data,0);
    
    if(mysqli_num_rows($query_data_select)){
        $data_select=mysqli_fetch_assoc($query_data_select);
        array_push($arr_data,$data_select['value']);
    }else
        array_push($arr_data,-1); 

    echo json_encode($arr_data);
    exit;
}

if($function=='rate_music'){
    $id_music=$_POST['id_music'];
    $lang_music=$_POST['lang_music'];
    $id_device=$_POST['id_device'];
    $sel_rate=$_POST['sel_rate'];
    $query_data_select=mysqli_query($link,"SELECT `value` FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `device_id` = '$id_device' LIMIT 1");
    if(mysqli_num_rows($query_data_select))
        $update_rate=mysqli_query($link,"UPDATE carrotsy_virtuallover.`app_my_girl_music_data_$lang_music` SET  `value` = '$sel_rate' WHERE `device_id` = '$id_device'  AND `id_chat` = '$id_music' LIMIT 1;");
    else
        $add_rate=mysqli_query($link,"INSERT INTO carrotsy_virtuallover.`app_my_girl_music_data_$lang_music` (`device_id`, `value`, `id_chat`) VALUES ('$id_device', '$sel_rate', '$id_music');");
}

if($function=='list_info'){
    $type=$_POST['type'];
    $txt_order=' ORDER BY RAND() ';
    if($type=='year'){
        $txt_order=' ORDER BY `year` DESC ';
    }
    $query_artist=mysqli_query($link,"SELECT DISTINCT `$type` FROM carrotsy_virtuallover.`app_my_girl_".$lang."_lyrics` WHERE `$type`!='' $txt_order LIMIT 50");
    $array_info=array();
    while($row_info=mysqli_fetch_assoc($query_artist)){
        array_push($array_info,$row_info[$type]);
    }
    echo json_encode($array_info);
    exit;
}

if($function=='get_list_item_info'){
    $type=$_POST['type'];
    $s_id=$_POST['s_id'];
    $s_lang=$_POST['s_lang'];
    if($s_lang==''){
        $s_lang=$lang;
    }
    $array_music=array();
    $list_music = mysqli_query($link,"SELECT m.`id`, m.`chat`,m.`color`, m.`file_url`, m.`slug`,m.`author`,l.`lyrics`,l.`artist`,l.`album`,l.`year`,l.`genre`,y.`link` From carrotsy_virtuallover.`app_my_girl_".$s_lang."` as `m` LEFT JOIN carrotsy_virtuallover.`app_my_girl_".$s_lang."_lyrics` as `l` ON m.id= l.id_music LEFT JOIN carrotsy_virtuallover.`app_my_girl_video_".$s_lang."` as `y` ON m.id= y.id_chat  WHERE l.$type ='".$s_id."' ORDER BY RAND() LIMIT 20");
    while($row_music=mysqli_fetch_assoc($list_music)){
        $item_music=new stdClass();
        if(file_exists("../../app_mygirl/app_my_girl_".$row_music['author']."_img/".$row_music['id'].".png")) $item_music->img_video=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/app_my_girl_'.$row_music['author'].'_img/'.$row_music['id'].'.png&size=60';
        $item_music->album=$row_music['album'];
        $item_music->year=$row_music['year'];
        $item_music->artist=$row_music['artist'];
        $item_music->genre=$row_music['genre'];
        $item_music->name=$row_music['chat'];
        $item_music->lang=$row_music['author'];
        $item_music->id=$row_music['id'];
        $item_music->{'color'}=$row_music['color'];
        $item_music->link_ytb=$row_music['link'];
        if($row_music['file_url']!='')
            $item_music->{"url"} = $row_music['file_url'];
        else
            $item_music->{"url"} = $url_carrot_store.'/app_mygirl/app_my_girl_' . $row_music['author'] . '/' . $row_music['id'] . '.mp3';
        $item_music->lyrics=$row_music['lyrics'];
        array_push($array_music,$item_music);
    }
    echo json_encode($array_music);
    exit;
}

if($function=='search'){
    $key_search=$_POST['key'];
    $save_key=$_POST['save_key'];
    $arr_music=array();

    if($save_key=='1'){
        $lang_app=$_POST['lang'];
        $query_inster_key=mysqli_query($link,"INSERT INTO carrotsy_music.`log_key` (`key`, `lang`,`date`) VALUES ('$key_search', '$lang_app',now())");
    }
    
    $list_country=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `active`='1' AND `ver0` = '1'");
    $txt_query='';
    $txt_query_2='';
    $count_l=mysqli_num_rows($list_country);
    $count_index=0;
    while($l=mysqli_fetch_array($list_country)){
        $key=$l['key'];
        $txt_query.="(SELECT * FROM carrotsy_virtuallover.`app_my_girl_$key` WHERE  `chat` LIKE '%$key_search%' AND  `effect`='2' AND `disable` = '0' limit 21)";
        $txt_query_2.=" (SELECT * FROM carrotsy_virtuallover.`app_my_girl_$key` WHERE MATCH (`chat`) AGAINST ('$key_search' IN BOOLEAN MODE) AND  `effect`='2' AND `disable` = '0' limit 21)";
        $count_index++;
        if($count_index!=$count_l){
        $txt_query.=" UNION ALL ";
        $txt_query_2.=" UNION ALL ";
        }
    }
    $query_music=mysqli_query($link,$txt_query);
    
    if(mysqli_num_rows($query_music)==0) $query_music=mysqli_query($link,$txt_query_2);

    while($row=mysqli_fetch_assoc($query_music)){
        $item_music=new stdClass();
        $item_music->id=$row['id'];
        $item_music->name=$row['chat'];
        if($row['file_url']!='')
            $item_music->{"url"}= $row['file_url'];
        else
            $item_music->{"url"}=$url_carrot_store.'/app_mygirl/app_my_girl_'.$row['author'].'/'.$row['id'].'.mp3';

        $item_music->{"color"}=$row['color'];
        $item_music->type='0';
        $item_music->link_store=$url_carrot_store.'/music/'.$row['id'].'/'.$row['author'];
        $item_music->lang=$row['author'];
        if(file_exists("../../app_mygirl/app_my_girl_".$row['author']."_img/".$row['id'].".png")) $item_music->img_video=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/app_my_girl_'.$row['author'].'_img/'.$row['id'].'.png&size=60';
        
        $query_lyrics=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_".$row['author']."_lyrics` WHERE `id_music` = '".$row['id']."' LIMIT 1");
        if(mysqli_num_rows($query_lyrics)>0){
            $data_lyrics=mysqli_fetch_assoc($query_lyrics);
            $item_music->lyrics=$data_lyrics['lyrics'];
            $item_music->genre=$data_lyrics['genre'];
            $item_music->year=$data_lyrics['year'];
            $item_music->album=$data_lyrics['album'];
            $item_music->artist=$data_lyrics['artist'];
        }
                
        $query_video=mysqli_query($link,"SELECT `link` FROM carrotsy_virtuallover.`app_my_girl_video_".$row['author']."` WHERE `id_chat` = '".$row["id"]."' LIMIT 1");
        if(mysqli_num_rows($query_video)){
            $data_video=mysqli_fetch_array($query_video);
            $item_music->link_ytb=$data_video['link'];
        }
        array_push($arr_music,$item_music);
    }
    echo json_encode($arr_music);
    exit;
}
?>