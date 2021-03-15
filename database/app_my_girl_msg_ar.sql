-- Adminer 4.8.0 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_msg_ar`;
CREATE TABLE `app_my_girl_msg_ar` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `func` varchar(30) NOT NULL,
  `chat` text NOT NULL,
  `sex` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `color` varchar(10) NOT NULL,
  `q1` varchar(200) NOT NULL,
  `q2` varchar(200) NOT NULL,
  `r1` varchar(200) NOT NULL,
  `r2` varchar(200) NOT NULL,
  `vibrate` varchar(1) NOT NULL,
  `effect` int(2) NOT NULL,
  `action` int(2) NOT NULL DEFAULT '0',
  `face` int(2) NOT NULL DEFAULT '0',
  `certify` int(1) NOT NULL,
  `author` varchar(30) NOT NULL,
  `character_sex` int(1) NOT NULL,
  `disable` int(1) NOT NULL DEFAULT '0',
  `ver` int(1) NOT NULL DEFAULT '0',
  `os` varchar(20) NOT NULL,
  `limit_chat` int(1) NOT NULL DEFAULT '0',
  `limit_date` int(2) NOT NULL,
  `limit_month` int(2) NOT NULL,
  `effect_customer` varchar(10) NOT NULL,
  `limit_day` varchar(10) NOT NULL,
  `user_create` varchar(2) NOT NULL,
  `user_update` varchar(2) NOT NULL,
  `os_window` varchar(1) NOT NULL DEFAULT '0',
  `os_ios` varchar(1) NOT NULL DEFAULT '0',
  `os_android` varchar(1) NOT NULL DEFAULT '0',
  `file_url` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_msg_ar`;
