<?php
if(isset($_GET['delete_report'])){
    $delete_report=$_GET['delete_report'];
    $query_delete_report=mysqli_query($link,"DELETE FROM `acc_report` WHERE `id_device` = '$delete_report'");
    echo alert("Xóa đơn khiếu nại tài khoản '$delete_report' thành công !!!");
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
        <td><a href="<?php echo $url_cur;?>&delete_report=<?php echo $row_acc_report['id_device'];?>" class="buttonPro small red"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a></td>
    </tr>
    <?php
}
?>
</table>