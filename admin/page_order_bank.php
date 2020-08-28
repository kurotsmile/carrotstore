<?php
$url_cur=$url.'/admin/?page_view=page_order';
if(isset($_GET['delete'])){
	$id_delete=$_GET['delete'];
	$query_delete=mysqli_query($link,"DELETE FROM `order_bank` WHERE `bank_code` = '$id_delete'  LIMIT 1;");
	if($query_delete){
		echo alert('Xóa ngân hàng thành công ('.$id_delete.')','alert');
	}
}
?>
<table>
<tr>
    <th style="width: 200px;">Mã ngân hàng</th>
    <th>Tên ngân hàng</th>
	<th>Ảnh đại diện</th>
    <th>Thao tác</th>
</tr>
<?php
$list_bank=mysqli_query($link,"SELECT * FROM `order_bank`");
while($row=mysqli_fetch_assoc($list_bank)){
	if(file_exists('../assets/img_bank/'.$row['bank_code'].'.jpg')){
        $url_img=$url.'/assets/img_bank/'.$row['bank_code'].'.jpg';
    }else{
        $url_img=$url.'/product_data/app_default.png';
    }
	$url_img=$url."/thumb.php?src=$url_img&size=50x50&trim=1";
?>
<tr>
	<td><i class="fa fa-university" aria-hidden="true"></i> <?php echo $row['bank_code'];?></td>
	<td><?php echo $row['bank_name'];?></td>
	<td><img src="<?php echo $url_img;?>"/></td>
	<td>
		<a href="<?php echo $url_cur;?>&&sub_view=page_order_bank_add&edit=<?php echo $row['bank_code']; ?>" class="buttonPro small yellow"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
		<a href="<?php echo $url_cur;?>&sub_view=page_order_bank&delete=<?php echo $row['bank_code']; ?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
	</td>
</tr>
<?php
}
?>
</table>