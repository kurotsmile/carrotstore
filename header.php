<?php
$title_page='Carrot Store';
$seo_desc=lang($link,'gioi_thieu_tip');
$seo_url=$url;
$seo_img=$url.'/images/logo.png';

$date = date('m/d/Y h:i:s a', time());

if(isset($_GET['view_product'])){
    if(isset($_GET['slug'])){
        $slug=$_GET['view_product'];
        $result=mysqli_query($link,"SELECT * FROM `products` WHERE `slug` = '$slug' LIMIT 1");
    }else{
        $id=$_GET['view_product'];
        $result=mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '$id' LIMIT 1");
    }
    $data=mysqli_fetch_assoc($result);
    $title_page=''.get_name_product_lang($link,$data['id'],$_SESSION['lang']);
    $seo_desc=strip_tags (get_desc_product_lang($link,$data['id'],$_SESSION['lang']));
    $seo_url=$url.'/product/'.$data['id'];
    $seo_img=$url.'/product_data/'.$data['id'].'/icon.jpg';;
}

if(isset($_GET['page_view'])&&isset($_GET['view'])){
    if($_GET['view']=='info_music'){
        $slug='';
        $id='';
        $lang_sel=$_GET['lang'];
        if(isset($_GET['slug'])){
            $slug=$_GET['slug'];
            $query_music=mysqli_query($link,"SELECT `id`,`color`, `chat`, `file_url`, `slug`,`author` FROM `app_my_girl_$lang_sel` WHERE `effect` = '2' AND `slug`='$slug'");
        }else{
            $id=$_GET['id'];
            $query_music=mysqli_query($link,"SELECT `id`,`color`, `chat`, `file_url`, `slug`,`author` FROM `app_my_girl_$lang_sel` WHERE `effect` = '2' AND `id`='$id'");
        }

        $data_music=mysqli_fetch_assoc($query_music);
        $id=$data_music['id'];
        $id_music=$data_music['id'];
        $title_page=$data_music['chat'];
        
        $query_lyrics_desc=mysqli_query($link,"SELECT SUBSTRING(`lyrics`, 1, 90) as l,`lyrics`,`artist`,`album`,`genre`,`year` FROM `app_my_girl_".$lang_sel."_lyrics` WHERE `id_music` = '$id' LIMIT 1");
        if(mysqli_num_rows($query_lyrics_desc)){
            $data_lyrics=mysqli_fetch_assoc($query_lyrics_desc);
            $seo_desc='';
            if ($data_lyrics['artist'] != '') $seo_desc.=lang($link,'song_artist').':'.$data_lyrics['artist'].' ';
            if ($data_lyrics['album'] != '') $seo_desc.=lang($link,'song_album').':'. $data_lyrics['album'].' ';
            if ($data_lyrics['genre'] != '') $seo_desc.=lang($link,'song_genre').':'.$data_lyrics['genre'].' ';
            if ($data_lyrics['year'] != '') $seo_desc.=lang($link,'song_year').':'.$data_lyrics['year'].' ';
            if ($data_lyrics['lyrics'] != '') $seo_desc.=lang($link,'loi_bai_hat').' ('.$title_page.') '. $data_lyrics['l'].'... ';
        }

        if($data_music['slug']!=''){
            $seo_url = $url . '/song/'.$lang_sel.'/'.$data_music['slug'];
        }else {
            $seo_url = $url . '/music/' . $id_music . '/' . $lang_sel;
        }
        
        $query_link_video=mysqli_query($link,"SELECT `link` FROM `app_my_girl_video_$lang_sel` WHERE `id_chat` = '$id_music' LIMIT 1");
        $data_video=mysqli_fetch_array($query_link_video);
        $url_mp3=$url.'/app_mygirl/app_my_girl_'.$lang_sel.'/'.$id_music.'.mp3';
            
        $seo_img=$url.'/images/music_default.png';

        
        $filename_img_avatar='app_mygirl/app_my_girl_'.$lang_sel.'_img/'.$id_music.'.png';
        if(file_exists($filename_img_avatar)){
            $seo_img=$url.'/'.$filename_img_avatar;
        }else{
            if($data_video[0]!=''){
                parse_str( parse_url( $data_video[0], PHP_URL_QUERY ), $my_array_of_vars );
                $seo_img='https://img.youtube.com/vi/'.$my_array_of_vars['v'].'/hqdefault.jpg'; 
            }
        }

    }
    
    
    if($_GET['view']=='info_quote'){
        $id=$_GET['id'];
        $lang_sel=$_GET['lang'];
        $query_quote=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `effect` = '36' AND `id`='$id' LIMIT 1");
        $data_quote=mysqli_fetch_assoc($query_quote);
        $title_page=$data_quote['chat'];
        $seo_desc=$title_page;
        
        $seo_img=$url.'/app_mygirl/obj_effect/927.png';
        if($data_quote['effect_customer']!=''){
            $seo_img=$url.'/app_mygirl/obj_effect/'.$data_quote['effect_customer'].'.png';
        }
    }
}

