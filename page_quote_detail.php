<?php
$id_quote=$_GET['id'];
$query_quote=mysqli_query($link,"SELECT * FROM `app_my_girl_".$lang_quote."` WHERE `id` = '$id_quote' LIMIT 1");
$data_quote=mysqli_fetch_assoc($query_quote);
$query_like=mysqli_query($link,"SELECT * FROM carrotsy_flower.`flower_action_$lang_quote` WHERE `id_maxim` = '$id_quote' AND `type` = 'like' ");
$query_distlike=mysqli_query($link,"SELECT  * FROM carrotsy_flower.`flower_action_$lang_quote` WHERE `id_maxim` = '$id_quote' AND `type` = 'distlike' ");
$query_comment=mysqli_query($link,"SELECT * FROM carrotsy_flower.`flower_action_$lang_quote` WHERE `id_maxim` = '$id_quote' AND `type` = 'comment' ");
$url_mp3=$url.'/app_mygirl/app_my_girl_'.$lang_quote.'/'.$data_quote['id'].'.mp3';
$img=$url.'/app_mygirl/obj_effect/927.png';
if($data_quote['effect_customer']!=''){
    $img=$url.'/app_mygirl/obj_effect/'.$data_quote['effect_customer'].'.png';
}

?>
<div id="containt" style="width: 100%;float: left;">
    <div id="post_product">
    <p style="font-size:15px;">
    <a href="flower://show/<?php echo $id_quote;?>/<?php echo $lang_quote;?>"><img src="<?php echo  $img;?>" style="margin: 5px;" /></a>
    <i class="fa fa-quote-left" aria-hidden="true"></i>
    <?php
        echo $data_quote['chat'];
    ?>
    <i class="fa fa-quote-right" aria-hidden="true"></i>

    <div  style="width: 100%;float: left;"> 
            <?php 
                include_once "phpqrcode/qrlib.php";
                QRcode::png($url.'/quote/'.$id_quote.'/'.$lang_quote, 'phpqrcode/img_quote/'.$id_quote.'.png', 'M', 4, 2);
            ?>
            <img alt="Get quote" src="<?php echo $url;?>/phpqrcode/img_quote/<?php echo $id_quote;?>.png" style="float: left;margin: 2px;" class="box_get_info_contact" title="<?php echo lang($link,"qr_tip");?>" />
            <a href="flower://show/<?php echo $id_quote;?>/<?php echo $lang_quote;?>" class="box_get_info_contact" title="<?php echo lang($link,"link_open_app_tip");?>"> <i class="fa fa-external-link-square fa-3x" aria-hidden="true" ></i><div class="txt"><span style="float:none"><?php echo lang($link,'link_open_app');?></span></div></a>
    </div>

    <?php
    echo show_share($link,$url.'/quote/'.$id_quote.'/'.$lang_quote);
    ?>
    </p>
    <br />
    <p style="width: 100%;float: left;">
        <i class="fa fa-commenting" aria-hidden="true"></i> <?php if($query_comment) echo mysqli_num_rows($query_comment); ?> | <i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php if($query_like) echo mysqli_num_rows($query_like); ?> | <i class="fa fa-thumbs-down" aria-hidden="true"></i> <?php echo mysqli_num_rows($query_distlike); ?>
    </p>
    
    <p style="width: 100%;float: left;">
    <?php
    include "template/field_comment_quote.php";
    ?>
    </p>
    
    <iframe src="https://www.facebook.com/plugins/like.php?href=https://www.facebook.com/virtuallover?ref=ts&fref=ts" scrolling="no" frameborder="0" style="border:none;height: 50px;float: left; width: 100%;margin-top: 20px;"></iframe>

        <?php
        if(get_setting($link,'show_ads')=='1') {
        ?>
        <div style="width:100%;float:left">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-format="fluid"
                data-ad-layout-key="-ck+8m-1w-30+cw"
                data-ad-client="ca-pub-5388516931803092"
                data-ad-slot="9207776534"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        <?php }?>
    </div>
    
    <div id="sidebar_product">
        <?php
            echo show_box_ads_page($link,'quote_page');
        ?>
        
        <!-- Trang chi ti?t -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:300px;height:300px"
             data-ad-client="ca-pub-5388516931803092"
             data-ad-slot="5771636042"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
             var arr_id_quote=[];
        </script>

    </div>
    
<?php
$list_quote=mysqli_query($link,"SELECT * FROM `app_my_girl_".$_SESSION['lang']."` WHERE  `effect`='36' LIMIT 10");
if(mysqli_num_rows($list_quote)>0){
?>
<div style="float: left;width: 100%;">
<h2 style="padding-left: 30px;"><?php echo lang($link,'quote_more'); ?></h2>
<?php
while ($row = mysqli_fetch_array($list_quote)) {
    include "page_quote_git.php";
}
?>
</div>
<?php }?>

</div>