<?php
function smart_resize_image($file, $string = null, $width = 0, $height = 0, $proportional = false, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 100
) {

    if ($height <= 0 && $width <= 0)
        return false;
    if ($file === null && $string === null)
        return false;

    # Setting defaults and meta
    $info = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
    $image = '';
    $final_width = 0;
    $final_height = 0;
    list($width_old, $height_old) = $info;
    $cropHeight = $cropWidth = 0;

    # Calculating proportionality
    if ($proportional) {
        if ($width == 0)
            $factor = $height / $height_old;
        elseif ($height == 0)
            $factor = $width / $width_old;
        else
            $factor = min($width / $width_old, $height / $height_old);

        $final_width = round($width_old * $factor);
        $final_height = round($height_old * $factor);
    }
    else {
        $final_width = ( $width <= 0 ) ? $width_old : $width;
        $final_height = ( $height <= 0 ) ? $height_old : $height;
        $widthX = $width_old / $width;
        $heightX = $height_old / $height;

        $x = min($widthX, $heightX);
        $cropWidth = ($width_old - $width * $x) / 2;
        $cropHeight = ($height_old - $height * $x) / 2;
    }

    # Loading image to memory according to type
    switch ($info[2]) {
        case IMAGETYPE_JPEG: $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);
            break;
        case IMAGETYPE_GIF: $file !== null ? $image = imagecreatefromgif($file) : $image = imagecreatefromstring($string);
            break;
        case IMAGETYPE_PNG: $file !== null ? $image = imagecreatefrompng($file) : $image = imagecreatefromstring($string);
            break;
        default: return false;
    }


    # This is the resizing/resampling/transparency-preserving magic
    $image_resized = imagecreatetruecolor($final_width, $final_height);
    if (($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG)) {
        $transparency = imagecolortransparent($image);
        $palletsize = imagecolorstotal($image);

        if ($transparency >= 0 && $transparency < $palletsize) {
            $transparent_color = imagecolorsforindex($image, $transparency);
            $transparency = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
            imagefill($image_resized, 0, 0, $transparency);
            imagecolortransparent($image_resized, $transparency);
        } elseif ($info[2] == IMAGETYPE_PNG) {
            imagealphablending($image_resized, false);
            $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
            imagefill($image_resized, 0, 0, $color);
            imagesavealpha($image_resized, true);
        }
    }
    imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);


    # Taking care of original, if needed
    if ($delete_original) {
        if ($use_linux_commands)
            exec('rm ' . $file);
        else
            @unlink($file);
    }

    # Preparing a method of providing result
    switch (strtolower($output)) {
        case 'browser':
            $mime = image_type_to_mime_type($info[2]);
            header("Content-type: $mime");
            $output = NULL;
            break;
        case 'file':
            $output = $file;
            break;
        case 'return':
            return $image_resized;
            break;
        default:
            break;
    }

    # Writing image according to type to the output destination and image quality
    switch ($info[2]) {
        case IMAGETYPE_GIF: imagegif($image_resized, $output);
            break;
        case IMAGETYPE_JPEG: imagejpeg($image_resized, $output, $quality);
            break;
        case IMAGETYPE_PNG:
            $quality = 9 - (int) ((0.9 * $quality) / 10.0);
            imagepng($image_resized, $output, $quality);
            break;
        default: return false;
    }

    return true;
}

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
$song_id = $id_file;
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
    smart_resize_image($path_img,"Carrot",240,240,false,'file',true,false,95);
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

    echo show_alert("Cập nhật thành công","alert");
}


    $path_file = 'app_mygirl/app_my_girl_'.$song_lang.'/'.$id_file.'.mp3';
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
                <td><input name="song_year" id="song_year" type="text" value="<?php echo $song_year; ?>"></td>
            </tr>

            <tr>
                <td>genre</td>
                <td><input name="song_genre" id="song_genre" type="text" value="<?php echo $song_genre; ?>"><br><br>
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
        <input value="Cập nhật thông tin âm thanh" class="buttonPro large yellow" type="submit">
        <input value="Cập nhật lên dữ liệu máy chủ" class="buttonPro  light_blue" type="submit" onclick="update_info_music();return false;">
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

    function  update_info_music(){
        var song_artist=$("#song_artist").val();
        var song_album=$("#song_album").val();
        var song_year=$("#song_year").val();
        var song_genre=$("#song_genre").val();
        var id_music ="<?php echo $song_id;?>";
        var lang = "<?php echo $song_lang;?>";
        $.ajax({
            url: "app_my_girl_jquery.php",
            type: "post",
            data: "function=update_info_music&song_artist="+song_artist+"&song_album="+song_album+"&song_year="+song_year+"&song_genre="+song_genre+"&id_music="+id_music+"&lang="+lang,
            success: function (data, textStatus, jqXHR) {
                swal("Âm nhạc", "Cập nhật thông tin và các thuột tính bài hát thành công!", "success");
            }
        });
    }
</script>

