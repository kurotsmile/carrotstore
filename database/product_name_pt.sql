-- Adminer 4.7.7 MySQL dump

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
(104,	'Pesquisar contatos'),
(105,	'Amor ou nenhum amor'),
(119,	'amante virtual 3D'),
(120,	'Amante virtual'),
(121,	'Amante virtual 2'),
(122,	'Contando ovelhas - vá para a cama'),
(123,	'Música para a vida'),
(127,	'Parede de quebra-cabeça'),
(128,	'Mundo bíblico'),
(130,	'Amante do AI'),
(131,	'Assistente virtual bonito'),
(132,	'Meu amante'),
(133,	'Olho rápido'),
(134,	'Corra comigo'),
(135,	'Salvar a Web offline'),
(139,	'Mestre Worm'),
(138,	'Number Magic'),
(136,	'Criar senha');

-- 2020-10-18 12:53:24
