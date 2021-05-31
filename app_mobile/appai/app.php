<?php
$date_cur=date("Y-m-d");
include_once "carrot_framework.php";
include_once "app_function.php";

$sex='0';if(isset($_POST['sex'])) $sex=$_POST['sex'];
$character_sex='1';if(isset($_POST['character_sex'])) $character_sex=$_POST['character_sex'];
$limit_month='';if(isset($_POST['limit_month'])) $limit_month=$_POST['limit_month'];
$limit_date='';if(isset($_POST['limit_date'])) $limit_date=$_POST['limit_date'];
$limit_day='';if(isset($_POST['limit_day'])) $limit_day=$_POST['limit_day'];
$limit_chat='3';if(isset($_POST['limit_chat'])) $limit_chat=$_POST['limit_chat'];
$os='android';if(isset($_POST['os']))$os=$_POST['os'];

if($function=='get_tip'){
    $arr_tip=array();
    $query_list_tip_chat=mysqli_query($link,"SELECT `text` FROM `app_my_girl_$lang` WHERE `tip` = '1' AND `character_sex`='$character_sex' AND `sex`='$sex' LIMIT 50");
    while($tip=mysqli_fetch_assoc($query_list_tip_chat)){
        array_push($arr_tip,$tip['text']);
    }
    echo json_encode($arr_tip);
}

if($function=='hello'){
    $hours=$_POST['hours'];
    echo json_encode(get_msg($link,'chao_'.$hours,$lang,$sex,$character_sex,$limit_day,$limit_date,''));
    echo mysqli_error($link);
    exit;
}

if($function=='get_ask'){
    $data_msg=get_msg($link,'bat_chuyen',$lang,$sex,$character_sex,'','',$limit_month);
    if($data_msg==null){
        $data_msg=get_msg($link,'bat_chuyen',$lang,$sex,$character_sex,$limit_day,$limit_date,$limit_month);   
    }
    echo json_encode($data_msg);
}

if($function=='chat'){
    $pater_type=$_POST['pater_type'];
    $pater=$_POST['pater'];
    $text=mysqli_real_escape_string($link,$_POST['text']);

    if($pater_type=='tim_nhac'){
        $data_chat=get_new_song($link,$text,$lang);
    }else if($pater_type=='tim_duong'){
        $data_chat=get_msg($link,'tra_loi_tim_duong',$lang,$sex,$character_sex,$limit_day,$limit_date,'');
        $data_chat['link']="https://maps.google.com/maps?q=".urlencode($text);
    }else if($pater_type=='tim_loi_nhac'){
        $data_chat=get_lyrics_song($link,$text,$lang);
    }else if($pater_type=='tim_danh_ba'){
        $contacts=get_users($link,$text,$lang);
        if($contacts!=null){
            $data_chat=get_msg($link,'hien_ds_sdt',$lang,$sex,$character_sex,$limit_day,$limit_date,'');
            $data_chat['contact']=$contacts;
        }else{
            $data_chat=get_msg($link,'khong_tim_thay',$lang,$sex,$character_sex,$limit_day,$limit_date,'');
        }
    }else{
        $math=arithmetic($text);
        if($math!=""){
            $data_chat=get_msg($link,'giai_toan',$lang,$sex,$character_sex,$limit_day,$limit_date,'');
            $data_chat['chat']=str_replace('{giai_toan}',$math,$data_chat['chat']);
        }else{
            $txt_query_pater="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer` FROM `app_my_girl_$lang` WHERE `text`='$text' AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`='$pater' AND `pater_type`='$pater_type'  AND `limit_chat` <= $limit_chat AND `disable`=0 ORDER BY RAND() LIMIT 1";
            $data_chat=get_chat($link,$txt_query_pater,$lang);
        }
    }

    if($data_chat==null){
        $txt_query_pater="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer` FROM `app_my_girl_$lang` WHERE `text` LIKE '%$text' AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`='$pater' AND `pater_type`='$pater_type'  AND `limit_chat` <= $limit_chat AND `disable`=0 ORDER BY RAND() LIMIT 1";
        $data_chat=get_chat($link,$txt_query_pater,$lang);
    }

    if($data_chat==null){
        $txt_query_pater="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer` FROM `app_my_girl_$lang` WHERE MATCH (`text`) AGAINST ('$text' IN BOOLEAN MODE) AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`='$pater' AND `pater_type`='$pater_type'  AND `limit_chat` <= $limit_chat AND `disable`=0 ORDER BY RAND() LIMIT 1";
        $data_chat=get_chat($link,$txt_query_pater,$lang);
    }

    if($data_chat==null){
        $txt_query_chat="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer` FROM `app_my_girl_$lang` WHERE `text`='$text' AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`='' AND `limit_chat` <= $limit_chat AND `disable`=0 ORDER BY RAND() LIMIT 1";
        $data_chat=get_chat($link,$txt_query_chat,$lang);
    }

    if($data_chat==null){
        $txt_query_chat="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer` FROM `app_my_girl_$lang` WHERE `text` LIKE '%$text%' AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`='' AND `limit_chat` <= $limit_chat AND `disable`=0 ORDER BY RAND() LIMIT 1";
        $data_chat=get_chat($link,$txt_query_chat,$lang);
    }

    if($data_chat==null){
        $txt_query_chat="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer` FROM `app_my_girl_$lang` WHERE MATCH (`text`) AGAINST ('$text' IN BOOLEAN MODE) AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`=''  AND `limit_chat` <= $limit_chat AND `disable`=0 ORDER BY RAND() LIMIT 1";
        $data_chat=get_chat($link,$txt_query_chat,$lang);
    }

    if($data_chat==null) {
        $data_chat=get_msg($link,'bam_bay',$lang,$sex,$character_sex,$limit_day,$limit_date,'');
        mysqli_query($link,"INSERT INTO `app_my_girl_key` (`key`, `lang`,`sex`,`dates`,`os`,`character`,`character_sex`,`version`,`id_question`,`type_question`,`id_device`,`location_lon`,`location_lat`) VALUES ('$text', '$lang','$sex','$date_cur','$os','0',$character_sex,'3','$pater','$pater_type','$id_device','','');");
    }
    echo json_encode($data_chat);
}

