-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_pl`;
CREATE TABLE `product_name_pl` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_pl`;
INSERT INTO `product_name_pl` (`id_product`, `data`) VALUES
(95,	'Death Note - Ryuk and Rem'),
(95,	'Death Note - Ryuk and Rem'),
(119,	'wirtualny kochanek 3D'),
(135,	'Zapisz sieć offline'),
(104,	'Wyszukaj kontakty'),
(128,	'Świat biblijny'),
(282,	'Mój wirtualny kochanek'),
(121,	'Wirtualny kochanek 2'),
(122,	'Liczenie owiec - idź spać'),
(132,	'Mój kochanek'),
(138,	'Liczby magiczne'),
(133,	'Szybkie oko'),
(127,	'Ściana układanki'),
(284,	'Ryby drapieżne'),
(139,	'Worm Master'),
(105,	'Love or No love'),
(134,	'Biegnij ze mną'),
(120,	'Wirtualny kochanek'),
(283,	'Edytor fortepianu Midi'),
(136,	'Stwórz hasło'),
(131,	'Uroczy wirtualny asystent'),
(285,	'Stół do piłki nożnej'),
(123,	'Muzyka dla życia'),
(130,	'Kochanek AI');

-- 2021-10-18 22:05:00
