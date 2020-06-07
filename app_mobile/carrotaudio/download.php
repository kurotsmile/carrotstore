<?php
$url_mp3=$_POST['url'];
$file_name=$_POST['name_aduio'];
header('Content-Description: File Transfer');
header('Cache-Control: public, must-revalidate, max-age=0'); 
header('Pragma: public');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); 
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Content-Type: application/force-download'); 
header('Content-Type: application/octet-stream', false);
header('Content-Type: application/download', false);
header('Content-Disposition: attachment; filename="'.$file_name.'.mp3";');
header('Content-Transfer-Encoding: binary');
readfile($url_mp3);
?>