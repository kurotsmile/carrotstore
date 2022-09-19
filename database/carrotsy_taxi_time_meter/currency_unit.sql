-- Adminer 4.8.1 MySQL 5.7.39 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `currency_unit`;
CREATE TABLE `currency_unit` (
  `code` varchar(3) CHARACTER SET utf8 NOT NULL,
  `symbol` varchar(1) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `currency_unit`;
INSERT INTO `currency_unit` (`code`, `symbol`) VALUES
('VND',	'₫'),
('USD',	'$'),
('EUR',	'€'),
('JPY',	'¥'),
('GBP',	'£'),
('CNY',	'元'),
('INR',	'₹');

-- 2022-09-19 12:13:35
