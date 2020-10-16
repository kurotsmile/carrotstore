<?php
$url_cur=$url.'/index.php?view=list';

if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $query_delete_action=mysqli_query($link,"DELETE FROM `action` WHERE (`id` = '$id_delete');");
}
?>
<table>
<?php
$query_list_act=mysqli_query($link,"select * from `action` ORDER BY `id` DESC");
while($row_act=mysqli_fetch_assoc($query_list_act)){
    ?>
    <tr>
        <td><i class="fa fa-microphone" aria-hidden="true"></i> <?php echo $row_act['txt']; ?></td>
        <td><a href="<?php echo $row_act['value']; ?>" target="_blank"><?php echo $row_act['value']; ?></a></td>
        <td>
            <a href="<?php echo $url;?>/index.php?view=add&edit=<?php echo $row_act['id'];?>" class="buttonPro small yellow"><i class="fa fa-pencil-square" aria-hidden="true"></i> Sửa</a>
            <a href="<?php echo $url_cur;?>&delete=<?php echo $row_act['id'];?>" class="buttonPro small red"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a>
        </td>
    </tr>
    <?php
}
?>
</table>