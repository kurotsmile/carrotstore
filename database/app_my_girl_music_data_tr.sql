-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_tr`;
CREATE TABLE `app_my_girl_music_data_tr` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_tr`;
INSERT INTO `app_my_girl_music_data_tr` (`device_id`, `value`, `id_chat`) VALUES
('95.217.75.150',	'3',	'114'),
('66.249.90.216',	'3',	'114'),
('66.249.90.215',	'2',	'114'),
('178.147.49.85',	'2',	'117'),
('66.249.90.215',	'2',	'117'),
('38df9532dd29aafcbd8356c3be5c0273',	'0',	'1115'),
('66.249.73.24',	'0',	'588'),
('88.234.27.11',	'3',	'242'),
('91.251.112.207',	'0',	'243'),
('66.249.90.215',	'0',	'243'),
('66.249.73.29',	'2',	'7'),
('66.249.73.25',	'3',	'125'),
('66.249.73.23',	'1',	'125'),
('66.249.79.127',	'3',	'125'),
('66.249.79.127',	'2',	'7'),
('66.249.66.156',	'3',	'125'),
('b0f590797bb78a4f7c5ee74ed4d3edc2',	'3',	'1115'),
('66.249.66.157',	'1',	'125'),
('66.249.66.158',	'2',	'496'),
('66.249.66.157',	'3',	'127');

-- 2020-10-05 08:29:37
