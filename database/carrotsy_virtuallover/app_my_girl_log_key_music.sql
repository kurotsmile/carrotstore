-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_log_key_music`;
CREATE TABLE `app_my_girl_log_key_music` (
  `key` text NOT NULL,
  `lang` varchar(2) NOT NULL,
  `type` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_log_key_music`;
INSERT INTO `app_my_girl_log_key_music` (`key`, `lang`, `type`) VALUES
('2+3=',	'vi',	'1'),
('2+3=',	'vi',	'1'),
('bbi ơi ?',	'vi',	'1'),
('nobody',	'en',	'0'),
('neffex',	'en',	'0'),
('neffex',	'en',	'0'),
('bertocci',	'it',	'2'),
('bertocci',	'it',	'2'),
('初音未来',	'ja',	'初'),
('初音',	'ja',	'初'),
('初音',	'ja',	'初'),
('初音',	'ja',	'初'),
('初音',	'ja',	'初'),
('初音',	'ja',	'初'),
('花',	'ja',	'花'),
('花泽',	'ja',	'花'),
('花泽',	'ja',	'花'),
('钉宫理惠',	'ja',	'钉'),
('钉宫',	'ja',	'钉'),
('neffex',	'en',	'0'),
('neffex',	'en',	'0'),
('neffex',	'en',	'0'),
('唱一首歌清空',	'zh',	'0'),
('唱一首歌清空',	'zh',	'0'),
('唱一首歌清空',	'zh',	'0'),
('唱一首歌清空',	'zh',	'0'),
('唱一首歌清空',	'zh',	'0'),
('Tshirt',	'en',	'2'),
('Tshirt',	'en',	'2'),
('Carrot shirt',	'en',	'2'),
('Carrot shirt',	'en',	'2'),
('Shirt',	'en',	'2'),
('Shirt',	'en',	'2');

-- 2021-08-17 16:11:59
