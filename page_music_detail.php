<?php
if(!isset($data_music['id'])){
?>
<div id="containt" style="width: 100%;float: left;text-align: center;">
    <p style="float: left;width: 100%;margin-top: 40px;">
        <i class="fa fa-exclamation-triangle fa-5x" aria-hidden="true"></i><br />
        <span style="margin-top: 10px;">
        <?php echo lang($link,'not_music'); ?>
        </span>
        <br />
        <br />
        <a class="buttonPro" href="<?php echo $url;?>/music"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> <?php echo lang($link,'back_list_music'); ?></a>
    </p>
</div>
<?php
exit;
}
?>

<?php
include "phpqrcode/qrlib.php";
$id_music=$data_music['id'];
$color_music=$data_music['color'];
$lang_sel=$data_music['author'];

$query_link_video=mysqli_query($link,"SELECT `link` FROM `app_my_girl_video_$lang_sel` WHERE `id_chat` = '$id_music' LIMIT 1");
$data_video=mysqli_fetch_assoc($query_link_video);
if($data_music['file_url']!=''){
    $url_mp3 = $data_music['file_url'];
}else {
    $url_mp3 = $url . '/app_mygirl/app_my_girl_' . $lang_sel . '/' . $id_music . '.mp3';
}

$url_video='';
$url_img_thumb_ytb='';

if($data_video['link']!=''){
    parse_str( parse_url( $data_video['link'], PHP_URL_QUERY ), $my_array_of_vars );
    $url_video=$my_array_of_vars['v'];
    $url_img_thumb_ytb='https://img.youtube.com/vi/'.$my_array_of_vars['v'].'/hqdefault.jpg'; 
}

$url_img_thumb=$url.'/thumb.php?src='.$url.'/images/music_default.png&size=170x170&trim=1';
$url_img_thumb_96=$url.'/thumb.php?src='.$url.'/images/music_default.png&size=96x96&trim=1';
$url_img_thumb_128=$url.'/thumb.php?src='.$url.'/images/music_default.png&size=128x128&trim=1';
$url_img_thumb_192=$url.'/thumb.php?src='.$url.'/images/music_default.png&size=192x192&trim=1';
$url_img_thumb_256=$url.'/thumb.php?src='.$url.'/images/music_default.png&size=256x256&trim=1';
$url_img_thumb_384=$url.'/thumb.php?src='.$url.'/images/music_default.png&size=384x384&trim=1';
$url_img_thumb_512=$url.'/thumb.php?src='.$url.'/images/music_default.png&size=512x512&trim=1';
$url_img_thumb_video=$url.'/thumb.php?src='.$url.'/images/music_default.png&size=420x220&trim=1';
  
$filename_img_avatar='app_mygirl/app_my_girl_'.$lang_sel.'_img/'.$id_music.'.png';
if(file_exists($filename_img_avatar)){
    $url_img_thumb=$url.'/'.$filename_img_avatar;
    $url_img_thumb_96=$url.'/thumb.php?src='.$url_img_thumb.'&size=96x96&trim=1';
    $url_img_thumb_128=$url.'/thumb.php?src='.$url_img_thumb.'&size=128x128&trim=1';
    $url_img_thumb_192=$url.'/thumb.php?src='.$url_img_thumb.'&size=192x192&trim=1';
    $url_img_thumb_256=$url.'/thumb.php?src='.$url_img_thumb.'&size=256x256&trim=1';
    $url_img_thumb_384=$url.'/thumb.php?src='.$url_img_thumb.'&size=384x384&trim=1';
    $url_img_thumb_512=$url.'/thumb.php?src='.$url_img_thumb.'&size=512x512&trim=1';
    $url_img_thumb_video=$url.'/thumb.php?src='.$url_img_thumb.'&size=420x220&trim=1';
}

