-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_user_fi`;
CREATE TABLE `app_my_girl_user_fi` (
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

TRUNCATE `app_my_girl_user_fi`;
INSERT INTO `app_my_girl_user_fi` (`id_device`, `name`, `sex`, `date_start`, `date_cur`, `address`, `sdt`, `status`, `email`, `avatar_url`, `password`) VALUES
('b8ad8e209269bf4bfeffe53e6e41c06b',	'matias',	'0',	'2019-10-06',	'2019-10-06',	'',	'0442448899',	0,	'',	'',	''),
('f40720c998005ba5da5f1844ae66be18',	'Jygernaut',	'0',	'2019-10-17',	'2019-10-17',	'',	'0408498401',	0,	'',	'',	''),
('4b7cf5104780e22e8968908b725ebc71',	'thu ahonranta ',	'1',	'2019-10-22',	'2019-10-22',	'',	'0442029529',	1,	'',	'',	''),
('dbc00f9c9a5edf2ff358d724474bd12e',	'Sofia Parviainen',	'1',	'2019-10-24',	'2019-10-24',	'',	'0401575455',	0,	'',	'',	''),
('0851f2306615af043973a4e04f3f68f7',	'王璐王璐王璐',	'0',	'2019-12-01',	'2019-12-01',	'',	'13235123318',	0,	'',	'',	''),
('18385df4fae3282829a57d3c113e3c58',	'peheriline',	'0',	'2019-12-06',	'2019-12-06',	'',	'358449712069',	0,	'',	'',	''),
('426bcd5934b503c1fdae6ece56867612',	'Саша ',	'0',	'2020-01-11',	'2020-01-11',	'',	'1855566255',	0,	'',	'',	''),
('ecc25d89864f23b4742b53e6e2707987',	'Oona. v',	'1',	'2020-02-26',	'2020-02-26',	'',	'1773804078088',	1,	'',	'',	''),
('ba1edc2a705ee4e388d73aa53919e7a5',	'elias',	'0',	'2020-04-13',	'2020-04-13',	'',	'0442373310',	1,	'',	'',	''),
('61c1319ba5f2d5768a1c573faebd5883',	'jarkko',	'0',	'2020-05-11',	'2020-05-11',	'',	'0458946002',	1,	'',	'',	''),
('0776c8934dc7e659034b9067adb345be',	'hsjrchrrvjus',	'0',	'2020-06-20',	'2020-06-20',	'',	'546486486',	0,	'',	'',	''),
('f51fc43343620265ed4bb6e0f784b9f8',	'frans',	'0',	'2020-06-21',	'2020-06-21',	'',	'000000000',	0,	'',	'',	''),
('de530ab32a3b4fcb788ae62cc76c99e5',	'Riku P',	'0',	'2020-06-21',	'2020-06-21',	'',	'0504048657',	0,	'',	'',	''),
('742eb1c6b27c73744136f604ab06ebbd',	'kalle',	'0',	'2020-06-28',	'2020-06-28',	'',	'0417141477',	0,	'',	'',	''),
('dd5b0d0895352ee8232e836ec7bff908',	'你好二三会一火。',	'0',	'2020-06-30',	'2020-06-30',	'',	'99888487458555222222',	0,	'',	'',	''),
('fe33fa7de7842f66a700c058457b53e2',	'toxico',	'0',	'2020-07-19',	'2020-07-19',	'',	'84423251999',	0,	'',	'',	''),
('6fcfa6565785c8e69d7ed4889afd71b3',	'Gabriel Jaime Gómez',	'0',	'2020-07-28',	'2020-07-28',	'',	'3137797215',	0,	'',	'',	'');

-- 2020-10-05 09:08:24
