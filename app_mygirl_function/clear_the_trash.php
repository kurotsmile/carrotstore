<?php
$lang_audio_sel = '';
?>
<div class="contain" style="padding: 20px;">

    <div style="width: 100%;float: left;">
        <form id="form_loc" method="get" action="<?php echo $url; ?>/app_my_girl_handling.php">

            <div style="display: inline-block;float: left;margin: 2px;">
                <strong>Dọn rác hệ thống &and; Âm thanh trò chuyện rác</strong><br/>
                <i class="fa fa-bath" aria-hidden="true" style="font-size: 34px;"></i>
            </div>

            <div style="display: inline-block;float: left;margin: 2px;">
                <label>Ngôn ngữ:</label>
                <select name="lang">
                    <?php
                    $query_list_lang = mysql_query("SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
                    while ($row_lang = mysql_fetch_array($query_list_lang)) {
                        ?>
                        <option value="<?php echo $row_lang['key']; ?>" <?php if ($langsel == $row_lang['key']) { ?> selected="true"<?php } ?>><?php echo $row_lang['name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div style="display: inline-block;float: left;margin: 2px;">
                <label>Xóa rác Msg</label>
                <input type="checkbox" name="msg"/>
            </div>

            <div style="display: inline-block;float: left;margin: 2px;">
                <input type="submit" name="delete" value="xóa" class="link_button"/>
                <input type="hidden" name="func" value="clear_the_trash"/>
            </div>

        </form>
    </div>
</div>

<div style="float: left;width: 100%;">
    <?php
    if (isset($_GET['lang'])) {
        $lang_audio_sel = $_GET['lang'];
    }

    if ($lang_audio_sel == '') {
        //Xoa ca tep tin rac
        echo '<ul>';
        echo '<li><strong>Xóa các tệp tin rác đã tải lên</strong></li>';
        $dirname = 'data_temp';
        $dir = opendir($dirname);
        while (false != ($file = readdir($dir))) {
            if (($file != ".") and ($file != "..") and ($file != "index.php")) {
                echo '<li>' . $file . '</li>';
                unlink($dirname . '/' . $file);
            }
        }
        echo '</ul>';

        $list_country = mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1' AND `active` = '1' ORDER BY `id`");
        while ($l = mysql_fetch_array($list_country)) {
            $langsel = $l['key'];
            $dirname = 'app_mygirl/app_my_girl_temp_' . $langsel;
            $dir = opendir($dirname);
            echo '<ul>';
            echo '<li><strong><img src="' . thumb('/app_mygirl/img/' . $langsel . '.png', '14') . '"/> Dã xóa các tệp tin rác nước (' . $l['name'] . ')</strong></li>';
            while (false != ($file = readdir($dir))) {
                if (($file != ".") and ($file != "..") and ($file != "index.php")) {
                    echo '<li>' . $file . '</li>';
                    unlink($dirname . '/' . $file);
                }
            }
            echo '</ul>';
        }

        $dir_qr_account = 'phpqrcode/img_account';
        $dir_qr_product = 'phpqrcode/img_product';
        $dir_qr_login = 'phpqrcode/img_login';
        $dir_qr_music = 'phpqrcode/img';
        $dir_qr_link = 'phpqrcode/img_link';


        echo '<ul>';
        echo '<li><strong>Xóa các tệp tin qr tài khoản người dùng</strong></li>';
        $files = glob($dir_qr_account . '/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file)) {
                echo '<li>'.$file . '</li>';
                unlink($file); // delete file
            }
        }
        echo '<li><strong>Xóa các tệp tin qr sản phẩm</strong></li>';
        $files = glob($dir_qr_product . '/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file)) {
                echo $file . '<br/>';
                unlink($file); // delete file
            }
        }
        echo '<li><strong>Xóa các tệp tin qr đăng nhập</strong></li>';
        $files = glob($dir_qr_login . '/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file)) {
                echo '<li>'.$file . '</li>';
                unlink($file); // delete file
            }
        }
        echo '<li><strong>Xóa các tệp tin qr âm nhạc</strong></li>';
        $files = glob($dir_qr_music . '/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file)) {
                echo '<li>'.$file . '</li>';
                unlink($file); // delete file
            }
        }
        echo '<li><strong>Xóa các tệp tin qr liên kết rút gọn</strong></li>';
        $files = glob($dir_qr_link . '/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file)) {
                echo '<li>'.$file . '</li>';
                unlink($file); // delete file
            }
        }
        echo '</ul>';

    } else {
        $msg = '';
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
        }
        if ($msg != '') {
            $query_list_msg = mysql_query("SELECT * FROM `app_my_girl_msg_$lang_audio_sel` ");
            echo '<ul>';
            $path_audio = 'app_mygirl/app_my_girl_msg_' . $lang_audio_sel;
            while ($row_msg = mysql_fetch_array($query_list_msg)) {
                $voice_lang = get_key_lang('voice_character_sex_' . $row_msg['character_sex'], $lang_audio_sel);
                $url_file_audio_chat = $path_audio . '/' . $row_msg['id'] . '.mp3';
                echo '<li>';
                echo '<b>' . $row_msg['id'] . '</b> ' . $row_msg['chat'] . '<br/>';
                if ($voice_lang == 'google') {
                    echo '<b style="color:red">Xóa tệp âm thanh:</b> ' . $url_file_audio_chat . '';
                    if (isset_file($url_file_audio_chat)) {
                        unlink($url_file_audio_chat);
                    }
                } else {
                    echo '<b style="color:green">Giữ lại tệp âm thanh:</b> <a href="' . $url . '/' . $url_file_audio_chat . '" >' . $url_file_audio_chat . '</a>';
                }
                echo '</li>';
            }
            echo '</ul>';
        } else {
            $query_list_chat = mysql_query("SELECT * FROM `app_my_girl_$lang_audio_sel` WHERE `effect` != '2' AND `effect` != '49' ");
            echo '<ul>';
            $path_audio = 'app_mygirl/app_my_girl_' . $lang_audio_sel;
            while ($row_chat = mysql_fetch_array($query_list_chat)) {
                $voice_lang = get_key_lang('voice_character_sex_' . $row_chat['character_sex'], $lang_audio_sel);
                $url_file_audio_chat = $path_audio . '/' . $row_chat['id'] . '.mp3';
                echo '<li>';
                echo '<b>' . $row_chat['id'] . '</b> ' . $row_chat['chat'] . '<br/>';
                if ($voice_lang == 'google') {
                    echo '<b style="color:red">Xóa tệp âm thanh:</b> ' . $url_file_audio_chat . '';
                    if (isset_file($url_file_audio_chat)) {
                        unlink($url_file_audio_chat);
                    }
                } else {
                    echo '<b style="color:green">Giữ lại tệp âm thanh:</b> <a href="' . $url . '/' . $url_file_audio_chat . '" >' . $url_file_audio_chat . '</a>';
                }
                echo '</li>';
            }
            echo '</ul>';
        }
    }
    ?>
</div>