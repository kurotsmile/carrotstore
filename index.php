<?php
ini_set('upload_max_filesize', '90M');
ini_set('post_max_size', '90M');
ini_set('max_input_time', 900);
ini_set('max_execution_time', 900);

header('Content-type: text/html; charset=utf-8');

session_start();


function ip_visitor_country()
{

    $client = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote = $_SERVER['REMOTE_ADDR'];
    $country = "us";

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=" . $ip);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $ip_data_in = curl_exec($ch); // string
    curl_close($ch);

    $ip_data = json_decode($ip_data_in, true);
    $ip_data = str_replace('&quot;', '"', $ip_data); // for PHP 5.2 see stackoverflow.com/questions/3110487/

    if ($ip_data && $ip_data['geoplugin_countryCode'] != null) {
        $country = strtoupper($ip_data['geoplugin_countryCode']);
    } else {
        $country = 'us';
    }

    return $country;
}
$protocol=$_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';
if($protocol=='https'){
    include "config_https.php";
}else{
    include "config.php";
}

require_once('phpmailer/class.phpmailer.php');
if (isset($_GET['view_product']) || isset($_GET['sub_view'])) {
} else {
    include 'bbit-compress.php';
}

$url_block = array('page_account.php', 'page_type.php', 'page_contry.php', 'page_type_add.php', 'page_type_update.php');

if (isset($_POST['key_contry'])) {
    $_SESSION['lang'] = $_POST['key_contry'];
    $url_cur = $_POST['urls'];
    unset($_SESSION['username_login']);
    unset($_SESSION['login_google']);
    unset($_SESSION['admin_login']);
    header("Location: $url_cur");
}
include "database.php";
if (isset($_SESSION['lang'])) {

} else {
    $k = ip_visitor_country();
    $query_key_country = mysql_query("SELECT `key` FROM `app_my_girl_country` WHERE `country_code` = '$k' LIMIT 1");
    if (mysql_num_rows($query_key_country)) {
        $data_key_country = mysql_fetch_array($query_key_country);
        $_SESSION['lang'] = $data_key_country['key'];
    } else {
        $_SESSION['lang'] = 'en';
    }

}

if (isset($_SESSION['username_login'])) {
} else {
    if (isset($_SESSION['cart'])) {

    } else {
        $_SESSION['cart'] = array();
    }

    if (isset($_GET['page_view'])) {
        $page_view = $_GET['page_view'];
        if (in_array($page_view, $url_block)) {
            header('Location: ' . $url . '');
        }
    }
}

include "function.php";
include "json/json.php";
include "json/json2.php";

if ($_GET && isset($_GET['page_view'])) {
    $page_file = $_GET['page_view'];
} else {
    $page_file = "page_view.php";
}

$error = '';
if (isset($_POST['logout'])) {
    unset($_SESSION['username_login']);
    unset($_SESSION['login_google']);
    unset($_SESSION['admin_login']);
    $url_cur = $_POST['urls'];
    header("Location: $url_cur");
}
if (isset($_POST['login'])) {
    $usernames = $_POST['usernames'];
    $password = $_POST['password'];
    $result = mysql_query("SELECT * FROM `accounts` WHERE `usernames` = '$usernames' AND `password` = '$password' LIMIT 1");
    $data = mysql_fetch_array($result);
    if ($data) {
        $_SESSION['username_login'] = $data[0];
        $url_cur = $_POST['urls'];
        header("Location: $url_cur");
    } else {
        $error = 'loi_dang_nhap';
    }

}
include "header.php";

?>

