-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_da`;
CREATE TABLE `product_name_da` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_da`;
INSERT INTO `product_name_da` (`id_product`, `data`) VALUES
(95,	'Death Note - Ryuk og Rem'),
(95,	'Death Note - Ryuk og Rem'),
(119,	'virtuel elsker 3D'),
(135,	'Gem web offline'),
(104,	'Søg efter kontakter'),
(128,	'Bibelens verden'),
(282,	'Min virtuelle elsker'),
(121,	'Virtuel elsker 2'),
(122,	'Tæller får - gå i seng'),
(132,	'Min elsker'),
(138,	'Antal magi'),
(133,	'Hurtigt øje'),
(127,	'Jigsaw væg'),
(284,	'Rovfisk'),
(139,	'Worm Master'),
(105,	'Kærlighed eller ingen kærlighed'),
(134,	'Kør med mig'),
(120,	'Virtuel elsker'),
(283,	'Midi Piano Editor'),
(136,	'Opret adgangskode'),
(131,	'Sød virtuel assistent'),
(285,	'Fodboldbord'),
(123,	'Musik for livet'),
(130,	'AI-elsker');

-- 2021-10-18 20:17:10
