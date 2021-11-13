<?php
$url_page="?page_view=page_product";
$result = mysqli_query($link,"SELECT * FROM `products`");
$row_in_page=30;
$toal_row=mysqli_num_rows($result);
$number_page=$toal_row/$row_in_page;
$page=0;

$type_view_app='all';
$txt_query_type_app="";

if(isset($_GET['type'])){
	$type_view_app=$_GET['type'];
	if($type_view_app=='carrot_app'){
		$txt_query_type_app="WHERE `company` ='Carrot'";
	}else{
		$txt_query_type_app="WHERE `company`!='Carrot'";
	}
}



if(isset($_GET['page'])){
    $page=intval($_GET['page']);
    $row_statr=intval($_GET['page'])*$row_in_page;
    $row_end=$row_statr+$row_in_page;
	
    $result = mysqli_query($link,"SELECT * FROM `products` ".$txt_query_type_app." ORDER BY `id` DESC limit $row_statr,$row_end");
	echo mysqli_error($link);
}else{
    $result = mysqli_query($link,"SELECT * FROM `products` ".$txt_query_type_app."  ORDER BY `id` DESC limit 0,$row_in_page");
}
?>

<div id="filter">
    <strong>Trang:</strong>
    <?php
        for($i=0;$i<$number_page;$i++){
            ?>
            <a <?php if($i==$page){ echo 'class="active"';}?> href="<?php echo $url_page.'&page='.$i;?>" ><?php echo $i+1;?></a>
            <?php
        }
    ?>
    <span> / trong </span>
    <span><?php echo $toal_row; ?></span>
    <span>Sản phẩm</span>
	<a href="<?php echo $url_page;?>&type=carrot_app" <?php if($type_view_app=='carrot_app'){?>style="color:yellow;"<?php }?>><i class="fa fa-space-shuttle" aria-hidden="true"></i> Carrot App</a>
	<a href="<?php echo $url_page;?>&type=other_app" <?php if($type_view_app=='other_app'){?>style="color:yellow;"<?php }?>><i class="fa fa-product-hunt" aria-hidden="true"></i> Othe App</a>
</div>

<div style="float: left;width: 100%;">
<?php
if(mysqli_num_rows($result)>0){
    include "page_product_manager_template.php";
 }else{
?>
   <h2 style="margin-left: 10px;">Không có dữ liệu</h2>
<?php
}
?>
</div>

<div id="filter">
    <strong>Trang:</strong>
    <?php
        for($i=0;$i<$number_page;$i++){
            ?>
            <a <?php if($i==$page){ echo 'class="active"';}?> href="<?php echo $url_page.'&page='.$i;?>" ><?php echo $i+1;?></a>
            <?php
        }
    ?>
    <span> / trong </span>
    <span><?php echo $toal_row; ?></span>
    <span>Sản phẩm</span>
	<a href="<?php echo $url_page;?>&type=carrot_app" <?php if($type_view_app=='carrot_app'){?>style="color:yellow;"<?php }?>><i class="fa fa-space-shuttle" aria-hidden="true"></i> Carrot App</a>
	<a href="<?php echo $url_page;?>&type=other_app" <?php if($type_view_app=='other_app'){?>style="color:yellow;"<?php }?>><i class="fa fa-product-hunt" aria-hidden="true"></i> Othe App</a>
</div>

