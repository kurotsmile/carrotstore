-- Adminer 4.8.0 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `work_app`;
CREATE TABLE `work_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

TRUNCATE `work_app`;
INSERT INTO `work_app` (`id`, `name`, `url`) VALUES
(1,	'lover',	'vl'),
(2,	'Flower',	'flower'),
(3,	'Sheep',	'sheep'),
(4,	'Music',	'appmusic'),
(5,	'Contact',	'contactstore'),
(8,	'Work',	'work'),
(19,	'Fish',	'fish_of_prey'),
(9,	'Carrotstore',	'admin'),
(10,	'Bibles',	'bibles'),
(15,	'Password',	'createpassword'),
(16,	'Web Offline',	'saveweboffline'),
(18,	'Piano Midi',	'midi');

-- 2021-03-26 22:10:35
