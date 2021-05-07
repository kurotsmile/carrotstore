<?php
$key_edit='';
if(isset($_GET['edit'])){
    $key_edit=$_GET['edit'];
}

$query_list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country`");

if(isset($_POST['key_lang'])){
    $key_lang=$_POST['key_lang'];
    if($key_lang!=''){
        while($row_l=mysqli_fetch_assoc($query_list_country)){
            $key_country=$row_l['key'];
            $val_lang=mysqli_real_escape_string($link,$_POST['val_'.$key_country]);
            $query_delete_val=mysqli_query($link,"DELETE FROM `lang_$key_country` WHERE `key` = '$key_lang'");
            $query_add_val=mysqli_query($link,"INSERT INTO `lang_$key_country` (`key`, `value`) VALUES ('$key_lang', '$val_lang');");
            if($query_add_val){
                echo alert("Thêm thanh công từ khóa '$key_lang' với giá trị <b>$val_lang</b> vào quốc gia <b>$key_country</b>");
            }
        }
    }
}
?>

<form style="width:100%;" method="post">
<table>
<tr>
    <td><strong>Từ khóa</strong></td>
    <td><input name="key_lang" style="background-color: ivory;width:90%;font-weight: bold;" value="<?php echo $key_edit;?>"></td>
</tr>

<?php
while($row_country=mysqli_fetch_assoc($query_list_country)){
    $key_country=$row_country['key'];
    $value_lang='';
    if($key_edit!=''){
        $query_value_lang=mysqli_query($link,"SELECT `value` FROM `lang_$key_country` WHERE `key` = '$key_edit' LIMIT 1");
        $data_value_lang=mysqli_fetch_assoc($query_value_lang);
        $value_lang=$data_value_lang['value'];
    }
?>
    <tr>
        <td> <img src="<?php echo $url.'/thumb.php?src='.$url.'/app_mygirl/img/'.$key_country.'.png&size=16x16&trim=1'; ?>"/> <?php echo $row_country['name'];?> (<?php echo $key_country;?>)</td>
        <td><input name="val_<?php echo $key_country;?>" type="text" style="width:90%;" value="<?php echo $value_lang;?>"></td>
    </tr>
<?php
}
?>
<tr>
    <td>Thao tác</td>
    <td>
        <?php if($key_edit==''){?>
            <button class="green buttonPro large"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</button>
        <?php }else{?>
            <button class="green buttonPro large"><i class="fa fa-check-circle" aria-hidden="true"></i> Cập nhật</button>
        <?php }?>
    </td>
</tr>
</table>
</form>
