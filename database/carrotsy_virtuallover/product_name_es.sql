-- Adminer 4.8.1 MySQL 5.7.40 dump

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
(104,	'Buscar contactos'),
(128,	'Mundo bíblico'),
(121,	'Amante virtual 2'),
(122,	'Contando ovejas - vete a la cama'),
(138,	'Numero Magico'),
(133,	'Ojo rápido'),
(127,	'Pared de rompecabezas'),
(105,	'Amor o no amor'),
(120,	'Amante virtual'),
(136,	'Crear contraseña'),
(131,	'Asistente virtual linda'),
(123,	'Música para la vida'),
(135,	'Guardar web sin conexión'),
(139,	'Gusano Maestro'),
(134,	'Corre conmigo'),
(751,	'Súper calculadora'),
(284,	'Pez de presa'),
(285,	'Futbolín'),
(752,	'Tabla periódica química'),
(753,	'Json Editor'),
(755,	'Redondo Cuadrado Triángulo'),
(756,	'¡Sí, 10!'),
(282,	'Mi amante virtual'),
(132,	'Mi amante'),
(130,	'Amante de la IA'),
(754,	'Ajedrez de tomate'),
(757,	'Contador de tiempo de taxi'),
(648,	'Lee ahora'),
(758,	'diario feliz'),
(283,	'Editor de piano midi'),
(759,	'La alcancía perdida');

-- 2022-10-23 06:19:37
