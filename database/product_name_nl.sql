-- Adminer 4.8.1 MySQL 5.7.34 dump

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
(138,	'Getalmagie'),
(282,	'Mijn virtuele minnaar'),
(127,	'Puzzel muur'),
(130,	'AI Lover'),
(132,	'Mijn geliefde'),
(123,	'Muziek voor het leven'),
(104,	'Zoeken naar contacten'),
(120,	'Virtuele minnaar'),
(119,	'virtuele minnaar 3D'),
(134,	'Ren met me'),
(122,	'Schapen tellen - ga naar bed'),
(133,	'Snel in de gaten'),
(131,	'Leuke virtuele assistent'),
(139,	'Worm Master'),
(135,	'Web offline opslaan'),
(136,	'Maak een wachtwoord'),
(128,	'Bijbel wereld'),
(283,	'Midi Piano-editor'),
(284,	'Roofvissen'),
(121,	'Virtuele minnaar 2'),
(105,	'Liefde of geen liefde');

-- 2021-06-12 17:34:03
