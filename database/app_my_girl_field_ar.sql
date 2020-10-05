-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_field_ar`;
CREATE TABLE `app_my_girl_field_ar` (
  `id_chat` varchar(11) NOT NULL,
  `type_chat` varchar(5) NOT NULL,
  `data` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `option` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_field_ar`;
INSERT INTO `app_my_girl_field_ar` (`id_chat`, `type_chat`, `data`, `type`, `author`, `option`) VALUES
('271',	'chat',	'[[\"https://www.facebook.com/virtuallover/\",\"\",\"link\",\"Virtual lover\"]]',	'field_chat',	'unclear',	'0');

-- 2020-10-05 07:22:29