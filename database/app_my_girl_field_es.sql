-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_field_es`;
CREATE TABLE `app_my_girl_field_es` (
  `id_chat` varchar(11) NOT NULL,
  `type_chat` varchar(5) NOT NULL,
  `data` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `option` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_field_es`;
INSERT INTO `app_my_girl_field_es` (`id_chat`, `type_chat`, `data`, `type`, `author`, `option`) VALUES
('50060',	'chat',	'[[\"983\",\"es\",\"show_chat\",\"música abierta\",\"000000\"],[\"42\",\"es\",\"show_chat\",\"abrir facebook\",\"000000\"],[\"2975\",\"es\",\"show_chat\",\"abrir whats app\",\"000000\"],[\"49375\",\"es\",\"show_chat\",\"abrir recordatorio\",\"000000\"],[\"29501\",\"es\",\"show_chat\",\"radio abierta\",\"000000\"],[\"53\",\"es\",\"show_chat\",\"abrir sms\",\"000000\"]]',	'field_chat',	'unclear',	'0'),
('50921',	'chat',	'[[\"3\",\"https://www.facebook.com/virtuallover/\",\"link\",\"Virtual lover\"]]',	'field_chat',	'unclear',	'0');

-- 2020-10-25 12:21:32
