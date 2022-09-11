-- Adminer 4.8.1 MySQL 5.7.39 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `key` varchar(20) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `setting` (`key`, `value`) VALUES
('show_ads',	'0'),
('show_adsupply',	'0'),
('login_facebook',	'0'),
('ver',	'6.9'),
('serviceWorker',	'1'),
('google_analytics',	'1'),
('fb_message',	'0');

-- 2022-08-20 02:42:51
