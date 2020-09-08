<?php
$url_cur=$url.'/admin/?page_view=page_product&sub_view=page_product_link';
$view='page_product_link_list';
if(isset($_GET['sub_page'])){
    $view=$_GET['sub_page'];
}

?>
<div id="filter">
	<a href="<?php echo $url_cur;?>&sub_page=page_product_link_list" <?php if($view=='page_product_link_list'){?>style="color:yellow;"<?php }?>><i class="fa fa-list-alt" aria-hidden="true"></i> Quản lý liên kết store</a>
	<a href="<?php echo $url_cur;?>&sub_page=page_product_link_add" <?php if($view=='page_product_link_add'){?>style="color:yellow;"<?php }?>><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới loại liên kết</a>
</div>
<div style="float: left;width: 100%;">
<?php include $view.".php";?>
</div>
