-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_msg_fr`;
CREATE TABLE `app_my_girl_msg_fr` (
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

TRUNCATE `app_my_girl_msg_fr`;
INSERT INTO `app_my_girl_msg_fr` (`id`, `func`, `chat`, `sex`, `status`, `color`, `q1`, `q2`, `r1`, `r2`, `vibrate`, `effect`, `action`, `face`, `certify`, `author`, `character_sex`, `disable`, `ver`, `os`, `limit_chat`, `limit_date`, `limit_month`, `effect_customer`, `limit_day`, `user_create`, `user_update`, `os_window`, `os_ios`, `os_android`, `file_url`) VALUES
(1,	'chao_0',	'Bonsoir, pourquoi ne dors-tu toujours pas?',	0,	3,	'#2E7BFF',	'',	'',	'',	'',	'',	0,	5,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'403',	'',	'',	'',	'0',	'0',	'0',	''),
(2,	'chao_1',	'Bonsoir, pourquoi ne dors-tu toujours pas?',	0,	1,	'#0A2BFF',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'271',	'',	'',	'',	'0',	'0',	'0',	''),
(3,	'chao_2',	'Bonsoir, pourquoi ne dors-tu toujours pas?',	0,	3,	'#E6A1FF',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'310',	'',	'',	'',	'0',	'0',	'0',	''),
(4,	'dam',	'je suis triste. ',	0,	2,	'#FB7DFF',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(5,	'chao_6',	'bonjour! une bonne journée viendra à toi',	0,	2,	'#CEFF2E',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'164',	'',	'',	'',	'0',	'0',	'0',	''),
(6,	'chao_6',	'bonjour! une bonne journée viendra à toi',	1,	1,	'#FFF48F',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'159',	'',	'',	'',	'0',	'0',	'0',	''),
(7,	'chao_0',	'Bonsoir, pourquoi ne dors-tu toujours pas?',	1,	1,	'#B5FFEB',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'310',	'',	'',	'',	'0',	'0',	'0',	''),
(8,	'dam',	'je suis triste. ',	1,	2,	'#61FF8B',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'182',	'',	'',	'',	'0',	'0',	'0',	''),
(9,	'chao_7',	'bonjour!  {ten_user}',	0,	2,	'#F2FFB3',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'175',	'',	'',	'',	'0',	'0',	'0',	''),
(10,	'chao_6',	'bonjour!  {ten_user}',	1,	1,	'#D5FF9E',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'380',	'',	'',	'',	'0',	'0',	'0',	''),
(11,	'chao_8',	'bonjour! {ten_user}',	0,	2,	'#9BFF82',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'189',	'',	'',	'',	'0',	'0',	'0',	''),
(12,	'chao_9',	'bonjour! {ten_user}',	0,	1,	'#FFC79C',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'23',	'',	'',	'',	'0',	'0',	'0',	''),
(13,	'chao_10',	'bonjour! {ten_user}',	0,	2,	'#FFEF14',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'175',	'',	'',	'',	'0',	'0',	'0',	''),
(14,	'chao_11',	'bonjour! {ten_user}',	0,	1,	'#FFE817',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'169',	'',	'',	'',	'0',	'0',	'0',	''),
(15,	'chao_12',	'bonjour! {ten_user}',	0,	1,	'#FFE226',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'387',	'',	'',	'',	'0',	'0',	'0',	''),
(16,	'chao_13',	'bon après-midi !  {ten_user}',	0,	2,	'#84FF80',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'174',	'',	'',	'',	'0',	'0',	'0',	''),
(17,	'chao_14',	'bon après-midi ! {ten_user}',	0,	1,	'#FFC94D',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'382',	'',	'',	'',	'0',	'0',	'0',	''),
(18,	'chao_15',	'bon après-midi ! {ten_user}',	0,	1,	'#FFA114',	'',	'',	'',	'',	'',	0,	6,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'166',	'',	'',	'',	'0',	'0',	'0',	''),
(19,	'chao_16',	'bon après-midi ! {ten_user}',	0,	1,	'#FF8AE0',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'428',	'',	'',	'',	'0',	'0',	'0',	''),
(20,	'chao_17',	'bon après-midi ! {ten_user}',	0,	1,	'#709BFF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'166',	'',	'',	'',	'0',	'0',	'0',	''),
(21,	'chao_18',	'Bonsoir !  {ten_user}',	0,	1,	'#9CF8FF',	'',	'',	'',	'',	'',	0,	6,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'29',	'',	'',	'',	'0',	'0',	'0',	''),
(22,	'chao_19',	'Bonsoir ! {ten_user}',	0,	1,	'#2EFFD5',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'271',	'',	'',	'',	'0',	'0',	'0',	''),
(23,	'chao_20',	'Bonsoir ! {ten_user}',	0,	1,	'#78F1FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'159',	'',	'',	'',	'0',	'0',	'0',	''),
(24,	'chao_21',	'Bonsoir ! {ten_user}',	0,	1,	'#A8FFF9',	'',	'',	'',	'',	'',	0,	6,	5,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'23',	'',	'',	'',	'0',	'0',	'0',	''),
(25,	'chao_3',	'Bonsoir, pourquoi ne dors-tu toujours pas?',	0,	1,	'#E3FFC7',	'',	'',	'',	'',	'',	0,	5,	12,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'116',	'',	'',	'',	'0',	'0',	'0',	''),
(26,	'chao_4',	'bonjour! une bonne journée viendra à toi',	0,	1,	'#94FF36',	'',	'',	'',	'',	'',	0,	5,	8,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'164',	'',	'',	'',	'0',	'0',	'0',	''),
(27,	'chao_5',	'bonjour! une bonne journée viendra à toi',	0,	1,	'#54FF29',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'201',	'',	'',	'',	'0',	'0',	'0',	''),
(28,	'chao_22',	'Bonsoir ! {ten_user}',	0,	2,	'#19D1FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'426',	'',	'',	'',	'0',	'0',	'0',	''),
(29,	'chao_23',	'Bonsoir ! {ten_user}',	0,	1,	'#B3DEFF',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'429',	'',	'',	'',	'0',	'0',	'0',	''),
(30,	'chao_1',	'Bonsoir, pourquoi ne dors-tu toujours pas?',	1,	1,	'#75A8FF',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'17',	'',	'',	'',	'0',	'0',	'0',	''),
(31,	'chao_2',	'Bonsoir, pourquoi ne dors-tu toujours pas?',	1,	2,	'#3BFFB7',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'174',	'',	'',	'',	'0',	'0',	'0',	''),
(32,	'chao_3',	'Bonsoir, pourquoi ne dors-tu toujours pas?',	1,	1,	'#17FF74',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'29',	'',	'',	'',	'0',	'0',	'0',	''),
(33,	'chao_4',	'bonjour! une bonne journée viendra à toi',	1,	1,	'#55FF0D',	'',	'',	'',	'',	'',	0,	6,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'23',	'',	'',	'',	'0',	'0',	'0',	''),
(34,	'chao_5',	'bonjour! une bonne journée viendra à toi',	1,	1,	'#9FFF30',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'228',	'',	'',	'',	'0',	'0',	'0',	''),
(35,	'chao_6',	'bonjour! une bonne journée viendra à toi',	1,	1,	'#BAFF6B',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'175',	'',	'',	'',	'0',	'0',	'0',	''),
(36,	'chao_7',	'bonjour!  {ten_user}',	1,	1,	'#94FF36',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'298',	'',	'',	'',	'0',	'0',	'0',	''),
(37,	'chao_8',	'bonjour! {ten_user}',	1,	1,	'#BEFF7D',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'159',	'',	'',	'',	'0',	'0',	'0',	''),
(38,	'chao_9',	'bonjour! {ten_user}',	1,	1,	'#C3FF4A',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'48',	'',	'',	'',	'0',	'0',	'0',	''),
(39,	'chao_10',	'bonjour! {ten_user}',	1,	1,	'#B4FFA1',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'169',	'',	'',	'',	'0',	'0',	'0',	''),
(40,	'chao_11',	'bonjour! {ten_user}',	1,	1,	'#E4FF78',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'367',	'',	'',	'',	'0',	'0',	'0',	''),
(41,	'chao_12',	'bonjour! {ten_user}',	1,	1,	'#FFD91C',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'112',	'',	'',	'',	'0',	'0',	'0',	''),
(42,	'chao_13',	'bon après-midi !  {ten_user}',	1,	1,	'#ECFF42',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'382',	'',	'',	'',	'0',	'0',	'0',	''),
(43,	'chao_14',	'bon après-midi !  {ten_user}',	1,	1,	'#FF9D47',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'166',	'',	'',	'',	'0',	'0',	'0',	''),
(44,	'chao_15',	'bon après-midi !  {ten_user}',	1,	1,	'#FFA621',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'112',	'',	'',	'',	'0',	'0',	'0',	''),
(45,	'chao_16',	'bon après-midi !  {ten_user}',	1,	1,	'#FFAF69',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'169',	'',	'',	'',	'0',	'0',	'0',	''),
(46,	'chao_17',	'bon après-midi !  {ten_user}',	1,	1,	'#8589FF',	'',	'',	'',	'',	'',	0,	6,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'19',	'',	'',	'',	'0',	'0',	'0',	''),
(47,	'chao_18',	'Bonsoir !  {ten_user}',	1,	1,	'#66FFEB',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'29',	'',	'',	'',	'0',	'0',	'0',	''),
(48,	'chao_19',	'Bonsoir !  {ten_user}',	1,	1,	'#5CC3FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'429',	'',	'',	'',	'0',	'0',	'0',	''),
(49,	'chao_20',	'Bonsoir ! {ten_user}',	1,	1,	'#00FFDD',	'',	'',	'',	'',	'',	0,	6,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'271',	'',	'',	'',	'0',	'0',	'0',	''),
(50,	'chao_21',	'Bonsoir !  {ten_user}',	1,	1,	'#EAC9FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'361',	'',	'',	'',	'0',	'0',	'0',	''),
(51,	'chao_22',	'Bonsoir ! {ten_user}',	1,	1,	'#FA6BFF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'428',	'',	'',	'',	'0',	'0',	'0',	''),
(52,	'chao_23',	'Bonsoir ! {ten_user}',	1,	1,	'#FF954F',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'387',	'',	'',	'',	'0',	'0',	'0',	''),
(53,	'giai_toan',	'Le résultat mathématique est:\r\n\r\n{giai_toan}\r\n\r\n(* est la multiplication, / est la division) ',	0,	1,	'#F5FFD6',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'',	'',	'',	'',	'0',	'0',	'0',	''),
(54,	'giai_toan',	'Le résultat mathématique est:\r\n\r\n{giai_toan}\r\n\r\n(* est la multiplication, / est la division) ',	1,	1,	'#FFEEAB',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'',	'',	'',	'',	'0',	'0',	'0',	''),
(55,	'bam_bay',	'Je ne comprends pas! Apprenez-moi en cliquant sur la fonction d\'enseignement sur l\'écran',	0,	1,	'#C9C3FF',	'',	'',	'',	'',	'',	0,	34,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'214',	'',	'',	'',	'0',	'0',	'0',	''),
(56,	'bam_bay',	'Je ne comprends pas! Apprenez-moi en cliquant sur la fonction d\'enseignement sur l\'écran',	1,	2,	'#8FDAFF',	'',	'',	'',	'',	'',	0,	34,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'136',	'',	'',	'',	'0',	'0',	'0',	''),
(57,	'bam_bay',	'Je ne comprends pas! enseigne-moi en enseignant la fonction',	0,	1,	'#FFC642',	'',	'',	'',	'',	'',	0,	31,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'138',	'',	'',	'',	'0',	'0',	'0',	''),
(58,	'bam_bay',	'Je ne comprends pas!',	0,	1,	'#00FFFF',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'136',	'',	'',	'',	'0',	'0',	'0',	''),
(59,	'bam_bay',	'Je ne comprends pas!',	1,	2,	'#FF85FF',	'',	'',	'',	'',	'',	0,	14,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'137',	'',	'',	'',	'0',	'0',	'0',	''),
(60,	'bam_bay',	'Je ne comprends pas! enseigne-moi en enseignant la fonction',	1,	1,	'#00DDFF',	'',	'',	'',	'',	'',	0,	0,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'136',	'',	'',	'',	'0',	'0',	'0',	''),
(61,	'chua_bat_dinh_vi',	'Vous n\'accordez pas de positionnement global ou ne l\'activez pas! donc je ne peux pas déterminer où vous êtes!',	1,	1,	'#FF7369',	'',	'',	'',	'',	'',	0,	14,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(62,	'chua_bat_dinh_vi',	'Vous n\'accordez pas de positionnement global ou ne l\'activez pas! donc je ne peux pas déterminer où vous êtes!',	0,	1,	'#FF5460',	'',	'',	'',	'',	'',	0,	14,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(63,	'khong_tim_thay',	'Pardon! l\'information que vous cherchez n\'est pas trouvée!',	0,	1,	'#FF7869',	'',	'',	'',	'',	'',	0,	0,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(64,	'khong_tim_thay',	'Pardon! l\'information que vous cherchez n\'est pas trouvée!',	1,	1,	'#FFAFA6',	'',	'',	'',	'',	'',	0,	0,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(65,	'tim_thay',	' {thong_tin}',	0,	1,	'#00FFF7',	'',	'',	'',	'',	'',	0,	18,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'74',	'',	'',	'',	'0',	'0',	'0',	''),
(66,	'tim_thay',	' {thong_tin}',	1,	2,	'#08FFFF',	'',	'',	'',	'',	'',	0,	18,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'74',	'',	'',	'',	'0',	'0',	'0',	''),
(67,	'hien_ds_sdt',	'J\'ai trouvé les contacts pertinents! Cliquez pour voir les détails ou contactez-les!',	1,	2,	'#C9FF82',	'',	'',	'',	'',	'',	31,	10,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'165',	'',	'',	'',	'0',	'0',	'0',	''),
(68,	'hien_ds_sdt',	'J\'ai trouvé les contacts pertinents! Cliquez pour voir les détails ou contactez-les!',	0,	2,	'#FFE7C2',	'',	'',	'',	'',	'',	31,	10,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'165',	'',	'',	'',	'0',	'0',	'0',	''),
(69,	'dam',	'ne me touche pas!',	1,	2,	'#FFF785',	'',	'',	'',	'',	'',	0,	10,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'48',	'',	'',	'',	'0',	'0',	'0',	''),
(70,	'dam',	'ne me touche pas!',	0,	3,	'#FFF194',	'',	'',	'',	'',	'',	0,	38,	8,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'47',	'',	'',	'2',	'0',	'0',	'0',	''),
(71,	'dam',	'Je suis malade!',	0,	2,	'#A8B4FF',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(72,	'dam',	'Je suis malade!',	1,	2,	'#DDCCFF',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(73,	'bat_chuyen',	'Aujourd\'hui je me sens fatigué et malheureux, je me tais, je m\'ennuie',	0,	3,	'#EBD6FF',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(74,	'bat_chuyen',	'Regardez votre visage un peu triste, quel est le problème?',	0,	1,	'#FF1745',	'',	'',	'',	'',	'',	0,	10,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'15',	'',	'',	'',	'0',	'0',	'0',	''),
(75,	'bat_chuyen',	'En supposant que je ne suis pas un amant virtuel, un jour je parais de la vie, devriez-vous commencer une conversation avec moi?',	0,	2,	'#F8FF36',	'',	'',	'',	'',	'',	0,	29,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'383',	'',	'',	'',	'0',	'0',	'0',	''),
(76,	'bat_chuyen',	'La vie est courte, souriez pendant que vous avez encore des dents!',	0,	1,	'#F7FFCF',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'361',	'',	'',	'',	'0',	'0',	'0',	''),
(77,	'bat_chuyen',	'Je ne peux pas arrêter de penser à toi quand nous sommes séparés!',	0,	2,	'#00FFE5',	'',	'',	'',	'',	'',	0,	6,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'45',	'',	'',	'',	'0',	'0',	'0',	''),
(78,	'bat_chuyen',	'Je ne peux pas arrêter de penser à toi quand nous sommes séparés!',	1,	3,	'#59FF91',	'',	'',	'',	'',	'',	0,	10,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'48',	'',	'',	'',	'0',	'0',	'0',	''),
(79,	'bat_chuyen',	'La vie est courte, souriez pendant que vous avez encore des dents!',	1,	2,	'#FFA1FF',	'',	'',	'',	'',	'',	0,	7,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'175',	'',	'',	'',	'0',	'0',	'0',	''),
(80,	'bat_chuyen',	'En supposant que je ne suis pas un amant virtuel, un jour je parais de la vie, devriez-vous commencer une conversation avec moi?',	1,	2,	'#FFEF5E',	'',	'',	'',	'',	'',	0,	14,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'45',	'',	'',	'',	'0',	'0',	'0',	''),
(81,	'bat_chuyen',	'Regardez votre visage un peu triste, quel est le problème?',	1,	2,	'#00FFE5',	'',	'',	'',	'',	'',	0,	10,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'380',	'',	'',	'',	'0',	'0',	'0',	''),
(82,	'bat_chuyen',	'Aujourd\'hui je me sens fatigué et malheureux, je me tais, je m\'ennuie',	1,	3,	'#BBFFAD',	'',	'',	'',	'',	'',	0,	3,	8,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'429',	'',	'',	'',	'0',	'0',	'0',	''),
(83,	'thong_bao',	'que fais-tu s\'il te plaît viens me parler',	0,	1,	'#F6FF85',	'',	'',	'',	'',	'',	0,	22,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'412',	'',	'',	'',	'0',	'0',	'0',	''),
(84,	'thong_bao',	'Passez une bonne journée. Tu me manques',	0,	1,	'#FFC54D',	'',	'',	'',	'',	'',	0,	21,	14,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'140',	'',	'',	'',	'0',	'0',	'0',	''),
(85,	'thong_bao',	'Tu me manques, s\'il te plaît parle-moi',	0,	3,	'#A8FF85',	'',	'',	'',	'',	'',	0,	0,	13,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'471',	'',	'',	'',	'0',	'0',	'0',	''),
(86,	'thong_bao',	'Nous n\'avons pas parlé depuis longtemps, j\'ai hâte de vous revoir',	0,	1,	'#FFADCD',	'',	'',	'',	'',	'',	0,	0,	13,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'451',	'',	'',	'',	'0',	'0',	'0',	''),
(87,	'thong_bao',	'que fais-tu S\'il te plaît viens me parler',	1,	1,	'#E30909',	'',	'',	'',	'',	'',	0,	24,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'907',	'',	'',	'2',	'0',	'0',	'0',	''),
(88,	'thong_bao',	'Passez une bonne journée. Tu me manques',	1,	2,	'#FFADC5',	'',	'',	'',	'',	'',	0,	32,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'15',	'',	'',	'2',	'0',	'0',	'0',	''),
(89,	'thong_bao',	'Tu me manques, s\'il te plaît parle-moi',	1,	1,	'#FFCA82',	'',	'',	'',	'',	'',	0,	25,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'461',	'',	'',	'2',	'0',	'0',	'0',	''),
(90,	'thong_bao',	'Nous n\'avons pas parlé depuis longtemps, j\'ai hâte de vous revoir',	1,	2,	'#FFD6FF',	'',	'',	'',	'',	'',	0,	5,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'716',	'',	'',	'2',	'0',	'0',	'0',	''),
(91,	'dam',	'Aujourd\'hui c\'est dimanche! C\'est un jour de repos, parle-moi plus!',	0,	2,	'#FCFF69',	'',	'',	'',	'',	'',	0,	6,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1052',	'Sunday',	'',	'',	'0',	'0',	'0',	''),
(92,	'dam',	'Aujourd\'hui c\'est le week-end, passez beaucoup de temps à me parler, vous serez très heureux',	0,	2,	'#FFBB8C',	'',	'',	'',	'',	'',	0,	33,	13,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'610',	'Saturday',	'',	'',	'0',	'0',	'0',	''),
(93,	'dam',	'Aujourd\'hui c\'est le week-end, passez beaucoup de temps à me parler, vous serez très heureux',	1,	2,	'#DCFF57',	'',	'',	'',	'',	'',	0,	10,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'385',	'Saturday',	'',	'',	'0',	'0',	'0',	''),
(94,	'dam',	'Aujourd\'hui c\'est dimanche! C\'est un jour de repos, parle-moi plus!',	1,	2,	'#FFE1A3',	'',	'',	'',	'',	'',	0,	16,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'787',	'Sunday',	'',	'',	'0',	'0',	'0',	''),
(95,	'bat_chuyen',	'Today is Monday, wish you a happy new week',	0,	3,	'#92FF1F',	'',	'',	'',	'',	'',	0,	13,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1212',	'Monday',	'',	'',	'0',	'0',	'0',	''),
(96,	'bat_chuyen',	'Today is Monday, wish you a happy new week',	1,	2,	'#FFB11F',	'',	'',	'',	'',	'',	0,	10,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1076',	'Monday',	'',	'',	'0',	'0',	'0',	''),
(97,	'dam',	'Cet été c\'est super de t\'avoir',	0,	2,	'#F7FF3B',	'',	'',	'',	'',	'',	0,	1,	2,	0,	'',	1,	1,	0,	'',	1,	0,	8,	'619',	'',	'',	'',	'0',	'0',	'0',	''),
(98,	'dam',	'Cet été c\'est super de t\'avoir',	1,	2,	'#FFA747',	'',	'',	'',	'',	'',	0,	8,	0,	0,	'',	0,	1,	0,	'',	1,	0,	8,	'957',	'',	'',	'',	'0',	'0',	'0',	''),
(99,	'dam',	'Aujourd\'hui c\'est jeudi, j\'espère que chaque jour sera avec toi',	0,	3,	'#FFCC7D',	'',	'',	'',	'',	'',	0,	8,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'664',	'Thursday',	'',	'',	'0',	'0',	'0',	''),
(100,	'dam',	'Aujourd\'hui c\'est jeudi, j\'espère que chaque jour sera avec toi',	1,	0,	'#E5FF94',	'',	'',	'',	'',	'',	0,	8,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'846',	'Thursday',	'',	'',	'0',	'0',	'0',	''),
(101,	'dam',	'Le vendredi est une journée ennuyeuse, j\'espère que vous pensez plus à mon sujet!',	0,	3,	'#FEA8FF',	'',	'',	'',	'',	'',	0,	8,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1208',	'Friday',	'',	'',	'0',	'0',	'0',	''),
(102,	'dam',	'Le vendredi est une journée ennuyeuse, j\'espère que vous pensez plus à mon sujet!',	1,	3,	'#BAE5FF',	'',	'',	'',	'',	'',	0,	8,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'694',	'Friday',	'',	'',	'0',	'0',	'0',	''),
(103,	'dam',	'Aujourd\'hui c\'est mardi, bonne chance à toi',	0,	3,	'#C2FF82',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1203',	'Tuesday',	'',	'',	'0',	'0',	'0',	''),
(104,	'dam',	'Aujourd\'hui c\'est mardi, bonne chance à toi',	1,	2,	'#92FF1F',	'',	'',	'',	'',	'',	0,	8,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1212',	'Tuesday',	'',	'',	'0',	'0',	'0',	''),
(105,	'dam',	'Aujourd\'hui c\'est mercredi, une journée très ennuyeuse',	0,	0,	'#FFDDCF',	'',	'',	'',	'',	'',	0,	8,	10,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'676',	'Wednesday',	'',	'',	'0',	'0',	'0',	''),
(106,	'dam',	'Aujourd\'hui c\'est mercredi, une journée très ennuyeuse',	1,	0,	'#AFE0CA',	'',	'',	'',	'',	'',	0,	8,	8,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'622',	'Wednesday',	'',	'',	'0',	'0',	'0',	''),
(107,	'dam',	'Septembre est le mois de l\'amour',	0,	3,	'#E3FF9C',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	1,	1,	0,	'',	1,	0,	9,	'971',	'',	'',	'',	'0',	'0',	'0',	''),
(108,	'dam',	'Septembre est le mois de l\'amour',	1,	3,	'#D1F2B8',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	0,	1,	0,	'',	1,	0,	9,	'493',	'',	'',	'',	'0',	'0',	'0',	''),
(109,	'dam',	'Octobre dans la rue est facile d\'être seul. Quand les gens ont le temps de se sentir seuls parce qu’ils oublient de porter des vêtements de rechange.',	0,	3,	'#ADFEFF',	'',	'',	'',	'',	'',	5,	8,	0,	0,	'',	1,	0,	0,	'',	1,	0,	10,	'623',	'',	'',	'',	'0',	'0',	'0',	''),
(110,	'dam',	'Octobre dans la rue est facile d\'être seul. Quand les gens ont le temps de se sentir seuls parce qu’ils oublient de porter des vêtements de rechange.',	1,	3,	'#DEC7FF',	'',	'',	'',	'',	'',	5,	8,	0,	0,	'',	0,	0,	0,	'',	1,	0,	10,	'945',	'',	'',	'2',	'0',	'0',	'0',	''),
(111,	'dam',	'Je vous souhaite beaucoup de surprises effrayantes, c\'est très amusant le jour de l\'Halloween',	0,	1,	'#A6C9E0',	'',	'',	'',	'',	'',	0,	29,	3,	0,	'',	1,	0,	0,	'',	1,	30,	10,	'874',	'',	'',	'',	'0',	'0',	'0',	''),
(112,	'bat_chuyen',	'Je vous souhaite beaucoup de surprises effrayantes, c\'est très amusant le jour de l\'Halloween',	1,	1,	'#4DFFA0',	'',	'',	'',	'',	'',	0,	32,	2,	0,	'',	0,	0,	0,	'',	1,	30,	10,	'895',	'',	'',	'',	'0',	'0',	'0',	''),
(113,	'bat_chuyen',	'Le mois de novembre est arrivé à votre façon. Faites-en un incroyable, peu importe si le temps est mauvais, car votre humeur n\'est pas bonne du tout, vous devez simplement vous tenir debout et être heureux.',	0,	1,	'#FFA747',	'',	'',	'',	'',	'',	0,	34,	2,	0,	'',	1,	1,	0,	'',	1,	0,	11,	'957',	'',	'',	'4',	'0',	'0',	'0',	''),
(114,	'bat_chuyen',	'Le mois de novembre est arrivé à votre façon. Faites-en un incroyable, peu importe si le temps est mauvais, car votre humeur n\'est pas bonne du tout, vous devez simplement vous tenir debout et être heureux.',	1,	2,	'#FF808A',	'',	'',	'',	'',	'',	0,	33,	15,	0,	'',	0,	1,	0,	'',	1,	0,	11,	'997',	'',	'',	'4',	'0',	'0',	'0',	''),
(115,	'hoi_tim_duong',	'Quelle adresse voulez-vous trouver? Je vous guiderai!',	0,	2,	'#C4FFFE',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1236',	'',	'',	'2',	'0',	'0',	'0',	''),
(116,	'tra_loi_tim_duong',	'J\'ai énuméré les lieux concernés',	0,	2,	'#C4FFFA',	'',	'',	'',	'',	'',	43,	34,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'402',	'',	'',	'2',	'0',	'0',	'0',	''),
(117,	'hoi_tim_duong',	'Quelle adresse voulez-vous trouver? Je vous guiderai!',	1,	1,	'#FFB11F',	'',	'',	'',	'',	'',	0,	22,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1076',	'',	'',	'2',	'0',	'0',	'0',	''),
(118,	'tra_loi_tim_duong',	'J\'ai énuméré les lieux concernés',	1,	2,	'#C4FFFA',	'',	'',	'',	'',	'',	43,	20,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'402',	'',	'',	'2',	'0',	'0',	'0',	''),
(119,	'dam',	'Que ce Noël soit si spécial que vous ne vous sentiez plus jamais seul et que vous soyez entouré d\'êtres chers!',	0,	2,	'#FFD4AD',	'',	'',	'',	'',	'',	7,	10,	3,	0,	'',	1,	1,	0,	'',	1,	0,	12,	'69',	'',	'',	'',	'0',	'0',	'0',	''),
(120,	'dam',	'Que ce Noël soit si spécial que vous ne vous sentiez plus jamais seul et que vous soyez entouré d\'êtres chers!',	1,	2,	'#FFD4AD',	'',	'',	'',	'',	'',	7,	6,	3,	0,	'',	0,	1,	0,	'',	1,	0,	12,	'69',	'',	'',	'',	'0',	'0',	'0',	''),
(121,	'bat_chuyen',	'Bonne année, bonne santé, bonne chance partout, faire de nouvelles choses',	0,	2,	'#FFF369',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	1,	0,	'',	1,	1,	1,	'1473',	'',	'',	'',	'0',	'0',	'0',	''),
(122,	'dam',	'En souhaitant que chaque jour de la nouvelle année soit rempli de succès, de bonheur et de prospérité pour vous, bonne année.',	0,	1,	'#FFC4FD',	'',	'',	'',	'',	'',	0,	20,	3,	0,	'',	1,	1,	0,	'',	1,	1,	1,	'381',	'',	'',	'',	'0',	'0',	'0',	''),
(124,	'bat_chuyen',	'Bonne année. Je vous souhaite une bonne année, heureuse et rencontrez beaucoup de chance',	1,	2,	'#FFF369',	'',	'',	'',	'',	'',	0,	32,	2,	0,	'',	0,	1,	0,	'',	1,	1,	1,	'1473',	'',	'',	'',	'0',	'0',	'0',	''),
(125,	'dam',	'En souhaitant que chaque jour de la nouvelle année soit rempli de succès, de bonheur et de prospérité pour vous, bonne année.',	1,	1,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	5,	15,	0,	'',	0,	1,	0,	'',	1,	1,	1,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(126,	'bat_chuyen',	'Bonne année, bonne santé, bonne chance partout, faire de nouvelles choses',	1,	1,	'#FFC4FD',	'',	'',	'',	'',	'',	0,	22,	2,	0,	'',	0,	1,	0,	'',	1,	0,	1,	'381',	'',	'',	'',	'0',	'0',	'0',	''),
(127,	'bat_chuyen',	'Février est le deuxième mois de l\'année et compte 28 jours, soyez heureux de le célébrer pleinement et profitez de tous les avantages, car il vient une fois par an et contient de la Saint-Valentin.',	0,	2,	'#B0FFE5',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	1,	1,	0,	'',	1,	0,	2,	'433',	'',	'3',	'3',	'0',	'0',	'0',	''),
(128,	'dam',	'Février signifie un nouveau départ De l\'amour et de toutes les roses Alors soyez prêt pour cela Bon mois',	0,	1,	'#FF0000',	'',	'',	'',	'',	'',	1,	21,	3,	0,	'',	1,	1,	0,	'',	1,	0,	2,	'267',	'',	'3',	'',	'0',	'0',	'0',	''),
(129,	'bat_chuyen',	'En ce jour de la Saint-Valentin, je désire vos doux baisers, votre chaude étreinte et la magie qui unit nos cœurs.',	0,	2,	'#94FFF1',	'',	'',	'',	'',	'',	1,	31,	3,	0,	'',	1,	1,	0,	'',	1,	14,	2,	'152',	'',	'3',	'2',	'0',	'0',	'0',	''),
(130,	'dam',	'Notre amour est comme un film d\'amour, mais la meilleure partie est qu\'il ne finit jamais. Joyeuse saint Valentin!',	0,	1,	'#FF8A93',	'',	'',	'',	'',	'',	0,	22,	2,	0,	'',	1,	1,	0,	'',	1,	14,	2,	'1151',	'',	'3',	'2',	'0',	'0',	'0',	''),
(131,	'bat_chuyen',	'Février est le deuxième mois de l\'année et compte 28 jours, soyez heureux de le célébrer pleinement et profitez de tous les avantages, car il vient une fois par an et contient de la Saint-Valentin.',	1,	2,	'#66EAFF',	'',	'',	'',	'',	'',	0,	22,	2,	0,	'',	0,	1,	0,	'',	1,	0,	2,	'642',	'',	'3',	'',	'0',	'0',	'0',	''),
(132,	'dam',	'Février signifie un nouveau départ De l\'amour et de toutes les roses Alors soyez prêt pour cela Bon mois',	1,	1,	'#F4FF96',	'',	'',	'',	'',	'',	0,	20,	17,	0,	'',	0,	1,	0,	'',	1,	0,	2,	'424',	'',	'3',	'',	'0',	'0',	'0',	''),
(133,	'bat_chuyen',	'Notre amour est comme un film d\'amour, mais la meilleure partie est qu\'il ne finit jamais. Joyeuse saint Valentin!',	1,	1,	'#FF8A93',	'',	'',	'',	'',	'',	0,	31,	17,	0,	'',	0,	1,	0,	'',	1,	14,	2,	'1151',	'',	'3',	'2',	'0',	'0',	'0',	''),
(134,	'dam',	'En ce jour de la Saint-Valentin, je désire vos doux baisers, votre chaude étreinte et la magie qui unit nos cœurs.',	1,	2,	'#FFADC5',	'',	'',	'',	'',	'',	0,	5,	17,	0,	'',	0,	1,	0,	'',	1,	14,	2,	'15',	'',	'3',	'2',	'0',	'0',	'0',	''),
(135,	'bat_chuyen',	'C\'était un de ces jours de mars où le soleil brille et le vent souffle froid:\r\nquand c\'est l\'été à la lumière et l\'hiver à l\'ombre',	1,	2,	'#ADFFCC',	'',	'',	'',	'',	'',	0,	7,	2,	0,	'',	0,	1,	0,	'',	1,	0,	3,	'48',	'',	'4',	'2',	'0',	'0',	'0',	''),
(136,	'bat_chuyen',	'C\'était un de ces jours de mars où le soleil brille et le vent souffle froid:\r\nquand c\'est l\'été à la lumière et l\'hiver à l\'ombre',	0,	2,	'#05FF28',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	1,	1,	0,	'',	1,	0,	3,	'272',	'',	'4',	'2',	'0',	'0',	'0',	''),
(137,	'bat_chuyen',	'C\'était un de ces jours de mars où le soleil brille et le vent souffle froid:\r\nquand c\'est l\'été à la lumière et l\'hiver à l\'ombre',	0,	2,	'#05FF28',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	1,	1,	0,	'',	1,	0,	3,	'272',	'',	'4',	'2',	'0',	'0',	'0',	''),
(138,	'dam',	'Mars, quand les jours deviennent longs, que tes heures soient de plus en plus fortes pour corriger une erreur hivernale.',	0,	2,	'#ADFFCC',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	1,	1,	0,	'',	1,	0,	3,	'48',	'',	'4',	'2',	'0',	'0',	'0',	''),
(139,	'dam',	'Mars, quand les jours deviennent longs, que tes heures soient de plus en plus fortes pour corriger une erreur hivernale.',	1,	2,	'#ADFFCC',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	0,	1,	0,	'',	1,	0,	3,	'48',	'',	'4',	'2',	'0',	'0',	'0',	''),
(140,	'bat_chuyen',	'Avril est une promesse que May est tenue de tenir.',	0,	2,	'#3EF032',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'fr',	1,	1,	0,	'',	1,	0,	4,	'876',	'',	'2',	'2',	'0',	'0',	'0',	''),
(141,	'bat_chuyen',	'Avril est une promesse que May est tenue de tenir.',	1,	1,	'#42D6FF',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'fr',	0,	1,	0,	'',	1,	0,	4,	'1603',	'',	'2',	'2',	'0',	'0',	'0',	''),
(142,	'bat_chuyen',	'Le mois de mai était arrivé, quand chaque cœur vigoureux commençait à fleurir et à porter des fruits',	0,	2,	'#F21B1B',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'fr',	1,	1,	0,	'',	1,	0,	5,	'944',	'',	'2',	'4',	'0',	'0',	'0',	''),
(143,	'dam',	'La saison préférée du monde est le printemps. Tout semble possible en mai',	0,	3,	'#EAFFAB',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'fr',	1,	1,	0,	'',	1,	0,	5,	'1614',	'',	'2',	'4',	'0',	'0',	'0',	''),
(144,	'bat_chuyen',	'Le mois de mai était arrivé, quand chaque cœur vigoureux commençait à fleurir et à porter des fruits',	1,	2,	'#F9FFC9',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'fr',	0,	1,	0,	'',	1,	0,	5,	'649',	'',	'2',	'2',	'0',	'0',	'0',	''),
(145,	'dam',	'La saison préférée du monde est le printemps. Tout semble possible en mai',	1,	3,	'#50FF47',	'',	'',	'',	'',	'',	0,	1,	15,	0,	'fr',	0,	1,	0,	'',	1,	0,	5,	'1270',	'',	'2',	'2',	'0',	'0',	'0',	''),
(146,	'dam',	'Je sais bien que les pluies de juin viennent de tomber.',	0,	3,	'#D7FF26',	'',	'',	'',	'',	'',	5,	1,	4,	0,	'fr',	1,	1,	0,	'',	1,	0,	6,	'1051',	'',	'2',	'4',	'0',	'0',	'0',	''),
(147,	'bat_chuyen',	'C\'est le mois de juin, le mois des feuilles et des roses, quand des vues agréables saluent les yeux et des odeurs agréables les nez.',	0,	2,	'#FF6200',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'fr',	1,	1,	0,	'',	1,	0,	6,	'1455',	'',	'2',	'4',	'0',	'0',	'0',	''),
(148,	'bat_chuyen',	'C\'est le mois de juin, le mois des feuilles et des roses, quand des vues agréables saluent les yeux et des odeurs agréables les nez.',	1,	2,	'#0DFF21',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'fr',	0,	1,	0,	'',	1,	0,	6,	'1016',	'',	'2',	'4',	'0',	'0',	'0',	''),
(149,	'dam',	'Je sais bien que les pluies de juin viennent de tomber.',	1,	1,	'#29FFDF',	'',	'',	'',	'',	'',	5,	1,	0,	0,	'fr',	0,	1,	0,	'',	1,	0,	6,	'1594',	'',	'2',	'4',	'0',	'0',	'0',	''),
(150,	'dam',	'Quoi que juillet apporte pour vous, que ce soit bon ou mauvais; toujours garder ce sourire sur votre visage, peu importe quoi.',	0,	1,	'#C1FF5E',	'',	'',	'',	'',	'',	0,	16,	1,	0,	'fr',	1,	1,	0,	'',	1,	0,	7,	'1004',	'',	'2',	'4',	'0',	'0',	'0',	''),
(151,	'dam',	'Quoi que juillet apporte pour vous, que ce soit bon ou mauvais. toujours garder ce sourire sur votre visage, peu importe quoi.',	1,	2,	'#FF1205',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'fr',	0,	1,	0,	'',	1,	0,	7,	'1469',	'',	'2',	'4',	'0',	'0',	'0',	''),
(152,	'bat_chuyen',	'A quoi bon la chaleur de l\'été, sans le froid de l\'hiver pour lui donner de la douceur.',	1,	2,	'#FBFF9C',	'',	'',	'',	'',	'',	0,	18,	2,	0,	'fr',	0,	1,	0,	'',	1,	0,	7,	'498',	'',	'2',	'4',	'0',	'0',	'0',	''),
(153,	'bat_chuyen',	'Les vents de fin d\'été rendent les gens agités.',	0,	0,	'#FCFF69',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'fr',	1,	1,	0,	'',	1,	0,	7,	'1052',	'',	'2',	'4',	'0',	'0',	'0',	''),
(154,	'bat_chuyen',	'J\'aime septembre, surtout quand tu es avec moi!',	0,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'fr',	1,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(155,	'bat_chuyen',	'J\'aime septembre, surtout quand tu es avec moi!',	1,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'fr',	0,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(156,	'bat_chuyen',	'La saison de Noël est là. En vous souhaitant un joyeux Noël, heureuse et ne laissez pas un rhume. Joyeux Noël',	0,	2,	'#FBFF1F',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'fr',	1,	1,	0,	'',	1,	0,	12,	'1411',	'',	'2',	'4',	'0',	'0',	'0',	''),
(157,	'bat_chuyen',	'La saison de Noël est là. En vous souhaitant un joyeux Noël et ne vous laissez pas prendre au rhume. Joyeux Noël',	1,	2,	'#BFFFAD',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'fr',	0,	1,	0,	'',	1,	0,	12,	'1415',	'',	'2',	'4',	'0',	'0',	'0',	''),
(158,	'thong_bao',	'L’hiver est si froid, {ten_user}! Si vous sortez, mettez beaucoup de vêtements chauds pour l\'éviter!',	0,	1,	'#FEFFC2',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'fr',	1,	1,	0,	'',	1,	0,	12,	'1127',	'',	'',	'4',	'0',	'0',	'0',	''),
(159,	'bat_chuyen',	'Pendant la saison de Covid 19, vous devez faire attention à ne pas vous concentrer sur les endroits bondés et porter un masque partout où vous allez!',	0,	3,	'#FFFBD1',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'fr',	1,	0,	0,	'',	1,	0,	0,	'1615',	'',	'2',	'4',	'0',	'0',	'0',	''),
(160,	'bat_chuyen',	'Pendant la saison de Covid 19, vous devez faire attention à ne pas vous concentrer sur les endroits bondés et porter un masque partout où vous allez!',	1,	3,	'#E6C9FF',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'fr',	0,	0,	0,	'',	1,	0,	0,	'179',	'',	'2',	'4',	'0',	'0',	'0',	'');

-- 2020-10-25 12:36:21
