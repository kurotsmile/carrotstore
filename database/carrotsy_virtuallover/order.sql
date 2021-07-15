-- Adminer 4.8.1 MySQL 5.7.34 dump

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
('5ff6d41937b845ff6d41937bc2',	'28725',	'en',	'kyfaulky@gmail.com',	'george',	'music',	1),
('6004a3e7d2c7d6004a3e7d2cc0',	'30408',	'en',	'djcalmado02021992@gmail.com',	'Pedro',	'music',	1),
('600581c1053d0600581c10540b',	'803',	'de',	'wkurzhals@outlook.de',	'Wilfried',	'music',	1),
('600d875c748b7600d875c748f2',	'9386',	'pt',	'marcos.assuncao.rocha@gmail.com',	'Marcos',	'music',	1),
('600ef02f0a871600ef02f0a8b4',	'803',	'de',	'indraluke9@gmail.com',	'Indra-Maureen Ashley',	'music',	1),
('6010f395435bc6010f395435f7',	'23726',	'en',	'familyofqueens@bigpond.com',	'Paul',	'music',	1),
('60159d717949360159d71794cf',	'16072',	'en',	'sirjared.boden@gmail.com',	'Jared',	'music',	1),
('6024e44a5ba4d6024e44a5ba99',	'133',	'fi',	'ikrimey16@gmail.com',	'İkrime',	'music',	1),
('602e662b3ed63602e662b3ed8d',	'27737',	'en',	'markus.kitzol@t-online.de',	'Markus',	'music',	0),
('603b1883709d4603b188370a0f',	'482',	'ja',	'SOPFIE@LIVE.CN',	'YUHUI',	'music',	0),
('603bf9704cf5e603bf9704cf9a',	'75',	'de',	'rthalheim@web.de',	'René',	'music',	0),
('603ec77045a0a603ec77045a46',	'18854',	'en',	'dadenewsham07@gmail.com',	'dade',	'music',	0),
('6042ef80af2666042ef80af64e',	'27762',	'en',	'cit6377@gmail.com',	'태휘',	'music',	0),
('6043fe33ec8f26043fe33ec92f',	'31890',	'en',	'Lgreenaway25@gmail.com',	'Laura',	'music',	0),
('606301b401fde606301b40201c',	'75162',	'vi',	'dungcong.camtu@hotmail.com',	'Connie',	'music',	0),
('60648ff4de96a60648ff4de9a5',	'16072',	'en',	'lees-simpkins@gmx.com',	'aiden',	'music',	0),
('606882d0b2f47606882d0b2f83',	'30013',	'en',	'cape66@me.com',	'Andrea',	'music',	0),
('607a3438e0157607a3438e0199',	'31191',	'en',	'gcrockergrl1@aol.com',	'Danielle',	'music',	0),
('607ee3390bbc8607ee3390bc05',	'29818',	'en',	'garryhibbs50@gmail.com',	'Garry',	'music',	0),
('608022f611e7c608022f611ebe',	'321',	'ja',	'hollynduffer@gmail.com',	'Holly',	'music',	0),
('608cadf5694f1608cadf569534',	'34111',	'en',	'achilito@gmail.com',	'Alicia',	'music',	0),
('60a624384e6e960a624384e72b',	'28962',	'en',	'ianstammars@gmail.com',	'Ian',	'music',	0),
('60ae7294e42de60ae7294e42ee',	'23726',	'en',	'tjeffries78@gmail.com',	'Troy',	'music',	0),
('60b540bce06f460b540bce0730',	'9386',	'pt',	'alanmenossi@yahoo.com.br',	'Alan',	'music',	0),
('60b95e5949ba360b95e5949be0',	'29067',	'en',	'aaronbrame@gmail.com',	'Rocco',	'music',	0),
('60c30170be94860c30170be984',	'29820',	'en',	'umff90@gmail.com',	'Jeff',	'music',	0),
('60c8f372ddd7560c8f372dddb7',	'21410',	'en',	'JonathanCrawley1988@outlook.com',	'Jonathan',	'music',	0),
('60ce7ac63d69b60ce7ac63d6d9',	'33621',	'en',	'kirstenlriiber@gmail.com',	'Kirsten ',	'music',	0),
('60ced143b2d4060ced143b2d82',	'27744',	'en',	'dacheesypoof@sbcglobal.net',	'Henry',	'music',	0),
('60cf9c442483060cf9c4424872',	'9386',	'pt',	'bielmullin@gmail.com',	'Gabriel',	'music',	0),
('60d982070cfbd60d982070cff9',	'28601',	'en',	'info@polethreads.com.au',	'Fiona',	'music',	0),
('60da346ac71b860da346ac71f5',	'26115',	'en',	'mullendave@icloud.com',	'David',	'music',	0);

-- 2021-07-01 04:15:59