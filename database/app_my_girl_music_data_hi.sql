-- Adminer 4.8.0 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_hi`;
CREATE TABLE `app_my_girl_music_data_hi` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_hi`;
INSERT INTO `app_my_girl_music_data_hi` (`device_id`, `value`, `id_chat`) VALUES
('66.249.73.23',	'2',	'83'),
('66.249.73.23',	'1',	'70'),
('66.249.73.23',	'2',	'74'),
('66.249.73.23',	'2',	'79'),
('185.191.171.11',	'2',	'77'),
('171.76.255.90',	'0',	'84'),
('18.207.200.155',	'0',	'84'),
('66.249.90.215',	'0',	'84'),
('66.249.73.23',	'1',	'80');

-- 2021-03-10 07:38:41
