<?php
include "page_template.php";
$view_by_user=$data_user['user_name'];
if(isset($_GET['user'])){
    $view_by_user=$_GET['user'];
}
include "template_review_salary.php";
?>