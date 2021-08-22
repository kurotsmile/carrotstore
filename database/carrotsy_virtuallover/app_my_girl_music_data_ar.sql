-- Adminer 4.8.1 MySQL 5.7.35 dump

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
('66.249.72.197',	'2',	'255'),
('66.249.72.201',	'1',	'260'),
('66.249.72.201',	'3',	'119'),
('66.249.73.137',	'2',	'466'),
('66.249.73.137',	'0',	'341'),
('66.249.73.133',	'2',	'496'),
('66.249.73.135',	'2',	'496'),
('66.249.73.133',	'1',	'334'),
('66.249.73.135',	'1',	'260'),
('66.249.73.133',	'3',	'340'),
('66.249.64.6',	'2',	'367'),
('66.249.64.26',	'2',	'496'),
('66.249.64.8',	'1',	'260'),
('66.249.73.135',	'1',	'349'),
('66.249.73.135',	'0',	'366'),
('66.249.73.135',	'3',	'255'),
('66.249.73.137',	'2',	'496'),
('66.249.73.159',	'3',	'255'),
('66.249.73.157',	'0',	'255'),
('66.249.73.135',	'3',	'346');

-- 2021-08-17 16:31:24
