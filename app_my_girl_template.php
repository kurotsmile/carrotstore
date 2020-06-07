<?php
include "config.php";
include "database.php";
include "function.php";
include "app_my_girl_function.php";
session_start();
$sel_version = '0';
$error_login_user = '';
$data_user_carrot = '';
$lang_2 = 'vi';
$ver_cms='1.0';

if (isset($_GET['select_ver'])) {
    $sel_version = $_GET['select_ver'];
    $_SESSION['select_ver'] = $sel_version;
}

if (isset($_SESSION['select_ver'])) {
    $sel_version = $_SESSION['select_ver'];
}

if (isset($_SESSION['lang_2'])) {
    $lang_2 = $_SESSION['lang_2'];
}

if (isset($_SESSION['is_login_user'])) {
    $data_user_carrot = $_SESSION['data_user'];
    $id_user = $data_user_carrot['user_id'];
    $query_user_login = mysqli_query($link,"SELECT * FROM carrotsy_work.`work_user` WHERE `user_id` = '$id_user' LIMIT 1");
    $data_user_carrot = mysqli_fetch_assoc($query_user_login);
}

if (isset($_GET['logout'])) {
    unset($_SESSION['data_user']);
    unset($_SESSION['id_login_user']);
    unset($_SESSION['is_login_user']);
}


if (isset($_POST['login_act'])) {
    $login_user = $_POST['user_name'];
    $login_pass = $_POST['passw'];
    $query_login = mysqli_query($link,"Select * From  `carrotsy_work`.`work_user` WHERE `user_name`='$login_user' AND `user_pass`='$login_pass' Limit 1");
    if (mysqli_num_rows($query_login) > 0) {
        $data_user_carrot = mysqli_fetch_assoc($query_login);
        $_SESSION['data_user'] = $data_user_carrot;
        $_SESSION['is_login_user'] = $_POST['user_name'];
        $_SESSION['id_login_user'] = $data_user_carrot['user_pass'];
        $error_login_user = "Login success!";
        $url_cur=$_POST['url_cur'];
        header("location:$url_cur");
    } else {
        $error_login_user = "Username or password not match!";
        unset($_POST);
    }
    mysqli_free_result($query_login);
}

$cur_url = $_SERVER['REQUEST_URI'];

class item_sever_upload
{
    public $name = '';
    public $url_home='';
    public $url = '';
}

class item_data
{
    public $key = "";
    public $name = "";
}

class Data_app
{
    public $arr_face_name = array();
    public $arr_action_name = array();
    public $arr_function_app = array();
    public $arr_function_sever = array();
    public $msg_func = array();
    public $arr_sever_upload = array();
}

$data_app = new Data_app();
//Máy chủ lưu trữ dữ liệu
$item_upload = new item_sever_upload();
$item_upload->name = "Máy chủ dữ liệu";
$item_upload->url_home='https://carrotaudio.com';
$item_upload->url = $item_upload->url_home.'/ajax.php';
array_push($data_app->arr_sever_upload, $item_upload);

//Chức năng msg
class msg_func_item
{
    public $key = "";
    public $value = "";
}

//Khai báo các chức năng thoại
$func_i = new msg_func_item();
$func_i->key = "bat_chuyen";
$func_i->value = "Bắt chuyện";
array_push($data_app->msg_func, $func_i);

$func_i = new msg_func_item();
$func_i->key = "bam_bay";
$func_i->value = "Bấm bậy";
array_push($data_app->msg_func, $func_i);

for ($i = 0; $i < 24; $i++) {
    $func_i = new msg_func_item();
    $func_i->key = "chao_$i";
    $func_i->value = "Chào lúc $i giờ";
    array_push($data_app->msg_func, $func_i);
}

$func_i = new msg_func_item();
$func_i->key = "dam";
$func_i->value = "Bị đấm";
array_push($data_app->msg_func, $func_i);

$func_i = new msg_func_item();
$func_i->key = "chua_biet_ten";
$func_i->value = "Chưa biết tên";
array_push($data_app->msg_func, $func_i);

$func_i = new msg_func_item();
$func_i->key = "da_biet_ten";
$func_i->value = "đã biết tên";
array_push($data_app->msg_func, $func_i);

$func_i = new msg_func_item();
$func_i->key = "chua_bat_dinh_vi";
$func_i->value = "Chưa bật định vị";
array_push($data_app->msg_func, $func_i);

$func_i = new msg_func_item();
$func_i->key = "giai_toan";
$func_i->value = "Giải toán";
array_push($data_app->msg_func, $func_i);

