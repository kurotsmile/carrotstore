-- Adminer 4.8.1 MySQL 5.7.35 dump

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

TRUNCATE `app_my_girl_report`;
INSERT INTO `app_my_girl_report` (`type`, `sel_report`, `value_report`, `id_question`, `type_question`, `id_device`, `limit_chat`, `lang`, `os`) VALUES
('1',	'2',	'',	'281',	'msg',	'c74168c670de8c6a99d68295f0738d40',	'4',	'en',	'c74168c670'),
('1',	'2',	'',	'16',	'msg',	'2d32ccc22623b8089fc43a872f200b48',	'3',	'es',	'2d32ccc226'),
('1',	'2',	'',	'12571',	'chat',	'a83e7be797d3e7720f3d1edec26ea505',	'3',	'pt',	'a83e7be797'),
('1',	'2',	'',	'16',	'msg',	'03c4b1f803a31b5ef6429274ab9c34b1',	'3',	'pt',	'03c4b1f803'),
('1',	'2',	'wla n tira a roupa',	'1930',	'chat',	'95a7fc83033df9ebcdc597063e0b888c',	'3',	'pt',	'95a7fc8303'),
('1',	'2',	'muy robot',	'32',	'msg',	'0617cf788603dd9abff5671e07128074',	'4',	'es',	'0617cf7886');

-- 2021-09-11 20:23:10
