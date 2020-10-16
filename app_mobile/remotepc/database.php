<?php
$link = mysqli_connect("localhost", "carrot", "123", "pc");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

mysqli_set_charset($link,"utf8");
mysqli_query($link,"SET NAMES 'utf8';"); 
mysqli_query($link,"SET CHARACTER SET 'utf8';"); 
mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci';"); 
?>