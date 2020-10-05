-- Adminer 4.7.7 MySQL dump

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
('2020-10-01',	'137922',	'[{\"key\":\"vi\",\"count\":\"43806\"},{\"key\":\"en\",\"count\":\"10838\"},{\"key\":\"es\",\"count\":\"58775\"},{\"key\":\"pt\",\"count\":\"18723\"},{\"key\":\"fr\",\"count\":\"141\"},{\"key\":\"hi\",\"count\":\"18\"},{\"key\":\"zh\",\"count\":\"811\"},{\"key\":\"ru\",\"count\":\"3332\"},{\"key\":\"de\",\"count\":\"176\"},{\"key\":\"th\",\"count\":\"170\"},{\"key\":\"ko\",\"count\":\"260\"},{\"key\":\"ja\",\"count\":\"72\"},{\"key\":\"ar\",\"count\":\"176\"},{\"key\":\"tr\",\"count\":\"512\"},{\"key\":\"fi\",\"count\":\"2\"},{\"key\":\"it\",\"count\":\"110\"},{\"key\":\"id\",\"count\":\"0\"},{\"key\":\"da\",\"count\":\"0\"},{\"key\":\"nl\",\"count\":\"0\"},{\"key\":\"pl\",\"count\":\"0\"}]',	'137872',	'0',	'121071',	'16855',	''),
('2020-10-02',	'136777',	'[{\"key\":\"vi\",\"count\":\"44131\"},{\"key\":\"en\",\"count\":\"11435\"},{\"key\":\"es\",\"count\":\"55722\"},{\"key\":\"pt\",\"count\":\"17682\"},{\"key\":\"fr\",\"count\":\"349\"},{\"key\":\"hi\",\"count\":\"15\"},{\"key\":\"zh\",\"count\":\"799\"},{\"key\":\"ru\",\"count\":\"4906\"},{\"key\":\"de\",\"count\":\"153\"},{\"key\":\"th\",\"count\":\"95\"},{\"key\":\"ko\",\"count\":\"54\"},{\"key\":\"ja\",\"count\":\"58\"},{\"key\":\"ar\",\"count\":\"75\"},{\"key\":\"tr\",\"count\":\"1049\"},{\"key\":\"fi\",\"count\":\"22\"},{\"key\":\"it\",\"count\":\"232\"},{\"key\":\"id\",\"count\":\"0\"},{\"key\":\"da\",\"count\":\"0\"},{\"key\":\"nl\",\"count\":\"0\"},{\"key\":\"pl\",\"count\":\"0\"}]',	'136659',	'34',	'120618',	'16165',	''),
('2020-10-03',	'136724',	'[{\"key\":\"vi\",\"count\":\"47350\"},{\"key\":\"en\",\"count\":\"9209\"},{\"key\":\"es\",\"count\":\"56365\"},{\"key\":\"pt\",\"count\":\"15357\"},{\"key\":\"fr\",\"count\":\"299\"},{\"key\":\"hi\",\"count\":\"14\"},{\"key\":\"zh\",\"count\":\"1194\"},{\"key\":\"ru\",\"count\":\"4902\"},{\"key\":\"de\",\"count\":\"253\"},{\"key\":\"th\",\"count\":\"395\"},{\"key\":\"ko\",\"count\":\"738\"},{\"key\":\"ja\",\"count\":\"147\"},{\"key\":\"ar\",\"count\":\"104\"},{\"key\":\"tr\",\"count\":\"243\"},{\"key\":\"fi\",\"count\":\"24\"},{\"key\":\"it\",\"count\":\"130\"},{\"key\":\"id\",\"count\":\"0\"},{\"key\":\"da\",\"count\":\"0\"},{\"key\":\"nl\",\"count\":\"0\"},{\"key\":\"pl\",\"count\":\"0\"}]',	'136614',	'57',	'120218',	'16508',	''),
('2020-10-04',	'157734',	'[{\"key\":\"vi\",\"count\":\"62371\"},{\"key\":\"en\",\"count\":\"12195\"},{\"key\":\"es\",\"count\":\"54085\"},{\"key\":\"pt\",\"count\":\"19773\"},{\"key\":\"fr\",\"count\":\"333\"},{\"key\":\"hi\",\"count\":\"48\"},{\"key\":\"zh\",\"count\":\"1354\"},{\"key\":\"ru\",\"count\":\"5702\"},{\"key\":\"de\",\"count\":\"384\"},{\"key\":\"th\",\"count\":\"747\"},{\"key\":\"ko\",\"count\":\"180\"},{\"key\":\"ja\",\"count\":\"114\"},{\"key\":\"ar\",\"count\":\"63\"},{\"key\":\"tr\",\"count\":\"365\"},{\"key\":\"fi\",\"count\":\"0\"},{\"key\":\"it\",\"count\":\"20\"},{\"key\":\"id\",\"count\":\"0\"},{\"key\":\"da\",\"count\":\"0\"},{\"key\":\"nl\",\"count\":\"0\"},{\"key\":\"pl\",\"count\":\"0\"}]',	'157673',	'14',	'137569',	'20172',	''),
('2020-10-05',	'154501',	'[{\"key\":\"vi\",\"count\":\"72420\"},{\"key\":\"en\",\"count\":\"8369\"},{\"key\":\"es\",\"count\":\"51429\"},{\"key\":\"pt\",\"count\":\"15293\"},{\"key\":\"fr\",\"count\":\"240\"},{\"key\":\"hi\",\"count\":\"9\"},{\"key\":\"zh\",\"count\":\"1279\"},{\"key\":\"ru\",\"count\":\"3504\"},{\"key\":\"de\",\"count\":\"408\"},{\"key\":\"th\",\"count\":\"489\"},{\"key\":\"ko\",\"count\":\"156\"},{\"key\":\"ja\",\"count\":\"105\"},{\"key\":\"ar\",\"count\":\"133\"},{\"key\":\"tr\",\"count\":\"549\"},{\"key\":\"fi\",\"count\":\"3\"},{\"key\":\"it\",\"count\":\"115\"},{\"key\":\"id\",\"count\":\"0\"},{\"key\":\"da\",\"count\":\"0\"},{\"key\":\"nl\",\"count\":\"0\"},{\"key\":\"pl\",\"count\":\"0\"}]',	'154423',	'10',	'136307',	'18196',	'');

-- 2020-10-05 07:48:50
