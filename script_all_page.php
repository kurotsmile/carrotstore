<script>
    function go_top(){
        var body = $("html, body");
        body.stop().animate({scrollTop:0}, '500', 'swing', function() {
            $('#go_top').fadeOut(500);
        });
    }

    $(window).scroll( function(){
        if($(window).scrollTop()>35){
            $('#go_top').fadeIn(500);
        }else{
            $('#go_top').fadeOut(500);
        }
    });


    function show_menu_app(Emp){
        $('.app').removeClass('menu_app');
        $(Emp).parent().parent().addClass('menu_app')
    };


    function delete_data(emp,row,mysql_table){
        swal({
                title: "<?php echo lang('hoi_xoa'); ?>",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true, },
            function(){
                $.ajax({
                    url: "<?php echo $url;?>/index.php",
                    type: "post",
                    data: "function=delete_data&id="+row+"&table="+mysql_table,
                    success: function(data, textStatus, jqXHR)
                    {
                        swal('<?php echo lang('xoa_thanh_cong'); ?>');
                        $(emp).parent().parent().remove();
                    }
                });
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
        $('#loading').fadeIn(100);
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=rate_object&star="+star+"&objects="+objects+"&id="+id,
            success: function(data, textStatus, jqXHR)
            {
                swal('<?php echo lang('thanh_cong') ?>','<?php echo lang('cam_on_da_danh_gia') ?>','success');
                $('#loading').fadeOut(100);
            }
        });
    }
    
</script>


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
            text: '<div style="width: 240px;margin-left: auto;margin-right: auto;"><div id="my-signin2"></div><img scope="public_profile,email" onclick="facebookLogin();" id="btn_fb_login" style="margin-top: 15px;" src="<?php echo $url;?>/images/btn_login_fb.jpg"></div>',
        });
        setTimeout(function () {
            renderButton();
        }, 100);
    }

    function onSignIn(googleUser, goto_user = true) {
        var profile = googleUser.getBasicProfile();
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=login_google&user_id=" + profile.getId() + "&user_name=" + profile.getName() + "&user_email=" + profile.getEmail() + "&user_avatar=" + profile.getImageUrl(),
            success: function (data, textStatus, jqXHR) {
                swal("<?php echo lang('dang_nhap');?>", "<?php echo lang('login_account_succes'); ?>", "success");
                if (goto_user) {
                    window.location = "<?php echo $url;?>/user/" + data + "/<?php echo $_SESSION['lang'];?>";
                } else {
                    window.location = "<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>";
                }
            }

        });
    }

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
                    title: "<?php echo lang("adblock_title"); ?>",
                    text: "<img alt='<?php echo lang("adblock_title");?>' src='<?php echo $url;?>/images/remove_block_ads.jpg'/><br/><?php echo lang("adblock_msg");?>",
                    html: true,
                    showCancelButton: true,
                    cancelButtonClass: "btn-info",
                    confirmButtonText: "<?php echo lang('help_off_block_ads');?>",
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
            'width': 240,
            'height': 50,
            'longtitle': true,
            'theme': 'dark',
            'onsuccess': onSuccess,
            'onfailure': onFailure
        });
    }

</script>
<?php
if ($protocol == 'https') {
    ?>
    <script>

        function facebookLogin() {
            alert("sdsds");
            checkLoginState();
        }

        function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
            console.log('statusChangeCallback');
            console.log(response);                   // The current login status of the person.
            if (response.status === 'connected') {   // Logged into your webpage and Facebook.
                testAPI();
            } else {                                 // Not logged into your webpage or we are unable to tell.

            }
        }


        function checkLoginState() {               // Called when a person is finished with the Login Button.
            FB.getLoginStatus(function (response) {   // See the onlogin handler
                statusChangeCallback(response);
            });
        }


        window.fbAsyncInit = function () {
            FB.init({
                appId: '852575091553164',
                cookie: true,                     // Enable cookies to allow the server to access the session.
                xfbml: true,                     // Parse social plugins on this webpage.
                version: 'v5.0'           // Use this Graph API version for this call.
            });


            FB.getLoginStatus(function (response) {   // Called after the JS SDK has been initialized.
                statusChangeCallback(response);        // Returns the login status.
            });
        };


        (function (d, s, id) {                      // Load the SDK asynchronously
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));


        function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function (response) {
                console.log('Successful login for: ' + response.name);
            });
        }

        function logoutFP() {
            FB.logout(function (response) {
                FB.Auth.setAuthResponse(null, 'unknown');
            });
        }
    </script>
    <?php
}
?>