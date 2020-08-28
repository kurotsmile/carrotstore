<?php
ini_set('upload_max_filesize', '90M');
ini_set('post_max_size', '90M');
ini_set('max_input_time', 900);
ini_set('max_execution_time', 900);

header('Content-type: text/html; charset=utf-8');
session_start();

include "../config.php";


if(isset($_POST['key_contry'])){
   $_SESSION['lang']=$_POST['key_contry'];     
}

if(isset($_SESSION['lang'])){

}else{
    $_SESSION['lang']='vi';
}



include "../database.php";
include "../function.php";  
include "function.php";  

if(isset($_POST['logout'])){
    unset($_SESSION['user_login']);
}

if(isset($_SESSION['user_login'])) {
    $user_login=json_decode($_SESSION['user_login']);
}

$user_name='';
$error_login='';


if(isset($_POST['user_name'])){
    $user_name=$_POST['user_name'];
    $user_pass=$_POST['user_pass'];
    $query_login=mysqli_query($link,"SELECT * FROM carrotsy_work.`work_user` WHERE `user_name`='$user_name' AND `user_pass`='$user_pass' LIMIT 1");
    if(mysqli_num_rows($query_login)>0){
        $data_login_user=mysqli_fetch_array($query_login);
        $user_login=new User_login();
        $user_login->id=$data_login_user['user_id'];
        $user_login->name=$user_name;
        $user_login->type='admin';
        $user_login->link=$url.'/admin';
        $user_login->avatar=$url_work.'/avatar_user/'.$data_login_user['user_id'].'.png';
        $user_login->email=$data_login_user['email'];
        $user_login->lang=$_SESSION['lang'];
        $_SESSION['user_login']=json_encode($user_login);
    }else{
        $error_login=alert("Đăng nhập không thành công! Hãy kiểm tra lại mật khẩu và tên đăng nhập","error");
    }
}



