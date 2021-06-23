-- Adminer 4.8.1 MySQL 5.7.34 dump

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
(138,	'Magic Sayısı'),
(282,	'Benim sanal sevgilim'),
(127,	'Yapboz duvar'),
(130,	'AI Lover'),
(132,	'Sevgilim'),
(123,	'Hayat için müzik'),
(104,	'Kişileri ara'),
(120,	'Sanal sevgili'),
(119,	'sanal sevgilisi 3D'),
(134,	'Benimle koş'),
(122,	'Koyun sayımı - yatağa git'),
(133,	'Hızlı göz'),
(131,	'Sevimli sanal asistan'),
(139,	'Solucan Ustası'),
(135,	'Web\'i çevrimdışı kaydet'),
(136,	'Şifre oluştur'),
(128,	'İncil dünyası'),
(283,	'Midi Piyano Editörü'),
(284,	'yırtıcı balık'),
(121,	'Sanal sevgili 2'),
(105,	'Aşk ya da aşk yok');

-- 2021-06-12 17:31:21
