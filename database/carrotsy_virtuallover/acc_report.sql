-- Adminer 4.8.1 MySQL 5.7.37 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `acc_report`;
CREATE TABLE `acc_report` (
  `id_device` varchar(100) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `txt` text NOT NULL,
  `type` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

TRUNCATE `acc_report`;

-- 2022-02-28 10:55:30
