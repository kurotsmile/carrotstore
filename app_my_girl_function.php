<?php
include "config.php";
include "database.php";

function isset_file($file)
{
    return (isset($file) && $file['error'] != UPLOAD_ERR_NO_FILE);
}

function show_info_user($lang_sel, $id_device, $show_phone)
{
    $name_user = "";
    $list_effect = mysql_query("SELECT * FROM `app_my_girl_user_$lang_sel` WHERE `id_device`='$id_device' LIMIT 1");
    if ($list_effect != false) {
        if (mysql_num_rows($list_effect) > 0) {
            $arr_data = mysql_fetch_array($list_effect);

            $filename_avatar = 'app_mygirl/app_my_girl_' . $lang_sel . '_user/' . $id_device . '.png';
            $txt_img_url = URL . '/images/avatar_default.png';
            if (file_exists($filename_avatar)) {
                $txt_img_url = thumb($filename_avatar, '60x60');
            }

            if ($show_phone == '') {
                $name_user = "<a href='" . $url . "/app_my_girl_user_detail.php?id=" . $arr_data[0] . "&lang=" . $lang_sel . "'  target='_blank' class='box_user'> <img src='" . $txt_img_url . "' style='width:30px'>";
            } else {
                $name_user = "<a href='" . $url . "/app_my_girl_user_detail.php?id=" . $arr_data[0] . "&lang=" . $lang_sel . "' class='box_user' style='width:100%;'> <img src='" . $txt_img_url . "' style='width:60px'>";
            }
            $name_user .= '<span class="name">' . $arr_data[1] . '</span><br/>';
            if ($arr_data[5] != '') {
                $name_user .= '<span class="address"> Địa chỉ:' . $arr_data[5] . '</span><br/>';
            }

            if ($arr_data[6] != '' && $show_phone != '') {
                $name_user .= '<span class="phone"> Số điện thoại:' . $arr_data[6] . '</span>';
            }
            $name_user .= '</a>';
        }
    }
    mysql_free_result($list_effect);
    return $name_user;
}

function show_info_user_name($lang_sel, $id_device)
{
    $name_user = "";
    $list_effect = mysql_query("SELECT `name` FROM `app_my_girl_user_$lang_sel` WHERE `id_device`='$id_device' LIMIT 1");
    if ($list_effect != false) {
        if (mysql_num_rows($list_effect) > 0) {
            $arr_data = mysql_fetch_array($list_effect);
            $name_user = $arr_data[0];
        } else {
            $name_user = $id_device;
        }
    }
    mysql_free_result($list_effect);
    return $name_user;
}

