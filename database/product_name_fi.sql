-- Adminer 4.7.7 MySQL dump

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
(104,	'Etsi yhteystietoja'),
(105,	'Rakkaus tai ei rakkautta'),
(119,	'virtuaalinen rakastaja 3D'),
(120,	'Virtuaali rakastaja'),
(121,	'Virtuaalinen rakastaja 2'),
(122,	'Laskevat lampaita - mene nukkumaan'),
(123,	'Musiikki elämää varten'),
(127,	'Palapeliseinä'),
(128,	'Raamatun maailma'),
(130,	'AI-rakastaja'),
(131,	'Söpö virtuaaliassistentti'),
(132,	'Rakastajani'),
(133,	'Nopea silmä'),
(134,	'Juokse minun kanssani'),
(135,	'Tallenna verkko offline-tilassa'),
(139,	'Mato mestari'),
(138,	'Numero Magic'),
(136,	'Luo salasana');

-- 2020-10-24 15:31:14
