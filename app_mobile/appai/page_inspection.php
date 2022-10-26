<?php
include_once("../carrot_framework/carrot_cms_form.php"); 

$id_chat='';if(isset($_GET["id"])) $id_chat=$_GET["id"];
$lang_chat='';if(isset($_GET["lang"])) $lang_chat=$_GET["lang"];
$key_chat='';if(isset($_GET["key"])) $key_chat=$_GET["key"];
$type_chat='chat';if(isset($_GET["type_chat"])) $type_chat=$_GET["type_chat"];

if($lang_chat==''){
    echo $this->msg("Không tìm thấy tham số quốc gia");
    $url_cur=$this->cur_url;
    $cr_lang=new carrot_form("form_list_lang",$this);
    $list_country=$this->get_list_lang();
    foreach($list_country as $c){
        $col_left="<img width='15px' src='".$c['icon']."'/> ".$c['name'];
        $col_right='<a href="'.$url_cur.'&lang='.$c['key'].'&type_chat=chat" class="buttonPro small blue"><i class="fa fa-commenting"></i> Tạo mới trò chuyện </a>';
        $col_right.='<a href="'.$url_cur.'&lang='.$c['key'].'&type_chat=msg" class="buttonPro small blue"><i class="fa fa-comments-o"></i> Tạo mới câu thoại </a>';
        $cr_lang->add_row($col_left,$col_right);
    }
    echo $cr_lang->show();
    exit;
}

if($type_chat=='chat')
    $table_chat='app_my_girl_'.$lang_chat;
else
    $table_chat='app_my_girl_msg_'.$lang_chat;

$cr_form=new carrot_form($table_chat,$this);
$cr_form->set_title("Cập nhật và thêm mới câu trò chuyện");
$cr_form->handle_post();

if($id_chat!=""){
    $data_chat=$this->q_data("SELECT * FROM `$table_chat` WHERE `id` = '$id_chat' LIMIT 1");
    $cr_form->paser_data_mysql($data_chat,$table_chat);
    $cr_form->set_type("edit");
}
else if($key_chat!=""){
    $_GET['text']=$key_chat;
    if(isset($_GET['answer'])) $_GET['chat']=$_GET['answer'];
    if(isset($_GET['user_id'])) $_GET['user_create']=$_GET['user_id'];
    $cr_form->paser_table_mysql($table_chat,$_GET);
    $cr_form->set_type("add");
}
else{
    $cr_form->paser_table_mysql($table_chat);
    $cr_form->set_type("add");
}

$id_field=$cr_form->get_field_by_id("id");
$id_field->set_is_field_update();

$field_func_msg=$cr_form->get_field_by_id("func");
if($field_func_msg!=null){
    $field_func_msg->set_title("Chức năng câu thoại");
    $field_func_msg->set_type("select");
    $field_func_msg->add_val("bat_chuyen","Bắt chuyện");
    $field_func_msg->add_val("bam_bay","Bấm bậy (Phản hồi khi người dùng bấm bậy, nhập vào những nội dung làm nhân vật không hiểu)");
    $field_func_msg->add_val("chao_0","Chào lúc 0 giờ");
    $field_func_msg->add_val("chao_1","Chào lúc 1 giờ");
    $field_func_msg->add_val("chao_2","Chào lúc 2 giờ");
    $field_func_msg->add_val("chao_3","Chào lúc 3 giờ");
    $field_func_msg->add_val("chao_4","Chào lúc 4 giờ");
    $field_func_msg->add_val("chao_5","Chào lúc 5 giờ");
    $field_func_msg->add_val("chao_6","Chào lúc 6 giờ");
    $field_func_msg->add_val("chao_7","Chào lúc 7 giờ");
    $field_func_msg->add_val("chao_8","Chào lúc 8 giờ");
    $field_func_msg->add_val("chao_9","Chào lúc 9 giờ");
    $field_func_msg->add_val("chao_10","Chào lúc 10 giờ");
    $field_func_msg->add_val("chao_11","Chào lúc 11 giờ");
    $field_func_msg->add_val("chao_12","Chào lúc 12 giờ");
    $field_func_msg->add_val("chao_13","Chào lúc 13 giờ");
    $field_func_msg->add_val("chao_14","Chào lúc 14 giờ");
    $field_func_msg->add_val("chao_15","Chào lúc 15 giờ");
    $field_func_msg->add_val("chao_16","Chào lúc 16 giờ");
    $field_func_msg->add_val("chao_17","Chào lúc 17 giờ");
    $field_func_msg->add_val("chao_18","Chào lúc 18 giờ");
    $field_func_msg->add_val("chao_19","Chào lúc 19 giờ");
    $field_func_msg->add_val("chao_20","Chào lúc 20 giờ");
    $field_func_msg->add_val("chao_21","Chào lúc 21 giờ");
    $field_func_msg->add_val("chao_22","Chào lúc 22 giờ");
    $field_func_msg->add_val("chao_23","Chào lúc 23 giờ");
}

