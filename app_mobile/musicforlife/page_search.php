<?php
$cur_url=$this->cur_url;
$lang='vi';
if(isset($_REQUEST['lang']))$lang=$_REQUEST['lang'];
?>
<form id="frm_loc" method="POST" action="">
<div class="frm_line">
    <select name="lang" style="width: 100%;font-size: 15px;">
        <?php 
        $list_country=$this->get_list_lang();
        for($i=0;$i<count($list_country);$i++){
            $l=$list_country[$i];
        ?>
        <option value="<?php echo $l['key']; ?>" <?php if($lang==$l['key']){?>selected="true"<?php } ?>><?php echo $l['name']; ?></option>
        <?php }?>
    </select>
    <input type="hidden" value="search" name="view" />
</div>
<div class="frm_line" >
    <button class="buttonPro blue"><i class="fa fa-filter" aria-hidden="true"></i> Lọc</button>
</div>
</form>

<?php
if(isset($_GET['delete'])){
    $key_delete=$_GET['delete'];
    $query_delete=$this->q("DELETE FROM carrotsy_music.`log_key` WHERE `key` = '$key_delete'  AND `lang` = '$lang' ");
    if($query_delete) echo $this->msg("Xóa thành công từ khóa '$key_delete' !");
}
?>
<table>
<?php
$query_key_search=$this->q("SELECT * FROM carrotsy_music.`log_key` where `lang`='$lang'");
while($row_log=mysqli_fetch_array($query_key_search)){
    ?>
    <tr>
        <td><i class="fa fa-search-plus" aria-hidden="true"></i> <?php echo $row_log[0];?></td>
        <td>
            <a onclick="$(this).addClass('black')" href="<?php echo $this->url_carrot_store;?>/app_my_girl_handling.php?func=check_music&key_word=<?php echo $row_log[0];?>" class="buttonPro small yellow" target="_blank"><i class="fa fa-search" aria-hidden="true"></i> Kiểm tra tồn tại</a>
            <a onclick="$(this).addClass('black')" href="<?php echo $this->url_carrot_store;?>/app_my_girl_add.php?lang=<?php echo $lang;?>&effect=2&actions=9&answer=<?php echo $row_log[0];?>" target="_blank" class="buttonPro small green"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm nhạc</a>
            <a onclick="$(this).addClass('black')" href="<?php echo $this->url_carrot_store;?>/app_my_girl_handling.php?func=remove_key_music&key=<?php echo $row_log[0];?>" target="_blank" class="buttonPro small blue"><i class="fa fa-eraser" aria-hidden="true"></i> Chặn</a>
            <a onclick="$(this).addClass('black')" href="<?php echo $cur_url;?>&delete=<?php echo $row_log[0];?>&lang=<?php echo $lang;?>" class="buttonPro small red"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa từ khóa</a>
        </td>
    </tr>
    <?php
}
mysqli_free_result($query_key_search);
?>
</table>