$func_i = new msg_func_item();
$func_i->key = "khong_tim_thay";
$func_i->value = "không tìm thấy thông tin";
array_push($data_app->msg_func, $func_i);

$func_i = new msg_func_item();
$func_i->key = "tim_thay";
$func_i->value = "Tìm thấy thông tin";
array_push($data_app->msg_func, $func_i);

$func_i = new msg_func_item();
$func_i->key = "khong_biet_ngay_gap";
$func_i->value = "Không sát định được ngày gặp";
array_push($data_app->msg_func, $func_i);

$func_i = new msg_func_item();
$func_i->key = "hien_ds_sdt";
$func_i->value = "Kết quả tìm kiếm danh bạ";
array_push($data_app->msg_func, $func_i);

$func_i = new msg_func_item();
$func_i->key = "thong_bao";
$func_i->value = "Thông báo trở lại";
array_push($data_app->msg_func, $func_i);

$func_i = new msg_func_item();
$func_i->key = "tra_loi_thong_bao";
$func_i->value = "Trả lời thông báo";
array_push($data_app->msg_func, $func_i);

$func_i = new msg_func_item();
$func_i->key = "hoi_tim_duong";
$func_i->value = "Hỏi tìm đường";
array_push($data_app->msg_func, $func_i);

$func_i = new msg_func_item();
$func_i->key = "tra_loi_tim_duong";
$func_i->value = "Trả lời tìm đường";
array_push($data_app->msg_func, $func_i);


//khuôn mặt và hành động cho câu trò chuyện
array_push($data_app->arr_face_name, "default");
array_push($data_app->arr_face_name, "damaged");
array_push($data_app->arr_face_name, "smile");
array_push($data_app->arr_face_name, "smile2");
array_push($data_app->arr_face_name, "sad");
array_push($data_app->arr_face_name, "relax");
array_push($data_app->arr_face_name, "strain");
array_push($data_app->arr_face_name, "surprise");
array_push($data_app->arr_face_name, "scold");
array_push($data_app->arr_face_name, "eye_close");
array_push($data_app->arr_face_name, "confuse");
array_push($data_app->arr_face_name, "mth_a");
array_push($data_app->arr_face_name, "mth_e");
array_push($data_app->arr_face_name, "mth_i");
array_push($data_app->arr_face_name, "mth_o");
array_push($data_app->arr_face_name, "mth_R");
array_push($data_app->arr_face_name, "mth_u");
array_push($data_app->arr_face_name, "mth_L");

array_push($data_app->arr_action_name, "Standing@loop - đứng chờ");
array_push($data_app->arr_action_name, "GoDown - bị bổ xuống");
array_push($data_app->arr_action_name, "Jumping@loop - nhảy lên xuống (lặp)");
array_push($data_app->arr_action_name, "KneelDown mệt mõi - gục người xuống");
array_push($data_app->arr_action_name, "Running@loop chạy");
array_push($data_app->arr_action_name, "Salute nhảy lên chào");
array_push($data_app->arr_action_name, "JumpToTop nhảy lên (1 lần)");
array_push($data_app->arr_action_name, "Walking@loop đi bộ (lặp)");
array_push($data_app->arr_action_name, "Damaged@loop bị đấm");
array_push($data_app->arr_action_name, "002_SIM01_Final - múa - nhảy theo nhạc");
array_push($data_app->arr_action_name, "đứng cụm tay vào nhau (pose1)");
array_push($data_app->arr_action_name, "che bướm !");
array_push($data_app->arr_action_name, "quay sang phải che bướm !");
array_push($data_app->arr_action_name, "bị muỗi - co chân - hôi thối");
array_push($data_app->arr_action_name, "Ngượn ngùng - khải đầu");
for ($i = 6; $i < 29; $i++) {
    array_push($data_app->arr_action_name, "pose" . $i);
}
array_push($data_app->arr_action_name, "Múa võ - thủ");
array_push($data_app->arr_action_name, "Múa võ - đấm đằng trước");
array_push($data_app->arr_action_name, "Khoe đít");

//Chức năng chạy trên ứng dụng
$item_data = new item_data();
$item_data->name = "Hiệu ứng Love (app)";
$item_data->key = "1";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Âm nhạc (app+sever)";
$item_data->key = "2";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Hiệu ứng Flower (app)";
$item_data->key = "3";
array_push($data_app->arr_function_app, $item_data);


