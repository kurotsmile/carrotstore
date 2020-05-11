<div id="page_contain">

<?php

?>
<form class="box_form" method="post" action="" style="width: 425px;">
    <div class="row">
    <strong>Đăng nhập</strong><br />
    <i>Đăng nhập vào hệ thống quảng lý nội dung của ứng dụng Kinh Thánh</i>
    </div>
    
    <div class="row">
    <?php
    if($error_login!=''){
        echo $error_login;
    }
    ?>
    <table>
        <tr>
            <td>Tên đăng nhập</td><td><input name="user_name" type="text" placeholder="Nhập tên đăng nhập" value="<?php echo $user_name; ?>" /></td>
        </tr>
        
        <tr>
            <td>Mật khẩu</td><td><input name="user_pass" type="password" /></td>
        </tr>
        
        <tr>
            <td>&nbsp;</td><td><input type="submit" value="Đăng nhập" class="buttonPro red" /></td>
        </tr>
    </table>
    </div>
</form>
</div>