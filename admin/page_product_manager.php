<?php
$url_page="?page_view=page_product";
$result = mysqli_query($link,"SELECT * FROM `products`");
$row_in_page=15;
$toal_row=mysqli_num_rows($result);
$number_page=$toal_row/$row_in_page;
$page=0;
if(isset($_GET['page'])){
    $page=intval($_GET['page']);
    $row_statr=intval($_GET['page'])*$row_in_page;
    $row_end=$row_statr+$row_in_page;
    $result = mysqli_query($link,"SELECT * FROM `products` ORDER BY `id` DESC limit $row_statr,$row_end");
}else{
    $result = mysqli_query($link,"SELECT * FROM `products` ORDER BY `id` DESC limit 0,$row_in_page");
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

