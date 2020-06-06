<?php
$link_app=$row['slug'];
if(trim($row['slug'])!=''){
    $link_app=$url.'/p/'.$row['slug'];
}else{
    $link_app=$url.'/product/'.$row['id'];
}
$query_type=mysqli_query($link,"SELECT `css_icon` FROM `type` WHERE `id` = '".$row['type']."' LIMIT 1");
$data_type=mysqli_fetch_assoc($query_type);
    $p_name_product=get_name_product_lang($link,$row['id'],$_SESSION["lang"]);
?>
            <div id="row<?php echo $row['id']; ?>" class="app" oncontextmenu="show_menu_app(this,1);return false;">
                <div class="app_title"><a href="<?php echo $link_app;?>" title="<?php echo $label_click_de_xem.' ('.$p_name_product.')';?>"><h1><span class="<?php echo $data_type['css_icon'];?>"></span> <?php echo $p_name_product; ?></h1></a></div>
                <a href="<?php echo $link_app;?>"><img style="float: left;width: 100px;"  alt="<?php echo $p_name_product; ?>" title="<?php echo $label_click_de_xem.' ('.$p_name_product.')';?>" class="lazyload app_icon" data-src="<?php echo get_url_icon_product($row['id'],'100x100'); ?>" class="app_icon" /></a>
                <div class="app_txt">
                    <div class="desc">
                    <?php echo limit_words(get_desc_product_lang($link,$row['id'],$_SESSION['lang']),20); ?>
                    </div>
                        <?php if($row['chplay_store']!=''){ ?><a title="<?php echo $label_download_on.' (Chplay)';?>" alt="<?php echo $label_download_on.' (Chplay)';?>" class="buttonPro small green" href="<?php echo $row['chplay_store'];?>&hl=<?php echo $_SESSION["lang"];?>" target="_blank"><i class="fa fa-android" aria-hidden="true"></i></a><?php }?>
                        <?php if($row['app_store']!=''){ ?><a title="<?php echo $label_download_on.' (App Store)';?>" alt="<?php echo $label_download_on.' (App Store)';?>" class="buttonPro small green" href="<?php echo $row['app_store'];?>" target="_blank"><i class="fa fa-apple" aria-hidden="true"></i></a><?php }?>
                        <?php if($row['galaxy_store']!=''){ ?><a title="<?php echo $label_download_on.' (Galaxy store)';?>" alt="<?php echo $label_download_on.' (Galaxy store)';?>" class="buttonPro small green" href="<?php echo $row['galaxy_store'];?>" target="_blank"><i class="fa fa-scribd" aria-hidden="true"></i></a><?php }?>
                        <?php if($row['window_store']!=''){ ?><a title="<?php echo $label_download_on.' (Microsoft Store)';?>" alt="<?php echo $label_download_on.' (Microsoft Store)';?>" class="buttonPro small green" href="<?php echo $row['window_store'];?>" target="_blank"><i class="fa fa-windows" aria-hidden="true"></i></a><?php }?>
                        <?php if($row['huawei_store']!=''){ ?><a title="<?php echo $label_download_on.' (Huawei AppGallery)';?>" alt="<?php echo $label_download_on.' (Huawei AppGallery)';?>" class="buttonPro small green" href="<?php echo $row['huawei_store'];?>" target="_blank"><i class="fa fa-pagelines" aria-hidden="true"></i></a><?php }?>
						<?php if($row['chrome_store']!=''){ ?><a title="<?php echo $label_download_on.' (Chrome store)';?>" alt="<?php echo $label_download_on.' (Chrome store)';?>" class="buttonPro small green" href="<?php echo $row['chrome_store'];?>" target="_blank"><i class="fa fa-chrome" aria-hidden="true"></i></a><?php }?>
                        <?php if($row['apk']!=''){ ?><a title="<?php echo $label_download_on.' (Carrot Store)';?>" alt="<?php echo $label_download_on.' (Carrot Store)';?>" class="buttonPro small green" href="<?php echo $row['apk'];?>" target="_blank"><i class="fa fa-cloud-download" aria-hidden="true"></i></a><?php }?>
                        <?php
                            if(file_exists('product_data/'.$row['id'].'/ios/manifest.plist')){
                        ?>
                            <a class="buttonPro small green jailbreak" href="itms-services://?action=download-manifest&amp;url=<?php echo 'https://'.$name_host;?>/product_data/<?php echo $row['id'];?>/ios/manifest.plist" target="_blank" id_product="<?php echo $row['id']; ?>"><i class="fa fa-apple" aria-hidden="true"></i></a>
                        <?php }?>
                </div>
                <div class="app_type">
                    <?php echo $label_loai.' : <a  href="'.URL.'/type/'.$row['type'].'"> '.lang($link,$row['type']).'</a>'; ?>
                </div>
                <div class="app_action">
                <a href="<?php echo $link_app;?>" title="<?php echo $label_click_de_xem.' ('.$p_name_product.')';?>" class="buttonPro small "><i class="fa fa-chevron-right" aria-hidden="true"></i> <?php echo $label_chi_tiet; ?></a>
                <button onclick="show_menu_app(this,0);return false;" class="buttonPro small btn_more"><i class="fa fa-ellipsis-h"></i></button>
                </div>
                    <div class="menu_more">
                        <?php if($row['chplay_store']!=''){ ?><a class="buttonPro orange small" href="<?php echo $row['chplay_store'];?>&hl=<?php echo $_SESSION["lang"];?>" target="_blank"><i class="fa fa-android" aria-hidden="true"></i> <?php echo $label_download_on.' (Chplay)';?></a><?php }?>
                        <?php if($row['app_store']!=''){ ?><a class="buttonPro orange small" href="<?php echo $row['app_store'];?>" target="_blank"><i class="fa fa-apple" aria-hidden="true"></i> <?php echo $label_download_on.' (App Store)';?></a><?php }?>
                        <?php if($row['galaxy_store']!=''){ ?><a class="buttonPro orange small" href="<?php echo $row['galaxy_store'];?>" target="_blank"><i class="fa fa-scribd" aria-hidden="true"></i> <?php echo $label_download_on.' (Galaxy store)';?></a><?php }?>
                        <?php if($row['window_store']!=''){ ?><a class="buttonPro orange small" href="<?php echo $row['window_store'];?>" target="_blank"><i class="fa fa-windows" aria-hidden="true"></i> <?php echo $label_download_on.' (Microsoft Store)';?></a><?php }?>
                        <?php if($row['huawei_store']!=''){ ?><a class="buttonPro orange small" href="<?php echo $row['huawei_store'];?>" target="_blank"><i class="fa fa-pagelines" aria-hidden="true"></i> <?php echo $label_download_on.' (Huawei AppGallery)';?></a><?php }?>
                        <?php if($row['carrot_store']!=''){ ?><a class="buttonPro orange small" href="<?php echo $row['carrot_store'];?>" target="_blank"><i class="fa fa-adn" aria-hidden="true"></i> <?php echo $label_download_on.' (Carrot store)';?></a><?php }?>
						<?php if($row['chrome_store']!=''){ ?><a class="buttonPro orange small" href="<?php echo $row['chrome_store'];?>" target="_blank"><i class="fa fa-chrome" aria-hidden="true"></i> <?php echo $label_download_on.' (Chrome store)';?></a><?php }?>
                        <?php if($row['apk']!=''){ ?><a class="buttonPro orange" href="<?php echo $row['apk'];?>" target="_blank"><i class="fa fa-cloud-download" aria-hidden="true"></i> <?php echo $label_download_on.' (Carrot Store)';?></a><?php }?>
                        <?php
                            if(file_exists('product_data/'.$row['id'].'/ios/manifest.plist')){
                        ?>
                            <a class="buttonPro orange small jailbreak" href="itms-services://?action=download-manifest&amp;url=<?php echo 'https://'.$name_host;?>/product_data/<?php echo $row['id'];?>/ios/manifest.plist" target="_blank"  id_product="<?php echo $row['id']; ?>"><i class="fa fa-apple" aria-hidden="true"></i> <?php echo $label_download_on.' (Carrot Store)';?></a>
                        <?php }?>
                        <a href="#" style="width: auto" onclick="$(this).parent().parent().removeClass('menu_app');return false;" class="buttonPro small"><i class="fa fa-arrow-circle-o-left"></i></a>
                    </div>
                <?php
                $width_rate=get_star_width($link,$row['id'],'product');
                ?>
                <div class="app_star">
                    <div class="app_star1">&nbsp;</div>
                    <div style="width: <?php echo $width_rate;?>px;" class="app_star2">&nbsp;</div>
                </div>

                <script>
                arr_id_product.push(<?php echo $row['id']; ?>);
                </script>


            </div>