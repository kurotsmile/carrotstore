<?php
$query_type=mysqli_query($link,"SELECT `css_icon` FROM `type` WHERE `id` = '".$data['type']."' LIMIT 1");
$data_type=mysqli_fetch_array($query_type);
?>
<div style="float: left;width:100%">
    <div style="padding: 30px;padding-bottom: 0px;padding-top: 0px;">
        <h2><?php echo get_name_product_lang($link,$data['id'],$_SESSION['lang']);?></h2>
        <p>
            <img alt="<?php echo get_name_product_lang($link,$data['id'],$_SESSION['lang']);?>" style="float: left;margin: 4px;" title="<?php echo get_name_product_lang($link,$data['id'],$_SESSION['lang']);?>" src="<?php echo get_url_icon_product($data['id'],150);?>" />
            <?php 
                QRcode::png($url.'/product/'.$data['id'], 'phpqrcode/img_product/'.$data['id'].'.png', 'L', 4, 2);
            ?>
            <span style="width: 130px;float: left;margin: 3px;margin-right: 10px;">
            <img style="float: left;width: 100%;" src="<?php echo $url;?>/phpqrcode/img_product/<?php echo $data['id'];?>.png" />
            <span class="tag_download">QR Code</span>
            </span>
   
            
            <strong><?php echo lang($link,'loai'); ?>:</strong>
            <a style="color: orangered;font-weight: bold;" href="<?php echo $url; ?>/type/<?php echo $data["type"]; ?>"> <span class="<?php echo $data_type[0]; ?>"></span> <?php echo lang($link,$data["type"]);?></a>
            
            <br />
            <span class="product_view" > <i class="fa fa-eye"></i> <strong><?php echo lang($link,'luot_xem');?></strong>:<?php
                echo intval($data["view"]);
                $count_view=intval($data["view"]);
                $count_view++;
                mysqli_query($link,"UPDATE `products` SET `view` = '$count_view' WHERE `id` = '".$data['id']."';");
                ?></span><br/>
            <span class="date_create"><strong> <i class="fa fa-clock-o"></i> <?php echo lang($link,'ngay_dang'); ?>:</strong><?php echo date( 'd/m/Y',strtotime($data['date']));?> <?php if(trim($data['date_edit'])!=''){?> - <?php echo lang($link,'ngay_sua'); ?>:</strong><?php echo date( 'd/m/Y',strtotime($data['date_edit']));?><?php }?></span>
            <br />
            <?php
            $type_rate='product';
            include "template/field_rate_show.php";
            ?>
            <ul id="menu_download">
            <?php if($data['chplay_store']!=''){ ?><li><a href="<?php echo $data['chplay_store'];?>" target="_blank"><img src="<?php echo $url.'/images/chplay_download.png';?>" /></a></li><?php }?>
            <?php if($data['app_store']!=''){ ?><li><a href="<?php echo $data['app_store'];?>" target="_blank"><img src="<?php echo $url.'/images/app_store_download.png';?>" /></a></li><?php }?>
            <?php if($data['galaxy_store']!=''){ ?><li><a href="<?php echo $data['galaxy_store'];?>" target="_blank"><img src="<?php echo $url.'/images/galaxy_store_download.png';?>" /></a></li><?php }?>
            <?php if($data['window_store']!=''){ ?><li><a href="<?php echo $data['window_store'];?>" target="_blank"><img src="<?php echo $url.'/images/window_store_download.png';?>" /></a></li><?php }?>
            <?php if($data['huawei_store']!=''){ ?><li><a href="<?php echo $data['huawei_store'];?>" target="_blank"><img src="<?php echo $url.'/images/huawei_store_download.png';?>" /></a></li><?php }?>
            <?php if($data['apk']!=''){ ?><li><a class="buttonPro orange" href="<?php echo $data['apk'];?>" target="_blank"><img src="<?php echo $url.'/images/apk_download.png';?>" /></a></li><?php }?>
            <?php if($data['carrot_store']!=''){ ?><li><a href="<?php echo $data['carrot_store'];?>" target="_blank"><img src="<?php echo $url.'/images/carrotstore_app_web.png';?>" /></a></li><?php }?>
            <?php if(file_exists('product_data/'.$data['id'].'/ios/app.plist')){ ?><li><a href="itms-services://?action=download-manifest&amp;url=https://carrotstore.com/product_data/<?php echo $data['id'];?>/ios/app.plist" target="_blank" title="<?php echo lang($link,'download_on').' (Carrot Store)';?>"><img src="<?php echo $url.'/images/ipa_download.png';?>" /></a></li><?php }?>
            </ul>
        </p>

    </div>
    

    <script src="<?php echo $url; ?>/libary/utilcarousel-files/utilcarousel/jquery.utilcarousel.min.js"></script>
    <script src="<?php echo $url; ?>/libary/utilcarousel-files/magnific-popup/jquery.magnific-popup.js"></script>
        <script>
			$(function() {
				$('#simpleImg').utilCarousel({
					responsiveMode : 'itemWidthRange',
                    <?php if($data['type_view_img']=='0'){ echo 'itemWidthRange : [200, 300]';}else{ echo 'itemWidthRange : [600, 200]'; } ?>
				});
			});
    </script>
    
    <link rel="stylesheet" href="<?php echo $url; ?>/libary/utilcarousel-files/utilcarousel/util.carousel.css" />
    <link rel="stylesheet" href="<?php echo $url; ?>/libary/utilcarousel-files/utilcarousel/util.carousel.skins.css" />
    <link rel="stylesheet" href="<?php echo $url; ?>/libary/utilcarousel-files/magnific-popup/magnific-popup.css" />
    		<div class="container" style="float: left;width: 100%;">
    			<div id="simpleImg" class="util-theme-default util-carousel sample-img">
                <?php
                $id_product=$data['id'];
                $dirname = "product_data/".$id_product."/slide";
            $dir = opendir($dirname);
        
            while(false != ($file = readdir($dir)))
                {
                  if(($file != ".") and ($file != "..") and ($file != "index.php"))
                     {
                        $img="product_data/$id_product/slide/$file";
                    ?>
                    <div class="item">
					<div class="meida-holder">
						<img src="<?php if($data['type_view_img']=='0'){ echo thumb($img,'200x300');}else{ echo thumb($img,'800x400'); } ?>" alt="">
					</div>
					<div class="hover-content">
						<div class="overlay"></div>
						<div class="link-contianer">
							<a href="<?php echo $url.'/'.$img ?>" target="_blank"><i class="icon-link"></i></a>
                            <a href="<?php echo $url.'/'.$img ?>" class="img-link" title="Sample image 1 description"><i class="icon-search"></i></a>
						</div>
					</div>
				    </div>
                <?php }}?>    
    			</div>
    		</div>

    

