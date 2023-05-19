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
    exit;
}

if($function=='get_ask'){
    $q_msg=mysqli_query($link,"SELECT `id`, `chat`, `face`, `action`,`color` FROM carrotsy_virtuallover.`app_my_girl_msg_$lang` WHERE ((`limit_date`= '$limit_date' AND `limit_month` = '$limit_month' AND `limit_day`='') OR (`limit_month`='$limit_month' AND `limit_date`='0' AND `limit_day`='') OR (`limit_month`='0'  AND `limit_date`='0'  AND `limit_day`='') OR (`limit_month`='0'  AND `limit_date`='0'  AND `limit_day`='$limit_day')) AND `func`='bat_chuyen' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  ORDER BY RAND() LIMIT 1");
    $data_msg=get_msg_by_query($q_msg,$lang);   
    if($data_msg==null) $data_msg=get_msg($link,'bat_chuyen',$lang,$sex,$character_sex,'','',$limit_month);
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
            $txt_query_pater="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer`,`color` FROM `app_my_girl_$lang` WHERE `text`='$text' AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`='$pater' AND `pater_type`='$pater_type'  AND `limit_chat` <= $limit_chat AND `disable`=0 ORDER BY RAND() LIMIT 1";
            $data_chat=get_chat($link,$txt_query_pater,$lang);
        }
    }

    if($data_chat==null){
        $txt_query_pater="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer`,`color` FROM `app_my_girl_$lang` WHERE `text` LIKE '%$text' AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`='$pater' AND `pater_type`='$pater_type'  AND `limit_chat` <= $limit_chat AND `disable`=0 ORDER BY RAND() LIMIT 1";
        $data_chat=get_chat($link,$txt_query_pater,$lang);
    }

    if($data_chat==null){
        $txt_query_pater="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer`,`color` FROM `app_my_girl_$lang` WHERE MATCH (`text`) AGAINST ('$text' IN BOOLEAN MODE) AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`='$pater' AND `pater_type`='$pater_type'  AND `limit_chat` <= $limit_chat AND `disable`=0 ORDER BY RAND() LIMIT 1";
        $data_chat=get_chat($link,$txt_query_pater,$lang);
    }

    if($data_chat==null){
        $txt_query_chat="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer`,`color` FROM `app_my_girl_$lang` WHERE `text`='$text' AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`='' AND `limit_chat` <= $limit_chat AND `disable`=0 ORDER BY RAND() LIMIT 1";
        $data_chat=get_chat($link,$txt_query_chat,$lang);
    }

    if($data_chat==null){
        $txt_query_chat="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer`,`color` FROM `app_my_girl_$lang` WHERE `text` LIKE '%$text%' AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`='' AND `limit_chat` <= $limit_chat AND `disable`=0 ORDER BY RAND() LIMIT 1";
        $data_chat=get_chat($link,$txt_query_chat,$lang);
    }

    if($data_chat==null){
        $txt_query_chat="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer`,`color` FROM `app_my_girl_$lang` WHERE MATCH (`text`) AGAINST ('$text' IN BOOLEAN MODE) AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`=''  AND `limit_chat` <= $limit_chat AND `disable`=0 ORDER BY RAND() LIMIT 1";
        $data_chat=get_chat($link,$txt_query_chat,$lang);
    }

    if($data_chat==null) {
        $data_chat=get_msg($link,'bam_bay',$lang,$sex,$character_sex,$limit_day,$limit_date,'');
    }

    mysqli_query($link,"INSERT INTO `app_my_girl_key` (`key`, `lang`,`sex`,`dates`,`os`,`character`,`character_sex`,`version`,`id_question`,`type_question`,`id_device`,`location_lon`,`location_lat`) VALUES ('$text', '$lang','$sex','$date_cur','$os','0',$character_sex,'3','$pater','$pater_type','$id_device','','');");

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
    $query_get_command_offline=mysqli_query($link,"SELECT `text`,`chat`,`effect`,`action`,`face`,`color`,`effect_customer`,`link` FROM `app_my_girl_$lang` WHERE `id_redirect` = '' AND `pater` = '' AND `pater_type` = '' AND `sex` = '$sex' AND `character_sex` = '$character_sex' AND `limit_day` <=$limit_chat AND `effect`!='2' ORDER BY RAND() LIMIT 50");
    while($data_offline=mysqli_fetch_assoc($query_get_command_offline)){
        array_push($arr_data_offline,$data_offline);
    }
    echo json_encode($arr_data_offline);
}

