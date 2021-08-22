-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_brain`;
CREATE TABLE `app_my_girl_brain` (
  `question` varchar(200) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `status` varchar(1) NOT NULL,
  `effect` varchar(1) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `langs` varchar(2) NOT NULL,
  `face` int(2) NOT NULL DEFAULT '0',
  `action` int(2) NOT NULL DEFAULT '0',
  `author` varchar(30) NOT NULL,
  `character_sex` int(1) NOT NULL,
  `version` int(1) NOT NULL,
  `os` varchar(20) NOT NULL,
  `limit_chat` int(1) NOT NULL DEFAULT '0',
  `color_chat` varchar(10) NOT NULL,
  `id_question` varchar(20) NOT NULL,
  `type_question` varchar(20) NOT NULL,
  `md5` varchar(50) NOT NULL,
  `id_device` varchar(50) NOT NULL,
  `criterion` int(1) NOT NULL DEFAULT '0',
  `approved` int(1) NOT NULL DEFAULT '0',
  `tick` int(1) NOT NULL DEFAULT '0',
  `user_work_id` int(3) NOT NULL,
  `links` text CHARACTER SET ucs2 NOT NULL,
  `ping_father` int(1) NOT NULL,
  `date_pub` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_brain`;
INSERT INTO `app_my_girl_brain` (`question`, `answer`, `status`, `effect`, `sex`, `langs`, `face`, `action`, `author`, `character_sex`, `version`, `os`, `limit_chat`, `color_chat`, `id_question`, `type_question`, `md5`, `id_device`, `criterion`, `approved`, `tick`, `user_work_id`, `links`, `ping_father`, `date_pub`) VALUES
('気分は？',	'もうぬれぬれ',	'0',	'0',	'0',	'ja',	0,	0,	'0',	1,	2,	'android',	4,	'ffffff',	'',	'',	'97ecfa9afec9d0d2fd0571defbf24260',	'a2218a6d26516888bac43002a364b19f',	0,	0,	0,	0,	'',	0,	'2021-08-19 11:32:58');

-- 2021-08-19 11:34:18
