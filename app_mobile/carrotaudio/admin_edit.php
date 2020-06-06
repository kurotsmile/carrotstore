<?php
require_once("getid3/getid3.php");
require_once('getid3/write.php');
$id_file = $_GET['id'];

$song_title = '';
$song_artist = '';
$song_album = 'carrotstore.com';
$song_year = date("Y");
$song_genre = '';
$song_comment = 'Songs downloaded from Carrotstore.com';
$song_lyrics = '';
$song_lang = 'vi';
$song_id = '';
$fd = fopen('logo.png', 'rb');
$song_data_pic = fread($fd, filesize('logo.png'));
fclose($fd);

if (isset($_POST['name_file'])) {
    $song_id = $_POST['song_id'];
    $path_file = $_POST['path_file'];
    $id_file = $_POST['id_file'];
    $name_file = $_POST['name_file'];
    $name_file = addslashes($name_file);

    $song_title = trim($_POST['song_title']);
    $song_artist = trim($_POST['song_artist']);
    $song_album = trim($_POST['song_album']);
    $song_year = trim($_POST['song_year']);
    $song_genre = trim($_POST['song_genre']);
    $song_genre=str_replace("&"," and ",$song_genre);
    $song_comment = trim($_POST['song_comment']);
    $song_lang = $_POST['song_lang'];
    $song_lyrics = addslashes($_POST['song_lyrics']);

    $TextEncoding = 'UTF-8';
// Initialize getID3 engine
    $getID3 = new getID3;
    $getID3->setOption(array('encoding' => $TextEncoding));

// Initialize getID3 tag-writing module
    $tagwriter = new getid3_writetags;
//$tagwriter->filename = '/path/to/file.mp3';
    $tagwriter->filename = $path_file;

//$tagwriter->tagformats = array('id3v1', 'id3v2.3');
    $tagwriter->tagformats = array('id3v2.3');

// set various options (optional)
    $tagwriter->overwrite_tags = true;  // if true will erase existing tag data and write only passed data; if false will merge passed data with existing tag data (experimental)
    $tagwriter->remove_other_tags = false; // if true removes other tag formats (e.g. ID3v1, ID3v2, APE, Lyrics3, etc) that may be present in the file and only write the specified tag format(s). If false leaves any unspecified tag formats as-is.
    $tagwriter->tag_encoding = $TextEncoding;
    $tagwriter->remove_other_tags = true;

// populate data array
    $TagData = array(
        'title' => array($song_title),
        'artist' => array($song_artist),
        'album' => array($song_album),
        'year' => array($song_year),
        'genre' => array($song_genre),
        'comment' => array($song_comment),
        'unsynchronised_lyric' => array($song_lyrics),
    );
    $fd = fopen('temp/avatar_music'.$_SESSION['user_login'].'.png', 'rb');
    $APICdata = fread($fd, filesize('temp/avatar_music'.$_SESSION['user_login'].'.png'));
    fclose($fd);
    $TagData['attached_picture'][0]['data'] = $APICdata;
    $TagData['attached_picture'][0]['picturetypeid'] = 0x03;
    $TagData['attached_picture'][0]['description'] = $song_title;
    $TagData['attached_picture'][0]['mime'] = 'image/jpeg';

    $tagwriter->tag_data = $TagData;

// write tags
    if ($tagwriter->WriteTags()) {
        if (!empty($tagwriter->warnings)) {
            echo 'There were some warnings:<br>' . implode('<br><br>', $tagwriter->warnings);
        }
    } else {
        echo 'Failed to write tags!<br>' . implode('<br><br>', $tagwriter->errors);
    }


    $quey_update = mysqli_query($link, "UPDATE `data_file` SET `name`='$name_file' WHERE `name_file`='$id_file' LIMIT 1");
    if ($song_id != '') {
        echo '<ul style="list-style: none" class="box_info_update">';
        echo '<li><strong><i class="fa fa-star" aria-hidden="true"></i> Các biên tập viên cần bấm vào nút "Cập nhật vào Carrotstore Music" Trước khi thêm tác vụ vào bàn làm việc!</strong></li>';
        echo '<li>ID đối tượng:<span id="data_song_id">' . $song_id . '</span></li>';
        echo '<li>Nước:<span id="data_song_lang">' . $song_lang . '</span></li>';
        echo '<li>Artist:<span id="data_song_artist">' . $song_artist . '</span></li>';
        echo '<li>Album:<span id="data_song_album">' . $song_album . '</span></li>';
        echo '<li>Year:<span id="data_song_year">' . $song_year . '</span></li>';
        echo '<li>Genre:<span id="data_song_genre">' . $song_genre . '</span></li>';
        echo '<li><a class="buttonPro small" target="_blank" href="http://carrotstore.com/music/'.$song_id.'/'.$song_lang.'"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Xem trên Carrotstore Music</a></li>';
        echo '<li><a class="buttonPro small" target="_blank" href="http://carrotstore.com/app_my_girl_update.php?id='.$song_id.'&lang='.$song_lang.'"><i class="fa fa-pencil-square" aria-hidden="true"></i> Xem đối tượng trong cms Virtual lover</a></li>';
        echo '<li><span class="buttonPro blue" onclick="update_carrotstore_music();$(this).hide(500);return false;"><i class="fa fa-music" aria-hidden="true"></i> Cập nhật vào Carrotstore Music</span></li>';
        echo '</ul>';
    }

    echo msg("Cập nhật thành công");
    echo btn_add_work($id_file, $song_lang, 'file', 'edit');

}

