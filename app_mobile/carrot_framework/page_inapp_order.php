<?php
if(isset($_GET['del'])){
    $id_del=$_GET['del'];
    $this->q("DELETE FROM carrotsy_virtuallover.`inapp_order` WHERE `id` = '$id_del' LIMIT 1;");
    echo $this->msg("Xóa thành công đơn hàng $id_del !");
}
?>
<table>
<tr>
    <th>Mã đặt hàng</th>
    <th>Mã In-app</th>
    <th>Tên người mua</th>
    <th>Email người mua</th>
    <th>Trạng thái</th>
    <th>Ngày thanh toán</th>
    <th>Thao tác</th>
</tr>
<?php
$list_inapp_order=$this->q("SELECT * FROM carrotsy_virtuallover.`inapp_order`");
while($order=mysqli_fetch_assoc($list_inapp_order)){
    $order_id=$order['id'];
    $order_inapp_id=$order['inapp_id'];
    $order_pay_name=$order['pay_name'];
    $order_pay_mail=$order['pay_mail'];
    $order_date=$order['date'];
    $order_user_id=$order['user_id'];
    $order_user_lang=$order['lang'];
    $order_is_user=$order['is_login'];
    $order_is_get=$order['is_get'];

    if($order_is_user=='0') $icon_type_user='<span class="buttonPro small"><i class="fa fa-desktop" aria-hidden="true"></i></span>';
    if($order_is_user=='1') $icon_type_user='<a target="_blank" href="'.$this->url_carrot_store.'/user/'.$order_user_id.'/'.$order_user_lang.'" class="buttonPro small"><i class="fa fa-user" aria-hidden="true"></i></a>';
?>
<tr>
    <td><?php echo $icon_type_user.' '.$order_id;?></td>
    <td><a href="<?php echo $url_cur;?>&func=add&id=<?php echo $order_inapp_id;?>"><?php echo $order_inapp_id;?></a></td>
    <td><?php echo $order_pay_name;?></td>
    <td><?php echo $order_pay_mail;?></td>
    <td>
        <?php 
            if($order_is_get=='0') echo '<i class="fa fa-truck" aria-hidden="true"></i> Đang giao';
            if($order_is_get=='1') echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> Đã nhận';
        ?>
    </td>
    <td><?php echo $order_date;?></td>
    <td>
        <a href="<?php echo $url_cur;?>&func=order&del=<?php echo $order_id;?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i></a>
    </td>
</tr>
<?php }?>
</table>