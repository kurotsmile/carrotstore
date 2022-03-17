-- Adminer 4.8.1 MySQL 5.7.37 dump

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
(24,	'c1',	'andanh@gmail.com',	'Please send me an add on that will allow me to remove my girls clothing i would really like that and send a fix for the english text thank you',	121,	'2018-11-03T03:32:26.963Z',	1,	0,	'products',	'en'),
(28,	'c1',	'andanh@gmail.com',	'Cần thêm vào báo thức nữa thì tuyệt',	119,	'2019-08-03T17:36:41.314Z',	1,	0,	'products',	'vi'),
(29,	'c3',	'andanh@gmail.com',	'Ad thêm vào báo thức nữa thì tuyệt cảm ơn nhà làm ra game này',	120,	'2019-08-03T17:42:17.194Z',	1,	0,	'products',	'vi'),
(30,	'c4',	'2d0cf55bdd8a4848131c04524cd7bb6e',	'he he',	120,	'2019-08-06T17:36:46.195Z',	1,	0,	'products',	'vi'),
(31,	'c2',	'andanh@gmail.com',	'Does not Download',	119,	'2019-08-14T10:21:32.393Z',	1,	0,	'products',	'en'),
(32,	'c5',	'113330601155622987105',	'Mọi người vẫn còn sử dụng người yêu ảo chứ?',	120,	'2020-01-13T18:53:52.631Z',	1,	0,	'products',	'vi'),
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
(43,	'c2',	'andanh@gmail.com',	'gggggg\n',	283,	'2021-12-08T04:31:44.018Z',	1,	0,	'products',	'en');

-- 2022-03-17 14:51:11