if(isset($_GET['sub_view_member'])&&$_GET['sub_view_member']=='page_member_view_account.php'){
    $lang='vi';
    if(isset($_GET['lang'])) $lang=$_GET['lang'];
    $id_user=$_GET['user'];
    $query_account=mysqli_query($link,"SELECT * FROM `app_my_girl_user_$lang` WHERE `id_device` = '$id_user' LIMIT 1");
    if($query_account){
        if(mysqli_num_rows($query_account)>0) {
            $data_user = mysqli_fetch_assoc($query_account);
            $title_page = $data_user['name'];
            $seo_desc = '';
            if ($data_user['sdt'] != '') {
                $seo_desc .= ' Phone:' . $data_user['sdt'] . ' ';
            }
            if ($data_user['address'] != '') {
                $seo_desc .= ' Address:' . $data_user['address'] . ' ';
            }
            $seo_desc .= ' Country:' . $lang . ' ';

            $seo_img = $url . '/images/avatar_default.png';
            $url_img = 'app_mygirl/app_my_girl_' . $lang . '_user/' . $id_user . '.png';
            if ($data_user['avatar_url'] != '') {
                $seo_img = $data_user['avatar_url'];
            } else {
                if (file_exists($url_img)) {
                    $seo_img = $url . '/' . $url_img;
                }
            }
            $seo_url = $url . '/user/' . $id_user . '/' . $lang;
        }
    }
}

