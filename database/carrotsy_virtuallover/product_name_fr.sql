-- Adminer 4.8.1 MySQL 5.7.35 dump

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
(119,	'amant virtuel 3D'),
(135,	'Enregistrer le Web hors ligne'),
(104,	'Rechercher des contacts'),
(128,	'Monde biblique'),
(282,	'Mon amoureux virtuel'),
(121,	'Amant virtuel 2'),
(122,	'Compter les moutons - se coucher'),
(132,	'Mon amour'),
(138,	'Nombre magique'),
(133,	'Oeil rapide'),
(127,	'Mur de puzzle'),
(284,	'Poisson de proie'),
(139,	'Maître des vers'),
(105,	'Amour ou pas d\'amour'),
(134,	'Cours avec moi'),
(120,	'Amant virtuel'),
(283,	'Éditeur Midi Piano'),
(136,	'Créer un mot de passe'),
(131,	'Assistant virtuel mignon'),
(285,	'Bucket ball'),
(123,	'Musique pour la vie'),
(130,	'Amoureux de l\'IA');

-- 2021-10-18 22:06:45
