<table>
<tr>
    <th>Id Người dùng</th>
    <th>Tên</th>
    <th>Điểm số</th>
    <th>Quốc gia</th>
    <th>Ngôn ngữ</th>
    <th>Thao tác</th>
</tr>
<?php
$query_list_socers=$this->q("SELECT * FROM `scores`");
while($s=mysqli_fetch_assoc($query_list_socers)){
?>
    <tr>
        <td><?php echo $s['id_device'];?></td>
        <td><?php echo $s['name_play'];?></td>
        <td><?php echo $s['score'];?></td>
        <td><?php echo $s['lang_key'];?></td>
        <td><?php echo $s['lang_name'];?></td>
        <td><a href="<?php echo $s['id_device'];?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a></td>
    </tr>
<?php
}
?>
</table>