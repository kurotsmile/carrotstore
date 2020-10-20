-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_fr`;
CREATE TABLE `app_my_girl_music_data_fr` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_fr`;
INSERT INTO `app_my_girl_music_data_fr` (`device_id`, `value`, `id_chat`) VALUES
('114.119.135.253',	'1',	'853'),
('114.119.150.57',	'0',	'274');

-- 2020-10-18 13:28:50
