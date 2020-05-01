<?php
include "phpqrcode/qrlib.php";
$id_link=$_GET['id'];
$query_link=mysql_query("SELECT * FROM `link` WHERE `id` = '$id_link' LIMIT 1");
$data_link=mysql_fetch_array($query_link);
?>
<style>
#share_link{
    width:100%;
}
</style>
<div id="bk_link">
    <div style="width: 10%;float: left;">&nbsp;</div>
    <div style="width: 10%;float: left;text-align: center;"><i style="font-size: 50px;margin-top: 26px;" class="fa fa-link" aria-hidden="true"></i></div>
    <div style="width: 70%;float: left;text-align: left;" id="link_create">
        <h2><?php echo lang($link,'shorten_link_detail'); ?></h2><br />
        <div style="color: slateblue;text-shadow: 1px 0px 11px #acff00;font-size: 15px;font-weight: bold;"><?php echo $data_link['link']; ?></div>
    </div>
    <div style="width: 10%;float: left;">&nbsp;</div>
</div>

<div style="width: 100%;float: left;margin-top: 20px;">
    <div style="width: 10%;float: left;">
        <?php 
            QRcode::png($url.'/link/'.$data_link['id'], 'phpqrcode/img_link/'.$data_link['id'].'.png', 'L', 4, 2);
        ?>
        <div style="padding: 10px;margin-left: 10px;">
        <span style="width: 130px;float: left;margin: 3px;margin-right: 10px;">
        <img style="float: left;width: 100%;" src="<?php echo $url;?>/phpqrcode/img_link/<?php echo $data_link['id'];?>.png" />
        <span class="tag_download">QR Code</span>
        </span>
        </div>
    </div>
    <div style="width: 70%;float: left;">
    <table>
        <tr>
            <td>ID</td><td><?php echo $data_link['id']; ?></td>
        </tr>
        <tr>
            <td><?php echo lang($link,'link_full');?></td><td><a href="<?php echo $data_link['link']; ?>" target="_blank"><?php echo $data_link['link']; ?></a></td>
        </tr>
        <tr>
            <td><?php echo lang($link,'shorten_link_create');?></td><td><a href="<?php echo $url;?>/link/<?php echo $data_link['id']; ?>" target="_blank"><?php echo $url;?>/link/<?php echo $data_link['id']; ?></a></td>
        </tr>
        <tr>
            <td><?php echo lang($link,'ngay_dang');?></td><td><?php echo $data_link['date']; ?></td>
        </tr>
        <tr>
            <td><?php echo lang($link,'luot_xem'); ?></td><td><?php echo $data_link['view']; ?></td>
        </tr>
        <?php
        if($data_link['id_user']!=''){
        ?>
        <tr>
            <td>
                <?php echo lang($link,'link_nguoi_tao'); ?>
            </td>
            <td>
            
            <?php
            if(isset($_SESSION['login_google'])){
                $data_user_link=get_account($data_link['id_user'],$data_link['lang']);
            ?>
                <a href="<?php echo $url;?>/user/<?php echo $data_link['id_user'] ?>/<?php echo $data_link['lang'];?>"><img src="<?php echo $data_user_link['avatar_url']; ?>" /></a>
            <?php
            }else{
            ?>
                <img src="<?php echo get_url_avatar_user($data_link['id_user'],$data_link['lang'],'80');?>" />
            <?php }?>
            <?php echo get_username_by_id($data_link['id_user']); ?>
            </td>
        </tr>
        <?php
        }
        ?>
        
        <tr>
            <td><?php echo lang($link,'shorten_link_home'); ?></td><td><a href="http://<?php echo get_home_url($data_link['link']); ?>" target="_blank"><?php echo get_home_url($data_link['link']); ?></a></td>
        </tr>
        <?php
        if($data_link['password']!=''){
        ?>
        <tr>
            <td>Mật khẩu</td><td><?php echo $data_link['password']; ?></td>
        </tr>
        <?php }?>
        <tr>
            <td><?php echo lang($link,'shorten_link_status');?></td><td><?php echo lang("shorten_link_status_".$data_link['status']); ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php echo show_share($url.'/l/'.$data_link['id']);?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <a class="buttonPro blue" href="<?php echo $url;?>/links"><i class="fa fa-list" aria-hidden="true"></i> <?php echo lang($link,'shorten_link_list'); ?></a>
                <?php
                if(isset($user_login)){
                ?>
                <a href="<?php echo $url;?>/links/<?php echo $user_login->id; ?>" class="buttonPro blue"><img src="<?php echo $user_login->avatar;?>" style="width: 13px;" /> <?php echo $user_login->name;?> : <?php echo lang($link,'shorten_link_my_list'); ?></a>
                <?php
                }
                ?>
                <a class="buttonPro blue" href="<?php echo $url;?>/link"><i class="fa fa-plus-circle" aria-hidden="true"></i> <?php echo lang($link,'shorten_link_btn'); ?></a>
            </td>
        </tr>
    </table>
    </div>
    <div style="width: 10%;float: left;">&nbsp;</div>
</div>