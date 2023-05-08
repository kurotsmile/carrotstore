-- Adminer 4.8.1 MySQL 5.7.41 dump

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
(128,	'Monde biblique'),
(121,	'Amant virtuel 2'),
(122,	'Compter les moutons - se coucher'),
(138,	'Nombre magique'),
(133,	'Oeil rapide'),
(127,	'Mur de puzzle'),
(105,	'Amour ou pas d\'amour'),
(120,	'Amant virtuel'),
(131,	'Assistant virtuel mignon'),
(123,	'Musique pour la vie'),
(134,	'Cours avec moi'),
(751,	'Super Calculatrice'),
(284,	'Poisson de proie'),
(285,	'Bucket ball'),
(752,	'Tableau périodique chimique'),
(753,	'Éditeur Json'),
(282,	'Mon amoureux virtuel'),
(132,	'Mon amour'),
(130,	'Amoureux de l\'IA'),
(757,	'Compteur de temps de taxi'),
(283,	'Éditeur Midi Piano'),
(648,	'ERead Now'),
(758,	'Journal heureux'),
(770,	'Performances graphiques GPU'),
(763,	'Creuser un diamant'),
(754,	'Échecs à la tomate'),
(772,	'Course de chevaux'),
(768,	'Gomoku Sakura'),
(759,	'La tirelire perdue'),
(773,	'Puzzle de dés'),
(765,	'Quittez la matrice'),
(761,	'Lines 98 Fruta'),
(767,	'Pousse de fruits'),
(771,	'Démineur de l\'espace'),
(774,	'Trier les cartes - Sortilaire'),
(764,	'Enregistreur vocal professionnel'),
(755,	'Rond Carré Triangle'),
(775,	'Reine Dominos'),
(776,	'4 pions'),
(136,	'Créer un mot de passe'),
(762,	'Ramasser les oeufs'),
(778,	'Pingouins et dés'),
(139,	'Maître des vers'),
(779,	'Apprendre à colorier'),
(777,	'Joyaux du jardin'),
(766,	'Chasser des avions'),
(780,	'Tomate Pomodoro'),
(756,	'Ouais 10 !'),
(135,	'Enregistrer le Web hors ligne'),
(769,	'Tetris Royal'),
(781,	'Aventure d\'objets perdus');

-- 2023-04-12 20:50:52