//start app nguoi yeu ao
function show_row_chat_prefab($data, $lang, $txt_fun_other)
{
    global $url;
    $txt_link = '';
    $id_row = $data['id'];
    if (isset($data['func'])) {
        $txt_text = $data['func'];
    } else {
        $txt_text = $data['text'];
    }
    $txt_style = '';
    $txt_tip = '';
    $txt_type = '<i class="fa fa-circle" aria-hidden="true"></i>';
    $txt_type_func = '';
    $type_chat = '';
    $txt_audio = '';
    $txt_audio_tip = '';
    $txt_update = '';
    $txt_limit = '';
    $txt_effect_new = '';
    $txt_color = '';
    $txt_sex = '';

    if (isset($_GET['new_id'])) {
        if ($_GET['new_id'] == $id_row) {
            $txt_effect_new = ' new';
        }
    }

    $txt_view_pather = '';
    $txt_color_btn_update = 'orange';
    if (isset($_SESSION['off_color'])) {
        $txt_color_btn_update = '';
    }

    if (isset($data['func'])) {
        $type_chat = "msg";
        $txt_update = '<a href="' . $url . '/app_my_girl_update.php?id=' . $id_row . '&lang=' . $lang . '&msg=1" target="_blank" class="buttonPro small ' . $txt_color_btn_update . '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa Msg</a>';
    } else {
        $type_chat = "chat";
        $txt_update = '<a href="' . $url . '/app_my_girl_update.php?id=' . $id_row . '&lang=' . $lang . '" target="_blank" class="buttonPro small ' . $txt_color_btn_update . '"><i class="fa fa-pencil-square" aria-hidden="true"></i> Sửa chat</a>';

    }

    if ($data['pater'] != '') {
        $txt_style = ';background-color: #b3ffd5;';
        $txt_type = '<i ' . $txt_view_pather . ' class="fa fa-circle-o" aria-hidden="true"></i>';
        $txt_view_pather = ' onclick="view_pater(\'' . $lang . '\',\'' . $data['pater'] . '\',\'' . $data['pater_type'] . '\',\'' . $data['sex'] . '\',\'' . $data['character_sex'] . '\');return false;" ';
        $txt_update = $txt_update . '<a href="" class="buttonPro small yellow" ' . $txt_view_pather . ' title="Xem mối quan hệ của đối tượng này"><i class="fa fa-anchor" aria-hidden="true"></i></a>';
    }

    if ($data['id_redirect'] != '') {
        $id_redirect = $data['id_redirect'];
        $result_chat = mysql_query("SELECT * FROM `app_my_girl_$lang` WHERE `id` = '$id_redirect'");
        $arr_chat = mysql_fetch_array($result_chat);
        if ($data['pater'] != '') {
            $txt_type = '<i class="fa fa-dot-circle-o" aria-hidden="true"></i> <i class="fa fa-circle-o" aria-hidden="true"></i>';
        } else {
            $txt_type = '<i  class="fa fa-dot-circle-o" aria-hidden="true"></i>';
        }
        $txt_style = ';background-color: #C0F17E;';
        $data = $arr_chat;
        mysql_free_result($result_chat);
    }

    if ($data['disable'] != '0') {
        $txt_style = ';background-color: #ff6f6f;';
    }

    if ($type_chat == 'msg') {
        if (file_exists('app_mygirl/app_my_girl_msg_' . $lang . '/' . $data['id'] . '.mp3')) {
            $txt_audio = '<a href="' . $url . '/app_mygirl/app_my_girl_msg_' . $lang . '/' . $data['id'] . '.mp3" target="_blank"><i class="fa fa-file-audio-o" aria-hidden="true"></i> File sever</a>';
        } else {
            $url_voice_audio = get_key_lang('voice_character_sex_' . $data['character_sex'], $lang);
            if ($url_voice_audio == '') {
                $txt_audio = '<span style="color:red;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Chưa có</span>';
            } else {
                if ($url_voice_audio == 'google') {
                    $url_voice_audio = 'http://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen=' . strlen($data['chat']) . '&client=tw-ob&q=' . $data['chat'] . '&tl=' . $lang;
                    $txt_audio_tip = ' Google voice';
                } else {
                    $url_voice_audio = str_replace('{txt}', $data['chat'], $url_voice_audio);
                    $txt_audio_tip = ' Api voice';
                }
                $txt_audio = '<a href="' . $url_voice_audio . '" target="_blank"><i class="fa fa-volume-up" aria-hidden="true"></i> ' . $txt_audio_tip . '</a> ';
            }
        }
    } else {
        if ($data['file_url'] != '') {
            $txt_audio = '<a title="Âm thanh được lưu ở máy chủ khác" href="' . $data['file_url'] . '" target="_blank"><i class="fa fa-cloud" aria-hidden="true"></i> File sever</a>';
            if (file_exists('app_mygirl/app_my_girl_' . $lang . '/' . $data['id'] . '.mp3')) {
                $txt_audio.=' <a href="' . $url . '/app_mygirl/app_my_girl_' . $lang . '/' . $data['id'] . '.mp3" target="_blank"><i class="fa fa-file-audio-o" aria-hidden="true"></i> File sever</a>';
            }
        } else {
            if (file_exists('app_mygirl/app_my_girl_' . $lang . '/' . $data['id'] . '.mp3')) {
                $txt_audio = '<a href="' . $url . '/app_mygirl/app_my_girl_' . $lang . '/' . $data['id'] . '.mp3" target="_blank"><i class="fa fa-file-audio-o" aria-hidden="true"></i> File sever</a>';
            } else {
                if ($data['effect'] == '2') {
                    $txt_audio = '<span style="color:red;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Chưa có</span>';
                } else {
                    $url_voice_audio = get_key_lang('voice_character_sex_' . $data['character_sex'], $lang);
                    if ($url_voice_audio == '') {
                        $txt_audio = '<span style="color:red;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Chưa có</span>';
                    } else {
                        if ($url_voice_audio == 'google') {
                            $url_voice_audio = 'http://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen=' . strlen($data['chat']) . '&client=tw-ob&q=' . $data['chat'] . '&tl=' . $lang;
                            $txt_audio_tip = ' Google voice';
                        } else {
                            $url_voice_audio = str_replace('{txt}', $data['chat'], $url_voice_audio);
                            $txt_audio_tip = ' Api voice';
                        }
                        $txt_audio = '<a href="' . $url_voice_audio . '" target="_blank"><i class="fa fa-volume-up" aria-hidden="true"></i> ' . $txt_audio_tip . '</a>';
                    }
                }
            }
        }

        if ($data['tip'] == '1') {
            $txt_type_func .= ' <i class="fa fa-lightbulb-o" aria-hidden="true" title="Trò chuyện này được gợi ý cho người dùng"></i> ';
        }

        if ($data['link'] != '') {
            $txt_type_func .= ' <a href="' . $data['link'] . '" target="_blank"><i  class="fa fa-link" aria-hidden="true" title="' . $data['link'] . '"></i></a> ';
        }

    }

    if ($data['sex'] == '0') {
        $txt_sex .= '<i style="font-size:14px;color:blue" class="fa fa-male" aria-hidden="true" title="Nam"></i>';
    } else {
        $txt_sex .= '<i style="font-size:14px;color:red" class="fa fa-female" aria-hidden="true" title="Nữ"></i>';
    }
    $txt_sex .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> ';
    if ($data['character_sex'] == '0') {
        $txt_sex .= '<i style="font-size:14px;color:blue" class="fa fa-male" aria-hidden="true" title="Nam"></i>';
    } else {
        $txt_sex .= '<i style="font-size:14px;color:red" class="fa fa-female" aria-hidden="true" title="Nữ"></i>';
    }

    $txt_limit = '';
    if ($data['ver'] != '0') {
        $txt_limit = ' <i class="fa fa-adjust" aria-hidden="true" tyle="Phiên bản triển khai"></i> ' . $data['ver'] . ' ';
    }
    $txt_limit = $txt_limit . ' <i class="fa fa-shield" aria-hidden="true" title="Xếp hạng thô tục và tình dục"></i> ' . $data['limit_chat'] . ' ';

    if ($data['os_android'] == '0') {
        $txt_limit = $txt_limit . ' <i class="fa fa-android" aria-hidden="true" title="Hiển thị trên nền tản Android"></i> ';
    }

    if ($data['os_window'] == '0') {
        $txt_limit = $txt_limit . ' <i class="fa fa-windows" aria-hidden="true" title="Hiển thị trên nền tản Window"></i> ';
    }

    if ($data['os_ios'] == '0') {
        $txt_limit = $txt_limit . ' <i class="fa fa-apple" aria-hidden="true" title="Hiển thị trên nền tản Ios"></i> ';
    }

    if ($data['effect'] == '1') {
        $txt_type_func .= '<i class="fa fa-heart" aria-hidden="true" title="Thả tim"></i>';
    }
    if ($data['effect'] == '2') {
        $txt_type_func .= '<i class="fa fa-music" aria-hidden="true" title="Âm nhạc"></i>';
    }
    if ($data['effect'] == '3') {
        $txt_type_func .= '<i class="fa fa-asterisk" aria-hidden="true" title="Vinh danh"></i>';
    }
    if ($data['effect'] == '4') {
        $txt_type_func .= '<i class="fa fa-power-off" aria-hidden="true" title="Thoát ứng dụng"></i>';
    }
    if ($data['effect'] == '5') {
        $txt_type_func .= '<i class="fa fa-tint" aria-hidden="true" title="Mưa rơi"></i>';
    }
    if ($data['effect'] == '6') {
        $txt_type_func .= '<i class="fa fa-camera" aria-hidden="true" title="Chụp ảnh"></i>';
    }
    if ($data['effect'] == '7') {
        $txt_type_func .= '<i class="fa fa-snowflake-o" aria-hidden="true" title="Tuyết rơi"></i>';
    }
    if ($data['effect'] == '45') {
        $txt_type_func .= '<i class="fa fa-star" aria-hidden="true" title="Đánh giá ứng dụng"></i>';
    }
    if ($data['effect'] == '48') {
        $txt_type_func .= '<i class="fa fa-history" aria-hidden="true" title="Lịch sử trò chuyện"></i>';
    }
    if ($data['effect'] == '29') {
        $txt_type_func .= '<img src="' . $url . '/app_mygirl/img/statu29.png"/>';
    }

    if ($data['effect'] == '36') {
        $txt_type_func .= '<i class="fa fa-quote-left" aria-hidden="true" title="Châm ngôn" ></i>';
    }

    if ($data['effect'] == '49') {
        $txt_type_func .= '<i class="fa fa-book" aria-hidden="true" title="Kể chuyện"></i>';
    }

    if (isset($_SESSION['off_color'])) {
        $txt_color = '';
    } else {
        $txt_color = 'background-color:' . $data['color'] . ';border-radius:8px;';
    }

    return '<tr style="' . $txt_style . '" class="chat_row_' . $id_row . ' ' . $txt_effect_new . '"><td>' . $id_row . '</td><td>' . $txt_type . '</td><td>' . $txt_text . '</td><td style="' . $txt_color . '" >' . limit_words($data['chat'], 10) . '</td><td>' . $txt_sex . '</td><td>' . $txt_type_func . '</td><td>' . $txt_limit . '</td><td>' . $txt_audio . '</td><td>' . $txt_update . '</td><td>' . $txt_fun_other . '</td></tr>';
}


