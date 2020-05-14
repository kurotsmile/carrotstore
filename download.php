<?php
include "config.php";
include "database.php";
$type='0';
$id=$_GET['id'];
$lang=$_GET['lang'];

function get_content($URL){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $URL);
      $data = curl_exec($ch);
      curl_close($ch);
      return $data;
}


$query_music=mysqli_query($link,"SELECT `chat`,`file_url` FROM `app_my_girl_$lang` WHERE `effect` = '2' AND `id`='$id'");
$data_music=mysqli_fetch_array($query_music);
$name_music=$data_music['chat'];
if(trim($data_music['file_url'])==''){
	$url_mp3='app_mygirl/app_my_girl_'.$lang.'/'.$id.'.mp3';
    header('Content-Description: File Transfer');
    header('Cache-Control: public, must-revalidate, max-age=0'); // HTTP/1.1
    header('Pragma: public');
    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    header('Content-Type: application/force-download'); // force download dialog
    header('Content-Type: application/octet-stream', false);
    header('Content-Type: application/download', false);
    header('Content-Disposition: attachment; filename="'.$name_music.'.mp3";'); // use the Content-Disposition header to supply a recommended filename
    header('Content-Transfer-Encoding: binary');
    readfile($url_mp3);
exit;
}else{
	$url_mp3=$data_music['file_url'];
	header('Content-Description: File Transfer');
    header('Cache-Control: public, must-revalidate, max-age=0'); // HTTP/1.1
    header('Pragma: public');
    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    header('Content-Type: application/force-download'); // force download dialog
    header('Content-Type: application/octet-stream', false);
    header('Content-Type: application/download', false);
    header('Content-Disposition: attachment; filename="music.mp3";'); // use the Content-Disposition header to supply a recommended filename
    header('Content-Transfer-Encoding: binary');
	echo get_content($url_mp3);
	exit;
	//header("Location: $url_mp3");
}

?>