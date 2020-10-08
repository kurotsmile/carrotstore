-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_user_id`;
CREATE TABLE `app_my_girl_user_id` (
  `id_device` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `name` varchar(20) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `date_start` date NOT NULL,
  `date_cur` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL,
  `avatar_url` text NOT NULL,
  `password` tinytext NOT NULL,
  FULLTEXT KEY `name` (`name`),
  FULLTEXT KEY `sdt` (`sdt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_user_id`;
INSERT INTO `app_my_girl_user_id` (`id_device`, `name`, `sex`, `date_start`, `date_cur`, `address`, `sdt`, `status`, `email`, `avatar_url`, `password`) VALUES
('77f708ce2ac126baf09df98277d983d2',	'Mutiara',	'1',	'2020-02-20',	'2020-02-20',	'',	'081339895993',	0,	'',	'',	''),
('5ebc08c8f04845ebc08c8f04bf',	'Mega-boxoffice',	'0',	'2020-05-13',	'2020-05-13',	'',	'+6285732372244',	0,	'',	'',	'Penomp00'),
('105676395811551217798',	'wanda rata',	'1',	'2020-05-13',	'2020-05-25',	'United Kingdom',	'',	1,	'wandarata807@gmail.com',	'https://lh3.googleusercontent.com/a-/AOh14GjAjv0_Hj51mDLg_xyYy9GW4P6QIQWF2E9gW0nx=s96-c',	''),
('e862cbe2b22ad86d80048231b044a7ed',	'Someone',	'0',	'2020-10-02',	'2020-10-02',	'',	'081218526662',	0,	'',	'',	'');

-- 2020-10-08 16:45:18
