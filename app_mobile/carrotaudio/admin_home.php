<?php
$disk_free = disk_free_space('/');
$disk_total = disk_total_space('/');
$disk_used = $disk_total - $disk_free;
?>

<div id="info_all">
    <div style="float: left;width:400px;height: 200px;">
        <canvas id="myChart_task" style="position: static;float: left;" width="100px" height="40px"></canvas>
        <script>
            var ctx2 = document.getElementById("myChart_task");
            var myChart2 = new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: ['Đã dùng <?php echo format_filesize($disk_used); ?>','Còn Trống <?php echo format_filesize($disk_free); ?>'],
                    datasets: [{
                        data: [<?php echo $disk_used;?>, <?php echo $disk_free;?>],
                        backgroundColor: ['orange','gray']
                    }]
                }
            });
        </script>
    </div>
    <div style="float: left;width: 60%;font-size: 12px;">
        <div style="padding: 10px;float: left">
        <div style="float: left;font-size: 20px;width: 100%;">Máy chủ dữ liệu có tổng dung lượng là <b><?php echo format_filesize($disk_total,4);?></b></div>
        Đã sử dụng  <b><?php echo format_filesize($disk_used,4);?></b> Dung lượng<br/>
        Còn trống  <b><?php echo format_filesize($disk_free,4);?></b> Dung lượng<br/><br/>
        <ul>
            <li><i><i class="fa fa-plug" aria-hidden="true"></i> Máy chủ này được tạo ra để giải quyết vấn đề lưu trữ dữ liệu cho máy chủ chính <a href="http://carrotstore.com" target="_blank">Carrotstore.com</a> . Tránh khỏi phải đầy dung lượng ,mất dữ liệu quang trọng và quảng lý các tệp tin tải lên dễ dàng hơn</i></li>
            <li><a href="http://carrotstore.com" target="_blank">carrotstore.com</a> Máy chủ chính nơi điều hướng các chức năng liên quan tới ứng dụng và hệ thống các CMS</li>
            <li><?php echo $url;?> Máy chủ lưu trữ âm nhạc và quản lý thông tin, dữ liệu được lưu trữ nhiều nơi nhằm tăng tính bảo mật và không bị mất toàn bộ khi bị tất công hoặc hệ thống gặp vấn đề</li>
        </ul>
            <?php if(isset($_SESSION['user_login'])) {?><a href="<?php echo $url_admin;?>?view=admin_tool_upload" class="buttonPro large orange"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Bắt đầu lưu trữ tệp tin</a><?php }?>
        </div>
    </div>
</div>

<?php
    if(isset($_SESSION['user_login'])) {
        include_once("admin_home_list.php");
    }else{
        include_once("admin_home_login.php");
    }
?>