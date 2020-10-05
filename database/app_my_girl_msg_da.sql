-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_msg_da`;
CREATE TABLE `app_my_girl_msg_da` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `func` varchar(30) NOT NULL,
  `chat` text NOT NULL,
  `sex` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `color` varchar(10) NOT NULL,
  `q1` varchar(200) NOT NULL,
  `q2` varchar(200) NOT NULL,
  `r1` varchar(200) NOT NULL,
  `r2` varchar(200) NOT NULL,
  `vibrate` varchar(1) NOT NULL,
  `effect` int(2) NOT NULL,
  `action` int(2) NOT NULL DEFAULT '0',
  `face` int(2) NOT NULL DEFAULT '0',
  `certify` int(1) NOT NULL,
  `author` varchar(30) NOT NULL,
  `character_sex` int(1) NOT NULL,
  `disable` int(1) NOT NULL DEFAULT '0',
  `ver` int(1) NOT NULL DEFAULT '0',
  `os` varchar(20) NOT NULL,
  `limit_chat` int(1) NOT NULL DEFAULT '0',
  `limit_date` int(2) NOT NULL,
  `limit_month` int(2) NOT NULL,
  `effect_customer` varchar(10) NOT NULL,
  `limit_day` varchar(10) NOT NULL,
  `user_create` varchar(2) NOT NULL,
  `user_update` varchar(2) NOT NULL,
  `os_window` varchar(1) NOT NULL DEFAULT '0',
  `os_ios` varchar(1) NOT NULL DEFAULT '0',
  `os_android` varchar(1) NOT NULL DEFAULT '0',
  `file_url` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_msg_da`;
INSERT INTO `app_my_girl_msg_da` (`id`, `func`, `chat`, `sex`, `status`, `color`, `q1`, `q2`, `r1`, `r2`, `vibrate`, `effect`, `action`, `face`, `certify`, `author`, `character_sex`, `disable`, `ver`, `os`, `limit_chat`, `limit_date`, `limit_month`, `effect_customer`, `limit_day`, `user_create`, `user_update`, `os_window`, `os_ios`, `os_android`, `file_url`) VALUES
(1,	'bat_chuyen',	'Maj måned var kommet, når hvert glædelig hjerte begynder at blomstre og frembringe frugt',	0,	2,	'#F21B1B',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'da',	1,	1,	0,	'',	1,	0,	5,	'944',	'',	'2',	'2',	'0',	'0',	'0',	''),
(2,	'dam',	'Verdens foretrukne sæson er foråret. Alle ting synes muligt i maj',	0,	3,	'#EAFFAB',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'da',	1,	1,	0,	'',	1,	0,	5,	'1614',	'',	'2',	'2',	'0',	'0',	'0',	''),
(3,	'dam',	'Jeg ved godt, at juniregnen bare falder.',	0,	3,	'#D7FF26',	'',	'',	'',	'',	'',	5,	1,	4,	0,	'da',	1,	1,	0,	'',	1,	0,	6,	'1051',	'',	'2',	'4',	'0',	'0',	'0',	''),
(4,	'bat_chuyen',	'Det er juni måned, måneden med blade og roser, når hyggelige seværdigheder hylder øjnene og behagelige dufte næserne.',	0,	2,	'#FF6200',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'da',	1,	1,	0,	'',	1,	0,	6,	'1455',	'',	'2',	'4',	'0',	'0',	'0',	''),
(5,	'bat_chuyen',	'Det er juni måned, måneden med blade og roser, når hyggelige seværdigheder hylder øjnene og behagelige dufte næserne.',	1,	2,	'#0DFF21',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'da',	0,	1,	0,	'',	1,	0,	6,	'1016',	'',	'2',	'4',	'0',	'0',	'0',	''),
(6,	'dam',	'Jeg ved godt, at juniregnen bare falder.',	1,	1,	'#29FFDF',	'',	'',	'',	'',	'',	5,	1,	0,	0,	'da',	0,	1,	0,	'',	1,	0,	6,	'1594',	'',	'2',	'4',	'0',	'0',	'0',	''),
(7,	'dam',	'Uanset hvad julen bringer til dig, vær det godt eller dårligt; Hold altid det smil på dit ansigt, uanset hvad.',	0,	1,	'#C1FF5E',	'',	'',	'',	'',	'',	0,	16,	1,	0,	'da',	1,	1,	0,	'',	1,	0,	7,	'1004',	'',	'2',	'4',	'0',	'0',	'0',	''),
(8,	'dam',	'Uanset hvad julen bringer til dig, vær det godt eller dårligt. Hold altid det smil på dit ansigt, uanset hvad.',	1,	2,	'#FF1205',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'da',	0,	1,	0,	'',	1,	0,	7,	'1469',	'',	'2',	'4',	'0',	'0',	'0',	''),
(9,	'bat_chuyen',	'Hvor god er sommervarmen, uden vinterens kulde for at give det sødme.',	1,	2,	'#FBFF9C',	'',	'',	'',	'',	'',	0,	18,	2,	0,	'da',	0,	1,	0,	'',	1,	0,	7,	'498',	'',	'2',	'4',	'0',	'0',	'0',	''),
(10,	'bat_chuyen',	'Vinden i slutningen af sommeren gør folk rastløse.',	0,	0,	'#FCFF69',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'da',	1,	1,	0,	'',	1,	0,	7,	'1052',	'',	'2',	'4',	'0',	'0',	'0',	''),
(11,	'bat_chuyen',	'Jeg elsker september, især når du er sammen med mig!',	0,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'da',	1,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(12,	'bat_chuyen',	'Jeg elsker september, især når du er sammen med mig!',	1,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'da',	0,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(13,	'bat_chuyen',	'Julen er her. Ønsker dig en god jul, glad og lad ikke forkølelse. Glædelig jul.',	0,	2,	'#FBFF1F',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'da',	1,	1,	0,	'',	1,	0,	12,	'1411',	'',	'2',	'4',	'0',	'0',	'0',	''),
(14,	'bat_chuyen',	'Julen er her. Ønsker dig en lykkelig og lykkelig jul og lad dig ikke forkøle dig. Glædelig jul.',	1,	2,	'#BFFFAD',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'da',	0,	1,	0,	'',	1,	0,	12,	'1415',	'',	'2',	'4',	'0',	'0',	'0',	''),
(15,	'thong_bao',	'Vinteren er så kold, {ten_user}! Hvis du går ud, skal du tage på en masse varmt tøj for at undgå det!',	0,	1,	'#FEFFC2',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'da',	1,	1,	0,	'',	1,	0,	12,	'1127',	'',	'',	'4',	'0',	'0',	'0',	''),
(16,	'bat_chuyen',	'I sæsonen af Covid 19 skal du være forsigtig med ikke at fokusere på overfyldte steder og skal bære en maske, uanset hvor du går!',	0,	3,	'#FFFBD1',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'da',	1,	0,	0,	'',	1,	0,	0,	'1615',	'',	'2',	'4',	'0',	'0',	'0',	''),
(17,	'bat_chuyen',	'Selama musim Covid 19, Anda harus berhati-hati untuk tidak fokus pada tempat-tempat ramai dan harus mengenakan topeng ke mana pun Anda pergi!...',	1,	3,	'#E6C9FF',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'da',	0,	0,	0,	'',	1,	0,	0,	'179',	'',	'2',	'4',	'0',	'0',	'0',	'');

-- 2020-10-05 07:50:19
