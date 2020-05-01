        <h3><?php echo lang($link,'bai_viet_ve_sp'); ?></h3>
        <textarea id="noi_dung_tai_lieu" name="content" style="width: 80%;max-height: 400px;height: 400px;"><?php echo $data[6]; ?></textarea>
        <br />
        <button class="blue buttonPro small" onclick="show_upload('post','post');return false;"><?php echo lang($link,'tai_anh_len');?></button>
        <?php if(isset($_SESSION['username_login'])){?>
            <button class="buttonPro small light_blue" onclick="sel_media('post','post');return false;"><?php echo lang($link,'chon_anh_da_tai_len'); ?></button>
        <?php }?>
        <p>
            <label><?php echo lang($link,'dang_boi'); ?></label>
            <input type="text" disabled="true" value="<?php echo $data[9]; ?>" />
            <input type="hidden" name="id_user" value="<?php echo $data[9]; ?>" id="id_user" />
        </p>
        