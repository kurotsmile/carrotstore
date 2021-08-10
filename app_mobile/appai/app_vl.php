<?php
$date_cur=date("Y-m-d");
include_once "carrot_framework_vl.php";

$sex='';if(isset($_POST['sex'])) $sex=$_POST['sex'];
$character_sex='';if(isset($_POST['character_sex'])) $character_sex=$_POST['character_sex'];
$limit_chat=4;if(isset($_POST['limit_chat'])) $limit_chat=$_POST['limit_chat'];

function get_lang_app($key,$lang){
    global $link;
    $val=$key;
    $q_val_lang=mysqli_query($link,"SELECT `value` FROM carrotsy_virtuallover.`app_my_girl_key_lang` WHERE `key`='$key' AND `lang`='$lang' LIMIT 1");
    $val_lang=mysqli_fetch_assoc($q_val_lang);
    if($val_lang!=null) $val=$val_lang['value'];
    return $val;
}

function get_data_chat($q_result,$type_chat,$lang_chat){
    global $url_carrot_store;
    global $link;
    $data_chat=mysqli_fetch_assoc($q_result);
    if($data_chat!=null){
        if($type_chat=='chat'){
        if($data_chat['id_redirect']!=""){
            $id_chat=$data_chat['id_redirect'];
            $q_chat=mysqli_query($link,"SELECT `id`,`chat`,`character_sex`,`face`,`action`,`id_redirect`,`effect`,`file_url`,`func_sever`,`effect_customer`,`status`,`color`,`vibrate` FROM carrotsy_virtuallover.`app_my_girl_$lang_chat` WHERE `id`='$id_chat' LIMIT 1");
            $data_chat=mysqli_fetch_assoc($q_chat);
            if($data_chat==null) return null;
        }}
        $data_chat["lang"]=$lang_chat;
        $id_chat=$data_chat["id"];
        $txt_chat=$data_chat["chat"];
        $character_sex_chat=$data_chat["character_sex"];
        $data_chat["id_chat"]=$id_chat;
        $data_chat["type_chat"]=$type_chat;
        if($data_chat['effect']=='2'){
            $q_data_music=mysqli_query($link,"SELECT `lyrics`, `artist`, `album`, `year`, `genre` FROM carrotsy_virtuallover.`app_my_girl_".$lang_chat."_lyrics` WHERE `id_music`='$id_chat' LIMIT 1");
            $data_music=mysqli_fetch_assoc($q_data_music);
            if($data_music!=null){
                $data_chat["data_text"]=$data_music['lyrics'];
                $data_chat["artist"]=$data_music['artist'];
                $data_chat["year"]=$data_music['year'];
                $data_chat["genre"]=$data_music['genre'];
                $data_chat["album"]=$data_music['album'];
                if(file_exists("../../app_mygirl/app_my_girl_'.$lang_chat.'_img/'.$id_chat.'.png"))
                    $data_chat['avatar_music']=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/app_my_girl_'.$lang_chat.'_img/'.$id_chat.'.png&size=100x100&trim=1';
                else
                    $data_chat['avatar_music']=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/product_data/123/icon.jpg&size=100x100&trim=1';
            }else{
                $data_chat["data_text"]="";
                $data_chat["artist"]="";
                $data_chat["year"]="";
                $data_chat["genre"]="";
                $data_chat["album"]="";
                $data_chat['avatar_music']="";
            }
            $q_video_music=mysqli_query($link,"SELECT `link` FROM carrotsy_virtuallover.`app_my_girl_video_$lang_chat` WHERE `id_chat`='$id_chat' LIMIT 1");
            $data_video_music=mysqli_fetch_assoc($q_video_music);
            $data_chat['video']=$data_video_music['link'];
        }

        $path_mp3_audio="";
        if($type_chat=='chat')
            $path_mp3_audio="app_mygirl/app_my_girl_$lang_chat/".$id_chat.".mp3";
        else
            $path_mp3_audio="app_mygirl/app_my_girl_msg_$lang_chat/".$id_chat.".mp3";

        if(file_exists("../../$path_mp3_audio"))
            $data_chat["mp3"]=$url_carrot_store.'/'.$path_mp3_audio;
        else{
            $type_voice=get_lang_app("voice_character_sex_".$character_sex_chat,$lang_chat);
            if($type_voice=="google")
                $data_chat["mp3"]=$type_voice;
            else
                $data_chat["mp3"]=$url_carrot_store.'/alert.mp3';
        }

        if($data_chat['effect_customer']!=""){
            $id_effect_customer=$data_chat['effect_customer'];
            if(file_exists("../../app_mygirl/obj_effect/$id_effect_customer.png"))
            $data_chat['effect_customer']=$url_carrot_store."/app_mygirl/obj_effect/$id_effect_customer.png";
        }

        $check_field_chat=mysqli_query($link,"SELECT `data`,`option` FROM carrotsy_virtuallover.`app_my_girl_field_$lang_chat` WHERE `id_chat`='$id_chat' AND `type_chat`='$type_chat' LIMIT 1");
        if (mysqli_num_rows($check_field_chat) > 0) {
            $data_field=mysqli_fetch_assoc($check_field_chat);
            $arr_data_field=json_decode($data_field['data']);
            if ($data_field['option'] == '1') shuffle($arr_data_field);
            $data_chat['field_chat']=$arr_data_field;
        }
    }
    return $data_chat;
}

