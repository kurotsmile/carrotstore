
<?php
//$view_by_user=$data_user['user_name'];
?>
<div class="box_form_add_chat" style="width: 500px;margin-left: 5px;">
<div class="row line">
        <strong><i class="fa fa-calculator" aria-hidden="true"></i> Tính lương tháng này của <?php echo $data_user['user_name']; ?></strong><br/>
        <i style="font-size:10px;">Tự tính mức lương của mình nhận được trong tháng</i>
</div>
<?php
    
    $query_all_chat=mysqli_query($link,"SELECT * FROM `work_chat` WHERE `user_name` = '$view_by_user' ");
    $query_count_month=mysqli_query($link,"SELECT * FROM `work_salary` WHERE `user_name` = '$view_by_user' ");

    $total_chat=mysqli_query($link,"SELECT SUM(`count_action`) AS Total FROM `work_salary` WHERE `user_name` = '$view_by_user'");
    $Total_m=mysqli_fetch_array($total_chat);

    $all_chat_by_user=intval(mysqli_num_rows($query_all_chat));
    echo '<div style="padding:2px;">';
    echo "<strong>Chi tiết đánh giá công việc của tháng này</strong>";
    echo '<ul>';
    echo '<li>Tổng số tác vụ tháng này đã làm được:'.$all_chat_by_user.'</li>';
    echo '<li>Tổng số tháng đã làm (không kể tháng hiện tại):'.mysqli_num_rows($query_count_month).' tháng</li>';
    echo '<li>Tổng số các tác vụ các tháng trước:'.intval($Total_m['Total']).'</li>';
    echo '</ul>';
    echo '<div class="row line">';

    echo '</div>';
    echo '</div>';

    mysqli_free_result($query_all_chat);
    mysqli_free_result($query_count_month);
    mysqli_free_result($total_chat);
    echo "<strong>Hóa đơn làm việc</strong>";
?>
    <table>
        <tr>
            <th>Từ khóa</th>
            <th>Tên công việc</th>
            <th>Giá</th>
            <th>Số lượng tác vụ</th>
            <th>Kết quả</th>
        </tr>
        <?php
        $query_parameter=mysqli_query($link,"SELECT `key`,`name`,`price` FROM `work_report_parameters`");
        $total=0;
        while($row_parameter=mysqli_fetch_array($query_parameter)){
            $query_chat_type=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `work_chat` WHERE `type_chat` = '".$row_parameter['key']."' AND `user_name` = '$view_by_user'");
            $data_count=mysqli_fetch_array($query_chat_type);
            $s=intval($data_count['c'])*intval($row_parameter['price']);
            $total=$total+$s;
            if(intval($data_count['c'])>0) {
                echo '<tr>';
                echo '<td>' . $row_parameter['key'] . '</td>';
                echo '<td>' . $row_parameter['name'] . '</td>';
                echo '<td>' . $row_parameter['price'] . '₫</td>';
                echo '<td>x ' . $data_count['c'] . '</td>';
                echo '<td>' . number_format($s) . '₫</td>';
                echo '</tr>';
            }
        }
        ?>
    </table>
    <?php
    echo '<p style="font-size: 18px;text-align: right;">Tổng số tiền nhận được: '.number_format($total).'₫</p>';
    ?>
</div>