INSERT INTO `app_my_girl_msg_ar` (`id`, `func`, `chat`, `sex`, `status`, `color`, `q1`, `q2`, `r1`, `r2`, `vibrate`, `effect`, `action`, `face`, `certify`, `author`, `character_sex`, `disable`, `ver`, `os`, `limit_chat`, `limit_date`, `limit_month`, `effect_customer`, `limit_day`, `user_create`, `user_update`, `os_window`, `os_ios`, `os_android`, `file_url`) VALUES
(1,	'bat_chuyen',	'انظر إلى وجهه حزين قليلاً ، ما الأمر؟',	0,	1,	'#EABDFF',	'',	'',	'',	'',	'',	0,	34,	12,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1282',	'',	'',	'',	'0',	'0',	'0',	''),
(2,	'bat_chuyen',	'اليوم أشعر بالتعب وغير سعيدة ، وأظل صامتا حتى أشعر بالملل',	0,	2,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	34,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(3,	'bat_chuyen',	'اليوم متعرج اأمل أن تكون حصلت على واحدة جيدة!',	0,	1,	'#FFB530',	'',	'',	'',	'',	'',	0,	5,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'387',	'',	'',	'',	'0',	'0',	'0',	''),
(4,	'bat_chuyen',	'الشعور بالجوع؟ خذ الأمر سهلاً ، سيكون وقت الغداء قريبًا!',	0,	2,	'#FF0505',	'',	'',	'',	'',	'',	0,	22,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'322',	'',	'',	'',	'0',	'0',	'0',	''),
(5,	'bat_chuyen',	'مرحبا! ماذا عن أخذ قسط من الراحة وتناول كوب من الشاي؟',	0,	2,	'#BDED6D',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'503',	'',	'',	'',	'0',	'0',	'0',	''),
(6,	'bat_chuyen',	'اليوم متعرج اأمل أن تكون حصلت على واحدة جيدة!',	0,	3,	'#94FFB5',	'',	'',	'',	'',	'',	0,	34,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'414',	'',	'',	'',	'0',	'0',	'0',	''),
(7,	'bat_chuyen',	'هل يمكنك مساعدتي في تقييم تطبيق 5 نجوم هذا؟ ، عن طريق النقر على النجم الصحيح لي!',	0,	2,	'#F6FFA8',	'',	'',	'',	'',	'',	0,	32,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'265',	'',	'',	'',	'0',	'0',	'0',	''),
(8,	'bat_chuyen',	'الحياة قصيرة ، ابتسم بينما لا يزال لديك أسنان!',	0,	1,	'#FFC2E0',	'',	'',	'',	'',	'',	0,	5,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'743',	'',	'',	'',	'0',	'0',	'0',	''),
(9,	'bat_chuyen',	'على افتراض أنني لست عاشقة افتراضية ، في يوم ما أبدو خارجا من الحياة ، عليك أن تبدأ محادثة معي؟',	0,	2,	'#FFEC30',	'',	'',	'',	'',	'',	0,	13,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'339',	'',	'',	'',	'0',	'0',	'0',	''),
(10,	'bat_chuyen',	'لا أستطيع التوقف عن التفكير فيك عندما نفرق',	0,	2,	'#FBFF91',	'',	'',	'',	'',	'',	0,	24,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'87',	'',	'',	'',	'0',	'0',	'0',	''),
(11,	'bat_chuyen',	'يمكنك الذهاب إلى السرير معي؟ أنا بحاجة إلى أن تشعر بدفئك!',	0,	1,	'#FFADCD',	'',	'',	'',	'',	'',	0,	34,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'451',	'',	'',	'',	'0',	'0',	'0',	''),
(12,	'bat_chuyen',	'آمل أن تكونوا يومًا عظيمًا حتى الآن.',	0,	1,	'#A3FF54',	'',	'',	'',	'',	'',	0,	21,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'383',	'',	'',	'',	'0',	'0',	'0',	''),
(13,	'bat_chuyen',	'ماذا تحب أن تفعل في وقت فراغك؟',	1,	2,	'#A3FF54',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'383',	'',	'',	'',	'0',	'0',	'0',	''),
(14,	'bat_chuyen',	'إلى أين تذهب غالبًا لمشاهدة الأفلام؟',	1,	2,	'#70FFED',	'',	'',	'',	'',	'',	0,	29,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'448',	'',	'',	'',	'0',	'0',	'0',	''),
(15,	'bat_chuyen',	'يوم جميل ، أليس كذلك؟',	1,	1,	'#FF3B3B',	'',	'',	'',	'',	'',	0,	5,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1086',	'',	'',	'',	'0',	'0',	'0',	''),
(16,	'bat_chuyen',	'هل يمكنك مساعدتي في تقييم تطبيق 5 نجوم هذا؟ ، عن طريق النقر على النجم الصحيح لي!',	1,	1,	'#F6FFA8',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'265',	'',	'',	'',	'0',	'0',	'0',	''),
(17,	'bat_chuyen',	'أنا شخص أفضل بسببك!',	1,	2,	'#A6FF24',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'164',	'',	'',	'',	'0',	'0',	'0',	''),
(18,	'bat_chuyen',	'آمل أن تكونوا يومًا عظيمًا حتى الآن.',	1,	3,	'#FF715E',	'',	'',	'',	'',	'',	0,	20,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'941',	'',	'',	'',	'0',	'0',	'0',	''),
(19,	'bam_bay',	'أنا لا أفهم',	0,	3,	'#A6FFD9',	'',	'',	'',	'',	'',	0,	13,	13,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'219',	'',	'',	'',	'0',	'0',	'0',	''),
(20,	'bam_bay',	'لم أفهم!',	0,	1,	'#96FFF5',	'',	'',	'',	'',	'',	0,	29,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'68',	'',	'',	'',	'0',	'0',	'0',	''),
(21,	'bam_bay',	'أنا غبي جدا ، أنا لا أفهم ما تقوله ، يمكنك أن تعلمني',	0,	3,	'#FFE3E8',	'',	'',	'',	'',	'',	0,	32,	12,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'220',	'',	'',	'',	'0',	'0',	'0',	''),
(22,	'bam_bay',	'أنا لا أفهم!',	1,	1,	'#FFA945',	'',	'',	'',	'',	'',	0,	34,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'844',	'',	'',	'',	'0',	'0',	'0',	''),
(23,	'bam_bay',	'أنا غبي جدا ، أنا لا أفهم ما تقوله ، يمكنك أن تعلمني',	1,	2,	'#FFCFAD',	'',	'',	'',	'',	'',	0,	14,	11,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'213',	'',	'',	'',	'0',	'0',	'0',	''),
(24,	'chao_0',	'لماذا لا تنام؟',	0,	2,	'#A3FF54',	'',	'',	'',	'',	'',	0,	29,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'383',	'',	'',	'',	'0',	'0',	'0',	''),
(25,	'chao_1',	'في وقت متأخر من الليل ، يجب أن تذهبي إلى الفراش مبكراً ، وأن البقاء متأخراً ليس جيداً للصحة',	0,	1,	'#FFD6FF',	'',	'',	'',	'',	'',	0,	21,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'716',	'',	'',	'',	'0',	'0',	'0',	''),
(26,	'chao_2',	'ليلة طويلة الى الامام؟ نحن هنا إذا كنت بحاجة إلى بعض الإلهام من العمارة.',	0,	3,	'#FFE0F3',	'',	'',	'',	'',	'',	0,	0,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'45',	'',	'',	'',	'0',	'0',	'0',	''),
(27,	'chao_3',	'صباح الخير ، استمتع بيوم جديد من العمل الممتع',	0,	1,	'#A3FF54',	'',	'',	'',	'',	'',	0,	5,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'383',	'',	'',	'',	'0',	'0',	'0',	''),
(28,	'chao_4',	'استيقظ مبكرا ، صباح الخير',	0,	2,	'#F4FF96',	'',	'',	'',	'',	'',	0,	21,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'424',	'',	'',	'',	'0',	'0',	'0',	''),
(29,	'chao_5',	'صباح الخير ، يوم جيد لك',	0,	1,	'#6FEB67',	'',	'',	'',	'',	'',	0,	32,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'497',	'',	'',	'',	'0',	'0',	'0',	''),
(30,	'chao_6',	'صباح الخير ، تناول وجبة الفطور للحصول على الطاقة ليوم جديد!',	0,	1,	'#FFF29C',	'',	'',	'',	'',	'',	0,	20,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'438',	'',	'',	'',	'0',	'0',	'0',	''),
(31,	'chao_6',	'صباح الخير! {ten_user}',	0,	2,	'#FF9CC9',	'',	'',	'',	'',	'',	0,	21,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'75',	'',	'',	'',	'0',	'0',	'0',	''),
(32,	'chao_7',	'صباح الخير يا حبيبي ، أتمنى لك يوما محظوظا وكثير من المرح',	0,	2,	'#FF3B3B',	'',	'',	'',	'',	'',	0,	34,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1086',	'',	'',	'',	'0',	'0',	'0',	''),
(33,	'chao_7',	'صباح الخير  {ten_user}',	0,	1,	'#91FFF5',	'',	'',	'',	'',	'',	0,	5,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'840',	'',	'',	'',	'0',	'0',	'0',	''),
(34,	'chao_8',	'صباح الخير ، استمتع بيوم جديد من العمل الممتع',	0,	1,	'#BDED6D',	'',	'',	'',	'',	'',	0,	32,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'503',	'',	'',	'',	'0',	'0',	'0',	''),
(35,	'chao_9',	'صباح الخير {ten_user} ، استمتع بيوم جديد من العمل الممتع',	0,	1,	'#ADFFCC',	'',	'',	'',	'',	'',	0,	5,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'48',	'',	'',	'',	'0',	'0',	'0',	''),
(36,	'chao_9',	'صباح الخير ، استمتع بيوم جيد!',	0,	2,	'#FFC7FB',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'695',	'',	'',	'',	'0',	'0',	'0',	''),
(37,	'chao_9',	'يوم جميل ، من الأفضل أن تعمل!',	0,	1,	'#E3F9FF',	'',	'',	'',	'',	'',	0,	34,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'415',	'',	'',	'',	'0',	'0',	'0',	''),
(38,	'chao_10',	'مرحبًا ، مررت صباحًا بسرعة أتمنى لك يومًا سعيدًا سعيدًا',	0,	1,	'#B0FFE5',	'',	'',	'',	'',	'',	0,	21,	14,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'433',	'',	'',	'',	'0',	'0',	'0',	''),
(39,	'chao_11',	'المتعة في وقت الغداء!',	0,	2,	'#66EAFF',	'',	'',	'',	'',	'',	0,	20,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'642',	'',	'',	'',	'0',	'0',	'0',	''),
(40,	'chao_12',	'طاب مسائك ! {ten_user}',	0,	2,	'#FEE6FF',	'',	'',	'',	'',	'',	0,	34,	13,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'460',	'',	'',	'',	'0',	'0',	'0',	''),
(41,	'chao_13',	'طاب مسائك ! {ten_user}',	0,	1,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	31,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(42,	'chao_13',	'طاب مسائك! كيف يومك؟',	0,	3,	'#FFE0F3',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'45',	'',	'',	'',	'0',	'0',	'0',	''),
(43,	'chao_14',	'مساء الخير وحظا سعيدا ، أنا أحبك',	0,	2,	'#FF0A8B',	'',	'',	'',	'',	'',	0,	34,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'431',	'',	'',	'',	'0',	'0',	'0',	''),
(44,	'chao_15',	'المتعة وسعيدة بعد الظهر!',	0,	1,	'#53FF19',	'',	'',	'',	'',	'',	0,	22,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1123',	'',	'',	'',	'0',	'0',	'0',	''),
(45,	'chao_15',	'مساء الخير',	0,	2,	'#FFEC30',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'339',	'',	'',	'',	'0',	'0',	'0',	''),
(46,	'chao_16',	'سعيد بعد الظهر ، الكثير من المرح ، تبقى معي',	0,	2,	'#4A97FF',	'',	'',	'',	'',	'',	0,	32,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'459',	'',	'',	'',	'0',	'0',	'0',	''),
(47,	'chao_17',	'بعد ظهر البارحة ، كان الأمر سريعًا جدًا ، وكان مستعدًا للترحيب بأمسية واحدة لإراحة أخيه',	0,	2,	'#C7FF94',	'',	'',	'',	'',	'',	0,	20,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1240',	'',	'',	'',	'0',	'0',	'0',	''),
(48,	'chao_17',	'طاب مسائك! أنا أحب أن أتحدث معك',	0,	1,	'#E30909',	'',	'',	'',	'',	'',	0,	29,	14,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'907',	'',	'',	'',	'0',	'0',	'0',	''),
(49,	'chao_18',	'مساء الخير',	0,	2,	'#FFB5E0',	'',	'',	'',	'',	'',	0,	34,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'934',	'',	'',	'',	'0',	'0',	'0',	''),
(50,	'chao_18',	'مساء الخير. آمل أن يكون لديك يوم منتجة حتى الآن!',	0,	1,	'#4271FF',	'',	'',	'',	'',	'',	0,	21,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'954',	'',	'',	'',	'0',	'0',	'0',	''),
(51,	'chao_19',	'مساء الخير لأتمنى لك أسرة سعيدة معك ، هذه الليلة تذهب للعب لا',	0,	2,	'#FFEC30',	'',	'',	'',	'',	'',	0,	24,	14,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'339',	'',	'',	'',	'0',	'0',	'0',	''),
(52,	'chao_20',	'مساء الخير! {ten_user}',	0,	2,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(53,	'chao_21',	'مساء الخير! {ten_user}',	0,	1,	'#FF9EF4',	'',	'',	'',	'',	'',	0,	20,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'984',	'',	'',	'',	'0',	'0',	'0',	''),
(54,	'chao_22',	'مساء الخير! {ten_user}',	0,	1,	'#FF00A0',	'',	'',	'',	'',	'',	0,	34,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'309',	'',	'',	'',	'0',	'0',	'0',	''),
(55,	'chao_22',	'مساء الخير ، مساء الخير!',	0,	2,	'#EFCFFF',	'',	'',	'',	'',	'',	0,	22,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(56,	'chao_23',	'في وقت متأخر من الليل ، لماذا لا تنام ، أو يمكننا الدردشة بين عشية وضحاها؟',	0,	2,	'#70FFED',	'',	'',	'',	'',	'',	0,	13,	1,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'448',	'',	'',	'',	'0',	'0',	'0',	''),
(57,	'dam',	'لماذا تضربني ، أنت تكرهني؟',	0,	3,	'#FFA945',	'',	'',	'',	'',	'',	0,	32,	8,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'844',	'',	'',	'',	'0',	'0',	'0',	''),
(58,	'dam',	'من فضلك لا تضايقني ، {ten_user}',	0,	2,	'#78F1FF',	'',	'',	'',	'',	'',	0,	22,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'214',	'',	'',	'',	'0',	'0',	'0',	''),
(59,	'dam',	'أنا أعرف الكاراتيه ، سأضربك',	0,	1,	'#7AFFC2',	'',	'',	'',	'',	'',	0,	38,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'845',	'',	'',	'',	'0',	'0',	'0',	''),
(60,	'dam',	'أقترح عليك التوقف الآن.',	0,	3,	'#FBCFFF',	'',	'',	'',	'',	'',	0,	20,	8,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1020',	'',	'',	'',	'0',	'0',	'0',	''),
(61,	'dam',	'ما تتحمل!',	0,	1,	'#96FFF5',	'',	'',	'',	'',	'',	0,	14,	14,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'68',	'',	'',	'',	'0',	'0',	'0',	''),
(62,	'dam',	'أنا أحب أن أكون من حولك.',	0,	1,	'#FFD6FF',	'',	'',	'',	'',	'',	0,	34,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'716',	'',	'',	'',	'0',	'0',	'0',	''),
(63,	'dam',	'كم هي الحياة الرائعة ، أنت الآن في العالم.',	0,	2,	'#BDED6D',	'',	'',	'',	'',	'',	0,	32,	10,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'503',	'',	'',	'',	'0',	'0',	'0',	''),
(64,	'dam',	'لا تفعل ذلك ، أنا مستاء',	0,	1,	'#FFF7A3',	'',	'',	'',	'',	'',	0,	3,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1226',	'',	'',	'',	'0',	'0',	'0',	''),
(65,	'chua_bat_dinh_vi',	'أنت لا تمنح المواقع العالمية أو لا لتفعيلها! لذلك لا أستطيع تحديد مكانك!',	0,	1,	'#FF9180',	'',	'',	'',	'',	'',	0,	32,	12,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(66,	'giai_toan',	'نتيجة الرياضيات هي:\r\n {giai_toan}\r\n\r\n(* هو ضرب ، / هو تقسيم)',	0,	1,	'#91FEFF',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'512',	'',	'',	'',	'0',	'0',	'0',	''),
(67,	'khong_tim_thay',	'آسف! لم يتم العثور على المعلومات التي تسعى!',	0,	1,	'#B0FFE3',	'',	'',	'',	'',	'',	0,	14,	13,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'88',	'',	'',	'',	'0',	'0',	'0',	''),
(68,	'tim_thay',	' {thong_tin}',	0,	2,	'#CCFF82',	'',	'',	'',	'',	'',	0,	20,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'838',	'',	'',	'',	'0',	'0',	'0',	''),
(69,	'hien_ds_sdt',	'لقد وجدت الاتصالات ذات الصلة! انقر لعرض التفاصيل أو الاتصال بهم!',	0,	2,	'#36FF81',	'',	'',	'',	'',	'',	31,	34,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'247',	'',	'',	'',	'0',	'0',	'0',	''),
(70,	'thong_bao',	'ماذا تفعل؟ من فضلكم تعالوا معي',	0,	1,	'#63FFC9',	'',	'',	'',	'',	'',	0,	34,	13,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1067',	'',	'',	'',	'0',	'0',	'0',	''),
(71,	'thong_bao',	'أتمنى لك نهارا سعيد. انا اتذكرك',	0,	2,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	14,	13,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(72,	'thong_bao',	'اشتقت لك ، يرجى التحدث معي',	0,	2,	'#FFADCD',	'',	'',	'',	'',	'',	0,	34,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'451',	'',	'',	'',	'0',	'0',	'0',	''),
(73,	'thong_bao',	'لم نتحدث منذ فترة طويلة ، وأتطلع إلى رؤيتك مرة أخرى',	0,	3,	'#BDED6D',	'',	'',	'',	'',	'',	0,	32,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'503',	'',	'',	'',	'0',	'0',	'0',	''),
(74,	'chao_0',	'أنا ذاهب للنوم الآن ، أنا أضرب',	1,	3,	'#FF96ED',	'',	'',	'',	'',	'',	0,	34,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'98',	'',	'',	'',	'0',	'0',	'0',	''),
(75,	'chao_1',	'يجب أن تذهب إلى الفراش في وقت مبكر',	1,	3,	'#FBCFFF',	'',	'',	'',	'',	'',	0,	34,	8,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1020',	'',	'',	'',	'0',	'0',	'0',	''),
(76,	'chao_2',	'مرحباً ، متأخرة جداً ، يجب أن تذهب إلى السرير!',	1,	1,	'#A3FF54',	'',	'',	'',	'',	'',	0,	5,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'383',	'',	'',	'',	'0',	'0',	'0',	''),
(77,	'chao_3',	'كان هناك بالفعل في الصباح ، يجب أن أذهب للنوم ، للحصول على صحة جيدة',	1,	2,	'#FF6EA7',	'',	'',	'',	'',	'',	0,	29,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'679',	'',	'',	'',	'0',	'0',	'0',	''),
(78,	'chao_4',	'مرحبا لطيف ، اليوم لماذا كنت في وقت مبكر جدا؟ ، هل يوم جميل',	1,	2,	'#FFEC30',	'',	'',	'',	'',	'',	0,	21,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'339',	'',	'',	'',	'0',	'0',	'0',	''),
(79,	'chao_5',	'مرحبا ، يوم جديد هو موضع ترحيب ، صباح الخير!',	1,	2,	'#A8FF85',	'',	'',	'',	'',	'',	0,	22,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'471',	'',	'',	'',	'0',	'0',	'0',	''),
(80,	'chao_6',	'مهلا ، أنت تبدو جميلة اليوم ، صباح الخير!',	1,	1,	'#B5FFFB',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'640',	'',	'',	'',	'0',	'0',	'0',	''),
(81,	'chao_6',	'صباح الخير! {ten_user}',	1,	2,	'#FF9736',	'',	'',	'',	'',	'',	0,	5,	16,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1126',	'',	'',	'',	'0',	'0',	'0',	''),
(82,	'chao_7',	'صباح الخير! {ten_user}',	1,	2,	'#F2EBFF',	'',	'',	'',	'',	'',	0,	34,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'719',	'',	'',	'',	'0',	'0',	'0',	''),
(83,	'chao_7',	'مرحبا صباح الخير! كل الأشياء الجيدة سوف تأتي إليك!',	1,	1,	'#47BEFF',	'',	'',	'',	'',	'',	0,	14,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1088',	'',	'',	'',	'0',	'0',	'0',	''),
(84,	'chao_8',	'صباح الخير ، اليوم أفعل؟',	1,	1,	'#FBFF91',	'',	'',	'',	'',	'',	0,	20,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'87',	'',	'',	'',	'0',	'0',	'0',	''),
(85,	'chao_9',	'مرحبًا {ten_user} ، أنا دائمًا بجانبك!',	1,	2,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	28,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(86,	'chao_9',	'صباح الخير ، استمتع بيوم جيد!',	1,	2,	'#F4FF96',	'',	'',	'',	'',	'',	0,	33,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'424',	'',	'',	'',	'0',	'0',	'0',	''),
(87,	'chao_9',	'يوم جميل ، من الأفضل أن تعمل!',	1,	1,	'#FFD6FF',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'716',	'',	'',	'',	'0',	'0',	'0',	''),
(88,	'chao_10',	'الوقت يمر بسرعة ، كنت نعتز الوقت!',	1,	2,	'#6AE866',	'',	'',	'',	'',	'',	0,	29,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'447',	'',	'',	'',	'0',	'0',	'0',	''),
(89,	'chao_11',	'قم بإعداد الغداء بعد ، عزيزي!',	1,	3,	'#FFBB5C',	'',	'',	'',	'',	'',	0,	34,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1253',	'',	'',	'',	'0',	'0',	'0',	''),
(90,	'chao_12',	'أتمنى لك وجبات الغداء اللذيذة!',	1,	2,	'#FFADCD',	'',	'',	'',	'',	'',	0,	22,	16,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'451',	'',	'',	'',	'0',	'0',	'0',	''),
(91,	'chao_13',	'طاب مسائك! كيف يومك؟',	1,	1,	'#FBFFD9',	'',	'',	'',	'',	'',	0,	5,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'839',	'',	'',	'',	'0',	'0',	'0',	''),
(92,	'chao_14',	'مساء الخير ، أتمنى لكم حظاً طيباً. سوف أكون دائما بجانبك.',	1,	2,	'#F7DAAD',	'',	'',	'',	'',	'',	0,	21,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'612',	'',	'',	'',	'0',	'0',	'0',	''),
(93,	'chao_15',	'مساء الخير ، مرت حقائق سريعة ، دعنا نضحك منكم',	1,	3,	'#FF3072',	'',	'',	'',	'',	'',	0,	34,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1091',	'',	'',	'',	'0',	'0',	'0',	''),
(94,	'chao_15',	'طاب مسائك ! {ten_user}',	1,	2,	'#FBFF36',	'',	'',	'',	'',	'',	0,	5,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'926',	'',	'',	'',	'0',	'0',	'0',	''),
(95,	'chao_16',	'مساء الخير ، ونرحب بغروب الشمس الجميل ، تبتسم',	1,	2,	'#FFEC30',	'',	'',	'',	'',	'',	0,	22,	16,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'339',	'',	'',	'',	'0',	'0',	'0',	''),
(96,	'chao_17',	'مساء الخير!',	1,	2,	'#BFC9FF',	'',	'',	'',	'',	'',	0,	31,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'701',	'',	'',	'',	'0',	'0',	'0',	''),
(97,	'chao_18',	'أتمنى أن يكون لديك عشاء جيد',	1,	1,	'#FFBFD8',	'',	'',	'',	'',	'',	0,	34,	13,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'751',	'',	'',	'',	'0',	'0',	'0',	''),
(98,	'chao_19',	'مساء ممتع ، هذا المساء نعود؟',	1,	2,	'#B3FFF5',	'',	'',	'',	'',	'',	0,	31,	14,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'452',	'',	'',	'',	'0',	'0',	'0',	''),
(99,	'chao_19',	'مساء الخير. آمل أن يكون لديك يوم منتجة حتى الآن!',	1,	3,	'#90FF47',	'',	'',	'',	'',	'',	0,	24,	14,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'819',	'',	'',	'',	'0',	'0',	'0',	''),
(100,	'chao_20',	'ليلة سعيدة ، هل يمكنك الذهاب الليلة؟',	1,	1,	'#59B6FF',	'',	'',	'',	'',	'',	0,	20,	16,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'630',	'',	'',	'',	'0',	'0',	'0',	''),
(101,	'chao_21',	'أراك وجه حزين الليلة.',	1,	2,	'#FF2973',	'',	'',	'',	'',	'',	0,	22,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1161',	'',	'',	'',	'0',	'0',	'0',	''),
(102,	'chao_22',	'الأيام الأخيرة! أنت نائم بعد؟',	1,	1,	'#FFA8F0',	'',	'',	'',	'',	'',	0,	13,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'478',	'',	'',	'',	'0',	'0',	'0',	''),
(103,	'chao_23',	'مرحبا {ten_user}! هيا نتحدث',	1,	2,	'#FFD6FF',	'',	'',	'',	'',	'',	0,	22,	14,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'716',	'',	'',	'',	'0',	'0',	'0',	''),
(104,	'dam',	'أنا أعرف الكاراتيه ، سأضربك!',	1,	3,	'#FFA945',	'',	'',	'',	'',	'',	0,	37,	8,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'844',	'',	'',	'',	'0',	'0',	'0',	''),
(105,	'dam',	'لماذا تضربني ، أنت تكرهني بشكل صحيح؟',	1,	2,	'#78F1FF',	'',	'',	'',	'',	'',	0,	22,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'214',	'',	'',	'',	'0',	'0',	'0',	''),
(106,	'dam',	'أنت مجنون!',	1,	3,	'#FBCFFF',	'',	'',	'',	'',	'',	0,	32,	13,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1020',	'',	'',	'',	'0',	'0',	'0',	''),
(107,	'dam',	'لا تلمسني!',	1,	1,	'#FFCFAD',	'',	'',	'',	'',	'',	0,	39,	11,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'213',	'',	'',	'',	'0',	'0',	'0',	''),
(108,	'dam',	'لماذا تلمسني؟',	1,	1,	'#E5FF94',	'',	'',	'',	'',	'',	0,	29,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'846',	'',	'',	'',	'0',	'0',	'0',	''),
(109,	'dam',	'أنا متعب! ، ربما أنا مريض!',	1,	0,	'#FEFF66',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'842',	'',	'',	'',	'0',	'0',	'0',	''),
(110,	'dam',	'أقترح عليك التوقف الآن.',	1,	3,	'#1CAFFF',	'',	'',	'',	'',	'',	0,	37,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1179',	'',	'',	'',	'0',	'0',	'0',	''),
(111,	'dam',	'من فضلك لا تضايقني ، {ten_user}',	1,	2,	'#96FFF5',	'',	'',	'',	'',	'',	0,	22,	5,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'68',	'',	'',	'',	'0',	'0',	'0',	''),
(112,	'dam',	'سأتخلى عن حياتي إذا استطعت أن أتحلى بسماعة واحدة من عينيك ، لمسة واحدة من يدك.',	1,	1,	'#BDFFCD',	'',	'',	'',	'',	'',	0,	3,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'216',	'',	'',	'',	'0',	'0',	'0',	''),
(113,	'dam',	'فكرة تجلب لك ابتسامة على وجهي',	1,	1,	'#FFEC30',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'339',	'',	'',	'',	'0',	'0',	'0',	''),
(114,	'dam',	'أنت مصدر إلهام لي',	1,	1,	'#CFADFF',	'',	'',	'',	'',	'',	0,	22,	16,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'641',	'',	'',	'',	'0',	'0',	'0',	''),
(115,	'dam',	'كم هي الحياة الرائعة ، أنت الآن في العالم.',	1,	1,	'#B5FFFB',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'640',	'',	'',	'',	'0',	'0',	'0',	''),
(116,	'chua_bat_dinh_vi',	'أنت لا تمنح المواقع العالمية أو لا لتفعيلها! لذلك لا أستطيع تحديد مكانك!',	1,	1,	'#FF9180',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(117,	'giai_toan',	'نتيجة الرياضيات هي:\r\n {giai_toan}',	1,	2,	'#91FEFF',	'',	'',	'',	'',	'',	0,	32,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'512',	'',	'',	'',	'0',	'0',	'0',	''),
(118,	'tim_thay',	' {thong_tin}',	1,	1,	'#CCFF82',	'',	'',	'',	'',	'',	0,	20,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'838',	'',	'',	'',	'0',	'0',	'0',	''),
(119,	'khong_tim_thay',	'آسف! لم يتم العثور على المعلومات التي تسعى!',	1,	1,	'#B3FEFF',	'',	'',	'',	'',	'',	0,	22,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'212',	'',	'',	'',	'0',	'0',	'0',	''),
(120,	'thong_bao',	'ماذا تفعل؟ من فضلكم تعالوا معي',	1,	2,	'#FFD6FF',	'',	'',	'',	'',	'',	0,	34,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'716',	'',	'',	'',	'0',	'0',	'0',	''),
(121,	'thong_bao',	'أتمنى لك نهارا سعيد. انا اتذكرك',	1,	1,	'#BDED6D',	'',	'',	'',	'',	'',	0,	22,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'503',	'',	'',	'',	'0',	'0',	'0',	''),
(122,	'thong_bao',	'اشتقت لك ، يرجى التحدث معي',	1,	2,	'#FFEACF',	'',	'',	'',	'',	'',	0,	14,	12,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'423',	'',	'',	'',	'0',	'0',	'0',	''),
(123,	'thong_bao',	'لم نتحدث منذ فترة طويلة ، وأتطلع إلى رؤيتك مرة أخرى',	1,	1,	'#FF2973',	'',	'',	'',	'',	'',	0,	27,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1161',	'',	'',	'',	'0',	'0',	'0',	''),
(124,	'hien_ds_sdt',	'لقد وجدت الاتصالات ذات الصلة! انقر لعرض التفاصيل أو الاتصال بهم!',	1,	2,	'#36FF81',	'',	'',	'',	'',	'',	31,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'247',	'',	'',	'',	'0',	'0',	'0',	''),
(125,	'bat_chuyen',	'أتمنى لك الكثير من المفاجآت مجفل والمرح مخيفة في عيد هالوين',	0,	2,	'#87FFD8',	'',	'',	'',	'',	'',	0,	29,	2,	0,	'',	1,	1,	0,	'',	1,	30,	10,	'320',	'',	'',	'',	'0',	'0',	'0',	''),
(126,	'dam',	'أتمنى لك الكثير من المفاجآت مجفل والمرح مخيفة في عيد هالوين',	1,	1,	'#E8FFEF',	'',	'',	'',	'',	'',	0,	14,	15,	0,	'',	0,	1,	0,	'',	1,	30,	10,	'895',	'',	'',	'',	'0',	'0',	'0',	''),
(127,	'bat_chuyen',	'شهر تشرين الثاني / نوفمبر جاء في طريقك جعلها واحدة مذهلة ، لا يهم إذا كان الطقس سيئاً ، لأن مزاجك ليس جيداً على الإطلاق عليك فقط أن تقف طويلاً وتكون سعيداً.',	0,	1,	'#FF2973',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	1,	1,	0,	'',	1,	0,	11,	'1161',	'',	'',	'',	'0',	'0',	'0',	''),
(128,	'bat_chuyen',	'شهر تشرين الثاني / نوفمبر جاء في طريقك جعلها واحدة مذهلة ، لا يهم إذا كان الطقس سيئاً ، لأن مزاجك ليس جيداً على الإطلاق عليك فقط أن تقف طويلاً وتكون سعيداً.',	1,	2,	'#FF0A8B',	'',	'',	'',	'',	'',	0,	0,	3,	0,	'',	0,	1,	0,	'',	1,	0,	11,	'431',	'',	'',	'',	'0',	'0',	'0',	''),
(129,	'hoi_tim_duong',	'ما العنوان الذي تريد البحث عنه؟ سوف أرشدك!',	0,	1,	'#FFB11F',	'',	'',	'',	'',	'',	0,	34,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1076',	'',	'',	'',	'0',	'0',	'0',	''),
(130,	'hoi_tim_duong',	'ما العنوان الذي تريد البحث عنه؟ سوف أرشدك!',	1,	2,	'#C4FFFE',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1236',	'',	'',	'',	'0',	'0',	'0',	''),
(131,	'tra_loi_tim_duong',	'لقد سردت عمليات البحث ذات الصلة!',	0,	2,	'#C4FFFA',	'',	'',	'',	'',	'',	43,	20,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'402',	'',	'',	'',	'0',	'0',	'0',	''),
(132,	'tra_loi_tim_duong',	'لقد سردت عمليات البحث ذات الصلة!',	1,	1,	'#9CFFF2',	'',	'',	'',	'',	'',	43,	32,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'44',	'',	'',	'',	'0',	'0',	'0',	''),
(133,	'dam',	'اليوم هو يوم الجمعة ، يوم عمل ممل ، أتطلع إلى الراحة غداً.',	0,	3,	'#FFD33D',	'',	'',	'',	'',	'',	0,	22,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'611',	'Friday',	'',	'',	'0',	'0',	'0',	''),
(134,	'dam',	'اليوم هو يوم الجمعة ، يوم عمل ممل ، أتطلع إلى الراحة غداً.',	1,	1,	'#FFA53B',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'882',	'Friday',	'',	'',	'0',	'0',	'0',	''),
(135,	'dam',	'اليوم هو عطلة نهاية الأسبوع ، وقضاء الكثير من الوقت يتحدث معي سوف تكون سعيدة',	0,	2,	'#F9FFC9',	'',	'',	'',	'',	'',	0,	10,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'649',	'Saturday',	'',	'',	'0',	'0',	'0',	''),
(136,	'dam',	'اليوم هو عطلة نهاية الأسبوع ، وقضاء الكثير من الوقت يتحدث معي سوف تكون سعيدة',	1,	3,	'#0AD2FF',	'',	'',	'',	'',	'',	0,	6,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1056',	'Saturday',	'',	'',	'0',	'0',	'0',	''),
(137,	'dam',	'اليوم هو يوم الاثنين ، أتمنى لك أسبوعًا جديدًا سعيدًا',	0,	2,	'#F21B1B',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'944',	'Monday',	'',	'',	'0',	'0',	'0',	''),
(138,	'dam',	'اليوم هو يوم الاثنين ، أتمنى لك أسبوعًا جديدًا سعيدًا',	1,	1,	'#87CEFF',	'',	'',	'',	'',	'',	0,	10,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'494',	'Monday',	'',	'',	'0',	'0',	'0',	''),
(139,	'dam',	'اليوم هو يوم الثلاثاء ، حظا سعيدا لك',	0,	3,	'#FFF48A',	'',	'',	'',	'',	'',	0,	20,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'473',	'Tuesday',	'',	'',	'0',	'0',	'0',	''),
(140,	'dam',	'اليوم هو يوم الثلاثاء ، حظا سعيدا لك',	1,	2,	'#CDFFBF',	'',	'',	'',	'',	'',	0,	10,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1193',	'Tuesday',	'',	'',	'0',	'0',	'0',	''),
(141,	'dam',	'اليوم هو يوم الأربعاء ، يوم ممل جدا',	0,	0,	'#FFEF52',	'',	'',	'',	'',	'',	0,	0,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'373',	'Wednesday',	'',	'',	'0',	'0',	'0',	''),
(142,	'dam',	'اليوم هو يوم الأربعاء ، يوم ممل جدا',	1,	0,	'#FFC09E',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'963',	'Wednesday',	'',	'',	'0',	'0',	'0',	''),
(143,	'dam',	'اليوم هو يوم الخميس ، آمل كل يوم البقاء معك',	0,	2,	'#58B837',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'613',	'Thursday',	'',	'',	'0',	'0',	'0',	''),
(144,	'dam',	'اليوم هو يوم الخميس ، آمل كل يوم البقاء معك',	1,	2,	'#FF8CEF',	'',	'',	'',	'',	'',	0,	16,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'624',	'Thursday',	'',	'',	'0',	'0',	'0',	''),
(145,	'bat_chuyen',	'اليوم هو يوم الخميس ، أتمنى أن يكون يوم تعلم ممتع وعمل شاق',	0,	3,	'#BAFF59',	'',	'',	'',	'',	'',	0,	10,	1,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'996',	'Thursday',	'',	'',	'0',	'0',	'0',	''),
(146,	'bat_chuyen',	'اليوم هو يوم الخميس ، أتمنى أن يكون يوم تعلم ممتع وعمل شاق',	1,	2,	'#66FCFF',	'',	'',	'',	'',	'',	0,	22,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1232',	'Thursday',	'',	'',	'0',	'0',	'0',	''),
(147,	'dam',	'أتمنى أن يكون عيد الميلاد هذا مميزًا لدرجة أنك لن تشعر أبدًا بالوحدة مجددًا وأن تكون محاطًا بأحبائك طوال الوقت!',	0,	2,	'#FFF33D',	'',	'',	'',	'',	'',	7,	16,	0,	0,	'',	1,	1,	0,	'',	1,	0,	12,	'62',	'',	'',	'',	'0',	'0',	'0',	''),
(148,	'dam',	'أتمنى أن يكون عيد الميلاد هذا مميزًا لدرجة أنك لن تشعر أبدًا بالوحدة مجددًا وأن تكون محاطًا بأحبائك طوال الوقت!',	1,	3,	'#FF8CBD',	'',	'',	'',	'',	'',	7,	18,	0,	0,	'',	0,	1,	0,	'',	1,	0,	12,	'143',	'',	'',	'',	'0',	'0',	'0',	''),
(149,	'dam',	'اليوم هو يوم الأحد ، دعونا نخرج معا',	0,	2,	'#FFE1B3',	'',	'',	'',	'',	'',	0,	8,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'748',	'Sunday',	'',	'',	'0',	'0',	'0',	''),
(150,	'dam',	'اليوم هو يوم الأحد ، دعونا نخرج معا',	1,	2,	'#FEFFBD',	'',	'',	'',	'',	'',	0,	8,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1185',	'Sunday',	'',	'',	'0',	'0',	'0',	''),
(151,	'bat_chuyen',	'عام جديد جيد ، صحة جيدة ، حظ سعيد في كل مكان ، القيام بأشياء جديدة',	0,	2,	'#F4FF96',	'',	'',	'',	'',	'',	0,	32,	3,	0,	'',	1,	1,	0,	'',	1,	1,	1,	'424',	'',	'',	'',	'0',	'0',	'0',	''),
(152,	'dam',	'سنه جديده سعيده. أتمنى أن يكون لديك عام جديد سعيد ، سعيد وتلبية العديد من الأشياء المحظوظة',	0,	1,	'#FFF369',	'',	'',	'',	'',	'',	0,	22,	17,	0,	'',	1,	1,	0,	'',	1,	1,	1,	'1473',	'',	'',	'',	'0',	'0',	'0',	''),
(153,	'bat_chuyen',	'أتمنى لكم كل عام من السنة الجديدة مليئة بالنجاح والسعادة والازدهار لكم ، كل عام وأنتم بخير.',	0,	1,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	21,	3,	0,	'',	1,	1,	0,	'',	1,	0,	1,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(154,	'bat_chuyen',	'سنه جديده سعيده. أتمنى أن يكون لديك عام جديد سعيد ، سعيد وتلبية العديد من الأشياء المحظوظة',	1,	2,	'#FFC4FD',	'',	'',	'',	'',	'',	0,	5,	15,	0,	'',	0,	1,	0,	'',	1,	1,	1,	'381',	'',	'',	'',	'0',	'0',	'0',	''),
(155,	'dam',	'عام جديد جيد ، صحة جيدة ، حظ سعيد في كل مكان ، القيام بأشياء جديدة',	1,	1,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	21,	15,	0,	'',	0,	1,	0,	'',	1,	1,	1,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(156,	'bat_chuyen',	'أتمنى لكم كل عام من السنة الجديدة مليئة بالنجاح والسعادة والازدهار لكم ، كل عام وأنتم بخير.',	1,	2,	'#F4FF96',	'',	'',	'',	'',	'',	0,	22,	3,	0,	'',	0,	1,	0,	'',	1,	0,	1,	'424',	'',	'',	'',	'0',	'0',	'0',	''),
(157,	'bat_chuyen',	'شهر فبراير هو الشهر الثاني من السنة وله 28 يومًا من ذلك ، لذا كن سعيدًا للاحتفال به تمامًا ، واستمتع بجميع الطرق لأنه يأتي مرة واحدة في السنة واحصل على عيد الحب فيه.',	0,	2,	'#FF9CC9',	'',	'',	'',	'',	'',	0,	32,	2,	0,	'',	1,	1,	0,	'',	1,	0,	2,	'75',	'',	'3',	'',	'0',	'0',	'0',	''),
(158,	'dam',	'شهر فبراير يعني بداية جديدة من الحب والورود حتى تكون جاهزًا لشهر جديد سعيد',	0,	2,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	22,	3,	0,	'',	1,	1,	0,	'',	1,	0,	2,	'377',	'',	'3',	'',	'0',	'0',	'0',	''),
(159,	'bat_chuyen',	'في عيد الحب هذا ، أتوق إلى القبلات الحلوة ، وعناقك الدافئ ، والسحر الذي يربط قلوبنا ببعضها.',	0,	1,	'#FFADCD',	'',	'',	'',	'',	'',	1,	34,	0,	0,	'',	1,	1,	0,	'',	1,	14,	2,	'451',	'',	'3',	'2',	'0',	'0',	'0',	''),
(160,	'dam',	'أتمنى أن يكون عيد الحب سعيدًا وسعيدًا مع حبك. أتمنى لك عيد الحب!',	0,	2,	'#FFEC30',	'',	'',	'',	'',	'',	0,	22,	0,	0,	'',	1,	1,	0,	'',	1,	14,	2,	'339',	'',	'3',	'2',	'0',	'0',	'0',	''),
(161,	'bat_chuyen',	'شهر فبراير هو الشهر الثاني من السنة وله 28 يومًا من ذلك ، لذا كن سعيدًا للاحتفال به تمامًا ، واستمتع بجميع الطرق لأنه يأتي مرة واحدة في السنة واحصل على عيد الحب فيه.',	1,	2,	'#B3FFCF',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	1,	0,	'',	1,	0,	2,	'430',	'',	'3',	'',	'0',	'0',	'0',	''),
(162,	'dam',	'شهر فبراير يعني بداية جديدة من الحب والورود حتى تكون جاهزًا لشهر جديد سعيد',	1,	2,	'#F7F0FF',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	0,	1,	0,	'',	1,	0,	2,	'918',	'',	'3',	'',	'0',	'0',	'0',	''),
(163,	'bat_chuyen',	'في عيد الحب هذا ، أتوق إلى القبلات الحلوة ، وعناقك الدافئ ، والسحر الذي يربط قلوبنا ببعضها.',	1,	2,	'#FFEC30',	'',	'',	'',	'',	'',	0,	22,	2,	0,	'',	0,	1,	0,	'',	1,	14,	2,	'339',	'',	'3',	'2',	'0',	'0',	'0',	''),
(164,	'dam',	'أتمنى أن يكون عيد الحب سعيدًا وسعيدًا مع حبك. أتمنى لك عيد الحب!',	1,	1,	'#C7FFA3',	'',	'',	'',	'',	'',	1,	34,	2,	0,	'',	0,	1,	0,	'',	1,	14,	2,	'377',	'',	'3',	'2',	'0',	'0',	'0',	''),
(165,	'bat_chuyen',	'كان واحدا من تلك الأيام مارس عندما تشرق الشمس الساخنة والرياح تهب البرد:\r\nعندما يكون الصيف في الضوء ، والشتاء في الظل',	0,	2,	'#ADFFCC',	'',	'',	'',	'',	'',	0,	0,	6,	0,	'',	1,	0,	0,	'',	1,	0,	3,	'48',	'',	'4',	'',	'0',	'0',	'0',	''),
(166,	'bat_chuyen',	'كان واحدا من تلك الأيام مارس عندما تشرق الشمس الساخنة والرياح تهب البرد:\r\nعندما يكون الصيف في الضوء ، والشتاء في الظل',	1,	2,	'#ADFFCC',	'',	'',	'',	'',	'',	0,	0,	6,	0,	'',	0,	0,	0,	'',	1,	0,	3,	'48',	'',	'4',	'',	'0',	'0',	'0',	''),
(167,	'dam',	'مسيرة ، عندما تصبح أيام طويلة ، دع ساعات النمو الخاصة بك تكون قوية لوضع الصحيح بعض الشتوية خطأ.',	0,	2,	'#E9FFA3',	'',	'',	'',	'',	'',	0,	0,	6,	0,	'',	1,	0,	0,	'',	1,	0,	3,	'46',	'',	'4',	'',	'0',	'0',	'0',	''),
(168,	'dam',	'مسيرة ، عندما تصبح أيام طويلة ، دع ساعات النمو الخاصة بك تكون قوية لوضع الصحيح بعض الشتوية خطأ.',	1,	2,	'#E9FFA3',	'',	'',	'',	'',	'',	0,	0,	6,	0,	'',	0,	0,	0,	'',	1,	0,	3,	'46',	'',	'4',	'',	'0',	'0',	'0',	''),
(169,	'bat_chuyen',	'أبريل وعد يتعهد أيار بالحفاظ عليه.',	0,	2,	'#3EF032',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'ar',	1,	1,	0,	'',	1,	0,	4,	'876',	'',	'2',	'2',	'0',	'0',	'0',	''),
(170,	'bat_chuyen',	'أبريل وعد يتعهد أيار بالحفاظ عليه.',	1,	1,	'#42D6FF',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'ar',	0,	1,	0,	'',	1,	0,	4,	'1603',	'',	'2',	'2',	'0',	'0',	'0',	''),
(171,	'bat_chuyen',	'لقد جاء شهر أيار (مايو) ، عندما يبدأ كل قلب مفعم بالحيوية في الازدهار ، ويثمر ثماره',	0,	2,	'#F21B1B',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'ar',	1,	1,	0,	'',	1,	0,	5,	'944',	'',	'2',	'4',	'0',	'0',	'0',	''),
(172,	'dam',	'الموسم المفضل في العالم هو الربيع. كل الأشياء تبدو ممكنة في مايو',	0,	3,	'#EAFFAB',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'ar',	1,	1,	0,	'',	1,	0,	5,	'1614',	'',	'2',	'4',	'0',	'0',	'0',	''),
(173,	'dam',	'أعلم جيدًا أن أمطار يونيو تسقط.',	0,	3,	'#D7FF26',	'',	'',	'',	'',	'',	5,	1,	4,	0,	'ar',	1,	1,	0,	'',	1,	0,	6,	'1051',	'',	'2',	'2',	'0',	'0',	'0',	''),
(174,	'bat_chuyen',	'إنه شهر يونيو ، شهر الإجازات والورود ، عندما تحيي المشاهد اللطيفة العيون ورائحة الأنف.',	0,	2,	'#FF6200',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'ar',	1,	1,	0,	'',	1,	0,	6,	'1455',	'',	'2',	'2',	'0',	'0',	'0',	''),
(175,	'bat_chuyen',	'إنه شهر يونيو ، شهر الإجازات والورود ، عندما تحيي المشاهد اللطيفة العيون ورائحة الأنف.',	1,	2,	'#0DFF21',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'ar',	0,	1,	0,	'',	1,	0,	6,	'1016',	'',	'2',	'4',	'0',	'0',	'0',	''),
(176,	'dam',	'أعلم جيدًا أن أمطار يونيو تسقط.',	1,	1,	'#29FFDF',	'',	'',	'',	'',	'',	5,	1,	0,	0,	'ar',	0,	1,	0,	'',	1,	0,	6,	'1594',	'',	'2',	'4',	'0',	'0',	'0',	''),
(177,	'dam',	'كل ما يجلبه لك يوليو ، سواء أكان جيدًا أم سيئًا ؛ احتفظ دائمًا بهذه الابتسامة على وجهك مهما كان الأمر.',	0,	1,	'#C1FF5E',	'',	'',	'',	'',	'',	0,	16,	1,	0,	'ar',	1,	1,	0,	'',	1,	0,	7,	'1004',	'',	'2',	'4',	'0',	'0',	'0',	''),
(178,	'dam',	'كل ما يجلبه لك يوليو ، سواء أكان جيدًا أم سيئًا. احتفظ دائمًا بهذه الابتسامة على وجهك مهما كان الأمر.',	1,	2,	'#FF1205',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'ar',	0,	1,	0,	'',	1,	0,	7,	'1469',	'',	'2',	'4',	'0',	'0',	'0',	''),
(179,	'bat_chuyen',	'ما هو جيد دفء الصيف ، دون البرد في فصل الشتاء لمنحه حلاوة.',	1,	2,	'#FBFF9C',	'',	'',	'',	'',	'',	0,	18,	2,	0,	'ar',	0,	1,	0,	'',	1,	0,	7,	'498',	'',	'2',	'4',	'0',	'0',	'0',	''),
(180,	'bat_chuyen',	'رياح نهاية الصيف تجعل الناس مضطربين.',	0,	0,	'#FCFF69',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'ar',	1,	1,	0,	'',	1,	0,	7,	'1052',	'',	'2',	'4',	'0',	'0',	'0',	''),
(181,	'bat_chuyen',	'أنا أحب سبتمبر ، خاصة عندما تكون معي!',	0,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'ar',	1,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(182,	'bat_chuyen',	'أنا أحب سبتمبر ، خاصة عندما تكون معي!',	1,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'ar',	0,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(183,	'bat_chuyen',	'موسم عيد الميلاد هو هنا. أتمنى لكم موسم عيد ميلاد سعيد ، سعيد ولا تدع البرد. عيد ميلاد سعيد.',	0,	2,	'#FBFF1F',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'ar',	1,	1,	0,	'',	1,	0,	12,	'1411',	'',	'2',	'4',	'0',	'0',	'0',	''),
(184,	'bat_chuyen',	'موسم عيد الميلاد هو هنا. أتمنى لك عيد ميلاد سعيد وسعيد ولا تدع نفسك يصاب بالبرد. عيد ميلاد سعيد.',	1,	2,	'#BFFFAD',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'ar',	0,	1,	0,	'',	1,	0,	12,	'1415',	'',	'2',	'4',	'0',	'0',	'0',	''),
(185,	'thong_bao',	'الشتاء بارد جدًا ، {ten_user}! إذا خرجت ، ارتدي الكثير من الملابس الدافئة لتجنب ذلك!',	0,	1,	'#FEFFC2',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'ar',	1,	1,	0,	'',	1,	0,	12,	'1127',	'',	'',	'4',	'0',	'0',	'0',	''),
(186,	'bat_chuyen',	'خلال موسم Covid 19 ، يجب أن تكون حريصًا على عدم التركيز على الأماكن المزدحمة ويجب عليك ارتداء قناع أينما ذهبت!',	0,	3,	'#FFFBD1',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'ar',	1,	0,	0,	'',	1,	0,	0,	'1615',	'',	'2',	'4',	'0',	'0',	'0',	''),
(187,	'bat_chuyen',	'خلال موسم Covid 19 ، يجب أن تكون حريصًا على عدم التركيز على الأماكن المزدحمة ويجب عليك ارتداء قناع أينما ذهبت!',	1,	3,	'#E6C9FF',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'ar',	0,	0,	0,	'',	1,	0,	0,	'179',	'',	'2',	'4',	'0',	'0',	'0',	'');

-- 2021-03-10 08:24:33
