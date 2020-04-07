<?php
if(isset($_GET['delete'])){
    unset($_SESSION['arr_history']);
}
?> 
<div style="float: left;padding: 20px">
    <h2><i class="fa fa-history" aria-hidden="true"></i> <?php  echo lang('lich_su');?> <?php if(isset($_SESSION['arr_history'])){?><a href="<?php echo $url;?>/index.php?page_view=page_history.php&delete=1" class="buttonPro small red"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo lang("history_delete") ?></a><?php }?></h2>
    
    <?php

        $arr_history=$_SESSION['arr_history'];
        for ($i=count($arr_history)-1;$i>=0;$i--){
            $item_history=$arr_history[$i];
            
            $id_history=$item_history[0];
            $type_history=$item_history[1];
            $time_history=$item_history[2];
            $lang_history=$item_history[3];
            
            $url_icon='';
            $name_obj='';
            $url_obj='';
            $category_obj='';
            
            if($type_history=='product'){
                $url_icon=get_url_icon_product($id_history,30);
                $name_obj=get_name_product_lang($id_history,$_SESSION['lang']);
                $url_obj=$url.'/product/'.$id_history;
                $category_obj='mua_sp';
            }
            
            if($type_history=='music'){
                $query_music=mysql_query("SELECT * FROM `app_my_girl_$lang_history` WHERE `effect` = '2' AND `id` = '$id_history' LIMIT 1");
                $data_music=mysql_fetch_array($query_music);
                $id_music=$data_music['id'];
                $name_obj=$data_music['chat'];
                
                $query_lyrics=mysql_query("SELECT * FROM `app_my_girl_".$lang_history."_lyrics` WHERE `id_music` = '$id_music' LIMIT 1");
                $data_lyrics=mysql_fetch_array($query_lyrics);
                mysql_free_result($query_lyrics);
                $query_link_video=mysql_query("SELECT `link` FROM `app_my_girl_video_$lang_history` WHERE `id_chat` = '$id_music' LIMIT 1");
                $data_video=mysql_fetch_array($query_link_video);
                $url_obj=$url.'/music/'.$id_music.'/'.$lang_history;
                    
                $url_icon=$url.'/thumb.php?src='.$url.'/images/music_default.png&size=30x30&trim=1';
                $filename_img='app_mygirl/app_my_girl_'.$lang_history.'_img/'.$id_music.'.png';
                if (file_exists($filename_img)) {
                    $url_icon=$url.'/'.$filename_img;
                }else{
                    if($data_video[0]!=''){
                        parse_str( parse_url( $data_video[0], PHP_URL_QUERY ), $my_array_of_vars );
                        $url_icon='https://img.youtube.com/vi/'.$my_array_of_vars['v'].'/hqdefault.jpg'; 
                    }
                }

                $category_obj='am_nhac_cho_cuoc_song';

            }
            
            
            if($type_history=='contact'){
                $query_account=mysql_query("SELECT * FROM `app_my_girl_user_$lang_history` WHERE `id_device` = '$id_history' LIMIT 1");
                $data_user=mysql_fetch_array($query_account);
                $name_obj=$data_user['name'];
                    
                if($data_user['avatar_url']!=''){
                    $url_icon=$data_user['avatar_url'];
                    $url_obj=$data_user['avatar_url'];
                }else{
                    $seo_img=$url.'/images/avatar_default.png';
                    $url_img='app_mygirl/app_my_girl_'.$lang_history.'_user/'.$id_history.'.png';
                    if(file_exists($url_img)){
                        $url_icon=$url.'/'.$url_img;
                    }
                    $url_obj=$url.'/user/'.$id_history.'/'.$lang_history;
                }
                $category_obj='luu_tru_lien_he';
            }
            
            if($type_history=='quote'){
                $query_quote=mysql_query("SELECT * FROM `app_my_girl_".$lang_history."` WHERE `id` = '$id_history' LIMIT 1");
                $data_quote=mysql_fetch_array($query_quote);
                $name_obj=$data_quote['chat'];
                
                $url_icon=$url.'/app_mygirl/obj_effect/927.png';
                if($data_quote['effect_customer']!=''){
                    $url_icon=$url.'/app_mygirl/obj_effect/'.$data_quote['effect_customer'].'.png';
                }
                $category_obj='trich_dan';
                $url_obj=$url.'/quote/'.$id_history.'/'.$lang_history;
            }
            ?>
            <p class=" buttonPro" id="row_notifi<?php echo $i;?>">
                <a href="<?php echo $url_obj; ?>" >
                    <img style="width: 30px;height: 30px;float: left;margin: 3px;" src="<?php echo $url_icon; ?>"/> 
                    <strong><?php echo  $name_obj;?></strong><br />
                    <span style="color: gray;font-size: 10px;"><?php echo lang($category_obj); ?></span><br />
                    <span style="color: gray;font-size: 8px;"><?php echo $time_history; ?></span>
                </a>
             </p>
            <?php
        }
    ?>
</div>