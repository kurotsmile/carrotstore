<?php
$sub_view='summary';
$url_page=$url_admin.'/?page_view=page_overview';
if(isset($_GET['sub_view'])){
	$sub_view=$_GET['sub_view'];
}
?>
<div id="bar_menu_sub">
    <a href="<?php echo $url_page;?>&sub_view=summary" <?php if($sub_view=='summary'){?>class="active"<?php }?>><i class="fa fa-th-list" aria-hidden="true"></i> Sơ lượt</a>
    <a href="<?php echo $url_page;?>&sub_view=full" <?php if($sub_view=='full'){?>class="active"<?php }?>><i class="fa fa-list" aria-hidden="true"></i> Đầy đủ</a>
	<a href="<?php echo $url_page;?>&sub_view=file" <?php if($sub_view=='file'){?>class="active"<?php }?>><i class="fa fa-file" aria-hidden="true"></i> Đồng bộ tệp</a>
	<a href="<?php echo $url_page;?>&sub_view=syn_product" <?php if($sub_view=='syn_product'){?>class="active"<?php }?>><i class="fa fa-file-archive-o" aria-hidden="true"></i> Đồng bộ tệp sản phẩm</a>
</div>

<?php
if($sub_view=='file'){
	include "page_overview_syn_file.php";
}else if($sub_view=='syn_product'){
	include "page_overview_syn_product.php";
}else{
	include "page_overview_all.php";
}
?>