function get_lyrics_song($link,$text,$lang){
    $data_song=null;
    $query_lyrics=mysqli_query($link,"SELECT `id_music` FROM `app_my_girl_".$lang."_lyrics` WHERE `lyrics` LIKE '%$text%' LIMIT 1");
    $data_lyrics=mysqli_fetch_assoc($query_lyrics);
    if($data_lyrics!=null){
        $id_music=$data_lyrics['id_music'];
        $txt_query_music=mysqli_query($link,"SELECT `id`,`chat`,`character_sex`,`face`,`action`,`id_redirect`,`effect`,`file_url`,`func_sever`,`effect_customer`,`status`,`color`,`vibrate` FROM `app_my_girl_$lang` WHERE `id`='$id_music'  AND `disable`=0  LIMIT 1");
        $data_song=get_data_chat($txt_query_music,'chat',$lang);
    }else{
        $query_list_lang=mysqli_query($link,"SELECT `key` FROM `app_my_girl_country` WHERE `key` != '$lang' AND `active` = '1'");
        while($item_lang=mysqli_fetch_array($query_list_lang)){
            $lang_key=$item_lang['key'];
            $query_lyrics=mysqli_query($link,"SELECT `id_music` FROM `app_my_girl_".$lang_key."_lyrics` WHERE `lyrics` LIKE '%$text%' LIMIT 1");
            $data_lyrics=mysqli_fetch_assoc($query_lyrics);
            if($data_lyrics!=null){
                $id_music=$data_lyrics['id_music'];
                $txt_query_music=mysqli_query($link,"SELECT `id`,`chat`,`character_sex`,`face`,`action`,`id_redirect`,`effect`,`file_url`,`func_sever`,`effect_customer`,`status`,`color`,`vibrate` FROM `app_my_girl_$lang_key` WHERE `id`='$id_music'  AND `disable`=0  LIMIT 1");
                $data_song=get_data_chat($txt_query_music,'chat',$lang);
                if($data_song!=null) break;
            }
        }
    }
    return $data_song;
}

function arithmetic($expression)
{
	$temp_op = preg_replace('([^\\+\\-*\\/%\\^])', ' ', trim($expression));
	$temp_op = explode(' ', trim($temp_op));
	foreach ($temp_op as $key => $val) if ($val) $operators[] = $val;
	$numbers = preg_replace('([^0-9])', ' ', trim($expression));
	$numbers = explode(' ', $numbers);$i = 0;
	foreach ($numbers AS $key => $val)
	{
		if ($key == 0){ $answer = $val;continue;}
		if ($val)
		{
			switch ($operators[$i])
			{
				case '+':$answer += $val;break;
				case '-':$answer -= $val;break;
				case '*':$answer *= $val;break;
				case '/': $answer /= $val; break;
                case '^': $answer ^= $val;break;
				case '%': $answer %= $val;
			}
			$i++;
		}
	}
	return $answer;
}

