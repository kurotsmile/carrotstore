<?php
include "config.php";
include "database.php";
$func = $_POST['func'];
$date_cur = date("Y-m-d");

$lang_sel = 'vi';
$sex = 0;
$version = '';
$os = '';
$txt_limit_ver = '';
$txt_limit_os = '';
$txt_limit_chat = '';

if (isset($_POST['lang'])) {
    $lang_sel = $_POST['lang'];
}
if (isset($_POST['sex'])) {
    $sex = $_POST['sex'];
}

$os = 'unclear';
$version = '0';
$character = '0';
$character_sex = '1';
$id_question = '';
$type_question = 'chat';
$id_device = '';
$location_lon = '';
$location_lat = '';

if (isset($_POST['os'])) {
    $os = $_POST['os'];
}
if (isset($_POST['character'])) {
    $character = $_POST['character'];
}
if (isset($_POST['version'])) {
    $version = $_POST['version'];
}
if (isset($_POST['character_sex'])) {
    $character_sex = $_POST['character_sex'];
}
if (isset($_POST['id_question'])) {
    $id_question = $_POST['id_question'];
}
if (isset($_POST['type_question'])) {
    $type_question = $_POST['type_question'];
}
if (isset($_POST['id_device'])) {
    $id_device = $_POST['id_device'];
}
if (isset($_POST['location_lon'])) {
    $location_lon = $_POST['location_lon'];
}
if (isset($_POST['location_lat'])) {
    $location_lat = $_POST['location_lat'];
}

class App
{
    public $all_chat = array();
    public $all_tip = array();
}

;

class Chat
{
    public $chat = '';
    public $status = '';
    public $color = '';
    public $q1 = '';
    public $q2 = '';
    public $r1 = '';
    public $r2 = '';
    public $link = '';
    public $vibrate = '';
    public $mp3 = '';
    public $effect = '';
    public $action = '';
    public $face = '';
    public $id_chat = ''; 
    public $type_chat = ''; 
    public $effect_customer = '';
    public $data_text = '';
    public $video = '';
}

//************các phương thức***************//
function get_key_lang_app($key, $lang)
{
    $value = '';
    $data_display = mysqli_fetch_array(mysqli_query($link,"SELECT `data` FROM `app_my_girl_display_lang` WHERE `lang` = '" . $lang . "' AND `version` = '0' LIMIT 1"));
    $data_display = (Array)json_decode($data_display['data']);
    if (isset($data_display[$key])) {
        $value = $data_display[$key];
    }
    mysqli_fetch_array($data_display);
    return $value;
}


function chat_func($link,$func)
{
    $lang_sel = $_POST['lang'];
    $version = '';
    $os = '';
    $sex = 0;
    $txt_limit = '';
    $character_sex = '0';


    if (isset($_POST['sex'])) {
        $sex = $_POST['sex'];
    }

    if (isset($_POST['version'])) {
        $version = $_POST['version'];
    }

    if (isset($_POST['os'])) {
        $os = $_POST['os'];
    }

    if ($version != '' & $os != '') {
        $txt_limit = " AND `ver`!= '$version' AND `os`!='$os'";
    }

    if (isset($_POST['character_sex'])) {
        $character_sex = $_POST['character_sex'];
    }

    $txt_limit_one_show = '';
    if ($func == 'bat_chuyen') {
        $id_question = '';
        if (isset($_POST['id_question'])) {
            $id_question = $_POST['id_question'];
        }
        $txt_limit_one_show = " AND `id` !='$id_question' ";
    }

    $day_week = "AND (`limit_day` = '" . $_POST['day_week'] . "' OR `limit_day` = '')";

    $result_chat = mysqli_query($link,"SELECT * FROM `app_my_girl_msg_" . $lang_sel . "` WHERE `func` = '$func'  AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `disable` = '0' $day_week $txt_limit_one_show $txt_limit ORDER BY RAND() LIMIT 1");
    return mysqli_fetch_array($result_chat);
}

