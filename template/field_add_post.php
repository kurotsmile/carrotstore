        <h3><?php echo lang('bai_viet_ve_sp'); ?></h3>
        <textarea id="noi_dung_tai_lieu" name="content" style="max-height: 600px;height: 600px;"></textarea>
        <br />
        <button class="blue buttonPro small" onclick="show_upload('post','post');return false;"><?php echo lang('tai_anh_len');?></button>
        <?php if(isset($_SESSION['username_login'])){?>
            <button class="buttonPro small light_blue " onclick="sel_media('post','post');return false;"><?php echo lang('chon_anh_da_tai_len'); ?></button>
        <?php }?>
            <p>
            <?php if(isset($_SESSION['username_login'])){ ?>
                <label><?php echo lang('dang_boi'); ?></label>
                <input type="text" disabled="true" value="<?php echo $_SESSION['username_login'];?>"/>
                <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['username_login'];?>" />
            <?php }else{?>
                <label>Email: <span class="not_null">*</span></label><br />
                <input type="text" class="inp" value="" name="id_user" id="id_user"/>
                
                <br />
                <strong><?php echo lang('tip_email'); ?></strong>
            <?php }?>
            </p>