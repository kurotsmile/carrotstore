<div class="body">
    <h3>Kiểm tra từ khóa "<?php echo $_GET['key'];?>"</h3>
<?php
$key=$_GET['key'];
$langsel=$_GET['lang'];
$sex=$_GET['sex'];
$character_sex=$_GET['character_sex'];

$query_check_key=mysql_query("SELECT * FROM `app_my_girl_$langsel` WHERE `text` = '$key' AND `sex` = '$sex' AND `character_sex` = '$character_sex' AND `pater` = ''");
if(mysql_num_rows($query_check_key)){
    echo '<b>Sơ cấp</b> Từ khóa trò chuyện được truy vấn:';
}else{
    echo '<b>Thứ cấp</b> Từ khóa trò chuyện được truy vấn:';
    $query_check_key=mysql_query("SELECT * FROM `app_my_girl_$langsel` WHERE MATCH (`text`) AGAINST ('$key') AND `sex` = '$sex' AND `character_sex` = '$character_sex' AND `pater` = ''");
}
if(mysql_num_rows($query_check_key)){
while($row_chat=mysql_fetch_array($query_check_key)){
    echo '<table>';
    echo show_row_chat_prefab($row_chat,$langsel,'');
    echo '</table>';
}
}else{
    echo '<br/><strong><i class="fa fa-exclamation" aria-hidden="true"></i> Không có dữ liệu</strong>';
}

?>
</div>