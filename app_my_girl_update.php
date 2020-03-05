<style>
    body {
        overflow-x: hidden;
    }
</style>
<?php
include "app_my_girl_template.php";
$id = $_GET['id'];
$lang_sel = $_GET['lang'];

$txt_table = '';
$txt_title = '';
$type_chat = 'chat';
$chat_storage = 'off';

if (isset($_GET['msg'])) {
    $type_chat = 'msg';
    $txt_table = 'app_my_girl_msg_' . $lang_sel;
    $txt_title = 'Cập nhật câu thoại (' . $lang_sel . ') id:' . $id;
} else {
    $type_chat = 'chat';
    $txt_table = 'app_my_girl_' . $lang_sel;
    $txt_title = 'Cập nhật câu trả lời (' . $lang_sel . ') id:' . $id;
}

$check_storage = mysql_query("SELECT * FROM `app_my_girl_storage` WHERE `id` = '$id' AND `lang` = '$lang_sel' AND `type`='$type_chat' LIMIT 1");
$storage_category = '';
if (mysql_num_rows($check_storage) > 0) {
    $data_storage = mysql_fetch_array($check_storage);
    $storage_category = $data_storage['category'];
    $chat_storage = 'on';
}

mysql_free_result($check_storage);


if ($_POST) {

    $chat = addslashes($_POST['chat']);
    $status = $_POST['status'];
    $sex = $_POST['sex'];
    $id = $_POST['id'];
    $effect = $_POST['effect'];
    $vibrate = $_POST['vibrate'];
    $color = '#' . $_POST['color'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $r1 = $_POST['r1'];
    $r2 = $_POST['r2'];
    $tip = $_POST['tip'];
    $link = $_POST['link'];
    $face = $_POST['face'];
    $action = $_POST['action'];
    $character_sex = $_POST['character_sex'];
    $id_redirect = $_POST['id_redirect'];
    $limit_ver = $_POST['limit_ver'];
    $limit_chat = $_POST['limit_chat'];
    $effect_customer = $_POST['effect_customer'];
    $func_sever = $_POST['func_sever'];
    $limit_day = $_POST['limit_day'];
    $limit_month = $_POST['limit_month'];
    $limit_date = $_POST['limit_date'];
    $user_id = $_POST['user_id'];
    $os_window = $_POST['os_window'];
    $os_ios = $_POST['os_ios'];
    $os_android = $_POST['os_android'];
    $file_url = $_POST['file_url'];

    $disable = '';
    if (isset($_POST['disable'])) {
        $disable = $_POST['disable'];
    }
    $txt_disable = '';
    if ($disable == 'on') {
        $txt_disable = ",`disable` =1";
    } else {
        $txt_disable = ",`disable` =0";
    }

    $storage = 'off';
    if (isset($_POST['storage'])) {
        $storage = $_POST['storage'];
    }

    if ($storage == 'on') {
        $storage_category = $_POST['storage_category'];
        if ($chat_storage == 'off') {
            $add_storage = mysql_query("INSERT INTO `app_my_girl_storage` (`id`, `lang`,`type`,`category`) VALUES ('$id', '$lang_sel','$type_chat','$storage_category');");
            $chat_storage = 'on';
        } else {
            $add_storage = mysql_query("UPDATE `app_my_girl_storage` SET `category` = '$storage_category' where `id`='$id' AND `lang`='$lang_sel' AND `type`='$type_chat'");
            $chat_storage = 'on';
        }
    } else {
        if ($chat_storage == 'on') {
            $delete_storage = mysql_query("DELETE FROM `app_my_girl_storage` WHERE `id` = '$id' AND  `lang` = '$lang_sel' AND `type`='$type_chat' LIMIT 1;");
            $chat_storage = 'off';
        }
    }


    if (isset($_GET['msg'])) {
        $func = $_POST['func'];
        $type_chat = 'msg';
        $result_update = mysql_query("UPDATE `$txt_table` SET `func` = '$func',`chat` = '$chat',`status` = '$status',`sex` = '$sex',`color` = '$color',`q1` = '$q1',`q2` = '$q2',`r1` = '$r1',`r2` = '$r2',`vibrate` = '$vibrate',`effect` = '$effect',`face`='$face',`action`='$action',`character_sex`=$character_sex , `ver`=$limit_ver  , `limit_chat`='$limit_chat' ,`limit_day`='$limit_day',`limit_month`='$limit_month',`limit_date`='$limit_date' , `os_android`='$os_android' , `os_window`='$os_window' , `os_ios`='$os_ios' ,`effect_customer`='$effect_customer',`user_update`='$user_id',`file_url`='$file_url'  $txt_disable WHERE `id` = '$id';");
    } else {
        $text = addslashes($_POST['text']);
        $type_chat = 'chat';
        $result_update = mysql_query("UPDATE `$txt_table` SET `text` = '$text',`chat` = '$chat',`status` = '$status',`sex` = '$sex',`color` = '$color',`q1` = '$q1',`q2` = '$q2',`r1` = '$r1',`r2` = '$r2',`tip` = '$tip',`link` = '$link',`vibrate` = '$vibrate',`effect` = '$effect',`face`='$face',`action`='$action',`character_sex`=$character_sex ,`id_redirect`='$id_redirect' , `ver`=$limit_ver , `limit_chat`='$limit_chat' ,`limit_date`='$limit_date' , `os_android`='$os_android' , `os_window`='$os_window' , `os_ios`='$os_ios' ,`effect_customer`='$effect_customer',`limit_day`='$limit_day',`limit_month`='$limit_month', `author`='$lang_sel' ,`func_sever`='$func_sever',`user_update`='$user_id',`file_url`='$file_url' $txt_disable  WHERE `id` = '$id';");
    }

    echo mysql_error();
    $check_field_chat = mysql_query("SELECT * FROM `app_my_girl_field_$lang_sel` WHERE `id_chat` = '$id' AND `type_chat` = '$type_chat' LIMIT 1");
    if (isset($_POST['id_field_chat'])) {
        $id_field_chat = $_POST['id_field_chat'];
        $id_func_field_chat = $_POST['id_func_field_chat'];
        $name_func_field_chat = $_POST['name_func_field_chat'];
        $value_field_chat = $_POST['value_field_chat'];
        $color_field_chat = $_POST['color_field_chat'];
        $box_select_short = $_POST['box_select_short'];

        $arr_data_field_chat = array();
        for ($i = 0; $i < count($id_field_chat); $i++) {
            $arr_item = array(trim($id_field_chat[$i]), trim($id_func_field_chat[$i]), trim($name_func_field_chat[$i]), trim($value_field_chat[$i]), trim($color_field_chat[$i]));
            array_push($arr_data_field_chat, $arr_item);
        }

        $data_field = json_encode($arr_data_field_chat, JSON_UNESCAPED_UNICODE);
        $author = "unclear";

        if (mysql_num_rows($check_field_chat) > 0) {
            $query_update_field = mysql_query("UPDATE `app_my_girl_field_$lang_sel` SET `data` = '$data_field' , `option`='$box_select_short'  WHERE `id_chat` = '$id' AND `type_chat` = '$type_chat' LIMIT 1;");
            mysql_freeresult($query_update_field);
            echo "Cập nhật trường dữ liệu (Field chat) thành công!<br/>";
        } else {
            $query_add_field = mysql_query("INSERT INTO `app_my_girl_field_$lang_sel` (`id_chat`, `type_chat`, `data`, `type`, `author`,`option`) VALUES ('$id', '$type_chat', '$data_field', 'field_chat', '$author','$box_select_short');");
            mysql_free_result($query_add_field);
            echo "Thêm mới trường dữ liệu (Field chat) thành công!<br/>";
        }
    } else {
        if (mysql_num_rows($check_field_chat) > 0) {
            $query_delete_field = mysql_query("DELETE FROM `app_my_girl_field_$lang_sel` WHERE `id_chat` = '$id' AND `type_chat` = '$type_chat'  LIMIT 1;");
            mysql_free_result($query_delete_field);
            echo "Xóa trường dữ liệu (Field chat) thành công!<br/>";
        }
    }
    mysql_free_result($check_field_chat);


    $lyrics = $_POST['lyrics'];
    if ($lyrics != '') {
        $lyrics = addslashes($lyrics);

        $show_lyrics = mysql_query("SELECT * FROM `app_my_girl_" . $lang_sel . "_lyrics` WHERE `id_music` = '$id' LIMIT 1");
        if (mysql_num_rows($show_lyrics) == 0) {
            mysql_query("INSERT INTO `app_my_girl_" . $lang_sel . "_lyrics` (`id_music`, `lyrics`) VALUES ('$id', '$lyrics');");
            echo mysql_error();
            echo "Thêm mới lời bài hát thành công !";
        } else {
            mysql_query("UPDATE `app_my_girl_" . $lang_sel . "_lyrics` SET `lyrics` = '$lyrics' WHERE `id_music` = '$id'");
            echo mysql_error();
            echo "Cập nhật lời bài hát thành công !";
        }
    }


    echo "Update success!!!";
    ?>
    <a href="http://work.carrotstore.com/?id_object=<?php echo $id; ?>&lang=<?php echo $lang_sel; ?>&type_chat=<?php echo $type_chat; ?>&type_action=edit"
       target="_blank" class="buttonPro light_blue"><i class="fa fa-desktop" aria-hidden="true"></i> Thêm vào bàn làm
        việc (Editor)</a>
    <?php
    echo mysql_error();

    if (isset_file($_FILES["file_audio"])) {

        $target_dir = "app_mygirl/$txt_table";
        $target_file = $target_dir . '/' . $id . '.mp3';
        if (file_exists($target_file)) {
            echo 'Đã xóa file âm thanh cữ!<br/>';
            unlink($target_file);
        }

        if (move_uploaded_file($_FILES["file_audio"]["tmp_name"], $target_file)) {
            echo "The file " . $target_file . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    $update_item_child = mysql_query("UPDATE `app_my_girl_$lang_sel` SET `pater` = '',`pater_type`='' WHERE `pater` = '$id' AND `pater_type`='$type_chat';");

    if (isset($_POST['chat_child'])) {
        $all_child = $_POST['chat_child'];
        foreach ($all_child as $child) {
            $update_item_child = mysql_query("UPDATE `app_my_girl_$lang_sel` SET `pater` = '$id',`pater_type`='$type_chat' WHERE `id` = '$child';");
            echo mysql_error();
        }
    } else {
        $update_item_child = mysql_query("UPDATE `app_my_girl_$lang_sel` SET `pater` = '',`pater_type`='' WHERE `pater` = '$id' AND `pater_type`='$type_chat';");
        echo "<p>clear all child chat!</p>";
    }
}


$result_chat = mysql_query("SELECT * FROM `$txt_table` WHERE `id`='$id' LIMIT 1");
if (mysql_num_rows($result_chat) == 0) {
    echo show_alert('Đối tượng này không còn tồn tại!', 'alert');
    exit;
}
$arr = mysql_fetch_array($result_chat);
?>
<script src="<?php echo $url; ?>/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/dist/sweetalert.css"/>
<script src="<?php echo $url; ?>/js/jscolor.min.min.js"></script>
<h2><img src="<?php echo $url; ?>/app_mygirl/img/<?php echo $lang_sel; ?>.png"
         style="width: 20px;margin-right: 2px;float: left;"/> <?php echo $txt_title; ?></h2>
<ul id="menu_page">
    <li>
        <a href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $lang_sel; ?>&id_chat_see=<?php echo $id; ?>&type_chat_see=<?php echo $type_chat; ?>&sex=<?php echo $arr['sex']; ?>&character_sex=<?php echo $arr['character_sex']; ?>"
           class="buttonPro small blue" target="_blank"><i class="fa fa-user" aria-hidden="true"></i> Lọc theo dõi theo
            câu trả lời này</a></li>
    <?php if (isset($_GET['msg'])) {
        ?>
        <li>
            <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=move_msg&id=<?php echo $id; ?>&lang=<?php echo $lang_sel; ?>"
               class="buttonPro small blue"><i class="fa fa-plane" aria-hidden="true"></i> Di chuyển hoặc sao chép sang
                nước khác</a></li>
        <li>
            <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=delete_chat&id=<?php echo $id; ?>&lang=<?php echo $lang_sel; ?>&type=msg"
               class="buttonPro small red"><i class="fa fa-trash"></i> Xóa câu thoại này</a></li>
        <?php
    } else { ?>
        <li>
            <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=delete_chat&id=<?php echo $id; ?>&lang=<?php echo $lang_sel; ?>"
               class="buttonPro small red"><i class="fa fa-trash"></i> Xóa câu trò chuyện này</a></li>
        <li>
            <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=move_chat&id=<?php echo $id; ?>&lang=<?php echo $lang_sel; ?>"
               class="buttonPro small blue"><i class="fa fa-plane" aria-hidden="true"></i> Di chuyển sang nước khác</a>
        </li>
        <?php if ($arr['effect'] == '2') { ?>
            <li><a target="_blank" class="buttonPro small light_blue"
                   href="<?php echo $url; ?>/music/<?php echo $id; ?>/<?php echo $lang_sel; ?>"><i
                        class="fa fa-gg-circle" aria-hidden="true"></i> Xem bài hát này trên store</a></li><?php } ?>
    <?php } ?>
    <?php
    if ($data_user_carrot["user_role"] == "admin" || $data_user_carrot["user_role"] == "leader") {
        ?>
        <li><a target="_blank"
               href="http://work.carrotstore.com/?page_show=manager_report&find=<?php echo $id; ?>&lang=<?php echo $lang_sel; ?>&username=<?php echo get_user_name_by_id($arr['user_create']); ?>&chat_type=<?php echo $type_chat; ?>"
               class="buttonPro small red"><i class="fa fa-bug" aria-hidden="true"></i> Báo lỗi</a></li>
    <?php } ?>
</ul>


<form name="frm_chat" method="post" enctype="multipart/form-data">
    <table>

        <?php
        $type_add = 'chat';
        if (isset($_GET['msg'])) {
            $type_add = 'msg';
            ?>
            <tr>
                <td>Function</td>
                <td colspan="2">
                    <select name="func">
                        <?php for ($i = 0; $i < count($data_app->msg_func); $i++) { ?>
                            <option value="<?php echo $data_app->msg_func[$i]->key; ?>" <?php if ($arr['func'] == $data_app->msg_func[$i]->key) { ?> selected="true"<?php } ?>><?php echo $data_app->msg_func[$i]->value; ?></option>
                        <?php } ?>
                    </select>

                </td>
            </tr>
        <?php } else {
            ?>
            <tr>
                <td>Text</td>
                <td>
                    <input type="text" name="text" value="<?php echo $arr['text']; ?>" id="key_inp"/>
                </td>
                <td>
                    <script>
                        function check_key() {
                            var key_inp = $("#key_inp").val();
                            var sex = $('#sex1').val();
                            var char_sex = $('#character_sex').val();
                            var win = window.open("<?php echo $url; ?>/app_my_girl_handling.php?func=check_key&key=" + key_inp + "&lang=<?php echo $lang_sel; ?>&sex=" + sex + "&character_sex=" + char_sex + "", '_blank');
                            win.focus();
                        }
                    </script>
                    <span class="buttonPro small black"
                          onclick="translation_tag('key_inp','<?php echo $lang_sel; ?>','<?php echo $lang_2; ?>');return false;"><i
                                class="fa fa-language" aria-hidden="true"></i> Dịch</span>
                    <a href="#" class="buttonPro small yellow" target="_blank" onclick="check_key();return false;"><i
                                class="fa fa-share-square-o" aria-hidden="true"></i> kiểm tra tồn tại</a>
                </td>
            </tr>
        <?php } ?>

        <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
            if ($arr['id_redirect'] != '') {
                echo 'style="display:none"';
            }
        } ?>>
            <td>Disable</td>
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            <label>Không kích hoạt</label>
                            <input style="width: auto;" type="checkbox" name="disable"
                                   <?php if ($arr['disable'] == "1") { ?>checked="on"<?php } ?> />
                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                        </td>
                        <td>
                            <label>Lưu trữ</label>
                            <input style="width: auto;" type="checkbox" name="storage"
                                   <?php if ($chat_storage == "on") { ?>checked="on"<?php } ?> />
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            <select style="width: 150px;float: none;margin-left: 3px;" name="storage_category">
                                <?php
                                for ($i = 0; $i < count($array_category_store); $i++) {
                                    ?>
                                    <option value="<?php echo $array_category_store[$i]->key; ?>"
                                            <?php if ($storage_category == $array_category_store[$i]->key){ ?>selected="true"<?php } ?>><?php echo $array_category_store[$i]->value; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </td>

                        <?php if ($arr['user_create'] != '') { ?>
                            <td>
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                                <label>Người Tạo :</label>
                                <strong><?php echo get_user_name_by_id($arr['user_create']); ?></strong>
                            </td>
                        <?php } ?>

                        <td>
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            <?php if ($arr['user_update'] == '') { ?>
                                <label>Người cập nhật mới:</label>
                                <strong><?php echo $data_user_carrot['user_name']; ?></strong>
                            <?php } else { ?>
                                <label>Người cập nhật cũ:</label>
                                <strong><?php echo get_user_name_by_id($arr['user_update']); ?></strong>
                            <?php } ?>
                            <input type="hidden" name="user_id" value="<?php echo $data_user_carrot['user_id']; ?>"/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
            if ($arr['id_redirect'] != '') {
                echo 'style="display:none"';
            }
        } ?> >
            <td>Chat</td>
            <td colspan="2">
                <textarea style="height: 240px;" id="chat" onkeyup="check_chat_txt_length()"
                          name="chat"><?php echo $arr['chat']; ?></textarea>
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
                          onclick="translation_tag('chat','<?php echo $lang_sel; ?>','<?php echo $lang_2; ?>');"><i
                                class="fa fa-language" aria-hidden="true"></i> Dịch</span>
                    <span class="buttonPro small black" onclick="paste_tag('chat');return false;"><i
                                class="fa fa-clipboard" aria-hidden="true"></i> Dán</span>
                </div>
            </td>
        </tr>

        <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
            if ($arr['id_redirect'] != '') {
                echo 'style="display:none"';
            }
        } ?> >
            <td>Sex</td>
            <td>
                <select name="sex" id="sex1" onchange="check_sex();">
                    <option value="0" <?php if ($arr['sex'] == '0') {
                        echo 'selected="true"';
                    } ?> >Nam
                    </option>
                    <option value="1" <?php if ($arr['sex'] == '1') {
                        echo 'selected="true"';
                    } ?> >Nữ
                    </option>
                </select>
            </td>
            <td rowspan="15" style="width: 400px;">
                <div style="float: left;width: 100%; margin-bottom: 5px;">
                    Mô tả khuôn mặt <br/>
                    <img src="<?php echo $url; ?>/app_mygirl/img/face/<?php echo $arr['face']; ?>.png" id="id_img_face"
                         style="width: 100px;cursor: pointer;" onclick="choice_face();"/>
                </div>

                <div style="float: left;width: 100%;">
                    Mô tả hành động <br/>
                    <img src="<?php echo $url; ?>/app_mygirl/img/action/<?php echo $arr['action']; ?>.png" id="id_img"
                         style="width: 100px;cursor: pointer;" onclick="choice_action();"/>
                </div>
            </td>
        </tr>

        <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
            if ($arr['id_redirect'] != '') {
                echo 'style="display:none"';
            }
        } ?> >
            <td>Character sex</td>
            <td>
                <select name="character_sex" id="character_sex" onchange="check_sex();">
                    <option value="0" <?php if ($arr['character_sex'] == '0') {
                        echo 'selected="true"';
                    } ?> >Nam
                    </option>
                    <option value="1" <?php if ($arr['character_sex'] == '1') {
                        echo 'selected="true"';
                    } ?> >Nữ
                    </option>
                </select>
            </td>
        </tr>
        <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
            if ($arr['id_redirect'] != '') {
                echo 'style="display:none"';
            }
        } ?> >
            <td>effect</td>
            <td>
                <select name="effect" onchange="check_effect(this)" id="effect">
                    <option value="" <?php if ($arr['effect'] == '') {
                        echo 'selected="true"';
                    } ?>>None
                    </option>
                    <?php
                    for ($i = 0; $i < count($data_app->arr_function_app); $i++) {
                        $data_i = $data_app->arr_function_app[$i];
                        ?>
                        <option value="<?php echo $data_i->key; ?>" <?php if ($arr['effect'] == $data_i->key) {
                            echo 'selected="true"';
                        } ?>><?php echo $data_i->name; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>

        <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
            if ($arr['id_redirect'] != '') {
                echo 'style="display:none"';
            }
        } ?> >
            <td>effect customer</td>
            <td>
                <input type="hidden" name="effect_customer" id="effect_chat"
                       value="<?php echo $arr['effect_customer']; ?>"/>
                <?php
                if ($arr['effect_customer'] != '') {
                    ?>
                    <img src="<?php echo $url; ?>/app_mygirl/obj_effect/<?php echo $arr['effect_customer']; ?>.png"
                         id="id_img_effect" onclick="show_effect_chat('');return false;" style="cursor: pointer;"/>
                    <?php
                } else {
                    ?>
                    <img src="<?php echo $url; ?>/app_mygirl/img/no_icon.png" id="id_img_effect"
                         onclick="show_effect_chat('');return false;" style="cursor: pointer;"/>
                    <?php
                }
                ?>
                <button class="buttonPro blue small" oncontextmenu="show_effect_chat('rand');return false;"
                        onclick="sel_effect_random('');return false;">gẫu nhiên
                </button>

                <?php for ($i = 0; $i < count($arr_tag_effect); $i++) { ?>
                    <button class="buttonPro light_blue small"
                            oncontextmenu="show_effect_chat('<?php echo $arr_tag_effect[$i]; ?>');return false;"
                            onclick="sel_effect_random('<?php echo $arr_tag_effect[$i]; ?>');return false;"><?php echo $arr_tag_effect[$i]; ?></button>
                <?php } ?>


                <?php
                if ($arr['effect_customer'] != '') {
                    ?>
                    <a class="buttonPro yellow small" id="edit_effect"
                       href="<?php echo $url; ?>/app_my_girl_effect.php?edit=<?php echo $arr['effect_customer']; ?>"
                       target="_blank">chỉnh sửa hiệu ứng</a>
                    <?php
                } else {
                    ?>
                    <a class="buttonPro yellow small" id="edit_effect" style="display: none;" href="" target="_blank">chỉnh
                        sửa hiệu ứng</a>
                    <?php
                }
                ?>
            </td>
        </tr>

        <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
            if ($arr['id_redirect'] != '') {
                echo 'style="display:none"';
            }
        } ?> >
            <td>vibrate</td>
            <td>
                <select name="vibrate">
                    <option value="" <?php if ($arr['vibrate'] == '') {
                        echo 'selected="true"';
                    } ?>>off
                    </option>
                    <option value="1" <?php if ($arr['vibrate'] == '1') {
                        echo 'selected="true"';
                    } ?>>on
                    </option>
                </select>
            </td>
        </tr>

        <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
            if ($arr['id_redirect'] != '') {
                echo 'style="display:none"';
            }
        } ?> >
            <td>color</td>
            <td><input type="text" name="color" id="chat_color" class="jscolor" value="<?php echo $arr['color']; ?>"/>
            </td>
        </tr>

        <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
            if ($arr['id_redirect'] != '') {
                echo 'style="display:none"';
            }
        } ?> >
            <td>q1</td>
            <td>
                <input type="text" name="q1" id="q1" value='<?php echo $arr['q1']; ?>'/>
                <span class="key_func"
                      onclick="add_key_question(this,$('#q1'));return false;"><?php echo get_key_lang('key_yes_question', $lang_sel); ?></span>
                <span onclick="add_key_customer('q1');return false;" class="buttonPro small yellow">Thêm thẻ</span>
            </td>
        </tr>

        <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
            if ($arr['id_redirect'] != '') {
                echo 'style="display:none"';
            }
        } ?> >
            <td>q2</td>
            <td>
                <input type="text" name="q2" id="q2" value='<?php echo $arr['q2']; ?>'/>
                <span class="key_func"
                      onclick="add_key_question(this,$('#q2'));return false;"><?php echo get_key_lang('key_no_question', $lang_sel); ?></span>
                <span onclick="add_key_customer('q2');return false;" class="buttonPro small yellow">Thêm thẻ</span>
            </td>
        </tr>

        <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
            if ($arr['id_redirect'] != '') {
                echo 'style="display:none"';
            }
        } ?> >
            <td>r1</td>
            <td>
                <input type="text" name="r1" id="r1" value="<?php echo $arr['r1']; ?>"/>
                <button onclick="show_id_chat('<?php echo $lang_sel; ?>','r1',0);return false;"
                        class="buttonPro small yellow">Get ID chat
                </button>
                <button onclick="add_new_chat();return false;" class="buttonPro small yellow">Add chat</button>
                <?php
                if ($arr['r1'] != '') {
                    $txt_update = $url . '/app_my_girl_update.php?id=' . $arr['r1'] . '&lang=' . $lang_sel;
                    ?>
                    <a href="<?php echo $txt_update; ?>" class="buttonPro small blue" target="_blank">View chat</a>
                    <?php
                }
                ?>
            </td>
        </tr>

        <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
            if ($arr['id_redirect'] != '') {
                echo 'style="display:none"';
            }
        } ?> >
            <td>r2</td>
            <td>
                <input type="text" name="r2" id="r2" value="<?php echo $arr['r2']; ?>"/>
                <button onclick="show_id_chat('<?php echo $lang_sel; ?>','r2',0);return false;"
                        class="buttonPro small yellow">Get ID chat
                </button>
                <button onclick="add_new_chat();return false;" class="buttonPro small yellow">Add chat</button>
                <?php
                if ($arr['r2'] != '') {
                    $txt_update = $url . '/app_my_girl_update.php?id=' . $arr['r2'] . '&lang=' . $lang_sel;
                    ?>
                    <a href="<?php echo $txt_update; ?>" class="buttonPro small blue" target="_blank">View chat</a>
                    <?php
                }
                ?>
            </td>
        </tr>
        <?php if (isset($_GET['msg'])) {
        } else { ?>
            <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
                if ($arr['id_redirect'] != '') {
                    echo 'style="display:none"';
                }
            } ?> >
                <td>link</td>
                <td>
                    <input type="text" name="link" id="link" value="<?php echo $arr['link']; ?>"/>
                    <input type="file" id="file_img" name="file_img" style="display: none;"/>
                    <?php
                    $target_file = str_replace($url . '/', '', $arr['link']);
                    if (file_exists($target_file)) {
                        echo '<img src="' . $target_file . '"/>';
                    }
                    ?>
                </td>
            </tr>

            <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
                if ($arr['id_redirect'] != '') {
                    echo 'style="display:none"';
                }
            } ?> >
                <td>tip</td>
                <td>
                    <select name="tip">
                        <option value="" <?php if ($arr['tip'] == '') {
                            echo 'selected="true"';
                        } ?>>off
                        </option>
                        <option value="1" <?php if ($arr['tip'] == '1') {
                            echo 'selected="true"';
                        } ?>>on
                        </option>
                    </select>
                </td>
            </tr>
        <?php } ?>

        <?php if ($type_add == 'chat') { ?>
            <tr class="chat_1">
                <td>Chức năng sever</td>
                <td>
                    <select name="func_sever">
                        <option value="">none</option>
                        <?php
                        foreach ($arr_func_sever as $key_func_sever) {
                            ?>
                            <option value="<?php echo $key_func_sever ?>" <?php if ($arr['func_sever'] == $key_func_sever) {
                                echo 'selected="true"';
                            } ?>><?php echo $key_func_sever ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
        <?php } ?>

        <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
            if ($arr['id_redirect'] != '') {
                echo 'style="display:none"';
            }
        } ?> >
            <td>status</td>
            <td>
                <select name="status">
                    <option value="1" <?php if ($arr['status'] == '1') {
                        echo 'selected="true"';
                    } ?>>Nomal
                    </option>
                    <option value="0" <?php if ($arr['status'] == '0') {
                        echo 'selected="true"';
                    } ?>>Ban đầu
                    </option>
                    <option value="2" <?php if ($arr['status'] == '2') {
                        echo 'selected="true"';
                    } ?>>Xúc động
                    </option>
                    <option value="3" <?php if ($arr['status'] == '3') {
                        echo 'selected="true"';
                    } ?>>Tức giận
                    </option>
                </select>
            </td>
        </tr>

        <tr style="background-color: #FFB591;<?php if ($arr['id_redirect'] != '') {
            echo ';display:none';
        } ?>" class="chat_1">
            <td>Action (v2)</td>
            <td>
                <select name="action" id="action_nv" onchange="change_action(this.value)">
                    <?php for ($i = 0; $i < count($data_app->arr_action_name); $i++) { ?>
                        <option value="<?php echo $i; ?>" <?php if ($arr['action'] == $i) {
                            echo 'selected="true"';
                        } ?>><?php echo $data_app->arr_action_name[$i]; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>

        <tr style="background-color: #FFB591;<?php if ($arr['id_redirect'] != '') {
            echo ';display:none';
        } ?>" class="chat_1">
            <td>Face (v2)</td>
            <td>
                <select name="face" id="face_nv" onchange="change_face(this.value)">
                    <?php for ($i = 0; $i < count($data_app->arr_face_name); $i++) { ?>
                        <option value="<?php echo $i; ?>" <?php if ($arr['face'] == $i) {
                            echo 'selected="true"';
                        } ?>><?php echo $data_app->arr_face_name[$i]; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>

        <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
            if ($arr['id_redirect'] != '') {
                echo 'style="display:none"';
            }
        } ?> >
            <td>audio</td>
            <td colspan="3">
                <div style="float: left;width: 50%;">
                    <?php
                    if (is_file('app_mygirl/' . $txt_table . '/' . $arr['id'] . '.mp3')) {
                        ?>
                        <audio controls="true" id="control_audio">
                            <source src="<?php echo $url . '/app_mygirl/' . $txt_table . '/' . $arr['id'] . '.mp3'; ?>"
                                    type="audio/ogg"/>
                        </audio>
                        <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=delete_audio&id=<?php echo $arr['id']; ?>&lang=<?php echo $lang_sel; ?>&type=<?php echo $type_chat; ?>"
                           class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa âm thanh</a>
                    <?php } else {
                        if ($arr['effect'] != '2') {
                            ?>
                            <span id="show_audio_test"></span>
                        <?php }
                    } ?>
                    <input type="file" id="file_audio" name="file_audio"/>
                    <br/>

                    <?php
                    if ($arr['effect'] == '2') {
                        if (!is_file($url . '/app_mygirl/' . $txt_table . '/' . $arr['id'] . '.mp3')) {
                            ?>
                            <a href="#" onclick="search_song();" class="buttonPro small light_blue"><i
                                        class="fa fa-search-plus" aria-hidden="true"></i> Tìm kiếm bài hát</a>
                            <?php
                        }
                    } else {
                        ?>
                        <a href="#" onclick="get_audio_file('<?php echo $lang_sel; ?>');" id="btn_add_audio"
                           class="buttonPro small yellow"><i class="fa fa-download" aria-hidden="true"></i> get link
                            audio</a>
                        <a target="_blank" class="buttonPro small blue" id="btn_tool_cms_audio" href="#"
                           onclick="goto_create_audio();return false;"><i class="fa fa-headphones"
                                                                          aria-hidden="true"></i> Công cụ tạo giọng dài</a>
                        <span id="msg_audio"></span>
                    <?php } ?>
                    <?php
                    if (is_file('app_mygirl/' . $txt_table . '/' . $arr['id'] . '.mp3')) {
                        echo move_file_to_sever($url . '/app_mygirl/' . $txt_table . '/' . $arr['id'] . '.mp3', $data_app->arr_sever_upload);
                    }
                    ?>
                </div>

                <div style="float: left;width: 50%;">
                    <?php
                    if ($arr['file_url'] != '') {
                        $url_sever=$data_app->arr_sever_upload[0]->url_home;
                        echo '<a target="_blank" class="buttonPro small blue"  href="' . $arr['file_url'] . '"><i class="fa fa-headphones" aria-hidden="true"></i> Nghe tệp âm thanh</a>';
                        echo '<a target="_blank" class="buttonPro small blue"  href="'.$url_sever.'/file/' . basename($arr['file_url']) . '"><i class="fa fa-delicious" aria-hidden="true"></i> Chi tiết âm thanh</a>';
                    }
                    echo box_upload("mp3", $data_app->arr_sever_upload, $arr['file_url']);
                    ?>
                </div>
            </td>
        </tr>

        <tr class="chat_1" <?php if (isset($arr['id_redirect'])) {
            if ($arr['id_redirect'] != '') {
                echo 'style="display:none"';
            }
        } ?> style="background-color: #FFBBBB;">
            <td>Hiển thị</td>
            <td>
                <div style="float: left; width: 23%;margin: 2px;">
                    <label><i class="fa fa-android" aria-hidden="true"></i> Android</label>
                    <select name="os_android">
                        <option value="0" <?php if ($arr['os_android'] == '0') {
                            echo 'selected="true"';
                        } ?>>Hiển thị
                        </option>
                        <option value="1" <?php if ($arr['os_android'] == '1') {
                            echo 'selected="true"';
                        } ?>>Không hiển thị
                        </option>
                    </select>
                </div>


                <div style="float: left; width: 23%;margin: 2px;">
                    <label><i class="fa fa-windows" aria-hidden="true"></i> Window</label>
                    <select name="os_window">
                        <option value="0" <?php if ($arr['os_window'] == '0') {
                            echo 'selected="true"';
                        } ?>>Hiển thị
                        </option>
                        <option value="1" <?php if ($arr['os_window'] == '1') {
                            echo 'selected="true"';
                        } ?>>Không hiển thị
                        </option>
                    </select>
                </div>

                <div style="float: left; width: 23%;margin: 2px;">
                    <label><i class="fa fa-apple" aria-hidden="true"></i> Ios</label>
                    <select name="os_ios">
                        <option value="0" <?php if ($arr['os_ios'] == '0') {
                            echo 'selected="true"';
                        } ?>>Hiển thị
                        </option>
                        <option value="1" <?php if ($arr['os_ios'] == '1') {
                            echo 'selected="true"';
                        } ?>>Không hiển thị
                        </option>
                    </select>
                </div>

                <div style="float: left; width: 23%;margin: 2px;">
                    <label><i class="fa fa-adjust" aria-hidden="true" tyle="Phiên bản triển khai"></i> Phiên bản</label>
                    <select name="limit_ver">
                        <option value="0" <?php if ($arr['ver'] == '0') {
                            echo 'selected="true"';
                        } ?>>Tất cả
                        </option>
                        <option value="1" <?php if ($arr['ver'] == '1') {
                            echo 'selected="true"';
                        } ?>>Không hiển thị 2D
                        </option>
                        <option value="2" <?php if ($arr['ver'] == '2') {
                            echo 'selected="true"';
                        } ?>>Không hiển thị 3D
                        </option>
                    </select>
                </div>
            </td>
        </tr>

        <tr style="background-color: #E1C4FF">
            <td>câu trả lời (câu thoại con)<br/> cho câu trò chuyện này</td>
            <td colspan="2">
                <button onclick="show_id_chat('<?php echo $lang_sel; ?>','r1',2);return false;"
                        class="buttonPro small yellow">Get ID chat
                </button>
                <button onclick="add_new_chat();return false;" class="buttonPro small yellow">Add chat</button>
                <button onclick="remove_all_chat_child();return false;" class="buttonPro small red">Delete all</button>
                <table id="table_data_return">
                    <?php
                    $get_child_chat = mysql_query("SELECT * FROM  `app_my_girl_$lang_sel`  WHERE `pater` = '$id' AND `pater_type`='$type_chat'");
                    while ($row_child = mysql_fetch_array($get_child_chat)) {
                        $btn_remove = '<a href="#" class="buttonPro small red" onclick="remove_chat_same(\'' . $row_child['id'] . '\')">Gỡ bỏ khỏi cha</a><input type="hidden" value="' . $row_child['id'] . '" name="chat_child[]" />';
                        echo show_row_chat_prefab($row_child, $lang_sel, $btn_remove);
                    }
                    mysql_fetch_array($get_child_chat);
                    ?>
                </table>
            </td>
        </tr>


        <?php if ($type_add == 'chat') { ?>
            <tr style="background-color: #C0F17E;">
                <td>câu trả lời tương tự</td>
                <td colspan="2">
                    <button onclick="show_id_chat('<?php echo $lang_sel; ?>','r1',1);return false;"
                            class="buttonPro small green">Get ID chat
                    </button>
                    <input type="hidden" name="id_redirect" id="id_redirect"
                           value="<?php if ($arr['id_redirect'] != '') {
                               echo $arr['id_redirect'];
                           } ?>"/>
                    <table id="table_data_same">
                        <?php if ($arr['id_redirect'] != '') {
                            $id_redirect = $arr['id_redirect'];
                            $result_chat = mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id_redirect'");
                            $result_chat = mysql_fetch_array($result_chat);
                            $btn_remove = '<a href="#" class="buttonPro small red" onclick="remove_chat_same(\'' . $id_redirect . '\')">Gỡ bỏ</a>';
                            echo show_row_chat_prefab($result_chat, $lang_sel, $btn_remove);
                        } ?>
                    </table>
                </td>
            </tr>
        <?php } ?>

        <tr id="box_select">
            <td>Bản lựa chọn</td>
            <td id="box_select_content">
                <?php
                $get_field_chat = mysql_query("SELECT * FROM `app_my_girl_field_$lang_sel` WHERE `id_chat` = '$id' AND `type_chat` = '$type_add' LIMIT 1");
                $data_fields = mysql_fetch_array($get_field_chat);
                $data_field = json_decode($data_fields['data']);
                for ($i = 0; $i < count($data_field); $i++) {
                    $item_field = $data_field[$i];
                    ?>
                    <div class="box_fiel_chat_item field_chat_<?php echo $item_field[0]; ?>">
                        <div class="col"><label>ID :</label><input name="id_field_chat[]"
                                                                   id="id_field_chat_<?php echo $item_field[0]; ?>"
                                                                   value="<?php echo $item_field[0]; ?>" type="text"/>
                        </div>
                        <div class="col"><label>ID Func:</label><input name="id_func_field_chat[]"
                                                                       value="<?php echo $item_field[1]; ?>"
                                                                       type="text"/></div>
                        <div class="col"><label>Name Func:</label><input name="name_func_field_chat[]"
                                                                         value="<?php echo $item_field[2]; ?>"
                                                                         type="text"/></div>
                        <div class="col"><label>Lable:</label><input name="value_field_chat[]"
                                                                     value="<?php echo $item_field[3]; ?>" type="text"/>
                        </div>
                        <div class="col"><label>Color:</label><input class="jscolor jscolor-active"
                                                                     name="color_field_chat[]"
                                                                     value="<?php if (isset($item_field[4])) {
                                                                         echo $item_field[4];
                                                                     } else {
                                                                         echo '#000000';
                                                                     } ?>" type="text"/></div>
                        <div class="col" style="width:240px;padding-top: 6px;">
                            <?php
                            if ($item_field[2] == "show_chat" || $item_field[2] == "inp_chat") {
                                ?>
                                <span class="buttonPro light_blue"
                                      onclick="show_id_chat('<?php echo $lang_sel; ?>','id_field_chat_<?php echo $item_field[0]; ?>','0');return false;">Lấy id chat</span>
                                <?php
                            }
                            ?>
                            <span class="buttonPro red"
                                  onclick="delete_field_chat('<?php echo $item_field[0]; ?>')">Xóa</span>
                        </div>
                        <i class="fa fa-sort" aria-hidden="true" style="float: right;margin: 3px;cursor: pointer;"></i>
                    </div>
                    <?php
                }
                mysql_free_result($get_field_chat);
                ?>
            </td>
            <td>
                <table>
                    <tr>
                        <td>
                            <label>Thêm chức năng</label><br/>
                            <button class="buttonPro green small" onclick="add_field_chat('');return false;">Thêm trường
                                tùy chỉnh
                            </button>
                            <button class="buttonPro green small" onclick="add_field_chat('show_chat');return false;">
                                Hiện trò chuyện
                            </button>
                            <button class="buttonPro green small" onclick="add_field_chat('inp_chat');return false;">
                                Nhập trò chuyện
                            </button>
                            <button class="buttonPro green small" onclick="add_field_chat('link');return false;">Liên
                                kết
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            $sel_short = $data_fields['option'];
                            ?>
                            <label>Tùy chỉnh sắp xếp</label>
                            <select name="box_select_short">
                                <option value="0" <?php if ($sel_short == '0'){ ?>selected="true"<?php } ?>>Bằng tay
                                </option>
                                <option value="1" <?php if ($sel_short == '1'){ ?>selected="true"<?php } ?>>Ngẫu nhiên
                                </option>
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>định dạng mức độ thô tục và tình dục</td>
            <td colspan="2">
                <input name="limit_chat" type="range" min="1" max="4" step="1"
                       value="<?php if ($arr['limit_chat'] == '0') {
                           $arr['limit_chat'] = 1;
                       };
                       echo $arr['limit_chat']; ?>"/>
            </td>
        </tr>

        <tr>
            <td>Ngày áp dụng</td>
            <td colspan="2">
                <div style="float: left;width: 20%;">
                    <label>Limit date</label><br/>
                    <input name="limit_date" id="limit_date" type="text" value="<?php echo $arr['limit_date']; ?>"/>
                </div>

                <div style="float: left;width: 20%;">
                    <label>Limit month</label><br/>
                    <input name="limit_month" id="limit_month" type="text" value="<?php echo $arr['limit_month']; ?>"/>
                </div>

                <div style="float: left;width: 20%;">
                    <label>Limit day</label><br/>
                    <select name="limit_day">
                        <?php
                        foreach ($arr_limit_day as $day) {
                            ?>
                            <option <?php if ($day == $arr['limit_day']) {
                                echo 'selected="true"';
                            } ?> value="<?php echo $day ?>"><?php echo $day; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </td>
        </tr>

        <tr>
            <td>&nbsp;<input value="<?php echo $arr['id']; ?>" name="id" type="hidden"/></td>
            <td colspan="2"><input type="submit" value="Hoàn tất" class="link_button" id="btn_done_chat"/></td>
        </tr>
    </table>
    <?php
    if ($arr['effect'] == '2') {
        $id_music = $arr['id'];
        ?>
        <script src="<?php echo $url_home; ?>/js/jquery.ajaxfileupload.js" type="text/javascript"></script>
        <script>
            function add_music_lyrics() {
                swal({
                        title: "Nhập nội dung lời vào đây",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Lưu lời bài hát",
                        closeOnConfirm: false,
                        html: true,
                        text: '<textarea style="height: 240px;" id="lyrics_inp" name="lyrics_inp"></textarea>'
                    },
                    function () {
                        var txt_lyrics = $('#lyrics_inp').val().replace(/\&/g, ' and ');
                        var id_music =<?php echo $arr['id'];?>;
                        var lang = "<?php echo $lang_sel;?>";
                        $.ajax({
                            url: "app_my_girl_jquery.php",
                            type: "post", //kiểu dũ liệu truyền đi
                            data: "save_lyric=1s&lang=" + lang + "&lyrics=" + txt_lyrics + "&id_music=" + id_music, //tham số truyền vào
                            success: function (data, textStatus, jqXHR) {
                                $("#music_lyrics_contain").val(data);
                                swal("Đã lưu!", data.substr(0, 20) + "...", "success");
                            }

                        });
                    });
            }

            function add_video_music(id_music) {
                swal({
                        title: "Nhập video liên kết youtube vào đây",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Lưu liên kết",
                        closeOnConfirm: false,
                        html: true,
                        text: '<textarea style="height: 80px;" id="video_inp" name="video_inp"></textarea>'
                    },
                    function () {
                        var txt_lyrics = $('#video_inp').val();
                        var lang = "<?php echo $lang_sel;?>";
                        $.ajax({
                            url: "app_my_girl_jquery.php",
                            type: "post", //kiểu dũ liệu truyền đi
                            data: "save_video=1s&lang=" + lang + "&link=" + txt_lyrics + "&id_music=" + id_music, //tham số truyền vào
                            success: function (data, textStatus, jqXHR) {
                                var youtube_video_id = data.match(/youtube\.com.*(\?v=|\/embed\/)(.{11})/).pop();
                                swal("Đã lưu!", data, "success");
                                $("#link_ytb_inp").html(data);
                                $("#id_ytb_inp").val(youtube_video_id);
                                $("#ytb_avatar_music").attr("src", "http://img.youtube.com/vi/" + youtube_video_id + "/sddefault.jpg");
                            }

                        });
                    });
            }

            function save_avatar_music_to_sever() {
                var youtube_video_id = $("#id_ytb_inp").val();
                $.ajax({
                    url: "app_my_girl_jquery.php",
                    type: "post",
                    data: "function=save_avatar_music&id_music=<?php echo $id_music;?>&lang=<?php echo $lang_sel;?>&id_ytb=" + youtube_video_id,
                    success: function (data, textStatus, jqXHR) {
                        swal("Âm nhạc", "Đã lưu ảnh đại diện âm nhạc vào máy chủ!", "success");
                        $("#avatar_music_sever").attr("src", data);
                    }

                });
            }

            function create_url_slug_music() {
                var txt_name_song = $('#chat').val().replace(/\&/g, ' and ');
                $.ajax({
                    url: "app_my_girl_jquery.php",
                    type: "post",
                    data: "function=create_url_slug_music&id_music=<?php echo $id_music;?>&lang=<?php echo $lang_sel;?>&name_song=" + txt_name_song,
                    success: function (data, textStatus, jqXHR) {
                        swal("Âm nhạc", "Đã tạo liên kết chữ cho bài hát", "success");
                        $("#show_link_slug_music").html(data);
                    }

                });
            }

            $(document).ready(function () {

                $('#file_upload_avatar_music').ajaxfileupload({
                    action: '<?php echo $url_home;?>/upload.php',
                    params: {
                        id_music: '<?php echo $id_music;?>',
                        lang: '<?php echo $lang_sel;?>'
                    },
                    onComplete: function (response) {
                        $("#avatar_music_sever").attr("src", response);
                        swal("Âm nhạc", "Đã lưu ảnh đại diện âm nhạc vào máy chủ!", "success");
                    },
                    onStart: function () {
                        swal("Âm nhạc", "Đang tải lên máy chủ... Vui lòng chờ đợi");
                    }
                });
            });


        </script>

        <table style="width: 90%;border: solid 2px #CDCDCD;margin: 10px;box-shadow: 5px 5px 5px #949494;">
            <tr>
                <th><i class="fa fa-music" aria-hidden="true"></i> Âm nhạc</th>
                <th>Các siêu dữ liệu liên quan đến bài hát</th>
            </tr>
            <tr>
                <td><i class="fa fa-book" aria-hidden="true"></i> Lời bài hát</td>
                <td>
                    <a href="#" class="buttonPro small blue" onclick="add_music_lyrics();return false;"><i
                                class="fa fa-plus-circle" aria-hidden="true"></i> cập nhật lời bài hát</a>
                    <a href="#" class="buttonPro small purple" onclick="search_music_lyrics();return false;"><i
                                class="fa fa-search" aria-hidden="true"></i> Tìm lời bài hát (search.azlyrics.com)</a>
                    <a href="#" class="buttonPro small purple" onclick="search_gg();return false;"><i
                                class="fa fa-search" aria-hidden="true"></i> Tìm lời trên google</a>
                    <?php
                    $txt_lyrics = '';
                    $data_lyrics='';
                    $show_lyrics = mysql_query("SELECT * FROM `app_my_girl_" . $lang_sel . "_lyrics` WHERE  `id_music` = '$id_music' LIMIT 1");
                    if (mysql_num_rows($show_lyrics) > 0) {
                        $data_lyrics = mysql_fetch_array($show_lyrics);
                        $txt_lyrics = $data_lyrics[1];
                    }
                    mysql_free_result($show_lyrics);
                    ?><textarea id="music_lyrics_contain" name="lyrics"
                                style="height: 240px;"><?php echo $txt_lyrics; ?></textarea>
                </td>
            </tr>

            <tr>
                <td><label><i class="fa fa-youtube-play" aria-hidden="true"></i> Liên kết Video Youtube</label>:</td>
                <td>
                    <table>
                        <tr>
                            <td>
                                <strong>Ảnh đại diện âm nhạc từ Youtube</strong><br/>
                                <?php
                                $txt_link_video = '';
                                $txt_link_thumb = '';
                                $check_video = mysql_query("SELECT * FROM `app_my_girl_video_$lang_sel` WHERE  `id_chat` = '$id_music' LIMIT 1");
                                if (mysql_num_rows($check_video) > 0) {
                                    $data_video = mysql_fetch_array($check_video);
                                    $txt_link_video = $data_video['link'];
                                    parse_str(parse_url($txt_link_video, PHP_URL_QUERY), $my_array_of_vars);
                                    $txt_link_thumb = $my_array_of_vars['v'];
                                }
                                mysql_free_result($check_video);
                                ?>
                                <a href="#" class="buttonPro small blue"
                                   onclick="add_video_music('<?php echo $id_music; ?>');return false;"><i
                                            class="fa fa-plus-circle" aria-hidden="true"></i> cập nhật liên kết
                                    video</a>
                                <a href="#" class="buttonPro small purple" onclick="search_ytb();return false;"><i
                                            class="fa fa-search" aria-hidden="true"></i> Tìm video trên youtube</a><br/>
                                <strong style="font-size: 13px;color: #1C8DFF;width: 100%;float: left;"
                                        id="link_ytb_inp"><?php echo $txt_link_video; ?></strong>
                                <input type="hidden" id="id_ytb_inp" value="<?php echo $txt_link_thumb; ?>"/>

                                <div style="float: left;margin: 10px;">
                                    <?php if ($txt_link_thumb != '') { ?>
                                        <a href="<?php echo $txt_link_video; ?>" target="_blank"><img
                                                    id="ytb_avatar_music"
                                                    src="http://img.youtube.com/vi/<?php echo $txt_link_thumb; ?>/sddefault.jpg"
                                                    style="width: 150px;float: left;"/></a>
                                    <?php } else { ?>
                                        <img id="ytb_avatar_music" src="<?php echo $url; ?>/images/music_default.png"
                                             style="width: 150px;float: left;"/>
                                    <?php } ?>
                                </div>
                                <span style="float: left;" class="buttonPro light_blue"
                                      onclick="save_avatar_music_to_sever();return false;"><i class="fa fa-floppy-o"
                                                                                              aria-hidden="true"></i> Lưu ảnh đại diện vào máy chủ</span>

                            </td>
                            <td>
                                <strong>Ảnh đại diện âm nhạc từ máy chủ</strong><br/>
                                <i>Khi có ảnh đại diện từ máy chủ bài hát sẽ được lấy ảnh đại diện này làm chủ đề hiển
                                    thị chính</i><br/>
                                <?php
                                $img_url_avatar = 'app_mygirl/app_my_girl_' . $lang_sel . '_img/' . $id_music . '.png';
                                $img_url_avatar_sever = $url_home . '/images/music_default.png';
                                if (file_exists($img_url_avatar)) {
                                    $img_url_avatar_sever = $url_home . '/' . $img_url_avatar;
                                }
                                ?>
                                <a target="_blank"
                                   href="http://carrotstore.com/music/<?php echo $id_music; ?>/<?php echo $lang_sel; ?>"><img
                                            style="width: 150px;" id="avatar_music_sever"
                                            src="<?php echo $img_url_avatar_sever; ?>"/></a>
                            </td>
                            <td>
                                <strong>Tải lên ảnh đại điện</strong><br/>
                                <i>Ảnh đại diện phải có kích thước 640x480</i><br/>
                                <br/><br/>
                                <input type="file" id="file_upload_avatar_music" name="file_upload_avatar_music"/><br/>
                                <i>Sau khi tải ảnh lên mà vẫn không hiển thị thì bấm nút <b>Crtl + F5</b></i>
                            </td>
                        </tr>
                    </table>
                </td>

            <tr>
                <td><i class="fa fa-search-plus" aria-hidden="true"></i> Tùy chỉnh liên kết (Seo)</td>
                <td id="show_link_slug_music">
                    <?php if ($arr['slug'] != '') { ?>
                        <a href="<?php echo $url; ?>/song/<?php echo $arr['author']; ?>/<?php echo $arr['slug']; ?>"
                           target="_blank"><?php echo $url; ?>/song/<?php echo $arr['author']; ?>/<b
                                    style="color: #ff5e00;"><?php echo $arr['slug']; ?></b></a>
                    <?php } else { ?>
                        <a href="#" class="buttonPro small blue" onclick="create_url_slug_music();return false;"><i
                                    class="fa fa-plus-circle" aria-hidden="true"></i> Tạo đường dẫn</a>
                    <?php } ?>
                </td>
            </tr>

            <?php
            if($data_lyrics!='') {
                ?>
                <tr>
                    <td>
                        <i class="fa fa-info" aria-hidden="true"></i> Các thuột tính âm nhạc khác
                    </td>
                    <td>
                        <?php
                        unset($data_lyrics['id_music']);
                        unset($data_lyrics[0]);
                        unset($data_lyrics[1]);
                        unset($data_lyrics['lyrics']);
                        unset($data_lyrics[2]);
                        unset($data_lyrics[3]);
                        unset($data_lyrics[4]);
                        unset($data_lyrics[5]);
                        foreach ($data_lyrics as $key_info => $key_val) {
                            echo '<li><b>' . $key_info . '</b> : ' . $key_val . '</li>';
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>

            </tr>
            <?php
            $check_music_data = mysql_query("SELECT * FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' LIMIT 1");
            if ($check_music_data){
            if (mysql_num_rows($check_music_data)) {
                ?>
                <tr>
                    <td><i class="fa fa-list-alt" aria-hidden="true"></i> Bản xếp hạng</td>
                    <td>
                        <?php
                        if (mysql_num_rows($check_music_data)) {
                            $count_status_0 = mysql_query("SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' AND `value`='0' LIMIT 1");
                            $count_status_1 = mysql_query("SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' AND `value`='1' LIMIT 1");
                            $count_status_2 = mysql_query("SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' AND `value`='2' LIMIT 1");
                            $count_status_3 = mysql_query("SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' AND `value`='3' LIMIT 1");
                            $data_0 = mysql_fetch_array($count_status_0);
                            $data_1 = mysql_fetch_array($count_status_1);
                            $data_2 = mysql_fetch_array($count_status_2);
                            $data_3 = mysql_fetch_array($count_status_3);
                            ?>
                            <span class="box_feel_music">
                <i style="font-size: 30px;" class="fa fa-smile-o" aria-hidden="true"></i>
                <span><?php echo $data_0[0]; ?></span>
            </span>

                            <span class="box_feel_music">
                <i style="font-size: 30px;" class="fa fa-frown-o" aria-hidden="true"></i>
                <span><?php echo $data_1[0]; ?></span>
            </span>

                            <span class="box_feel_music">
                <i style="font-size: 30px;" class="fa fa-meh-o" aria-hidden="true"></i>
                <span><?php echo $data_2[0]; ?></span>
            </span>

                            <span class="box_feel_music">
                <i style="font-size: 30px;" class="fa fa-smile-o" aria-hidden="true"></i>
                <span><?php echo $data_3[0]; ?></span>
            </span>
                            <?php
                        } else {
                            echo '<b>Không có dữ liệu</b>';
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
    }

    ?>
</form>

<script>
    $(document).ready(function () {
        $("#box_select_content").sortable();
        $("#box_select_content").disableSelection();
        $('#limit_date').datepicker({
            dateFormat: 'dd',
            changeMonth: true,
            numberOfMonths: 1,
            onSelect: function (selectedDate) {
                alert(selectedDate);
                $("#limit_month").datepicker("option", "dateFormat", "mm");
            }
        });
    });
</script>

<?php
if ($type_chat == "chat") {
    $id = $arr['id'];
    $result_chat_redirect = mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `id_redirect` = '$id'");
    if (mysql_num_rows($result_chat_redirect) > 0) {
        echo '<div class="box_info">';
        echo '<h2>Những Trò chuyện được ghi lại bởi câu trò chuyện nầy:</h2>';
        echo '<table>';
        while ($row_redirect = mysql_fetch_array($result_chat_redirect)) {
            echo show_row_chat_prefab($row_redirect, $lang_sel, '');
        }
        echo '</table>';
        echo '</div>';
    }
    mysql_free_result($result_chat_redirect);


    $id_pater = $arr['pater'];
    if ($id_pater != '') {
        $type_pater = $arr['pater_type'];
        if ($type_pater == "msg") {
            $result_chat_pater = mysql_query("SELECT * FROM `app_my_girl_msg_$lang_sel` WHERE `id` = '$id_pater'");
        } else {
            $result_chat_pater = mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id_pater'");
        }

        $row_pater = mysql_fetch_array($result_chat_pater);
        echo '<div class="box_info">';
        echo '<h2>Câu trò chuyện cha của trò chuyện này:</h2>';
        echo '<table>';
        echo show_row_chat_prefab($row_pater, $lang_sel, '');
        $get_child_chat = mysql_query("SELECT * FROM  `app_my_girl_$lang_sel`  WHERE `pater` = '$id_pater' AND `pater_type`='$type_pater'");
        if (mysql_num_rows($get_child_chat) > 0) {
            ?>
            <tr>
                <td><strong>Câu thoại con</strong></td>
                <td><i class="fa fa-circle-o" aria-hidden="true"></i></td>
                <td><i>Danh sách các câu thoại con</i></td>
                <td>
                    <table>
                        <?php
                        $get_child_chat = mysql_query("SELECT * FROM  `app_my_girl_$lang_sel`  WHERE `pater` = '$id_pater' AND `pater_type`='$type_pater'");
                        while ($row_child = mysql_fetch_array($get_child_chat)) {
                            $btn_remove = '<a href="#" class="buttonPro small red" onclick="remove_father_chat(\'' . $row_child['id'] . '\');return false;"><i class="fa fa-eraser" aria-hidden="true"></i> Gỡ bỏ khỏi cha</a><input type="hidden" value="' . $row_child['id'] . '" name="chat_child[]" />';
                            if ($row_child['id'] == $id) {
                                $btn_remove .= ' <i class="fa fa-pencil" aria-hidden="true"></i> Đang sửa';
                            }
                            echo show_row_chat_prefab($row_child, $lang_sel, $btn_remove);
                        }
                        mysql_fetch_array($get_child_chat);
                        ?>
                    </table>
                </td>
            </tr>
        <?php }
        echo '</table>';
        echo '</div>';
        mysql_free_result($result_chat_pater);
    }
}
?>

<script>
    var emp_inst = '';

    function add_key_func(key) {
        var txt = $('#chat').val();
        $('#chat').val(txt + " " + key);
        return false;
    }

    function add_key_question(emp_set, emp_get) {
        var txt_set = $(emp_set).html();
        $(emp_get).val(txt_set);
        alert("Đã thêm:" + txt_set);
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

    function show_effect_chat(str_tag) {
        $.ajax({
            url: "app_my_girl_jquery.php",
            type: "get", //kiểu dũ liệu truyền đi
            data: "function=show_effect_chat&tag=" + str_tag,
            success: function (data, textStatus, jqXHR) {
                swal({
                    title: "Effect Chat",
                    html: true,
                    text: data
                });
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

    function sel_effect_random(tag) {
        $.ajax({
            url: "app_my_girl_jquery.php",
            type: "get", //kiểu dũ liệu truyền đi
            data: "function=select_random_effect&tag=" + tag, //tham số truyền vào
            success: function (data, textStatus, jqXHR) {
                var data = $.parseJSON(data);

                $("#id_img_effect").attr('src', '<?php echo $url;?>/app_mygirl/obj_effect/' + data["id"] + '.png');
                $("#effect_chat").val(data["id"]);
                if (data["color"] != "") {
                    document.getElementById('chat_color').jscolor.fromString(data["color"]);
                } else {
                    document.getElementById('chat_color').jscolor.fromString('FFFFFF');
                }
                $('#edit_effect').attr('href', '<?php echo $url;?>/app_my_girl_effect.php?edit=' + data["id"] + '').show();
            }

        });
    }

    function add_new_chat() {
        var sex = $('#sex1').val();
        var char_sex = $('#character_sex').val();
        window.open("<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $lang_sel ?>&sex=" + sex + "&character_sex=" + char_sex + "&type_question=<?php echo $type_chat;?>&id_question=<?php echo $id;?>");
    }

    function add_id_chat(ids) {
        $('#' + emp_inst).val(ids);
        swal.close();
    }

    function add_id_chat_same(ids, id_emp_add) {
        var lang = "<?php echo $lang_sel;?>";
        $.ajax({
            url: "app_my_girl_jquery.php",
            type: "get", //kiểu dũ liệu truyền đi
            data: "function=add_chat_same&id=" + ids + "&lang=" + lang + "&emp=" + id_emp_add, //tham số truyền vào
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
        alert("remove" + id);
        $("#id_redirect").val('');
        $(".chat_row_" + id).remove();
        $(".chat_1").fadeIn(100);
    }

    function remove_father_chat(emp) {
        var id_chat = emp;
        var lang_chat = "<?php echo $lang_sel;?>";
        if (confirm("Có chắc là sẽ gỡ câu thoại cha của câu trò chuyện này không?")) {

            $.ajax({
                url: "app_my_girl_jquery.php",
                type: "get", //kiểu dũ liệu truyền đi
                data: "function=remove_chat_father&id=" + id_chat + "&lang=" + lang_chat, //tham số truyền vào
                success: function (data, textStatus, jqXHR) {
                    alert(data);
                    $(".chat_row_" + emp).remove();
                }
            });

        }
        return false;
    }

    function remove_all_chat_child() {
        $('#table_data_return').html('');
        alert('Delete all success!!!');
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
            $txt .= '<img src="' . $url . '/app_mygirl/img/action/' . $i . '.png" onclick="change_action(' . $i . ')" style="width:80px;"/>';
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

    function check_effect(emp) {
        var idSel = $(emp).val();
        if (idSel == '29') {
            $('#file_img').css('display', 'block');
        } else {
            $('#file_img').css('display', 'none');
        }
        check_sex();
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

    $().ready(function () {
        check_effect($('#effect'));
        check_sex();
    });

</script>
<?php
include "app_my_girl_script.php";
?>