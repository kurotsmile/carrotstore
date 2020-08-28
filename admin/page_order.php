<?php
$url_page_order=$url_admin.'?page_view=page_order';
$sub_view='page_order_manager';
if(isset($_GET['sub_view'])){
    $sub_view=$_GET['sub_view'];
}
?>
<div id="bar_menu_sub">
    <a href="<?php echo $url_page_order;?>&sub_view=page_order_manager" <?php if($sub_view=='page_order_manager'){ echo 'class="active"';}?>><i class="fa fa-cubes"></i> Các đơn hàng đã thanh toán</a>
    <a href="<?php echo $url_page_order;?>&sub_view=page_order_bank" <?php if($sub_view=='page_order_bank'){ echo 'class="active"';}?>><i class="fa fa-bank"></i> Quản lý các ngân hàng</a>
    <a href="<?php echo $url_page_order;?>&sub_view=page_order_bank_add" <?php if($sub_view=='page_order_bank_add'){ echo 'class="active"';}?>><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm ngân hàng mới</a>
</div>
<?php
include "$sub_view.php";
?>
