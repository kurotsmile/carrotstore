-- Adminer 4.8.0 MySQL 5.7.33 dump

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
('66.249.73.23',	'2',	'486'),
('66.249.73.23',	'1',	'362'),
('66.249.73.24',	'2',	'477'),
('66.249.73.23',	'3',	'681'),
('66.249.73.24',	'3',	'532'),
('66.249.73.26',	'0',	'362'),
('66.249.64.13',	'0',	'492'),
('66.249.64.143',	'2',	'485');

-- 2021-03-10 08:15:25