$query_file = mysqli_query($link, "select * from `data_file` where `name_file`='$id_file'");
if (mysqli_num_rows($query_file) > 0) {
    $data_file = mysqli_fetch_array($query_file);
    $url_file_full = $url . '/' . $data_file['path'];
    $path_file = $data_file['path'];
    $getID3 = new getID3;
    $ThisFileInfo = $getID3->analyze($data_file['path']);
    $data_music_tag = $ThisFileInfo["id3v2"]["comments"];
    if (isset($data_music_tag["title"][0])) {
        $song_title = $data_music_tag["title"][0];
    }

    if (isset($data_music_tag["artist"][0])) {
        $song_artist = $data_music_tag["artist"][0];
    }

    if (isset($data_music_tag["album"][0])) {
        $song_album = $data_music_tag["album"][0];
    }

    if (isset($data_music_tag["year"][0])) {
        $song_year = $data_music_tag["year"][0];
    }

    if (isset($data_music_tag["genre"][0])) {
        $song_genre = $data_music_tag["genre"][0];
    }

    if (isset($data_music_tag["comment"][0])) {
        $song_comment = $data_music_tag["comment"][0];
    }

    if (isset($data_music_tag["unsynchronised_lyric"][0])) {
        $song_lyrics = $data_music_tag["unsynchronised_lyric"][0];
    }

    if (isset($ThisFileInfo["id3v2"]['APIC'])) {
        $data_music_pic = $ThisFileInfo["id3v2"]['APIC'];
        $song_data_pic = $data_music_pic[0];
        $song_data_pic = $song_data_pic['data'];
    }
}
file_put_contents('temp/avatar_music'.$_SESSION['user_login'].'.png', $song_data_pic);
?>
<div style="float: left;width: 100%">
    <form style="float: left;padding: 20px;font-size: 13px;" method="post" action="">
        <h2>Chỉnh sửa thông tin tệp tin <?php echo $id_file; ?></h2>
        <h3>Thông tin cơ bản</h3>
        <table>
            <tr>
                <td>Tên hiển thị</td>
                <td>
                    <input id="name_file" name="name_file" type="text" value="<?php echo $data_file['name']; ?>">
                    <span class="buttonPro small" onclick="copy_text_to('#name_file','#song_title');"><i
                                class="fa fa-arrow-down" aria-hidden="true"></i></span>
                    <span class="buttonPro small blue" onclick="get_tile_file('<?php echo $url_file_full; ?>');"><i
                                class="fa fa-get-pocket" aria-hidden="true"></i> Lấy thông tin từ Sever chính</span>
                    <span class="buttonPro small light_blue" onclick="enter_val();"><i class="fa fa-level-down "
                                                                                       aria-hidden="true"></i> Nhập thông tin vào Thông số âm nhạc</span>
                    <span class="buttonPro small" onclick="search_google();" title="Tìm kiếm thông tin từ google"><i
                                class="fa fa-search" aria-hidden="true"></i> Tìm kiếm thông tin trên google</span>
                </td>
            </tr>
        </table>

        <h3>Thông tin âm nhạc</h3>
        <i>Đây là thông tin được lưu trữ theo tệp tin khi người dùng tải xuống</i>
        <table>
            <tr>
                <td>title</td>
                <td>
                    <input name="song_title" id="song_title" type="text" value="<?php echo $song_title; ?>">
                    <span class="buttonPro small" onclick="copy_text_to('#song_title','#name_file');"><i
                                class="fa fa-arrow-up" aria-hidden="true"></i></span>
                    <span class="buttonPro small" onclick="switch_title();"><i class="fa fa-retweet"
                                                                               aria-hidden="true"></i></span>
                </td>
            </tr>

            <tr>
                <td>artist (nghệ sĩ thể hiện)</td>
                <td>
                    <input name="song_artist" id="song_artist" type="text" value="<?php echo $song_artist; ?>">
                    <span class="buttonPro small" onclick="add_artist();"><i class="fa fa-arrow-up"
                                                                             aria-hidden="true"></i></span>
                </td>
            </tr>

            <tr>
                <td>album</td>
                <td>
                    <input name="song_album" id="song_album" type="text" value="<?php echo $song_album; ?>">
                    <span class="buttonPro small" onclick="$('#song_album').val('carrotstore.com');"><i
                                class="fa fa-magic" aria-hidden="true"></i> carrotstore.com</span>
                </td>
            </tr>

            <tr>
                <td>year</td>
                <td><input name="song_year" type="text" value="<?php echo $song_year; ?>"></td>
            </tr>

            <tr>
                <td>genre</td>
                <td><input name="song_genre" type="text" value="<?php echo $song_genre; ?>"><br><br>
                    <i style="font-size: 12px;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Trường (Thể loại - genre) này nhập vào phải là dữ liệu ngôn ngữ tiếng anh hoặc trùng với ngôn ngữ lời bài hát (Editor nên đăng xuất tài khoản google ra khỏi trình duyệt để không hiển thị tiếng việt khi tìm kiếm thông tin)</i>
                </td>
            </tr>

            <tr>
                <td>comment</td>
                <td>
                    <input name="song_comment" id="song_comment" type="text" value="<?php echo $song_comment; ?>">
                    <span class="buttonPro small"
                          onclick="$('#song_comment').val('Songs downloaded from Carrotstore.com');"><i
                                class="fa fa-magic" aria-hidden="true"></i> Bản quền của trang chủ</span>
                </td>
            </tr>

            <tr>
                <td>Ảnh đại diện</td>
                <td>
                    <img src="data:image/gif;base64,<?php echo base64_encode($song_data_pic); ?>" id="song_avatar">
                </td>
            </tr>

            <tr>
                <td>Lời bài hát</td>
                <td>
                    <textarea name="song_lyrics" id="song_lyrics"
                              style="width: 300px"><?php echo $song_lyrics; ?></textarea>
                </td>
            </tr>
        </table>
        <input type="hidden" name="id_file" value="<?php echo $id_file; ?>">
        <input type="hidden" name="path_file" value="<?php echo $path_file; ?>">
        <input value="Cập nhật" class="buttonPro yellow" type="submit">
        <input type="hidden" name="song_id" id="song_id" value="<?php echo $song_id; ?>">
        <input type="hidden" name="song_lang" id="song_lang" value="<?php echo $song_lang; ?>">
        <a onclick="check_file('<?php echo $url_file_full; ?>')" class="buttonPro orange"><i class="fa fa-search"
                                                                                             aria-hidden="true"></i>
            Kiểm tra đối tượng sử dụng</a>
        <a href="<?php echo $url; ?>/file/<?php echo $id_file; ?>" class="buttonPro "><i
                    class="fa fa-chevron-circle-left" aria-hidden="true"></i>
            Xem thông tin</a>
    </form>
