-- Adminer 4.8.1 MySQL 5.5.5-10.4.17-MariaDB dump

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
('60ea8449d22cb60ea8449d22cd',	'com.carrotstore.wormmaster.removeads',	'e0262350a05e63cad39a4c8f08cde9dfb46adf00',	'en',	'Thien thanh',	'kurotsmile@gmail.com',	'2021-07-11 12:40:25',	1,	0),
('60ea847a64f0860ea847a64f0b',	'com.carrotstore.wormmaster.musicbk',	'e0262350a05e63cad39a4c8f08cde9dfb46adf00',	'en',	'Thien thanh',	'kurotsmile@gmail.com',	'2021-07-11 12:41:14',	1,	0);

-- 2021-07-11 07:38:43
