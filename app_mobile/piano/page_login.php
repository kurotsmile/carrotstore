<?php
$userlogin=''; if(isset($_REQUEST["userlogin"])) $userlogin=$_REQUEST["userlogin"];
$password='';   if(isset($_REQUEST["password"])) $password=$_REQUEST["password"];
?>
<form action="" method="post" id="frm_login">
    <label>Tên đăng nhập</label><br/>
    <input type="text" name="userlogin" value="<?php echo $userlogin;?>"/></br>
    <label>Mật khẩu</label><br/>
    <input type="password" name="password" value="<?php echo $password;?>" /></br>
    <button class="buttonPro purple"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập</button>
</form>