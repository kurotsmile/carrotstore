-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_tr`;
CREATE TABLE `product_name_tr` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_tr`;
INSERT INTO `product_name_tr` (`id_product`, `data`) VALUES
(95,	'Ölüm Notu - Ryuk ve Rem'),
(95,	'Ölüm Notu - Ryuk ve Rem'),
(119,	'sanal sevgilisi 3D'),
(135,	'Web\'i çevrimdışı kaydet'),
(104,	'Kişileri ara'),
(128,	'İncil dünyası'),
(282,	'Benim sanal sevgilim'),
(121,	'Sanal sevgili 2'),
(122,	'Koyun sayımı - yatağa git'),
(132,	'Sevgilim'),
(138,	'Magic Sayısı'),
(133,	'Hızlı göz'),
(127,	'Yapboz duvar'),
(284,	'yırtıcı balık'),
(139,	'Solucan Ustası'),
(105,	'Aşk ya da aşk yok'),
(134,	'Benimle koş'),
(120,	'Sanal sevgili'),
(283,	'Midi Piyano Editörü'),
(136,	'Şifre oluştur'),
(131,	'Sevimli sanal asistan'),
(285,	'Futbol masası'),
(123,	'Hayat için müzik'),
(130,	'AI Lover');

-- 2021-10-18 20:38:51
