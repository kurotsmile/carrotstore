-- Adminer 4.8.1 MySQL 5.7.34 dump

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
(138,	'Numero Magic'),
(282,	'Virtuaalinen rakastajani'),
(127,	'Palapeliseinä'),
(130,	'AI-rakastaja'),
(132,	'Rakastajani'),
(123,	'Musiikki elämää varten'),
(104,	'Etsi yhteystietoja'),
(120,	'Virtuaali rakastaja'),
(119,	'virtuaalinen rakastaja 3D'),
(134,	'Juokse minun kanssani'),
(122,	'Laskevat lampaita - mene nukkumaan'),
(133,	'Nopea silmä'),
(131,	'Söpö virtuaaliassistentti'),
(139,	'Mato mestari'),
(135,	'Tallenna verkko offline-tilassa'),
(136,	'Luo salasana'),
(128,	'Raamatun maailma'),
(283,	'Midi Piano Editor'),
(284,	'Saaliskala'),
(121,	'Virtuaalinen rakastaja 2'),
(105,	'Rakkaus tai ei rakkautta');

-- 2021-06-12 17:34:47
