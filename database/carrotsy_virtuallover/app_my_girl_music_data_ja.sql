-- Adminer 4.8.1 MySQL 5.7.34 dump

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
('106.128.188.175',	'3',	'944');

-- 2021-06-12 16:24:35
