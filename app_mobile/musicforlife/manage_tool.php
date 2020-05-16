<?php
$url_sub=$url.'/index.php?view=tool';
$sub_view='';
if(isset($_GET['sub'])) {
    $sub_view = $_GET['sub'];
}
?>
<ul>
    <li><a href="<?php echo $url_sub;?>&sub=mysql" class="buttonPro <?php if($sub_view=='mysql'){ echo 'yellow';}?> small"><i class="fa fa-code" aria-hidden="true"></i> Chạy lệnh Mysql</a></li>
    <li><a href="<?php echo $url_sub;?>&sub=backup_database" class="buttonPro <?php if($sub_view=='backup_database'){ echo 'yellow';}?> small"><i class="fa fa-database" aria-hidden="true"></i> Sao lưu dữ liệu</a></li>
    <li><a href="<?php echo $url_sub;?>&sub=error" class="buttonPro <?php if($sub_view=='error'){ echo 'yellow';}?> small"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Xem lỗi hệ thống</a></li>
</ul>

<?php
    if($sub_view!=''){
        include "manage_tool_".$sub_view.".php";
    }
?>