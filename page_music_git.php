<?php
    $url_song='';
   $id_music=$row['id'];
   $lang_sel=$row['author'];
    $query_lyrics=mysql_query("SELECT * FROM `app_my_girl_".$lang_sel."_lyrics` WHERE `id_music` = '$id_music' LIMIT 1");
    $data_lyrics=mysql_fetch_array($query_lyrics);
    mysql_free_result($query_lyrics);
    $query_link_video=mysql_query("SELECT `link` FROM `app_my_girl_video_$lang_sel` WHERE `id_chat` = '$id_music' LIMIT 1");
    $data_video=mysql_fetch_array($query_link_video);
    $url_mp3 = '';
    if($row['url_file']!='') {
        $url_mp3 = $row['url_file'];
    }else{
        $url_mp3 = $url . '/app_mygirl/app_my_girl_' . $lang_sel . '/' . $id_music . '.mp3';
    }
    
    $url_img_thumb=$url.'/thumb.php?src='.$url.'/images/music_default.png&size=170x170&trim=1';
    $url_video='';
    $url_img_thumb_ytb='';
    
    if($data_video[0]!=''){
        parse_str( parse_url( $data_video[0], PHP_URL_QUERY ), $my_array_of_vars );
        $url_video=$my_array_of_vars['v'];
        $url_img_thumb_ytb='https://img.youtube.com/vi/'.$my_array_of_vars['v'].'/hqdefault.jpg'; 
    }
            
    $filename_img_avatar='app_mygirl/app_my_girl_'.$lang_sel.'_img/'.$id_music.'.png';
    if(file_exists($filename_img_avatar)){
        $url_img_thumb=$url.'/'.$filename_img_avatar;
    }else{
        if($url_img_thumb_ytb!=''){
            $url_img_thumb=$url_img_thumb_ytb;
        }
    }
    
    if($row['slug']!=''){
        $url_song=$url.'/song/'.$lang_sel.'/'.$row['slug'];
    }else{
        $url_song=$url.'/music/'.$row['id'].'/'.$lang_sel;
    }

$data_m_0='0';
$data_m_1='0';
$data_m_2='0';
$data_m_3='0';
$check_music_data=mysql_query("SELECT * FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' LIMIT 1");
if($check_music_data){
    if(mysql_num_rows($check_music_data)){
            if(mysql_num_rows($check_music_data)){
                $count_status_0=mysql_query("SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' AND `value`='0' LIMIT 1");
                $count_status_1=mysql_query("SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' AND `value`='1' LIMIT 1");
                $count_status_2=mysql_query("SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' AND `value`='2' LIMIT 1");
                $count_status_3=mysql_query("SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' AND `value`='3' LIMIT 1");
                $data_0=mysql_fetch_array($count_status_0);
                $data_1=mysql_fetch_array($count_status_1);
                $data_2=mysql_fetch_array($count_status_2);
                $data_3=mysql_fetch_array($count_status_3);
                
                $data_m_0=$data_0[0];
                $data_m_1=$data_1[0];
                $data_m_2=$data_2[0];
                $data_m_3=$data_3[0];

                mysql_free_result($count_status_0);
                mysql_free_result($count_status_1);
                mysql_free_result($count_status_2);
                mysql_free_result($count_status_3);
            }
    }
}    

