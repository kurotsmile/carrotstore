<?php
$id_midi='60488af3096df60488af3096e1';
if(isset($_GET['id_midi'])) $id_midi=$_GET['id_midi'];
?>
<div style="width: 100%;float: left;text-align: center;">
    <div style="width: 100%;float: left;padding-top: 20px;padding-bottom: 10px;">
        <strong style="font-size: 20px;"><?php echo lang($link,'pay_title'); ?></strong>
    </div>

	<div style="float: left;width: 100%;">
		<div id="box_pay">
			<strong style="font-size: 16px;"><?php echo lang($link,'midi_download'); ?></strong><br /><br />
			<?php
            $query_midi=mysqli_query($link,"SELECT `name`,`data0`,`type0` FROM carrotsy_piano.`midi` WHERE `id_midi` = '$id_midi' LIMIT 1");
            if($query_midi){
            $data_midi=mysqli_fetch_array($query_midi);
            $title_page=$data_midi['name'];
            $url_img_thumb=$url_carrot_store.'/app_mygirl/obj_effect/1078.png';
            ?>
			<?php echo $title_page ?><br/><br/>
			<img onclick="go_to_pay();" style="margin-bottom:30px;" src="<?php echo $url_img_thumb; ?>" /><br />

            <b style="color: #e27f00;">$1.30</b><br/>
            <div id="pay_container">
                <?php echo lang($link,'pay_method').'<br/>'; ?>
                <br />
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
                            value: '1.30',
                            breakdown: {item_total: {value: '1.30', currency_code: 'USD'}}
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
                        data: "function=order_midi&id_midi=<?php echo $id_midi;?>&lang_midi=<?php echo $lang; ?>&pay_name="+pay_name+"&pay_mail="+pay_mail,
                        success: function (data, textStatus, jqXHR) {
                            $("#pay_container").html(data);
                        }
                    });
                }

                function export_midi_file(){
                    var data_midi_index='[<?php echo $data_midi['data0'];?>]';
                    var data_midi_type='[<?php echo $data_midi['type0'];?>]';

                    swal_loading();

                    if(data_midi_index!=""){
                        $.ajax({
                            url: "<?php echo $url;?>/page_piano_export_midi.php",
                            type: "post",
                            data: "data_midi_index="+data_midi_index+"&data_midi_type="+data_midi_type,
                            success: function(data, textStatus, jqXHR)
                            {
                                window.location.href='<?php echo $url; ?>/page_piano_download_midi.php?midi_name_file='+data;
                                swal("<?php echo lang($link,"midi_export");?>", "<?php echo lang($link,"midi_export_success");?>", "success");
                            }
                        });
                    }else{
                        swal("<?php echo lang($link,"midi_export");?>", "<?php echo lang($link,"midi_erro_no_data");?>", "warning");
                    }
                }

            </script>
            <?php }?>
		</div>
	</div>

    <div style="width: 100%;float: left;">&nbsp</div>
</div>
