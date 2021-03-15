-- Adminer 4.8.0 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_ru`;
CREATE TABLE `product_name_ru` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_ru`;
INSERT INTO `product_name_ru` (`id_product`, `data`) VALUES
(95,	'Тетрадь смерти - Рюк и Рем'),
(95,	'Тетрадь смерти - Рюк и Рем'),
(104,	'Поиск контактов'),
(105,	'Любовь или нет любви'),
(119,	'виртуальный любовник 3D'),
(121,	'Виртуальный любовник 2'),
(122,	'Считая овец - ложись спать'),
(123,	'Музыка для жизни'),
(127,	'Пазл стена'),
(128,	'Библейский мир'),
(130,	'AI Lover'),
(131,	'Симпатичный виртуальный помощник'),
(133,	'Быстрый глаз'),
(134,	'Беги со мной'),
(135,	'Сохранить сеть в автономном режиме'),
(139,	'Мастер Червя'),
(138,	'Число Магия'),
(136,	'Придумать пароль'),
(120,	'Виртуальный любовник'),
(132,	'Мой любовник');

-- 2021-03-10 07:46:11
