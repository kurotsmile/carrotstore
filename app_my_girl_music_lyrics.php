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
    $msql_delete_one = mysqli_query($link,"DELETE FROM `app_my_girl_" . $langsel . "_lyrics` WHERE `id_music` = '$id_delete' ");
    $txt_msg_error = 'Xóa thành công lời bái hát của bài nhạc có id:' . $id_delete;
}


if (isset($_POST['loc'])) {
    $langsel = $_POST['lang'];
    $txt_search = addslashes($_POST['txt_seacrh']);
}

$query_count_all = mysqli_query($link,"SELECT COUNT(`id_music`) FROM `app_my_girl_" . $langsel . "_lyrics`  ORDER BY `id_music` DESC");
$data_all_lyrics = mysqli_fetch_array($query_count_all);
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
    $result_lyrics = mysqli_query($link,"SELECT SUBSTRING(`lyrics`, 1, 90) as l , `id_music`,`artist`,`album`,`year`,`genre` FROM `app_my_girl_" . $langsel . "_lyrics`  ORDER BY `id_music` DESC LIMIT $start, $limit ");
} else {
    $result_lyrics = mysqli_query($link,"SELECT SUBSTRING(`lyrics`, 1, 90) as l , `id_music`,`artist`,`album`,`year`,`genre`  FROM `app_my_girl_" . $langsel . "_lyrics` WHERE `lyrics` LIKE '%" . $txt_search . "%' LIMIT $start, $limit ");
}
?>
<form method="post" id="form_loc" style="width: 500px;">

    <div style="display: inline-block;float: left;margin: 2px;width: 90px;">
        <label>Ngôn ngữ:</label>
        <select name="lang">
            <option value="" selected="true" <?php if ($langsel == "") { ?> selected="true"<?php } ?>>Tất cả</option>
            <?php
            $query_list_lang = mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
            while ($row_lang = mysqli_fetch_array($query_list_lang)) {
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
        <i class="fa fa-audio-description" aria-hidden="true"></i> Hiển thị <?php echo mysqli_num_rows($result_lyrics); ?>
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
while ($row = mysqli_fetch_assoc($result_lyrics)) {
    $is_ready = false;
    $sql_name_song = mysqli_query($link,"SELECT `chat` FROM `app_my_girl_" . $langsel . "` WHERE `id` = '" . $row['id_music'] . "' LIMIT 1");
    if (mysqli_num_rows($sql_name_song) > 0) {
        $arr_song = mysqli_fetch_array($sql_name_song);
        $row['name']=$arr_song['chat'];
        $is_ready = true;
    } else {
        $is_ready = false;
    }
    ?>
    <tr <?php if ($is_ready == false) {echo "style='background-color:pink;'";} ?> class="item_info_music_<?php echo $row['id_music']; ?>" data_info='<?php echo json_encode($row);?>'>
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
        <td class="item_info_music_<?php echo $row['id_music']; ?>_artist"><?php echo '<a target="_blank"  href="'.$url.'/artist/'.$langsel.'/'.$row['artist'].'">'.$row['artist'].'</a>'; ?></td>
        <td class="item_info_music_<?php echo $row['id_music']; ?>_album"><?php echo $row['album']; ?></td>
        <td class="item_info_music_<?php echo $row['id_music']; ?>_genre"><?php echo $row['genre']; ?></td>
        <td class="item_info_music_<?php echo $row['id_music']; ?>_year"><?php echo $row['year']; ?></td>
        <td>
            <span class="buttonPro small yellow" onclick="update_info_music('<?php echo $row['id_music'];?>');"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
            <a href="<?php echo $url; ?>/app_my_girl_music_lyrics.php?delete=<?php echo $row['id_music']; ?>&lang=<?php echo $langsel; ?>&page=<?php echo $current_page; ?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
        </td>
    </tr>
    <?php
    mysqli_free_result($sql_name_song);
}
echo '</table>';
mysqli_free_result($result_lyrics);
?>
<script>
    function update_info_music(id_music){
        var data_info=$(".item_info_music_"+id_music).attr('data_info');
        var obj_info=JSON.parse(data_info);
        var lang_info='<?php echo $langsel;?>';

        var html_edit_info='<form id="frm_update_info_music">';
        html_edit_info=html_edit_info+"<label style='float: left'>Artist</label>";
        html_edit_info=html_edit_info+"<input name='artist' style='display: block' value='"+obj_info.artist+"'/>";
        html_edit_info=html_edit_info+"<label style='float: left'>Album</label>";
        html_edit_info=html_edit_info+"<input name='album' style='display: block' value='"+obj_info.album+"'/>";
        html_edit_info=html_edit_info+"<label style='float: left'>Year</label>";
        html_edit_info=html_edit_info+"<input name='year' style='display: block' value='"+obj_info.year+"'/>";
        html_edit_info=html_edit_info+"<label style='float: left'>Genre</label>";
        html_edit_info=html_edit_info+"<input name='genre' style='display: block' value='"+obj_info.genre+"'/>";
        html_edit_info=html_edit_info+"<input name='type' type='hidden'  value='1'/>";
        html_edit_info=html_edit_info+"<input name='lang' type='hidden'  value='<?php echo $langsel;?>'/>";
        html_edit_info=html_edit_info+"<input name='id_music' type='hidden'  value='"+id_music+"'/>";
        html_edit_info=html_edit_info+"<input name='function' type='hidden'  value='update_info_music'/>";
        html_edit_info=html_edit_info+"<a class='buttonPro small' target='_blank' href='https://www.google.com/search?q="+obj_info.name+"'><i class='fa fa-search' aria-hidden='true'></i></a>";
        html_edit_info=html_edit_info+"</form>";
        swal({
                html: true, title: 'Chỉnh sửa thông tin bài hát',
                text: html_edit_info,
                showCancelButton: true,
                confirmButtonText: "Hoàn tất",
                cancelButtonText: "Hủy bỏ",
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo $url;?>/app_my_girl_jquery.php",
                        type: "post",
                        data: $("#frm_update_info_music").serializeArray(),
                        success: function (data, textStatus, jqXHR) {
                            var obj_data=JSON.parse(data);
                            $(".item_info_music_"+id_music).attr('data_info',data);
                            $(".item_info_music_"+id_music+"_artist").html(obj_data.artist);
                            $(".item_info_music_"+id_music+"_album").html(obj_data.album);
                            $(".item_info_music_"+id_music+"_year").html(obj_data.year);
                            $(".item_info_music_"+id_music+"_genre").html(obj_data.genre);
                            swal({
                                html: true, title: 'Báo cáo công việc',
                                text: '<a href="http://work.carrotstore.com/?id_object='+id_music+'&lang='+lang_info+'&type_chat=info_music&type_action=add" target="_blank" class="buttonPro light_blue"><i class="fa fa-desktop" aria-hidden="true"></i> Thêm vào bàn làm việc (Editor)</a>',
                                icon: "success"
                            });
                        }
                    });
                }
            });
    }
</script>
