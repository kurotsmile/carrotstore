-- Adminer 4.8.1 MySQL 5.7.40 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_country`;
CREATE TABLE `app_my_girl_country` (
  `key` varchar(2) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `ver0` varchar(1) NOT NULL DEFAULT '0',
  `ver1` varchar(1) NOT NULL DEFAULT '0',
  `ver2` varchar(1) NOT NULL DEFAULT '0',
  `ver3` varchar(1) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_country`;
INSERT INTO `app_my_girl_country` (`key`, `name`, `ver0`, `ver1`, `ver2`, `ver3`, `active`, `id`, `country_code`) VALUES
('vi',	'Vietnamese',	'1',	'1',	'1',	'1',	1,	0,	'vn'),
('en',	'English',	'1',	'1',	'1',	'1',	1,	1,	'us'),
('es',	'Spanish',	'1',	'0',	'1',	'1',	1,	2,	'es'),
('pt',	'Portuguese',	'1',	'0',	'1',	'1',	1,	3,	'pt'),
('fr',	'French',	'1',	'0',	'1',	'1',	1,	4,	'fr'),
('hi',	'Hindi',	'1',	'0',	'1',	'1',	1,	5,	'in'),
('zh',	'Chinese',	'1',	'0',	'1',	'1',	1,	6,	'cn'),
('ru',	'Russian',	'1',	'0',	'1',	'1',	1,	7,	'ru'),
('de',	'German',	'1',	'0',	'1',	'1',	1,	8,	'de'),
('th',	'Thai',	'1',	'0',	'1',	'1',	1,	9,	'th'),
('ko',	'Korean',	'1',	'0',	'1',	'1',	1,	10,	'kr'),
('ja',	'Japanese',	'1',	'0',	'1',	'1',	1,	11,	'jp'),
('ar',	'Arabic',	'1',	'0',	'1',	'1',	1,	12,	'sa'),
('tr',	'Turkish',	'1',	'0',	'1',	'1',	1,	13,	'tr'),
('fi',	'Finnish',	'1',	'0',	'1',	'1',	1,	14,	'fi'),
('it',	'Italian',	'1',	'0',	'1',	'1',	1,	15,	'it'),
('id',	'Indonesian',	'0',	'0',	'0',	'',	1,	16,	'id'),
('da',	'Denmark',	'0',	'0',	'0',	'',	1,	17,	'dk'),
('nl',	'Nederland',	'0',	'0',	'0',	'',	1,	18,	'nl'),
('pl',	'Poland',	'0',	'0',	'0',	'',	1,	19,	'pl');

-- 2022-10-28 13:20:22
