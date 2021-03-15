-- Adminer 4.8.0 MySQL 5.7.33 dump

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
('66.249.73.23',	'2',	'69'),
('66.249.73.23',	'2',	'85'),
('66.249.64.13',	'0',	'862'),
('66.249.64.13',	'1',	'837'),
('66.249.64.143',	'2',	'860');

-- 2021-03-10 08:00:26
