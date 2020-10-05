-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_preson_category`;
CREATE TABLE `app_my_girl_preson_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `sex` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_preson_category`;
INSERT INTO `app_my_girl_preson_category` (`id`, `name`, `sex`) VALUES
(1,	'tropical_kisss',	'0'),
(2,	'category_preson_elegant',	'1');

-- 2020-10-05 08:34:04
