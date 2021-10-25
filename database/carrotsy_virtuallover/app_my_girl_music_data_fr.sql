-- Adminer 4.8.1 MySQL 5.7.35 dump

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
('77.194.31.137',	'1',	'821'),
('114.119.149.131',	'2',	'1373'),
('66.249.73.31',	'2',	'54'),
('91.242.162.68',	'0',	'273'),
('91.242.162.68',	'3',	'1200'),
('91.242.162.68',	'0',	'1421'),
('91.242.162.68',	'1',	'1422'),
('91.242.162.68',	'0',	'271'),
('91.242.162.68',	'3',	'822'),
('91.242.162.68',	'3',	'848'),
('91.242.162.68',	'3',	'820'),
('91.242.162.68',	'0',	'52'),
('91.242.162.68',	'3',	'833'),
('91.242.162.68',	'0',	'1062'),
('91.242.162.68',	'2',	'826'),
('91.242.162.68',	'3',	'853'),
('91.242.162.68',	'3',	'1379'),
('91.242.162.68',	'3',	'1061'),
('91.242.162.68',	'2',	'846'),
('91.242.162.68',	'2',	'62'),
('91.242.162.68',	'3',	'270'),
('91.242.162.68',	'2',	'48'),
('91.242.162.68',	'2',	'819');

-- 2021-10-18 21:26:02
