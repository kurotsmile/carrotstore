-- Adminer 4.8.1 MySQL 5.7.35 dump

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
(119,	'virtuele minnaar 3D'),
(135,	'Web offline opslaan'),
(104,	'Zoeken naar contacten'),
(128,	'Bijbel wereld'),
(282,	'Mijn virtuele minnaar'),
(121,	'Virtuele minnaar 2'),
(122,	'Schapen tellen - ga naar bed'),
(132,	'Mijn geliefde'),
(138,	'Getalmagie'),
(133,	'Snel in de gaten'),
(127,	'Puzzel muur'),
(284,	'Roofvissen'),
(139,	'Worm Master'),
(105,	'Liefde of geen liefde'),
(134,	'Ren met me'),
(120,	'Virtuele minnaar'),
(283,	'Midi Piano-editor'),
(136,	'Maak een wachtwoord'),
(131,	'Leuke virtuele assistent'),
(285,	'Tafelvoetbal'),
(123,	'Muziek voor het leven'),
(130,	'AI Lover');

-- 2021-10-18 22:09:39
