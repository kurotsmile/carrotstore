<?php
$url_page_order=$url_admin.'?page_view=page_order&sub_view=page_order_manager';
$id_send='';
$lang_order='';
if(isset($_GET['lang_order'])){
    $lang_order=$_GET['lang_order'];
}

if(isset($_GET['send'])){
    $id_send=$_GET['send'];
    $query_order=mysqli_query($link,"SELECT * FROM `order` WHERE `id_order` = '$id_send' LIMIT 1");
    $data_order=mysqli_fetch_assoc($query_order);

    $email=$data_order['pay_mail'];
    $subject = 'Carrot Store';

    $headers = "From: " . strip_tags('carrotstore@gmail.com') . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $url_product=$url.'/pay/'.$data_order['type'].'/1/'.$data_order['id'].'/'.$data_order['lang'];

    $html_body='';
    $html_body.='<b>Carrot store</b>';
    $html_body.='<p>Dear '.$data_order['pay_name'].'</p>';
    $html_body.='<p>Thank you for making a purchase at carrotstore.com
    You can use the products purchased at the following link:</p>';
    $html_body.='<a href="'.$url_product.'">'.$url_product.'</a>';
    echo '<div style="border: solid 3px #ffc181;background-color: #fff2e1;padding: 10px;width: 409px;margin: 20px;">';
    echo $html_body;
    echo '</div>';
    mail($email, $subject, $html_body, $headers);

    $query_update_send=mysqli_query($link,"UPDATE `order` SET `is_send` = '1' WHERE `id_order` = '$id_send' LIMIT 1;");
}
?>



<table>
<tr>
    <th style="width: 200px;">ID đặt hàng</th>
    <th>Email thanh toán</th>
    <th>Tên người mua</th>
    <th>ID sản phẩm</th>
    <th>Quốc gia</th>
    <th>Thao tác</th>
</tr>
<?php
if($lang_order==''){
    $list_order=mysqli_query($link,"SELECT * FROM `order`");
}else{
    $list_order=mysqli_query($link,"SELECT * FROM `order` WHERE `lang`='$lang_order' ");
}
if($list_order){
while($row=mysqli_fetch_assoc($list_order)){
    $txt_col_type='';
    if($row['type']=='music') $txt_col_type='<a href="'.$url_carrot_store.'/music/'.$row['id'].'" target="_blank"><i class="fa fa-music" aria-hidden="true"></i> '.$row['id'].'</a>';
    if($row['type']=='piano') $txt_col_type='<a href="'.$url_carrot_store.'/piano/'.$row['id'].'" target="_blank"><i class="fa fa-file-audio-o" aria-hidden="true"></i> '.$row['id'].'</a>';

?>
    <tr>
        <td>
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <?php echo $row['id_order'];?>
        </td>
        <td>
            <i class="fa fa-id-card"></i> <?php echo $row['pay_mail'];?>
        </td>
        <td>
            <i class="fa fa-user"></i> <?php echo $row['pay_name'];?>
        </td>
        <td><?php echo $txt_col_type;?></td>
        <td>
            <?php echo $row['lang'];?>
        </td>
        <td>
            <?php
            if($row['is_send']=='0'){
                echo '<a href="'.$url_page_order.'&send='.$row['id_order'].'" class="buttonPro small blue"><i class="fa fa-send"> Gửi hóa đơn đã thanh toán</i></a>';
            }else{
                echo '<a href="'.$url_page_order.'&send='.$row['id_order'].'" class="buttonPro small yellow"><i class="fa fa-send"> Gửi lại</i></a>';
            }
            ?>
        </td>
    </tr>
<?php
}}
?>
</table>