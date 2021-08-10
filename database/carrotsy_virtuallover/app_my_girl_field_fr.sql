-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_field_fr`;
CREATE TABLE `app_my_girl_field_fr` (
  `id_chat` varchar(11) NOT NULL,
  `type_chat` varchar(5) NOT NULL,
  `data` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `option` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_field_fr`;

-- 2021-08-07 07:58:42
