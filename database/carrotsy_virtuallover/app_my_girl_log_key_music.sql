-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_log_key_music`;
CREATE TABLE `app_my_girl_log_key_music` (
  `key` text NOT NULL,
  `lang` varchar(2) NOT NULL,
  `type` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_log_key_music`;
INSERT INTO `app_my_girl_log_key_music` (`key`, `lang`, `type`) VALUES
('扒衣服',	'vi',	'0'),
('跳舞',	'vi',	'0'),
('The zombie',	'en',	'2'),
('The zombie',	'en',	'2'),
('Nothing  gonna stop',	'en',	'2'),
('Nothing  gonna stop',	'en',	'2'),
('Nothing\'s  gonna stop',	'en',	'2'),
('Nothing\'s  gonna stop me now',	'en',	'2'),
('Nothing\'s  gonna stop me now',	'en',	'2'),
('Anna em the apocalipse',	'en',	'2'),
('Anna em the apocalipse',	'en',	'2'),
('Anna em the apocalipse',	'en',	'2'),
('Anna and the apocalipse',	'en',	'2'),
('Anna and the apocalipse',	'en',	'2'),
('yonuqgumi',	'es',	'1'),
('yonqgumi',	'es',	'1'),
('yonagumi',	'es',	'1'),
('yonagumi',	'es',	'1'),
('doutora',	'pt',	'1'),
('Zack Arantes',	'pt',	'2'),
('Zack Arantes',	'pt',	'2'),
('ZACK Arantes',	'pt',	'2'),
('ZACK Arantes',	'pt',	'2'),
('Zack Arantes',	'pt',	'2'),
('Zack Arantes',	'pt',	'2'),
('metálica',	'es',	'1');

-- 2021-09-12 03:19:56
