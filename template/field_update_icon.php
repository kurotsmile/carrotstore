            <p>
                <label for="ico_product"><?php echo lang($link,'icon_sp'); ?></label><br />
                <div id="show_ico_product">
                    <img src="<?php echo thumb($data[3],'90x90'); ?>" />
                </div>
                <input type="hidden" name="ico_product" value="<?php echo $data[3]; ?>" id="ico_product" />
                <button class="buttonPro small blue" onclick="show_upload('ico_product','image');return false;"><?php echo lang($link,'tai_anh_len'); ?></button>
                <?php if(isset($_SESSION['username_login'])){?>
                    <button class="buttonPro small light_blue" onclick="sel_media('ico_product');return false;"><?php echo lang($link,'chon_anh_da_tai_len'); ?></button>
                <?php }?>
            </p>