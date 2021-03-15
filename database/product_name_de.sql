-- Adminer 4.8.0 MySQL 5.7.33 dump

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
(104,	'Nach Kontakten suchen'),
(105,	'Liebe oder keine Liebe'),
(119,	'virtueller Liebhaber 3D'),
(121,	'Virtueller Liebhaber 2'),
(122,	'Schafe zählen - ins Bett gehen'),
(123,	'Musik fürs Leben'),
(127,	'Puzzle-Wand'),
(128,	'Bibelwelt'),
(130,	'AI Liebhaber'),
(131,	'Netter virtueller Assistent'),
(133,	'Schnelles Auge'),
(134,	'Lauf mit mir'),
(135,	'Speichern Sie das Web offline'),
(139,	'Wurmmeister'),
(138,	'Zahlenmagie'),
(136,	'Passwort erstellen'),
(120,	'Virtueller Liebhaber'),
(132,	'Mein Liebhaber');

-- 2021-03-10 07:48:55
