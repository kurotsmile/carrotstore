<?php
$url_cur=$this->cur_url;

if(isset($_GET['del'])){
    $c_code=$_GET['del'];
    $q_del=$this->q("DELETE FROM `currency_unit` WHERE `code` = '$c_code'");
    if($q_del) echo $this->msg("Xóa thành công đơn vị tiền tệ ".$c_code." ! ");
}
?>
<table>
    <tr>
        <th>Mã tiền tệ</th>
        <th>Ký hiệu tiền tệ</th>
        <th>Thao tác</th>
    </tr>
    <?php
    $q_list=$this->q("SELECT * FROM `currency_unit` ORDER BY `code` ");
    while($c=mysqli_fetch_assoc($q_list))
    {
    ?>
    <tr>
        <td><?php echo $c['code'];?></td>
        <td><?php echo $c['symbol'];?></td>
        <td>
            <a href="<?php echo $url_cur;?>&func=add&edit=<?php echo $c['code'];?>" class="buttonPro small yellow"><i class="fa fa-edit" aria-hidden="true"></i> Sửa</a>
            <a href="<?php echo $url_cur;?>&func=list&del=<?php echo $c['code'];?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>