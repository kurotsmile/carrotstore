-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_it`;
CREATE TABLE `app_my_girl_music_data_it` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_it`;
INSERT INTO `app_my_girl_music_data_it` (`device_id`, `value`, `id_chat`) VALUES
('114.119.128.236',	'0',	'13'),
('66.249.73.23',	'1',	'9'),
('66.249.73.23',	'1',	'24'),
('66.249.73.29',	'3',	'36'),
('66.249.73.23',	'1',	'18'),
('114.119.135.253',	'3',	'7'),
('66.249.73.23',	'2',	'8'),
('114.119.150.2',	'2',	'19'),
('66.249.79.127',	'0',	'23'),
('66.249.66.158',	'2',	'8'),
('114.119.152.86',	'0',	'13');

-- 2020-10-05 08:06:59
