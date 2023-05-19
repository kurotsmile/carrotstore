<?php
include "header.php";
include "functions.php";

echo header_html();

$func='register';
if(isset($_GET['func'])) $func=$_GET['func'];

if($func=='register') echo load_form_register();
if($func=='login') echo login_form();

echo footer_html();

include "footer.php";
?>