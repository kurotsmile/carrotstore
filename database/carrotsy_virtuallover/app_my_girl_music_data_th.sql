-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_th`;
CREATE TABLE `app_my_girl_music_data_th` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_th`;
INSERT INTO `app_my_girl_music_data_th` (`device_id`, `value`, `id_chat`) VALUES
('66.249.73.31',	'0',	'735'),
('66.249.73.31',	'3',	'481'),
('66.249.73.1',	'2',	'268'),
('114.119.149.116',	'3',	'455'),
('66.249.73.158',	'2',	'736'),
('66.249.73.133',	'0',	'717');

-- 2021-10-18 21:03:13
