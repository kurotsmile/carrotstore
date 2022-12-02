-- Adminer 4.8.1 MySQL 5.5.5-10.4.24-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `key` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `country`;
INSERT INTO `country` (`key`) VALUES
('vi'),
('en'),
('es'),
('pt'),
('fr'),
('hi'),
('zh'),
('ru'),
('de'),
('th'),
('ko'),
('ja'),
('ar'),
('tr'),
('fi'),
('it'),
('id'),
('da'),
('nl'),
('pl');

-- 2022-11-19 06:47:03
