-- Adminer 4.8.0 MySQL 5.7.33 dump

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

TRUNCATE `music_contribute_lyrics`;
INSERT INTO `music_contribute_lyrics` (`id_music`, `lyrics`, `lang`) VALUES
(53155,	' sdasdasd',	'vi');

-- 2021-03-10 06:53:34
