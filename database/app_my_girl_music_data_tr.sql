-- Adminer 4.8.0 MySQL 5.7.33 dump

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
('28a6e7112a97b565d4ab6e70a339fa12',	'1',	'1808'),
('66.249.73.24',	'1',	'670'),
('66.249.73.23',	'1',	'497'),
('38c9ca415ed567bd25a827ca4e657439',	'1',	'2047'),
('40.77.167.22',	'1',	'115'),
('10a59a8b03b94d1355ddfbe58a404110',	'3',	'1003');

-- 2021-03-10 08:29:03
