-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `work_code`;
CREATE TABLE `work_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` int(1) NOT NULL,
  `tip` text NOT NULL,
  `return` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `work_code`;
INSERT INTO `work_code` (`id`, `name`, `type`, `tip`, `return`) VALUES
(1,	'get_list_lang()',	0,	'Phương thức lấy các danh sách quốc gia đang hoạt động trả về dạng mảng',	0),
(2,	'msg(thông báo)',	0,	'Đưa ra hộp thoại thông báo với nội dụng msg',	0),
(3,	'cp(id đối tượng)',	0,	'Hiển thị nút sao chép và dang cho đối tượng nhập văn bảng theo id truyền vào',	0),
(4,	'q(Chuỗi truy vấn mysql)',	0,	'Truy vấn nhanh cơ sỡ dữ liệu , hàm này giúp rút gọn quá trình viết mã của lệnh mysqli_query',	0),
(5,	'q_data(Chuỗi truy vấn mysql)',	0,	'Truy vấn nhanh cơ sỡ dữ liệu và trả về mảng dữ liệu , hàm này giúp rút gọn quá trình viết mã của lệnh mysqli_fetch_assoc và mysqli_query',	0),
(6,	'setup_page(tên bảng)',	0,	'Thiết lập phân trang cho bảng dữ liệu',	0),
(9,	'add_css(tên file css)',	0,	'Thêm css cho cms với tham số truyền vào là tên css trong thư mục hiện hành',	0),
(10,	'set_icon(Tên tệp ico)',	0,	'Thiết lập biểu tượng cho cms ,nếu không thiệt lập biểu tượng tệp được thêm mặc định là icon.ico',	0),
(11,	'thumb(url,size)',	0,	'Hiển thị một ảnh thu nhỏ của đường dẫn url, với kích thước size ví dụ 50x50',	0),
(12,	'cur_url',	0,	'Lấy đường dẫn hiện tại',	0),
(13,	'ajax(dữ liều truyền,trả về)',	0,	'Truyển và chuyển dữ liệu vào tệp xử lý ajax.php đối với mỗi cms tương ứng',	0);

-- 2021-08-13 12:31:21
