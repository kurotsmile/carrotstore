-- Adminer 4.8.1 MySQL 5.7.41 dump

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
(128,	'Mundo bíblico'),
(121,	'Amante virtual 2'),
(122,	'Contando ovejas - vete a la cama'),
(138,	'Numero Magico'),
(133,	'Ojo rápido'),
(127,	'Pared de rompecabezas'),
(105,	'Amor o no amor'),
(120,	'Amante virtual'),
(131,	'Asistente virtual linda'),
(123,	'Música para la vida'),
(134,	'Corre conmigo'),
(751,	'Súper calculadora'),
(284,	'Pez de presa'),
(285,	'Futbolín'),
(752,	'Tabla periódica química'),
(753,	'Json Editor'),
(282,	'Mi amante virtual'),
(132,	'Mi amante'),
(130,	'Amante de la IA'),
(757,	'Contador de tiempo de taxi'),
(283,	'Editor de piano midi'),
(648,	'Lee ahora'),
(758,	'diario feliz'),
(770,	'Rendimiento de gráficos GPU'),
(763,	'Excavar diamante'),
(754,	'Ajedrez de tomate'),
(772,	'Las carreras de caballos'),
(768,	'Gomoku Sakura'),
(759,	'La alcancía perdida'),
(773,	'Rompecabezas de dados'),
(765,	'Salir de Matrix'),
(761,	'Lines 98 Fruta'),
(767,	'brote de frutas'),
(771,	'Buscaminas espacial'),
(774,	'Ordenar las cartas - Sortilaire'),
(764,	'grabadora de voz profesional'),
(755,	'Redondo Cuadrado Triángulo'),
(775,	'Reina Dominó'),
(776,	'4 damas'),
(136,	'Crear contraseña'),
(762,	'recoger huevos'),
(778,	'pinguinos y dados'),
(139,	'Gusano Maestro'),
(779,	'aprender a colorear'),
(777,	'Gemas de jardín'),
(766,	'persiguiendo aviones'),
(780,	'tomate pomodoro'),
(756,	'¡Sí, 10!'),
(135,	'Guardar web sin conexión'),
(769,	'Tetris Royale'),
(781,	'Aventura de objetos perdidos');

-- 2023-04-12 20:39:56