function Chat_report($data_row, $type_chat, $lang_sel, $link)
{
    $app = new App;
    $location_lon = '';
    $location_lat = '';
    $hour = '';
    $minute = '';
    $second = '';
    $key_chat = '';

    if (isset($_POST['text'])) {
        $key_chat = $_POST['text'];
    }
    if (isset($_POST['hour'])) {
        $hour = $_POST['hour'];
    }
    if (isset($_POST['minute'])) {
        $minute = $_POST['minute'];
    }
    if (isset($_POST['second'])) {
        $second = $_POST['second'];
    }
    if (isset($_POST['location_lon'])) {
        $location_lon = $_POST['location_lon'];
    }
    if (isset($_POST['location_lat'])) {
        $location_lat = $_POST['location_lat'];
    }


    $os = "";
    if (isset($_POST['os'])) {
        $os = $_POST['os'];
    }
    $chat = new Chat();

    $txt_chat = str_replace("{ten_user}", get_name_device($link,$lang_sel), $data_row['chat']);
    if ($hour != '') $txt_chat = str_replace("{gio}", $hour, $txt_chat);
    if ($minute != '') $txt_chat = str_replace("{phut}", $minute, $txt_chat);
    if ($second != '') $txt_chat = str_replace("{giay}", $second, $txt_chat);
    $txt_chat = str_replace('{key_chat}', $key_chat, $txt_chat);

    if ($type_chat == "chat") {
        if ($data_row['id_redirect'] != '') {
            $id_redirect = $data_row['id_redirect'];
            $result_chat5 = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id_redirect'");
            $data_row = mysqli_fetch_array($result_chat5);
            $txt_chat = str_replace("{ten_user}", get_name_device($link,$lang_sel), $data_row['chat']);
            mysqli_free_result($result_chat5);
        }

        if ($data_row['func_sever'] != '') {
            if ($data_row['func_sever'] == 'sua_ten') {
                Chat_report(chat_func($link,'chua_biet_ten'), 'nho_ten', $lang_sel, $link);
            }

            if ($data_row['func_sever'] == 'doc_ten') {
                if (get_name_device($lang_sel) == '') {
                    Chat_report(chat_func($link,'chua_biet_ten'), 'nho_ten', $lang_sel, $link);
                }
            }

            if ($data_row['func_sever'] == 'dem_ngay_gap') {
                if (get_name_device($lang_sel) != '') {
                    $id_device = "";
                    if (isset($_POST['id_device'])) {
                        $id_device = $_POST['id_device'];
                    }
                    $date_count = mysqli_query($link,"SELECT DATEDIFF(date_cur,date_start),`date_start` FROM `app_my_girl_user_$lang_sel` WHERE `id_device` = '$id_device' LIMIT 1");
                    $val_date_count = mysqli_fetch_array($date_count);
                    if ($val_date_count[0] == '0') {
                        Chat_report(chat_func($link,'khong_biet_ngay_gap'), 'msg', $lang_sel, $link);
                    } else if ($val_date_count[0] == '') {
                        Chat_report(chat_func($link,'khong_biet_ngay_gap'), 'msg', $lang_sel, $link);
                    } else {
                        $txt_chat = str_replace('{dem_ngay_gap}', $val_date_count[0], $data_row['chat']);
                    }
                    mysqli_free_result($date_count);
                } else {
                    Chat_report(chat_func($link,'khong_biet_ngay_gap'), 'msg', $lang_sel, $link);
                }
            }


            if ($data_row['func_sever'] == 'vi_tri') {
                $id_device = "";
                if (isset($_POST['id_device'])) {
                    $id_device = $_POST['id_device'];
                }
                if ($location_lon == '0') {
                    Chat_report(chat_func($link,'chua_bat_dinh_vi'), 'msg', $lang_sel, $link);
                }
                $place = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$location_lat,$location_lon&sensor=true&key=$key_api_google";

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $place);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_ENCODING, "");
                $curlData = curl_exec($curl);
                curl_close($curl);

                $place = json_decode($curlData);
                $txt_dc = $place->results[0]->formatted_address;
                $txt_address = '"' . $txt_dc . '"';
                $txt_address = str_replace('Unnamed Road,', '', $txt_address);
                $txt_dc = str_replace('Unnamed Road,', '', $txt_dc);
                $txt_chat = str_replace("{vi_tri}", $txt_address, $txt_chat);

                if (get_name_device($lang_sel) != '') {
                    $update_user_address = mysqli_query($link,"UPDATE `app_my_girl_user_$lang_sel` SET `address` = '$txt_dc' WHERE `id_device` = '$id_device';");
                }
            }

            if ($data_row['func_sever'] == 'vi_tri_map') {
                if ($location_lon == '0') {
                    Chat_report(chat_func($link,'chua_bat_dinh_vi'), 'msg', $lang_sel, $link);
                }
                $data_row['link'] = "https://maps.google.com/maps/api/staticmap?center=$location_lat,$location_lon&size=390x260&zoom=15&markers=$location_lat,$location_lon";
            }

            if ($data_row['func_sever'] == 'tim_duong') {
                Chat_report(chat_func($link,'hoi_tim_duong'), 'tim_duong', $lang_sel, $link);
            }

        }

    }

    $chat->chat = $txt_chat;
    $chat->status = $data_row['status'];
    $chat->color = $data_row['color'];
    $chat->q1 = $data_row['q1'];
    $chat->q2 = $data_row['q2'];
    $chat->r1 = $data_row['r1'];
    $chat->r2 = $data_row['r2'];
    $chat->effect = $data_row['effect'];
    $chat->id_chat = $data_row['id'];

    if ($type_chat == "chat") {
        if ($chat->effect == '2') {
            $id_music = $data_row['id'];


            $version = "";
            if (isset($_POST['version'])) {
                $version = $_POST['version'];
            }

            //if($version=="1"&&$lang_sel=="en"&&$os=="ios"){
            //$chat->data_text="";
            //}else{
            $show_lyric_query = mysqli_query($link,"SELECT `lyrics` FROM `app_my_girl_" . $lang_sel . "_lyrics` WHERE `id_music` = '$id_music' LIMIT 1");
            if (mysqli_num_rows($show_lyric_query) > 0) {
                $data_lyric = mysqli_fetch_array($show_lyric_query);
                $chat->data_text = $data_lyric[0];
            } else {
                $chat->data_text = "";
            }
            mysqli_free_result($show_lyric_query);
            //}

            //if($os!="ios"){
            $arr_top_music = array();
            array_push($arr_top_music, array('-1', '0', 'msg_box_func', get_key_lang($link,"top_music_0", $lang_sel)));
            array_push($arr_top_music, array('0', '0', 'msg_box_func', get_key_lang($link,"top_music_1", $lang_sel)));
            array_push($arr_top_music, array('1', '0', 'msg_box_func', get_key_lang($link,"top_music_2", $lang_sel)));
            array_push($arr_top_music, array('2', '0', 'msg_box_func', get_key_lang($link,"top_music_3", $lang_sel)));
            array_push($arr_top_music, array('3', '0', 'msg_box_func', get_key_lang($link,"top_music_4", $lang_sel)));
            $app->all_tip = $arr_top_music;
            //}

            $check_video = mysqli_query($link,"SELECT `link` FROM `app_my_girl_video_$lang_sel` WHERE  `id_chat` = '$id_music' LIMIT 1");
            if (mysqli_num_rows($check_video)) {
                $data_video = mysqli_fetch_array($check_video);
                if ($os == "ios") {
                    $chat->video = $data_video[0];
                } else {
                    //parse_str( parse_url( $data_video[0], PHP_URL_QUERY ), $my_array_of_vars );
                    //$chat->video=$my_array_of_vars['v'];
                    $chat->video = $data_video[0];
                }
            }


        }

        if ($chat->effect == '4') {
            $query_get_notification = mysqli_query($link,"SELECT `chat` FROM `app_my_girl_msg_$lang_sel` WHERE `func` = 'thong_bao' Order by rand() LIMIT 1");
            if (mysqli_num_rows($query_get_notification)) {
                $data_msg = mysqli_fetch_array($query_get_notification);
                $chat->data_text = str_replace("{ten_user}", get_name_device($lang_sel), $data_msg[0]);
            }
            mysqli_free_result($query_get_notification);
        }


        $chat->link = $data_row['link'];
    } else {
        //Tìm kiếm danh bạ
        if ($data_row['effect'] == "31") {
            $chat->link = $_POST['text'];
        }

        if ($data_row['effect'] == "43") {
            $chat->link = "https://maps.google.com/maps?q=" . urlencode($_POST['text']);
        }

    }
    $chat->vibrate = $data_row['vibrate'];
    $chat->face = $data_row['face'];
    $chat->action = $data_row['action'];

    $chat->type_chat = $type_chat;
    if ($type_chat == "chat") {
        if ($data_row['func_sever'] == 'tim_danh_ba') {
            $chat->type_chat = 'tim_danh_ba';
        }

        if ($data_row['func_sever'] == 'tim_nhac') {
            $chat->type_chat = 'tim_nhac';
        }

        if ($data_row['func_sever'] == 'tim_loi_nhac') {
            $chat->type_chat = 'tim_loi_nhac';
        }
    }

    $table_app = '';
    if ($type_chat == "chat") {
        $table_app = 'app_mygirl/app_my_girl_' . $lang_sel;
    } else {
        $table_app = 'app_mygirl/app_my_girl_msg_' . $lang_sel;
    }

    if ($data_row['effect_customer'] != "") {
        $chat->effect_customer = URL.'/app_mygirl/obj_effect/' . $data_row['effect_customer'] . '.png';
    } else {
        $chat->effect_customer = "";
    }


    $table_app_temp = 'app_mygirl/app_my_girl_temp_' . $lang_sel;
    if ($data_row['file_url'] != "") {
        $chat->mp3=$data_row['file_url'];
    } else {
        if ($chat->effect != '2') {
            $id_device = $_POST['id_device'];
            $voice_lang = get_key_lang($link,'voice_character_sex_' . $data_row['character_sex'], $lang_sel);
            if ($voice_lang == 'google') {
                if (file_exists($table_app . '/' . $data_row['id'] . '.mp3')) {
                    $chat->mp3 = URL.'/' . $table_app . '/' . $data_row['id'] . '.mp3';
                } else {
                    $txt_chat = $chat->chat;
                    $link_audio = 'http://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen=' . strlen($chat->chat) . '&client=tw-ob&q=' . urlencode($chat->chat) . '&tl=' . $lang_sel;
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
                        file_put_contents(dirname(__FILE__) . '/' . $table_app_temp . '/' . $id_device . '.mp3', $output);
                    }
                    $chat->mp3 = URL.'/' . $table_app_temp . '/' . $id_device . '.mp3';
                }
            } else {
                if (file_exists($table_app . '/' . $data_row['id'] . '.mp3')) {
                    $chat->mp3 = URL.'/' . $table_app . '/' . $data_row['id'] . '.mp3';
                }
            }
        } else {
            if (file_exists($table_app . '/' . $data_row['id'] . '.mp3')) {
                $chat->mp3 = URL.'/' . $table_app . '/' . $data_row['id'] . '.mp3';
            }
        }
    }


    //Field chat
    $id = $chat->id_chat;
    $check_field_chat = mysqli_query($link,"SELECT `data`,`option` FROM `app_my_girl_field_$lang_sel` WHERE `id_chat` = '$id' AND `type_chat` = '$type_chat' LIMIT 1");
    if (mysqli_num_rows($check_field_chat) > 0) {
        $data_field = mysqli_fetch_array($check_field_chat);
        $arr_data_field = json_decode($data_field['data']);
        if ($data_field['option'] == '1') {
            shuffle($arr_data_field);
        }
        $app->all_tip = $arr_data_field;
    } else {
        /*
        if($lang_sel=='vi'){
            $list_chat_select=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `pater` = '$id' AND `pater_type` = '$type_chat' ORDER BY rand() LIMIT 50");
            if(mysqli_num_rows($list_chat_select)>0){
                while($row_select=mysqli_fetch_array($list_chat_select)){
                     array_push($app->all_tip,array($row_select['id'],"$lang_sel",'show_chat',$row_select['text'],'8A00FF'));
                }
            }
            mysqli_free_result($list_chat_select);
        }*/
    }
    mysqli_free_result($check_field_chat);


    array_push($app->all_chat, $chat);
    echo json_encode($app);
    mysqli_close($link);
    exit;
}


