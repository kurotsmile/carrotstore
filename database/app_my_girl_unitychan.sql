-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_unitychan`;
CREATE TABLE `app_my_girl_unitychan` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_unitychan`;
INSERT INTO `app_my_girl_unitychan` (`id`, `name`, `link`) VALUES
(1,	'Sum Onichan',	'onichan/Utc_sum_humanoid'),
(2,	'Sum Unity chan',	'onichan/Yuko_sum_humanoid'),
(3,	'Toko',	'onichan/Misaki_sum_humanoid');

-- 2020-10-05 08:39:00
