-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_user_nl`;
CREATE TABLE `app_my_girl_user_nl` (
  `id_device` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `name` varchar(20) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `date_start` date NOT NULL,
  `date_cur` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL,
  `avatar_url` text NOT NULL,
  `password` tinytext NOT NULL,
  FULLTEXT KEY `name` (`name`),
  FULLTEXT KEY `sdt` (`sdt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_user_nl`;
INSERT INTO `app_my_girl_user_nl` (`id_device`, `name`, `sex`, `date_start`, `date_cur`, `address`, `sdt`, `status`, `email`, `avatar_url`, `password`) VALUES
('113237668453466205169',	'Vurgil Bossi',	'0',	'2020-07-28',	'2020-07-29',	'',	'',	0,	'bvurgil@gmail.com',	'https://lh5.googleusercontent.com/-y4yqaSzf87o/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucnrlLsPsFRsidJEUd7nukKPi30R6A/s96-c/photo.jpg',	'');

-- 2020-10-19 02:22:52