if($function=='hit'){
    $q_msg=mysqli_query($link,"SELECT `id`, `chat`, `face`, `action`,`color` FROM carrotsy_virtuallover.`app_my_girl_msg_$lang` WHERE ((`limit_date`= '$limit_date' AND `limit_month` = '$limit_month' AND `limit_day`='') OR (`limit_month`='$limit_month' AND `limit_date`='0' AND `limit_day`='') OR (`limit_month`='0'  AND `limit_date`='0'  AND `limit_day`='') OR (`limit_month`='0'  AND `limit_date`='0'  AND `limit_day`='$limit_day')) AND `func`='dam' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  ORDER BY RAND() LIMIT 1");
    $data_hit=get_msg_by_query($q_msg,$lang);
    if($data_hit==null) $data_hit=get_msg($link,'dam',$lang,$sex,$character_sex,'','',$limit_month);
    echo json_encode($data_hit);
    exit;
}

if($function=='get_list_music'){
    $info_type='';
    $info_val='';
    $search_music='';

    if(isset($_POST['info_type'])) $info_type=$_POST['info_type'];
    if(isset($_POST['info_val'])) $info_val=$_POST['info_val'];
    if(isset($_POST['search'])) $search_music=$_POST['search'];

    $arr_music=array();

    if($search_music!=""){
        $query_list_music=mysqli_query($link,"SELECT m.id,m.chat FROM `app_my_girl_$lang` as m WHERE `chat` LIKE '%$search_music%' AND `effect` = '2' LIMIT 20");
        if(mysqli_num_rows($query_list_music)==0){
            $query_list_music=mysqli_query($link,"SELECT m.id,m.chat FROM `app_my_girl_$lang` as m WHERE MATCH (`chat`) AGAINST ('$search_music')  AND `effect` = '2' LIMIT 20");
        }
    }else{
        if($info_type!='')
        $query_list_music=mysqli_query($link,"SELECT m.id,m.chat FROM app_my_girl_".$lang." as m INNER JOIN app_my_girl_".$lang."_lyrics as l ON m.id= l.id_music WHERE l.$info_type='$info_val' ORDER BY RAND() LIMIT 20");
        else
        $query_list_music=mysqli_query($link,"SELECT m.id,m.chat FROM app_my_girl_".$lang." as m INNER JOIN app_my_girl_".$lang."_lyrics as l ON m.id= l.id_music WHERE l.year='2020' ORDER BY RAND() LIMIT 20");
    }

    if(mysqli_num_rows($query_list_music)>0){
        while($music=mysqli_fetch_assoc($query_list_music)){
            $id_song=$music["id"];
            if(file_exists("../../app_mygirl/app_my_girl_".$lang."_img/".$id_song.".png")) $music['avatar']=$url_carrot_store."/app_mygirl/app_my_girl_".$lang."_img/".$id_song.".png";
            $music["url_edit"]=$url_carrot_store."/app_my_girl_update.php?id=".$id_song."&lang=".$lang;
            array_push($arr_music,$music);
        }
    }else{
        if($search_music!='') mysqli_query($link,"INSERT INTO `app_my_girl_log_key_music`(`key`, `lang`,`type`) VALUES ('$search_music', '$lang','1')");
    }

    echo json_encode($arr_music);
}

