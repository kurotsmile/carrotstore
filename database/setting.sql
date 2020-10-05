-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `key` varchar(20) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `setting`;
INSERT INTO `setting` (`key`, `value`) VALUES
('show_ads',	'1'),
('show_adsupply',	'0'),
('login_facebook',	'0');

-- 2020-10-05 06:37:22
