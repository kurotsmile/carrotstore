-- Adminer 4.7.7 MySQL dump

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
(23,	'c1',	'andanh@gmail.com',	'Nên phát triển app này trên PC nữa thì tốt quá,tim để tải trên laptop cảm ứng win 10 mà không có,nếu có cách nào dowload được mong ad giúp đỡ ',	120,	'2018-09-19T04:05:10.934Z',	0,	0,	'products',	'vi'),
(24,	'c1',	'andanh@gmail.com',	'Please send me an add on that will allow me to remove my girls clothing i would really like that and send a fix for the english text thank you',	121,	'2018-11-03T03:32:26.963Z',	0,	0,	'products',	'en'),
(28,	'c1',	'andanh@gmail.com',	'Cần thêm vào báo thức nữa thì tuyệt',	119,	'2019-08-03T17:36:41.314Z',	0,	0,	'products',	'vi'),
(29,	'c3',	'andanh@gmail.com',	'Ad thêm vào báo thức nữa thì tuyệt cảm ơn nhà làm ra game này',	120,	'2019-08-03T17:42:17.194Z',	1,	0,	'products',	'vi'),
(30,	'c4',	'2d0cf55bdd8a4848131c04524cd7bb6e',	'he he',	120,	'2019-08-06T17:36:46.195Z',	0,	0,	'products',	'vi'),
(31,	'c2',	'andanh@gmail.com',	'Does not Download',	119,	'2019-08-14T10:21:32.393Z',	0,	0,	'products',	'en'),
(32,	'c5',	'113330601155622987105',	'Mọi người vẫn còn sử dụng người yêu ảo chứ?',	120,	'2020-01-13T18:53:52.631Z',	0,	0,	'products',	'vi');

-- 2020-10-05 11:32:45