if($function=='get_new_song'){
    $name_song=mysqli_real_escape_string($link,$_POST['name_song']);
    echo json_encode(get_new_song($link,$name_song,$lang));
}

if($function=='get_costumes'){
    $type=$_POST['type'];
    $arr_skin=array();
    $query_skin=mysqli_query($link,"SELECT `id`,`price`,`type` FROM `app_my_girl_skin` WHERE `type` = '$type' LIMIT 50");
    while($item_skin=mysqli_fetch_assoc($query_skin)){
        $skin_id=$item_skin["id"];
        $item_skin['url_icon']=$url_carrot_store."/thumb.php?src=".$url_carrot_store."/app_mygirl/obj_skin/icon_$skin_id.png&size=100&trim=1";
        $item_skin['url']=URL."/app_mygirl/obj_skin/skin_$skin_id.png";
        array_push($arr_skin,$item_skin);
    }
    echo json_encode($arr_skin);
}

if($function=='get_head'){
    $type=$_POST['type'];
    $arr_head=array();
    $query_head=mysqli_query($link,"SELECT `id`,`price`,`type` FROM `app_my_girl_head`  WHERE `type` = '$type'  LIMIT 50");
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
}

if($function=='get_command_offline'){
    $arr_data_offline=array();
    $query_get_command_offline=mysqli_query($link,"SELECT `text`,`chat`,`effect`,`action`,`face` FROM `app_my_girl_$lang` WHERE `id_redirect` = '' AND `pater` = '' AND `pater_type` = '' AND `sex` = '$sex' AND `character_sex` = '$character_sex' AND `limit_day` <=$limit_chat AND `effect`!='2' ORDER BY RAND() LIMIT 50");
    while($data_offline=mysqli_fetch_assoc($query_get_command_offline)){
        array_push($arr_data_offline,$data_offline);
    }
    echo json_encode($arr_data_offline);
}

if($function=='hit'){
    echo json_encode(get_msg($link,'dam',$lang,$sex,$character_sex,$limit_day,$limit_date,$limit_month));
    exit;
}

if($function=='get_list_music'){
    $info_type='';
    $info_val='';

    if(isset($_POST['info_type'])) $info_type=$_POST['info_type'];
    if(isset($_POST['info_val'])) $info_val=$_POST['info_val'];
    $arr_music=array();

    if($info_type!='')
    $query_list_music=mysqli_query($link,"SELECT m.id,m.chat FROM app_my_girl_vi as m INNER JOIN app_my_girl_vi_lyrics as l ON m.id= l.id_music WHERE l.$info_type='$info_val' ORDER BY RAND() LIMIT 20");
    else
    $query_list_music=mysqli_query($link,"SELECT m.id,m.chat FROM app_my_girl_vi as m INNER JOIN app_my_girl_vi_lyrics as l ON m.id= l.id_music WHERE l.year='2020' ORDER BY RAND() LIMIT 20");

    while($music=mysqli_fetch_assoc($query_list_music)){
        array_push($arr_music,$music);
    }
    echo json_encode($arr_music);
}

