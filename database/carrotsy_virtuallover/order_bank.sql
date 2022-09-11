-- Adminer 4.8.1 MySQL 5.7.39 dump

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

INSERT INTO `order_bank` (`bank_code`, `bank_name`) VALUES
('acb',	'ACB: Ngân hàng TMCP Á Châu'),
('OCB',	'Ngân hàng TMCP Phương Đông');

-- 2022-08-20 02:50:01
