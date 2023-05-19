<?php
include "header.php";

if(isset($_REQUEST['frm_register'])){
    $email=$_REQUEST['email'];
    $psw=$_REQUEST['psw'];
    $full_names=$_REQUEST['full_names'];
    $user_names=$_REQUEST['user_names'];

    $sql = "INSERT INTO user(`user_name`, `full_name`, `email`,`password`) VALUES ('$user_names','$full_names', '$email', '$psw')";
    if (mysqli_query($conn, $sql)) {
        echo "Created User successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if(isset($_REQUEST['frm_login'])){
    $psw=$_REQUEST['psw'];
    $user_names=$_REQUEST['user_names'];
    $sql = "SELECT *  FROM `user` WHERE `user_name`='$user_names' AND `password` = '$psw' LIMIT 1";
    $check_login=mysqli_query($conn, $sql);
    if ($check_login) {
        if(mysqli_num_rows($check_login)>0) echo "Login successfully";
        else echo "Login Fail";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>