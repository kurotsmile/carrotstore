-- Adminer 4.8.1 MySQL 5.7.35 dump

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
(119,	'pencinta virtual 3D'),
(135,	'Simpan Web offline'),
(104,	'Cari kontak'),
(128,	'Dunia Alkitab'),
(282,	'Kekasih virtual saya'),
(121,	'Kekasih virtual 2'),
(122,	'Menghitung domba - tidur'),
(132,	'Kekasihku'),
(138,	'Angka Sihir'),
(133,	'Mata cepat'),
(127,	'Dinding gergaji ukir'),
(284,	'Ikan pemangsa'),
(139,	'Master Cacing'),
(105,	'Cinta atau Tidak'),
(134,	'Lari denganku'),
(120,	'Kekasih virtual'),
(283,	'Editor Piano Midi'),
(136,	'Buat Kata Sandi'),
(131,	'Asisten virtual yang lucu'),
(285,	'Meja sepak bola'),
(123,	'Musik seumur hidup'),
(130,	'AI Kekasih');

-- 2021-10-18 22:06:28
