
<div style="width: 90%;padding: 10px;margin-left: auto;margin-right: auto;">
<p>
    <h2><i class="fa fa-universal-access icon_green" aria-hidden="true"></i> <?php echo lang($link,'gioi_thieu'); ?></h2>
</p>

<p>
<?php echo strip_tags(lang($link,'gioi_thieu_tip')); ?>
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

<script>
    $(document).ready(function(){
        $('#site_author').each(function(){
            var txt_author='<img style="width:100%" src="images/author.jpg"/>';
            txt_author=txt_author+'<ul class="jailbreak_tip">';
            txt_author=txt_author+'<li><i class="fa fa-beer" aria-hidden="true"></i> <b>Biệt danh</b>: Rốt</li>';
            txt_author=txt_author+'<li><i class="fa fa-heart-o" aria-hidden="true"></i> <b>Kỹ năng</b>: Lập trình,thiết kế đồ họa,vẽ tranh</li>';
            txt_author=txt_author+'<li><i class="fa fa-calendar-o" aria-hidden="true"></i> <b>Năm sinh</b>: 1993</li>';
            txt_author=txt_author+'<li><i class="fa fa-map-marker" aria-hidden="true"></i> <b>Nơi ở</b>: Dương sơn hương toàn hương trà,Huế,Việt Nam</li>';
            txt_author=txt_author+'</ul>';
            $(this).qtip({
                content: {
                    text: txt_author,
                    title: '<i class="fa fa-user" aria-hidden="true"></i> <?php echo lang($link,'Trần Thiện Thanh'); ?>',
                },
                style: {
                    classes: 'qtip-green qtip-shadow',
                } ,
                position: {
                    my: 'bottom center',
                    at: 'top center'
                }
            }); 
        });
    });

</script>