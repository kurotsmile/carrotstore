            <input type="hidden" value="<?php echo $_GET['sub_view']; ?>" name="type" />

            <p>
            <label for="name_product"><?php echo lang($link,'ten_sp'); ?> <span class="not_null">*</span></label><br />
            <input type="text" class="inp" name="name_product" id="name_product" />
            </p>
            
            <p>
            <label for="descrip_product"><?php echo lang($link,'mo_ta'); ?> <span class="not_null">*</span></label><br />
            <textarea name="descrip_product" class="inp" id="descrip_product"></textarea> 
            </p>
            
            <p>
            <label for="price_product"><?php echo lang($link,'gia'); ?></label><br />
                <input type="text" value="0" style="width: 150px;" class="inp" name="price_product" id="price_product" />
                <select name="price_country" class="inp" style="width: 150px;">
                <?php
                $result3 = mysql_query("SELECT * FROM `contry`",$link);
                 while ($row = mysql_fetch_array($result3)) {?>
                    <option value="<?php echo $row[1];?>" <?php if($row[1]==$_SESSION['lang']){ echo 'selected="true"';} ?> ><?php echo $row[3].'-'.$row[2]; ?></option>
                <?php }?>
                </select>
            </p>
            
            <p>
                <div class="group">
                    <div class="title"><input type="checkbox" class="btnGroup" /> <?php echo lang($link,'thanh_toan');?> </div>
                    <div class="content">
                        <i><?php echo lang($link,'tip_pay_sp'); ?></i><br />
                        <input type="text" class="inp" name="pay" /><br /><br />
                        <?php
                            if(isset($_SESSION['username_login'])){
                                echo lang($link,'tip_pay_sp_2').'<br/>';
                                $data_User=get_account($_SESSION['username_login']);
                                ?>
                                <a target="_blank" href="<?php echo $url;?>/index.php?page_view=page_account.php&sub_view=page_account_pay.php"><?php echo lang($link,'them_pay_accc'); ?></a><br />
                                <?php
                                echo '<input type="checkbox" />'.$data_User['pay'].'<br />'; 
                            }
                        ?>
                        <input type="checkbox" checked="true" /> <?php echo lang($link,'ban_qua_carrot'); ?><br />
                    </div>
                </div>
            </p>