-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_field_en`;
CREATE TABLE `app_my_girl_field_en` (
  `id_chat` varchar(11) NOT NULL,
  `type_chat` varchar(5) NOT NULL,
  `data` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `option` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_field_en`;
INSERT INTO `app_my_girl_field_en` (`id_chat`, `type_chat`, `data`, `type`, `author`, `option`) VALUES
('232',	'msg',	'[[\"23946\",\"en\",\"show_chat\",\"Merry Christmas, Baby - Charles Brown\"],[\"23325\",\"en\",\"show_chat\",\"White Christmas - Richard Marx\"],[\"23310\",\"en\",\"show_chat\",\"Christmas Spirit - Richard Marx\"],[\"23228\",\"en\",\"show_chat\",\"All I Want For Christmas Is You - Mariah Carey\"],[\"23232\",\"en\",\"show_chat\",\"We Wish You A Merry Christmas - Ashanti\"]]',	'field_chat',	'unclear',	'0'),
('233',	'msg',	'[[\"23946\",\"en\",\"show_chat\",\"Merry Christmas, Baby - Charles Brown\",\"000000\"],[\"23325\",\"en\",\"show_chat\",\"White Christmas - Richard Marx\",\"000000\"],[\"23310\",\"en\",\"show_chat\",\"Christmas Spirit - Richard Marx\",\"000000\"],[\"23228\",\"en\",\"show_chat\",\"All I Want For Christmas Is You - Mariah Carey\",\"000000\"],[\"23232\",\"en\",\"show_chat\",\"We Wish You A Merry Christmas - Ashanti\",\"000000\"]]',	'field_chat',	'unclear',	'0'),
('24627',	'chat',	'[[\"6324\",\"en\",\"show_chat\",\"Open music\",\"000000\"],[\"15268\",\"en\",\"show_chat\",\"Open radio\",\"000000\"],[\"23837\",\"en\",\"show_chat\",\"Open Skype\",\"000000\"],[\"23828\",\"en\",\"show_chat\",\"Open calendar\",\"000000\"],[\"23832\",\"en\",\"show_chat\",\"Open reminder\",\"000000\"],[\"15268\",\"en\",\"show_chat\",\"Open radio\",\"000000\"],[\"23896\",\"en\",\"show_chat\",\"Open Cake Browser\",\"000000\"],[\"49\",\"en\",\"show_chat\",\"Open facebook\",\"000000\"],[\"23885\",\"en\",\"show_chat\",\"Open twitter\",\"000000\"]]',	'field_chat',	'unclear',	'0'),
('24628',	'chat',	'[[\"6326\",\"en\",\"show_chat\",\"Open music\",\"000000\"],[\"2239\",\"en\",\"show_chat\",\"Open facebook\",\"000000\"]]',	'field_chat',	'unclear',	'1');

-- 2020-10-25 12:31:24