?>
<!DOCTYPE HTML>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <title><?php echo $title_page; ?></title>
    <meta name="robots" content="max-image-preview:standard">
    <meta name="robots" content="index, follow" />
    <meta http-equiv="content-language" content="<?php echo $lang;?>" />
    <meta name="Googlebot" content="index,follow,archive" />

    <meta property="og:title" content="<?php echo $title_page;?>" /> 
    <meta property="og:image" content="<?php echo $seo_img; ?>" />
    
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo $title_page;?>">
    <meta itemprop="description" content="<?php echo $seo_desc;?>">
    <meta itemprop="image" content="<?php echo $seo_img; ?>">
    
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php echo $title_page;?>">
    <meta name="twitter:description" content="<?php echo $seo_desc;?>">
    <meta name="twitter:creator" content="@kurotsmile">
    <meta name="twitter:image" content="<?php echo $seo_img; ?>">
    
    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo $title_page;?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo $seo_url; ?>" />
    <meta property="og:image" content="<?php echo $seo_img; ?>" />
    <meta property="og:description" content="<?php echo $seo_desc;?>" />
    <meta property="og:site_name" content="carrotstore.com" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="600" />
    <meta property="og:image:alt" content="<?php echo $title_page;?>" />
    <link rel="apple-touch-icon" href="<?php echo $url;?>/images/80.png"/>
    <link href="<?php echo $url; ?>/assets/css/buttonPro.min.css?v=<?php echo $ver;?>" rel="stylesheet" />
    <?php if($style_css_dark_mode=='0'){?>
    <link href="<?php echo $url; ?>/assets/css/style.min.css?v=<?php echo $ver;?>" rel="stylesheet" id="style_site" />
    <?php }else{?>
    <link href="<?php echo $url; ?>/assets/css/style-dark-mode.min.css?v=<?php echo $ver;?>" rel="stylesheet" id="style_site" />
    <?php } ?>
    <link hreflang="<?php echo $_SESSION['lang'];?>"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="<?php echo $seo_desc; ?>"/>
    <meta name="keywords" content="<?php echo $title_page; ?>,carrot,carrot store,carrot app,carrot company,store carrot,carrot game,virtual lover"/>
    <meta charset="utf-8"/>
    <meta name="title" content="<?php echo $title_page; ?>" />
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/font-awesome.min.css" />
    <link rel="shortcut icon" href="<?php echo $url; ?>/images/icon.ico?v=<?php echo $ver;?>"/>
    <script src="<?php echo $url; ?>/js/jquery.js"></script>
    <script src="<?php echo $url; ?>/dist/sweetalert.min.js" async></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/dist/sweetalert.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/css/responsive.min.css?v=<?php echo $ver;?>"/>
    <meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
    <link type="text/css" rel="stylesheet" href="<?php echo $url; ?>/libary/jquery.qtip.min.css" />
    <script type="text/javascript" src="<?php echo $url; ?>/libary/jquery.qtip.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="745653792874-8tn5rob2rdbkn6hkqhk6l10dv8t3etpu.apps.googleusercontent.com"/>
    <script src="<?php echo $url;?>/dist/lazysizes.min.js" async></script>
    <script src="<?php echo $url; ?>/js/jquery.form.min.js" async defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=<?php echo $key_api_google; ?>&sensor=true"></script>
    <script src="<?php echo $url;?>/js/jquery.geocomplete.min.js"></script>
    <link rel="manifest" href="<?php echo $url;?>/manifest.json" />
    <script>
    if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
        navigator.serviceWorker.register('/installApp.js',{ scope: "/" }).then(function(registration) {
        // Registration was successful
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
        }, function(err) {
        // registration failed :(
        console.log('ServiceWorker registration failed: ', err);
        });
    });
    }

    var shortcut_key_music=true;
    var style_css_dark_mode='<?php echo $style_css_dark_mode;?>';
    var style_css_qtip='<?php if($style_css_dark_mode=='0'){ echo 'qtip-green';} ?>';
    </script>

    <?php
    if(get_setting($link,'show_adsupply')=='1') {
        ?>
        <script data-cfasync="false" type="text/javascript">(function (s, o, l, v, e, d) {
                if (s[o] == null && s[l + e]) {
                    s[o] = "loading";
                    s[l + e](d, l = function () {
                        s[o] = "complete";
                        s[v + e](d, l, !1)
                    }, !1)
                }
            })(document, "readyState", "add", "remove", "EventListener", "DOMContentLoaded");
            (function () {
                var s = document.createElement("script");
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://cdn.engine.4dsply.com/Scripts/infinity.js.aspx?guid=29e6e461-0298-4c1b-b1c2-723d32e5a3fd";
                s.id = "infinity";
                s.setAttribute("data-guid", "29e6e461-0298-4c1b-b1c2-723d32e5a3fd");
                s.setAttribute("data-version", "async");
                var e = document.getElementsByTagName('script')[0];
                e.parentNode.insertBefore(s, e)
            })();</script>
        <?php
    }
    ?>

    <?php
    if(get_setting($link,'show_ads')=='1') {
        ?>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-5388516931803092",
                enable_page_level_ads: true,
                overlays: {bottom: true}
            });
        </script>
        <?php
    }
    ?>
</head>
<body>