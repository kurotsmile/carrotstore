<?php
$lang='vi';
if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}
if(isset($_GET['delete'])){
    $sdt_delete=$_GET['delete'];
    $user_password=$_GET['password'];
    $query_delete=mysqli_query($link,"DELETE FROM `app_my_girl_user_$lang` where `password`='$user_password' AND `sdt`='$sdt_delete'");
    if($query_delete){
        echo alert('Xóa thành công ('.$sdt_delete.')','error');
    }
}

$query_all_country=mysqli_query($link,"SELECT `key`, `name` FROM `app_my_girl_country`");
echo '<div id="bar_menu_sub">';
while ($country=mysqli_fetch_assoc($query_all_country)) {
    ?>
    <a href="<?php echo $url_admin;?>/?page_view=page_login_manager&lang=<?php echo $country['key'];?>"><img style="float: left" src="<?php echo $url;?>/thumb.php?src=<?php echo $url;?>/app_mygirl/img/<?php echo $country['key'];?>.png&size=16x16&trim=1"><?php echo $country['name'];?></a>
    <?php
}
echo '</div>';
?>
<table>
<tr>
    <th style="width: 200px;">Người dùng</th>
    <th>ID</th>
    <th>Thông tin</th>
    <th>Trạng Thái</th>
    <th>Thao tác</th>
</tr>
<?php
$list_login=mysqli_query($link,"SELECT `name`,`id_device`,`password`,`sdt`,`date_start`,`status` FROM `app_my_girl_user_$lang` where `password`!='' AND `sdt`!=''");
echo mysqli_error($link);
while($row=mysqli_fetch_assoc($list_login)){
?>
    <tr>
        <td>
            <a class="buttonPro small" href="<?php echo $url;?>/user/<?php echo $row['id_device'];?>/vi" target="_blank">
                <i class="fa fa-user" aria-hidden="true"></i>
                <?php echo $row['name'];?>
            </a>
        </td>
        <td>
            <i class="fa fa-id-card"></i> <?php echo $row['id_device'];?>
        </td>
        <td>
            <i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo $row['sdt'];?>
            <i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo $row['date_start'];?>
            <i class="fa fa-key" aria-hidden="true"></i> <?php echo $row['password'];?>
        </td>
        <td>
        <?php
            if($row['status']=='0'){
                echo '<i class="fa fa-times-circle"></i> Chia sẻ';
            }else{
                echo '<i class="fa fa-check-circle"></i> không chia sẻ';
            }
        ?>
        </td>
        <td><a href="<?php echo $url;?>/admin/?page_view=page_login_manager&delete=<?php echo $row['sdt'];?>&password=<?php echo $row['password'];?>&lang=<?php echo $lang;?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a></td>
    </tr>
<?php
}
mysqli_free_result($list_login);
?>
</table>