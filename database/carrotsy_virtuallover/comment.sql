-- Adminer 4.8.1 MySQL 5.7.40 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `id_c` varchar(225) CHARACTER SET utf8 NOT NULL,
  `username` varchar(225) CHARACTER SET utf8 NOT NULL,
  `comment` varchar(225) CHARACTER SET utf8 NOT NULL,
  `productid` int(11) NOT NULL,
  `created` varchar(150) CHARACTER SET utf8 NOT NULL,
  `upvote_count` int(225) NOT NULL,
  `parent` int(225) NOT NULL,
  `type_comment` varchar(30) NOT NULL,
  `lang` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `comment`;
INSERT INTO `comment` (`id`, `id_c`, `username`, `comment`, `productid`, `created`, `upvote_count`, `parent`, `type_comment`, `lang`) VALUES
(23,	'c1',	'andanh@gmail.com',	'Nên phát triển app này trên PC nữa thì tốt quá,tim để tải trên laptop cảm ứng win 10 mà không có,nếu có cách nào dowload được mong ad giúp đỡ ',	120,	'2018-09-19T04:05:10.934Z',	1,	0,	'products',	'vi'),
(24,	'c1',	'andanh@gmail.com',	'Please send me an add on that will allow me to remove my girls clothing i would really like that and send a fix for the english text thank you',	121,	'2018-11-03T03:32:26.963Z',	2,	0,	'products',	'en'),
(28,	'c1',	'andanh@gmail.com',	'Cần thêm vào báo thức nữa thì tuyệt',	119,	'2019-08-03T17:36:41.314Z',	1,	0,	'products',	'vi'),
(29,	'c3',	'andanh@gmail.com',	'Ad thêm vào báo thức nữa thì tuyệt cảm ơn nhà làm ra game này',	120,	'2019-08-03T17:42:17.194Z',	1,	0,	'products',	'vi'),
(30,	'c4',	'2d0cf55bdd8a4848131c04524cd7bb6e',	'he he',	120,	'2019-08-06T17:36:46.195Z',	1,	0,	'products',	'vi'),
(31,	'c2',	'andanh@gmail.com',	'Does not Download',	119,	'2019-08-14T10:21:32.393Z',	1,	0,	'products',	'en'),
(32,	'c5',	'113330601155622987105',	'Mọi người vẫn còn sử dụng người yêu ảo chứ?',	120,	'2020-01-13T18:53:52.631Z',	2,	0,	'products',	'vi'),
(33,	'c1',	'andanh@gmail.com',	'rip king von\n',	123,	'2020-11-13T20:50:00.585Z',	1,	0,	'products',	'en'),
(34,	'c2',	'andanh@gmail.com',	'r.i.p king von\n',	123,	'2020-11-16T04:55:23.105Z',	1,	0,	'products',	'en'),
(35,	'c1',	'andanh@gmail.com',	'공포노래를만들수잇다\n',	283,	'2021-09-11T14:43:22.308Z',	1,	0,	'products',	'ko'),
(36,	'c1',	'andanh@gmail.com',	'I have no idea what this app is trying to do.',	283,	'2021-10-02T13:16:27.223Z',	1,	0,	'products',	'en'),
(37,	'c1',	'andanh@gmail.com',	'sdf',	121,	'2021-11-18T12:34:53.662Z',	1,	0,	'products',	'es'),
(38,	'c2',	'andanh@gmail.com',	'Mierda',	121,	'2021-11-18T12:34:57.668Z',	1,	0,	'products',	'es'),
(39,	'c3',	'andanh@gmail.com',	'拉屎',	121,	'2021-11-18T12:35:15.307Z',	1,	0,	'products',	'es'),
(40,	'c4',	'andanh@gmail.com',	'nooo',	121,	'2021-11-18T12:35:24.227Z',	1,	0,	'products',	'es'),
(41,	'c1',	'andanh@gmail.com',	'Wanna talk',	131,	'2021-11-19T13:29:33.575Z',	1,	0,	'products',	'en'),
(42,	'c1',	'andanh@gmail.com',	'this amazing totally not a scam',	136,	'2021-12-07T16:13:15.941Z',	1,	0,	'products',	'en'),
(43,	'c2',	'andanh@gmail.com',	'gggggg\n',	283,	'2021-12-08T04:31:44.018Z',	1,	0,	'products',	'en'),
(44,	'c6237b9a2b766e',	'bfbb36180aba654f3665964a5872300f',	'tốt',	282,	'2022-03-20 23:32:50',	0,	0,	'products',	'vi'),
(45,	'c62454179ca925',	'b3ee82bafceb3b5fc20824146b44ff2a',	'tuyệt vời',	282,	'2022-03-31 05:51:53',	0,	0,	'products',	'vi'),
(46,	'c6249e78a786ea',	'bfbb36180aba654f3665964a5872300f',	'good',	130,	'2022-04-03 18:29:30',	0,	0,	'products',	'vi'),
(47,	'c624c97d949d57',	'b3ee82bafceb3b5fc20824146b44ff2a',	'trò chuyện rất vui',	130,	'2022-04-05 19:26:17',	0,	0,	'products',	'vi'),
(48,	'c626720fb57f2a',	'765c7e72ca1d45c984913bda56922994',	'bonita',	131,	'2022-04-25 22:30:19',	0,	0,	'products',	'es'),
(49,	'c6273ff5b75c4e',	'c412aaed0c9c80f333d2745d478ec5a2',	'es es buena la app',	131,	'2022-05-05 16:46:19',	0,	0,	'products',	'es'),
(50,	'c1',	'andanh@gmail.com',	'This app is a very good app.',	120,	'2022-05-09T08:04:09.210Z',	0,	0,	'products',	'en'),
(51,	'c627f1f0ebf0cb',	'dfed20c27df536ff860c77146cf43b33',	'one of my microphones works the other record in a different language so various communication problems',	130,	'2022-05-14 03:16:30',	1,	0,	'products',	'en'),
(52,	'c5',	'andanh@gmail.com',	'cập nhật phiên bản mới đi\n',	120,	'2022-05-18T06:12:25.830Z',	0,	0,	'products',	'vi'),
(53,	'c2',	'5ea856e920bd55ea856e920c10',	'This problem has been fixed, please update to the new version with many new functions',	130,	'2022-05-28T03:21:23.234Z',	0,	51,	'products',	'en'),
(54,	'c62964bd239c90',	'58f4c929c9eb6ac2a608c1c7450a9934',	'God is love',	130,	'2022-05-31 17:09:38',	0,	0,	'products',	'en'),
(55,	'c1',	'andanh@gmail.com',	'Ratas',	104,	'2022-06-10T18:08:24.503Z',	0,	0,	'products',	'en'),
(56,	'c1',	'andanh@gmail.com',	'bbghkhl6ynhhhbbnnoky6kheklhklkhk67lgggykhfkhynhthohyhtyynjlyylyjo',	716,	'2022-06-14T07:55:33.210Z',	0,	0,	'products',	'vi'),
(57,	'c62b7f35d4c525',	'e8eca36b50d173f6db8bc4a400f0655e',	'',	130,	'2022-06-26 05:49:17',	0,	0,	'products',	'vi'),
(58,	'c62be764998e97',	'f0e3fe05614fcf943a9641a9d5e9d06f',	'khá là vui nha ad mong ad cho ra nhiều bản mới',	130,	'2022-07-01 04:21:29',	0,	0,	'products',	'vi'),
(59,	'c62dcc8cde2ab1',	'9deea2ce5bbdedfc91c0bb03c33ce37d',	'i cant access all characters even though ive paid for them....it keeps saying...you own this then ERROR.',	130,	'2022-07-24 04:21:33',	0,	0,	'products',	'en'),
(60,	'c6',	'andanh@gmail.com',	'Game cho tính năng chịch nhau với bú cu đi đảm bảo 5 Sao\n',	120,	'2022-07-27T11:56:59.703Z',	1,	0,	'products',	'vi'),
(61,	'c7',	'andanh@gmail.com',	'Nice ',	120,	'2022-08-14T14:46:54.776Z',	0,	0,	'products',	'vi'),
(62,	'c62fb2b5e6457b',	'45adeb93623abe471be8878621f0647a',	'muy buena app me dijo una verdad pero es cierta jajaja me agrada. ',	130,	'2022-08-16 05:30:06',	0,	0,	'products',	'es'),
(63,	'c2',	'andanh@gmail.com',	'Too much repetition in chats. Character can not speak what you teach her to say.',	120,	'2022-08-25T22:32:10.978Z',	0,	0,	'products',	'en'),
(64,	'c2',	'andanh@gmail.com',	'just play ai lover creep its rated m and not teen',	121,	'2022-08-26T18:31:53.248Z',	0,	0,	'products',	'en'),
(65,	'c3',	'andanh@gmail.com',	'just play ai lover',	121,	'2022-08-26T18:32:24.518Z',	0,	24,	'products',	'en'),
(66,	'c630e99f2da76a',	'24d4e72a7e1294c376028d705be47d39',	'tôi cảm thấy bất cô đơn hơn có người trò chuyện với tôi ',	130,	'2022-08-30 23:14:58',	0,	0,	'products',	'vi'),
(67,	'c63216e59cb6c0',	'7f6c4be32628df6ee22229e10a42b6f5',	'And kids will love this, it\'s the best.',	130,	'2022-09-14 06:02:01',	0,	0,	'products',	'en'),
(68,	'c2',	'andanh@gmail.com',	'vbb',	104,	'2022-10-06T20:45:19.372Z',	0,	55,	'products',	'en'),
(69,	'c634077de7e915',	'dd8fde29d7f5de74ccafdf33a9e4e234',	'aunque le falta afinar algunos detalles y permitir que uno ingrese su propia lista de música: aún así le doy 5 estrellas ',	130,	'2022-10-07 19:02:54',	0,	0,	'products',	'es'),
(70,	'c63466d1e54f9a',	'bfbb36180aba654f3665964a5872300f',	'hay',	283,	'2022-10-12 07:30:38',	0,	0,	'products',	'vi'),
(71,	'c1',	'634e5053e174a634e5053e1785',	'Stehen vs. Sitzen bei der Arbeit?\n\nIst Stehen besser als Sitzen? Aber Sie müssen überwachen, wie viel Sie den ganzen Tag über stehen. Die Verwendung eines höhenverstellbarer schreibtisch bei der Arbeit kann helfen, Muskelschm',	282,	'2022-10-18T07:11:24.427Z',	0,	0,	'products',	'en'),
(72,	'c6352cd3403c58',	'b3ee82bafceb3b5fc20824146b44ff2a',	'game vui nhộn',	759,	'2022-10-21 16:47:48',	0,	0,	'products',	'en');

-- 2022-10-23 06:14:52
