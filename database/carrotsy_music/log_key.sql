-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `log_key`;
CREATE TABLE `log_key` (
  `key` varchar(100) NOT NULL,
  `lang` varchar(3) NOT NULL,
  `date` date NOT NULL,
  `is_see` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `log_key`;
INSERT INTO `log_key` (`key`, `lang`, `date`, `is_see`) VALUES
('hạ còn vương nắng',	'vi',	'2021-07-14',	1),
('yêu là tha thu',	'vi',	'2021-07-14',	1),
('ed sheree',	'en',	'2021-07-14',	1),
('perfect',	'en',	'2021-07-14',	1),
('before you go',	'en',	'2021-07-14',	1),
('thalk ',	'en',	'2021-07-14',	1),
('thalking tô thee moon',	'en',	'2021-07-14',	1),
('aplin home',	'en',	'2021-07-14',	1),
('Black Pink DDu',	'es',	'2021-07-14',	1),
('DDu DU',	'es',	'2021-07-14',	1),
('that girl drum mix',	'vi',	'2021-07-14',	1),
('that girl drum',	'vi',	'2021-07-14',	1),
('cô dộc vương',	'vi',	'2021-07-15',	1),
('hạ còn vương nắng',	'vi',	'2021-07-15',	1),
('DDU DU DDU DU',	'es',	'2021-07-15',	1),
('telefono',	'es',	'2021-07-15',	1),
('pagode mama',	'pt',	'2021-07-15',	1),
('pagode mama',	'en',	'2021-07-15',	1),
('paper',	'vi',	'2021-07-15',	1),
('Dunn',	'vi',	'2021-07-15',	1),
('Dunn remix',	'vi',	'2021-07-15',	1),
('thề lương',	'vi',	'2021-07-15',	1),
('một dất mộng kinh hoàng',	'vi',	'2021-07-15',	1),
('Luffy',	'vi',	'2021-07-15',	1),
('anh thương em mà',	'vi',	'2021-07-15',	1),
('như bến đợi đò',	'vi',	'2021-07-15',	1),
('nhạc 8x9x',	'vi',	'2021-07-16',	1),
('soolking',	'fr',	'2021-07-16',	1),
('soolking jenifer',	'fr',	'2021-07-16',	1),
('soolking linda5',	'fr',	'2021-07-16',	1),
('soolking linda',	'fr',	'2021-07-16',	1),
('linda',	'fr',	'2021-07-16',	1),
('bad laer',	'en',	'2021-07-17',	1),
('bad liar',	'en',	'2021-07-17',	1),
('cô phương tự hưởng',	'vi',	'2021-07-17',	1),
('độ ta không đọ nàng trung puốc',	'vi',	'2021-07-17',	1),
('độ ta không đọ nàng trung quốc',	'vi',	'2021-07-17',	1),
('chỉ là không cùng nhau',	'vi',	'2021-07-17',	1),
('thời không sai lợt',	'vi',	'2021-07-17',	1),
('đúng người đúng thời điểm',	'vi',	'2021-07-17',	1),
('gặp người đúng lúc',	'vi',	'2021-07-17',	1),
('thiên hạ hữu nhân tình',	'vi',	'2021-07-17',	1),
('cánh chim của trời',	'vi',	'2021-07-17',	1),
('thiên hạ hữu tình nhân',	'vi',	'2021-07-17',	1),
('thiên hạ hữu tình nhân  đan trường juky san',	'vi',	'2021-07-17',	1),
('thiên hạ hữu tình nhân  đan trường juky san',	'vi',	'2021-07-17',	1),
('chẳng còn bi ngạn phân phi',	'vi',	'2021-07-17',	1),
('đánh mất em',	'vi',	'2021-07-17',	1),
('gặp người đúng lúc',	'vi',	'2021-07-17',	1),
('gặp người đúng lúc lời việt',	'vi',	'2021-07-17',	1),
('gặp người đúng lúc lời việt cover tiktok',	'vi',	'2021-07-17',	1),
('sống xa anh chẳng dễ dáng',	'vi',	'2021-07-17',	1),
('gặp người đúng lúc cover lời việt',	'vi',	'2021-07-17',	1),
('sống xa anh chẳng dễ dàng mrsiro',	'vi',	'2021-07-17',	1),
('gặp người đúng lúc cover lời việt',	'vi',	'2021-07-17',	1),
('mr siro',	'vi',	'2021-07-17',	1),
('sống xa anh chẳng dễ',	'vi',	'2021-07-17',	1),
('sống xa anh chẳng dễ',	'vi',	'2021-07-17',	1),
('độ ta không độ nàng thiên an',	'vi',	'2021-07-17',	1),
('ai khóc nỗi đau này',	'vi',	'2021-07-17',	1),
('ai khóc nỗi đau này cover',	'vi',	'2021-07-17',	1),
('ai khóc nỗi đau này cover nam',	'vi',	'2021-07-17',	1),
('đường tôi chở em về',	'vi',	'2021-07-17',	1),
('nắm bàn tay là say cả đời',	'vi',	'2021-07-17',	1),
('ngắm hoa lệ rơi',	'vi',	'2021-07-17',	1),
('ngắm hoa lệ rơi',	'vi',	'2021-07-17',	1),
('bomba yah',	'es',	'2021-07-17',	1),
('black pink bombayah',	'es',	'2021-07-17',	1),
('black pink bombayah',	'es',	'2021-07-17',	1),
('black pink boombayah',	'es',	'2021-07-17',	1),
('black pink boombayah',	'es',	'2021-07-17',	1),
('đường tôi chở em về',	'vi',	'2021-07-18',	1),
('kiil this love',	'es',	'2021-07-18',	1),
(' bkiil this love',	'es',	'2021-07-18',	1),
(' bkiil this love',	'es',	'2021-07-18',	1),
('black pink kiil this love',	'es',	'2021-07-18',	1),
('black pink kiil this love',	'es',	'2021-07-18',	1),
('BLACKPINK-Kill This love ',	'es',	'2021-07-18',	1),
('BLACKPINK-Kill This love ',	'es',	'2021-07-18',	1),
('BLACKPINK-Kill This love ',	'es',	'2021-07-18',	1),
('BLACKPINK',	'es',	'2021-07-18',	1),
('BLACKPINK',	'es',	'2021-07-18',	1),
('BLACKPINK',	'es',	'2021-07-18',	1),
('black pink',	'es',	'2021-07-18',	1),
('BLACKPINK',	'es',	'2021-07-18',	1),
('cô gái',	'vi',	'2021-07-18',	1),
('cô gái',	'vi',	'2021-07-18',	1),
('cô gái m52',	'vi',	'2021-07-18',	1),
('túy âm',	'vi',	'2021-07-18',	1),
('mình cưới nhau đi',	'vi',	'2021-07-18',	1),
('điếu thuốt tàn',	'vi',	'2021-07-19',	1),
('chiều thu hạ',	'vi',	'2021-07-19',	1),
('chiều thu hạ bóng',	'vi',	'2021-07-19',	1),
('độ ta khôm',	'vi',	'2021-07-19',	1),
('độ ta không',	'vi',	'2021-07-19',	1),
('thiệp hồng',	'vi',	'2021-07-19',	1),
('cố giang',	'vi',	'2021-07-19',	1),
('cô thắm',	'vi',	'2021-07-19',	1),
('bạc',	'vi',	'2021-07-19',	1),
('bạc phận',	'vi',	'2021-07-19',	1),
('una vaina loca',	'es',	'2021-07-19',	1),
('покинула чат',	'hi',	'2021-07-20',	1),
('marginal',	'pt',	'2021-07-20',	1),
('love me like you do',	'en',	'2021-07-20',	1),
('alow dance',	'en',	'2021-07-20',	1),
('let me down slowly',	'en',	'2021-07-20',	1),
('let me down slowly',	'en',	'2021-07-20',	1),
('I lie to me',	'en',	'2021-07-20',	1),
('I lie to me',	'en',	'2021-07-20',	1),
('never lie to me',	'en',	'2021-07-20',	1),
('never lie to me',	'en',	'2021-07-20',	1),
('never lie to me',	'en',	'2021-07-20',	1),
('me down slowly',	'en',	'2021-07-20',	1),
('khi em lớn',	'vi',	'2021-07-21',	1),
('đường tôi chở em về',	'vi',	'2021-07-21',	1),
('love of my life',	'en',	'2021-07-21',	1),
('mhd king kong',	'fr',	'2021-07-21',	1),
('bimbo',	'fr',	'2021-07-21',	1),
('spicy',	'fr',	'2021-07-21',	1),
('lets go musafa',	'fr',	'2021-07-21',	1),
('dababy',	'fr',	'2021-07-21',	1),
('telefono',	'es',	'2021-07-21',	1),
('telefono',	'es',	'2021-07-21',	1),
('shakira',	'es',	'2021-07-21',	1),
('esto es África',	'es',	'2021-07-21',	1),
('david bustamante',	'es',	'2021-07-21',	1),
('david bisbal',	'es',	'2021-07-21',	1),
('puentes sobre aguas turbulentas',	'es',	'2021-07-21',	1),
('believer',	'en',	'2021-07-21',	1),
('believer',	'en',	'2021-07-21',	1),
('Lữ Khách qua thời gian',	'vi',	'2021-07-21',	1),
('đường tôi chở em về',	'vi',	'2021-07-21',	1),
('stand by me',	'en',	'2021-07-21',	1),
('tuya otra vez',	'en',	'2021-07-21',	1),
('agnetha falkog',	'en',	'2021-07-21',	1),
('agnetha falkog',	'en',	'2021-07-21',	1),
('abba',	'en',	'2021-07-21',	1),
('sade',	'en',	'2021-07-21',	1),
('paul mauriat',	'en',	'2021-07-21',	1),
('phận duyên lỡ làng',	'vi',	'2021-07-22',	1),
('anh thương em mà',	'vi',	'2021-07-22',	1),
('đường tôi chở em về',	'vi',	'2021-07-22',	1),
('đường tôi chở em về',	'vi',	'2021-07-22',	1),
('Đánh Mất em',	'vi',	'2021-07-22',	1),
('Đánh Mất em trung quốc',	'vi',	'2021-07-22',	1),
('Gập người đúng lúc',	'vi',	'2021-07-22',	1),
('Gập người đúng lúc',	'vi',	'2021-07-22',	1),
('Đoạn tuyệt nàng đi',	'vi',	'2021-07-22',	1),
('sai người sa thề điểm',	'vi',	'2021-07-22',	1),
('Sầu hồng g',	'vi',	'2021-07-22',	1),
('có anh ở đây rồi',	'vi',	'2021-07-22',	1),
('Đánh mất en rồi',	'vi',	'2021-07-22',	1),
('Đánh mất en',	'vi',	'2021-07-22',	1),
('soprano',	'fr',	'2021-07-22',	1),
('TRAP MUSIC',	'en',	'2021-07-22',	1),
('đường tôi chở em về',	'vi',	'2021-07-23',	1),
('đường tôi chở em về',	'vi',	'2021-07-23',	1),
('hạ còn vương nắng',	'vi',	'2021-07-23',	1),
('thất tình',	'vi',	'2021-07-23',	1),
('yêu là tha thu',	'vi',	'2021-07-23',	1),
('Và rồi kiệu hồng đưa đón',	'vi',	'2021-07-23',	1),
('爆米花',	'zh',	'2021-07-23',	1),
('爆米花',	'zh',	'2021-07-23',	1),
('tnt',	'zh',	'2021-07-23',	1),
('時代少年團',	'zh',	'2021-07-23',	1),
('Tuy',	'es',	'2021-07-24',	1),
('Cartel de santa',	'es',	'2021-07-24',	1),
('believer',	'en',	'2021-07-24',	1),
('nắm bàn tay say cả đời',	'vi',	'2021-07-24',	1),
('đường tôi chở em về',	'vi',	'2021-07-25',	1),
('di young pixel pig',	'en',	'2021-07-25',	1),
('Pico vs keit',	'en',	'2021-07-25',	1),
('girl girl on fire',	'en',	'2021-07-25',	1),
('mama mia ',	'en',	'2021-07-25',	1),
('mama mia  merel streep',	'en',	'2021-07-25',	1),
('mama mia  1',	'en',	'2021-07-25',	1),
('mama mia  1',	'en',	'2021-07-25',	1),
('mama mia  1',	'en',	'2021-07-25',	1),
('mama mia  1',	'en',	'2021-07-25',	1),
('đư',	'vi',	'2021-07-25',	1),
('phận duyên lỡ làng',	'vi',	'2021-07-25',	1),
('잠뜰',	'ko',	'2021-07-26',	1),
('잠뜰',	'ko',	'2021-07-26',	1),
('쵸쵸우',	'ko',	'2021-07-26',	1),
('Roling in the Deep',	'ko',	'2021-07-26',	1),
('꿈의 형태',	'ko',	'2021-07-26',	1),
('누덕누덕 스타카도',	'ko',	'2021-07-26',	1),
('누덕누덕 스타카도',	'ko',	'2021-07-26',	1),
('seniorita',	'en',	'2021-07-26',	1),
('nepale song',	'en',	'2021-07-26',	1),
('nepale song',	'en',	'2021-07-26',	1),
('lỡ say bye là bye',	'vi',	'2021-07-27',	1),
('già cùng nhau là được',	'vi',	'2021-07-27',	1),
('Út Ơi',	'vi',	'2021-07-27',	1),
('Út Ơi3',	'vi',	'2021-07-27',	1),
('thôi em ởi mình trò truyện chút thôi',	'vi',	'2021-07-27',	1),
('hồng',	'vi',	'2021-07-27',	1),
('hồng nhan',	'vi',	'2021-07-27',	1),
('hạ còn vương nắng nóng',	'vi',	'2021-07-27',	1),
('dynamite',	'en',	'2021-07-28',	1),
('dynamite',	'en',	'2021-07-28',	1),
('o',	'en',	'2021-07-28',	1),
('love me like you do',	'en',	'2021-07-28',	1),
('love me like you do',	'en',	'2021-07-28',	1),
('love me like you do',	'en',	'2021-07-28',	1),
('beliver',	'en',	'2021-07-28',	1),
('beliver',	'en',	'2021-07-28',	1),
('love me like you do',	'en',	'2021-07-28',	1),
('beliver',	'en',	'2021-07-28',	1),
('beliver',	'en',	'2021-07-28',	1),
('út ơi',	'vi',	'2021-07-28',	1),
('hong nhan',	'vi',	'2021-07-28',	1),
('thiên tình sầu',	'vi',	'2021-07-28',	1),
('như bến đợi',	'vi',	'2021-07-28',	1),
('như bến đợi',	'vi',	'2021-07-28',	1),
('lý cấy bông',	'vi',	'2021-07-28',	1),
('lý cấy bông',	'vi',	'2021-07-28',	1),
('ses kaydi',	'tr',	'2021-07-28',	1),
('原',	'vi',	'2021-07-29',	1),
('原',	'vi',	'2021-07-29',	1),
('原這愛',	'vi',	'2021-07-29',	1),
('原這愛',	'vi',	'2021-07-29',	1),
('原這愛',	'vi',	'2021-07-29',	1),
('原這愛',	'vi',	'2021-07-29',	1),
('原這愛',	'vi',	'2021-07-29',	1),
('原來有愛',	'vi',	'2021-07-29',	1),
('wendyyy',	'en',	'2021-07-29',	1),
('BLACKPINK',	'es',	'2021-07-29',	1),
('BLACKPINK',	'es',	'2021-07-29',	1),
('co tham',	'vi',	'2021-07-30',	1),
('halay',	'de',	'2021-07-30',	1),
('halan',	'tr',	'2021-07-30',	1),
('la llorona',	'es',	'2021-07-30',	1),
('la llorona natalia',	'es',	'2021-07-30',	1),
('la llorona natalia',	'es',	'2021-07-30',	1),
('mike',	'es',	'2021-07-30',	1),
('miku',	'es',	'2021-07-30',	1),
('miku popiop',	'es',	'2021-07-30',	1),
('miku fredad',	'es',	'2021-07-30',	1),
('miku fredad',	'es',	'2021-07-30',	1),
('miku hatsune',	'es',	'2021-07-30',	1),
('five nights at freddy s',	'es',	'2021-07-30',	1),
('medcezir',	'tr',	'2021-07-31',	1),
('mero',	'tr',	'2021-07-31',	1),
('bao phuc',	'ja',	'2021-07-31',	1),
('Bacnj nhị xà',	'vi',	'2021-08-01',	1),
('COFIM DANCE',	'en',	'2021-08-01',	1),
('beliver',	'en',	'2021-08-01',	1),
('barbie',	'tr',	'2021-08-02',	1),
('',	'tr',	'2021-08-02',	1),
('',	'tr',	'2021-08-02',	1),
('ANTI-HERO',	'ja',	'2021-08-02',	1),
('ANTI-HERO',	'ja',	'2021-08-02',	1),
('SEKAI NO OWARI',	'ja',	'2021-08-02',	1),
('SEKAI NO OWARI',	'ja',	'2021-08-02',	1),
('bveliver',	'en',	'2021-08-02',	1),
('bveliver',	'en',	'2021-08-02',	1),
('yelili',	'tr',	'2021-08-02',	1),
('yelili  yalila',	'tr',	'2021-08-02',	1),
('bad liar',	'en',	'2021-08-02',	1),
('let me down slowly',	'en',	'2021-08-02',	1),
('Agnes',	'en',	'2021-08-02',	1),
('way',	'ko',	'2021-08-03',	1),
('way',	'ko',	'2021-08-03',	1),
('way',	'ko',	'2021-08-03',	1),
('way back home',	'ko',	'2021-08-03',	1),
('way back home',	'ko',	'2021-08-03',	1),
('hoa nở không màu l',	'vi',	'2021-08-03',	1),
('yeu em',	'vi',	'2021-08-03',	1),
('انا اشي',	'ar',	'2021-08-03',	1),
('BLACKPINK',	'en',	'2021-08-03',	1),
('BLACKPINK',	'ko',	'2021-08-03',	1),
('ivo linna',	'ar',	'2021-08-04',	1),
('BLACK PINK',	'ko',	'2021-08-04',	1),
('BLACKPINK',	'ko',	'2021-08-04',	1),
('BLACKPINK',	'ko',	'2021-08-04',	1),
('BLACK PINK',	'ko',	'2021-08-04',	1),
(' BLACKPINK',	'ko',	'2021-08-04',	1),
('đi đi đi',	'vi',	'2021-08-04',	1),
('bỏ em vào em balo',	'vi',	'2021-08-04',	1),
('hachalu hundesa new album',	'en',	'2021-08-04',	1),
('asmr',	'ja',	'2021-08-04',	1),
('the nigts',	'vi',	'2021-08-05',	1),
('the nights',	'vi',	'2021-08-05',	1),
('thời không sai lệnh',	'vi',	'2021-08-05',	1),
('parti planet',	'de',	'2021-08-05',	1),
('party Planett',	'de',	'2021-08-05',	1),
('das ist der paty planet',	'de',	'2021-08-05',	1),
('das ist der paty planet Live',	'de',	'2021-08-05',	1),
('goot 4u',	'de',	'2021-08-05',	1),
('mahtea',	'de',	'2021-08-05',	1),
('kaos',	'de',	'2021-08-05',	1),
('kaos',	'de',	'2021-08-05',	1),
('kaos',	'de',	'2021-08-05',	1),
('Mateha',	'de',	'2021-08-05',	1),
('Mateha ',	'de',	'2021-08-05',	1),
('Mateha  caos',	'de',	'2021-08-05',	1),
('Mdma',	'de',	'2021-08-05',	1),
('fuck',	'en',	'2021-08-05',	1),
('Nhưng',	'vi',	'2021-08-06',	1),
('Nhưng',	'vi',	'2021-08-06',	1),
('brenna tuat',	'de',	'2021-08-06',	1),
('brenna tuat',	'de',	'2021-08-06',	1),
('ai mamg cô đoen',	'vi',	'2021-08-06',	1),
('ai mamg cô đơn',	'vi',	'2021-08-06',	1),
('ai mamg cô đơn đi',	'vi',	'2021-08-06',	1),
('kış bahçeleri',	'tr',	'2021-08-06',	1),
('cô đơn dành cho ai',	'vi',	'2021-08-07',	1),
('Metal',	'en',	'2021-08-07',	1),
('tucanes de ',	'en',	'2021-08-07',	1),
('tucanes de tijuana',	'en',	'2021-08-07',	1),
('tucanes de tijuana se fue mi amor',	'en',	'2021-08-07',	1),
('隱形的翅膀',	'zh',	'2021-08-08',	1),
('隱形的翅膀',	'zh',	'2021-08-08',	1),
('chỉ là không cùng nhau',	'vi',	'2021-08-08',	1),
('anh không tha thơ',	'vi',	'2021-08-08',	1),
('anh không tha thứ',	'vi',	'2021-08-08',	1),
('anh không tha thứ',	'vi',	'2021-08-08',	1),
('Bạch xà nhi',	'vi',	'2021-08-08',	1),
('anh không tha thứ',	'vi',	'2021-08-08',	1),
('chẳng ai yêu mãi một người',	'vi',	'2021-08-08',	1),
('chẳng ai yêu mãi một người đâu em',	'vi',	'2021-08-08',	1),
('cô đơn giành cho ai',	'vi',	'2021-08-08',	1),
('ai mang cô đơn đi',	'vi',	'2021-08-08',	1),
('ai mang cô đơn đi',	'vi',	'2021-08-08',	1),
('việt nam tôi',	'vi',	'2021-08-08',	1),
('màu mắt em',	'vi',	'2021-08-08',	1),
('anh không tha thứ',	'vi',	'2021-08-08',	1),
('老歌',	'zh',	'2021-08-08',	1),
('我是行船人',	'zh',	'2021-08-08',	1),
('3 uhr nachts',	'de',	'2021-08-08',	1),
('mark forster',	'de',	'2021-08-08',	1),
('mark forster 3 uhr nachts',	'de',	'2021-08-08',	1),
('mark forster lea',	'de',	'2021-08-08',	1),
('faun wilde rose',	'de',	'2021-08-08',	1),
('bibi umd tina',	'de',	'2021-08-08',	1),
('beste sommer',	'de',	'2021-08-08',	1),
('es sin bibi und tina',	'de',	'2021-08-08',	1),
('ohne licht',	'de',	'2021-08-08',	1),
('wie schaten ohne licht',	'de',	'2021-08-08',	1),
('woe ein kriger',	'de',	'2021-08-08',	1),
('den du bist ein kriger',	'de',	'2021-08-08',	1),
('nu hong mong manh',	'vi',	'2021-08-08',	1),
('wtf',	'de',	'2021-08-08',	1),
('wtf',	'de',	'2021-08-08',	1),
('saints',	'de',	'2021-08-08',	1),
('saints',	'de',	'2021-08-08',	1),
(' BLACKPINK',	'ko',	'2021-08-08',	1),
('BLACKPINK',	'ko',	'2021-08-08',	1),
('rồi tới luôn',	'vi',	'2021-08-09',	1),
('rồi tới luôn',	'vi',	'2021-08-09',	1),
('phận duyên lỡ làng',	'vi',	'2021-08-09',	1),
('anh ko tha thứ',	'vi',	'2021-08-09',	1),
('anh ko tha thứ',	'vi',	'2021-08-09',	1),
('anh không tha t',	'vi',	'2021-08-09',	1),
('itzy',	'ko',	'2021-08-09',	1),
('hạ co',	'vi',	'2021-08-09',	1),
('hạ co',	'vi',	'2021-08-09',	1),
('đánh mắt em',	'vi',	'2021-08-09',	1),
('đánh mắt em',	'vi',	'2021-08-09',	1),
('tin',	'vi',	'2021-08-09',	1),
('tình sầu thiên',	'vi',	'2021-08-09',	1),
('tình sầu thiên',	'vi',	'2021-08-09',	1),
('My hous',	'de',	'2021-08-09',	1),
('rồi tới',	'vi',	'2021-08-09',	1),
('rồi tới',	'vi',	'2021-08-09',	1),
('hồng nhan',	'vi',	'2021-08-09',	1),
('cố giang t',	'vi',	'2021-08-09',	1),
('em ơi lên phố',	'vi',	'2021-08-09',	1),
('đánh mắt em trung quố',	'vi',	'2021-08-09',	1),
('khi trong tay ta không tiền',	'vi',	'2021-08-09',	1),
('đừng bỏ mặt em nhé',	'vi',	'2021-08-09',	1),
('buồn làm chi em ơu',	'vi',	'2021-08-10',	1),
('buồn làm chi em ơi',	'vi',	'2021-08-10',	1),
('bô ri rô',	'vi',	'2021-08-10',	1),
('nhạc sống mới nhất',	'vi',	'2021-08-10',	1),
('vách ngọc vàng',	'vi',	'2021-08-10',	1),
('Bolero mới nhất',	'vi',	'2021-08-10',	1),
('buồn làm chi em ơi',	'vi',	'2021-08-10',	1),
('hạ còn vương nắng',	'vi',	'2021-08-10',	1),
('gu',	'vi',	'2021-08-10',	1),
('khúc cửu môn hồi ức',	'vi',	'2021-08-10',	1),
('điểm ca đích nhssn',	'vi',	'2021-08-10',	1),
('điểm ca đích nhân',	'vi',	'2021-08-10',	1),
('đáp án của bạn',	'vi',	'2021-08-10',	1),
('đáp án của bạn',	'vi',	'2021-08-10',	1),
('đáp án của bạn',	'vi',	'2021-08-10',	1),
('đáp án của bạn',	'vi',	'2021-08-10',	1),
('đáp án của bạn',	'vi',	'2021-08-10',	1),
('con trai cưng',	'vi',	'2021-08-10',	1),
('điêm ca đích nhân',	'vi',	'2021-08-10',	1),
('điểm ca đích nhân',	'vi',	'2021-08-10',	1),
('đời nhạc sỉ',	'vi',	'2021-08-10',	1),
('điểm ca đicgs nhân đời nhạc sỉ',	'vi',	'2021-08-10',	1),
('điểm ca đích nhân',	'zh',	'2021-08-10',	1),
('điểm ca đích nhân trung quốc',	'zh',	'2021-08-10',	1),
('hải lai mộc',	'zh',	'2021-08-10',	1),
('hải lai a mộc',	'zh',	'2021-08-10',	1),
('đại thiên bồng',	'zh',	'2021-08-10',	1),
('độ ta không',	'zh',	'2021-08-10',	1),
('độ ta không',	'zh',	'2021-08-10',	1),
('độ ta không  độ  nàng trung quốc',	'zh',	'2021-08-10',	1),
('điểm ca đích nhân',	'zh',	'2021-08-11',	1),
('멜론',	'ko',	'2021-08-11',	1),
('hạ còn vương nắng',	'vi',	'2021-08-11',	1),
('summertime sadness',	'en',	'2021-08-11',	1),
('mans not hot',	'en',	'2021-08-11',	1),
('the beatles',	'en',	'2021-08-11',	1),
('coming home',	'en',	'2021-08-11',	1),
('summertime sadness',	'en',	'2021-08-11',	1),
('james artur',	'en',	'2021-08-11',	1),
('james arthur',	'en',	'2021-08-11',	1),
('summery',	'en',	'2021-08-11',	1),
('summery',	'en',	'2021-08-11',	1),
('summer tim sadness',	'en',	'2021-08-11',	1),
('summer tim sadness',	'en',	'2021-08-11',	1),
('summer time sadness',	'en',	'2021-08-11',	1),
('I wanna be your slave',	'en',	'2021-08-11',	1),
('I wanna be your slave',	'en',	'2021-08-11',	1),
('中國香港',	'it',	'2021-08-12',	1),
('mung xuan',	'en',	'2021-08-12',	1),
('Только в кожженых штонах',	'ru',	'2021-08-12',	1),
('Только в коженых штонах',	'ru',	'2021-08-12',	1),
('summertime sadness',	'en',	'2021-08-12',	1),
('兒童',	'zh',	'2021-08-12',	1),
('嬰兒',	'zh',	'2021-08-12',	1),
('兒歌',	'zh',	'2021-08-12',	1),
('Толб',	'ru',	'2021-08-13',	1),
('Только в коженых',	'ru',	'2021-08-13',	1),
('Monkey',	'ru',	'2021-08-13',	1),
('знём рождения',	'ru',	'2021-08-13',	1),
('happy Birthday ',	'ru',	'2021-08-13',	1),
('happy Birthday  Zhorik',	'ru',	'2021-08-13',	1),
('Жорик',	'ru',	'2021-08-13',	1),
('психушка',	'ru',	'2021-08-13',	1),
('Катя адущкена',	'ru',	'2021-08-13',	1),
('А4',	'ru',	'2021-08-13',	1),
('А4 мой первый хит',	'ru',	'2021-08-13',	1),
('А4 это ламба а это гелик',	'ru',	'2021-08-13',	1),
('Милана',	'ru',	'2021-08-13',	1),
('Милана некрасова',	'ru',	'2021-08-13',	1),
('Хабиб',	'ru',	'2021-08-13',	1),
('bveliver',	'en',	'2021-08-13',	1),
('love me  like you do',	'en',	'2021-08-13',	1),
('lady gaga',	'de',	'2021-08-13',	1),
('blackpink',	'es',	'2021-08-13',	1),
('hãy xem như là',	'vi',	'2021-08-14',	1),
('cô đơn tự thưởng',	'vi',	'2021-08-14',	1),
('độ ta ko độ nàng trung',	'vi',	'2021-08-14',	1),
('độ ta khôngđộ nàng trung',	'vi',	'2021-08-14',	1),
('ngôn tình',	'zh',	'2021-08-14',	1),
('Westide sQuaD',	'zh',	'2021-08-14',	1),
('westide SWad',	'vi',	'2021-08-14',	1),
('hồng tàn',	'vi',	'2021-08-14',	1),
('hồng tàn',	'vi',	'2021-08-14',	1),
('đời là lắm à',	'vi',	'2021-08-14',	1),
('westide squak',	'vi',	'2021-08-14',	1),
('westide squad',	'vi',	'2021-08-14',	1),
('út ơi',	'vi',	'2021-08-14',	1),
('út ơi 3',	'vi',	'2021-08-14',	1),
('cô đơn tự',	'vi',	'2021-08-14',	1),
('cô đơn tự th',	'vi',	'2021-08-14',	1),
('cô đơn tự thưởng',	'vi',	'2021-08-14',	1),
('cô đơn tự thưởng',	'vi',	'2021-08-14',	1),
('westide quad',	'vi',	'2021-08-14',	1),
('westide quad',	'vi',	'2021-08-14',	1),
('westide squad',	'vi',	'2021-08-14',	1),
('thay',	'vi',	'2021-08-14',	1),
('that gig',	'vi',	'2021-08-14',	1),
('that gig',	'vi',	'2021-08-14',	1),
('that gig',	'vi',	'2021-08-14',	1),
('that gig',	'vi',	'2021-08-14',	1),
('that grig',	'vi',	'2021-08-14',	1),
('that grig',	'vi',	'2021-08-14',	1),
('that griu',	'vi',	'2021-08-14',	1),
('that gri',	'vi',	'2021-08-14',	1),
('А4',	'ru',	'2021-08-14',	1),
('#1!',	'ru',	'2021-08-14',	1),
('#1',	'ru',	'2021-08-14',	1),
('хей малявка',	'ru',	'2021-08-14',	1),
('naps',	'fr',	'2021-08-14',	1),
('Kids United',	'fr',	'2021-08-14',	1),
('la pluie le vent la pluie',	'fr',	'2021-08-14',	1),
('musique musique',	'fr',	'2021-08-14',	1),
('Wellerman',	'de',	'2021-08-14',	1),
('Bads Habit',	'de',	'2021-08-14',	1),
('Bad Hits ed sherreb',	'de',	'2021-08-14',	1),
('Ed Sheeran Bad Habits',	'de',	'2021-08-14',	1),
('Justin und Ed Sheeran',	'de',	'2021-08-14',	1),
('Justin und Ed Sheeran',	'de',	'2021-08-14',	1),
('Justin Bieber',	'de',	'2021-08-14',	1),
('twice',	'es',	'2021-08-15',	1),
('aespa',	'es',	'2021-08-15',	1),
('lovely',	'pt',	'2021-08-15',	1),
('Cloudy eyed',	'pt',	'2021-08-15',	1),
('beliver',	'en',	'2021-08-15',	1),
('beliver',	'en',	'2021-08-15',	1),
('back street boys',	'en',	'2021-08-15',	1),
('back str',	'en',	'2021-08-15',	1),
('where is the love',	'en',	'2021-08-15',	1),
('where is the love',	'en',	'2021-08-15',	1),
('where is the love',	'en',	'2021-08-15',	1),
('baby one more time',	'en',	'2021-08-15',	1),
('baby one more time',	'en',	'2021-08-15',	1),
('oops i did it again',	'en',	'2021-08-15',	1),
('i did it again',	'en',	'2021-08-15',	1),
('i did it again',	'en',	'2021-08-15',	1),
('everybody',	'en',	'2021-08-15',	1),
('blue',	'en',	'2021-08-15',	1),
('blue',	'en',	'2021-08-15',	1),
('truly madly deeply',	'en',	'2021-08-15',	1),
('truly madly deeply',	'en',	'2021-08-15',	1),
('mambo no. 5',	'en',	'2021-08-15',	1),
('seniorita',	'en',	'2021-08-15',	1),
('edshi',	'de',	'2021-08-15',	1),
('nder1',	'de',	'2021-08-15',	1),
('mambo no. 5',	'en',	'2021-08-15',	1),
('masakra',	'en',	'2021-08-15',	1),
('Polska',	'en',	'2021-08-15',	1),
('高原红',	'zh',	'2021-08-16',	1),
('高原红',	'zh',	'2021-08-16',	1),
('wedtde quad',	'vi',	'2021-08-16',	1),
('wedtde quad',	'vi',	'2021-08-16',	1),
('westde quad',	'vi',	'2021-08-16',	1),
('lệ tình',	'vi',	'2021-08-16',	1),
('ayaz',	'tr',	'2021-08-16',	1),
('enes batur ayaz',	'tr',	'2021-08-16',	1),
('irem derici acemi balık',	'tr',	'2021-08-16',	1),
('kẹo bông gòn',	'vi',	'2021-08-16',	1),
('dik yokuş',	'th',	'2021-08-16',	1),
('dik yokuş',	'th',	'2021-08-16',	1),
('ma colombe',	'fr',	'2021-08-16',	1),
('ma colombe',	'fr',	'2021-08-16',	1),
('ma colombe',	'fr',	'2021-08-16',	1),
('ma colombe',	'fr',	'2021-08-16',	1);

-- 2021-08-17 09:09:49
