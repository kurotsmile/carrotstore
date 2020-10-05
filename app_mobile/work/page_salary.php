<?php
$member=0;
$user_name=$_SESSION['login_user'];

include "page_template.php";

if(isset($_GET['del'])){
    $id_del=$_GET['del'];
    $query_delete=mysqli_query($link,"DELETE FROM `work_salary` WHERE ((`id` = '$id_del'));");
    echo '<p><b class="alert">Xóa thành công !!!</b></p>';
}

if(isset($_GET['user_name'])){
    $user_name=$_GET['user_name'];
    $member=0;
}else{
    $user_name=$_SESSION['login_user'];
}

if(isset($_GET['member'])){
    $member=$_GET['member'];
}


    if($member==0){
        $mysql_query_salary=mysqli_query($link,"SELECT * FROM `work_salary` where `user_name`='$user_name' ORDER BY `id` DESC");
    }else{
        $mysql_query_salary=mysqli_query($link,"SELECT * FROM `work_salary` ORDER BY `month_start` DESC");
    }
    


if(mysqli_num_rows($mysql_query_salary)>0){
?>
<table class="table_work">
<tr>
    <th>Ngày bắt đầu</th>
    <th>Ngày kết thúc</th>
    <th>Thành viên</th>
    <th>số tác vụ</th>
    <th>Mức lương đã trả</th>
    <th>Ghi chú</th>
    <?php
    if($data_user[4]=='admin'){
        echo '<th>Hành động</th>';
    }
    ?>
</tr>
<?php

    while($row_user=mysqli_fetch_array($mysql_query_salary)){
        ?>
        <tr>
            <td><?php echo $row_user['month_start']; ?></td>
            <td><?php echo $row_user['month_end']; ?></td>
            <td><?php echo box_user_info_by_username($link,$row_user['user_name']); ?></td>
            <td><?php echo $row_user['count_action']; ?></td>
            <td><?php echo number_format($row_user['salary']); ?></td>
            <td><?php echo $row_user['note']; ?></td>
            <?php
            if($data_user[4]=='admin'){
                echo '<td style="width:90px"><a href="'.$url.'/?page_show=salary&del='.$row_user[0].'" class="buttonPro small red"><i class="fas fa-trash" aria-hidden="true"></i> Xóa</a></td>';
            }
            ?>
        </tr>
        <?php
    }
?>
</table>
<?php
}else{
    echo "<strong>Không có dữ liệu</strong>";
}
?>


<p style="padding: 5px;">
<strong>Mở rộng</strong><br />
<a class="buttonPro small" href="<?php echo $url;?>/?page_show=salary&member=1">Xem lương của tất cả các thành viên</a>
</p>