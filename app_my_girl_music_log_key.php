<?php
include "app_my_girl_template.php";
$langsel='';

if(isset($_GET['lang'])){
    $langsel=$_GET['lang']; 
}

if(isset($_GET['delete'])){
    $delete_type=$_GET['delete'];
    if($delete_type=='1'){
        $langsel=$_GET['lang']; 
        $msql_delete=mysqli_query($link,"DELETE FROM `app_my_girl_log_key_music` WHERE `lang` = '$langsel'");
    }
    
    if($delete_type=='0'){
        $msql_delete_all=mysqli_query($link,"DELETE FROM `app_my_girl_log_key_music`"); 
    }
    
    if($delete_type=='2'){
        $msql_delete_not_music_key=mysqli_query($link,"DELETE m.* FROM `app_my_girl_log_key_music` as m, `app_my_girl_$langsel` as chat where m.key=chat.text or m.key=chat.chat");
        $num_delete=mysqli_affected_rows();
        show_alert('Đã xóa ('.$num_delete.') từ khóa không phải là bài hát!','alert');
    }
}

if(isset($_GET['delete_key'])){
    $key_delete=$_GET['delete_key'];
    $langsel=$_GET['lang'];
    $msql_delete_key=mysqli_query($link,"DELETE FROM `app_my_girl_log_key_music` WHERE `key` = '$key_delete'");
    $num_delete=mysqli_affected_rows($link);
    show_alert('Đã xóa ('.$num_delete.') từ khóa âm nhạc','alert');
}

if(isset($_POST['loc'])){
    $langsel=$_POST['lang']; 
}

if($langsel==''){
    $result_tip=mysqli_query($link,"SELECT DISTINCT * FROM `app_my_girl_log_key_music`");
}else{
    $result_tip=mysqli_query($link,"SELECT DISTINCT * FROM `app_my_girl_log_key_music` WHERE `lang` = '$langsel'");  
}
?>
<form method="post" id="form_loc" style="width: 800px;">
<div style="display: inline-block;float: left;margin: 2px;">
        <i class="fa fa-music" aria-hidden="true" style="font-size: 20px;"></i><br />
        có <?php echo mysqli_num_rows($result_tip);?> hiển thị bài hát
</div>

<div style="display: inline-block;float: left;margin: 2px;width: 90px;">
    <label>Ngôn ngữ:</label> 
    <select name="lang">
    <option value=""  selected="true"  <?php if($langsel==""){?> selected="true"<?php }?>>Tất cả</option>
    <?php 
    $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active` = '1'");
    while($row_lang=mysqli_fetch_array($list_country)){
    ?>
    <option value="<?php echo $row_lang['key'];?>" <?php if($langsel==$row_lang['key']){?> selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
    <?php }?>
    </select>
</div>


<div style="display: inline-block;float: left;margin: 2px;">
    <input type="submit" name="loc" value="Lọc" class="link_button" />
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <?php if($langsel!=''){?><a href="<?php echo $url; ?>/app_my_girl_music_log_key.php?delete=1&lang=<?php echo $langsel; ?>" class="buttonPro red link_button"><i class="fa fa-trash" aria-hidden="true"></i> xóa một nước</a><?php }?>
    <a href="<?php echo $url; ?>/app_my_girl_music_log_key.php?delete=2&lang=<?php echo $langsel; ?>" class="buttonPro red link_button"><i class="fa fa-trash" aria-hidden="true"></i> xóa các từ khóa không phải bài hát</a>
</div>

</form>



<?php
if(mysqli_num_rows($result_tip)>0){
    echo '<table  style="border:solid 1px green">';
    echo '<tr style="border:solid 1px green"><th>Từ khóa</th><th>Ngôn ngữ</th><th>Tùy chỉnh</th><th>Hành động</th></tr>';
            while ($row = mysqli_fetch_array($result_tip)) {
                ?>
                <tr>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php if($row[2]=='0'){?><i class="fa fa-map-marker" aria-hidden="true"></i> Khu vực<?php }else{?><i class="fa fa-globe" aria-hidden="true"></i> Thế giới<?php }?></td>
                    <td>
                        <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $row[1]; ?>&sex=0&character_sex=1&effect=2&answer=<?php echo $row[0];?>&actions=9" target="_blank" class="buttonPro small green"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm nhạc</a>
                        <a href="<?php echo $url; ?>/app_my_girl_music_log_key.php?lang=<?php echo $row[1]; ?>&delete_key=<?php echo urlencode($row[0]);?>" class="buttonPro small red"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa từ khóa (Đã thêm)</a>
                        <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=check_music&key_word=<?php echo urlencode($row[0]);?>" target="_blank"  class="buttonPro small yellow"><i class="fa fa-search" aria-hidden="true"></i> kiểm tra đã tồn tại (<i class="fa fa-globe" aria-hidden="true"></i> Thế giới)</a>
                    </td>
                </tr>
                <?php
            }
    echo '</table>';
    mysqli_free_result($result_tip);
}else{
    show_alert('Chưa có dữ liệu từ người dùng','alert');
}
?>

