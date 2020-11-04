-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_video_pl`;
CREATE TABLE `app_my_girl_video_pl` (
  `id_chat` varchar(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_video_pl`;
INSERT INTO `app_my_girl_video_pl` (`id_chat`, `link`) VALUES
('81',	'https://www.youtube.com/watch?v=uE7b5Q7wtSw');

-- 2020-10-25 12:01:58
