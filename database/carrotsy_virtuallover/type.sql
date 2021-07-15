-- Adminer 4.8.1 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` varchar(50) NOT NULL,
  `css_icon` varchar(100) NOT NULL,
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

TRUNCATE `type`;
INSERT INTO `type` (`id`, `css_icon`, `id_order`, `position`) VALUES
('mobile_application',	'fa fa-cube',	1,	0),
('mobile_game',	'fa fa-gamepad',	9,	0);

-- 2021-06-12 15:25:46
