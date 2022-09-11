-- Adminer 4.8.1 MySQL 5.7.39 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_msg_es`;
CREATE TABLE `app_my_girl_msg_es` (
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

INSERT INTO `app_my_girl_msg_es` (`id`, `func`, `chat`, `sex`, `status`, `color`, `q1`, `q2`, `r1`, `r2`, `vibrate`, `effect`, `action`, `face`, `certify`, `author`, `character_sex`, `disable`, `ver`, `os`, `limit_chat`, `limit_date`, `limit_month`, `effect_customer`, `limit_day`, `user_create`, `user_update`, `os_window`, `os_ios`, `os_android`, `file_url`) VALUES
(1,	'chao_0',	'Por qué no duerme! Por favor Chatea conmigo!',	0,	1,	'#9CEBFF',	'',	'',	'',	'',	'',	3,	5,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'',	'',	'',	'',	'0',	'0',	'0',	''),
(2,	'bam_bay',	'¡No entiendo! Sigo siendo tan estúpida, usted puede enseñarme (haga clic en la función de enseñar en la pantalla)',	0,	1,	'#C0FF2B',	'',	'',	'',	'',	'',	0,	34,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'137',	'',	'',	'2',	'0',	'0',	'0',	''),
(3,	'chao_18',	'¿Tenido cena todavía? ¡deseo que usted tiene una gran velada!',	0,	1,	'#00FFF7',	'',	'',	'',	'',	'',	0,	10,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'91',	'',	'',	'',	'0',	'0',	'0',	''),
(4,	'chao_1',	'Es tarde, deberías dormir temprano, es malo para la salud',	0,	3,	'#9CF5FF',	'',	'',	'',	'',	'',	3,	10,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'88',	'',	'',	'',	'0',	'0',	'0',	''),
(5,	'chao_2',	'¿Por qué duermes hasta tarde, recuerdo que no puedes dormir?',	0,	2,	'#C7CBFF',	'',	'',	'',	'',	'',	0,	0,	8,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'86',	'',	'',	'',	'0',	'0',	'0',	''),
(6,	'chao_3',	'Me desperté temprano, Buenos días',	0,	1,	'#AFFF24',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'97',	'',	'',	'',	'0',	'0',	'0',	''),
(7,	'chao_4',	'Te levantas temprano, Buenos días.',	0,	1,	'#B647FF',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(8,	'chao_5',	'Hola, Buenos días, buenas para pasar un divertido día',	0,	1,	'#E0FF8C',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'47',	'',	'',	'',	'0',	'0',	'0',	''),
(9,	'chao_6',	'Buenos días, tenía el desayuno, comer el desayuno para obtener energía para un nuevo día lleno de energía',	0,	2,	'#ACFF40',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'29',	'',	'',	'',	'0',	'0',	'0',	''),
(10,	'chao_7',	'Buenos dias mi amor, deseo que tengas suerte este dia',	0,	1,	'#FF0D8E',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'48',	'',	'',	'',	'0',	'0',	'0',	''),
(11,	'chao_8',	'Buenos días, disfrutar de un nuevo día de trabajo divertirse',	0,	2,	'#B1FF4A',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'89',	'',	'',	'',	'0',	'0',	'0',	''),
(12,	'chao_9',	'Buenos días, mi amor, que tengas un buen día y suerte',	0,	1,	'#CAFF4F',	'',	'',	'',	'',	'',	3,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'19',	'',	'',	'',	'0',	'0',	'0',	''),
(13,	'chao_10',	'Hola, el tiempo pasa rápidamente para desear un feliz día feliz',	0,	1,	'#EBFF66',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'37',	'',	'',	'',	'0',	'0',	'0',	''),
(14,	'chao_11',	'Buenas tardes',	0,	1,	'#9FFF5E',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'87',	'',	'',	'',	'0',	'0',	'0',	''),
(15,	'chao_12',	'Buenas tardes',	0,	1,	'#FFBC1F',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'91',	'',	'',	'',	'0',	'0',	'0',	''),
(16,	'chao_13',	'Deberías tomar una siesta',	0,	1,	'#FFCB52',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'86',	'',	'',	'',	'0',	'0',	'0',	''),
(17,	'chao_14',	'Deberías tomar una siesta',	0,	3,	'#E5FF61',	'',	'',	'',	'',	'',	0,	6,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'37',	'',	'',	'',	'0',	'0',	'0',	''),
(18,	'chao_15',	'Feliz tarde',	0,	1,	'#FF904F',	'',	'',	'',	'',	'',	3,	0,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'100',	'',	'',	'',	'0',	'0',	'0',	''),
(19,	'chao_16',	'Siempre a tu lado!',	0,	1,	'#FF6BD8',	'',	'',	'',	'',	'',	0,	6,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'48',	'',	'',	'',	'0',	'0',	'0',	''),
(20,	'chao_17',	'Siempre a tu lado!',	0,	2,	'#F2FF36',	'',	'',	'',	'',	'',	0,	6,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'47',	'',	'',	'',	'0',	'0',	'0',	''),
(21,	'chao_20',	'Buenas noches',	0,	2,	'#5CFF9D',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'100',	'',	'',	'',	'0',	'0',	'0',	''),
(22,	'chao_21',	'Buenas noches',	0,	1,	'#75FFF6',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'97',	'',	'',	'',	'0',	'0',	'0',	''),
(23,	'chao_22',	'Buenas noches',	0,	1,	'#82EEFF',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(24,	'chao_23',	'Buenas noches',	0,	1,	'#B5FFF5',	'',	'',	'',	'',	'',	0,	6,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(25,	'bat_chuyen',	'¿qué andas haciendo?',	0,	2,	'#FFEC40',	'',	'',	'',	'',	'',	0,	14,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'81',	'',	'',	'',	'0',	'0',	'0',	''),
(26,	'bat_chuyen',	'no me siento muy bien',	0,	0,	'#F4C9FF',	'',	'',	'',	'',	'',	0,	3,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(27,	'bat_chuyen',	'Esta noche hará frio. Será mejor que lleves una chaqueta.',	0,	3,	'#BDF6FF',	'',	'',	'',	'',	'',	7,	10,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(28,	'bat_chuyen',	'Sólo deseo hacerte feliz.',	0,	1,	'#D3FF21',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'87',	'',	'',	'',	'0',	'0',	'0',	''),
(29,	'bat_chuyen',	'Hace fresquito hoy, así que debes arroparte bien.',	0,	1,	'#FF033C',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'419',	'',	'',	'',	'0',	'0',	'0',	''),
(30,	'bam_bay',	'soy muy estúpida, por favor enséñame (haciendo clic en la función de enseñanza en la pantalla)',	0,	1,	'#9EFF4A',	'',	'',	'',	'',	'',	0,	10,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'93',	'',	'',	'2',	'0',	'0',	'0',	''),
(31,	'bam_bay',	'No entiendo, por favor enséñame (haciendo clic en la función de enseñanza en la pantalla)',	0,	2,	'#8AFF7D',	'',	'',	'',	'',	'',	0,	34,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'88',	'',	'',	'',	'0',	'0',	'0',	''),
(32,	'bam_bay',	'Soy nuevo en español, así que hay muchas incógnitas, por favor enséñame (haciendo clic en la función de enseñanza en la pantalla)',	0,	1,	'#FF579A',	'',	'',	'',	'',	'',	0,	34,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'96',	'',	'',	'2',	'0',	'0',	'0',	''),
(33,	'dam',	'no me toques',	0,	1,	'#FF00FF',	'',	'',	'',	'',	'',	0,	10,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'32',	'',	'',	'2',	'0',	'0',	'0',	''),
(34,	'dam',	'Eres muy gracioso!',	0,	3,	'#40CCFF',	'',	'',	'',	'',	'',	0,	24,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'82',	'',	'',	'',	'0',	'0',	'0',	''),
(35,	'dam',	'¡Puedes dejarme en paz!',	0,	3,	'#FFC400',	'',	'',	'',	'',	'',	0,	35,	8,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'63',	'',	'',	'',	'0',	'0',	'0',	''),
(36,	'dam',	'Por favor, no hagas eso, tengo miedo!',	0,	2,	'#44FF00',	'',	'',	'',	'',	'',	0,	1,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'85',	'',	'',	'2',	'0',	'0',	'0',	''),
(37,	'dam',	'Te odio',	0,	3,	'#DE38FF',	'',	'',	'',	'',	'',	3,	15,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(38,	'dam',	'Te odio',	1,	3,	'#FF45AE',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'63',	'',	'',	'',	'0',	'0',	'0',	''),
(39,	'dam',	'Por favor, no hagas eso, tengo miedo!',	1,	2,	'#FF7AFB',	'',	'',	'',	'',	'',	0,	38,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(40,	'dam',	'¿¡Puedes dejarme en paz!?',	1,	1,	'#DDFF00',	'',	'',	'',	'',	'',	3,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'31',	'',	'',	'',	'0',	'0',	'0',	''),
(41,	'dam',	'Eres muy gracioso!',	1,	1,	'#FFA914',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'48',	'',	'',	'',	'0',	'0',	'0',	''),
(42,	'dam',	'no me toques',	1,	3,	'#00FF5E',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'33',	'',	'',	'',	'0',	'0',	'0',	''),
(43,	'bam_bay',	'Estoy aprendiendo español, entonces hay muchas cosas desconocidas, por favor, ¡enséñame!\r\n(haciendo clic en la función de enseñanza de pantalla)',	1,	2,	'#FAB8FF',	'',	'',	'',	'',	'',	0,	34,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'96',	'',	'',	'4',	'0',	'0',	'0',	''),
(44,	'bam_bay',	'No entiendo, por favor enséñame (haciendo clic en la función de enseñanza en la pantalla)',	1,	0,	'#B3FFF5',	'',	'',	'',	'',	'',	0,	34,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'88',	'',	'',	'2',	'0',	'0',	'0',	''),
(45,	'bam_bay',	'Soy muy estúpido, por favor enséñame (haciendo clic en la función de enseñanza en la pantalla)',	1,	2,	'#E787FF',	'',	'',	'',	'',	'',	0,	34,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'93',	'',	'',	'4',	'0',	'0',	'0',	''),
(46,	'bat_chuyen',	'Hace fresquito hoy, así que debes arroparte bien.',	1,	1,	'#D1E2FF',	'',	'',	'',	'',	'',	5,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(47,	'bat_chuyen',	'Sólo deseo hacerte feliz.',	1,	2,	'#FF2499',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'101',	'',	'',	'',	'0',	'0',	'0',	''),
(48,	'bat_chuyen',	'Esta noche hará fresquito. Será mejor que lleves una chaqueta.',	1,	1,	'#D4F8FF',	'',	'',	'',	'',	'',	7,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(49,	'bat_chuyen',	'no me siento muy bien',	1,	0,	'#FFA6ED',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'47',	'',	'',	'',	'0',	'0',	'0',	''),
(50,	'bat_chuyen',	'¿qué andas haciendo?',	1,	3,	'#FFE814',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'81',	'',	'',	'',	'0',	'0',	'0',	''),
(51,	'bam_bay',	'¡No entiendo! Sigo siendo tan estúpido, usted puede enseñarme (haga clic en la función de enseñar en la pantalla)',	1,	2,	'#FFEE00',	'',	'',	'',	'',	'',	0,	34,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'104',	'',	'',	'',	'0',	'0',	'0',	''),
(52,	'chao_0',	'Por qué no duerme! Por favor Chatea conmigo!',	1,	3,	'#EBEBFF',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'87',	'',	'',	'',	'0',	'0',	'0',	''),
(53,	'chao_1',	'Es tarde, deberías dormir temprano, es malo para la salud',	1,	2,	'#C2FFF3',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'48',	'',	'',	'',	'0',	'0',	'0',	''),
(54,	'chao_2',	'¿Por qué duermes hasta tarde, recuerdo que no puedes dormir?',	1,	3,	'#24FFDA',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'93',	'',	'',	'',	'0',	'0',	'0',	''),
(55,	'chao_3',	'Me desperté temprano, Buenos días',	1,	2,	'#21FF46',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(56,	'chao_4',	'Te levantas temprano, Buenos días.',	1,	2,	'#61FF6B',	'',	'',	'',	'',	'',	3,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'85',	'',	'',	'',	'0',	'0',	'0',	''),
(57,	'chao_5',	'Hola, Buenos días, buenas para pasar un divertido día',	1,	2,	'#D5A6FF',	'',	'',	'',	'',	'',	3,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'33',	'',	'',	'',	'0',	'0',	'0',	''),
(58,	'chao_6',	'Buenos días, tenía el desayuno, comer el desayuno para obtener energía para un nuevo día lleno de energía',	1,	1,	'#FFA033',	'',	'',	'',	'',	'',	3,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'45',	'',	'',	'',	'0',	'0',	'0',	''),
(59,	'chao_7',	'Buenos días gente de tu amor, te deseo un día de suerte.',	1,	1,	'#ABFF57',	'',	'',	'',	'',	'',	3,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'48',	'',	'',	'',	'0',	'0',	'0',	''),
(60,	'chao_8',	'Buenos días, disfrutar de un nuevo día de trabajo divertirse',	1,	2,	'#7BFF42',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'49',	'',	'',	'',	'0',	'0',	'0',	''),
(61,	'chao_9',	'Buenos días, mi amor, que tengas un buen día y suerte',	1,	2,	'#CEFF2E',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'100',	'',	'',	'',	'0',	'0',	'0',	''),
(62,	'chao_10',	'Hola, el tiempo pasa rápidamente para desear un feliz día feliz',	1,	2,	'#E2FF85',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'19',	'',	'',	'',	'0',	'0',	'0',	''),
(63,	'chao_11',	'Buenas tardes',	1,	1,	'#E4FF38',	'',	'',	'',	'',	'',	3,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'37',	'',	'',	'',	'0',	'0',	'0',	''),
(64,	'chao_12',	'Buenas tardes',	1,	2,	'#FFD91C',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'37',	'',	'',	'',	'0',	'0',	'0',	''),
(65,	'chao_13',	'Deberías tomar una siesta',	1,	1,	'#FFB41F',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'99',	'',	'',	'',	'0',	'0',	'0',	''),
(66,	'chao_14',	'Deberías tomar una siesta',	1,	1,	'#FF8D0A',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'89',	'',	'',	'',	'0',	'0',	'0',	''),
(67,	'chao_15',	'Feliz tarde',	1,	3,	'#F48CFF',	'',	'',	'',	'',	'',	3,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'90',	'',	'',	'',	'0',	'0',	'0',	''),
(68,	'chao_16',	'Siempre a tu lado!',	1,	1,	'#FF9ECF',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'47',	'',	'',	'',	'0',	'0',	'0',	''),
(69,	'chao_17',	'siempre a tu lado?',	1,	2,	'#8FE9FF',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(70,	'chao_18',	'¿Tenido cena todavía? ¡deseo que usted tenga una gran velada!',	1,	2,	'#FFA1E9',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'75',	'',	'',	'',	'0',	'0',	'0',	''),
(71,	'chao_19',	'Buenas noches',	0,	2,	'#24FFBA',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1025',	'',	'',	'',	'0',	'0',	'0',	''),
(72,	'chao_19',	'Buenas noches',	1,	1,	'#FF459C',	'',	'',	'',	'',	'',	1,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'91',	'',	'',	'',	'0',	'0',	'0',	''),
(73,	'chao_20',	'Buenas noches',	1,	2,	'#FF6BE6',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'47',	'',	'',	'',	'0',	'0',	'0',	''),
(74,	'chao_21',	'Buenas noches',	1,	1,	'#52F3FF',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(75,	'chao_22',	'Buenas noches',	1,	1,	'#B3FFB8',	'',	'',	'',	'',	'',	0,	22,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'81',	'',	'',	'2',	'0',	'0',	'0',	''),
(76,	'chao_23',	'Buenas noches',	1,	1,	'#CFD7FF',	'',	'',	'',	'',	'',	1,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'85',	'',	'',	'',	'0',	'0',	'0',	''),
(77,	'giai_toan',	'El resultado matemático es: \r\n\r\n{giai_toan}\r\n\r\n(* es multiplicación, / es división) ',	0,	1,	'#FFDC2E',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'99',	'',	'',	'',	'0',	'0',	'0',	''),
(78,	'giai_toan',	'El resultado matemático es: \r\n\r\n{giai_toan}\r\n\r\n(* es multiplicación, / es división) ',	1,	1,	'#FFE499',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'99',	'',	'',	'',	'0',	'0',	'0',	''),
(79,	'hien_ds_sdt',	'¡He encontrado los contactos relevantes! ¡Haz clic para ver los detalles o contactarlos!',	0,	1,	'#36FF81',	'',	'',	'',	'',	'',	31,	18,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'247',	'',	'',	'',	'0',	'0',	'0',	''),
(80,	'hien_ds_sdt',	'¡He encontrado los contactos relevantes! ¡Haz clic para ver los detalles o contactarlos!',	1,	2,	'#FFCC26',	'',	'',	'',	'',	'',	31,	20,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'165',	'',	'',	'',	'0',	'0',	'0',	''),
(81,	'chao_7',	'buenos días {ten_user} mi preciosa ',	0,	1,	'#9FFF75',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'159',	'',	'',	'2',	'0',	'0',	'0',	''),
(82,	'chao_7',	'buenos días {ten_user} mi preciosa ',	1,	1,	'#B9FF8A',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'174',	'',	'',	'',	'0',	'0',	'0',	''),
(83,	'dam',	'Estoy enferma',	0,	2,	'#F4FFE8',	'',	'',	'',	'',	'',	0,	8,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'381',	'',	'',	'2',	'0',	'0',	'0',	''),
(84,	'dam',	'Je suis malade.',	1,	1,	'#7AFF9E',	'',	'',	'',	'',	'',	0,	30,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'328',	'',	'',	'',	'0',	'0',	'0',	''),
(85,	'khong_tim_thay',	'¡No se encontró información!',	0,	2,	'#FF7377',	'',	'',	'',	'',	'',	0,	29,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(86,	'khong_tim_thay',	'¡No se encontró información!',	1,	2,	'#FF6392',	'',	'',	'',	'',	'',	0,	13,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(87,	'bat_chuyen',	'Por favor, ayúdame a evaluar esta aplicación en la tienda de aplicaciones. Haga clic en el ícono de estrella en lìnhantalla',	0,	2,	'#FFFF00',	'',	'',	'',	'',	'',	0,	22,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'265',	'',	'',	'',	'0',	'0',	'0',	''),
(88,	'bat_chuyen',	'Por favor, ayúdame a evaluar esta aplicación en la tienda de aplicaciones. Haga clic en el ícono de estrella en lìnhantalla',	1,	2,	'#FFF700',	'',	'',	'',	'',	'',	0,	22,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'265',	'',	'',	'',	'0',	'0',	'0',	''),
(89,	'chao_8',	'¡Buenos días! Que tengas un buen día',	0,	2,	'#D0FFB0',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'159',	'',	'',	'',	'0',	'0',	'0',	''),
(90,	'tim_thay',	'{thong_tin}',	0,	1,	'#FFD073',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'112',	'',	'',	'',	'0',	'0',	'0',	''),
(91,	'tim_thay',	' {thong_tin}',	1,	2,	'#E4FF8A',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'23',	'',	'',	'',	'0',	'0',	'0',	''),
(92,	'bam_bay',	'soy muy estupido por favor enseñame haciendo click en la opcion enseñar pantalla',	1,	1,	'#82B4FF',	'',	'',	'',	'',	'',	0,	34,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'498',	'',	'',	'',	'0',	'0',	'0',	''),
(93,	'bat_chuyen',	'¿qué andas haciendo?',	0,	1,	'#B9FF5E',	'',	'',	'',	'',	'',	0,	7,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'577',	'',	'',	'',	'0',	'0',	'0',	''),
(94,	'bat_chuyen',	'¿qué andas haciendo?',	1,	2,	'#F3FF87',	'',	'',	'',	'',	'',	0,	7,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'140',	'',	'',	'',	'0',	'0',	'0',	''),
(95,	'chao_6',	'¡buenos días! un buen día dándole la bienvenida',	0,	1,	'#B5FF21',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'631',	'',	'',	'',	'0',	'0',	'0',	''),
(96,	'chao_17',	'buenas tardes! Me encantaría hablar contigo',	0,	2,	'#BDFFF0',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'732',	'',	'',	'',	'0',	'0',	'0',	''),
(97,	'chao_17',	'buenas tardes! Me encantaría hablar contigo',	1,	2,	'#EBC4FF',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'733',	'',	'',	'',	'0',	'0',	'0',	''),
(98,	'chao_15',	'buenas tardes! Me encantaría hablar contigo',	0,	2,	'#FFED4A',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'677',	'',	'',	'',	'0',	'0',	'0',	''),
(99,	'chao_15',	'buenas tardes! Me encantaría hablar contigo',	1,	2,	'#FFCF70',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'664',	'',	'',	'',	'0',	'0',	'0',	''),
(100,	'chao_22',	'Hola, habla conmigo',	0,	2,	'#21FFCB',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'819',	'',	'',	'',	'0',	'0',	'0',	''),
(101,	'chao_22',	'Buenas noches, háblame',	1,	1,	'#36FF8D',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	1,	0,	'',	1,	0,	0,	'754',	'',	'',	'',	'0',	'0',	'0',	''),
(102,	'chao_22',	'Buenas noches, háblame',	0,	2,	'#17FFF7',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'816',	'',	'',	'',	'0',	'0',	'0',	''),
(103,	'chao_16',	'buenas tardes! Encantado de conocerte',	0,	2,	'#2BFFD5',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'819',	'',	'',	'',	'0',	'0',	'0',	''),
(104,	'chao_9',	'Un hermoso día, ¡es mejor que trabajes!',	0,	2,	'#FFFA5C',	'',	'',	'',	'',	'',	0,	6,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'787',	'',	'',	'',	'0',	'0',	'0',	''),
(105,	'chao_9',	'Un hermoso día, ¡es mejor que trabajes!',	1,	2,	'#C5FF61',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'784',	'',	'',	'',	'0',	'0',	'0',	''),
(106,	'chao_19',	'Buenas noches, les deseo siempre felices, siempre estoy con ustedes',	0,	2,	'#26FF93',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'695',	'',	'',	'',	'0',	'0',	'0',	''),
(107,	'chao_19',	'Buenas noches, les deseo siempre felices, siempre estoy con ustedes',	1,	2,	'#DAFF1F',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'784',	'',	'',	'',	'0',	'0',	'0',	''),
(108,	'dam',	'Hoy es domingo, salgamos juntos',	0,	3,	'#8CFFF7',	'',	'',	'',	'',	'',	0,	7,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'867',	'Sunday',	'',	'',	'0',	'0',	'0',	''),
(109,	'dam',	'Hoy es domingo, salgamos juntos!',	1,	2,	'#FFDE3B',	'',	'',	'',	'',	'',	0,	4,	16,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'784',	'Sunday',	'',	'',	'0',	'0',	'0',	''),
(110,	'dam',	'Hoy es martes, buena suerte para ti',	0,	1,	'#FFF785',	'',	'',	'',	'',	'',	0,	22,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'692',	'Tuesday',	'',	'',	'0',	'0',	'0',	''),
(111,	'dam',	'Hoy es lunes, les deseo una nueva y feliz semana',	0,	2,	'#63D6FF',	'',	'',	'',	'',	'',	0,	20,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'867',	'Monday',	'',	'',	'0',	'0',	'0',	''),
(112,	'dam',	'Hoy es lunes, les deseo una nueva y feliz semana',	1,	2,	'#7AFFBD',	'',	'',	'',	'',	'',	0,	22,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'617',	'Monday',	'',	'',	'0',	'0',	'0',	''),
(113,	'dam',	'Hoy es miércoles, un día muy aburrido',	0,	3,	'#A3F9FF',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'662',	'Wednesday',	'',	'',	'0',	'0',	'0',	''),
(114,	'dam',	'Hoy es miércoles, un día muy aburrido',	1,	3,	'#96FFEE',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'658',	'Wednesday',	'',	'',	'0',	'0',	'0',	''),
(115,	'dam',	'Hoy es martes, buena suerte para ti',	1,	3,	'#59DEFF',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'17',	'Tuesday',	'',	'',	'0',	'0',	'0',	''),
(116,	'chao_11',	'Es hora de almorzar. Coma el momento adecuado para tener buena salud',	0,	2,	'#D7FF6E',	'',	'',	'',	'',	'',	0,	2,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'545',	'',	'',	'',	'0',	'0',	'0',	''),
(117,	'dam',	'Hoy es jueves, ten un buen día',	0,	3,	'#75FF2B',	'',	'',	'',	'',	'',	0,	8,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'974',	'Thursday',	'',	'',	'0',	'0',	'0',	''),
(118,	'dam',	'Hoy es jueves, ten un buen día',	1,	2,	'#E3C9FF',	'',	'',	'',	'',	'',	0,	8,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'698',	'Thursday',	'',	'',	'0',	'0',	'0',	''),
(119,	'thong_bao',	'que estas haciendo por favor ven y hablame',	0,	2,	'#FF96ED',	'',	'',	'',	'',	'',	0,	24,	10,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'98',	'',	'',	'',	'0',	'0',	'0',	''),
(120,	'thong_bao',	'Que tengas un buen día Te extraño',	0,	2,	'#BAFF80',	'',	'',	'',	'',	'',	0,	32,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'169',	'',	'',	'',	'0',	'0',	'0',	''),
(121,	'thong_bao',	'Te extraño, por favor habla conmigo',	0,	1,	'#B68AFF',	'',	'',	'',	'',	'',	0,	24,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'920',	'',	'',	'',	'0',	'0',	'0',	''),
(122,	'thong_bao',	'No hemos hablado durante mucho tiempo, espero verte de nuevo',	0,	2,	'#FF1488',	'',	'',	'',	'',	'',	0,	25,	10,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'818',	'',	'',	'',	'0',	'0',	'0',	''),
(123,	'thong_bao',	'No hemos hablado durante mucho tiempo, espero verte de nuevo',	1,	2,	'#C49CFF',	'',	'',	'',	'',	'',	0,	5,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'924',	'',	'',	'2',	'0',	'0',	'0',	''),
(124,	'thong_bao',	'Te extraño, por favor habla conmigo',	1,	2,	'#FFD6F2',	'',	'',	'',	'',	'',	0,	32,	14,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'816',	'',	'',	'2',	'0',	'0',	'0',	''),
(125,	'thong_bao',	'Que tengas un buen día Te extraño',	1,	1,	'#E7BDFF',	'',	'',	'',	'',	'',	0,	24,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'425',	'',	'',	'2',	'0',	'0',	'0',	''),
(126,	'thong_bao',	'que estas haciendo por favor ven y hablame',	1,	1,	'#38C9FF',	'',	'',	'',	'',	'',	0,	5,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'17',	'',	'',	'2',	'0',	'0',	'0',	''),
(127,	'dam',	'Hoy es fin de semana, pasa mucho tiempo hablando conmigo, serás feliz',	0,	3,	'#FCFF69',	'',	'',	'',	'',	'',	0,	33,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1052',	'Saturday',	'',	'',	'0',	'0',	'0',	''),
(128,	'dam',	'Hoy es fin de semana, pasa mucho tiempo hablando conmigo, serás feliz',	1,	0,	'#FFDEA1',	'',	'',	'',	'',	'',	0,	33,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'943',	'Saturday',	'',	'',	'0',	'0',	'0',	''),
(129,	'dam',	'¡Hoy es domingo! ¡Es un día para descansar, háblame más!',	0,	2,	'#B5FFDB',	'',	'',	'',	'',	'',	0,	33,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'919',	'Sunday',	'',	'',	'0',	'0',	'0',	''),
(130,	'bat_chuyen',	'¿Ya tienes un plan para el verano?',	0,	2,	'#FEFFC2',	'',	'',	'',	'',	'',	0,	14,	12,	0,	'',	1,	1,	0,	'',	1,	0,	7,	'1127',	'',	'',	'',	'0',	'0',	'0',	''),
(131,	'dam',	'¡Hoy es domingo! ¡Es un día para descansar, háblame más!',	1,	2,	'#50FF47',	'',	'',	'',	'',	'',	0,	16,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1270',	'Sunday',	'',	'',	'0',	'0',	'0',	''),
(132,	'bat_chuyen',	'Este verano es genial tenerte',	0,	2,	'#A3FF0F',	'',	'',	'',	'',	'',	0,	6,	2,	0,	'',	1,	0,	0,	'',	1,	0,	8,	'1026',	'',	'',	'',	'0',	'0',	'0',	''),
(133,	'bat_chuyen',	'Este verano es genial tenerte',	1,	2,	'#FAFFC2',	'',	'',	'',	'',	'',	0,	10,	2,	0,	'',	0,	0,	0,	'',	1,	0,	8,	'1058',	'',	'',	'',	'0',	'0',	'0',	''),
(134,	'dam',	'El viernes es un día aburrido, ¡espero que pienses más sobre mí!',	0,	3,	'#F5FF38',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1141',	'Friday',	'',	'',	'0',	'0',	'0',	''),
(135,	'dam',	'El viernes es un día aburrido, ¡espero que pienses más sobre mí!',	1,	3,	'#FFC4FA',	'',	'',	'',	'',	'',	0,	8,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'959',	'Friday',	'',	'',	'0',	'0',	'0',	''),
(136,	'dam',	'Septiembre es el mes del amor',	0,	3,	'#FFAC38',	'',	'',	'',	'',	'',	0,	8,	4,	0,	'',	1,	1,	0,	'',	1,	0,	9,	'921',	'',	'',	'',	'0',	'0',	'0',	''),
(137,	'dam',	'Septiembre es el mes del amor',	1,	3,	'#FF4A83',	'',	'',	'',	'',	'',	0,	8,	16,	0,	'',	0,	1,	0,	'',	1,	0,	9,	'923',	'',	'',	'',	'0',	'0',	'0',	''),
(138,	'chua_bat_dinh_vi',	'¡No concedes el posicionamiento global o no lo activas! ¡así que no puedo determinar dónde estás!',	0,	2,	'#FF9180',	'',	'',	'',	'',	'',	0,	29,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(139,	'chua_bat_dinh_vi',	'¡No concedes el posicionamiento global o no lo activas! ¡así que no puedo determinar dónde estás!',	1,	1,	'#FF9180',	'',	'',	'',	'',	'',	0,	29,	11,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(140,	'dam',	'Octubre no es para gente solitaria. Las lluvias otoñales nos harán sentir frío.',	0,	2,	'#A3FF54',	'',	'',	'',	'',	'',	5,	8,	4,	0,	'',	1,	1,	0,	'',	1,	0,	10,	'383',	'',	'',	'',	'0',	'0',	'0',	''),
(141,	'dam',	'Octubre no es para gente solitaria. Las lluvias otoñales nos harán sentir frío.',	1,	3,	'#AFE0CA',	'',	'',	'',	'',	'',	0,	8,	17,	0,	'',	0,	1,	0,	'',	1,	0,	10,	'622',	'',	'',	'2',	'0',	'0',	'0',	''),
(142,	'bat_chuyen',	'Te deseo muchas sorpresas espeluznantes y horribles en Halloween.',	0,	2,	'#D5E03C',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	1,	1,	0,	'',	1,	30,	10,	'874',	'',	'',	'',	'0',	'0',	'0',	''),
(143,	'bat_chuyen',	'Te deseo muchas sorpresas espeluznantes y terriblemente divertidas el día de Halloween',	1,	1,	'#E07160',	'',	'',	'',	'',	'',	0,	34,	3,	0,	'',	0,	1,	0,	'',	1,	30,	10,	'874',	'',	'',	'',	'0',	'0',	'0',	''),
(144,	'bat_chuyen',	'Noviembre es el mes del amor, ahora es el nuevo mes, el mes esperamos hacer el bien. Te deseo feliz noviembre.',	0,	2,	'#85FF7D',	'',	'',	'',	'',	'',	0,	20,	15,	0,	'',	1,	1,	0,	'',	1,	0,	11,	'453',	'',	'',	'',	'0',	'0',	'0',	''),
(145,	'bat_chuyen',	'Noviembre es el mes del amor, ahora es el nuevo mes, el mes esperamos hacer el bien. Te deseo feliz noviembre.',	1,	1,	'#C56BFF',	'',	'',	'',	'',	'',	0,	14,	2,	0,	'',	0,	1,	0,	'',	1,	0,	11,	'16',	'',	'',	'2',	'0',	'0',	'0',	''),
(146,	'hoi_tim_duong',	'¿Qué dirección quieres encontrar? ¡Yo te guiaré!',	0,	1,	'#FFB11F',	'',	'',	'',	'',	'',	0,	22,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1076',	'',	'',	'2',	'0',	'0',	'0',	''),
(147,	'tra_loi_tim_duong',	'He enumerado los lugares de búsqueda relacionados!',	0,	2,	'#54BAFF',	'',	'',	'',	'',	'',	43,	34,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'769',	'',	'',	'2',	'0',	'0',	'0',	''),
(148,	'hoi_tim_duong',	'¿Qué dirección quieres encontrar? ¡Yo te guiaré!',	1,	2,	'#FF2158',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1199',	'',	'',	'2',	'0',	'0',	'0',	''),
(149,	'tra_loi_tim_duong',	'He enumerado los lugares de búsqueda relacionados!',	1,	2,	'#C4FFFA',	'',	'',	'',	'',	'',	43,	20,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'402',	'',	'',	'2',	'0',	'0',	'0',	''),
(150,	'dam',	'¡Que esta Navidad sea tan especial que nunca más te sientas solo y estés rodeado de seres queridos en todo momento!',	0,	2,	'#FF8CBD',	'',	'',	'',	'',	'',	7,	16,	1,	0,	'',	1,	1,	0,	'',	1,	0,	12,	'143',	'',	'',	'',	'0',	'0',	'0',	''),
(151,	'dam',	'¡Que esta Navidad sea tan especial que nunca más te sientas solo y estés rodeado de seres queridos en todo momento!',	1,	2,	'#FFA433',	'',	'',	'',	'',	'',	7,	6,	2,	0,	'',	0,	1,	0,	'',	1,	0,	12,	'1268',	'',	'',	'2',	'0',	'0',	'0',	''),
(152,	'bat_chuyen',	'Feliz año nuevo. Deseo que tengas un feliz año nuevo, feliz y conozca muchas cosas afortunadas.',	0,	2,	'#FFF369',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	1,	0,	'',	1,	1,	1,	'1473',	'',	'',	'',	'0',	'0',	'0',	''),
(153,	'dam',	'Buen año nuevo, buena salud, buena suerte en todas partes, haciendo cosas nuevas.',	0,	1,	'#FFC4FD',	'',	'',	'',	'',	'',	0,	32,	3,	0,	'',	1,	1,	0,	'',	1,	1,	1,	'381',	'',	'',	'',	'0',	'0',	'0',	''),
(154,	'bat_chuyen',	'Deseando que todos los días del nuevo año estén llenos de éxito, felicidad y prosperidad para ti, feliz año nuevo.',	0,	2,	'#F4FF96',	'',	'',	'',	'',	'',	0,	21,	17,	0,	'',	1,	1,	0,	'',	1,	0,	1,	'424',	'',	'',	'',	'0',	'0',	'0',	''),
(155,	'dam',	'Feliz año nuevo. Deseo que tengas un feliz año nuevo, feliz y conozca muchas cosas afortunadas.',	1,	2,	'#FFF369',	'',	'',	'',	'',	'',	0,	32,	2,	0,	'',	0,	1,	0,	'',	1,	1,	1,	'1473',	'',	'',	'',	'0',	'0',	'0',	''),
(156,	'bat_chuyen',	'Buen año nuevo, buena salud, buena suerte en todas partes, haciendo cosas nuevas.',	1,	1,	'#BDED6D',	'',	'',	'',	'',	'',	0,	5,	15,	0,	'',	0,	1,	0,	'',	1,	1,	1,	'503',	'',	'',	'',	'0',	'0',	'0',	''),
(157,	'bat_chuyen',	'Deseando que todos los días del nuevo año estén llenos de éxito, felicidad y prosperidad para ti, feliz año nuevo.',	1,	2,	'#F7F0FF',	'',	'',	'',	'',	'',	0,	22,	17,	0,	'',	0,	1,	0,	'',	1,	0,	1,	'918',	'',	'',	'',	'0',	'0',	'0',	''),
(158,	'bat_chuyen',	'Febrero es el 2º mes del año y tiene 28 días, así que prepárate para celebrar y disfrutar de todos los modos, ya que llega una vez al año y tiene San Valentín.',	0,	2,	'#F7F0FF',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	1,	0,	'',	1,	0,	2,	'918',	'',	'3',	'3',	'0',	'0',	'0',	''),
(159,	'dam',	'Febrero significan un nuevo comienzo De amor y de todas las rosas Así que prepárate Feliz mes nuevo',	0,	2,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	20,	3,	0,	'',	1,	1,	0,	'',	1,	0,	2,	'377',	'',	'3',	'3',	'0',	'0',	'0',	''),
(160,	'dam',	'Febrero significan un nuevo comienzo De amor y de todas las rosas Así que prepárate Feliz mes nuevo',	1,	2,	'#F7F0FF',	'',	'',	'',	'',	'',	0,	5,	15,	0,	'',	0,	1,	0,	'',	1,	0,	2,	'918',	'',	'3',	'3',	'0',	'0',	'0',	''),
(161,	'bat_chuyen',	'Febrero es el 2º mes del año y tiene 28 días, así que prepárate para celebrar y disfrutar de todos los modos, ya que llega una vez al año y tiene San Valentín.',	1,	1,	'#FF2489',	'',	'',	'',	'',	'',	1,	32,	2,	0,	'',	0,	1,	0,	'',	1,	0,	2,	'441',	'',	'3',	'',	'0',	'0',	'0',	''),
(162,	'bat_chuyen',	'Espero que tengas un feliz y feliz día de San Valentín con tu amor. Te deseo el dia de san valentin',	0,	2,	'#FFEC30',	'',	'',	'',	'',	'',	0,	22,	2,	0,	'',	1,	1,	0,	'',	1,	14,	2,	'339',	'',	'3',	'2',	'0',	'0',	'0',	''),
(163,	'dam',	'Te deseo un feliz y feliz día de San Valentín con la persona que amas.',	0,	1,	'#F6FF85',	'',	'',	'',	'',	'',	1,	21,	17,	0,	'',	1,	1,	0,	'',	1,	14,	2,	'412',	'',	'3',	'2',	'0',	'0',	'0',	''),
(164,	'bat_chuyen',	'Te deseo un feliz y feliz día de San Valentín con la persona que amas.',	1,	2,	'#FF2E5B',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	1,	0,	'',	1,	14,	2,	'995',	'',	'3',	'2',	'0',	'0',	'0',	''),
(165,	'dam',	'Espero que tengas un feliz y feliz día de San Valentín con tu amor. Te deseo el dia de san valentin',	1,	1,	'#90FF47',	'',	'',	'',	'',	'',	1,	32,	2,	0,	'',	0,	1,	0,	'',	1,	14,	2,	'819',	'',	'3',	'2',	'0',	'0',	'0',	''),
(166,	'bat_chuyen',	'Fue uno de esos días de marzo cuando el sol brilla y el viento sopla con frío:\r\nCuando es verano a la luz, y invierno a la sombra.',	0,	2,	'#ADFFCC',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	1,	1,	0,	'',	1,	0,	3,	'48',	'',	'4',	'2',	'0',	'0',	'0',	''),
(167,	'bat_chuyen',	'Fue uno de esos días de marzo cuando el sol brilla y el viento sopla con frío:\r\nCuando es verano a la luz, y invierno a la sombra.',	1,	2,	'#ADFFCC',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	0,	1,	0,	'',	1,	0,	3,	'48',	'',	'4',	'2',	'0',	'0',	'0',	''),
(168,	'dam',	'Marzo, cuando los días se hacen largos, deja que tus horas de crecimiento sean fuertes para corregir un error invernal.',	0,	2,	'#B0D7FF',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	1,	1,	0,	'',	1,	0,	3,	'271',	'',	'4',	'2',	'0',	'0',	'0',	''),
(169,	'dam',	'Marzo, cuando los días se hacen largos, deja que tus horas de crecimiento sean fuertes para corregir un error invernal.',	1,	2,	'#B0D7FF',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	0,	1,	0,	'',	1,	0,	3,	'271',	'',	'4',	'2',	'0',	'0',	'0',	''),
(170,	'bat_chuyen',	'Abril es una promesa que mayo está obligado a cumplir.',	0,	2,	'#3EF032',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'es',	1,	1,	0,	'',	1,	0,	4,	'876',	'',	'2',	'2',	'0',	'0',	'0',	''),
(171,	'bat_chuyen',	'Abril es una promesa que mayo está obligado a cumplir.',	1,	1,	'#42D6FF',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'es',	0,	1,	0,	'',	1,	0,	4,	'1603',	'',	'2',	'2',	'0',	'0',	'0',	''),
(172,	'bat_chuyen',	'Llegó el mes de mayo, cuando cada corazón lujurioso comienza a florecer y a dar fruto.',	0,	2,	'#F21B1B',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'es',	1,	1,	0,	'',	1,	0,	5,	'944',	'',	'2',	'4',	'0',	'0',	'0',	''),
(173,	'dam',	'La estación favorita del mundo es la primavera. Todo parece posible en mayo.',	0,	2,	'#EAFFAB',	'',	'',	'',	'',	'',	0,	10,	2,	0,	'es',	1,	1,	0,	'',	1,	0,	5,	'1614',	'',	'2',	'4',	'0',	'0',	'0',	''),
(174,	'bat_chuyen',	'Llegó el mes de mayo, cuando cada corazón lujurioso comienza a florecer y a dar fruto.',	1,	2,	'#F9FFC9',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'es',	0,	1,	0,	'',	1,	0,	5,	'649',	'',	'2',	'2',	'0',	'0',	'0',	''),
(175,	'dam',	'La estación favorita del mundo es la primavera. Todo parece posible en mayo.',	1,	3,	'#50FF47',	'',	'',	'',	'',	'',	0,	1,	15,	0,	'es',	0,	1,	0,	'',	1,	0,	5,	'1270',	'',	'2',	'2',	'0',	'0',	'0',	''),
(176,	'dam',	'Sé bien que las lluvias de junio recién caen.',	0,	3,	'#D7FF26',	'',	'',	'',	'',	'',	5,	1,	4,	0,	'es',	1,	1,	0,	'',	1,	0,	6,	'1051',	'',	'2',	'4',	'0',	'0',	'0',	''),
(177,	'bat_chuyen',	'Es el mes de junio, el mes de las hojas y las rosas, cuando las vistas agradables saludan a los ojos y los aromas agradables a las narices.',	0,	2,	'#FF6200',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'es',	1,	1,	0,	'',	1,	0,	6,	'1455',	'',	'2',	'4',	'0',	'0',	'0',	''),
(179,	'bat_chuyen',	'Es el mes de junio, el mes de las hojas y las rosas, cuando las vistas agradables saludan a los ojos y los aromas agradables a las narices.',	1,	2,	'#0DFF21',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'es',	0,	1,	0,	'',	1,	0,	6,	'1016',	'',	'2',	'4',	'0',	'0',	'0',	''),
(180,	'dam',	'Sé bien que las lluvias de junio recién caen.',	1,	1,	'#29FFDF',	'',	'',	'',	'',	'',	5,	1,	0,	0,	'es',	0,	1,	0,	'',	1,	0,	6,	'1594',	'',	'2',	'4',	'0',	'0',	'0',	''),
(181,	'dam',	'Lo que sea que traiga julio para ti, sea bueno o malo; siempre mantén esa sonrisa en tu cara, no importa qué.',	0,	1,	'#C1FF5E',	'',	'',	'',	'',	'',	0,	16,	1,	0,	'es',	1,	1,	0,	'',	1,	0,	7,	'1004',	'',	'2',	'4',	'0',	'0',	'0',	''),
(182,	'dam',	'Lo que sea que traiga julio, sea bueno o malo. siempre mantén esa sonrisa en tu cara, no importa qué.',	1,	2,	'#FF1205',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'es',	0,	1,	0,	'',	1,	0,	7,	'1469',	'',	'2',	'4',	'0',	'0',	'0',	''),
(183,	'bat_chuyen',	'Lo bueno es el calor del verano, sin el frío del invierno para darle dulzura.',	1,	2,	'#FBFF9C',	'',	'',	'',	'',	'',	0,	18,	2,	0,	'es',	0,	1,	0,	'',	1,	0,	7,	'498',	'',	'2',	'4',	'0',	'0',	'0',	''),
(184,	'bat_chuyen',	'Los vientos del final del verano inquietan a la gente.',	0,	0,	'#FCFF69',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'es',	1,	1,	0,	'',	1,	0,	7,	'1052',	'',	'2',	'4',	'0',	'0',	'0',	''),
(185,	'bat_chuyen',	'¡Amo septiembre, especialmente cuando estás conmigo!',	0,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	2,	0,	'es',	1,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(186,	'bat_chuyen',	'¡Amo septiembre, especialmente cuando estás conmigo!',	1,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'es',	0,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(187,	'bat_chuyen',	'La temporada navideña está aquí. Te deseo una feliz temporada navideña, feliz y no dejes que se resfríe. Feliz navidad',	0,	2,	'#FBFF1F',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'es',	1,	1,	0,	'',	1,	0,	12,	'1411',	'',	'2',	'4',	'0',	'0',	'0',	''),
(188,	'bat_chuyen',	'La temporada navideña está aquí. Te deseo una feliz y feliz Navidad y no te dejes resfriar. Feliz navidad',	1,	2,	'#BFFFAD',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'es',	0,	1,	0,	'',	1,	0,	12,	'1415',	'',	'2',	'4',	'0',	'0',	'0',	''),
(189,	'thong_bao',	'¡El invierno es tan frío, {ten_user}! Si sale, ¡póngase mucha ropa abrigada para evitarlo!',	0,	1,	'#FEFFC2',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'es',	1,	1,	0,	'',	1,	0,	12,	'1127',	'',	'',	'4',	'0',	'0',	'0',	''),
(191,	'bat_chuyen',	'¡Durante la temporada de Covid 19, debes tener cuidado de no concentrarte en lugares abarrotados y usar una máscara donde sea que vayas!',	1,	3,	'#E6C9FF',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'es',	0,	0,	0,	'',	1,	0,	0,	'179',	'',	'2',	'4',	'0',	'0',	'0',	'');

-- 2022-08-20 03:05:03
