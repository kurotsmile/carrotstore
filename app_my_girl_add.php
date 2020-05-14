<?php
include "app_my_girl_template.php";
$id_audio = '';
$sex = '';
$user_name = $data_user_carrot['user_id'];

if (isset($_GET['key'])) {
    $key = $_GET['key'];
} else {
    $key = '';
}
$lang_sel = $_GET['lang'];

$txt_table = '';
$txt_title = '';
$type_chat = 'chat';
$character_sex = '1';
$link_chat = '';
$file_url = '';

if (isset($_GET['id_audio'])) {
    $id_audio = $_GET['id_audio'];
}

if (isset($_GET['msg'])) {
    $txt_table = 'app_my_girl_msg_' . $lang_sel;
    $txt_title = 'Thêm câu thoại (' . $lang_sel . ')';
    $type_chat = 'msg';
} else {
    $txt_table = 'app_my_girl_' . $lang_sel;
    $txt_title = 'Thêm câu trả lời (' . $lang_sel . ')';
    $type_chat = 'chat';
}

if (isset($_GET['character_sex'])) {
    $character_sex = $_GET['character_sex'];
}

if (isset($_GET['sex'])) {
    $sex = $_GET['sex'];
}

if (isset($_GET['link'])) {
    $link_chat = $_GET['link'];
}

