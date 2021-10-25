-- Adminer 4.8.1 MySQL 5.7.35 dump

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
(119,	'คนรักเสมือนจริง 3D'),
(135,	'บันทึกเว็บออฟไลน์'),
(104,	'ค้นหาผู้ติดต่อ'),
(128,	'โลกแห่งพระคัมภีร์'),
(282,	'คนรักเสมือนของฉัน'),
(121,	'คนรักเสมือนจริง 2'),
(122,	'การนับแกะ - เข้านอน'),
(132,	'ที่รักของฉัน'),
(138,	'เวทมนตร์จำนวน'),
(133,	'ตาไว'),
(127,	'ผนังจิ๊กซอว์'),
(284,	'ปลาเหยื่อ'),
(139,	'ปริญญาโทหนอน'),
(105,	'รักหรือไม่รัก'),
(134,	'วิ่งไปกับฉัน'),
(120,	'คนรักเสมือนจริง'),
(283,	'Midi Piano Editor'),
(136,	'สร้างรหัสผ่าน'),
(131,	'ผู้ช่วยเสมือนที่น่ารัก'),
(285,	'โต๊ะบอล'),
(123,	'ดนตรีเพื่อชีวิต'),
(130,	'AI Lover');

-- 2021-10-18 22:04:44
