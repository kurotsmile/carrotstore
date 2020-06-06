<?php
$url_cur=$url.'/app_my_girl_handling.php?func=remove_key_music';
$key='';
if(isset($_GET['key'])) $key=$_GET['key'];
?>

<div style="float:left;width:100%">
<div style="padding:20px;">
    <form method="post" action="" style="width:200px;">
        <label for="key_music_remove">Từ khóa âm nhạc đã duyệt</label>
        <br/>
        <input type="text" id="key_music_remove" name="key" value="<?php echo $key;?>"><br/>
        <input type="submit" value="Hoàn tất" class="buttonPro blue">
    </form>
</div>

<div style="padding:20px;">
    <?php

    if(isset($_GET['delete'])){
        $key=$_GET['delete'];
        $query_delete=mysqli_query($link,"DELETE FROM `app_my_girl_remove_key_music` WHERE `key` = '$key'");
        show_alert('Đã xóa từ khóa '.$key.' ra khỏi danh sách!','alert');
    }

    if(isset($_POST['key'])){
        $key=$_POST['key'];
        $query_add=mysqli_query($link,"INSERT INTO `app_my_girl_remove_key_music` (`key`) VALUES ('$key');");
        if($query_add){
            show_alert('Đã thêm từ khóa '.$key.' vào  danh sách!','alert');
        }else{
            show_alert('Thêm từ khóa '.$key.' thất bại, kiểm tra lại từ khóa này đã có !','error');
        }
    }

    $query_list_key=mysqli_query($link,"SELECT `key` FROM `app_my_girl_remove_key_music` ORDER BY  `key` ");
    ?>
        <div>Có <b><?php echo mysqli_num_rows($query_list_key);?></b> Từ khóa duyệt nhạc được đưa vào danh sách xóa</div>
    <?php
    $query_list_key=mysqli_query($link,"SELECT `key` FROM `app_my_girl_remove_key_music` ORDER BY RAND() LIMIT 50");
    while($row_key=mysqli_fetch_assoc($query_list_key)){
    ?>
    <span class="tag_remove_key_music">
        <i class="fa fa-shield" aria-hidden="true"></i> <?php echo $row_key['key'];?>
        <a href="<?php echo $url_cur;?>&delete=<?php echo urlencode($row_key['key']); ?>" class="buttonPro small red"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
    </span>
    <?php
    }
    ?>
</div>

</div>
