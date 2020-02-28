<?php
$sub_view='page_product_manager';
if(isset($_GET['sub_view'])){
    $sub_view=$_GET['sub_view'];
}
?>
<div id="bar_menu_sub">
    <a href="<?php echo $url_admin; ?>/?page_view=page_product&sub_view=page_product_manager" <?php if($sub_view=='page_product_manager'){ echo 'class="active"';} ?> ><i class="fa fa-cubes"></i> Quản lý các sản phẩm</a>
    <a href="<?php echo $url_admin; ?>/?page_view=page_product&sub_view=page_product_update" <?php if($sub_view=='page_product_update'){ echo 'class="active"';} ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm sản phẩm mới</a>
    <a href="<?php echo $url_admin; ?>/?page_view=page_product&sub_view=page_product_type" <?php if($sub_view=='page_product_type'){ echo 'class="active"';} ?> ><i class="fa fa-list"></i> Các loại sản phẩm</a>
    <a href="<?php echo $url_admin; ?>/?page_view=page_product&sub_view=page_product_type_add" <?php if($sub_view=='page_product_type_add'){ echo 'class="active"';} ?> ><i class="fa fa-plus"></i> Thêm loại sản phẩm</a>
    <a href="<?php echo $url_admin; ?>/?page_view=page_product&sub_view=page_product_category" <?php if($sub_view=='page_product_category'){ echo 'class="active"';} ?> ><i class="fa fa-list"></i> Quảng lý chuyên mục</a>
    <a href="<?php echo $url_admin; ?>/?page_view=page_product&sub_view=page_product_category_add" <?php if($sub_view=='page_product_category_add'){ echo 'class="active"';} ?> ><i class="fa fa-plus"></i> Thêm chuyên mục</a>
</div>

<?php
    include $sub_view.".php";
?>
