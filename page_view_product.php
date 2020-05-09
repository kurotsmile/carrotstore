<?php
include "phpqrcode/qrlib.php";
if(isset($_GET['slug'])){
    $slug=$_GET['view_product'];
    $result=mysqli_query($link,"SELECT * FROM `products` WHERE `slug` = '$slug' LIMIT 1");
}else{
    $id=$_GET['view_product'];
    $result=mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '$id' LIMIT 1");
}
    
if(mysqli_num_rows($result)){
    include "page_view_product_nomal.php";

}else{
?>
<div style="float: left;text-align: center;width: 100%;padding-top: 20px;">
<h2><i class="fa fa-product-hunt" aria-hidden="true"></i> <?php echo lang($link,'no_product'); ?></h2>
<i><?php echo lang($link,'no_product_tip'); ?></i>
</div>
<?php
}
?>
