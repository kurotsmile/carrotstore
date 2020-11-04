-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_log_month`;
CREATE TABLE `app_my_girl_log_month` (
  `month` date NOT NULL,
  `data` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_log_month`;
INSERT INTO `app_my_girl_log_month` (`month`, `data`) VALUES
('2019-06-01',	'5117168'),
('2019-07-01',	'5833912'),
('2019-08-01',	'10773375'),
('2019-09-01',	'14618294'),
('2019-10-01',	'3014393'),
('2019-11-01',	'3389250'),
('2019-12-01',	'3751438'),
('2020-01-01',	'4527621'),
('2020-02-01',	'3861313'),
('2020-03-01',	'3804667'),
('2020-04-01',	'4516420'),
('2020-05-01',	'5203270'),
('2020-06-01',	'5552167'),
('2020-07-01',	'5957485'),
('2020-08-01',	'6075370'),
('2020-09-01',	'6218622'),
('2020-10-01',	'4433128');

-- 2020-10-25 11:55:22
