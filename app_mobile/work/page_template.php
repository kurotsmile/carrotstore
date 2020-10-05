<?php
include "function.php";
?>
<div id="header" style="float: left;">
    <div style="float: left;width:100%;height: 40px;background-color: #397dd2;"><a style="float: left;margin-top: 2px;margin-left: 12px;" href="<?php echo $url;?>"><img src="<?php echo $url_carrot_store;?>/images/logo.png" style="height: 30px;" /></a><span style="float: left;color: white;margin-top: 12px;margin-left: 10px;font-size: 16px;text-shadow: 2px 2px 2px #00000069;"><a style="color: white;" href="<?php echo $url;?>/?page_show=all_info"><i class="fas fa-arrow-alt-circle-right"></i> Làm Việc - Carrot studio game</span></a></div>
    
    <div class="box_user">
    <?php
    $user_name=$_SESSION['login_user'];
    $mysql_query_user=mysqli_query($link,"SELECT * FROM `work_user` WHERE `user_name` = '$user_name' LIMIT 1");
    $data_user=mysqli_fetch_array($mysql_query_user);
    $data_user_price_task=intval($data_user['price_task']);

    $user_work=$data_user['user_name'];
    
    $query_count_day_work=mysqli_query($link,"SELECT COUNT(DISTINCT  `dates`) FROM `work_chat` WHERE `user_name` = '$user_work'");
    if(mysqli_num_rows($query_count_day_work)>0){
        $data_day_count=mysqli_fetch_array($query_count_day_work);
    }else{
        $data_day_count='0';
    }
    
    $query_work_count=mysqli_query($link,"SELECT COUNT(`id`) FROM `work_chat` WHERE `user_name` = '$user_work'");
    $data_user_work_count=mysqli_fetch_array($query_work_count);
    
    $query_month_count=mysqli_query($link,"SELECT `count_action`,`salary` FROM `work_salary` WHERE `user_name` = '$user_work' ORDER BY `month_end` DESC LIMIT 1");
    $data_month_salary=mysqli_fetch_array($query_month_count);
    if(mysqli_num_rows($query_month_count)>0){
        $data_month_count=mysqli_fetch_array($query_month_count);
    }else{
        $data_month_count='0';
    }
    
    $color_count_mont="red";
    if(intval($data_user_work_count[0])>intval($data_month_salary[0])){
        $color_count_mont="green";
    }else{
        $color_count_mont="red";  
    }
    
    $query_app_work=mysqli_query($link,"SELECT * FROM `work_app` ORDER BY RAND() LIMIT 12");
    $query_all_user=mysqli_query($link,"SELECT * FROM `work_user` ORDER BY RAND()");
    
    $url_avart_user=$url.'/image/avatar_default.png';
    if(file_exists("avatar_user/".$data_user['user_id'].".png")){
        $url_avart_user=$url."/avatar_user/".$data_user['user_id'].".png";;
    }

    ?>
    <a href="<?php echo $url;?>/?page_show=info_user"><img src="<?php echo thumb_img($url_avart_user,'100'); ?>" style="width: 78px;height: 78px;float: left;margin-left: 20px;margin-top: 5px;" /></a>
    <ul class="box_user_info">
        <li><strong>Thông tin cá nhân</strong></li>
        <li><i class="fas fa-user"></i> Tên: <strong><?php echo $data_user[1];?></strong></li>
        <li><i class="fas fa-hand-holding-usd"></i> Mức lương: <strong><?php echo number_format($data_month_salary[1]);?> ₫</strong> <?php  echo $data_user["user_wage"];?></li>
        <li><i class="fas fa-user-tag"></i> Chức vụ: <strong><?php echo $data_user[4];?></strong></li>
    </ul>
    
    <ul class="box_user_info">
        <li><strong>Chấm công</strong></li>
        <li><i class="fas fa-tasks"></i> Số ngày đã làm trong tháng này: <strong><?php echo $data_day_count[0];?></strong></li>
        <li><i class="fas fa-tasks"></i> Tác vụ đã làm trong tháng này: <strong id="count_task_month" style="color: <?php echo $color_count_mont;?>;"><?php echo $data_user_work_count[0];?></strong></li>
        <li><i class="fas fa-trophy"></i> Tổng tác vụ tháng trước: <strong><?php echo $data_month_salary[0];?></strong></li>
    </ul>
    
    <ul class="box_user_info" style="width: 180px;margin-bottom: 0px;">
        <li><strong>Sản phẩm</strong></li>
        <?php
        while($row_app=mysqli_fetch_array($query_app_work)){
        ?>
        <li>
            <a target="_blank" href="<?php echo $row_app['url']; ?>"><img style="float: left;width:30px" title="<?php echo $row_app['name']; ?>" src="<?php echo url_image_app($row_app['id'],'30'); ?>" /></a>
        </li>
        <?php }?>
    </ul>
    
    <ul class="box_user_info" style="width: 120px;margin-bottom: 0px;">
        <li><strong>Thành viên</strong></li>
        <?php
        while($row_user_info=mysqli_fetch_array($query_all_user)){
            $url_avart_user_info=$url.'/image/avatar_default.png';
            if(file_exists("avatar_user/".$row_user_info['user_id'].".png")){
                $url_avart_user_info=$url."/avatar_user/".$row_user_info['user_id'].".png";
                $url_avart_user_info=thumb_img($url_avart_user_info,'30');
            }
        ?>
        <li>
            <a href="<?php echo $url; ?>/?page_show=info_user&user_id=<?php echo $row_user_info['user_id']; ?>"><img style="float: left;width:30px" title="<?php echo $row_user_info['user_name']; ?>" src="<?php echo $url_avart_user_info; ?>" /></a>
        </li>
        <?php 
        }
        ?>
    </ul>
    
    <ul class="box_user_info" style="width: 150px;margin-bottom: 0px;text-align: center;">
        <form id="frm_get_salary">
        <li><strong>Số dư chưa thanh toán</strong></li>
        <li style="text-align: center;"><a href="<?php echo $url;?>/?page_show=review_salary"><i style="font-size: 30px;" class="far fa-money-bill-alt"></i></a></li>
        <?php
        $query_parameter=mysqli_query($link,"SELECT `key`,`price` FROM `work_report_parameters`");
        $total=0;
        while($row_parameter=mysqli_fetch_array($query_parameter)){
            $query_chat_type=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `work_chat` WHERE `type_chat` = '".$row_parameter['key']."' AND `user_name` = '$user_work'");
            $data_count=mysqli_fetch_array($query_chat_type);
            $s=intval($data_count['c'])*intval($row_parameter['price']);
            $total=$total+$s;
        }
        ?>
        <li id="account_balance"><?php echo number_format($total).'₫';?></li>
            <input type="hidden" name="function" value="get_salary">
            <input type="hidden" value="<?php echo $user_work;?>" name="user_work" />
        </form>
    </ul>
    

    </div>
    <div class="box_menu" style="margin-top: 10px;margin: 10px;">
        <a class="buttonPro small <?php if($page_show=='work'){ ?>orange<?php }else{ ?>blue<?php }?>" href="<?php echo $url;?>?page_show=work"><i class="fa fa-desktop"></i> Bàn làm việc</a>&nbsp;
        <a class="buttonPro small <?php if($page_show=='char'){ ?>orange<?php }else{ ?>blue<?php }?>" href="<?php echo $url;?>?page_show=char"><i class="fas fa-chart-line"></i> Hiệu năng</a>&nbsp;
        <a class="buttonPro small <?php if($page_show=='help'){ ?>orange<?php }else{ ?>blue<?php }?>" href="<?php echo $url;?>?page_show=help"><i class="fa fa-question-circle"></i> Tài liệu hướng dẫn</a>&nbsp;
        <a class="buttonPro small <?php if($page_show=='salary'){ ?>orange<?php }else{ ?>blue<?php }?>" href="<?php echo $url;?>?page_show=salary"><i class="fa fa-dollar-sign"></i> Lương</a>&nbsp;
        <a class="buttonPro small <?php if($page_show=='manager_alert'){ ?>orange<?php }else{ ?>blue<?php }?>" href="<?php echo $url;?>?page_show=manager_alert"><i class="fas fa-bell"></i> Thông báo</a>&nbsp
        <?php if($data_user['user_role']=='admin'||$data_user['user_role']=='leader'){ ?>
            <a class="buttonPro small <?php if($page_show=='manager_help'){ ?>orange<?php }else{ ?>blue<?php }?>" href="<?php echo $url;?>?page_show=manager_help"><i class="fas fa-book"></i> Quản lý chỉ dẫn</a>&nbsp;
            <a class="buttonPro small <?php if($page_show=='manager_report'){ ?>orange<?php }else{ ?>blue<?php }?>" href="<?php echo $url;?>?page_show=manager_report"><i class="fas fa-bug"></i>  Nhắc nhở</a>&nbsp;
        <?php }?>
        <?php if($data_user['user_role']=='admin'){ ?>
            <a class="buttonPro small <?php if($page_show=='manager_task'){ ?>orange<?php }else{ ?>blue<?php }?>" href="<?php echo $url;?>?page_show=manager_task"><i class="fas fa-flask"></i> Tác vụ</a>&nbsp;
            <a class="buttonPro small <?php if($page_show=='manager_user'){ ?>orange<?php }else{ ?>blue<?php }?>" href="<?php echo $url;?>?page_show=manager_user"><i class="fas fa-users"></i> Quản lý nhân viên</a>
            <a class="buttonPro small <?php if($page_show=='manager_app'){ ?>orange<?php }else{ ?>blue<?php }?>" href="<?php echo $url;?>?page_show=manager_app"><i class="fas fa-rocket"></i> Quản lý ứng dụng</a>&nbsp;
            <a class="buttonPro small <?php if($page_show=='tool'){ ?>orange<?php }else{ ?>blue<?php }?>" href="<?php echo $url;?>?page_show=tool"><i class="fas fa-cog"></i> Công cụ</a>&nbsp;
        <?php }?>
        <a class="buttonPro small <?php if($page_show=='info_user'){ ?>orange<?php }else{ ?>blue<?php }?>" href="<?php echo $url;?>?page_show=info_user"><i class="fas fa-pen-square"></i> Thông tin cá nhân</a>&nbsp;
        <a class="buttonPro small <?php if($page_show=='out'){ ?>orange<?php }else{ ?>blue<?php }?>" href="<?php echo $url;?>?log_out=1"><i class="fa fa-sign-out-alt"></i> Đăng xuất</a>
    </div>
    </div>
</div>

