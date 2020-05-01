<?php
if (isset($user_login)) {
    if($user_login->id==$id_user) {
        ?>

        <script>
            $(function() {
                $('#features-carousel').utilCarousel({
                    responsiveMode : 'itemWidthRange',
                    pagination:true
                });
            });
        </script>


        <div class="container" style="float: left;width: 100%;">
            <div id="features-carousel" class="util-theme-default util-carousel features-carousel">
                <a href="<?php echo $url.'/user/'.$id_user.'/'.$lang;?>" class="item">
                    <i class="fa fa-cubes"></i>
                    <h3><?php echo lang($link,'tong_quan'); ?></h3>
                    <p><?php echo lang($link,'tong_quan_tip'); ?></p>
                </a>

                <a href="<?php echo $url;?>/index.php?page_view=page_member.php&sub_view_member=page_member_backup_contact.php&user=<?php echo $id_user;?>&lang=<?php echo $lang_sel;?>" class="item">
                    <i class="fa fa-address-book"></i>
                    <h3><?php echo lang($link,'sao_luu_danh_ba');?></h3>
                    <p><?php echo lang($link,'backup_contact_tip');?></p>
                </a>

                <a href="<?php echo $url;?>/links/<?php echo $user_login->id;?>" class="item">
                    <i class="fa fa-link"></i>
                    <h3><?php echo lang($link,'shorten_link_list'); ?></h3>
                    <p><?php echo lang($link,'shorten_link_list_tip');?></p>
                </a>

                <a href="<?php echo $url.'/user_edit/'.$id_user.'/'.$lang;?>" class="item">
                    <i class="fa fa-wrench"></i>
                    <h3><?php echo lang($link,'chinh_sua_thong_tin'); ?></h3>
                    <p><?php echo lang($link,'account_setting_tip');?></p>
                </a>

            </div>
        </div>
        <?php
    }
}
?>