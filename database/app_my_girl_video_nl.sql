-- Adminer 4.8.0 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_video_nl`;
CREATE TABLE `app_my_girl_video_nl` (
  `id_chat` varchar(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_video_nl`;
INSERT INTO `app_my_girl_video_nl` (`id_chat`, `link`) VALUES
('86',	'https://www.youtube.com/watch?v=YBa6_L3NrBs'),
('87',	'https://www.youtube.com/watch?v=ACi_JUeFBhU'),
('88',	'https://www.youtube.com/watch?v=SM1GGxYAjYU');

-- 2021-03-10 08:39:45
