-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_user_it`;
CREATE TABLE `app_my_girl_user_it` (
  `id_device` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `name` varchar(20) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `date_start` date NOT NULL,
  `date_cur` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL,
  `avatar_url` text NOT NULL,
  `password` tinytext NOT NULL,
  FULLTEXT KEY `name` (`name`),
  FULLTEXT KEY `sdt` (`sdt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_user_it`;
INSERT INTO `app_my_girl_user_it` (`id_device`, `name`, `sex`, `date_start`, `date_cur`, `address`, `sdt`, `status`, `email`, `avatar_url`, `password`) VALUES
('0d9a2ba35b661e59a68f5720747cc722',	'Nicola',	'0',	'2020-08-09',	'2020-08-09',	'',	'3492660819',	0,	'',	'',	''),
('5c48fc7e6046fc34311896912bc849c5',	'Luis Miguel ',	'0',	'2020-08-09',	'2020-08-09',	'',	'0982611345',	0,	'',	'',	''),
('4746f95dcac0247bdfb5c138d2a0637e',	'parliamo italiano',	'0',	'2020-08-10',	'2020-08-10',	'',	'3202534768',	0,	'',	'',	''),
('1c9907adb8dfcc31072be38a8113c9a2',	'shish',	'0',	'2020-08-10',	'2020-08-10',	'',	'454654647466',	1,	'',	'',	''),
('2fd9d06439c29b2c32989f5bd9331502',	'Jorge esequiel',	'0',	'2020-08-10',	'2020-08-10',	'',	'0974229109',	0,	'',	'',	''),
('8b81efc1d9f5c810d56eece8e7d46335',	'Johnjohn',	'0',	'2020-08-13',	'2020-08-13',	'',	'1234567890',	0,	'',	'',	''),
('cd377424f4d9eb93048907cf84869419',	'gigi dogni',	'0',	'2020-08-14',	'2020-08-14',	'',	'32050862541',	1,	'',	'',	''),
('1a182c01668bf7e7ec797e8df807a668',	'Naomi',	'1',	'2020-08-16',	'2020-08-16',	'Lucio Cabañas 206, División del Nte. I Etapa, 31064 Chihuahua, Chih., Mexico',	'6141975475',	0,	'',	'',	''),
('d8db08017b5b8f636a942ca506252279',	'Federica ',	'0',	'2020-08-16',	'2020-08-16',	'',	'3347746487',	1,	'',	'',	''),
('2a54536da2a2f5428c1abfaa75286214',	'Natalia ',	'0',	'2020-08-17',	'2020-08-17',	'',	'1234678656',	0,	'',	'',	''),
('1c3a4f7b423b4d65450a87f444734a5a',	'Gabry',	'0',	'2020-08-18',	'2020-08-18',	'',	'9908557853',	0,	'',	'',	''),
('0759c7a4a9ccabfc460e4e8a5250ee30',	'Kanzaki',	'0',	'2020-08-19',	'2020-08-19',	'',	'365858965',	0,	'',	'',	''),
('b4af77499a77c71eda7564936e139485',	'Stefano ',	'0',	'2020-08-19',	'2020-08-19',	'',	'3487692227',	1,	'',	'',	''),
('85aa1158731ccdf4b74efe129edceef4',	'Marco',	'0',	'2020-08-21',	'2020-08-21',	'',	'3713645844',	0,	'',	'',	''),
('8e7aecc03c06cb4cc68eb6d6ee72b605',	'Silvano',	'0',	'2020-08-22',	'2020-08-22',	'',	'3403834480',	1,	'',	'',	''),
('9df4ea38394cdc189d4e27dfbfc83dc1',	'luca84',	'0',	'2020-08-22',	'2020-08-22',	'',	'3428387787',	1,	'',	'',	''),
('b947be7064fb6d14505f7f72e800f461',	'Giovanni ',	'0',	'2020-08-26',	'2020-08-26',	'',	'3470199365',	0,	'',	'',	''),
('6ae4e5025cf4d111ed5ffe2ad6947643',	'yaxiely',	'0',	'2020-08-27',	'2020-08-27',	'',	'8296640739',	0,	'',	'',	''),
('8d4948ab9ab79fb7d584786780a1ac13',	'franco',	'0',	'2020-08-27',	'2020-08-27',	'',	'3929965060',	1,	'',	'',	''),
('804fb2f16b72ba6885e24bf4f13103bf',	'lady mary',	'1',	'2020-08-31',	'2020-08-31',	'',	'3498858663',	1,	'',	'',	''),
('1c508d1c22f76f5728c1b13ddafac5e3',	'santiago',	'0',	'2020-09-02',	'2020-09-02',	'',	'3214045664',	1,	'',	'',	''),
('cbfba2f56ad03f924b7c5989e562ec04',	'Federico',	'0',	'2020-09-03',	'2020-09-03',	'',	'000000000',	0,	'',	'',	''),
('7463fabba5a4375ab1b89d8f9a9dd776',	'Emaslime',	'0',	'2020-09-03',	'2020-09-03',	'',	'123456789',	1,	'',	'',	''),
('f1d624cee8c9aa5e8734b22422844ad5',	'checco',	'0',	'2020-09-04',	'2020-09-04',	'',	'3333333333',	0,	'',	'',	''),
('50b9ae857b965879722ef8b9285c61ec',	'lorenzo',	'0',	'2020-09-04',	'2020-09-04',	'',	'6131935634659',	0,	'',	'',	''),
('91ad694ee31c2ed7e428c81cf740a26f',	'Malulmla',	'0',	'2020-09-13',	'2020-09-13',	'',	'1236547889',	0,	'',	'',	''),
('800df326fe3790813931b6c03a96874f',	'cibele',	'1',	'2020-09-15',	'2020-09-15',	'',	'014997369717',	1,	'',	'',	''),
('d07ceeaec41a617c28f15a192300d725',	'Danilo ',	'0',	'2020-09-16',	'2020-09-16',	'',	'77988651599',	1,	'',	'',	''),
('717087507dc729bdcd0ff159f81746b1',	'Augu77',	'0',	'2020-09-17',	'2020-09-17',	'',	'0786656955',	1,	'',	'',	''),
('d07ca4a2c7e836d7cd1a6579f70f41fe',	'Pippo',	'0',	'2020-09-17',	'2020-09-17',	'',	'3314524528',	1,	'',	'',	''),
('0248c382fd024ea5a5bf15c1db600ed5',	'Dominic ',	'0',	'2020-09-18',	'2020-09-18',	'',	'3515857423',	0,	'',	'',	''),
('2bce5a7148298df1051dc5c8d8ec6693',	'1234567890',	'0',	'2020-09-19',	'2020-09-19',	'',	'1805646464343565',	1,	'',	'',	''),
('6f5ab1d46497363633d4953410b00f18',	'João Lucas',	'0',	'2020-09-20',	'2020-09-20',	'',	'62996093411',	0,	'',	'',	''),
('3a3f59c407c6c5bcd6670b3dac1e0e69',	'miguel',	'0',	'2020-09-23',	'2020-09-23',	'',	'731670850',	0,	'',	'',	''),
('992129b2f2dfb555d544571eeabf1e4b',	'Francesco',	'0',	'2020-09-23',	'2020-09-23',	'',	'3240956468',	0,	'',	'',	''),
('4cfd6456c4d28a6d01b6066b438244d6',	'Daniel',	'0',	'2020-09-24',	'2020-09-24',	'',	'9516487657',	1,	'',	'',	''),
('d04b7bf40d9f6e1f8c8145aa7b0a5427',	'Jessica ',	'0',	'2020-09-25',	'2020-09-25',	'',	'014998430057',	0,	'',	'',	''),
('adca0bf4ef583a88e587cb4f8d847b31',	'sonny',	'0',	'2020-09-29',	'2020-09-29',	'',	'3298797549',	0,	'',	'',	''),
('09ffd2cb230aabe5dcbd4229f7b69e2e',	'nessuno',	'1',	'2020-09-29',	'2020-09-29',	'',	'3921583540',	0,	'',	'',	''),
('9b46a270d941581a38eb4345f447dc94',	'Alain',	'0',	'2020-10-02',	'2020-10-02',	'',	'0752324686',	1,	'',	'',	''),
('1d89513e1d63e5ae5b9f5a5a024055cd',	'simone',	'0',	'2020-10-02',	'2020-10-02',	'',	'459829758460',	1,	'',	'',	''),
('1959fd8ca495f90f52314165a6ca8041',	'Mouadh',	'0',	'2020-10-04',	'2020-10-04',	'19 Avenue de la Republique, Tunisia',	'21658144203',	0,	'',	'',	'');

-- 2020-10-05 08:57:27