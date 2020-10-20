-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_ru`;
CREATE TABLE `app_my_girl_music_data_ru` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_ru`;
INSERT INTO `app_my_girl_music_data_ru` (`device_id`, `value`, `id_chat`) VALUES
('192.162.115.49',	'2',	'5401'),
('209.85.238.15',	'2',	'5401');

-- 2020-10-18 15:02:56
