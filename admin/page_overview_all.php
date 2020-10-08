<?php
$query_list_country=mysqli_query($link,"SELECT `key`, `name`, `country_code`, `id` FROM `app_my_girl_country` LIMIT 50");
while($row=mysqli_fetch_assoc($query_list_country)){
	$key_country=$row['key'];
	$query_count_account=mysqli_query($link,"SELECT COUNT(`id_device`) as c FROM `app_my_girl_user_$key_country` WHERE `password` != '' AND `sdt` != ''");
	if($query_count_account){
		$data_count_account=mysqli_fetch_assoc($query_count_account);
	}else{
		$data_count_account['c']='0';
	}

	$query_count_order=mysqli_query($link,"SELECT COUNT(`id_order`) as c FROM `order` WHERE `lang` = '$key_country'");
	if($query_count_order){
		$data_count_order=mysqli_fetch_assoc($query_count_order);
	}else{
		$data_count_order['c']='0';
	}

	$query_count_key_product=mysqli_query($link,"SELECT COUNT(DISTINCT `key`) as c FROM `product_log_key` WHERE `lang` = '$key_country'");
	if($query_count_key_product){
		$data_count_key_product=mysqli_fetch_assoc($query_count_key_product);
	}else{
		$data_count_key_product['c']='0';
	}

	$query_count_key_music=mysqli_query($link,"SELECT COUNT(DISTINCT `key`) as c FROM `app_my_girl_log_key_music` WHERE `type` = '2' AND `lang` = '$key_country'");
	if($query_count_key_music){
		$data_count_key_music=mysqli_fetch_assoc($query_count_key_music);
	}else{
		$data_count_key_music['c']='0';
	}

	$query_count_product_name=mysqli_query($link,"SELECT COUNT(`id_product`) as c FROM `product_name_$key_country` LIMIT 1");
	if($query_count_product_name){
		$data_count_product_name=mysqli_fetch_assoc($query_count_product_name);
	}else{
		$data_count_product_name['c']='0';
	}

	$query_count_product_desc=mysqli_query($link,"SELECT COUNT(`id_product`) as c FROM `product_desc_$key_country` LIMIT 1");
	if($query_count_product_desc){
		$data_count_product_desc=mysqli_fetch_assoc($query_count_product_desc);
	}else{
		$data_count_product_desc['c']='0';
	}

	$query_count_lang_value=mysqli_query($link,"SELECT COUNT(`key`) as c FROM `lang_$key_country` LIMIT 1");
	if($query_count_lang_value){
		$data_count_lang_value=mysqli_fetch_assoc($query_count_lang_value);
	}else{
		$data_count_lang_value['c']='0';
	}

	if($sub_view=='full'){
		$query_count_msg=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `app_my_girl_msg_$key_country` LIMIT 1");
		if($query_count_msg){
			$data_count_msg=mysqli_fetch_assoc($query_count_msg);
		}else{
			$data_count_msg['c']='0';
		}

		$query_count_chat=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `app_my_girl_$key_country` LIMIT 1");
		if($query_count_chat){
			$data_count_chat=mysqli_fetch_assoc($query_count_chat);
			if(!isset($data_count_chat['c'])){
				$data_count_chat['c']='0';
			}
		}else{
			$data_count_chat['c']='0';
		}

		$query_count_lyrics=mysqli_query($link,"SELECT COUNT(`id_music`) as c FROM `app_my_girl_".$key_country."_lyrics` LIMIT 1");
		if($query_count_lyrics){
			$data_count_lyrics=mysqli_fetch_assoc($query_count_lyrics);
		}else{
			$data_count_lyrics['c']='0';
		}

		$query_count_ytb=mysqli_query($link,"SELECT COUNT(`id_chat`) as c FROM `app_my_girl_video_".$key_country."` LIMIT 1");
		if($query_count_ytb){
			$data_count_ytb=mysqli_fetch_assoc($query_count_ytb);
		}else{
			$data_count_ytb['c']='0';
		}
	}

	echo '<div class="box">';
	echo '<img style="float: left" src="'.$url.'/thumb.php?src='.$url.'/app_mygirl/img/'.$row['key'].'.png&size=16x16&trim=1"/>';
	echo '<strong> '.$row['name'].' </strong></br>';
	echo '<i class="fa fa-dot-circle-o" aria-hidden="true"></i> Mã quốc gia:<b>'.$row['country_code'].'</b> <br/> <a href="'.$url_admin.'/?page_view=page_lang&lang='.$key_country.'"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Từ khóa ngôn ngữ:<b>'.$row['key'].'</b> <span class="syn lang_'.$key_country.'" syn="lang_'.$key_country.'"></span> ('.$data_count_lang_value['c'].')</a></br>';
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

	if($sub_view=='full'){
		echo '<li>';
			echo 'Các dữ liệu khác';
			echo '<ul>';
			echo '<li><a href="'.$url.'/app_my_girl_msg.php?lang='.$key_country.'&character_sex=1" target="_blank">Msg</a> <span class="syn app_my_girl_msg_'.$key_country.'" syn="app_my_girl_msg_'.$key_country.'"></span>(<b>'.$data_count_msg['c'].'</b>)</li>';
			echo '<li><a href="'.$url.'/app_my_girl_chat.php?lang='.$key_country.'&character_sex=1" target="_blank">Chat</a> <span class="syn app_my_girl_'.$key_country.'" syn="app_my_girl_'.$key_country.'"></span>(<b>'.$data_count_chat['c'].'</b>)</li>';
			echo '<li><a href="'.$url.'/app_my_girl_music_lyrics.php?lang='.$key_country.'" target="_blank">Lyrics</a> <span class="syn app_my_girl_'.$key_country.'_lyrics" syn="app_my_girl_'.$key_country.'_lyrics"></span>(<b>'.$data_count_lyrics['c'].'</b>)</li>';
			echo '<li><a href="'.$url.'/app_my_girl_music_link_youtube.php?lang='.$key_country.'" target="_blank">Youtube link</a> <span class="syn app_my_girl_video_'.$key_country.'" syn="app_my_girl_video_'.$key_country.'"></span>(<b>'.$data_count_ytb['c'].'</b>)</li>';
			echo '</ul>';
		echo '</li>';
	}

	echo '</ul>';
	echo '</div>';
}
?>