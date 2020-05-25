<?php
$url_cur=$url.'/?view=page_tool';
$tool='';
if(isset($_GET['tool'])) $tool=$_GET['tool'];
if(isset($_POST['tool'])) $tool=$_POST['tool'];
?>
<div style="padding:20px">
<a href="<?php echo $url_cur;?>&tool=backup_database" class="buttonPro small <?php if($tool=='backup_database') echo 'blue'; ?>"><i class="fa fa-database" aria-hidden="true"></i> Sao lưu dữ liệu</a>
<a href="<?php echo $url_cur;?>&tool=view_error" class="buttonPro small <?php if($tool=='view_error') echo 'blue'; ?>"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Xem lỗi hệ thống</a>
<a href="<?php echo $url_cur;?>&tool=table_password" class="buttonPro small <?php if($tool=='table_password') echo 'blue'; ?>"><i class="fa fa-table" aria-hidden="true"></i> Tạo bảng Password</a>

<?php
if($tool!='') include "page_tool_".$tool.".php";
?>
</div>