$item_data = new item_data();
$item_data->name = "Star - bye bye - Thoát ứng dụng (app)";
$item_data->key = "4";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Rain - mưa (app)";
$item_data->key = "5";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Camera (app)";
$item_data->key = "6";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Snow (tuyết rơi)(app)";
$item_data->key = "7";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Flashist -on (mở đèn pin)(app)";
$item_data->key = "8";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Flashist -off (tắc đèn pin)(app)";
$item_data->key = "9";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Tắc nhạc (app)";
$item_data->key = "10";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Mở danh sách nhạc (app)";
$item_data->key = "11";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Mở danh sách ảnh nền (app)";
$item_data->key = "12";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Mở danh sách liên hệ (app)";
$item_data->key = "13";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Check địa điểm (app)";
$item_data->key = "14";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "lưu ảnh nền vào thư viện (app)";
$item_data->key = "15";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "đặt lại ảnh nền mặc định (app)";
$item_data->key = "16";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "đổi nhân vật (app)";
$item_data->key = "17";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Mở shop trang phục (ver 2 - 3D) (app)";
$item_data->key = "21";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Đóng chửa sổ chatbox chức năng (app)";
$item_data->key = "22";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Mở chức năng dạy (app)";
$item_data->key = "23";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Đổi ảnh đại diện (v1)(app)";
$item_data->key = "24";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Xóa ảnh đại diện (v1) (app)";
$item_data->key = "25";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Xem quảng cáo startapp (app)";
$item_data->key = "26";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Xem quảng cáo trung giang (app)";
$item_data->key = "27";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Chia sẻ (app)";
$item_data->key = "28";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Trò chuyện có hình ảnh (app)";
$item_data->key = "29";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Mở nhạc khác (next)(app)";
$item_data->key = "30";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Tìm kiếm danh bạ (sever)";
$item_data->key = "31";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Thông tin người dùng (app)";
$item_data->key = "32";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Danh sách radio (app)";
$item_data->key = "33";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Danh sách nhân vật (app)";
$item_data->key = "35";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Châm ngôn (sever)";
$item_data->key = "36";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Mở Cảnh quan 3d (ver2) (app)";
$item_data->key = "38";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Mở google map chỉ đường đã tìm (sever)";
$item_data->key = "43";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Thực hiện câu lệnh đầu tiên trong bản lựa chọn (app)";
$item_data->key = "44";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Mở đánh giá (app ver1)";
$item_data->key = "45";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Mở danh sách giới thiệu các ứng dụng Carrot App (app ver1)";
$item_data->key = "46";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Mở Apple music (App ver 2 -ios)";
$item_data->key = "47";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Mở Lịch sử trò chuyện";
$item_data->key = "48";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Kể truyện";
$item_data->key = "49";
array_push($data_app->arr_function_app, $item_data);

$item_data = new item_data();
$item_data->name = "Mở Thực tế ảo";
$item_data->key = "50";
array_push($data_app->arr_function_app, $item_data);


$array_category_store = array();

Class Category_Item_store
{
    public $key = '';
    public $value = '';
}

$category_item = new Category_Item_store();
$category_item->key = '';
$category_item->value = 'Không thiết lập';
array_push($array_category_store, $category_item);

$category_item = new Category_Item_store();
$category_item->key = 'app';
$category_item->value = 'Mở ứng dụng';
array_push($array_category_store, $category_item);

$category_item = new Category_Item_store();
$category_item->key = 'delete';
$category_item->value = 'Sẽ xóa';
array_push($array_category_store, $category_item);

$category_item = new Category_Item_store();
$category_item->key = 'update';
$category_item->value = "Chờ cập nhật thêm";
array_push($array_category_store, $category_item);

$category_item = new Category_Item_store();
$category_item->key = 'highlights';
$category_item->value = "Nỗi bậc";
array_push($array_category_store, $category_item);

$category_item = new Category_Item_store();
$category_item->key = 'holiday';
$category_item->value = "Ngày lễ";
array_push($array_category_store, $category_item);

