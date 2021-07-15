-- Adminer 4.8.1 MySQL 5.7.34 dump

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
(138,	'Nombre magique'),
(282,	'Mon amoureux virtuel'),
(127,	'Mur de puzzle'),
(130,	'Amoureux de l\'IA'),
(132,	'Mon amour'),
(123,	'Musique pour la vie'),
(104,	'Rechercher des contacts'),
(120,	'Amant virtuel'),
(119,	'amant virtuel 3D'),
(134,	'Cours avec moi'),
(122,	'Compter les moutons - se coucher'),
(133,	'Oeil rapide'),
(131,	'Assistant virtuel mignon'),
(139,	'Maître des vers'),
(135,	'Enregistrer le Web hors ligne'),
(136,	'Créer un mot de passe'),
(128,	'Monde biblique'),
(283,	'Éditeur Midi Piano'),
(284,	'Poisson de proie'),
(121,	'Amant virtuel 2'),
(105,	'Amour ou pas d\'amour');

-- 2021-06-12 17:09:18
