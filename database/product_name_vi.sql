-- Adminer 4.7.7 MySQL dump

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
(104,	'Tìm kiếm danh bạ'),
(105,	'Yêu hay không yêu'),
(119,	'người yêu ảo 3D'),
(120,	'Người yêu ảo'),
(121,	'Người yêu ảo 2'),
(122,	'Đếm cừu - Đi ngủ'),
(123,	'Âm nhạc cho cuộc sống'),
(127,	'Ghép hình thần tượng'),
(128,	'Kinh Thánh Thế Giới'),
(130,	'Người yêu AI'),
(131,	'Trợ lý ảo dễ thương'),
(132,	'Người yêu của tôi'),
(133,	'Nhanh mắt'),
(134,	'Chạy cùng em'),
(135,	'Lưu web ngoại tuyến'),
(149,	'Tây Du kỳ hiệp'),
(139,	'Con sâu háu ăn'),
(138,	'Số ma thuật'),
(136,	'Tạo mật khẩu');

-- 2020-10-05 07:07:07
