-- Adminer 4.8.1 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `app_my_girl_log_data`;
CREATE TABLE `app_my_girl_log_data` (
  `dates` date NOT NULL,
  `key` varchar(50) NOT NULL,
  `data` text NOT NULL,
  `android` varchar(50) NOT NULL,
  `ios` varchar(50) NOT NULL,
  `ver0` varchar(50) NOT NULL,
  `ver1` varchar(50) NOT NULL,
  `ver2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `app_my_girl_log_data`;
INSERT INTO `app_my_girl_log_data` (`dates`, `key`, `data`, `android`, `ios`, `ver0`, `ver1`, `ver2`) VALUES
('2021-06-01',	'119479',	'[{\"key\":\"vi\",\"count\":\"52365\"},{\"key\":\"en\",\"count\":\"7046\"},{\"key\":\"es\",\"count\":\"36305\"},{\"key\":\"pt\",\"count\":\"11599\"},{\"key\":\"fr\",\"count\":\"84\"},{\"key\":\"hi\",\"count\":\"16\"},{\"key\":\"zh\",\"count\":\"401\"},{\"key\":\"ru\",\"count\":\"4545\"},{\"key\":\"de\",\"count\":\"28\"},{\"key\":\"th\",\"count\":\"140\"},{\"key\":\"ko\",\"count\":\"21\"},{\"key\":\"ja\",\"count\":\"73\"},{\"key\":\"ar\",\"count\":\"5662\"},{\"key\":\"tr\",\"count\":\"1114\"},{\"key\":\"fi\",\"count\":\"10\"},{\"key\":\"it\",\"count\":\"70\"},{\"key\":\"id\",\"count\":\"0\"},{\"key\":\"da\",\"count\":\"0\"},{\"key\":\"nl\",\"count\":\"0\"},{\"key\":\"pl\",\"count\":\"0\"}]',	'119342',	'0',	'117650',	'832',	''),
('2021-06-02',	'114790',	'[{\"key\":\"vi\",\"count\":\"51558\"},{\"key\":\"en\",\"count\":\"5325\"},{\"key\":\"es\",\"count\":\"38950\"},{\"key\":\"pt\",\"count\":\"10363\"},{\"key\":\"fr\",\"count\":\"125\"},{\"key\":\"hi\",\"count\":\"18\"},{\"key\":\"zh\",\"count\":\"742\"},{\"key\":\"ru\",\"count\":\"5118\"},{\"key\":\"de\",\"count\":\"40\"},{\"key\":\"th\",\"count\":\"192\"},{\"key\":\"ko\",\"count\":\"52\"},{\"key\":\"ja\",\"count\":\"81\"},{\"key\":\"ar\",\"count\":\"1346\"},{\"key\":\"tr\",\"count\":\"756\"},{\"key\":\"fi\",\"count\":\"8\"},{\"key\":\"it\",\"count\":\"116\"},{\"key\":\"id\",\"count\":\"0\"},{\"key\":\"da\",\"count\":\"0\"},{\"key\":\"nl\",\"count\":\"0\"},{\"key\":\"pl\",\"count\":\"0\"}]',	'114744',	'0',	'112879',	'849',	''),
('2021-06-03',	'128197',	'[{\"key\":\"vi\",\"count\":\"50165\"},{\"key\":\"en\",\"count\":\"7764\"},{\"key\":\"es\",\"count\":\"46391\"},{\"key\":\"pt\",\"count\":\"11341\"},{\"key\":\"fr\",\"count\":\"303\"},{\"key\":\"hi\",\"count\":\"23\"},{\"key\":\"zh\",\"count\":\"394\"},{\"key\":\"ru\",\"count\":\"5905\"},{\"key\":\"de\",\"count\":\"60\"},{\"key\":\"th\",\"count\":\"115\"},{\"key\":\"ko\",\"count\":\"9\"},{\"key\":\"ja\",\"count\":\"148\"},{\"key\":\"ar\",\"count\":\"4356\"},{\"key\":\"tr\",\"count\":\"1074\"},{\"key\":\"fi\",\"count\":\"20\"},{\"key\":\"it\",\"count\":\"129\"},{\"key\":\"id\",\"count\":\"0\"},{\"key\":\"da\",\"count\":\"0\"},{\"key\":\"nl\",\"count\":\"0\"},{\"key\":\"pl\",\"count\":\"0\"}]',	'128142',	'0',	'125226',	'1344',	''),
('2021-06-04',	'127301',	'[{\"key\":\"vi\",\"count\":\"50283\"},{\"key\":\"en\",\"count\":\"7540\"},{\"key\":\"es\",\"count\":\"47911\"},{\"key\":\"pt\",\"count\":\"10646\"},{\"key\":\"fr\",\"count\":\"68\"},{\"key\":\"hi\",\"count\":\"16\"},{\"key\":\"zh\",\"count\":\"575\"},{\"key\":\"ru\",\"count\":\"5260\"},{\"key\":\"de\",\"count\":\"109\"},{\"key\":\"th\",\"count\":\"82\"},{\"key\":\"ko\",\"count\":\"21\"},{\"key\":\"ja\",\"count\":\"45\"},{\"key\":\"ar\",\"count\":\"3121\"},{\"key\":\"tr\",\"count\":\"1367\"},{\"key\":\"fi\",\"count\":\"9\"},{\"key\":\"it\",\"count\":\"248\"},{\"key\":\"id\",\"count\":\"0\"},{\"key\":\"da\",\"count\":\"0\"},{\"key\":\"nl\",\"count\":\"0\"},{\"key\":\"pl\",\"count\":\"0\"}]',	'127237',	'3',	'124553',	'1176',	''),
('2021-06-05',	'117700',	'[{\"key\":\"vi\",\"count\":\"49300\"},{\"key\":\"en\",\"count\":\"6913\"},{\"key\":\"es\",\"count\":\"40698\"},{\"key\":\"pt\",\"count\":\"11058\"},{\"key\":\"fr\",\"count\":\"70\"},{\"key\":\"hi\",\"count\":\"13\"},{\"key\":\"zh\",\"count\":\"596\"},{\"key\":\"ru\",\"count\":\"5279\"},{\"key\":\"de\",\"count\":\"97\"},{\"key\":\"th\",\"count\":\"456\"},{\"key\":\"ko\",\"count\":\"18\"},{\"key\":\"ja\",\"count\":\"60\"},{\"key\":\"ar\",\"count\":\"1336\"},{\"key\":\"tr\",\"count\":\"1679\"},{\"key\":\"fi\",\"count\":\"3\"},{\"key\":\"it\",\"count\":\"124\"},{\"key\":\"id\",\"count\":\"0\"},{\"key\":\"da\",\"count\":\"0\"},{\"key\":\"nl\",\"count\":\"0\"},{\"key\":\"pl\",\"count\":\"0\"}]',	'117589',	'0',	'114877',	'1542',	''),
('2021-06-06',	'113475',	'[{\"key\":\"vi\",\"count\":\"46235\"},{\"key\":\"en\",\"count\":\"7368\"},{\"key\":\"es\",\"count\":\"40101\"},{\"key\":\"pt\",\"count\":\"11039\"},{\"key\":\"fr\",\"count\":\"209\"},{\"key\":\"hi\",\"count\":\"34\"},{\"key\":\"zh\",\"count\":\"975\"},{\"key\":\"ru\",\"count\":\"4441\"},{\"key\":\"de\",\"count\":\"221\"},{\"key\":\"th\",\"count\":\"124\"},{\"key\":\"ko\",\"count\":\"12\"},{\"key\":\"ja\",\"count\":\"49\"},{\"key\":\"ar\",\"count\":\"273\"},{\"key\":\"tr\",\"count\":\"2184\"},{\"key\":\"fi\",\"count\":\"0\"},{\"key\":\"it\",\"count\":\"210\"},{\"key\":\"id\",\"count\":\"0\"},{\"key\":\"da\",\"count\":\"0\"},{\"key\":\"nl\",\"count\":\"0\"},{\"key\":\"pl\",\"count\":\"0\"}]',	'113402',	'0',	'110132',	'1607',	''),
('2021-06-07',	'108669',	'[{\"key\":\"vi\",\"count\":\"46003\"},{\"key\":\"en\",\"count\":\"7775\"},{\"key\":\"es\",\"count\":\"35097\"},{\"key\":\"pt\",\"count\":\"9960\"},{\"key\":\"fr\",\"count\":\"94\"},{\"key\":\"hi\",\"count\":\"3\"},{\"key\":\"zh\",\"count\":\"1153\"},{\"key\":\"ru\",\"count\":\"6046\"},{\"key\":\"de\",\"count\":\"212\"},{\"key\":\"th\",\"count\":\"171\"},{\"key\":\"ko\",\"count\":\"22\"},{\"key\":\"ja\",\"count\":\"80\"},{\"key\":\"ar\",\"count\":\"337\"},{\"key\":\"tr\",\"count\":\"1194\"},{\"key\":\"fi\",\"count\":\"4\"},{\"key\":\"it\",\"count\":\"518\"},{\"key\":\"id\",\"count\":\"0\"},{\"key\":\"da\",\"count\":\"0\"},{\"key\":\"nl\",\"count\":\"0\"},{\"key\":\"pl\",\"count\":\"0\"}]',	'108553',	'0',	'105841',	'1294',	''),
('2021-06-08',	'140148',	'[{\"key\":\"vi\",\"count\":\"72493\"},{\"key\":\"en\",\"count\":\"8135\"},{\"key\":\"es\",\"count\":\"40369\"},{\"key\":\"pt\",\"count\":\"12288\"},{\"key\":\"fr\",\"count\":\"50\"},{\"key\":\"hi\",\"count\":\"60\"},{\"key\":\"zh\",\"count\":\"560\"},{\"key\":\"ru\",\"count\":\"4276\"},{\"key\":\"de\",\"count\":\"295\"},{\"key\":\"th\",\"count\":\"280\"},{\"key\":\"ko\",\"count\":\"37\"},{\"key\":\"ja\",\"count\":\"89\"},{\"key\":\"ar\",\"count\":\"323\"},{\"key\":\"tr\",\"count\":\"620\"},{\"key\":\"fi\",\"count\":\"8\"},{\"key\":\"it\",\"count\":\"265\"},{\"key\":\"id\",\"count\":\"0\"},{\"key\":\"da\",\"count\":\"0\"},{\"key\":\"nl\",\"count\":\"0\"},{\"key\":\"pl\",\"count\":\"0\"}]',	'140082',	'2',	'137750',	'819',	''),
('2021-06-09',	'204250',	'[{\"key\":\"vi\",\"count\":\"85032\"},{\"key\":\"en\",\"count\":\"5213\"},{\"key\":\"es\",\"count\":\"39319\"},{\"key\":\"pt\",\"count\":\"67608\"},{\"key\":\"fr\",\"count\":\"82\"},{\"key\":\"hi\",\"count\":\"17\"},{\"key\":\"zh\",\"count\":\"743\"},{\"key\":\"ru\",\"count\":\"4591\"},{\"key\":\"de\",\"count\":\"139\"},{\"key\":\"th\",\"count\":\"94\"},{\"key\":\"ko\",\"count\":\"47\"},{\"key\":\"ja\",\"count\":\"53\"},{\"key\":\"ar\",\"count\":\"218\"},{\"key\":\"tr\",\"count\":\"983\"},{\"key\":\"fi\",\"count\":\"1\"},{\"key\":\"it\",\"count\":\"110\"},{\"key\":\"id\",\"count\":\"0\"},{\"key\":\"da\",\"count\":\"0\"},{\"key\":\"nl\",\"count\":\"0\"},{\"key\":\"pl\",\"count\":\"0\"}]',	'204227',	'8',	'201939',	'909',	''),
('2021-06-10',	'256363',	'[{\"key\":\"vi\",\"count\":\"65209\"},{\"key\":\"en\",\"count\":\"7645\"},{\"key\":\"es\",\"count\":\"38364\"},{\"key\":\"pt\",\"count\":\"138654\"},{\"key\":\"fr\",\"count\":\"68\"},{\"key\":\"hi\",\"count\":\"8\"},{\"key\":\"zh\",\"count\":\"1064\"},{\"key\":\"ru\",\"count\":\"4064\"},{\"key\":\"de\",\"count\":\"178\"},{\"key\":\"th\",\"count\":\"98\"},{\"key\":\"ko\",\"count\":\"25\"},{\"key\":\"ja\",\"count\":\"99\"},{\"key\":\"ar\",\"count\":\"154\"},{\"key\":\"tr\",\"count\":\"666\"},{\"key\":\"fi\",\"count\":\"0\"},{\"key\":\"it\",\"count\":\"67\"},{\"key\":\"id\",\"count\":\"0\"},{\"key\":\"da\",\"count\":\"0\"},{\"key\":\"nl\",\"count\":\"0\"},{\"key\":\"pl\",\"count\":\"0\"}]',	'256292',	'13',	'251461',	'3593',	''),
('2021-06-12',	'321888',	'[{\"key\":\"vi\",\"count\":\"103043\"},{\"key\":\"en\",\"count\":\"9468\"},{\"key\":\"es\",\"count\":\"74835\"},{\"key\":\"pt\",\"count\":\"120916\"},{\"key\":\"fr\",\"count\":\"68\"},{\"key\":\"hi\",\"count\":\"32\"},{\"key\":\"zh\",\"count\":\"2279\"},{\"key\":\"ru\",\"count\":\"8815\"},{\"key\":\"de\",\"count\":\"159\"},{\"key\":\"th\",\"count\":\"383\"},{\"key\":\"ko\",\"count\":\"49\"},{\"key\":\"ja\",\"count\":\"134\"},{\"key\":\"ar\",\"count\":\"248\"},{\"key\":\"tr\",\"count\":\"1383\"},{\"key\":\"fi\",\"count\":\"2\"},{\"key\":\"it\",\"count\":\"74\"},{\"key\":\"id\",\"count\":\"0\"},{\"key\":\"da\",\"count\":\"0\"},{\"key\":\"nl\",\"count\":\"0\"},{\"key\":\"pl\",\"count\":\"0\"}]',	'321851',	'2',	'316795',	'2547',	'');

-- 2021-06-12 15:28:46