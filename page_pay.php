<?php
$pay_item='';
$pay_status='';
$pay_device='';
$pay_id_music='';
$pay_lang='';
$lang_sel='';

if(isset($_GET['item'])) $pay_item=$_GET['item'];
if(isset($_GET['status']))$pay_status=$_GET['status'];
if(isset($_GET['device']))$pay_id_music=$_GET['device'];

if(isset($_GET['lang'])){
    $pay_lang=$_GET['lang'];
    $lang_sel=$_GET['lang'];
}else{
    $lang_sel=$_SESSION['lang'];
}

if($pay_device!=''&&$pay_item!=''){
    if($pay_item!='music'){
        $query_check_pay=mysqli_query($link,"SELECT * FROM `pay` WHERE `id_user` = '$pay_device' AND `id_item` = '$pay_item' LIMIT 1");
        if(mysqli_num_rows($query_check_pay)>0){
            $data_pay=mysqli_fetch_array($query_check_pay);
            if($data_pay['status']=='0'&&$pay_status=='1') $query_update_pay=mysqli_query($link,"UPDATE `pay` SET `status` = '1' WHERE `id_user` = '$pay_device' AND `id_item` = '$pay_item' LIMIT 1;");
        }else{
            $query_add_order=mysqli_query($link,"INSERT INTO `pay` (`id_user`, `id_item`, `status`) VALUES ('$pay_device', '$pay_item', '0');");
        }
    }
}
?>