?>
<div id="row<?php echo $row[0]; ?>" class="app" >
    <div class="app_title">
        <a href="<?php echo $url_song;?>">
            <h1 style="font-size: -1vw;">
                <i class="fa fa-music" aria-hidden="true"  ></i>  &nbsp;&nbsp;
                <?php echo limit_words($row['chat'],7); echo mysql_error();?>
            </h1>
        </a>
    </div>
    
    <?php if($list_style=='list'){?>
    <a href="#" >
        <img  onclick="play_music('<?php echo trim($row['chat']);?>','<?php echo $url_mp3;?>','<?php echo $url_img_thumb;?>',this);return false;" alt="<?php echo $row['chat']; ?>" src="<?php echo $url_img_thumb;?>" class="app_icon" style="height: 100px;" />
    </a>
    <?php }else{?>
    <a href="<?php echo $url_song;?>" >
        <img alt="<?php echo $row['chat']; ?>" onload="youtube_check($(this))" src="<?php echo $url_img_thumb;?>" class="app_icon" style="height: 100px;" />
    </a>
    <?php }?>
    
    <div class="app_txt">
            <p class="app_address" style="padding: 0px;margin:0px;height: 75px;overflow-y: auto;">
            <?php if($data_lyrics['lyrics']!=''){?>
                <strong><i class="fa fa-book" aria-hidden="true"></i> <?php echo lang('loi_bai_hat');?></strong><br />
                <?php echo $data_lyrics['lyrics']; ?>
            <?php }else{?>
                <i class="fa fa-sticky-note-o" aria-hidden="true"></i> <?php echo lang('chua_co_loi_bai_hat');?>
            <?php }?>
            </p>
        <br />
    </div>
    <div class="app_type" style="color: #515151;font-size: 11px;font-weight: normal;">
        <?php if($data_m_0=='0'&&$data_m_1=='0'&&$data_m_2=='0'&&$data_m_3=='0'){?>
        <span style="font-style: italic;"><i class="fa fa-exclamation" aria-hidden="true"></i> <?php echo lang('music_no_rank'); ?></span> 
        <?php }else{?>
            <?php if($data_m_0!='0'){ ?><a class="buttonPro small black" href="<?php echo $url; ?>/music/0"><i style="font-size: 15px;" class="fa fa-smile-o" aria-hidden="true"></i> <?php echo $data_m_0; ?></a><?php }?>
            <?php if($data_m_1!='0'){ ?><a class="buttonPro small black" href="<?php echo $url; ?>/music/1"><i style="font-size: 15px;" class="fa fa-frown-o" aria-hidden="true"></i> <?php echo $data_m_1; ?></a><?php }?>
            <?php if($data_m_2!='0'){ ?><a class="buttonPro small black" href="<?php echo $url; ?>/music/2"><i style="font-size: 15px;" class="fa fa-meh-o" aria-hidden="true"></i> <?php echo $data_m_2; ?></a><?php }?>
            <?php if($data_m_3!='0'){ ?><a class="buttonPro small black" href="<?php echo $url; ?>/music/3"><i style="font-size: 15px;" class="fa fa-smile-o" aria-hidden="true"></i> <?php echo $data_m_3; ?></a><?php }?>
            <?php if(isset($row['c'])){?><i class="fa fa-star-half-o" aria-hidden="true"></i> <?php echo $row['c']; ?><?php }?>
        <?php }?>
    </div>
    <div class="app_action">
        <a href="<?php echo $url_song;?>" class="buttonPro small "><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo lang('chi_tiet'); ?></a>
        <?php if($list_style=='list'){?>
        <a href="#" onclick="play_music('<?php echo trim($row['chat']);?>','<?php echo $url_mp3;?>','<?php echo $url_img_thumb;?>',this);return false;" class="buttonPro blue small "><i class="fa fa-play-circle-o" aria-hidden="true"></i> <?php echo lang('choi_nhac');?></a>
        <?php if($url_video!=''){ ?><a href="#" onclick="play_video('<?php echo $url_video ?>');return false;" class="buttonPro small light_blue"><i class="fa fa-video-camera" aria-hidden="true"></i></a><?php }?>
        <?php }?>
    </div>

    <div class="menu_more" style="text-align: center;">
        <img  alt="<?php echo $row['chat']; ?>" src="<?php echo $url_img_thumb;?>" style="width:100px;height: 100px;" />
        <hr />
        <div style="font-size: 40px;">
        <i style="cursor: pointer;" class="fa fa-pause-circle" aria-hidden="true" onclick="$(this).parent().parent().removeClass('menu_app');pause_music();return false;"></i>
        <?php if($url_video!=''){ ?><i style="cursor: pointer;" class="fa fa-youtube-square" aria-hidden="true" onclick="play_video('<?php echo $url_video ?>')"></i><?php }?>
        </div>
    </div>
    
    <?php if($list_style=='list'){?>
    <script>
        arr_id_music.push('<?php echo $row['id']; ?>');
    </script>
    <?php }?>
</div>