<?php
include "config.php";
include "database.php";

function get_msg($link,$func,$lang,$sex,$character_sex){
    $query_msg=mysqli_query($link,"SELECT `id`, `chat`, `face`, `action` FROM `app_my_girl_msg_$lang` WHERE `func` = '$func'  AND `character_sex`='$character_sex' AND `sex`='$sex'  ORDER BY RAND() LIMIT 1");
    $data_msg=mysqli_fetch_assoc($query_msg);
    $id_msg=$data_msg['id'];
    $data_msg['url_edit']=URL.'/app_my_girl_update.php?id='.$data_msg['id'].'&lang='.$lang.'&msg=1';
    $data_msg['pater']=$data_msg['id'];
    $data_msg['pater_type']="msg";
    if(file_exists("app_mygirl/app_my_girl_msg_".$lang."/".$id_msg.".mp3"))  $data_msg['mp3']=URL."/app_mygirl/app_my_girl_msg_".$lang."/".$id_msg.".mp3";
    return $data_msg;
}

function get_chat($link,$txt_sqli_query,$lang){
    $query_chat=mysqli_query($link,$txt_sqli_query);
    $data_chat=mysqli_fetch_assoc($query_chat);
    if($data_chat!=null){
        if($data_chat['id_redirect']!=""){
            $id_redirect=$data_chat['id_redirect'];
            $data_chat=get_chat($link,"`id`='$id_redirect'",$lang);
        }

        $id_chat=$data_chat['id'];
        $data_chat['url_edit']=URL.'/app_my_girl_update.php?id='.$data_chat['id'].'&lang='.$lang;
        $data_chat['pater']=$data_chat['id'];
        $data_chat['pater_type']="chat";

        if($data_chat['file_url']!='')
        $data_chat['mp3']=$data_chat['file_url'];
        else{
            if(file_exists("app_mygirl/app_my_girl_".$lang."/".$id_chat.".mp3"))  $data_chat['mp3']=URL."/app_mygirl/app_my_girl_".$lang."/".$id_chat.".mp3";
        }

        if($data_chat['effect']=='2'){
            $id_music=$id_chat;
            if(file_exists("app_mygirl/app_my_girl_".$lang."_img/".$id_music.".png")) $data_chat['avatar']=URL."/app_mygirl/app_my_girl_".$lang."_img/".$id_music.".png";

            $query_lyrics=mysqli_query($link,"SELECT * FROM `app_my_girl_".$lang."_lyrics` WHERE `id_music` = '$id_music' LIMIT 1");
            $data_lyrics=mysqli_fetch_assoc($query_lyrics);
            if($data_lyrics!=null){
                if($data_lyrics['lyrics']!="")$data_chat['lyrics']=$data_lyrics['lyrics'];
                if($data_lyrics['artist']!="")$data_chat['artist']=$data_lyrics['artist'];
                if($data_lyrics['album']!="")$data_chat['album']=$data_lyrics['album'];
                if($data_lyrics['year']!="")$data_chat['year']=$data_lyrics['year'];
                if($data_lyrics['genre']!="")$data_chat['genre']=$data_lyrics['genre'];
            }

            $query_link_ytb=mysqli_query($link,"SELECT `link` FROM `app_my_girl_video_$lang` WHERE `id_chat` = '$id_music' LIMIT 1");
            $data_link_ytb=mysqli_fetch_assoc($query_link_ytb);
            if($data_link_ytb!=null) $data_chat['link_ytb']=$data_link_ytb['link'];
        }

    }
    return $data_chat;
}

$function='';
$lang='vi';
$sex='0';
$character_sex='1';
$pater='';
$pater_type='';
$limit_chat='';
$id_device='';
$os='';

if(isset($_GET['function']))$function=$_GET['function'];
if(isset($_POST['function']))$function=$_POST['function'];

if(isset($_GET['lang']))$lang=$_GET['lang'];
if(isset($_POST['lang']))$lang=$_POST['lang'];

