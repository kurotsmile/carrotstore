<?php
include "app_my_girl_template.php";
?>
<div class="body">
    <h3>công cụ</h3>
    <i>Các công cụ  hỗ trợ chức năng nân cao của hệ thống</i>
    <ul>
        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=lang_2">
            <li class="box_tool">
                <i class="fa fa-language"aria-hidden="true"></i>
                <b>Dịch thuật</b><br />
                Thay đổi ngôn ngữ dịch thứ hai sang nước (<?php echo $lang_2;?>)
            </li>
        </a>

        <a href="<?php echo $url; ?>/app_my_girl_storage.php">
            <li class="box_tool">
                <i class="fa fa-archive" aria-hidden="true"></i>
                <b>Lưu trữ</b><br />
                Lưu trữ các đối tượng dễ nhớ, thuận tiện cho quá trình cập nhật
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=delete_field_music_error">
            <li class="box_tool">
                <i class="fa fa-wrench" aria-hidden="true" ></i>
                <b>Sửa lỗi thiếu trường âm nhạc</b><br />
                Sửa lôi thiếu trường siêu dữ liệu âm nhạc
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=check_music&key_word=">
            <li class="box_tool">
                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                <b>Kiểm tra tồn tại nhạc</b><br />
                Kiểm tra bài hát đã có trong danh sách nhạc của các quốc gia
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=command_mysql">
            <li class="box_tool">
                <i class="fa fa-plug" aria-hidden="true"></i>
                <b>Chạy lệnh Mysql</b><br />
                Thực hiện các lệnh thao tác dữ liệu Mysql đối với các quốc gia (tham số quốc gia <strong>{lang}</strong>)
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=backup">
            <li class="box_tool">
                <i class="fa fa-download" aria-hidden="true"></i>
                <b>Sao lưu dữ liệu</b><br />
                Thự hiện sao lưu toàn bộ dữ liệu và các đối tượng mysql
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=error">
            <li class="box_tool">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                <b>Xem lỗi hệ thống</b><br />
                Xem lỗi hệ thống và xóa các dữ liệu ghi lại lỗi
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning">
            <li class="box_tool">
                <i class="fa fa-universal-access" aria-hidden="true"></i>
                <b>Cảnh báo từ khóa nhạy cảm</b><br />
                Chức năng này giúp các biên tập viên lưu trữ các từ khóa nhạy cảm để đánh giá trò chuyện
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=draft_brain">
            <li class="box_tool">
                <i class="fa fa-file-text" aria-hidden="true"></i>
                <b>Xuất bản các bản nháp</b><br />
                Các bản nháp được quản trị viên chuyển giao cho người phát triễn nội dung xuất bản
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=event_management">
            <li class="box_tool">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <b>Quản lý sự kiện</b><br />
                Kích hoạt các sự kiện theo thời gian
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=off_color">
            <li class="box_tool">
                <i class="fa fa-columns" aria-hidden="true"></i>
                <b>Màu sắt (<?php if(isset($_SESSION['off_color'])){ echo 'Đang tắt'; }else{ echo 'Đang bật'; } ?>)</b><br />
                Bật tắt các chức năng màu gây khó chịu cho những người thiết kế nội dung ứng dụng
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=clear_the_trash">
            <li class="box_tool">
                <i class="fa fa-bath" aria-hidden="true"></i>
                <b>Dọn rác</b><br />
                Giải phóng các tập tin rác, giải phóng bộ nhớ cho hệ thống
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=zip_code">
            <li class="box_tool">
                <i class="fa fa-file-archive-o" aria-hidden="true"></i>
                <b>Sao lưu code</b><br />
                Sao lưu tất cả các nội dung code dưới dạng zip
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=create_audio">
            <li class="box_tool">
                <i class="fa fa-headphones"  aria-hidden="true"></i>
                <b>Tạo và ghép âm thanh</b><br />
                Công cụ tạo và ghép tệp âm thanh lại với nhau hỗ trợ cho những đoạn nội dung quá dài không thể tạo ra âm thanh!
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_mission.php">
            <li class="box_tool">
                <i class="fa fa-comments" aria-hidden="true"></i>
                <b>Trả lời trò chuyện của người dùng</b><br />
                Công cụ giúp biên tập viên xem lịch sử trò chuyện và trả lời những câu hỏi của người dùng
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=manager_country_work">
            <li class="box_tool">
                <i class="fa fa-connectdevelop" aria-hidden="true"></i>
                <b>Quản lý quốc gia làm việc</b><br />
                Giới hạng hiển thị các quốc gia làm việc ở màn hình chính
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=disk_capacity">
            <li class="box_tool">
                <i class="fa fa-database" aria-hidden="true"></i>
                <b>Dung lượng</b><br />
                Xem thông tin về dung lượng máy chủ và tình trạng ổ đĩa
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=avatar_user_resize">
            <li class="box_tool">
                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                <b>Tối ưu ảnh đại diện của người dùng</b><br />
                Giảm kích thước và dung lượng ảnh đại diện của người dùng
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=seo">
            <li class="box_tool">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <b>Tối ưu SEO</b><br />
                Công cụ tạo Site Map để tăng tỉ lệ tìm kiếm trên google cho các đối tượng của hệ thống
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=fix_lyrics">
            <li class="box_tool">
                <i class="fa fa-braille" aria-hidden="true"></i>
                <b>Sửa lỗi lời nhạc</b><br />
                Thay thế các ký tự đặc biệt trong các lời bài hát để khắc phục lỗi seo trong một số bài hát
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_view_3d.php">
            <li class="box_tool">
                <i class="fa fa-university" aria-hidden="true"></i>
                <b>Quang cảnh 3D</b><br />
                Quản lý cả quảng các 3d (view) trong các ứng dụng virtual dạng 3d
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_skin.php">
            <li class="box_tool">
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                <b> Trang phục</b><br />
                Quản lý các trang phục trong virtual mini onichan
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_head.php">
            <li class="box_tool">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                <b> Đầu tóc</b><br />
                Quản lý các kiểu tóc cho các nhân vật Virtual lover Onichan (mini)
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=delete_user_expired">
            <li class="box_tool">
                <i class="fa fa-user-times" aria-hidden="true"></i>
                <b>Xóa tất cả các người dùng hết hạn</b><br />
                Công cụ kiểm tran thông tin người dùng và xóa các tài khoản hết hạn
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=fix_name_user">
            <li class="box_tool">
                <i class="fa fa-user-md" aria-hidden="true"></i>
                <b>Sửa sai tên người dùng</b><br />
                Tìm những người dùng sai tên và sửa lại tên của họ
            </li>
        </a>

        <a href="<?php echo $url;?>/app_my_girl_handling.php?func=remove_key_music">
            <li class="box_tool">
                <i class="fa fa-music" syn="app_my_girl_remove_key_music" aria-hidden="true"><span class="syn app_my_girl_remove_key_music" syn="app_my_girl_remove_key_music"></span></i>
                <b>Thêm các từ khóa âm nhạc đã duyệt</b><br />
                Công cụ để biên tập viên đánh dấu từ khóa âm nhạc đã duyệt, để tránh thêm các bài hát đã có
            </li>
        </a>

    </ul>
</div>