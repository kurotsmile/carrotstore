-- Adminer 4.8.1 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `scores`;
CREATE TABLE `scores` (
  `id_device` varchar(100) NOT NULL,
  `level` int(3) NOT NULL,
  `date` date NOT NULL,
  `type` int(1) NOT NULL,
  `lang` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `scores`;
INSERT INTO `scores` (`id_device`, `level`, `date`, `type`, `lang`) VALUES
('bfbb36180aba654f3665964a5872300f',	4,	'2021-05-10',	2,	'vi'),
('dedc91cb9ef3108357fd48e3b306f2d4',	3,	'2021-05-10',	2,	'vi'),
('0987db26e366181032a16682f83158b4',	6,	'2021-05-10',	1,	'vi'),
('e6b16a9f4b7159420306af2db31ed83b',	2,	'2021-05-10',	3,	'vi'),
('1f47e8898d695e697fbdad306bd8cf3b',	3,	'2021-05-10',	1,	'vi'),
('43bcfc9741118b26342c9ca00d03a27c',	6,	'2021-04-10',	3,	'vi'),
('ebb2c410e29b8cda163553103e4f4f7e',	4,	'2021-03-10',	2,	'vi');

-- 2021-06-13 17:19:49
