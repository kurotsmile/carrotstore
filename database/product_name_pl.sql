-- Adminer 4.8.1 MySQL 5.7.34 dump

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
(138,	'Liczby magiczne'),
(282,	'Mój wirtualny kochanek'),
(127,	'Ściana układanki'),
(130,	'Kochanek AI'),
(132,	'Mój kochanek'),
(123,	'Muzyka dla życia'),
(104,	'Wyszukaj kontakty'),
(120,	'Wirtualny kochanek'),
(119,	'wirtualny kochanek 3D'),
(134,	'Biegnij ze mną'),
(122,	'Liczenie owiec - idź spać'),
(133,	'Szybkie oko'),
(131,	'Uroczy wirtualny asystent'),
(139,	'Worm Master'),
(135,	'Zapisz sieć offline'),
(136,	'Stwórz hasło'),
(128,	'Świat biblijny'),
(283,	'Edytor fortepianu Midi'),
(284,	'Ryby drapieżne'),
(121,	'Wirtualny kochanek 2'),
(105,	'Love or No love');

-- 2021-06-12 17:00:33
