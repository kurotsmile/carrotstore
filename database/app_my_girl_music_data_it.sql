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
('114.119.134.110',	'3',	'11'),
('114.119.157.51',	'0',	'13'),
('114.119.149.83',	'0',	'13'),
('95.250.240.70',	'0',	'19');

-- 2020-10-25 12:13:07
