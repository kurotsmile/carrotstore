-- Adminer 4.8.1 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `acc_report`;
CREATE TABLE `acc_report` (
  `id_device` varchar(100) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `txt` text NOT NULL,
  `type` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

TRUNCATE `acc_report`;
INSERT INTO `acc_report` (`id_device`, `lang`, `txt`, `type`) VALUES
('f9068e5199fecaf64715391d940a63e6',	'vi',	'',	'1'),
('7ad85840bb0bdf391c450e91bf4c045a',	'th',	'',	'0'),
('6a1799645d76bbab3d30c994d8a48e08',	'vi',	'',	'1'),
('79322fd644671950164a254d6d51d01e',	'pt',	'',	'1'),
('79322fd644671950164a254d6d51d01e',	'pt',	'',	'1'),
('79322fd644671950164a254d6d51d01e',	'pt',	'',	'1'),
('79322fd644671950164a254d6d51d01e',	'pt',	'',	'1'),
('79322fd644671950164a254d6d51d01e',	'pt',	'',	'0'),
('09e23466273c02e4f859527ff91243c8',	'es',	'',	'0'),
('09e23466273c02e4f859527ff91243c8',	'es',	'Robo de identidad, imagen inapropiada!!!',	'2'),
('09e23466273c02e4f859527ff91243c8',	'es',	'',	'1'),
('09e23466273c02e4f859527ff91243c8',	'es',	'',	'0'),
('09e23466273c02e4f859527ff91243c8',	'es',	'',	'0'),
('09e23466273c02e4f859527ff91243c8',	'es',	'',	'1'),
('09e23466273c02e4f859527ff91243c8',	'es',	'',	'0'),
('09e23466273c02e4f859527ff91243c8',	'es',	'',	'1'),
('eb60c5c3da2404121a3e8d68434fecc0',	'th',	'',	'1'),
('6e707b6b821f052bfcea9715b965ec2c',	'vi',	'',	'1'),
('6e707b6b821f052bfcea9715b965ec2c',	'vi',	'đây là số điệnn thoại của tôi nhưng tôi không hề tạo tài khoản này',	'2'),
('2cc4e86f4c54339c7ec18adcc068cb10',	'pt',	'',	'2'),
('c934d2b6d03bc3e8ec59ae723a5f57a4',	'en',	'',	'0'),
('76ce23e568dc2d3e8b6a6292303ab679',	'en',	'',	'0'),
('c9ed04cd4f207a28b03c0bfc3634b398',	'en',	'',	'0');

-- 2021-07-12 14:44:14
