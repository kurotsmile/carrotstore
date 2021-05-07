<?php
$key="";
$url_cur=$url."?view=lang&sub_view=key";
if(isset($_POST['key'])){
    $key=$_POST['key'];
    $query_add_key=mysqli_query($link,"INSERT INTO `$table_lang_key` (`key`) VALUES ('$key');");
}

if(isset($_GET['del'])){
    $id_del=$_GET['del'];
    $query_del=mysqli_query($link,"DELETE FROM `lang_key` WHERE `key` = '$id_del' LIMIT 1;");
    echo msg('Delete success '.$id_del);
}
?>
<form method="post" style="width:100%;float:left;margin-top:10px;margin-bottom:10px;">
<label>Từ khóa</label>
<input type="text" value="" name="key"/>
<input type="submit" value="Thêm mới" class="buttonPro small green" >
</form>
<table>
<?php
$query_key=mysqli_query($link,"SELECT `key` FROM `$table_lang_key`");
while ($key=mysqli_fetch_assoc($query_key)) {
    echo '<tr>';
    echo '<td><i class="fa fa-flag" aria-hidden="true"></i> '.$key['key'].'</td>';
    echo '<td><a href="'.$url_cur.'&del='.$key['key'].'" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a></td>';
    echo '</tr>';
}
?>
</table>