<script>
    $(document).ready(function(){
        setup_qtip();
    });

    function go_top(){
        var body = $("html, body");
        body.stop().animate({scrollTop:0}, '500', 'swing', function() {
            $('#go_top').fadeOut(500);
        });
    }

    function reset_url(){
        window.location = "<?php echo $protocol."$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>";
    }

    $(window).scroll( function(){
        if($(window).scrollTop()>35){
            $('#go_top').fadeIn(500);
        }else{
            $('#go_top').fadeOut(500);
        }
    });


    function show_menu_app(Emp,type_act){
        $('.app').removeClass('menu_app');
        if(type_act==0){
            $(Emp).parent().parent().addClass('menu_app')
        }else{
            $(Emp).addClass('menu_app')   
        }
    };

    var is_show_menu_mobile=true;
    function show_menu_mobile(){
        if(is_show_menu_mobile) {
            $("#bar_menu a" ).each(function( index ) {
                    $(this).css("display", "block");
            });
            is_show_menu_mobile=false;
            $("#btn_menu_mobile").html("<i class='fa fa-times' aria-hidden='true'></i>");
        }else
        {
            $("#bar_menu a" ).each(function( index ) {
                $(this).css("display", "none");
            });
            is_show_menu_mobile=true;
            $("#btn_menu_mobile").html("<i class='fa fa-bars' aria-hidden='true'></i>");
        }
    }

    function change_lang_store(key_lang) {
        $("#sel_key_contry").val(key_lang);
        $("#menu_country").submit();
        swal_loading();
    }

    function play_video(id_video){
        var id_video_rep=id_video.replace("https://www.youtube.com/watch?v=", "");
        id_video_rep=id_video_rep.replace("https://www.youtube.com/watch?v=", "");
        swal({
                html: true, title: '<i class="fa fa-youtube-square" aria-hidden="true" "></i>',
                text: '<iframe width="100%" height="360px" src="https://www.youtube-nocookie.com/embed/'+id_video_rep+'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        }, function() {
            swal('');
        });
    }

    function show_header_carrot(emp){
        var var_show=$(emp).data("show");
        if(var_show==1){
            $(emp).css("background-color","green");
            $('#header').show(200);
            $(emp).data("show","0");
        }else{
            $(emp).css("background-color","greenyellow");
            $('#header').hide(200);
            $(emp).data("show","1");
        }

    }

    function rate_object(objects,star,id){
        swal_loading();
        $('#loading').fadeIn(100);
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=rate_object&star="+star+"&objects="+objects+"&id="+id,
            success: function(data, textStatus, jqXHR)
            {
                swal('<?php echo lang($link,'thanh_cong') ?>','<?php echo lang($link,'cam_on_da_danh_gia') ?>','success');
                $('#loading').fadeOut(100);
            }
        });
    }

    function login_admin() {
        swal({
                html: true, title: 'Đăng nhập dành cho quản trị viên',
                text: '<form style="float: left;width: 100%;" id="frm_login_admin"><input name="function" value="login_admin"><label>Tên đăng nhập</label><input type="text" id="login_admin_username" name="login_admin_username" class="inp_login_admin"><label>Mật khẩu</label><input id="login_admin_password" name="login_admin_password" type="password" class="inp_login_admin"></form>',
                showCancelButton: true,
                confirmButtonText: "Đăng nhập",
                cancelButtonText: "Hủy bỏ",
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo $url;?>/index.php",
                        type: "post",
                        data: $("#frm_login_admin").serializeArray(),
                        success: function (data, textStatus, jqXHR) {
                            if(data=='1') {
                                swal("Đăng nhập quản trị viên", "Đăng nhập thành công!", "success");
                                reset_url();
                            }else{
                                swal("Đăng nhập quản trị viên", 'đăng nhập không thành công, vui lòng kiểm tra lại mật khẩu và tên đăng nhập', "error");
                            }
                        }
                    });
                }
        });
    }

    function logout_account() {
        swal_loading();
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=logout_account",
            success: function (data, textStatus, jqXHR) {
                swal("Đăng xuất", "Đã đăng xuất tài khoản của bạn", "success");
                reset_url();
            }
        });
    }

    function swal_loading(){
        swal({
            html: true, title: '<?php echo lang($link,'dang_xu_ly');?>',
            text: '<img src="<?php echo $url;?>/images/waiting.gif" alt="Loading"/>',
            showCancelButton: false
        })
    }

    function show_box_select_lang(){
        swal_loading();
        var urls="<?php echo "http".(($_SERVER['SERVER_PORT'] == 443) ? "s" : "")."://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>";
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=show_box_select_lang&urls="+urls,
            success: function (data, textStatus, jqXHR) {
                swal({
                    html: true, title: '<?php echo lang($link,'ngon_ngu_hien_thi');?>',
                    text: data,
                    showCancelButton: false
                })
            }
        });
    }

    function box_share(emp) {
        var width = 500;
        var height = 500;
        var link_shar=$(emp).attr("href");
        window.open(link_shar, 'newwindow', 'width=' + width + ', height=' + height + ', top=' + ((window.innerHeight - height) / 2) + ', left=' + ((window.innerWidth - width) / 2));
    }


    <?php
    if(!isset($user_login)){
    ?>
    function register_account_carrot(emp_btn) {
        $(emp_btn).removeClass("blue");
        $(emp_btn).addClass("yellow");
        $(emp_btn).html("<i class='fa fa-spinner' aria-hidden='true'></i> <?php echo lang($link,'dang_xu_ly');?>...");
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: $("#box_register").serializeArray(),
            success: function (data, textStatus, jqXHR) {
                $(emp_btn).removeClass("yellow");
                $(emp_btn).addClass("blue");
                $(emp_btn).html("<i class='fa fa-sign-in' aria-hidden='true'></i> <?php echo lang($link,'dang_nhap');?>");
                if (data == "add_account_success") {
                    swal("<?php echo lang($link,'dang_ky') ?>", "<?php echo lang($link,'thanh_cong') ?>", "success");
                    setTimeout(function () {
                        login_account();
                    }, 2000);
                } else {
                    $("#box_register_error").html(data.toString());
                    $("#box_register_error").hide();
                    $("#box_register_error").fadeToggle();
                }
            }
        });
    }

    function login_account_carrot(emp_btn) {
        var user_phone_login = $("#user_phone_login").val();
        var user_password_login = $("#user_password_login").val();

        $(emp_btn).removeClass("blue");
        $(emp_btn).addClass("yellow");
        $(emp_btn).html("<i class='fa fa-spinner' aria-hidden='true'></i> <?php echo lang($link,'dang_xu_ly');?>...");
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=login_account_carrot&user_phone_login=" + user_phone_login + "&user_password_login=" + user_password_login,
            success: function (data, textStatus, jqXHR) {
                $(emp_btn).removeClass("yellow");
                $(emp_btn).addClass("blue");
                $(emp_btn).html("<i class='fa fa-sign-in' aria-hidden='true'></i> <?php echo lang($link,'dang_nhap');?>");
                if (data.toString() == "ready_account") {
                    swal_loading();
                    reset_url();
                } else {
                    $("#box_login_error").html(data.toString());
                    $("#box_login_error").hide();
                    $("#box_login_error").fadeToggle();
                }
            }
        });
    }

    function show_box_register() {
        shortcut_key_music=false;
        var html_box_register = '<div style="width: 100%;">';
        html_box_register = html_box_register + '<form id="box_register">';

        html_box_register = html_box_register + '<i class="tip"><?php echo lang($link,'dang_ky_carrot_tip');?></i><br/>';
        html_box_register = html_box_register + '<strong id="box_register_error"></strong>';
        html_box_register = html_box_register + '<label><i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo lang($link,'so_dien_thoai');?></label><br/>';
        html_box_register = html_box_register + '<input id="user_phone_register" name="user_phone_register" type="text"></input>';
        html_box_register = html_box_register + '<label><i class="fa fa-user"></i> <?php echo lang($link,'ten_day_du');?></label><br/>';
        html_box_register = html_box_register + '<input id="user_name_register" name="user_name_register" type="text"></input>';
        html_box_register = html_box_register + '<label><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo lang($link,'dia_chi');?></label><br/>';
        html_box_register = html_box_register + '<input id="user_address_register" name="user_address_register" type="text"></input>';
        html_box_register = html_box_register + '<label><i class="fa fa-key" aria-hidden="true"></i> <?php echo lang($link,'mat_khau');?></label><br/>';
        html_box_register = html_box_register + '<input id="user_password_register" name="user_password_register" type="password"></input><br/>';
        html_box_register = html_box_register + '<span class="buttonPro green large" onclick="register_account_carrot(this)"><i class="fa fa-user-plus" aria-hidden="true"></i> <?php echo lang($link,"hoan_tat");?></span>';
        html_box_register = html_box_register + '<input name="function" value="register_account_carrot" type="hidden"></input>';
        html_box_register = html_box_register + '</form>';
        html_box_register = html_box_register + '<div style="float: left;width: 100%;">';
        html_box_register = html_box_register + '<span class="buttonPro" onclick="swal.close();"><i class="fa fa-times-circle" aria-hidden="true"></i> <?php echo lang($link,'back'); ?></span>  <span class="buttonPro light_blue" onclick="login_account();return false"><i class="fa fa-sign-in" aria-hidden="true"></i> <?php echo lang($link,'dang_nhap');?></span>';
        html_box_register = html_box_register + '</div>';

        html_box_register = html_box_register + '</div>';
        swal({html: true, title: '<?php echo lang($link,"dang_ky"); ?>', text: html_box_register, showConfirmButton: false,});

        setTimeout(function () {
            $("#user_address_register").geocomplete();
        }, 500);
    }


    function login_account() {
        shortcut_key_music=false;
        var html_box_login = '<div style="width: 100%;">';
        html_box_login = html_box_login + '<div class="box_login">';
        html_box_login = html_box_login + '<strong class="title"><?php echo lang($link,'dang_nhap_mxh');?></strong>';
        html_box_login = html_box_login + '<div id="box_login_other">';
        html_box_login = html_box_login + '<div id="my-signin2"></div>';
        <?php
        if(get_setting($link,'login_facebook')=='1') {
        ?>
        html_box_login = html_box_login + '<img onclick="login_facebook();" scope="public_profile,email" onclick="facebookLogin();" id="btn_fb_login" style="margin-top: 15px;width: 200px;height: 40px;cursor: pointer;" src="<?php echo $url;?>/images/btn_login_fb.jpg">';
        <?php
        }
        ?>
        html_box_login = html_box_login + '</div>';
        html_box_login = html_box_login + '</div>';

        html_box_login = html_box_login + '<div class="box_login">';
        html_box_login = html_box_login + '<strong class="title"><?php echo lang($link,'dang_nhap_carrot');?></strong>';
        html_box_login = html_box_login + '<i class="tip"><?php echo lang($link,'dang_nhap_carrot_tip');?></i>';
        html_box_login = html_box_login + '<div style="float: left;padding: 20px;" id="box_login_body">';
        html_box_login = html_box_login + '<div><img src="<?php echo $url;?>/images/icon.png"/></div>';
        html_box_login = html_box_login + '<strong id="box_login_error"></strong>';
        html_box_login = html_box_login + '<label><i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo lang($link,'field_login');?></label><br/>';
        html_box_login = html_box_login + '<input id="user_phone_login" name="user_phone_login" type="text"></input>';
        html_box_login = html_box_login + '<label><i class="fa fa-key" aria-hidden="true"></i> <?php echo lang($link,'mat_khau');?></label><br/>';
        html_box_login = html_box_login + '<input id="user_password_login"  name="user_password_login" type="password"></input>';
        html_box_login = html_box_login + '<span class="buttonPro large blue" onclick="login_account_carrot(this)"><i class="fa fa-sign-in" aria-hidden="true"></i> <?php echo lang($link,'dang_nhap');?></span>';
        html_box_login = html_box_login + '</div>';
        html_box_login = html_box_login + '</div>';

        html_box_login = html_box_login + '<div style="float: left;width: 100%;">';
        html_box_login = html_box_login + '<span class="buttonPro" onclick="swal.close();"><i class="fa fa-times-circle" aria-hidden="true"></i> <?php echo lang($link,'back'); ?></span>  <span class="buttonPro light_blue" onclick="show_box_register();"><i class="fa fa-user-plus" aria-hidden="true"></i> <?php echo lang($link,"dang_ky");?></span>   <span class="buttonPro" onclick="show_forgot_password();"><i class="fa fa-key" aria-hidden="true"></i> <?php echo lang($link,"quen_mat_khau");?></span>';
        html_box_login = html_box_login + '</div>';

        html_box_login = html_box_login + '</div>';
        swal({html: true, title: '<?php echo lang($link,"dang_nhap"); ?>', text: html_box_login, showConfirmButton: false,});
        setTimeout(function () {
            renderButton();
        }, 100);
    }

    function show_forgot_password(){
        var html_box_forgot_password='';
        html_box_forgot_password='<div>';
        html_box_forgot_password = html_box_forgot_password + '<div style="float: left;width: 100%;">';
        html_box_forgot_password = html_box_forgot_password + '<img style="border-radius: 50%;" src="<?php echo $url;?>/images/email.gif"/><br/>';
        html_box_forgot_password = html_box_forgot_password + '<div><?php echo lang($link,'quen_mat_khau_tip');?></div>';
        html_box_forgot_password = html_box_forgot_password + '<label for="email_forgot_password"><i class="fa fa-mail" aria-hidden="true"></i> Email</label>';
        html_box_forgot_password = html_box_forgot_password + '<input type="email" id="email_forgot_password" style="display:block;"/>';
        html_box_forgot_password = html_box_forgot_password + '<span class="buttonPro" onclick="login_account();"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> <?php echo lang($link,'back'); ?></span> <span class="buttonPro blue" onclick="forgot_password();"><i class="fa fa-check" aria-hidden="true"></i> <?php echo lang($link,'hoan_tat'); ?></span>';
        html_box_forgot_password = html_box_forgot_password + '</div>';
        swal({html: true, title: '<?php echo lang($link,"quen_mat_khau"); ?>', text: html_box_forgot_password, showConfirmButton: false,});
    }

    function forgot_password(){
        var inp_email_forgot_password=$("#email_forgot_password").val();
        swal_loading();
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=forgot_passworrd&email="+inp_email_forgot_password,
            success: function (data, textStatus, jqXHR) {
                var obj_data=JSON.parse(data);
                swal({ title:obj_data.title,text:obj_data.msg,type:obj_data.type},function(isConfirm){
                    if (obj_data.type=="error") {
                        login_account();
                        setTimeout(function () {
                            show_forgot_password();
                        }, 300);
                    }
                });
            }
        });
    }

    function onSignIn(googleUser, goto_user = true) {
        var profile = googleUser.getBasicProfile();
        swal_loading();
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=login_google&user_id=" + profile.getId() + "&user_name=" + profile.getName() + "&user_email=" + profile.getEmail() + "&user_avatar=" + profile.getImageUrl(),
            success: function (data, textStatus, jqXHR) {
                swal("<?php echo lang($link,'dang_nhap');?>", "<?php echo lang($link,'login_account_succes'); ?>", "success");
                if (goto_user) {
                    window.location = "<?php echo $url;?>/user/" + data + "/<?php echo $_SESSION['lang'];?>";
                } else {
                    reset_url();
                }
            }
        });
    }
    <?php
    }
    else{?>

    function show_all_playlist() {
        swal_loading();
        $.ajax({
            url: "<?php echo $url;?>/json/json_account.php",
            type: "post",
            data: "function=show_all_playlist&id_user=<?php echo $user_login->id;?>&lang=<?php echo $user_login->lang;?>",
            success: function (data, textStatus, jqXHR) {
                swal({
                    title: "<?php echo lang($link,"my_playlist"); ?>",
                    text: data,
                    html: true
                });
            }
        });

    }

    function delete_playlist_music(id_playlis,lang){
        swal({
                title: "<?php echo lang($link,'delete');?>",
                text: "<?php echo lang($link,'delete_tip');?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: '<?php echo lang($link,'box_yes');?>',
                cancelButtonText: "<?php echo lang($link,'box_no');?>",
                closeOnConfirm: false,
            },
            function(isConfirm){
                if (isConfirm){
                    swal_loading();
                    $.ajax({
                        url: "<?php echo $url;?>/json/json_account.php",
                        type: "post",
                        data: "function=delete_playlist_music&id="+id_playlis+"&lang="+lang,
                        success: function (data, textStatus, jqXHR) {
                            $(".list_playlist_"+id_playlis).hide();
                            swal("<?php echo lang($link,'my_playlist') ?>", "<?php echo lang($link,'thanh_cong') ?>", "success");
                        }
                });
            }
        });
    }

    <?php
    }
    ?>

    <?php
    if($page_file != 'page_remove_block_ads.php'){
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
                    title: "<?php echo lang($link,"adblock_title"); ?>",
                    text: "<img alt='<?php echo lang($link,"adblock_title");?>' src='<?php echo $url;?>/images/remove_block_ads.jpg'/><br/><?php echo lang($link,"adblock_msg");?>",
                    html: true,
                    showCancelButton: true,
                    cancelButtonClass: "btn-info",
                    confirmButtonText: "<?php echo lang($link,'help_off_block_ads');?>",
                    cancelButtonText: "Okay!",
                    closeOnConfirm: false,
                    closeOnCancel: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        window.location = "<?php echo $url;?>/remove_block_ads";
                    }
                });
        }
    }, 100);
    <?php
    }
    ?>

    function onSuccess(googleUser) {
        onSignIn(googleUser, false);
        googleUser.disconnect();
    }

    function onFailure(error) {
        console.log(error);
    }

    function renderButton() {
        gapi.signin2.render('my-signin2', {
            'scope': 'profile email',
            'width': 200,
            'height': 40,
            'longtitle': true,
            'theme': 'dark',
            'onsuccess': onSuccess,
            'onfailure': onFailure
        });
    }

    function style_dark_mode(){
        if(style_css_dark_mode=='0'){
            $("#style_site").attr("href", "<?php echo $url;?>/assets/css/style-dark-mode.min.css?v=<?php echo get_setting($link,'ver');?>");
            style_css_dark_mode='1';
            style_css_qtip='';
            $("#btn_dark_mode").html('<i class="fa fa-sun-o" aria-hidden="true"></i>');
        }else{
            $("#style_site").attr("href", "<?php echo $url;?>/assets/css/style.min.css?v=<?php echo get_setting($link,'ver');?>");
            style_css_dark_mode='0';
            style_css_qtip='qtip-green';
            $("#btn_dark_mode").html('<i class="fa fa-moon-o" aria-hidden="true"></i>');
        }

        $('#loading').fadeIn(100);
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=style_dark_mode&mode="+style_css_dark_mode,
            success: function(data, textStatus, jqXHR)
            {
                $('#loading').fadeOut(100);
            }
        });

        setup_qtip();
    }
    
    
    function setup_qtip(){
        $('.url_carrot').qtip({
            content: {
                title:"<i class='fa fa-home' aria-hidden='true'></i> <?php echo lang($link,'home_url'); ?>",
                text:"<img src='<?php echo $url; ?>/images/home_url.png' style='width:100%'>"
            },
            style: {
                classes: style_css_qtip+' qtip-shadow',
            },
            position: {
                at: 'bottom right',
            }
        });

        $('.jailbreak').qtip({
            prerender: true,
            content: {
                title:"<?php echo lang($link,'jailbreak_ios'); ?>",
                text: function(event, api) {
                    var id_product=$(this).attr('id_product');
                    $.ajax({
                        url: "<?php echo $url;?>/index.php",type: "post",data: "function=jailbreak_tip&id_product="+id_product,
                    })
                    .then(function(content) { api.set('content.text', content);}, function(xhr, status, error) {});
                    return '<?php echo lang($link,'dang_xu_ly');?>'; 
                }
            },
            show: {modal: {on: true,blur: false}},
            position: {
                my: 'bottom center',
                at: 'top center',
                viewport: $('#contain'),
                adjust: {
                    mouse: false,
                    scroll: false
                }
            },
            hide: {fixed: true,delay:90},
            style: {
                classes: style_css_qtip+' qtip-shadow',
            },
        });

        $('.ajax_tip').qtip({
            prerender: true,
            content: {
                title:"<i class='fa fa-question-circle' aria-hidden='true'></i> <?php echo lang($link,'chu_thich'); ?>",
                text: function(event, api) {
                    var ajax_data=$(this).attr('ajax_data');
                    var ajax_data_obj=JSON.parse(ajax_data);
                    $.ajax({
                        url: "<?php echo $url;?>/index.php",type: "post",data:ajax_data_obj,
                    })
                    .then(function(content) { 
                        var obj_data=JSON.parse(content);
                        api.set('content.text', obj_data.msg);
                        api.set('position.my', obj_data.my);
                        api.set('position.at', obj_data.at);
                    }, function(xhr, status, error) {});
                    return '<?php echo lang($link,'dang_xu_ly');?>'; 
                }
            },
            show: {modal: {on: true,blur: false}},
            position: {
                my: 'bottom center',
                at: 'top center',
                adjust: {
                    mouse: false,
                    scroll: true
                }
            },
            hide: {fixed: true,delay:90},
            style: {
                classes: style_css_qtip+'  qtip-shadow',
            },
        });

        reset_tip();
    }

    function reset_tip(){
        $('a[title],img[title],#share_link').each(function(){
            $(this).qtip({
                content: {
                    text: $(this).attr('title'),
                    title: "<i class='fa fa-question-circle' aria-hidden='true'></i> "+'<?php echo lang($link,'chu_thich'); ?>',
                },
                style: {
                    classes: style_css_qtip+'  qtip-shadow',
                }
            }); 
        });
    }
</script>

<?php
if(get_setting($link,'login_facebook')=='1') {
?>
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: '852575091553164',
                cookie: true, 
                xfbml: true, 
                version: 'v5.0' 
            });
            FB.getLoginStatus(function (response) { 
            });
        };


        (function (d,s,id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        function logoutFP() {
            FB.logout(function (response) {
                FB.Auth.setAuthResponse(null, 'unknown');
            });
        }

        function login_facebook(){
            FB.login(function (response) {
                if (response.authResponse) {
                    FB.api('/me', function(response) {
                        swal_loading();
                        $.ajax({
                            url: "<?php echo $url;?>/index.php",
                            type: "post",
                            data: "function=login_facebook&user_name="+response.name+"&user_id="+response.id+"&user_email="+response.email,
                            success: function (data, textStatus, jqXHR) {
                                swal("<?php echo lang($link,'dang_nhap');?>", "<?php echo lang($link,'login_account_succes'); ?>", "success");
                                reset_url();
                            }
                        });
                    });
                } else {
                    console.log('User cancelled login or did not fully authorize.');
                }
            },{scope: 'public_profile,email'});
        }
    </script>
<?php
}
?>