-- Adminer 4.8.0 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `music_contribute_lyrics`;
CREATE TABLE `music_contribute_lyrics` (
  `id_music` int(11) NOT NULL,
  `lyrics` text NOT NULL,
  `lang` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `music_contribute_lyrics` (`id_music`, `lyrics`, `lang`) VALUES
(141,	'contain_lyrics',	'vi'),
(53155,	' sdasdasd',	'vi'),
(138,	'contain_lyrics',	'vi'),
(138,	'contain_lyrics',	'vi'),
(138,	'contain_lyrics',	'vi'),
(138,	'XND7ImTL',	'vi'),
(138,	'-1 OR 2+444-444-1=0+0+0+1 -- ',	'vi'),
(138,	'-1 OR 2+375-375-1=0+0+0+1',	'vi'),
(138,	'1',	'vi'),
(138,	'-1\" OR 2+520-520-1=0+0+0+1 -- ',	'vi'),
(138,	'if(now()=sysdate(),sleep(15),0)',	'vi'),
(-5,	'contain_lyrics',	'vi'),
(-1,	'contain_lyrics',	'vi'),
(0,	'contain_lyrics',	'vi'),
(53,	'contain_lyrics',	'0'),
(53,	'e',	'-1'),
(53,	'contain_lyrics',	'-1'),
(58,	'contain_lyrics',	'0'),
(58,	'e',	'0'),
(53,	'contain_lyrics',	'vi'),
(97,	'contain_lyrics',	'vi'),
(97,	'contain_lyrics',	'vi'),
(97,	'e',	'1'),
(97,	'contain_lyrics',	'0'),
(97,	'e',	'0'),
(97,	'contain_lyrics',	'0'),
(97,	'e',	'0'),
(97,	'eesAy8eo',	'0\"'),
(97,	'-1 OR 2+856-856-1=0+0+0+1 -- ',	'0\"'),
(97,	'-1 OR 2+44-44-1=0+0+0+1',	'0\"'),
(97,	'1',	'0'),
(97,	'1',	'0'),
(97,	'1',	'0'),
(97,	'-1\" OR 2+183-183-1=0+0+0+1 -- ',	'0'),
(97,	'-1\" OR 2+183-183-1=0+0+0+1 -- ',	'0'),
(97,	'1',	'0'),
(97,	'1',	'0'),
(97,	'contain_lyrics',	'0'),
(97,	'1\0????%2527%2522',	'0'),
(97,	'contain_lyrics',	'0'),
(97,	'-1\" OR 2+183-183-1=0+0+0+1 -- ',	'0'),
(97,	'contain_lyrics',	'0'),
(141,	'contain_lyrics',	'vi'),
(124,	'contain_lyrics',	'vi'),
(58,	'contain_lyrics',	'vi'),
(58,	'contain_lyrics',	'vi'),
(57,	'contain_lyrics',	'vi'),
(57,	'contain_lyrics',	'vi'),
(58,	'contain_lyrics',	'it'),
(57,	'contain_lyrics',	'it'),
(143,	'contain_lyrics',	'vi'),
(486,	'contain_lyrics',	'vi'),
(299,	'contain_lyrics',	'vi'),
(124,	'contain_lyrics',	'it'),
(833,	'contain_lyrics',	'vi'),
(299,	'contain_lyrics',	'it'),
(140,	'contain_lyrics',	'vi'),
(140,	'contain_lyrics',	'vi'),
(432,	'contain_lyrics',	'vi'),
(143,	'contain_lyrics',	'it'),
(140,	'contain_lyrics',	'it'),
(359,	'contain_lyrics',	'vi'),
(6345,	'contain_lyrics',	'vi'),
(137,	'contain_lyrics',	'it'),
(366,	'contain_lyrics',	'vi'),
(139,	'contain_lyrics',	'it'),
(137,	'contain_lyrics',	'vi'),
(361,	'contain_lyrics',	'it'),
(360,	'contain_lyrics',	'it'),
(139,	'contain_lyrics',	'vi'),
(685,	'contain_lyrics',	'vi'),
(351,	'contain_lyrics',	'vi'),
(142,	'contain_lyrics',	'it'),
(1251,	'contain_lyrics',	'vi'),
(725,	'contain_lyrics',	'vi'),
(77,	'contain_lyrics',	'vi'),
(361,	'contain_lyrics',	'vi'),
(431,	'contain_lyrics',	'vi'),
(331,	'contain_lyrics',	'vi'),
(331,	'contain_lyrics',	'vi'),
(331,	'e',	'vi'),
(641,	'contain_lyrics',	'vi'),
(138,	'contain_lyrics',	'1'),
(138,	'contain_lyrics',	'vi')
ON DUPLICATE KEY UPDATE `id_music` = VALUES(`id_music`), `lyrics` = VALUES(`lyrics`), `lang` = VALUES(`lang`);

-- 2021-04-22 18:00:50
