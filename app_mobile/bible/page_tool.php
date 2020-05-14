<?php
$sub_view='';

if(isset($_GET['sub_view'])){
    $sub_view=$_GET['sub_view'];
}
?>
<div id="page_contain">
<h3>Công cụ</h3>
<i>Các công cụ hỗ trợ ứng dụng và cms làm việc Kinh Thánh</i>
<ul style="list-style: none;">
<li><a class="buttonPro small <?php if($sub_view=='backup'){?>yellow<?php } ?>" href="<?php echo $url;?>?page=tool&sub_view=backup"><i class="fa fa-database"></i> Sao lưu dữ liệu</a></li>
<li><a class="buttonPro small <?php if($sub_view=='error'){?>yellow<?php } ?>" href="<?php echo $url;?>?page=tool&sub_view=error"><i class="fa fa-bug"></i> Xem lỗi hệ thống</a></li>
</ul>

<?php
	if($sub_view!='')include "page_tool_".$sub_view.".php";
?>
</div>