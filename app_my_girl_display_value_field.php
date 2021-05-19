<?php
include "app_my_girl_template.php";
$ver=$_GET['ver'];
$field=$_GET['field'];
$lang_old='';if(isset($_GET['lang'])) $lang_old=$_GET['lang'];

if(isset($_POST['field_val'])){
    $field_lang=$_POST['field_lang'];
    $field_val=$_POST['field_val'];
    $field=$_POST['field'];
    $ver=$_POST['ver'];
    for($i=0;$i<count($field_val);$i++){
        $key_lang=$field_lang[$i];
        $query_data_lang=mysqli_query($link,"SELECT `data` FROM `app_my_girl_display_lang` WHERE  `version` = '$ver' AND `lang`='$key_lang'");
        $data_lang=mysqli_fetch_assoc($query_data_lang);
        $data_obj=json_decode($data_lang['data']);
        $data_obj->{$field}=$field_val[$i];
        
        $data_new=addslashes(json_encode($data_obj,JSON_UNESCAPED_UNICODE));
        $query_update_data=mysqli_query($link,"UPDATE `app_my_girl_display_lang` SET `data` = '$data_new' WHERE `lang` = '$key_lang' AND `version` = '$ver' LIMIT 1;");
        if($query_update_data)
            echo 'Cập nhật thành công ('.$field.') quốc gia '.$key_lang.'<br/>';
        else
            echo 'Cập nhật thất bại ('.$field.') quốc gia '.$key_lang.'<br/>';
    }
}

?>
<h3>Cập nhật dữ liệu ngôn ngữ ứng dụng theo trường (<b style="color:red"><?php echo $field;?></b>)</h3>
<form method="post" name="frm_lang">
<table style="width:auto">
<?php
$query_data_lang=mysqli_query($link,"SELECT `data`,`lang` FROM `app_my_girl_display_lang` WHERE  `version` = '$ver'");
while($row_data=mysqli_fetch_assoc($query_data_lang)){
    $data_obj=json_decode($row_data['data']);
    $s_style_row='';
    if($lang_old==$row_data['lang']) $s_style_row='style="background-color: burlywood;"';
?>
    <tr <?php echo $s_style_row;?>>
        <td><a class="buttonPro small" href="<?php echo $url;?>/app_my_girl_display_value.php?lang=<?php echo $row_data['lang'];?>&ver=<?php echo $ver;?>&key=<?php echo $field;?>"><?php echo $row_data['lang'];?></td>
        <td>
            <input name="field_val[]" type="text" value="<?php echo $data_obj->{$field};?>"/>
            <input name="field_lang[]" type="hidden" value="<?php echo $row_data['lang'];?>"/>
        </td>
    </tr>
<?php
}
?>

<tr>
    <td>&nbsp
        <input name="field" type="hidden" value="<?php echo $field?>"/>
        <input name="ver" type="hidden" value="<?php echo $ver?>"/>
    </td>
    <td><button class="buttonPro green"><i class="fa fa-check-circle" aria-hidden="true"></i> Cập nhật</button></td>
</tr>
</table>
</form>