$text_field=$cr_form->get_field_by_id("text");
if($text_field!=null){
    $text_field->set_title("Từ khóa trò chuyện");
    $text_field->set_required();
}

$chat_field=$cr_form->get_field_by_id("chat");
$chat_field->set_title("Phản hồi của nhân vật");
$chat_field->set_type("textarea");
$chat_field->set_tip("câu trả lời nhân vật đối với từ khóa trò chuyện");
$chat_field->set_required();

$sex_field=$cr_form->get_field_by_id("sex");
$sex_field->set_title("Giới tính người dùng");
$sex_field->set_type("radio");
$sex_field->add_val("0","Nam");
$sex_field->add_val("1","Nữ");

$character_sex_field=$cr_form->get_field_by_id("character_sex");
$character_sex_field->set_title("Giới tính nhân vật");
$character_sex_field->set_type("radio");
$character_sex_field->add_val("0","Nam");
$character_sex_field->add_val("1","Nữ");

$color_field=$cr_form->get_field_by_id("color");
$color_field->set_title("Màu sắc trò chuyện");
$color_field->set_type("color");
$color_field->add_val("#ff0000");
$color_field->add_val("#ff4000");
$color_field->add_val("#ff8000");
$color_field->add_val("#ffbf00");
$color_field->add_val("#ffff00");
$color_field->add_val("#bfff00");
$color_field->add_val("#80ff00");

$status_field=$cr_form->get_field_by_id("status");
$status_field->set_title("Trạng thái nhân vật");
$status_field->set_type("radio");
$status_field->add_val("1","Nomal - (bình thường)");
$status_field->add_val("0","Ban đầu - (không quan tâm)");
$status_field->add_val("2","Xúc động - (vui vẻ)");
$status_field->add_val("3","Tức giận - (không hài lòng)");

$tip_field=$cr_form->get_field_by_id("tip");
if($tip_field!=null){
    $tip_field->set_title("Đối tượng gợi ý");
    $tip_field->set_type("radio");
    $tip_field->add_val("0","Không phải là câu gợi ý");
    $tip_field->add_val("1","thiết lập thành câu gợi ý");
}

$link_field=$cr_form->get_field_by_id("link");
if($link_field!=null){
    $link_field->set_title("Liên kết mở rộng");
    $link_field->set_type("url");
}

$vibrate_field=$cr_form->get_field_by_id("vibrate");
$vibrate_field->set_title("Chế độ rung");
$vibrate_field->set_type("radio");
$vibrate_field->add_val("0","Không dùng");
$vibrate_field->add_val("1","Bật rung");

