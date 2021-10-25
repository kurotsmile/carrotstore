-- Adminer 4.8.1 MySQL 5.7.35 dump

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
(119,	'amante virtuale 3D'),
(135,	'Salva Web offline'),
(104,	'Cerca contatti'),
(128,	'Mondo biblico'),
(282,	'Il mio amante virtuale'),
(121,	'Amante virtuale 2'),
(122,	'Conteggio delle pecore - vai a letto'),
(132,	'Il mio amante'),
(138,	'Numero magico'),
(133,	'Occhio veloce'),
(127,	'Muro di puzzle'),
(284,	'Pesce da preda'),
(139,	'Worm Master'),
(105,	'Amore o nessun amore'),
(134,	'Corri con me'),
(120,	'Amante virtuale'),
(283,	'Editor di pianoforte midi'),
(136,	'Crea password'),
(131,	'Simpatico assistente virtuale'),
(285,	'Calcio balilla'),
(123,	'Musica per la vita'),
(130,	'Amante dell\'IA');

-- 2021-10-18 20:22:40
