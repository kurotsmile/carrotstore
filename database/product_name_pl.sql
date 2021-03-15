-- Adminer 4.8.0 MySQL 5.7.33 dump

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
(104,	'Wyszukaj kontakty'),
(105,	'Love or No love'),
(119,	'wirtualny kochanek 3D'),
(121,	'Wirtualny kochanek 2'),
(122,	'Liczenie owiec - idź spać'),
(123,	'Muzyka dla życia'),
(127,	'Ściana układanki'),
(128,	'Świat biblijny'),
(130,	'Kochanek AI'),
(131,	'Uroczy wirtualny asystent'),
(133,	'Szybkie oko'),
(134,	'Biegnij ze mną'),
(135,	'Zapisz sieć offline'),
(139,	'Worm Master'),
(138,	'Liczby magiczne'),
(136,	'Stwórz hasło'),
(120,	'Wirtualny kochanek'),
(132,	'Mój kochanek');

-- 2021-03-10 08:40:33
