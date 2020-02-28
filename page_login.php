<style>
body {
    background-image: none;
	margin: 0;
	width: 100%;
	height: 100vh;
	background: linear-gradient(-45deg, #63DC0A, #e73c7e, #23a6d5, #23d5ab);
	background-size: 400% 400%;
	animation: gradientBG 15s ease infinite;
}

@keyframes gradientBG {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}
</style>
<?php
include "phpqrcode/qrlib.php";
$phone='';
$view_list_account='';
$login_msg='';
$id_user_login='';
$type_nex='0';

if(isset($_GET['user_id'])){
    $id_user_login=$_GET['user_id'];
    $query_user_login=mysql_query("SELECT * FROM `app_my_girl_user_".$_SESSION['lang']."` WHERE `id_device` = '$id_user_login' LIMIT 1");
    $dara_user=mysql_fetch_array($query_user_login);
    $type_nex='1';
}

if(isset($_POST['phone'])){
    $phone=$_POST['phone'];
    if(trim($phone)==''){
        $view_list_account=''; 
       $login_msg=lang('no_account_error');
    }else{
        $query_user_login=mysql_query("SELECT * FROM `app_my_girl_user_".$_SESSION['lang']."` WHERE `sdt` = '$phone' ORDER BY RAND() LIMIT 10");
        $num_user=mysql_num_rows($query_user_login);
        if($num_user>0){
            if($num_user==1){
                $dara_user=mysql_fetch_array($query_user_login);
                $id_user_login=$dara_user['id_device'];
                $type_nex='1';
            }else{
                $view_list_account=lang('sel_account_login').'<br/><br/>';
                $view_list_account.='<table>';
                while($user_login=mysql_fetch_array($query_user_login)){
                    $view_list_account.='<tr>';
                    $view_list_account.='<td><img src="'.get_url_avatar_user($user_login['id_device'],$_SESSION['lang'],'50').'"/></td>';
                    $view_list_account.='<td><strong>'.$user_login['name'].'</strong><br/>'.$user_login['sdt'].'</td>';
                    $view_list_account.='<td><a class="buttonPro" href="'.$url.'/?page_view=page_login.php&user_id='.$user_login['id_device'].'"><i class="fa fa-sign-in" aria-hidden="true"></i> '.lang('dang_nhap').'</a></td>';
                    $view_list_account.='</tr>';
                }
                $view_list_account.='</table>';
                $type_nex='2';
            }
        }else{
           $view_list_account=''; 
           $login_msg=lang('no_account_error');
        }
    }
}
?>
<form method="post" action="" id="account_login">
<strong style="font-size: 20px;"><i class="fa fa-key" aria-hidden="true"></i> <?php echo lang('dang_nhap'); ?></strong><br />
<?php

if($type_nex!='0'){
    if($view_list_account!=''){

        echo $view_list_account; 
    }elsE{
        if($id_user_login!=''){
            mysql_query("DELETE FROM `account_login` WHERE `user_id` = '$id_user_login'");
            $query_add_login=mysql_query("INSERT INTO `account_login` (`user_id`, `dates`, `status`) VALUES ('$id_user_login', NOW(), 0);");
            if($query_add_login){
                echo '<div style="width:100%;padding-top: 20px;"><img  src="'.get_url_avatar_user($id_user_login,$_SESSION['lang'],'70').'" style="height:70px;width:70px;border-radius: 101px;" /></div>';
                echo '<br/><strong>'.lang('login_account_scan_qr_tip').'</strong>';
                echo '<br/> '.lang('login_app').':';
                echo '<a class="buttonPro small" href="'.$url.'/product/104"><img  src="'.get_url_icon_product(104,'13').'"/> '.get_name_product_lang(104,$_SESSION['lang']).'</a><br/>';
                QRcode::png($id_user_login, 'phpqrcode/img_login/'.$id_user_login.'.png', '300', 4, 2);
                echo '<img id="img_qr"   src="'.$url.'/phpqrcode/img_login/'.$id_user_login.'.png" style="height:300px;display:none;" />';
                echo '<img id="img_tip" src="'.$url.'/images/tip_qr_code.gif" style="height:300px" />';
                
                echo '<br/><span style="color: darkorchid;" id="status_login"></span><br/>';
                ?>
                
                <script>
                var count_timer=60;
                $(document).ready(function(){
                    $("#img_qr").hide();
                    $("#img_tip").show();
                    setInterval(check_login, 1000);
                });
                
                function check_login(){
                    count_timer=count_timer-1;
                    
                    if(count_timer=='57'){
                        $("#img_qr").show(300);
                        $("#img_tip").hide(100);
                    }
                    if(count_timer>=0){
                        $("#status_login").html("<?php echo lang('login_account_timer');?> : <i class='fa fa-clock-o' aria-hidden='true'></i> "+count_timer+"s");
                        $.ajax({
                            url: "<?php echo $url;?>/index.php",
                            type: "post",
                            data: "function=login_qr&user_id=<?php echo $id_user_login;?>",
                            success: function(data, textStatus, jqXHR)
                            {
                                if(data=='1'){
                                    swal("<?php echo lang('dang_nhap');?>","<?php echo lang('login_account_succes'); ?>", "success");
                                    window.location="<?php echo $url;?>/user/<?php echo $id_user_login; ?>/<?php echo $_SESSION['lang'];?>";
                                }
                            }
                
                        });
                    }else{
                        $("#btn_back").trigger("click");
                    }
                }

                </script>
                <?php
            }
        }
    }
    echo '<br/><a id="btn_back" class="buttonPro small" href="'.$url.'/?page_view=page_login.php"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> '.lang('back').'</a>';
}else{
?>
<br />
<label style="font-size: 13px;"  for="phone"><?php echo lang('login_account_tip'); ?></label>
<input type="text" onkeydown="$('#error_txt').hide(200);" style="margin-top: 20px;margin-bottom: 20px;" class="inp" name="phone" placeholder="<?php echo lang('inp_phone_tip'); ?>" value="<?php echo $phone;?>" />
<?php
if($login_msg!=''){
    echo '<i id="error_txt" style="color:red;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.$login_msg.'</i><br/><br/>';
}
?>
<input  type="submit" class="buttonPro blue" value="<?php echo lang('dang_nhap'); ?>"/>
<?php
}
?>
<br /><br />
<strong style="font-size: 20px;"><i class="fa fa-key" aria-hidden="true"></i> <?php echo lang('dang_nhap_tai_khoan_khac'); ?></strong><br />

<div style="text-align:-webkit-center;margin-top: 20px;" class="g-signin2" data-onsuccess="onSignIn"></div>
<input type="hidden" name="page_view" value="page_login.php" />
</form>

