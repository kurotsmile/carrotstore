<script src="<?php echo $url; ?>/dist/sweetalert.min.js"></script> 
<script src="<?php echo $url; ?>/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/dist/sweetalert.css"/>

<?php
include "app_my_girl_template.php";
?>
<div style="padding: 5px;">
<h3>Tạo quốc gia mới</h3>
<?php
    $key_country='';
    $name_country='';
    
    if(isset($_POST['create_new'])){
        $key_country=$_POST['key_country'];
        $name_country=$_POST['name_country'];
        
        if(mysql_num_rows(mysql_query("SELECT `key` FROM `app_my_girl_country` WHERE `key` = '$key_country' LIMIT 1"))){
            echo '<p>Từ khóa quốc gia này ('.$key_country.') đã được tạo!!!</p>';
        }else{
            $query_add_country=mysql_query("INSERT INTO `app_my_girl_country` (`key`, `name`) VALUES ('$key_country', '$name_country');");
            
            $target_dir = "app_mygirl/img/".$key_country.".png";
            if (move_uploaded_file($_FILES['icon_country']["tmp_name"], $target_dir)) {
                echo "Tạo biểu tượng thành công ở đường dẫn: ". basename($_FILES['icon_country']["name"]). ".";
            } else {
                echo "Lỗi tạo biểu tượng<br/>";
            }

            
            if($query_add_country===true){
                //Create chat country
                $query_create_country=mysql_query("
                    CREATE TABLE `app_my_girl_".$key_country."` (
                      `id` int(11) NOT NULL AUTO_INCREMENT,
                      `text` text NOT NULL,
                      `chat` text NOT NULL,
                      `status` int(11) NOT NULL,
                      `sex` int(1) NOT NULL,
                      `color` varchar(10) NOT NULL,
                      `q1` varchar(200) NOT NULL,
                      `q2` varchar(200) NOT NULL,
                      `r1` varchar(200) NOT NULL,
                      `r2` varchar(200) NOT NULL,
                      `tip` int(1) NOT NULL,
                      `link` varchar(100) NOT NULL,
                      `vibrate` varchar(1) NOT NULL,
                      `effect` int(2) NOT NULL,
                      `action` int(2) NOT NULL DEFAULT '0',
                      `face` int(2) NOT NULL DEFAULT '0',
                      `certify` int(1) NOT NULL,
                      `author` varchar(30) NOT NULL,
                      `character_sex` int(1) NOT NULL DEFAULT '1',
                      `id_redirect` varchar(20) NOT NULL,
                      `pater` varchar(20) NOT NULL,
                      `pater_type` varchar(5) NOT NULL,
                      `ver` int(1) NOT NULL DEFAULT '0',
                      `os` varchar(20) NOT NULL,
                      `limit_chat` int(1) NOT NULL DEFAULT '0',
                      `limit_date` int(2) NOT NULL,
                      `limit_month` int(2) NOT NULL,
                      `effect_customer` varchar(10) NOT NULL,
                      `func_sever` varchar(20) NOT NULL,
                      `disable` int(1) NOT NULL,
                      `limit_day` varchar(10) NOT NULL,
                      `user_create` varchar(2) NOT NULL,
                      `user_update` varchar(2) NOT NULL,
                      PRIMARY KEY (`id`),
                      FULLTEXT KEY `text` (`text`),
                      FULLTEXT KEY `chat` (`chat`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                ");
                if($query_create_country){
                    echo '<br/>Tạo cơ sở dữ liệu trò chuyện thành công!!! nước ('.$key_country.')</br>';
                }else{
                    echo '<br/>Tạo cơ sở dữ liệu trò chuyện thất bại!!! nước ('.$key_country.')</br>';
                }
        
                //Create Msg country
                $query_create_msg=mysql_query("
                    CREATE TABLE `app_my_girl_msg_".$key_country."` (
                      `id` bigint(20) NOT NULL AUTO_INCREMENT,
                      `func` varchar(30) NOT NULL,
                      `chat` text NOT NULL,
                      `sex` int(1) NOT NULL,
                      `status` int(1) NOT NULL,
                      `color` varchar(10) NOT NULL,
                      `q1` varchar(200) NOT NULL,
                      `q2` varchar(200) NOT NULL,
                      `r1` varchar(200) NOT NULL,
                      `r2` varchar(200) NOT NULL,
                      `vibrate` varchar(1) NOT NULL,
                      `effect` int(2) NOT NULL,
                      `action` int(2) NOT NULL DEFAULT '0',
                      `face` int(2) NOT NULL DEFAULT '0',
                      `certify` int(1) NOT NULL,
                      `author` varchar(30) NOT NULL,
                      `character_sex` int(1) NOT NULL,
                      `disable` int(1) NOT NULL DEFAULT '0',
                      `ver` int(1) NOT NULL DEFAULT '0',
                      `os` varchar(20) NOT NULL,
                      `limit_chat` int(1) NOT NULL DEFAULT '0',
                      `limit_date` int(2) NOT NULL,
                      `limit_month` int(2) NOT NULL,
                      `effect_customer` varchar(10) NOT NULL,
                      `limit_day` varchar(10) NOT NULL,
                      `user_create` varchar(2) NOT NULL,
                      `user_update` varchar(2) NOT NULL,
                      PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                ");
                
                if($query_create_msg){
                    echo '<br/>Tạo cơ sở dữ liệu câu thoại thành công!!! nước ('.$key_country.')</br>';
                }else{
                    echo '<br/>Tạo cơ sở dữ liệu câu thoại thất bại!!! nước ('.$key_country.')</br>';
                }
                
                //Create user country
                $query_create_user=mysql_query("
                    CREATE TABLE `app_my_girl_user_".$key_country."` (
                      `id_device` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
                      `name` varchar(20) NOT NULL,
                      `sex` varchar(1) NOT NULL,
                      `date_start` date NOT NULL,
                      `date_cur` date NOT NULL,
                      `address` varchar(100) NOT NULL,
                      `sdt` varchar(20) NOT NULL,
                      `status` int(1) NOT NULL DEFAULT '0',
                      FULLTEXT KEY `name` (`name`),
                      FULLTEXT KEY `sdt` (`sdt`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                ");
                if($query_create_user){
                    echo '<br/>Tạo cơ sở dữ liệu người dùng  thành công!!! nước ('.$key_country.')</br>';
                }else{
                    echo '<br/>Tạo cơ sở dữ liệu người dùng thất bại!!! nước ('.$key_country.')</br>';
                }
                
                //Create lyrics country
                $query_create_lyrics=mysql_query("
                    CREATE TABLE `app_my_girl_".$key_country."_lyrics` (
                      `id_music` varchar(20) NOT NULL,
                      `lyrics` text NOT NULL,
                      FULLTEXT KEY `lyrics` (`lyrics`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                ");
                if($query_create_lyrics){
                    echo '<br/>Tạo cơ sở dữ liệu lời bài hát  thành công!!! nước ('.$key_country.')</br>';
                }else{
                    echo '<br/>Tạo cơ sở dữ liệu lời bài hát thất bại!!! nước ('.$key_country.')</br>';
                }
                
                //Create Field data chat
                $query_create_field_chat=mysql_query("
                    CREATE TABLE `app_my_girl_field_".$key_country."` (
                      `id_chat` varchar(11) NOT NULL,
                      `type_chat` varchar(5) NOT NULL,
                      `data` text NOT NULL,
                      `type` varchar(50) NOT NULL,
                      `author` varchar(100) NOT NULL,
                      `option` varchar(1) NOT NULL DEFAULT '0'
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                ");
                if($query_create_field_chat){
                    echo '<br/>Tạo cơ sở siêu dữ liệu trò chuyện thành công!!! nước ('.$key_country.')</br>';
                }else{
                    echo '<br/>Tạo cơ sở siêu dữ liệu trò chuyện thất bại!!! nước ('.$key_country.')</br>';
                }
                
                //Create data music country
                $query_create_data_music=mysql_query("
                    CREATE TABLE `app_my_girl_music_data_".$key_country."` (
                      `device_id` varchar(50) NOT NULL,
                      `value` varchar(1) NOT NULL,
                      `id_chat` varchar(11) NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                ");
                if($query_create_data_music){
                    echo '<br/>Tạo cơ sở dữ liệu bản xếp hạng thành công!!! nước ('.$key_country.')</br>';
                }else{
                    echo '<br/>Tạo cơ sở dữ liệu bản xếp hạng  thất bại!!! nước ('.$key_country.')</br>';
                }
                
                //Create video ytb country
                $query_create_video_ytb=mysql_query("
                    CREATE TABLE `app_my_girl_video_".$key_country."` (
                      `id_chat` varchar(11) NOT NULL,
                      `link` text NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                ");
                if($query_create_video_ytb){
                    echo '<br/>Tạo cơ sở dữ liệu video ytb thành công!!! nước ('.$key_country.')</br>';
                }else{
                    echo '<br/>Tạo cơ sở dữ liệu video ytb thất bại!!! nước ('.$key_country.')</br>';
                }
                
                if(mysql_error($link)==''){
                    mkdir('app_mygirl/app_my_girl_msg_'.$key_country, 0777, true);
                    mkdir('app_mygirl/app_my_girl_'.$key_country, 0777, true);
                    mkdir('app_mygirl/app_my_girl_'.$key_country.'_user', 0777, true);
                    mkdir('app_mygirl/app_my_girl_'.$key_country.'_brain', 0777, true);
                    echo "Tạo nước (Cơ sở dữ liệu+Đường dẫn âm thanh) thành công!!!";
                }
                $key_country='';
                $name_country='';
            }
        }
    }
?>

<strong>
    Chú ý từ khóa quốc tế (tạo rồi xóa đi sẽ bị ảnh hưởng đển cấu trúc tập tin và dữ liệu hệ thống)
</strong>
<form method="post" action="" enctype="multipart/form-data">
<table style="width: 400px;margin-top: 5px;">
    <tr>
        <td >
            <label>Từ khóa quốc tế:</label>
        </td>
        
        <td>
            <input name="key_country" type="text" value="<?php echo $key_country; ?>" />
        </td>
    </tr>
    
    <tr>
        <td >
            <label>Tên quốc gia (theo tiếng anh):</label>
        </td>
        
        <td>
            <input name="name_country" type="text" value="<?php echo $name_country; ?>" id="name_country" />
        </td>
    </tr>

    <tr>
        <td>
            <label>Biểu tượng (128x128):</label>
        </td>
        
        <td>
            <input name="icon_country" type="file" />
            
            <a href="#" class="buttonPro small light_blue" onclick="search_icon_country();return false;" ><i class="fa fa-search-plus" aria-hidden="true"></i> Tìm kiếm icon</a>
        </td>
    </tr>
    
    <tr>
        <td colspan="2">
            <input type="hidden" name="create_new" value="1" />
            <input type="hidden" name="func" value="create_country" />
            <input type="submit" value="Tạo" class="buttonPro lager blue" />
        </td>
    </tr>
</table>
</form>
</div>

<script>
function search_icon_country(){
    var txt_name=$("#name_country").val();
    var win = window.open("https://findicons.com/search/"+txt_name+"", '_blank');
    win.focus();
}
</script>