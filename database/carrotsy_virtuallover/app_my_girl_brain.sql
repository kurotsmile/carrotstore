-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_brain`;
CREATE TABLE `app_my_girl_brain` (
  `question` varchar(200) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `status` varchar(1) NOT NULL,
  `effect` varchar(1) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `langs` varchar(2) NOT NULL,
  `face` int(2) NOT NULL DEFAULT '0',
  `action` int(2) NOT NULL DEFAULT '0',
  `author` varchar(30) NOT NULL,
  `character_sex` int(1) NOT NULL,
  `version` int(1) NOT NULL,
  `os` varchar(20) NOT NULL,
  `limit_chat` int(1) NOT NULL DEFAULT '0',
  `color_chat` varchar(10) NOT NULL,
  `id_question` varchar(20) NOT NULL,
  `type_question` varchar(20) NOT NULL,
  `md5` varchar(50) NOT NULL,
  `id_device` varchar(50) NOT NULL,
  `criterion` int(1) NOT NULL DEFAULT '0',
  `approved` int(1) NOT NULL DEFAULT '0',
  `tick` int(1) NOT NULL DEFAULT '0',
  `user_work_id` int(3) NOT NULL,
  `links` text CHARACTER SET ucs2 NOT NULL,
  `ping_father` int(1) NOT NULL,
  `date_pub` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_brain`;
