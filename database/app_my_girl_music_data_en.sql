-- Adminer 4.8.0 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_music_data_en`;
CREATE TABLE `app_my_girl_music_data_en` (
  `device_id` varchar(50) NOT NULL,
  `value` varchar(1) NOT NULL,
  `id_chat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_music_data_en`;
INSERT INTO `app_my_girl_music_data_en` (`device_id`, `value`, `id_chat`) VALUES
('66.249.73.23',	'1',	'23272'),
('66.249.73.23',	'3',	'22443'),
('66.249.73.23',	'2',	'23336'),
('66.249.73.23',	'0',	'23567'),
('66.249.73.23',	'3',	'23060'),
('66.249.73.23',	'1',	'24483'),
('66.249.73.23',	'1',	'26968'),
('66.249.73.23',	'3',	'25491'),
('66.249.73.23',	'0',	'24566'),
('66.249.73.24',	'3',	'21117'),
('66.249.73.23',	'0',	'21027'),
('86.19.91.183',	'0',	'23668'),
('66.249.90.216',	'0',	'23668'),
('54.80.95.77',	'0',	'23668'),
('66.249.73.23',	'3',	'24579'),
('66.249.73.23',	'0',	'26223'),
('66.249.73.23',	'1',	'24560'),
('66.249.73.23',	'3',	'20691'),
('66.249.73.23',	'3',	'23119'),
('66.249.73.24',	'2',	'21779'),
('66.249.73.24',	'0',	'25868'),
('66.249.73.24',	'1',	'25870'),
('66.249.73.24',	'0',	'23686'),
('66.249.73.24',	'3',	'26094'),
('66.249.73.23',	'2',	'23114'),
('66.249.73.23',	'0',	'24478'),
('66.249.73.31',	'0',	'22041'),
('66.249.73.29',	'1',	'22254'),
('66.249.73.23',	'1',	'27242'),
('66.249.73.23',	'2',	'18851'),
('66.249.73.23',	'0',	'24037'),
('66.249.73.24',	'3',	'14688'),
('66.249.73.23',	'2',	'24241'),
('66.249.73.24',	'0',	'27100'),
('66.249.73.24',	'1',	'26542'),
('66.249.73.24',	'2',	'24032'),
('66.249.73.23',	'1',	'26977'),
('66.249.73.23',	'1',	'25336'),
('66.249.73.23',	'3',	'24383'),
('66.249.73.23',	'3',	'25748'),
('66.249.73.23',	'2',	'25359'),
('66.249.73.24',	'1',	'24746'),
('66.249.73.23',	'0',	'21955'),
('66.249.73.23',	'1',	'25195'),
('212.102.53.22',	'0',	'21224'),
('66.249.73.23',	'3',	'15580'),
('66.249.73.23',	'1',	'25666'),
('66.249.73.23',	'0',	'26781'),
('66.249.73.23',	'2',	'23544'),
('66.249.73.23',	'2',	'23043'),
('66.249.73.25',	'3',	'16587'),
('66.249.73.25',	'1',	'23226'),
('66.249.73.24',	'0',	'16908'),
('66.249.73.23',	'3',	'24484'),
('66.249.73.24',	'3',	'27063'),
('66.249.73.23',	'1',	'26363'),
('66.249.73.23',	'2',	'24372'),
('66.249.73.23',	'1',	'22004'),
('66.249.73.23',	'0',	'17884'),
('66.249.73.24',	'0',	'23382'),
('66.249.73.23',	'1',	'18849'),
('66.249.73.23',	'2',	'25223'),
('66.249.73.23',	'3',	'22134'),
('66.249.73.24',	'0',	'24187'),
('66.249.73.24',	'2',	'23321'),
('66.249.73.23',	'3',	'26693'),
('66.249.73.25',	'3',	'27020'),
('66.249.73.25',	'0',	'23346'),
('66.249.73.23',	'3',	'26780'),
('66.249.73.23',	'3',	'32421'),
('66.249.73.23',	'0',	'17497'),
('66.249.73.23',	'3',	'26017'),
('66.249.73.23',	'1',	'27102'),
('66.249.73.24',	'2',	'27065'),
('66.249.73.24',	'1',	'26768'),
('66.249.73.23',	'1',	'26450'),
('66.249.73.23',	'2',	'27023'),
('66.249.73.23',	'1',	'26867'),
('66.249.73.23',	'3',	'24012'),
('66.249.73.23',	'2',	'16511'),
('66.249.73.23',	'0',	'26554'),
('66.249.73.24',	'3',	'24421'),
('66.249.73.23',	'2',	'26742'),
('66.249.73.23',	'1',	'26828'),
('66.249.73.23',	'2',	'26815'),
('66.249.73.23',	'0',	'22060'),
('13.66.139.60',	'1',	'26338'),
('66.249.73.23',	'0',	'26337'),
('102.252.66.58',	'3',	'26061'),
('52.206.137.32',	'3',	'26061'),
('66.249.90.217',	'3',	'26061'),
('66.249.73.23',	'0',	'23113'),
('66.249.73.23',	'1',	'23111'),
('219.100.37.245',	'1',	'15099'),
('35.173.183.203',	'1',	'15099'),
('66.249.73.23',	'3',	'23452'),
('73.162.65.85',	'1',	'24403'),
('66.249.90.216',	'1',	'24403'),
('66.249.73.23',	'3',	'27031'),
('66.249.73.25',	'0',	'26477'),
('66.249.73.24',	'0',	'26770'),
('66.249.73.23',	'1',	'27007'),
('66.249.73.24',	'3',	'15889'),
('66.249.73.25',	'2',	'26867'),
('66.249.73.23',	'1',	'20879'),
('66.249.73.23',	'2',	'23104'),
('66.249.73.25',	'1',	'26872'),
('66.249.73.23',	'1',	'26088'),
('66.249.73.23',	'0',	'26426'),
('74.119.118.49',	'1',	'24403'),
('66.249.73.23',	'1',	'24474'),
('66.249.73.24',	'3',	'23708'),
('66.249.73.23',	'1',	'17697'),
('66.249.73.23',	'0',	'14744'),
('178.176.152.158',	'2',	'24873'),
('66.249.73.23',	'3',	'22365'),
('66.249.73.25',	'1',	'15580'),
('66.249.73.23',	'1',	'14746'),
('66.249.73.23',	'1',	'23686'),
('66.249.73.23',	'2',	'26743'),
('66.249.73.23',	'1',	'24419'),
('13.66.139.61',	'1',	'26338'),
('5.127.61.73',	'0',	'14744'),
('66.249.73.25',	'3',	'23905'),
('66.249.73.23',	'2',	'22456'),
('66.249.64.13',	'0',	'19480'),
('37.137.5.62',	'0',	'14744'),
('66.249.64.13',	'3',	'23452'),
('66.249.64.13',	'3',	'14740'),
('66.249.64.14',	'1',	'20879'),
('66.249.64.13',	'1',	'23132'),
('52.86.146.169',	'3',	'25834'),
('66.249.64.14',	'2',	'23104'),
('66.249.64.13',	'2',	'24579'),
('188.126.94.183',	'0',	'21224'),
('66.249.64.13',	'2',	'23689'),
('66.249.64.13',	'1',	'23542'),
('66.249.64.13',	'3',	'32421'),
('66.249.64.13',	'3',	'22371'),
('66.249.64.15',	'0',	'26426'),
('66.249.64.13',	'1',	'22047'),
('66.249.64.13',	'3',	'23462'),
('66.249.64.14',	'1',	'26828'),
('237aa5077b8fa2a30b1d794627302d4c',	'0',	'23523'),
('66.249.64.13',	'1',	'25875'),
('66.249.64.14',	'3',	'27107'),
('66.249.64.14',	'0',	'21320'),
('66.249.64.15',	'3',	'22154'),
('66.249.64.14',	'2',	'23466'),
('66.249.64.13',	'3',	'24246'),
('66.249.64.13',	'2',	'26815'),
('66.249.64.15',	'1',	'24685'),
('66.249.64.13',	'2',	'24548'),
('66.249.64.13',	'0',	'24241'),
('66.249.64.15',	'3',	'24489'),
('103.41.146.94',	'3',	'27301'),
('66.249.64.13',	'0',	'26426'),
('66.249.64.13',	'1',	'23474'),
('66.249.64.13',	'0',	'22862'),
('66.249.64.143',	'0',	'26426'),
('66.249.64.143',	'2',	'23466'),
('66.249.64.145',	'1',	'24693'),
('66.249.64.145',	'3',	'22154'),
('da8e28aacc8d0a1e0df4cada52406265',	'3',	'2286'),
('66.249.64.143',	'1',	'26427'),
('37.137.151.119',	'0',	'14744'),
('66.249.64.143',	'2',	'23521'),
('59eaeac98cc1f4fd05cd2814a87f3886',	'0',	'28500'),
('66.249.64.143',	'1',	'21991'),
('66.249.64.143',	'2',	'24585'),
('135.181.77.240',	'0',	'14744'),
('14.189.211.42',	'1',	'33770'),
('66.249.89.79',	'1',	'33770'),
('54.221.180.226',	'1',	'33770'),
('98.221.234.24',	'0',	'26426'),
('66.249.64.143',	'1',	'22339'),
('5.75.20.219',	'3',	'12801'),
('66.249.89.81',	'3',	'12801'),
('abed783d8867c3c50f1788fc499cf208',	'0',	'24382'),
('abed783d8867c3c50f1788fc499cf208',	'0',	'32790'),
('183.83.240.110',	'1',	'22387'),
('184.63.201.63',	'1',	'27242'),
('104.225.178.184',	'1',	'27242'),
('52.202.160.51',	'1',	'27242'),
('66.249.89.79',	'1',	'27242'),
('66.249.64.147',	'0',	'23466'),
('104.225.163.129',	'1',	'27242'),
('197.210.84.169',	'2',	'16189'),
('66.249.89.81',	'2',	'16189'),
('66.249.64.143',	'3',	'15889'),
('66.249.64.147',	'3',	'26436'),
('66.249.73.24',	'0',	'26426'),
('3624de09bb2592110c0154e1a9a03d5b',	'3',	'23772'),
('80.246.141.144',	'0',	'22476'),
('66.249.90.216',	'0',	'22476'),
('0473accfd352fabb25b07259d385d631',	'4',	''),
('174.193.18.85',	'1',	'33770'),
('66.249.90.215',	'1',	'33770'),
('34.229.192.233',	'1',	'33770'),
('66.249.73.25',	'1',	'19311'),
('66.249.73.23',	'3',	'14985'),
('23aee6bba126696f05ce369b0e817fcb',	'3',	'26205'),
('66.249.73.25',	'2',	'21510'),
('66.249.73.23',	'0',	'24702'),
('66.249.73.23',	'1',	'2452'),
('91.242.162.21',	'2',	'22160'),
('91.242.162.21',	'2',	'22165');

-- 2021-03-10 07:13:15
