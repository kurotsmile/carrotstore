-- Adminer 4.8.1 MySQL 5.5.5-10.4.17-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `work_app`;
CREATE TABLE `work_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `url` text NOT NULL,
  `folder` varchar(50) NOT NULL,
  `order` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

TRUNCATE `work_app`;
INSERT INTO `work_app` (`id`, `name`, `url`, `folder`, `order`) VALUES
(1,	'lover',	'vl',	'',	4),
(2,	'Flower',	'flower',	'flower',	3),
(3,	'Counting sheep',	'sheep',	'sheep',	6),
(4,	'Music',	'appmusic',	'musicforlife',	7),
(5,	'Contacts Store',	'',	'contactstore',	1),
(8,	'Work',	'work',	'work',	8),
(19,	'Fish',	'',	'fish_of_prey',	9),
(9,	'Carrotstore',	'admin',	'',	10),
(10,	'Bible',	'',	'bible',	2),
(15,	'Password',	'createpassword',	'createpassword',	11),
(16,	'Web Offline',	'saveweboffline',	'saveweboffline',	12),
(18,	'Piano Midi',	'midi',	'piano',	5),
(20,	'Carrot Framework',	'',	'carrot_framework',	0),
(21,	'Quick Eye',	'',	'quick_eye',	13),
(22,	'Worm Master',	'',	'worm_master',	14);

-- 2021-07-11 07:35:33
