<?php
$url_page="?page_view=page_product";
$result = mysql_query("SELECT * FROM `products`",$link);
$row_in_page=15;
$toal_row=mysql_num_rows($result);
$number_page=$toal_row/$row_in_page;
$page=0;
if(isset($_GET['page'])){
    $page=intval($_GET['page']);
    $row_statr=intval($_GET['page'])*$row_in_page;
    $row_end=$row_statr+$row_in_page;
    $result = mysql_query("SELECT * FROM `products` ORDER BY `id` DESC limit $row_statr,$row_end",$link);
}else{
    $result = mysql_query("SELECT * FROM `products` ORDER BY `id` DESC limit 0,$row_in_page",$link);
}
?>

<div id="filter">
    <strong>Lọc:</strong> 
    <input type="text" id="search" style="float: left;" onkeyup="searchs(this.value);return false;" placeholder="Tìm kiếm"/>
    <span id="proccess_2" style="display: none;float: left;"> Đang xử lý</span>
    
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
if(mysql_num_rows($result)>0){
    include "page_product_manager_template.php";
 }else{
?>
   <h2 style="margin-left: 10px;">Không có dữ liệu</h2>
<?php
}
?>
</div>
<script>

function searchs(key_search){
        $('#loading').fadeIn(200);
        $.ajax({
            url: "<?php echo $url_admin; ?>/index.php",
            type: "get", //kiểu dũ liệu truyền đi
            data: "function=search_product_admin&key="+key_search, //tham số truyền vào
            success: function(data, textStatus, jqXHR)
            {
                $('#show_table').html(data);
                $('#loading').fadeOut(200);
            }
        });
}
</script>  
