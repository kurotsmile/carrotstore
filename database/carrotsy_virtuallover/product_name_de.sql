-- Adminer 4.8.1 MySQL 5.7.34 dump

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
(138,	'Zahlenmagie'),
(282,	'Mein virtueller Liebhaber'),
(127,	'Puzzle-Wand'),
(130,	'AI Liebhaber'),
(132,	'Mein Liebhaber'),
(123,	'Musik fürs Leben'),
(104,	'Nach Kontakten suchen'),
(120,	'Virtueller Liebhaber'),
(119,	'virtueller Liebhaber 3D'),
(134,	'Lauf mit mir'),
(122,	'Schafe zählen - ins Bett gehen'),
(133,	'Schnelles Auge'),
(131,	'Netter virtueller Assistent'),
(139,	'Wurmmeister'),
(135,	'Speichern Sie das Web offline'),
(136,	'Passwort erstellen'),
(128,	'Bibelwelt'),
(283,	'Midi-Piano-Editor'),
(284,	'Raubfische'),
(121,	'Virtueller Liebhaber 2'),
(105,	'Liebe oder keine Liebe');

-- 2021-06-12 17:27:54
