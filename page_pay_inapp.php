<?php
$lang=$_GET['lang'];
$id_inapp=$_GET['id_inapp'];
$user_id=$_GET['user_id'];
$price_inapp='2.0';
$protocol_inapp='';
$is_login_inapp=0;
?>
<div style="width: 100%;float: left;text-align: center;">
    <div style="width: 100%;float: left;padding-top: 20px;padding-bottom: 10px;">
        <strong style="font-size: 20px;"><?php echo lang($link,'pay_title'); ?></strong>
    </div>

	<div style="float: left;width: 100%;">
		<div id="box_pay">
			<?php
            $query_in_app=mysqli_query($link,"SELECT * FROM `inapp` WHERE `id` = '$id_inapp' LIMIT 1");
            if($query_in_app){
                $data_inapp=mysqli_fetch_assoc($query_in_app);
                $data_lang_inapp=$data_inapp['data_lang'];
                $id_app_inapp=$data_inapp['id_app'];
                $key_name_data_lang=$data_inapp['data_lang'];
                $price_inapp=$data_inapp['price'];
                $protocol_inapp=$data_inapp['protocol'];

                $query_title_inapp=mysqli_query($link,"SELECT `title`,`tip` FROM `inapp_lang` WHERE `key` = '$data_lang_inapp' AND `lang` = '$lang' LIMIT 1");
                $data_lang=mysqli_fetch_assoc($query_title_inapp);
                $title_page=$data_lang['title'];
                $tip_page=$data_lang['tip'];
                $url_img_thumb=$url_carrot_store.'/images/128.png';
                if(file_exists('app_mobile/carrot_framework/inapp_data/'.$key_name_data_lang.'.png')) $url_img_thumb=$url_carrot_store.'/app_mobile/carrot_framework/inapp_data/'.$key_name_data_lang.'.png';
                $url_img_app_thum=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/product_data/'.$id_app_inapp.'/icon.jpg&size=50&trim=1';
                ?>
                <img style="border-radius:5px;" oncontextmenu="pay_success('Thien thanh','kurotsmile@gmail.com');return false;" src="<?php echo $url_img_app_thum;?>"/><br />
                <strong style="font-size: 16px;"><?php echo $title_page; ?></strong><br /><br />
                <?php echo $tip_page; ?><br/><br/>
                <img  style="margin-bottom:30px;max-width:120px;" src="<?php echo $url_img_thumb; ?>" /><br />
                <?php
                $query_user=mysqli_query($link,"SELECT `name` FROM `app_my_girl_user_$lang` WHERE `id_device` = '$user_id' LIMIT 1");
                $data_user=mysqli_fetch_assoc($query_user);
                if($data_user!=null){ 
                    $is_login_inapp=1;
                    echo '<a href="'.$url_carrot_store.'/user/'.$user_id.'/'.$lang.'" target="_blank" class="buttonPro small"><i class="fa fa-user" aria-hidden="true"> '.$data_user['name'].'</i></a><br/><br/>';
                }
                else {echo '<span class="buttonPro small"><i class="fa fa-desktop" aria-hidden="true"></i> '.$user_id.'</span><br/><br/>';}
                ?>
                
                <b style="color: #e27f00;font-size:25px;"><i class="fa fa-usd" aria-hidden="true"></i> <?php echo $price_inapp;?></b><br/>
                <div id="pay_container">
                    <?php echo lang($link,'pay_method').'<br/>'; ?>
                    <br />
                    <div id="paypal-button-container"></div>
                    <?php if($protocol_inapp!=''){?><a href="<?php echo $protocol_inapp;?>://show" class="buttonPro black"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> <?php echo lang($link,"back_app");?></a><?php }?>
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
                                value: '<?php echo $price_inapp;?>',
                                breakdown: {item_total: {value: '<?php echo $price_inapp;?>', currency_code: 'USD'}}
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
                            data: {
                                function:'order_inapp',
                                id_inapp:'<?php echo $id_inapp;?>',
                                pay_name:pay_name,
                                pay_mail:pay_mail,
                                user_id:'<?php echo $user_id;?>',
                                lang:'<?php echo $lang;?>',
                                is_login:'<?php echo $is_login_inapp;?>',
                                protocol:'<?php echo $protocol_inapp;?>'
                            },
                            success: function (data, textStatus, jqXHR) {
                                $("#pay_container").html(data);
                            }
                        });
                    }
                </script>
            <?php }?>
		</div>
	</div>

    <div style="width: 100%;float: left;">&nbsp</div>
</div>