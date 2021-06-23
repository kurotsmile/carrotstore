-- Adminer 4.8.1 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_msg_pl`;
CREATE TABLE `app_my_girl_msg_pl` (
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

TRUNCATE `app_my_girl_msg_pl`;
INSERT INTO `app_my_girl_msg_pl` (`id`, `func`, `chat`, `sex`, `status`, `color`, `q1`, `q2`, `r1`, `r2`, `vibrate`, `effect`, `action`, `face`, `certify`, `author`, `character_sex`, `disable`, `ver`, `os`, `limit_chat`, `limit_date`, `limit_month`, `effect_customer`, `limit_day`, `user_create`, `user_update`, `os_window`, `os_ios`, `os_android`, `file_url`) VALUES
(1,	'bat_chuyen',	'Nadszedł miesiąc majowy, kiedy każde pożądliwe serce zaczyna rozkwitać i rodzić owoce',	0,	2,	'#F21B1B',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'pl',	1,	1,	0,	'',	1,	0,	5,	'944',	'',	'2',	'4',	'0',	'0',	'0',	''),
(2,	'dam',	'Ulubionym sezonem na świecie jest wiosna. Wszystko wydaje się możliwe w maju',	0,	3,	'#EAFFAB',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'pl',	1,	1,	0,	'',	1,	0,	5,	'1614',	'',	'2',	'4',	'0',	'0',	'0',	''),
(3,	'dam',	'Wiem dobrze, że czerwcowe deszcze właśnie spadają.',	0,	3,	'#D7FF26',	'',	'',	'',	'',	'',	5,	1,	4,	0,	'pl',	1,	0,	0,	'',	1,	0,	6,	'1051',	'',	'2',	'4',	'0',	'0',	'0',	''),
(4,	'bat_chuyen',	'Jest miesiąc czerwiec, miesiąc liści i róż, Gdy przyjemne widoki pozdrawiają oczy i przyjemne zapachy nosów.',	0,	2,	'#FF6200',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'pl',	1,	0,	0,	'',	1,	0,	6,	'1455',	'',	'2',	'4',	'0',	'0',	'0',	''),
(5,	'bat_chuyen',	'Jest miesiąc czerwiec, miesiąc liści i róż, Gdy przyjemne widoki pozdrawiają oczy i przyjemne zapachy nosów.',	1,	2,	'#0DFF21',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'pl',	0,	0,	0,	'',	1,	0,	6,	'1016',	'',	'2',	'4',	'0',	'0',	'0',	''),
(6,	'dam',	'Wiem dobrze, że czerwcowe deszcze właśnie spadają.',	1,	1,	'#29FFDF',	'',	'',	'',	'',	'',	5,	1,	0,	0,	'pl',	0,	0,	0,	'',	1,	0,	6,	'1594',	'',	'2',	'4',	'0',	'0',	'0',	''),
(7,	'dam',	'Bez względu na to, co przyniesie wam lipiec, czy to dobrze, czy źle; zawsze miej ten uśmiech na twarzy bez względu na wszystko.',	0,	1,	'#C1FF5E',	'',	'',	'',	'',	'',	0,	16,	1,	0,	'pl',	1,	1,	0,	'',	1,	0,	7,	'1004',	'',	'2',	'4',	'0',	'0',	'0',	''),
(8,	'dam',	'Bez względu na to, co przyniesie wam lipiec, czy to dobrze, czy źle. zawsze miej ten uśmiech na twarzy bez względu na wszystko.',	1,	2,	'#FF1205',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'pl',	0,	1,	0,	'',	1,	0,	7,	'1469',	'',	'2',	'4',	'0',	'0',	'0',	''),
(9,	'bat_chuyen',	'Co dobrego jest ciepło lata, bez zimna, aby nadać mu słodyczy.',	1,	2,	'#FBFF9C',	'',	'',	'',	'',	'',	0,	18,	2,	0,	'pl',	0,	1,	0,	'',	1,	0,	7,	'498',	'',	'2',	'4',	'0',	'0',	'0',	''),
(10,	'bat_chuyen',	'Wiatry końca lata sprawiają, że ludzie są niespokojni.',	0,	0,	'#FCFF69',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'pl',	1,	1,	0,	'',	1,	0,	7,	'1052',	'',	'2',	'4',	'0',	'0',	'0',	''),
(11,	'bat_chuyen',	'Uwielbiam wrzesień, zwłaszcza gdy jesteś ze mną!',	0,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'pl',	1,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(12,	'bat_chuyen',	'Uwielbiam wrzesień, zwłaszcza gdy jesteś ze mną!',	1,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'pl',	0,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'2',	'0',	'0',	'0',	''),
(13,	'bat_chuyen',	'Sezon świąteczny jest tutaj. Życząc wesołych świąt Bożego Narodzenia, szczęśliwy i nie daj się przeziębić. Wesołych świąt',	0,	2,	'#FBFF1F',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'pl',	1,	1,	0,	'',	1,	0,	12,	'1411',	'',	'2',	'4',	'0',	'0',	'0',	''),
(14,	'bat_chuyen',	'Sezon świąteczny jest tutaj. Życzymy szczęśliwych i szczęśliwych Świąt Bożego Narodzenia i nie daj się przeziębić. Wesołych świąt',	1,	2,	'#BFFFAD',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'pl',	0,	1,	0,	'',	1,	0,	12,	'1415',	'',	'2',	'4',	'0',	'0',	'0',	''),
(15,	'thong_bao',	'Zima jest taka zimna, {ten_user}! Jeśli wychodzisz, załóż dużo ciepłych ubrań, aby tego uniknąć!',	0,	1,	'#FEFFC2',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'pl',	1,	1,	0,	'',	1,	0,	12,	'1127',	'',	'',	'4',	'0',	'0',	'0',	''),
(16,	'bat_chuyen',	'W sezonie Covid 19 musisz uważać, aby nie skupiać się na zatłoczonych miejscach i nosić maskę gdziekolwiek jesteś!',	0,	3,	'#FFFBD1',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'pl',	1,	0,	0,	'',	1,	0,	0,	'1615',	'',	'2',	'4',	'0',	'0',	'0',	''),
(17,	'bat_chuyen',	'W sezonie Covid 19 musisz uważać, aby nie skupiać się na zatłoczonych miejscach i nosić maskę gdziekolwiek jesteś!',	1,	3,	'#E6C9FF',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'pl',	0,	0,	0,	'',	1,	0,	0,	'179',	'',	'2',	'2',	'0',	'0',	'0',	'');

-- 2021-06-12 16:33:20
