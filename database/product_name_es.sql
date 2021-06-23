-- Adminer 4.8.1 MySQL 5.7.34 dump

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
(138,	'Numero Magico'),
(282,	'Mi amante virtual'),
(127,	'Pared de rompecabezas'),
(130,	'Amante de la IA'),
(132,	'Mi amante'),
(123,	'Música para la vida'),
(104,	'Buscar contactos'),
(120,	'Amante virtual'),
(119,	'amante virtual 3D'),
(134,	'Corre conmigo'),
(122,	'Contando ovejas - vete a la cama'),
(133,	'Ojo rápido'),
(131,	'Asistente virtual linda'),
(139,	'Gusano Maestro'),
(135,	'Guardar web sin conexión'),
(136,	'Crear contraseña'),
(128,	'Mundo bíblico'),
(283,	'Editor de piano midi'),
(284,	'Pez de presa'),
(121,	'Amante virtual 2'),
(105,	'Amor o no amor');

-- 2021-06-12 17:00:05
