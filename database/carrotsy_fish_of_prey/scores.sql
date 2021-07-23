-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `scores`;
CREATE TABLE `scores` (
  `id_device` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `name_play` char(50) NOT NULL,
  `lang_key` char(2) NOT NULL,
  `lang_name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `scores`;
INSERT INTO `scores` (`id_device`, `score`, `name_play`, `lang_key`, `lang_name`) VALUES
('bfbb36180aba654f3665964a5872300f',	5,	'yến vy',	'vi',	'Vietnamese'),
('7a847680a2285a405a573a407eb4b8f0',	3,	'Tuấn Trung',	'vi',	'Vietnamese'),
('27a5247bd945d0f114476c57ab106c51',	10,	'nguyendung',	'vi',	'Vietnamese'),
('31a8baa5b96bf6972448972636329b9a',	5,	'Mun láo',	'vi',	'Vietnamese'),
('4b23a964ac9e18c8189e2b9f34ee5fa5',	6,	'quý ròm',	'vi',	'Vietnamese'),
('289212078726592',	5,	'Rot Tran',	'vi',	'Vietnamese');

-- 2021-07-21 11:53:15
