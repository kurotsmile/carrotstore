<?php
include_once("carrot_framework.php");

if($function=="get_list_currency"){
    $query_list_currency=mysqli_query($link,"SELECT * FROM `currency_unit` ORDER BY `code` ");
    
}
?>