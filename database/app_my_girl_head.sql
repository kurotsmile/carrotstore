-- Adminer 4.8.0 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_head`;
CREATE TABLE `app_my_girl_head` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `price` varchar(5) NOT NULL,
  `id_store` varchar(50) NOT NULL,
  `character` varchar(1) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `app_my_girl_head`;
INSERT INTO `app_my_girl_head` (`id`, `name`, `price`, `id_store`, `character`, `type`) VALUES
(1,	'Black',	'0',	'com.product1.thanh',	'0',	'misaki'),
(2,	'Brown',	'0',	'com.product1.bk1',	'0',	'misaki'),
(3,	'Purple iridescent',	'0',	'com.product1.bk1',	'0',	'misaki'),
(8,	'Violet',	'0',	'com.product1.thanh',	'1',	'yuko'),
(9,	'Light Blue',	'0',	'com.product1.thanh',	'1',	'yuko'),
(10,	'Flower',	'0',	'com.product1.thanh',	'1',	'yuko');

-- 2021-03-29 13:03:48
