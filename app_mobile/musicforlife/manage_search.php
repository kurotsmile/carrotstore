<?php
$lang='vi';
if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}
?>
<form id="frm_loc" method="GET" action="<?php echo $url?>/index.php">
<div class="frm_line">
    <select name="lang" style="width: 100%;font-size: 15px;">
        <?php 
        $list_country=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `active`='1'");
        while($l=mysqli_fetch_array($list_country)){
        ?>
        <option value="<?php echo $l['key']; ?>" <?php if($lang==$l['key']){?>selected="true"<?php } ?>><?php echo $l['name']; ?></option>
        <?php }?>
    </select>
    <input type="hidden" value="search" name="view" />
</div>



<div class="frm_line" >
    <input type="submit" value="Lọc" class="buttonPro blue"/>
</div>

</form>

<?php
if(isset($_GET['delete'])){
    $key_delete=$_GET['delete'];
    $query_delete=mysqli_query($link,"DELETE FROM carrotsy_music.`log_key` WHERE `key` = '$key_delete'  AND `lang` = '$lang' ");
    if(mysqli_error($link)==''){
        echo '<strong style="width:100%;float:left;padding:4px;">Xóa thành công '.mysqli_affected_rows($link).' từ khóa'.$key_delete.' !!!</strong>';
    }
}
?>
<table>
<?php
$query_key_search=mysqli_query($link,"SELECT * FROM carrotsy_music.`log_key` where `lang`='$lang'");
while($row_log=mysqli_fetch_array($query_key_search)){
    ?>
    <tr><td><?php echo $row_log[0];?></td>
    <td>
        <a href="<?php echo $url_carrot_store;?>/app_my_girl_handling.php?func=check_music&key_word=<?php echo $row_log[0];?>" class="buttonPro small yellow" target="_blank"><i class="fa fa-search" aria-hidden="true"></i> Kiểm tra tồn tại</a>
        <a href="<?php echo $url;?>/index.php?view=search&delete=<?php echo $row_log[0];?>&lang=<?php echo $lang;?>" class="buttonPro small red"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa từ khóa</a>
        <a href="<?php echo $url_carrot_store;?>/app_my_girl_add.php?lang=<?php echo $lang;?>&effect=2&actions=9&answer=<?php echo $row_log[0];?>" class="buttonPro small green"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm nhạc</a></td>
    </tr>
    <?php
}
mysqli_free_result($query_key_search);
?>
</table>