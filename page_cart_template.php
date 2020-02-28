                <tr id="row<?php echo $row[0]; ?>">
                    <td><input type="checkbox" checked="true" /></td>
                    <td><a href="index.php?page_view=page_view.php&view_product=<?php echo $product[0];?>"><img title="<?php echo $product[1];?>" src="<?php echo thumb($product[3],80);?>" class="app_icon_table"/></a></td>
                    <td><a href="index.php?page_view=page_view.php&view_product=<?php echo $product[0];?>"><strong><?php echo $product[1];?></strong></a></td>
                    <td>
                        <i class="fa fa-minus-circle fa-2x" style="cursor: pointer;float: left;" onclick="btn_minus(this,<?php echo $row[0]; ?>,<?php echo $count_row; ?>)"></i> 
                        <input onkeyup="show_save(this,<?php echo $row[0]; ?>,<?php echo $count_row; ?>)" id="quantity_<?php echo $row[0]; ?>" type="text" style="width: 40px;float: left;margin-left: 5px;margin-right: 5px;text-align: center;"  class="inp" value="<?php echo $row[2]; ?>" /> 
                        <i class="fa fa-plus-circle fa-2x" onclick="btn_plus(this,<?php echo $row[0]; ?>,<?php echo $count_row; ?>)" style="cursor: pointer;float: left;"></i> 
                         &nbsp;&nbsp;&nbsp;<button id="save_<?php echo $row[0]; ?>" onclick="btn_save(this,<?php echo $row[0]; ?>,<?php echo $count_row; ?>)" style="display: none;" class="buttonPro small light_blue"><?php echo lang('luu_lai'); ?></button>
                    </td>
                    <td>
                        <?php
                        if(intval($product['price'])==0||trim($product['price'])==''){
                        ?>
                        <span class="free"><?php echo lang('mien_phi');?></span>
                        <input id="p_<?php echo $row[0]; ?>" type="hidden" value="0" />
                        <?php
                        }else{
                        ?>
                        <strong class="price"><?php echo convert_Usd($product['price'],$c[1]);?> $</strong>
                        <input id="p_<?php echo $row[0]; ?>" type="hidden" value="<?php echo $product['price'];?>" />
                        <?php
                        }
                        ?>
                    </td>
                    <td>
                        <span id="price_<?php echo $row[0]; ?>" ><?php 
                        $toal_price_product=intval(convert_Usd($product['price'],$c[1]))*intval($row[2]);
                        $toal_price+=$toal_price_product;
                        echo $toal_price_product.' ';
                        ?></span> $
                    </td>
                    <td>
                        <a href="#" onclick="delete_cart(this,<?php echo $row[0]; ?>,<?php echo $count_row; ?>)" class="buttonPro small red"><?php echo lang('xoa'); ?></a>
                        <?php
                        if($product[10]!=''&&intval($product[10])>0){
                            ?>
                        <form style="" action="<?php echo $paypal_url;?>" method="post">  
                            <input type="hidden" name="cmd" value="_xclick"/>  
                            <input type="hidden" name="image_url" value="<?php echo $url;?>/images/paypallogo.png"/>
                            <input type="hidden" name="business" value="<?php echo $paypal_mail_carrot; ?>"/>  
                            <input type="hidden" name="amount" value="<?php echo $product[10]; ?>" readonly="readonly"/>  
                            <input type="hidden" name="shipping" value="2"/>
                            <input type="hidden" name="shipping2" value="1.25"/>
                            <input type="hidden" name="handling_cart" value="1.05"/>
                            <input type="hidden" name="currency_code" value="USD"/>  
                            <input type="hidden" name="lc" value="AU"/>
                            <input type="hidden" name="bn" value="PP-BuyNowBF"/>  
                            <input type="hidden" name="cancel_return"  value="<?php echo $url.'/paycancel';?>"/>
                            <input type="hidden" name="return" value="<?php echo $url.'/paysuccess';?>"/>  
                            <input type="hidden" name="item_name" value="<?php echo $product['name_product']; ?>"/>
                            <button class="buttonPro googleButton small orange"><i class="fa fa-paypal"></i> Mua ngay qua paypal</button>
                        </form> 
                        <?php
                            }
                        ?>
                    </td>
                </tr>