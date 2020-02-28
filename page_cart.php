<h2 style="padding: 10px;"><?php echo lang('gio_hang'); ?></h2>
<?php
$toal_price=0;
if(isset($_SESSION['username_login'])){
    $user_id=$_SESSION['username_login'];
    $result = mysql_query("SELECT * FROM `cart` WHERE `users` = '$user_id'",$link);
    if(mysql_num_rows($result)<=0){
    ?>
    <strong style="padding: 10px;"><?php echo lang('khong_co_du_lieu'); ?></strong>
    <?php }else{?>
        <table id="show_table">
        <tr>
            <th style="width: 3%;"><?php echo lang('chon');?></th>
            <th style="width: 8%;"><?php echo lang('sp');?></th>
            <th style="width: 15%;"><?php echo lang('ten_sp');?></th>
            <th style="width: 15%;"><?php echo lang('so_luong');?></th>
            <th style="width: 15%;"><?php echo lang('gia');?></th>
            <th style="width: 15%;"><?php echo lang('tong_gia');?></th>
            <th style="width: 15%;"><?php echo lang('thao_tac'); ?></th>
        </tr>
        <?php
            $count_row=0;
            while ($row = mysql_fetch_array($result)) {
                $product=get_row('products',$row['id_product']);
                $c=get_contry($product[11]);
                $count_row++;
                include "page_cart_template.php";
            }
            mysql_data_seek( $result, 0 );
        ?>
        </table>
        <p style="float: left;width: 100%;">
            <div style="padding: 10px;">
            <strong><?php echo lang('tong_gia'); ?>:<?php echo $toal_price; ?> $</strong>
            </div>
        </p>
        
        <form id = "paypal_checkout" action = "<?php echo $paypal_url; ?>" method = "post">
            <input name = "cmd" value = "_cart" type = "hidden"/>
            <input name = "upload" value = "1" type = "hidden"/>
            <input name = "no_note" value = "0" type = "hidden"/>
            <input name = "bn" value = "PP-BuyNowBF" type = "hidden"/>
            <input name = "tax" value = "0" type = "hidden"/>
            <input name = "rm" value = "2" type = "hidden"/>
         
            <input type="hidden" name="image_url" value="<?php echo $url;?>/images/paypallogo.png"/>
            <input name = "business" value = "<?php echo $paypal_mail_carrot; ?>" type = "hidden"/>
            <input name = "handling_cart" value = "0" type = "hidden"/>
            <input name = "currency_code" value = "USD" type = "hidden"/>
            <input type="hidden" name="lc" value="AU"/>
            <input name = "return" value = "<?php echo $url.'/paysuccess';?>" type = "hidden"/>
            <input name = "cbt" value = "Return to Carrot" type = "hidden"/>
            <input name = "cancel_return" value = "<?php echo $url.'/paycancel';?>" type = "hidden"/>
            <input name = "custom" value = "" type = "hidden"/>
            
            <?php
            $count_row=0;
            while ($row = mysql_fetch_array($result)) {
                $product=get_row('products',$row['id_product']);
                $c=get_contry($product[11]);
                if(intval($product['price'])!=0||trim($product['price'])!=''){
                    $count_row++;
                ?>
                <div id = "item_<?php echo $count_row;?>" class = "itemwrap">
                    <input name = "item_name_<?php echo $count_row;?>" value = "<?php echo $product[1];?>" type = "hidden"/>
                    <input id="item_quantity_<?php echo $count_row;?>" name = "quantity_<?php echo $count_row;?>" value = "<?php echo $row[2]; ?>" type = "hidden"/>
                    <input id="item_price_<?php echo $count_row;?>" name = "amount_<?php echo $count_row;?>" value = "<?php echo convert_Usd($product["price"],$c[1]);?>" type = "hidden"/>
                    <input name = "shipping_<?php echo $count_row;?>" value = "0" type = "hidden"/>
                </div>
                <?php
                }
            }
            ?>
            <input id = "ppcheckoutbtn" style="margin-left: 10px;" value = "<?php echo lang('kiem_tra'); ?>" class = "button buttonPro orange" type = "submit"/>
        </form>
    <?php }
}else{
    $arr=$_SESSION['cart'];
    if(count($arr)>0){
        ?>
            <table id="show_table">
        <tr>
            <th style="width: 3%;"><?php echo lang('chon');?></th>
            <th style="width: 8%;"><?php echo lang('sp');?></th>
            <th style="width: 15%;"><?php echo lang('ten_sp');?></th>
            <th style="width: 15%;"><?php echo lang('so_luong');?></th>
            <th style="width: 15%;"><?php echo lang('gia');?></th>
            <th style="width: 15%;"><?php echo lang('tong_gia');?></th>
            <th style="width: 15%;"><?php echo lang('thao_tac'); ?></th>
        </tr>
        <?php
        $count_row=0;
        for($i=0;$i<count($arr);$i++){
            $count_row++;
            $row=(array)$arr[$i];
            $row[0]=$i;
            $row[1]=$row['product_id'];
            $row[2]=$row["quantity"];
            $product=get_row('products',$row[1]);
            $c=get_contry($product[11]);
            include "page_cart_template.php";
        }
        ?>
        </table>
        <p style="float: left;width: 100%;">
            <div style="padding: 10px;">
            <strong><?php echo lang('tong_gia'); ?>:<?php echo $toal_price; ?> $</strong>
            </div>
        </p>
        
        <form id = "paypal_checkout" action = "<?php echo $paypal_url; ?>" method = "post">
            <input name = "cmd" value = "_cart" type = "hidden"/>
            <input name = "upload" value = "1" type = "hidden"/>
            <input name = "no_note" value = "0" type = "hidden"/>
            <input name = "bn" value = "PP-BuyNowBF" type = "hidden"/>
            <input name = "tax" value = "0" type = "hidden"/>
            <input name = "rm" value = "2" type = "hidden"/>
         
            <input type="hidden" name="image_url" value="<?php echo $url;?>/images/paypallogo.png"/>
            <input name = "business" value = "<?php echo $paypal_mail_carrot; ?>" type = "hidden"/>
            <input name = "handling_cart" value = "0" type = "hidden"/>
            <input name = "currency_code" value = "USD" type = "hidden"/>
            <input type="hidden" name="lc" value="AU"/>
            <input name = "return" value = "<?php echo $url.'/paysuccess';?>" type = "hidden"/>
            <input name = "cbt" value = "Return to Carrot" type = "hidden"/>
            <input name = "cancel_return" value = "<?php echo $url.'/paycancel';?>" type = "hidden"/>
            <input name = "custom" value = "" type = "hidden"/>
            
            <?php
            $count_row=0;
            for($i=0;$i<count($arr);$i++){
                $row=(array)$arr[$i];
                $row[0]=$i;
                $row[1]=$row['product_id'];
                $row[2]=$row["quantity"];
                $product=get_row('products',$row[1]);
                $c=get_contry($product[11]);
                $count_row++;
                ?>
                <div id = "item_<?php echo $count_row;?>" class = "itemwrap">
                    <input name = "item_name_<?php echo $count_row;?>" value = "<?php echo $product[1];?>" type = "hidden"/>
                    <input id="item_quantity_<?php echo $count_row;?>" name = "quantity_<?php echo $count_row;?>" value = "<?php echo $row[2]; ?>" type = "hidden"/>
                    <input id="item_price_<?php echo $count_row;?>" name = "amount_<?php echo $count_row;?>" value = "<?php echo convert_Usd($product["price"],$c[1]);?>" type = "hidden"/>
                    <input name = "shipping_<?php echo $count_row;?>" value = "0" type = "hidden"/>
                </div>
                <?php
            }
            ?>
            <input id = "ppcheckoutbtn" style="margin-left: 10px;" value = "<?php echo lang('kiem_tra'); ?>" class = "button buttonPro orange" type = "submit"/>
        </form>
        <?php
    }else{
        ?>
        <strong style="padding: 10px;"><?php echo lang('khong_co_du_lieu'); ?></strong>
        <?php
    }
}?>

