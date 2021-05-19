<?php
$menu=0;if(isset($_GET['menu']))$menu=$_GET['menu'];
$url_cur=$this->url.'?menu='.$menu;
$limit=50;
$query_count=mysqli_query($this->link_mysql,"SELECT COUNT(*) as c FROM `$name_table` LIMIT 1");
$data_count_all_acc = mysqli_fetch_assoc($query_count);
$total_records =intval($data_count_all_acc['c']);
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$total_page = ceil($total_records / $limit);
if ($current_page > $total_page) {$current_page = $total_page;}else if($current_page < 1) {$current_page = 1;}
$start = ($current_page - 1) * $limit;

if($total_page>1){
?>
<div class="cms_nav_page"> 
    <a href="#" class="btn">Trang : </a>
    <?php for($i=1;$i<=$total_page;$i++){?>
        <?php if($i==$current_page){?>
            <a href="<?php echo $url_cur;?>&page=<?php echo $i;?>" class="btn gray"><?php echo $i;?></a>
        <?php }else{?>
            <a href="<?php echo $url_cur;?>&page=<?php echo $i;?>" class="btn"><?php echo $i;?></a>
        <?php }?>
    <?php } ?>
</div>
<?php }?>
<div class="cms_tool_page">
    <a class="btn" href="<?php echo $this->url;?>?function=add_obj&table=<?php echo $name_table;?>"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
    <a class="btn" href="<?php echo $this->url;?>?function=empty_obj&table=<?php echo $name_table;?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa toàn bộ dữ liệu</a>
</div>
<table>
<?php
    $tabel_head=$this->get_field_in_table($name_table);
    array_push($tabel_head,"Thao tác");
?>
<tr><?php for($i=0;$i<count($tabel_head);$i++) echo '<th>'.ucfirst($tabel_head[$i]).'</th>';?></tr>
<?php
    $query_row_tabel=mysqli_query($this->link_mysql,"SELECT * FROM `".$name_table."`  LIMIT $start, $limit");
    while($row_table=mysqli_fetch_assoc($query_row_tabel)){
?>
    <tr>
        <?php    
            for($i=0;$i<count($tabel_head)-1;$i++){
                $filed_name=$tabel_head[$i];
                echo '<td>'.$row_table[$filed_name].'</td>';
            }
        ?>
            <td>
                <a href="<?php echo $this->btn_function('edit_obj',$name_table,$row_table[$tabel_head[0]],$tabel_head[0]);?>" class="btn"><i class="fa fa-pencil-square" aria-hidden="true"></i> Sửa</a>
                <a href="<?php echo $this->btn_function('delete_obj',$name_table,$row_table[$tabel_head[0]],$tabel_head[0]);?>" class="btn"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
            </td>
    </tr>
    <?php
    }
    ?>
</table>

<?php
if($total_page>1){
?>
    <div class="cms_nav_page"> 
        <a href="#" class="btn">Trang : </a>
        <?php for($i=1;$i<=$total_page;$i++){?>
            <?php if($i==$current_page){?>
                <a href="<?php echo $url_cur;?>&page=<?php echo $i;?>" class="btn gray"><?php echo $i;?></a>
            <?php }else{?>
                <a href="<?php echo $url_cur;?>&page=<?php echo $i;?>" class="btn"><?php echo $i;?></a>
            <?php }?>
        <?php } ?>
    </div>
<?php }?>