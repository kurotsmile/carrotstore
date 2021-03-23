<?php
include "config.php";
include "database.php";
?>
<html>
<head>
<head>
    <title>Fish of prey</title>
    <link rel="icon" href="<?php echo $url;?>/icon.ico"/>
    <meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?php echo $url_carrot_store;?>/assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo $url;?>/style.css"/>
    <script src="<?php echo $url_carrot_store;?>/js/jquery.js"></script>
    <link href="<?php echo $url_carrot_store;?>/assets/css/buttonPro.min.css" rel="stylesheet" />
    <script src="<?php echo $url_carrot_store;?>/dist/sweetalert.min.js?v=<?php echo $ver;?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $url_carrot_store;?>/dist/sweetalert.min.css?v=<?php echo $ver;?>"/>
</head>
<body>
<div id="head_menu">
    <a class="title" href="<?php echo $url;?>">Fish of prey</a>
</div>
<table>
<tr>
    <th>Id Người dùng</th>
    <th>Tên</th>
    <th>Điểm số</th>
    <th>Quốc gia</th>
    <th>Ngôn ngữ</th>
    <th>Thao tác</th>
</tr>
<?php
$query_list_socers=mysqli_query($link,"SELECT * FROM `scores`");
while($row=mysqli_fetch_assoc($query_list_socers)){
?>
    <tr>
        <td><?php echo $row['id_device'];?></td>
        <td><?php echo $row['name_play'];?></td>
        <td><?php echo $row['score'];?></td>
        <td><?php echo $row['lang_key'];?></td>
        <td><?php echo $row['lang_name'];?></td>
        <td><a href="<?php echo $row['id_device'];?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a></td>
    </tr>
<?php
}
?>
</table>
</body>
</html>