-- Adminer 4.8.0 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `product_link_struct`;
CREATE TABLE `product_link_struct` (
  `name` varchar(50) NOT NULL,
  `icon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `product_link_struct`;
INSERT INTO `product_link_struct` (`name`, `icon`) VALUES
('Apple store',	'fa-apple'),
('Google Play',	'fa-android'),
('Steam',	'fa-steam'),
('Samsung Galaxy Store',	'fa-scribd'),
('Microsoft Store',	'fa-windows'),
('Carrot store',	'fa-play'),
('PlayStation Store',	'fa-codepen'),
('Chrome Web Store',	'fa-chrome'),
('Huawei AppGallery',	'fa-pagelines'),
('Apk link',	'fa-leaf'),
('Nintendo Store',	'fa-codiepie'),
('Amazon app store',	'fa-amazon');

-- 2021-05-11 15:02:25
