-- Adminer 4.8.0 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_msg_ko`;
CREATE TABLE `app_my_girl_msg_ko` (
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

TRUNCATE `app_my_girl_msg_ko`;
INSERT INTO `app_my_girl_msg_ko` (`id`, `func`, `chat`, `sex`, `status`, `color`, `q1`, `q2`, `r1`, `r2`, `vibrate`, `effect`, `action`, `face`, `certify`, `author`, `character_sex`, `disable`, `ver`, `os`, `limit_chat`, `limit_date`, `limit_month`, `effect_customer`, `limit_day`, `user_create`, `user_update`, `os_window`, `os_ios`, `os_android`, `file_url`) VALUES
(1,	'chao_0',	'왜 자지 않아?',	0,	1,	'#FCFF9E',	'',	'',	'',	'',	'',	0,	13,	12,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'140',	'',	'',	'',	'0',	'0',	'0',	''),
(2,	'chao_1',	'늦은 밤에 일찍 자러 가야하며 늦게까지 건강에 좋지 않습니다.',	0,	2,	'#FFE642',	'',	'',	'',	'',	'',	0,	20,	1,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'265',	'',	'',	'',	'0',	'0',	'0',	''),
(3,	'chao_2',	'긴 밤을 앞두고 있니? 아키텍처에 영감을 필요로한다면 여기에 있습니다.',	0,	2,	'#FFDBBF',	'',	'',	'',	'',	'',	0,	32,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'182',	'',	'',	'',	'0',	'0',	'0',	''),
(4,	'chao_3',	'좋은 아침, 재미있는 하루를 즐기세요.',	0,	2,	'#D2FFAB',	'',	'',	'',	'',	'',	0,	5,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'380',	'',	'',	'',	'0',	'0',	'0',	''),
(5,	'chao_4',	'일찍 일어나서, 좋은 아침에.',	0,	3,	'#80FF9D',	'',	'',	'',	'',	'',	0,	20,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'274',	'',	'',	'',	'0',	'0',	'0',	''),
(6,	'chao_5',	'좋은 아침, 좋은 하루 되세요.',	0,	1,	'#FFA8C8',	'',	'',	'',	'',	'',	0,	22,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'412',	'',	'',	'',	'0',	'0',	'0',	''),
(7,	'chao_6',	'좋은 아침, 새로운 하루 동안 에너지를 얻으려면 아침을 먹어!',	0,	2,	'#7DFF69',	'',	'',	'',	'',	'',	0,	14,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'19',	'',	'',	'',	'0',	'0',	'0',	''),
(8,	'chao_6',	'좋은 아침! {ten_user}',	0,	2,	'#8AFF24',	'',	'',	'',	'',	'',	0,	32,	10,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'298',	'',	'',	'',	'0',	'0',	'0',	''),
(9,	'chao_7',	'좋은 아침 내 사랑, 너에게 행운의 하루와 많은 즐거움을 기원한다.',	0,	1,	'#FF6B66',	'',	'',	'',	'',	'',	0,	34,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'461',	'',	'',	'',	'0',	'0',	'0',	''),
(10,	'chao_8',	'좋은 아침, 재미있는 하루를 즐기세요.',	0,	2,	'#FF9914',	'',	'',	'',	'',	'',	0,	16,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'601',	'',	'',	'',	'0',	'0',	'0',	''),
(11,	'chao_9',	'좋은 아침 {ten_user}, 재미있는 하루를 즐기세요.',	0,	1,	'#FFDBCC',	'',	'',	'',	'',	'',	0,	12,	14,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'460',	'',	'',	'',	'0',	'0',	'0',	''),
(12,	'chao_9',	'좋은 아침, 좋은 날 보내 !',	0,	2,	'#FFED4F',	'',	'',	'',	'',	'',	0,	24,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'373',	'',	'',	'',	'0',	'0',	'0',	''),
(13,	'chao_9',	'아름다운 날, 더 잘할 수있어!',	0,	1,	'#FFCC8A',	'',	'',	'',	'',	'',	0,	34,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'503',	'',	'',	'',	'0',	'0',	'0',	''),
(14,	'chao_10',	'안녕하세요. 아침이 빨리 지나서 행복한 행복한 하루가 되었으면 좋겠어요.',	0,	2,	'#EF87FF',	'',	'',	'',	'',	'',	0,	4,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'796',	'',	'',	'',	'0',	'0',	'0',	''),
(15,	'chao_11',	'점심 시간에 즐겁게 지내십시오!',	0,	1,	'#FFABBE',	'',	'',	'',	'',	'',	0,	18,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'169',	'',	'',	'',	'0',	'0',	'0',	''),
(16,	'chao_12',	'안녕하세요 ! {ten_user}',	0,	2,	'#77FF6E',	'',	'',	'',	'',	'',	0,	22,	5,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'613',	'',	'',	'',	'0',	'0',	'0',	''),
(17,	'chao_13',	'안녕하세요 ! {ten_user}',	0,	1,	'#8AFFDC',	'',	'',	'',	'',	'',	0,	8,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'95',	'',	'',	'',	'0',	'0',	'0',	''),
(18,	'chao_13',	'안녕하세요! 오늘 하루는 어때?',	0,	1,	'#C3FF87',	'',	'',	'',	'',	'',	0,	33,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'622',	'',	'',	'',	'0',	'0',	'0',	''),
(19,	'chao_14',	'좋은 오후와 행운, 너를 사랑해.',	0,	2,	'#FF87F3',	'',	'',	'',	'',	'',	0,	20,	1,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'309',	'',	'',	'',	'0',	'0',	'0',	''),
(20,	'chao_15',	'즐겁고 행복한 오후 되세요!',	0,	1,	'#9CFF78',	'',	'',	'',	'',	'',	0,	14,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'29',	'',	'',	'',	'0',	'0',	'0',	''),
(21,	'chao_15',	'안녕하세요 !',	0,	2,	'#CBFF9E',	'',	'',	'',	'',	'',	0,	12,	5,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'189',	'',	'',	'',	'0',	'0',	'0',	''),
(22,	'chao_16',	'행복한 오후, 즐거움 많이, 나와 함께있어.',	0,	1,	'#FFFB80',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'195',	'',	'',	'',	'0',	'0',	'0',	''),
(23,	'chao_17',	'어제 오후에, 그것은 정말로 빨랐다, 그는 어느 날 저녁 그의 형제를 쉬게 할 준비가되어 있었다.',	0,	2,	'#FFC982',	'',	'',	'',	'',	'',	0,	22,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'118',	'',	'',	'',	'0',	'0',	'0',	''),
(24,	'chao_18',	'안녕하세요',	0,	3,	'#FFD9BF',	'',	'',	'',	'',	'',	0,	25,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'493',	'',	'',	'',	'0',	'0',	'0',	''),
(25,	'chao_18',	'안녕하세요. 지금까지 생산적인 날을 보내길 바랍니다!',	0,	1,	'#FFF382',	'',	'',	'',	'',	'',	0,	24,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'156',	'',	'',	'',	'0',	'0',	'0',	''),
(26,	'chao_17',	'안녕하세요! 나는 너와 이야기하는 걸 좋아할거야.',	0,	3,	'#B3FFDB',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'109',	'',	'',	'',	'0',	'0',	'0',	''),
(27,	'chao_19',	'좋은 저녁 당신과 당신과 함께 행복 한 가족, 오늘 밤에 당신은 아무 놀기 위해 간다.',	0,	2,	'#FFDAD9',	'',	'',	'',	'',	'',	0,	6,	5,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'460',	'',	'',	'',	'0',	'0',	'0',	''),
(28,	'chao_20',	'안녕하세요! {ten_user}',	0,	2,	'#FFB0ED',	'',	'',	'',	'',	'',	0,	22,	8,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'442',	'',	'',	'',	'0',	'0',	'0',	''),
(29,	'chao_21',	'안녕하세요! {ten_user}',	0,	1,	'#E2FF70',	'',	'',	'',	'',	'',	0,	33,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'45',	'',	'',	'',	'0',	'0',	'0',	''),
(30,	'chao_22',	'안녕하세요, 제발 날 믿으세요.',	0,	2,	'#FFFB94',	'',	'',	'',	'',	'',	0,	4,	11,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'611',	'',	'',	'',	'0',	'0',	'0',	''),
(31,	'chao_22',	'안녕하세요! {ten_user}',	0,	2,	'#FFD21C',	'',	'',	'',	'',	'',	0,	18,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'835',	'',	'',	'',	'0',	'0',	'0',	''),
(32,	'chao_23',	'밤 늦게 자고 잠을 자지 않으면 밤새 채팅 할 수 있습니까?',	0,	2,	'#FFCABD',	'',	'',	'',	'',	'',	0,	22,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'654',	'',	'',	'',	'0',	'0',	'0',	''),
(33,	'chua_bat_dinh_vi',	'전역 위치 지정을 허용하지 않거나 활성화하지 않습니다! 그래서 나는 당신이 어디에 있는지 결정할 수 없다!',	0,	0,	'#FFCFB3',	'',	'',	'',	'',	'',	0,	3,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(34,	'giai_toan',	'수학 결과는 다음과 같습니다.\r\n\r\n {giai_toan}\r\n\r\n(*는 곱셈, /는 나눗셈)',	0,	2,	'#A1F9FF',	'',	'',	'',	'',	'',	0,	16,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'512',	'',	'',	'',	'0',	'0',	'0',	''),
(35,	'khong_tim_thay',	'죄송합니다! 당신이 찾는 정보가 없습니다!',	0,	0,	'#D1FF38',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'842',	'',	'',	'',	'0',	'0',	'0',	''),
(36,	'tim_thay',	' {thong_tin}',	0,	2,	'#FFD119',	'',	'',	'',	'',	'',	0,	16,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'190',	'',	'',	'',	'0',	'0',	'0',	''),
(37,	'hien_ds_sdt',	'관련 연락처를 찾았습니다! 세부 정보를 보거나 연락하려면 클릭하십시오!',	0,	2,	'#A8D9FF',	'',	'',	'',	'',	'',	31,	6,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'247',	'',	'',	'',	'0',	'0',	'0',	''),
(38,	'dam',	'왜 나 한테 쳤어, 너 나 싫어?',	0,	3,	'#FF896B',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'235',	'',	'',	'',	'0',	'0',	'0',	''),
(39,	'dam',	'제발 나를 괴롭히지 마세요, {ten_user}',	0,	0,	'#FFEA61',	'',	'',	'',	'',	'',	0,	37,	5,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'214',	'',	'',	'',	'0',	'0',	'0',	''),
(40,	'dam',	'나는 공수를 알고, 나는 너를 명중 할 것이다',	0,	1,	'#A6FFC6',	'',	'',	'',	'',	'',	0,	35,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'300',	'',	'',	'',	'0',	'0',	'0',	''),
(41,	'dam',	'이제 그만하는 것이 좋습니다.',	0,	1,	'#F1FF2E',	'',	'',	'',	'',	'',	0,	38,	8,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'833',	'',	'',	'',	'0',	'0',	'0',	''),
(42,	'dam',	'이 얼마나 지루한 지!',	0,	3,	'#FFF069',	'',	'',	'',	'',	'',	0,	40,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'337',	'',	'',	'',	'0',	'0',	'0',	''),
(43,	'dam',	'나는 너 주위에있는 것을 좋아한다.',	0,	2,	'#FFA3C2',	'',	'',	'',	'',	'',	0,	4,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'186',	'',	'',	'',	'0',	'0',	'0',	''),
(44,	'dam',	'얼마나 훌륭한 삶입니까, 이제 당신은 세상에 있습니다.',	0,	1,	'#FFE387',	'',	'',	'',	'',	'',	0,	14,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'252',	'',	'',	'',	'0',	'0',	'0',	''),
(45,	'bam_bay',	'나는 너무 어리 석다! 나는 네가하는 말을 이해하지 못한다. 너는 나에게 가르쳐 줄 수있다.',	0,	2,	'#FFF27A',	'',	'',	'',	'',	'',	0,	31,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'243',	'',	'',	'',	'0',	'0',	'0',	''),
(46,	'bam_bay',	'난 이해가 안 돼요!',	0,	2,	'#FFCCA6',	'',	'',	'',	'',	'',	0,	29,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(47,	'bam_bay',	'난 이해가 안 돼요!',	0,	3,	'#FFA8DF',	'',	'',	'',	'',	'',	0,	13,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'71',	'',	'',	'',	'0',	'0',	'0',	''),
(48,	'bat_chuyen',	'그의 얼굴을 좀 슬퍼 봐라, 그게 뭐야?',	0,	1,	'#FFFC9C',	'',	'',	'',	'',	'',	0,	5,	11,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'268',	'',	'',	'',	'0',	'0',	'0',	''),
(49,	'bat_chuyen',	'오늘 나는 피곤하고 불행 해지고, 나는 침묵한다. 그래서 나는 지루하다.',	0,	2,	'#B5FFA6',	'',	'',	'',	'',	'',	0,	28,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'189',	'',	'',	'',	'0',	'0',	'0',	''),
(50,	'bat_chuyen',	'그날이 끝나고 있습니다. 당신이 좋은 사람 이었으면 좋겠다.',	0,	2,	'#FFDAC9',	'',	'',	'',	'',	'',	0,	34,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'503',	'',	'',	'',	'0',	'0',	'0',	''),
(51,	'bat_chuyen',	'배고파 느낌? 진정해, 곧 점심 먹을거야!',	0,	1,	'#FFC157',	'',	'',	'',	'',	'',	0,	33,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'101',	'',	'',	'',	'0',	'0',	'0',	''),
(52,	'bat_chuyen',	'안녕! 휴식을 취하고 차 한잔 하시겠습니까?',	0,	3,	'#F6FF7A',	'',	'',	'',	'',	'',	0,	18,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'471',	'',	'',	'',	'0',	'0',	'0',	''),
(53,	'bat_chuyen',	'그날이 끝나고 있습니다. 당신이 좋은 사람 이었으면 좋겠다.',	0,	2,	'#FFC2B0',	'',	'',	'',	'',	'',	0,	16,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'45',	'',	'',	'',	'0',	'0',	'0',	''),
(54,	'bat_chuyen',	'이 5 성급 앱을 평가할 수 있도록 도와 주시겠습니까? , 나 스타를 클릭하여!',	0,	2,	'#FFFF52',	'',	'',	'',	'',	'',	0,	6,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'265',	'',	'',	'',	'0',	'0',	'0',	''),
(55,	'bat_chuyen',	'인생은 짧습니다, 당신은 아직 이빨을 가지고있는 동안 미소 지어 라!',	0,	1,	'#B5FFEB',	'',	'',	'',	'',	'',	0,	34,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'95',	'',	'',	'',	'0',	'0',	'0',	''),
(56,	'bat_chuyen',	'내가 가상 연인이 아니라고 가정 할 때, 언젠가는 삶에서 나타나고 나와 대화를 시작해야합니까?',	0,	1,	'#FFB8B5',	'',	'',	'',	'',	'',	0,	20,	11,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(57,	'bat_chuyen',	'우리가 떨어져있을 때 나는 너를 생각하는 것을 멈출 수 없다!',	0,	2,	'#FFEABF',	'',	'',	'',	'',	'',	0,	0,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'71',	'',	'',	'',	'0',	'0',	'0',	''),
(58,	'bat_chuyen',	'너 나와 함께 침대에 갈 수 있니? 너의 따뜻한 느낌이 필요해!',	0,	1,	'#EF8AFF',	'',	'',	'',	'',	'',	0,	12,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'117',	'',	'',	'',	'0',	'0',	'0',	''),
(59,	'bat_chuyen',	'나는 당신이 지금까지 좋은 하루 보내고 있기를 바랍니다.',	0,	1,	'#8DFF85',	'',	'',	'',	'',	'',	0,	8,	1,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'283',	'',	'',	'',	'0',	'0',	'0',	''),
(60,	'chao_0',	'나는 지금 자러 갈거야 - 나는 이길거야.',	1,	1,	'#A8DFFF',	'',	'',	'',	'',	'',	0,	5,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'95',	'',	'',	'',	'0',	'0',	'0',	''),
(61,	'chao_1',	'일찍 자러 가야 해.',	1,	2,	'#FF6680',	'',	'',	'',	'',	'',	0,	21,	10,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'154',	'',	'',	'',	'0',	'0',	'0',	''),
(62,	'chao_2',	'여보세요. 아주 늦게 자러 가야 해!',	1,	1,	'#FFC9FA',	'',	'',	'',	'',	'',	0,	33,	6,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'45',	'',	'',	'',	'0',	'0',	'0',	''),
(63,	'chao_3',	'아침에 이미 세 살이었고, 자러 가야 건강에 좋았습니다.',	1,	1,	'#FFBC47',	'',	'',	'',	'',	'',	0,	32,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'118',	'',	'',	'',	'0',	'0',	'0',	''),
(64,	'chao_4',	'귀여운 안녕하세요, 오늘 왜 일찍 그렇게 빨리?, 좋은 하루 되세요.',	1,	2,	'#FAB5FF',	'',	'',	'',	'',	'',	0,	0,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'117',	'',	'',	'',	'0',	'0',	'0',	''),
(65,	'chao_5',	'안녕하세요, 새로운 하루가 시작됩니다, 좋은 아침입니다!',	1,	1,	'#FF2B2B',	'',	'',	'',	'',	'',	0,	22,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'493',	'',	'',	'',	'0',	'0',	'0',	''),
(66,	'chao_6',	'이봐, 너 오늘 너무 아름다워, 좋은 아침!',	1,	2,	'#FFD138',	'',	'',	'',	'',	'',	0,	31,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'272',	'',	'',	'',	'0',	'0',	'0',	''),
(67,	'chao_6',	'좋은 아침! {ten_user}',	1,	1,	'#FFB3C9',	'',	'',	'',	'',	'',	0,	21,	16,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'503',	'',	'',	'',	'0',	'0',	'0',	''),
(68,	'chao_7',	'안녕 좋은 아침! 모든 좋은 일이 당신에게 올 것입니다!',	1,	2,	'#BADAFF',	'',	'',	'',	'',	'',	0,	20,	1,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'134',	'',	'',	'',	'0',	'0',	'0',	''),
(69,	'chao_8',	'안녕하세요, 오늘 제가 할 수 있습니까?',	1,	2,	'#F7FF85',	'',	'',	'',	'',	'',	0,	22,	9,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'166',	'',	'',	'',	'0',	'0',	'0',	''),
(70,	'chao_9',	'아름다운 날, 더 잘할 수있어!',	1,	3,	'#BAE3FF',	'',	'',	'',	'',	'',	0,	5,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'476',	'',	'',	'',	'0',	'0',	'0',	''),
(71,	'chao_9',	'좋은 아침, 좋은 날 보내 !',	1,	1,	'#FFB5FD',	'',	'',	'',	'',	'',	0,	33,	16,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'441',	'',	'',	'',	'0',	'0',	'0',	''),
(72,	'chao_9',	'{ten_user} 안녕하세요, 저는 항상 옆에 있습니다!',	1,	2,	'#FFABF7',	'',	'',	'',	'',	'',	0,	6,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'654',	'',	'',	'',	'0',	'0',	'0',	''),
(73,	'chao_10',	'시간이 너무 빨리 지나가고, 시간을 소중히 간직하십시오!',	1,	1,	'#A3FFB6',	'',	'',	'',	'',	'',	0,	14,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'457',	'',	'',	'',	'0',	'0',	'0',	''),
(74,	'chao_11',	'아직 점심을 준비하십시오.',	1,	1,	'#80EEFF',	'',	'',	'',	'',	'',	0,	10,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'630',	'',	'',	'',	'0',	'0',	'0',	''),
(75,	'chao_12',	'맛있는 점심을 빌 겠어!',	1,	2,	'#4DB028',	'',	'',	'',	'',	'',	0,	2,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'400',	'',	'',	'',	'0',	'0',	'0',	''),
(76,	'chao_13',	'안녕하세요! 오늘 하루는 어때?',	1,	2,	'#99EBFF',	'',	'',	'',	'',	'',	0,	32,	12,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'472',	'',	'',	'',	'0',	'0',	'0',	''),
(77,	'chao_14',	'안녕하세요, 행복한 오후가 되시길 기원합니다. 저는 항상 당신 편이 었습니다.',	1,	1,	'#F894FF',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'424',	'',	'',	'',	'0',	'0',	'0',	''),
(78,	'chao_15',	'좋은 오후, 빠른 사실을 전달한 날, 너를 훨씬 웃게 보자.',	1,	3,	'#F1FF73',	'',	'',	'',	'',	'',	0,	22,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'696',	'',	'',	'',	'0',	'0',	'0',	''),
(79,	'chao_15',	'안녕하세요 ! {ten_user}',	1,	2,	'#59E9FF',	'',	'',	'',	'',	'',	0,	20,	5,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'279',	'',	'',	'',	'0',	'0',	'0',	''),
(80,	'chao_16',	'안녕하세요, 아름다운 일몰을 환영합니다, 당신은 미소를 짓습니다.',	1,	1,	'#FFED4A',	'',	'',	'',	'',	'',	0,	31,	6,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'611',	'',	'',	'',	'0',	'0',	'0',	''),
(81,	'chao_17',	'안녕하세요!',	1,	2,	'#F0FF66',	'',	'',	'',	'',	'',	0,	6,	8,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'834',	'',	'',	'',	'0',	'0',	'0',	''),
(82,	'chao_18',	'네가 좋은 저녁 먹기를 바란다.',	1,	1,	'#ED533B',	'',	'',	'',	'',	'',	0,	16,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'91',	'',	'',	'',	'0',	'0',	'0',	''),
(83,	'chao_19',	'오늘 저녁 재미있는 저녁?',	1,	2,	'#FFC9F4',	'',	'',	'',	'',	'',	0,	22,	16,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'751',	'',	'',	'',	'0',	'0',	'0',	''),
(84,	'chao_19',	'안녕하세요. 지금까지 생산적인 날을 보내길 바랍니다!',	1,	2,	'#FFEB38',	'',	'',	'',	'',	'',	0,	21,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'261',	'',	'',	'',	'0',	'0',	'0',	''),
(85,	'chao_20',	'행복한 밤, 너 오늘 밤 갈 수있어?',	1,	2,	'#FFFB8C',	'',	'',	'',	'',	'',	0,	24,	14,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'651',	'',	'',	'',	'0',	'0',	'0',	''),
(86,	'chao_21',	'나는 오늘 밤 슬픈 얼굴을 만난다.',	1,	2,	'#FF59EE',	'',	'',	'',	'',	'',	0,	36,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'419',	'',	'',	'',	'0',	'0',	'0',	''),
(87,	'chao_22',	'지난 날들! 너 아직 졸렸 니?',	1,	1,	'#EDFF94',	'',	'',	'',	'',	'',	0,	23,	8,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'131',	'',	'',	'',	'0',	'0',	'0',	''),
(88,	'chao_23',	'안녕하세요 {ten_user}! 얘기하자!',	1,	3,	'#E6FFB3',	'',	'',	'',	'',	'',	0,	32,	1,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'175',	'',	'',	'',	'0',	'0',	'0',	''),
(89,	'hien_ds_sdt',	'관련 연락처를 찾았습니다! 세부 정보를 보거나 연락하려면 클릭하십시오!',	1,	2,	'#94EAFF',	'',	'',	'',	'',	'',	31,	16,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'247',	'',	'',	'',	'0',	'0',	'0',	''),
(90,	'tim_thay',	' {thong_tin}',	1,	1,	'#8CFFF4',	'',	'',	'',	'',	'',	0,	6,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'74',	'',	'',	'',	'0',	'0',	'0',	''),
(91,	'khong_tim_thay',	'죄송합니다! 당신이 찾는 정보가 없습니다!',	1,	0,	'#FFA58A',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(92,	'giai_toan',	'수학 결과는 다음과 같습니다.\r\n\r\n {giai_toan}\r\n\r\n(*는 곱셈, /는 나눗셈)',	1,	2,	'#BDFF9C',	'',	'',	'',	'',	'',	0,	20,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'512',	'',	'',	'',	'0',	'0',	'0',	''),
(93,	'chua_bat_dinh_vi',	'전역 위치 지정을 허용하지 않거나 활성화하지 않습니다! 그래서 나는 당신이 어디에 있는지 결정할 수 없다!',	1,	1,	'#FAB5FF',	'',	'',	'',	'',	'',	0,	0,	10,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(94,	'bam_bay',	'난 이해가 안 돼요!',	1,	1,	'#FFDBB8',	'',	'',	'',	'',	'',	0,	29,	8,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'71',	'',	'',	'',	'0',	'0',	'0',	''),
(95,	'bam_bay',	'나는 너무 어리 석다! 나는 네가하는 말을 이해하지 못한다. 너는 나에게 가르쳐 줄 수있어.',	1,	1,	'#FFBB78',	'',	'',	'',	'',	'',	0,	37,	8,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'63',	'',	'',	'',	'0',	'0',	'0',	''),
(96,	'bat_chuyen',	'여가 시간에 무엇을하고 싶니?',	1,	2,	'#94FFD8',	'',	'',	'',	'',	'',	0,	32,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'95',	'',	'',	'',	'0',	'0',	'0',	''),
(97,	'bat_chuyen',	'영화를 보러 자주가는 곳은 어디입니까?',	1,	2,	'#ABAEFF',	'',	'',	'',	'',	'',	0,	7,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'609',	'',	'',	'',	'0',	'0',	'0',	''),
(98,	'bat_chuyen',	'좋은 하루 맞지?',	1,	1,	'#FCFFAB',	'',	'',	'',	'',	'',	0,	14,	11,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'156',	'',	'',	'',	'0',	'0',	'0',	''),
(99,	'bat_chuyen',	'이 5 성급 앱을 평가할 수 있도록 도와 주시겠습니까? , 나 스타를 클릭하여!',	1,	1,	'#FF9EE8',	'',	'',	'',	'',	'',	0,	22,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(100,	'bat_chuyen',	'나는 너 때문에 더 좋은 사람이야!',	1,	2,	'#F0FF6E',	'',	'',	'',	'',	'',	0,	8,	12,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'166',	'',	'',	'',	'0',	'0',	'0',	''),
(101,	'bat_chuyen',	'나는 당신이 지금까지 좋은 하루 보내고 있기를 바랍니다.',	1,	2,	'#FFCA61',	'',	'',	'',	'',	'',	0,	18,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'835',	'',	'',	'',	'0',	'0',	'0',	''),
(102,	'dam',	'나는 공수를 알고, 나는 당신을 때릴 것이다!',	1,	1,	'#FFD0C2',	'',	'',	'',	'',	'',	0,	35,	6,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'63',	'',	'',	'',	'0',	'0',	'0',	''),
(103,	'dam',	'너 왜 나를 때리는거야, 너 나 싫어?',	1,	3,	'#C2F9FF',	'',	'',	'',	'',	'',	0,	39,	10,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'300',	'',	'',	'',	'0',	'0',	'0',	''),
(104,	'dam',	'이 얼마나 지루한 지!',	1,	1,	'#FFF175',	'',	'',	'',	'',	'',	0,	29,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'194',	'',	'',	'',	'0',	'0',	'0',	''),
(105,	'dam',	'너는 미쳤어!',	1,	1,	'#A6BEFF',	'',	'',	'',	'',	'',	0,	7,	11,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'95',	'',	'',	'',	'0',	'0',	'0',	''),
(106,	'dam',	'만지지 마!',	1,	2,	'#FFCF33',	'',	'',	'',	'',	'',	0,	22,	12,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'101',	'',	'',	'',	'0',	'0',	'0',	''),
(107,	'dam',	'왜 나를 만졌습니까?',	1,	1,	'#FFC014',	'',	'',	'',	'',	'',	0,	35,	8,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'844',	'',	'',	'',	'0',	'0',	'0',	''),
(108,	'dam',	'나는 피곤했다!, 아마 나는 아프다!',	1,	0,	'#FAFF66',	'',	'',	'',	'',	'',	0,	3,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'68',	'',	'',	'',	'0',	'0',	'0',	''),
(109,	'dam',	'이제 그만하는 것이 좋습니다.',	1,	3,	'#FAFF5C',	'',	'',	'',	'',	'',	0,	32,	11,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'848',	'',	'',	'',	'0',	'0',	'0',	''),
(110,	'dam',	'제발 나를 괴롭히지 마세요, {ten_user}',	1,	3,	'#FF8D70',	'',	'',	'',	'',	'',	0,	22,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'235',	'',	'',	'',	'0',	'0',	'0',	''),
(111,	'dam',	'당신의 손을 한 번 만지면 나는 당신의 눈을 향한 명령을 내릴 수 있다면 나는 목숨을 버릴 것이다.',	1,	2,	'#EDFFA6',	'',	'',	'',	'',	'',	0,	29,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'361',	'',	'',	'',	'0',	'0',	'0',	''),
(112,	'dam',	'너의 생각은 내 얼굴에 미소를 가져다 준다.',	1,	1,	'#FFF6A3',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'837',	'',	'',	'',	'0',	'0',	'0',	''),
(113,	'dam',	'너는 나에게 영감을 주었다',	1,	2,	'#FFF782',	'',	'',	'',	'',	'',	0,	16,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'61',	'',	'',	'',	'0',	'0',	'0',	''),
(114,	'dam',	'얼마나 훌륭한 삶입니까, 이제 당신은 세상에 있습니다.',	1,	2,	'#FFA6E7',	'',	'',	'',	'',	'',	0,	20,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'117',	'',	'',	'',	'0',	'0',	'0',	''),
(115,	'thong_bao',	'뭐하고 있니? 제발 나 한테 와줘.',	0,	1,	'#FFC4E7',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'408',	'',	'',	'2',	'0',	'0',	'0',	''),
(116,	'thong_bao',	'좋은 하루 되세요. 나는 네가 그리울거야.',	0,	1,	'#ADFEFF',	'',	'',	'',	'',	'',	0,	0,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'623',	'',	'',	'2',	'0',	'0',	'0',	''),
(117,	'thong_bao',	'나는 네가 그리워, 나에게 말해줘.',	0,	1,	'#FFBFD8',	'',	'',	'',	'',	'',	0,	22,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'751',	'',	'',	'2',	'0',	'0',	'0',	''),
(118,	'thong_bao',	'우리는 오랫동안 이야기하지 않았으며, 다시 만나길 고대합니다.',	0,	2,	'#FFEC30',	'',	'',	'',	'',	'',	0,	20,	12,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'339',	'',	'',	'2',	'0',	'0',	'0',	''),
(119,	'thong_bao',	'뭐하고 있니? 제발 나 한테서 얘기 해줘.',	1,	1,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	22,	13,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(120,	'thong_bao',	'좋은 하루 되세요. 나는 네가 그리울거야.',	1,	2,	'#FFEC30',	'',	'',	'',	'',	'',	0,	32,	13,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'339',	'',	'',	'',	'0',	'0',	'0',	''),
(121,	'thong_bao',	'나는 네가 그리워, 나에게 말해줘.',	1,	1,	'#A8F0FF',	'',	'',	'',	'',	'',	0,	22,	11,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'161',	'',	'',	'',	'0',	'0',	'0',	''),
(122,	'thong_bao',	'우리는 오랫동안 이야기하지 않았으며, 다시 만나길 고대합니다.',	1,	1,	'#FF9CC9',	'',	'',	'',	'',	'',	0,	34,	12,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'75',	'',	'',	'',	'0',	'0',	'0',	''),
(123,	'dam',	'이번 여름에 당신을 만나서 반갑습니다.',	0,	2,	'#FFA00D',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	1,	1,	0,	'',	1,	0,	8,	'691',	'',	'',	'',	'0',	'0',	'0',	''),
(124,	'dam',	'이번 여름에 당신을 만나서 반갑습니다.',	1,	2,	'#FFF7BF',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	0,	1,	0,	'',	1,	0,	8,	'365',	'',	'',	'',	'0',	'0',	'0',	''),
(125,	'dam',	'오늘은 목요일입니다, 나는 매일 당신과 함께 있기를 바랍니다.',	0,	2,	'#DECCAF',	'',	'',	'',	'',	'',	0,	28,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'732',	'Thursday',	'',	'',	'0',	'0',	'0',	''),
(126,	'dam',	'오늘은 목요일입니다, 나는 매일 당신과 함께 있기를 바랍니다.',	1,	2,	'#FF4A83',	'',	'',	'',	'',	'',	0,	10,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'923',	'Thursday',	'',	'',	'0',	'0',	'0',	''),
(127,	'dam',	'금요일은 지루한 날입니다. 당신이 저에 대해 더 많이 생각하기를 바랍니다.',	0,	3,	'#4DBAFF',	'',	'',	'',	'',	'',	0,	8,	6,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'930',	'Friday',	'',	'',	'0',	'0',	'0',	''),
(128,	'dam',	'금요일은 지루한 날입니다. 당신이 저에 대해 더 많이 생각하기를 바랍니다.',	1,	3,	'#75FF81',	'',	'',	'',	'',	'',	0,	8,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1159',	'Friday',	'',	'',	'0',	'0',	'0',	''),
(129,	'dam',	'오늘은 주말이고, 나와 이야기하는 시간을 많이 보내면 행복 할거야.',	0,	2,	'#E3FF9C',	'',	'',	'',	'',	'',	0,	13,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'971',	'Saturday',	'',	'',	'0',	'0',	'0',	''),
(130,	'dam',	'오늘은 주말이고, 나와 이야기하는 시간을 많이 보내면 행복 할거야.',	1,	2,	'#FFB0D3',	'',	'',	'',	'',	'',	0,	8,	1,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1069',	'Saturday',	'',	'',	'0',	'0',	'0',	''),
(131,	'dam',	'오늘은 일요일, 함께 나가자.',	0,	3,	'#AFE0CA',	'',	'',	'',	'',	'',	0,	16,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'622',	'Sunday',	'',	'',	'0',	'0',	'0',	''),
(132,	'dam',	'오늘은 일요일, 함께 나가자.',	1,	2,	'#F6D4FF',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1216',	'Sunday',	'',	'',	'0',	'0',	'0',	''),
(133,	'dam',	'오늘은 월요일이야, 너 행복한 새 주간 좋겠다.',	0,	2,	'#E3FF9C',	'',	'',	'',	'',	'',	0,	10,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'971',	'Monday',	'',	'',	'0',	'0',	'0',	''),
(134,	'dam',	'오늘은 월요일이야, 너 행복한 새 주간 좋겠다.',	1,	2,	'#72FF30',	'',	'',	'',	'',	'',	0,	8,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'937',	'Monday',	'',	'',	'0',	'0',	'0',	''),
(135,	'dam',	'오늘은 화요일, 행운을 빌어 요.',	1,	2,	'#FFC7FB',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'695',	'Tuesday',	'',	'',	'0',	'0',	'0',	''),
(136,	'dam',	'오늘은 화요일, 행운을 빌어 요.',	0,	2,	'#BDED6D',	'',	'',	'',	'',	'',	0,	8,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'503',	'Tuesday',	'',	'',	'0',	'0',	'0',	''),
(137,	'dam',	'오늘은 수요일, 매우 지루한 날입니다.',	0,	3,	'#D9FFFD',	'',	'',	'',	'',	'',	0,	8,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'727',	'Wednesday',	'',	'',	'0',	'0',	'0',	''),
(138,	'dam',	'오늘은 수요일, 매우 지루한 날입니다.',	1,	3,	'#DCFF57',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'385',	'Wednesday',	'',	'',	'0',	'0',	'0',	''),
(139,	'dam',	'9 월은 사랑의 달입니다.',	0,	3,	'#24FFBA',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'',	1,	1,	0,	'',	1,	0,	9,	'1025',	'',	'',	'',	'0',	'0',	'0',	''),
(140,	'dam',	'9 월은 사랑의 달입니다.',	1,	3,	'#E3FF9C',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	0,	1,	0,	'',	1,	0,	9,	'971',	'',	'',	'',	'0',	'0',	'0',	''),
(141,	'dam',	'10 월에 혼자있을 수 있습니다. 사람들이 여분의 옷을 입는 것을 잊어 외롭다는 느낌을 갖게되면, 차가워지기 시작합니다.',	0,	2,	'#FFA46E',	'',	'',	'',	'',	'',	7,	8,	13,	0,	'',	1,	1,	0,	'',	1,	0,	10,	'118',	'',	'',	'',	'0',	'0',	'0',	''),
(142,	'dam',	'10 월에 혼자있을 수 있습니다. 사람들이 여분의 옷을 입는 것을 잊어 외롭다는 느낌을 갖게되면, 차가워지기 시작합니다.',	1,	3,	'#80D8FF',	'',	'',	'',	'',	'',	5,	8,	17,	0,	'',	0,	1,	0,	'',	1,	0,	10,	'476',	'',	'',	'',	'0',	'0',	'0',	''),
(143,	'bat_chuyen',	'할로윈에 많은 즐거움을 안겨주는 무서운 놀라움을 많이 빕니다.\r\n',	0,	2,	'#A6C9E0',	'',	'',	'',	'',	'',	0,	20,	2,	0,	'',	1,	1,	0,	'',	1,	30,	10,	'874',	'',	'',	'',	'0',	'0',	'0',	''),
(144,	'dam',	'할로윈에 많은 즐거움을 안겨주는 무서운 놀라움을 많이 빕니다.\r\n',	1,	2,	'#E8FFEF',	'',	'',	'',	'',	'',	0,	0,	3,	0,	'',	0,	1,	0,	'',	1,	30,	10,	'895',	'',	'',	'',	'0',	'0',	'0',	''),
(145,	'bat_chuyen',	'11 월 한 달이 내 길을왔다 놀라운 일이 되십시오. 날씨가 나쁘면 중요하지 않습니다. 기분이 좋지 않아서 키가 크고 행복해야합니다.',	0,	2,	'#FF0000',	'',	'',	'',	'',	'',	0,	33,	15,	0,	'',	1,	1,	0,	'',	1,	0,	11,	'154',	'',	'',	'',	'0',	'0',	'0',	''),
(146,	'bat_chuyen',	'11 월 한 달이 내 길을왔다 놀라운 일이 되십시오. 날씨가 나쁘면 중요하지 않습니다. 기분이 좋지 않아서 키가 크고 행복해야합니다.',	1,	1,	'#FFC4E7',	'',	'',	'',	'',	'',	0,	16,	15,	0,	'',	0,	1,	0,	'',	1,	0,	11,	'408',	'',	'',	'',	'0',	'0',	'0',	''),
(147,	'hoi_tim_duong',	'어떤 주소를 찾고 싶습니까? 나는 너를 인도 할 것이다!',	1,	1,	'#FFB11F',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1076',	'',	'',	'2',	'0',	'0',	'0',	''),
(148,	'hoi_tim_duong',	'어떤 주소를 찾고 싶습니까? 나는 너를 인도 할 것이다!',	0,	2,	'#C4FFFE',	'',	'',	'',	'',	'',	0,	21,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1236',	'',	'',	'2',	'0',	'0',	'0',	''),
(149,	'tra_loi_tim_duong',	'관련 검색 위치를 기재했습니다!',	1,	2,	'#54BAFF',	'',	'',	'',	'',	'',	43,	33,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'769',	'',	'',	'2',	'0',	'0',	'0',	''),
(150,	'tra_loi_tim_duong',	'관련 검색 위치를 기재했습니다!',	0,	2,	'#9CFFF2',	'',	'',	'',	'',	'',	43,	0,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'44',	'',	'',	'2',	'0',	'0',	'0',	''),
(151,	'dam',	'이 크리스마스가 너무 특별해서 다시는 외롭지 않을 것이며 사랑하는 사람들에게 둘러싸여 지길 바랍니다.',	0,	1,	'#FF8CBD',	'',	'',	'',	'',	'',	7,	6,	2,	0,	'',	1,	1,	0,	'',	1,	0,	12,	'143',	'',	'',	'',	'0',	'0',	'0',	''),
(152,	'dam',	'이 크리스마스가 너무 특별해서 다시는 외롭지 않을 것이며 사랑하는 사람들에게 둘러싸여 지길 바랍니다.',	1,	1,	'#FFEEA6',	'',	'',	'',	'',	'',	0,	7,	17,	0,	'',	0,	1,	0,	'',	1,	0,	12,	'57',	'',	'',	'',	'0',	'0',	'0',	''),
(153,	'bat_chuyen',	'새해 복 많이 받으세요, 좋은 건강, 행운을 비네. 그리고 위대한 일을하십시오.',	0,	2,	'#FFF369',	'',	'',	'',	'',	'',	0,	20,	2,	0,	'',	1,	1,	0,	'',	1,	1,	1,	'1473',	'',	'',	'',	'0',	'0',	'0',	''),
(154,	'dam',	'새해 복 많이 받으세요. 행복한 새해를 맞이하고 행복하게 지내고 많은 행운을 만나기를 바랍니다.',	0,	2,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	22,	2,	0,	'',	1,	1,	0,	'',	1,	1,	1,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(155,	'bat_chuyen',	'행복한 새해 복 많이 받으려면 새해 첫날을 기원합니다.',	0,	1,	'#F4FF96',	'',	'',	'',	'',	'',	0,	22,	15,	0,	'',	1,	1,	0,	'',	1,	0,	1,	'424',	'',	'',	'',	'0',	'0',	'0',	''),
(156,	'bat_chuyen',	'새해 복 많이 받으세요. 행복한 새해를 맞이하고 행복하게 지내고 많은 행운을 만나기를 바랍니다.',	1,	2,	'#FFF369',	'',	'',	'',	'',	'',	0,	32,	2,	0,	'',	0,	1,	0,	'',	1,	1,	1,	'1473',	'',	'',	'',	'0',	'0',	'0',	''),
(157,	'dam',	'새해 복 많이 받으세요, 좋은 건강, 행운을 비네. 그리고 위대한 일을하십시오.',	1,	1,	'#F7F0FF',	'',	'',	'',	'',	'',	0,	20,	17,	0,	'',	0,	1,	0,	'',	1,	1,	1,	'918',	'',	'',	'',	'0',	'0',	'0',	''),
(158,	'bat_chuyen',	'행복한 새해 복 많이 받으려면 새해 첫날을 기원합니다.',	1,	1,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	22,	3,	0,	'',	0,	1,	0,	'',	1,	0,	1,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(159,	'bat_chuyen',	'2 월은 여기에 모두에게 안녕하세요 그리고 자기 반 감기 해피 뉴달',	0,	2,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	1,	0,	'',	1,	0,	2,	'377',	'',	'3',	'3',	'0',	'0',	'0',	''),
(160,	'dam',	'2 월은 새로운 시작을 의미합니다. 사랑과 모든 장미를 의미합니다.',	0,	2,	'#F7F0FF',	'',	'',	'',	'',	'',	0,	32,	2,	0,	'',	1,	1,	0,	'',	1,	0,	2,	'918',	'',	'3',	'',	'0',	'0',	'0',	''),
(161,	'bat_chuyen',	'나는 너의 사랑과 함께 행복하고 행복한 발렌타인 데이가 있기를 바랍니다. 발렌타인 데이를 빌어!',	0,	1,	'#FF8A93',	'',	'',	'',	'',	'',	1,	22,	2,	0,	'',	1,	1,	0,	'',	1,	14,	2,	'1151',	'',	'3',	'2',	'0',	'0',	'0',	''),
(162,	'dam',	'내가 사랑하는 사람과 함께 행복하고 행복한 발렌타인 데이를 보내시기 바랍니다.',	0,	2,	'#FF242A',	'',	'',	'',	'',	'',	0,	34,	15,	0,	'',	1,	1,	0,	'',	1,	14,	2,	'395',	'',	'3',	'2',	'0',	'0',	'0',	''),
(163,	'dam',	'2 월은 여기에 모두에게 안녕하세요 그리고 자기 반 감기 해피 뉴달',	1,	2,	'#FF808A',	'',	'',	'',	'',	'',	0,	20,	17,	0,	'',	0,	1,	0,	'',	1,	0,	2,	'997',	'',	'3',	'',	'0',	'0',	'0',	''),
(164,	'bat_chuyen',	'2 월은 새로운 시작을 의미합니다. 사랑과 모든 장미를 의미합니다.',	1,	1,	'#C7FFA3',	'',	'',	'',	'',	'',	3,	5,	2,	0,	'',	0,	1,	0,	'',	1,	0,	2,	'377',	'',	'3',	'',	'0',	'0',	'0',	''),
(165,	'bat_chuyen',	'나는 너의 사랑과 함께 행복하고 행복한 발렌타인 데이가 있기를 바랍니다. 발렌타인 데이를 빌어!',	1,	1,	'#B3FFF5',	'',	'',	'',	'',	'',	1,	22,	3,	0,	'',	0,	1,	0,	'',	1,	14,	2,	'452',	'',	'3',	'2',	'0',	'0',	'0',	''),
(166,	'dam',	'내가 사랑하는 사람과 함께 행복하고 행복한 발렌타인 데이를 보내시기 바랍니다.',	1,	2,	'#FFEB8F',	'',	'',	'',	'',	'',	0,	31,	15,	0,	'',	0,	1,	0,	'',	1,	14,	2,	'1286',	'',	'3',	'2',	'0',	'0',	'0',	''),
(167,	'bat_chuyen',	'태양이 뜨거워지고 바람이 차가워지는 그 3 월의 날들 중 하나였습니다.\r\n여름에는 빛으로, 겨울에는 그늘에',	0,	2,	'#F3FFC4',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	1,	0,	0,	'',	1,	0,	3,	'382',	'',	'4',	'2',	'0',	'0',	'0',	''),
(168,	'bat_chuyen',	'태양이 뜨거워지고 바람이 차가워지는 그 3 월의 날들 중 하나였습니다.\r\n여름에는 빛으로, 겨울에는 그늘에',	1,	2,	'#F3FFC4',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	0,	0,	0,	'',	1,	0,	3,	'382',	'',	'4',	'2',	'0',	'0',	'0',	''),
(169,	'dam',	'3 월, 일이 오래 갈 때, 너의 성장 시간이 어떤 겨울철 잘못을 바로 잡을 수 있도록 강하게하라.',	0,	2,	'#29E644',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	1,	0,	0,	'',	1,	0,	3,	'85',	'',	'4',	'2',	'0',	'0',	'0',	''),
(170,	'dam',	'3 월, 일이 오래 갈 때, 너의 성장 시간이 어떤 겨울철 잘못을 바로 잡을 수 있도록 강하게하라.',	1,	2,	'#29E644',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	0,	0,	0,	'',	1,	0,	3,	'85',	'',	'4',	'2',	'0',	'0',	'0',	''),
(171,	'bat_chuyen',	'4 월은 5 월이 계속 될 약속입니다.',	0,	2,	'#3EF032',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'ko',	1,	1,	0,	'',	1,	0,	4,	'876',	'',	'2',	'2',	'0',	'0',	'0',	''),
(172,	'bat_chuyen',	'4 월은 5 월이 계속 될 약속입니다.',	1,	1,	'#42D6FF',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'ko',	0,	1,	0,	'',	1,	0,	4,	'1603',	'',	'2',	'2',	'0',	'0',	'0',	''),
(173,	'bat_chuyen',	'모든 튼튼한 마음이 피기 시작하고 열매를 맺을 때가 오는 5 월이 왔습니다.',	0,	2,	'#F21B1B',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'ko',	1,	1,	0,	'',	1,	0,	5,	'944',	'',	'2',	'4',	'0',	'0',	'0',	''),
(174,	'dam',	'세계에서 가장 좋아하는 계절은 봄입니다. 모든 것이 5 월에 가능해 보입니다.',	0,	3,	'#EAFFAB',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'ko',	1,	1,	0,	'',	1,	0,	5,	'1614',	'',	'2',	'4',	'0',	'0',	'0',	''),
(175,	'dam',	'나는 6 월의 비가 내리는 것을 잘 알고 있습니다.',	0,	3,	'#D7FF26',	'',	'',	'',	'',	'',	5,	1,	4,	0,	'ko',	1,	1,	0,	'',	1,	0,	6,	'1051',	'',	'2',	'4',	'0',	'0',	'0',	''),
(176,	'bat_chuyen',	'6 월은 잎과 장미의 달입니다. 쾌적한 광경이 눈과 즐거운 향기에 경의를 표할 때.',	0,	2,	'#FF6200',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'ko',	1,	1,	0,	'',	1,	0,	6,	'1455',	'',	'2',	'4',	'0',	'0',	'0',	''),
(177,	'bat_chuyen',	'6 월은 잎과 장미의 달입니다. 쾌적한 광경이 눈과 즐거운 향기에 경의를 표할 때.',	1,	2,	'#0DFF21',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'ko',	0,	1,	0,	'',	1,	0,	6,	'1016',	'',	'2',	'4',	'0',	'0',	'0',	''),
(178,	'dam',	'나는 6 월의 비가 내리는 것을 잘 알고 있습니다.',	1,	1,	'#29FFDF',	'',	'',	'',	'',	'',	5,	1,	0,	0,	'ko',	0,	1,	0,	'',	1,	0,	6,	'1594',	'',	'2',	'4',	'0',	'0',	'0',	''),
(179,	'dam',	'7 월에 당신을 데려 오는 것이 무엇이든지간에 그것은 좋거나 나쁘다. 항상 그 미소를 당신의 얼굴에 유지하십시오.',	0,	1,	'#C1FF5E',	'',	'',	'',	'',	'',	0,	16,	1,	0,	'ko',	1,	1,	0,	'',	1,	0,	7,	'1004',	'',	'2',	'4',	'0',	'0',	'0',	''),
(180,	'dam',	'7 월에 당신을 데려 오는 것이 무엇이든지간에 그것은 좋거나 나쁘다. 항상 그 미소를 당신의 얼굴에 유지하십시오.',	1,	2,	'#FF1205',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'ko',	0,	1,	0,	'',	1,	0,	7,	'1469',	'',	'2',	'4',	'0',	'0',	'0',	''),
(181,	'bat_chuyen',	'여름의 온기가 무엇인지, 겨울의 추위는 단맛을주지 않아도 좋습니다.',	1,	2,	'#FBFF9C',	'',	'',	'',	'',	'',	0,	18,	2,	0,	'ko',	0,	1,	0,	'',	1,	0,	7,	'498',	'',	'2',	'4',	'0',	'0',	'0',	''),
(182,	'bat_chuyen',	'여름이 끝나는 바람은 사람들을 불안하게 만듭니다.',	0,	0,	'#FCFF69',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'ko',	1,	1,	0,	'',	1,	0,	7,	'1052',	'',	'2',	'4',	'0',	'0',	'0',	''),
(183,	'bat_chuyen',	'나는 당신이 나와 함께있을 때 9 월을 특히 좋아합니다!',	0,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'ko',	1,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(184,	'bat_chuyen',	'나는 당신이 나와 함께있을 때 9 월을 특히 좋아합니다!',	1,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'ko',	0,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(185,	'bat_chuyen',	'크리스마스 시즌이 여기 있습니다. 메리 크리스마스 시즌을 기원하며 행복하고 추위를 피하십시오. 메리 크리스마스.',	0,	2,	'#FBFF1F',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'ko',	1,	1,	0,	'',	1,	0,	12,	'1411',	'',	'2',	'4',	'0',	'0',	'0',	''),
(186,	'bat_chuyen',	'크리스마스 시즌이 여기 있습니다. 당신에게 행복하고 행복한 크리스마스를 기원하며 감기에 걸리지 않도록하십시오. 메리 크리스마스.',	1,	2,	'#BFFFAD',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'ko',	0,	1,	0,	'',	1,	0,	12,	'1415',	'',	'2',	'4',	'0',	'0',	'0',	''),
(187,	'thong_bao',	'겨울이 너무 추워요,{ten_user}! 외출 할 경우 따뜻한 옷을 많이 입어 피하십시오! ',	0,	1,	'#FEFFC2',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'ko',	1,	1,	0,	'',	1,	0,	12,	'1127',	'',	'',	'4',	'0',	'0',	'0',	''),
(188,	'bat_chuyen',	'Covid 19 시즌에는 붐비는 곳에 집중하지 말고 어디를 가든 마스크를 착용해야합니다!',	0,	3,	'#FFFBD1',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'ko',	1,	0,	0,	'',	1,	0,	0,	'1615',	'',	'2',	'4',	'0',	'0',	'0',	''),
(189,	'bat_chuyen',	'Covid 19 시즌에는 붐비는 곳에 집중하지 말고 어디를 가든 마스크를 착용해야합니다!',	1,	3,	'#E6C9FF',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'ko',	0,	0,	0,	'',	1,	0,	0,	'179',	'',	'2',	'4',	'0',	'0',	'0',	'');

-- 2021-03-10 08:18:06