function get_name_device($link,$lang_sel)
{
    $id_device = "";
    $name_user = "";
    if (isset($_POST['id_device'])) {
        $id_device = $_POST['id_device'];
        $list_effect = mysqli_query($link,"SELECT * FROM `app_my_girl_user_$lang_sel` WHERE `id_device`='$id_device' LIMIT 1");
        if ($list_effect != false) {
            if (mysqli_num_rows($list_effect) > 0) {
                $arr_data = mysqli_fetch_array($list_effect);
                $name_user = '"' . $arr_data[1] . '" ';
            }
        }
        mysqli_free_result($list_effect);
    }
    return $name_user;
}

function check_func_msg_sevrer($type_question, $id_device, $text, $lang_sel, $link, $sex)
{
    if ($type_question == "nho_ten") {
        if (get_name_device($lang_sel) == "") {
            $add_effect = mysqli_query($link,"INSERT INTO `app_my_girl_user_$lang_sel` (`id_device`,`name`,`sex`,`date_start`) VALUES ('$id_device','$text','$sex',now());");
        } else {
            $add_effect = mysqli_query($link,"UPDATE `app_my_girl_user_$lang_sel` SET `name` = '$text',`sex`='$sex' WHERE `id_device` = '$id_device';");
        }

        Chat_report(chat_func($link,'da_biet_ten'), 'msg', $lang_sel, $link);

    }

    if ($type_question == "tim_danh_ba") {
        Chat_report(chat_func($link,'hien_ds_sdt'), 'msg', $lang_sel, $link);
    }

    if ($type_question == "tim_duong") {
        Chat_report(chat_func($link,'tra_loi_tim_duong'), 'msg', $lang_sel, $link);
    }

    if ($type_question == "tim_nhac") {
        $result_music = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE MATCH (chat)  AGAINST ('$text' IN BOOLEAN MODE)  AND `pater`='' AND `effect` = '2' AND `disable` = '0' LIMIT 1");
        if ($result_music != false) {
            if (mysqli_num_rows($result_music) > 0) {
                Chat_report(mysqli_fetch_array($result_music), 'chat', $lang_sel, $link);
            }
        }
        mysqli_free_result($result_music);
    }

    if ($type_question == "tim_loi_nhac") {
        $result_lyricst = mysqli_query($link,"SELECT * FROM `app_my_girl_" . $lang_sel . "_lyrics` WHERE lyrics LIKE '%" . $text . "%' LIMIT 1");
        if ($result_lyricst != false) {
            $data_lyrics = mysqli_fetch_array($result_lyricst);
            $id_song = $data_lyrics['id_music'];
            $get_music_by_lyrics = mysqli_query($link,"SELECT * FROM `app_my_girl_" . $lang_sel . "` WHERE `id` = '" . $id_song . "' LIMIT 1");
            if ($get_music_by_lyrics != false) {
                if (mysqli_num_rows($get_music_by_lyrics) > 0) {
                    Chat_report(mysqli_fetch_array($get_music_by_lyrics), 'chat', $lang_sel, '');
                }
            }
            mysqli_free_result($get_music_by_lyrics);
        } else {
            $result_music = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE MATCH (chat)  AGAINST ('$text' IN BOOLEAN MODE)  AND `pater`='' AND `effect` = '2' AND `disable` = '0' LIMIT 1");
            if ($result_music != false) {
                if (mysqli_num_rows($result_music) > 0) {
                    Chat_report(mysqli_fetch_array($result_music), 'chat', $lang_sel, $link);
                }
            }
            mysqli_free_result($result_music);
        }
        mysqli_free_result($result_lyricst);

    }
}

