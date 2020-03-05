
<?php
header('Content-type: text/html; charset=utf-8');
include "../config.php";
include "../database.php";
include "../function.php";
    //echo var_dump($_POST);
    $id=$_POST["id"];
    $created=$_POST["created"];
    $content=addslashes($_POST["content"]);
    $productid=$_POST['productid'];
    $usernames=$_POST['username'];
    $upvote_count=$_POST['upvote_count'];
    $parent=$_POST['parent'];
    $type_comment=$_POST['type_comment'];
    $lang_comment=$_POST['lang_comment'];
    mysql_query("INSERT INTO `comment` (`id_c`, `username`, `comment`, `productid`, `created`,`upvote_count`,`parent`,`type_comment`,`lang`) VALUES ('$id', '$usernames', '$content', '$productid', '$created','$upvote_count','$parent','$type_comment','$lang_comment');");
    
?>