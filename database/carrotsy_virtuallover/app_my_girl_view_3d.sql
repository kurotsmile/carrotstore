-- Adminer 4.8.1 MySQL 5.7.39 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_view_3d`;
CREATE TABLE `app_my_girl_view_3d` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `android` varchar(50) NOT NULL,
  `ios` varchar(50) NOT NULL,
  `is_free` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `app_my_girl_view_3d` (`id`, `name`, `android`, `ios`, `is_free`) VALUES
(1,	'Home',	'map1/map1',	'map1/map1',	'on'),
(2,	'Home',	'map1/map1',	'map1/map1',	'on'),
(3,	'Home',	'map1/map1',	'map1/map1',	'on'),
(5,	'Home',	'map1/map1',	'map1/map1',	'on'),
(6,	'Home',	'map1/map1',	'map1/map1',	'on'),
(7,	'Home',	'map1/map1',	'map1/map1',	'on'),
(8,	'Home',	'map1/map1',	'map1/map1',	'on'),
(9,	'Home',	'map1/map1',	'map1/map1',	'on'),
(12,	'Home',	'map1/map1',	'map1/map1',	'on'),
(13,	'Home',	'map1/map1',	'map1/map1',	'on');

-- 2022-08-20 03:39:59
