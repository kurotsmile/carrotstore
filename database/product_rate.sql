-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_rate`;
CREATE TABLE `product_rate` (
  `product` int(15) NOT NULL,
  `user` varchar(225) NOT NULL,
  `rate` int(1) NOT NULL,
  `lang` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `product_rate`;
INSERT INTO `product_rate` (`product`, `user`, `rate`, `lang`) VALUES
(22,	'kurotsmile@gmail.com',	5,	'vi'),
(22,	'thuton92@gmail.com',	5,	'vi'),
(29,	'kurotsmile@gmail.com',	2,	'vi'),
(81,	'kurotsmile@gmail.com',	3,	'vi'),
(20,	'kurotsmile@gmail.com',	3,	'vi'),
(81,	'thuton92@gmail.com',	3,	'vi'),
(62,	'kurotsmile@gmail.com',	3,	'vi'),
(63,	'14.185.47.233',	5,	'vi'),
(22,	'14.185.47.233',	1,	'vi'),
(81,	'14.185.47.233',	2,	'vi'),
(20,	'116.99.65.22',	3,	'vi'),
(20,	'thuton92@gmail.com',	5,	'vi'),
(61,	'thuton92@gmail.com',	2,	'vi'),
(61,	'phantranduyuyen1@gmail.com',	3,	'vi'),
(82,	'14.185.40.67',	4,	'vi'),
(26,	'kurotsmile@gmail.com',	3,	'vi'),
(60,	'kurotsmile@gmail.com',	3,	'vi'),
(90,	'andanh@gmail.com',	3,	'vi'),
(49,	'108.163.233.91',	5,	'vi'),
(88,	'kurotsmile@gmail.com',	2,	'vi'),
(23,	'14.185.42.142',	5,	'vi'),
(59,	'14.176.232.235',	4,	'vi'),
(104,	'14.167.93.9',	4,	'vi'),
(96,	'14.185.43.115',	3,	'vi'),
(21,	'14.185.43.115',	1,	'vi'),
(98,	'14.185.43.115',	3,	'vi'),
(105,	'14.185.43.115',	5,	'vi'),
(107,	'kurotsmile@gmail.com',	3,	'vi'),
(104,	'14.176.3.17',	5,	'vi'),
(83,	'113.181.3.48',	3,	'vi'),
(120,	'103.199.37.22',	5,	'vi'),
(120,	'73.149.227.115',	4,	'vi'),
(119,	'177.237.143.198',	5,	'vi'),
(120,	'14.243.27.35',	5,	'vi'),
(59,	'1.52.110.172',	5,	'vi'),
(120,	'95.213.218.184',	5,	'vi'),
(128,	'14.250.35.121',	4,	'vi'),
(122,	'14.250.35.121',	3,	'vi'),
(121,	'132.157.131.147',	5,	'vi'),
(127,	'14.254.16.22',	5,	'vi'),
(119,	'134.196.41.124',	4,	'vi'),
(119,	'171.253.33.252',	5,	'vi'),
(104,	'171.250.126.30',	4,	'vi'),
(119,	'37.173.235.164',	1,	'vi'),
(119,	'27.67.184.212',	5,	'vi'),
(119,	'71.13.226.153',	5,	'vi'),
(119,	'83.61.22.125',	5,	'vi'),
(119,	'115.74.163.236',	5,	'vi'),
(130,	'14.185.12.229',	5,	'vi'),
(131,	'14.185.12.229',	5,	'vi'),
(123,	'14.185.12.229',	4,	'vi'),
(132,	'14.191.106.119',	4,	'vi'),
(123,	'14.191.106.180',	4,	'vi'),
(120,	'24.212.32.45',	5,	'vi'),
(130,	'113.176.185.28',	4,	'vi'),
(120,	'14.166.160.60',	5,	'vi'),
(131,	'167.98.191.114',	5,	'vi'),
(123,	'2',	3,	'vi'),
(123,	'289212078726592',	2,	'vi');

-- 2020-10-05 15:01:57
