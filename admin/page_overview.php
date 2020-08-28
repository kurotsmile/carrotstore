<?php
$query_list_country=mysqli_query($link,"SELECT `key`, `name`, `country_code`, `id` FROM `app_my_girl_country` LIMIT 50");
while($row=mysqli_fetch_assoc($query_list_country)){
	$key_country=$row['key'];
	$query_count_account=mysqli_query($link,"SELECT COUNT(`id_device`) as c FROM `app_my_girl_user_$key_country` WHERE `password` != '' AND `sdt` != ''");
	$data_count_account=mysqli_fetch_assoc($query_count_account);

	$query_count_order=mysqli_query($link,"SELECT COUNT(`id_order`) as c FROM `order` WHERE `lang` = '$key_country'");
	$data_count_order=mysqli_fetch_assoc($query_count_order);

	$query_count_key_product=mysqli_query($link,"SELECT COUNT(DISTINCT `key`) as c FROM `product_log_key` WHERE `lang` = '$key_country'");
	$data_count_key_product=mysqli_fetch_assoc($query_count_key_product);

	$query_count_key_music=mysqli_query($link,"SELECT COUNT(DISTINCT `key`) as c FROM `app_my_girl_log_key_music` WHERE `type` = '2' AND `lang` = '$key_country'");
	$data_count_key_music=mysqli_fetch_assoc($query_count_key_music);

	$query_count_product_name=mysqli_query($link,"SELECT COUNT(`id_product`) as c FROM `product_name_$key_country` LIMIT 1");
	$data_count_product_name=mysqli_fetch_assoc($query_count_product_name);

	$query_count_product_desc=mysqli_query($link,"SELECT COUNT(`id_product`) as c FROM `product_desc_$key_country` LIMIT 1");
	$data_count_product_desc=mysqli_fetch_assoc($query_count_product_desc);

	echo '<div class="box">';
	echo '<img style="float: left" src="'.$url.'/thumb.php?src='.$url.'/app_mygirl/img/'.$row['key'].'.png&size=16x16&trim=1"/>';
	echo '<strong> '.$row['name'].' </strong></br>';
	echo '<i class="fa fa-dot-circle-o" aria-hidden="true"></i> Mã quốc gia:<b>'.$row['country_code'].'</b> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> Từ khóa ngôn ngữ:<b>'.$row['key'].'</b></br>';
	echo '<ul>';
	echo '<li><a href="'.$url.'/admin/?page_view=page_login_manager&lang='.$key_country.'"><span class="syn app_my_girl_user_'.$key_country.'" syn="app_my_girl_user_'.$key_country.'"></span> Số tài khoản đã xác thực:<b>'.$data_count_account['c'].'</b></a></li>';
	echo '<li>Đơn hàng đã thanh toán:<b>'.$data_count_order['c'].'</b></li>';
	echo '<li>';
		echo 'Lịch sử tìm kiếm';
		echo '<ul>';
		echo '<li><a href="'.$url.'/admin/?page_view=page_product&sub_view=page_product_key_log">sản phẩm (<b>'.$data_count_key_product['c'].'</b>)</a></li>';
		echo '<li><a href="'.$url.'/app_my_girl_music_log_key.php?lang='.$key_country.'" target="_blank">âm nhạc (<b>'.$data_count_key_music['c'].'</b>)</a></li>';
		echo '</ul>';
	echo '</li>';
	echo '<li>';
		echo 'Nội dung Sản phẩm';
		echo '<ul>';
		echo '<li><span class="syn product_name_'.$key_country.'" syn="product_name_'.$key_country.'"></span>Tiêu đề (<b>'.$data_count_product_name['c'].'</b>)</li>';
		echo '<li><span class="syn product_desc_'.$key_country.'" syn="product_desc_'.$key_country.'"></span>Mô tả (<b>'.$data_count_product_desc['c'].'</b>)</li>';
		echo '</ul>';
	echo '</li>';
	echo '</ul>';
	echo '</div>';
}
?>