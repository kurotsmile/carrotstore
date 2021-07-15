-- Adminer 4.8.1 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_report`;
CREATE TABLE `app_my_girl_report` (
  `type` varchar(1) NOT NULL,
  `sel_report` varchar(1) NOT NULL,
  `value_report` varchar(90) NOT NULL,
  `id_question` varchar(10) NOT NULL,
  `type_question` varchar(5) NOT NULL,
  `id_device` varchar(50) NOT NULL,
  `limit_chat` varchar(1) NOT NULL,
  `lang` varchar(2) NOT NULL,
  `os` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_report`;
INSERT INTO `app_my_girl_report` (`type`, `sel_report`, `value_report`, `id_question`, `type_question`, `id_device`, `limit_chat`, `lang`, `os`) VALUES
('1',	'2',	'sexi',	'52195',	'chat',	'3f7fd20e1af64c584d84716bca83a3bb',	'4',	'es',	'3f7fd20e1a'),
('0',	'6',	'1',	'126',	'msg',	'7b3a5444fa7ffa3de0d6ce7c60621256',	'4',	'vi',	'android'),
('1',	'3',	'4',	'83',	'msg',	'b80e80bc7c8fa76b483552b7b4e6d8d8',	'4',	'es',	'android'),
('1',	'2',	'1',	'',	'',	'b25e3c5c60231723229c0499ff9c2179',	'2',	'fr',	'android'),
('1',	'2',	'',	'',	'',	'2764604a9a48ca7d9d5226b8c571bf20',	'3',	'es',	'2764604a9a'),
('1',	'2',	'',	'20',	'msg',	'162df8dc4784880e0a2e0947bb74d06a',	'3',	'ar',	'162df8dc47'),
('1',	'4',	'啥也不会，必须有动作才行',	'28',	'msg',	'6f16be645ee71261192d92a754ae3e5e',	'3',	'zh',	'android'),
('1',	'3',	'1',	'31',	'msg',	'e4c050d00e6fdd1fe47d2f270df5079d',	'1',	'es',	'android'),
('1',	'2',	'',	'28829',	'chat',	'f55eb644e183610859e0916e356723c3',	'3',	'vi',	'f55eb644e1'),
('1',	'2',	'hola abla español',	'33',	'msg',	'd339cdce4fa0ca2e917f3a4d013ccc53',	'3',	'vi',	'd339cdce4f'),
('1',	'2',	'1',	'7607',	'chat',	'0d10ff4fd2474e9eee343521d966b53a',	'4',	'pt',	'android'),
('1',	'1',	'',	'102',	'msg',	'8bdfa07f7d88bc1bab9f9a8aaa0cac46',	'4',	'es',	'android'),
('1',	'2',	'1',	'29',	'msg',	'6641d6571cb41f2c3a4341856ea48503',	'4',	'es',	'android'),
('1',	'2',	'',	'58',	'msg',	'9649bcb3320488cb6dc1737ed223e1b4',	'3',	'en',	'9649bcb332'),
('1',	'2',	'4',	'181',	'msg',	'dd2731c73af4e72efdf850ad771c2feb',	'4',	'vi',	'android'),
('1',	'2',	'',	'7168',	'chat',	'f149d87bdeb2408aa7815348e43787b1',	'3',	'en',	'f149d87bde'),
('1',	'2',	'1',	'573',	'chat',	'863f6a3f3dd8495112c6f802b7825dfd',	'4',	'en',	'android'),
('1',	'3',	'1',	'227',	'msg',	'd5d3aa4bafcdeb8feccea5547cb25454',	'1',	'vi',	'android'),
('1',	'2',	'4',	'91',	'msg',	'55cbb99ee8867d859cfeac398cdbe670',	'4',	'zh',	'android'),
('1',	'2',	'',	'59',	'msg',	'a5490517403c3e244bd2649a731ed6c6',	'3',	'pt',	'a549051740'),
('1',	'2',	'quiero que me lo metas y te chupe',	'32',	'msg',	'6c9a663d80911f8ee9ce6de154cf218b',	'3',	'es',	'6c9a663d80'),
('1',	'2',	'',	'31',	'msg',	'e415271338dff5ce25ab0f1ba7c6707e',	'3',	'es',	'e415271338'),
('1',	'1',	'ğ ile başlayan komutları neden anlamıyor',	'',	'',	'7e91abf94156644bc55759e666e3bdcf',	'2',	'tr',	'7e91abf941'),
('1',	'4',	'',	'83',	'msg',	'5a021d5223beb4ace851e95014cdc755',	'4',	'es',	'5a021d5223'),
('1',	'2',	'yumuşak ğ nası öğretmeliyim',	'',	'',	'7e91abf94156644bc55759e666e3bdcf',	'2',	'tr',	'7e91abf941'),
('1',	'2',	'yumuşak ğ nası öğretmeliyim',	'',	'',	'7e91abf94156644bc55759e666e3bdcf',	'2',	'tr',	'7e91abf941'),
('1',	'3',	'3',	'',	'',	'7e91abf94156644bc55759e666e3bdcf',	'3',	'tr',	'7e91abf941'),
('1',	'4',	'yumuşak ğ nası öğretmeliyim',	'',	'',	'7e91abf94156644bc55759e666e3bdcf',	'3',	'tr',	'7e91abf941'),
('1',	'2',	'',	'1427',	'chat',	'c25ae5e346780426db702751423b3fce',	'3',	'vi',	'c25ae5e346'),
('1',	'2',	'amını götünü sikeyim',	'14',	'msg',	'7e91abf94156644bc55759e666e3bdcf',	'3',	'tr',	'7e91abf941'),
('1',	'2',	'',	'73597',	'chat',	'cb22abc30fd2ce9db0a0c5e2b3b1c19d',	'3',	'vi',	'cb22abc30f'),
('1',	'2',	'',	'82',	'chat',	'9de463a987c33031e7d533ee14797e17',	'4',	'en',	'9de463a987'),
('1',	'3',	'4',	'27551',	'chat',	'35cab8d01cf10490cfab7558daf3ad84',	'4',	'vi',	'android'),
('1',	'2',	'4',	'27551',	'chat',	'35cab8d01cf10490cfab7558daf3ad84',	'4',	'vi',	'android'),
('1',	'2',	'1',	'594',	'msg',	'f30453598c454943ef33e01b7ca1b7d2',	'4',	'vi',	'android'),
('1',	'4',	'섹스대환예기',	'46',	'msg',	'fbc4072521b10bc78089f978710feb1a',	'4',	'ko',	'fbc4072521'),
('1',	'2',	'섹스대환예기',	'45',	'msg',	'fbc4072521b10bc78089f978710feb1a',	'4',	'ko',	'fbc4072521'),
('1',	'1',	'섹스대환예기',	'176',	'msg',	'fbc4072521b10bc78089f978710feb1a',	'4',	'ko',	'fbc4072521'),
('1',	'4',	'섹스대환예기',	'176',	'msg',	'fbc4072521b10bc78089f978710feb1a',	'4',	'ko',	'fbc4072521'),
('1',	'2',	'1',	'241',	'msg',	'8b782a021bd51d1f8e553ed7866deb67',	'1',	'vi',	'android'),
('1',	'2',	'',	'65907',	'chat',	'd4424edd78561f4b339d7d5553416813',	'3',	'vi',	'd4424edd78'),
('1',	'2',	'',	'42',	'msg',	'6c560d104f17ecbca19e1ac7a40de3fd',	'3',	'ja',	'6c560d104f'),
('1',	'2',	'1',	'178',	'msg',	'cb3bcf616fbd2b6c185637aadb22fd21',	'4',	'vi',	'android'),
('1',	'4',	'không đc chuyển chủ đề',	'350',	'msg',	'eee54d8059f3031a66d9d46a88253bbf',	'4',	'vi',	'android'),
('1',	'2',	'',	'177',	'msg',	'3f7fd20e1af64c584d84716bca83a3bb',	'4',	'es',	'3f7fd20e1a'),
('1',	'2',	'1',	'12',	'msg',	'881a90a54f156a39d6ad721f149e3621',	'4',	'es',	'android'),
('1',	'3',	'4',	'367',	'msg',	'ef66c1c2a7da9186f239d1a0ed4a9813',	'4',	'vi',	'android'),
('1',	'2',	'1',	'146',	'msg',	'9cbf95a21c08626d8db5bd5645ab36e7',	'4',	'pt',	'android');

-- 2021-06-12 15:30:07
