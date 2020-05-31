<?php
include "config.php";
include "database.php";
include "class.php";
include "function.php";
$func='';
if(isset($_POST['func']))$func=$_POST['func'];
$date_cur=date("Y-m-d");

$lang_sel='vi'; 
$sex=0;
$version='';
$os='';
$txt_limit_ver='';
$txt_limit_os='';
$txt_limit_chat='';

if(isset($_POST['lang'])){$lang_sel=$_POST['lang'];}
if(isset($_POST['sex'])){$sex=$_POST['sex'];}

        $os='unclear';
        $version='0';
        $character='0';
        $character_sex='1';
        $id_question='';
        $type_question='chat';
        $id_device='';
        $location_lon='';
        $location_lat='';

        if(isset($_POST['os'])){ $os=$_POST['os'];}
        if(isset($_POST['character'])){ $character=$_POST['character'];}
        if(isset($_POST['version'])){ $version=$_POST['version'];}
        if(isset($_POST['character_sex'])){ $character_sex=$_POST['character_sex'];}
        if(isset($_POST['id_question'])){ $id_question=$_POST['id_question'];}
        if(isset($_POST['type_question'])){ $type_question=$_POST['type_question'];}
        if(isset($_POST['id_device'])){ $id_device=$_POST['id_device'];}
        if(isset($_POST['location_lon'])){ $location_lon=$_POST['location_lon'];}
        if(isset($_POST['location_lat'])){ $location_lat=$_POST['location_lat'];}

$app=new App;

if(isset($_POST['version'])){
    $txt_limit_ver=" AND `ver`!= '$version' ";
}

if(isset($_POST['os'])){
    $txt_limit_os=" AND `os`!='$os' ";
}

if(isset($_POST['limit_chat'])){
    $limit_chat=$_POST['limit_chat'];
    $txt_limit_chat=" AND `limit_chat` <= $limit_chat";
}


if($func=="load_menu"){
    $query_list_lang=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `ver2` = '1' AND `active` = '1' ORDER BY `id`");
    while($row_lang=mysqli_fetch_array($query_list_lang)){
        $item_lang=new Item_lang();
        $item_lang->id=$row_lang['id'];
        $item_lang->name=$row_lang['name'];
        $item_lang->key=$row_lang['key'];
        $item_lang->url_icon=$url.'/app_mygirl/img/'.$row_lang['key'].'.png'; 
        $data_display=mysqli_fetch_array(mysqli_query($link,"SELECT `data` FROM `app_my_girl_display_lang` WHERE `lang` = '".$row_lang['key']."' AND `version` = '2' LIMIT 1"));
        $arr_data=(Array)json_decode($data_display['data']);
        $item_lang->setting_url_sound_test_sex0=$arr_data['setting_url_sound_test_sex0'];
        $item_lang->setting_url_sound_test_sex1=$arr_data['setting_url_sound_test_sex1'];
        array_push($lang_app->menu_lang,$item_lang);
    }
    
    echo json_encode($lang_app);
    exit;
}

if($func=="download_lang"){
    $id=1;
    if(isset($_GET['id'])) $id=$_GET['id'];
    if(isset($_POST['id'])) $id=$_POST['id'];
    $query_key=mysqli_query($link,"SELECT `id`,`key`,`name` FROM `app_my_girl_country` WHERE `id` = '$id'");
    $data_lang=mysqli_fetch_array($query_key);
    $key_lang_download=$data_lang['key'];
    $item_lang=new Item_lang();
    $item_lang->id=$data_lang['id'];
    $item_lang->name=$data_lang['name'];
    $item_lang->key=$data_lang['key'];
    $item_lang->url_icon=$url.'/app_mygirl/img/'.$data_lang['key'].'.png'; 
    $lang_app->menu_lang=$item_lang;
    
    $data_display=mysqli_fetch_array(mysqli_query($link,"SELECT `data` FROM `app_my_girl_display_lang` WHERE `lang` = '".$item_lang->key."' AND `version` = '2' LIMIT 1"));
    $data_display=json_decode($data_display['data']);
    foreach($data_display as $k=>$v){
        $lang_app->menu_lang->{$k}=$v;
    }
    echo json_encode($lang_app->menu_lang);
    exit;
}


