-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_storage`;
CREATE TABLE `app_my_girl_storage` (
  `id` varchar(11) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `type` varchar(10) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_storage`;
INSERT INTO `app_my_girl_storage` (`id`, `lang`, `type`, `category`) VALUES
('58761',	'vi',	'chat',	'update'),
('57669',	'vi',	'chat',	'update'),
('223',	'vi',	'msg',	'holiday'),
('24627',	'en',	'chat',	'update'),
('58936',	'vi',	'chat',	''),
('24628',	'en',	'chat',	''),
('50060',	'es',	'chat',	'update'),
('494',	'vi',	'msg',	''),
('253',	'vi',	'msg',	''),
('254',	'vi',	'msg',	''),
('54514',	'vi',	'chat',	''),
('54701',	'vi',	'chat',	''),
('22702',	'en',	'chat',	''),
('22723',	'en',	'chat',	''),
('237',	'hi',	'chat',	''),
('271',	'th',	'chat',	''),
('3732',	'zh',	'chat',	''),
('598',	'vi',	'msg',	''),
('596',	'vi',	'msg',	''),
('599',	'vi',	'msg',	''),
('597',	'vi',	'msg',	''),
('606',	'vi',	'msg',	'holiday'),
('605',	'vi',	'msg',	'holiday'),
('604',	'vi',	'msg',	'holiday'),
('607',	'vi',	'msg',	'holiday'),
('608',	'vi',	'msg',	'holiday'),
('196',	'vi',	'msg',	'holiday'),
('488',	'vi',	'msg',	'holiday'),
('376',	'vi',	'msg',	'holiday'),
('276',	'vi',	'msg',	'holiday'),
('275',	'vi',	'msg',	'holiday'),
('369',	'vi',	'msg',	'holiday'),
('380',	'vi',	'msg',	'holiday'),
('464',	'vi',	'msg',	'highlights'),
('477',	'vi',	'msg',	'highlights'),
('377',	'vi',	'msg',	'holiday'),
('378',	'vi',	'msg',	'holiday'),
('245',	'en',	'msg',	'holiday'),
('541',	'vi',	'msg',	'holiday'),
('511',	'vi',	'msg',	'holiday'),
('515',	'vi',	'msg',	'holiday'),
('523',	'vi',	'msg',	'holiday'),
('542',	'vi',	'msg',	'holiday'),
('510',	'vi',	'msg',	'holiday'),
('557',	'vi',	'msg',	'holiday'),
('549',	'vi',	'msg',	''),
('554',	'vi',	'msg',	'holiday'),
('521',	'vi',	'msg',	'holiday'),
('517',	'vi',	'msg',	'holiday'),
('513',	'vi',	'msg',	'holiday'),
('534',	'vi',	'msg',	'holiday'),
('558',	'vi',	'msg',	'holiday'),
('556',	'vi',	'msg',	'holiday'),
('550',	'vi',	'msg',	'holiday'),
('552',	'vi',	'msg',	'holiday'),
('551',	'vi',	'msg',	'holiday'),
('543',	'vi',	'msg',	'holiday'),
('519',	'vi',	'msg',	'holiday'),
('487',	'vi',	'msg',	'holiday'),
('560',	'vi',	'msg',	'holiday'),
('539',	'vi',	'msg',	'holiday'),
('516',	'vi',	'msg',	'holiday'),
('249',	'en',	'msg',	'holiday'),
('562',	'vi',	'msg',	'holiday'),
('526',	'vi',	'msg',	'holiday'),
('509',	'vi',	'msg',	'holiday'),
('482',	'vi',	'msg',	'holiday'),
('537',	'vi',	'msg',	'holiday'),
('547',	'vi',	'msg',	'holiday'),
('530',	'vi',	'msg',	'holiday'),
('163',	'es',	'msg',	'holiday'),
('162',	'ko',	'msg',	'holiday'),
('538',	'vi',	'msg',	'holiday'),
('520',	'vi',	'msg',	'holiday'),
('514',	'vi',	'msg',	'holiday'),
('559',	'vi',	'msg',	'holiday'),
('130',	'pt',	'msg',	'holiday'),
('481',	'vi',	'msg',	'holiday'),
('246',	'en',	'msg',	'holiday'),
('135',	'ru',	'msg',	'holiday'),
('622',	'vi',	'msg',	'delete'),
('285',	'en',	'msg',	'delete'),
('286',	'en',	'msg',	'delete'),
('157',	'hi',	'msg',	'delete'),
('159',	'fr',	'msg',	'delete'),
('159',	'pt',	'msg',	'delete'),
('190',	'es',	'msg',	'delete'),
('624',	'vi',	'msg',	'delete'),
('156',	'zh',	'msg',	'delete'),
('160',	'ru',	'msg',	'delete'),
('184',	'de',	'msg',	'delete'),
('185',	'th',	'msg',	'delete'),
('188',	'ko',	'msg',	'delete'),
('184',	'ja',	'msg',	'delete'),
('186',	'ar',	'msg',	'delete'),
('172',	'tr',	'msg',	'delete'),
('147',	'fi',	'msg',	'delete'),
('230',	'it',	'msg',	'delete'),
('16',	'id',	'msg',	'delete'),
('16',	'da',	'msg',	'delete'),
('17',	'nl',	'msg',	'delete'),
('16',	'pl',	'msg',	'delete'),
('625',	'vi',	'msg',	'delete'),
('191',	'es',	'msg',	'delete'),
('160',	'pt',	'msg',	'delete'),
('160',	'fr',	'msg',	'delete'),
('158',	'hi',	'msg',	'delete'),
('157',	'zh',	'msg',	'delete'),
('161',	'ru',	'msg',	'delete'),
('185',	'de',	'msg',	'delete'),
('186',	'th',	'msg',	'delete'),
('189',	'ko',	'msg',	'delete'),
('185',	'ja',	'msg',	'delete'),
('187',	'ar',	'msg',	'delete'),
('173',	'tr',	'msg',	'delete'),
('148',	'fi',	'msg',	'delete'),
('231',	'it',	'msg',	'delete'),
('17',	'id',	'msg',	'delete'),
('17',	'da',	'msg',	'delete'),
('18',	'nl',	'msg',	'delete'),
('17',	'pl',	'msg',	'delete'),
('627',	'vi',	'msg',	'delete');

-- 2020-10-05 08:38:10
