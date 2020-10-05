-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_id`;
CREATE TABLE `product_name_id` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_id`;
INSERT INTO `product_name_id` (`id_product`, `data`) VALUES
(95,	'Death Note - Ryuk dan Rem'),
(95,	'Death Note - Ryuk dan Rem'),
(104,	'Cari kontak'),
(105,	'Cinta atau Tidak'),
(119,	'pencinta virtual 3D'),
(120,	'Kekasih virtual'),
(121,	'Kekasih virtual 2'),
(122,	'Menghitung domba - tidur'),
(123,	'Musik seumur hidup'),
(127,	'Dinding gergaji ukir'),
(128,	'Dunia Alkitab'),
(130,	'AI Kekasih'),
(131,	'Asisten virtual yang lucu'),
(132,	'Kekasihku'),
(133,	'Mata cepat'),
(134,	'Lari denganku'),
(135,	'Simpan Web offline'),
(139,	'Master Cacing'),
(138,	'Angka Sihir'),
(136,	'Buat Kata Sandi');

-- 2020-10-05 09:42:51
