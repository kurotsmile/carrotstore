<?php
$key=$_GET['key'];
$list_data_file = mysqli_query($link, "SELECT * FROM `data_file` WHERE `name` LIKE '%$key%' OR `path` LIKE '%$key%' OR `name_file` LIKE '%$key%' LIMIT 50");
include_once  "page_home_list.php";
?>