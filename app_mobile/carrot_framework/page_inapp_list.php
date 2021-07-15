<a href="<?php echo $url_cur;?>&func=add" class="buttonPro green small" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</a>
<table>
<tr>
    <th><i class="fa fa-shopping-basket" aria-hidden="true"></i></th>
    <th>ID in-app</th>
    <th>Ứng dụng tích hợp</th>
    <th>Giá</th>
    <th>Dữ liệu thiết lập</th>
    <th>Liên kết trở về</th>
    <th>Thao tác</th>
</tr>
<?php
    $list_inapp=$this->q("SELECT * FROM carrotsy_virtuallover.`inapp`");
    while($inapp=mysqli_fetch_assoc($list_inapp)){
        $id_inapp=$inapp['id'];
        $id_app=$inapp['id_app'];
        $key_name_data=$inapp['data_lang'];
        $protocol=$inapp['protocol'];

        $name_app=$this->q_data("SELECT `data` FROM carrotsy_virtuallover.`product_name_en` WHERE `id_product` = '$id_app' LIMIT 1");
        $name_app=$name_app['data'];

        $url_icon_inapp=$this->url_carrot_store.'/thumb.php?src='.$this->url_carrot_store.'/app_mobile/carrot_framework/inapp_data/'.$key_name_data.'.png&size=20&trim=1';
        $url_icon_app=$this->url_carrot_store.'/thumb.php?src='.$this->url_carrot_store.'/product_data/'.$id_app.'/icon.jpg&size=20&trim=1';
?>
    <tr>
        <td><img src="<?php echo $url_icon_inapp;?>"/></td>
        <td><a target="_blank" href="<?php echo $this->url_carrot_store;?>/pay_inapp/<?php echo $id_inapp;?>/bfbb36180aba654f3665964a5872300f/vi"><?php echo $id_inapp;?></a></td>
        <td><a target="_blank" href="<?php echo $this->url_carrot_store;?>/product/<?php echo $id_app;?>"><img src="<?php echo $url_icon_app;?>"/> <?php echo $name_app;?></a></td>
        <td><?php echo $inapp['price'];?> <i class="fa fa-usd" aria-hidden="true"></i></td>
        <td><a href="<?php echo $url_cur;?>&func=lang_add&key=<?php echo $key_name_data;?>"><i class="fa fa-database" aria-hidden="true"></i> <?php echo $key_name_data;?></td>
        <td><a href="<?php echo $protocol;?>://"><?php echo $protocol;?></a></td>
        <td>
            <a href="<?php echo $url_cur;?>&func=add&id=<?php echo $id_inapp;?>" class="buttonPro small yellow"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
            <a href="" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>
    </tr>
<?php
    }
?>
<table>