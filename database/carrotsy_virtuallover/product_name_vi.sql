-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_vi`;
CREATE TABLE `product_name_vi` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_vi`;
INSERT INTO `product_name_vi` (`id_product`, `data`) VALUES
(95,	'Sổ tay tử thần - Ryuk và Rem'),
(95,	'Sổ tay tử thần - Ryuk và Rem'),
(149,	'Tây Du kỳ hiệp'),
(119,	'người yêu ảo 3D'),
(135,	'Lưu web ngoại tuyến'),
(104,	'Tìm kiếm danh bạ'),
(128,	'Kinh Thánh Thế Giới'),
(282,	'Người yêu ảo Pro'),
(121,	'Người yêu ảo 2'),
(122,	'Đếm cừu - Đi ngủ'),
(132,	'Người yêu của tôi'),
(130,	'Người yêu AI'),
(138,	'Số ma thuật'),
(133,	'Nhanh mắt'),
(127,	'Ghép hình thần tượng'),
(284,	'Cá săn mồi'),
(139,	'Con sâu háu ăn'),
(105,	'Yêu hay không yêu'),
(134,	'Chạy cùng em'),
(123,	'Âm nhạc cho cuộc sống'),
(120,	'Người yêu ảo'),
(283,	'Trình soạn thảo piano Midi'),
(136,	'Tạo mật khẩu'),
(131,	'Trợ lý ảo dễ thương'),
(285,	'Đá Ra Tông (Bi lắc)'),
(287,	'Chiến Binh Đền Thờ'),
(286,	'Cô đơn để trưởng thành');

-- 2021-10-06 08:14:30
