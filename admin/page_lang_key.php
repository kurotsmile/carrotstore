<?php
$lang='vi';
$key_search='';
$sql_search='';
if(isset($_GET['lang'])) $lang=$_GET['lang'];
if(isset($_REQUEST['key_search'])){
    $key_search=$_REQUEST['key_search'];
    $sql_search=" WHERE `value` LIKE '%$key_search%' OR `key` LIKE '%$key_search%' ";
}

$limit = '50';
$query_count_all = mysqli_query($link,"SELECT COUNT(`key`) as c FROM `lang_$lang` $sql_search");
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

<div id="filter">
    <strong>Trang:</strong>
    <?php
        for($i=1;$i<=$total_page;$i++){
            ?>
            <a <?php if($i==$current_page){ echo 'class="active"';}?> href="<?php echo $url;?>/admin/?page_view=page_lang&sub_view=lang_key&<?php echo '&page='.$i;?>" ><?php echo $i;?></a>
            <?php
        }
    ?>
    <span> / trong </span>
    <span><?php echo $total_records; ?></span>
    <span>Từ khóa</span>
</div>

<div id="filter">
    <form id="frm_search_lang" method="post" action="">
        <strong>Tìm kiếm:</strong> <input type="text" name="key_search" style="background-color: #2b5f8c;border: none;border-radius: 4px;margin: 4px;color:white" value="<?php echo $key_search;?>" />
        <input type="submit" class="buttonPro small" value="Tìm kiếm"/>
    </form>
</div>

<?php
if(isset($_GET['delete'])){
    $key_delete=$_GET['delete'];
    $query_list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country`");
    while($row_l=mysqli_fetch_assoc($query_list_country)){
        $key_country=$row_l['key'];
        $query_delete=mysqli_query($link,"DELETE FROM `lang_$key_country` WHERE `key` = '$key_delete' LIMIT 1;");
        if($query_delete){
            if(mysqli_error($query_delete)==''){
                echo alert("Xóa thành công từ khóa <b>$key_delete</b> !");
            }else{
                echo alert("Xóa không thành công từ khóa <b>$key_delete</b> !",'error');
            }
        }
    }
}
?>

<table>
<?php
$query_list_key=mysqli_query($link,"SELECT `key`,`value` FROM `lang_$lang` $sql_search limit $start,$limit");
if($query_list_key){
    if(mysqli_num_rows($query_list_key)>0){
        while($row_key=mysqli_fetch_assoc($query_list_key)){
            echo '<tr>';
            echo '<td>'.$row_key['key'].'</td>';
            echo '<td>'.$row_key['value'].'</td>';
            echo '<td><a class="buttonPro small yellow" href="'.$url.'/admin/?page_view=page_lang&sub_view=lang_add&edit='.$row_key['key'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa giá trị</a></td>';
            echo '<td><a class="buttonPro small red" href="'.$url.'/admin/?page_view=page_lang&sub_view=lang_key&delete='.$row_key['key'].'" onclick="return confirm(\'Có chắc chắn là muốn xóa?\');"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a></td>';
            echo '</tr>';
        }
    }
}else{
    echo '<tr>';
    echo '<td><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Không có mục nào cả!</td>';
    echo '</tr>';
}
?>
</table>

<div id="filter">
    <strong>Trang:</strong>
    <?php
        for($i=1;$i<=$total_page;$i++){
            ?>
            <a <?php if($i==$current_page){ echo 'class="active"';}?> href="<?php echo $url;?>/admin/?page_view=page_lang&sub_view=lang_key&<?php echo '&page='.$i;?>" ><?php echo $i;?></a>
            <?php
        }
    ?>
    <span> / trong </span>
    <span><?php echo $total_records; ?></span>
    <span>Từ khóa</span>
</div>