function wikidefinition($s, $lang_sel)
{
    $url = "http://$lang_sel.wikipedia.org/w/api.php?action=opensearch&search=" . urlencode($s) . "&format=xml&limit=1";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
    curl_setopt($ch, CURLOPT_POST, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_NOBODY, FALSE);
    curl_setopt($ch, CURLOPT_VERBOSE, FALSE);
    curl_setopt($ch, CURLOPT_REFERER, "");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 4);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $page = curl_exec($ch);
    $xml = simplexml_load_string($page);
    if ((string)$xml->Section->Item->Description) {
        return $xml->Section->Item->Description;
    } else {
        return "";
    }
}

function get_key_lang($link,$key, $lang)
{
    $val = '';
    $query_get_value = mysqli_query($link,"SELECT `value` FROM `app_my_girl_key_lang` WHERE `key` = '$key' AND `lang` = '$lang' LIMIT 1");
    if (mysqli_num_rows($query_get_value) > 0) {
        $data_val = mysqli_fetch_array($query_get_value);
        $val = $data_val[0];
    } else {
        $val = $key;
    }
    mysqli_free_result($query_get_value);
    return $val;
}

//***********Hoàn tất các phương thức ********************************//


$app = new App;


if (isset($_POST['version'])) {
    $txt_limit_ver = " AND `ver`!= '$version' ";
}

