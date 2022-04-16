<?php
    $url_song='';
    $id_music=$row['id'];
    $lang_sel=$row['author'];
    $music_title=addslashes(trim($row['chat']));

    $query_lyrics=mysqli_query($link,"SELECT SUBSTRING(`lyrics`, 1, 110) as l ,`artist`,`album` FROM `app_my_girl_".$lang_sel."_lyrics` WHERE `id_music` = '$id_music' LIMIT 1");
    $data_lyrics=mysqli_fetch_array($query_lyrics);
    mysqli_free_result($query_lyrics);
    $query_link_video=mysqli_query($link,"SELECT `link` FROM `app_my_girl_video_$lang_sel` WHERE `id_chat` = '$id_music' LIMIT 1");
    $data_video=mysqli_fetch_array($query_link_video);
    $url_mp3 = '';
    if($row['file_url']!='') {
        $url_mp3 = $row['file_url'];
    }else{
        $url_mp3 = $url . '/app_mygirl/app_my_girl_' . $lang_sel . '/' . $id_music . '.mp3';
    }
    
    $url_media=$url.'/thumb.php?src='.$url.'/images/music_default.png';
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
        $url_img_thumb=$url.'/thumb.php?src='.$url.'/'.$filename_img_avatar.'&size=100x100&trim=1';
        $url_media=$url.'/thumb.php?src='.$url.'/'.$filename_img_avatar.'&trim=1';
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
$count_status_0=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' AND `value`='0' LIMIT 1");
$count_status_1=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' AND `value`='1' LIMIT 1");
$count_status_2=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' AND `value`='2' LIMIT 1");
$count_status_3=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' AND `value`='3' LIMIT 1");
$data_0=mysqli_fetch_array($count_status_0);$data_m_0=$data_0[0];
$data_1=mysqli_fetch_array($count_status_1);$data_m_1=$data_1[0];
$data_2=mysqli_fetch_array($count_status_2);$data_m_2=$data_2[0];
$data_3=mysqli_fetch_array($count_status_3);$data_m_3=$data_3[0];
mysqli_free_result($count_status_0);
mysqli_free_result($count_status_1);
mysqli_free_result($count_status_2);
mysqli_free_result($count_status_3);
?>
<div id="row<?php echo $row['id']; ?>" class="app" >
    <div class="app_title">
        <a href="<?php echo $url_song;?>">
            <h1 style="font-size: -1vw;">
                <i class="fa fa-music" aria-hidden="true"  ></i>  &nbsp;&nbsp;
                <?php echo limit_words($row['chat'],7); ?>
            </h1>
        </a>
    </div>
    
    <?php if($list_style=='list'){?>
    <a href="#" class="app_link_icon" onclick="play_music_box_mini('<?php echo $count_item_music;?>');return false;">
        <img alt="<?php echo $row['chat']; ?>" class="lazyload app_icon" data-src="<?php echo $url_img_thumb;?>" heigth="100" width="100" />
    </a>
    <?php }else{?>
    <a href="<?php echo $url_song;?>" class="app_link_icon">
        <img alt="<?php echo $row['chat']; ?>"  src="<?php echo $url_img_thumb;?>" class="app_icon" heigth="100" width="100" />
    </a>
    <?php }?>
    
    <div class="app_txt">
            <p class="app_address" style="padding: 0px;margin:0px;height: 75px;overflow-y: auto;">
            <?php if($data_lyrics['l']!=''){?>
                <strong><i class="fa fa-book" aria-hidden="true"></i> <?php echo $label_loi_bai_hat;?></strong><br />
                <?php echo $data_lyrics['l'].'...'; ?>
            <?php }else{?>
                <i class="fa fa-sticky-note-o" aria-hidden="true"></i> <?php echo $label_chua_co_loi_bai_hat;?>
            <?php }?>
            </p>
        <br />
    </div>
    <div class="app_type" style="color: #515151;font-size: 11px;font-weight: normal;">
        <?php if($data_m_0=='0'&&$data_m_1=='0'&&$data_m_2=='0'&&$data_m_3=='0'){?>
        <span style="font-style: italic;" class="music_no_rank"><i class="fa fa-exclamation" aria-hidden="true"></i> <?php echo $label_music_no_rank; ?></span>
        <?php }else{?>
            <?php if($data_m_0!='0'){ ?><a  href="<?php echo $url; ?>/music/0"><i style="font-size: 15px;" class="fa fa-smile-o" aria-hidden="true"></i> <?php echo $data_m_0; ?></a><?php }?>
            <?php if($data_m_1!='0'){ ?><a href="<?php echo $url; ?>/music/1"><i style="font-size: 15px;" class="fa fa-frown-o" aria-hidden="true"></i> <?php echo $data_m_1; ?></a><?php }?>
            <?php if($data_m_2!='0'){ ?><a href="<?php echo $url; ?>/music/2"><i style="font-size: 15px;" class="fa fa-meh-o" aria-hidden="true"></i> <?php echo $data_m_2; ?></a><?php }?>
            <?php if($data_m_3!='0'){ ?><a  href="<?php echo $url; ?>/music/3"><i style="font-size: 15px;" class="fa fa-smile-o" aria-hidden="true"></i> <?php echo $data_m_3; ?></a><?php }?>
            <?php if(isset($row['c'])){?><i class="fa fa-star-half-o" aria-hidden="true"></i> <?php echo $row['c']; ?><?php }?>
        <?php }?>
    </div>
    <div class="app_action">
        <a href="<?php echo $url_song;?>" class="buttonPro small "><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $label_chi_tiet; ?></a>
        <?php if($list_style=='list'){?>
            <a href="#" onclick="play_music_box_mini('<?php echo $count_item_music;?>');return false;" class="buttonPro blue small "><i class="fa fa-play-circle-o" aria-hidden="true"></i> <?php echo $label_choi_nhac;?></a>
            <a href="music://show/<?php echo $id_music;?>/<?php echo $lang_sel;?>" onclick="" class="buttonPro blue small "><i class="fa fa-external-link-square" aria-hidden="true"></i></a>
            <?php if($url_video!=''){ ?><a href="#" onclick="stop_music_where_play_video();play_video('<?php echo $url_video ?>');return false;" class="buttonPro small light_blue"><i class="fa fa-video-camera" aria-hidden="true"></i></a><?php }?>
        <?php }?>

        <?php if(isset($user_login)){?>
            <span href="#" onclick="save_playlist_music('<?php echo $id_music;?>','<?php echo $lang_sel;?>','<?php echo $lang;?>','<?php echo $user_login->id;?>');return false;" class="buttonPro small light_blue"><i class="fa fa-plus-square" aria-hidden="true"></i></span>
        <?php }?>
    </div>

    <div class="menu_more" style="text-align: center;">
        <img  alt="<?php echo $row['chat']; ?>" src="<?php echo $url_img_thumb;?>" style="width:100px;height: 100px;" />
        <hr />
        <div style="font-size: 40px;">
        <i style="cursor: pointer;" class="fa fa-pause-circle" aria-hidden="true" onclick="$(this).parent().parent().removeClass('menu_app');pause_music();return false;"></i>
        <?php if($url_video!=''){ ?><i style="cursor: pointer;" class="fa fa-youtube-square" aria-hidden="true" onclick="stop_music_where_play_video();play_video('<?php echo $url_video ?>');"></i><?php }?>
        </div>
    </div>
    
    <?php if($list_style=='list'){?>
    <script>
        arr_id_obj.push('<?php echo $row['id']; ?>');
        var data_music = {
            id:'<?php echo $row['id']; ?>',
            src:'<?php echo $url_mp3;?>',
            title:'<?php echo $music_title;?>', 
            artist: '<?php if(isset($data_lyrics['artist'])) echo addslashes(trim($data_lyrics['artist']));?>',
            album: '<?php if(isset($data_lyrics['album'])) echo addslashes(trim($data_lyrics['album']));?>',
            artwork: [
                { src: '<?php echo $url_media; ?>&size=96x96&trim=1',   sizes: '96x96',   type: 'image/png' },
                { src: '<?php echo $url_media; ?>&size=128x128&trim=1', sizes: '128x128', type: 'image/png' },
                { src: '<?php echo $url_media; ?>&size=192x192&trim=1', sizes: '192x192', type: 'image/png' },
                { src: '<?php echo $url_media; ?>&size=256x256&trim=1', sizes: '256x256', type: 'image/png' },
                { src: '<?php echo $url_media; ?>&size=384x384&trim=1', sizes: '384x384', type: 'image/png' },
                { src: '<?php echo $url_media; ?>&size=512x512&trim=1', sizes: '512x512', type: 'image/png' },
            ]
        };
        arr_meta_music.push(data_music);
    </script>
    <?php }?>
</div>