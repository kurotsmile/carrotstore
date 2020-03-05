<?php
header('Content-type: text/html; charset=utf-8');
include "../config.php";
include "../database.php";
    $id=$_POST["id"];
    $upvote_count=$_POST['upvote_count'];
    mysql_query("UPDATE `comment` SET `upvote_count` = '$upvote_count' WHERE `id` = '$id';");
?>