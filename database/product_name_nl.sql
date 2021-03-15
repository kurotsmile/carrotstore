-- Adminer 4.8.0 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_nl`;
CREATE TABLE `product_name_nl` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_nl`;
INSERT INTO `product_name_nl` (`id_product`, `data`) VALUES
(95,	'Death Note - Ryuk en Rem'),
(95,	'Death Note - Ryuk en Rem'),
(104,	'Zoeken naar contacten'),
(105,	'Liefde of geen liefde'),
(119,	'virtuele minnaar 3D'),
(121,	'Virtuele minnaar 2'),
(122,	'Schapen tellen - ga naar bed'),
(123,	'Muziek voor het leven'),
(127,	'Puzzel muur'),
(128,	'Bijbel wereld'),
(130,	'AI Lover'),
(131,	'Leuke virtuele assistent'),
(133,	'Snel in de gaten'),
(134,	'Ren met me'),
(135,	'Web offline opslaan'),
(139,	'Worm Master'),
(138,	'Getalmagie'),
(136,	'Maak een wachtwoord'),
(120,	'Virtuele minnaar'),
(132,	'Mijn geliefde');

-- 2021-03-10 08:40:03
