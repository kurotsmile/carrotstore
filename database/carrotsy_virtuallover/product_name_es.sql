-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_es`;
CREATE TABLE `product_name_es` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_es`;
INSERT INTO `product_name_es` (`id_product`, `data`) VALUES
(95,	'Death note - Ryuk y Rem'),
(95,	'Death note - Ryuk y Rem'),
(119,	'amante virtual 3D'),
(135,	'Guardar web sin conexión'),
(104,	'Buscar contactos'),
(128,	'Mundo bíblico'),
(282,	'Mi amante virtual'),
(121,	'Amante virtual 2'),
(122,	'Contando ovejas - vete a la cama'),
(132,	'Mi amante'),
(138,	'Numero Magico'),
(133,	'Ojo rápido'),
(127,	'Pared de rompecabezas'),
(284,	'Pez de presa'),
(139,	'Gusano Maestro'),
(105,	'Amor o no amor'),
(134,	'Corre conmigo'),
(120,	'Amante virtual'),
(283,	'Editor de piano midi'),
(136,	'Crear contraseña'),
(131,	'Asistente virtual linda'),
(285,	'Futbolín'),
(123,	'Música para la vida'),
(130,	'Amante de la IA');

-- 2021-10-18 20:23:55
