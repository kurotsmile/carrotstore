-- Adminer 4.8.0 MySQL 5.7.33 dump

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
('1',	'4',	'no puedo cambiar el sexo del personaje',	'14',	'msg',	'93aabcc3fbb35ac4d17ced13d94fff64',	'4',	'es',	'android'),
('1',	'1',	'',	'105',	'msg',	'07f79ba75f1f9baf9ebe538bc3b3104b',	'4',	'th',	'android'),
('1',	'1',	'',	'83',	'msg',	'670fab906514bc97f37925e588473013',	'4',	'es',	'android'),
('1',	'3',	'1',	'64',	'msg',	'43057ea4d99d7e3b9e70732c41c43858',	'4',	'pt',	'android'),
('1',	'3',	'1.43592',	'95',	'msg',	'5369c2366ad614463327ea84f4871a07',	'4',	'pt',	'android'),
('1',	'1',	'esmuy boba',	'30',	'msg',	'e9214483754612f32472e9472c604f9e',	'3',	'es',	'android'),
('1',	'2',	'make him naked and show hes cock',	'33179',	'chat',	'd863c466a9c3b93f8056e7a118c90165',	'4',	'en',	'd863c466a9'),
('1',	'1',	'bad grammar and misspellings',	'155',	'msg',	'ab43f5c018db87b59e3b9fcc9998304e',	'4',	'en',	'android'),
('1',	'2',	'1',	'53949',	'chat',	'53d3d45c63a97ecd20a87fcdafee6ccb',	'4',	'vi',	'android'),
('1',	'3',	'4',	'33',	'msg',	'c38fc095932c5150c2ff1e22fd0f320c',	'4',	'es',	'android'),
('1',	'4',	'que se quite la ropa y me mueste sus partes',	'350',	'chat',	'c38fc095932c5150c2ff1e22fd0f320c',	'4',	'es',	'android'),
('1',	'2',	'',	'1746',	'chat',	'719a4fcb6cf9d2d1dd8c6a712a43a4e2',	'4',	'en',	'719a4fcb6c'),
('1',	'4',	'es muy bueno',	'168',	'msg',	'73bbe13026db1d20b8a982373a811643',	'4',	'es',	'android'),
('1',	'3',	'4',	'351',	'msg',	'3c4308a9261a709c7b17197b255e4524',	'1',	'vi',	'android'),
('1',	'3',	'4',	'21317',	'chat',	'3c4308a9261a709c7b17197b255e4524',	'4',	'vi',	'3c4308a926'),
('1',	'1',	'',	'70157',	'chat',	'7677ed503edeba682f66760dab99b4a3',	'4',	'vi',	'android'),
('1',	'1',	'',	'56',	'msg',	'b65fd0545809eb9e54f8db8f403d3a06',	'4',	'pt',	'android'),
('0',	'6',	'1',	'62498',	'chat',	'd606c5193e3e340097c2fae5fe7c4cf3',	'4',	'es',	'android'),
('1',	'1',	'',	'40',	'msg',	'177e1d48bee141c61c083b7063cccb20',	'1',	'es',	'android'),
('1',	'2',	'1',	'4775',	'chat',	'f8f8f12d65eb6604c6d83a363854a22b',	'4',	'es',	'android'),
('1',	'4',	'picture blur out',	'152',	'msg',	'e903f5b3247f288bb23de64661ddaf05',	'4',	'en',	'android'),
('1',	'2',	'3.600958',	'49256',	'chat',	'8bd4908ad098a86f47f55a6a26deb9e9',	'4',	'es',	'android'),
('1',	'2',	'1',	'32',	'msg',	'4100dc37871203d321226abc6747e4d7',	'4',	'es',	'android'),
('1',	'3',	'1',	'30',	'msg',	'4100dc37871203d321226abc6747e4d7',	'4',	'es',	'android'),
('1',	'2',	'1',	'63430',	'chat',	'72a054725b0d671dfc269c4131b513b2',	'4',	'es',	'android');

-- 2021-03-10 07:31:39