<script>
function delete_cart(emp,row,index_cart){
    swal({
        title: "Are you sure?",   
        text: "<?php echo lang('hoi_xoa'); ?>",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        closeOnConfirm: false }, 
        function(){
            swal("Deleted!", "Your imaginary file has been deleted.", "success"); 
                    $(emp).after('<span class="alert"><?php echo lang('dang_xu_ly'); ?></span>');
        
            $.ajax({
                url: "<?php echo $url; ?>/index.php",
                type: "get", //kiểu dũ liệu truyền đi
                data: "function=delete_cart&id="+row, //tham số truyền vào
                success: function(data, textStatus, jqXHR)
                {
                    var num_cart=$('#num_cart').val();
                    var toal=parseInt(num_cart)-1;
                    $('#num_cart').val(toal);
                    $('#num_cart_show').html(toal);
                    $('#row'+row).remove();
                    $('#item_'+index_cart).remove();
                    <?php
                    if(isset($_SESSION['username_login'])){
                    ?>
                    window.location.reload();
                    <?php
                    }
                    ?>
                }
            
            });
        });
        return false;
}

function btn_plus(emp,row,index_cart){
    var quantity=$('#quantity_'+row).val();
    var quantity_returl=parseInt(quantity)+1;
    var price=parseInt($('#p_'+row).val());
    var price_return=quantity_returl*price;
    $('#quantity_'+row).val(quantity_returl);
    $('#price_'+row).html(price_return);
    
    $('#item_quantity_'+index_cart).val(quantity_returl);
    $('#item_price_'+index_cart).val(price_return);
    
    $('#save_'+row).fadeIn(200);
    $('#price_'+row).fadeOut(50).fadeIn(50).fadeOut(50).fadeIn(50);
}