if($function=='get_info_music_by_type'){
    $info_type=$_POST['info_type'];
    $arr_info_music=array();
    if($info_type=='year')
        $query_list_music=mysqli_query($link,"SELECT `$info_type` FROM `app_my_girl_".$lang."_lyrics` WHERE `$info_type` != '' GROUP BY `$info_type` ORDER BY `year` DESC LIMIT 30");
    else
        $query_list_music=mysqli_query($link,"SELECT `$info_type` FROM `app_my_girl_".$lang."_lyrics` WHERE `$info_type` != '' GROUP BY `$info_type` ORDER BY RAND() LIMIT 30");

    while($music=mysqli_fetch_assoc($query_list_music)){
        $music['type']=$info_type;
        if($info_type=='genre')
        $music['link_share']=$url_carrot_store."/index.php?page_view=page_music.php&view=genre&lang=".$lang."&genre=".urldecode($music[$info_type]);
        else
        $music['link_share']=$url_carrot_store."/".$info_type."/".$lang."/".urldecode($music[$info_type]);
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
        if(file_exists("../../app_mygirl/obj_background/icon_".$bk['id'].".png")){
            $item=new stdClass();
            $item->{"icon"}=$url."/thumb.php?src=".$url."/app_mygirl/obj_background/icon_".$bk['id'].".png&size=50x80&trim=1";
            $item->{"link"}=$url."/app_mygirl/obj_background/icon_".$bk['id'].".png";
            array_push($arr_background,$item);
        }
    }
    echo json_encode($arr_background);
    exit;
}

