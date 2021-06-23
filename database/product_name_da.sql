-- Adminer 4.8.1 MySQL 5.7.34 dump

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
(138,	'Antal magi'),
(282,	'Min virtuelle elsker'),
(127,	'Jigsaw væg'),
(130,	'AI-elsker'),
(132,	'Min elsker'),
(123,	'Musik for livet'),
(104,	'Søg efter kontakter'),
(120,	'Virtuel elsker'),
(119,	'virtuel elsker 3D'),
(134,	'Kør med mig'),
(122,	'Tæller får - gå i seng'),
(133,	'Hurtigt øje'),
(131,	'Sød virtuel assistent'),
(139,	'Worm Master'),
(135,	'Gem web offline'),
(136,	'Opret adgangskode'),
(128,	'Bibelens verden'),
(283,	'Midi Piano Editor'),
(284,	'Rovfisk'),
(121,	'Virtuel elsker 2'),
(105,	'Kærlighed eller ingen kærlighed');

-- 2021-06-12 17:10:18
