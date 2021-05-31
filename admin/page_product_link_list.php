<?php
if(isset($_GET['delete'])){
	$id_delete=$_GET['delete'];
	$query_delete=mysqli_query($link,"DELETE FROM `product_link_struct` WHERE  `icon` = '$id_delete' ");
	if($query_delete){
		echo alert('Xóa thành công cấu trúc liên kết ('.$id_delete.')','alert');
		unlink('../images_link_store/'.$id_delete.'.jpg');
	}
}
?>
<div style="float: left;width: 100%;">
	<table>
	<?php
	$cur_url=$url.'/admin/?page_view=page_product&sub_view=page_product_link';
	$query_list_link=mysqli_query($link,"SELECT * FROM `product_link_struct`");
	while($row=mysqli_fetch_assoc($query_list_link)){
		if(file_exists('../images_link_store/'.$row['icon'].'.jpg')){
			$url_img=$url.'/images_link_store/'.$row['icon'].'.jpg';
		}else{
			$url_img=$url.'/product_data/app_default.png';
		}
		$url_img=$url."/thumb.php?src=$url_img&size=120x40&trim=1";
		echo '<tr>';
		echo '<td><img src="'.$url_img.'"></td>';
		echo '<td><i class="fa '.$row['icon'].'"></i> '.$row['name'].'</td>';
		echo '<td>';
		echo '<a class="buttonPro small yellow" href="'.$url.'/admin/?page_view=page_product&sub_view=page_product_link&sub_page=page_product_link_add&edit='.$row['icon'].'"><i class="fa fa-edit" aria-hidden="true"></i> Sửa</a>';
		echo '<a class="buttonPro small red" href="'.$cur_url.'&delete='.$row['icon'].'"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>';
		echo '</td>';
		echo '</tr>';
	}
	?>
	</table>
</div>