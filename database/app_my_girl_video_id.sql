-- Adminer 4.8.0 MySQL 5.7.33 dump

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
('88',	'https://www.youtube.com/watch?v=5avCpXsglPk'),
('89',	'https://www.youtube.com/watch?v=P9eCva8x3MI');

-- 2021-03-10 08:44:10
