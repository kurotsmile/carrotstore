            <p>
                <label for="ico_product"><?php echo lang('icon_sp'); ?></label><br />
                <div id="show_ico_product">
                    <img src="<?php echo $url; ?>/images/app.png" onclick="show_upload('ico_product','image');return false;" />
                </div>
                <input type="hidden" name="ico_product" value="" id="ico_product" />
                <button class="buttonPro small blue" onclick="show_upload('ico_product','image');return false;"><?php echo lang('tai_anh_len'); ?></button>
                <?php if(isset($_SESSION['username_login'])){?>
                <button class="buttonPro small light_blue" onclick="sel_media('ico_product','image');return false;"><?php echo lang('chon_anh_da_tai_len'); ?></button>
                <?php }?>
            </p>