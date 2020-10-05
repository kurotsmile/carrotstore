-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_bk_category`;
CREATE TABLE `app_my_girl_bk_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `app` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_bk_category`;
INSERT INTO `app_my_girl_bk_category` (`id`, `name`, `app`) VALUES
(1,	'category_bk_nature',	'0'),
(2,	'category_bk_holiday',	'0'),
(3,	'category_bk_merry_christmas',	'0'),
(4,	'category_bk_city',	'0'),
(5,	'category_bk_flower',	'0'),
(6,	'category_bk_color',	'0'),
(7,	'category_bk_space',	'0'),
(8,	'category_bk_love',	'0'),
(9,	'category_bk_art',	'0'),
(10,	'category_bk_fruits',	'0'),
(11,	'category_bk_animale',	'0'),
(12,	'category_bk_sport',	'0'),
(14,	'category_bk_anime',	'0'),
(15,	'Red Velvet',	'1'),
(16,	'Blackpink',	'1'),
(17,	'Momoland',	'1'),
(18,	'BTS',	'1'),
(19,	'EXID',	'1'),
(20,	'TWICE',	'1'),
(21,	'EXO',	'1'),
(22,	'GOT7',	'1'),
(23,	'GFriend',	'1'),
(24,	'Girls Generation',	'1'),
(25,	'Wanna One',	'1'),
(26,	'SHINee',	'1');

-- 2020-10-05 06:07:09
