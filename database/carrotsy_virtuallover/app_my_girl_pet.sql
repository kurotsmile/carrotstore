-- Adminer 4.8.1 MySQL 5.7.39 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_pet`;
CREATE TABLE `app_my_girl_pet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_pet` varchar(50) NOT NULL,
  `name_prefab` varchar(50) NOT NULL,
  `tip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `app_my_girl_pet` (`id`, `name_pet`, `name_prefab`, `tip`) VALUES
(1,	'Name pet',	'Prefab pet',	'pet cute for virtual lover');

-- 2022-08-20 02:44:43
