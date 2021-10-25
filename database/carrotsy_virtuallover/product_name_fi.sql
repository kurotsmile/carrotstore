-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_fi`;
CREATE TABLE `product_name_fi` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_fi`;
INSERT INTO `product_name_fi` (`id_product`, `data`) VALUES
(95,	'Kuoleman huomautus - Ryuk ja Rem'),
(95,	'Kuoleman huomautus - Ryuk ja Rem'),
(119,	'virtuaalinen rakastaja 3D'),
(135,	'Tallenna verkko offline-tilassa'),
(104,	'Etsi yhteystietoja'),
(128,	'Raamatun maailma'),
(282,	'Virtuaalinen rakastajani'),
(121,	'Virtuaalinen rakastaja 2'),
(122,	'Laskevat lampaita - mene nukkumaan'),
(132,	'Rakastajani'),
(138,	'Numero Magic'),
(133,	'Nopea silmä'),
(127,	'Palapeliseinä'),
(284,	'Saaliskala'),
(139,	'Mato mestari'),
(105,	'Rakkaus tai ei rakkautta'),
(134,	'Juokse minun kanssani'),
(120,	'Virtuaali rakastaja'),
(283,	'Midi Piano Editor'),
(136,	'Luo salasana'),
(131,	'Söpö virtuaaliassistentti'),
(285,	'Jalkapallopöytä'),
(123,	'Musiikki elämää varten'),
(130,	'AI-rakastaja');

-- 2021-10-18 22:08:03