if($function=='show_chat'){
    $id=$_POST['id'];
    $type=$_POST['type'];
    if($type=='chat'){
        $txt_query_show_chat="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer`,`color` FROM `app_my_girl_$lang` WHERE `id`='$id'  LIMIT 1";
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
    $user_id='';if(isset($_POST['user_id'])) $user_id=$_POST['user_id']; else $user_id=$id_device;
    $md5=md5(uniqid(rand(), true));
    $color='ffffff';

    if($answer!=''&&$question!=''){
        $query_add_command=mysqli_query($link,"INSERT INTO `app_my_girl_brain` (`question`, `answer`, `status`, `effect`, `sex`, `langs`, `face`, `action`, `author`, `character_sex`, `version`, `os`, `limit_chat`, `color_chat`, `id_question`, `type_question`, `md5`, `id_device`,`links`,`date_pub`) VALUES ('$question', '$answer', '0', '0', '$sex', '$lang', '0', '0', '0', '$character_sex', '2', '$os', '$limit_chat','$color', '$pater', '$pater_type', '$md5', '$user_id','$link_chat',NOW());");
        echo "Add command success!!!";
    }
    exit;
}

if($function=='add_command_by_dev'){
    $question=$_POST['question'];
    $answer=$_POST['answer'];
    $pater=$_POST['pater'];
    $pater_type=$_POST['pater_type'];
    $link_chat=$_POST['link'];
    $action=$_POST['action'];
    $face=$_POST['face'];
    $cm_limit=$_POST['cm_limit'];
    $user_id='';if(isset($_POST['user_id'])) $user_id=$_POST['user_id']; else $user_id=$id_device;
    $color='';if(isset($_POST['color'])) $color=$_POST['color']; else $color='#FFFFFF';
    $id_icon=$_POST['id_icon'];
    $id_func=$_POST['id_func'];
    $status='0';
    if($face=='0') $status='1';
    if($face=='1') $status='2';
    if($face=='2') $status='3';
    if($face=='3') $status='3';
    if($face=='4') $status='1';
    if($face=='5') $status='0';
    if($face=='6') $status='0';
    if($face=='7') $status='2';

    if($answer!=''&&$question!=''){
        mysqli_query($link,"INSERT INTO `app_my_girl_$lang` (`text`,`chat`,`author`,`sex`,`character_sex`,`color`,`user_create`,`link`,`pater`,`pater_type`,`action`,`face`,`limit_chat`,`effect_customer`,`effect`,`status`) VALUES ('$question','$answer','$lang','$sex','$character_sex','$color','$user_id','$link_chat','$pater','$pater_type','$action','$face','$cm_limit','$id_icon','$id_func','$status')");
        echo "Development mode: Đã thêm câu trò chuyện vào hệ thống!\n";
        echo "Face: ".$face." Status:".$status." func:".$id_func;
    }
    exit;
}

if($function=='list_radio'){
    $arr_radio=array();
    $query_list_radio=mysqli_query($link,"SELECT * FROM `app_my_girl_radio` WHERE `lang`='$lang' ORDER BY RAND()  LIMIT 20");
    while ($radio=mysqli_fetch_assoc($query_list_radio)) {
        if(file_exists("../../app_mygirl/obj_radio/icon_".$radio['id'].".png")) $radio["icon"]=$url_carrot_store."/thumb.php?src=".$url_carrot_store."/app_mygirl/obj_radio/icon_".$radio['id'].".png&size=50x50";
        array_push($arr_radio,$radio);
    }
    echo json_encode($arr_radio);
    exit;
}

if($function=='get_hello_and_notification_and_tip'){
    $obj_data=new stdClass();
    $hours=$_POST['hours'];

    $arr_tip=array();
    $query_list_tip_chat=mysqli_query($link,"SELECT `text` FROM `app_my_girl_$lang` WHERE `tip` = '1' AND `character_sex`='$character_sex' AND `sex`='$sex' LIMIT 50");
    while($tip=mysqli_fetch_assoc($query_list_tip_chat)){
        array_push($arr_tip,$tip['text']);
    }

    $obj_data->{"hello"}=get_msg($link,'chao_'.$hours,$lang,$sex,$character_sex,$limit_day,$limit_date,'');
    $obj_data->{"list_tip"}=$arr_tip;
    $obj_data->{"notification"}=get_msg($link,'thong_bao',$lang,$sex,$character_sex,$limit_day,$limit_date,'');
    echo json_encode($obj_data);
    exit;
}

if($function=='get_notice_back'){
    echo json_encode(get_msg($link,'tra_loi_thong_bao',$lang,$sex,$character_sex,$limit_day,$limit_date,''));
    exit;
}

if($function=='list_command_pass'){
    $user_id='';if(isset($_POST['user_id'])) $user_id=$_POST['user_id']; else $user_id=$id_device;
    $key_search='';if(isset($_POST['search'])) $key_search=$_POST['search'];
    $array_list=array();
    if(trim($key_search)!="")
        $query_list_command=mysqli_query($link,"SELECT `id`,`chat`,`text`,`author`,`action`,`face`,`limit_chat`,`link`,`color`,`effect_customer`,`pater`,`pater_type` FROM `app_my_girl_$lang` WHERE `chat` LIKE '%$key_search%' ORDER BY `id` DESC LIMIT 30");
    else
        $query_list_command=mysqli_query($link,"SELECT `id`,`chat`,`text`,`author`,`action`,`face`,`limit_chat`,`link`,`color`,`effect_customer`,`pater`,`pater_type` FROM `app_my_girl_$lang` WHERE (`user_create` = '$user_id') OR (`user_create` = '$id_device') ORDER BY `id` DESC LIMIT 30");

    while($command=mysqli_fetch_assoc($query_list_command)){
        array_push($array_list,$command);
    }
    echo json_encode($array_list);
    exit;
}

if($function=='list_command_pending'){
    $array_list=array();

    $query_list_command=mysqli_query($link,"SELECT `md5`,`question`,`answer`,`links`,`id_question`,`type_question`,`color_chat` FROM `app_my_girl_brain` WHERE `langs`='$lang' AND `sex`='$sex' AND `character_sex`='$character_sex' LIMIT 20");

    while($command=mysqli_fetch_assoc($query_list_command)){
        if($command['id_question']!=""){
            $id_question=$command['id_question'];
            $type_question=$command['type_question'];
            if($type_question=='chat')
                $query_chat_by_id=mysqli_query($link,"SELECT `chat` FROM `app_my_girl_$lang` WHERE `id` = '$id_question' LIMIT 1");
            else
                $query_chat_by_id=mysqli_query($link,"SELECT `chat` FROM `app_my_girl_msg_$lang` WHERE `id` = '$id_question' LIMIT 1");

            $data_chat=mysqli_fetch_assoc($query_chat_by_id);
            $command['msg_question']=$data_chat["chat"];
        }
        array_push($array_list,$command);
    }
    echo json_encode($array_list);
    exit;
}

if($function=='frm_list_same'){
    $list_command_same=array();
    $key_same=$_POST['key'];
    $query_list_command_same=mysqli_query($link,"SELECT `id`,`chat`,`text`,`author`,`action`,`face`,`limit_chat`,`link`,`color`,`effect_customer`,`pater`,`pater_type` FROM `app_my_girl_$lang` WHERE `text`='$key_same' AND `sex`='$sex' AND `character_sex`='$character_sex' LIMIT 1");
    while($command=mysqli_fetch_assoc($query_list_command_same)){
        array_push($list_command_same,$command);
    }
    echo json_encode($list_command_same);
    exit;
}

if($function=='delete_pending'){
    $id_pedding=$_POST['id_pedding'];
    $query_command=mysqli_query($link,"DELETE FROM `app_my_girl_brain` WHERE `md5`='$id_pedding'");
    if($query_command) echo 'Delete Success';
    else echo 'Delete Fail';
    exit;
}

if($function=='delete_command_pass'){
    $id_chat=$_POST['id_chat'];
    $lang_chat=$_POST['lang_chat'];
    $query_command=mysqli_query($link,"DELETE FROM `app_my_girl_$lang_chat` WHERE (`id` = '$id_chat');");
    if($query_command) echo 'Delete Command Pass Success!!!';
    else echo 'Delete Command Pass Fail!!!';
    exit;
}

if($function=='update_command_pass'){
    $id_chat=$_POST['id_chat'];
    $question=$_POST['question'];
    $answer=$_POST['answer'];
    $pater=$_POST['pater'];
    $pater_type=$_POST['pater_type'];
    $link_chat=$_POST['link'];
    $action=$_POST['action'];
    $face=$_POST['face'];
    $cm_limit=$_POST['cm_limit'];
    $color='';if(isset($_POST['color'])) $color=$_POST['color']; else $color='#FFFFFF';
    $id_icon=$_POST['id_icon'];
    $status='0';
    if($face=='0') $status='1';
    if($face=='1') $status='2';
    if($face=='2') $status='3';
    if($face=='3') $status='3';
    if($face=='4') $status='1';
    if($face=='5') $status='0';
    if($face=='6') $status='0';
    if($face=='7') $status='2';

    if($answer!=''&&$question!=''){
        mysqli_query($link,"UPDATE `app_my_girl_$lang` SET `text`='$question',`chat`='$answer',`color`='$color',`effect_customer`='$id_icon',`limit_chat`='$cm_limit',`link`='$link_chat' WHERE `id`='$id_chat' LIMIT 1;");
        echo "Update Success!!!\n";
    }
    exit;
}

if($function=='list_emoji_and_color'){
    $arr_icon=array();
    $key_search='';if(isset($_POST['search'])) $key_search=$_POST['search'];
    if($key_search=="")
        $query_list_icon=mysqli_query($link,"SELECT `id`,`name`,`color` FROM `app_my_girl_effect` ORDER BY RAND() LIMIT 30");
    else
        $query_list_icon=mysqli_query($link,"SELECT `id`,`name`,`color` FROM `app_my_girl_effect` WHERE `id` LIKE '%$key_search%' OR `name` LIKE '%$key_search%' ORDER BY RAND() LIMIT 30");

    while($emoj=mysqli_fetch_assoc($query_list_icon)){
        $url_icon_emoj=$url_carrot_store."/thumb.php?src=".$url_carrot_store."/app_mygirl/obj_effect/".$emoj["id"].".png&size=16&trim=1";
        $emoj["url_icon"]=$url_icon_emoj;
        $emoj["link_edit"]=$url.'/app_my_girl_effect.php?edit='.$emoj["id"];
        array_push($arr_icon,$emoj);
    }
    echo json_encode($arr_icon);
    exit;
}

if($function=='get_chat_info'){
    $id_chat=$_POST['id_chat'];
    $type_chat=$_POST['type_chat'];

    $s_query="";
    if($type_chat=="chat")
        $s_query="SELECT `user_create`, `author`, `id`,`chat` FROM `app_my_girl_$lang` WHERE `id` = '$id_chat' LIMIT 1";
    else
        $s_query="SELECT `user_create`, `author`, `id`,`chat` FROM `app_my_girl_msg_$lang` WHERE `id` = '$id_chat' LIMIT 1";

    $query_info=mysqli_query($link,$s_query);
    $data_info=mysqli_fetch_assoc($query_info);

    $id_user_chat=$data_info['user_create'];
    if($id_user_chat!=""){
        $query_user=mysqli_query($link,"SELECT `name` FROM `app_my_girl_user_$lang` WHERE `id_device` = '$id_user_chat' AND `status` = '0'  LIMIT 1");
        if(mysqli_num_rows($query_user)>0){
            $data_user=mysqli_fetch_assoc($query_user);
            $data_info["user_name"]=$data_user["name"];
            $data_info["user_avatar"]=get_url_avatar_user_thumb($id_user_chat,$lang,"80x80");
        }
    }

    $data_info["type_chat"]=$type_chat;
    $data_info["link_share"]="mylover://data?%7B%22function%22%3A%22show_chat%22%2C%22lang%22%3A%22".$lang."%22%2C%22id%22%3A%22".$id_chat."%22%2C%22type%22%3A%22".$type_chat."%22%2C%22host%22%3A%22carrotstore.com%22%7D";
    echo json_encode($data_info);
    exit;
}

if($function=='update_sapphire'){
    $user_id='';if(isset($_POST['user_id'])) $user_id=$_POST['user_id']; else $user_id=$id_device;
    $sapphire=$_POST["sapphire"];
    $q_check_sapphire=mysqli_query($link,"SELECT COUNT(`user_id`) as c FROM `app_my_girl_user_".$lang."_data` WHERE `user_id` = '$user_id' LIMIT 1");
    $c_count_user=mysqli_fetch_assoc($q_check_sapphire);
    if(intval($c_count_user['c'])>0){
        mysqli_query($link,"UPDATE `app_my_girl_user_".$lang."_data` SET `sapphire` = '$sapphire' WHERE `user_id` = '$user_id' LIMIT 1;");
    }else{
        mysqli_query($link,"INSERT INTO `app_my_girl_user_".$lang."_data` (`user_id`, `sapphire`) VALUES ('$user_id', '$sapphire')");
    }
    exit;
}

if($function=='add_pending_pass'){
    $id_chat_brain=$_POST['id_chat_brain'];
    $question=$_POST['question'];
    $answer=$_POST['answer'];
    $pater=$_POST['pater'];
    $pater_type=$_POST['pater_type'];
    $link_chat=$_POST['link'];
    $action=$_POST['action'];
    $face=$_POST['face'];
    $cm_limit=$_POST['cm_limit'];
    $user_id='';if(isset($_POST['user_id'])) $user_id=$_POST['user_id']; else $user_id=$id_device;
    $color='';if(isset($_POST['color'])) $color=$_POST['color']; else $color='#FFFFFF';
    $id_icon=$_POST['id_icon'];
    $id_func=$_POST['id_func'];
    $status='0';
    if($face=='0') $status='1';
    if($face=='1') $status='2';
    if($face=='2') $status='3';
    if($face=='3') $status='3';
    if($face=='4') $status='1';
    if($face=='5') $status='0';
    if($face=='6') $status='0';
    if($face=='7') $status='2';

    if($answer!=''&&$question!=''){
        $query_add=mysqli_query($link,"INSERT INTO `app_my_girl_$lang` (`text`,`chat`,`author`,`sex`,`character_sex`,`color`,`user_create`,`link`,`pater`,`pater_type`,`action`,`face`,`limit_chat`,`effect_customer`,`effect`,`status`) VALUES ('$question','$answer','$lang','$sex','$character_sex','$color','$user_id','$link_chat','$pater','$pater_type','$action','$face','$cm_limit','$id_icon','$id_func','$status')");
        if($query_add) echo 'Add Command Pending Success!!!\n';
        else echo 'Add Command Pending Fail!\n';

        $query_del=mysqli_query($link,"DELETE FROM `app_my_girl_brain` WHERE `md5` = '$id_chat_brain'  LIMIT 1;");
        if($query_del) echo "Delete Brain success!";
        else echo "Delete Brain success!";
    }
    exit;
}

if($function=='list_social'){
    $arr_sc=array();
    $q_list_social=mysqli_query($link,"SELECT * FROM `app_my_girl_user_".$lang."_data` LIMIT 50");
    $num_top=0;
    while($sc=mysqli_fetch_assoc($q_list_social)){
        $q_user=mysqli_query($link,"SELECT `name` FROM `app_my_girl_user_vi` WHERE `id_device` = '730a8bef7874ba6f7b72baf5491f0eb390616970' LIMIT 1");
        $data_user=mysqli_fetch_assoc($q_user);
        if($data_user!=null){
            $num_top++;
            $sc["num_top"]=$num_top;
            $sc["user_name"]=$data_user["name"];
            array_push($arr_sc,$sc);
        }
    }
    echo json_encode($arr_sc);
    exit;
}
?>