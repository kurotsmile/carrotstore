-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_video_id`;
CREATE TABLE `app_my_girl_video_id` (
  `id_chat` varchar(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_video_id`;
INSERT INTO `app_my_girl_video_id` (`id_chat`, `link`) VALUES
('88',	'https://www.youtube.com/watch?v=5avCpXsglPk');

-- 2020-10-25 12:41:58