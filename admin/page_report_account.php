<?php
if(isset($_GET['delete_report'])){
    $delete_report=$_GET['delete_report'];
    $query_delete_report=mysqli_query($link,"DELETE FROM `acc_report` WHERE `id_device` = '$delete_report'");
    echo alert("Xóa đơn khiếu nại tài khoản '$delete_report' thành công !!!");
}

if(isset($_GET['acc_report_18'])){
    $lang_report=$_GET['lang_report'];
    $acc_report_18=$_GET['acc_report_18'];
    $query_set_acc_18=mysqli_query($link,"UPDATE `app_my_girl_user_$lang_report` SET `status`='2' WHERE `id_device`='$acc_report_18'");
    echo alert("Đã đánh dấu tài khoàn '$acc_report_18' vào mục 18+ thành công !!!");
}

if(isset($_GET['acc_delete_avt'])){
    $lang_report=$_GET['lang_report'];
    $acc_delete_avt=$_GET['acc_delete_avt'];
    $query_delete_report=mysqli_query($link,"DELETE FROM `acc_report` WHERE `id_device` = '$acc_delete_avt'");
    if($query_delete_report){
        unlink("../app_mygirl/app_my_girl_".$lang_report."_user/".$acc_delete_avt.".png");
    }
    echo alert("Đã xóa ảnh đại diện '$acc_delete_avt' thành công !!!");
}

$arr_type=array('Tài khoản kích dục,kiêu dâm','Giả mạo người khác','Vấn đề khác');
?>
<table>
<tr>
    <th>ID</th>
    <th>Loại khiếu nại</th>
    <th>Chi tiết</th>
    <th>Quốc gia</th>
    <th>Thao tác</th>
</tr>
<?php
$url_cur=$url.'/admin/?page_view=page_report_account';
$query_acc_report=mysqli_query($link,"SELECT * FROM `acc_report`");
while($row_acc_report=mysqli_fetch_assoc($query_acc_report)){
    $index_arr=intval($row_acc_report['type']);
    $acc_type=$arr_type[$index_arr];
    ?>
    <tr>
        <td>
            <a class="buttonPro small" href="<?php echo $url;?>/user/<?php echo $row_acc_report['id_device'];?>/<?php echo $row_acc_report['lang'];?>" target="_blank">
                <i class="fa fa-user" aria-hidden="true"></i> <?php echo $row_acc_report['id_device'];?>
            </a>
        </td>
        <td><?php echo $acc_type;?></td>
        <td><?php echo $row_acc_report['txt'];?></td>
        <td><?php echo $row_acc_report['lang'];?></td>
        <td>
            <a href="<?php echo $url_cur;?>&delete_report=<?php echo $row_acc_report['id_device'];?>" class="buttonPro small red"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a>
            <?php
            if($index_arr==0){
            ?>
            <a href="<?php echo $url_cur;?>&acc_report_18=<?php echo $row_acc_report['id_device'];?>&lang_report=<?php echo $row_acc_report['lang'];?>" class="buttonPro small yellow"><i class="fa fa-grav" aria-hidden="true"></i> Xát thực đây là tài khoản 18+</a>
            <a href="<?php echo $url_cur;?>&acc_delete_avt=<?php echo $row_acc_report['id_device'];?>&lang_report=<?php echo $row_acc_report['lang'];?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa ảnh đại diện</a>
            <?php }?>
        </td>
    </tr>
    <?php
}
?>
</table>