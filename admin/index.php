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

if(isset($_GET['logout'])){
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
        $user_login->password=$data_login_user['user_pass'];
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
    <link href="<?php echo $url_admin; ?>/style.min.css?v=<?php echo get_setting($link,'ver');?>" rel="stylesheet" />
	<title>Carrot - Admin </title>
    <meta charset="utf-8"/>
    <meta name="title" content="Admin CarrotStore" />
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/font-awesome.min.css"/>
    <link rel="canonical" href="<?php echo $url; ?>" />
    <link rel="shortcut icon" href="<?php echo $url; ?>/images/icon.png"/>
    <link href="<?php echo $url_admin; ?>/style.min.css?v=<?php echo get_setting($link,'ver');?>" rel="stylesheet" />
    <link href="<?php echo $url_carrot_store; ?>/assets/css/buttonPro.min.css?v=<?php echo get_setting($link,'ver');?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>/dist/sweetalert.min.css?v=<?php echo get_setting($link,'ver');?>">
    <meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
    <script src="<?php echo $url; ?>/js/jquery.js?v=<?php echo get_setting($link,'ver');?>"></script>
    <script src="<?php echo $url;?>/dist/sweetalert.min.js?v=<?php echo get_setting($link,'ver');?>"></script>
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
        <span>(<span id="num_cart_show"><?php echo $data_count_product['c'];?></span>) Sản phẩm</span>
    </a>

    <ul id="menu_work">
<?php
$query_list_app=mysqli_query($link,"SELECT * FROM carrotsy_work.`work_app` ");
while($item_app=mysqli_fetch_array($query_list_app)){
?>
    <li><a href="<?php echo $url_carrot_store.'/'.$item_app['url'];?>?userlogin=<?php echo $user_login->name;?>&password=<?php echo $user_login->password;?>" target="_blank"><img src="<?php echo $url_work;?>/img.php?url=avatar_app/<?php echo $item_app['id'];?>.png&size=18&type=app"  title="<?php echo $item_app['name']; ?>" /> <span class="name"><?php echo $item_app['name']; ?></span></a></li>
<?php
}
?>
</ul>

    <div id="bar_menu">
    <a href="<?php echo $url_admin; ?>/?page_view=page_overview" <?php if($page_file=="page_overview"){ echo 'class="active"';} ?>> Tổng quan</a>
    <a href="<?php echo $url_admin; ?>/?page_view=page_product" <?php if($page_file=="page_product"){ echo 'class="active"';} ?>><span class="syn products" syn="products"></span> Quản lý sản phẩm</a>
    <a href="<?php echo $url_admin; ?>/?page_view=page_ads" <?php if($page_file=="page_ads"){ echo 'class="active"';} ?>><span class="syn ads" syn="ads"></span> Quảng cáo</a>
    <a href="<?php echo $url_admin; ?>/?page_view=page_music_lyrics" <?php if($page_file=="page_music_lyrics"){ echo 'class="active"';} ?>><span class="syn music_contribute_lyrics" syn="music_contribute_lyrics"></span> Đóng góp lời</a>
    <a href="<?php echo $url_admin;?>/?page_view=page_lang" <?php if($page_file=='page_lang'){ echo 'class="active"';} ?>> Ngôn ngữ hệ thống</a>
    <a href="<?php echo $url_admin;?>/?page_view=page_login_manager" <?php if($page_file=='page_login_manager'){ echo 'class="active"';} ?>>Quản lý đăng nhập</a>
    <a href="<?php echo $url_admin;?>/?page_view=page_trash" <?php if($page_file=='page_trash'){ echo 'class="active"';} ?>>Dọn rác</a>
    <a href="<?php echo $url_admin;?>/?page_view=page_setting" <?php if($page_file=='page_setting'){ echo 'class="active"';} ?>><span class="syn setting" syn="setting"></span> Cài đặt</a>
    <a href="<?php echo $url_admin;?>/?page_view=page_order" <?php if($page_file=='page_order'){ echo 'class="active"';} ?>><span class="syn order" syn="order"></span> Đơn đặt hàng</a>
    <a href="<?php echo $url;?>/adminer.php?username=<?php echo $mysql_user;?>&db=<?php echo $mysql_database; ?>" target="_blank"><i class="fa fa-database" aria-hidden="true"></i></a>
    <a href="<?php echo $url;?>/vl" target="_blank"><i class="fa fa-heart" aria-hidden="true"></i></a>

        <div  method="post" id="info_account" action="<?php echo $url_admin;?>/index.php" >
            <img class="login_avatar"  src="<?php echo $user_login->avatar;?>" />
            <strong class="username"><a target="_blank" style="float: left;color: yellow;padding: 5px;" href="http://work.carrotstore.com/?page_show=info_user"><?php echo $user_login->name ?></a></strong>
            <span onclick="window.location.replace('<?php echo $url;?>')" class="buttonPro small blue" id="btn_logout"><i class="fa fa-home" aria-hidden="true"></i> Store</span>
            <span onclick="window.location.replace('<?php echo $url_admin;?>?logout=1')" class="buttonPro small purple" id="btn_logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</span>
        </div>

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
                                $('.syn.' + arr_item[i].key_table).after('<span class="tag_data_syn colon" onclick="backup_mysql_table(\''+arr_item[i].key_table+'\');$(this).removeClass(\'colon\').addClass(\'check\');return false;">-'+s_count+'</span>');
                            }else{
                                var s_count=parseInt(arr_item[i].count_table)-parseInt(count_data);
                                $('.syn.' + arr_item[i].key_table).after('<span class="tag_data_syn lost" onclick="backup_mysql_table(\''+arr_item[i].key_table+'\');$(this).removeClass(\'lost\').addClass(\'check\');return false;"> +' +s_count + '</span>');
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

    var next_act=0;
    var total_page=0;

    <?php if($name_host=='localhost'){?>
    $(document).ready(function(){
        $(".db").contextmenu(function() {
            var s_table=$(this).attr('table');
            var s_limit=$(this).attr('limit');
            if(s_limit==undefined){s_limit="500";}
            show_loading();
            $.ajax({
                url: "<?php echo $url_syn;?>/app_my_girl_jquery2.php",
                type: "post",
                data: "function=db_syn&table="+s_table+"&limit="+s_limit,
                success: function(data, textStatus, jqXHR)
                {
                    next_act=1;
                    var data_show=JSON.parse(data);
                    total_page=data_show.total_page;
                    var html_box_db='';
                    html_box_db='<div>';
                    html_box_db = html_box_db +data_show.html;
                    html_box_db = html_box_db + '<div style="float: left;width: 100%;"><span id="bd_btn_act" class="buttonPro green" onclick="db_action(\''+s_table+'\')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Thự hiện</span><span class="buttonPro" onclick="swal.close();"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> <?php echo lang($link,"back");?></span></div>';
                    html_box_db = html_box_db + '</div>';
                    swal({html: true, title: s_table, text: html_box_db, showConfirmButton: false,});
                }  
            });
            return false;
        });
    });

    
    function db_action(table_act){
        $.ajax({
            url: "<?php echo $url;?>/app_my_girl_jquery2.php",
            type: "post",
            data: "function=db_syn_ready&table="+table_act,
            success: function(data, textStatus, jqXHR)
            {
                var data_show=JSON.parse(data);
                if(data_show.status=='1'){
                    db_syn_buy_index(next_act);
                    $("#bd_btn_act").hide();
                }else{
                    alert(data_show.error);
                }
            }  
        });
    }

    function db_syn_buy_index(index_act){
        var current_page=$("#db_act_"+index_act).attr("current_page");
        var table_act=$("#db_act_"+index_act).attr("table");
        var total_page=$("#db_act_"+index_act).attr("total_page");
        var total_records=$("#db_act_"+index_act).attr("total_records");
        var limit=$("#db_act_"+index_act).attr("limit");
        $.ajax({
            url: "<?php echo $url_syn;?>/app_my_girl_jquery2.php",
            type: "post",
            data: "function=db_syn_act&table="+table_act+"&current_page="+current_page+"&total_records="+total_records+"&total_page="+total_page+"&limit="+limit,
            success: function(data, textStatus, jqXHR)
            {
                $("#db_act_"+index_act).css("background-color","yellow");
                $("#db_act_"+index_act).css("color","black");
                $.ajax({
                    url: "<?php echo $url;?>/app_my_girl_jquery2.php",
                    type: "post",
                    data: {function:'db_syn_act_query',data_query:data},
                    success: function(data, textStatus, jqXHR)
                    {
                        var data_show=JSON.parse(data);
                        if(data_show.status=='1'){
                            $("#db_act_"+index_act).css("background-color","green");
                            $("#db_act_"+index_act).css("color","white");
                            $("#db_act_"+index_act).hide(5000);
                            next_act++;
                            if(next_act<=total_page){
                                db_syn_buy_index(next_act);
                            }
                        }else{
                            $("#db_act_"+index_act).css("background-color","red");
                            $("#db_act_"+index_act).css("color","white");
                            alert(data_show.error);
                        }
                    }  
                });
            }  
        });
    }
    <?php }?>
</script>
</body>
</html>
<?php
mysqli_close($link);
?>
