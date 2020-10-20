-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_zh`;
CREATE TABLE `app_my_girl_music_data_zh` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_zh`;
INSERT INTO `app_my_girl_music_data_zh` (`device_id`, `value`, `id_chat`) VALUES
('66.249.73.147',	'2',	'3947'),
('114.119.149.83',	'2',	'4575');

-- 2020-10-18 13:54:24
