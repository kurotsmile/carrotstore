-- Adminer 4.8.1 MySQL 5.7.35 dump

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
('66.249.73.23',	'1',	'463'),
('66.249.73.158',	'1',	'670');

-- 2021-10-18 21:57:09
