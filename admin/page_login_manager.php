<?php
$lang='vi';
$acc_status='';

if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}

if(isset($_GET['acc_status'])){
    $acc_status=$_GET['acc_status'];
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
    <a href="<?php echo $url_admin;?>/?page_view=page_login_manager&lang=<?php echo $country['key'];?>" <?php if($lang==$country['key']){ ?>class="active"<?php }?>><img style="float: left" src="<?php echo $url;?>/thumb.php?src=<?php echo $url;?>/app_mygirl/img/<?php echo $country['key'];?>.png&size=16x16&trim=1"><?php echo $country['name'];?></a>
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
$url_cur_page=$url_admin.'?page_view=page_login_manager&lang='.$lang;
$limit = '80';
$query_count_all = mysqli_query($link,"SELECT COUNT(`id_device`) as c FROM `app_my_girl_user_".$lang."` where `password`!='' AND `sdt`!='' ");
$data_count_all_acc = mysqli_fetch_assoc($query_count_all);
$total_records =intval($data_count_all_acc['c']);
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$total_page = ceil($total_records / $limit);
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}
$start = ($current_page - 1) * $limit;
?>
<tr>
    <td colspan="5">
        <strong>Trang</strong>:
        <?php 
            for($i=1;$i<=$total_page;$i++){ 
                if($i==$current_page){
                    echo '<a href="'.$url_cur_page.'&page='.$i.'" class="buttonPro small black">'.$i.'</a>'; 
                }else{
                    echo '<a href="'.$url_cur_page.'&page='.$i.'" class="buttonPro small blue">'.$i.'</a>'; 
                }
            }
        ?>
    </td>
</tr>
<?php
if($acc_status==''){
    $list_login=mysqli_query($link,"SELECT `name`,`id_device`,`password`,`sdt`,`date_start`,`status` FROM `app_my_girl_user_$lang` where `password`!='' AND `sdt`!='' LIMIT $start, $limit");
}else{
    $list_login=mysqli_query($link,"SELECT `name`,`id_device`,`password`,`sdt`,`date_start`,`status` FROM `app_my_girl_user_$lang` where `password`!='' AND `sdt`!='' AND `status`='$acc_status' LIMIT $start, $limit");
}
echo mysqli_error($link);
while($row=mysqli_fetch_assoc($list_login)){
?>
    <tr>
        <td>
            <a class="buttonPro small" href="<?php echo $url;?>/user/<?php echo $row['id_device'];?>/<?php echo $lang;?>" target="_blank">
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
<tr>
    <td colspan="5">
        <strong>Trang</strong>:
        <?php 
            for($i=1;$i<=$total_page;$i++){ 
                if($i==$current_page){
                    echo '<a href="'.$url_cur_page.'&page='.$i.'" class="buttonPro small black">'.$i.'</a>'; 
                }else{
                    echo '<a href="'.$url_cur_page.'&page='.$i.'" class="buttonPro small blue">'.$i.'</a>'; 
                }
            }
        ?>
    </td>
</tr>
</table>