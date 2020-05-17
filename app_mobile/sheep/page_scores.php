<?php
$lang='vi';

if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}

if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $lang=$_GET['lang'];
    $query_scores_delete=mysqli_query($link,"DELETE FROM `scores` WHERE `id_user` = '$id_delete' AND  `lang` = '$lang'");
    echo mysqli_error($link);
    echo 'Delete success scores id:'.$id_delete.' lang:'.$lang;
    mysqli_free_result($query_scores_delete);
}
?>
<table>
<tr>
    <th>ID thiết bị</th>
    <th>Điểm số</th>
    <th>Ngôn ngữ</th>
    <th>Thao tác</th>
</tr>
<?php
$mysql_get_list_scores=mysqli_query($link,"SELECT * FROM `scores` WHERE `lang`='$lang'");
while($row_player=mysqli_fetch_array($mysql_get_list_scores)){
    ?>
    <tr>
        <td><?php echo get_user($link,$row_player['id_user'],$row_player['lang']);?></td>
        <td><?php echo $row_player['scores'];?></td>
        <td><?php echo $row_player['lang'];?></td>
        <td>
            <a class="buttonPro small red" href="">Xóa</a>
            <a class="buttonPro small yellow" href="<?php echo $url;?>?view=scores_add&edit=<?php echo $row_player['id_user'];?>&lang=<?php echo $row_player['lang'];?>">Sửa</a>
        </td>
    </tr>
    <?php
}
?>
</table>