if (isset($_POST['os'])) {
    $txt_limit_os = " AND `os`!='$os' ";
}

if (isset($_POST['limit_chat'])) {
    $limit_chat = $_POST['limit_chat'];
    $txt_limit_chat = " AND `limit_chat` <= $limit_chat";
}

if ($func == 'chao') {
    $text = $_POST['text'];
    if ($lang_sel == 'vi') {
        if (get_name_device($link,$lang_sel) != '') {
            $updat_date_user = mysqli_query($link,"UPDATE `app_my_girl_user_$lang_sel` SET `date_cur`=now() WHERE `id_device` = '$id_device';");
        }
    }
    Chat_report(chat_func($link,'chao_' . $text), 'msg', $lang_sel, $link);
}


if ($func == 'tip_chat') {
    if ($version == '2') {
        $result_tip = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `tip` = '1' AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `disable` = '0' $txt_limit_os $txt_limit_ver $txt_limit_chat ORDER BY RAND() LIMIT 26");
    } else {
        $result_tip = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `tip` = '1' AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `disable` = '0' $txt_limit_os $txt_limit_ver $txt_limit_chat ORDER BY RAND() LIMIT 34");
    }
    if (mysqli_num_rows($result_tip) > 0) {
        while ($row = mysqli_fetch_array($result_tip)) {
            array_push($app->all_tip, $row['text']);
        }
    }
}

if ($func == 'list_music') {
    $seach_music = '';
    $id_sub_menu = '';

    if (isset($_POST['id_sub_menu'])) {
        $id_sub_menu = $_POST['id_sub_menu'];
    }

    if (isset($_POST['search'])) {
        $seach_music = $_POST['search'];
    }
    if ($id_sub_menu == '') {
        if ($seach_music == '') {
            $result_tip = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE  `effect`='2' ORDER BY RAND() LIMIT 21");
        } else {
            $search_option = $_POST['search_option'];
            $result_tip_add_key_music = mysqli_query($link,"INSERT INTO `app_my_girl_log_key_music`(`key`, `lang`,`type`) VALUES ('$seach_music', '$lang_sel','$search_option')");
            if ($search_option == "0") {
                $result_tip = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE  `chat` LIKE '%$seach_music%' AND `effect`='2' limit 21");
                if (mysqli_num_rows($result_tip) == 0) {
                    $result_tip = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE MATCH (`chat`) AGAINST ('$seach_music' IN BOOLEAN MODE) AND `effect`='2' limit 21");
                }
            } else {
                $list_country = mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1'");
                $txt_query = '';
                $txt_query_2 = '';
                $count_l = mysqli_num_rows($list_country);
                $count_index = 0;
                while ($l = mysqli_fetch_array($list_country)) {
                    $key = $l['key'];
                    $txt_query .= "(SELECT * FROM `app_my_girl_$key` WHERE  `chat` LIKE '%$seach_music%' AND  `effect`='2' AND `disable` = '0' limit 21)";
                    $txt_query_2 .= " (SELECT * FROM `app_my_girl_$key` WHERE MATCH (`chat`) AGAINST ('$seach_music' IN BOOLEAN MODE) AND  `effect`='2' AND `disable` = '0' limit 21)";
                    $count_index++;
                    if ($count_index != $count_l) {
                        $txt_query .= " UNION ALL ";
                        $txt_query_2 .= " UNION ALL ";
                    }
                }
                $result_tip = mysql_query($txt_query);
                if (mysqli_num_rows($result_tip) == 0) {
                    $result_tip = mysql_query($txt_query_2);
                }
            }
        }
    } else {
        $txt_query_view = "";
        if ($id_sub_menu != "-1") {
            $txt_query_view = " AND `top_music`.`value`=$id_sub_menu ";
            $result_tip = mysqli_query($link,"SELECT DISTINCT `chat`.* FROM `app_my_girl_music_data_$lang_sel` as `top_music` left JOIN   `app_my_girl_$lang_sel` as `chat`  on `chat`.`id`=`top_music`.`id_chat` WHERE `chat`.`effect` = '2'  $txt_query_view ORDER by RAND() LIMIT 21");
        } else {
            $result_tip = mysqli_query($link,"SELECT `chat`.*,COUNT(`top_music`.`id_chat`)  as c  FROM `app_my_girl_music_data_$lang_sel` as `top_music` left JOIN   `app_my_girl_$lang_sel` as `chat`  on `chat`.`id`=`top_music`.`id_chat` WHERE `chat`.`effect` = '2' GROUP BY `top_music`.`id_chat` HAVING COUNT(`top_music`.`id_chat`) >= 1 ORDER BY c DESC   LIMIT 21");
        }
    }

    if (mysqli_num_rows($result_tip) > 0) {
        while ($row = mysqli_fetch_array($result_tip)) {
            $chat = new Chat();
            if ($id_sub_menu == '-1') {
                $chat->chat = '(' . $row['c'] . ') ' . $row['chat'];
            } else {
                $chat->chat = $row['chat'];
            }
            $chat->id_chat = $row['id'];
            $chat->color = $row['color'];
            $chat->link = $row['author'];
            array_push($app->all_chat, $chat);
        }
    }
}