function btn_minus(emp,row,index_cart){
    var quantity=$('#quantity_'+row).val();
    if(quantity>1){
        var quantity_returl=parseInt(quantity)-1;
        var price=parseInt($('#p_'+row).val());
        var price_return=quantity_returl*price;
        $('#quantity_'+row).val(quantity_returl);
        $('#price_'+row).html(price_return);
        
        $('#item_quantity_'+index_cart).val(quantity_returl);
        $('#item_price_'+index_cart).val(price_return);
        
        $('#save_'+row).fadeIn(200);
        $('#price_'+row).fadeOut(50).fadeIn(50).fadeOut(50).fadeIn(50);
    }else{
        $('#quantity_'+row).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
    }
}

function btn_save(emp,row,index_cart){
    var quantity=$('#quantity_'+row).val();
    $.ajax({
        url: "<?php echo $url; ?>/index.php",
        type: "get", //kiểu dũ liệu truyền đi
        data: "function=save_cart&id="+row+"&quantitys="+quantity, //tham số truyền vào
        success: function(data, textStatus, jqXHR)
        {
            swal('<?php echo lang('thanh_cong'); ?>','<?php echo lang('luu_lai_thanh_cong');?>','success'); 
            $(emp).fadeOut(200);    
        }
            
    });
}

function show_save(emp,row,index_cart){
    var quantity=$('#quantity_'+row).val();
    if(quantity=parseInt(quantity, 10)){
        var quantity_returl=parseInt(quantity);
        var price=parseInt($('#p_'+row).val());
        var price_return=quantity_returl*price;
        $('#quantity_'+row).val(quantity_returl);
        $('#price_'+row).html(price_return);
        
        $('#item_quantity_'+index_cart).val(quantity_returl);
        $('#item_price_'+index_cart).val(price_return);
        
        $('#save_'+row).fadeIn(200);
    }else{
       swal('<?php echo lang('loi'); ?>','<?php echo lang('du_lieu_sai');?>','error'); 
       $('#save_'+row).fadeOut(200);
       $('#quantity_'+row).val(1);
    }
}
</script>
