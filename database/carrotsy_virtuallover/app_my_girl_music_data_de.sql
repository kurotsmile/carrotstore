-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_de`;
CREATE TABLE `app_my_girl_music_data_de` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_de`;
INSERT INTO `app_my_girl_music_data_de` (`device_id`, `value`, `id_chat`) VALUES
('114.119.148.27',	'3',	'857'),
('66.249.73.1',	'2',	'94'),
('91.242.162.68',	'0',	'641');

-- 2021-10-18 21:25:42
