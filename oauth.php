<?php
include "config.php";
include "database.php";
$lang='it';

$query_music=mysqli_query($link,"SELECT `id`, `file_url` FROM `app_my_girl_$lang` WHERE `file_url` != '' AND `effect` = '2'");
while($row_music=mysqli_fetch_assoc($query_music)){
	$file_audio=basename($row_music['file_url']);
	$url_file_get='E:/Carrot Audio/html/html/data_file/mp3/'.$file_audio;
	$url_file_wirte='E:/Xampp/htdocs/carrotstore/app_mygirl/app_my_girl_'.$lang.'/'.$row_music['id'].'.mp3';

		echo '<a href="'.$url_file_get.'">'.$url_file_get.'</a><br/>';
		copy($url_file_get, $url_file_wirte);

}