$effect_field=$cr_form->get_field_by_id("effect");
$effect_field->set_title("Hiệu ứng và chức năng ứng dụng");
$effect_field->set_type("select");
$effect_field->add_val("0","Không thiết lập");
$effect_field->add_val("1","Hiệu ứng trái tim - love heart (app)");
$effect_field->add_val("2","Âm nhạc (app,server)");
$effect_field->add_val("3","Hiệu ứng Flower (app)");
$effect_field->add_val("4","Hiệu ứng ngôi sao - bye bye - Thoát ứng dụng (app)");
$effect_field->add_val("5","Hiệu ứng mưa rơi (app)");
$effect_field->add_val("6","Mở máy ảnh chụp hình (app)");
$effect_field->add_val("7","Hiệu ứng tuyết rơi (app)");
$effect_field->add_val("8","Bật đèn pin (app)");
$effect_field->add_val("9","Tắt đèn pin (app)");
$effect_field->add_val("10","Tắc nhạc (app)");
$effect_field->add_val("11","Mở danh sách nhạc (app)");
$effect_field->add_val("12","Mở danh sách ảnh nền (app)");
$effect_field->add_val("13","Mở danh sách danh bạ liên hệ (app)");
$effect_field->add_val("14","Check in địa điểm (app)");
$effect_field->add_val("15","Lưu ảnh nền vào thư viện (app)");
$effect_field->add_val("16","Đặt lại ảnh nền mặc định (app)");
$effect_field->add_val("17","Đổi nhân vật (app)");
$effect_field->add_val("21","Mở shop trang phục (ver 2 - 3D) (app)");
$effect_field->add_val("22","Đóng chửa sổ chatbox các cửa sổ chức năng phụ (app)");
$effect_field->add_val("23","Mở chức năng dạy (app)");
$effect_field->add_val("24","Đổi ảnh đại diện (v1)(app)");
$effect_field->add_val("25","Xóa ảnh đại diện (v1) (app)");
$effect_field->add_val("26","Xem quảng cáo dàng xếp (app)");
$effect_field->add_val("27","Xem quảng cáo trung giang (app)");
$effect_field->add_val("28","Chia sẻ (app)");
$effect_field->add_val("29","Trò chuyện có hình ảnh (app)");
$effect_field->add_val("30","Mở nhạc khác (next)(app)");
$effect_field->add_val("31","Tìm kiếm danh bạ (sever)");
$effect_field->add_val("32","Thông tin người dùng (app)");
$effect_field->add_val("33","Danh sách radio (app)");
$effect_field->add_val("35","Danh sách nhân vật (app)");
$effect_field->add_val("36","Châm ngôn (sever)");
$effect_field->add_val("38","Mở Cảnh quan 3d (ver2) (app)");
$effect_field->add_val("43","Mở google map chỉ đường đã tìm với link liên kết (link)(sever)");
$effect_field->add_val("44","Thực hiện câu lệnh đầu tiên trong bản lựa chọn (app)");
$effect_field->add_val("45","Mở đánh giá (app)");
$effect_field->add_val("46","Mở danh sách giới thiệu các ứng dụng Carrot App (app)");
$effect_field->add_val("47","Mở Apple music (App-ios)");
$effect_field->add_val("48","Mở Lịch sử trò chuyện");
$effect_field->add_val("49","Kể truyện");
$effect_field->add_val("50","Mở Thực tế ảo");
$effect_field->add_val("51","Thời tiết");
$effect_field->add_val("52","chạy chức năng ở máy chủ (Thay thế từ khóa và thự hiện lệnh tương ứng vd mở bài {tên bài hát} -> chức năng server)");

$action_field=$cr_form->get_field_by_id("action");
$action_field->set_title("Hành động nhân vật");
$action_field->set_type("select-img");
$action_field->add_val("0","đứng yên","/app_mygirl/img/action/0.png");
$action_field->add_val("0","Bị té","/app_mygirl/img/action/1.png");
$action_field->add_val("0","Nhảy lên","/app_mygirl/img/action/2.png");
$action_field->add_val("0","Gục xuống","/app_mygirl/img/action/3.png");
$action_field->add_val("0","Chạy","/app_mygirl/img/action/4.png");
$action_field->add_val("0","Chào kiểu bộ đội","/app_mygirl/img/action/5.png");
$action_field->add_val("0","Nhảy lên liên tục","/app_mygirl/img/action/6.png");
$action_field->add_val("0","Đi bộ","/app_mygirl/img/action/7.png");
$action_field->add_val("0","Bị cú đầu","/app_mygirl/img/action/8.png");
$action_field->add_val("0","Múa theo nhạc","/app_mygirl/img/action/9.png");
$action_field->add_val("0","Chụm tay e thẹn","/app_mygirl/img/action/10.png");
$action_field->add_val("0","Ngượn ngùng","/app_mygirl/img/action/11.png");
$action_field->add_val("0","lúng túng","/app_mygirl/img/action/12.png");
$action_field->add_val("0","Than khổ","/app_mygirl/img/action/13.png");
$action_field->add_val("0","Hỏi hang","/app_mygirl/img/action/14.png");
$action_field->add_val("0","Quyết tâm","/app_mygirl/img/action/15.png");
$action_field->add_val("0","Đồng ý","/app_mygirl/img/action/16.png");
$action_field->add_val("0","Siêu lòng","/app_mygirl/img/action/17.png");
$action_field->add_val("0","Trình bày","/app_mygirl/img/action/18.png");
$action_field->add_val("0","Sút bóng","/app_mygirl/img/action/19.png");
$action_field->add_val("0","Vĩnh biệt","/app_mygirl/img/action/20.png");
$action_field->add_val("0","Thất thần","/app_mygirl/img/action/21.png");
$action_field->add_val("0","Quỳ xin","/app_mygirl/img/action/22.png");
$action_field->add_val("0","Xấu hổ","/app_mygirl/img/action/23.png");
$action_field->add_val("0","Kêu vang","/app_mygirl/img/action/24.png");
$action_field->add_val("0","làm nũng","/app_mygirl/img/action/25.png");
$action_field->add_val("0","Ngồi xỗm","/app_mygirl/img/action/26.png");
$action_field->add_val("0","Ngồi bệt xuống","/app_mygirl/img/action/27.png");
$action_field->add_val("0","Răng bảo","/app_mygirl/img/action/28.png");
$action_field->add_val("0","Hỏi thưa","/app_mygirl/img/action/29.png");
$action_field->add_val("0","Khép nép","/app_mygirl/img/action/30.png");
$action_field->add_val("0","từ chối","/app_mygirl/img/action/31.png");
$action_field->add_val("0","Say hi","/app_mygirl/img/action/32.png");
$action_field->add_val("0","Khổng lồ","/app_mygirl/img/action/33.png");
$action_field->add_val("0","Diễn dã","/app_mygirl/img/action/34.png");
$action_field->add_val("0","Phòng thủ","/app_mygirl/img/action/35.png");
$action_field->add_val("0","Mời gọi","/app_mygirl/img/action/36.png");
$action_field->add_val("0","Đấu võ","/app_mygirl/img/action/37.png");
$action_field->add_val("0","Thách đấu","/app_mygirl/img/action/38.png");
$action_field->add_val("0","Tấn công","/app_mygirl/img/action/39.png");
$action_field->add_val("0","kheo đít","/app_mygirl/img/action/40.png");

