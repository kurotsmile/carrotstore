<?php
$pay_item='';
$pay_status='';
$pay_device='';
$pay_id_music='';
$pay_lang='';
$lang_sel='';

if(isset($_GET['cancel_pay'])){
    unset($_SESSION['pay_device']);
}

if(isset($_GET['item'])){
    $pay_item=$_GET['item'];
}

if(isset($_GET['status'])){
    $pay_status=$_GET['status'];
}

if($pay_item!='music'){
    if(isset($_GET['device'])){
        $pay_device=$_GET['device'];
        $_SESSION['pay_device']=$pay_device;
    }else{
        if(isset($_SESSION['pay_device'])){
            $pay_device=$_SESSION['pay_device'];
        }
    }
}else{
    if(isset($_GET['device'])){
        $pay_id_music=$_GET['device'];
        $_SESSION['pay_id_music']=$pay_id_music;
    }else{
        if(isset($_SESSION['pay_id_music'])){
            $pay_id_music=$_SESSION['pay_id_music'];
        }
    }
}

if(isset($_GET['lang'])){
    if($pay_item!='music'){
        $pay_lang=$_GET['lang'];
        $_SESSION['lang']=$pay_lang;
    }else{
        $pay_lang=$_GET['lang'];
    }
    $lang_sel=$_GET['lang'];
}else{
    $lang_sel=$_SESSION['lang'];
}



if($pay_device!=''&&$pay_item!=''){
    if($pay_item!='music'){
        $query_check_pay=mysql_query("SELECT * FROM `pay` WHERE `id_user` = '$pay_device' AND `id_item` = '$pay_item' LIMIT 1");
        if(mysql_num_rows($query_check_pay)>0){
            $data_pay=mysql_fetch_array($query_check_pay);
            if($data_pay['status']=='0'&&$pay_status=='1'){
                $query_update_pay=mysql_query("UPDATE `pay` SET `status` = '1' WHERE `id_user` = '$pay_device' AND `id_item` = '$pay_item' LIMIT 1;");
            }
        }else{
            $query_add_order=mysql_query("INSERT INTO `pay` (`id_user`, `id_item`, `status`) VALUES ('$pay_device', '$pay_item', '0');");
        }
    }
}
?>

