-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id_order` varchar(50) NOT NULL,
  `id` varchar(11) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `pay_mail` varchar(50) NOT NULL,
  `pay_name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `is_send` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `order`;
INSERT INTO `order` (`id_order`, `id`, `lang`, `pay_mail`, `pay_name`, `type`, `is_send`) VALUES
('5f0ff1e1811515f0ff1e1811a6',	'71432',	'vi',	'tranthienthanh93-buyer@gmail.com',	'test',	'music',	0),
('5f0ff49cb6f815f0ff49cb736b',	'24755',	'vi',	'luongngochuy195@gmail.com',	'Ngoc Huy',	'music',	0),
('5f0ff49cb6f815f0ff49cb736c',	'20647',	'vi',	'tranrot93@gmail.com',	'Rot tran',	'music',	1),
('5f151cf5146075f151cf514648',	'25877',	'en',	'hatchetrave@gmail.com',	'Janet',	'music',	1),
('5f191c84d87815f191c84d87be',	'25224',	'en',	'mmayoms@gmail.com',	'BOONCHITA',	'music',	1),
('5f1ea4ec485975f1ea4ec485d3',	'9386',	'pt',	'skyline2732@outlook.com',	'Cassiano',	'music',	1),
('5f1f1a4d8ce715f1f1a4d8cead',	'25224',	'en',	'kshadwick@gmail.com',	'Kelly',	'music',	1),
('5f2199962c5855f2199962c969',	'30142',	'en',	'ehdwns5950@gmail.com',	'동준',	'music',	1),
('5f24e8b8bb3825f24e8b8bb3be',	'71851',	'vi',	'mandyhle93@yahoo.com',	'Hanh',	'music',	1),
('5f298c89838775f298c89838b3',	'22139',	'en',	'dillardtommy@ymail.com',	'Tommy',	'music',	1),
('5f3d7ac5940f45f3d7ac59412f',	'25224',	'en',	'eapayne@bellsouth.net',	'Elsa',	'music',	1),
('5f470506e4a245f470506e4a63',	'29095',	'en',	'alexvansmusic@gmail.com',	'Alexander',	'music',	1),
('5f4aaeb64406e5f4aaeb6440aa',	'50748',	'es',	'davideb22@hotmail.it',	'Davide',	'music',	1),
('5f4f10b18a0d15f4f10b18a115',	'25224',	'en',	'e.janeen@gmail.com',	'Emily',	'music',	1),
('5f50e744605e15f50e7446061d',	'128',	'ja',	'c.lin@kuturogian.co.jp',	'CHIWEI',	'music',	0),
('5f5af1cdeaa895f5af1cdeab17',	'23726',	'en',	'jasonbishop@sbcglobal.net',	'Jason',	'music',	1),
('5f613000c55895f613000c55c4',	'29215',	'en',	'foxarchitect@gmail.com',	'Nathan',	'music',	1),
('5f63ec9a212f55f63ec9a21330',	'27036',	'en',	'ulegro@yahoo.com',	'Regulo',	'music',	0),
('5f666859011625f6668590119e',	'14223',	'pt',	'dustinluebberswow@web.de',	'Dustin',	'music',	0),
('5f722312959505f7223129598b',	'28931',	'en',	'jlmorris7033@gmail.com',	'James',	'music',	1),
('5f822a43732435f822a4373285',	'803',	'de',	'klausvandongen@live.de',	'Klaus',	'music',	1),
('5f86875da51575f86875da5194',	'30140',	'en',	'jyw4u@naver.com',	'민준',	'music',	0);

-- 2020-10-16 11:49:23
