-- Adminer 4.8.1 MySQL 5.7.35 dump

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
('1',	'2',	'',	'628',	'msg',	'e4c68b3ac357a0bd39112669a9741d48',	'3',	'vi',	'e4c68b3ac3'),
('1',	'2',	'',	'58',	'msg',	'85b686a0e9d65b6c8341c499c10dbf89',	'3',	'en',	'85b686a0e9'),
('1',	'2',	'',	'14185',	'chat',	'195748f4df8bbda54a8d524011d5ca1c',	'3',	'en',	'195748f4df'),
('1',	'2',	'',	'57508',	'chat',	'e9ad8757141658471b240e686eab3acc',	'3',	'vi',	'e9ad875714'),
('1',	'2',	'',	'30',	'msg',	'75596433335c9e02cfd277ea13eb91ff',	'3',	'ru',	'7559643333'),
('1',	'2',	'',	'92',	'msg',	'01d059effdabacc6e7293f6428c35231',	'4',	'pt',	'01d059effd'),
('1',	'2',	'',	'92',	'msg',	'01d059effdabacc6e7293f6428c35231',	'4',	'pt',	'01d059effd'),
('1',	'2',	'',	'31',	'msg',	'5f6e102756df36fa5c75801280498d76',	'4',	'es',	'5f6e102756'),
('1',	'2',	'Yo no puedo hablar',	'142',	'msg',	'a474b763d78f79f4ada50d0d4a55a91e',	'1',	'es',	'a474b763d7'),
('1',	'2',	'vsvdhdgsjdvx a próxima reunião do ei é em breve você vai encontrar arquivos a próxima ediç',	'646',	'msg',	'ef0f7649c8b32351cdf3cf0a5d27b655',	'3',	'vi',	'ef0f7649c8'),
('1',	'2',	'',	'435',	'chat',	'220702d10d63129f4c3fe915773eefe8',	'4',	'en',	'220702d10d'),
('1',	'2',	'',	'37',	'msg',	'fa0f9faf47529c11be9a1c0d26be0183',	'4',	'de',	'fa0f9faf47'),
('1',	'2',	'',	'1282',	'chat',	'6b3622f7bc0c54f86f0e2587bfd13fa6',	'3',	'fr',	'6b3622f7bc'),
('1',	'2',	'i want to be your boyfriend',	'33580',	'chat',	'7780ca114fb4618b343c26e5d3d04b91',	'3',	'en',	'7780ca114f'),
('1',	'2',	'QQQQQQQ',	'49',	'msg',	'bf0f8242bf40fb80c118204e77b340ea',	'3',	'pt',	'bf0f8242bf'),
('1',	'2',	'sai câu trl',	'52511',	'chat',	'8fe990bb8a17ee7c8d6da27aac2bc4cd',	'4',	'vi',	'8fe990bb8a'),
('1',	'2',	'',	'58',	'msg',	'9ebd700eba827ec0ae18f6e5ab52262d',	'4',	'en',	'9ebd700eba'),
('1',	'4',	'',	'2',	'msg',	'5835a1c223317245d5ae61df0a365b90',	'4',	'es',	'5835a1c223'),
('1',	'2',	'',	'30',	'msg',	'c68f35fe95af7232d05cc604656869db',	'3',	'es',	'c68f35fe95'),
('1',	'2',	'',	'956',	'chat',	'6da28ed70dcd7371d204079119b1d62b',	'3',	'ar',	'6da28ed70d'),
('1',	'4',	'',	'58',	'msg',	'eb4202e313813d13b4e76a5be3a923d0',	'3',	'en',	'eb4202e313'),
('1',	'2',	'',	'196',	'msg',	'e3916ca4beee4cd2a64de794baccacf0',	'3',	'en',	'e3916ca4be'),
('1',	'4',	'',	'62701',	'chat',	'8a8372c0762d30ef2f1d91fea45aa76d',	'3',	'es',	'8a8372c076'),
('1',	'2',	'',	'152',	'msg',	'd70e577bfcfaa2e8eb4e0752d9565e4f',	'3',	'en',	'd70e577bfc'),
('1',	'2',	'',	'19',	'msg',	'2ca2ee6121e0801f3cf37d870d38e9cf',	'3',	'pt',	'2ca2ee6121'),
('1',	'2',	'',	'49',	'msg',	'5a783bf388e020ac11590ca8e820b232',	'3',	'pt',	'5a783bf388'),
('1',	'2',	'',	'987',	'chat',	'467955d7b12e944904f54dc54e8280f9',	'4',	'ru',	'467955d7b1'),
('1',	'2',	'',	'51',	'msg',	'446519a09faf7d65fd557db02a4a57b2',	'3',	'pt',	'446519a09f'),
('1',	'2',	'',	'92',	'msg',	'afe29fdaa7665386ab7f0c01fb61433b',	'3',	'zh',	'afe29fdaa7'),
('1',	'2',	'',	'49',	'msg',	'1bef2aa7543d1a76f28d9202e76fc9c1',	'3',	'pt',	'1bef2aa754'),
('1',	'2',	'',	'64',	'chat',	'aa04269b06c637dbee24a6759e3b197f',	'3',	'pt',	'aa04269b06'),
('0',	'6',	'',	'9852',	'chat',	'10468a1be2194e82b1c8f02fa659c012',	'3',	'ru',	'10468a1be2'),
('1',	'2',	'',	'17661',	'chat',	'2b2c5505b196f2a19506c868a5c76ed4',	'4',	'en',	'2b2c5505b1'),
('1',	'2',	'',	'84',	'chat',	'70bc0d213001b56aea12652ef8466384',	'4',	'es',	'70bc0d2130'),
('1',	'2',	'',	'62016',	'chat',	'08c61e75575e5b587a819ec81cf76589',	'3',	'es',	'08c61e7557'),
('1',	'2',	'',	'49256',	'chat',	'bb27de6263bd3fbd8bb4e8fdb5fd53d7',	'4',	'es',	'bb27de6263'),
('1',	'4',	'',	'31676',	'chat',	'24f1a6a7922507775442384cd95af92e',	'3',	'en',	'24f1a6a792'),
('1',	'2',	'',	'49',	'msg',	'f099d99ee129d9f8d0d8a671099586de',	'3',	'pt',	'f099d99ee1'),
('1',	'2',	'',	'185',	'msg',	'e79d9eb18483184d54b909e7fb048a05',	'3',	'de',	'e79d9eb184'),
('1',	'2',	'',	'31',	'msg',	'03872e663dd14ce73d6634a6757e81f2',	'4',	'es',	'03872e663d'),
('1',	'2',	'',	'3075',	'chat',	'dee10371b09d114313410609ce8bf4d8',	'3',	'pt',	'dee10371b0'),
('1',	'2',	'',	'61',	'msg',	'd35881f5cb1a6b605bebb98e4d3a08d3',	'3',	'pt',	'd35881f5cb'),
('1',	'2',	'',	'1144',	'chat',	'78cfc669de8051c71ff67347dbeab897',	'4',	'en',	'78cfc669de'),
('1',	'3',	'4',	'62849',	'chat',	'08c61e75575e5b587a819ec81cf76589',	'3',	'es',	'08c61e7557'),
('1',	'2',	'',	'67',	'msg',	'b92b53e1115d82903d3d2c43c60f3dae',	'3',	'pt',	'b92b53e111'),
('1',	'2',	'',	'27',	'msg',	'fed4d667f58adb9d1d7de68d59d2c05b',	'3',	'en',	'fed4d667f5'),
('1',	'3',	'4',	'32',	'msg',	'4cdb1941f7f4ca57e740c0765cfd3d9d',	'3',	'es',	'4cdb1941f7'),
('1',	'2',	'',	'10966',	'chat',	'6a791fbee0bc3e8d1abc31cf6edcb452',	'4',	'en',	'6a791fbee0'),
('1',	'2',	'',	'117',	'msg',	'4cdb1941f7f4ca57e740c0765cfd3d9d',	'4',	'es',	'4cdb1941f7'),
('1',	'2',	'me gusta que exprese la pabra verga',	'32',	'msg',	'af36178a759b5ef5808ddfa8374a03e9',	'3',	'es',	'af36178a75'),
('1',	'2',	'',	'61094',	'chat',	'a6d496f1ac1c3cdfd154c302a2883545',	'3',	'vi',	'a6d496f1ac'),
('0',	'6',	'',	'53509',	'chat',	'202c10b37735a26bfd672e9d6e26e404',	'3',	'vi',	'202c10b377'),
('1',	'4',	'soi ombre',	'142',	'msg',	'17b4905ff48730bcdd91543a2054ea82',	'4',	'es',	'17b4905ff4'),
('0',	'6',	'',	'13564',	'chat',	'867d4cda9e988fb325524a9a2aed147a',	'3',	'pt',	'867d4cda9e'),
('1',	'2',	'',	'58134',	'chat',	'e49d3f0c3b3996895dfdc478af9b5e27',	'3',	'es',	'e49d3f0c3b'),
('1',	'2',	'',	'35',	'msg',	'03a629a38a51884addd135feaace8248',	'3',	'hi',	'03a629a38a'),
('1',	'2',	'que sea pervertida y muy pervertida',	'30',	'msg',	'19b854b822e53917a0c4bd78a88f210e',	'4',	'es',	'19b854b822'),
('1',	'2',	'',	'54',	'msg',	'e94968e54ae89b1cebfdee617d783ea4',	'3',	'es',	'e94968e54a'),
('1',	'2',	'',	'16203',	'chat',	'0fbcb9e468ca8e809949de80c2a172a6',	'3',	'pt',	'0fbcb9e468'),
('1',	'2',	'',	'13408',	'chat',	'0fbcb9e468ca8e809949de80c2a172a6',	'4',	'pt',	'0fbcb9e468'),
('1',	'3',	'4',	'5362',	'chat',	'6b7ab14c1a10bd822c4d16ffa7ad6be7',	'1',	'vi',	'6b7ab14c1a'),
('1',	'1',	'no es muy pervertida que sea mas pervertida',	'56312',	'chat',	'19b854b822e53917a0c4bd78a88f210e',	'4',	'es',	'19b854b822'),
('1',	'2',	'chich',	'216',	'msg',	'ae61ef16c2d47c47b0c2e32a75d1f521',	'3',	'vi',	'ae61ef16c2'),
('1',	'2',	'',	'25',	'msg',	'69a2fea6bdc07febb8b12de063df6058',	'3',	'zh',	'69a2fea6bd'),
('1',	'2',	'',	'137',	'msg',	'2bd38da8cad5c388d027a93ee7060a7e',	'4',	'de',	'2bd38da8ca'),
('1',	'1',	'',	'27',	'msg',	'974fab884669a3ee13f53579dabfd378',	'4',	'zh',	'android'),
('1',	'2',	'',	'108',	'msg',	'f6de241d829d7e62f3f3079f8adc23f1',	'4',	'es',	'f6de241d82'),
('0',	'6',	'',	'51922',	'chat',	'6adfc62c3685f384291aafc13bd5185c',	'4',	'es',	'6adfc62c36'),
('1',	'2',	'1',	'2',	'msg',	'e339bcc4990a46053835d527050ac986',	'4',	'es',	'android'),
('1',	'2',	'',	'51956',	'chat',	'3cd2925649a708182c49d41d33d71fd0',	'3',	'es',	'3cd2925649'),
('1',	'2',	'boneca bugada',	'11',	'msg',	'7274a86071c825e2ec1ba460e79d2d3e',	'3',	'pt',	'7274a86071'),
('1',	'2',	'',	'13',	'msg',	'05534a3e3d03628b4f888e420ecbb325',	'3',	'es',	'05534a3e3d'),
('1',	'2',	'',	'2524',	'chat',	'446519a09faf7d65fd557db02a4a57b2',	'4',	'pt',	'446519a09f'),
('1',	'2',	'1',	'14',	'msg',	'd1bd54a3f5e4c8910b82f74d05d3e8be',	'4',	'es',	'android'),
('1',	'3',	'1',	'14',	'msg',	'd1bd54a3f5e4c8910b82f74d05d3e8be',	'4',	'es',	'android'),
('1',	'2',	'',	'3676',	'chat',	'ac2d9102709c8efe79c84505f4b80d03',	'4',	'en',	'ac2d910270'),
('1',	'2',	'',	'49',	'msg',	'02c3c15e33ef279905e9c5e1d968be90',	'3',	'pt',	'02c3c15e33'),
('1',	'2',	'',	'5969',	'chat',	'8db402c0266a335a4cd8d79d7eeddc7f',	'4',	'pt',	'8db402c026'),
('1',	'2',	'',	'31',	'msg',	'17b4905ff48730bcdd91543a2054ea82',	'4',	'es',	'17b4905ff4'),
('1',	'2',	'',	'22',	'msg',	'aa30b245896c91ff97f0b379f964ded7',	'3',	'en',	'aa30b24589'),
('1',	'2',	'',	'64963',	'chat',	'2e40bc88a89953e1d428d4bd31b0ee01',	'3',	'vi',	'2e40bc88a8'),
('1',	'2',	'',	'24713',	'chat',	'b00adda39140b6b575f8910378d29f79',	'3',	'en',	'b00adda391'),
('1',	'2',	'',	'51',	'msg',	'e20c2aaea30f696c43a886e74639f654',	'3',	'es',	'e20c2aaea3'),
('1',	'2',	'',	'65297',	'chat',	'c294f80c6c7f907f43784ee12549da3a',	'4',	'es',	'c294f80c6c'),
('1',	'2',	'',	'16',	'msg',	'cad8abacb10be793c23bfe3c404c0ed9',	'3',	'es',	'cad8abacb1'),
('1',	'4',	'',	'31',	'msg',	'c31cb96dc360dede221fd217c5a4db97',	'3',	'es',	'c31cb96dc3'),
('1',	'2',	'',	'49',	'msg',	'c9ded8128f00cded1d5c337a382a1998',	'1',	'pt',	'c9ded8128f'),
('1',	'2',	'eu sou linda',	'52',	'msg',	'2aa8bff9df9c66aac0b445424cc238fb',	'3',	'pt',	'2aa8bff9df'),
('1',	'2',	'',	'31',	'msg',	'0ac33f06a39d1e716e51652d5a0bd312',	'4',	'ru',	'0ac33f06a3'),
('1',	'2',	'',	'59',	'msg',	'97cf7532ce2909ed06fe0ba753ef6533',	'3',	'pt',	'97cf7532ce'),
('1',	'2',	'',	'4780',	'chat',	'bb7c69440e10b01b7457354a76716ecd',	'3',	'es',	'bb7c69440e'),
('1',	'2',	'',	'135',	'msg',	'c86d1a6cec5c53cae03255adeb9f71b1',	'4',	'en',	'c86d1a6cec'),
('1',	'2',	'',	'59467',	'chat',	'6d61a38ae93c4b507cf65aab2db176fc',	'3',	'es',	'6d61a38ae9'),
('1',	'1',	'',	'19541',	'chat',	'61267fe756dd183362c1103c703f4e82',	'3',	'es',	'61267fe756'),
('1',	'2',	'',	'61409',	'chat',	'fa5eb83edab3758390e11a77810ef08d',	'3',	'es',	'fa5eb83eda'),
('1',	'2',	'',	'60803',	'tim_n',	'7036ab7bcc77aaad2752e922bb5aa77b',	'3',	'es',	'7036ab7bcc'),
('1',	'2',	'',	'27',	'msg',	'cc6c22851656b6b09d6aa603101c6343',	'3',	'en',	'cc6c228516'),
('1',	'2',	'',	'1427',	'chat',	'a0f51390ce92db98529fbcfc8ab913e2',	'3',	'pt',	'a0f51390ce'),
('1',	'2',	'',	'2',	'msg',	'c51b2ea2c0dbf285cda309e2210acf7e',	'4',	'es',	'c51b2ea2c0');

-- 2021-10-18 22:09:58
