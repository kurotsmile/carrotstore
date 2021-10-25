-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_ru`;
CREATE TABLE `app_my_girl_music_data_ru` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_ru`;
INSERT INTO `app_my_girl_music_data_ru` (`device_id`, `value`, `id_chat`) VALUES
('66.249.73.23',	'3',	'295'),
('99b77a2187762bea46c093bedf515f57',	'1',	'10463'),
('66.249.73.23',	'2',	'46'),
('66.249.73.25',	'1',	'6110'),
('66.249.73.23',	'1',	'6110'),
('66.249.73.31',	'2',	'6238'),
('66.249.73.31',	'0',	'8771'),
('66.249.73.1',	'3',	'70'),
('66.249.73.23',	'1',	'7209'),
('66.249.73.23',	'1',	'5191'),
('95.163.255.126',	'0',	'7881'),
('66.249.73.135',	'2',	'6895');

-- 2021-10-18 21:51:57
