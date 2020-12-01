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

		$query_count_field_chat=mysqli_query($link,"SELECT COUNT(`id_chat`) as c FROM `app_my_girl_field_$key_country` LIMIT 1");
		if($query_count_field_chat){
			$data_count_field_chat=mysqli_fetch_assoc($query_count_field_chat);
			if(!isset($data_count_field_chat['c'])){
				$data_count_field_chat['c']='0';
			}
		}else{
			$data_count_field_chat['c']='0';
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

		$query_count_rate_music=mysqli_query($link,"SELECT COUNT(`device_id`) as c FROM `app_my_girl_music_data_pt` LIMIT 1");
		if($query_count_rate_music){
			$data_count_rate_music=mysqli_fetch_assoc($query_count_rate_music);
			if(!isset($data_count_rate_music['c'])){
				$data_count_rate_music['c']='0';
			}
		}else{
			$data_count_rate_music['c']='0';
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
			echo '<li><a href="#">Trường dữ liệu Chat</a> <span class="syn app_my_girl_field_'.$key_country.'" syn="app_my_girl_field_'.$key_country.'"></span>(<b>'.$data_count_field_chat['c'].'</b>)</li>';
			echo '<li><a href="'.$url.'/app_my_girl_music_lyrics.php?lang='.$key_country.'" target="_blank">Lyrics</a> <span class="syn app_my_girl_'.$key_country.'_lyrics" syn="app_my_girl_'.$key_country.'_lyrics"></span>(<b>'.$data_count_lyrics['c'].'</b>)</li>';
			echo '<li><a href="'.$url.'/app_my_girl_music_link_youtube.php?lang='.$key_country.'" target="_blank">Youtube link</a> <span class="syn app_my_girl_video_'.$key_country.'" syn="app_my_girl_video_'.$key_country.'"></span>(<b>'.$data_count_ytb['c'].'</b>)</li>';
			echo '<li><a href="#">Đánh giá âm nhạc</a> <span class="syn app_my_girl_music_data_'.$key_country.'" syn="app_my_girl_music_data_'.$key_country.'"></span>(<b>'.$data_count_rate_music['c'].'</b>)</li>';
			echo '</ul>';
		echo '</li>';
	}

	echo '</ul>';
	echo '</div>';
}

if($sub_view=='full'){
	echo '<div class="box">';
	echo '<strong>Các đối tượng khác</strong>';
	echo '<ul>';
	echo '<li>Cài đặt <span class="syn setting" syn="setting"></span></li>';
	echo '<li>Đánh giá sản phẩm <span class="syn product_rate" syn="product_rate"></span></li>';
	echo '<li>Các loại sản phẩm <span class="syn type" syn="type"></span></li>';
	echo '<li>Bình luận sản phẩm <span class="syn comment" syn="comment"></span></li>';
	echo '<li>Radio <span class="syn app_my_girl_radio" syn="app_my_girl_radio"></span></li>';
	echo '<li>Hiệu ứng trò chuyện (biểu tượng)<span class="syn app_my_girl_effect" syn="app_my_girl_effect"></span></li>';
	echo '<li>Nhân vật <span class="syn app_my_girl_preson" syn="app_my_girl_preson"></span></li>';
	echo '<li>Từ khóa trò chuyện cảnh báo (các mứt độ giới hạng trò chuyện) <span class="syn app_my_girl_keyword_warning" syn="app_my_girl_keyword_warning"></span></li>';
	echo '<li>Ảnh nền <span class="syn app_my_girl_background" syn="app_my_girl_background"></span></li>';
	echo '<li>Các chuyên đề ảnh nền <span class="syn app_my_girl_bk_category" syn="app_my_girl_bk_category"></span></li>';
	echo '<li>Từ khóa âm nhạc đã duyệt <span class="syn app_my_girl_remove_key_music" syn="app_my_girl_remove_key_music"></span></li>';

	echo '<li> Lịch sử';
	echo '<ul>';
	echo '<li>Lịch sử từ khóa tìm kiếm âm nhạc <span class="syn app_my_girl_log_key_music" syn="app_my_girl_log_key_music"></span></li>';
	echo '<li>Lịch sử thống kê lượt trò chuyện theo năm <span class="syn app_my_girl_log_data" syn="app_my_girl_log_data"></span></li>';
	echo '<li>Lịch sử thống kê lượt trò chuyện theo tháng <span class="syn app_my_girl_log_month" syn="app_my_girl_log_month"></span></li>';
	echo '<li>Lịch sử trò chuyện trong ngày <span class="syn app_my_girl_key" syn="app_my_girl_key"></span></li>';
	echo '</ul>';
	echo '</li>';

	echo '<li>Báo lỗi người dùng <span class="syn app_my_girl_report" syn="app_my_girl_report"></span></li>';
	echo '<li>Dữ liệu dạy trò chuyện <span class="syn app_my_girl_brain" syn="app_my_girl_brain"></span></li>';
	echo '<li>Ngôn ngữ hiển thị (vl) <span class="syn app_my_girl_display_lang" syn="app_my_girl_display_lang"></span></li>';
	echo '<li>Ngôn ngữ cms (vl) <span class="syn app_my_girl_display_lang_data" syn="app_my_girl_display_lang_data"></span></li>';
	echo '<li>Ngôn ngữ ứng dụng (vl) <span class="syn app_my_girl_key_lang" syn="app_my_girl_key_lang"></span></li>';
	echo '<li><a href="'.$url.'/app_my_girl_storage.php" target="_blank">Lưu trữ các mục trò chuyện (đánh dấu trò chuyện)</a> <span class="syn app_my_girl_storage" syn="app_my_girl_storage"></span></li>';
	echo '<li><a href="'.$url.'/app_my_girl_manager_country.php" target="_blank">Cấu trúc các quốc gia</a> <span class="syn app_my_girl_country" syn="app_my_girl_country"></span></li>';
	echo '<li><a href="'.$url.'/app_my_girl_handling.php?func=manager_function" target="_blank" title="app_my_girl_function">Chức năng ứng dụng (vl)</a> <span class="syn app_my_girl_function" syn="app_my_girl_function"></span></li>';
	echo '</ul>';
	echo '</div>';
}
?>
