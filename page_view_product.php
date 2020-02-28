<?php
include "phpqrcode/qrlib.php";
if($_GET['slug']){
    $slug=$_GET['view_product'];
    $result=mysql_query("SELECT * FROM `products` WHERE `slug` = '$slug' LIMIT 1");
}else{
    $id=$_GET['view_product'];
    $result=mysql_query("SELECT * FROM `products` WHERE `id` = '$id' LIMIT 1");
}
    
if(mysql_num_rows($result)){
    $data=mysql_fetch_array($result);
    $is_pay=0;
    $status_Order=null;
    $arr_history_id=$_SESSION['history'];
    if(!in_array($id,$arr_history_id)){
        array_unshift ($arr_history_id,$id);
        $_SESSION['history']=$arr_history_id;
    }
    include "page_view_product_nomal.php";
    mysql_freeresult($result);
}else{
?>
<div style="float: left;text-align: center;width: 100%;padding-top: 20px;">
<h2><i class="fa fa-product-hunt" aria-hidden="true"></i> <?php echo lang('no_product'); ?></h2>
<i><?php echo lang('no_product_tip'); ?></i>
</div>
<?php
}
?>
