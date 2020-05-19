<?php
if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $query_delete=mysql_query("DELETE FROM `flower_style` WHERE ((`id` = '$id_delete'));");
    echo '<p>Xóa thành công<p>';
}

$query_list_style=mysql_query("SELECT * FROM `flower_style` ORDER BY `id` DESC");
?>
<div class="sub_menu">
<div class="col">
<a href="<?php echo $url;?>?view=style_add" class="buttonPro small blue">Thêm thiết kế mới</a>
</div>
</div>


<table>
<tr>
    <th>Tên</th>
    <th>Mô tả thiết kế</th>
    <th>Âm thanh</th>
    <th>Thao tác</th>
</tr>

<?php
while($row_style=mysqli_fetch_array($query_list_style)){
    $data_flower=json_decode($row_style['data']);
    $link_music='<audio controls><source src="'.$url.'/sound/'.$data_flower->sound.'.mp3" type="audio/mpeg"></audio>';
?>
<tr>
    <td><?php echo $data_flower->name;?></td>
    <td>
        <?php
            foreach($data_flower->petal as $p){
                echo '<span class="tag_style" style="background-color:'.$p->color.'">'.$p->color.'</span>';
            }
        ?>
    </td>
    <td><?php echo $link_music;?> : <?php echo $data_flower->sound; ?></td>
    <td>
        <a href="<?php echo $url;?>?view=style_add&edit=<?php echo $row_style['id'];?>" class="buttonPro small yellow">Sửa</a>
        <a href="<?php echo $url;?>?view=style&delete=<?php echo $row_style['id'];?>" class="buttonPro small red">Xóa</a>
    </td>
</tr>
<?php   
}
?>
</table>