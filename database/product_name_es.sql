-- Adminer 4.8.0 MySQL 5.7.33 dump

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
(104,	'Buscar contactos'),
(105,	'Amor o no amor'),
(119,	'amante virtual 3D'),
(121,	'Amante virtual 2'),
(122,	'Contando ovejas - vete a la cama'),
(123,	'Música para la vida'),
(127,	'Pared de rompecabezas'),
(128,	'Mundo bíblico'),
(130,	'Amante de la IA'),
(131,	'Asistente virtual linda'),
(133,	'Ojo rápido'),
(134,	'Corre conmigo'),
(135,	'Guardar web sin conexión'),
(139,	'Gusano Maestro'),
(138,	'Numero Magico'),
(136,	'Crear contraseña'),
(120,	'Amante virtual'),
(132,	'Mi amante');

-- 2021-03-10 07:16:51
