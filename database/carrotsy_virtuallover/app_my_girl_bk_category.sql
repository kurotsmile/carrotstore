-- Adminer 4.8.1 MySQL 5.7.39 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_bk_category`;
CREATE TABLE `app_my_girl_bk_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `app` varchar(1) NOT NULL,
  `no_os` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `app_my_girl_bk_category` (`id`, `name`, `app`, `no_os`) VALUES
(1,	'category_bk_nature',	'0',	''),
(2,	'category_bk_holiday',	'0',	''),
(3,	'category_bk_merry_christmas',	'0',	''),
(4,	'category_bk_city',	'0',	''),
(5,	'category_bk_flower',	'0',	''),
(6,	'category_bk_color',	'0',	''),
(7,	'category_bk_space',	'0',	''),
(8,	'category_bk_love',	'0',	''),
(9,	'category_bk_art',	'0',	''),
(10,	'category_bk_fruits',	'0',	''),
(11,	'category_bk_animale',	'0',	''),
(12,	'category_bk_sport',	'0',	''),
(14,	'category_bk_anime',	'0',	''),
(15,	'Red Velvet',	'0',	'samsung'),
(16,	'Blackpink',	'0',	'samsung'),
(17,	'Momoland',	'0',	'samsung'),
(18,	'BTS',	'0',	'samsung'),
(19,	'EXID',	'0',	'samsung'),
(20,	'TWICE',	'0',	'samsung'),
(21,	'EXO',	'0',	'samsung'),
(22,	'GOT7',	'0',	'samsung'),
(23,	'GFriend',	'0',	'samsung'),
(24,	'Girls Generation',	'0',	'samsung'),
(25,	'Wanna One',	'0',	'samsung'),
(26,	'SHINee',	'0',	'samsung'),
(27,	'Oh My Girl ',	'1',	'');

-- 2022-08-20 02:27:06
