<?php
$filename=$_GET['file'];
header('Content-Description: File Transfer');
header('Cache-Control: public, must-revalidate, max-age=0'); // HTTP/1.1
header('Pragma: public');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
header('Content-Type: application/force-download'); // force download dialog
header('Content-Type: application/octet-stream', false);
header('Content-Type: application/download', false);
header('Content-Disposition: attachment; filename="'.$filename.'";'); // use the Content-Disposition header to supply a recommended filename
header('Content-Transfer-Encoding: binary');
readfile($filename);
exit;
?>