if($func=='chao'){
    $text=$_POST['text'];
    if($lang_sel=='vi'){
        if(get_name_device($link,$lang_sel)!=''){
           $updat_date_user=mysqli_query($link,"UPDATE `app_my_girl_user_$lang_sel` SET `date_cur`=now() WHERE `id_device` = '$id_device';");
        }
    }
    Chat_report(chat_func($link,'chao_'.$text),'msg',$lang_sel,$link);
}


if($func=='tip_chat'){
    if($version=='2'){
        $result_tip=mysqli_query($link,"SELECT 'text' FROM `app_my_girl_$lang_sel` WHERE `tip` = '1' AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `disable` = '0' $txt_limit_os $txt_limit_ver $txt_limit_chat ORDER BY RAND() LIMIT 26");
    }else{
        $result_tip=mysqli_query($link,"SELECT 'text' FROM `app_my_girl_$lang_sel` WHERE `tip` = '1' AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `disable` = '0' $txt_limit_os $txt_limit_ver $txt_limit_chat ORDER BY RAND() LIMIT 34");
    }
    if(mysqli_num_rows($result_tip)>0){
        while ($row = mysqli_fetch_array($result_tip)) {
            array_push($app->all_tip,$row['text']);
        }
    }
}

if($func=='list_music'){
    $seach_music='';
    $id_sub_menu='';
    
    if(isset($_POST['id_sub_menu'])){
        $id_sub_menu=$_POST['id_sub_menu'];
    }
    
    if(isset($_POST['search'])){
        $seach_music=$_POST['search'];
    }
    if($id_sub_menu==''){
        if($seach_music==''){
            $result_tip=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE  `effect`='2' ORDER BY RAND() LIMIT 21");
        }else{
            $search_option=$_POST['search_option'];
            $result_tip_add_key_music=mysqli_query($link,"INSERT INTO `app_my_girl_log_key_music`(`key`, `lang`,`type`) VALUES ('$seach_music', '$lang_sel','$search_option')");
            if($search_option=="0"){
                $result_tip=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE  `chat` LIKE '%$seach_music%' AND `effect`='2' limit 21");
                if(mysqli_num_rows($result_tip)==0){
                    $result_tip=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE MATCH (`chat`) AGAINST ('$seach_music' IN BOOLEAN MODE) AND `effect`='2' limit 21");
                }
            }else{
                 $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1'");
                 $txt_query='';
                 $txt_query_2='';
                 $count_l=mysqli_num_rows($list_country);
                 $count_index=0;
                 while($l=mysqli_fetch_array($list_country)){
                    $key=$l['key'];
                    $txt_query.="(SELECT * FROM `app_my_girl_$key` WHERE  `chat` LIKE '%$seach_music%' AND  `effect`='2' AND `disable` = '0' limit 21)";
                    $txt_query_2.=" (SELECT * FROM `app_my_girl_$key` WHERE MATCH (`chat`) AGAINST ('$seach_music' IN BOOLEAN MODE) AND  `effect`='2' AND `disable` = '0' limit 21)";
                    $count_index++;
                    if($count_index!=$count_l){
                        $txt_query.=" UNION ALL ";
                        $txt_query_2.=" UNION ALL ";
                    }
                 }
                 $result_tip=mysql_query($txt_query);
                if(mysqli_num_rows($result_tip)==0){
                    $result_tip=mysql_query($txt_query_2);
                }
            }
        }
    }else{
        $txt_query_view="";
        if($id_sub_menu!="-1"){
            $txt_query_view=" AND `top_music`.`value`=$id_sub_menu ";
            $result_tip=mysqli_query($link,"SELECT DISTINCT `chat`.* FROM `app_my_girl_music_data_$lang_sel` as `top_music` left JOIN   `app_my_girl_$lang_sel` as `chat`  on `chat`.`id`=`top_music`.`id_chat` WHERE `chat`.`effect` = '2'  $txt_query_view ORDER by RAND() LIMIT 21");
        }else{
            $result_tip=mysqli_query($link,"SELECT `chat`.*,COUNT(`top_music`.`id_chat`)  as c  FROM `app_my_girl_music_data_$lang_sel` as `top_music` left JOIN   `app_my_girl_$lang_sel` as `chat`  on `chat`.`id`=`top_music`.`id_chat` WHERE `chat`.`effect` = '2' GROUP BY `top_music`.`id_chat` HAVING COUNT(`top_music`.`id_chat`) >= 1 ORDER BY c DESC   LIMIT 21");
        }
    }
    
        if(mysqli_num_rows($result_tip)>0){
            while ($row = mysqli_fetch_array($result_tip)) {
                $chat=new Chat();
                if($id_sub_menu=='-1'){
                    $chat->chat='('.$row['c'].') '.$row['chat'];
                }else{
                    $chat->chat=$row['chat'];
                }
                $chat->id_chat=$row['id'];
                $chat->color=$row['color'];
                $chat->link=$row['author'];
                array_push($app->all_chat,$chat);
            }
        }
}

