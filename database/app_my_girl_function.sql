-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `app_my_girl_function`;
CREATE TABLE `app_my_girl_function` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `describe` text NOT NULL,
  `url` text NOT NULL,
  `orders` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `app_my_girl_function`;
INSERT INTO `app_my_girl_function` (`id`, `icon`, `name`, `describe`, `url`, `orders`) VALUES
(1,	'fa fa-language',	'Dịch thuật',	'Thay đổi ngôn ngữ dịch thứ hai sang nước được chọn',	'app_my_girl_handling.php?func=lang_2',	13),
(2,	'fa fa-cutlery',	'Quản lý các chức năng',	'Thêm mới,xóa hoặc Sắp xếp và quản lý các chức năng của hệ thống',	'app_my_girl_handling.php?func=manager_function',	28),
(3,	'fa fa-archive',	'Lưu trữ',	'Lưu trữ các đối tượng dễ nhớ, thuận tiện cho quá trình cập nhật',	'app_my_girl_storage.php',	6),
(6,	'fa fa-wrench',	'Sửa lỗi thiếu trường âm nhạc',	'Sửa lôi thiếu trường siêu dữ liệu âm nhạc',	'app_my_girl_handling.php?func=delete_field_music_error',	4),
(7,	'fa fa-check-circle-o',	'Kiểm tra tồn tại nhạc',	'Kiểm tra bài hát đã có trong danh sách nhạc của các quốc gia',	'app_my_girl_handling.php?func=check_music&amp;key_word=',	2),
(8,	'fa fa-plug',	'Chạy lệnh Mysql',	'Thực hiện các lệnh thao tác dữ liệu Mysql đối với các quốc gia (tham số quốc gia <strong>{lang}</strong>)',	'app_my_girl_handling.php?func=command_mysql',	7),
(9,	'fa fa-download',	'Sao lưu dữ liệu',	'Thực hiện sao lưu toàn bộ dữ liệu và các đối tượng mysql',	'app_my_girl_handling.php?func=backup',	24),
(10,	'fa fa-exclamation-circle',	'Xem lỗi hệ thống',	'Xem lỗi hệ thống và xóa các dữ liệu ghi lại lỗi',	'app_my_girl_handling.php?func=error',	3),
(11,	'fa fa-universal-access',	'Cảnh báo từ khóa nhạy cảm',	'Chức năng này giúp các biên tập viên lưu trữ các từ khóa nhạy cảm để đánh giá trò chuyện',	'app_my_girl_handling.php?func=keyword_warning',	9),
(12,	'fa fa-file-text',	'Xuất bản các bản nháp',	'Các bản nháp được quản trị viên chuyển giao cho người phát triễn nội dung xuất bản',	'app_my_girl_handling.php?func=draft_brain',	10),
(13,	'fa fa-ban',	'Xóa bản thứ hạng âm nhạc',	'Công cụ xóa các bản thứ hạng âm nhạc ở mỗi quốc gia',	'app_my_girl_handling.php?func=delete_rank_music',	5),
(14,	'fa fa-music',	'Thêm các từ khóa âm nhạc đã duyệt',	'Công cụ để biên tập viên đánh dấu từ khóa âm nhạc đã duyệt, để tránh thêm các bài hát đã có',	'app_my_girl_handling.php?func=remove_key_music',	11),
(15,	'fa fa-user-md',	'Sửa sai tên người dùng',	'Tìm những người dùng sai tên và sửa lại tên của họ',	'app_my_girl_handling.php?func=fix_name_user',	12),
(16,	'fa fa-user-times',	'Xóa tất cả các người dùng hết hạn',	'Công cụ kiểm tran thông tin người dùng và xóa các tài khoản hết hạn',	'app_my_girl_handling.php?func=delete_user_expired',	14),
(17,	'fa fa-calendar',	'Quản lý sự kiện',	'Kích hoạt các sự kiện theo thời gian',	'app_my_girl_handling.php?func=event_management',	15),
(18,	'fa fa-columns',	'Màu sắc phân biệt',	'Bật tắt các chức năng màu gây khó chịu cho những người thiết kế nội dung ứng dụng',	'app_my_girl_handling.php?func=off_color',	16),
(19,	'fa fa-bath',	'Dọn rác',	'Giải phóng các tập tin rác, giải phóng bộ nhớ cho hệ thống',	'app_my_girl_handling.php?func=clear_the_trash',	0),
(20,	'fa fa-file-archive-o',	'Sao lưu code',	'Sao lưu tất cả các nội dung code dưới dạng zip',	'app_my_girl_handling.php?func=zip_code',	17),
(21,	'fa fa-headphones',	'Tạo và ghép âm thanh',	'Công cụ tạo và ghép tệp âm thanh lại với nhau hỗ trợ cho những đoạn nội dung quá dài không thể tạo ra âm thanh!',	'app_my_girl_handling.php?func=create_audio',	18),
(22,	'fa fa-comments',	'Trả lời trò chuyện của người dùng',	'Công cụ giúp biên tập viên xem lịch sử trò chuyện và trả lời những câu hỏi của người dùng',	'app_my_girl_mission.php',	19),
(23,	'fa fa-connectdevelop',	'Quản lý quốc gia làm việc',	'Giới hạng hiển thị các quốc gia làm việc ở màn hình chính',	'app_my_girl_handling.php?func=manager_country_work',	8),
(24,	'fa fa-database',	'Dung lượng',	'Xem thông tin về dung lượng máy chủ và tình trạng ổ đĩa',	'app_my_girl_handling.php?func=disk_capacity',	20),
(25,	'fa fa-file-image-o',	'Tối ưu ảnh đại diện của người dùng',	'Giảm kích thước và dung lượng ảnh đại diện của người dùng',	'app_my_girl_handling.php?func=avatar_user_resize',	21),
(26,	'fa fa-search-plus',	'Tối ưu SEO',	'Công cụ tạo Site Map để tăng tỉ lệ tìm kiếm trên google cho các đối tượng của hệ thống',	'app_my_girl_handling.php?func=seo',	22),
(27,	'fa fa-braille',	'Sửa lỗi lời nhạc',	'Thay thế các ký tự đặc biệt trong các lời bài hát để khắc phục lỗi seo trong một số bài hát',	'app_my_girl_handling.php?func=fix_lyrics',	23),
(28,	'fa fa-university',	'Quang cảnh 3D',	'Quản lý cả quảng các 3d (view) trong các ứng dụng virtual dạng 3d',	'app_my_girl_view_3d.php',	25),
(29,	'fa fa-cart-plus',	'Trang phục',	'Quản lý các trang phục trong virtual mini onichan',	'app_my_girl_skin.php',	26),
(30,	'fa fa-shopping-bag',	'Đầu tóc',	'Quản lý các kiểu tóc cho các nhân vật Virtual lover Onichan (mini)',	'app_my_girl_head.php',	27),
(31,	'fa fa-globe',	'Phiên bản và quốc gia',	'Kích hoặt các quốc gia triển khai các phiên bản',	'app_my_girl_manager_country.php',	1);

-- 2020-12-01 10:16:20
