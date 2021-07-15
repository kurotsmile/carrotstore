-- Adminer 4.8.1 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `scores`;
CREATE TABLE `scores` (
  `id_user` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `lang` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `scores`;
INSERT INTO `scores` (`id_user`, `score`, `lang`) VALUES
('7a847680a2285a405a573a407eb4b8f0',	3,	'vi'),
('27a5247bd945d0f114476c57ab106c51',	10,	'vi'),
('31a8baa5b96bf6972448972636329b9a',	5,	'vi'),
('4b23a964ac9e18c8189e2b9f34ee5fa5',	6,	'vi'),
('bfbb36180aba654f3665964a5872300f',	164,	'vi');

-- 2021-07-08 17:39:15
