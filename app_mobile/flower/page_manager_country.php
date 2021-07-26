<div id="page_contain">
<?php
if(isset($_POST['sel_country'])){
    $sel_country=$_POST['sel_country'];
    $reste_country=$this->q("DELETE FROM `country`");
    for($i=0;$i<sizeof($sel_country);$i++){
        $query_add=$this->q("INSERT INTO `country` (`key`) VALUES ('".$sel_country[$i]."');");
    }
    echo $this->msg("Cập nhật thành công!");
}
?>
<form action="" method="post">
<table>
<?php
$list_lang=$this->get_list_lang();
for($i=0;$i<count($list_lang);$i++){
    $item_country=$list_lang[$i];
    $key_country=$item_country['key'];
    $is_sel='off';
    $query_check_sel=$this->q("SELECT `key` FROM `country` WHERE `key` = '$key_country' LIMIT 1");
    if(mysqli_num_rows($query_check_sel)>0) $is_sel='on';

?>
    <tr>
        <td>
            <img src="<?php echo $item_country['icon'];?>" style="width:15px;" />
        </td>
        <td>
            <?php echo $item_country['name']; ?>
        </td>
        <td>
            <input type="checkbox" name="sel_country[]" <?php if($is_sel=='on'){ echo 'checked="true"';}?> value="<?php echo $key_country;?>" />
            <input type="hidden" name="key_country[]" value="<?php echo $key_country;?>" />
        </td>
    </tr>
<?php 
}
?>
</table>
<button type="submit" class="buttonPro lager blue"><i class="fa fa-pencil-square" aria-hidden="true"></i> Cập nhật</button>
</form>
</div>