if (isset($_POST['chat'])) {
	$id='';
	$tip='';
	$link_chat='';
	$id_redirect='';
    echo '<div class="contain" style="padding: 20px;">';
    $chat = mysqli_real_escape_string($link,$_POST['chat']);
    $status = $_POST['status'];
    $sex = $_POST['sex'];
    if(isset($_POST['id']))$id = $_POST['id'];
    $effect = $_POST['effect'];
    $vibrate = $_POST['vibrate'];
    $color = '#' . $_POST['color'];
    if(isset($_POST['tip']))$tip = $_POST['tip'];
    if(isset($_POST['link']))$link_chat = $_POST['link'];
    $face = $_POST['face'];
    $action = $_POST['action'];
    $character_sex = $_POST['character_sex'];
    if(isset($_POST['id_redirect']))$id_redirect = $_POST['id_redirect'];
    if(isset($_POST['id_audio']))$id_audio = $_POST['id_audio'];

    $type_chat = $_POST['type_chat'];

    if(isset($_POST['limit_os']))$limit_os = $_POST['limit_os'];
    $limit_ver = $_POST['limit_ver'];
    $limit_chat = $_POST['limit_chat'];
    $effect_customer = $_POST['effect_customer'];
    if(isset($_POST['func_sever']))$func_sever = $_POST['func_sever'];
    $limit_day = $_POST['limit_day'];
    $limit_month = $_POST['limit_month'];
    $os_window = $_POST['os_window'];
    $os_ios = $_POST['os_ios'];
    $os_android = $_POST['os_android'];
    $file_url = $_POST['file_url'];

    $txt_disable = 0;
	$func='';
    if(isset($_POST['func']))$func = $_POST['func'];
	$disable='off';
    if(isset($_POST['disable']))$disable = $_POST['disable'];
    if ($disable == 'on') {
        $txt_disable = 1;
    } else {
        $txt_disable = 0;
    }

    if ($type_chat == "msg") {
        $result_update = mysqli_query($link,"INSERT INTO `$txt_table` (`func`, `chat`, `status`, `sex`, `color`, `vibrate`, `effect`,`face`,`action`,`character_sex`,`disable`,`ver`,`limit_chat`,`effect_customer`,`limit_day`,`limit_month`,`user_create`,`os_window`,`os_ios`,`os_android`,`file_url`) VALUES ('$func', '$chat', '$status', '$sex', '$color', '$vibrate', '$effect','$face','$action','$character_sex',$txt_disable,$limit_ver,'$limit_chat','$effect_customer','$limit_day','$limit_month','$user_name','$os_window','$os_ios','$os_android','$file_url');");
    } else {
        $text = mysqli_real_escape_string($link,$_POST['text']);
        if (isset($_POST['id_question'])) {
            $id_question = $_POST['id_question'];
            $type_question = $_POST['type_question'];
            $result_update = mysqli_query($link,"INSERT INTO `$txt_table` (text, chat, status, sex, color, tip, `link`, `vibrate`, `effect`,`face`,`action`,`character_sex`,`id_redirect`,`ver`,`limit_chat`,`effect_customer`,`func_sever`,`disable`,`limit_day`,`author`,`pater`,`pater_type`,`limit_month`,`user_create`,`os_window`,`os_ios`,`os_android`,`file_url`) VALUES ('$text', '$chat', '$status', '$sex', '$color', '$tip','$link_chat', '$vibrate', '$effect','$face','$action','$character_sex','$id_redirect',$limit_ver,'$limit_chat','$effect_customer','$func_sever',$txt_disable,'$limit_day','$lang_sel','$id_question','$type_question','$limit_month','$user_name','$os_window','$os_ios','$os_android','$file_url');");
        } else {
            $result_update = mysqli_query($link,"INSERT INTO `$txt_table` (text, chat, status, sex, color, tip, `link`, `vibrate`, `effect`,`face`,`action`,`character_sex`,`id_redirect`,`ver`,`limit_chat`,`effect_customer`,`func_sever`,`disable`,`limit_day`,`author`,`limit_month`,`user_create`,`os_window`,`os_ios`,`os_android`,`file_url`) VALUES ('$text', '$chat', '$status', '$sex', '$color', '$tip', '$link_chat', '$vibrate', '$effect','$face','$action','$character_sex','$id_redirect',$limit_ver,'$limit_chat','$effect_customer','$func_sever',$txt_disable,'$limit_day','$lang_sel','$limit_month','$user_name','$os_window','$os_ios','$os_android','$file_url');");
        }
    }
	
    $id_new = mysqli_insert_id($link);

    $storage = 'off';
    if (isset($_POST['storage'])) {
        $storage = $_POST['storage'];
    }
    if ($storage == 'on') {
        $storage_category = $_POST['storage_category'];
        $check_storage = mysqli_query($link,"SELECT * FROM `app_my_girl_storage` WHERE `id` = '$id' AND `lang` = '$lang_sel' AND `type`='$type_chat' LIMIT 1");
        if (mysqli_num_rows($check_storage) == 0) {
            $add_storage = mysqli_query($link,"INSERT INTO `app_my_girl_storage` (`id`, `lang`,`type`,`category`) VALUES ('$id_new', '$lang_sel','$type_chat','$storage_category');");
            mysqli_free_result($add_storage);
        }
        mysqli_free_result($check_storage);
    }

    $target_dir = "app_mygirl/$txt_table";
    $target_file = $target_dir . '/' . $id_new . '.mp3';
    if ($id_audio == '') {
        if (move_uploaded_file($_FILES["file_audio"]["tmp_name"], $target_file)) {
            show_alert('Tải tập tin âm thanh ' . basename($_FILES["file_audio"]["name"]) . 'Thành công!', "aler");
        } else {
            show_alert("Không thể tải tệp âm thanh trò chuyện vào hệ thống", "error");
        }
    } else {
        $txt_table_brain = 'app_mygirl/app_my_girl_' . $lang_sel . '_brain/' . $id_audio . '.mp3';
        if (rename($txt_table_brain, $target_file)) {
            show_alert('Tải tập tin âm thanh ' . basename($txt_table_brain) . 'Thành công!', "aler");
        } else {
            show_alert("Không thể tải tệp âm thanh câu thoại vào hệ thống", "error");
        }
    }
    $result_chat = mysqli_query($link,"SELECT * FROM `$txt_table` WHERE `id`='$id_new'");
    $result_chat = mysqli_fetch_array($result_chat);

    if (isset($_POST['music_lyrics']) && $_POST['music_lyrics'] != '') {
        $music_lyrics = $_POST['music_lyrics'];
        $query_add_lyrics = mysqli_query($link,"INSERT INTO `app_my_girl_" . $lang_sel . "_lyrics` (`id_music`, `lyrics`) VALUES ('$id_new', '" . addslashes($music_lyrics) . "');");
    }

    if (isset($_POST['link_ytb']) && $_POST['link_ytb'] != '') {
        $link_ytb = $_POST['link_ytb'];
        $query_add_link = mysqli_query($link, "INSERT INTO `app_my_girl_video_$lang_sel` (`id_chat`, `link`)VALUES ('$id_new', '$link_ytb');");

        parse_str(parse_url($link_ytb, PHP_URL_QUERY), $my_array_of_vars);
        $id_ytb = $my_array_of_vars['v'];
        $url_avatrt_music = "http://img.youtube.com/vi/$id_ytb/sddefault.jpg";
        $img_avatar_music = 'app_mygirl/app_my_girl_' . $lang_sel . '_img/' . $id_new . '.png';

        $ch = curl_init($url_avatrt_music);
        $fp = fopen($img_avatar_music, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }

    if (isset($_POST['id_field_chat'])) {
        $id_field_chat = $_POST['id_field_chat'];
        $id_func_field_chat = $_POST['id_func_field_chat'];
        $name_func_field_chat = $_POST['name_func_field_chat'];
        $value_field_chat = $_POST['value_field_chat'];
        $arr_data_field_chat = array();
        for ($i = 0; $i < count($id_field_chat); $i++) {
            $arr_item = array($id_field_chat[$i], $id_func_field_chat[$i], $name_func_field_chat[$i], trim($value_field_chat[$i]));
            array_push($arr_data_field_chat, $arr_item);
        }
        $data_field = json_encode($arr_data_field_chat, JSON_UNESCAPED_UNICODE);
        $author = "unclear";
        $query_add_field = mysqli_query($link, "INSERT INTO `app_my_girl_field_$lang_sel` (`id_chat`, `type_chat`, `data`, `type`, `author`) VALUES ('$id_new', '$type_chat', '$data_field', 'field_chat', '$author');");
        mysqli_free_result($query_add_field);
    }

    if (mysqli_error($link) == '') {
        echo "<h2 style='width:100%;'>Add success!!! $id_new</h2><br/>";
        echo "<b>Sex</b>:<img src='$url/app_mygirl/img/".$result_chat['sex'].".png'/> ,<img src='".$url."/app_mygirl/img/".$result_chat['character_sex'].".png'/><br/>";
        echo "<b>Chat</b>:" . $result_chat['chat'] . '<br/>';
        echo "<b>Face</b>:" . $result_chat['face'] . '<br/>';
        echo "<b>Action</b>:" . $result_chat['face'] . '<br/>';
        if ($result_chat['effect'] == '49') {
            echo btn_add_work($id_new,$lang_sel,'story','add');
        }else{
            echo btn_add_work($id_new,$lang_sel,$type_chat,'add');
        }

        if ($result_chat['effect'] == '2') {
            echo '<a href="'.$url.'/music/'.$id_new.'/'.$lang_sel.'" target="_blank" class="buttonPro light_blue"><i class="fa fa-gg-circle" aria-hidden="true"></i> Xem bài hát này trên carrotstore</a>';
        } else {
            if ($result_chat['file_url'] != '') {
                echo '<a href="'.$result_chat['file_url'].'" target="_blank" class="buttonPro light_blue"><i class="fa fa-cloud" aria-hidden="true"></i> Nghe thử âm thành từ máy chủ khác</a>';
            } else {
                if(file_exists('app_mygirl/'.$txt_table.'/'.$result_chat['id'].'.mp3')){
                    echo '<a href="'.$url.'/app_mygirl/'.$txt_table.'/'.$result_chat['id'].'.mp3" target="_blank"class="buttonPro light_blue"><i class="fa fa-file-audio-o" aria-hidden="true"></i> Nghe thử âm thanh</a>';
                }
            }
        }

        if (isset($_POST['chat_child'])) {
            $all_child = $_POST['chat_child'];
            foreach ($all_child as $child) {
                $update_item_child = mysqli_query("UPDATE `$txt_table` SET `pater` = '$id_new',`pater_type`='$type_chat' WHERE `id` = '$child';");
                echo "<p>Add $child to $id_new success!</p>";
                mysqli_free_result($update_item_child);
            }
        }


        if ($type_chat == 'msg') {
            echo "<br/><a href='" . $url . "/app_my_girl_msg.php?sex=$sex&character_sex=$character_sex&new_id=$id_new&lang=$lang_sel' class='buttonPro blue'><i class='fa fa-list' aria-hidden='true'></i> Xem câu thoại mới thêm vào</a>";
        } else {
            echo "<br/><a href='" . $url . "/app_my_girl_chat.php?sex=$sex&character_sex=$character_sex&new_id=$id_new&lang=$lang_sel' class='buttonPro blue'><i class='fa fa-list' aria-hidden='true'></i> Xem câu trò chuyện mới thêm vào</a>";
            echo "<br/><a href='" . $url . "/app_my_girl_update.php?id=$id_new&lang=$lang_sel' class='buttonPro blue' target='_blank'><i class='fa fa-edit'></i> Chỉnh sửa nhanh câu trò chuyện</a>";
        }

        echo '</div>';
    } else {
        show_alert("Thêm câu trò chuyện không thành công ! lỗi:" . mysql_error(), "error");
    }
	unset($_GET);
    exit;
}


?>
    <script src="<?php echo $url; ?>/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/dist/sweetalert.css"/>
    <script src="<?php echo $url; ?>/js/jscolor.min.js"></script>
    <h2><img src="<?php echo $url; ?>/app_mygirl/img/<?php echo $lang_sel; ?>.png"
             style="width: 20px;margin-right: 2px;float: left;"/> <?php echo $txt_title; ?></h2>
    <form name="frm_chat" method="post" enctype="multipart/form-data">
        <table>

            <?php
            $type_add = 'chat';
            if (isset($_GET['msg'])) {
                $type_add = 'msg';
                $func = $data_app->msg_func[0]->key;
                if (isset($_POST['func'])) {
                    $func = $_POST['func'];
                }

                if (isset($_GET['func'])) {
                    $func = $_GET['func'];
                }
                ?>
                <tr>
                    <td>Function</td>
                    <td colspan="2">
                        <select name="func">
                            <?php for ($i = 0; $i < count($data_app->msg_func); $i++) { ?>
                                <option value="<?php echo $data_app->msg_func[$i]->key; ?>" <?php if ($func == $data_app->msg_func[$i]->key) { ?> selected="true"<?php } ?>><?php echo $data_app->msg_func[$i]->value; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>

            <?php } else {
                ?>
                <tr>
                    <td>Text</td>
                    <td>
                        <?php
                        $txt_key_text = '';

                        if (isset($_POST['text'])) {
                            $txt_key_text = $_POST['text'];
                        } else {
                            $txt_key_text = $key;
                        }

                        if (isset($_GET['effect'])) {
                        if ($_GET['effect'] == '2') {
                            if ($txt_key_text == '') {
                                $txt_key_text = get_key_lang($link,'key_music', $lang_sel);
                            }
                            ?>
                            <script>
                                $(document).ready(function () {
                                    $("#btn_effect_music").click();
                                });
                            </script>
                        <?php
                        }else{
                        ?>
                            <script>
                                $(document).ready(function () {
                                    $("#btn_effect_random").click();
                                });
                            </script>
                        <?php
                        }

                        if ($_GET['effect'] == '36') {
                            $txt_key_text = get_key_lang($link,'key_quote', $lang_sel);
                        }

                        if ($_GET['effect'] == '49') {
                            $txt_key_text = get_key_lang($link,'key_story', $lang_sel);
                        }
                        }else{
                        ?>
                            <script>
                                $(document).ready(function () {
                                    $("#btn_effect_random").click();
                                });
                            </script>
                            <?php
                        }


                        ?>
                        <input type="text" name="text" onchange="$('#btn_reset_key').show()"
                               value="<?php echo $txt_key_text; ?>" id="key_inp"/>

                        <script>
                            function reset_key() {
                                var key_inp = $("#key_inp").val();
                                var sex = $('#sex1').val();
                                var char_sex = $('#character_sex').val();
                                var win = window.open("<?php echo $url; ?>/app_my_girl_add.php?key=" + key_inp + "&lang=<?php echo $lang_sel; ?>&sex=" + sex + "&character_sex=" + char_sex + "", '_blank');
                                win.focus();
                            }

                            function check_key() {
                                var key_inp = $("#key_inp").val();
                                var sex = $('#sex1').val();
                                var char_sex = $('#character_sex').val();
                                var win = window.open("<?php echo $url; ?>/app_my_girl_handling.php?func=check_key&key=" + key_inp + "&lang=<?php echo $lang_sel; ?>&sex=" + sex + "&character_sex=" + char_sex + "", '_blank');
                                win.focus();
                            }
                        </script>
                    </td>
                    <td>
                        <a class="buttonPro small yellow" id="btn_reset_key" style="display: none;"
                           onclick="reset_key();return false;">Làm mới từ khóa</a>
                        <span class="buttonPro small black"
                              onclick="translation_tag('key_inp','<?php echo $lang_sel; ?>','vi');return false;"><i
                                class="fa fa-language" aria-hidden="true"></i> Dịch</span>
                        <a href="#" class="buttonPro small yellow" target="_blank"
                           onclick="check_key();return false;"><i class="fa fa-share-square-o" aria-hidden="true"></i>
                            kiểm tra tồn tại</a>
                    </td>
                </tr>
            <?php } ?>

            <tr class="chat_1">
                <td>Disable</td>
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <label>Không kích hoạt </label>
                                <input style="width: auto;" type="checkbox" name="disable"/> <i class="fa fa-toggle-on"
                                                                                                aria-hidden="true"></i>
                            </td>
                            <td>
                                <label>Lưu trữ </label>
                                <input style="width: auto;" type="checkbox" name="storage"/> <i class="fa fa-archive"
                                                                                                aria-hidden="true"></i>
                                <select style="width: 150px;float: none;margin-left: 3px;" name="storage_category">
                                    <?php
                                    for ($i = 0; $i < count($array_category_store); $i++) {
                                        ?>
                                        <option value="<?php echo $array_category_store[$i]->key; ?>"><?php echo $array_category_store[$i]->value; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                                <label>Người tạo :</label>
                                <strong><?php echo $data_user_carrot['user_name']; ?></strong>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="chat_1">
                <td>Chat</td>
                <td colspan="2">
                    <textarea style="height: 240px;" id="chat" name="chat"
                              onkeyup="check_chat_txt_length()"><?php if (isset($_GET['answer'])) {
                            echo $_GET['answer'];
                        } ?></textarea>
                    <div style="float: left;width: 100%;">
                        <?php
                        foreach ($arr_func as $key_func) {
                            ?>
                            <span class="key_func"
                                  onclick="add_key_func('<?php echo $key_func; ?>');return false;"><?php echo $key_func; ?></span>
                            <?php
                        }
                        ?>
                        <span class="buttonPro small black"
                              onclick="translation_tag('chat','<?php echo $lang_sel; ?>','<?php echo $lang_2; ?>');return false;"><i
                                class="fa fa-language" aria-hidden="true"></i> Dịch</span>
                        <span class="buttonPro small black" onclick="paste_tag('chat');return false;"><i
                                class="fa fa-clipboard" aria-hidden="true"></i> Dán</span>
                    </div>
                </td>
            </tr>

            <tr class="chat_1">
                <td>Sex (giới tính người dùng)</td>
                <td>
                    <select name="sex" id="sex1" onchange="check_sex();">
                        <option value="0" <?php if (isset($_GET['sex'])) {if ($_GET['sex'] == '0') {echo 'selected="true"';}} ?> >Nam</option>
                        <option value="1" <?php if (isset($_GET['sex'])) {if ($_GET['sex'] == '1') {echo 'selected="true"';}} ?>>Nữ</option>
                    </select>
                </td>
                <td class="row_no_music" rowspan="11" style="width: 400px;margin: 2px;">
                    <div style="float: left;width: 100%; margin-bottom: 5px;">
                        Mô tả khuôn mặt <br/>
                        <img src="<?php echo $url; ?>/app_mygirl/img/face/0.png" id="id_img_face" style="width: 100px;cursor: pointer;" onclick="choice_face();"/>
                    </div>

                    <div style="float: left;width: 100%;margin: 2px;">
                        Mô tả hành động <br/>
                        <?php if (isset($_GET['actions'])) { ?>
                            <img src="<?php echo $url; ?>/app_mygirl/img/action/<?php echo $_GET['actions']; ?>.png" id="id_img" style="width: 100px;cursor: pointer;" onclick="choice_action();"/>
                        <?php } else { ?>
                            <img src="<?php echo $url; ?>/app_mygirl/img/action/0.png" id="id_img" style="width: 100px;cursor: pointer;" onclick="choice_action();"/>
                        <?php } ?>
                    </div>
                </td>
            </tr>

            <tr class="chat_1">
                <td>Character sex (giới tính nhân vật)</td>
                <td>
                    <select name="character_sex" id="character_sex" onchange="check_sex();">
                        <option value="0" <?php if ($character_sex == '0') {
                            echo 'selected="true"';
                        } ?> >Nam
                        </option>
                        <option value="1" <?php if ($character_sex == '1') {
                            echo 'selected="true"';
                        } ?>>Nữ
                        </option>
                    </select>
                </td>
            </tr>

            <tr class="chat_1">
                <td>effect</td>
                <td>
                    <select name="effect" onchange="check_function_chat(this.value);return false;"  id="effect">
                        <option value="" <?php if (isset($_GET['effect'])) {if ($_GET['effect'] == '0') {echo 'selected="true"';}}?>>None
                        </option>
                        <?php
                        for ($i = 0;$i<count($data_app->arr_function_app); $i++) {
                            $data_i = $data_app->arr_function_app[$i];
                            ?>
                            <option value="<?php echo $data_i->key; ?>" <?php if (isset($_GET['effect'])) {if ($_GET['effect'] == $data_i->key) {echo 'selected="true"';}} ?>><?php echo $data_i->name; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr class="chat_1">
                <td>effect customer</td>
                <td>
                    <input name="effect_customer" type="hidden" id="effect_chat"/>
                    <img src="<?php echo $url; ?>/app_mygirl/img/no_icon.png" id="id_img_effect" onclick="show_effect_chat('','');return false;" style="cursor: pointer;"/>
                    <button class="buttonPro blue small" id="btn_effect_random" oncontextmenu="show_effect_chat('rand','');return false;"  onclick="sel_effect_random('');return false;">gẫu nhiên</button>
                    <?php for ($i = 0; $i < count($arr_tag_effect); $i++) { ?>
                        <button class="buttonPro light_blue small" id="btn_effect_<?php echo $arr_tag_effect[$i]; ?>" oncontextmenu="show_effect_chat('<?php echo $arr_tag_effect[$i]; ?>','');return false;" onclick="sel_effect_random('<?php echo $arr_tag_effect[$i]; ?>');return false;"><?php echo $arr_tag_effect[$i]; ?></button>
                    <?php } ?>
                    <a class="buttonPro yellow small" id="edit_effect" style="display: none;" href="" target="_blank">chỉnh sửa hiệu ứng</a>
                </td>
            </tr>


            <tr class="chat_1 row_no_music">
                <td>vibrate</td>
                <td>
                    <select name="vibrate">
                        <option value="">off</option>
                        <option value="1">on</option>
                    </select>
                </td>
            </tr>

            <tr class="chat_1">
                <td>color</td>
                <td><input type="text" name="color" id="chat_color" class="jscolor" value="<?php if (isset($_POST['color'])) {echo $_POST['color'];}if (isset($_GET['color'])) {echo $_GET['color'];} ?>"/></td>
            </tr>

            <?php if (isset($_GET['msg'])) {
            } else { ?>
                <tr class="chat_1 row_no_music">
                    <td>link</td>
                    <td><input type="text" name="link" value="<?php if ($link_chat != '') {echo $link_chat;} ?>"/></td>
                </tr>

                <tr class="chat_1">
                    <td>tip</td>
                    <td>
                        <select name="tip">
                            <option value="">Off</option>
                            <option value="1">On</option>
                        </select>
                    </td>
                </tr>
            <?php } ?>

            <?php
            if ($type_chat == "chat") {
                ?>
                <tr class="chat_1 row_no_music">
                    <td>Chức năng sever</td>
                    <td>
                        <select name="func_sever">
                            <option value="">none</option>
                            <?php
                            foreach ($arr_func_sever as $key_func_sever) {
                                ?>
                                <option value="<?php echo $key_func_sever ?>"><?php echo $key_func_sever ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <?php
            }
            ?>

            <tr class="chat_1">
                <td>status</td>
                <td>
                    <select name="status">
                        <option value="1" <?php if (isset($_GET['action'])) {if ($_GET['action'] == '0') {echo 'selected="true"';}} ?>>Nomal - (bình thường)</option>
                        <option value="0" <?php if (isset($_GET['action'])) {if ($_GET['action'] == '1') {echo 'selected="true"';}} ?>>Ban đầu - (không quan tâm)</option>
                        <option value="2" <?php if (isset($_GET['action'])) {if ($_GET['action'] == '2') {echo 'selected="true"';}} ?>>Xúc động - (vui vẻ)</option>
                        <option value="3" <?php if (isset($_GET['action'])) {if ($_GET['action'] == '3') {echo 'selected="true"';}} ?>>Tức giận - (không hài lòng)</option>
                    </select>
                </td>
            </tr>

            <tr class="chat_1" style="background-color: #FFB591;">
                <td>Action (v2)</td>
                <td>
                    <select name="action" id="action_nv" onchange="change_action(this.value)">
                        <?php for ($i = 0; $i < count($data_app->arr_action_name); $i++) { ?>
                            <option value="<?php echo $i; ?>" <?php if (isset($_GET['actions'])) {if ($_GET['actions'] == $i) {echo 'selected="true"';}} ?>><?php echo $data_app->arr_action_name[$i]; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <tr class="chat_1" style="background-color: #FFB591;">
                <td>Face (v2)</td>
                <td>
                    <select name="face" id="face_nv" onchange="change_face(this.value)">
                        <?php for ($i = 0; $i < count($data_app->arr_face_name); $i++) { ?>
                            <option value="<?php echo $i; ?>" <?php if (isset($_GET['face'])) {if ($_GET['face'] == $i) {echo 'selected="true"';}} ?>><?php echo $data_app->arr_face_name[$i]; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <tr class="chat_1">
                <td>audio</td>
                <td>
                    <div style="float: left;width: 50%;">
                        <input type="file" id="file_audio" name="file_audio"/>
                        <?php
                        if ($id_audio != '') {
                            $txt_table_brain = $url . '/app_mygirl/app_my_girl_' . $lang_sel . '_brain/' . $id_audio . '.mp3';
                            ?>
                            <audio controls="true">
                                <source src="<?php echo $txt_table_brain; ?>" type="audio/ogg"/>
                            </audio>
                            <input type="text" value="<?php echo $id_audio ?>" name="id_audio"/>
                            <?php
                        } else {
                            ?>
                            <span id="show_audio_test"></span>
                        <?php } ?>
                        <br/>
                        <a href="#" class="buttonPro small blue" id="btn_add_audio"
                           onclick="get_audio_file('<?php echo $lang_sel; ?>');"><i class="fa fa-volume-up"
                                                                                    aria-hidden="true"></i> Nghe thử</a>
                        <a target="_blank" class="buttonPro small blue" id="btn_tool_cms_audio" href="#"
                           onclick="goto_create_audio();return false;"><i class="fa fa-headphones"
                                                                          aria-hidden="true"></i> Công cụ tạo giọng dài</a>
                        <span id="msg_audio"></span>
                    </div>

                    <div style="float: left;width: 50%;">
                        <?php echo box_upload('mp3', $data_app->arr_sever_upload); ?>
                    </div>
                </td>
            </tr>


            <tr class="chat_1 row_no_music">
                <td>
                    Hiển thị
                </td>
                <td>
                    <div style="float: left; width: 23%;margin: 2px;">
                        <label><i class="fa fa-android" aria-hidden="true"></i> Android</label>
                        <select name="os_android">
                            <option value="0">Hiển thị</option>
                            <option value="1">Không hiển thị</option>
                        </select>
                    </div>

                    <div style="float: left; width: 23%;margin: 2px;">
                        <label><i class="fa fa-windows" aria-hidden="true"></i> Window</label>
                        <select name="os_window">
                            <option value="0">Hiển thị</option>
                            <option value="1">Không hiển thị</option>
                        </select>
                    </div>

                    <div style="float: left; width: 23%;margin: 2px;">
                        <label><i class="fa fa-apple" aria-hidden="true"></i> Ios</label>
                        <select name="os_ios">
                            <option value="0">Hiển thị</option>
                            <option value="1">Không hiển thị</option>
                        </select>
                    </div>

                    <div style="float: left; width: 23%;">
                        <label><i class="fa fa-adjust" aria-hidden="true" tyle="Phiên bản triển khai"></i> Phiên
                            bản</label>
                        <select name="limit_ver">
                            <option value="0">Hiển thị tất cả</option>
                            <option value="1">Không hiển thị ở 2d</option>
                            <option value="2">Không hiển thị ở 3d</option>
                        </select>
                    </div>
                </td>
            </tr>


            <tr class="row_no_music" style="background-color: #E1C4FF">
                <td>câu trả lời (câu thoại con)<br/> cho câu trò chuyện này</td>
                <td colspan="2">
                    <button onclick="show_id_chat('<?php echo $lang_sel; ?>','r1',2);return false;"
                            class="buttonPro small">Get ID chat
                    </button>
                    <button onclick="add_new_chat();return false;" class="buttonPro small">Add chat</button>
                    <table id="table_data_return">

                    </table>
                </td>
            </tr>

            <?php if ($type_add == 'chat') { ?>
                <tr class="row_no_music" style="background-color: #C0F17E;">
                    <td>câu trả lời tương tự</td>
                    <td colspan="2">
                        <button class="buttonPro small"
                                onclick="show_id_chat('<?php echo $lang_sel; ?>','r1',1);return false;">Get ID chat
                        </button>
                        <button class="buttonPro small"
                                onclick="show_id_chat_2('<?php echo $lang_sel; ?>','r1',1,'1','1');return false;">Get ID
                            (nữ - nữ)
                        </button>
                        <button class="buttonPro small"
                                onclick="show_id_chat_2('<?php echo $lang_sel; ?>','r1',1,'0','1');return false;">Get ID
                            (nam - nữ)
                        </button>
                        <button class="buttonPro small"
                                onclick="show_id_chat_2('<?php echo $lang_sel; ?>','r1',1,'1','0');return false;">Get ID
                            (nữ - nam)
                        </button>
                        <input type="hidden" name="id_redirect" class="buttonPro small" id="id_redirect"/>
                        <table id="table_data_same">

                        </table>
                    </td>
                </tr>
            <?php } ?>

            <tr id="box_select" class="row_no_music">
                <td>Bản lựa chọn</td>
                <td id="box_select_content">&nbsp;</td>
                <td>
                    <button class="buttonPro green small" onclick="add_field_chat('');return false;">Thêm trường tùy
                        chỉnh
                    </button>
                    <button class="buttonPro green small" onclick="add_field_chat('show_chat');return false;">Hiện trò
                        chuyện
                    </button>
                    <button class="buttonPro green small" onclick="add_field_chat('inp_chat');return false;">Nhập trò
                        chuyện
                    </button>
                    <button class="buttonPro green small" onclick="add_field_chat('link');return false;">Liên kết
                    </button>
                </td>
            </tr>

            <tr>
                <td>định dạng mức độ thô tục và tình dục</td>
                <td colspan="2">
                    <input name="limit_chat" type="range" min="1" max="4" step="1" value="1"/>
                </td>
            </tr>

            <tr class="row_no_music">
                <td>Ngày áp dụng</td>
                <td colspan="2">
                    <div style="float: left;width: 20%;">
                        <label>Limit date</label><br/>
                        <input name="limit_date" id="limit_date" type="text"
                               value="<?php if (isset($arr['limit_date'])) {
                                   echo $arr['limit_date'];
                               } ?>"/>
                    </div>

                    <div style="float: left;width: 20%;">
                        <label>Limit month</label><br/>
                        <select name="limit_month" id="limit_month">
                            <option value="">None</option>
                            <?php
                            for ($i_month = 1; $i_month <= 12; $i_month++) {
                                ?>
                                <option <?php if (isset($_GET['limit_month'])) {
                                    if ($i_month == $_GET['limit_month']) {
                                        echo 'selected="true"';
                                    }
                                } ?> value="<?php echo $i_month ?>"><?php echo $i_month; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div style="float: left;width: 20%;">
                        <label>Limit day</label><br/>
                        <select name="limit_day">
                            <?php
                            foreach ($arr_limit_day as $day) {
                                ?>
                                <option <?php if (isset($_GET['limit_day'])) {
                                    if ($day == $_GET['limit_day']) {
                                        echo 'selected="true"';
                                    }
                                } ?> value="<?php echo $day ?>"><?php echo $day; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td>&nbsp;
                    <input name="type_chat" value="<?php echo $type_chat; ?>" type="hidden"/>

                    <?php
                    if (isset($_GET['type_question'])) {
                        $type_question = $_GET['type_question'];
                        $id_question = $_GET['id_question'];
                        ?>
                        <input id="val_type_question" name="type_question" value="<?php echo $type_question; ?>"
                               type="hidden"/>
                        <input id="val_id_question" name="id_question" value="<?php echo $id_question; ?>"
                               type="hidden"/>
                        <?php
                    }
                    ?>
                </td>
                <td colspan="2"><input type="submit" value="Hoàn tất" class="link_button"/></td>
            </tr>
        </table>

        <?php
        if (isset($_GET['effect']) && $_GET['effect'] == '2') {
            ?>
            <table id="music_box_data"
                   style="width: 90%;border: solid 2px #CDCDCD;margin: 10px;box-shadow: 5px 5px 5px #949494;">
                <tr>
                    <th><i class="fa fa-music" aria-hidden="true"></i> Âm nhạc</th>
                    <th>Thêm mới các siêu dữ liệu liên quan đến bài hát</th>
                </tr>
                <tr>
                    <td><i class="fa fa-book" aria-hidden="true"></i> Lời bài hát</td>
                    <td>
                        <a href="#" class="buttonPro small purple" onclick="search_music_lyrics();return false;"><i
                                class="fa fa-search" aria-hidden="true"></i> Tìm lời bài hát
                            (search.azlyrics.com)</a>
                        <a href="#" class="buttonPro small purple" onclick="search_gg();return false;"><i
                                class="fa fa-search" aria-hidden="true"></i> Tìm lời trên google</a>
                        <textarea id="music_lyrics_contain" style="height: 240px;" name="music_lyrics"></textarea>
                    </td>
                </tr>
                <tr>
                    <td><label><i class="fa fa-youtube-play" aria-hidden="true"></i> Liên kết Video Youtube</label>:
                    </td>
                    <td>
                        <a href="#" class="buttonPro small purple" onclick="search_ytb();return false;"><i
                                class="fa fa-search" aria-hidden="true"></i> Tìm video trên youtube</a>
                        <input type="text" id="link_ytb" value="" name="link_ytb"/>
                    </td>
                </tr>
            </table>
            <?php
        }
        ?>

    </form>
<?php
if ($key != '') {

    $type_chat_same = '0';

    if (isset($_SESSION['show_type_chat_same'])) {
        $type_chat_same = $_SESSION['show_type_chat_same'];
    }

    if ($type_chat_same == '1') {
        $result_chat_key = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `text` = '$key' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `pater`='' AND `id_redirect`=''");
    } else {
        $result_chat_key = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `text` = '$key' AND `sex`='$sex' AND `character_sex`='$character_sex'");
    }
    if (mysqli_num_rows($result_chat_key) > 0) {
        echo '<div class="box_info">';
        echo '<h2>Những trò chuyện có trả lời giống với từ khóa thêm câu trò chuyện này : </h2>';

        echo '<p>';
        if ($type_chat_same == '0') {
            echo '<a class="buttonPro small yellow btn_type_chat_same" onClick="show_type_chat_same(\'' . $lang_sel . '\',\'' . $sex . '\',\'' . $character_sex . '\',\'' . $key . '\',\'0\',this);return false; ">Hiện toàn bộ (Mặt định chỉ hiện câu thoại cha)</a>  <a class="buttonPro small btn_type_chat_same" onClick="show_type_chat_same(\'' . $lang_sel . '\',\'' . $sex . '\',\'' . $character_sex . '\',\'' . $key . '\',\'1\',this);return false;">Chỉ hiện câu thoại cha</a>';
        } else {
            echo '<a class="buttonPro small  btn_type_chat_same" onClick="show_type_chat_same(\'' . $lang_sel . '\',\'' . $sex . '\',\'' . $character_sex . '\',\'' . $key . '\',\'0\',this);return false; ">Hiện toàn bộ (Mặt định chỉ hiện câu thoại cha)</a>  <a class="buttonPro small btn_type_chat_same yellow" onClick="show_type_chat_same(\'' . $lang_sel . '\',\'' . $sex . '\',\'' . $character_sex . '\',\'' . $key . '\',\'1\',this);return false;">Chỉ hiện câu thoại cha</a>';
        }
        echo '</p>';

        echo '<table id="table_same">';
        while ($row_key = mysqli_fetch_array($result_chat_key)) {
            echo show_row_chat_prefab($link,$row_key, $lang_sel, '');
        }
        echo '</table>';
        echo '</div>';
    }
    mysqli_free_result($result_chat_key);
}
?>

<?php if (isset($_GET['type_question'])) { ?>
    <div class="box_info" id="box_father">
        <h3>Sắp thêm vào câu thoại cha này (Bản dự thảo sắp thêm vào Editor có thể xóa mục này nếu không muốn thêm câu
            thoại con. câu thoại hiện tại sẽ trở thành câu thoại toàn cục): <a class="buttonPro red small" onclick="remove_father();return false;">Gỡ bỏ</a></h3>
        <table>
            <?php
            $id_father = $_GET['id_question'];
            $type_father = $_GET['type_question'];
            if ($type_father == "msg") {
                $result_msg_father = mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$lang_sel` WHERE `id`='$id_father' AND `sex`='$sex' AND `character_sex`='$character_sex'");
                $row_father = mysqli_fetch_array($result_msg_father);
                echo show_row_chat_prefab($link,$row_father, $lang_sel, '');
                mysqli_free_result($result_msg_father);
            } else {
                $result_chat_father = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id`='$id_father' AND `sex`='$sex' AND `character_sex`='$character_sex'");
                $row_chat = mysqli_fetch_array($result_chat_father);
                echo show_row_chat_prefab($link,$row_chat, $lang_sel,'');
                mysqli_free_result($result_chat_father);
            }

            $get_child_chat = mysqli_query($link,"SELECT * FROM  `app_my_girl_$lang_sel`  WHERE `pater` = '$id_father' AND `pater_type`='$type_father'");
            if (mysqli_num_rows($get_child_chat) > 0) {
                ?>
                <tr>
                    <td><strong>Câu thoại con</strong></td>
                    <td><i class="fa fa-circle-o" aria-hidden="true"></i></td>
                    <td><i>Danh sách các câu thoại con của câu thoại cha sắp thêm vào</i></td>
                    <td>
                        <table>
                            <?php
                            $get_child_chat = mysqli_query($link,"SELECT * FROM  `app_my_girl_$lang_sel`  WHERE `pater` = '$id_father' AND `pater_type`='$type_father'");
                            while ($row_child = mysqli_fetch_array($get_child_chat)) {
                                $btn_remove = '<a href="#" class="buttonPro small red" onclick="remove_chat_same(\'' . $row_child['id'] . '\')">Gỡ bỏ</a><input type="hidden" value="' . $row_child['id'] . '" name="chat_child[]" />';
                                echo show_row_chat_prefab($link,$row_child, $lang_sel, $btn_remove);
                            }
                            mysqli_fetch_array($get_child_chat);
                            ?>
                        </table>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } ?>

    <script>
        var emp_inst = '';

        function add_key_func(key) {
            var txt = $('#chat').val();
            $('#chat').val(txt + " " + key);
            return false;
        }

        function add_key_customer(id_emp) {
            var txt_q1 = $('#' + id_emp).val();
            var txt_q1_nex = "";
            var inp_tag_customer = prompt("Nhập thẻ mới vào đây:");
            if (txt_q1.length == 0) {
                txt_q1_nex = "[\"" + inp_tag_customer + "\"]";
            } else {
                txt_q1_nex = txt_q1.substring(0, txt_q1.length - 1) + ",\"" + inp_tag_customer + "\"]";
            }
            $('#' + id_emp).val(txt_q1_nex);
        }

        function add_key_question(emp_set, emp_get) {
            var txt_set = $(emp_set).html();
            $(emp_get).val(txt_set);
            alert("Đã thêm:" + txt_set);
            return false;
        }

        function show_id_chat(lang, empid, type_add) {
            var sex = $('#sex1').val();
            var char_sex = $('#character_sex').val();
            emp_inst = empid;
            $.ajax({
                url: "app_my_girl_jquery.php",
                type: "get", //kiểu dũ liệu truyền đi
                data: "function=show_id_chat&lang=" + lang + "&sex=" + sex + "&character_sex=" + char_sex + "&type_add=" + type_add, //tham số truyền vào
                success: function (data, textStatus, jqXHR) {
                    swal({
                        title: "Get ID Chat",
                        html: true,
                        text: data
                    });
                }

            });
        }

        function show_id_chat_2(lang, empid, type_add, sex, char_sex) {
            emp_inst = empid;
            $.ajax({
                url: "app_my_girl_jquery.php",
                type: "get", //kiểu dũ liệu truyền đi
                data: "function=show_id_chat&lang=" + lang + "&sex=" + sex + "&character_sex=" + char_sex + "&type_add=" + type_add, //tham số truyền vào
                success: function (data, textStatus, jqXHR) {
                    swal({
                        title: "Get ID Chat",
                        html: true,
                        text: data
                    });
                }

            });
        }

        function search_chat(emp, lang, sex, char_sex, type_btn) {
            var txt_search = $(emp).val();
            $.ajax({
                url: "app_my_girl_jquery.php",
                type: "get", //kiểu dũ liệu truyền đi
                data: "function=search_chat&txt=" + txt_search + "&lang=" + lang + "&sex=" + sex + "&character_sex=" + char_sex + "&type_add=" + type_btn, //tham số truyền vào
                success: function (data, textStatus, jqXHR) {
                    $('#table_data').html(data);
                }

            });
        }

        function search_effect(emp) {
            var txt_search = $(emp).val();
            $.ajax({
                url: "app_my_girl_jquery.php",
                type: "get", //kiểu dũ liệu truyền đi
                data: "function=search_effect&txt=" + txt_search, //tham số truyền vào
                success: function (data, textStatus, jqXHR) {
                    $('#table_effect').html(data);
                }

            });
        }

        function sel_effect(index, color) {
            $("#id_img_effect").attr('src', '<?php echo $url;?>/app_mygirl/obj_effect/' + index + '.png');
            $("#effect_chat").val(index);
            if (color != "") {
                document.getElementById('chat_color').jscolor.fromString(color);
            } else {
                document.getElementById('chat_color').jscolor.fromString('FFFFFF');
            }

            $('#edit_effect').attr('href', '<?php echo $url;?>/app_my_girl_effect.php?edit=' + index + '').show();
            swal.close();
        }

        function add_new_chat() {
            var sex = $('#sex1').val();
            var char_sex = $('#character_sex').val();
            window.open("<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $lang_sel;?>&sex=" + sex + "&character_sex=" + char_sex);
        }

        function add_id_chat(ids) {
            $('#' + emp_inst).val(ids);
            swal.close();
        }

        function add_id_chat_same(ids, id_emp_add) {
            var lang = "<?php echo $lang_sel;?>";
            $.ajax({
                url: "app_my_girl_jquery.php",
                type: "get",
                data: "function=add_chat_same&id=" + ids + "&lang=" + lang + "&emp=" + id_emp_add,
                success: function (data, textStatus, jqXHR) {
                    if (id_emp_add == "table_data_same") {
                        $("#id_redirect").val(ids);
                        $(".chat_1").fadeOut(100);
                        $('#' + id_emp_add).html(data);
                    } else {
                        $('#' + id_emp_add).append(data);
                    }
                }
            });
            swal.close();
        }

        function remove_chat_same(id) {
            $("#id_redirect").val('');
            $(".chat_row_" + id).remove();
            $(".chat_1").fadeIn(100);

        }

        function change_action(val) {
            $("#id_img").attr('src', '<?php echo $url;?>/app_mygirl/img/action/' + val + '.png');
            $("#action_nv").get(0).selectedIndex = val;
            swal.close();
        }

        function change_face(val) {
            $("#id_img_face").attr('src', '<?php echo $url;?>/app_mygirl/img/face/' + val + '.png');
            $("#face_nv").get(0).selectedIndex = val;
            swal.close();
        }

        function choice_action() {
            <?php
            $txt = '<div style="display:inline-block;float:left;">';
            for ($i = 0; $i < count($data_app->arr_action_name); $i++) {
                if (isset($_GET['effect']) && $_GET['effect'] == '2') {
                    if ($i == 9) {
                        $txt .= '<img src="' . $url . '/app_mygirl/img/action/' . $i . '.png" onclick="change_action(' . $i . ')" style="width:80px;"/>';
                    }
                } else {
                    if ($i != 9) {
                        $txt .= '<img src="' . $url . '/app_mygirl/img/action/' . $i . '.png" onclick="change_action(' . $i . ')" style="width:80px;"/>';
                    }
                }
            }
            $txt .= '<div/>';
            ?>
            swal({
                title: "Chọn hành động",
                html: true,
                text: '<?php echo $txt;?>'
            });
            return false;
        }

        function choice_face() {
            <?php
            $txt = '<div style="display:inline-block;float:left;">';
            for ($i = 0; $i < count($data_app->arr_face_name); $i++) {
                $txt .= '<img src="' . $url . '/app_mygirl/img/face/' . $i . '.png" onclick="change_face(' . $i . ')" style="width:80px;margin:2px;float:left;"/>';
            }
            $txt .= '<div/>';
            ?>
            swal({
                title: "Chọn cảm xúc khuôn mặt",
                html: true,
                text: '<?php echo $txt;?>'
            });
            return false;
        }

        $().ready(function () {
            $("#box_select_content").sortable();
            $("#box_select_content").disableSelection();
            check_sex();
            check_show_hide_row_music();
        });


        function check_function_chat(val_func) {
            check_show_hide_row_music();
            check_sex();
        }

        function  check_show_hide_row_music() {
            var val_funcs=$("#effect").val();
            if (val_funcs == "2") {
                $('#music_box_data').show();
                $('.row_no_music').hide();
            } else {
                $('#music_box_data').hide();
                $('.row_no_music').show();
            }
        }

        function remove_father() {
            $("#box_father").remove();
            $("#val_type_question").remove();
            $("#val_id_question").remove();
            alert("Gỡ bỏ câu thoại khỏi câu thoại cha thành công!!!");
        }

        function show_type_chat_same(lang, sex, char_sex, key, types, emp) {
            $.ajax({
                url: "app_my_girl_jquery.php",
                type: "get",
                data: "function=show_type_chat_same&lang=" + lang + "&sex=" + sex + "&char_sex=" + char_sex + "&key=" + key + "&type=" + types, //tham số truyền vào
                success: function (data, textStatus, jqXHR) {
                    $(".btn_type_chat_same").removeClass("yellow");
                    $(emp).addClass("yellow");
                    $("#table_same").html(data);
                }

            });

        }
    </script>
<?php
include "app_my_girl_script.php";
?>