</div>

<script>
    function copy_text_to(emp_from, emp_to) {
        $(emp_to).val($(emp_from).val());
    }

    function add_artist() {
        var val = $("#name_file").val();
        var val_artist = $("#song_artist").val();
        $('#name_file').val(val + ' - ' + val_artist);

    }

    function switch_title() {
        var song_title = $('#song_title').val();
        var song_artist = $("#song_artist").val();
        var temp_val = song_title;
        $('#song_title').val(song_artist);
        $("#song_artist").val(temp_val);
    }

    function enter_val() {
        var val = $("#name_file").val();
        val = val.replace(".mp3", '');
        $("#name_file").val(val);
        var split_s = val.split("-");
        $('#song_title').val(split_s[0].trim());
        $("#song_artist").val(split_s[1].trim());
    }

    function NewTab(url) {
        window.open(url, "_blank");
    }

    gettitlecallback = function (data) {
        var html_txt = data["data"];
        if (data['error'] == '1') {
            swal({html: true, title: "Kiểm tra", text: html_txt});
        } else {
            html_txt = html_txt.replace(".mp3", "");
            html_txt = html_txt.replace("(Video)", "");
            $("#name_file").val(html_txt.trim());
            if (data['avatar'] != '') {
                save_file_avatar(data['avatar']);
            }
            $("#song_lyrics").val(data['lyrics']);
            $("#song_id").val(data['id_song']);
            $("#song_lang").val(data['song_lang']);
            $("#song_avatar").attr("onclick", "NewTab('"+data['linkytb']+"')");
        }
    };

    function get_tile_file(file_url) {
        $.ajax({
            url: '<?php echo $url_carrot_store;?>/app_my_girl_jquery.php',
            jsonp: "gettitlecallback",
            data: "function=get_chat_by_audio_url&url_file=" + file_url + "&extrac=1",
            dataType: 'jsonp',
        });
    }

    function save_file_avatar(url_img) {
        $.ajax({
            url: '<?php echo $url;?>/ajax.php',
            method: "POST",
            data: "func=save_avatar_music&url=" + url_img+"&id_user=<?php echo $_SESSION['user_login'];?>",
            success: function (data) {
                $("#song_avatar").attr("src", "<?php echo $url;?>/temp/avatar_music<?php echo $_SESSION['user_login'];?>.png");
            }
        });
    }

    function search_google() {
        var name_song = $("#name_file").val();
        name_song=name_song.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '');
        window.open("https://www.google.com/search?q=" + name_song);
    }

    updatemusiccarrotstorecallback = function (data) {
        var html_txt = data["data"];
        if (data['error'] == '1') {
            swal('Cập nhật vào Carrotstore Muisc', 'Không thành công! ' + html_txt, 'error');
        } else {
            swal('Cập nhật vào Carrotstore Muisc', 'Thành công!', 'success');
        }
    };

    function update_carrotstore_music() {
        swal('Cập nhật vào Carrotstore Muisc', 'Đang xử lý...');
        var data_song_id = $("#data_song_id").html();
        var data_song_artist = $("#data_song_artist").html();
        var data_song_album = $("#data_song_album").html();
        var data_song_year = $("#data_song_year").html();
        var data_song_genre = $("#data_song_genre").html();
        var data_song_lang = $("#data_song_lang").html();
        var url_act_update = "function=update_carrotstore_music&data_song_id=" + data_song_id + "&data_song_artist=" + data_song_artist + "&data_song_year=" + data_song_year + "&data_song_genre=" + data_song_genre + "&data_song_album=" + data_song_album + "&data_song_lang=" + data_song_lang;
        url_act_update=encodeURI(url_act_update);
        $.ajax({
            url: '<?php echo $url_carrot_store;?>/app_my_girl_jquery.php',
            jsonp: "updatemusiccarrotstorecallback",
            data: url_act_update,
            dataType: 'jsonp',
        });
    }

</script>