if ($func == 'next_music') {
    $result_chat = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE  `effect`='2' ORDER BY RAND() LIMIT 1");
    if (mysqli_num_rows($result_chat) > 0) {
        Chat_report(mysqli_fetch_array($result_chat), 'chat', $lang_sel, $link);
    }
}

function thumb($urls, $size)
{
    return URL."/thumb.php?src=$urls&size=$size";
}


if ($func == 'history_chat') {
    $txt_user_name = get_name_device($link,$lang_sel);
    $query_list_history = mysqli_query($link,"SELECT * FROM `app_my_girl_key` WHERE `id_device`='$id_device'");
    while ($row_history = mysqli_fetch_array($query_list_history)) {
        $id_question = $row_history['id_question'];
        if ($row_history['type_question'] == 'chat') {
            $result_chat1_history = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = $id_question ");
        } else {
            $result_chat1_history = mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$lang_sel` WHERE `id` = $id_question ");
        }

        $chat = new Chat();
        $chat->chat = $row_history['key'];
        $chat->data_text = '';
        if ($result_chat1_history) {
            if (mysqli_num_rows($result_chat1_history) > 0) {
                $arr_item_history = mysqli_fetch_array($result_chat1_history);
                $txt_chat = str_replace("{ten_user}", $txt_user_name, $arr_item_history['chat']);
                $chat->data_text = $txt_chat;
            }
        }
        array_push($app->all_chat, $chat);
        
    }
    echo json_encode($app);
    exit;
}

if ($func == 'list_background') {
    $id_sub_menu = '';
    if (isset($_POST['id_sub_menu'])) {
        $id_sub_menu = $_POST['id_sub_menu'];
    }

    if ($id_sub_menu != '') {
        $id_sub_menu = $_POST['id_sub_menu'];
        $list_view = mysqli_query($link,"SELECT * FROM `app_my_girl_background` WHERE `version`='1' AND `category` = '$id_sub_menu' ORDER BY RAND() LIMIT 21");
    } else {
        $list_view = mysqli_query($link,"SELECT * FROM `app_my_girl_background` WHERE `version`='1' AND `category` != '15' AND `category` != '16' AND `category` != '17' AND `category` != '18' AND `category` != '19' AND `category` != '20' AND `category` != '21' AND `category` != '22' AND `category` != '23' AND `category` != '24' AND `category` != '25' AND `category` != '26' ORDER BY RAND() LIMIT 21");
    }
    while ($row = mysqli_fetch_array($list_view)) {
        $chat = new Chat();
        $chat->q1 = thumb(URL.'/app_mygirl/obj_background/icon_' . $row[0] . '.png', '123x72');
        $chat->q2 = $url.'/app_mygirl/obj_background/icon_' . $row[0] . '.png';
        array_push($app->all_chat, $chat);
    }

    $list_category = mysqli_query($link,"SELECT * FROM `app_my_girl_bk_category` WHERE `app`='0' ORDER BY RAND() LIMIT 10");

    while ($row_cat = mysqli_fetch_array($list_category)) {
        $color_select = '000000';
        //Create sub menu item (id,id_func_box,name_act_func_box,value)
        $category_name_lang = get_key_lang($link,$row_cat['name'], $lang_sel);
        if ($id_sub_menu == $row_cat['id']) {
            $color_select = '8B0000';
        }
        $arr_data_item = Array($row_cat['id'], '1', 'msg_box_func', $category_name_lang, $color_select);
        array_push($app->all_tip, $arr_data_item);
    }
    mysqli_free_result($list_view);
    mysqli_free_result($list_category);
}

if ($func == 'next_radio') {
    $query_radio = mysqli_query($link,"SELECT * FROM `app_my_girl_radio` WHERE `lang` = '$lang_sel' ORDER BY rand() LIMIT 1");
    if (mysqli_num_rows($query_radio) > 0) {
        $data_radio = mysqli_fetch_array($query_radio);
        $chat = new Chat();
        $chat->link = thumb(URL.'/app_mygirl/obj_radio/icon_' . $data_radio[0] . '.png', '90x90');
        $chat->mp3 = $data_radio[2];
        $chat->chat = $data_radio[1];
        array_push($app->all_chat, $chat);
    }
    mysqli_free_result($query_radio);
}

if ($func == 'list_radio') {
    $id_sub_menu = '';
    if (isset($_POST['id_sub_menu'])) {
        $id_sub_menu = $_POST['id_sub_menu'];
    }

    if ($id_sub_menu == '1') {
        $list_view = mysqli_query($link,"SELECT * FROM `app_my_girl_radio` ORDER BY RAND() LIMIT 21");
    } else {
        $list_view = mysqli_query($link,"SELECT * FROM `app_my_girl_radio` WHERE `lang` = '$lang_sel' ORDER BY RAND() LIMIT 21");
    }

    while ($row = mysqli_fetch_array($list_view)) {
        $chat = new Chat();
        $chat->link = thumb(URL.'/app_mygirl/obj_radio/icon_' . $row[0] . '.png', '123x72');
        $chat->mp3 = $row[2];
        $chat->chat = $row[1];
        array_push($app->all_chat, $chat);
    }

    $color_sel = '000000';
    if ($id_sub_menu == '0') {
        $color_sel = '6a5acd';
    }
    $arr_data_item = Array('0', '3', 'msg_box_func', get_key_lang($link,'radio_area', $lang_sel), $color_sel);
    array_push($app->all_tip, $arr_data_item);

    $color_sel = '000000';
    if ($id_sub_menu == '1') {
        $color_sel = '6a5acd';
    }
    $arr_data_item = Array('1', '3', 'msg_box_func', get_key_lang($link,'radio_world', $lang_sel), $color_sel);
    array_push($app->all_tip, $arr_data_item);
    mysqli_free_result($list_view);
}

if ($func == 'list_person') {
    $list_view = mysqli_query($link,"SELECT * FROM `app_my_girl_preson` WHERE `sex` = '$sex' and (`os`='' or `os`='$os')  ORDER BY RAND() LIMIT 21");
    while ($row = mysqli_fetch_array($list_view)) {
        $chat = new Chat();
        $chat->id_chat = $row[0];
        $chat->link = thumb(URL.'/app_mygirl/obj_preson/icon_' . $row[0] . '.png', '123x72');
        $chat->chat = $row[1];
        array_push($app->all_chat, $chat);
    }
    mysqli_free_result($list_view);
}

if ($func == 'load_ads') {
    if ($os == "android") {
        $list_ads = mysqli_query($link,"SELECT * FROM `app_my_girl_ads` WHERE `android`!='' ORDER BY RAND()");
    } else {
        $list_ads = mysqli_query($link,"SELECT * FROM `app_my_girl_ads` WHERE `ios`!='' ORDER BY RAND()");
    }

    while ($row = mysqli_fetch_array($list_ads)) {
        $chat = new Chat();
        $chat->id_chat = $row[0];
        $chat->chat = $row['name'];
        if ($os == "android") {
            $chat->data_text = $row['android'];
        } else {
            $chat->data_text = $row['ios'];
        }
        $chat->link = thumb(URL.'/app_mygirl/obj_ads/icon_' . $row[0] . '.png', '50x50');

        array_push($app->all_chat, $chat);
    }
    mysqli_free_result($list_ads);
}

if ($func == 'show_chat') {
    $id = $_POST['text'];
    $result_chat = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id' LIMIT 1");
    if (mysqli_num_rows($result_chat)) {
        Chat_report(mysqli_fetch_array($result_chat), 'chat', $lang_sel, $link);
    }
}

if ($func == 'hit') {
    Chat_report(chat_func($link,'dam'), 'msg', $lang_sel, $link);
}

if ($func == 'thong_bao') {
    Chat_report(chat_func($link,'thong_bao'), 'msg', $lang_sel, $link);
}

if ($func == 'tra_loi_thong_bao') {
    Chat_report(chat_func($link,'tra_loi_thong_bao'), 'msg', $lang_sel, $link);
}

if ($func == 'bat_chuyen') {
    Chat_report(chat_func($link,'bat_chuyen'), 'msg', $lang_sel, $link);
}

if ($func == 'tra_loi') {
    $id = $_POST['text'];
    $result_chat = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id' AND `sex` = '$sex' AND `character_sex`='$character_sex' LIMIT 1");
    if (mysqli_num_rows($result_chat)) {
        Chat_report(mysqli_fetch_array($result_chat), 'chat', $lang_sel, $link);
    }
}

if ($func == 'chat') {


    $text = strtolower($_POST['text']);

    if ($text[0] == "?" & strlen($text) > 4) {

        $text = str_replace('?', '', $text);
        $wiki = wikidefinition($text, $lang_sel);
        if ($wiki != "") {
            $tim_kiem = chat_func('tim_thay');
            $tim_kiem['chat'] = str_replace('{thong_tin}', $wiki, $tim_kiem['chat']);
            Chat_report($tim_kiem, 'msg', $lang_sel, $link);
        } else {
            $tim_kiem = chat_func('khong_tim_thay');
            Chat_report($tim_kiem, 'msg', $lang_sel, $link);
        }
    }

    $result = 0;
    if ($text !== "sex") {

        // sanitize imput
        $equation = preg_replace("/[^a-z0-9+\-.*\/()%]/", "", $text);
        // convert alphabet to $variabel 
        $equation = preg_replace("/([a-z])+/i", "\$$0", $equation);
        // convert percentages to decimal
        $equation = preg_replace("/([+-])([0-9]{1})(%)/", "*(1\$1.0\$2)", $equation);
        $equation = preg_replace("/([+-])([0-9]+)(%)/", "*(1\$1.\$2)", $equation);
        $equation = preg_replace("/([0-9]{1})(%)/", ".0\$1", $equation);
        $equation = preg_replace("/([0-9]+)(%)/", ".\$1", $equation);

        if ($equation != "") {
            $chat = new Chat();
            $giai_toan = chat_func($link,'giai_toan');
            $chat->color = $giai_toan['color'];
            $chat->effect = $giai_toan['effect'];

            $result = @eval("return " . $equation . ";");
            $chat->chat = str_replace('{giai_toan}', '=' . $result, $giai_toan['chat']);

            $table_app_temp = 'app_mygirl/app_my_girl_temp_' . $lang_sel;
            $table_app = 'app_mygirl/app_my_girl_msg_' . $lang_sel;
            $id_device = $_POST['id_device'];
            $voice_lang = get_key_lang($link,'voice_character_sex_' . $giai_toan['character_sex'], $lang_sel);
            if ($voice_lang == 'google') {
                $txt_chat = $chat->chat;
                $link_audio = 'http://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen=' . strlen($chat->chat) . '&client=tw-ob&q=' . urlencode($chat->chat) . '&tl=' . $lang_sel;
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
                    file_put_contents(dirname(__FILE__) . '/' . $table_app_temp . '/' . $id_device . '.mp3', $output);
                }
                $chat->mp3 = URL.'/' . $table_app_temp . '/' . $id_device . '.mp3';
            } else {
                if (file_exists($table_app . '/' . $giai_toan['id'] . '.mp3')) {
                    $chat->mp3 = URL.'/' . $table_app . '/' . $giai_toan['id'] . '.mp3';
                }
            }

        }
    } else {
        $result == null;
    }


    if ($result == null) {
        mysqli_query($link,"INSERT INTO `app_my_girl_key` (`key`, `lang`,`sex`,`dates`,`os`,`character`,`character_sex`,`version`,`id_question`,`type_question`,`id_device`,`location_lon`,`location_lat`) VALUES ('$text', '$lang_sel','$sex','$date_cur','$os',$character,$character_sex,$version,'$id_question','$type_question','$id_device','$location_lon','$location_lat');");
        check_func_msg_sevrer($type_question, $id_device, $text, $lang_sel, $link, $sex);

        if ($id_question != '') {
            $txt_table_chat_return = 'app_my_girl_' . $lang_sel;
            $get_child_chat = mysqli_query($link,"SELECT * FROM  `$txt_table_chat_return`  WHERE `text`='$text' AND `pater` = '$id_question' AND `pater_type` = '$type_question' AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `disable` = '0' ORDER BY RAND() LIMIT 1");
            if (mysqli_num_rows($get_child_chat)) {
                Chat_report(mysqli_fetch_array($get_child_chat), 'chat', $lang_sel, $link);
            }

            $get_child_chat2 = mysqli_query($link,"SELECT * FROM  `$txt_table_chat_return` WHERE MATCH (text)  AGAINST ('$text' IN BOOLEAN MODE) AND `pater` = '$id_question' AND `pater_type` = '$type_question' AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `disable` = '0' LIMIT 1");
            if (mysqli_num_rows($get_child_chat2)) {
                Chat_report(mysqli_fetch_array($get_child_chat2), 'chat', $lang_sel, $link);
            }
        }


        $result_chat4 = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `text`='$text' AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `pater`='' AND `disable` = '0' $txt_limit_ver  $txt_limit_os $txt_limit_chat ORDER BY RAND() LIMIT 1");

        if (mysqli_num_rows($result_chat4)) {
            Chat_report(mysqli_fetch_array($result_chat4), 'chat', $lang_sel, $link);
        }


        $result_chat = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `text` LIKE '%$text%' AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `pater`='' AND `disable` = '0' $txt_limit_os $txt_limit_ver $txt_limit_chat ORDER BY RAND() LIMIT 1");

        if (mysqli_num_rows($result_chat)) {
            Chat_report(mysqli_fetch_array($result_chat), 'chat', $lang_sel, $link);
        } else {
            $result_chat2 = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE MATCH (text)  AGAINST ('$text' IN BOOLEAN MODE)  AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `pater`='' AND `disable` = '0' $txt_limit_os $txt_limit_ver $txt_limit_chat LIMIT 1");
            if (mysqli_num_rows($result_chat2)) {
                Chat_report(mysqli_fetch_array($result_chat2), 'chat', $lang_sel, $link);
            }


            //mysqli_query($link,"INSERT INTO `app_my_girl_key` (`key`, `lang`,`sex`,`dates`,`os`,`character`,`character_sex`,`version`,`id_question`,`type_question`,`id_device`,`location_lon`,`location_lat`) VALUES ('$text', '$lang_sel','$sex',now(),'$os',$character,$character_sex,$version,'$id_question','$type_question','$id_device','$location_lon','$location_lat');");
            Chat_report(chat_func($link,'bam_bay'), 'msg', $lang_sel, $link);
        }
        mysqli_free_result($result_chat);

        Chat_report(chat_func($link,'bam_bay'), 'msg', $lang_sel, $link);


    }
    array_push($app->all_chat, $chat);
}

echo json_encode($app);


mysqli_close($link);