if(isset($_POST['sex']))$sex=$_POST['sex'];
if(isset($_POST['character_sex']))$character_sex=$_POST['character_sex'];
if(isset($_POST['pater']))$pater=$_POST['pater'];
if(isset($_POST['pater_type']))$pater_type=$_POST['pater_type'];
if(isset($_POST['limit_chat']))$limit_chat=$_POST['limit_chat'];
if(isset($_POST['id_device']))$id_device=$_POST['id_device'];
if(isset($_POST['os']))$id_device=$_POST['os'];

if($function=='hello'){
    $hours=$_POST['hours'];
    echo json_encode(get_msg($link,'chao_'.$hours,$lang,$sex,$character_sex));
}

if($function=='chat'){
    $text=mysqli_real_escape_string($link,$_POST['text']);
    $txt_query_pater="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug` FROM `app_my_girl_$lang` WHERE `text`='$text' AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`='$pater' AND `pater_type`='$pater_type'  AND `limit_chat` <= $limit_chat ORDER BY RAND() LIMIT 1";
    $data_chat=get_chat($link,$txt_query_pater,$lang);

    if($data_chat==null){
        $txt_query_pater="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug` FROM `app_my_girl_$lang` WHERE `text` LIKE '%$text%' AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`='$pater' AND `pater_type`='$pater_type'  AND `limit_chat` <= $limit_chat ORDER BY RAND() LIMIT 1";
        $data_chat=get_chat($link,$txt_query_pater,$lang);
    }

    if($data_chat==null){
        $txt_query_pater="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug` FROM `app_my_girl_$lang` WHERE MATCH (`text`) AGAINST ('$text' IN BOOLEAN MODE) AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`='$pater' AND `pater_type`='$pater_type'  AND `limit_chat` <= $limit_chat ORDER BY RAND() LIMIT 1";
        $data_chat=get_chat($link,$txt_query_pater,$lang);
    }

    if($data_chat==null){
        $txt_query_chat="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug` FROM `app_my_girl_$lang` WHERE `text`='$text' AND `character_sex`='$character_sex' AND `sex`='$sex'  AND `limit_chat` <= $limit_chat ORDER BY RAND() LIMIT 1";
        $data_chat=get_chat($link,$txt_query_chat,$lang);
    }

    if($data_chat==null){
        $txt_query_chat="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug` FROM `app_my_girl_$lang` WHERE `text` LIKE '%$text%' AND `character_sex`='$character_sex' AND `sex`='$sex'  AND `limit_chat` <= $limit_chat ORDER BY RAND() LIMIT 1";
        $data_chat=get_chat($link,$txt_query_chat,$lang);
    }

    if($data_chat==null){
        $txt_query_chat="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug` FROM `app_my_girl_$lang` WHERE MATCH (`text`) AGAINST ('$text' IN BOOLEAN MODE) AND `character_sex`='$character_sex' AND `sex`='$sex'  AND `limit_chat` <= $limit_chat ORDER BY RAND() LIMIT 1";
        $data_chat=get_chat($link,$txt_query_chat,$lang);
    }

    if($data_chat==null) $data_chat=get_msg($link,'bam_bay',$lang,$sex,$character_sex);
    
    echo json_encode($data_chat);
}

if($function=='get_tip'){
    $arr_tip=array();
    $query_list_tip_chat=mysqli_query($link,"SELECT `text` FROM `app_my_girl_$lang` WHERE `tip` = '1' AND `character_sex`='$character_sex' AND `sex`='$sex' LIMIT 50");
    while($tip=mysqli_fetch_assoc($query_list_tip_chat)){
        array_push($arr_tip,$tip['text']);
    }
    echo json_encode($arr_tip);
}

if($function=='get_list_lang'){
    $arr_lang=array();
    $query_list_lang=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `ver2` = '1' AND `active` = '1' ORDER BY `id`");
    while($item_lang=mysqli_fetch_array($query_list_lang)){
        $item_lang["url_icon"]=$url.'/app_mygirl/img/'.$item_lang['key'].'.png'; 
        array_push($arr_lang,$item_lang);
    }
    echo json_encode($arr_lang);
}

