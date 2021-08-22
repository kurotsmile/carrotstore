-- Adminer 4.8.1 MySQL 5.5.5-10.4.17-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE TABLE `password_it` (
  `id` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL,
  `type` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

