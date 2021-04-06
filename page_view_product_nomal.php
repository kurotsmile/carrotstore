<?php
$query_type=mysqli_query($link,"SELECT `css_icon` FROM `type` WHERE `id` = '".$data['type']."' LIMIT 1");
$data_type=mysqli_fetch_array($query_type);
?>
<div style="float: left;width:100%" id="containt">
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

            <?php
            if($data['link_download']){
                $price_product=$data['price'];
            ?>
            <a href="<?php if($price_product!=''){ echo $url.'/pay/product/0/'.$data['id']; }else{ echo '#';} ?>" onclick="<?php if($price_product==''){ echo 'show_box_download_link();return false;'; }?>"  id="download_song" class="full" style="height: 154px;margin-left: -2px;" >
                <i class="fa fa-download fa-3x" aria-hidden="true" style="margin-top: 20px;"></i><br /><br />
                <span><?php echo lang($link,'download_game');?><br/><i class="fa fa-desktop" aria-hidden="true"></i></span>
                <br />
                <?php if($data['price']!=''){?>
                    <span style="font-size: 20px;text-shadow: 2px 2px 2px black;margin-top: 6px;text-align: center;width: 100%;float: left;">$<?php echo $data['price'] ?></span>
                <?php }?>
            </a>
                <?php if($data['price']==''){?>
                <script>
                function show_box_download_link(){
                    var arr_link_download= JSON.parse('<?php echo $data['link_download'];?>');
                    var html_box_link="<div style='width:100%;text-align: left;font-size:12px;'>";
                    for(var i=0;i<arr_link_download.length;i++){
                        html_box_link=html_box_link+"<a target='_blank' href='"+arr_link_download[i]+"' style='width:100%;float:left;background-color:#e8e5e5;margin:3px;padding:3px;border-radius:3px;'><i class='fa fa-cloud-download' aria-hidden='true'></i> Path "+(i+1)+":"+arr_link_download[i]+"</a>";
                    }
                    html_box_link=html_box_link+"</div>";
                    swal({html: true, title: '<?php echo lang($link,"download_link"); ?>', text: html_box_link, showConfirmButton: true,});
                }
                </script>
                <?php }?>
            <?php }?>
   
            
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
            
            <?php if($data["link_youtube"]!=''){?><br /><a onclick="play_video('<?php echo $data["link_youtube"];?>');return false;" ><i  class="fa fa-youtube-square" aria-hidden="true"></i> <?php echo lang($link,'xem_video'); ?></a><?php }?>
			<?php if($data["company"]!=''){?><br/><a href="<?php echo $url.'/company/'.$data["company"];?>"><i  class="fa fa-building" aria-hidden="true"></i> <b><?php echo lang($link,'nha_phat_trien'); ?></b>:<?php echo $data['company']; ?></a><?php }?>
			<?php
            if(isset($user_login)&&$user_login->type=='admin'){
                    ?>
                    <script>
                    function open_edit(){
                        window.open("<?php echo $url.'/admin/?page_view=page_product&sub_view=page_product_update&id='.$data['id'];?>");
                    }
                    </script>
                    <br />
                    <span class="buttonPro  blue" target="_blank" rel="noopener" onclick="open_edit();" ><i class="fa fa-pencil-square" aria-hidden="true"></i> Chỉnh sửa sản phẩm</span>
                    <?php
            }
            ?>
            <?php
            $type_rate='product';
            include "template/field_rate_show.php";
            ?>
            <ul id="menu_download">
			<?php
			$query_link_store=mysqli_query($link,"SELECT * FROM `product_link` WHERE `id_product` = '".$data['id']."'");
			while($link_store=mysqli_fetch_assoc($query_link_store)){
				echo '<li><a href="'.$link_store['link'].'" target="_blank" rel="noopener"><img title="'.$link_store['name'].'" src="'.$url.'/assets/img_link/'.$link_store['icon'].'.jpg" /></a></li>';
			}
			?>
            <?php if(file_exists('product_data/'.$data['id'].'/ios/manifest.plist')){ ?><li><a href="itms-services://?action=download-manifest&amp;url=<?php echo 'https://'.$name_host;?>/product_data/<?php echo $data['id'];?>/ios/manifest.plist" target="_blank" rel="noopener" class="jailbreak"  id_product="<?php echo $data['id']; ?>"><img src="<?php echo $url.'/images/ipa_download.png';?>" /></a></li><?php }?>
			
            </ul>
        </p>

    </div>
    

    <script src="<?php echo $url; ?>/libary/utilcarousel-files/utilcarousel/jquery.utilcarousel.min.js?v=<?php echo get_setting($link,'ver');?>"></script>
    <script src="<?php echo $url; ?>/libary/utilcarousel-files/magnific-popup/jquery.magnific-popup.js?v=<?php echo get_setting($link,'ver');?>"></script>
        <script>
			$(function() {
				$('#simpleImg').utilCarousel({
					responsiveMode : 'itemWidthRange',
                    <?php if($data['type_view_img']=='0'){ echo 'itemWidthRange : [200, 300]';}else{ echo 'itemWidthRange : [600, 200]'; } ?>
				});
			});
    </script>
    
    <link rel="stylesheet" href="<?php echo $url; ?>/libary/utilcarousel-files/utilcarousel/util.carousel.min.css" />
    <link rel="stylesheet" href="<?php echo $url; ?>/libary/utilcarousel-files/utilcarousel/util.carousel.skins.min.css" />
    <link rel="stylesheet" href="<?php echo $url; ?>/libary/utilcarousel-files/magnific-popup/magnific-popup.min.css" />
    		<div class="container" style="float: left;width: 100%;">
    			<div id="simpleImg" class="util-theme-default util-carousel sample-img">
            <?php
            $id_product=$data['id'];
            $dirname = "product_data/".$id_product."/slide";
            $dir = opendir($dirname);
            $label_click_de_xem=lang($link,'click_de_xem');
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
							<a href="<?php echo $url.'/'.$img ?>" target="_blank" rel="noopener" title="<?php echo $label_click_de_xem;?>"><i class="fa fa-external-link" aria-hidden="true"></i></a>
                            <a href="<?php echo $url.'/'.$img ?>" class="img-link" title="<?php echo $label_click_de_xem;?>"><i class="fa fa-external-link-square" aria-hidden="true"></i></a>
						</div>
					</div>
				    </div>
                <?php }}?>    
    			</div>
    		</div>

<div id="area_product_content">
    <div id="post_product">
    <?php
        echo get_desc_product_lang($link,$data['id'],$_SESSION['lang']);
        echo show_share($link,$seo_url); 
    ?>
        <iframe src="https://www.facebook.com/plugins/like.php?href=https://www.facebook.com/virtuallover?ref=ts&fref=ts" scrolling="no" frameborder="0" style="border:none;height: 50px;float: left; width: 100%;margin-top: 20px;"></iframe>
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
    $label_click_de_xem=lang($link,'click_de_xem');
    $label_download_on=lang($link,'download_on');
    $label_loai=lang($link,'loai');
    $label_chi_tiet=lang($link,'chi_tiet');
                while ($row = mysqli_fetch_array($result3)) {
                    include "page_view_all_product_git_template.php";
                }
                ?>
</div>
<?php }?>

</div>
