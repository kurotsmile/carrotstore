-- Adminer 4.8.1 MySQL 5.7.39 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `pay`;
CREATE TABLE `pay` (
  `id_user` varchar(100) NOT NULL,
  `id_item` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `pay` (`id_user`, `id_item`, `status`) VALUES
('e77294d98d84e697a2319f73a53dd037',	'obj_nude',	0),
('mailto:webmaster',	'product',	0),
('.DS_Store',	'product',	0),
('139',	'product',	0),
('138',	'product',	1),
('59',	'usic',	0),
('9a878b972e7925aa246b553b74ef5107',	'obj_nude',	0),
('eda4ec0ee5275baf96a72d8382dfa0b1',	'obj_nude',	0),
('030b8c45a04dd55b8a34c749aeca2c9d',	'obj_nude',	0),
('4ba586e17e0e79b1e3c7901b141afec7',	'obj_nude',	0),
('2e9032ab95287bd3c9564fbaebb454ab',	'remove_ads',	0),
('0be0004ae2445bb9fced0dcd5c539c48',	'obj_nude',	0),
('4ba586e17e0e79b1e3c7901b141afec7',	'remove_ads',	0),
('154ccce6c78312f79f91ebd4a3258099',	'obj_nude',	0);

-- 2022-08-20 02:43:42
