
<div style="width: 100%;float:left" id="containt">
    <div style="padding:20px;">
    <p><h2><i class="fa fa-universal-access icon_green" aria-hidden="true"></i> <?php echo lang($link,'gioi_thieu'); ?></h2></p>
    <p><?php echo str_replace('Carrotstore.com','<a class="url_carrot" href="'.$url.'">Carrotstore.com</a>',strip_tags(lang($link,'gioi_thieu_tip')));?>
    </p>
    <p><h2><i class="fa fa-user-secret icon_green" aria-hidden="true"></i> <?php echo lang($link,'chinh_sach');?></h2></p>
    <p>
    <?php echo nl2br(lang($link,'chinh_sach_tip'));?>
    </p>
    <ul>
        <li><?php echo lang($link,'policy_1'); ?></li>
        <li><?php echo lang($link,'policy_2'); ?></li>
    </ul>
    <p>
        <h2><i class="fa fa-user-circle icon_green" aria-hidden="true"></i> <?php echo lang($link,'lien_he'); ?></h2>
    </p>
    <p><?php echo lang($link,'lien_he_tip');?></p>
    <p>
        <i class="fa fa-envelope-o" aria-hidden="true"></i> <b>Mail:</b> <a href="mailto:tranthienthanh93@gmail.com">tranthienthanh93@gmail.com</a><br />
        <i class="fa fa-envelope-o" aria-hidden="true"></i> <b>Mail:</b> <a href="mailto:tranrot93@gmail.com">tranrot93@gmail.com</a><br />
        <i class="fa fa-facebook" aria-hidden="true"></i>  <b>Fan Page:</b> <a href="https://www.facebook.com/virtuallover" target="_blank">https://www.facebook.com/virtuallover</a><br />
        <i class="fa fa-youtube" aria-hidden="true"></i>  <b>Youtube Channel:</b> <a href="http://www.youtube.com/channel/UC3QJdQsthH5iEHOGg9YDLPA?sub_confirmation=1" target="_blank">Ấu Trĩ Art</a><br />
        <i class="fa fa-facebook-official" aria-hidden="true"></i> <b>Facebook:</b> <a href="https://www.facebook.com/kurotsmile" target="_blank">https://www.facebook.com/kurotsmile</a><br />
        <i class="fa fa-twitter" aria-hidden="true"></i> <b>Twitter:</b> <a href="https://twitter.com/carrotstore1" target="_blank">https://twitter.com/carrotstore1</a><br />
        <i class="fa fa-skype" aria-hidden="true"></i> <b>Skype:</b> <a href="skype:kurotsmile2?call" >kurotsmile2</a>
    </p>

    <?php if($lang=='vi'){?>
    <p><h2><i class="fa fa-odnoklassniki icon_green" aria-hidden="true"></i> <?php echo lang($link,'ung_ho'); ?></h2></p>
    <p>
        <?php echo lang($link,'chu_thich_ung_ho');?>
        <br/>
        <div id="momo_donation"></div>
        <br/>
        <i class="fa fa-money" aria-hidden="true"></i> <b>Momo</b>:<a href="https://me.momo.vn/carrot/l9avQQ7ZB86geG1" target="_blank">https://me.momo.vn/carrot/l9avQQ7ZB86geG1</a>
    </p>
    <?php }?>

    <?php echo lang($link,'thanks');?><br/>
    <div id="site_author"><i class="fa fa-heart heart" aria-hidden="true"></i></div>
    
    </div>
</div>
