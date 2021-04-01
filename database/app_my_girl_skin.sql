-- Adminer 4.8.0 MySQL 5.7.33 dump

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
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `app_my_girl_skin`;
INSERT INTO `app_my_girl_skin` (`id`, `name`, `price`, `id_store`, `type`) VALUES
(1,	'skin 1',	'0',	'com.product1.thanh',	'unitychan_girl'),
(2,	'skin 2',	'0',	'com.product1.thanh',	'unitychan_girl'),
(3,	'skin 3',	'0',	'com.product1.thanh',	'unitychan_girl'),
(4,	'skin 4',	'0',	'com.product1.thanh',	'unitychan_girl'),
(5,	'Rain',	'0',	'com.product1.thanh',	'unitychan_girl'),
(6,	'skin 6',	'0',	'com.product1.thanh',	'unitychan_girl'),
(7,	'noel',	'0',	'com.product1.bk1',	'unitychan_girl'),
(8,	'Princess',	'0',	'com.product1.thanh',	'unitychan_girl'),
(9,	'cuite',	'0',	'com.product1.thanh',	'unitychan_girl'),
(10,	'summer',	'0',	'com.product1.bk1',	'unitychan_girl'),
(11,	'Rainbow',	'1',	'com.product1.bk1',	'unitychan_girl');

-- 2021-03-29 13:01:58
