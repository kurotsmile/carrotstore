-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_ja`;
CREATE TABLE `app_my_girl_music_data_ja` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_ja`;
INSERT INTO `app_my_girl_music_data_ja` (`device_id`, `value`, `id_chat`) VALUES
('119.174.222.191',	'3',	'944'),
('134.35.227.1',	'3',	'328'),
('209.85.238.17',	'3',	'328'),
('114.119.150.2',	'0',	'335'),
('114.119.128.236',	'3',	'638'),
('3b32e213ce29fa155bf15dd0b04592b9',	'0',	'1224'),
('114.119.135.35',	'0',	'335'),
('114.119.146.126',	'2',	'279'),
('59.139.254.76',	'3',	'944'),
('209.85.238.19',	'3',	'944');

-- 2020-10-19 02:35:46
