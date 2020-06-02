
<div style="width: 90%;padding: 10px;margin-left: auto;margin-right: auto;" id="contain">
<p>
    <h2><i class="fa fa-universal-access icon_green" aria-hidden="true"></i> <?php echo lang($link,'gioi_thieu'); ?></h2>
</p>

<p>
<?php 
echo str_replace('Carrotstore.com','<a class="url_carrot" href="'.$url.'">Carrotstore.com</a>',strip_tags(lang($link,'gioi_thieu_tip')));
?>
</p>


<p>
    <h2><i class="fa fa-user-secret icon_green" aria-hidden="true"></i> <?php echo lang($link,'chinh_sach');?></h2>
</p>

<p>
<?php echo nl2br(lang($link,'chinh_sach_tip'));?>
</p>
<ul>
    <li><?php echo lang($link,'policy_1'); ?></li>
    <li><?php echo lang($link,'policy_2'); ?></li>        
</ul>

<p>
    <h2><i class="fa fa-fort-awesome icon_green" aria-hidden="true"></i> <?php echo lang($link,'development_team');?></h2>
    <ul id="list_user_work">
    <?php
    $query_user_work=mysqli_query($link,"SELECT `user_id`, `full_name` FROM carrotsy_work.`work_user` WHERE `policy_show`='1'");
    while($row_user=mysqli_fetch_assoc($query_user_work)){
    ?>
        <li><a href="#" class="ajax_tip" ajax_data='{"function":"show_work_user_tip","id":"<?php echo $row_user['user_id']; ?>"}'><i class="fa fa-user-o" aria-hidden="true"></i> <?php echo $row_user['full_name'];?></a></li>
    <?php }?>
    </ul>
</p>

<p>
    <h2><i class="fa fa-user-circle icon_green" aria-hidden="true"></i> <?php echo lang($link,'lien_he'); ?></h2>
</p>

<p>
<?php echo lang($link,'lien_he_tip');?>
</p>
<p>
    <i class="fa fa-envelope-o" aria-hidden="true"></i> <b>Mail:</b> <a href="mailto:tranthienthanh93@gmail.com">tranthienthanh93@gmail.com</a><br />
    <i class="fa fa-envelope-o" aria-hidden="true"></i> <b>Mail:</b> <a href="mailto:tranrot93@gmail.com">tranrot93@gmail.com</a><br />
    <i class="fa fa-facebook" aria-hidden="true"></i>  <b>Fan Page:</b> <a href="https://www.facebook.com/virtuallover" target="_blank">https://www.facebook.com/virtuallover</a><br />
    <i class="fa fa-facebook-official" aria-hidden="true"></i> <b>Facebook:</b> <a href="https://www.facebook.com/kurotsmile" target="_blank">https://www.facebook.com/kurotsmile</a><br />
    <i class="fa fa-twitter" aria-hidden="true"></i> <b>Twitter:</b> <a href="https://twitter.com/carrotstore1" target="_blank">https://twitter.com/carrotstore1</a><br />
    <i class="fa fa-skype" aria-hidden="true"></i> <b>Skype:</b> <a href="skype:kurotsmile2?call" >kurotsmile2</a>
</p>

<!--
<img src="images/bk_rot_lieu.png" style="width: 320px;border-radius: 20px;box-shadow: 2px 2px 2px grey;" />
!-->
    <?php echo lang($link,'thanks');?><br/>
    <div id="site_author">
    <i class="fa fa-heart heart" aria-hidden="true"></i>
    <img src="<?php echo $url;?>/images/signature.png">
    </div>

</div>
