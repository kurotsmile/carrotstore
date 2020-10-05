-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_skin`;
CREATE TABLE `app_my_girl_skin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `price` varchar(5) NOT NULL,
  `id_store` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `app_my_girl_skin`;
INSERT INTO `app_my_girl_skin` (`id`, `name`, `price`, `id_store`) VALUES
(1,	'skin 1',	'0',	'com.product1.thanh'),
(2,	'skin 2',	'0',	'com.product1.thanh'),
(3,	'skin 3',	'0',	'com.product1.thanh'),
(4,	'skin 4',	'0',	'com.product1.thanh'),
(5,	'Rain',	'0',	'com.product1.thanh'),
(6,	'skin 6',	'0',	'com.product1.thanh'),
(7,	'noel',	'0',	'com.product1.bk1'),
(8,	'Princess',	'0',	'com.product1.thanh'),
(9,	'cuite',	'0',	'com.product1.thanh'),
(10,	'summer',	'0',	'com.product1.bk1'),
(11,	'Rainbow',	'0',	'com.product1.bk1');

-- 2020-10-05 08:37:55
