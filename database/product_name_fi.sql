-- Adminer 4.8.0 MySQL 5.7.33 dump

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
(121,	'Virtuaalinen rakastaja 2'),
(122,	'Laskevat lampaita - mene nukkumaan'),
(123,	'Musiikki elämää varten'),
(127,	'Palapeliseinä'),
(128,	'Raamatun maailma'),
(130,	'AI-rakastaja'),
(131,	'Söpö virtuaaliassistentti'),
(133,	'Nopea silmä'),
(134,	'Juokse minun kanssani'),
(135,	'Tallenna verkko offline-tilassa'),
(139,	'Mato mestari'),
(138,	'Numero Magic'),
(136,	'Luo salasana'),
(120,	'Virtuaali rakastaja'),
(132,	'Rakastajani');

-- 2021-03-10 08:32:03
