<form id="form_login_admin" method="post" action="">
<div class="frm_row">
<img src="<?php echo $url;?>/images/logo.png" />
</div>
<?php
if($error_login!=''){
?>
<div class="frm_row" style="color: red;"><?php echo $error_login;?></div>
<?php
}
?>
<div class="frm_row">
<label>Tên đăng nhập</label>
<input class="inp" name="user_name" value="" />
</div>

<div class="frm_row">
<label>Mật khẩu</label>
<input class="inp" name="user_pass" value="" type="password" />
</div>

<div class="frm_row">
<input type="submit" value="Đăng nhập" class="buttonPro blue" />
</div>
</form>