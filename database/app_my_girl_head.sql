-- Adminer 4.7.7 MySQL dump

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `app_my_girl_head`;
INSERT INTO `app_my_girl_head` (`id`, `name`, `price`, `id_store`, `character`) VALUES
(1,	'Black',	'',	'com.product1.thanh',	'0'),
(2,	'Brown',	'',	'com.product1.bk1',	'0'),
(3,	'Purple iridescent',	'',	'com.product1.bk1',	'0'),
(8,	'Violet',	'',	'com.product1.thanh',	'1'),
(9,	'Light Blue',	'',	'com.product1.thanh',	'1'),
(10,	'Flower',	'',	'com.product1.thanh',	'1');

-- 2020-10-05 07:40:14
