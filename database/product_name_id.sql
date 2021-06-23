-- Adminer 4.8.1 MySQL 5.7.34 dump

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
(138,	'Angka Sihir'),
(282,	'Kekasih virtual saya'),
(127,	'Dinding gergaji ukir'),
(130,	'AI Kekasih'),
(132,	'Kekasihku'),
(123,	'Musik seumur hidup'),
(104,	'Cari kontak'),
(120,	'Kekasih virtual'),
(119,	'pencinta virtual 3D'),
(134,	'Lari denganku'),
(122,	'Menghitung domba - tidur'),
(133,	'Mata cepat'),
(131,	'Asisten virtual yang lucu'),
(139,	'Master Cacing'),
(135,	'Simpan Web offline'),
(136,	'Buat Kata Sandi'),
(128,	'Dunia Alkitab'),
(283,	'Editor Piano Midi'),
(284,	'Ikan pemangsa'),
(121,	'Kekasih virtual 2'),
(105,	'Cinta atau Tidak');

-- 2021-06-12 17:36:00
