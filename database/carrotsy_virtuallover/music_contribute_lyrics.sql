-- Adminer 4.8.1 MySQL 5.7.34 dump

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

-- 2021-07-01 04:19:52
