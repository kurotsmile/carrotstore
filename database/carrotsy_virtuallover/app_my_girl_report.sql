-- Adminer 4.8.1 MySQL 5.7.39 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_report`;
CREATE TABLE `app_my_girl_report` (
  `type` varchar(1) NOT NULL,
  `sel_report` varchar(1) NOT NULL,
  `value_report` varchar(90) NOT NULL,
  `id_question` varchar(10) NOT NULL,
  `type_question` varchar(5) NOT NULL,
  `id_device` varchar(50) NOT NULL,
  `limit_chat` varchar(1) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `os` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `app_my_girl_report` (`type`, `sel_report`, `value_report`, `id_question`, `type_question`, `id_device`, `limit_chat`, `lang`, `os`) VALUES
('1',	'2',	'',	'62067',	'chat',	'e606db9f60c58da75dabf72a5fe1ba71',	'3',	'es',	'e606db9f60'),
('1',	'1',	'địt đi',	'74978',	'chat',	'428cbcefb127c2ceab19e59988626d0c',	'3',	'vi',	'428cbcefb1'),
('1',	'2',	'do you like your cat',	'135',	'msg',	'8f8dda9eec8c401024653474ae691475',	'3',	'en',	'8f8dda9eec'),
('1',	'3',	'4',	'221',	'msg',	'046c3e7f24736027705f0a379d40a656',	'4',	'vi',	'046c3e7f24'),
('1',	'3',	'4',	'250',	'msg',	'046c3e7f24736027705f0a379d40a656',	'4',	'vi',	'046c3e7f24');

-- 2022-08-20 03:50:47
