<?php
$url_cur=$url.'/index.php?view=audio';
$target_dir = "sound";

/*
$absolute_path_in = realpath("1.mp3");
$absolute_path_in=str_replace("\\","/",$absolute_path_in);
$absolute_path_out=str_replace("1.mp3","sound.ogg",$absolute_path_in);

echo "in:".$absolute_path_in." <br/>";
echo "out:".$absolute_path_out." <br/>";
unlink("sound.ogg");
$retCode =exec("ffmpeg -i $absolute_path_in -c:a libvorbis -q:a 4 $absolute_path_out");
*/

if(isset($_FILES['voice_audio'])){
    $name_file=$_FILES["voice_audio"]["name"];
    $type_audio=$_POST['type_audio'];
    $target_file = $target_dir.'/'.$name_file;
    $query_add_audio=mysqli_query($link,"INSERT INTO `audio` (`file`,`type`) VALUES ('$name_file','$type_audio');");
    if($query_add_audio){
        if (move_uploaded_file($_FILES["voice_audio"]["tmp_name"], $target_file)) {
            echo msg("Tải lên tập tin " . $target_file . " Thành công!","success");
        } else {
            echo msg("Không thể tải lên file#".$_FILES["voice_audio"]["error"]);
        }
    }else{
        echo msg(''.mysqli_error($link));
    }
}

if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $query_delete=mysqli_query($link,"DELETE FROM `audio` WHERE `file` = '$id_delete' LIMIT 1;");
    if($query_delete){
        unlink($target_dir.'/'.$id_delete);
        echo msg("Xóa tệp $id_delete thành công!","success");
    }
}
?>
<form method="post" enctype="multipart/form-data" style="float:left;margin:10px;width:100%">
    <label>Tải lên tệp âm thanh</label><br/>
    <input type="file" name="voice_audio"/><br/><br/>
    <label>Loại âm thanh</label><br/>
    <select name="type_audio">
        <option value="">Bình thường</option>
        <option value="done">Thực hiện xong</option>
        <option value="none">Không hiểu lệnh</option>
    </select><br/>
    <input type="submit" value="Hoàn tất" class="buttonPro small green">
</form>

<div style="width:90%;padding:2%">
<h3>Các tệp âm thanh đã tải lên</h3>
<table style="width:auto;" >
<?php
$query_list_audio=mysqli_query($link,"SELECT `file`,`type` FROM `audio`");
while($row_audio=mysqli_fetch_assoc($query_list_audio)){
    echo '<tr>';
    echo '<td><a href="'.$url.'/sound/'.$row_audio['file'].'" target="_blank">'.$row_audio['file'].'</a></td>';
    echo '<td>'.$row_audio['type'].'</td>';
    echo '<td><a href="'.$url_cur.'&delete='.$row_audio['file'].'" onclick="return confirm(\'Có chắc chắn là muốn xóa?\');" class="buttonPro small red"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a></td>';
    echo '</tr>';
}
?>
</table>
</div>