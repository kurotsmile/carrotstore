-- Adminer 4.8.0 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_fr`;
CREATE TABLE `product_name_fr` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_fr`;
INSERT INTO `product_name_fr` (`id_product`, `data`) VALUES
(95,	'Note de mort - Ryuk et Rem'),
(95,	'Note de mort - Ryuk et Rem'),
(104,	'Rechercher des contacts'),
(105,	'Amour ou pas d\'amour'),
(119,	'amant virtuel 3D'),
(121,	'Amant virtuel 2'),
(122,	'Compter les moutons - se coucher'),
(123,	'Musique pour la vie'),
(127,	'Mur de puzzle'),
(128,	'Monde biblique'),
(130,	'Amoureux de l\'IA'),
(131,	'Assistant virtuel mignon'),
(133,	'Oeil rapide'),
(134,	'Cours avec moi'),
(135,	'Enregistrer le Web hors ligne'),
(139,	'Maître des vers'),
(138,	'Nombre magique'),
(136,	'Créer un mot de passe'),
(120,	'Amant virtuel'),
(132,	'Mon amour');

-- 2021-03-10 07:28:10
