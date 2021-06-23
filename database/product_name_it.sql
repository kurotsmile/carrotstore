-- Adminer 4.8.1 MySQL 5.7.34 dump

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
(138,	'Numero magico'),
(282,	'Il mio amante virtuale'),
(127,	'Muro di puzzle'),
(130,	'Amante dell\'IA'),
(132,	'Il mio amante'),
(123,	'Musica per la vita'),
(104,	'Cerca contatti'),
(120,	'Amante virtuale'),
(119,	'amante virtuale 3D'),
(134,	'Corri con me'),
(122,	'Conteggio delle pecore - vai a letto'),
(133,	'Occhio veloce'),
(131,	'Simpatico assistente virtuale'),
(139,	'Worm Master'),
(135,	'Salva Web offline'),
(136,	'Crea password'),
(128,	'Mondo biblico'),
(283,	'Editor di pianoforte midi'),
(284,	'Pesce da preda'),
(121,	'Amante virtuale 2'),
(105,	'Amore o nessun amore');

-- 2021-06-12 17:35:13
