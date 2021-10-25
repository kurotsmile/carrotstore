-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_ko`;
CREATE TABLE `app_my_girl_music_data_ko` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_ko`;
INSERT INTO `app_my_girl_music_data_ko` (`device_id`, `value`, `id_chat`) VALUES
('66.249.73.23',	'1',	'937'),
('66.249.73.23',	'1',	'468'),
('66.249.73.24',	'1',	'468'),
('66.249.73.31',	'3',	'1452'),
('66.249.73.23',	'2',	'316'),
('66.249.73.24',	'0',	'721'),
('66.249.73.23',	'2',	'1437'),
('66.249.73.24',	'2',	'1001'),
('66.249.73.23',	'0',	'305'),
('66.249.73.23',	'0',	'1176'),
('66.249.73.23',	'3',	'171'),
('66.249.73.23',	'0',	'596'),
('66.249.73.23',	'1',	'658'),
('66.249.73.31',	'1',	'1423'),
('66.249.73.23',	'1',	'1464'),
('66.249.64.190',	'0',	'747'),
('66.249.73.23',	'3',	'883'),
('66.249.73.1',	'2',	'629'),
('91.242.162.68',	'2',	'113'),
('66.249.73.25',	'3',	'710'),
('66.249.73.25',	'1',	'619'),
('66.249.73.137',	'1',	'468');

-- 2021-10-18 21:52:44
