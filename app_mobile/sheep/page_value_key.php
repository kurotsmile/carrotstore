<div style="float: left;width: auto;padding: 20px;">
<?php
$lang_key='';
$id_edit='';
$lang_key_to='';

$url_cur=$url.'/?view=value_key';

if(isset($_GET['lang'])){
    $lang_key=$_GET['lang'];
    $query_get_val=mysql_query("SELECT * FROM `value_lang` WHERE `id_country` = '$lang_key' LIMIT 1");
    $data_val=mysql_fetch_array($query_get_val);
    $data_val=json_decode($data_val['value']);
}

if(isset($_GET['lang_to'])){
    $lang_key_to=$_GET['lang_to'];
}

$query_list_country=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_country`");
?>

<div>
<label>Chọn ngôn ngữ dịch sang</label>
<select name="lang_to" onchange="change_lang_to(this);return false;">
    <?php
    while($row_lang=mysql_fetch_array($query_list_country)){
    ?>
    <option value="<?php echo $row_lang['key']; ?>" <?php if($row_lang['key']==$lang_key_to){?>selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
    <?php 
    }
    ?>
</select>
<script>
function change_lang_to(emp){
    var val_lang=$(emp).val();
    window.location="<?php echo $url;?>?view=value_key&lang=<?php echo $lang_key;?>&lang_to="+val_lang;
}

</script>
</div>

<form class="box_form" action="" method="post">

<div class="row">
<strong><i class="fas fa-tags"></i> Thêm giá trị ngôn ngữ nước (<?php echo $lang_key ?>)</strong>
</div>

<?php
if(isset($_POST['lang_key'])){
    $lang_key=$_POST['lang_key'];
    $data_val=json_encode($_POST, JSON_UNESCAPED_UNICODE);
    $data_val_inst=addslashes($data_val);
    $check_value_lang=mysql_query("SELECT * FROM `value_lang` WHERE `id_country` = '$lang_key' LIMIT 1");
    if(mysql_num_rows($check_value_lang)==0){
        $query_add_lang=mysql_query("INSERT INTO `value_lang` (`id_country`, `value`) VALUES ('$lang_key', '$data_val_inst');");
        if($query_add_lang){
            echo alert("Thêm mới các giá trị ngôn ngữ thành công!!!","alert");
        }else{
            echo alert("Thêm mới các giá trị ngôn ngữ thất bại!!! ".mysql_error(),"error");
        }
        $data_val=json_decode($data_val);
    }else{
        $query_update_lang=mysql_query("UPDATE `value_lang` SET `value` = '$data_val_inst' WHERE `id_country` = '$lang_key' ");
        if($query_update_lang){
            
            echo alert("Cập nhật các giá trị ngôn ngữ thành công!!!","alert");
        }else{
            echo alert("Cập nhật các giá trị ngôn ngữ thất bại!!!".mysql_error(),"error");
        }
        $data_val=json_decode($data_val);
    }
}
?>

<table style="float: left;width: auto;">
<?php
$query_list_key=mysql_query("SELECT * FROM `key_lang`");
while($row_key=mysql_fetch_array($query_list_key)){
?>
<tr>
    <td><?php echo $row_key['key']; ?></td>
    <td><input style="width: 100%;min-width: 500px;" type="text" name="<?php echo $row_key['key']; ?>" value="<?php echo $data_val->{$row_key['key']};?>" /></td>
    <?php 
    if($lang_key_to!=''){
        if($lang_key_to=='zh') $lang_key_to='zh-CN';
    ?>
    <td><a href="https://translate.google.com/#view=home&op=translate&sl=<?php echo $lang_key;?>&tl=<?php echo $lang_key_to;?>&text=<?php echo $data_val->{$row_key['key']};?>" onclick="$(this).css('color','red');" target="_blank" class="buttonPro small yellow" ><i class="fas fa-language"></i> <?php echo $lang_key_to; ?></a></td>
    <?php }?>
</tr>
<?php 
}
?>
</table>

<div class="row">
    <input name="lang_key" type="hidden" value="<?php echo $lang_key;?>" />
    <input class="buttonPro yellow large" type="submit" value="Cập nhật" />
</div>
</form>
</div>
