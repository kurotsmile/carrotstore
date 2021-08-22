-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `playlist_pt`;
CREATE TABLE `playlist_pt` (
  `id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `length` varchar(3) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `playlist_pt`;
INSERT INTO `playlist_pt` (`id`, `user_id`, `data`, `name`, `length`) VALUES
('606f0aad6e598606f0aad6e5d4',	'',	'[{\"id\":\"606\",\"chat\":\"?????? (???) : ??? ?????????\",\"color\":\"#FF5700\",\"file_url\":\"\",\"author\":\"th\"}]',	'Minha playlist',	'1'),
('610993e4bfd6d610993e4bfdaa',	'9211d23b98b10433d7c4cd259d54c232',	'[{\"id\":\"46\",\"chat\":\"Ana Vilela - Trem-Bala \",\"color\":\"#FDC9FF\",\"file_url\":\"\",\"author\":\"pt\"}]',	'MPB',	'1');

-- 2021-08-13 12:35:13