$arr_tag_effect = array("chat", "music", "love", "noel", "sex boy", "sex girl", "emoji", "animal", "foods", "app");
$arr_func = array('{gio}', '{phut}', '{ngay}', '{thang}', '{nam}', '{thu}', '{ngaycuanam}', '{ngaycuanam2}', '{ten_user}', '{devicename}', '{devicetype}', '{vi_tri}', '{giai_toan}', '{thong_tin}', '{dem_ngay_gap}', '{key_chat}');
$arr_func_sever = array('doc_ten', 'sua_ten', 'vi_tri', 'dem_ngay_gap', 'vi_tri_map', 'tim_danh_ba', 'tim_nhac', 'tim_duong', 'tim_loi_nhac');
$q1_tag = '["có","co","Co","Có","ok","uhm","uk","okay","muon","muốn","kể đi","nghe","phai","phải","đúng","dung" ]';
$q2_tag = '["không","khong","k","thôi","bỏ","miễn","bo","no","thoi","khong nghe","sai","ko"]';
$arr_limit_day = array("", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
$arr_status_icon = array('<i class="fa fa-meh-o" aria-hidden="true"></i>', '<i class="fa fa-smile-o" aria-hidden="true"></i>', '<i class="fa fa-heart" aria-hidden="true"></i>', '<i class="fa fa-frown-o" aria-hidden="true"></i>');
?>
<title>Người yêu ảo</title>
<link rel="icon" href="<?php echo $url; ?>/app_mygirl/icon.ico" type="image/gif" sizes="16x16"/>
<script src="<?php echo $url; ?>/js/jquery.js"></script>
<link href="<?php echo $url; ?>/app_mygirl/style.min.css?v=<?php echo $ver_cms;?>" rel="stylesheet"/>
<link rel="stylesheet" href="<?php echo $url; ?>/assets/css/buttonPro.min.css"/>
<link rel="stylesheet" href="<?php echo $url; ?>/assets/css/font-awesome.min.css"/>
<link rel="stylesheet" href="<?php echo $url; ?>/js/jquery-ui.css"/>
<script src="<?php echo $url; ?>/js/jquery-ui.js"></script>
<script src="<?php echo $url; ?>/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/dist/sweetalert.min.css"/>
<script src="<?php echo $url; ?>/js/jquery.ajaxfileupload.min.js"></script>
<?php

if (isset($_SESSION['is_login_user']) && $_SESSION['is_login_user'] != "") {

} else {
    ?>
    <div id="bk_login">
        <form id="frm_login" method="post">
            <strong>Đăng nhập vào hệ thống</strong><br/>
            <label>Tên đăng nhập</label>
            <input type="text" value="" name="user_name"/><br/>
            <label>Mật khẩu</label>
            <input type="password" name="passw"/><br/>
            <input type="submit" value="Login" name="login_act" class="buttonPro small green"/><br/><br/>
            <?php if ($error_login_user != "") { ?><p style="color:red;font-weight: bold;"><?php echo $error_login_user; ?></p><?php } ?>
            <input type="hidden" value="<?php echo currentUrl($_SERVER); ?>" name="url_cur"/><br/>
        </form>
    </div>
    <?php
    exit;
}
?>

<ul id="menu" class="notranslate">
    <li <?php if ($cur_url == '/vl') {echo "class='active'"; } ?>><a href="<?php echo $url; ?>/vl" style="font-weight: bold;">Vitual Lover</a></li>
    <li <?php if ($cur_url == '/app_my_girl_history.php') {echo "class='active'";} ?>><a href="<?php echo $url; ?>/app_my_girl_history.php"><i class="fa fa-user" aria-hidden="true"></i> Theo dõi</a></li>
    <li <?php if ($cur_url == '/app_my_girl_msg.php') {echo "class='active'";} ?>><a href="<?php echo $url; ?>/app_my_girl_msg.php"><i class="fa fa-commenting-o" aria-hidden="true"></i> Câu Thoại</a></li>
    <li <?php if ($cur_url == '/app_my_girl_chat.php') { echo "class='active'";} ?>><a href="<?php echo $url; ?>/app_my_girl_chat.php"><i class="fa fa-comments" aria-hidden="true"></i> Trò chuyện</a></li>
    <li <?php if ($cur_url == '/app_my_girl_effect.php') {echo "class='active'";} ?>><a href="<?php echo $url; ?>/app_my_girl_effect.php"><i class="fa fa-gratipay" aria-hidden="true"></i> Hiệu ứng</a></li>
    <li <?php if ($cur_url == '/app_my_girl_background.php') { echo "class='active'";} ?>><a href="<?php echo $url; ?>/app_my_girl_background.php"><i class="fa fa-university" aria-hidden="true"></i>Khung cảnh</a></li>
    <li <?php if ($cur_url == '/app_my_girl_ads.php') { echo "class='active'";} ?>><a href="<?php echo $url; ?>/app_my_girl_ads.php"><i class="fa fa-bandcamp" aria-hidden="true"></i> Quảng cáo</a></li>
    <li <?php if ($cur_url == '/app_my_girl_preson.php') { echo "class='active'";} ?>><a href="<?php echo $url; ?>/app_my_girl_preson.php"><i class="fa fa-heart"></i> Nhân vật</a>
        <ul class="sub_menu">
            <li><a href="<?php echo $url; ?>/app_my_girl_preson_category.php"><i class="fa fa-th-list" aria-hidden="true"></i> Quảng lý Chủ đề nhân vật</a></li>
        </ul>
    </li>

    <li <?php if ($cur_url == '/app_my_girl_manager_country.php') { echo "class='active'";} ?>><a href="<?php echo $url; ?>/app_my_girl_manager_country.php"><i class="fa fa-globe" aria-hidden="true"></i> Quản lý quốc gia và phiên bản</a>
        <ul class="sub_menu">
            <li><a href="<?php echo $url; ?>/app_my_girl_create_country.php"><i class="fa fa-eercast" aria-hidden="true"></i> Tạo quốc gia mới</a></li>
            <li><a href="<?php echo $url; ?>/app_my_girl_display_lang.php"><i class="fa fa-tag" aria-hidden="true"></i> Trường dữ liệu</a></li>
            <li <?php if ($cur_url == '/app_my_girl_key_lang.php') { echo "class='active'";} ?>><a href="<?php echo $url; ?>/app_my_girl_key_lang.php"><i class="fa fa-eercast" aria-hidden="true"></i> Từ khóa ngôn ngữ hệ thống</a></li>
            <li <?php if ($cur_url == '/app_my_girl_display_value.php') { echo "class='active'";} ?>><a href="<?php echo $url; ?>/app_my_girl_display_value.php"><i class="fa fa-gg" aria-hidden="true"></i> Giao diện ngôn ngữ</a></li>
        </ul>
    </li>
    <li <?php if ($cur_url == '/app_my_girl_tool.php') { echo "class='active'";} ?>><a href="<?php echo $url; ?>/app_my_girl_tool.php"><i class="fa fa-gavel" aria-hidden="true"></i> Công cụ</a></li>
</ul>

<div id="dialog" title="Xem quang hệ" style="display: none;" class="notranslate">
    <p id="dialog_data">Nội dung...</p>
</div>

<script>
    $(document).ready(function () {
        $("#menu li").hover(function () {
            $(this).find(".sub_menu").toggle();
        });

        var xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener("progress", function (evt) {
            if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                percentComplete = parseInt(percentComplete * 100);
                console.log(percentComplete);
                if (percentComplete === 100) {
                    alert("Hoàn tất!");
                }
            }
        }, false);
    });

    function show_box(datas) {
        $("#dialog").dialog({closeText: "", width: 800, position: ['center', 20]});
        $("#dialog_data").html(datas);
    }

    function view_pater(lang, id, type) {
        $.ajax({
            url: "app_my_girl_jquery.php",
            type: "get", //kiểu dũ liệu truyền đi
            data: "function=view_chat_father&id=" + id + "&lang=" + lang + "&type=" + type, //tham số truyền vào
            success: function (data, textStatus, jqXHR) {
                show_box(data);
            }

        });
    }

    function translation_tag(name_tag, lang_tag, lang_cur) {
        var txt = $('#' + name_tag).val();
        txt = txt.replace("{ten_user}", "");
        txt = txt.replace("&", "and");
        if (lang_tag == 'zh') {
            lang_tag = 'zh-CN';
        }
        if (lang_cur == 'zh') {
            lang_cur = 'zh-CN';
        }
        if (txt == '') {
            alert("Không có nội dung dịch! bạn phải nhập nội dung vào trường dữ liệu để dịch!");
        } else {
            var win = window.open("https://translate.google.com/#view=home&op=translate&sl=" + lang_tag + "&tl=" + lang_cur + "&text=" + txt);
            win.focus();
        }
    }

    function copy_tag(name_tag) {
        ;
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($("#" + name_tag).val()).select();
        document.execCommand("copy");
        $temp.remove();
    }

    function paste_tag(name_tag) {
        ;
        navigator.clipboard.readText().then(text => {
            document.querySelector('#out').value = text;
            ChromeSamples.log('Text pasted.');
            $('#' + name_tag).val(text);
        })
            .catch(() => {
                alert("Lỗi dán!");
            });
    }

</script>

<div style="height: 32px;float: left;width: 100%;">&nbsp;</div>