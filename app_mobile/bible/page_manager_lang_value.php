<?php
$lang_key='';
$id_edit='';
$lang_key_to='';

$url_cur=$url.'/?page=manager_lang_value';

if(isset($_GET['lang'])){
    $lang_key=$_GET['lang'];
    $query_get_val=mysqli_query($link,"SELECT * FROM `lang_value` WHERE `id_country` = '$lang_key' LIMIT 1");
    $data_val=mysqli_fetch_array($query_get_val);
    $data_val=json_decode($data_val['value']);
}

if(isset($_GET['lang_to'])){
    $lang_key_to=$_GET['lang_to'];
}
$query_list_country=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_country`");
?>



<form class="box_form" action="" method="post">

<div class="row">
<strong><i class="fa fa-tags"></i> Thêm giá trị ngôn ngữ nước (<?php echo $lang_key ?>)</strong>
</div>

<?php
if(isset($_POST['lang_key'])){
    $lang_key=$_POST['lang_key'];
    $data_val=json_encode($_POST, JSON_UNESCAPED_UNICODE);
    $data_val_inst=addslashes($data_val);
    $check_value_lang=mysqli_query($link,"SELECT * FROM `lang_value` WHERE `id_country` = '$lang_key' LIMIT 1");
    if(mysql_num_rows($check_value_lang)==0){
        $query_add_lang=mysqli_query($link,"INSERT INTO `lang_value` (`id_country`, `value`) VALUES ('$lang_key', '$data_val_inst');");
        if($query_add_lang){
            $data_val=json_decode($data_val);
            echo alert("Thêm mới các giá trị ngôn ngữ thành công!!!","alert");
        }else{
            echo alert("Thêm mới các giá trị ngôn ngữ thất bại!!! ".mysql_error(),"error");
        }
    }else{
        $query_update_lang=mysqli_query($link,"UPDATE `lang_value` SET `value` = '$data_val_inst' WHERE `id_country` = '$lang_key' ");
        if($query_update_lang){
            $data_val=json_decode($data_val);
            echo alert("Cập nhật các giá trị ngôn ngữ thành công!!!","alert");
        }else{
            echo alert("Cập nhật các giá trị ngôn ngữ thất bại!!!".mysql_error(),"error");
        }
    }
}
?>

<table>
<?php
$query_list_key=mysqli_query($link,"SELECT * FROM `key_lang`");
while($row_key=mysqli_fetch_assoc($query_list_key)){
?>
<tr>
    <td><?php echo $row_key['name_key']; ?></td>
    <td><input style="width: 100%;" type="text" name="<?php echo $row_key['name_key']; ?>" value="<?php echo $data_val->{$row_key['name_key']};?>" /></td>
    <td>
        <a href="<?php echo $url;?>?page=manager_lang_key&edit_id=<?php echo $row_key['id']; ?>&name_key=<?php echo $row_key['name_key']; ?>" class="buttonPro small"><i class="fa fa-edit"></i> sửa tag</a>
        <?php 
        if($lang_key_to!=''){
            $txt_lang_to=$lang_key_to;
            if($lang_key_to=='zh'){
                $txt_lang_to='zh-CN';
            }
        ?>
        <a href="https://translate.google.com/#view=home&op=translate&sl=<?php echo $lang_key;?>&tl=<?php echo $txt_lang_to;?>&text=<?php echo $data_val->{$row_key['name_key']};?>" target="_blank" class="buttonPro small yellow" onclick="$(this).css('color','red');"><i class="fa fa-language"></i> <?php echo $lang_key_to; ?></a>
        <?php }?>
    </td>
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

<div class="box_form">
<label>Chọn ngôn ngữ dịch sang</label>
<select name="lang_to" onchange="change_lang_to(this);return false;">
    <?php
    while($row_lang=mysqli_fetch_array($query_list_country)){
    ?>
    <option value="<?php echo $row_lang['key']; ?>" <?php if($row_lang['key']==$lang_key_to){?>selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
    <?php 
    }
    ?>
</select>
<script>
function change_lang_to(emp){
    var val_lang=$(emp).val();
    window.location="<?php echo $url;?>?page=manager_lang_value&lang=<?php echo $lang_key;?>&lang_to="+val_lang;
}

</script>
</div>

