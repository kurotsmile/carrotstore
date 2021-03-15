-- Adminer 4.8.0 MySQL 5.7.33 dump

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
(104,	'Kişileri ara'),
(105,	'Aşk ya da aşk yok'),
(119,	'sanal sevgilisi 3D'),
(121,	'Sanal sevgili 2'),
(122,	'Koyun sayımı - yatağa git'),
(123,	'Hayat için müzik'),
(127,	'Yapboz duvar'),
(128,	'İncil dünyası'),
(130,	'AI Lover'),
(131,	'Sevimli sanal asistan'),
(133,	'Hızlı göz'),
(134,	'Benimle koş'),
(135,	'Web\'i çevrimdışı kaydet'),
(139,	'Solucan Ustası'),
(138,	'Magic Sayısı'),
(136,	'Şifre oluştur'),
(120,	'Sanal sevgili'),
(132,	'Sevgilim');

-- 2021-03-10 08:27:22
