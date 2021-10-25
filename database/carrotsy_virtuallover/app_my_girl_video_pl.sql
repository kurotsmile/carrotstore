-- Adminer 4.8.1 MySQL 5.7.35 dump

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
('81',	'https://www.youtube.com/watch?v=uE7b5Q7wtSw'),
('86',	'https://www.youtube.com/watch?v=TzE1o0v6s_k'),
('87',	'https://www.youtube.com/watch?v=VJr6jP4e14M'),
('88',	'https://www.youtube.com/watch?v=S7sN-cFhwuk'),
('89',	'https://www.youtube.com/watch?v=s7lpTdRMPn4'),
('90',	'https://www.youtube.com/watch?v=DnePdjIA0wk');

-- 2021-10-18 20:50:58
