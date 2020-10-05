<?php
include "page_template.php";
$view_by_user='';
$total=0;
if(isset($_GET['user'])){
    $view_by_user=$_GET['user'];
}
$date_cur=date("Y-m-d");
if(isset($_GET['date'])){
    $date_cur=$_GET['date'];
}

if(isset($_POST['submit_add_salary'])){
    $view_by_user=$_POST['view_user'];
    $month_end=$_POST['month_end'];
    $note=addslashes($_POST['note']);
    $salary=$_POST['salary'];
    $info=mysqli_query($link,"SELECT COUNT(*) as c,`dates` FROM `work_chat` WHERE `user_name` = '$view_by_user'");
    $arr_data_info=mysqli_fetch_array($info);
    $u_count=$arr_data_info['c'];
    $month_start=$arr_data_info['dates'];

    if(intval($_POST['add_chat_other'])){
        $u_count=$u_count+intval($_POST['add_chat_other']);
    }

    $add_salary=mysqli_query($link,"INSERT INTO `work_salary` (`user_name`, `month_start`, `month_end`, `salary`, `count_action`, `note`) VALUES ('$view_by_user', '$month_start', '$month_end', '$salary', '$u_count', '$note');");
    echo '<p><b class="alert">Thanh toán thành công !!!</b></p>';
    $delet_log_month=mysqli_query($link,"DELETE FROM `work_chat`  WHERE `user_name` = '$view_by_user';");
    unset($_POST);

}

if($view_by_user!='') {
    include "template_review_salary.php";
}
?>
<form class="box_form_add_chat" style="margin-left: 5px;" method="post" action="">
    <div class="row line">
        <strong><i class="fas fa-donate"></i> Thanh toán lương</strong><br />
        <i style="font-size:10px;">Thanh toán lương cho các thành viên trong nhóm</i>
    </div>
    <div class="row line">
        <label>Nhân viên</label>
        <select name="view_user" id="view_user">
            <?php
            $msql_all_user2=mysqli_query($link,'SELECT `user_name` FROM `work_user`');
            while($row_user=mysqli_fetch_assoc($msql_all_user2)){
            ?>
            <option value="<?php echo $row_user['user_name'];  ?>" <?php if($row_user['user_name']==$view_by_user){ echo 'selected="true"';} ?>><?php echo $row_user['user_name'];  ?></option>
            <?php
            }
            ?>
        </select>
        <a class="buttonPro small" onclick="review_pay();"><i class="fa fa-play" aria-hidden="true"></i> Xem lương</a>
    </div>

    <div class="row line">
        <label>Ngày</label>
        <input name="month_end" type="text" id="view_user_date" value="<?php echo $date_cur;?>" />
    </div>

    <div class="row line">
        <label>số tiền</label>
        <input name="salary" type="text" id="salary"  value="<?php echo $total;?>" />
    </div>

    <div class="row line">
        <label>Bổ sung tác vụ</label>
        <input name="add_chat_other" type="text" id="add_chat_other" />
    </div>

    <div class="row line">
        <label>Ghi chú</label>
        <textarea name="note" style="height: 200px;width: 100%;"></textarea>
    </div>

    <div class="row">
        <input type="hidden" value="<?php echo $user_name;?>" name="user_work" />
        <label>&nbsp;</label>
        <input name="submit_add_salary" type="submit" class="buttonPro blue" value="Thanh toán"/>
    </div>
</form>

<script>
    function  review_pay() {
        var view_user=$("#view_user").val();
        window.location.href="<?php echo $url;?>/?page_show=tool_payroll&user="+view_user;
    }
</script>
