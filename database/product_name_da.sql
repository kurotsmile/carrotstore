-- Adminer 4.8.0 MySQL 5.7.33 dump

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
(104,	'Søg efter kontakter'),
(105,	'Kærlighed eller ingen kærlighed'),
(119,	'virtuel elsker 3D'),
(121,	'Virtuel elsker 2'),
(122,	'Tæller får - gå i seng'),
(123,	'Musik for livet'),
(127,	'Jigsaw væg'),
(128,	'Bibelens verden'),
(130,	'AI-elsker'),
(131,	'Sød virtuel assistent'),
(133,	'Hurtigt øje'),
(134,	'Kør med mig'),
(135,	'Gem web offline'),
(139,	'Worm Master'),
(138,	'Antal magi'),
(136,	'Opret adgangskode'),
(120,	'Virtuel elsker'),
(132,	'Min elsker');

-- 2021-03-10 08:44:38
