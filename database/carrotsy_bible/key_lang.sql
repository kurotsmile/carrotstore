-- Adminer 4.8.1 MySQL 5.5.5-10.4.17-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `key_lang`;
CREATE TABLE `key_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_key` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `key_lang`;
INSERT INTO `key_lang` (`id`, `name_key`) VALUES
(1,	'select_book'),
(3,	'book_2'),
(4,	'book_1'),
(5,	'app_title'),
(6,	'search'),
(7,	'search_tip'),
(8,	'close'),
(9,	'done'),
(10,	'inp_tip'),
(11,	'quote_of_day'),
(12,	'chapter'),
(13,	'speech'),
(14,	'back'),
(15,	'exit_msg'),
(16,	'app_other'),
(17,	'rate_app'),
(18,	'share_app'),
(19,	'remove_ads'),
(20,	'buy_failed'),
(21,	'setting_restore'),
(22,	'restore_null'),
(23,	'restore_failed'),
(24,	'buy_success'),
(25,	'restore_success'),
(26,	'show_quote'),
(27,	'book_offline'),
(28,	'book_offline_none'),
(29,	'save_book'),
(30,	'save_book_success'),
(31,	'setting'),
(32,	'remove_ads_tip'),
(33,	'setting_restore_tip'),
(35,	'delete_all_data_tip'),
(37,	'offline_title');

-- 2021-05-31 10:06:13
