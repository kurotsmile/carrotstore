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
	<a href="<?php echo $url_page;?>&sub_view=comment" <?php if($sub_view=='comment'){?>class="active"<?php }?>><i class="fa fa-comment" aria-hidden="true"></i> <span class="syn comment" syn="comment"></span>Bình luận</a>
	<a href="<?php echo $url_page;?>&sub_view=rate" <?php if($sub_view=='rate'){?>class="active"<?php }?>><i class="fa fa-star-half-o" aria-hidden="true"></i> <span class="syn product_rate" syn="product_rate"></span>Đánh giá</a>
	<a href="<?php echo $url_page;?>&sub_view=file" <?php if($sub_view=='file'){?>class="active"<?php }?>><i class="fa fa-file" aria-hidden="true"></i> Đồng bộ tệp</a>
</div>

<?php
if($sub_view=='file'){
	include "page_overview_syn_file.php";
}else{
	include "page_overview_all.php";
}
?>
