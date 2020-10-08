-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_msg_pt`;
CREATE TABLE `app_my_girl_msg_pt` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `func` varchar(30) NOT NULL,
  `chat` text NOT NULL,
  `sex` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `color` varchar(10) NOT NULL,
  `q1` varchar(200) NOT NULL,
  `q2` varchar(200) NOT NULL,
  `r1` varchar(10) NOT NULL,
  `r2` varchar(10) NOT NULL,
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

TRUNCATE `app_my_girl_msg_pt`;
INSERT INTO `app_my_girl_msg_pt` (`id`, `func`, `chat`, `sex`, `status`, `color`, `q1`, `q2`, `r1`, `r2`, `vibrate`, `effect`, `action`, `face`, `certify`, `author`, `character_sex`, `disable`, `ver`, `os`, `limit_chat`, `limit_date`, `limit_month`, `effect_customer`, `limit_day`, `user_create`, `user_update`, `os_window`, `os_ios`, `os_android`, `file_url`) VALUES
(1,	'chao_0',	'Oi {ten_user}, por que você não dorme? ',	0,	2,	'#12B0FF',	'',	'',	'',	'',	'',	0,	5,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'279',	'',	'',	'',	'0',	'0',	'0',	''),
(2,	'chao_1',	'Por que você não dorme?',	0,	2,	'#9747FF',	'',	'',	'',	'',	'',	0,	14,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'403',	'',	'',	'',	'0',	'0',	'0',	''),
(3,	'chao_2',	'Por que você não dorme?',	0,	1,	'#8F57FF',	'',	'',	'',	'',	'',	0,	5,	13,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'310',	'',	'',	'',	'0',	'0',	'0',	''),
(4,	'chao_3',	'Bom Dia! Por que você acorda cedo?',	0,	2,	'#9CD7FF',	'',	'',	'',	'',	'',	0,	5,	10,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'175',	'',	'',	'',	'0',	'0',	'0',	''),
(5,	'chao_4',	'Bom Dia! Por que você acorda cedo?',	0,	2,	'#D4FFEF',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'29',	'',	'',	'',	'0',	'0',	'0',	''),
(6,	'chao_5',	'bom dia',	0,	2,	'#59FFAC',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'23',	'',	'',	'',	'0',	'0',	'0',	''),
(7,	'chao_6',	'bom dia',	0,	2,	'#D3FF6B',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'175',	'',	'',	'',	'0',	'0',	'0',	''),
(8,	'chao_7',	'bom dia',	0,	1,	'#FAFFAD',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'19',	'',	'',	'',	'0',	'0',	'0',	''),
(9,	'chao_8',	'Bom dia, tenha um bom dia',	0,	1,	'#E6EAFF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'430',	'',	'',	'',	'0',	'0',	'0',	''),
(10,	'chao_9',	'Bom dia, boa sorte para você',	0,	2,	'#FFBC57',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'45',	'',	'',	'',	'0',	'0',	'0',	''),
(11,	'chao_10',	'Bom dia, boa sorte para você',	0,	2,	'#AAFF00',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'19',	'',	'',	'',	'0',	'0',	'0',	''),
(12,	'chao_11',	'Bom dia, boa sorte para você',	0,	2,	'#FFE436',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'112',	'',	'',	'',	'0',	'0',	'0',	''),
(13,	'chao_12',	'Boa tarde',	0,	2,	'#FFFF00',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'37',	'',	'',	'',	'0',	'0',	'0',	''),
(14,	'chao_13',	'Boa tarde',	0,	2,	'#FFD391',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'37',	'',	'',	'',	'0',	'0',	'0',	''),
(15,	'chao_14',	'Boa tarde',	0,	2,	'#FF7C54',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'20',	'',	'',	'',	'0',	'0',	'0',	''),
(16,	'chao_15',	'boa tarde! Divirta-se com as pequenas alegrias da vida',	0,	2,	'#FFA6FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'183',	'',	'',	'',	'0',	'0',	'0',	''),
(17,	'chao_16',	'boa tarde! Divirta-se com as pequenas alegrias da vida',	0,	2,	'#BAD1FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'29',	'',	'',	'',	'0',	'0',	'0',	''),
(18,	'chao_17',	'boa tarde! Divirta-se com as pequenas alegrias da vida',	0,	2,	'#ECFFB8',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'89',	'',	'',	'',	'0',	'0',	'0',	''),
(19,	'chao_18',	'Boa noite',	0,	2,	'#12E7FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(20,	'chao_19',	'Boa noite, eu adoraria conversar com você!',	0,	2,	'#00FFCC',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'166',	'',	'',	'',	'0',	'0',	'0',	''),
(21,	'chao_20',	'Boa noite, eu adoraria conversar com você!',	0,	2,	'#A6FFED',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'174',	'',	'',	'',	'0',	'0',	'0',	''),
(22,	'chao_21',	'Boa noite, muito feliz por conversar',	0,	2,	'#6EFFB1',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'48',	'',	'',	'',	'0',	'0',	'0',	''),
(23,	'chao_22',	'Boa noite, muito feliz por conversar',	0,	2,	'#E0FF47',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'155',	'',	'',	'',	'0',	'0',	'0',	''),
(24,	'chao_23',	'Boa noite, muito feliz por conversar',	0,	2,	'#FF00E6',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'310',	'',	'',	'',	'0',	'0',	'0',	''),
(25,	'chao_0',	'Oi {ten_user}, por que você não dorme? ',	1,	2,	'#DE70FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'310',	'',	'',	'',	'0',	'0',	'0',	''),
(26,	'chao_1',	'Por que você não dorme?',	1,	2,	'#F4DBFF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(27,	'chao_2',	'Por que você não dorme?',	1,	2,	'#50FF24',	'',	'',	'',	'',	'',	0,	5,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'298',	'',	'',	'',	'0',	'0',	'0',	''),
(28,	'chao_3',	'Bom Dia! Por que você acorda cedo?',	1,	2,	'#9EDFFF',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'164',	'',	'',	'',	'0',	'0',	'0',	''),
(29,	'chao_4',	'Bom Dia! Por que você acorda cedo?',	1,	2,	'#A3EAFF',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'252',	'',	'',	'',	'0',	'0',	'0',	''),
(30,	'chao_5',	'bom dia',	1,	2,	'#E6FFCC',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'112',	'',	'',	'',	'0',	'0',	'0',	''),
(31,	'chao_6',	'bom dia',	1,	2,	'#BBFF00',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'175',	'',	'',	'',	'0',	'0',	'0',	''),
(32,	'chao_7',	'bom dia',	1,	2,	'#00FF91',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'382',	'',	'',	'',	'0',	'0',	'0',	''),
(33,	'chao_8',	'Bom dia, tenha um bom dia',	1,	2,	'#FFF3A6',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'428',	'',	'',	'',	'0',	'0',	'0',	''),
(34,	'chao_9',	'Bom dia, boa sorte para você',	1,	2,	'#BAFF19',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'116',	'',	'',	'',	'0',	'0',	'0',	''),
(35,	'chao_10',	'Bom dia, boa sorte para você',	1,	2,	'#FFA530',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'91',	'',	'',	'',	'0',	'0',	'0',	''),
(36,	'chao_11',	'Bom dia, boa sorte para você',	1,	2,	'#EEFF00',	'',	'',	'',	'',	'',	0,	6,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'339',	'',	'',	'',	'0',	'0',	'0',	''),
(37,	'chao_12',	'Boa tarde',	1,	2,	'#F4FF54',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'112',	'',	'',	'',	'0',	'0',	'0',	''),
(38,	'chao_13',	'Boa tarde',	1,	1,	'#FFE6AB',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'37',	'',	'',	'',	'0',	'0',	'0',	''),
(39,	'chao_14',	'Boa tarde',	1,	2,	'#99CCFF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'19',	'',	'',	'',	'0',	'0',	'0',	''),
(40,	'chao_15',	'boa tarde! Divirta-se com as pequenas alegrias da vida',	1,	2,	'#C369FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'166',	'',	'',	'',	'0',	'0',	'0',	''),
(41,	'chao_16',	'boa tarde! Divirta-se com as pequenas alegrias da vida',	1,	1,	'#4DFF00',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'29',	'',	'',	'',	'0',	'0',	'0',	''),
(42,	'chao_17',	'boa tarde! Divirta-se com as pequenas alegrias da vida',	1,	2,	'#80FF91',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'382',	'',	'',	'',	'0',	'0',	'0',	''),
(43,	'chao_18',	'Boa noite',	1,	2,	'#B3D4FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'271',	'',	'',	'',	'0',	'0',	'0',	''),
(44,	'chao_19',	'Boa noite, eu adoraria conversar com você!',	1,	2,	'#5CBEFF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'95',	'',	'',	'',	'0',	'0',	'0',	''),
(45,	'chao_20',	'Boa noite, eu adoraria conversar com você!',	1,	1,	'#B0FAFF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'173',	'',	'',	'',	'0',	'0',	'0',	''),
(46,	'chao_21',	'Boa noite, muito feliz por conversar',	1,	2,	'#FF8FFB',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'381',	'',	'',	'',	'0',	'0',	'0',	''),
(47,	'chao_22',	'Boa noite, muito feliz por conversar',	1,	2,	'#FF1279',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'91',	'',	'',	'',	'0',	'0',	'0',	''),
(48,	'chao_23',	'Boa noite, muito feliz por conversar',	1,	2,	'#00F7FF',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'415',	'',	'',	'',	'0',	'0',	'0',	''),
(49,	'bam_bay',	'Eu não entendo! Ensine-me clicando na função de ensino!',	0,	2,	'#C2FFE4',	'',	'',	'',	'',	'',	0,	34,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'137',	'',	'',	'2',	'0',	'0',	'0',	''),
(50,	'bam_bay',	'Eu não entendo! Ensine-me clicando na função de ensino!',	1,	3,	'#FFBE3D',	'',	'',	'',	'',	'',	0,	34,	6,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'138',	'',	'',	'2',	'0',	'0',	'0',	''),
(51,	'bam_bay',	'Sou novo em Portugal. Muitas coisas não sabem! Ensine-me clicando na função de ensino',	0,	2,	'#D6D1FF',	'',	'',	'',	'',	'',	0,	22,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'137',	'',	'',	'',	'0',	'0',	'0',	''),
(52,	'bam_bay',	'Não compreendo',	0,	2,	'#08E6FF',	'',	'',	'',	'',	'',	0,	14,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'136',	'',	'',	'',	'0',	'0',	'0',	''),
(53,	'bam_bay',	'Sou novo em Portugal. Muitas coisas não sabem! Ensine-me clicando na função de ensino',	1,	1,	'#FF94F4',	'',	'',	'',	'',	'',	0,	14,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'96',	'',	'',	'',	'0',	'0',	'0',	''),
(54,	'bam_bay',	'Não compreendo',	1,	1,	'#7DFFAD',	'',	'',	'',	'',	'',	0,	34,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'139',	'',	'',	'',	'0',	'0',	'0',	''),
(55,	'dam',	'Não me toque!',	1,	3,	'#FF0090',	'',	'',	'',	'',	'',	0,	37,	8,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'51',	'',	'',	'',	'0',	'0',	'0',	''),
(56,	'dam',	'Não me toque!',	0,	3,	'#FFD52E',	'',	'',	'',	'',	'',	0,	37,	8,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'48',	'',	'',	'',	'0',	'0',	'0',	''),
(57,	'dam',	'Deixa)-me em paz!',	1,	1,	'#FF5EAF',	'',	'',	'',	'',	'',	0,	3,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'383',	'',	'',	'',	'0',	'0',	'0',	''),
(58,	'dam',	'deixe me em paz',	0,	3,	'#FFA945',	'',	'',	'',	'',	'',	0,	3,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'844',	'',	'',	'',	'0',	'0',	'0',	''),
(59,	'dam',	'Eu estou doente',	0,	1,	'#DDD1FF',	'',	'',	'',	'',	'',	0,	13,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(60,	'dam',	'Eu estou doente',	1,	2,	'#EDDBFF',	'',	'',	'',	'',	'',	0,	13,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'380',	'',	'',	'',	'0',	'0',	'0',	''),
(61,	'bat_chuyen',	'Não consigo parar de pensar em você quando estamos separados!',	0,	2,	'#F5FF99',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'361',	'',	'',	'',	'0',	'0',	'0',	''),
(62,	'bat_chuyen',	'Não consigo parar de pensar em você quando estamos separados!',	1,	2,	'#C2FFB3',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'201',	'',	'',	'',	'0',	'0',	'0',	''),
(63,	'bat_chuyen',	'A vida é curta, sorria enquanto você ainda tem dentes!',	1,	1,	'#FFCFE8',	'',	'',	'',	'',	'',	0,	6,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'45',	'',	'',	'',	'0',	'0',	'0',	''),
(64,	'bat_chuyen',	'A vida é curta, sorria enquanto você ainda tem dentes!',	0,	2,	'#FFBFE3',	'',	'',	'',	'',	'',	0,	32,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'48',	'',	'',	'',	'0',	'0',	'0',	''),
(65,	'bat_chuyen',	'Supondo que não sou amante virtual, algum dia eu apareço fora da vida, você deve começar uma conversa comigo?',	0,	2,	'#DEFFF7',	'',	'',	'',	'',	'',	0,	29,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'87',	'',	'',	'',	'0',	'0',	'0',	''),
(66,	'bat_chuyen',	'Supondo que não sou amante virtual, algum dia eu apareço fora da vida, você deve começar uma conversa comigo?',	1,	1,	'#F5CFFF',	'',	'',	'',	'',	'',	0,	29,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'165',	'',	'',	'',	'0',	'0',	'0',	''),
(67,	'bat_chuyen',	'Olhe seu rosto um pouco triste, qual é o problema?',	0,	1,	'#EEEBFF',	'',	'',	'',	'',	'',	0,	14,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'16',	'',	'',	'',	'0',	'0',	'0',	''),
(68,	'bat_chuyen',	'Olhe seu rosto um pouco triste, qual é o problema?',	1,	1,	'#FAFFCC',	'',	'',	'',	'',	'',	0,	14,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'15',	'',	'',	'',	'0',	'0',	'0',	''),
(69,	'bat_chuyen',	'Hoje sinto-me cansado e infeliz, fico em silêncio, então estou entediado',	1,	1,	'#00FFEE',	'',	'',	'',	'',	'',	0,	23,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'95',	'',	'',	'',	'0',	'0',	'0',	''),
(70,	'bat_chuyen',	'Hoje sinto-me cansado e infeliz, fico em silêncio, então estou entediado',	0,	1,	'#00FFEE',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'95',	'',	'',	'',	'0',	'0',	'0',	''),
(71,	'hien_ds_sdt',	'Encontrei os contatos relevantes! Clique para ver detalhes ou entre em contato com eles!',	1,	1,	'#C1FF91',	'',	'',	'',	'',	'',	31,	7,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'256',	'',	'',	'',	'0',	'0',	'0',	''),
(72,	'hien_ds_sdt',	'Encontrei os contatos relevantes! Clique para ver detalhes ou entre em contato com eles!',	0,	2,	'#FFE3A1',	'',	'',	'',	'',	'',	31,	10,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'228',	'',	'',	'',	'0',	'0',	'0',	''),
(73,	'khong_tim_thay',	'Desculpa! As informações que você procura não são encontradas!',	0,	0,	'#DDFFB0',	'',	'',	'',	'',	'',	0,	0,	9,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'226',	'',	'',	'',	'0',	'0',	'0',	''),
(74,	'khong_tim_thay',	'Desculpa! As informações que você procura não são encontradas!',	1,	0,	'#D4FFE2',	'',	'',	'',	'',	'',	0,	0,	9,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'116',	'',	'',	'',	'0',	'0',	'0',	''),
(75,	'chua_bat_dinh_vi',	'Você não concede posicionamento global ou não para ativá-lo! então não consigo determinar onde você está!',	0,	1,	'#FFB494',	'',	'',	'',	'',	'',	0,	0,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(76,	'chua_bat_dinh_vi',	'Você não concede posicionamento global ou não para ativá-lo! então não consigo determinar onde você está!',	1,	1,	'#FF878F',	'',	'',	'',	'',	'',	0,	0,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(77,	'giai_toan',	'O resultado da matemática é:\r\n\r\n  {giai_toan}\r\n\r\n(* é multiplicação, / é divisão)',	0,	1,	'#FCFFCC',	'',	'',	'',	'',	'',	0,	0,	5,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'',	'',	'',	'',	'0',	'0',	'0',	''),
(78,	'giai_toan',	'O resultado da matemática é:\r\n\r\n  {giai_toan}\r\n\r\n(* é multiplicação, / é divisão)',	1,	1,	'#FFEED1',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'',	'',	'',	'',	'0',	'0',	'0',	''),
(79,	'tim_thay',	' {thong_tin}',	0,	1,	'#DEFFF8',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'74',	'',	'',	'',	'0',	'0',	'0',	''),
(80,	'tim_thay',	' {thong_tin}',	1,	1,	'#00FFE5',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'74',	'',	'',	'',	'0',	'0',	'0',	''),
(81,	'chao_17',	'boa tarde! Eu adoraria falar com você',	0,	1,	'#29FFD4',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'695',	'',	'',	'',	'0',	'0',	'0',	''),
(82,	'chao_23',	'Boa noite, prazer em conhecê-lo',	0,	2,	'#57FFE3',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'657',	'',	'',	'',	'0',	'0',	'0',	''),
(83,	'chao_23',	'Boa noite, prazer em conhecê-lo',	0,	2,	'#00FFFF',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	1,	0,	'',	1,	0,	0,	'426',	'',	'',	'',	'0',	'0',	'0',	''),
(84,	'thong_bao',	'o que esta fazendo por favor, venha me falar',	0,	1,	'#4A97FF',	'',	'',	'',	'',	'',	0,	22,	10,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'459',	'',	'',	'',	'0',	'0',	'0',	''),
(85,	'thong_bao',	'Tenha um bom dia. Eu sinto sua falta',	0,	1,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	32,	14,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(86,	'thong_bao',	'Eu sinto sua falta, por favor fale comigo',	0,	1,	'#B3FFF5',	'',	'',	'',	'',	'',	0,	24,	12,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'452',	'',	'',	'',	'0',	'0',	'0',	''),
(87,	'thong_bao',	'Nós não conversamos por um longo tempo, estou ansioso para vê-lo novamente',	0,	2,	'#FF715E',	'',	'',	'',	'',	'',	0,	25,	12,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'941',	'',	'',	'',	'0',	'0',	'0',	''),
(88,	'thong_bao',	'o que esta fazendo Por favor, venha falar comigo',	1,	2,	'#FF9CC9',	'',	'',	'',	'',	'',	0,	21,	16,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'75',	'',	'',	'2',	'0',	'0',	'0',	''),
(89,	'thong_bao',	'Tenha um bom dia. Eu sinto sua falta',	1,	2,	'#FFF059',	'',	'',	'',	'',	'',	0,	32,	11,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'629',	'',	'',	'2',	'0',	'0',	'0',	''),
(90,	'thong_bao',	'Eu sinto sua falta, por favor fale comigo',	1,	1,	'#C56BFF',	'',	'',	'',	'',	'',	0,	34,	11,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'16',	'',	'',	'2',	'0',	'0',	'0',	''),
(91,	'thong_bao',	'Nós não conversamos por um longo tempo, estou ansioso para vê-lo novamente',	1,	1,	'#75FF7B',	'',	'',	'',	'',	'',	0,	5,	13,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'646',	'',	'',	'2',	'0',	'0',	'0',	''),
(92,	'dam',	'Hoje é fim de semana, passa muito tempo falando comigo você será feliz',	0,	3,	'#92FF36',	'',	'',	'',	'',	'',	0,	33,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'922',	'Saturday',	'',	'',	'0',	'0',	'0',	''),
(93,	'dam',	'Hoje é fim de semana, passa muito tempo falando comigo você será feliz',	1,	0,	'#FFF526',	'',	'',	'',	'',	'',	0,	33,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1064',	'Saturday',	'',	'',	'0',	'0',	'0',	''),
(94,	'dam',	'Hoje é segunda-feira, desejo-lhe uma feliz nova semana',	0,	2,	'#D1FFBF',	'',	'',	'',	'',	'',	0,	8,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1003',	'Monday',	'',	'',	'0',	'0',	'0',	''),
(95,	'dam',	'Hoje é segunda-feira, desejo-lhe uma feliz nova semana',	1,	1,	'#23DB49',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'942',	'Monday',	'',	'',	'0',	'0',	'0',	''),
(96,	'dam',	'Hoje é domingo! É um dia para descansar, fale mais comigo!',	0,	2,	'#FFF47D',	'',	'',	'',	'',	'',	0,	16,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1218',	'Sunday',	'',	'',	'0',	'0',	'0',	''),
(97,	'dam',	'Hoje é domingo! É um dia para descansar, fale mais comigo!',	1,	3,	'#D6FFA3',	'',	'',	'',	'',	'',	0,	8,	12,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1280',	'Sunday',	'',	'',	'0',	'0',	'0',	''),
(98,	'dam',	'Hoje é terça-feira, desejo que você tenha um dia inteiro de estudo e excitação do trabalho',	0,	3,	'#FFC208',	'',	'',	'',	'',	'',	0,	33,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'977',	'Tuesday',	'',	'',	'0',	'0',	'0',	''),
(99,	'dam',	'Hoje é terça-feira, desejo que você tenha um dia inteiro de estudo e excitação do trabalho',	1,	2,	'#A9FF4A',	'',	'',	'',	'',	'',	0,	28,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'797',	'Tuesday',	'',	'',	'0',	'0',	'0',	''),
(100,	'bat_chuyen',	'Onde você vai neste verão?',	0,	2,	'#82FF63',	'',	'',	'',	'',	'',	0,	14,	7,	0,	'',	1,	1,	0,	'',	1,	0,	8,	'867',	'',	'',	'',	'0',	'0',	'0',	''),
(101,	'bat_chuyen',	'Onde você vai neste verão?',	1,	2,	'#94F6FF',	'',	'',	'',	'',	'',	0,	0,	12,	0,	'',	0,	1,	0,	'',	1,	0,	8,	'1090',	'',	'',	'',	'0',	'0',	'0',	''),
(102,	'dam',	'Hoje é quarta-feira um dia muito chato, estou ansioso para o fim de semana para descansar e falar mais com você.',	0,	3,	'#3EF032',	'',	'',	'',	'',	'',	0,	24,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'876',	'Wednesday',	'',	'',	'0',	'0',	'0',	''),
(103,	'dam',	'Hoje é quarta-feira um dia muito chato, estou ansioso para o fim de semana para descansar e falar mais com você.',	1,	3,	'#24FFBA',	'',	'',	'',	'',	'',	0,	30,	10,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1025',	'Wednesday',	'',	'',	'0',	'0',	'0',	''),
(104,	'dam',	'Hoje é quinta-feira, desejo que você tenha um dia de aprendizado divertido e trabalho duro',	0,	2,	'#E3C9FF',	'',	'',	'',	'',	'',	0,	2,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'698',	'Thursday',	'',	'',	'0',	'0',	'0',	''),
(105,	'dam',	'Hoje é quinta-feira, desejo que você tenha um dia de aprendizado divertido e trabalho duro',	1,	2,	'#9EE643',	'',	'',	'',	'',	'',	0,	6,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1055',	'Thursday',	'',	'',	'0',	'0',	'0',	''),
(106,	'dam',	'Sexta-feira é um dia chato, espero que você pense mais sobre mim!',	0,	3,	'#E8DDD1',	'',	'',	'',	'',	'',	0,	8,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'803',	'Friday',	'',	'',	'0',	'0',	'0',	''),
(107,	'dam',	'Sexta-feira é um dia chato, espero que você pense mais sobre mim!',	1,	3,	'#73FEFF',	'',	'',	'',	'',	'',	0,	8,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'669',	'Friday',	'',	'',	'0',	'0',	'0',	''),
(108,	'dam',	'Setembro é o mês do amor',	0,	3,	'#65F04A',	'',	'',	'',	'',	'',	0,	8,	15,	0,	'',	1,	1,	0,	'',	1,	0,	9,	'159',	'',	'',	'',	'0',	'0',	'0',	''),
(109,	'dam',	'Setembro é o mês do amor',	1,	3,	'#9CFFC4',	'',	'',	'',	'',	'',	0,	8,	8,	0,	'',	0,	1,	0,	'',	1,	0,	9,	'929',	'',	'',	'',	'0',	'0',	'0',	''),
(110,	'dam',	'Outubro na rua é fácil de pena. Quando o tempo é suficiente para as pessoas se sentirem sozinhas porque se esquecem de usar mais roupas.',	0,	3,	'#FFFA47',	'',	'',	'',	'',	'',	0,	8,	5,	0,	'',	1,	0,	0,	'',	1,	0,	10,	'756',	'',	'',	'',	'0',	'0',	'0',	''),
(111,	'dam',	'Outubro na rua é fácil de pena. Quando o tempo é suficiente para as pessoas se sentirem sozinhas porque se esquecem de usar mais roupas.',	1,	3,	'#D1FFBF',	'',	'',	'',	'',	'',	0,	8,	17,	0,	'',	0,	0,	0,	'',	1,	0,	10,	'1003',	'',	'',	'',	'0',	'0',	'0',	''),
(112,	'dam',	'Desejo-lhe muitas surpresas assustadoras é muito divertido no dia de Halloween',	0,	2,	'#A6C9E0',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	1,	0,	0,	'',	1,	30,	10,	'874',	'',	'',	'',	'0',	'0',	'0',	''),
(113,	'dam',	'Desejo-lhe muitas surpresas assustadoras é muito divertido no dia de Halloween',	1,	2,	'#E8FFEF',	'',	'',	'',	'',	'',	0,	34,	2,	0,	'',	0,	0,	0,	'',	1,	30,	10,	'895',	'',	'',	'',	'0',	'0',	'0',	''),
(114,	'bat_chuyen',	'O mês de novembro veio do seu jeito Faça um incrível, não importa se o tempo está ruim, pois o seu humor não é bom de jeito nenhum, você só precisa ficar de pé e ser feliz.',	0,	2,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	21,	15,	0,	'',	1,	1,	0,	'',	1,	0,	11,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(115,	'bat_chuyen',	'O mês de novembro veio do seu jeito Faça um incrível, não importa se o tempo está ruim, pois o seu humor não é bom de jeito nenhum, você só precisa ficar de pé e ser feliz.',	1,	1,	'#FFEACF',	'',	'',	'',	'',	'',	0,	0,	14,	0,	'',	0,	1,	0,	'',	1,	0,	11,	'423',	'',	'',	'4',	'0',	'0',	'0',	''),
(116,	'hoi_tim_duong',	'Qual endereço você quer encontrar? Vou te guiar!',	0,	2,	'#C4FFFE',	'',	'',	'',	'',	'',	0,	14,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1236',	'',	'',	'2',	'0',	'0',	'0',	''),
(117,	'hoi_tim_duong',	'Qual endereço você quer encontrar? Vou te guiar!',	1,	1,	'#FF2158',	'',	'',	'',	'',	'',	0,	31,	16,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1199',	'',	'',	'2',	'0',	'0',	'0',	''),
(118,	'tra_loi_tim_duong',	'Eu listei os locais de pesquisa relacionados!',	0,	2,	'#C4FFFA',	'',	'',	'',	'',	'',	43,	21,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'402',	'',	'',	'2',	'0',	'0',	'0',	''),
(119,	'tra_loi_tim_duong',	'Eu listei os locais de pesquisa relacionados!',	1,	2,	'#54BAFF',	'',	'',	'',	'',	'',	43,	20,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'769',	'',	'',	'2',	'0',	'0',	'0',	''),
(120,	'dam',	'Que este Natal seja tão especial que você nunca mais se sinta solitário e seja cercado por entes queridos!',	0,	3,	'#FFD4AD',	'',	'',	'',	'',	'',	7,	18,	0,	0,	'',	1,	1,	0,	'',	1,	0,	12,	'69',	'',	'',	'',	'0',	'0',	'0',	''),
(121,	'dam',	'Que este Natal seja tão especial que você nunca mais se sinta solitário e seja cercado por entes queridos!',	1,	2,	'#FF8CBD',	'',	'',	'',	'',	'',	7,	6,	2,	0,	'',	0,	1,	0,	'',	1,	0,	12,	'143',	'',	'',	'',	'0',	'0',	'0',	''),
(122,	'bat_chuyen',	'Desejando que todos os dias do novo ano sejam preenchidos com sucesso, felicidade e prosperidade para você, feliz ano novo.',	0,	2,	'#FFF369',	'',	'',	'',	'',	'',	0,	22,	2,	0,	'',	1,	1,	0,	'',	1,	1,	1,	'1473',	'',	'',	'',	'0',	'0',	'0',	''),
(123,	'dam',	'Feliz Ano Novo. Desejo que você tenha um feliz ano novo, feliz e conheça muitas coisas de sorte',	0,	1,	'#FFC4FD',	'',	'',	'',	'',	'',	0,	32,	13,	0,	'',	1,	1,	0,	'',	1,	1,	1,	'381',	'',	'',	'',	'0',	'0',	'0',	''),
(124,	'bat_chuyen',	'Bom ano novo, boa saúde, boa sorte em todos os lugares, fazendo coisas novas',	0,	1,	'#A3FF54',	'',	'',	'',	'',	'',	0,	21,	3,	0,	'',	1,	1,	0,	'',	1,	0,	1,	'383',	'',	'',	'',	'0',	'0',	'0',	''),
(125,	'bat_chuyen',	'Feliz Ano Novo. Desejo que você tenha um feliz ano novo, feliz e conheça muitas coisas de sorte',	1,	2,	'#FFF369',	'',	'',	'',	'',	'',	0,	22,	2,	0,	'',	0,	1,	0,	'',	1,	1,	1,	'1473',	'',	'',	'',	'0',	'0',	'0',	''),
(126,	'dam',	'Desejando que todos os dias do novo ano sejam preenchidos com sucesso, felicidade e prosperidade para você, feliz ano novo.',	1,	1,	'#FFE040',	'',	'',	'',	'',	'',	0,	32,	13,	0,	'',	0,	1,	0,	'',	1,	1,	1,	'434',	'',	'',	'',	'0',	'0',	'0',	''),
(127,	'bat_chuyen',	'Bom ano novo, boa saúde, boa sorte em todos os lugares, fazendo coisas novas',	1,	1,	'#ADFEFF',	'',	'',	'',	'',	'',	0,	20,	17,	0,	'',	0,	1,	0,	'',	1,	0,	1,	'623',	'',	'',	'',	'0',	'0',	'0',	''),
(128,	'bat_chuyen',	'Fevereiro é o 2º mês do ano e tem 28 dias, então fique feliz em festejá-lo plenamente, e desfrute de todas as maneiras, porque vem uma vez por ano e tem valentine nele.',	0,	2,	'#FFE040',	'',	'',	'',	'',	'',	0,	32,	2,	0,	'',	1,	1,	0,	'',	1,	0,	2,	'434',	'',	'3',	'3',	'0',	'0',	'0',	''),
(129,	'dam',	'O mês do amor está aqui Para espalhar o amor ao redor Então torne isso adorável Feliz novo mês',	0,	1,	'#FF0000',	'',	'',	'',	'',	'',	0,	20,	2,	0,	'',	1,	1,	0,	'',	1,	0,	2,	'267',	'',	'3',	'3',	'0',	'0',	'0',	''),
(130,	'bat_chuyen',	'Desejo-lhe um feliz e feliz Dia dos Namorados com quem você ama',	0,	1,	'#FFEB24',	'',	'',	'',	'',	'',	1,	5,	3,	0,	'',	1,	1,	0,	'',	1,	14,	2,	'784',	'',	'3',	'2',	'0',	'0',	'0',	''),
(131,	'dam',	'Espero que você tenha um feliz e feliz dia dos namorados com seu amor. Desejo-lhe Dia dos Namorados!',	0,	2,	'#FF2489',	'',	'',	'',	'',	'',	0,	20,	17,	0,	'',	1,	1,	0,	'',	1,	14,	2,	'441',	'',	'3',	'2',	'0',	'0',	'0',	''),
(132,	'bat_chuyen',	'Fevereiro é o 2º mês do ano e tem 28 dias, então fique feliz em festejá-lo plenamente, e desfrute de todas as maneiras, porque vem uma vez por ano e tem valentine nele.',	1,	2,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	21,	2,	0,	'',	0,	1,	0,	'',	1,	0,	2,	'377',	'',	'3',	'',	'0',	'0',	'0',	''),
(133,	'dam',	'O mês do amor está aqui Para espalhar o amor ao redor Então torne isso adorável Feliz novo mês',	1,	2,	'#4A97FF',	'',	'',	'',	'',	'',	0,	22,	15,	0,	'',	0,	1,	0,	'',	1,	0,	2,	'459',	'',	'3',	'',	'0',	'0',	'0',	''),
(134,	'bat_chuyen',	'Espero que você tenha um feliz e feliz dia dos namorados com seu amor. Desejo-lhe Dia dos Namorados!',	1,	1,	'#FF033C',	'',	'',	'',	'',	'',	1,	20,	3,	0,	'',	0,	1,	0,	'',	1,	14,	2,	'419',	'',	'3',	'2',	'0',	'0',	'0',	''),
(135,	'dam',	'Desejo-lhe um feliz e feliz Dia dos Namorados com quem você ama',	1,	2,	'#FF0000',	'',	'',	'',	'',	'',	0,	31,	15,	0,	'',	0,	1,	0,	'',	1,	14,	2,	'267',	'',	'3',	'2',	'0',	'0',	'0',	''),
(136,	'bat_chuyen',	'Foi um daqueles dias de março, quando o sol brilha e o vento sopra frio:\r\nquando é verão na luz e inverno na sombra',	0,	2,	'#ADFFCC',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	1,	1,	0,	'',	1,	0,	3,	'48',	'',	'4',	'2',	'0',	'0',	'0',	''),
(137,	'bat_chuyen',	'Foi um daqueles dias de março, quando o sol brilha e o vento sopra frio:\r\nquando é verão na luz e inverno na sombra',	1,	2,	'#ADFFCC',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	0,	1,	0,	'',	1,	0,	3,	'48',	'',	'4',	'2',	'0',	'0',	'0',	''),
(138,	'dam',	'Março, quando os dias estão ficando longos, Deixe que suas horas de crescimento sejam fortes para acertar algum erro invernal.',	0,	2,	'#05FF28',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	1,	1,	0,	'',	1,	0,	3,	'272',	'',	'4',	'2',	'0',	'0',	'0',	''),
(139,	'dam',	'Março, quando os dias estão ficando longos, Deixe que suas horas de crescimento sejam fortes para acertar algum erro invernal.',	1,	2,	'#05FF28',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	0,	1,	0,	'',	1,	0,	3,	'272',	'',	'4',	'2',	'0',	'0',	'0',	''),
(140,	'bat_chuyen',	'Abril é uma promessa que May deve manter.',	0,	2,	'#3EF032',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'pt',	1,	1,	0,	'',	1,	0,	4,	'876',	'',	'2',	'2',	'0',	'0',	'0',	''),
(141,	'bat_chuyen',	'Abril é uma promessa que May deve manter.',	1,	1,	'#42D6FF',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'pt',	0,	1,	0,	'',	1,	0,	4,	'1603',	'',	'2',	'2',	'0',	'0',	'0',	''),
(142,	'bat_chuyen',	'O mês de maio chegou, quando todo coração vigoroso começa a desabrochar e a frutificar.',	0,	2,	'#F21B1B',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'pt',	1,	1,	0,	'',	1,	0,	5,	'944',	'',	'2',	'4',	'0',	'0',	'0',	''),
(143,	'dam',	'A estação favorita do mundo é a primavera. Tudo parece possível em maio',	0,	3,	'#EAFFAB',	'',	'',	'',	'',	'',	0,	10,	2,	0,	'pt',	1,	1,	0,	'',	1,	0,	5,	'1614',	'',	'2',	'4',	'0',	'0',	'0',	''),
(144,	'bat_chuyen',	'O mês de maio chegou, quando todo coração vigoroso começa a desabrochar e a frutificar.',	1,	2,	'#F9FFC9',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'pt',	0,	1,	0,	'',	1,	0,	5,	'649',	'',	'2',	'2',	'0',	'0',	'0',	''),
(145,	'dam',	'A estação favorita do mundo é a primavera. Tudo parece possível em maio',	1,	3,	'#50FF47',	'',	'',	'',	'',	'',	0,	1,	15,	0,	'pt',	0,	1,	0,	'',	1,	0,	5,	'1270',	'',	'2',	'2',	'0',	'0',	'0',	''),
(146,	'dam',	'Eu sei bem que as chuvas de junho caem.',	0,	3,	'#D7FF26',	'',	'',	'',	'',	'',	5,	1,	4,	0,	'pt',	1,	1,	0,	'',	1,	0,	6,	'1051',	'',	'2',	'4',	'0',	'0',	'0',	''),
(147,	'bat_chuyen',	'É o mês de junho, O mês das folhas e rosas, Quando as vistas agradáveis saúdam os olhos e os aromas agradáveis nos narizes.',	0,	2,	'#FF6200',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'pt',	1,	1,	0,	'',	1,	0,	6,	'1455',	'',	'2',	'4',	'0',	'0',	'0',	''),
(148,	'bat_chuyen',	'É o mês de junho, O mês das folhas e rosas, Quando as vistas agradáveis saúdam os olhos e os aromas agradáveis nos narizes.',	1,	2,	'#0DFF21',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'pt',	0,	1,	0,	'',	1,	0,	6,	'1016',	'',	'2',	'4',	'0',	'0',	'0',	''),
(149,	'dam',	'Eu sei bem que as chuvas de junho caem.',	1,	1,	'#29FFDF',	'',	'',	'',	'',	'',	5,	1,	0,	0,	'pt',	0,	1,	0,	'',	1,	0,	6,	'1594',	'',	'2',	'4',	'0',	'0',	'0',	''),
(150,	'dam',	'O que quer que julho esteja trazendo para você, seja bom ou ruim; mantenha sempre esse sorriso em seu rosto, não importa o quê.',	0,	1,	'#C1FF5E',	'',	'',	'',	'',	'',	0,	16,	1,	0,	'pt',	1,	1,	0,	'',	1,	0,	7,	'1004',	'',	'2',	'4',	'0',	'0',	'0',	''),
(151,	'dam',	'O que quer que julho esteja trazendo para você, seja bom ou ruim. mantenha sempre esse sorriso em seu rosto, não importa o quê.',	1,	2,	'#FF1205',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'pt',	0,	1,	0,	'',	1,	0,	7,	'1469',	'',	'2',	'4',	'0',	'0',	'0',	''),
(152,	'bat_chuyen',	'Que bom é o calor do verão, sem o frio do inverno para dar-lhe doçura.',	1,	2,	'#FBFF9C',	'',	'',	'',	'',	'',	0,	18,	2,	0,	'pt',	0,	1,	0,	'',	1,	0,	7,	'498',	'',	'2',	'4',	'0',	'0',	'0',	''),
(153,	'bat_chuyen',	'Os ventos do final do verão deixam as pessoas inquietas.',	0,	0,	'#FCFF69',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'pt',	1,	1,	0,	'',	1,	0,	7,	'1052',	'',	'2',	'4',	'0',	'0',	'0',	''),
(154,	'bat_chuyen',	'Eu amo setembro, especialmente quando você está comigo!',	0,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'pt',	1,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(155,	'bat_chuyen',	'Eu amo setembro, especialmente quando você está comigo!',	1,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'pt',	0,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(156,	'bat_chuyen',	'A temporada de Natal está aqui. Desejando-lhe uma feliz Natal, feliz e não deixe resfriado. Feliz natal',	0,	2,	'#FBFF1F',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'pt',	1,	1,	0,	'',	1,	0,	12,	'1411',	'',	'2',	'4',	'0',	'0',	'0',	''),
(157,	'bat_chuyen',	'A temporada de Natal está aqui. Desejando a você um feliz e feliz Natal e não se resfrie. Feliz natal',	1,	2,	'#BFFFAD',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'pt',	0,	1,	0,	'',	1,	0,	12,	'1415',	'',	'2',	'4',	'0',	'0',	'0',	''),
(158,	'thong_bao',	'O inverno está tão frio, {ten_user}! Se você sair, vista muitas roupas quentes para evitá-lo!',	0,	1,	'#FEFFC2',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'pt',	1,	1,	0,	'',	1,	0,	12,	'1127',	'',	'',	'4',	'0',	'0',	'0',	''),
(159,	'bat_chuyen',	'Durante a temporada de Covid 19, você deve ter cuidado para não se concentrar em lugares lotados e usar uma máscara onde quer que vá!',	0,	3,	'#FFFBD1',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'pt',	1,	0,	0,	'',	1,	0,	0,	'1615',	'',	'2',	'4',	'0',	'0',	'0',	''),
(160,	'bat_chuyen',	'Durante a temporada de Covid 19, você deve ter cuidado para não se concentrar em lugares lotados e usar uma máscara onde quer que vá!',	1,	3,	'#E6C9FF',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'pt',	0,	0,	0,	'',	1,	0,	0,	'179',	'',	'2',	'4',	'0',	'0',	'0',	'');

-- 2020-10-08 16:13:22
