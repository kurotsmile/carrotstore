-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_pt`;
CREATE TABLE `app_my_girl_music_data_pt` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_pt`;
INSERT INTO `app_my_girl_music_data_pt` (`device_id`, `value`, `id_chat`) VALUES
('66.249.73.23',	'3',	'1081'),
('d385da295c385c241d13ba925e0e15c6',	'2',	'14330'),
('114.119.148.198',	'3',	'8523'),
('73.16.16.15',	'3',	'1081'),
('3bf2c73e2485e0ef5920a392b5235cd7',	'0',	'16669'),
('66.249.73.25',	'2',	'11629'),
('114.119.148.242',	'0',	'9682'),
('66.249.73.31',	'0',	'11619'),
('66.249.73.23',	'3',	'11749'),
('66.249.73.1',	'2',	'9529'),
('66.249.73.31',	'1',	'11748'),
('66.249.73.31',	'1',	'11875'),
('66.249.73.24',	'3',	'1081'),
('66.249.73.23',	'2',	'9543'),
('114.119.148.169',	'3',	'10381'),
('114.119.148.60',	'3',	'9372'),
('66.249.73.23',	'3',	'9165'),
('66.249.73.133',	'3',	'10379'),
('66.249.73.158',	'0',	'9145'),
('66.249.73.130',	'0',	'9145'),
('66.249.73.158',	'1',	'11550'),
('1097378e4558b083a489720f3cba78ec',	'2',	'14435');

-- 2021-10-18 22:10:19
