-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_de`;
CREATE TABLE `product_name_de` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_de`;
INSERT INTO `product_name_de` (`id_product`, `data`) VALUES
(95,	'Death Note - Ryuk und Rem'),
(95,	'Death Note - Ryuk und Rem'),
(119,	'virtueller Liebhaber 3D'),
(135,	'Speichern Sie das Web offline'),
(104,	'Nach Kontakten suchen'),
(128,	'Bibelwelt'),
(282,	'Mein virtueller Liebhaber'),
(121,	'Virtueller Liebhaber 2'),
(122,	'Schafe zählen - ins Bett gehen'),
(132,	'Mein Liebhaber'),
(138,	'Zahlenmagie'),
(133,	'Schnelles Auge'),
(127,	'Puzzle-Wand'),
(284,	'Raubfische'),
(139,	'Wurmmeister'),
(105,	'Liebe oder keine Liebe'),
(134,	'Lauf mit mir'),
(120,	'Virtueller Liebhaber'),
(283,	'Midi-Piano-Editor'),
(136,	'Passwort erstellen'),
(131,	'Netter virtueller Assistent'),
(285,	'Tischkicker'),
(123,	'Musik fürs Leben'),
(130,	'AI Liebhaber');

-- 2021-10-18 22:07:03