INSERT INTO `app_my_girl_brain` (`question`, `answer`, `status`, `effect`, `sex`, `langs`, `face`, `action`, `author`, `character_sex`, `version`, `os`, `limit_chat`, `color_chat`, `id_question`, `type_question`, `md5`, `id_device`, `criterion`, `approved`, `tick`, `user_work_id`, `links`, `ping_father`, `date_pub`) VALUES
('pees',	'yes daddy use me as your potty *drinks*',	'0',	'0',	'0',	'en',	0,	0,	'0',	1,	2,	'android',	3,	'ffffff',	'',	'',	'5f89e70b51317eb69120c7becc7feefb',	'debde1518591396362306279037a4cde',	0,	0,	0,	0,	'',	0,	'2021-09-11 16:35:39'),
('cởi áo ra',	'dạ anh',	'0',	'0',	'0',	'vi',	0,	0,	'0',	1,	2,	'android',	3,	'ffffff',	'',	'',	'e3bd55030768b692803a88274872f06d',	'823f468439f0ee98d36bdae25089bac5',	0,	0,	0,	0,	'',	0,	'2021-09-11 16:39:04'),
('Nếu anh không còn trên đời em sẽ như thế nào',	'em sẽ đi theo anh, dù bất cứ đâu',	'0',	'0',	'0',	'vi',	0,	0,	'0',	1,	2,	'android',	3,	'ffffff',	'',	'',	'15f66be44062322a915b42ef423a8871',	'7812d440d02c543989314106b5736c03',	0,	0,	0,	0,	'',	0,	'2021-09-11 16:59:48'),
('hello',	'hello',	'0',	'0',	'0',	'en',	0,	0,	'0',	1,	2,	'android',	3,	'ffffff',	'',	'',	'34f46e297fa7d3492624ff9180ec3a11',	'12af16237671664179b79573bc57e771',	0,	0,	0,	0,	'',	0,	'2021-09-11 17:10:09'),
('mi caramelito',	'sácame de la envoltura y cómeme ',	'3',	'1',	'0',	'es',	0,	0,	'',	1,	1,	'android',	0,	'#FFFFFF',	'',	'',	'09d9ea64c8255b2d31ac5e17b5a0f953',	'a9506c72c00fbd9f4c00d77a3bc5297a',	1,	0,	0,	0,	'',	0,	NULL),
('ôi sướng quá nữa đi anh',	'anh sắp ra rồi ư hự',	'0',	'0',	'1',	'vi',	0,	0,	'0',	0,	2,	'android',	4,	'ffffff',	'',	'',	'6e8c26504e91bcfcb631023597f98c46',	'6b4bab901d17f8c7f07d3880c9a46252',	0,	0,	0,	0,	'',	0,	'2021-09-11 17:19:24'),
('chịch',	'anh sẽ chịch em',	'0',	'0',	'1',	'vi',	0,	0,	'0',	0,	2,	'android',	4,	'ffffff',	'',	'',	'e5a75ec05d856e50eba9f610db1f5695',	'cfbff4d08fcd2bd447e86f152364c056',	0,	0,	0,	0,	'',	0,	'2021-09-11 17:21:45'),
('我能不能操你逼',	'当然可以呀',	'2',	'1',	'0',	'zh',	0,	0,	'',	1,	1,	'android',	0,	'#FFFFFF',	'',	'',	'f7618d2c11c1c3c8409b78e8585f6e55',	'cf10e93a05ad9daa94b6f7fc77727ba2',	1,	0,	0,	0,	'',	0,	NULL),
('conoses a arturo y a tomi',	'si estan alados tuyo',	'0',	'0',	'0',	'es',	0,	0,	'0',	1,	2,	'android',	3,	'ffffff',	'',	'',	'df525614382b3379edb31da7354d30a3',	'3e85f41da72a7715413b9143471c420f',	0,	0,	0,	0,	'',	0,	'2021-09-11 17:35:47'),
('我想和你做爱',	'当然可以啦',	'2',	'1',	'0',	'zh',	0,	0,	'',	1,	1,	'android',	0,	'#FFFFFF',	'26',	'msg',	'3090ac5e4adac70e8c5392c1eeded2bf',	'cf10e93a05ad9daa94b6f7fc77727ba2',	1,	0,	0,	0,	'',	0,	NULL),
('我想操你逼',	'当然可以呀',	'2',	'1',	'0',	'zh',	0,	0,	'',	1,	1,	'android',	0,	'#FFFFFF',	'26',	'msg',	'44dd75c880b6a67953b6fa20e0168504',	'cf10e93a05ad9daa94b6f7fc77727ba2',	1,	0,	0,	0,	'',	0,	NULL),
('我想和你做爱',	'当然可以呀',	'2',	'1',	'0',	'zh',	0,	0,	'',	1,	1,	'android',	0,	'#FFFFFF',	'26',	'msg',	'f1fdec5f76e656bd839fd4decb15356b',	'cf10e93a05ad9daa94b6f7fc77727ba2',	1,	0,	0,	0,	'',	0,	NULL),
('我想和你做爱',	'当然可以呀',	'2',	'1',	'0',	'zh',	0,	0,	'',	1,	1,	'android',	0,	'#FFFFFF',	'26',	'msg',	'd729da5d2c6c7e7fdc33b6b4415f253a',	'cf10e93a05ad9daa94b6f7fc77727ba2',	1,	0,	0,	0,	'',	0,	NULL),
('我想操你逼',	'当然可以呀',	'2',	'1',	'0',	'zh',	0,	0,	'',	1,	1,	'android',	0,	'#FFFFFF',	'26',	'msg',	'e35dc2333b04ba95bbc95513359aff1a',	'cf10e93a05ad9daa94b6f7fc77727ba2',	1,	0,	0,	0,	'',	0,	NULL),
('vamos nos tres num sexo',	'sim. eu sento em voce e voce chupa a carol',	'0',	'0',	'0',	'pt',	0,	0,	'0',	1,	2,	'android',	4,	'ffffff',	'',	'',	'cbdd11e8c6712e03b11e10f26c30d684',	'42186a1cfd7fd925f212f36c0f8f7fbc',	0,	0,	0,	0,	'',	0,	'2021-09-11 18:23:47'),
('我想艹你，去床上等我',	'我会在床上等您，主人',	'0',	'0',	'0',	'zh',	0,	0,	'',	1,	2,	'android',	0,	'#FFFFFF',	'35',	'msg',	'6bc456977f3e6aa92566a6e4b0695794',	'37f87e8b182b4f0d029d41da70eb5e20',	1,	0,	0,	0,	'',	0,	NULL),
('vú em to vãi nòi',	'anh bú không em cho bú',	'0',	'0',	'0',	'vi',	0,	0,	'0',	1,	2,	'android',	3,	'ffffff',	'',	'',	'6d1df26d9375d91ce470a4f97fe39b43',	'75ae770613aabaed7f4297dadfc6a331',	0,	0,	0,	0,	'',	0,	'2021-09-11 18:26:55'),
('PERRA',	'Metemela',	'0',	'0',	'0',	'es',	0,	0,	'0',	1,	2,	'android',	4,	'ffffff',	'',	'',	'9c4fa4d0eb1cf9b255e5a02096a63960',	'82c7b37fc8ddd606969909bdbe779adc',	0,	0,	0,	0,	'',	0,	'2021-09-11 18:26:58'),
('a carol ama o fabiano',	'sim ela ama o fabiano e ela quer sentar nele',	'0',	'0',	'0',	'pt',	0,	0,	'0',	1,	2,	'android',	4,	'ffffff',	'',	'',	'b84d1e32da66b71023fd93b5dfc26b1e',	'42186a1cfd7fd925f212f36c0f8f7fbc',	0,	0,	0,	0,	'',	0,	'2021-09-11 18:28:07'),
('lets have sex',	'oka-',	'0',	'0',	'0',	'en',	0,	0,	'0',	1,	2,	'android',	3,	'ffffff',	'',	'',	'efd52ceeccd6062e5924227489669951',	'efb1f761328b9bfb0ffe481507ba836b',	0,	0,	0,	0,	'',	0,	'2021-09-11 18:42:35'),
('a carol e lesbica',	'a carol é sim, por que ela ja lanbeu a minha bucetinha',	'0',	'0',	'0',	'pt',	0,	0,	'0',	1,	2,	'android',	3,	'ffffff',	'',	'',	'fd295ce02297ec167eb2a84e5c6b69ea',	'42186a1cfd7fd925f212f36c0f8f7fbc',	0,	0,	0,	0,	'',	0,	'2021-09-11 18:42:57'),
('lets have sex',	'oka-',	'0',	'0',	'0',	'en',	0,	0,	'0',	1,	2,	'android',	3,	'ffffff',	'',	'',	'a39a16167d2e30650cd15470b5a875f6',	'efb1f761328b9bfb0ffe481507ba836b',	0,	0,	0,	0,	'',	0,	'2021-09-11 18:43:27'),
('eu deixo',	'a carol ta molhadinha e de bucetinha dura',	'0',	'0',	'0',	'pt',	0,	0,	'0',	1,	2,	'android',	3,	'ffffff',	'',	'',	'52db4a150943f1d06f7f125766c8289b',	'42186a1cfd7fd925f212f36c0f8f7fbc',	0,	0,	0,	0,	'',	0,	'2021-09-11 18:45:28'),
('семпай',	'нет',	'0',	'0',	'0',	'ru',	0,	0,	'0',	1,	2,	'android',	3,	'ffffff',	'',	'',	'04057fd244cee8e9a116f681d177ddc2',	'375780a71a26489cbd0a8d99329646bf',	0,	0,	0,	0,	'',	0,	'2021-09-11 18:51:22'),
('我要操你小逼',	'求你操死我爸爸好爸爸快操我',	'0',	'0',	'0',	'zh',	0,	5,	'',	1,	2,	'android',	0,	'#FFFFFF',	'',	'',	'70a0e5f87fd209eb12c3db335f18d833',	'254ea217deab750b33fe8e5c79c565d5',	1,	0,	0,	0,	'',	0,	NULL),
('Oi o Maurício já me traiu',	'sim ele ja comeu suas irma pego alvorada toda',	'0',	'0',	'0',	'pt',	0,	0,	'0',	1,	2,	'android',	3,	'ffffff',	'',	'',	'2f39e9be06fc0b68efca5dd9a8f53142',	'03c4b1f803a31b5ef6429274ab9c34b1',	0,	0,	0,	0,	'',	0,	'2021-09-11 18:54:40'),
('o Maurício me trai',	'sim comeu suas irmas',	'0',	'0',	'0',	'pt',	0,	0,	'0',	1,	2,	'android',	3,	'ffffff',	'',	'',	'f710a128f0668a27bbc126a81f0a82d2',	'03c4b1f803a31b5ef6429274ab9c34b1',	0,	0,	0,	0,	'',	0,	'2021-09-11 18:55:50'),
('Füße',	'Du stehst auf meine geilen Füße Oder? Du würdest mir doch jetzt am liebsten die Schuhe und Strümpfe ausziehen weil du mir meine geilen nackten Füße küssen willst, mir meine traumhaft zarten und schön ',	'0',	'0',	'0',	'de',	0,	0,	'0',	1,	2,	'android',	4,	'ffffff',	'',	'',	'2382fb5397bce1fab4f5d4543d9a32b2',	'8e98f2b37af808c21c623efe51e6b053',	0,	0,	0,	0,	'',	0,	'2021-09-11 18:58:28'),
('fuck me',	'starts fucking you really hard',	'0',	'0',	'1',	'en',	0,	0,	'0',	0,	2,	'android',	4,	'ffffff',	'',	'',	'84b314ac95c3812e87349cabb5779ff7',	'4076051d83170801ac9874a891f4a9ee',	0,	0,	0,	0,	'',	0,	'2021-09-11 19:25:43');

-- 2021-09-11 19:43:27
