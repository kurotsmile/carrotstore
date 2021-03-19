<?php
$cur_url=$url.'?view=home';
$view_type='';
$txt_sql_type='';
if(isset($_GET['type'])){
    $view_type=$_GET['type'];
}

if($view_type!=''){
    $txt_sql_type=" WHERE `sell` = '$view_type'";
}

if(isset($_GET['public'])){
    $id_public=$_GET['public'];
    $sell=$_GET['sell'];
    $query_update=mysqli_query($link,"UPDATE `midi` SET `sell` = '$sell' WHERE `id_midi` = '$id_public' LIMIT 1;");
    echo msg('update success '.$id_public);
}

if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $query_delete=mysqli_query($link,"DELETE FROM `midi` WHERE `id_midi` = '$id_delete'  LIMIT 1;");
    echo msg('Delete success '.$id_delete);
}
?>

<div class="menu_sub">
    <a <?php if($view_type==''){?>class="active"<?php }?> href="<?php echo $cur_url;?>">Tất cả</a>
    <a <?php if($view_type=='0'){?>class="active"<?php }?> href="<?php echo $cur_url;?>&type=0">Chờ duyệt</a>
    <a <?php if($view_type=='1'){?>class="active"<?php }?> href="<?php echo $cur_url;?>&type=1">Xuất bản</a>
    <a <?php if($view_type=='2'){?>class="active"<?php }?> href="<?php echo $cur_url;?>&type=2">Bán hàng</a>
</div>

<?php
$limit = '50';
$query_count_all = mysqli_query($link,"SELECT COUNT(`id_midi`) as c FROM `midi` txt_sql_type");
$data_count_all_acc = mysqli_fetch_assoc($query_count_all);
$total_records =intval($data_count_all_acc['c']);
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$total_page = ceil($total_records / $limit);
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}
$start = ($current_page - 1) * $limit;
?>
<div class="bar_page">
    Trang 
    <?php for($i=1;$i<=$total_page;$i++){ ?><a href="<?php echo $cur_url;?>&page=<?php echo $i;?>" class="buttonPro small  <?php if($current_page==$i){ echo 'yellow';}else{ echo 'blue';} ?>"><?php echo $i;?></a><?php }?>
</div>

<table>
<tr>
    <th>ID midi</th>
    <th>ID device</th>
    <th>Tên Midi</th>
    <th>Chủ đề</th>
    <th>Loại</th>
    <th>Cấp độ</th>
    <th>Thao tác</th>
</tr>
<?php
$arr_type_sell=array("<i class='fa fa-umbrella' aria-hidden='true'></i> Chờ duyệt","<i class='fa fa-music' aria-hidden='true'></i> Dùng miễn phí","<i class='fa fa-shopping-bag' aria-hidden='true'></i> Thương mại hóa");
$arr_level_midi=array("Dễ","Trung bình","Khó","Siêu khó");

$query_list_midi=mysqli_query($link,"SELECT `id_midi`,`name`,`id_device`,`category`,`sell`,`level`,`length` FROM `midi` $txt_sql_type  LIMIT $start, $limit");
while($row_midi=mysqli_fetch_assoc($query_list_midi)){
    $sell_type=intval($row_midi['sell']);
    $midi_level=intval($row_midi['level']);
?>
    <tr>
        <td><i class="fa fa-dot-circle-o" aria-hidden="true"></i> <?php echo $row_midi['id_midi']; ?></td>
        <td><?php echo $row_midi['id_device']; ?></td>
        <td><?php echo $row_midi['name']; ?></td>
        <td><?php echo $row_midi['category']; ?></td>
        <td><?php echo $arr_type_sell[$sell_type]; ?></td>
        <td><?php echo $arr_level_midi[$midi_level];?></td>
        <td>
            <?php if($sell_type=='0'){ ?>
                <a href="<?php echo $cur_url;?>&public=<?php echo $row_midi['id_midi']; ?>&sell=1" class="buttonPro small yellow"><i class="fa fa-superpowers" aria-hidden="true"></i> Xuất bản</a>
            <?php }else{?>
                <a href="<?php echo $cur_url;?>&public=<?php echo $row_midi['id_midi']; ?>&sell=0" class="buttonPro small black"><i class="fa fa-superpowers" aria-hidden="true"></i> không Xuất bản</a>
            <?php }?>
            <?php if($sell_type!='2'){ ?>
                <a href="<?php echo $cur_url;?>&public=<?php echo $row_midi['id_midi']; ?>&sell=2" class="buttonPro small purple"><i class="fa fa-cart-plus" aria-hidden="true"></i> Bán bài này</a>
            <?php }else{?>
                <a href="<?php echo $cur_url;?>&public=<?php echo $row_midi['id_midi']; ?>&sell=1" class="buttonPro small blue"><i class="fa fa-cart-plus" aria-hidden="true"></i> Ngừng bán</a>
            <?php }?>
            <a href="<?php echo $cur_url;?>&delete=<?php echo $row_midi['id_midi']; ?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
            <a href="<?php echo $url;?>?view=edit&id=<?php echo $row_midi['id_midi']; ?>" class="buttonPro small yellow"><i class="fa fa-edit" aria-hidden="true"></i> Sửa</a>
        </td>
    </tr>
<?php
}
?>
</table>

<div class="bar_page">
    Trang 
    <?php for($i=1;$i<=$total_page;$i++){ ?><a href="<?php echo $cur_url;?>&page=<?php echo $i;?>" class="buttonPro small  <?php if($current_page==$i){ echo 'yellow';}else{ echo 'blue';} ?>"><?php echo $i;?></a><?php }?>
</div>