function show_row_history_prefab($row)
{
    global $url;
    $txt_map = '';
    $txt_rate = '';

    if ($row['location_lon'] != "" && $row['location_lon'] != "0") {
        $txt_map = "<a href='https://www.google.com/maps/?q=" . $row['location_lat'] . "," . $row['location_lon'] . "' class='buttonPro small googleButton pink'  target='_blank' ><i class='fa fa-map-marker' aria-hidden='true'></i> view map</a>";
    }

    $txt_nifo_other = '<a href="#" class="buttonPro small light_blue" onclick="view_pater(\'' . $row['lang'] . '\',\'' . $row['id_question'] . '\',\'' . $row['type_question'] . '\');return false;">' . $row['id_question'] . ' ' . $row['type_question'] . '</a> ';

    if (isset($row['COUNT(*)'])) {
        if ($row['0'] != "1") {
            $txt_rate = "<a href='#' class='buttonPro small yellow' onclick='view_more(\"" . $row['key'] . "\");return false;'>" . $row['0'] . "</a>";
        } else {
            $txt_rate = "<a href='#' class='buttonPro small' onclick='view_chat_see(\"" . $row['id_question'] . "\",\"" . $row['type_question'] . "\");return false;'>1</a>";
        }
    }

    if ($row['sex'] == '0') {
        $sex = 'Nam';
    } else {
        $sex = 'Nữ';
    }

    $txt_os = '<i class="fa fa-ban" aria-hidden="true"></i>';
    if ($row['os'] == "android") {
        $txt_os = '<i class="fa fa-android" aria-hidden="true"></i> Android';
    } else if ($row['os'] == "ios") {
        $txt_os = '<i class="fa fa-apple" aria-hidden="true"></i> Ios';
    } else {
        $txt_os = '<i class="fa fa-ban" aria-hidden="true"></i>';
    }
    $txt_btn_view_cur_chat1 = '<button class="buttonPro small blue" onclick="show_join(\'' . $row['key'] . '\',\'' . $row['lang'] . '\',\'' . $row['sex'] . '\',\'' . $row['character_sex'] . '\',\'=\')">Trả lời giống</button>';
    $txt_btn_view_cur_chat2 = '<button class="buttonPro small light_blue" onclick="show_join(\'' . $row['key'] . '\',\'' . $row['lang'] . '\',\'' . $row['sex'] . '\',\'' . $row['character_sex'] . '\',\'like\')">Trả lời Gần giống</button>';
    $txt_btn_view_cur_chat3 = '<button class="buttonPro small light_blue" onclick="show_join(\'' . $row['key'] . '\',\'' . $row['lang'] . '\',\'' . $row['sex'] . '\',\'' . $row['character_sex'] . '\',\'search\')">Trả lời xàm</button>';
    $txt_btn_add = '<a href="' . $url . '/app_my_girl_add.php?key=' . $row['key'] . '&lang=' . $row['lang'] . '&sex=' . $row['sex'] . '&character_sex=' . $row['character_sex'] . '" target="_blank" class="buttonPro green small">Thêm (toàn cục)</a> ';

    $txt_btn_add_sub = '<a href="' . $url . '/app_my_girl_add.php?key=' . $row['key'] . '&lang=' . $row['lang'] . '&sex=' . $row['sex'] . '&character_sex=' . $row['character_sex'] . '&type_question=' . $row['type_question'] . '&id_question=' . $row['id_question'] . '" target="_blank" class="buttonPro green small">Thêm (cục bộ)</a> ';


    if ($row['id_device'] != '') {
        $txt_id_device = '<a class="buttonPro small purple" onclick="view_device(\'' . $row['id_device'] . '\',\'' . $row['dates'] . '\',\'' . $row['lang'] . '\');return false;">Xem lịch sử của :' . show_info_user_name($row['lang'], $row['id_device']) . '</a>';
    } else {
        $txt_id_device = '';
    }

    $txt_sex = '';
    if ($row['sex'] == '0') {
        $txt_sex .= '<i style="font-size:14px;color:blue" class="fa fa-male" aria-hidden="true" title="Nam"></i>';
    } else {
        $txt_sex .= '<i style="font-size:14px;color:red" class="fa fa-female" aria-hidden="true" title="Nữ"></i>';
    }
    $txt_sex .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> ';
    if ($row['character_sex'] == '0') {
        $txt_sex .= '<i style="font-size:14px;color:blue" class="fa fa-male" aria-hidden="true" title="Nam"></i>';
    } else {
        $txt_sex .= '<i style="font-size:14px;color:red" class="fa fa-female" aria-hidden="true" title="Nữ"></i>';
    }

    echo '<tr style="border:solid 1px green"><td>' . $row['key'] . '</td><td>' . $txt_rate . '</td><td>' . $row['lang'] . '</td><td>' . $txt_os . '</i></td><td>' . $row['version'] . '</td><td>' . $row['character'] . '</td><td>' . $txt_sex . '</td><td>' . $txt_nifo_other . '</td><td>' . $txt_id_device . '</td><td>' . $txt_btn_view_cur_chat1 . ' ' . $txt_btn_view_cur_chat2 . ' ' . $txt_btn_view_cur_chat3 . ' ' . $txt_btn_add . ' ' . $txt_btn_add_sub . ' ' . $txt_map . '</td></tr>';
}


