<div id="row<?php echo $row[0]; ?>" class="app" >
    <div class="app_title">
        <a href="<?php echo $url; ?>/user/<?php echo $row[0]; ?>">
            <h1>
                <?php
                        if($row['sex']=='0'){
                            echo '<span class="fa fa-mars"></span>';
                        }elseif($row['sex']=='1'){
                            echo '<span class="fa fa-venus"></span>';
                        }else{
                            echo '<span class="fa fa-mars-double"></span>';
                        }
                ?>

                <?php echo limit_words($row['name'],7); ?>
            </h1>
        </a>
    </div>
    <a href="<?php echo $url; ?>/user/<?php echo $row[0]; ?>/<?php echo $lang_sel;?>">
        <?php
            $url_img='app_mygirl/app_my_girl_'.$lang_sel.'_user/'.$row[0].'.png';
            if(file_exists($url_img)){
            ?>
            <img  alt="<?php echo $row['name']; ?>" src="<?php echo $url;?>/thumb.php?src=<?php echo $url.'/'.$url_img;?>&size=170x170&trim=1" class="app_icon" style="height: 100px;" />
            <?php
            }else{
            if($row['sex']=='0') {
                ?>
                <img alt="<?php echo $row['name']; ?>"
                     src="<?php echo $url; ?>/thumb.php?src=<?php echo $url; ?>/images/avatar_boy.jpg"
                     class="app_icon"/>
                <?php
            }else{
                ?>
                <img alt="<?php echo $row['name']; ?>"
                     src="<?php echo $url; ?>/thumb.php?src=<?php echo $url; ?>/images/avatar_girl.jpg"
                     class="app_icon"/>
                <?php
            }
            }
        ?>
        
    </a>
    <div class="app_txt">
            <?php if($row['sdt']!=''){?>
            <p class="app_address" style="padding: 0px;margin:0px;">
                <i class="fa fa-phone" aria-hidden="true"></i> 
                <strong><?php echo lang("so_dien_thoai");?>:</strong>
                <a href="callto://+<?php echo $row['sdt']; ?>"><?php echo $row['sdt']; ?></a></span>
            </p>
            <?php }?>
            
            <?php if($row['address']!=''){?>
            <p class="app_address" style="padding: 0px;margin:0px;">
                <i class="fa fa-map-marker"></i>
                <strong><?php echo lang("dia_chi");?>:</strong>  
                <?php echo $row['address'];?>
            </p>
            <?php }?>
            
            <p class="app_address" style="padding: 0px;margin:0px;">
                <i class="fa fa-globe" aria-hidden="true"></i>
                <strong><?php echo lang("quoc_gia");?>:</strong>  
                <img style="height: 12px;" src="<?php echo $url;?>/app_mygirl/img/<?php echo $lang_sel;?>.png"/> <?php echo $lang_sel;?>
            </p>
        <br />
    </div>
    <div class="app_type" style="color: #515151;font-size: 11px;font-weight: normal;">
        <i class="fa fa-envelope" aria-hidden="true"></i> - <i class="fa fa-phone-square" aria-hidden="true"></i> - <i class="fa fa-id-card-o" aria-hidden="true"></i>
    </div>
    <div class="app_action">
        <a href="<?php echo $url; ?>/user/<?php echo $row[0]; ?>/<?php echo $lang_sel;?>" class="buttonPro small "><?php echo lang('chi_tiet'); ?></a>
        <a href="callto://+<?php echo $row['sdt']; ?>" class="buttonPro small "><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <?php echo lang('goi_dien'); ?></a>
        <button onclick="show_menu_app(this);return false;" class="buttonPro <?php //if(isset($_SESSION['username_login'])&&$_SESSION['username_login']==$row[4]){ echo 'orange'; }else{ echo 'red'; }?> small btn_more"><i class="fa fa-ellipsis-h"></i></button>
    </div>

    <div class="menu_more">
        <a class="buttonPro orange" href="callto://+<?php echo $row['sdt']; ?>" ><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <?php echo lang('goi_dien'); ?></a>
        <a href="#" style="width: auto" onclick="$(this).parent().parent().removeClass('menu_app');return false;" class="buttonPro small"><i class="fa fa-arrow-circle-o-left"></i></a>
    </div>
    
    <script>
        arr_id_user.push('<?php echo $row['id_device']; ?>');
    </script>
</div>