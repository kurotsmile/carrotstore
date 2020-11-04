-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_tr`;
CREATE TABLE `app_my_girl_music_data_tr` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_tr`;
INSERT INTO `app_my_girl_music_data_tr` (`device_id`, `value`, `id_chat`) VALUES
('114.119.150.57',	'0',	'587'),
('114.119.132.65',	'1',	'120'),
('d2d3e81f08fa32fa2c60475d0458e310',	'0',	'1004'),
('114.119.150.2',	'0',	'115');

-- 2020-10-25 11:59:16
