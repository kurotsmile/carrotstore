-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_user_da`;
CREATE TABLE `app_my_girl_user_da` (
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

TRUNCATE `app_my_girl_user_da`;

-- 2020-10-19 02:22:32