if($function=="chao"){
    $hour=$_POST['hour'];
    $obj_chat=new stdClass();
    $q_msg=mysqli_query($link,"SELECT `id`, `chat`, `status`, `character_sex`, `effect`, `effect_customer`, `color`, `vibrate` FROM carrotsy_virtuallover.`app_my_girl_msg_$lang` WHERE `func`='chao_$hour' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  LIMIT 1");
    $obj_chat->{"chat"}=get_data_chat($q_msg,"msg",$lang);

    $arr_tip=array();
    $q_tip=mysqli_query($link,"SELECT `text` FROM carrotsy_virtuallover.`app_my_girl_$lang` WHERE `tip`='1' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  LIMIT 20");
    while($tip=mysqli_fetch_assoc($q_tip)){
        array_push($arr_tip,$tip['text']);
    }
    $obj_chat->{"tip_chat"}=$arr_tip;
    echo json_encode($obj_chat);
    echo var_dump($_POST);
    exit;
}

if($function=='bat_chuyen'){
    $day_week=$_POST['day_week'];
    $months=$_POST['months'];
    $dates=$_POST['dates'];

    $obj_chat=new stdClass();
    $q_msg=mysqli_query($link,"SELECT `id`, `chat`, `status`, `character_sex`, `effect`, `effect_customer`, `color`, `vibrate` FROM carrotsy_virtuallover.`app_my_girl_msg_$lang` WHERE ((`limit_date`= '$dates' AND `limit_month` = '$months' AND `limit_day`='') OR (`limit_month`='$months' AND `limit_date`='0' AND `limit_day`='') OR (`limit_month`='0'  AND `limit_date`='0'  AND `limit_day`='') OR (`limit_month`='0'  AND `limit_date`='0'  AND `limit_day`='$day_week')) AND `func`='bat_chuyen' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  ORDER BY RAND() LIMIT 1");
    $obj_chat->{"chat"}=get_data_chat($q_msg,"msg",$lang);
    echo json_encode($obj_chat);
    exit;
}