<div id="header">
    <a href="<?php echo $url; ?>"><img alt="Store Carrot" src="<?php echo $url; ?>/images/logo.png" id="logo"/></a>
    <?php
    $type = 'products';
    $icon_search = '<i class="fa fa-product-hunt" aria-hidden="true"></i>';
    if (isset($_GET['page_view']) && $_GET['page_view'] == "page_music.php") {
        $type = 'music';
        $icon_search = '<i class="fa fa-music" aria-hidden="true"></i>';
    }

    if (isset($_GET['page_view']) && $_GET['page_view'] == "page_quote.php") {
        $type = 'quote';
        $icon_search = '<i class="fa fa-quote-left" aria-hidden="true"></i>';
    }

    if (isset($_GET['page_view']) && $_GET['page_view'] == "page_member.php") {
        $type = 'accounts';
        $icon_search = '<i class="fa fa-users" aria-hidden="true"></i>';
    }
    ?>
    <div class="" id="tool_search">
        <input type="text" placeholder="<?php echo lang('tip_search'); ?>" onchange="search_product(this.value)"
               name="search" class="inp" id="inp_search"/>
        <button class="btn"><?php echo $icon_search; ?></button>
        <span id="proccess" style="display: none;float: left;"> <?php echo lang('dang_xu_ly'); ?></span>
    </div>

    <script>
        function search_product(key_search) {
            $('#proccess').show();
            $("#inp_search").prop('disabled', true);
            $.ajax({
                url: "<?php echo $url; ?>/index.php",
                type: "get", //kiểu dũ liệu truyền đi
                data: "function=search_product&key=" + key_search + "&type=<?php echo $type ?>", //tham số truyền vào
                success: function (data, textStatus, jqXHR) {
                    $("#inp_search").prop('disabled', false);
                    $('#containt').html(data);
                    $('#proccess').hide();
                    $('#proccess').css('display', 'none');
                }
            });
        }

        $('#inp_search').keypress(function (event) {
            var txt_inp = $("#inp_search").val();
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                search_product(txt_inp);
            }
            event.stopPropagation();
        });
    </script>

    <form action="<?php echo $url; ?>/index.php" method="post" id="form_lang">
        <img style="width: 20px;float: left;" alt="<?php echo $_SESSION['lang'];?>"
             src="<?php echo $url.'/thumb.php?src='.$url.'/app_mygirl/img/'.$_SESSION['lang'].'.png&size=20x20&trim=1';?>" />
        <label for="key_contry"> <?php echo lang('ngon_ngu_hien_thi'); ?>:</label>
        <select id="key_contry" name="key_contry" class="inp" onchange="change_lang()">
            <?php
            $result = mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active` = '1' AND `ver0`='1'", $link);
            while ($row = mysql_fetch_array($result)) {
                ?>
                <option value="<?php echo $row['key']; ?>" <?php if ($_SESSION['lang'] == $row['key']) {
                    echo 'selected="true"';
                } ?> ><?php echo $row['name']; ?></option>
                <?php
            }
            ?>
        </select>
        <input type="hidden" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" name="urls"/>
    </form>
    <script>
        function change_lang() {
            $('#form_lang').submit();
        }
    </script>


    <a id="add_company" href="https://www.paypal.me/kurotsmile" target="_blank"
       title="<?php echo lang('chu_thich_ung_ho'); ?>">
        <i class="fa fa-heart-o fa-3x" style="float: left;margin-right: 10px;" aria-hidden="true"></i>
        <strong style="font-size: 15px;width: 100px;"><?php echo lang('ung_ho'); ?></strong><br/>
        <span><?php echo lang('ung_ho_tip'); ?></span>
    </a>


    <!-- Carrotstore - header -->
    <div id="sell_product" style="width: auto;padding: 0px;margin: 0px;;margin-top: 7px;background: none;">
        <ins class="adsbygoogle"
             style="display:inline-block;width:300px;height:50px"
             data-ad-client="ca-pub-5388516931803092"
             data-ad-slot="5904401947"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

    <div id="bar_menu">
        <a href="<?php echo $url; ?>/products" <?php if ($page_file == "page_view.php") {
            echo 'class="active"';
        } ?>><?php echo lang('mua_sp'); ?></a>
        <a href="<?php echo $url; ?>/member" <?php if ($page_file == "page_member.php") {
            echo 'class="active"';
        } ?>><?php echo lang('luu_tru_lien_he'); ?></a>
        <a href="<?php echo $url; ?>/music" <?php if ($page_file == "page_music.php") {
            echo 'class="active"';
        } ?>><?php echo lang('am_nhac_cho_cuoc_song'); ?></a>
        <a href="<?php echo $url; ?>/quote" <?php if ($page_file == "page_quote.php") {
            echo 'class="active"';
        } ?>><?php echo lang('trich_dan'); ?></a>
        <a href="<?php echo $url; ?>/link" <?php if ($page_file == "page_shortened_link.php" || $page_file == "page_shortened_link_manager.php" || $page_file == "page_shortened_link_detail.php") {
            echo 'class="active"';
        } ?>><?php echo lang('rut_gon_link'); ?></a>
        <a href="<?php echo $url; ?>/privacy_policy" <?php if ($page_file == "page_privacy_policy.php") {
            echo 'class="active"';
        } ?>><?php echo lang('gioi_thieu'); ?></a>


        <?php if (isset($_SESSION['username_login'])) { ?>
            <form action="<?php echo $url; ?>/index.php" method="post" id="info_account">
                <?php
                if (isset($_SESSION['admin_login'])) {
                    ?>
                    <img class="login_avatar" alt="User Avatar"
                         src="<?php echo get_url_avatar_user($_SESSION['username_login'], $_SESSION['lang'], 100, true); ?>"/>
                    <?php
                } else {
                    if (isset($_SESSION['login_google'])) {
                        $query_account = mysql_query("SELECT `avatar_url` FROM `app_my_girl_user_" . $_SESSION['lang'] . "` WHERE `id_device` ='" . $_SESSION['username_login'] . "' LIMIT 1");
                        $data_account = mysql_fetch_array($query_account);
                        ?>
                        <img class="login_avatar" src="<?php echo $data_account['avatar_url']; ?>"/>
                        <?php
                    } else {
                        ?>
                        <img class="login_avatar"
                             src="<?php echo get_url_avatar_user($_SESSION['username_login'], $_SESSION['lang']); ?>"/>
                        <?php
                    }
                } ?>
                <strong class="username">
                    <?php
                    if (isset($_SESSION['admin_login'])) {
                        echo '<a style="float: left;color: yellow;padding: 5px;" href="' . $url . '/admin">';
                        echo get_username_by_id($_SESSION['username_login'], true);
                        echo '</a>';
                    } else {
                        echo '<a style="float: left;color: yellow;padding: 5px;" href="' . $url . '/user/' . $_SESSION['username_login'] . '/' . $_SESSION['lang'] . '">';
                        echo get_username_by_id($_SESSION['username_login'], false);
                        echo '</a>';
                    }
                    ?>
                </strong>
                <?php
                if (isset($_SESSION['login_google'])) {
                    ?>
                    <span style="float: none;padding: 6px;" class="buttonPro purple " id="btn_logout"
                          onclick="signOut();"><?php echo lang('dang_xuat'); ?></span>
                    <script>

                        function onLoad() {
                            gapi.load('auth2', function () {
                                gapi.auth2.init();
                            });
                        }

                        function signOut() {
                            var auth2 = gapi.auth2.getAuthInstance();
                            auth2.signOut().then(function () {
                                $.ajax({
                                    url: "<?php echo $url;?>/index.php",
                                    type: "post",
                                    data: "function=logout_google",
                                    success: function (data, textStatus, jqXHR) {
                                        window.location = "<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>";
                                    }

                                });
                            });
                        }

                        $(document).ready(function () {
                            onLoad();
                        });
                    </script>
                <?php
                }else{
                ?>
                <input style="float: none;padding: 6px;" type="submit" value="<?php echo lang('dang_xuat'); ?>"
                       class="buttonPro purple " id="btn_logout"/>
                    <?php
                }
                ?>
                <input type="hidden" name="logout" value="1"/>
                <input type="hidden" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"
                       name="urls"/>
            </form>
            <?php
        } else {
            ?>
            <a id="show_history" style="float: right;margin-right: 5px;"
               href="<?php echo $url; ?>/login" <?php if ($page_file == "page_login.php") {
                echo 'class="active"';
            } ?>><i class="fa fa-sign-in" aria-hidden="true"></i> <?php echo lang('dang_nhap'); ?></a>
            <a id="show_history" style="float: right;margin-right: 5px;" onclick="login_account();"><i
                        class="fa fa-google" aria-hidden="true"></i></a>
        <?php } ?>
        <a id="show_history" style="float: right;margin-right: 5px;"
           href="<?php echo $url; ?>/index.php?page_view=page_history.php" <?php if ($page_file == "page_history.php") {
            echo 'class="active"';
        } ?>><i class="fa fa-history"></i></a>
    </div>
</div>

<div style="float: left;width: 100%;">
    <script>
        var arr_id_product = [];
    </script>
    <?php
    include $page_file;
    ?>

</div>

<div id="go_top" onclick="go_top()">
    <i class="fa fa-angle-double-up fa-3x"></i>
</div>

<div id="loading">
    <i class="fa fa-refresh fa-spin fa-3x" style="float: left;margin-right: 10px;"></i>
    <strong style="font-size: 15px;width: 100px;"><?php echo lang('dang_xu_ly'); ?></strong><br/>
    <span><?php echo lang('dang_lay_du_lieu'); ?></span>
    <span id="loading-page"></span>
</div>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v6.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="232297850844551"
     theme_color="#67b868"
     logged_in_greeting="<?php echo lang('message_tip'); ?>"
     logged_out_greeting="<?php echo lang('message_tip'); ?>"
>
</div>

<script>
    var URL = '<?php echo $url;?>';
    $(document).ready(function () {
        $('.group .title .btnGroup').click(function () {
            var div_group = '';
            div_group = $(this).parent().parent();
            if ($(this).is(':checked')) {
                $(div_group).find('.content').show(200);
            } else {
                $(div_group).find('.content').hide(200);
            }
        });
    });
</script>
<?php
include "script_all_page.php";
?>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-71562306-1', 'auto');
    ga('send', 'pageview');

    function login_account() {
        swal({
            html: true, title: '<?php echo lang("dang_nhap"); ?>',
            text: '<div><div id="my-signin2"></div></div>',
        });
        setTimeout(function () {
            renderButton();
        }, 100);
    }

    function onSignIn(googleUser,goto_user=true) {
        var profile = googleUser.getBasicProfile();
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=login_google&user_id=" + profile.getId() + "&user_name=" + profile.getName() + "&user_email=" + profile.getEmail() + "&user_avatar=" + profile.getImageUrl(),
            success: function (data, textStatus, jqXHR) {
                swal("<?php echo lang('dang_nhap');?>", "<?php echo lang('login_account_succes'); ?>", "success");
                if(goto_user) {
                    window.location = "<?php echo $url;?>/user/" + data + "/<?php echo $_SESSION['lang'];?>";
                }else{
                    window.location = "<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>";
                }
            }

        });
    }

    <?php
    if($page_file!='page_remove_block_ads.php'){
    ?>
    var adBlockEnabled = false;
    var testAd = document.createElement('div');
    testAd.innerHTML = '&nbsp;';
    testAd.className = 'adsbox';
    document.body.appendChild(testAd);
    window.setTimeout(function () {
        if (testAd.offsetHeight === 0) {
            adBlockEnabled = true;
        }
        testAd.remove();
        if (adBlockEnabled) {
            swal({
                    title: "<?php echo lang("adblock_title"); ?>",
                    text: "<img alt='<?php echo lang("adblock_title");?>' src='<?php echo $url;?>/images/remove_block_ads.jpg'/><br/><?php echo lang("adblock_msg");?>",
                    html:true,
                    showCancelButton: true,
                    cancelButtonClass:"btn-info",
                    confirmButtonText: "<?php echo lang('help_off_block_ads');?>",
                    cancelButtonText: "Okay!",
                    closeOnConfirm: false,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {
                        window.location="<?php echo $url;?>/remove_block_ads";
                    }
                });
        }
    }, 100);
    <?php
    }
    ?>

    function onSuccess(googleUser) {
        onSignIn(googleUser,false);
    }

    function onFailure(error) {
        console.log(error);
    }

    function renderButton() {
        gapi.signin2.render('my-signin2', {
            'scope': 'profile email',
            'width': 240,
            'height': 50,
            'longtitle': true,
            'theme': 'dark',
            'onsuccess': onSuccess,
            'onfailure': onFailure
        });
    }

</script>
</body>
</html>
<?php
mysql_close($link);
?>
