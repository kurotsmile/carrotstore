<?php
$midi_name_file='';
if(isset($_GET['midi_name_file'])){ $midi_name_file=$_GET['midi_name_file'];}
header('Content-Description: File Transfer');
header('Cache-Control: public, must-revalidate, max-age=0');
header('Pragma: public');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); 
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Content-Type: application/force-download');
header('Content-Type: application/octet-stream', false);
header('Content-Type: application/download', false);
header('Content-Disposition: attachment; filename="Piano_MIDI.mid";');
header('Content-Transfer-Encoding: binary');
readfile($midi_name_file);
?>