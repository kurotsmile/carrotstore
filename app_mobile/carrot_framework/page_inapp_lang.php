<?php
if(isset($_GET['delete'])){
    $key_delete=$_GET['delete'];
    $clear_lang_inapp=$this->q("DELETE FROM carrotsy_virtuallover.`inapp_lang` WHERE `key` = '$key_delete'");
    if($clear_lang_inapp) echo $this->msg("Xóa thành công ngôn ngữ in-app ($key_delete)");
    else echo $this->msg("Xóa thất bại ngôn ngữ in-app ($key_delete)");
}
?>
<a href="<?php echo $url_cur;?>&func=lang_add" class="buttonPro green small" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</a>
<table>
<tr>
    <th>Biểu tượng</th>
    <th>Từ khóa ngôn ngữ</th>
    <th>Tiêu đề</th>
    <th>Mô tả</th>
    <th>Thao tác</th>
</tr>
<?php
$list_inapp_lang=$this->q("SELECT count(`key`) as c , title,tip,`key` FROM carrotsy_virtuallover.`inapp_lang` Group by `key`");
while($l=mysqli_fetch_assoc($list_inapp_lang)){
    $count_lang=$l['c'];
    $url_icon_inapp=$url_icon_inapp=$this->url_carrot_store.'/images/128.png';
    if(file_exists('inapp_data/'.$l['key'].'.png'))$url_icon_inapp=$this->url_carrot_store.'/app_mobile/carrot_framework/inapp_data/'.$l['key'].'.png';
?>
<tr>
    <td><img style="width:20px;" src="<?php echo $url_icon_inapp;?>"/></td>
    <td><?php echo $l['key'].'('. $count_lang.')';?></td>
    <td><?php echo $l['title'];?></td>
    <td><?php echo $l['tip'];?></td>
    <td>
        <a class="buttonPro small yellow" href="<?php echo $url_cur.'&func=lang_add&key='.$l['key'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        <a class="buttonPro small red" href="<?php echo $url_cur.'&func=lang&delete='.$l['key'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
    </td>
</tr>
<?php }?>
</table>