-- Adminer 4.8.1 MySQL 5.5.5-10.4.24-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` char(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `user`;
INSERT INTO `user` (`id`, `user_name`, `full_name`, `email`, `password`) VALUES
(1,	'kurotsmile',	'sadas',	'sd',	'28091993Ku'),
(2,	'kurotsmile',	'sadas',	'sd',	'28091993Ku'),
(3,	'kurotsmile',	'sd',	'ádasd',	'28091993Ku'),
(4,	'kurotsmile',	'sd',	'ádasd',	'28091993Ku');

-- 2023-05-10 11:37:57
