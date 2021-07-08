<?php
$name_song='';
$id_music='';
$url_music='';
$buy_song='0';
$func='view';
$cur_url=$this->cur_url;

if(isset($_REQUEST['func'])) $func=$_REQUEST['func'];
if(isset($_GET['delete'])){
    $txt_msg='';
    $id_delete=$_GET['delete'];   
    $query_delete=$this->q("DELETE FROM `sound` WHERE `id` = '$id_delete'");
        $filename = 'music/'.$id_delete.'.mp3';
        if (file_exists($filename)) {
            unlink($filename);
            $txt_msg.="The file $filename exists - id($id_delete) \n";
        } else {
            $txt_msg.="The file $filename does not exist - id($id_delete) \n";
        }
    $txt_msg.='Delete '.$id_delete;
    echo $this->msg($txt_msg);
}

if($func=='add'||$func=='edit'){
if(isset($_GET['id'])){
    $id_music=$_GET['id'];
    $func='edit';
    $data_sound=$this->q_data("SELECT * FROM `sound` WHERE `id`='$id_music'");
    $name_song=$data_sound['name'];
    $buy_song=$data_sound['buy'];
    if(file_exists('music/'.$id_music.'.mp3')) $url_music=$this->url.'/music/'.$id_music.'.mp3';
}

if(isset($_POST['name_song'])){
   
    $name_song=addslashes($_POST['name_song']);
    $func=$_POST['func'];
    $id_music=$_POST['id_music'];
    $txt_msg='';
    
    
    if(isset($_POST['buy_song'])){
        $buy_song='1';
    }else{
        $buy_song='0';
    }
    
    if($func=='add'){
        $query_add_sound=$this->q("INSERT INTO `sound` (`name`,`buy`) VALUES ('$name_song','$buy_song');");
        if($query_add_sound){
            $txt_msg.='Thêm mới bài hát thành công !!!';
            $name_song='';
        }
        $id_new=mysqli_insert_id($this->link_mysql);
    }else{
        $query_update=$this->q("UPDATE `sound` SET `name` = '$name_song', `buy` = '$buy_song' WHERE `id` = '$id_music';");
        if($query_update) $txt_msg.='Cập nhật thành công !!!';
        $id_new=$id_music;
    }
    
    if(isset($_FILES["file_song"])) {
        $target_file = 'music/'.$id_new.'.mp3';
        if (move_uploaded_file($_FILES["file_song"]["tmp_name"], $target_file)) {
            $txt_msg.="The file ". basename( $_FILES["file_song"]["name"]). " has been uploaded.";
        } else {
            $txt_msg.="Sorry, there was an error uploading your file.";
        }
    }
    echo $this->msg($txt_msg);
}
?>

<form id="frm_add" action="" method="POST" enctype="multipart/form-data" style="width:auto;">
    <h3>Thêm mới hoặc cập nhật bài hát không lời</h3>
    <table>
        <tr>
            <td><label>Tên bài hát:</label></td>
            <td><input style="width:100%;" type="text" name="name_song" value="<?php echo $name_song;?>" /></td>
        </tr>

        <tr>
            <td><label>Tệp âm thanh:</label></td>
            <td>
                <?php if($url_music!=''){?>
                    <audio controls><source src="<?php echo $url_music;?>" type="audio/mpeg">Your browser does not support the audio tag.</audio>
                    <br/>
                <?php }?>
                <input type="file" name="file_song" />
            </td>
        </tr>

        <tr>
            <td><label>Thương mại hóa:</label></td>
            <td><input type="checkbox" name="buy_song" <?php if($buy_song=='1'){?>checked="true"<?php }?> /></td>
        </tr>
    </table>
    <input type="hidden" value="<?php echo $id_music; ?>" name="id_music" />
    <input type="hidden" value="<?php echo $func; ?>" name="func" />
    <a class="buttonPro black" href="<?php echo $this->cur_url;?>&func=view"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Trở về</a>
    <?php if($func=='add'){?>
        <button class="buttonPro blue"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</button>
    <?php }else{?>
        <button class="buttonPro orange"><i class="fa fa-plus-circle" aria-hidden="true"></i> Cập nhật</button>
    <?php }?>
</form>

<?php }?>

<?php if($func=='view'){
$this->setup_page('sound');
echo $this->show_page_nav();    
?>
<div class="cms_nav_page">
    <a class="buttonPro small blue" href="<?php echo $cur_url;?>&func=add"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</a>
</div>
<table>
<tr>
    <th>ID</th>
    <th>Tên bài hát</th>
    <th>Âm nhạc</th>
    <th>Loại</th>
    <th>Thao tác</th>
</tr>
<?php
$query_list_sound=$this->q("SELECT * FROM `sound` ORDER BY `id` DESC");
while ($row = mysqli_fetch_array($query_list_sound)) {
    $link_music='';
    if(file_exists('music/'.$row['id'].'.mp3')){
        $link_music='<a target="_blank" href="'.$this->url.'/music/'.$row['id'].'.mp3">'.$this->url.'/music/'.$row['id'].'.mp3</a>';
    }else{
        $link_music='<a target="_blank" style="color:red" href="'.$this->url.'/music/'.$row['id'].'.mp3">'.$this->url.'/music/'.$row['id'].'.mp3</a>';
    }
    ?>
        <tr>
            <td><i class="fa fa-music" aria-hidden="true"></i> <?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><i class="fa fa-play-circle" aria-hidden="true"></i> <?php echo $link_music;?></td>
            <td>
                <?php 
                    if($row['buy']=='0') echo '<i class="fa fa-plug" aria-hidden="true"></i>'; else echo '<i class="fa fa-shopping-cart"></i>';
                ?>
            </td>
            <td>
                <a  href="<?php echo $cur_url.'&func=edit&id='.$row['id'];?>" class="buttonPro small yellow"><i class="fa fa-pencil-square" aria-hidden="true"></i> Sửa</a> 
                <a class="buttonPro small red"  href="<?php echo $cur_url.'&delete='.$row['id'];?>"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
            </td>
        </tr>
    <?php
}
?>
</table>
<?php 
echo $this->show_page_nav();
}?>