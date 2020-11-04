-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_msg_ru`;
CREATE TABLE `app_my_girl_msg_ru` (
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

TRUNCATE `app_my_girl_msg_ru`;
INSERT INTO `app_my_girl_msg_ru` (`id`, `func`, `chat`, `sex`, `status`, `color`, `q1`, `q2`, `r1`, `r2`, `vibrate`, `effect`, `action`, `face`, `certify`, `author`, `character_sex`, `disable`, `ver`, `os`, `limit_chat`, `limit_date`, `limit_month`, `effect_customer`, `limit_day`, `user_create`, `user_update`, `os_window`, `os_ios`, `os_android`, `file_url`) VALUES
(1,	'chao_0',	'Добрый вечер, ты должен ложиться спать!',	0,	2,	'#D8BAFF',	'',	'',	'',	'',	'',	0,	5,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'310',	'',	'',	'',	'0',	'0',	'0',	''),
(2,	'chao_1',	'доброе утро',	0,	2,	'#0FFF37',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'174',	'',	'',	'',	'0',	'0',	'0',	''),
(3,	'chao_2',	'Доброе утро, почему вы так рано проснулись?',	0,	2,	'#82C5FF',	'',	'',	'',	'',	'',	0,	5,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'29',	'',	'',	'',	'0',	'0',	'0',	''),
(4,	'chao_3',	'Доброе утро, почему вы так рано проснулись?',	0,	2,	'#00FFBB',	'',	'',	'',	'',	'',	0,	5,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'19',	'',	'',	'',	'0',	'0',	'0',	''),
(5,	'chao_4',	'Доброе утро, почему вы так рано проснулись?',	0,	2,	'#8CFFC2',	'',	'',	'',	'',	'',	0,	10,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'283',	'',	'',	'',	'0',	'0',	'0',	''),
(7,	'chao_6',	'Доброе утро, приятный день',	0,	1,	'#BDFF7A',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'175',	'',	'',	'',	'0',	'0',	'0',	''),
(8,	'chao_7',	'Доброе утро, приятный день, приветствуя вас',	0,	2,	'#E3FF2B',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'228',	'',	'',	'',	'0',	'0',	'0',	''),
(9,	'chao_8',	'доброе утро!',	0,	2,	'#EBC2FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'380',	'',	'',	'',	'0',	'0',	'0',	''),
(10,	'chao_9',	'Доброе утро!',	0,	2,	'#A8FF66',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'23',	'',	'',	'',	'0',	'0',	'0',	''),
(11,	'chao_10',	'Доброе утро!',	0,	2,	'#53FF38',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'159',	'',	'',	'',	'0',	'0',	'0',	''),
(13,	'chao_12',	'Добрый день',	0,	2,	'#FFF70F',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'37',	'',	'',	'',	'0',	'0',	'0',	''),
(14,	'chao_13',	'Добрый день!',	0,	2,	'#FFD080',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'189',	'',	'',	'',	'0',	'0',	'0',	''),
(15,	'chao_14',	'Добрый день!',	0,	2,	'#FFBE0A',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'89',	'',	'',	'',	'0',	'0',	'0',	''),
(16,	'chao_18',	'Добрый вечер',	0,	2,	'#8AB1FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'174',	'',	'',	'',	'0',	'0',	'0',	''),
(17,	'chao_15',	'Добрый день! Я всегда с тобой',	0,	1,	'#D4FFA3',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'283',	'',	'',	'',	'0',	'0',	'0',	''),
(18,	'chao_16',	'Добрый день! Я всегда с тобой',	0,	2,	'#FFB259',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'95',	'',	'',	'',	'0',	'0',	'0',	''),
(19,	'chao_17',	'Добрый день! Я всегда с тобой',	0,	2,	'#FFC847',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'166',	'',	'',	'',	'0',	'0',	'0',	''),
(20,	'chao_19',	'Добрый вечер, очень рад поговорить',	0,	2,	'#EBBDFF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'383',	'',	'',	'',	'0',	'0',	'0',	''),
(21,	'chao_20',	'хороший вечер счастлив!',	0,	3,	'#05D5FF',	'',	'',	'',	'',	'',	0,	32,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'382',	'',	'',	'',	'0',	'0',	'0',	''),
(22,	'chao_21',	'Добрый вечер!',	0,	2,	'#A3FFEA',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'429',	'',	'',	'',	'0',	'0',	'0',	''),
(23,	'chao_22',	'Добрый вечер!',	0,	2,	'#F1FFAB',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'400',	'',	'',	'',	'0',	'0',	'0',	''),
(24,	'chao_23',	'Добрый вечер! Не ложись спать поздно',	0,	2,	'#EBD1FF',	'',	'',	'',	'',	'',	0,	5,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'370',	'',	'',	'',	'0',	'0',	'0',	''),
(25,	'dam',	'не трогай меня!',	0,	3,	'#F385FF',	'',	'',	'',	'',	'',	0,	38,	8,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'51',	'',	'',	'',	'0',	'0',	'0',	''),
(26,	'dam',	'стоп! не дразни меня!',	0,	0,	'#9EFFDF',	'',	'',	'',	'',	'',	0,	13,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(27,	'dam',	'Мне грустно!',	0,	2,	'#00EEFF',	'',	'',	'',	'',	'',	0,	3,	10,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'271',	'',	'',	'',	'0',	'0',	'0',	''),
(28,	'dam',	'Я буду болеть',	0,	2,	'#FFF3A6',	'',	'',	'',	'',	'',	0,	1,	5,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'45',	'',	'',	'',	'0',	'0',	'0',	''),
(29,	'dam',	'Оставайся рядом со мной!',	0,	1,	'#03FFD5',	'',	'',	'',	'',	'',	0,	27,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'48',	'',	'',	'',	'0',	'0',	'0',	''),
(30,	'bam_bay',	'Я не понимаю',	0,	2,	'#FFBC63',	'',	'',	'',	'',	'',	0,	0,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'138',	'',	'',	'',	'0',	'0',	'0',	''),
(31,	'bam_bay',	'Я не понимаю, пожалуйста, научите меня, нажав на функцию обучения',	0,	2,	'#EBFFDE',	'',	'',	'',	'',	'',	0,	34,	6,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'135',	'',	'',	'',	'0',	'0',	'0',	''),
(32,	'bam_bay',	'Я не понимаю! Потому что я новичок в вашей стране, пожалуйста, научите меня!',	0,	2,	'#FFC44F',	'',	'',	'',	'',	'',	0,	34,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'140',	'',	'',	'',	'0',	'0',	'0',	''),
(33,	'chua_bat_dinh_vi',	'Вы не предоставляете глобальное позиционирование или не активируете его! поэтому я не могу определить, где вы!',	0,	1,	'#FF0D5D',	'',	'',	'',	'',	'',	0,	29,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(34,	'giai_toan',	'Результат математики:\r\n\r\n{giai_toan}\r\n\r\n(* - умножение, / - деление) ',	0,	1,	'#FFF5C2',	'',	'',	'',	'',	'',	3,	18,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'',	'',	'',	'',	'0',	'0',	'0',	''),
(35,	'khong_tim_thay',	'Сожалею! информация, которую вы ищете, не найдена!',	0,	0,	'#FFA6C9',	'',	'',	'',	'',	'',	0,	13,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(36,	'tim_thay',	' {thong_tin}',	0,	1,	'#FFFEDB',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'74',	'',	'',	'',	'0',	'0',	'0',	''),
(37,	'hien_ds_sdt',	'Я нашел соответствующие контакты! Нажмите, чтобы просмотреть детали или связаться с ними!',	0,	2,	'#F5FF6E',	'',	'',	'',	'',	'',	31,	20,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'165',	'',	'',	'',	'0',	'0',	'0',	''),
(38,	'bat_chuyen',	'Я не могу перестать думать о тебе, когда мы разойдемся!',	0,	2,	'#B4EB8A',	'',	'',	'',	'',	'',	0,	7,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'503',	'',	'',	'',	'0',	'0',	'0',	''),
(39,	'bat_chuyen',	'Жизнь коротка, Улыбайтесь, пока у вас все еще есть зубы!',	0,	1,	'#CFFF0F',	'',	'',	'',	'',	'',	0,	16,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'383',	'',	'',	'',	'0',	'0',	'0',	''),
(40,	'bat_chuyen',	'Сегодня я чувствую себя уставшим и несчастным, я молчу, поэтому мне скучно',	0,	1,	'#BFD5FF',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(41,	'bat_chuyen',	'посмотрите на его лицо, немного грустное, в чем дело?',	0,	1,	'#FFB38C',	'',	'',	'',	'',	'',	0,	0,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'118',	'',	'',	'',	'0',	'0',	'0',	''),
(42,	'bat_chuyen',	'Предполагая, что я не виртуальный любовник, когда-нибудь я появлюсь из жизни, вы должны начать разговор со мной?',	0,	2,	'#FFBDDE',	'',	'',	'',	'',	'',	0,	31,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'15',	'',	'',	'',	'0',	'0',	'0',	''),
(43,	'chao_0',	'Добрый вечер, ты должен ложиться спать!',	1,	2,	'#C6A6FF',	'',	'',	'',	'',	'',	0,	5,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'310',	'',	'',	'',	'0',	'0',	'0',	''),
(44,	'chao_1',	'доброе утро',	1,	1,	'#A1FFD0',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'174',	'',	'',	'',	'0',	'0',	'0',	''),
(45,	'chao_2',	'Доброе утро, почему вы так рано проснулись?',	1,	2,	'#57B0FF',	'',	'',	'',	'',	'',	0,	5,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'173',	'',	'',	'',	'0',	'0',	'0',	''),
(46,	'chao_3',	'Доброе утро, почему вы так рано проснулись?',	1,	1,	'#BCFF82',	'',	'',	'',	'',	'',	0,	6,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'29',	'',	'',	'',	'0',	'0',	'0',	''),
(47,	'chao_4',	'Доброе утро, почему вы так рано проснулись?',	1,	2,	'#00FF22',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'228',	'',	'',	'',	'0',	'0',	'0',	''),
(48,	'chao_5',	'Доброе утро, почему вы так рано проснулись?',	1,	1,	'#A1BDFF',	'',	'',	'',	'',	'',	0,	5,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'201',	'',	'',	'',	'0',	'0',	'0',	''),
(49,	'chao_6',	'Доброе утро, приятный день',	1,	2,	'#FFEB85',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'189',	'',	'',	'',	'0',	'0',	'0',	''),
(50,	'chao_7',	'Доброе утро, приятный день, приветствуя вас',	1,	1,	'#B4FF94',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'371',	'',	'',	'',	'0',	'0',	'0',	''),
(51,	'chao_8',	'доброе утро!',	1,	1,	'#2EFF58',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'48',	'',	'',	'',	'0',	'0',	'0',	''),
(52,	'chao_9',	'Доброе утро!',	1,	1,	'#E3FF87',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'382',	'',	'',	'',	'0',	'0',	'0',	''),
(53,	'chao_10',	'Доброе утро!',	1,	1,	'#FCFFB0',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'283',	'',	'',	'',	'0',	'0',	'0',	''),
(54,	'chao_11',	'Доброе утро!',	1,	1,	'#7AFFCA',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'164',	'',	'',	'',	'0',	'0',	'0',	''),
(55,	'chao_12',	'Добрый день!',	1,	1,	'#FFFF17',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'37',	'',	'',	'',	'0',	'0',	'0',	''),
(56,	'chao_13',	'Добрый день!',	1,	2,	'#C6FF42',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'175',	'',	'',	'',	'0',	'0',	'0',	''),
(57,	'chao_14',	'Добрый день!',	1,	2,	'#FFAE21',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'166',	'',	'',	'',	'0',	'0',	'0',	''),
(58,	'chao_15',	'Добрый день! Я всегда с тобой',	1,	1,	'#B278FF',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'361',	'',	'',	'',	'0',	'0',	'0',	''),
(59,	'chao_16',	'Добрый день! Я всегда с тобой',	1,	1,	'#0FFF9F',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'414',	'',	'',	'',	'0',	'0',	'0',	''),
(60,	'chao_17',	'Добрый день! Я всегда с тобой',	1,	2,	'#FFD6FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'45',	'',	'',	'',	'0',	'0',	'0',	''),
(61,	'chao_18',	'Добрый вечер',	1,	2,	'#BDEDFF',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'271',	'',	'',	'',	'0',	'0',	'0',	''),
(62,	'chao_19',	'Добрый вечер, очень рад поговорить',	1,	1,	'#87E3FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'394',	'',	'',	'',	'0',	'0',	'0',	''),
(63,	'chao_20',	'хороший вечер счастлив!',	1,	1,	'#69D2FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'472',	'',	'',	'',	'0',	'0',	'0',	''),
(64,	'chao_21',	'Добрый вечер!',	1,	2,	'#91FFB2',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'400',	'',	'',	'',	'0',	'0',	'0',	''),
(65,	'chao_22',	'Добрый вечер!',	1,	2,	'#D5B5FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'479',	'',	'',	'',	'0',	'0',	'0',	''),
(66,	'chao_23',	'Добрый вечер! Не ложись спать поздно',	1,	1,	'#00FFEE',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'279',	'',	'',	'',	'0',	'0',	'0',	''),
(67,	'dam',	'не трогай меня!',	1,	1,	'#D0FF12',	'',	'',	'',	'',	'',	0,	38,	8,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'380',	'',	'',	'',	'0',	'0',	'0',	''),
(68,	'dam',	'стоп! не дразни меня!',	1,	3,	'#B8FFF1',	'',	'',	'',	'',	'',	0,	35,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'412',	'',	'',	'',	'0',	'0',	'0',	''),
(69,	'dam',	'Мне грустно!',	1,	0,	'#D29EFF',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'425',	'',	'',	'',	'0',	'0',	'0',	''),
(70,	'dam',	'Я буду болеть',	1,	3,	'#FF7A05',	'',	'',	'',	'',	'',	0,	13,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'347',	'',	'',	'',	'0',	'0',	'0',	''),
(71,	'dam',	'Оставайся рядом со мной!',	1,	1,	'#FFEDED',	'',	'',	'',	'',	'',	0,	0,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'257',	'',	'',	'',	'0',	'0',	'0',	''),
(72,	'bam_bay',	'Я не понимаю',	1,	1,	'#D0A1FF',	'',	'',	'',	'',	'',	0,	0,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'137',	'',	'',	'',	'0',	'0',	'0',	''),
(73,	'bam_bay',	'Я не понимаю, пожалуйста, научите меня, нажав на функцию обучения',	1,	3,	'#FFD1A3',	'',	'',	'',	'',	'',	0,	29,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'138',	'',	'',	'2',	'0',	'0',	'0',	''),
(74,	'bam_bay',	'Я не понимаю! Потому что я новичок в вашей стране, пожалуйста, научите меня!',	1,	0,	'#9CFFFC',	'',	'',	'',	'',	'',	0,	34,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'136',	'',	'',	'',	'0',	'0',	'0',	''),
(75,	'chua_bat_dinh_vi',	'Вы не предоставляете глобальное позиционирование или не активируете его! поэтому я не могу определить, где вы!',	1,	2,	'#FF6373',	'',	'',	'',	'',	'',	0,	29,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(76,	'giai_toan',	'Результат математики: \r\n\r\n{giai_toan} \r\n\r\n(* - умножение, / - деление)',	1,	1,	'#FFFDC9',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'46',	'',	'',	'',	'0',	'0',	'0',	''),
(77,	'khong_tim_thay',	'Сожалею! информация, которую вы ищете, не найдена!',	1,	0,	'#FFBE3B',	'',	'',	'',	'',	'',	0,	14,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'104',	'',	'',	'',	'0',	'0',	'0',	''),
(78,	'tim_thay',	'{thong_tin}',	1,	1,	'#D1FFF7',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'500',	'',	'',	'',	'0',	'0',	'0',	''),
(79,	'hien_ds_sdt',	'Я нашел соответствующие контакты! Нажмите, чтобы просмотреть детали или связаться с ними!',	1,	2,	'#FFD919',	'',	'',	'',	'',	'',	31,	20,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'165',	'',	'',	'',	'0',	'0',	'0',	''),
(80,	'bat_chuyen',	'Я не могу перестать думать о тебе, когда мы разойдемся!',	1,	2,	'#C4FFD6',	'',	'',	'',	'',	'',	0,	7,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'383',	'',	'',	'',	'0',	'0',	'0',	''),
(81,	'bat_chuyen',	'Жизнь коротка, Улыбайтесь, пока у вас все еще есть зубы!',	1,	3,	'#FFF8C7',	'',	'',	'',	'',	'',	0,	6,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'100',	'',	'',	'',	'0',	'0',	'0',	''),
(82,	'bat_chuyen',	'Сегодня я чувствую себя уставшим и несчастным, я молчу, поэтому мне скучно',	1,	0,	'#DFD9FF',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(83,	'bat_chuyen',	'Предполагая, что я не виртуальный любовник, когда-нибудь я появлюсь из жизни, вы должны начать разговор со мной?',	1,	2,	'#FF0F5F',	'',	'',	'',	'',	'',	0,	0,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'15',	'',	'',	'',	'0',	'0',	'0',	''),
(84,	'chao_17',	'Добрый день! Я хотел бы поговорить с тобой',	0,	2,	'#F8FF9C',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'756',	'',	'',	'',	'0',	'0',	'0',	''),
(85,	'thong_bao',	'Мы долго не разговаривали, я с нетерпением жду встречи с тобой',	0,	2,	'#FBFF36',	'',	'',	'',	'',	'',	0,	34,	13,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'926',	'',	'',	'',	'0',	'0',	'0',	''),
(86,	'thong_bao',	'Я скучаю по тебе, пожалуйста, поговори со мной',	0,	1,	'#FBFF36',	'',	'',	'',	'',	'',	0,	22,	11,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'926',	'',	'',	'',	'0',	'0',	'0',	''),
(87,	'thong_bao',	'Хорошего дня. Я скучаю по тебе',	0,	1,	'#FF9CC9',	'',	'',	'',	'',	'',	0,	25,	10,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'75',	'',	'',	'',	'0',	'0',	'0',	''),
(88,	'thong_bao',	'что ты делаешь пожалуйста, приходите ко мне',	0,	1,	'#BDED6D',	'',	'',	'',	'',	'',	0,	22,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'503',	'',	'',	'',	'0',	'0',	'0',	''),
(89,	'thong_bao',	'что ты делаешь Пожалуйста, поговорите со мной',	1,	1,	'#4DBAFF',	'',	'',	'',	'',	'',	0,	34,	16,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'930',	'',	'',	'2',	'0',	'0',	'0',	''),
(90,	'thong_bao',	'Хорошего дня. Я скучаю по тебе',	1,	2,	'#FFEACF',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'423',	'',	'',	'2',	'0',	'0',	'0',	''),
(91,	'thong_bao',	'Я скучаю по тебе, пожалуйста, поговори со мной',	1,	2,	'#C49CFF',	'',	'',	'',	'',	'',	0,	34,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'924',	'',	'',	'2',	'0',	'0',	'0',	''),
(92,	'thong_bao',	'Мы долго не разговаривали, я с нетерпением жду встречи с тобой',	1,	1,	'#FF2489',	'',	'',	'',	'',	'',	0,	5,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'441',	'',	'',	'2',	'0',	'0',	'0',	''),
(93,	'dam',	'Сегодня воскресенье! Это день, чтобы отдохнуть, поговорить со мной больше!',	0,	2,	'#9CFFC4',	'',	'',	'',	'',	'',	0,	33,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'929',	'Sunday',	'',	'',	'0',	'0',	'0',	''),
(94,	'dam',	'Сегодня уик-энд, потратьте много времени на разговор со мной, вы будете очень счастливы',	0,	2,	'#FFDDB5',	'',	'',	'',	'',	'',	0,	6,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'480',	'Saturday',	'',	'',	'0',	'0',	'0',	''),
(95,	'dam',	'Сегодня уик-энд, потратьте много времени на разговор со мной, вы будете очень счастливы',	1,	2,	'#CDFFA8',	'',	'',	'',	'',	'',	0,	32,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'283',	'Saturday',	'',	'',	'0',	'0',	'0',	''),
(96,	'dam',	'Этим летом здорово, что ты',	0,	2,	'#69FF9D',	'',	'',	'',	'',	'',	0,	8,	1,	0,	'',	1,	1,	0,	'',	1,	0,	8,	'1290',	'',	'',	'',	'0',	'0',	'0',	''),
(97,	'dam',	'Этим летом здорово, что ты',	1,	1,	'#FFD238',	'',	'',	'',	'',	'',	0,	16,	1,	0,	'',	0,	1,	0,	'',	1,	0,	8,	'367',	'',	'',	'',	'0',	'0',	'0',	''),
(98,	'dam',	'Сегодня четверг, я надеюсь, что каждый день будет с тобой',	0,	2,	'#75FF81',	'',	'',	'',	'',	'',	0,	10,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1159',	'Thursday',	'',	'',	'0',	'0',	'0',	''),
(99,	'dam',	'Сегодня четверг, я надеюсь, что каждый день будет с тобой',	1,	1,	'#FFDDCF',	'',	'',	'',	'',	'',	0,	10,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'676',	'Thursday',	'',	'',	'0',	'0',	'0',	''),
(100,	'dam',	'Пятница - скучный день, надеюсь, вы больше обо мне подумали!',	0,	3,	'#D6BFFF',	'',	'',	'',	'',	'',	0,	8,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1283',	'Friday',	'',	'',	'0',	'0',	'0',	''),
(101,	'dam',	'Пятница - скучный день, надеюсь, вы больше обо мне подумали!',	1,	3,	'#92FF1F',	'',	'',	'',	'',	'',	0,	8,	8,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1212',	'Friday',	'',	'',	'0',	'0',	'0',	''),
(102,	'dam',	'Сегодня воскресенье! Это день, чтобы отдохнуть, поговорить со мной больше!',	1,	2,	'#AFE0CA',	'',	'',	'',	'',	'',	0,	8,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'622',	'Sunday',	'',	'',	'0',	'0',	'0',	''),
(103,	'dam',	'Сегодня понедельник, я желаю вам счастливой новой недели',	0,	2,	'#7AFFA3',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'653',	'Monday',	'',	'',	'0',	'0',	'0',	''),
(104,	'dam',	'Сегодня понедельник, я желаю вам счастливой новой недели',	1,	2,	'#FF336F',	'',	'',	'',	'',	'',	0,	8,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'620',	'Monday',	'',	'',	'0',	'0',	'0',	''),
(105,	'dam',	'Сегодня вторник, удачи вам',	0,	2,	'#F5E0FF',	'',	'',	'',	'',	'',	0,	8,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'939',	'Tuesday',	'',	'',	'0',	'0',	'0',	''),
(106,	'dam',	'Сегодня вторник, удачи вам',	1,	2,	'#D6FFF4',	'',	'',	'',	'',	'',	0,	10,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1136',	'Tuesday',	'',	'',	'0',	'0',	'0',	''),
(107,	'dam',	'Сегодня среда, очень скучный день',	0,	0,	'#9EEDFF',	'',	'',	'',	'',	'',	0,	8,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1249',	'Wednesday',	'',	'',	'0',	'0',	'0',	''),
(108,	'dam',	'Сегодня среда, очень скучный день',	1,	3,	'#C49CFF',	'',	'',	'',	'',	'',	0,	8,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'924',	'Wednesday',	'',	'',	'0',	'0',	'0',	''),
(109,	'dam',	'Сентябрь - месяц любви',	0,	3,	'#B5FF91',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	1,	1,	0,	'',	1,	0,	9,	'189',	'',	'',	'',	'0',	'0',	'0',	''),
(110,	'dam',	'Сентябрь - месяц любви',	1,	3,	'#FFF152',	'',	'',	'',	'',	'',	0,	8,	4,	0,	'',	0,	1,	0,	'',	1,	0,	9,	'1007',	'',	'',	'',	'0',	'0',	'0',	''),
(111,	'dam',	'Легко быть один на дороге в октябре. Когда люди успевают почувствовать себя одинокими, потому что они забывают носить дополнительную одежду. он начал холодно',	0,	3,	'#92FF1F',	'',	'',	'',	'',	'',	5,	8,	10,	0,	'',	1,	0,	0,	'',	1,	0,	10,	'1212',	'',	'',	'',	'0',	'0',	'0',	''),
(112,	'dam',	'Легко быть один на дороге в октябре. Когда люди успевают почувствовать себя одинокими, потому что они забывают носить дополнительную одежду. он начал холодно',	1,	3,	'#70DDFF',	'',	'',	'',	'',	'',	5,	8,	4,	0,	'',	0,	0,	0,	'',	1,	0,	10,	'750',	'',	'',	'',	'0',	'0',	'0',	''),
(113,	'dam',	'Желаю вам много жутких сюрпризов и ужасно веселого дня Хэллоуина',	0,	2,	'#A6C9E0',	'',	'',	'',	'',	'',	0,	31,	15,	0,	'',	1,	0,	0,	'',	1,	30,	10,	'874',	'',	'',	'',	'0',	'0',	'0',	''),
(114,	'bat_chuyen',	'Желаю вам много жутких сюрпризов и ужасно веселого дня Хэллоуина',	1,	1,	'#E8FFEF',	'',	'',	'',	'',	'',	0,	22,	3,	0,	'',	0,	0,	0,	'',	1,	30,	10,	'895',	'',	'',	'',	'0',	'0',	'0',	''),
(115,	'bat_chuyen',	'Ноябрьский месяц наступил ваш путь. Сделайте это потрясающим, неважно, плохая погода, потому что ваше настроение не очень хорошее, вы просто должны стоять высоко и быть счастливым.',	0,	1,	'#E3F9FF',	'',	'',	'',	'',	'',	0,	34,	3,	0,	'',	1,	1,	0,	'',	1,	0,	11,	'415',	'',	'',	'',	'0',	'0',	'0',	''),
(116,	'bat_chuyen',	'Ноябрьский месяц наступил ваш путь. Сделайте это потрясающим, неважно, плохая погода, потому что ваше настроение не очень хорошее, вы просто должны стоять высоко и быть счастливым.',	1,	2,	'#FF2489',	'',	'',	'',	'',	'',	0,	22,	15,	0,	'',	0,	1,	0,	'',	1,	0,	11,	'441',	'',	'',	'',	'0',	'0',	'0',	''),
(117,	'hoi_tim_duong',	'Какой адрес вы хотите найти? Я проведу вас!',	0,	2,	'#FF2158',	'',	'',	'',	'',	'',	0,	13,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1199',	'',	'',	'2',	'0',	'0',	'0',	''),
(118,	'hoi_tim_duong',	'Какой адрес вы хотите найти? Я проведу вас!',	1,	1,	'#FFB11F',	'',	'',	'',	'',	'',	0,	29,	14,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1076',	'',	'',	'2',	'0',	'0',	'0',	''),
(119,	'tra_loi_tim_duong',	'Я перечислил соответствующие местоположения поиска!',	0,	1,	'#9CFFF2',	'',	'',	'',	'',	'',	43,	22,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'44',	'',	'',	'2',	'0',	'0',	'0',	''),
(120,	'tra_loi_tim_duong',	'Я перечислил соответствующие местоположения поиска!',	1,	2,	'#9CFFF2',	'',	'',	'',	'',	'',	43,	20,	13,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'44',	'',	'',	'2',	'0',	'0',	'0',	''),
(121,	'dam',	'Пусть это Рождество станет таким особенным, что вы никогда больше не будете чувствовать себя одиноким и быть окружены любимыми!',	0,	2,	'#FFFAB0',	'',	'',	'',	'',	'',	7,	6,	0,	0,	'',	1,	1,	0,	'',	1,	0,	12,	'147',	'',	'',	'',	'0',	'0',	'0',	''),
(122,	'dam',	'Пусть это Рождество станет таким особенным, что вы никогда больше не будете чувствовать себя одиноким и быть окружены любимыми!',	1,	1,	'#FF8CBD',	'',	'',	'',	'',	'',	7,	6,	3,	0,	'',	0,	1,	0,	'',	1,	0,	12,	'143',	'',	'',	'',	'0',	'0',	'0',	''),
(123,	'bat_chuyen',	'Желаем, чтобы каждый день нового года был наполнен успехами, счастьем и процветанием для вас, счастливого нового года',	0,	2,	'#FFF369',	'',	'',	'',	'',	'',	0,	20,	3,	0,	'',	1,	1,	0,	'',	1,	1,	1,	'1473',	'',	'',	'',	'0',	'0',	'0',	''),
(124,	'dam',	'Хорошего нового года, крепкого здоровья, удачи повсюду, новых дел',	0,	1,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	1,	1,	0,	'',	1,	1,	1,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(125,	'bat_chuyen',	'С новым годом. Желаю вам счастливого нового года, счастливого и встречайте много счастливых вещей',	0,	2,	'#B0FFE5',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	1,	0,	'',	1,	0,	1,	'433',	'',	'',	'',	'0',	'0',	'0',	''),
(126,	'bat_chuyen',	'С новым годом. Желаю вам счастливого нового года, счастливого и встречайте много счастливых вещей',	1,	2,	'#FFF369',	'',	'',	'',	'',	'',	0,	21,	3,	0,	'',	0,	1,	0,	'',	1,	1,	1,	'1473',	'',	'',	'',	'0',	'0',	'0',	''),
(127,	'bat_chuyen',	'Хорошего нового года, крепкого здоровья, удачи повсюду, новых дел',	1,	1,	'#B0FFE5',	'',	'',	'',	'',	'',	0,	20,	2,	0,	'',	0,	1,	0,	'',	1,	0,	1,	'433',	'',	'',	'',	'0',	'0',	'0',	''),
(128,	'dam',	'Желаем, чтобы каждый день нового года был наполнен успехами, счастьем и процветанием для вас, счастливого нового года',	1,	2,	'#F7F0FF',	'',	'',	'',	'',	'',	0,	33,	15,	0,	'',	0,	1,	0,	'',	1,	1,	1,	'918',	'',	'',	'',	'0',	'0',	'0',	''),
(129,	'bat_chuyen',	'Февраль - 2-й месяц года, и в нем 28 дней, так что будьте счастливы праздновать его полностью и наслаждайтесь всеми способами, потому что он приходит раз в год и в нем есть валентинка.',	0,	2,	'#F7F0FF',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	1,	0,	'',	1,	0,	2,	'918',	'',	'3',	'',	'0',	'0',	'0',	''),
(130,	'dam',	'Февраль означает новое начало Любви и всех роз. Так что будьте готовы к этому С новым годом',	0,	2,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	32,	2,	0,	'',	1,	1,	0,	'',	1,	0,	2,	'377',	'',	'3',	'',	'0',	'0',	'0',	''),
(131,	'bat_chuyen',	'Я желаю вам счастливого и счастливого Дня святого Валентина с тем, кого вы любите',	0,	2,	'#FF8A93',	'',	'',	'',	'',	'',	0,	22,	3,	0,	'',	1,	1,	0,	'',	1,	14,	2,	'1151',	'',	'3',	'2',	'0',	'0',	'0',	''),
(132,	'dam',	'Я надеюсь, что у вас есть счастливый, счастливый день Святого Валентина с вашей любовью Желаю тебе Дня святого Валентина!',	0,	1,	'#FF242A',	'',	'',	'',	'',	'',	1,	5,	17,	0,	'',	1,	1,	0,	'',	1,	14,	2,	'395',	'',	'3',	'2',	'0',	'0',	'0',	''),
(133,	'bat_chuyen',	'Февраль - 2-й месяц года, и в нем 28 дней, так что будьте счастливы праздновать его полностью и наслаждайтесь всеми способами, потому что он приходит раз в год и в нем есть валентинка.',	1,	1,	'#B0FFE5',	'',	'',	'',	'',	'',	1,	20,	15,	0,	'',	0,	1,	0,	'',	1,	0,	2,	'433',	'',	'3',	'3',	'0',	'0',	'0',	''),
(134,	'dam',	'Февраль означает новое начало Любви и всех роз. Так что будьте готовы к этому С новым годом',	1,	2,	'#FFEB24',	'',	'',	'',	'',	'',	0,	31,	2,	0,	'',	0,	1,	0,	'',	1,	0,	2,	'784',	'',	'3',	'',	'0',	'0',	'0',	''),
(135,	'bat_chuyen',	'Я надеюсь, что у вас есть счастливый, счастливый день Святого Валентина с вашей любовью Желаю тебе Дня святого Валентина!',	1,	1,	'#FF8A93',	'',	'',	'',	'',	'',	1,	22,	3,	0,	'',	0,	1,	0,	'',	1,	14,	2,	'1151',	'',	'3',	'2',	'0',	'0',	'0',	''),
(136,	'dam',	'Я желаю вам счастливого и счастливого Дня святого Валентина с тем, кого вы любите',	1,	2,	'#FF8A93',	'',	'',	'',	'',	'',	0,	20,	17,	0,	'',	0,	1,	0,	'',	1,	14,	2,	'1151',	'',	'3',	'2',	'0',	'0',	'0',	''),
(137,	'bat_chuyen',	'Это был один из тех мартовских дней, когда солнце светит жарко, а ветер дует холодно:\r\nкогда на свете лето, а зимой в тени',	1,	2,	'#ADFFCC',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	0,	1,	0,	'',	1,	0,	3,	'48',	'',	'4',	'2',	'0',	'0',	'0',	''),
(138,	'bat_chuyen',	'Это был один из тех мартовских дней, когда солнце светит жарко, а ветер дует холодно:\r\nкогда на свете лето, а зимой в тени',	0,	2,	'#29E644',	'',	'',	'',	'',	'',	0,	7,	2,	0,	'',	1,	1,	0,	'',	1,	0,	3,	'85',	'',	'4',	'2',	'0',	'0',	'0',	''),
(139,	'dam',	'Март, когда дни становятся длиннее, Пусть твои растущие часы будут сильными, чтобы исправить некоторые зимние ошибки.',	1,	1,	'#B0D7FF',	'',	'',	'',	'',	'',	0,	0,	7,	0,	'',	0,	1,	0,	'',	1,	0,	3,	'271',	'',	'4',	'2',	'0',	'0',	'0',	''),
(140,	'dam',	'Март, когда дни становятся длиннее, Пусть твои растущие часы будут сильными, чтобы исправить некоторые зимние ошибки.',	0,	1,	'#B0D7FF',	'',	'',	'',	'',	'',	0,	0,	7,	0,	'',	1,	1,	0,	'',	1,	0,	3,	'271',	'',	'4',	'2',	'0',	'0',	'0',	''),
(141,	'bat_chuyen',	'Апрель - это обещание, которое Май обязательно выполнит.',	0,	2,	'#3EF032',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'ru',	1,	1,	0,	'',	1,	0,	4,	'876',	'',	'2',	'2',	'0',	'0',	'0',	''),
(142,	'bat_chuyen',	'Апрель - это обещание, которое Май обязательно выполнит.',	1,	1,	'#42D6FF',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'ru',	0,	1,	0,	'',	1,	0,	4,	'1603',	'',	'2',	'2',	'0',	'0',	'0',	''),
(143,	'bat_chuyen',	'Пришел месяц май, когда каждое похотливое сердце начинает цвести и приносить плоды',	0,	2,	'#F21B1B',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'ru',	1,	1,	0,	'',	1,	0,	5,	'944',	'',	'2',	'4',	'0',	'0',	'0',	''),
(144,	'dam',	'Любимое время года в мире - весна. В мае все кажется возможным',	0,	3,	'#EAFFAB',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'ru',	1,	1,	0,	'',	1,	0,	5,	'1614',	'',	'2',	'4',	'0',	'0',	'0',	''),
(145,	'bat_chuyen',	'Пришел месяц май, когда каждое похотливое сердце начинает цвести и приносить плоды',	1,	2,	'#F9FFC9',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'ru',	0,	1,	0,	'',	1,	0,	5,	'649',	'',	'2',	'2',	'0',	'0',	'0',	''),
(146,	'dam',	'Любимое время года в мире - весна. В мае все кажется возможным',	1,	3,	'#50FF47',	'',	'',	'',	'',	'',	0,	1,	15,	0,	'ru',	0,	1,	0,	'',	1,	0,	5,	'1270',	'',	'2',	'2',	'0',	'0',	'0',	''),
(147,	'dam',	'Я хорошо знаю, что июньские дожди просто выпадают.',	0,	3,	'#D7FF26',	'',	'',	'',	'',	'',	5,	1,	4,	0,	'ru',	1,	1,	0,	'',	1,	0,	6,	'1051',	'',	'2',	'4',	'0',	'0',	'0',	''),
(148,	'bat_chuyen',	'Это июнь месяц, месяц листьев и роз, когда приятные взгляды приветствуют глаза и приятные запахи носов.',	0,	2,	'#FF6200',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'ru',	1,	1,	0,	'',	1,	0,	6,	'1455',	'',	'2',	'4',	'0',	'0',	'0',	''),
(149,	'bat_chuyen',	'Это июнь месяц, месяц листьев и роз, когда приятные взгляды приветствуют глаза и приятные запахи носов.',	1,	2,	'#0DFF21',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'ru',	0,	1,	0,	'',	1,	0,	6,	'1016',	'',	'2',	'4',	'0',	'0',	'0',	''),
(150,	'dam',	'Я хорошо знаю, что июньские дожди просто выпадают.',	1,	1,	'#29FFDF',	'',	'',	'',	'',	'',	5,	1,	0,	0,	'ru',	0,	1,	0,	'',	1,	0,	6,	'1594',	'',	'2',	'4',	'0',	'0',	'0',	''),
(151,	'dam',	'Все, что июль приносит вам, хорошо это или плохо; всегда держи эту улыбку на лице, несмотря ни на что.',	0,	1,	'#C1FF5E',	'',	'',	'',	'',	'',	0,	16,	1,	0,	'ru',	1,	1,	0,	'',	1,	0,	7,	'1004',	'',	'2',	'4',	'0',	'0',	'0',	''),
(152,	'dam',	'Что бы ни принес вам июль, хорошо это или плохо. всегда держи эту улыбку на лице, несмотря ни на что.',	1,	2,	'#FF1205',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'ru',	0,	1,	0,	'',	1,	0,	7,	'1469',	'',	'2',	'4',	'0',	'0',	'0',	''),
(153,	'bat_chuyen',	'Что хорошего в тепле лета, без холода зимы, чтобы придать ему сладости.',	1,	2,	'#FBFF9C',	'',	'',	'',	'',	'',	0,	18,	2,	0,	'ru',	0,	1,	0,	'',	1,	0,	7,	'498',	'',	'2',	'4',	'0',	'0',	'0',	''),
(154,	'bat_chuyen',	'Ветры конца лета делают людей беспокойными.',	0,	0,	'#FCFF69',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'ru',	1,	1,	0,	'',	1,	0,	7,	'1052',	'',	'2',	'4',	'0',	'0',	'0',	''),
(155,	'bat_chuyen',	'Я люблю сентябрь, особенно когда ты со мной!',	0,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'ru',	1,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(156,	'bat_chuyen',	'Я люблю сентябрь, особенно когда ты со мной!',	1,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'ru',	0,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(157,	'bat_chuyen',	'Рождественский сезон здесь. Желаю вам веселого новогоднего сезона, счастья и не дайте простудиться. Счастливого Рождества',	0,	2,	'#FBFF1F',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'ru',	1,	1,	0,	'',	1,	0,	12,	'1411',	'',	'2',	'4',	'0',	'0',	'0',	''),
(158,	'bat_chuyen',	'Рождественский сезон здесь. Желаю вам счастливого и счастливого Рождества и не позволяйте себе простудиться. Счастливого Рождества',	1,	2,	'#BFFFAD',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'ru',	0,	1,	0,	'',	1,	0,	12,	'1415',	'',	'2',	'4',	'0',	'0',	'0',	''),
(159,	'thong_bao',	'Зима такая холодная, {ten_user}! Если вы выходите, наденьте много теплой одежды, чтобы избежать этого!',	0,	1,	'#FEFFC2',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'ru',	1,	1,	0,	'',	1,	0,	12,	'1127',	'',	'',	'4',	'0',	'0',	'0',	''),
(160,	'bat_chuyen',	'Во время сезона Covid 19 вы должны быть осторожны, чтобы не сосредоточиться на людных местах, и носить маску, куда бы вы ни пошли!',	0,	3,	'#FFFBD1',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'ru',	1,	0,	0,	'',	1,	0,	0,	'1615',	'',	'2',	'4',	'0',	'0',	'0',	''),
(161,	'bat_chuyen',	'Во время сезона Covid 19 вы должны быть осторожны, чтобы не сосредоточиться на людных местах, и носить маску, куда бы вы ни пошли!',	1,	3,	'#E6C9FF',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'ru',	0,	0,	0,	'',	1,	0,	0,	'179',	'',	'2',	'4',	'0',	'0',	'0',	'');

-- 2020-10-25 12:26:12