function show_row_msg_prefab($link,$row, $langsel, $btn_more = null)
{
    global $url;
    $txt_style = '';
    $txt_limit = '';
    $txt_audio_tip = '';
    $bnt_history = '<a href="' . $url . '/app_my_girl_history.php?id_chat_see=' . $row['id'] . '&type_chat_see=msg&lang=' . $langsel . '&sex=' . $row['sex'] . '&character_sex=' . $row['character_sex'] . '" class="buttonPro small blue" target="_blank"><i class="fa fa-user" aria-hidden="true"></i> Lịch sử dùng</a>';
    $bnt_history_func= ' onclick="view_pater(\'' . $langsel . '\',\'' . $row['id'] . '\',\'msg\',\'' . $row['sex'] . '\',\'' . $row['character_sex'] . '\');return false;" ';
    $bnt_history .= '<a href="" ' . $bnt_history_func . ' class="buttonPro small yellow" title="Xem mối quan hệ của đối tượng này"><i class="fa fa-anchor" aria-hidden="true"></i></a>';

    if ($row['disable'] == '0') {
        $txt_disable = '<i class="fa fa-toggle-on" aria-hidden="true" style="color:green"></i>';
    } else {
        $txt_style = 'background:#ffcece';
        $txt_disable = '<i class="fa fa-toggle-off" aria-hidden="true" style="color:red"></i>';
    }
    if ($row['os'] == '') {
        $txt_limit = 'version:' . $row['ver'] . ' - os:none';
    } else {
        $txt_limit = 'version:' . $row['ver'] . ' - os:' . $row['os'];
    }
    $txt_limit = $txt_limit . ' - limit chat:' . $row['limit_chat'] . ' ' . $row['limit_day'];
    if ($row['limit_day'] != '') {
        $txt_limit = $txt_limit . ' - Day (' . $row['limit_day'] . ')';
    }

    if ($row['limit_month'] != '') {
        $txt_limit = $txt_limit . ' - Month (' . $row['limit_month'] . ')';
    }

    if (file_exists('app_mygirl/app_my_girl_msg_' . $langsel . '/' . $row['id'] . '.mp3')) {
        //$txt_audio='<audio controls><source src="'.$url.'/app_mygirl/app_my_girl_'.$lang.'/'.$data['id'].'.mp3" type="audio/ogg"></audio>';
        $txt_audio = '<a href="' . $url . '/app_mygirl/app_my_girl_msg_' . $langsel . '/' . $row['id'] . '.mp3" target="_blank"><i class="fa fa-volume-up" aria-hidden="true"></i> File sever</a>';
    } else {
        $url_voice_audio = get_key_lang($link,'voice_character_sex_' . $row['character_sex'], $langsel);
        if ($url_voice_audio == '') {
            $txt_audio = '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Chưa có';
        } else {
            if ($url_voice_audio == 'google') {
                $url_voice_audio = 'http://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen=' . strlen($row['chat']) . '&client=tw-ob&q=' . $row['chat'] . '&tl=' . $langsel;
                $txt_audio_tip = ' Google voice';
            } else {
                $url_voice_audio = str_replace('{txt}', $row['chat'], $url_voice_audio);
                $txt_audio_tip = ' Api voice';
            }
            $txt_audio = '<a href="' . $url_voice_audio . '" target="_blank"><i class="fa fa-volume-up" aria-hidden="true"></i>' . $txt_audio_tip . '</a> ';
        }
    }

    $txt_sex = '';
    if ($row['sex'] == '0') {
        $txt_sex .= '<i style="font-size:14px;color:blue" class="fa fa-male" aria-hidden="true" title="Nam"></i>';
    } else {
        $txt_sex .= '<i style="font-size:14px;color:red" class="fa fa-female" aria-hidden="true" title="Nữ"></i>';
    }
    $txt_sex .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> ';
    if ($row['character_sex'] == '0') {
        $txt_sex .= '<i style="font-size:14px;color:blue" class="fa fa-male" aria-hidden="true" title="Nam"></i>';
    } else {
        $txt_sex .= '<i style="font-size:14px;color:red" class="fa fa-female" aria-hidden="true" title="Nữ"></i>';
    }

    echo '<tr style="border:solid 1px green;' . $txt_style . '"><td>' . $row['id'] . '</td><td>' . $row['func'] . '</td><td title="' . $row['chat'] . '">' . limit_words($row['chat'], 10) . '</td><td>' . $txt_sex . '</td><td>status(' . $row['status'] . ') - effect(' . $row['effect'] . ')</td><td>action(' . $row['action'] . ') - face(' . $row['face'] . ')</td><td>' . $txt_limit . '</td><td>' . $txt_audio . '</td><td>' . $txt_disable . '</td><td> <a href="' . $url . '/app_my_girl_update.php?id=' . $row['id'] . '&lang=' . $langsel . '&msg=1" target="_blank" class="buttonPro small orange"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a> ' . $bnt_history . ' ' . $btn_more . ' </td></tr>';
}

