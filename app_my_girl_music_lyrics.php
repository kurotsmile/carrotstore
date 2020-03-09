<?php
include "app_my_girl_template.php";
$langsel = 'vi';
$txt_search = '';
$txt_msg_error = '';
$limit = '100';

if (isset($_GET['lang'])) {
    $langsel = $_GET['lang'];
}


if (isset($_GET['delete'])) {
    $id_delete = $_GET['delete'];
    $msql_delete_one = mysql_query("DELETE FROM `app_my_girl_" . $langsel . "_lyrics` WHERE `id_music` = '$id_delete' ");
    $txt_msg_error = 'Xóa thành công lời bái hát của bài nhạc có id:' . $id_delete;
}


if (isset($_POST['loc'])) {
    $langsel = $_POST['lang'];
    $txt_search = addslashes($_POST['txt_seacrh']);
}

$query_count_all = mysql_query("SELECT COUNT(`id_music`) FROM `app_my_girl_" . $langsel . "_lyrics`  ORDER BY `id_music` DESC");
$data_all_lyrics = mysql_fetch_array($query_count_all);
$total_records = $data_all_lyrics[0];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$total_page = ceil($total_records / $limit);
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}
$start = ($current_page - 1) * $limit;

if ($txt_search == '') {
    $result_lyrics = mysql_query("SELECT SUBSTRING(`lyrics`, 1, 90) as l , `id_music`,`artist`,`album`,`year`,`genre` FROM `app_my_girl_" . $langsel . "_lyrics`  ORDER BY `id_music` DESC LIMIT $start, $limit ");
} else {
    $result_lyrics = mysql_query("SELECT SUBSTRING(`lyrics`, 1, 90) as l , `id_music`,`artist`,`album`,`year`,`genre`  FROM `app_my_girl_" . $langsel . "_lyrics` WHERE `lyrics` LIKE '%" . $txt_search . "%' LIMIT $start, $limit ");
}
?>
<form method="post" id="form_loc" style="width: 500px;">

    <div style="display: inline-block;float: left;margin: 2px;width: 90px;">
        <label>Ngôn ngữ:</label>
        <select name="lang">
            <option value="" selected="true" <?php if ($langsel == "") { ?> selected="true"<?php } ?>>Tất cả</option>
            <?php
            $query_list_lang = mysql_query("SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
            while ($row_lang = mysql_fetch_array($query_list_lang)) {
                ?>
                <option value="<?php echo $row_lang['key']; ?>" <?php if ($langsel == $row_lang['key']) { ?> selected="true"<?php } ?>><?php echo $row_lang['name']; ?></option>
            <?php } ?>
        </select>
    </div>

    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Lời bài hát</label>
        <input type="text" name="txt_seacrh" value="<?php echo $txt_search; ?>"/>
    </div>

    <div style="display: inline-block;float: left;margin: 2px;">
        <input type="submit" name="loc" value="Lọc" class="link_button"/>
    </div>


</form>

<div id="form_loc" style="font-size: 11px;">
    <div style="display: inline-block;float: left;margin: 2px;">
        <i class="fa fa-audio-description" aria-hidden="true"></i> Hiển thị <?php echo mysql_num_rows($result_lyrics); ?>
        /<?php echo $total_records; ?> lời bài hát
    </div>
</div>
<?php
if ($txt_search == '') {
    ?>
    <div id="form_loc" style="width: 95%;float: left;">
        <strong>Trang hiển thị:</strong>
        <?php
        for ($i = 1; $i <= $total_page; $i++) {
            $colo_btn = 'blue';
            if ($i == $current_page) {
                $colo_btn = 'black';
            }
            echo '<a href="' . $url . '/app_my_girl_music_lyrics.php?lang=' . $langsel . '&page=' . $i . '" class="buttonPro ' . $colo_btn . ' small">' . $i . '</a>';
        }
        ?>
    </div>
    <?php
}
?>

<?php
if ($txt_msg_error != '') {
    echo show_alert($txt_msg_error, 'alert');
}
echo '<table  style="border:solid 1px green">';
echo '<tr style="border:solid 1px green"><th>id</th><th>Tên bài hát</th><th>Vắn tắt lời bài hát</th><th>Nghệ sĩ</th><th>Album</th><th>Thể loại</th><th>Năm xuất bản</th><th>Hành động</th></tr>';
while ($row = mysql_fetch_array($result_lyrics)) {
    $is_ready = false;
    $sql_name_song = mysql_query("SELECT `chat` FROM `app_my_girl_" . $langsel . "` WHERE `id` = '" . $row['id_music'] . "' LIMIT 1");
    if (mysql_num_rows($sql_name_song) > 0) {
        $arr_song = mysql_fetch_array($sql_name_song);
        $is_ready = true;
    } else {
        $is_ready = false;
    }

    ?>
    <tr <?php if ($is_ready == false) {echo "style='background-color:pink;'";} ?>>
        <td><a target="_blank"
               href="<?php echo $url; ?>/app_my_girl_update.php?id=<?php echo $row['id_music']; ?>&lang=<?php echo $langsel; ?>"><i class="fa fa-audio-description" aria-hidden="true"></i> <?php echo $row['id_music']; ?></a>
        </td>
        <td>
            <a target="_blank"
               href="<?php echo $url; ?>/app_my_girl_update.php?id=<?php echo $row['id_music']; ?>&lang=<?php echo $langsel; ?>">
                <?php
                if($is_ready==true) {echo $arr_song['chat'];}
                ?>
            </a>
        </td>
        <td><?php echo $row['l']?></td>
        <td><?php echo $row['artist']; ?></td>
        <td><?php echo $row['album']; ?></td>
        <td><?php echo $row['genre']; ?></td>
        <td><?php echo $row['year']; ?></td>
        <td>
            <a href="<?php echo $url; ?>/app_my_girl_music_lyrics.php?delete=<?php echo $row[0]; ?>&lang=<?php echo $langsel; ?>&page=<?php echo $current_page; ?>"
               class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
        </td>
    </tr>
    <?php
    mysql_free_result($sql_name_song);
}
echo '</table>';
mysql_free_result($result_lyrics);
?>

