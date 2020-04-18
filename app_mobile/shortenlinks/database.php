<?php
$link = mysql_connect($mysql_host, $mysql_user,$mysql_pass);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_selectdb($mysql_database);
mysql_set_charset("utf8", $link);
mysql_query("SET NAMES 'utf8';",$link); 
mysql_query("SET CHARACTER SET 'utf8';",$link); 
mysql_query("SET SESSION collation_connection = 'utf8_general_ci';",$link); 

?>