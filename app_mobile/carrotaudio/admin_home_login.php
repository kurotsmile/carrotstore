<div style="float: left;width: 100%;text-align: center">
<div id="frm_login">
    <div class="row">
        <strong>Đăng nhập bằng tài khoản làm việc để quản lý các tệp tin trong hệ thống</strong>
    </div>
    <div class="row">
        <label>Tên đăng nhập</label>
        <input type="text" value="" name="username" id="username_login">
    </div>
    <div class="row">
        <label>Mật khẩu</label>
        <input type="password" value="" name="password" id="password_login">
    </div>
    <button onclick="login();" class="buttonPro orange"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</button>
</div>
</div>

<script>
    function login(){
        swal("Đăng nhập","Đang xử lý...");
        var username_login=$("#username_login").val();
        var password_login=$("#password_login").val();
        $.ajax({
            url: '<?php echo $url_carrot_store;?>/app_my_girl_jquery.php',
            jsonp: "logincallback",
            data: "function=login_work&username="+username_login+"&password="+password_login,
            dataType: 'jsonp',
        });
    }

    logincallback = function (data) {
        if(data['error']=='0') {
            swal("Đăng nhập", "Đăng nhập thành công!", "success");
            window.location='<?php echo $url_admin;?>?user_login='+data['id']+"&avatar_login="+data['avatar']+"&full_name_login="+data['full_name'];
        }else {
            swal("Đăng nhập không thành công!", "Xin vui lòng kiểm tra lại mật khẩu và tên đăng nhập", "error");
        }
    };
</script>