$txt_title=$data_music['chat'];  
?>
<div id="containt" style="width: 100%;float: left;"> 
    
    <div id="account_cover" class="show_bk_account" style="background-image: url('<?php echo $url_img_thumb; ?>');background-size:auto 100% ">
    <div class="neon-text">
        <?php echo $data_music['chat'];?>
    </div>
    <div id="account_menu">
        <ul style="margin: 0px;">
            <li class="active"><i class="fa fa-music" aria-hidden="true"></i></li>
        </ul>
    </div>
    </div>
        
    <div id="post_product">
        <div style="padding: 20px;float: left;">
            <?php
            if(isset($user_login)&&$user_login->type=='admin'){
                    ?>
                    <script>
                    function open_edit(){
                        window.open("<?php echo 'http://'.$name_host;?>/app_my_girl_update.php?id=<?php echo $id_music;?>&lang=<?php echo $lang_sel; ?>");
                    }
                    </script>
                    <br />
                    <span class="buttonPro  blue" target="_blank" onclick="open_edit();" ><i class="fa fa-pencil-square" aria-hidden="true"></i> Chỉnh sửa bài hát</span>
                    <?php
            }
            ?>

        <h3>
        <?php echo lang($link,'loi_bai_hat');?> "<?php echo $data_music['chat'];?>"
        </h3>

            <?php
            $url_download=$url.'/pay/music/0/'.$id_music.'/'.$lang_sel;
            $is_playlist=false;
            include_once "template/kr_player_music.php";
            ?>
            <p style="float: left;width: 100%;display: block;">
            <?php 
                QRcode::png($url.'/music/'.$id_music.'/'.$lang_sel, 'phpqrcode/img/music'.$id_music.'_'.$lang_sel.'.png', 'M', 4, 2);
            ?>
            <img alt="Download song" src="<?php echo $url;?>/phpqrcode/img/music<?php echo $id_music;?>_<?php echo $lang_sel; ?>.png" style="float: left;margin: 2px;" />

            <?php
                $txt_function='onclick="login_account();"';
                if(isset($user_login)){
                    $txt_function='onclick="save_playlist_music(\''.$id_music.'\',\''.$lang_sel.'\',\''.$user_login->lang.'\',\''.$user_login->id.'\');"';
                }
            ?>

            <a  <?php echo $txt_function;?>  id="download_song" style="background-color: #67c7ca;" >
                    <i class="fa fa-plus-square fa-3x" aria-hidden="true" style="margin-top: 20px;"></i><br />
                    <span><?php echo lang($link,'song_add_playlist');?></span>
             </a>

             <a href="<?php echo $url;?>/pay/music/0/<?php echo $id_music; ?>/<?php echo $lang_sel; ?>"  id="download_song" class="full" >
                <i class="fa fa-download fa-3x" aria-hidden="true" style="margin-top: 20px;"></i><br />
                <span><?php echo lang($link,'download_song');?></span>
                <br />
                <span style="font-size: 20px;text-shadow: 2px 2px 2px black;margin-top: 6px;text-align: center;width: 100%;float: left;">$0.99</span>
            </a>

			<?php
			if(isset($data_lyrics)){
			?>
            <div class="info_music">
                <?php
                if($data_lyrics['artist']!='') echo '<div class="item"><b><i class="fa fa-user" aria-hidden="true"></i> '.lang($link,'song_artist').':</b><a href="'.$url.'/artist/'.$lang_sel.'/'.$data_lyrics['artist'].'">'.$data_lyrics['artist'].'</a></div>';
                if($data_lyrics['album']!='') echo '<div class="item"><b><i class="fa fa-cc-diners-club" aria-hidden="true"></i> '.lang($link,'song_album').':</b><a href="'.$url.'/album/'.$lang_sel.'/'.$data_lyrics['album'].'">'.$data_lyrics['album'].'</a></div>';
                if($data_lyrics['genre']!='') echo '<div class="item"><b><i class="fa fa-stumbleupon" aria-hidden="true"></i> '.lang($link,'song_genre').':</b><a href="'.$url.'/index.php?page_view=page_music.php&view=genre&lang='.$lang_sel.'&genre='.$data_lyrics['genre'].'">'.$data_lyrics['genre'].'</a></div>';
                if($data_lyrics['year']!='') echo '<div class="item"><b><i class="fa fa-calendar-o" aria-hidden="true"></i> '.lang($link,'song_year').':</b><a href="'.$url.'/year/'.$lang_sel.'/'.$data_lyrics['year'].'">'.$data_lyrics['year'].'</a></div>';
                ?>
            </div>
			<?php }?>

            </p>
            <?php echo show_share($link,$url.'/music/'.$id_music.'/'.$lang_sel); ?>
            <?php if(isset($data_lyrics)&&$data_lyrics['lyrics']!=''){?>
                <div style="float: left;width: 100%;">
                    <span style="float: right;" >
                        <span style="float: right;border-bottom: solid 2px;cursor: pointer;" onclick="change_font_size();">
                            <i class="fa fa-font" id="text_size_small" style="font-size: 12px;" aria-hidden="true"></i>
                            <i style="font-size: 20px;color: #888686;" id="text_size_lager"  class="fa fa-font" aria-hidden="true"></i>
                        </span>
                        
                        <span style="float: right;margin-right: 10px;cursor: pointer;" onclick="change_font_color();">
                            <i style="font-size: 20px;" class="fa fa-lightbulb-o" aria-hidden="true"></i>
                        </span>
                        
                        <span style="float: right;margin-right: 10px;cursor: pointer;" onclick="PrintLyrics();">
                            <i style="font-size: 20px;" class="fa fa-print" aria-hidden="true"></i>
                        </span>
                        
                    </span>
                    
                    <div style="float: left;width: 100%;" id="contain_lyrics">
                    <div id="contain_lyrics_txt">
                    <?php echo nl2br($data_lyrics['lyrics']); ?>
                    </div>
                    </div>
                    <script>
                    var font_size_c=0;
                    var font_color_c=0;
                    
                    function change_font_size(){
                        $("#text_size_small").css("color","Black");
                        $("#text_size_lager").css("color","Black");
                        if(font_size_c==0){
                            $("#contain_lyrics").css("font-size","20px");
                            $("#text_size_small").css("color","#888686");
                            font_size_c=1;
                        }else{
                            $("#contain_lyrics").css("font-size","13px");
                            $("#text_size_lager").css("color","#888686");
                            font_size_c=0;
                        }
                    }
                    
                    function change_font_color(){
                        if(font_color_c==0){
                            font_color_c=1;
                            $("#contain_lyrics").css("color","white");
                            $("#contain_lyrics").css("background-color","black");
                            $("#contain_lyrics_txt").css("padding","15px");
                        }else{
                            font_color_c=0;
                            $("#contain_lyrics").css("color","black");
                            $("#contain_lyrics").css("background-color","initial");
                            $("#contain_lyrics_txt").css("padding","0px");
                        }
                    }
                    
                    function PrintLyrics()
                    {
                          var divToPrint = document.getElementById('contain_lyrics_txt');
                          var newWin = window.open('', 'Print-Window');
                          newWin.document.open();
                          newWin.document.write('<html><body onload="window.print()"><h1>'+document.title+'</h1>' + divToPrint.innerHTML + '</body></html>');
                          newWin.document.close();
                          setTimeout(function() {
                            newWin.close();
                          }, 10);
                    }
                    </script>
               </div>
            <?php }else{?>
                <div style="float: left;width: 100%;">
                    <i class="fa fa-sticky-note-o" aria-hidden="true"></i> <?php echo lang($link,'chua_co_loi_bai_hat');?>
                    <br />
                    <span class="buttonPro black" id="btn_add_lyrics" onclick="show_add_lyrics();"><i class="fa fa-file-text-o" aria-hidden="true"></i> <?php echo lang($link,'dong_gop_loi_nhac'); ?></span>
                    <div id="box_lyrics">
                        <div class="title" style="margin-bottom: 10px;float: left;">
                            <i style="font-size: 60px;float: left;margin-right: 10px;" class="fa fa-file-text-o" aria-hidden="true"></i> <strong><?php echo lang($link,'dong_gop_loi_nhac'); ?></strong><br />
                            <i><?php echo lang($link,'dong_gop_loi_nhac_tip'); ?></i>
                        </div>
                    <textarea id="lyric_contain" style="width: 98%;min-height: 250px;">
                    </textarea>
                    <br />
                    <span class="buttonPro green" onclick="add_lyrics_music();"><i class="fa fa-paper-plane" aria-hidden="true"></i>  <?php echo lang($link,'add_lyrics_send'); ?></span>
                    <span class="buttonPro blue" onclick="hide_add_lyrics();"><i class="fa fa-times-circle" aria-hidden="true"></i> <?php echo lang($link,'back'); ?></span>
                    </div>
                </div>
                
                <script>
                    function add_lyrics_music(){
                        shortcut_key_music=false;
                        var contain_lyrics=$("#lyric_contain").val();
                        if(contain_lyrics.trim()==""){
                             swal("<?php echo lang($link,'loi'); ?>","<?php echo lang($link,'add_lyrics_error'); ?>", "error");
                        }else{
                            $.ajax({
                                url: "<?php echo $url; ?>/index.php",
                                type: "post",
                                data: "function=add_lyrics_music&contain="+contain_lyrics+"&id_music=<?php echo $id_music;?>",
                                success: function(data, textStatus, jqXHR)
                                {
                                    if(data=="1"){
                                        swal("<?php echo lang($link,'thanh_cong'); ?>","<?php echo lang($link,'add_lyrics_success'); ?>", "success");
                                        $('#box_lyrics').hide();
                                        $('#btn_add_lyrics').hide();
                                        shortcut_key_music=true;
                                    }                                    
                                }
                            });
                        }

                    }

                    function hide_add_lyrics(){
                        shortcut_key_music=true;
                        $('#box_lyrics').hide(300);
                        $('#btn_add_lyrics').show();
                    }

                    function show_add_lyrics(){
                        shortcut_key_music=false;
                        $('#box_lyrics').show(300);
                        $('#btn_add_lyrics').hide();
                    }
                </script>
            <?php }?>
            
            <?php include "page_music_box_rate.php";?>
            
            <iframe
                src="https://www.facebook.com/plugins/like.php?href=https://www.facebook.com/virtuallover?ref=ts&fref=ts"
                scrolling="no" frameborder="0"
                style="border:none;height: 50px;float: left; width: 100%;margin-top: 20px;">
            </iframe>
    
        </div>
    </div>
    
    <div id="sidebar_product">

        <?php if($url_video!=''){?>
        <h3><i  class="fa fa-youtube-square" aria-hidden="true"></i> <?php echo lang($link,'xem_video'); ?></h3>   
        <div id="box_play_video">
            <img class="lazyload" data-src="<?php echo $url_img_thumb_video;?>" alt="<?php echo $txt_title;?>">
            <div class="overlay" onclick="kr_pause();play_video('<?php echo $url_video ?>');">
                <div class="icon"><i class="icon_play fa fa-play-circle-o" aria-hidden="true"></i></div>
            </div>
        </div>
        <?php }?>

        <br />
        <a href="<?php echo $url; ?>/music/month"><h3><i class="fa fa-star-half-o" aria-hidden="true"></i> <?php echo lang($link,'music_top_month'); ?></h3></a>
        <?php
            $query_list_music_top=mysqli_query($link,"SELECT `chat`.id,`chat`.chat,`chat`.author,`chat`.slug,COUNT(`top_music`.`id_chat`)  as c  FROM `app_my_girl_music_data_$lang_sel` as `top_music` left JOIN   `app_my_girl_$lang_sel` as `chat`  on `chat`.`id`=`top_music`.`id_chat` WHERE `chat`.`effect` = '2' GROUP BY `top_music`.`id_chat` HAVING COUNT(`top_music`.`id_chat`) >= 1 ORDER BY c DESC LIMIT 10");
            while($row_top=mysqli_fetch_array($query_list_music_top)){
                $url_song='';
                if($row_top['slug']!=''){
                    $url_song=$url.'/song/'.$row_top['author'].'/'.$row_top['slug'];
                }else{
                    $url_song=$url.'/music/'.$row_top['id'].'/'.$row_top['author'];
                }
                ?>                                
                <a style="width: 100%;display: block;" href="<?php echo $url_song;?>" class="track-details">
                <em><?php echo $row_top['c']; ?></em> <?php echo $row_top['chat']; ?>
                </a>
                <?php
            }
        ?>
        <br />
        <?php
            echo show_box_ads_page($link,'music_page');
        ?>

        <?php
        if(get_setting($link,'show_ads')=='1') {
        ?>
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-format="fluid"
                data-ad-layout-key="-ck+8m-1w-30+cw"
                data-ad-client="ca-pub-5388516931803092"
                data-ad-slot="5861867394"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        <?php }?>
        
    </div>


<?php
$list_style='same';
$list_music = mysqli_query($link,"SELECT `id`, `chat`, `file_url`, `slug`,`author` FROM `app_my_girl_$lang_sel` WHERE `effect` = '2' AND  `id` != '$id_music' ORDER BY RAND() LIMIT 10");
if(mysqli_num_rows($list_music)>0){
?>
<div style="float: left;width: 100%;">
<h2 style="padding-left: 30px;"><?php echo lang($link,'music_same'); ?></h2>
<?php
    $label_choi_nhac=lang($link,'choi_nhac');
    $label_chi_tiet=lang($link,'chi_tiet');
    $label_loi_bai_hat=lang($link,'loi_bai_hat');
    $label_chua_co_loi_bai_hat=lang($link,'chua_co_loi_bai_hat');
    $label_music_no_rank=lang($link,'music_no_rank');
    while ($row = mysqli_fetch_assoc($list_music)) {
        include "page_music_git.php";
    }
?>
</div>
<?php }?>
</div>

<?php
    if(get_setting($link,'show_ads')=='1') {
?>
<div style="float:left:width:100%;">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="autorelaxed"
     data-ad-client="ca-pub-5388516931803092"
     data-ad-slot="8557873995"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<?php
    }
?>

