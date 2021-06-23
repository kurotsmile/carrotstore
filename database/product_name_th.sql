-- Adminer 4.8.1 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_th`;
CREATE TABLE `product_name_th` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_th`;
INSERT INTO `product_name_th` (`id_product`, `data`) VALUES
(95,	'เด ธ โน้ต - ริวกและเรม'),
(95,	'เด ธ โน้ต - ริวกและเรม'),
(138,	'เวทมนตร์จำนวน'),
(282,	'คนรักเสมือนของฉัน'),
(127,	'ผนังจิ๊กซอว์'),
(130,	'AI Lover'),
(132,	'ที่รักของฉัน'),
(123,	'ดนตรีเพื่อชีวิต'),
(104,	'ค้นหาผู้ติดต่อ'),
(120,	'คนรักเสมือนจริง'),
(119,	'คนรักเสมือนจริง 3D'),
(134,	'วิ่งไปกับฉัน'),
(122,	'การนับแกะ - เข้านอน'),
(133,	'ตาไว'),
(131,	'ผู้ช่วยเสมือนที่น่ารัก'),
(139,	'ปริญญาโทหนอน'),
(135,	'บันทึกเว็บออฟไลน์'),
(136,	'สร้างรหัสผ่าน'),
(128,	'โลกแห่งพระคัมภีร์'),
(283,	'Midi Piano Editor'),
(284,	'ปลาเหยื่อ'),
(121,	'คนรักเสมือนจริง 2'),
(105,	'รักหรือไม่รัก');

-- 2021-06-12 17:29:31
