<div style="float: left;width: 100%;">
<h3>Quản quốc gia triển khai ứng dụng</h3>
<?php
if(isset($_POST['sel_country'])){
    $sel_country=$_POST['sel_country'];
    $query_reste_country=$this->q("DELETE FROM `country`");
    for($i=0;$i<sizeof($sel_country);$i++){
        $query_add=$this->q("INSERT INTO `country` (`key`) VALUES ('".$sel_country[$i]."');");
    }
    echo $this->msg("Cập nhật thành công!");
}
?>
<form action="" method="post" style="float: left;width: auto;">
<table style="float: left;width: auto;">
<?php

$list_lang=$this->get_list_lang();
for($i=0;$i<count($list_lang);$i++){
    $item_lang=$list_lang[$i];
    $key_country=$item_lang['key'];
    $is_sel='off';
    $query_check_sel=$this->q("SELECT `key` FROM `country` WHERE `key` = '$key_country' LIMIT 1");
    if(mysqli_num_rows($query_check_sel)>0){
        $is_sel='on';
    }else{
        $is_sel='off';
    }
    
?>
    <tr>
        <td>
            <img src="<?php echo $item_lang['icon'];?>" />
        </td>
        <td>
            <?php echo $item_lang['name']; ?>
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
<input type="submit" class="buttonPro lager blue" value="Cập nhật" />
</form>
</div>