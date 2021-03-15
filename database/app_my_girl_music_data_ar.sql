-- Adminer 4.8.0 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_ar`;
CREATE TABLE `app_my_girl_music_data_ar` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_ar`;
INSERT INTO `app_my_girl_music_data_ar` (`device_id`, `value`, `id_chat`) VALUES
('66.249.73.23',	'2',	'465'),
('66.249.73.24',	'1',	'59'),
('66.249.73.23',	'3',	'369'),
('66.249.73.23',	'2',	'372'),
('66.249.73.24',	'3',	'346'),
('102.110.2.48',	'0',	'100'),
('66.249.89.13',	'0',	'100'),
('152.22.43.23',	'2',	'99'),
('66.249.89.13',	'2',	'99'),
('66.249.64.14',	'0',	'120'),
('66.249.64.13',	'2',	'369'),
('45.79.238.237',	'3',	'253'),
('66.249.89.13',	'3',	'253'),
('66.249.64.13',	'2',	'253'),
('66.249.64.143',	'2',	'361'),
('165.16.50.77',	'1',	'428'),
('66.249.89.81',	'1',	'428'),
('66.249.73.23',	'1',	'339');

-- 2021-03-10 08:25:45
