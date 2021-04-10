<?php
$item=new stdClass();
$item->{"function"}="show_chat";
$item->{"lang"}="vi";
$item->{"id"}="23";
$item->{"type"}="chat";
$item->{"host"}="carrotstore";
?>
<html>
<head>
   <meta http-equiv=Content-Type content="text/html; charset=windows-1252">
</head>
<body >
   <h1>My Deep Link Test page</h1>
   <p><a href="mylover://data">Launch</a></p>
   <p><a href='mylover://data?<?php echo urlencode(json_encode($item)); ?>'>Launch with Parameter</a></p>
   <br/>
   <?php  echo urlencode(json_encode($item)); ?>
</body>
</html>