if($function=="chat"){
    $id_question=$_POST['id_question'];
    $type_question=$_POST['type_question'];
    $limit_chat=$_POST['limit_chat'];
    $func_server=$_POST['func_server'];

    $text=addslashes($_POST['text']);
    $obj_chat=new stdClass();
    $data_chat=null;

    if($func_server=='tim_nhac'){
        $q_chat=mysqli_query($link,"SELECT `id`,`chat`,`character_sex`,`face`,`action`,`id_redirect`,`effect`,`file_url`,`func_sever`,`effect_customer`,`status`,`color`,`vibrate` FROM `app_my_girl_$lang` WHERE MATCH (chat)  AGAINST ('$text' IN BOOLEAN MODE)  AND `pater`='' AND `effect` = '2' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  LIMIT 1");
        $data_chat=get_data_chat($q_chat,"chat",$lang);
    }
    
    if($func_server=='tim_danh_ba'){
        $list_contact=array();
        $q_user=mysqli_query($link,"SELECT `name`, `sex`, `id_device`, `address`, `sdt` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE (`sdt` LIKE '%$text%' OR `name` LIKE '%$text%') AND `status`='0' ORDER BY RAND() LIMIT 50");
        while($u=mysqli_fetch_assoc($q_user)){
            $u['lang']=$lang;
            array_push($list_contact,$u);
        }
        if(count($list_contact)>0){
            $q_msg=mysqli_query($link,"SELECT `id`, `chat`, `status`, `character_sex`, `effect`, `effect_customer`, `color`, `vibrate` FROM carrotsy_virtuallover.`app_my_girl_msg_$lang` WHERE `func`='hien_ds_sdt' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  ORDER BY RAND() LIMIT 1");
            $data_chat=get_data_chat($q_msg,"msg",$lang);
            $obj_chat->{"list_contact"}=$list_contact;
        }else{
            $q_msg=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_msg_$lang` WHERE `func`='khong_tim_thay' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  ORDER BY RAND() LIMIT 1");
            $data_chat=get_data_chat($q_msg,"msg",$lang);
        }
    }

    if($func_server=='tim_duong'){
        $q_msg=mysqli_query($link,"SELECT `id`, `chat`, `status`, `character_sex`, `effect`, `effect_customer`, `color`, `vibrate` FROM carrotsy_virtuallover.`app_my_girl_msg_$lang` WHERE `func`='tra_loi_tim_duong' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  ORDER BY RAND() LIMIT 1");
        $data_chat=get_data_chat($q_msg,"msg",$lang);
        $data_chat['link']="https://maps.google.com/maps?q=".urlencode($text);
        $data_chat=$data_chat;
    }

    if($func_server=='tim_loi_nhac'){
        $data_chat=get_lyrics_song($link,$text,$lang);
        $data_chat=$data_chat;
    }

    $math=arithmetic($text);
    if($math!=""&&$data_chat==null){
        $q_msg=mysqli_query($link,"SELECT `id`, `chat`, `status`, `character_sex`, `effect`, `effect_customer`, `color`, `vibrate` FROM carrotsy_virtuallover.`app_my_girl_msg_$lang` WHERE `func`='giai_toan' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  ORDER BY RAND() LIMIT 1");
        $data_chat=get_data_chat($q_msg,"msg",$lang);
        $msg_chat=str_replace('{giai_toan}',$math,$data_chat['chat']);
        $data_chat['chat']=$msg_chat;
        $data_chat=$data_chat;
    }

    if($id_question!=""&&$data_chat==null){
        $q_chat=mysqli_query($link,"SELECT `id`,`chat`,`character_sex`,`face`,`action`,`id_redirect`,`effect`,`file_url`,`func_sever`,`effect_customer`,`status`,`color`,`vibrate` FROM `app_my_girl_$lang` WHERE `text`='$text' AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`='$id_question' AND `pater_type`='$type_question'  AND `limit_chat` <= $limit_chat AND `disable`=0 ORDER BY RAND() LIMIT 1");
        $data_chat=get_data_chat($q_chat,"chat",$lang);

        if($data_chat==null){
            $q_chat=mysqli_query($link,"SELECT `id`,`chat`,`character_sex`,`face`,`action`,`id_redirect`,`effect`,`file_url`,`func_sever`,`effect_customer`,`status`,`color`,`vibrate` FROM `app_my_girl_$lang` WHERE `text` LIKE '%$text%' AND `character_sex`='$character_sex' AND `sex`='$sex' AND `pater`='$id_question' AND `pater_type`='$type_question'  AND `limit_chat` <= $limit_chat AND `disable`=0 ORDER BY RAND() LIMIT 1");
            $data_chat=get_data_chat($q_chat,"chat",$lang);
        }
    }

    if($data_chat==null){
        $q_chat=mysqli_query($link,"SELECT `id`,`chat`,`character_sex`,`face`,`action`,`id_redirect`,`effect`,`file_url`,`func_sever`,`effect_customer`,`status`,`color`,`vibrate` FROM carrotsy_virtuallover.`app_my_girl_$lang` WHERE `text`='$text' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  ORDER BY RAND() LIMIT 1");
        $data_chat=get_data_chat($q_chat,"chat",$lang);
    }

    if($data_chat==null){
        $q_chat=mysqli_query($link,"SELECT `id`,`chat`,`character_sex`,`face`,`action`,`id_redirect`,`effect`,`file_url`,`func_sever`,`effect_customer`,`status`,`color`,`vibrate` FROM carrotsy_virtuallover.`app_my_girl_$lang` WHERE `text` LIKE '%$text%' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  ORDER BY RAND() LIMIT 1");
        $data_chat=get_data_chat($q_chat,"chat",$lang);
    }

    if($data_chat==null){
        $q_bambay=mysqli_query($link,"SELECT `id`, `chat`, `status`, `character_sex`, `effect`, `effect_customer`, `color`, `vibrate` FROM carrotsy_virtuallover.`app_my_girl_msg_$lang` WHERE `func` = 'bam_bay' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  ORDER BY RAND() LIMIT 1");
        $data_chat=get_data_chat($q_bambay,"msg",$lang);
    }

    $obj_chat->{"chat"}=$data_chat;
    echo json_encode($obj_chat);
    exit;
}

if($function=='show_chat'){
    $id_chat=$_POST['id_chat'];
    $lang_chat=$lang;
    if(isset($_POST['lang_chat'])) $lang_chat=$_POST['lang_chat'];
    $obj_chat=new stdClass();
    $q_chat=mysqli_query($link,"SELECT `id`,`chat`,`character_sex`,`face`,`action`,`id_redirect`,`effect`,`file_url`,`func_sever`,`effect_customer`,`status`,`color`,`vibrate` FROM carrotsy_virtuallover.`app_my_girl_$lang_chat` WHERE `id`='$id_chat' LIMIT 1");
    $obj_chat->{"chat"}=get_data_chat($q_chat,"chat",$lang_chat);
    echo json_encode($obj_chat);
    exit;
}

if($function=='chat_tip'){
    $text=$_POST['text'];
    $obj_chat=new stdClass();
    $q_chat=mysqli_query($link,"SELECT `id`,`chat`,`character_sex`,`face`,`action`,`id_redirect`,`effect`,`file_url`,`func_sever`,`effect_customer`,`status`,`color`,`vibrate` FROM carrotsy_virtuallover.`app_my_girl_$lang` WHERE `text`='$text' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  ORDER BY RAND() LIMIT 1");
    $obj_chat->{"chat"}=get_data_chat($q_chat,"chat",$lang);
    echo json_encode($obj_chat);
    exit;
}

if($function=='hit'){
    $day_week=$_POST['day_week'];
    $months=$_POST['months'];
    $dates=$_POST['dates'];

    $obj_chat=new stdClass();
    $q_msg=mysqli_query($link,"SELECT `id`, `chat`, `status`, `character_sex`, `effect`, `effect_customer`, `color`, `vibrate` FROM carrotsy_virtuallover.`app_my_girl_msg_$lang` WHERE ((`limit_date`= '$dates' AND `limit_month` = '$months' AND `limit_day`='') OR (`limit_month`='$months' AND `limit_date`='0' AND `limit_day`='') OR (`limit_month`='0'  AND `limit_date`='0'  AND `limit_day`='') OR (`limit_month`='0'  AND `limit_date`='0'  AND `limit_day`='$day_week')) AND  `func`='dam' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  ORDER BY RAND() LIMIT 1");
    $obj_chat->{"chat"}=get_data_chat($q_msg,"msg",$lang);
    echo json_encode($obj_chat);
    exit;
}

if($function=='list_background'){
    $id_sub_menu=$_POST['id_sub_menu'];
    $obj=new stdClass();
    $list_background=array();

    $q_bk=null;
    if($id_sub_menu!="")
        $q_bk=mysqli_query($link,"SELECT `id` FROM carrotsy_virtuallover.`app_my_girl_background` WHERE `version`='1' AND `category`='$id_sub_menu' ORDER BY RAND() LIMIT 27");
    else
        $q_bk=mysqli_query($link,"SELECT `id` FROM carrotsy_virtuallover.`app_my_girl_background` WHERE `version`='1' ORDER BY RAND() LIMIT 27");

    while($bk=mysqli_fetch_assoc($q_bk)){
        $bk_id=$bk['id'];
        $bk["url"]=$url_carrot_store."/app_mygirl/obj_background/icon_".$bk_id.".png";
        $bk["url_thumb"]=$url_carrot_store."/thumb.php?src=".$url_carrot_store."/app_mygirl/obj_background/icon_".$bk_id.".png&size=80x39&trim=1";
        array_push($list_background,$bk);
    }

    $list_category=mysqli_query($link,"SELECT `id`,`name` FROM carrotsy_virtuallover.`app_my_girl_bk_category` WHERE `app`='0'  ORDER BY RAND() LIMIT 10");
    $list_cat_bk=array();
    while ($cat_bk=mysqli_fetch_array($list_category)) {
        $color_select='000000';
        $cat_bk_name=get_lang_app($cat_bk['name'],$lang);
        if ($id_sub_menu == $cat_bk['id']) $color_select='8B0000';
        $item_menu_cat=Array($cat_bk['id'], '1', 'msg_box_func', $cat_bk_name, $color_select);
        array_push($list_cat_bk, $item_menu_cat);
    }
    $obj->{"list_bk"}=$list_background;
    $obj->{"list_menu"}=$list_cat_bk;
    echo json_encode($obj);
    exit;
}

if ($function=='next_music') {
    $obj_chat=new stdClass();
    $q_chat=mysqli_query($link,"SELECT `id`,`chat`,`character_sex`,`face`,`action`,`id_redirect`,`effect`,`file_url`,`func_sever`,`effect_customer`,`status`,`color`,`vibrate` FROM carrotsy_virtuallover.`app_my_girl_$lang` WHERE `effect`='2' ORDER BY RAND() LIMIT 1");
    $obj_chat->{"chat"}=get_data_chat($q_chat,"chat",$lang);
    echo json_encode($obj_chat);
    exit;
}

if($function=='list_music'){
    $key_seach=trim($_POST['key_seach']);
    $search_option="0";if(isset($_POST['search_option'])) $search_option=$_POST['search_option'];
    $list_music=array();

    if($key_seach==''){
        $q_music=mysqli_query($link,"SELECT `id`,`chat`,`character_sex`,`face`,`action`,`id_redirect`,`effect`,`file_url`,`func_sever`,`effect_customer`,`status`,`color`,`vibrate` FROM carrotsy_virtuallover.`app_my_girl_$lang` WHERE `effect`='2' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  ORDER BY RAND() LIMIT 30");
        while($m=mysqli_fetch_assoc($q_music)){
            $m_id=$m['id'];
            $m['id_chat']=$m_id;
            $m['lang_chat']=$lang;
            array_push($list_music,$m);
        }
    }else{
        $q_log_key=mysqli_query($link,"INSERT INTO carrotsy_virtuallover.`app_my_girl_log_key_music` (`key`, `lang`, `type`) VALUES ('$key_seach','$lang','$search_option');");
        if($search_option=='0'){
            $q_music=mysqli_query($link,"SELECT `id`,`chat`,`character_sex`,`face`,`action`,`id_redirect`,`effect`,`file_url`,`func_sever`,`effect_customer`,`status`,`color`,`vibrate` FROM carrotsy_virtuallover.`app_my_girl_$lang` WHERE `chat` LIKE '%$key_seach%' AND `effect`='2' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  ORDER BY RAND() LIMIT 30");
            while($m=mysqli_fetch_assoc($q_music)){
                $m_id=$m['id'];
                $m['id_chat']=$m_id;
                $m['lang_chat']=$lang;
                array_push($list_music,$m);
            }
        }else{
            $q_country=mysqli_query($link,"SELECT `id`,`name`,`key` FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `ver0`=1");
            while($c=mysqli_fetch_assoc($q_country)){
                $c_key=$c['key'];
                $q_music=mysqli_query($link,"SELECT `id`,`chat`,`character_sex`,`face`,`action`,`id_redirect`,`effect`,`file_url`,`func_sever`,`effect_customer`,`status`,`color`,`vibrate` FROM carrotsy_virtuallover.`app_my_girl_$c_key` WHERE `chat` LIKE '%$key_seach%' AND `effect`='2' AND `limit_chat` <= $limit_chat  AND `disable` = '0'  ORDER BY RAND() LIMIT 3");
                while($m=mysqli_fetch_assoc($q_music)){
                    $m_id=$m['id'];
                    $m['id_chat']=$m_id;
                    $m['lang_chat']=$c_key;
                    array_push($list_music,$m);
                }
            }
        }
    }

    echo json_encode($list_music);
    exit;
}

if($function=='list_contact'){
    $list_contact=array();
    $q_user=mysqli_query($link,"SELECT `name`, `sex`, `id_device`, `address`, `sdt` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `sdt` != '' AND `address` != '' AND `status`='0' ORDER BY RAND() LIMIT 50");
    while($u=mysqli_fetch_assoc($q_user)){
        $u_id=$u['id_device'];
        $u["lang"]=$lang;
        $u["id"]=$u_id;
        $u["avatar"]=get_url_avatar_user_thumb($u_id,$lang,'100x60');
        array_push($list_contact,$u);
    }
    echo json_encode($list_contact);
    exit;
}

if($function=='list_person'){
    $sex=$_POST['sex'];
    $list_person=array();
    $q_per=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_preson` WHERE `sex`='$sex'  ORDER BY RAND() LIMIT 21");
    while ($p=mysqli_fetch_assoc($q_per)) {
        $id_p=$p['id'];
        $per=new stdClass();
        $per->id=$id_p;
        $per->icon=$url_carrot_store."/thumb.php?src=".$url_carrot_store."/app_mygirl/obj_preson/icon_".$id_p.".png&size=90x60";
        $per->data=$p['data'];
        array_push($list_person, $per);
    }
    echo json_encode($list_person);
    exit;
}

if($function=='list_radio'){
    $id_sub_menu="0";
    if(isset($_POST['id_sub_menu']))$id_sub_menu=$_POST['id_sub_menu'];

    $obj=new stdClass();
    
    $list_radio=array();
    $q_list_radio=null;
    if($id_sub_menu=="1")
        $q_list_radio=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_radio` ORDER BY RAND() LIMIT 30");
    else
        $q_list_radio=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_radio` WHERE `lang`='$lang' LIMIT 30");

    while($r=mysqli_fetch_assoc($q_list_radio)){
        $id_r=$r['id'];
        if(file_exists("../../app_mygirl/obj_radio/icon_$id_r.png"))
        $r['avatar']=$url_carrot_store."/thumb.php?src=".$url_carrot_store."/app_mygirl/obj_radio/icon_".$id_r.".png&size=90x60&trim=1";
        array_push($list_radio,$r);
    }

    $list_menu=array();
    $color_sel='000000';
    if ($id_sub_menu=="0")$color_sel='6a5acd';
    $arr_data_item=Array('0', '3', 'msg_box_func', get_lang_app('radio_area',$lang), $color_sel);
    array_push($list_menu, $arr_data_item);

    $color_sel='000000';
    if ($id_sub_menu =="1")$color_sel='6a5acd';
    $arr_data_item=Array('1', '3', 'msg_box_func', get_lang_app('radio_world',$lang), $color_sel);
    array_push($list_menu, $arr_data_item);

    $obj->{"list_radio"}=$list_radio;
    $obj->{"list_menu"}=$list_menu;
    echo json_encode($obj);
    exit;
}

if($function=="music_emotion"){
    $lang_sel=$lang;
    $sub_func=$_POST['sub_func'];
    $id_music=$_POST['id_music'];
    $user_sel_emotion='-1';
    
    $m_count_fun="0";
    $m_count_sad="0";
    $m_count_serenity="0";
    $m_count_excited="0";
    
    $check_emotion=mysqli_query($link,"SELECT `value` FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `device_id`='$id_device' AND `id_chat`='$id_music' LIMIT 1");
    if(mysqli_num_rows($check_emotion)>0){
        $data_check=mysqli_fetch_array($check_emotion);
        $user_sel_emotion=$data_check[0];
        
        $query_count_fun=mysqli_query($link,"SELECT count(*) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `value`='0' AND `id_chat`='$id_music'");
        $query_count_sad=mysqli_query($link,"SELECT count(*) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `value`='1' AND `id_chat`='$id_music'");
        $query_count_serenity=mysqli_query($link,"SELECT count(*) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `value`='2' AND `id_chat`='$id_music'");
        $query_count_excited=mysqli_query($link,"SELECT count(*) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `value`='3' AND `id_chat`='$id_music'");
        
        $data_0=mysqli_fetch_assoc($query_count_fun);
        $data_1=mysqli_fetch_assoc($query_count_sad);
        $data_2=mysqli_fetch_assoc($query_count_serenity);
        $data_3=mysqli_fetch_assoc($query_count_excited);
        
        $m_count_fun=$data_0['c'];
        $m_count_sad=$data_1['c'];
        $m_count_serenity=$data_2['c'];
        $m_count_excited=$data_3['c'];
        
    }else
        $user_sel_emotion='-1';

    if($sub_func=="set"){
        $sel_emotion=$_POST['sel_emotion'];
        
        if($user_sel_emotion=='-1')
            $add_emotion_music=mysqli_query($link,"INSERT INTO carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` (`device_id`, `value`, `id_chat`) VALUES ('$id_device', '$sel_emotion', '$id_music');");
        else
            $update_emotion_music=mysqli_query($link,"UPDATE carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` SET  `value`='$sel_emotion' WHERE `device_id`='$id_device' AND `id_chat`='$id_music' LIMIT 1;");

        $user_sel_emotion=$sel_emotion;
        
        $query_count_fun=mysqli_query($link,"SELECT count(*) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `value`='0' AND `id_chat`='$id_music'");
        $query_count_sad=mysqli_query($link,"SELECT count(*) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `value`='1' AND `id_chat`='$id_music'");
        $query_count_serenity=mysqli_query($link,"SELECT count(*) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `value`='2' AND `id_chat`='$id_music'");
        $query_count_excited=mysqli_query($link,"SELECT count(*) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `value`='3' AND `id_chat`='$id_music'");
        
        $data_0=mysqli_fetch_assoc($query_count_fun);
        $data_1=mysqli_fetch_assoc($query_count_sad);
        $data_2=mysqli_fetch_assoc($query_count_serenity);
        $data_3=mysqli_fetch_assoc($query_count_excited);
        
        $m_count_fun=$data_0['c'];
        $m_count_sad=$data_1['c'];
        $m_count_serenity=$data_2['c'];
        $m_count_excited=$data_3['c'];
    }
    
    $arr_music=array("$user_sel_emotion","$m_count_fun","$m_count_sad","$m_count_serenity","$m_count_excited");
    echo json_encode($arr_music);
    exit;
}

