<?php
$url_carrot_store='https://carrotstore.com';
$id_device='';
$user_id='';
$user_lang='en';
if(isset($_GET['id_device'])) $id_device=$_GET['id_device'];
if(isset($_GET['user_id'])) $user_id=$_GET['user_id'];
if(isset($_GET['user_lang'])) $user_lang=$_GET['user_lang'];
?>
<html>
<head>
<title>Upload Avatar</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#76d3ff">
<link rel="icon" href="<?php echo $url_carrot_store;?>/app_mobile/contactstore/ico.ico"/>
<script src="<?php echo $url_carrot_store;?>/js/jquery.js"></script>
<link href="<?php echo $url_carrot_store;?>/assets/css/buttonPro.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo $url_carrot_store;?>/assets/css/font-awesome.min.css"/>
<style>
body{background-color: #76d3ff;text-align: center;font-family: "Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;}
#contain{width: 100%;float: left;}
#list_contact{float:left;width:100%;}
#list_contact .item_contact{width: 100%;float: left;background-color: white;border-radius: 5px;margin-bottom:3px;}
#list_contact .item_contact .img{width:30px;height:30px;float:left;margin:10px;}
#list_contact .item_contact .name{font-size:10px;margin-top:10px;float: left;}
#error_brower{display: none;background: #fffbef;padding: 5px;border-radius: 5px;float: left;}
</style>
</head>
<body>
<pre id="log"></pre>
<div id="contain">
<input type="file" class="buttonPro" value="Tải ảnh lên" />
</div>
<body>
</html>