<div style="width: 100%;float: left;text-align: center;">
    <div style="width: 100%;float: left;padding-top: 20px;padding-bottom: 10px;">
        <strong style="font-size: 20px;"><?php echo lang($link,'pay_title'); ?></strong>
    </div>
    
    <?php if($pay_item!='music'){?>
        <div style="width: 50%;float: left;">
            <div style="margin: 5px;border-radius:2px;background-color: white;padding: 10px;max-width: 300px;margin-left: auto;">
            <strong style="font-size: 16px;"><?php echo lang($link,'sp'); ?></strong><br /><br />
            <img style="border-radius: 25px;" src="<?php echo get_url_icon_product('119','50'); ?>" /><br />
            <?php
            if($pay_item=='obj_nude'){
                echo '<br/>'.lang('pay_sp_obj_nude_name').'<br/><br/>';
                echo '<img onclick="go_to_pay();" style="width:150px;border-radius: 20px;cursor: pointer;" src="'.$url.'/images/pay_obj_nude.png"/><br/>';
                echo '<b style="color: #e27f00;">$4.99</b><br/>';  
            }
            
            if($pay_item=='remove_ads'){
                echo '<img onclick="go_to_pay();" style="width:150px;border-radius: 20px;cursor: pointer;" src="'.$url.'/images/pay_remove_ads.png"/><br/>'; 
                echo '<b style="color: #e27f00;">$4.99</b><br/>';  
            }
            
            if($pay_status!=''){
                if($pay_status=='0'){
                   echo lang($link,'pay_tip_buy_now');
                }
                
                if($pay_status=='1'){
                    echo '<strong style="color:green"><i class="fa fa-check-circle" aria-hidden="true"></i> '.lang('pay_success').'</strong>';
                }
                
                if($pay_status=='2'){
                    echo '<strong style="color:#de0a0a"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.lang('pay_fail').'</strong>';
                }
                
            }
    
            if($pay_item=='obj_nude'){ 
            ?>
            <br />
            <form id="frm_pay" style="width: 100%;float: left;margin-top: 20px;" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="6DVRU2TBYCN3S">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
            <?php }?>
        
            <?php
            if($pay_item=='remove_ads'){
            ?>
            <form id="frm_pay" style="width: 100%;float: left;"  action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="AYZCHKJV8QY24">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
            <?php }?>
            </div>
        </div>
        
        <?php 
        if($pay_device!=''){
            $query_account=mysql_query("SELECT * FROM `app_my_girl_user_$pay_lang` WHERE `id_device` = '$pay_device' LIMIT 1");
            $sdt='';
            $address_account='';
            if(mysql_num_rows($query_account)>0){
                $data_user_pay=mysql_fetch_array($query_account);
                $sdt=$data_user_pay['sdt'];
                $address_account=$data_user_pay['address'];
            }
            
        ?>
        <div style="width: 50%;float: left;">
            <div style="margin: 5px;border-radius:2px;padding: 10px;max-width: 300px;margin-right: auto;">
            <strong style="font-size: 16px;"><?php echo lang($link,'pay_account'); ?></strong><br /><br />
            <img src="<?php echo get_url_avatar_user($pay_device,$_SESSION['lang'],'100');?>'"/><br />
            <b style="color: green;"><?php echo get_username_by_id($pay_device);?></b>
            <p>
            <ul style="text-align: left;list-style: none;padding: 0px;margin: 0px;overflow-wrap: break-word;">
            <li><strong><i class="fa fa-mobile" aria-hidden="true"></i> ID carrot:</strong> <?php echo $pay_device; ?></li>
            <?php if($sdt!=''){?><li><strong><i class="fa fa-phone-square"></i> <?php echo lang($link,'so_dien_thoai');?>:</strong> <?php echo $sdt; ?></li><?php }?>
            <?php if($address_account!=''){?><li><strong><i class="fa fa-map-marker"></i> <?php echo lang($link,'dia_chi');?>:</strong> <?php echo $address_account;?></li><?php }?>
            </ul>
            <br />
            <i><?php echo lang($link,'pay_tip_done'); ?></i>
            </p>
            </div>
        </div>
        <?php }?>
    <?php }?>
    
    <?php if($pay_item=='music'){?>
    <div style="float: left;width: 100%;">
            <div style="margin: 5px;border-radius:2px;background-color: white;padding: 10px;max-width: 400px;margin-left: auto;margin-right: auto;min-height: 400px;">
            <strong style="font-size: 16px;"><?php echo lang($link,'download_song'); ?></strong><br /><br />
            
            <?php
            $query_music=mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `effect` = '2' AND `id`='$pay_id_music'");
            $data_music=mysql_fetch_array($query_music);
            $title_page=$data_music['chat'];
        
            $query_link_video=mysql_query("SELECT `link` FROM `app_my_girl_video_$lang_sel` WHERE `id_chat` = '$pay_id_music' LIMIT 1");
            $data_video=mysql_fetch_array($query_link_video);
            $url_mp3=$url.'/app_mygirl/app_my_girl_'.$lang_sel.'/'.$pay_id_music.'.mp3';
                
            $url_img_thumb=$url.'/thumb.php?src='.$url.'/images/music_default.png&size=170x170&trim=1';
            if($data_video[0]!=''){
                    parse_str( parse_url( $data_video[0], PHP_URL_QUERY ), $my_array_of_vars );
                    $url_img_thumb='https://img.youtube.com/vi/'.$my_array_of_vars['v'].'/hqdefault.jpg'; 
            }
            ?>
            <?php echo $title_page ?><br/><br/>
            <img onclick="go_to_pay();" style="width: 200px;" src="<?php echo $url_img_thumb; ?>" /><br />
            <?php if($pay_status!='1'){?>
            <b style="color: #e27f00;">$0.99</b><br/>
            <?php }?>
            <?php
            if($pay_status!=''){
                if($pay_status=='0'){
                   echo lang($link,'pay_tip_buy_now');
                }
                
                if($pay_status=='1'){
                    echo '<strong style="color:green"><i class="fa fa-check-circle" aria-hidden="true"></i> '.lang('pay_success').'</strong>';
                }
                
                if($pay_status=='2'){
                    echo '<strong style="color:#de0a0a"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.lang('pay_fail').'</strong>';
                }
                
            }
            ?>
            <br />
            
            <?php if($pay_status!='1'){?>
            <form id="frm_pay" style="width: 100%;float: left;"  action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="KHJJKPUQ7YVEJ">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
            <?php
            }else{
                if($data_music['file_url']!=''){
                    $url_download=$data_music['file_url'].'&type=0';
                }else{
                    $url_download='app_mygirl/app_my_girl_'.$lang_sel.'/'.$pay_id_music.'.mp3&type=1';
                }

                ?>
            <script>
            function showlikepage(){
                swal({
                    title: "<?php echo lang($link,'download_song');?>",
                    text: "<iframe src='http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/virtuallover&width=292&colorscheme=light&show_faces=false&stream=false&header=false&height=80' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:100%; height:62px;float:left;;margin-bottom:20px;margin-left: 91px;' allowTransparency='true'></iframe> <?php echo lang($link,'tai_thanh_cong_tip'); ?>",
                    type: "success",
                    html:true
                });
            }
            </script>
            <a style="width: 100%;" href="<?php echo $url;?>/download.php?file=<?php echo $url_download;?>" onclick="showlikepage();" id="download_song" >
                <i class="fa fa-download fa-3x" aria-hidden="true" style="margin-top: 20px;"></i><br />
                <span><?php echo lang($link,'download_song');?></span>
            </a>
            <?php }?>

            </div>
    </div>
    <? }?>
    
    <div style="width: 100%;float: left;">
       <!-- <a class="buttonPro small" href="<?php echo $url?>/?page_view=page_pay.php&cancel_pay=1">Hủy bỏ</a>!-->
    </div>
</div>

<script>
function go_to_pay(){
    $('#frm_pay').submit();
}
</script>


