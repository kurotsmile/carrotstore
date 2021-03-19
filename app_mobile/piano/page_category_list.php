<?php
if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $query_delete_cat=mysqli_query($link,"DELETE FROM `category` WHERE  `name` = '$id_delete' LIMIT 1;");
    if($query_delete_cat){
        $query_midi_update=mysqli_query($link,"UPDATE `midi` SET `category`='' WHERE `category`='$id_delete'");
        echo msg('Xóa chủ đề '.$id_delete.' thành công! ');
    }
}
?>
<table>
<tr>
    <th>Tên chuyên mục</th>
    <th>Thao tác</th>
</tr>
<?php
$query_list_category=mysqli_query($link,"SELECT * FROM `category`");
while($row_category=mysqli_fetch_assoc($query_list_category)){
?>
    <tr>
        <td><?php echo $row_category['name'];?></td>
        <td>
            <a href="<?php echo $cur_url?>&delete=<?php echo $row_category['name'];?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
            <a href="<?php echo $cur_url?>&sub_view=add&name_category=<?php echo $row_category['name'];?>" class="buttonPro yellow small"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
        </td>
    </tr>
<?php
}
?>
</table>