$face_field=$cr_form->get_field_by_id("face");
$face_field->set_title("Cảm xúc khuôn mặt");
$face_field->set_type("select-img");
$face_field->add_val("0","Bình thường","/app_mygirl/img/face/0.png");
$face_field->add_val("1","Xúc động","/app_mygirl/img/face/1.png");
$face_field->add_val("2","Vui vẻ","/app_mygirl/img/face/2.png");
$face_field->add_val("3","Cực vui","/app_mygirl/img/face/3.png");
$face_field->add_val("4","Rất buồn","/app_mygirl/img/face/4.png");
$face_field->add_val("5","Buồn","/app_mygirl/img/face/5.png");
$face_field->add_val("6","U sầu","/app_mygirl/img/face/6.png");
$face_field->add_val("7","Ngạc nhiên","/app_mygirl/img/face/7.png");
$face_field->add_val("8","Tức giận","/app_mygirl/img/face/8.png");
$face_field->add_val("9","Không quan tâm","/app_mygirl/img/face/9.png");
$face_field->add_val("10","Chán","/app_mygirl/img/face/10.png");
$face_field->add_val("11","cực sốc","/app_mygirl/img/face/11.png");
$face_field->add_val("12","Băng khoăng","/app_mygirl/img/face/12.png");
$face_field->add_val("13","Nghi ngờ","/app_mygirl/img/face/13.png");
$face_field->add_val("14","Hoản hốt","/app_mygirl/img/face/14.png");
$face_field->add_val("15","Hoài nghi","/app_mygirl/img/face/15.png");
$face_field->add_val("16","Không tin","/app_mygirl/img/face/16.png");
$face_field->add_val("17","Tự tin","/app_mygirl/img/face/17.png");

$user_create_field=$cr_form->get_field_by_id("user_create");
$user_create_field->set_title("Người tạo");
$user_create_field->set_type("user");
$user_create_field->set_lang($lang_chat);

$user_update_field=$cr_form->get_field_by_id("user_update");
$user_update_field->set_title("Người cập nhật nội dung");
$user_update_field->set_type("user");
$user_update_field->set_lang($lang_chat);

$os_field=$cr_form->get_field_by_id("os");
$os_field->set_title("Nền tảng áp dụng");
$os_field->set_type("radio");
$os_field->add_val("","Hiển thị trên tất cả nền tảng");
$os_field->add_val("android","Không hiển thị trên android");
$os_field->add_val("ios","Không hiển thị trên ios");
$os_field->add_val("window","Không hiển thị trên window");

$cr_form->delete_field_by_id("q1");
$cr_form->delete_field_by_id("q2");
$cr_form->delete_field_by_id("r1");
$cr_form->delete_field_by_id("r2");
$cr_form->delete_field_by_id("ver");

echo $cr_form->show();
?>