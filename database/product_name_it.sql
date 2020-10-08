-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_it`;
CREATE TABLE `product_name_it` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_it`;
INSERT INTO `product_name_it` (`id_product`, `data`) VALUES
(95,	'Death Note - Ryuk e Rem'),
(95,	'Death Note - Ryuk e Rem'),
(104,	'Cerca contatti'),
(105,	'Amore o nessun amore'),
(119,	'amante virtuale 3D'),
(120,	'Amante virtuale'),
(121,	'Amante virtuale 2'),
(122,	'Conteggio delle pecore - vai a letto'),
(123,	'Musica per la vita'),
(127,	'Muro di puzzle'),
(128,	'Mondo biblico'),
(130,	'Amante dell\'IA'),
(131,	'Simpatico assistente virtuale'),
(132,	'Il mio amante'),
(133,	'Occhio veloce'),
(134,	'Corri con me'),
(135,	'Salva Web offline'),
(139,	'Worm Master'),
(138,	'Numero magico'),
(136,	'Crea password');

-- 2020-10-08 16:57:08
