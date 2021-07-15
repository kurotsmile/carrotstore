-- Adminer 4.8.1 MySQL 5.5.5-10.4.17-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_skin`;
CREATE TABLE `app_my_girl_skin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `price` varchar(5) NOT NULL,
  `id_store` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `app_my_girl_skin`;
INSERT INTO `app_my_girl_skin` (`id`, `name`, `price`, `id_store`, `type`) VALUES
(1,	'skin 1',	'0',	'com.product1.thanh',	'unitychan_girl'),
(2,	'skin 2',	'0',	'com.product1.thanh',	'unitychan_girl'),
(3,	'skin 3',	'0',	'com.product1.thanh',	'unitychan_girl'),
(4,	'skin 4',	'0',	'com.product1.thanh',	'unitychan_girl'),
(5,	'Rain',	'0',	'com.product1.thanh',	'unitychan_girl'),
(6,	'skin 6',	'0',	'com.product1.thanh',	'unitychan_girl'),
(7,	'noel',	'0',	'com.product1.bk1',	'unitychan_girl'),
(8,	'Princess',	'0',	'com.product1.thanh',	'unitychan_girl'),
(9,	'cuite',	'0',	'com.product1.thanh',	'unitychan_girl'),
(10,	'summer',	'0',	'com.product1.bk1',	'unitychan_girl'),
(11,	'Rainbow',	'1',	'com.product1.bk1',	'unitychan_girl'),
(12,	'Fumiko dress',	'0',	'',	'fumiko_dress'),
(13,	'Fumiko dress',	'0',	'',	'fumiko_dress'),
(14,	'Fumiko dress',	'0',	'',	'fumiko_dress'),
(15,	'Kero',	'0',	'',	'kero'),
(16,	'Kero',	'0',	'',	'kero'),
(17,	'Kero',	'0',	'',	'kero'),
(18,	'Kero',	'0',	'',	'kero'),
(19,	'Pajama 2',	'0',	'',	'pajama'),
(20,	'Pajama',	'0',	'',	'pajama'),
(21,	'Pajama 3',	'0',	'',	'pajama'),
(22,	'School',	'0',	'',	'school'),
(23,	'School',	'0',	'',	'school'),
(24,	'Elderly suit',	'0',	'',	'yuji'),
(25,	'Yuji 2',	'0',	'',	'yuji'),
(26,	'Rin 1',	'0',	'',	'rin'),
(27,	'Rin 2',	'0',	'',	'rin'),
(28,	'Rin 2',	'0',	'',	'rin'),
(29,	'Bikini1',	'0',	'',	'bikini'),
(30,	'Bikini2',	'0',	'',	'bikini'),
(31,	'Bikini2',	'0',	'',	'bikini'),
(34,	'Bikini boy',	'0',	'',	'bikini_boy'),
(35,	'Bikini boy',	'0',	'',	'bikini_boy'),
(36,	'Bikini boy',	'0',	'',	'bikini_boy'),
(37,	'Boy school',	'0',	'',	'boy_school'),
(38,	'Boy school',	'0',	'',	'boy_school'),
(39,	'kaoru 1',	'0',	'',	'kaoru'),
(40,	'kaoru 2',	'0',	'',	'kaoru');

-- 2021-05-23 11:50:12
