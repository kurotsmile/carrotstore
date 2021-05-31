-- Adminer 4.8.1 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_chap` int(11) NOT NULL,
  `order_book` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `media`;
INSERT INTO `media` (`id`, `order_chap`, `order_book`, `type`) VALUES
(7,	2,	0,	0),
(5,	1,	0,	0),
(8,	1,	0,	1),
(9,	2,	0,	1),
(10,	3,	0,	1),
(11,	3,	0,	0),
(12,	4,	0,	0),
(13,	4,	0,	1),
(14,	5,	0,	1),
(15,	11,	0,	1),
(16,	12,	0,	1);

-- 2021-05-29 09:14:45
