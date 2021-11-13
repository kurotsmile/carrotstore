<?php
$name_company=$_GET['name_company'];
$url_img_thumb=$url.'/images/bk_link.jpg';
?>

<div id="containt" style="width: 100%;float: left;">

    <div id="account_cover" class="show_bk_account" style="background-image: url('<?php echo $url_img_thumb; ?>');background-size:auto 100% ">
        <div class="neon-text">
            <i class="fa fa-building" aria-hidden="true"></i> <?php echo $name_company;?>
        </div>

        <div id="account_menu">
            <ul style="margin: 0px;">
                <li <?php  echo 'class="active"'?> ><a href=""><i class="fa fa-product-hunt"></i></a></li>
            </ul>
        </div>
    </div>

    <div style="margin-top: 20px;float: left;width: 100%;">
    <?php
    $list_product_in_company=mysqli_query($link,"SELECT `id`,`type`,`apk`,`slug`,`galaxy_store`,`app_store`,`chplay_store`,`window_store`,`huawei_store`,`chrome_store`,`carrot_store` FROM `products` LEFT JOIN `product_desc_$lang` ON `id`=`id_product` WHERE  `status`='1' AND `company`='$name_company' AND `data`!='' ORDER BY RAND() LIMIT 50");

    if($list_product_in_company){
    if(mysqli_num_rows($list_product_in_company)>0){
        $label_click_de_xem=lang($link,'click_de_xem');
        $label_download_on=lang($link,'download_on');
        $label_loai=lang($link,'loai');
        $label_chi_tiet=lang($link,'chi_tiet');
        $label_read_now=lang($link,'read_now');
        ?>
        <div style="float: left;padding: 10px;">
            <?php
            while ($row = mysqli_fetch_assoc($list_product_in_company)) {
                include "page_view_all_product_git_template.php";
            }
            ?>
        </div>
    <?php }}?>
    </div>
</div>