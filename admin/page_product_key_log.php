<?php
$cur_url=$url.'/admin/?page_view=page_product&sub_view=page_product_key_log';
if(isset($_GET['key'])){
    $key_search=$_GET['key'];
    $query_delete_log=mysqli_query($link,"DELETE FROM `product_log_key` WHERE `key` = '$key_search' ");
    echo alert('Xóa thành công ('.$key_search.')','alert');
}
?>
<table>
<tr>
    <th>Từ khóa</th>
    <th>Quốc gia</th>
    <th>Thao tác</th>
</tr>
<?php
$list_key_search=mysqli_query($link,"SELECT * FROM `product_log_key`");
if($list_key_search){
while($row=mysqli_fetch_assoc($list_key_search)){
?>
    <tr>
        <td>
            <i class="fa fa-search" aria-hidden="true"></i> <?php echo $row['key'];?>
        </td>
        <td>
            <?php echo $row['lang'];?>
        </td>
        <td>
            <a href="<?php echo $cur_url;?>&key=<?php echo $row['key'];?>" class="buttonPro small red"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a>
			<a target="_blank" href="https://www.google.com/search?q=<?php echo $row['key'];?>" class="buttonPro small blue"><i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm</a>
        </td>
    </tr>
<?php
}}
?>
</table>