if($function=='teaching'){
    $question=addslashes($_POST['question']);
    $answer=addslashes($_POST['answer']);
    $id_question=$_POST['id_question'];
    $type_question=$_POST['type_question'];
    $os='android';if(isset($_POST['os'])) $os=$_POST['os'];
    $md5=uniqid().md5($date_cur);
    mysqli_query($link,"INSERT INTO carrotsy_virtuallover.`app_my_girl_brain` (`question`, `answer`,`sex`,`character_sex`,`os`,`md5`, `id_device`,`date_pub`,`id_question`,`type_question`) VALUES ('$question','$answer','$sex','$character_sex','$os','$md5','$id_device',NOW(),'$id_question','$type_question');");
    exit;
}

if($function=='report'){
    $id_question=$_POST['id_question'];
    $type_question=$_POST['type_question'];
    $value_report=addslashes($_POST['value_report']);
    $limit_chat=$_POST['limit_chat'];
    $type=$_POST['type'];
    $sel_report=$_POST['sel_report'];
    $os='android';if(isset($_POST['os'])) $os=$_POST['os'];
    $q_report=mysqli_query($link,"INSERT INTO carrotsy_virtuallover.`app_my_girl_report` (`type`, `sel_report`, `value_report`, `id_question`, `type_question`, `id_device`, `limit_chat`, `lang`, `os`) VALUES ('$type', '$sel_report', '$value_report', '$id_question', '$type_question', '$id_device', '$limit_chat', '$lang', '$os')");
    exit;
}
?>
