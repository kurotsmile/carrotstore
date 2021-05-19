<?php
$field_show=$_GET['field_show'];
$data_obj=$this->data_temp;
$field_data_lang_id=$data_obj->field_data_lang_id;
$field_data=$data_obj->field_data;
$table_data=$data_obj->table_data;
$list_country=$this->get_list_lang();
?>

<?php
if(isset($_POST['val'])){
    $data_val=$_POST['val'];
    $field_show=$_POST['field_show'];
    for($i=0;$i<count($list_country);$i++){
        $item_country=$list_country[$i];
        $lang=$item_country['key'];
        $query_data=mysqli_query($this->link_mysql,"SELECT `$field_data` FROM `$table_data` WHERE `$field_data_lang_id`='$lang' LIMIT 1");
        $data_lang=mysqli_fetch_assoc($query_data);
        $data_lang=json_decode($data_lang[$field_data]);
        $data_lang->{$field_show}=$data_val[$i];

        $data_obj=json_encode($data_lang,JSON_UNESCAPED_UNICODE);
        $data_obj=addslashes($data_obj);
        $query_update_obj=mysqli_query($this->link_mysql,"UPDATE `$table_data` SET `$field_data` = '$data_obj' WHERE `$field_data_lang_id`='$lang' LIMIT 1;");
        if($query_update_obj) echo 'Cập nhật ngôn ngữ '.$lang.' thành công!!!<br/>'; else echo 'Cập nhật ngôn ngữ '.$lang.' Thất bại!!!<br/>';
    }
}
?>

<form method="post">
<table>
<?php
foreach ($list_country as $country){
    $lang=$country['key'];
    $query_data=mysqli_query($this->link_mysql,"SELECT `$field_data` FROM `$table_data` WHERE `$field_data_lang_id`='$lang' LIMIT 1");
    $data_lang=mysqli_fetch_assoc($query_data);
    $data_lang=json_decode($data_lang[$field_data]);
    if(isset($data_lang->{$field_show})) $val_lang=$data_lang->{$field_show}; else $val_lang="";
?>
    <tr>
        <td><?php echo $country['name'];?></td>
        <td><input name="val[]" value="<?php echo $val_lang;?>"/></td>
    </tr>
<?php
}
?>
</table>
<button class="btn green">Hoàn tất</button>
<input name="field_show" type="hidden" value="<?php echo $field_show;?>"/>
</form>