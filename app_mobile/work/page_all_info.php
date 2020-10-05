<?php
include "page_template.php";
$query_count_task=mysqli_query($link,"SELECT COUNT(`id`) FROM `work_task`");
$count_all_task=mysqli_fetch_array($query_count_task);

$sum_salary_all_user=mysqli_query($link,"SELECT SUM(Replace (`salary`,'.','')) as s FROM `work_salary`");
$data_sum_salary_all=mysqli_fetch_array($sum_salary_all_user);

?>
<div style="float: left; width: 100%;background-color: #f2f2f2;margin-bottom: 5px;">
    <table>
        <tr>
            <td rowspan="4" style="width: 97px;text-align: center;color: #d6a365;"><i class="fas fa-info-circle" style="font-size: 50px;"></i></td>
            <td>
                <strong>Tổng quan</strong>
                <br />
                <i class="fas fa-flask"></i> Tổng số nhiệm vụ <b style="color: red;"><?php echo $count_all_task[0];?></b><br />
                <i class="fas fa-dollar-sign"></i> Tổng số tiền đã thanh toán cho các thành viên <b style="color: red;"><?php echo number_format($data_sum_salary_all['s']); ?></b> vnđ
            </td>
        </tr>
    </table>
</div>
<?php
$query_users=mysqli_query($link,"SELECT * FROM `work_user` ORDER  BY RAND()");

while($row_user=mysqli_fetch_array($query_users)){
    $url_avart_user=$url.'/image/avatar_default.png';
    if(file_exists("avatar_user/".$row_user['user_id'].".png")){
        $url_avart_user=$url."/avatar_user/".$row_user['user_id'].".png";;
    }
    $query_count_task=mysqli_query($link,"SELECT COUNT(`id`) FROM `work_task` WHERE `user_work` = '".$row_user['user_id']."'");
    $count_all_task=mysqli_fetch_array($query_count_task);
    
    $sum_task_user=mysqli_query($link,"SELECT SUM(`count_action`) as c FROM `work_salary` WHERE `user_name` = '".$row_user['user_name']."'");
    $data_sum_task_user=mysqli_fetch_array($sum_task_user);
    
    $sum_salary_user=mysqli_query($link,"SELECT SUM(Replace (`salary`,'.','')) as s FROM `work_salary` WHERE `user_name`='".$row_user['user_name']."'");
    $data_sum_salary_user=mysqli_fetch_array($sum_salary_user);
    
    $count_month_work=mysqli_query($link,"SELECT COUNT(`id`) FROM `work_salary` WHERE `user_name`='".$row_user['user_name']."' ");
    $data_count_month_worl=mysqli_fetch_array($count_month_work);
    
    $query_report_user=mysqli_query($link,"SELECT `id_work` FROM `work_report` WHERE `user_name`='".$row_user['user_name']."'");
    
    $query_count_task=mysqli_query($link,"SELECT * FROM `work_task` WHERE `user_work` = '".$row_user["user_id"]."'");
    $query_count_task_cancel=mysqli_query($link,"SELECT * FROM `work_task` WHERE `user_work` = '".$row_user["user_id"]."' AND status='1'");
    $query_count_task_complete=mysqli_query($link,"SELECT * FROM `work_task` WHERE `user_work` = '".$row_user["user_id"]."' AND status='2'");
    $query_count_task_work=mysqli_query($link,"SELECT * FROM `work_task` WHERE `user_work` = '".$row_user["user_id"]."' AND status='0'");
    
    $n_count_complete=mysqli_num_rows($query_count_task_complete);
	if($n_count_complete>0){
		$num_complete=($n_count_complete*100)/mysqli_num_rows($query_count_task);
		$num_complete=round($num_complete,0);
	}
    
    $n_count_cancel=mysqli_num_rows($query_count_task_cancel);
	if($n_count_cancel>0){
		$num_cancel=($n_count_cancel*100)/mysqli_num_rows($query_count_task);
		$num_cancel=round($num_cancel,0);
	}
    
    $n_count_work=mysqli_num_rows($query_count_task_work);
	if($n_count_work>0){
		$num_work=($n_count_work*100)/mysqli_num_rows($query_count_task);
		$num_work=round($num_work,0);
	}
?>
<div id="work_current" class="box_form_add_chat" style="width: 500px;margin-right: 5px;margin-left: 5px;height: auto;min-height: 200px;margin-bottom: 5px;">
    <table>
        <tr>
            <td rowspan="6" style="width: 155px;"><a href="<?php echo $url;?>/?page_show=info_user&user_id=<?php echo $row_user['user_id']; ?>"><img src="<?php echo thumb_img($url_avart_user,'150'); ?>" /></a></td>
            <td>
                <strong><?php echo $row_user['user_name'];?></strong><br />
                <i><?php echo $row_user['user_role'];?></i>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td style="font-size: 11px;text-align: left;">
                <i class="fas fa-flask"></i> Tổng số nhiệm vụ <b style="color: red;"><?php echo $count_all_task[0];?></b>
                <ul style="margin: 0px;">
                    <li><a href="<?php echo $url;?>/?page_show=manager_task&user_id=<?php echo $row_user['user_id'];?>&status=0">Đang làm</a>:<b style="color: red;"><?php echo $n_count_work; ?></b></li>
                    <li><a href="<?php echo $url;?>/?page_show=manager_task&user_id=<?php echo $row_user['user_id'];?>&status=2">Hoàn tất</a>: <b style="color: red;"><?php echo $n_count_complete; ?></b></li>
                    <li><a href="<?php echo $url;?>/?page_show=manager_task&user_id=<?php echo $row_user['user_id'];?>&status=1">Tạm hủy</a>: <b style="color: red;"><?php echo $n_count_cancel; ?></b></li>
                </ul>
            </td>
            <td>
                <a href="<?php echo $url;?>/?page_show=manager_task&user_id=<?php echo $row_user['user_id']; ?>" class="buttonPro small grey"><i class="far fa-arrow-alt-circle-right"></i></a>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td style="font-size: 11px;text-align: left;">
                <i class="fas fa-dollar-sign"></i> <a href="<?php echo $url;?>/?page_show=salary&user_name=<?php echo $row_user['user_name'];?>">Tổng thanh toán đã chi trả</a>: <b style="color: red;"><?php echo number_format($data_sum_salary_user['s']);?></b> vnđ 
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td style="font-size: 11px;text-align: left;"><i class="fas fa-calendar"></i> Tổng sống tháng tham gia làm dữ liệu: <b style="color: red;"><?php echo $data_count_month_worl[0]; ?></b></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td style="font-size: 11px;text-align: left;"><i class="fas fa-tasks"></i> Tổng số tác vụ dữ liệu đã làm: <b style="color: red;"><?php echo $data_sum_task_user['c']; ?></b></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td style="font-size: 11px;text-align: left;"><i class="fas fa-bug"></i> <a href="<?php echo $url;?>/?page_show=manager_report&username=<?php echo $row_user['user_name'];?>">Số lần nhắc nhở</a>: <b style="color: red;"><?php echo mysqli_num_rows($query_report_user); ?></b></td>
            <td>&nbsp;</td>
        </tr>
    </table>
</div>
<?php
}
?>