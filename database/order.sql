-- Adminer 4.7.8 MySQL dump

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
('5f0ff1e1811515f0ff1e1811a6',	'71432',	'vi',	'tranthienthanh93-buyer@gmail.com',	'test',	'music',	1),
('5f0ff49cb6f815f0ff49cb736b',	'24755',	'vi',	'luongngochuy195@gmail.com',	'Ngoc Huy',	'music',	1),
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
('5f50e744605e15f50e7446061d',	'128',	'ja',	'c.lin@kuturogian.co.jp',	'CHIWEI',	'music',	1),
('5f5af1cdeaa895f5af1cdeab17',	'23726',	'en',	'jasonbishop@sbcglobal.net',	'Jason',	'music',	1),
('5f613000c55895f613000c55c4',	'29215',	'en',	'foxarchitect@gmail.com',	'Nathan',	'music',	1),
('5f63ec9a212f55f63ec9a21330',	'27036',	'en',	'ulegro@yahoo.com',	'Regulo',	'music',	1),
('5f666859011625f6668590119e',	'14223',	'pt',	'dustinluebberswow@web.de',	'Dustin',	'music',	1),
('5f722312959505f7223129598b',	'28931',	'en',	'jlmorris7033@gmail.com',	'James',	'music',	1),
('5f822a43732435f822a4373285',	'803',	'de',	'klausvandongen@live.de',	'Klaus',	'music',	1),
('5f86875da51575f86875da5194',	'30140',	'en',	'jyw4u@naver.com',	'민준',	'music',	1),
('5f9bc2c41f9075f9bc2c41f947',	'9544',	'ru',	'adam.pieta2@wp.pl',	'ADAM',	'music',	1),
('5fa395afd77ed5fa395afd782d',	'27631',	'en',	'cchen285@ucr.edu',	'Chen',	'music',	1),
('5fa458b5add555fa458b5add92',	'50001',	'es',	'sergiotobar12244@icloud.com',	'HUNDERWORD',	'music',	1),
('5fa652715eb645fa652715eba2',	'1595',	'ja',	'r.one005678@gmail.com',	'敬史',	'music',	1),
('5fa94672e1e485fa94672e1e87',	'879',	'fr',	'mark@altencos.com',	'Mark',	'music',	1),
('5fadc02d7ac175fadc02d7ac56',	'22875',	'en',	'kayleightabler86@gmail.com',	'Kayleigh',	'music',	1),
('5fb792d6c38255fb792d6c3864',	'28427',	'en',	'1255733372@qq.com',	'YanZhen',	'music',	1),
('5fb7952dab85e5fb7952dab8ac',	'28427',	'en',	'1255733372@qq.com',	'YanZhen',	'music',	1),
('5fc50a47304745fc50a47304b9',	'27912',	'en',	'shanep74@gmail.com',	'Shane',	'music',	1),
('5fd035f4428165fd035f442854',	'24225',	'en',	'sawyerjhs@gmail.com',	'Sawyer',	'music',	1),
('5fd2050e9aa895fd2050e9aac8',	'25218',	'en',	'joshua_nosko@hotmail.com',	'Joshua',	'music',	1),
('5fd930f36dc5d5fd930f36dc9c',	'27905',	'en',	'willzhou0305@gmail.com',	'Weizhou',	'music',	1),
('5fd94d96098e35fd94d9609922',	'21049',	'en',	'britlnull92@gmail.com',	'Britany',	'music',	1),
('5fda28c9a3d125fda28c9a3d50',	'123',	'ja',	'k898388@gmail.com',	'愷',	'music',	1),
('5fda5b4381f325fda5b4381f70',	'49304',	'es',	'buildingcontroller@fmha.co.za',	'Annalize',	'music',	1),
('5fe97693dbee25fe97693dbf44',	'23668',	'en',	'efimova.arina.444@gmail.com',	'Arina',	'music',	1),
('5ff1421aeda525ff1421aeda96',	'60738',	'es',	'alexrg62@gmail.com',	'alex',	'music',	1),
('5ff36b442aa705ff36b442aaaf',	'33318',	'en',	'mailson.gomesdesouza@gmail.com',	'Maílson',	'music',	1),
('5ff36bb0384f95ff36bb038537',	'33318',	'en',	'mailson.gomesdesouza@gmail.com',	'Maílson',	'music',	1),
('5ff6d41937b845ff6d41937bc2',	'28725',	'en',	'kyfaulky@gmail.com',	'george',	'music',	0),
('6004a3e7d2c7d6004a3e7d2cc0',	'30408',	'en',	'djcalmado02021992@gmail.com',	'Pedro',	'music',	0),
('600581c1053d0600581c10540b',	'803',	'de',	'wkurzhals@outlook.de',	'Wilfried',	'music',	0),
('600d875c748b7600d875c748f2',	'9386',	'pt',	'marcos.assuncao.rocha@gmail.com',	'Marcos',	'music',	0),
('600ef02f0a871600ef02f0a8b4',	'803',	'de',	'indraluke9@gmail.com',	'Indra-Maureen Ashley',	'music',	0),
('6010f395435bc6010f395435f7',	'23726',	'en',	'familyofqueens@bigpond.com',	'Paul',	'music',	0);

-- 2021-01-29 09:16:20
