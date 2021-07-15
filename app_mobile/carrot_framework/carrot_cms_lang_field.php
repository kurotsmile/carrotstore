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
        if($data_lang!=null){
            $data_lang=json_decode($data_lang[$field_data]);
            $data_lang->{$field_show}=$data_val[$i];

            $data_obj=json_encode($data_lang,JSON_UNESCAPED_UNICODE);
            $data_obj=addslashes($data_obj);
        }else{
            $data_lang=new stdClass();
            $data_obj=json_encode($data_lang);
        }

        $query_check_exit=$this->q("SELECT `$field_data` FROM `$table_data` WHERE `$field_data_lang_id` = '$lang' LIMIT 1");
        if(mysqli_num_rows($query_check_exit)>0){
            $query_update_obj=mysqli_query($this->link_mysql,"UPDATE `$table_data` SET `$field_data` = '$data_obj' WHERE `$field_data_lang_id`='$lang' LIMIT 1;");
        }else{
            $query_update_obj=mysqli_query($this->link_mysql,"INSERT INTO `$table_data` (`$field_data_lang_id`, `$field_data`) VALUES ('$lang', '$data_obj');");
        }
    }
    echo $this->msg('Cập nhật ngôn ngữ thành công!!!');
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
        <td><strong><?php echo $country['name'];?></strong></td>
        <td><?php echo $field_show; ?></td>
        <td><input type="text" style="width:100%;" name="val[]" id="<?php echo $field_show; ?>_<?php echo $lang;?>" value="<?php echo $val_lang;?>"/></td>
        <td>
            <?php echo $this->copy($field_show.'_'.$lang); ?>
            <?php echo $this->paste($field_show.'_'.$lang); ?>
        </td>
    </tr>
<?php
}
?>
</table>
<button class="buttonPro green"><i class="fa fa-check-circle" aria-hidden="true"></i> Hoàn tất</button>
<input name="field_show" type="hidden" value="<?php echo $field_show;?>"/>
</form>