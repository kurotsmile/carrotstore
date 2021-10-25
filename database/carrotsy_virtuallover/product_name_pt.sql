-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_pt`;
CREATE TABLE `product_name_pt` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_pt`;
INSERT INTO `product_name_pt` (`id_product`, `data`) VALUES
(95,	'Nota de morte - Ryuk e Rem'),
(95,	'Nota de morte - Ryuk e Rem'),
(119,	'amante virtual 3D'),
(135,	'Salvar a Web offline'),
(104,	'Pesquisar contatos'),
(128,	'Mundo bíblico'),
(282,	'Meu amante virtual'),
(121,	'Amante virtual 2'),
(122,	'Contando ovelhas - vá para a cama'),
(132,	'Meu amante'),
(138,	'Number Magic'),
(133,	'Olho rápido'),
(127,	'Parede de quebra-cabeça'),
(284,	'Peixe de rapina'),
(139,	'Mestre Worm'),
(105,	'Amor ou nenhum amor'),
(134,	'Corra comigo'),
(120,	'Amante virtual'),
(283,	'Editor de Piano Midi'),
(136,	'Criar senha'),
(131,	'Assistente virtual bonito'),
(285,	'Matraquilhos'),
(123,	'Música para a vida'),
(130,	'Amante do AI');

-- 2021-10-18 22:05:51