<div style="float: left;width: 100%;background-color: white;">
    <div id="post_product">
    <?php
        echo get_desc_product_lang($link,$data['id'],$_SESSION['lang']);
        echo show_share($link,$seo_url); 
        
    ?>
                <iframe
                src="https://www.facebook.com/plugins/like.php?href=https://www.facebook.com/virtuallover?ref=ts&fref=ts"
                scrolling="no" frameborder="0"
                style="border:none;height: 50px;float: left; width: 100%;margin-top: 20px;">
            </iframe>
    </div>

    <div id="sidebar_product">
       <h3 class="title"><?php echo lang($link,'loai');?></h3>
        <ul class="list_category" >
            <?php
            $results_category = mysqli_query($link,"SELECT * FROM `type`");
            while ($category = mysqli_fetch_assoc($results_category)) {
                ?>
                <li><a href="<?php echo $url.'/type/'.$category['id'];?>"><span class="<?php echo $category['css_icon'];?>"></span> <?php echo lang($link,$category['id']);?></a></li>
                <?php
            }
            ?>
        </ul>


        <?php
        if(get_setting($link,'show_ads')=='1') {
        ?>
            <ins class="adsbygoogle"
                 style="display:inline-block;width:300px;height:300px"
                 data-ad-client="ca-pub-5388516931803092"
                 data-ad-slot="5771636042"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        <?php }?>

    </div>

</div>
<link rel="stylesheet" href="<?php echo $url;?>/plugins/codesnippet/lib/highlight/styles/obsidian.css"/>
<script src="<?php echo $url;?>/js/highlight.min.js"></script>
<script src="<?php echo $url;?>/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<script>
$(document).ready(function() {
  $('pre code').each(function(i, block) {
    hljs.highlightBlock(block);
  });
});
</script>

<div style="width: 100%;float: left">
    <div id="box_comments" style="width: 70%;float: left">
    <?php
                $type_comment='products';
                $id_product=$data['id'];
                include "template/field_comment.php";
    ?>
    </div>
    <div id="box_rates" style="width:30%;float: left;padding-top: 20px">
    <?php
        $type_rate='product';
        include "template/field_rate.php";
    ?>
    </div>
</div>
<?php
            $types=$data['type'];
            $id_product=$data['id'];
            $result3 = mysqli_query($link,"SELECT * FROM `products` WHERE `type` ='$types' AND `id` != '$id_product' AND `status`='1' ORDER BY RAND() LIMIT 8");
            if(mysqli_num_rows($result3)>0){
?>
<div style="float: left;width: 100%;">
<h2 style="padding-left: 30px;"><?php echo lang($link,'sp_tuong_tu'); ?></h2>
<?php
                while ($row = mysqli_fetch_array($result3)) {
                    include "page_view_all_product_git_template.php";
                }
                ?>
</div>
<?php }?>

</div>
