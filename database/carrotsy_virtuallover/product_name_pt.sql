-- Adminer 4.8.1 MySQL 5.7.34 dump

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
(138,	'Number Magic'),
(282,	'Meu amante virtual'),
(127,	'Parede de quebra-cabeça'),
(130,	'Amante do AI'),
(132,	'Meu amante'),
(123,	'Música para a vida'),
(104,	'Pesquisar contatos'),
(120,	'Amante virtual'),
(119,	'amante virtual 3D'),
(134,	'Corra comigo'),
(122,	'Contando ovelhas - vá para a cama'),
(133,	'Olho rápido'),
(131,	'Assistente virtual bonito'),
(139,	'Mestre Worm'),
(135,	'Salvar a Web offline'),
(136,	'Criar senha'),
(128,	'Mundo bíblico'),
(283,	'Editor de Piano Midi'),
(284,	'Peixe de rapina'),
(121,	'Amante virtual 2'),
(105,	'Amor ou nenhum amor');

-- 2021-06-12 17:00:53
