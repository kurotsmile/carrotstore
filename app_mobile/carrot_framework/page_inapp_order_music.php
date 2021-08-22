<?php
$cur_url=$this->cur_url.'&func=order_music';
?>
<div class="cms_tool_page">
    <?php
    $data_count_m=$this->q_data("SELECT COUNT(`id_order`) as c FROM carrotsy_virtuallover.`order`");
    $count_m=intval($data_count_m['c']);
    ?>
    <a> &nbsp; Ước tính thu nhập được tính từ mua hàng âm nhạc <?php echo ($count_m *0.65)?><i class="fa fa-usd" aria-hidden="true"></i> / <?php echo $count_m;?> Đơn hàng</a>
</div>
<table>
<tr>
    <th>Id đơn đặt hàng</th>
    <th>Loại</th>
    <th>Tên người mua</th>
    <th>Địa chỉ thanh toán</th>
    <th>Thao tác</th>
</tr>
<?php

if(isset($_GET['del'])){
    $id_del=$_GET['del'];
    $q_del=$this->q("DELETE FROM carrotsy_virtuallover.`order` WHERE `id_order` = '$id_del'");
    echo $this->msg("Xóa thành công đơn hàng $id_del !");
}

$list_order_music=$this->q("SELECT * FROM carrotsy_virtuallover.`order`");
while($m=mysqli_fetch_assoc($list_order_music)){
    $txt_col_type='';
    if($m['type']=='music') $txt_col_type='<a href="'.$this->url_carrot_store.'/music/'.$m['id'].'/'.$m['lang'].'" target="_blank"><i class="fa fa-music" aria-hidden="true"></i> '.$m['id'].'</a>';
    if($m['type']=='piano') $txt_col_type='<a href="'.$this->url_carrot_store.'/piano/'.$m['id'].'/'.$m['lang'].'" target="_blank"><i class="fa fa-file-audio-o" aria-hidden="true"></i> '.$m['id'].'</a>';
?>
<tr>
    <td><i class="fa fa-id-badge" aria-hidden="true"></i> <?php echo $m['id_order'];?></td>
    <td><?php echo $txt_col_type;?></td>
    <td><i class="fa fa-user" aria-hidden="true"></i> <?php echo $m['pay_name'];?></td>
    <td><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $m['pay_mail'];?></td>
    <td><a  href="<?php echo $cur_url.'&del='.$m['id_order'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
</tr>
<?php }?>
</table>