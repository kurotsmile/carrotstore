-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_es`;
CREATE TABLE `app_my_girl_music_data_es` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_es`;
INSERT INTO `app_my_girl_music_data_es` (`device_id`, `value`, `id_chat`) VALUES
('114.119.135.253',	'3',	'49950'),
('114.119.157.51',	'0',	'51954');

-- 2020-10-18 12:52:01
