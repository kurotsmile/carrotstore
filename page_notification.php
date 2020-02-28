<div style="float: left;width: 90%;padding: 20px;">
<?php
$id_user=$_SESSION['username_login'];
$result=mysql_query("SELECT * FROM `notification` WHERE `user` = '$id_user' ORDER BY `id` DESC");
?>
<h3><?php echo lang('thong_bao');?></h3>
<?php
while($row=mysql_fetch_array($result)){
    include "template/field_notification.php";
}
?>
</div>