<div style="width: 100%;float: left;text-align: center;">
    <div style="width: 100%;float: left;padding-top: 20px;padding-bottom: 10px;">
        <strong style="font-size: 20px;"><?php echo lang($link,'pay_title'); ?></strong>
    </div>

	<?php if($pay_item=='music'){?>
	<div style="float: left;width: 100%;">
		<div id="box_pay">
			<strong style="font-size: 16px;"><?php echo lang($link,'download_song'); ?></strong><br /><br />
			<?php
            $query_music=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `effect` = '2' AND `id`='$pay_id_music'");
            if($query_music){
            $data_music=mysqli_fetch_array($query_music);
            $title_page=$data_music['chat'];
        
            $query_link_video=mysqli_query($link,"SELECT `link` FROM `app_my_girl_video_$lang_sel` WHERE `id_chat` = '$pay_id_music' LIMIT 1");
            $data_video=mysqli_fetch_array($query_link_video);
            $url_mp3=$url.'/app_mygirl/app_my_girl_'.$lang_sel.'/'.$pay_id_music.'.mp3';
                
            $url_img_thumb=$url.'/thumb.php?src='.$url.'/images/music_default.png&size=170x170&trim=1';
            if($data_video[0]!=''){
                    parse_str( parse_url( $data_video[0], PHP_URL_QUERY ), $my_array_of_vars );
                    $url_img_thumb='https://img.youtube.com/vi/'.$my_array_of_vars['v'].'/hqdefault.jpg'; 
            }
            ?>
			<?php echo $title_page ?><br/><br/>
			<img onclick="go_to_pay();" style="width: 200px;" src="<?php echo $url_img_thumb; ?>" /><br />
            <?php if($pay_status!='1'){?>
            <b style="color: #e27f00;">$0.99</b><br/>
            <?php }?>
            <div id="pay_container">
                <?php
                if($pay_status!=''){
                    if($pay_status=='0') echo lang($link,'pay_method').'<br/>';
                    if($pay_status=='1') echo '<strong style="color:green"><i class="fa fa-check-circle" aria-hidden="true"></i> '.lang($link,'pay_success').'</strong>';
                    if($pay_status=='2') echo '<strong style="color:#de0a0a"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.lang($link,'pay_fail').'</strong>';
                }
                ?>
                <br />
                <?php
                if($pay_status=='1'){
                ?>
                    <a style="width: 100%;" href="<?php echo $url;?>/download.php?id=<?php echo $pay_id_music;?>&lang=<?php echo $lang_sel; ?>" id="download_song" >
                        <i class="fa fa-download fa-3x" aria-hidden="true" style="margin-top: 20px;"></i><br />
                        <span><?php echo lang($link,'download_song');?></span>
                    </a>
                <?php }?>
                <div id="paypal-button-container"></div>
            </div>
            <script>
                var PAYPAL_CLIENT = 'AYgLieFpLUDxi_LBdzDqT2ucT4MIa-O0vwX7w3CKGfQgMGROOHu-xz2y5Jes77owCYQ1eLmOII_ch2VZ';
                var PAYPAL_SECRET = 'ELkToqss_tBZdsHFOHfMFiyu23mNr9HDu1X--jqaZWCbS3xr_xg4hlCBHvV8GcyD15HIPgcwFi9BgqMp';
                var PAYPAL_ORDER_API = 'https://api.paypal.com/v2/checkout/orders/';
            </script>
            <script src="https://www.paypal.com/sdk/js?client-id=AYgLieFpLUDxi_LBdzDqT2ucT4MIa-O0vwX7w3CKGfQgMGROOHu-xz2y5Jes77owCYQ1eLmOII_ch2VZ"></script>
            <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                        amount: {
                            currency_code:'USD',
                            value: '0.99',
                            breakdown: {
                                item_total: {value: '0.99', currency_code: 'USD'}
                            }
                        }
                        }]
                    });
                    },
                    onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        pay_success(details.payer.name.given_name,details.payer.email_address);
                    });
                    }
                }).render('#paypal-button-container');

                function pay_success(pay_name,pay_mail){
                    $.ajax({
                        url: "<?php echo $url;?>/index.php",
                        type: "post",
                        data: "function=order_music&id_music=<?php echo $pay_id_music;?>&lang_music=<?php echo $lang_sel; ?>&pay_name="+pay_name+"&pay_mail="+pay_mail,
                        success: function (data, textStatus, jqXHR) {
                            $("#pay_container").html(data);
                        }
                    });
                }
            </script>
            <?php }?>
		</div>
	</div>
	<?php }?>

    <?php if($pay_item=='product'){?>
	<div style="float: left;width: 100%;">
		<div id="box_pay">
			<strong style="font-size: 16px;"><?php echo lang($link,'mua_sp'); ?></strong><br /><br />
			<?php
            $query_product=mysqli_query($link,"SELECT `price`,`link_download` FROM `products` WHERE `id`='$pay_id_music' LIMIT 1");
            $data_product=mysqli_fetch_array($query_product);
            $price_product=$data_product['price'];

            $url_img_thumb=get_url_icon_product($pay_id_music,'170x170',false);
            $title_page=get_name_product_lang($link,$pay_id_music,$lang_sel);

            ?>
			<?php echo $title_page ?><br/><br/>
			<a href="<?php echo $url;?>/product/<?php echo $pay_id_music;?>"><img  style="width: 200px;" src="<?php echo $url_img_thumb; ?>" /></a><br />
            <?php if($pay_status!='1'){?>
            <b style="color: #e27f00;">$<?php echo $price_product;?></b><br/>
            <?php }?>
            <div id="pay_container">
                <?php
                if($pay_status!=''){
                    if($pay_status=='0'){
                        echo lang($link,'pay_method').'<br/>';
                    }
                    
                    if($pay_status=='1'){
                        echo '<strong style="color:green"><i class="fa fa-check-circle" aria-hidden="true"></i> '.lang($link,'pay_success').'</strong>';
                    }
                    
                    if($pay_status=='2'){
                        echo '<strong style="color:#de0a0a"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.lang($link,'pay_fail').'</strong>';
                    }
                    
                }
                ?>
                <br />
                <?php
                if($pay_status=='1'){
                ?>
                    <a style="width: 100%;" href="#" onclick="show_box_download_link();return false;" id="download_song" >
                        <i class="fa fa-download fa-3x" aria-hidden="true" style="margin-top: 20px;"></i><br />
                        <span><?php echo lang($link,'download_game');?></span>
                    </a>
                <?php }?>
                <div id="paypal-button-container"></div>
            </div>
            <script>
                var PAYPAL_CLIENT = 'AYgLieFpLUDxi_LBdzDqT2ucT4MIa-O0vwX7w3CKGfQgMGROOHu-xz2y5Jes77owCYQ1eLmOII_ch2VZ';
                var PAYPAL_SECRET = 'ELkToqss_tBZdsHFOHfMFiyu23mNr9HDu1X--jqaZWCbS3xr_xg4hlCBHvV8GcyD15HIPgcwFi9BgqMp';
                var PAYPAL_ORDER_API = 'https://api.paypal.com/v2/checkout/orders/';

                function show_box_download_link(){
                            var arr_link_download= JSON.parse('<?php echo $data_product['link_download'];?>');
                            var html_box_link="<div style='width:100%;text-align: left;font-size:12px;'>";
                            for(var i=0;i<arr_link_download.length;i++){
                                html_box_link=html_box_link+"<a target='_blank' href='"+arr_link_download[i]+"' style='width:100%;float:left;background-color:#e8e5e5;margin:3px;padding:3px;border-radius:3px;'><i class='fa fa-cloud-download' aria-hidden='true'></i> Path "+(i+1)+":"+arr_link_download[i]+"</a>";
                            }
                            html_box_link=html_box_link+"</div>";
                            swal({html: true, title: '<?php echo lang($link,"download_link"); ?>', text: html_box_link, showConfirmButton: true,});
                }
            </script>
            <script src="https://www.paypal.com/sdk/js?client-id=AYgLieFpLUDxi_LBdzDqT2ucT4MIa-O0vwX7w3CKGfQgMGROOHu-xz2y5Jes77owCYQ1eLmOII_ch2VZ"></script>
            <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                        amount: {
                            currency_code:'USD',
                            value: '<?php echo $price_product;?>',
                            breakdown: {
                                item_total: {value: '<?php echo $price_product;?>', currency_code: 'USD'}
                            }
                        }
                        }]
                    });
                    },
                    onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        pay_success(details.payer.name.given_name,details.payer.email_address);
                    });
                    }
                }).render('#paypal-button-container');

                function pay_success(pay_name,pay_mail){
                    $.ajax({
                        url: "<?php echo $url;?>/index.php",
                        type: "post",
                        data: "function=order_product&id_music=<?php echo $pay_id_music;?>&lang_music=<?php echo $lang_sel; ?>&pay_name="+pay_name+"&pay_mail="+pay_mail,
                        success: function (data, textStatus, jqXHR) {
                            $("#pay_container").html(data);
                        }
                    });
                }
            </script>
		</div>
	</div>
	<?php }?>

    <div style="width: 100%;float: left;">&nbsp</div>
</div>