if($func=='next_music'){
    $result_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE  `effect`='2' ORDER BY RAND() LIMIT 1");
    if(mysqli_num_rows($result_chat)>0){
        Chat_report(mysqli_fetch_array($result_chat),'chat',$lang_sel,$link);
    }
}

function thumb($urls,$size){
    return URL."/thumb.php?src=$urls&size=$size";
}


if($func=='history_chat'){
    $txt_user_name=get_name_device($link,$lang_sel);
    $query_list_history=mysqli_query($link,"SELECT * FROM `app_my_girl_key` WHERE `id_device`='$id_device'");
    while($row_history=mysqli_fetch_array($query_list_history)){
        $id_question=$row_history['id_question'];
        if($row_history['type_question']=='chat'){
            $result_chat1_history=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = $id_question ");
        }else{
            $result_chat1_history=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$lang_sel` WHERE `id` = $id_question ");
        }
        
        $chat=new Chat();
        $chat->chat=$row_history['key'];
        $chat->data_text='';
        if($result_chat1_history){
            if(mysqli_num_rows($result_chat1_history)>0){
                $arr_item_history=mysqli_fetch_array($result_chat1_history);
                $txt_chat=str_replace("{ten_user}",$txt_user_name,$arr_item_history['chat']); 
                $chat->data_text=$txt_chat; 
            }
        }
        array_push($app->all_chat,$chat);
        mysqli_free_result($arr_item_history);
    }
    echo json_encode($app);
    exit;
}

if($func=='list_background'){
    $id_sub_menu='';
    if(isset($_POST['id_sub_menu'])){
        $id_sub_menu=$_POST['id_sub_menu'];
    }
    
    if($id_sub_menu!=''){
        $id_sub_menu=$_POST['id_sub_menu'];
        $list_view=mysqli_query($link,"SELECT * FROM `app_my_girl_background` WHERE `version`='1' AND `category` = '$id_sub_menu' ORDER BY RAND() LIMIT 21");
    }else{
        $list_view=mysqli_query($link,"SELECT * FROM `app_my_girl_background` WHERE `version`='1' AND `category` != '15' AND `category` != '16' AND `category` != '17' AND `category` != '18' AND `category` != '19' AND `category` != '20' AND `category` != '21' AND `category` != '22' AND `category` != '23' AND `category` != '24' AND `category` != '25' AND `category` != '26' ORDER BY RAND() LIMIT 21");
    }
    while($row=mysqli_fetch_array($list_view)){
        $chat=new Chat();
        $chat->q1=thumb(URL.'/app_mygirl/obj_background/icon_'.$row[0].'.png','123x72');
        $chat->q2=$URL.'/app_mygirl/obj_background/icon_'.$row[0].'.png';
        array_push($app->all_chat,$chat);
    }
    
    $list_category=mysqli_query($link,"SELECT `id`,`name` FROM `app_my_girl_bk_category` WHERE `app`='0' ORDER BY RAND() LIMIT 10");
    
    while($row_cat=mysqli_fetch_assoc($list_category)){
        $color_select='000000';
        //Create sub menu item (id,id_func_box,name_act_func_box,value)
        $category_name_lang=get_key_lang($link,$row_cat['name'],$lang_sel);
        if($id_sub_menu==$row_cat['id']){
            $color_select='8B0000';
        }
        $arr_data_item=Array($row_cat['id'],'1','msg_box_func',$category_name_lang,$color_select);
        array_push($app->all_tip,$arr_data_item);
    }
    mysqli_free_result($list_view);
    mysqli_free_result($list_category);
}

if($func=='next_radio'){
    $query_radio=mysqli_query($link,"SELECT * FROM `app_my_girl_radio` WHERE `lang` = '$lang_sel' ORDER BY rand() LIMIT 1");
    if(mysqli_num_rows($query_radio)>0){
        $data_radio=mysqli_fetch_array($query_radio);
        $chat=new Chat();
        $chat->link=thumb(URL.'/app_mygirl/obj_radio/icon_'.$data_radio[0].'.png','90x90');
        $chat->mp3=$data_radio[2];
        $chat->chat=$data_radio[1];
        array_push($app->all_chat,$chat);
    }
    mysqli_free_result($query_radio);
}

if($func=='list_radio'){
    $id_sub_menu='';
    if(isset($_POST['id_sub_menu'])){
        $id_sub_menu=$_POST['id_sub_menu'];
    }
    
    if($id_sub_menu=='1'){
        $list_view=mysqli_query($link,"SELECT * FROM `app_my_girl_radio` ORDER BY RAND() LIMIT 21");
    }else{
         $list_view=mysqli_query($link,"SELECT * FROM `app_my_girl_radio` WHERE `lang` = '$lang_sel' ORDER BY RAND() LIMIT 21");
    }
    
    while($row=mysqli_fetch_array($list_view)){
        $chat=new Chat();
        $chat->link=thumb(URL.'/app_mygirl/obj_radio/icon_'.$row[0].'.png','123x72');
        $chat->mp3=$row[2];
        $chat->chat=$row[1];
        array_push($app->all_chat,$chat);
    }
    
    $color_sel='000000';
    if($id_sub_menu=='0'){$color_sel='6a5acd';}
    $arr_data_item=Array('0','3','msg_box_func',get_key_lang($link,'radio_area',$lang_sel),$color_sel);
    array_push($app->all_tip,$arr_data_item);
    
    $color_sel='000000';
    if($id_sub_menu=='1'){$color_sel='6a5acd';}
    $arr_data_item=Array('1','3','msg_box_func',get_key_lang($link,'radio_world',$lang_sel),$color_sel);
    array_push($app->all_tip,$arr_data_item);
    mysqli_free_result($list_view);
}

if($func=='list_person'){
    $list_view=mysqli_query($link,"SELECT * FROM `app_my_girl_preson` WHERE `sex` = '$sex' and (`os`='' or `os`='$os')  ORDER BY RAND() LIMIT 21");
    while($row=mysqli_fetch_array($list_view)){
        $chat=new Chat();
        $chat->id_chat=$row[0];
        $chat->link=thumb(URL.'/app_mygirl/obj_preson/icon_'.$row[0].'.png','123x72');
        $chat->chat=$row[1];
        array_push($app->all_chat,$chat);
    }
    mysqli_free_result($list_view);
}

if($func=='load_ads'){
    if($os=="android"){
        $list_ads=mysqli_query($link,"SELECT * FROM `app_my_girl_ads` WHERE `android`!='' ORDER BY RAND()");
    }else{
       $list_ads=mysqli_query($link,"SELECT * FROM `app_my_girl_ads` WHERE `ios`!='' ORDER BY RAND()");
    }
    
    while($row=mysqli_fetch_array($list_ads)){
        $chat=new Chat();
        $chat->id_chat=$row[0];
        $chat->chat=$row['name'];
        if($os=="android"){
            $chat->data_text=$row['android'];
        }else{
            $chat->data_text=$row['ios'];
        }
        $chat->link=thumb(URL.'/app_mygirl/obj_ads/icon_'.$row[0].'.png','50x50');
        
        array_push($app->all_chat,$chat);
    }
    mysqli_free_result($list_ads);
}

if($func=='show_chat'){
    $id=$_POST['text'];
    $result_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id' LIMIT 1");
    if(mysqli_num_rows($result_chat)){
        Chat_report(mysqli_fetch_array($result_chat),'chat',$lang_sel,$link);
    }
}

if($func=='hit'){
    Chat_report(chat_func($link,'dam'),'msg',$lang_sel,$link);
}

if($func=='thong_bao'){
    Chat_report(chat_func($link,'thong_bao'),'msg',$lang_sel,$link);
}

if($func=='tra_loi_thong_bao'){
    Chat_report(chat_func($link,'tra_loi_thong_bao'),'msg',$lang_sel,$link);
}

if($func=='bat_chuyen'){
    Chat_report(chat_func($link,'bat_chuyen'),'msg',$lang_sel,$link);
}

if($func=='tra_loi'){
    $id=$_POST['text'];
    $result_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id' AND `sex` = '$sex' AND `character_sex`='$character_sex' LIMIT 1");
    if(mysqli_num_rows($result_chat)){
        Chat_report(mysqli_fetch_array($result_chat),'chat',$lang_sel,$link);
    }
}

if($func=='chat'){
    $text=strtolower($_POST['text']);
    if($text[0]=="?"&strlen($text)>4){
        $text=str_replace('?','',$text);
        $wiki=wikidefinition($text,$lang_sel);
        if($wiki!=""){
            $tim_kiem=chat_func($link,'tim_thay');
            $tim_kiem['chat']=str_replace('{thong_tin}',$wiki,$tim_kiem['chat']);
            Chat_report($tim_kiem,'msg',$lang_sel,$link);
        }else{
            $tim_kiem=chat_func($link,'khong_tim_thay');
            Chat_report($tim_kiem,'msg',$lang_sel,$link);
        }
    }
    
    $result = 0;
    if($text!=="sex"){

        $equation = preg_replace("/[^a-z0-9+\-.*\/()%]/","",$text);
        $equation = preg_replace("/([a-z])+/i", "\$$0", $equation); 
        $equation = preg_replace("/([+-])([0-9]{1})(%)/","*(1\$1.0\$2)",$equation);
        $equation = preg_replace("/([+-])([0-9]+)(%)/","*(1\$1.\$2)",$equation);
        $equation = preg_replace("/([0-9]{1})(%)/",".0\$1",$equation);
        $equation = preg_replace("/([0-9]+)(%)/",".\$1",$equation);
    
        if($equation!= ""){ 
            $chat=new Chat();
            $giai_toan=chat_func($link,'giai_toan');
            $chat->color=$giai_toan['color'];
            $chat->effect=$giai_toan['effect'];
            
            try {
                $result = @eval("return ".$equation.";");
            } catch (ParseError $e) {
                $result = "0";
            }
            $chat->chat=str_replace('{giai_toan}','='.$result,$giai_toan['chat']);
            
            $table_app_temp='app_mygirl/app_my_girl_temp_'.$lang_sel;                        
            $table_app='app_mygirl/app_my_girl_msg_'.$lang_sel;
            $id_device=$_POST['id_device'];
            $voice_lang=get_key_lang($link,'voice_character_sex_'.$giai_toan['character_sex'],$lang_sel);
            if($voice_lang=='google'){
                $txt_chat=$chat->chat;
                $link_audio='http://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen='.strlen($chat->chat).'&client=tw-ob&q='.urlencode($chat->chat).'&tl='.$lang_sel;
                $ch = curl_init($link_audio);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_NOBODY, 0);
                curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
                $output = curl_exec($ch);
                $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
                if ($status == 200) {
                    file_put_contents(dirname(__FILE__) . '/'.$table_app_temp.'/'.$id_device.'.mp3', $output);
                }
                $chat->mp3=URL.'/'.$table_app_temp.'/'.$id_device.'.mp3';
            }else{
                if (file_exists($table_app.'/'.$giai_toan['id'].'.mp3')) {
                    $chat->mp3=URL.'/'.$table_app.'/'.$giai_toan['id'].'.mp3';
                } 
            }
        }
    }else{
        $result==null;
    }
    
    
    if ($result == null) {
        mysqli_query($link,"INSERT INTO `app_my_girl_key` (`key`, `lang`,`sex`,`dates`,`os`,`character`,`character_sex`,`version`,`id_question`,`type_question`,`id_device`,`location_lon`,`location_lat`) VALUES ('$text', '$lang_sel','$sex','$date_cur','$os',$character,$character_sex,$version,'$id_question','$type_question','$id_device','$location_lon','$location_lat');");
        check_func_msg_sevrer($link,$type_question,$id_device,$text,$lang_sel,$link,$sex);

        if($id_question!=''){
                $txt_table_chat_return='app_my_girl_'.$lang_sel;
                $get_child_chat=mysqli_query($link,"SELECT * FROM  `$txt_table_chat_return`  WHERE `text`='$text' AND `pater` = '$id_question' AND `pater_type` = '$type_question' AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `disable` = '0' ORDER BY RAND() LIMIT 1");
				if($get_child_chat){
                    if(mysqli_num_rows($get_child_chat)){
                        Chat_report(mysqli_fetch_array($get_child_chat),'chat',$lang_sel,$link);
                    }
                }
				
				$get_child_chat2=mysqli_query($link,"SELECT * FROM  `$txt_table_chat_return` WHERE MATCH (text)  AGAINST ('$text' IN BOOLEAN MODE) AND `pater` = '$id_question' AND `pater_type` = '$type_question' AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `disable` = '0' LIMIT 1");
				if($get_child_chat2){
                    if(mysqli_num_rows($get_child_chat2)){
                        Chat_report(mysqli_fetch_array($get_child_chat2),'chat',$lang_sel,$link);
                    }
				}
        }
        
        
        $result_chat4=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `text`='$text' AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `pater`='' AND `disable` = '0' $txt_limit_ver  $txt_limit_os $txt_limit_chat ORDER BY RAND() LIMIT 1");
  
		if($result_chat4){
            if(mysqli_num_rows($result_chat4)){
                Chat_report(mysqli_fetch_array($result_chat4),'chat',$lang_sel,$link);
            }
		}

        $result_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `text` LIKE '%$text%' AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `pater`='' AND `disable` = '0' $txt_limit_os $txt_limit_ver $txt_limit_chat ORDER BY RAND() LIMIT 1");
            if(mysqli_num_rows($result_chat)){
                    Chat_report(mysqli_fetch_array($result_chat),'chat',$lang_sel,$link);
            }else{
                    $result_chat2=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE MATCH (text)  AGAINST ('$text' IN BOOLEAN MODE)  AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `pater`='' AND `disable` = '0' $txt_limit_os $txt_limit_ver $txt_limit_chat LIMIT 1");
                        if(mysqli_num_rows($result_chat2)){
                             Chat_report(mysqli_fetch_array($result_chat2),'chat',$lang_sel,$link);
                        }
                    Chat_report(chat_func($link,'bam_bay'),'msg',$lang_sel,$link);
            }
            mysqli_free_result($result_chat);
            Chat_report(chat_func($link,'bam_bay'),'msg',$lang_sel,$link);
    }
    array_push($app->all_chat,$chat);
}

echo json_encode($app);
mysqli_close($link);