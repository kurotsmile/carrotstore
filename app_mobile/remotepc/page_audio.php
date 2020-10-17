<?php
$url_cur=$url.'/index.php?view=audio';
$target_dir = "sound";

if(isset($_FILES['voice_audio'])){
    $name_file=$_FILES["voice_audio"]["name"];
    $target_file = $target_dir.'/'.$name_file;
    $query_add_audio=mysqli_query($link,"INSERT INTO `audio` (`file`) VALUES ('$name_file');");
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
    <input type="submit" value="Hoàn tất" class="buttonPro small green">
</form>

<div style="width:90%;padding:2%">
<h3>Các tệp âm thanh đã tải lên</h3>
<table style="width:auto;" >
<?php
$query_list_audio=mysqli_query($link,"SELECT `file` FROM `audio`");
while($row_audio=mysqli_fetch_assoc($query_list_audio)){
    echo '<tr>';
    echo '<td>'.$row_audio['file'].'</td>';
    echo '<td><a href="'.$url_cur.'&delete='.$row_audio['file'].'" onclick="return confirm(\'Có chắc chắn là muốn xóa?\');" class="buttonPro small red"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a></td>';
    echo '</tr>';
}
?>
</table>
</div>