if($function=='get_lang'){
    $lang_download=$_POST['lang_download'];
    $query_get_lang=mysqli_query($link,"SELECT `data` FROM `app_my_girl_display_lang` WHERE `version` = '3' AND `lang` = '$lang_download' LIMIT 1");
    $data_lang=mysqli_fetch_assoc($query_get_lang);

    $data_display=mysqli_fetch_array(mysqli_query($link,"SELECT `data` FROM `app_my_girl_display_lang` WHERE `lang` = '".$lang_download."' AND `version` = '2' LIMIT 1"));
    $arr_data=(Array)json_decode($data_display['data']);
    $data_lang["setting_url_sound_test_sex0"]=$arr_data['setting_url_sound_test_sex0'];
    $data_lang["setting_url_sound_test_sex1"]=$arr_data['setting_url_sound_test_sex1'];

    echo $data_lang['data'];
}

if($function=='get_new_song'){
    $name_song=mysqli_real_escape_string($link,$_POST['name_song']);
    $data_song=null;
    if(trim($name_song)==''){
        $data_song=get_chat($link,"SELECT * FROM `app_my_girl_$lang` WHERE `effect` = '2' AND `id_redirect` = ''  ORDER BY RAND() LIMIT 1",$lang);
    }else{
        $data_song=get_chat($link,"SELECT * FROM `app_my_girl_$lang` WHERE `chat` LIKE '%$name_song%' AND `effect` = '2' AND `id_redirect` = ''  ORDER BY RAND() LIMIT 1",$lang);
        if($data_song==null){
            $data_song=get_chat($link,"SELECT * FROM `app_my_girl_$lang` WHERE MATCH (`chat`) AGAINST ('$name_song' IN BOOLEAN MODE) AND `effect` = '2' AND `id_redirect` = ''  LIMIT 1",$lang);
        }
    }
    echo json_encode($data_song);
}

if($function=='get_costumes'){
    $type=$_POST['type'];
    $arr_skin=array();
    $query_skin=mysqli_query($link,"SELECT `id` FROM `app_my_girl_skin` WHERE `type` = '$type' LIMIT 50");
    while($item_skin=mysqli_fetch_assoc($query_skin)){
        $skin_id=$item_skin["id"];
        $item_skin['url_icon']=URL."/thumb.php?src=".URL."/app_mygirl/obj_skin/icon_$skin_id.png&size=100&trim=1";
        $item_skin['url']=URL."/app_mygirl/obj_skin/skin_$skin_id.png";
        array_push($arr_skin,$item_skin);
    }
    echo json_encode($arr_skin);
}

if($function=='get_head'){
    $type=$_POST['type'];
    $arr_head=array();
    $query_head=mysqli_query($link,"SELECT `id` FROM `app_my_girl_head`  WHERE `type` = '$type'  LIMIT 50");
    while($item_head=mysqli_fetch_assoc($query_head)){
        $head_id=$item_head["id"];
        $item_head['url_icon']=URL."/thumb.php?src=".URL."/app_mygirl/obj_head/icon_$head_id.png&size=100&trim=1";
        $item_head['url']=URL."/app_mygirl/obj_head/head_$head_id.png";
        array_push($arr_head,$item_head);
    }
    echo json_encode($arr_head);
}

if($function=='send_report'){
    $id_chat=$_POST['id_chat'];
    $type_chat=$_POST['type_chat'];
    $type_report=$_POST['type_report'];
    $value_report=$_POST['value_report'];
    $sel_report=$_POST['sel_report'];

    $query_add_report=mysqli_query($link,"INSERT INTO `app_my_girl_report` (`type`, `sel_report`, `value_report`, `id_question`, `type_question`, `id_device`, `limit_chat`, `lang`, `os`) VALUES ('$type_report', '$sel_report', '$value_report', '$id_chat', '$type_chat', '$id_device', '$limit_chat', '$lang', '$id_device');");
    echo 'lỗi mysql:'.mysqli_error($link);
    echo var_dump($_POST);
}
?>