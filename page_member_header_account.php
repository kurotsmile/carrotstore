<?php
$url_image_background = $url . '/images/bk_link.jpg';
$bk_size = 'auto';
$is_me=false;

if (isset($user_login)) {
    if($user_login->id==$id_user) {
        $is_me=true;
    }
}

$url_image_background = get_url_avatar_user($id_user,$lang,'300x300',false,$data_user['sex']);
$bk_size = 'auto 100%';

?>
<div id="account_cover" class="show_bk_account"
     style="background-image: url('<?php echo $url_image_background; ?>');background-size:<?php echo $bk_size; ?> ">
    <div class="neon-text">
        <?php echo $data_user['name']; ?>
    </div>

    <div id="account_menu">
        <ul style="margin: 0px;">
            <li <?php if($sub_view_member=='page_member_view_account.php'){ echo 'class="active"';}?> ><a href="<?php echo $url.'/user/'.$id_user.'/'.$lang;?>"><i class="fa fa-cubes"></i> <?php echo lang('tong_quan'); ?></a></li>
            <?php if($is_me){?>
                <li <?php if($sub_view_member=='page_member_edit_account.php'){ echo 'class="active"';}?> ><a href="<?php echo $url.'/user_edit/'.$id_user.'/'.$lang;?>"><i class="fa fa-wrench" aria-hidden="true"></i> <?php echo lang('chinh_sua_thong_tin'); ?></a></li>
            <?php }?>
        </ul>
    </div>
</div>