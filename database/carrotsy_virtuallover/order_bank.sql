-- Adminer 4.8.1 MySQL 5.7.36 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `order_bank`;
CREATE TABLE `order_bank` (
  `bank_code` varchar(5) NOT NULL,
  `bank_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `order_bank`;
INSERT INTO `order_bank` (`bank_code`, `bank_name`) VALUES
('acb',	'ACB: Ngân hàng TMCP Á Châu'),
('OCB',	'Ngân hàng TMCP Phương Đông');

-- 2021-11-29 11:10:52