function show_alert($msg, $type)
{
    echo '<div class="show_alert">';
    if ($type == 'alert') {
        echo '<div class="alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ' . $msg . '</div>';
    }
    if ($type == 'info') {
        echo '<div class="info"><i class="fa fa-info-circle" aria-hidden="true"></i> ' . $msg . '</div>';
    }

    if ($type == 'error') {
        echo '<div class="error"><i class="fa fa-exclamation" aria-hidden="true"></i> ' . $msg . '</div>';
    }
    echo '</div>';
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

function get_user_name_by_id($id_user)
{
    $query_login = mysql_query("Select `user_name` From `carrotsy_work`.`work_user` WHERE `user_id`='$id_user' Limit 1");
    if (mysql_num_rows($query_login) > 0) {
        $data_user_login = mysql_fetch_array($query_login);
        return $data_user_login['user_name'];
    } else {
        return $id_user;
    }
}

function shuffle_assoc($list)
{
    if (!is_array($list)) return $list;

    $keys = array_keys($list);
    shuffle($keys);
    $random = array();
    foreach ($keys as $key) {
        $random[$key] = $list[$key];
    }
    return $random;
}

function object_to_array($data)
{
    if (is_array($data) || is_object($data)) {
        $result = array();
        foreach ($data as $key => $value) {
            $result[$key] = object_to_array($value);
        }
        return $result;
    }
    return $data;
}


function delete_chat_by_lang($id, $lang_sel)
{
    $check_chat = mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id' LIMIT 1");
    $data_chat = mysql_fetch_array($check_chat);
    $result_chat = mysql_query("DELETE FROM `app_my_girl_$lang_sel` WHERE `id` = '$id'");

    $filename = 'app_mygirl/app_my_girl_' . $lang_sel . '/' . $id . '.mp3';
    echo 'Xóa câu trò chuyện #' . $id . ' thành công !!!<br/>';
    if (file_exists($filename)) {
        unlink($filename);
        echo "Đã xóa file âm thanh $filename <br/>";
    } else {
        echo "Không có file âm thanh $filename để xóa <br/>";
    }

    mysql_free_result($result_chat);

    $check_field_chat = mysql_query("SELECT * FROM `app_my_girl_field_$lang_sel` WHERE `id_chat` = '$id' AND `type_chat` = 'chat' LIMIT 1");
    if (mysql_num_rows($check_field_chat) > 0) {
        $query_delete_field = mysql_query("DELETE FROM `app_my_girl_field_$lang_sel` WHERE `id_chat` = '$id' AND `type_chat` = 'chat' LIMIT 1;");
        mysql_free_result($query_delete_field);
        echo "Xóa trường dữ liệu (Field chat) thành công!";
    } else {
        echo "Không có trường dữ liệu (Field chat)";
    }

    if ($data_chat['effect'] == '2') {
        echo "<br/>Xóa các chức năng liên quan tới nhạc";
        $check_video = mysql_query("SELECT * FROM `app_my_girl_video_$lang_sel` WHERE  `id_chat` = '$id' LIMIT 1");
        if (mysql_num_rows($check_video) > 0) {
            mysql_query("DELETE FROM `app_my_girl_video_$lang_sel` WHERE `id_chat` = '$id'");
            echo mysql_error();
            echo "<br/>Xóa liên kết video thành công!";
        }
        mysql_free_result($check_video);

        $show_lyrics = mysql_query("SELECT * FROM `app_my_girl_" . $lang_sel . "_lyrics` WHERE `id_music` = '$id' LIMIT 1");
        if (mysql_num_rows($show_lyrics) > 0) {
            mysql_query("DELETE FROM `app_my_girl_music_" . $lang_sel . "_lyrics` WHERE `id_music` = '$id' LIMIT 1;");
            echo mysql_error();
            echo "<br/>Xóa lời bài hát!";
        }
        mysql_free_result($show_lyrics);

        $check_rank_music = mysql_query("SELECT * FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat`='$id' LIMIT 1");
        if (mysql_num_rows($check_rank_music) > 0) {
            mysql_query("DELETE FROM `app_my_girl_music_data_$lang_sel` WHERE `id_music` = '$id' LIMIT 1;");
            echo mysql_error();
            echo "<br/>Xóa bản xếp hạng liên quan đến bài hát!";
        }
        mysql_num_rows($check_rank_music);

    }

    mysql_free_result($check_field_chat);
    mysql_free_result($check_chat);
    exit;
}

function show_row_map($chat_item)
{
    $lang_sel = $chat_item['lang'];
    $id = $chat_item['id_question'];

    if ($chat_item['type_question'] == 'chat') {
        $result_chat1 = mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = $id ");
    } else {
        $result_chat1 = mysql_query("SELECT * FROM `app_my_girl_msg_$lang_sel` WHERE `id` = $id ");
    }
    if (mysql_num_rows($result_chat1) > 0) {
        $arr_item = mysql_fetch_array($result_chat1);

        echo '<img src="' . $url . '/app_mygirl/img/' . $chat_item['character_sex'] . '.png" style="width:13px">';
        if ($chat_item['type_question'] == 'chat') {
            $txt_update = '<a href="' . $url . '/app_my_girl_update.php?id=' . $id . '&lang=' . $chat_item['lang'] . '" target="_blank" >' . $arr_item['text'] . '</a>';
        } else {
            $txt_update = '<a href="' . $url . '/app_my_girl_update.php?id=' . $id . '&lang=' . $chat_item['lang'] . '&msg=1" target="_blank" >' . $arr_item['func'] . '</a>';
        }

        if ($chat_item['type_question'] == 'msg') {
            echo '<span style="color:yellow">' . $chat_item['type_question'] . ' > ' . $arr_item['chat'] . '</span> (' . $txt_update . ')<br/>';
        } else {
            echo '<span style="color:#77ff8e">' . $chat_item['type_question'] . ' > ' . $arr_item['chat'] . '</span> (' . $txt_update . ')<br/>';
        }
        echo '<img src="' . $url . '/app_mygirl/img/' . $chat_item['sex'] . '.png" style="width:13px"> <b>' . $chat_item['key'] . '</b><br/>';

        $txt_btn_add = '<a href="' . $url . '/app_my_girl_add.php?key=' . $chat_item['key'] . '&lang=' . $chat_item['lang'] . '&sex=' . $chat_item['sex'] . '&character_sex=' . $chat_item['character_sex'] . '" target="_blank" >Thêm</a>';
        $txt_btn_add = $txt_btn_add . '<a href="' . $url . '/app_my_girl_add.php?key=' . $chat_item['key'] . '&lang=' . $chat_item['lang'] . '&sex=' . $chat_item['sex'] . '&character_sex=' . $chat_item['character_sex'] . '&type_question=' . $chat_item['type_question'] . '&id_question=' . $chat_item['id_question'] . '" target="_blank" >- Thêm đầy đủ (gồ trò chuyện cha)</a>';
        $txt_btn_return1 = '<a onclick="show_join(\'' . $chat_item['key'] . '\',\'' . $chat_item['lang'] . '\',\'' . $chat_item['sex'] . '\',\'' . $chat_item['character_sex'] . '\',\'=\')" >trả lời giống</a>';
        $txt_btn_return2 = '<a onclick="show_join(\'' . $chat_item['key'] . '\',\'' . $chat_item['lang'] . '\',\'' . $chat_item['sex'] . '\',\'' . $chat_item['character_sex'] . '\',\'like\')" >trả lời gần giống</a>';
        $txt_btn_return3 = '<a onclick="show_join(\'' . $chat_item['key'] . '\',\'' . $chat_item['lang'] . '\',\'' . $chat_item['sex'] . '\',\'' . $chat_item['character_sex'] . '\',\'search\')" >trả lời xàm</a>';
        $txt_btn_history = ' <a href="' . $url . '/app_my_girl_history.php?lang=' . $chat_item['lang'] . '&id_chat_see=' . $id . '&type_chat_see=' . $chat_item['type_question'] . '&sex=' . $chat_item['sex'] . '&character_sex=' . $chat_item['character_sex'] . '" target="_blank"><i class="fa fa-user" aria-hidden="true"></i> Lọc theo dõi</a>';
        $txt_btn_history .= ' <a href="' . $url . '/app_my_girl_handling.php?func=check_key&key=' . $chat_item['key'] . '&sex=' . $chat_item['sex'] . '&character_sex=' . $chat_item['character_sex'] . '&lang=' . $chat_item['lang'] . '" target="_blank"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Kiểm tra tồn tại</a> ';
        echo '<span style="font-size:9px;cursor: pointer;">' . $txt_btn_add . ' - ' . $txt_btn_return1 . ' - ' . $txt_btn_return2 . '-' . $txt_btn_return3 . '-' . $txt_btn_history . '</span> ';
        echo '<hr/>';
    }
}


function show_row_music($row, $langsel)
{
    $msql_check_lyric = mysql_query("SELECT * FROM `app_my_girl_" . $langsel . "_lyrics` WHERE `id_music` = '" . $row['id'] . "'  LIMIT 1");
    $bnt_view_lyric = '';
    $btn_search_lyrict = '';
    $count_rank = '';

    $color_btn_ytb = 'blue';
    $color_btn_lyrics = 'blue';
    $color_btn_view_lyrics = 'yellow';
    $color_btn_search_music = 'pink';
    $color_btn_view_video = 'yellow';
    $color_btn_view_store = 'blue';
    if (isset($_SESSION['off_color'])) {
        $color_btn_ytb = 'black';
        $color_btn_lyrics = 'black';
        $color_btn_search_music = 'black';
        $color_btn_view_video = '';
        $color_btn_view_store = '';
    }

    if (mysql_num_rows($msql_check_lyric)) {
        if (isset($_SESSION['off_color'])) {
            $color_btn_lyrics = '';
            $color_btn_view_lyrics = '';

        } else {
            $color_btn_lyrics = 'orange';
        }
        $bnt_view_lyric = '<a href="#" class="buttonPro small ' . $color_btn_view_lyrics . ' " onclick="view_music_lyrics(' . $row['id'] . ');return false;"><i class="fa fa-book"></i> Xem lời bài hát</a>';
    } else {
        $btn_search_lyrict = '<a href="#" class="buttonPro small ' . $color_btn_search_music . '" onclick="search_music_lyrics(\'' . $row['chat'] . '\');return false;"><i class="fa fa-search-plus" aria-hidden="true"></i>  Tìm từ lyrics</a><a href="#" class="buttonPro small ' . $color_btn_search_music . '" title="' . $row['chat'] . '" onclick="search_gg(this);return false;"><i class="fa fa-search-plus" aria-hidden="true"></i> Tìm từ gg</a>';
    }

    mysql_freeresult($msql_check_lyric);
    if ($view_top_music == '-1') {
        $col_rank = "  Số lần tương tác:<strong>" . $row['c'] . "</strong>";
    }
    $check_video = mysql_query("SELECT `link` FROM `app_my_girl_video_$langsel` WHERE  `id_chat` = '" . $row['id'] . "' LIMIT 1");
    $btn_view_video = '';
    if (mysql_num_rows($check_video) > 0) {
        $data_video = mysql_fetch_array($check_video);
        if (isset($_SESSION['off_color'])) {
            $color_btn_ytb = '';
        } else {
            $color_btn_ytb = 'orange';
        }
        $btn_view_video = ' <a href="' . $data_video[0] . '" class="buttonPro small ' . $color_btn_view_video . '" target="_blank"><i class="fa fa-video-camera" aria-hidden="true"></i> Xem video</a>';
    } else {
        $btn_view_video = ' <a href="https://www.youtube.com/results?search_query=' . $row['chat'] . '" target="_blank" class="buttonPro small pink" ><i class="fa fa-search-plus" aria-hidden="true"></i>  Tìm video youtube</a>';
    }
    mysql_free_result($check_video);
    $bnt_update_lyric = '<a href="#" class="buttonPro small ' . $color_btn_lyrics . ' btn_add_lyrics_' . $row['id'] . '" onclick="add_music_lyrics(' . $row['id'] . ');return false;"><i class="fa fa-book"></i> Cập nhật lời bài hát</a> <a href="#" class="buttonPro small ' . $color_btn_ytb . ' btn_add_video_' . $row['id'] . '" onclick="add_video_music(' . $row['id'] . ');return false;"><i class="fa fa-youtube-square" aria-hidden="true"></i> Cập nhật video</a>';
    $bnt_del = '<a href="#" class="buttonPro small red " onclick="delete_table(' . $row['id'] . ');return false;"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>';
    $bnt_view_store = '<a href="/music/'.$row['id'].'/'. $row['author'] . '" class="buttonPro small ' . $color_btn_view_store . ' " target="_blank"><i class="fa fa-external-link-square" aria-hidden="true"></i></a>';
    return show_row_chat_prefab($row, $langsel, $bnt_update_lyric . ' ' . $bnt_del . ' ' . $bnt_view_lyric . ' ' . $btn_search_lyrict . ' ' . $col_rank . ' ' . $bnt_view_store . ' ' . $btn_view_video . mysql_error());
}

function show_name_country_by_key($key_lang)
{
    $query_name = mysql_query("SELECT `name` FROM `app_my_girl_country` WHERE `key` = '$key_lang' LIMIT 1");
    $name_country = mysql_fetch_array($query_name);
    return $name_country[0];
}

function vn_to_str($str)
{
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D' => 'Đ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );

    foreach ($unicode as $nonUnicode => $uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    $str = str_replace(' ', '_', $str);
    return $str;
}

function slug_url($txt)
{

    /* Get rid of accented characters */
    $search = explode(",", "ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,e,i,ø,u");
    $replace = explode(",", "c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,e,i,o,u");
    $txt = str_replace($search, $replace, $txt);

    /* Lowercase all the characters */
    $txt = strtolower($txt);

    /* Avoid whitespace at the beginning and the ending */
    $txt = trim($txt);

    /* Replace all the characters that are not in a-z or 0-9 by a hyphen */
    $txt = preg_replace("/[^a-z0-9]/", "-", $txt);
    /* Remove hyphen anywhere it's more than one */
    $txt = preg_replace("/[\-]+/", '-', $txt);
    return $txt;
}


function box_upload($file_ext, $arr_sever_upload, $value_default = '')
{
    ?>
    <input id="inp_link_file" type="text" value="<?php echo $value_default; ?>" name="file_url" style="display: none"/>
    <?php
    for ($i = 0; $i < count($arr_sever_upload); $i++) {
        ?>
        <span class="buttonPro small light_blue"
              onclick="show_upload('<?php echo $arr_sever_upload[$i]->url; ?>');return false;"><i
                    class="fa fa-cloud-upload"
                    aria-hidden="true"></i> Tải lên <?php echo $arr_sever_upload[$i]->name; ?> (<?php echo $file_ext; ?>)</span>
        <?php
    }
    ?>
    <span id="btn_remove_file_sever" <?php if ($value_default != '') {
        echo 'style="display: nomal;"';
    } else {
        echo 'style="display: none;"';
    } ?> onclick="remove_audio_sever();" class="buttonPro small red"><i class="fa fa-eraser" aria-hidden="true"></i> Không sử dụng </span>
    <div id="box_upload" style="display: none;">
        <div id="title">
            Thêm tập tin
            <span onclick="$('#box_upload').hide();return false;"  style="float: right;background: gray;cursor: pointer;padding: 3px;"><i class="fa fa-window-close" aria-hidden="true"></i></span>
        </div>

        <table id="box_upload_out">
            <tr>
                <td id="box_upload_out_info" style="font-size: 15px;"></td>
            </tr>
            <tr>
                <td>
                    Bấm vào nút này để tải tệp tin mới lên<br/>
                    <input type="file" id="file_upload_sever" name="file_upload_sever"/>
                </td>
            </tr>
            <tr>
                <td id="list_file_upload"></td>
            </tr>
        </table>
    </div>
    <script>
        var sel_url_ajax_sever_upload = '';
        $(document).ready(function () {
            $('#file_upload_sever').ajaxfileupload({
                action: '<?php echo URL . '/app_my_girl_upload_temp.php';?>',
                params: {
                    extra: '<?php echo $file_ext;?>'
                },
                onStart: function () {
                    $("#btn_done_chat").hide();
                    swal('Tải lên tệp tin', 'Bắt đầu tải tệp tin lên máy chủ...');
                }
                ,
                onComplete: function (response) {
                    swal('Tải lên tệp tin', 'Đã tải lên máy chủ hiện tại ở dạng tệp tin tạm thờ và đang trong quá trình chuyển tệp đến máy chủ lưu trữ...');
                    $("#box_upload").hide(200);
                    copy_file_to_sever(response.url,sel_url_ajax_sever_upload, response.ext,response.name_file);
                }
            });
        });

        function copy_file_to_sever(file_temp, url_sever, ext,name_file) {
            $("#btn_done_chat").hide();
            $.ajax({
                type: 'POST',
                url: sel_url_ajax_sever_upload,
                jsonp: "uploadcallback",
                dataType: 'jsonp',
                data: "func=send_file&file_send=" + file_temp + "&ext=" + ext+"&name_file="+name_file,
                success: function (data) {

                }
            });
        }

        infocallback = function (data) {
            $("#box_upload_out_info").html(data.info);
            $("#list_file_upload").html(data.list);
            $("#box_upload").show();
        };

        uploadcallback = function (data) {
            $("#inp_link_file").show();
            $("#inp_link_file").val(data.url);
            $("#btn_remove_file_sever").show();
            $("#file_upload_sever").val('');
            $("#btn_done_chat").show();
            swal('Tải lên tệp tin', 'Chuyển tệp tin hoàn tất','success');
        };

        function show_upload(url_sever) {
            sel_url_ajax_sever_upload = url_sever;
            $.ajax({
                url: url_sever,
                jsonp: "datacallback",
                data: "func=info",
                dataType: 'jsonp',
            });
        }

        function select_file_upload(url_file) {
            $("#file_upload_sever").val('');
            $("#inp_link_file").show();
            $("#inp_link_file").val(url_file);
            $("#box_upload").hide();
            $("#btn_remove_file_sever").show();
        }

        function remove_audio_sever() {
            $("#inp_link_file").hide();
            $("#inp_link_file").val('');
            $("#box_upload").hide();
            $("#btn_remove_file_sever").hide();
            $("#file_upload_sever").val('');
        }
    </script>
    <?php
}

function move_file_to_sever($url_file,$arr_sever_upload){
    for ($i = 0; $i < count($arr_sever_upload); $i++) {
        ?>
        <span class="buttonPro small light_blue" onclick="move_file_to_sever('<?php echo $arr_sever_upload[$i]->url;?>','<?php echo $url_file;?>')"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Di chuyển sang <?php echo $arr_sever_upload[$i]->name; ?> </span>
        <?php
    }
    ?>
    <script>
        movefilecallback = function (data) {
            $("#inp_link_file").show();
            $("#inp_link_file").val(data.url);
            $("#btn_remove_file_sever").show();
            $("#btn_done_chat").show();
            swal('Thành công', 'Di chuyển tệp tin sang máy chủ khác thành công!','success');
        };

        function move_file_to_sever(url_sever,url_file) {
            $("#btn_done_chat").hide();
            swal('Di chuyển tệp tin', 'Đang trong quá trình di chuyển tệp tin...');
            $.ajax({
                url: url_sever,
                jsonp: "movefilecallback",
                data: "func=move_file&file_send="+url_file,
                dataType: 'jsonp',
            });
        }
    </script>
    <?php
}

//End App nguoi yeu ao
?>