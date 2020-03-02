<p>
                <div class="group">
                    <div class="title"><input type="checkbox" class="btnGroup" /> <?php echo lang('thu_vien_anh');?> </div>
                    <div class="content"  >
                        <p>
                        <?php echo lang('imgs_tip');?>
                        </p>
                        
                        <div id="images">
                        </div>
                        <br />
                        <button class="buttonPro small blue" onclick="show_upload('images','images');return false;"><?php echo lang('tai_anh_len'); ?></button>
                        <?php if(isset($_SESSION['username_login'])){?>
                            <button class="buttonPro small light_blue" onclick="sel_media('images','images');return false;"><?php echo lang('chon_anh_da_tai_len'); ?></button>
                        <?php }?>
                    </div>
                </div>
</p>
