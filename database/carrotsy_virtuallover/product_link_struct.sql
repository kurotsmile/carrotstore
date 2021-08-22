-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `product_link_struct`;
CREATE TABLE `product_link_struct` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `icon` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `product_link_struct`;
INSERT INTO `product_link_struct` (`id`, `name`, `icon`) VALUES
(1,	'Apple store',	'fa-apple'),
(2,	'Google Play',	'fa-android'),
(3,	'Steam',	'fa-steam'),
(4,	'Samsung Galaxy Store',	'fa-scribd'),
(5,	'Microsoft Store',	'fa-windows'),
(6,	'Carrot store',	'fa-play'),
(7,	'PlayStation Store',	'fa-codepen'),
(8,	'Chrome Web Store',	'fa-chrome'),
(9,	'Huawei AppGallery',	'fa-pagelines'),
(10,	'Apk link',	'fa-leaf'),
(11,	'Nintendo Store',	'fa-codiepie'),
(12,	'Amazon app store',	'fa-amazon'),
(13,	'QooApp',	'fa-github-alt'),
(14,	'Uptodown',	'fa-arrow-circle-down'),
(15,	'Exe Pc',	'fa-desktop'),
(16,	'itch.io',	'fa-shopping-bag');

-- 2021-08-13 15:11:48
