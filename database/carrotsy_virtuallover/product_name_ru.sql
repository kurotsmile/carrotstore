-- Adminer 4.8.1 MySQL 5.7.39 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_ru`;
CREATE TABLE `product_name_ru` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

INSERT INTO `product_name_ru` (`id_product`, `data`) VALUES
(95,	'Тетрадь смерти - Рюк и Рем'),
(95,	'Тетрадь смерти - Рюк и Рем'),
(119,	'виртуальный любовник 3D'),
(104,	'Поиск контактов'),
(128,	'Библейский мир'),
(121,	'Виртуальный любовник 2'),
(122,	'Считая овец - ложись спать'),
(138,	'Число Магия'),
(133,	'Быстрый глаз'),
(127,	'Пазл стена'),
(105,	'Любовь или нет любви'),
(120,	'Виртуальный любовник'),
(283,	'Миди-редактор фортепиано'),
(136,	'Придумать пароль'),
(131,	'Симпатичный виртуальный помощник'),
(123,	'Музыка для жизни'),
(135,	'Сохранить сеть в автономном режиме'),
(648,	'Прочитай сейчас'),
(139,	'Мастер Червя'),
(134,	'Беги со мной'),
(751,	'Супер калькулятор'),
(284,	'Хищная рыба'),
(285,	'Футбольный стол'),
(752,	'Химическая периодическая таблица'),
(753,	'Редактор Json'),
(754,	'Помидорные шахматы'),
(755,	'Круглый квадратный треугольник'),
(756,	'Ага 10!'),
(282,	'Мой виртуальный любовник'),
(132,	'Мой любовник'),
(130,	'AI Lover');

-- 2022-08-20 03:47:48
