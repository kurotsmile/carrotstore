-- Adminer 4.8.0 MySQL 5.7.33 dump

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
  `menu_top` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `app_my_girl_function`;
INSERT INTO `app_my_girl_function` (`id`, `icon`, `name`, `describe`, `url`, `orders`, `menu_top`) VALUES
(1,	'fa fa-language',	'Dịch thuật',	'Thay đổi ngôn ngữ dịch thứ hai sang nước được chọn',	'app_my_girl_handling.php?func=lang_2',	24,	0),
(2,	'fa fa-cutlery',	'Quản lý các chức năng',	'Thêm mới,xóa hoặc Sắp xếp và quản lý các chức năng của hệ thống',	'app_my_girl_handling.php?func=manager_function',	31,	0),
(3,	'fa fa-archive',	'Lưu trữ',	'Lưu trữ các đối tượng dễ nhớ, thuận tiện cho quá trình cập nhật',	'app_my_girl_storage.php',	16,	0),
(6,	'fa fa-wrench',	'Sửa lỗi thiếu trường âm nhạc',	'Sửa lôi thiếu trường siêu dữ liệu âm nhạc',	'app_my_girl_handling.php?func=delete_field_music_error',	14,	0),
(7,	'fa fa-check-circle-o',	'Kiểm tra tồn tại nhạc',	'Kiểm tra bài hát đã có trong danh sách nhạc của các quốc gia',	'app_my_girl_handling.php?func=check_music&amp;key_word=',	12,	0),
(8,	'fa fa-plug',	'Chạy lệnh Mysql',	'Thực hiện các lệnh thao tác dữ liệu Mysql đối với các quốc gia (tham số quốc gia <strong>{lang}</strong>)',	'app_my_girl_handling.php?func=command_mysql',	18,	0),
(9,	'fa fa-download',	'Sao lưu dữ liệu',	'Thực hiện sao lưu toàn bộ dữ liệu và các đối tượng mysql',	'app_my_girl_handling.php?func=backup',	36,	0),
(10,	'fa fa-exclamation-circle',	'Xem lỗi hệ thống',	'Xem lỗi hệ thống và xóa các dữ liệu ghi lại lỗi',	'app_my_girl_handling.php?func=error',	13,	1),
(11,	'fa fa-universal-access',	'Cảnh báo từ khóa nhạy cảm',	'Chức năng này giúp các biên tập viên lưu trữ các từ khóa nhạy cảm để đánh giá trò chuyện',	'app_my_girl_handling.php?func=keyword_warning',	20,	0),
(12,	'fa fa-file-text',	'Xuất bản các bản nháp',	'Các bản nháp được quản trị viên chuyển giao cho người phát triễn nội dung xuất bản',	'app_my_girl_handling.php?func=draft_brain',	21,	1),
(13,	'fa fa-ban',	'Xóa bản thứ hạng âm nhạc',	'Công cụ xóa các bản thứ hạng âm nhạc ở mỗi quốc gia',	'app_my_girl_handling.php?func=delete_rank_music',	15,	0),
(14,	'fa fa-music',	'Thêm các từ khóa âm nhạc đã duyệt',	'Công cụ để biên tập viên đánh dấu từ khóa âm nhạc đã duyệt, để tránh thêm các bài hát đã có',	'app_my_girl_handling.php?func=remove_key_music',	22,	0),
(15,	'fa fa-user-md',	'Sửa sai tên người dùng',	'Tìm những người dùng sai tên và sửa lại tên của họ',	'app_my_girl_handling.php?func=fix_name_user',	23,	0),
(16,	'fa fa-user-times',	'Xóa tất cả các người dùng hết hạn',	'Công cụ kiểm tran thông tin người dùng và xóa các tài khoản hết hạn',	'app_my_girl_handling.php?func=delete_user_expired',	25,	0),
(17,	'fa fa-calendar',	'Quản lý sự kiện',	'Kích hoạt các sự kiện theo thời gian',	'app_my_girl_handling.php?func=event_management',	26,	0),
(18,	'fa fa-columns',	'Màu sắc phân biệt',	'Bật tắt các chức năng màu gây khó chịu cho những người thiết kế nội dung ứng dụng',	'app_my_girl_handling.php?func=off_color',	27,	0),
(19,	'fa fa-bath',	'Dọn rác',	'Giải phóng các tập tin rác, giải phóng bộ nhớ cho hệ thống',	'app_my_girl_handling.php?func=clear_the_trash',	0,	1),
(20,	'fa fa-file-archive-o',	'Sao lưu code',	'Sao lưu tất cả các nội dung code dưới dạng zip',	'app_my_girl_handling.php?func=zip_code',	28,	0),
(21,	'fa fa-headphones',	'Tạo và ghép âm thanh',	'Công cụ tạo và ghép tệp âm thanh lại với nhau hỗ trợ cho những đoạn nội dung quá dài không thể tạo ra âm thanh!',	'app_my_girl_handling.php?func=create_audio',	29,	0),
(22,	'fa fa-fax',	'Trả lời trò chuyện của người dùng',	'Công cụ giúp biên tập viên xem lịch sử trò chuyện và trả lời những câu hỏi của người dùng',	'app_my_girl_mission.php',	30,	0),
(23,	'fa fa-connectdevelop',	'Quản lý quốc gia làm việc',	'Giới hạng hiển thị các quốc gia làm việc ở màn hình chính',	'app_my_girl_handling.php?func=manager_country_work',	19,	0),
(24,	'fa fa-database',	'Dung lượng',	'Xem thông tin về dung lượng máy chủ và tình trạng ổ đĩa',	'app_my_girl_handling.php?func=disk_capacity',	32,	0),
(25,	'fa fa-file-image-o',	'Tối ưu ảnh đại diện của người dùng',	'Giảm kích thước và dung lượng ảnh đại diện của người dùng',	'app_my_girl_handling.php?func=avatar_user_resize',	33,	0),
(26,	'fa fa-search-plus',	'Tối ưu SEO',	'Công cụ tạo Site Map để tăng tỉ lệ tìm kiếm trên google cho các đối tượng của hệ thống',	'app_my_girl_handling.php?func=seo',	34,	0),
(27,	'fa fa-braille',	'Sửa lỗi lời nhạc',	'Thay thế các ký tự đặc biệt trong các lời bài hát để khắc phục lỗi seo trong một số bài hát',	'app_my_girl_handling.php?func=fix_lyrics',	35,	0),
(28,	'fa fa-university',	'Quang cảnh 3D',	'Quản lý cả quảng các 3d (view) trong các ứng dụng virtual dạng 3d',	'app_my_girl_view_3d.php',	37,	0),
(29,	'fa fa-cart-plus',	'Trang phục',	'Quản lý các trang phục trong virtual mini onichan',	'app_my_girl_skin.php',	38,	0),
(30,	'fa fa-shopping-bag',	'Đầu tóc',	'Quản lý các kiểu tóc cho các nhân vật Virtual lover Onichan (mini)',	'app_my_girl_head.php',	39,	0),
(31,	'fa fa-globe',	'Phiên bản và quốc gia',	'Kích hoặt các quốc gia triển khai các phiên bản',	'app_my_girl_manager_country.php',	11,	0),
(32,	'fa fa-delicious',	'Giám sát Cpu và Ram',	'Xem các thông số hiệu năng của Cpu , ram và các thông số khác của hệ thống đề phòng tình trạng quá tải',	'app_my_girl_handling.php?func=sys',	17,	0),
(33,	'fa fa-tree',	'Sơ đồ quan hệ',	'Xem dễ dàng hơn các mối quan hệ câu trò chuyện',	'app_my_girl_handling.php?func=tree_chat',	40,	0),
(34,	'fa fa-table',	'Cơ sở dữ liệu',	'Hệ quản trị cơ sỡ dữ liệu của hệ thống',	'adminer.php',	41,	0),
(35,	'fa  fa-youtube-square',	'Tải ảnh đại điện từ Youtube Music',	'khiểm tra và tải ảnh còn thiếu đối với mỗi bài hát',	'app_my_girl_handling.php?func=download_thumb_ytb',	42,	0),
(36,	'fa fa-user',	'Theo dõi người dùng',	'Theo dõi lịch sử trò chuyện của người dùng',	'app_my_girl_history.php',	43,	0),
(37,	'fa fa-commenting-o',	'Câu thoại (msg)',	'Quản lý tất cả các câu thoại, và các thông báo chức năng',	'app_my_girl_msg.php',	44,	0),
(38,	'fa fa-comments',	'Quản lý Trò chuyện (Chat)',	'Quản lý tất cả các câu trò chuyện, và câu lệnh của ứng dụng',	'app_my_girl_chat.php',	1,	1),
(39,	'fa fa-gratipay',	'Hiệu ứng trò chuyện',	'Các biểu tượng , tượng trưng cho nội dung câu trò chuyện',	'app_my_girl_effect.php',	2,	0),
(40,	'fa fa-picture-o',	'Ảnh nền',	'Ảnh nền ứng dụng và thư viện ảnh',	'app_my_girl_background.php',	3,	0),
(41,	'fa fa-bandcamp syn app_my_girl_ads',	'Quảng cáo',	'Tất cả quản cáo có trong ứng dụng',	'app_my_girl_ads.php',	4,	0),
(42,	'fa fa-heart',	'Nhân vật 2D',	'Quản lý các nhân vật 2D có trong ứng dụng Virtual lover phiên bản 2d',	'app_my_girl_preson.php',	5,	0),
(43,	'fa fa-th-list',	'Chủ đề nhân vật',	'Quảng lý Chủ đề nhân vật',	'app_my_girl_preson_category.php',	6,	0),
(44,	'fa fa-eercast',	'Tạo quốc gia mới',	'Thêm mới quốc gia vào hệ thống',	'app_my_girl_create_country.php',	7,	0),
(45,	'fa fa-tag',	'Trường dữ liệu ngôn ngữ',	'Các từ khóa ngôn ngữ của ứng dụng',	'app_my_girl_display_lang.php',	8,	0),
(46,	'fa fa-superpowers',	'Từ khóa ngôn ngữ CMS',	'Quản lý các từ khóa ngôn ngữ trong CMS',	'app_my_girl_key_lang.php',	9,	0),
(47,	'fa fa-gg',	'Ngôn ngữ dao diện ứng dụng',	'Liệt kê  tất cả các ngôn ngữ giao diện ứng dụng ',	'app_my_girl_display_value.php',	10,	0),
(48,	'fa fa-gavel',	'Công cụ',	'Hiển thị các chức năng có trong hệ thống',	'app_my_girl_tool.php',	45,	1);

-- 2021-04-08 08:49:48
