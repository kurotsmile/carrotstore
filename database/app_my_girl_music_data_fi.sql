-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_fi`;
CREATE TABLE `app_my_girl_music_data_fi` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_fi`;
INSERT INTO `app_my_girl_music_data_fi` (`device_id`, `value`, `id_chat`) VALUES
('95.217.75.150',	'3',	'148'),
('66.249.90.216',	'3',	'148'),
('114.119.135.35',	'1',	'138'),
('66.249.73.24',	'3',	'125'),
('66.249.73.24',	'1',	'122'),
('66.249.73.23',	'1',	'122'),
('114.119.150.2',	'2',	'122'),
('66.249.73.23',	'1',	'115'),
('66.249.73.24',	'0',	'115'),
('114.119.135.35',	'3',	'122'),
('66.249.79.127',	'0',	'115'),
('66.249.79.127',	'2',	'139'),
('66.249.66.158',	'0',	'115'),
('66.249.73.24',	'2',	'150'),
('114.119.149.83',	'3',	'122');

-- 2020-10-05 08:03:43
