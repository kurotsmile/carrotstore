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
$fd = fopen('images/192.png', 'rb');
$song_data_pic = fread($fd, filesize('images/192.png'));
fclose($fd);

if(isset($_GET['lang'])){
    $song_lang=$_GET['lang'];
}

if(isset($_POST['song_title'])) {
    $song_id = $_POST['song_id'];
    $path_file = $_POST['path_file'];
    $id_file = $_POST['id_file'];

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

    $getID3 = new getID3;
    $getID3->setOption(array('encoding' => $TextEncoding));


    $tagwriter = new getid3_writetags;
    $tagwriter->filename = $path_file;
    $tagwriter->tagformats = array('id3v2.3');

    $tagwriter->overwrite_tags = true;
    $tagwriter->remove_other_tags = false;
    $tagwriter->tag_encoding = $TextEncoding;
    $tagwriter->remove_other_tags = true;


    $TagData = array(
        'title' => array($song_title),
        'artist' => array($song_artist),
        'album' => array($song_album),
        'year' => array($song_year),
        'genre' => array($song_genre),
        'comment' => array($song_comment),
        'unsynchronised_lyric' => array($song_lyrics),
    );
    $path_img='app_mygirl/app_my_girl_'.$song_lang.'_img/'.$id_file.'.png';
    $fd = fopen($path_img, 'rb');
    $APICdata = fread($fd, filesize($path_img));
    fclose($fd);
    $TagData['attached_picture'][0]['data'] = $APICdata;
    $TagData['attached_picture'][0]['picturetypeid'] = 0x03;
    $TagData['attached_picture'][0]['description'] = $song_title;
    $TagData['attached_picture'][0]['mime'] = 'image/jpeg';

    $tagwriter->tag_data = $TagData;

    if ($tagwriter->WriteTags()) {
        if (!empty($tagwriter->warnings)) {
            echo 'There were some warnings:<br>' . implode('<br><br>', $tagwriter->warnings);
        }
    } else {
        echo 'Failed to write tags!<br>' . implode('<br><br>', $tagwriter->errors);
    }

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

    echo show_alert("Cập nhật thành công","alert");
}


    $path_file = 'app_mygirl/app_my_girl_vi/'.$id_file.'.mp3';
    $getID3 = new getID3;
    $ThisFileInfo = $getID3->analyze($path_file);
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

//file_put_contents('data_temp/avatar_music.png', $song_data_pic);
$query_info_audio=mysqli_query($link,"SELECT * FROM `app_my_girl_".$song_lang."_lyrics` WHERE `id_music` = '$id_file' LIMIT 1");
$data_info_audio=mysqli_fetch_assoc($query_info_audio);

$query_name_audio=mysqli_query($link,"SELECT `chat` FROM `app_my_girl_".$song_lang."` WHERE `id` = '$id_file' LIMIT 1");
$data_name_audio=mysqli_fetch_assoc($query_name_audio);
$data_info_audio['title']=$data_name_audio['chat'];

?>
<div style="float: left;width: 100%">
    <form style="float: left;padding: 20px;font-size: 13px;" method="post" action="">
        <h2>Thông tin âm nhạc từ máy chủ </h2>
        <table>
            <?php if($data_info_audio['title']!=''){ ?>
            <tr>
                <td style="width:150px;">Tiêu đề</td>
                <td id="val_title"><?php echo $data_info_audio['title'];?></td>
            </tr>
            <?php }?>

            <?php if($data_info_audio['artist']!=''){ ?>
            <tr>
                <td style="width:150px;">Nghệ sĩ</td>
                <td id="val_artist"><?php echo $data_info_audio['artist'];?></td>
            </tr>
            <?php }?>

            <?php if($data_info_audio['album']!=''){ ?>
            <tr>
                <td>Album</td>
                <td id="val_album"><?php echo $data_info_audio['album'];?></td>
            </tr>
            <?php }?>

            <?php if($data_info_audio['year']!=''){ ?>
            <tr>
                <td>Year</td>
                <td id="val_year"><?php echo $data_info_audio['year'];?></td>
            </tr>
            <?php }?>

            <?php if($data_info_audio['genre']!=''){ ?>
            <tr>
                <td>Genre</td>
                <td id="val_genre"><?php echo $data_info_audio['genre'];?></td>
            </tr>
            <?php }?>

            <?php if($data_info_audio['lyrics']!=''){ ?>
            <tr>
                <td>Lyrics</td>
                <td id="val_lyrics"><?php echo $data_info_audio['lyrics'];?></td>
            </tr>
            <?php }?>

            <tr>
                <td>Thao tác</td>
                <td>
                    <span class="buttonPro small light_blue" onclick="enter_val();"><i class="fa fa-level-down " aria-hidden="true"></i> Nhập thông tin vào Thông số âm nhạc</span>
                    <span class="buttonPro small" onclick="search_google();" title="Tìm kiếm thông tin từ google"><i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm thông tin trên google</span>
                </td>
            </tr>
        </table>

        <h3>Thông tin âm nhạc của tệp tin <?php echo $id_file; ?>.mp3</h3>
        <i>Đây là thông tin được lưu trữ theo tệp tin khi người dùng tải xuống</i>
        <table>
            <tr>
                <td>title</td>
                <td>
                    <input name="song_title" id="song_title" type="text" value="<?php echo $song_title; ?>">
                </td>
            </tr>

            <tr>
                <td>artist (nghệ sĩ thể hiện)</td>
                <td>
                    <input name="song_artist" id="song_artist" type="text" value="<?php echo $song_artist; ?>">
                </td>
            </tr>

            <tr>
                <td>album</td>
                <td>
                    <input name="song_album" id="song_album" type="text" value="<?php echo $song_album; ?>">
                    <span class="buttonPro small" onclick="$('#song_album').val('carrotstore.com');"><i class="fa fa-magic" aria-hidden="true"></i> carrotstore.com</span>
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
                    <span class="buttonPro small" onclick="$('#song_comment').val('Songs downloaded from Carrotstore.com');"><i class="fa fa-magic" aria-hidden="true"></i> Bản quền của trang chủ</span>
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
                    <textarea name="song_lyrics" id="song_lyrics" style="width: 100%;height:200px"><?php echo $song_lyrics; ?></textarea>
                </td>
            </tr>
        </table>
        <input type="hidden" name="id_file" value="<?php echo $id_file; ?>">
        <input type="hidden" name="path_file" value="<?php echo $path_file; ?>">
        <input value="Cập nhật" class="buttonPro yellow" type="submit">
        <input type="hidden" name="song_id" id="song_id" value="<?php echo $song_id; ?>">
        <input type="hidden" name="song_lang" id="song_lang" value="<?php echo $song_lang; ?>">
    </form>
</div>
<script>
    function search_google() {
        var name_song = $("#song_title").val();
        name_song=name_song.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '');
        window.open("https://www.google.com/search?q=" + name_song);
    }

    function enter_val(){
        if($("#val_artist").length) $("#song_artist").val($("#val_artist").html());
        if($("#val_album").length) $("#song_album").val($("#val_album").html());
        if($("#val_genre").length) $("#song_genre").val($("#val_genre").html());
        if($("#val_year").length) $("#song_year").val($("#val_year").html());
        if($("#val_title").length) $("#song_title").val($("#val_title").html());
        if($("#val_lyrics").length) $("#song_lyrics").val($("#val_lyrics").html());
    }
</script>

