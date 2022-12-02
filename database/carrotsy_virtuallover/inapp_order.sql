-- Adminer 4.8.1 MySQL 5.7.40 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `inapp_order`;
CREATE TABLE `inapp_order` (
  `id` varchar(100) NOT NULL,
  `inapp_id` varchar(60) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `pay_name` varchar(50) NOT NULL,
  `pay_mail` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `is_get` int(1) NOT NULL,
  `is_login` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `inapp_order`;
INSERT INTO `inapp_order` (`id`, `inapp_id`, `user_id`, `lang`, `pay_name`, `pay_mail`, `date`, `is_get`, `is_login`) VALUES
('60fc24291151360fc24291154f',	'com.carrot.runwithme.removeads',	'e0262350a05e63cad39a4c8f08cde9dfb46adf00',	'vi',	'Thien thanh',	'kurotsmile@gmail.com',	'2021-07-24 14:31:05',	1,	0),
('60fdea1c9a26460fdea1c9a2a4',	'com.carrotstore.jigsawwall.removeads',	'3a07c3f746e05fa723942abf9c6fa941',	'en',	'Thien thanh',	'kurotsmile@gmail.com',	'2021-07-25 22:47:56',	1,	0),
('610bf14e92a9e610bf14e92ae3',	'com.carrotstore.ailover.ads',	'e0262350a05e63cad39a4c8f08cde9dfb46adf00',	'en',	'Thien thanh',	'kurotsmile@gmail.com',	'2021-08-05 14:10:22',	1,	0),
('610bf17104b7e610bf17104bba',	'com.carrotstore.ailover.all',	'e0262350a05e63cad39a4c8f08cde9dfb46adf00',	'en',	'Thien thanh',	'kurotsmile@gmail.com',	'2021-08-05 14:10:57',	1,	0),
('61139f4d1e86661139f4d1e8a4',	'com.carrotstore.ailover.costumes',	'e0262350a05e63cad39a4c8f08cde9dfb46adf00',	'vi',	'Thien thanh',	'kurotsmile@gmail.com',	'2021-08-11 09:58:37',	1,	0),
('61139f7b5dec661139f7b5df04',	'com.carrotstore.ailover.costumes',	'e0262350a05e63cad39a4c8f08cde9dfb46adf00',	'vi',	'Thien thanh',	'kurotsmile@gmail.com',	'2021-08-11 09:59:23',	1,	0),
('61142b815d4ba61142b815d4f7',	'com.carrotstore.ailover.costumes',	'e0262350a05e63cad39a4c8f08cde9dfb46adf00',	'vi',	'Thien thanh',	'kurotsmile@gmail.com',	'2021-08-11 19:56:49',	1,	0),
('61ce79513ed4c61ce79513ed89',	'com.carrotstore.jsoneditor.removeads',	'730a8bef7874ba6f7b72baf5491f0eb390616970',	'en',	'Thien thanh',	'kurotsmile@gmail.com',	'2021-12-31 03:30:25',	1,	0),
('6214616a28f186214616a28f55',	'com.carrotstore.midipiano.buylist',	'27f206664e37c65879bd0eb2cff1e5f5',	'en',	'Kaitlin',	'lenowrykaitlin@gmail.com',	'2022-02-22 04:07:06',	0,	0),
('62a2b11810a9b62a2b11810ad8',	'com.carrotstore.midipiano.buylist',	'182a60c744d116d48f811189b54f32fd',	'en',	'Kieon',	'krisazero@gmail.com',	'2022-06-10 02:48:56',	1,	0),
('62c059bf3542762c059bf3546a',	'com.carrotstore.midipiano.removeads',	'030098340300fac10800e56b0500db0a0500486d050097720500a3780500018a0500269b0500d7a9050011db060001000100',	'en',	'Dahlia',	'simonemarteen@gmail.com',	'2022-07-02 14:44:15',	0,	0),
('62c05a0aa4c4962c05a0aa4c8c',	'com.carrotstore.midipiano.buylist',	'030098340300fac10800e56b0500db0a0500486d050097720500a3780500018a0500269b0500d7a9050011db060001000100',	'en',	'Dahlia',	'simonemarteen@gmail.com',	'2022-07-02 14:45:30',	0,	0),
('63047e0b9c19963047e0b9c1d6',	'com.carrotstore.midipiano.buylist',	'c98a993742129cbbe85c228a0863ad7a',	'zh',	'東興',	'tsa.i8324@msa.hinet.net',	'2022-08-23 07:13:15',	1,	0);

-- 2022-10-26 17:58:50
