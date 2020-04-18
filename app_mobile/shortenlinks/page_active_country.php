<div id="page_contain">
<h3>Quản quốc gia triển khai ứng dụng</h3>
<?php
if(isset($_POST['sel_country'])){
    $sel_country=$_POST['sel_country'];
    $query_reste_country=mysql_query("DELETE FROM `country`");
    for($i=0;$i<sizeof($sel_country);$i++){
        $query_add=mysql_query("INSERT INTO `country` (`key`) VALUES ('".$sel_country[$i]."');");
    }
    echo alert("Cập nhật thành công!","alert");
}
?>
<form action="" method="post">
<table>
<?php

$query_list_country=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_country`");
while($item_country=mysql_fetch_array($query_list_country)){
    $key_country=$item_country['key'];
    $is_sel='off';
    $query_check_sel=mysql_query("SELECT `key` FROM `country` WHERE `key` = '$key_country' LIMIT 1");
    if(mysql_num_rows($query_check_sel)>0){
        $is_sel='on';
    }else{
        $is_sel='off';
    }
    
?>
    <tr>
        <td>
            <img src="http://carrotstore.com/thumb.php?src=http://carrotstore.com/app_mygirl/img/<?php echo $key_country;?>.png&size=30&trim=1" />
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
mysql_free_result($query_list_country);

?>
</table>
<input type="submit" class="buttonPro lager blue" value="Cập nhật" />
</form>
</div>