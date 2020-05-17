<?php
$name_song='';
$id_update='';
$buy_song='0';
$func='add';

if(isset($_GET['edit'])){
    $id_update=$_GET['edit'];
    $func='update';
    $query_get_sound=mysqli_query($link,"SELECT * FROM `sound` WHERE `id`='$id_update'");
    $arr=mysqli_fetch_array($query_get_sound);
    $name_song=$arr['name'];
    $buy_song=$arr['buy'];
    mysqli_free_result($query_get_sound);
}

if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];   
    $query_delete=mysqli_query($link,"DELETE FROM `sound` WHERE `id` = '$id_delete'");
        $filename = 'music/'.$id_delete.'.mp3';
        
        if (file_exists($filename)) {
            unlink($filename);
            echo "The file $filename exists - id($id_delete) \n";
        } else {
            echo "The file $filename does not exist - id($id_delete) \n";
        }
    echo 'Delete '.$id_delete;
    mysqli_free_result($query_delete);
}


if(isset($_POST['func'])){
    $name_song=addslashes($_POST['name_song']);
    $func=$_POST['func'];
    $id_update=$_POST['id_update'];
    
    if(isset($_POST['buy_song'])){
        $buy_song='1';
    }else{
        $buy_song='0';
    }
    
    if($func=='add'){
        $query_add=mysqli_query($link,"INSERT INTO `sound` (`name`,`buy`) VALUES ('$name_song','$buy_song');");
        if(mysql_error($query_add)==''){
            echo 'Thêm mới bài hát thành công !!!';
            $name_song='';
        }
        $id_new=mysql_insert_id();
    }else{
        $query_update=mysqli_query($link,"UPDATE `sound` SET `name` = '$name_song', `buy` = '$buy_song' WHERE `id` = '$id_update';");
        if(mysql_error($query_update)==''){
            echo 'Cập nhật thành công !!!';
            $name_song='';
        }
        $id_new=$id_update;
    }
    
    if(isset_file($_FILES["file_song"])) {
        $target_file = 'music/'.$id_new.'.mp3';
        if (move_uploaded_file($_FILES["file_song"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["file_song"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

}
?>

<form id="frm_add" action="<?php echo $url;?>?view=sound" method="POST" enctype="multipart/form-data">
    <p>
    <label>Tên bài hát:</label><br />
    <input type="text" name="name_song" value="<?php echo $name_song;?>" />
    </p>
    
    <p>
    <label>Tệp âm thanh:</label><br />
    <input type="file" name="file_song" />
    </p>
    
    <p>
    <label>Thương mại hóa:</label><br />
    <input type="checkbox" name="buy_song" <?php if($buy_song=='1'){?>checked="true"<?php }?> />
    </p>
    
    <p>
        <?php
        if($id_update!=''){
        ?>
        <input type="hidden" value="<?php echo $id_update; ?>" name="id_update" />
        <?php
        }
        ?>
        <input type="hidden" value="<?php echo $func; ?>" name="func" />
        <input type="submit" value="Hoàn tất" class="button" />
    </p>
</form>

<table>
<tr>
    <th>ID</th>
    <th>Tên bài hát</th>
    <th>Âm nhạc</th>
    <th>Loại</th>
    <th>Thao tác</th>
</tr>
<?php
$query_list_sound=mysqli_query($link,"SELECT * FROM `sound` ORDER BY `id` DESC");
while ($row = mysqli_fetch_array($query_list_sound)) {
    $link_music='<audio controls><source src="'.$url.'/music/'.$row['id'].'.mp3" type="audio/mpeg"></audio>';
    if($row['buy']=='0'){
        $txt_buy='<i class="fab fa-creative-commons-nc"></i>';
    }else{
        $txt_buy='<i class="fas fa-shopping-cart"></i>';
    }
    echo '<tr><td>'.$row['id'].'</td><td>'.$row['name'].'</td><td>'.$link_music.'</td><td>'.$txt_buy.'</td><td><a  href="'.$url.'?view=sound&edit='.$row['id'].'" class="buttonPro small yellow">Sửa</a> <a class="buttonPro small red" style="color:red" href="'.$url.'?view=sound&delete='.$row['id'].'">Xóa</a></td></tr>';
}
?>
</table>