if($_GET&&isset($_GET['page_view'])){
    $page_file=$_GET['page_view'];
}else{
    $page_file="page_overview"; 
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html lang="en-US">
<head>
	<meta name="author" content="Trần Thiện Thanh" />
    <link href="<?php echo $url_admin; ?>/style.min.css" rel="stylesheet" />
	<title>Carrot - Admin </title>
    <meta charset="utf-8"/>
    <meta name="title" content="Admin CarrotStore" />
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/font-awesome.min.css"/>
    <link rel="canonical" href="<?php echo $url; ?>" />
    <link rel="shortcut icon" href="<?php echo $url; ?>/images/icon.png"/>
    <link href="<?php echo $url_admin; ?>/style.min.css" rel="stylesheet" />
    <link href="<?php echo $url_carrot_store; ?>/assets/css/buttonPro.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>/dist/sweetalert.min.css?v=1.1">
    <meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
    <script src="<?php echo $url; ?>/js/jquery.js"></script>
    <script src="<?php echo $url;?>/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
if(isset($_SESSION['user_login'])&&$user_login->type=='admin') {
?>

<div id="header">
    <a  href="<?php echo $url_admin; ?>"><img alt="logo" src="<?php echo $url; ?>/images/logo.png" id="logo" /></a>
	
	<a id="sell_product" href="#" onclick="check_data_syn();return false;">
        <i class="fa fa-refresh fa-3x" style="float: left;margin-right: 10px;"></i>
        <strong style="font-size: 15px;width: 100px;">Đồng bộ</strong><br />
        <span>Kiểm tra và đồng bộ dữ liệu</span>
    </a>
	
    <a id="sell_product" href="<?php echo $url; ?>/admin/?page_view=page_product&sub_view=page_product_update">
        <?php
        $query_count_product= mysqli_query($link,"SELECT COUNT(`id`) as c FROM `products`");
		$data_count_product=mysqli_fetch_assoc($query_count_product);
        ?>
        <i class="fa fa-rocket fa-3x" style="float: left;margin-right: 10px;"></i>
        <strong style="font-size: 15px;width: 100px;">Thêm sản phẩm</strong><br />
        <span>(<span id="num_cart_show"><?php echo $data_count_product['c'];?></span>) <?php echo lang($link,'sp'); ?></span>
    </a>

    <div id="bar_menu">
    <a href="<?php echo $url_admin; ?>/?page_view=page_product" <?php if($page_file=="page_product"){ echo 'class="active"';} ?>><span class="syn products" syn="products"></span> Quản lý sản phẩm</a>
    <a href="<?php echo $url_admin; ?>/?page_view=page_ads" <?php if($page_file=="page_ads"){ echo 'class="active"';} ?>><span class="syn ads" syn="ads"></span> Quảng cáo</a>
    <a href="<?php echo $url_admin; ?>/?page_view=page_music_lyrics" <?php if($page_file=="page_music_lyrics"){ echo 'class="active"';} ?>>Đóng góp lời</a>
    <a href="<?php echo $url_admin;?>/?page_view=page_country_key_manager" <?php if($page_file=='page_country_key_manager'){ echo 'class="active"';} ?>><span class="syn lang_value" syn="lang_value"></span> Ngôn ngữ hệ thống</a>
    <a href="<?php echo $url_admin;?>/?page_view=page_login_manager" <?php if($page_file=='page_login_manager'){ echo 'class="active"';} ?>>Quản lý đăng nhập</a>
    <a href="<?php echo $url_admin;?>/?page_view=page_trash" <?php if($page_file=='page_trash'){ echo 'class="active"';} ?>>Dọn rác</a>
    <a href="<?php echo $url_admin;?>/?page_view=page_setting" <?php if($page_file=='page_setting'){ echo 'class="active"';} ?>><span class="syn setting" syn="setting"></span> Cài đặt</a>
    <a href="<?php echo $url_admin;?>/?page_view=page_order" <?php if($page_file=='page_order'){ echo 'class="active"';} ?>><span class="syn order" syn="order"></span> Đơn đặt hàng</a>

        <form  method="post" id="info_account" action="<?php echo $url_admin;?>/index.php" >
            <img class="login_avatar"  src="<?php echo $user_login->avatar;?>" />
            <strong class="username"><a target="_blank" style="float: left;color: yellow;padding: 5px;" href="http://work.carrotstore.com/?page_show=info_user"><?php echo $user_login->name ?></a></strong>
            <input class="buttonPro small blue" type="button" onclick="window.location.replace('<?php echo $url;?>')" value="CarrotStore"/>
            <input style="float: none;" type="submit" value="Đăng xuất" class="buttonPro purple small" id="btn_logout"  />
            <input type="hidden" name="logout" value="1" />
            <input type="hidden" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" name="urls" />
        </form>


    </div>
</div>
<?php
}
?>

<div style="float: left;width: 100%;">
<?php

if(isset($_SESSION['user_login'])&&$user_login->type=='admin') {
    include $page_file.'.php'; 
}else{    
    include "page_login.php";
}
?>

</div>

<div id="go_top" onclick="go_top()">
    <i class="fa fa-angle-double-up fa-3x"></i>
</div>

<div id="loading">
    <i class="fa fa-refresh fa-spin fa-3x" style="float: left;margin-right: 10px;"></i>
    <strong style="font-size: 15px;width: 100px;"><?php echo lang($link,'dang_xu_ly'); ?></strong><br />
    <span><?php echo lang($link,'dang_lay_du_lieu'); ?></span>
</div>
<script>
    function  check_data_syn(){
        $(".tag_data_syn").remove();
        var arr_syn=[];
        $(".syn").each(function () {
            var data_syn=$(this).attr("syn");
            arr_syn.push(data_syn);
        });

        show_loading();

        $.ajax({
            url: "<?php echo $url;?>/app_my_girl_jquery.php",
            type: "post",
            data: {function:'count_data_syn',table:JSON.stringify(arr_syn)},
            success: function (data, textStatus, jqXHR) {
                var arr_item=JSON.parse(data);
                for (var i=0;i<arr_item.length;i++){
                    $('.syn.'+arr_item[i].key_table).attr("syn-count",arr_item[i].count_table);
                }

                $.ajax({
                    url: "<?php echo $url_syn;?>/app_my_girl_jquery.php",
                    type: "post",
                    data: {function:'check_data_syn',table:JSON.stringify(arr_syn)},
                    success: function (data, textStatus, jqXHR) {
                        var arr_item=JSON.parse(data);
                        for (var i=0;i<arr_item.length;i++){
                            var count_data=$('.syn.'+arr_item[i].key_table).attr("syn-count");
                            if(count_data==arr_item[i].count_table) {
                                $('.syn.' + arr_item[i].key_table).after('<span class="tag_data_syn" onclick="backup_mysql_table(\''+arr_item[i].key_table+'\');return false;" ><i class="fa fa-check-circle" aria-hidden="true"></i></span>');
                            }else if(count_data>arr_item[i].count_table) {
                                var s_count=count_data-parseInt(arr_item[i].count_table);
                                $('.syn.' + arr_item[i].key_table).after('<span class="tag_data_syn colon" onclick="backup_mysql_table(\''+arr_item[i].key_table+'\');return false;">-'+s_count+'</span>');
                            }else{
                                var s_count=parseInt(arr_item[i].count_table)-parseInt(count_data);
                                $('.syn.' + arr_item[i].key_table).after('<span class="tag_data_syn lost" onclick="backup_mysql_table(\''+arr_item[i].key_table+'\');return false;"> +' +s_count + '</span>');
                            }
                        }
                        close_loading();
                    }
                });
            }
        });
    }

    function backup_mysql_table(s_table){
        var url_backup="<?php echo $url_syn;?>/adminer.php?username=carrotsy_carrot&db=carrotsy_virtuallover&dump="+s_table;
        window.open(url_backup,'_blank');
    }

    function show_loading(){
        swal({
            html: true, title: 'Đang xử lý',
            text: '<img src="<?php echo $url;?>/images/waiting.gif" alt="Loading"/>',
            showCancelButton: false
        });
    }

    function close_loading(){
        swal.close();
    }
</script>
</body>
</html>
<?php
mysqli_close($link);
?>