if($function=='get_info_music_by_type'){
    $info_type=$_POST['info_type'];
    $arr_info_music=array();
    $query_list_music=mysqli_query($link,"SELECT `$info_type` FROM `app_my_girl_".$lang."_lyrics` WHERE `$info_type` != '' GROUP BY `$info_type` ORDER BY RAND() LIMIT 30");
    while($music=mysqli_fetch_assoc($query_list_music)){
        $music['type']=$info_type;
        array_push($arr_info_music,$music);
    }
    echo json_encode($arr_info_music);
}

if($function=='get_chat_by_id'){
    $id=$_POST['id'];
    $txt_query_chat="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer` FROM `app_my_girl_$lang` WHERE `id`='$id'  AND `disable`=0  LIMIT 1";
    echo json_encode(get_chat($link,$txt_query_chat,$lang));
}

if($function=='list_music_by_account'){
    $id_user=$_POST['id_user'];
    exit;
}

if($function=='list_background'){
    $arr_background=array();
    $query_list_background=mysqli_query($link,"SELECT `id` FROM `app_my_girl_background` ORDER BY RAND() LIMIT 20");
    while ($bk=mysqli_fetch_assoc($query_list_background)) {
        $item=new stdClass();
        $item->{"icon"}=$url."/thumb.php?src=".$url."/app_mygirl/obj_background/icon_".$bk['id'].".png&size=50x80&trim=1";
        $item->{"link"}=$url."/app_mygirl/obj_background/icon_".$bk['id'].".png";
        array_push($arr_background,$item);
    }
    echo json_encode($arr_background);
    exit;
}

if($function=='show_chat'){
    $id=$_POST['id'];
    $type=$_POST['type'];
    if($type=='chat'){
        $txt_query_show_chat="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer` FROM `app_my_girl_$lang` WHERE `id`='$id'  LIMIT 1";
        $data_chat=get_chat($link,$txt_query_show_chat,$lang);
    }
    if($type=='msg'){
        $query_msg=mysqli_query($link,"SELECT `id`, `chat`, `face`, `action` FROM `app_my_girl_msg_$lang` WHERE `id` = '$id'  LIMIT 1");
        $data_chat=mysqli_fetch_assoc($query_msg);
        $id_msg=$data_chat['id'];
        $data_chat['chat']=special_keyword($data_chat['chat']);
        $data_chat['url_edit']=URL.'/app_my_girl_update.php?id='.$id_msg.'&lang='.$lang.'&msg=1';
        $data_chat['pater']=$id_msg;
        $data_chat['pater_type']="msg";
        if(file_exists("app_mygirl/app_my_girl_msg_".$lang."/".$id_msg.".mp3")) $data_chat['mp3']=URL."/app_mygirl/app_my_girl_msg_".$lang."/".$id_msg.".mp3";
    }
    echo json_encode($data_chat);
    exit;
}

if($function=='add_command'){
    $question=$_POST['question'];
    $answer=$_POST['answer'];
    $pater=$_POST['pater'];
    $pater_type=$_POST['pater_type'];
    $link_chat=$_POST['link'];

    $md5=md5(uniqid(rand(), true));
    $color='ffffff';
    if($answer!=''&&$question!=''){
        $query_add_command=mysqli_query($link,"INSERT INTO `app_my_girl_brain` (`question`, `answer`, `status`, `effect`, `sex`, `langs`, `face`, `action`, `author`, `character_sex`, `version`, `os`, `limit_chat`, `color_chat`, `id_question`, `type_question`, `md5`, `id_device`,`links`) VALUES ('$question', '$answer', '0', '0', '$sex', '$lang', '0', '0', '0', '$character_sex', '2', '$os', '$limit_chat','$color', '$pater', '$pater_type', '$md5', '$id_device','$link_chat');");
        echo "Add command success!!!";
    }
    exit;
}

if($function=='list_radio'){
    $arr_radio=array();
    $query_list_radio=mysqli_query($link,"SELECT * FROM `app_my_girl_radio` WHERE `lang`='$lang' ORDER BY RAND()  LIMIT 20");
    while ($radio=mysqli_fetch_assoc($query_list_radio)) {
        $radio["icon"]=$url."/thumb.php?src=".$url."/app_mygirl/obj_radio/icon_".$radio['id'].".png&size=50x50&trim=1";
        array_push($arr_radio,$radio);
    }
    echo json_encode($arr_radio);
    exit;
}
?>