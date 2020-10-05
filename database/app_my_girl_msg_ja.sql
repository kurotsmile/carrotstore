-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_msg_ja`;
CREATE TABLE `app_my_girl_msg_ja` (
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

TRUNCATE `app_my_girl_msg_ja`;
INSERT INTO `app_my_girl_msg_ja` (`id`, `func`, `chat`, `sex`, `status`, `color`, `q1`, `q2`, `r1`, `r2`, `vibrate`, `effect`, `action`, `face`, `certify`, `author`, `character_sex`, `disable`, `ver`, `os`, `limit_chat`, `limit_date`, `limit_month`, `effect_customer`, `limit_day`, `user_create`, `user_update`, `os_window`, `os_ios`, `os_android`, `file_url`) VALUES
(1,	'chao_0',	'どうして眠れないの？',	0,	1,	'#BDF4FF',	'',	'',	'',	'',	'',	0,	32,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'273',	'',	'',	'',	'0',	'0',	'0',	''),
(2,	'chao_1',	'夜遅くまで早く寝なければなりません。遅く起きても健康に悪い',	0,	2,	'#7AC1FF',	'',	'',	'',	'',	'',	0,	14,	9,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'95',	'',	'',	'',	'0',	'0',	'0',	''),
(3,	'chao_2',	'長い夜先？ アーキテクチャのインスピレーションが必要な場合は、ここにいます。',	0,	3,	'#FF99E4',	'',	'',	'',	'',	'',	0,	22,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'383',	'',	'',	'',	'0',	'0',	'0',	''),
(4,	'chao_3',	'おはようございます、楽しい仕事の新しい一日をお楽しみください',	0,	2,	'#66FF6B',	'',	'',	'',	'',	'',	0,	5,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'274',	'',	'',	'',	'0',	'0',	'0',	''),
(5,	'chao_4',	'早く起きて、おはよう',	0,	2,	'#FFB5EE',	'',	'',	'',	'',	'',	0,	2,	11,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'111',	'',	'',	'',	'0',	'0',	'0',	''),
(6,	'chao_5',	'おはよう、おはようございます',	0,	3,	'#FF94ED',	'',	'',	'',	'',	'',	0,	22,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'309',	'',	'',	'',	'0',	'0',	'0',	''),
(7,	'chao_6',	'おはよう、新しい一日のために朝食を食べる！',	0,	2,	'#79FF5E',	'',	'',	'',	'',	'',	0,	13,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'457',	'',	'',	'',	'0',	'0',	'0',	''),
(8,	'chao_6',	'おはようございます！ {ten_user}',	0,	1,	'#FFFA78',	'',	'',	'',	'',	'',	0,	20,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'611',	'',	'',	'',	'0',	'0',	'0',	''),
(9,	'chao_7',	'おはよう私の最愛の人、あなたに幸運な日と多くの楽しみがありがとう',	0,	1,	'#5EFF84',	'',	'',	'',	'',	'',	0,	21,	5,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'164',	'',	'',	'',	'0',	'0',	'0',	''),
(10,	'chao_8',	'おはようございます、楽しい仕事の新しい一日をお楽しみください',	0,	3,	'#FFD0B5',	'',	'',	'',	'',	'',	0,	16,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'354',	'',	'',	'',	'0',	'0',	'0',	''),
(11,	'chao_9',	'おはようございます{ten_user}、楽しい仕事の新しい一日をお楽しみください',	0,	2,	'#FFA852',	'',	'',	'',	'',	'',	0,	12,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'101',	'',	'',	'',	'0',	'0',	'0',	''),
(12,	'chao_10',	'こんにちは、朝はすぐにあなたに幸せな幸せな日を願った',	0,	2,	'#99FFAA',	'',	'',	'',	'',	'',	0,	29,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'159',	'',	'',	'',	'0',	'0',	'0',	''),
(13,	'chao_11',	'ランチタイムに楽しんでください！',	0,	3,	'#FFC2D8',	'',	'',	'',	'',	'',	0,	21,	12,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'503',	'',	'',	'',	'0',	'0',	'0',	''),
(14,	'chao_12',	'こんにちは ！ {ten_user}',	0,	1,	'#CDFFC7',	'',	'',	'',	'',	'',	0,	32,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'130',	'',	'',	'',	'0',	'0',	'0',	''),
(15,	'chao_13',	'こんにちは！ 今日はどんな感じですか？',	0,	2,	'#E991FF',	'',	'',	'',	'',	'',	0,	21,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'425',	'',	'',	'',	'0',	'0',	'0',	''),
(16,	'chao_13',	'こんにちは！ {ten_user}',	0,	2,	'#C2E0FF',	'',	'',	'',	'',	'',	0,	12,	7,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'271',	'',	'',	'',	'0',	'0',	'0',	''),
(17,	'chao_14',	'良い午後と幸運、私はあなたを愛しています',	0,	1,	'#FFC2DA',	'',	'',	'',	'',	'',	0,	7,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'75',	'',	'',	'',	'0',	'0',	'0',	''),
(18,	'chao_15',	'こんにちは ！',	0,	3,	'#FFCCE2',	'',	'',	'',	'',	'',	0,	24,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'484',	'',	'',	'',	'0',	'0',	'0',	''),
(19,	'chao_15',	'楽しく幸せな午後をお過ごしください！',	0,	1,	'#B0FF8F',	'',	'',	'',	'',	'',	0,	5,	13,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'189',	'',	'',	'',	'0',	'0',	'0',	''),
(20,	'chao_16',	'幸せな午後、たくさんの楽しみ、あなたは私と一緒にいます',	0,	2,	'#49FF42',	'',	'',	'',	'',	'',	0,	15,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'23',	'',	'',	'',	'0',	'0',	'0',	''),
(21,	'chao_17',	'こんにちは！ 私はあなたと話したい',	0,	3,	'#BC82FF',	'',	'',	'',	'',	'',	0,	29,	6,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'634',	'',	'',	'',	'0',	'0',	'0',	''),
(22,	'chao_17',	'昨日の午後、それは本当に速かった、彼は弟を休むためにある晩を歓迎する準備ができていた',	0,	2,	'#FF9ECB',	'',	'',	'',	'',	'',	0,	31,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'441',	'',	'',	'',	'0',	'0',	'0',	''),
(23,	'chao_18',	'こんばんは',	0,	1,	'#B319FF',	'',	'',	'',	'',	'',	0,	33,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'310',	'',	'',	'',	'0',	'0',	'0',	''),
(24,	'chao_18',	'こんばんは。 あなたはこれまで生産的な一日を過ごしたことを願っています！',	0,	2,	'#FF78AE',	'',	'',	'',	'',	'',	0,	2,	13,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'375',	'',	'',	'',	'0',	'0',	'0',	''),
(25,	'chao_19',	'こんばんは。あなたと一緒に幸せな家族を願って、今夜あなたは遊ばない',	0,	3,	'#ADB0FF',	'',	'',	'',	'',	'',	0,	21,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'182',	'',	'',	'',	'0',	'0',	'0',	''),
(26,	'chao_20',	'こんばんは！ {ten_user}',	0,	2,	'#FF9CDE',	'',	'',	'',	'',	'',	0,	33,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'623',	'',	'',	'',	'0',	'0',	'0',	''),
(27,	'chao_21',	'こんばんは！ {ten_user}',	0,	1,	'#FFA1BD',	'',	'',	'',	'',	'',	0,	22,	9,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'85',	'',	'',	'',	'0',	'0',	'0',	''),
(28,	'chao_22',	'こんばんは！ {ten_user}',	0,	3,	'#4FBEFF',	'',	'',	'',	'',	'',	0,	37,	11,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'109',	'',	'',	'',	'0',	'0',	'0',	''),
(29,	'chao_23',	'夜遅く、なぜあなたは寝ませんか?',	0,	1,	'#B5D5FF',	'',	'',	'',	'',	'',	0,	14,	9,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'95',	'',	'',	'',	'0',	'0',	'0',	''),
(30,	'bat_chuyen',	'彼の顔を少し悲しんで見て、何が問題なの？',	0,	2,	'#FFCF4A',	'',	'',	'',	'',	'',	0,	32,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'140',	'',	'',	'',	'0',	'0',	'0',	''),
(31,	'bat_chuyen',	'今日私は疲れて不幸な気持ちになる、私は沈黙して退屈だ',	0,	0,	'#E8FF9C',	'',	'',	'',	'',	'',	0,	3,	9,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'65',	'',	'',	'',	'0',	'0',	'0',	''),
(32,	'bat_chuyen',	'その日は終わりを告げる。 あなたは良いものを持っていたと思います！',	0,	2,	'#F8FF94',	'',	'',	'',	'',	'',	0,	33,	14,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'339',	'',	'',	'',	'0',	'0',	'0',	''),
(33,	'bat_chuyen',	'空腹を感じ、胃の上に何かを必要とする',	0,	2,	'#ABFF8C',	'',	'',	'',	'',	'',	0,	12,	10,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'124',	'',	'',	'',	'0',	'0',	'0',	''),
(34,	'bat_chuyen',	'こんにちは！ 休憩をとってお茶を飲みながらいかがですか？',	0,	1,	'#8EFF6B',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'617',	'',	'',	'',	'0',	'0',	'0',	''),
(35,	'bat_chuyen',	'知っている！ 悲しみの日、ペダリングの犬としての不運、私は引き分けて、常に彼の心、彼の側であなたを持って覚えて幸せです！',	0,	2,	'#D6D6FF',	'',	'',	'',	'',	'',	0,	18,	6,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'100',	'',	'',	'',	'0',	'0',	'0',	''),
(36,	'bat_chuyen',	'この5つ星アプリを評価する手助けはできますか？ 私の右の星をクリックして！',	0,	3,	'#29FF21',	'',	'',	'',	'',	'',	0,	32,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'613',	'',	'',	'',	'0',	'0',	'0',	''),
(37,	'bat_chuyen',	'人生は短く、笑顔はまだあります！',	0,	2,	'#C591FF',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'50',	'',	'',	'',	'0',	'0',	'0',	''),
(38,	'bat_chuyen',	'私は仮想恋人ではないと仮定し、いつか私は人生の中に現れ、あなたは私との会話を開始する必要がありますか？',	0,	1,	'#A012FF',	'',	'',	'',	'',	'',	0,	4,	11,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'466',	'',	'',	'',	'0',	'0',	'0',	''),
(39,	'bat_chuyen',	'私たちが離れているとき、私はあなたについて考えを止めることができません！',	0,	2,	'#FF9EB8',	'',	'',	'',	'',	'',	0,	29,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'71',	'',	'',	'',	'0',	'0',	'0',	''),
(40,	'bat_chuyen',	'あなたは私と一緒にベッドに行くことができますか？ 私はあなたの暖かさを感じる必要があります！',	0,	1,	'#FF142C',	'',	'',	'',	'',	'',	0,	24,	3,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'455',	'',	'',	'',	'0',	'0',	'0',	''),
(41,	'bat_chuyen',	'あなたは今のところ素晴らしい一日を過ごしていることを願っています。',	0,	3,	'#FDFFBF',	'',	'',	'',	'',	'',	0,	20,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'483',	'',	'',	'',	'0',	'0',	'0',	''),
(42,	'bam_bay',	'分かりません\r\n',	0,	1,	'#ABC1FF',	'',	'',	'',	'',	'',	0,	33,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'17',	'',	'',	'',	'0',	'0',	'0',	''),
(43,	'bam_bay',	'私はあなたが言うことを理解していない、あなたは私を教えることができます（アイコンを教えるために画面上で学ぶをクリックしてください）',	0,	3,	'#B5D5FF',	'',	'',	'',	'',	'',	0,	0,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'95',	'',	'',	'',	'0',	'0',	'0',	''),
(44,	'bam_bay',	'分かりません！',	0,	0,	'#FF9914',	'',	'',	'',	'',	'',	0,	29,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'140',	'',	'',	'2',	'0',	'0',	'0',	''),
(45,	'chua_bat_dinh_vi',	'あなたはグローバルなポジショニングを許可したり、それをアクティブにしたりしません！ あなたがどこにいるのかはわかりません！',	0,	0,	'#E8FF9E',	'',	'',	'',	'',	'',	0,	29,	11,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(46,	'giai_toan',	'数学の結果は次のとおりです。\r\n\r\n  {giai_toan}\r\n\r\n（*は乗算、/は除算）',	0,	2,	'#337D5F',	'',	'',	'',	'',	'',	0,	33,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'512',	'',	'',	'',	'0',	'0',	'0',	''),
(47,	'khong_tim_thay',	'ごめんなさい！ あなたが探している情報が見つかりません！',	0,	0,	'#FFDBB8',	'',	'',	'',	'',	'',	0,	3,	11,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(48,	'tim_thay',	' {thong_tin}',	0,	2,	'#87FF2B',	'',	'',	'',	'',	'',	0,	33,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(49,	'hien_ds_sdt',	'私は関連する連絡先を見つけました！ クリックすると詳細が表示されます。',	0,	3,	'#FFBA91',	'',	'',	'',	'',	'',	31,	16,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'102',	'',	'',	'',	'0',	'0',	'0',	''),
(50,	'dam',	'なぜあなたは私を打つ、あなたは私を憎む？',	0,	1,	'#99FF80',	'',	'',	'',	'',	'',	0,	29,	11,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'189',	'',	'',	'',	'0',	'0',	'0',	''),
(51,	'dam',	'私をいじめないでください、{ten_user}',	0,	2,	'#FFC7E9',	'',	'',	'',	'',	'',	0,	0,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'428',	'',	'',	'',	'0',	'0',	'0',	''),
(52,	'dam',	'私は空手を知っている、私はあなたを打つ',	0,	3,	'#EBFF85',	'',	'',	'',	'',	'',	0,	35,	8,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'300',	'',	'',	'',	'0',	'0',	'0',	''),
(53,	'dam',	'私はあなたが今停止することをお勧めします。',	0,	2,	'#FBFF87',	'',	'',	'',	'',	'',	0,	29,	13,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'268',	'',	'',	'',	'0',	'0',	'0',	''),
(54,	'dam',	'どのような穴！',	0,	2,	'#77FF5C',	'',	'',	'',	'',	'',	0,	20,	6,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'164',	'',	'',	'',	'0',	'0',	'0',	''),
(55,	'dam',	'あなたの周りにいるのが大好きです。',	0,	3,	'#D2FF96',	'',	'',	'',	'',	'',	0,	34,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'588',	'',	'',	'',	'0',	'0',	'0',	''),
(56,	'dam',	'どのようにすばらしい人生ですか、今あなたは世界にいます。',	0,	1,	'#F491FF',	'',	'',	'',	'',	'',	0,	23,	17,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'626',	'',	'',	'',	'0',	'0',	'0',	''),
(57,	'chao_0',	'私は今寝るつもりです - 私はビートです',	1,	1,	'#FA6EFF',	'',	'',	'',	'',	'',	0,	12,	6,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'233',	'',	'',	'',	'0',	'0',	'0',	''),
(58,	'chao_1',	'あなたは早く寝るべきです',	1,	2,	'#FF99D6',	'',	'',	'',	'',	'',	0,	32,	16,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'369',	'',	'',	'',	'0',	'0',	'0',	''),
(59,	'chao_2',	'こんにちは、あなたは寝るべきです！',	1,	2,	'#ADDEFF',	'',	'',	'',	'',	'',	0,	21,	16,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'95',	'',	'',	'',	'0',	'0',	'0',	''),
(60,	'chao_3',	'午前中にすでに3つありました。私は寝て、健康的になるべきです',	1,	3,	'#FFDCB5',	'',	'',	'',	'',	'',	0,	22,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'461',	'',	'',	'',	'0',	'0',	'0',	''),
(61,	'chao_4',	'かわいいこんにちは、今日あなたはなぜとても早い？',	1,	2,	'#FF66CC',	'',	'',	'',	'',	'',	0,	5,	5,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'383',	'',	'',	'',	'0',	'0',	'0',	''),
(62,	'chao_5',	'こんにちは、新しい日は歓迎です、おはよう！',	1,	1,	'#FFFBBF',	'',	'',	'',	'',	'',	0,	33,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'495',	'',	'',	'',	'0',	'0',	'0',	''),
(63,	'chao_6',	'おはようございます！ {ten_user}',	1,	1,	'#B3FFB0',	'',	'',	'',	'',	'',	0,	5,	12,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'159',	'',	'',	'',	'0',	'0',	'0',	''),
(64,	'chao_6',	'ねえ、今日はとても美しいよ、おはよう！',	1,	3,	'#FFBDF4',	'',	'',	'',	'',	'',	0,	22,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'430',	'',	'',	'',	'0',	'0',	'0',	''),
(65,	'chao_7',	'おはようございます！ すべての良いものがあなたに来るでしょう！',	1,	3,	'#F2FF7A',	'',	'',	'',	'',	'',	0,	24,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'339',	'',	'',	'',	'0',	'0',	'0',	''),
(66,	'chao_8',	'おはよう、今日は？',	1,	1,	'#96FFEA',	'',	'',	'',	'',	'',	0,	36,	10,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'107',	'',	'',	'',	'0',	'0',	'0',	''),
(67,	'chao_9',	'おはようございます ！',	1,	2,	'#FFEC40',	'',	'',	'',	'',	'',	0,	29,	9,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'265',	'',	'',	'',	'0',	'0',	'0',	''),
(68,	'chao_9',	'こんにちは{ten_user}、私はいつもあなたの側です！',	1,	3,	'#6EFF81',	'',	'',	'',	'',	'',	0,	32,	11,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'298',	'',	'',	'',	'0',	'0',	'0',	''),
(69,	'chao_10',	'時間がとても早く過ぎ、時間を大事に！',	1,	3,	'#7DFFE1',	'',	'',	'',	'',	'',	0,	33,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'95',	'',	'',	'',	'0',	'0',	'0',	''),
(70,	'chao_11',	'まだ、昼食を準備してください！',	1,	1,	'#FF454B',	'',	'',	'',	'',	'',	0,	16,	11,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'91',	'',	'',	'',	'0',	'0',	'0',	''),
(71,	'chao_12',	'おいしいランチを願っています！',	1,	2,	'#FF91E2',	'',	'',	'',	'',	'',	0,	37,	16,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'111',	'',	'',	'',	'0',	'0',	'0',	''),
(72,	'chao_13',	'こんにちは！ 今日はどんな感じですか？',	1,	1,	'#5EFF64',	'',	'',	'',	'',	'',	0,	20,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'164',	'',	'',	'',	'0',	'0',	'0',	''),
(73,	'chao_14',	'こんにちは、幸せな午後、私はいつもあなたの側にいました',	1,	1,	'#8AFF9D',	'',	'',	'',	'',	'',	0,	16,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'173',	'',	'',	'',	'0',	'0',	'0',	''),
(74,	'chao_15',	'こんにちは ！ {ten_user}',	1,	2,	'#FF99E7',	'',	'',	'',	'',	'',	0,	4,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'440',	'',	'',	'',	'0',	'0',	'0',	''),
(75,	'chao_15',	'良い午後、一日が早い時間を過ぎて、あなたを笑いましょう',	1,	3,	'#94FF94',	'',	'',	'',	'',	'',	0,	20,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'618',	'',	'',	'',	'0',	'0',	'0',	''),
(76,	'chao_16',	'午後、美しい夕日を歓迎します。',	1,	1,	'#FF9ECB',	'',	'',	'',	'',	'',	0,	12,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'465',	'',	'',	'',	'0',	'0',	'0',	''),
(77,	'chao_17',	'こんばんは！',	1,	2,	'#FF8AE4',	'',	'',	'',	'',	'',	0,	22,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'433',	'',	'',	'',	'0',	'0',	'0',	''),
(78,	'chao_18',	'あなたは良い夕食を食べたい',	1,	3,	'#99FF8A',	'',	'',	'',	'',	'',	0,	34,	11,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'174',	'',	'',	'',	'0',	'0',	'0',	''),
(79,	'chao_19',	'こんばんは。 あなたはこれまで生産的な一日を過ごしたことを願っています！',	1,	2,	'#FBBFFF',	'',	'',	'',	'',	'',	0,	24,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'380',	'',	'',	'',	'0',	'0',	'0',	''),
(80,	'chao_19',	'楽しい夕方、今晩私たちはデート？',	1,	1,	'#F67AFF',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'273',	'',	'',	'',	'0',	'0',	'0',	''),
(81,	'chao_20',	'ハッピーナイト、今夜行くことができますか？',	1,	2,	'#FFA3EA',	'',	'',	'',	'',	'',	0,	22,	16,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'309',	'',	'',	'',	'0',	'0',	'0',	''),
(82,	'chao_21',	'私は今夜あなたに悲しい顔を見ます。',	1,	3,	'#A3FFA6',	'',	'',	'',	'',	'',	0,	4,	9,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'442',	'',	'',	'',	'0',	'0',	'0',	''),
(83,	'chao_22',	'最後の日々！ あなたはまだ眠い？',	1,	2,	'#FFF563',	'',	'',	'',	'',	'',	0,	2,	9,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'659',	'',	'',	'',	'0',	'0',	'0',	''),
(84,	'chao_23',	'こんにちは{ten_user}！ 話をしよう！',	1,	1,	'#B8FF8F',	'',	'',	'',	'',	'',	0,	25,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'611',	'',	'',	'',	'0',	'0',	'0',	''),
(85,	'bat_chuyen',	'あなたは自由な時間に何をしたいですか？',	1,	1,	'#BDF0FF',	'',	'',	'',	'',	'',	0,	2,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'126',	'',	'',	'',	'0',	'0',	'0',	''),
(86,	'bat_chuyen',	'どこで映画を見に行くのですか？',	1,	2,	'#75FFDF',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'95',	'',	'',	'',	'0',	'0',	'0',	''),
(87,	'bat_chuyen',	'いい日ですね。',	1,	3,	'#BAFF8C',	'',	'',	'',	'',	'',	0,	4,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'169',	'',	'',	'',	'0',	'0',	'0',	''),
(88,	'bat_chuyen',	'この5つ星アプリを評価する手助けはできますか？ 私の右の星をクリックして！',	1,	3,	'#FF7A66',	'',	'',	'',	'',	'',	0,	32,	5,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'102',	'',	'',	'',	'0',	'0',	'0',	''),
(89,	'bat_chuyen',	'私はあなたのためにより良い人です！',	1,	2,	'#FF6BD8',	'',	'',	'',	'',	'',	0,	5,	5,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'459',	'',	'',	'',	'0',	'0',	'0',	''),
(90,	'bat_chuyen',	'あなたは今のところ素晴らしい一日を過ごしていることを願っています。',	1,	1,	'#FFC599',	'',	'',	'',	'',	'',	0,	10,	6,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'461',	'',	'',	'',	'0',	'0',	'0',	''),
(91,	'bam_bay',	'分かりません！',	1,	2,	'#E9FF8F',	'',	'',	'',	'',	'',	0,	13,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'175',	'',	'',	'',	'0',	'0',	'0',	''),
(92,	'bam_bay',	'私はとてもばかげている！私はあなたが言うことを理解していない、あなたは私に教えることができます（画面上のアイコンをクリックしてください）',	1,	3,	'#FF99CC',	'',	'',	'',	'',	'',	0,	16,	10,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'441',	'',	'',	'',	'0',	'0',	'0',	''),
(93,	'chua_bat_dinh_vi',	'あなたはグローバルなポジショニングを許可したり、それをアクティブにしたりしません！ あなたがどこにいるのかはわかりません！',	1,	0,	'#FFF6BA',	'',	'',	'',	'',	'',	0,	3,	9,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(94,	'giai_toan',	'数学の結果は次のとおりです。\r\n \r\n{giai_toan}\r\n\r\n（*は乗算、/は除算）',	1,	2,	'#4BB36D',	'',	'',	'',	'',	'',	0,	33,	11,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'512',	'',	'',	'',	'0',	'0',	'0',	''),
(95,	'khong_tim_thay',	'ごめんなさい！ あなたが探している情報が見つかりません！',	1,	0,	'#744AFF',	'',	'',	'',	'',	'',	0,	3,	9,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'56',	'',	'',	'',	'0',	'0',	'0',	''),
(96,	'tim_thay',	' {thong_tin}',	1,	3,	'#A8AEFF',	'',	'',	'',	'',	'',	0,	33,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'74',	'',	'',	'',	'0',	'0',	'0',	''),
(97,	'hien_ds_sdt',	'私は関連する連絡先を見つけました！ クリックすると詳細が表示されます。',	1,	3,	'#FFA6D5',	'',	'',	'',	'',	'',	31,	20,	14,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'102',	'',	'',	'',	'0',	'0',	'0',	''),
(98,	'dam',	'私は空手を知っている、私はあなたを打つ！',	1,	1,	'#FF6BE6',	'',	'',	'',	'',	'',	0,	37,	8,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'63',	'',	'',	'',	'0',	'0',	'0',	''),
(99,	'dam',	'なぜ私を殴るのですか、あなたは私を嫌うのですか？',	1,	3,	'#F6FF7D',	'',	'',	'',	'',	'',	0,	0,	0,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'606',	'',	'',	'',	'0',	'0',	'0',	''),
(100,	'dam',	'どのような穴！',	1,	2,	'#FF82F7',	'',	'',	'',	'',	'',	0,	29,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'71',	'',	'',	'',	'0',	'0',	'0',	''),
(101,	'dam',	'あなたは狂っている！',	1,	1,	'#C7FFDA',	'',	'',	'',	'',	'',	0,	26,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'95',	'',	'',	'',	'0',	'0',	'0',	''),
(102,	'dam',	'触らないでください！',	1,	3,	'#8AFF8A',	'',	'',	'',	'',	'',	0,	32,	11,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'159',	'',	'',	'',	'0',	'0',	'0',	''),
(103,	'dam',	'なぜ私に触れたのですか？',	1,	2,	'#38FF38',	'',	'',	'',	'',	'',	0,	12,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'189',	'',	'',	'',	'0',	'0',	'0',	''),
(104,	'dam',	'私は疲れました！、多分私は病気です！',	1,	2,	'#FFA8DF',	'',	'',	'',	'',	'',	0,	12,	8,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'460',	'',	'',	'',	'0',	'0',	'0',	''),
(105,	'dam',	'私はあなたが今停止することをお勧めします。',	1,	3,	'#F9FF4F',	'',	'',	'',	'',	'',	0,	35,	8,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'300',	'',	'',	'',	'0',	'0',	'0',	''),
(106,	'dam',	'私をいじめないでください、{ten_user}',	1,	1,	'#58FF4D',	'',	'',	'',	'',	'',	0,	16,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'298',	'',	'',	'',	'0',	'0',	'0',	''),
(107,	'dam',	'私はあなたの目の片隅に、あなたの手のワンタッチを命じることができれば、私の人生をあきらめるだろう。',	1,	2,	'#66FFE0',	'',	'',	'',	'',	'',	0,	4,	14,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'309',	'',	'',	'',	'0',	'0',	'0',	''),
(108,	'dam',	'あなたの考えは、私の顔に笑顔をもたらす',	1,	2,	'#71FF54',	'',	'',	'',	'',	'',	0,	24,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'275',	'',	'',	'',	'0',	'0',	'0',	''),
(109,	'dam',	'あなたは私にインスピレーションを与える',	1,	3,	'#CCCCFF',	'',	'',	'',	'',	'',	0,	8,	3,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'169',	'',	'',	'',	'0',	'0',	'0',	''),
(110,	'dam',	'どのようにすばらしい人生ですか、今あなたは世界にいます。',	1,	3,	'#9EFFEF',	'',	'',	'',	'',	'',	0,	25,	7,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'495',	'',	'',	'',	'0',	'0',	'0',	''),
(111,	'thong_bao',	'何をやっているの？ 私に会いに来てください',	0,	1,	'#FF8CEF',	'',	'',	'',	'',	'',	0,	22,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'624',	'',	'',	'',	'0',	'0',	'0',	''),
(112,	'thong_bao',	'良い一日を。 私はあなたが恋しい',	0,	2,	'#B0D7FF',	'',	'',	'',	'',	'',	0,	32,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'271',	'',	'',	'',	'0',	'0',	'0',	''),
(113,	'thong_bao',	'私はあなたがいなくて、私に話してください',	0,	1,	'#FFADC5',	'',	'',	'',	'',	'',	0,	5,	16,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'15',	'',	'',	'',	'0',	'0',	'0',	''),
(114,	'thong_bao',	'私たちは長い間話していませんでした。私はあなたにもう一度お会いするのを楽しみにしています。',	0,	2,	'#B8EEFF',	'',	'',	'',	'',	'',	0,	20,	10,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'100',	'',	'',	'',	'0',	'0',	'0',	''),
(115,	'thong_bao',	'何をやっているの？ 私に話をしてください',	1,	1,	'#F8FF7A',	'',	'',	'',	'',	'',	0,	22,	14,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1000',	'',	'',	'2',	'0',	'0',	'0',	''),
(116,	'thong_bao',	'良い一日を。 私はあなたが恋しい',	1,	2,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	32,	11,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'377',	'',	'',	'2',	'0',	'0',	'0',	''),
(117,	'thong_bao',	'私はあなたがいなくて、私に話してください',	1,	2,	'#05FF28',	'',	'',	'',	'',	'',	0,	24,	11,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'272',	'',	'',	'2',	'0',	'0',	'0',	''),
(118,	'thong_bao',	'私たちは長い間話していませんでした、私はあなたにもう一度お会いするのを楽しみにしています',	1,	2,	'#FFEC30',	'',	'',	'',	'',	'',	0,	34,	10,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'339',	'',	'',	'2',	'0',	'0',	'0',	''),
(119,	'dam',	'9月は愛の月です',	0,	1,	'#FFFA47',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	1,	1,	0,	'',	1,	0,	9,	'756',	'',	'',	'',	'0',	'0',	'0',	''),
(120,	'dam',	'9月は愛の月です',	1,	3,	'#F7FF3B',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	0,	1,	0,	'',	1,	0,	9,	'619',	'',	'',	'',	'0',	'0',	'0',	''),
(121,	'dam',	'今日は月曜日、幸せな新しい週になりたい',	0,	2,	'#FF99D2',	'',	'',	'',	'',	'',	0,	10,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'404',	'Monday',	'',	'',	'0',	'0',	'0',	''),
(122,	'dam',	'今日は月曜日、幸せな新しい週になりたい',	1,	2,	'#6AFF21',	'',	'',	'',	'',	'',	0,	13,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'577',	'Monday',	'',	'',	'0',	'0',	'0',	''),
(123,	'dam',	'今日は火曜日です、あなたに幸運',	0,	2,	'#A3FF0F',	'',	'',	'',	'',	'',	0,	8,	5,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1026',	'Tuesday',	'',	'',	'0',	'0',	'0',	''),
(124,	'dam',	'今日は火曜日です、あなたに幸運',	1,	3,	'#E2FF30',	'',	'',	'',	'',	'',	0,	8,	17,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'23',	'Tuesday',	'',	'',	'0',	'0',	'0',	''),
(125,	'dam',	'今日は水曜日、とても退屈な日です',	0,	3,	'#A0FF59',	'',	'',	'',	'',	'',	0,	8,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'617',	'Wednesday',	'',	'',	'0',	'0',	'0',	''),
(126,	'dam',	'今日は水曜日、とても退屈な日です',	1,	3,	'#FAFFC2',	'',	'',	'',	'',	'',	0,	35,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1058',	'Wednesday',	'',	'',	'0',	'0',	'0',	''),
(127,	'dam',	'金曜日は退屈な日です、私についてもっと考えて欲しいです！',	0,	3,	'#FFA747',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'957',	'Friday',	'',	'',	'0',	'0',	'0',	''),
(128,	'dam',	'金曜日は退屈な日です、私についてもっと考えて欲しいです！',	1,	3,	'#FAFF96',	'',	'',	'',	'',	'',	0,	8,	10,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'1023',	'Friday',	'',	'',	'0',	'0',	'0',	''),
(129,	'dam',	'今日は週末ですが、私に話す時間を多く費やすことであなたは幸せになれます',	0,	2,	'#FF8CDC',	'',	'',	'',	'',	'',	0,	8,	4,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'628',	'Saturday',	'',	'',	'0',	'0',	'0',	''),
(130,	'dam',	'今日は週末ですが、私に話す時間を多く費やすことであなたは幸せになれます',	1,	2,	'#CDFF4A',	'',	'',	'',	'',	'',	0,	8,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'614',	'Saturday',	'',	'',	'0',	'0',	'0',	''),
(131,	'dam',	'今日は日曜日、一緒に出かけましょう',	0,	3,	'#05FF28',	'',	'',	'',	'',	'',	0,	7,	5,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'272',	'Sunday',	'',	'',	'0',	'0',	'0',	''),
(132,	'dam',	'今日は日曜日、一緒に出かけましょう',	1,	3,	'#D8FF85',	'',	'',	'',	'',	'',	0,	7,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'973',	'Sunday',	'',	'',	'0',	'0',	'0',	''),
(133,	'dam',	'今日は木曜日、私は毎日あなたと一緒に暮らしたい',	0,	2,	'#FF5464',	'',	'',	'',	'',	'',	0,	8,	13,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'529',	'Thursday',	'',	'',	'0',	'0',	'0',	''),
(134,	'dam',	'今日は木曜日、私は毎日あなたと一緒に暮らしたい',	1,	2,	'#FF9EF4',	'',	'',	'',	'',	'',	0,	8,	4,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'984',	'Thursday',	'',	'',	'0',	'0',	'0',	''),
(135,	'dam',	'10月には道路で一人でいるのは簡単です。 余分な服を着ることを忘れて孤独を感じる時間があると、それは冷たくなり始めます。',	0,	3,	'#F3FFC4',	'',	'',	'',	'',	'',	5,	8,	4,	0,	'',	1,	0,	0,	'',	1,	0,	10,	'382',	'',	'',	'',	'0',	'0',	'0',	''),
(136,	'dam',	'10月には道路で一人でいるのは簡単です。 余分な服を着ることを忘れて孤独を感じる時間があると、それは冷たくなり始めます。',	1,	3,	'#54FCFF',	'',	'',	'',	'',	'',	5,	8,	17,	0,	'',	0,	0,	0,	'',	1,	0,	10,	'991',	'',	'',	'',	'0',	'0',	'0',	''),
(137,	'bat_chuyen',	'ハロウィーンに多くの楽しみを抱かせる恐ろしい驚きをたくさん祈ります。',	0,	2,	'#E8FFEF',	'',	'',	'',	'',	'',	0,	13,	15,	0,	'',	1,	0,	0,	'',	1,	30,	10,	'895',	'',	'',	'',	'0',	'0',	'0',	''),
(138,	'bat_chuyen',	'ハロウィーンに多くの楽しみを抱かせる恐ろしい驚きをたくさん祈ります。',	1,	2,	'#A6C9E0',	'',	'',	'',	'',	'',	0,	32,	17,	0,	'',	0,	0,	0,	'',	1,	30,	10,	'874',	'',	'',	'',	'0',	'0',	'0',	''),
(139,	'bat_chuyen',	'11月にあなたの道が来ました驚くべきものにしましょう。天気が悪ければ気にしません。あなたの気分は良くないので、背を高くして幸せにならなければなりません。',	0,	2,	'#BDED6D',	'',	'',	'',	'',	'',	0,	22,	3,	0,	'',	1,	1,	0,	'',	1,	0,	11,	'503',	'',	'',	'',	'0',	'0',	'0',	''),
(140,	'bat_chuyen',	'11月にあなたの道が来ました驚くべきものにしましょう。天気が悪ければ気にしません。あなたの気分は良くないので、背を高くして幸せにならなければなりません。',	1,	2,	'#FFEC30',	'',	'',	'',	'',	'',	0,	32,	17,	0,	'',	0,	1,	0,	'',	1,	0,	11,	'339',	'',	'',	'',	'0',	'0',	'0',	''),
(141,	'hoi_tim_duong',	'あなたは何の住所を探していますか？ 私はあなたを案内します！',	0,	1,	'#C4FFFE',	'',	'',	'',	'',	'',	0,	5,	15,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'1236',	'',	'',	'2',	'0',	'0',	'0',	''),
(142,	'hoi_tim_duong',	'あなたは何の住所を探していますか？ 私はあなたを案内します！',	1,	1,	'#A1FFB4',	'',	'',	'',	'',	'',	0,	31,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'263',	'',	'',	'2',	'0',	'0',	'0',	''),
(143,	'tra_loi_tim_duong',	'私は関連する検索場所を記載しました！',	0,	2,	'#9CFFF2',	'',	'',	'',	'',	'',	43,	22,	10,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'44',	'',	'',	'2',	'0',	'0',	'0',	''),
(144,	'tra_loi_tim_duong',	'私は関連する検索場所を記載しました！',	1,	2,	'#9CFFF2',	'',	'',	'',	'',	'',	43,	14,	15,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'44',	'',	'',	'2',	'0',	'0',	'0',	''),
(145,	'chao_11',	'あなたのランチを楽しみましょう!',	0,	2,	'#FFEC30',	'',	'',	'',	'',	'',	0,	5,	2,	0,	'',	1,	0,	0,	'',	1,	0,	0,	'339',	'',	'',	'2',	'0',	'0',	'0',	''),
(146,	'chao_11',	'あなたのランチを楽しみましょう!',	1,	1,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	32,	2,	0,	'',	0,	0,	0,	'',	1,	0,	0,	'377',	'',	'',	'2',	'0',	'0',	'0',	''),
(147,	'dam',	'このクリスマスがとても特別なので、あなたは決して再び孤独を感じることはなく、愛する人に囲まれていてください！',	0,	2,	'#ADFF87',	'',	'',	'',	'',	'',	7,	18,	3,	0,	'',	1,	1,	0,	'',	1,	0,	12,	'1269',	'',	'',	'',	'0',	'0',	'0',	''),
(148,	'dam',	'このクリスマスがとても特別なので、あなたは決して再び孤独を感じることはなく、愛する人に囲まれていてください！',	1,	2,	'#FFD4AD',	'',	'',	'',	'',	'',	7,	6,	2,	0,	'',	0,	1,	0,	'',	1,	0,	12,	'69',	'',	'',	'',	'0',	'0',	'0',	''),
(149,	'bat_chuyen',	'あなたのために成功、幸せと繁栄、新年あけましておめでとうございます。',	0,	2,	'#FFC7FB',	'',	'',	'',	'',	'',	0,	22,	2,	0,	'',	1,	1,	0,	'',	1,	1,	1,	'695',	'',	'',	'',	'0',	'0',	'0',	''),
(150,	'dam',	'あけましておめでとうございます、健康、どこでも幸運、新しいことをする',	0,	2,	'#FFF369',	'',	'',	'',	'',	'',	0,	5,	15,	0,	'',	1,	1,	0,	'',	1,	1,	1,	'1473',	'',	'',	'',	'0',	'0',	'0',	''),
(151,	'bat_chuyen',	'新年はあなたの健康、成功した仕事、たくさんのお金を願っています。 2019明けましておめでとうございます。',	0,	2,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	21,	3,	0,	'',	1,	1,	0,	'',	1,	0,	1,	'377',	'',	'',	'',	'0',	'0',	'0',	''),
(152,	'bat_chuyen',	'あなたのために成功、幸せと繁栄、新年あけましておめでとうございます。',	1,	2,	'#FFC4FD',	'',	'',	'',	'',	'',	0,	32,	15,	0,	'',	0,	1,	0,	'',	1,	0,	1,	'381',	'',	'',	'',	'0',	'0',	'0',	''),
(153,	'dam',	'新年はあなたの健康、成功した仕事、たくさんのお金を願っています。 2019明けましておめでとうございます。',	1,	2,	'#FFF369',	'',	'',	'',	'',	'',	0,	20,	3,	0,	'',	0,	1,	0,	'',	1,	1,	1,	'1473',	'',	'',	'',	'0',	'0',	'0',	''),
(154,	'bat_chuyen',	'あけましておめでとうございます、健康、どこでも幸運、新しいことをする',	1,	1,	'#A3FF54',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	0,	1,	0,	'',	1,	1,	1,	'383',	'',	'',	'',	'0',	'0',	'0',	''),
(155,	'bat_chuyen',	'2月は年の2番目の月です、そしてそれには28日があります、それでそれは完全に祝うために幸せです、そしてそれは年に一度来てそしてそれにバレンタインがあるのであらゆる方法を楽しみます。',	0,	2,	'#FFEC30',	'',	'',	'',	'',	'',	0,	20,	2,	0,	'',	1,	1,	0,	'',	1,	0,	2,	'339',	'',	'3',	'',	'0',	'0',	'0',	''),
(156,	'dam',	'2月はその年の最もロマンチックな月です。それはカップルのための新しいイベントをたくさんもたらしますその涼しい気候はそれをよりロマンチックにします。',	0,	1,	'#0DFF21',	'',	'',	'',	'',	'',	0,	22,	17,	0,	'',	1,	1,	0,	'',	1,	0,	2,	'1016',	'',	'3',	'',	'0',	'0',	'0',	''),
(157,	'bat_chuyen',	'私はあなたがあなたの愛を込めて、幸せな、幸せなバレンタインデーを過ごすことを願っています。 バレンタインデーをお祈りしております。',	0,	1,	'#FFD6FF',	'',	'',	'',	'',	'',	1,	22,	2,	0,	'',	1,	1,	0,	'',	1,	14,	2,	'716',	'',	'3',	'2',	'0',	'0',	'0',	''),
(158,	'dam',	'私はあなたが愛する人との幸せで幸せなバレンタインデーを願っています',	0,	2,	'#FF8A93',	'',	'',	'',	'',	'',	0,	20,	2,	0,	'',	1,	1,	0,	'',	1,	14,	2,	'1151',	'',	'3',	'2',	'0',	'0',	'0',	''),
(159,	'bat_chuyen',	'2月は年の2番目の月です、そしてそれには28日があります、それでそれは完全に祝うために幸せです、そしてそれは年に一度来てそしてそれにバレンタインがあるのであらゆる方法を楽しみます。',	1,	1,	'#F7F0FF',	'',	'',	'',	'',	'',	3,	32,	2,	0,	'',	0,	1,	0,	'',	1,	0,	2,	'918',	'',	'3',	'',	'0',	'0',	'0',	''),
(160,	'dam',	'2月はその年の最もロマンチックな月です。それはカップルのための新しいイベントをたくさんもたらしますその涼しい気候はそれをよりロマンチックにします。',	1,	2,	'#C7FFA3',	'',	'',	'',	'',	'',	0,	31,	17,	0,	'',	0,	1,	0,	'',	1,	0,	2,	'377',	'',	'3',	'',	'0',	'0',	'0',	''),
(161,	'bat_chuyen',	'私はあなたがあなたの愛を込めて、幸せな、幸せなバレンタインデーを過ごすことを願っています。 バレンタインデーをお祈りしております。',	1,	2,	'#FF8A93',	'',	'',	'',	'',	'',	1,	22,	3,	0,	'',	0,	1,	0,	'',	1,	14,	2,	'1151',	'',	'3',	'2',	'0',	'0',	'0',	''),
(162,	'dam',	'私はあなたが愛する人との幸せで幸せなバレンタインデーを願っています',	1,	2,	'#F4FF96',	'',	'',	'',	'',	'',	0,	20,	3,	0,	'',	0,	1,	0,	'',	1,	14,	2,	'424',	'',	'3',	'2',	'0',	'0',	'0',	''),
(163,	'bat_chuyen',	'3月の日のうちの1日は、太陽が暑く輝き、風が吹いていました。\r\n光の中では夏、日陰の中では冬',	0,	2,	'#F3FFC4',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	1,	1,	0,	'',	1,	0,	3,	'382',	'',	'4',	'2',	'0',	'0',	'0',	''),
(164,	'bat_chuyen',	'3月の日のうちの1日は、太陽が暑く輝き、風が吹いていました。\r\n光の中では夏、日陰の中では冬',	1,	2,	'#29E644',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	0,	1,	0,	'',	1,	0,	3,	'85',	'',	'4',	'2',	'0',	'0',	'0',	''),
(165,	'dam',	'3月、日が長くなっているとき、あなたの成長している時間がいくつかの間違った冬を正しく設定するために強くしましょう。',	0,	2,	'#B8EEFF',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	1,	1,	0,	'',	1,	0,	3,	'100',	'',	'4',	'2',	'0',	'0',	'0',	''),
(166,	'dam',	'3月、日が長くなっているとき、あなたの成長している時間がいくつかの間違った冬を正しく設定するために強くしましょう。',	1,	2,	'#B8EEFF',	'',	'',	'',	'',	'',	0,	0,	2,	0,	'',	0,	1,	0,	'',	1,	0,	3,	'100',	'',	'4',	'2',	'0',	'0',	'0',	''),
(167,	'bat_chuyen',	'4月は、5月が守られるべき約束です。',	0,	2,	'#3EF032',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'ja',	1,	1,	0,	'',	1,	0,	4,	'876',	'',	'2',	'2',	'0',	'0',	'0',	''),
(168,	'bat_chuyen',	'4月は、5月が守られるべき約束です。',	1,	1,	'#42D6FF',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'ja',	0,	1,	0,	'',	1,	0,	4,	'1603',	'',	'2',	'2',	'0',	'0',	'0',	''),
(169,	'bat_chuyen',	'すべての元気な心が開花し、実を結び始める5月がやってきました',	0,	2,	'#F21B1B',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'ja',	1,	1,	0,	'',	1,	0,	5,	'944',	'',	'2',	'4',	'0',	'0',	'0',	''),
(170,	'dam',	'世界で一番好きな季節は春です。 5月にすべてのことが可能に思われる',	0,	3,	'#EAFFAB',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'ja',	1,	1,	0,	'',	1,	0,	5,	'1614',	'',	'2',	'4',	'0',	'0',	'0',	''),
(171,	'dam',	'私は6月の雨がちょうど降ることをよく知っています。',	0,	3,	'#D7FF26',	'',	'',	'',	'',	'',	5,	1,	4,	0,	'ja',	1,	1,	0,	'',	1,	0,	6,	'1051',	'',	'2',	'4',	'0',	'0',	'0',	''),
(172,	'bat_chuyen',	'それは6月の月、葉とバラの月です。、楽しい光景が目に敬意を表し、楽しい香りが鼻に響くとき。',	0,	2,	'#FF6200',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'ja',	1,	1,	0,	'',	1,	0,	6,	'1455',	'',	'2',	'4',	'0',	'0',	'0',	''),
(173,	'bat_chuyen',	'それは6月の月、葉とバラの月です。、楽しい光景が目に敬意を表し、楽しい香りが鼻に響くとき。',	1,	2,	'#0DFF21',	'',	'',	'',	'',	'',	0,	7,	0,	0,	'ja',	0,	1,	0,	'',	1,	0,	6,	'1016',	'',	'2',	'4',	'0',	'0',	'0',	''),
(174,	'dam',	'私は6月の雨がちょうど降ることをよく知っています。',	1,	1,	'#29FFDF',	'',	'',	'',	'',	'',	5,	1,	0,	0,	'ja',	0,	1,	0,	'',	1,	0,	6,	'1594',	'',	'2',	'4',	'0',	'0',	'0',	''),
(175,	'dam',	'7月にあなたに何がもたらされようとも、それが良いことであろうと悪いことであろうと。 どんな微笑みでも常にあなたの顔にその笑顔を保ちます。',	0,	1,	'#C1FF5E',	'',	'',	'',	'',	'',	0,	16,	1,	0,	'ja',	1,	1,	0,	'',	1,	0,	7,	'1004',	'',	'2',	'4',	'0',	'0',	'0',	''),
(176,	'dam',	'7月があなたにもたらしているものは何でも、それが良いか悪いかにかかわらず。 どんな微笑みでも常にあなたの顔にその笑顔を保ちます。',	1,	2,	'#FF1205',	'',	'',	'',	'',	'',	0,	7,	15,	0,	'ja',	0,	1,	0,	'',	1,	0,	7,	'1469',	'',	'2',	'4',	'0',	'0',	'0',	''),
(177,	'bat_chuyen',	'それに甘さを与えるために冬の寒さなしで、夏の暖かさは何が良いです。',	1,	2,	'#FBFF9C',	'',	'',	'',	'',	'',	0,	18,	2,	0,	'ja',	0,	1,	0,	'',	1,	0,	7,	'498',	'',	'2',	'4',	'0',	'0',	'0',	''),
(178,	'bat_chuyen',	'夏の終わりの風は人々を落ち着かせません。',	0,	0,	'#FCFF69',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'ja',	1,	1,	0,	'',	1,	0,	7,	'1052',	'',	'2',	'4',	'0',	'0',	'0',	''),
(179,	'bat_chuyen',	'特にあなたが私と一緒にいるとき、私は9月が大好きです！',	0,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'ja',	1,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(180,	'bat_chuyen',	'特にあなたが私と一緒にいるとき、私は9月が大好きです！',	1,	2,	'#F8C4FF',	'',	'',	'',	'',	'',	0,	18,	1,	0,	'ja',	0,	1,	0,	'',	1,	0,	9,	'428',	'',	'2',	'4',	'0',	'0',	'0',	''),
(181,	'bat_chuyen',	'クリスマスシーズンが来ました。 メリークリスマスシーズンを願って、幸せと風邪をひかないでください。 メリークリスマス。',	0,	2,	'#FBFF1F',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'ja',	1,	1,	0,	'',	1,	0,	12,	'1411',	'',	'2',	'4',	'0',	'0',	'0',	''),
(182,	'bat_chuyen',	'クリスマスシーズンが来ました。 ハッピーでハッピーなクリスマスをお祈りし、風邪をひかないようにしてください。 メリークリスマス。',	1,	2,	'#BFFFAD',	'',	'',	'',	'',	'',	7,	22,	2,	0,	'ja',	0,	1,	0,	'',	1,	0,	12,	'1415',	'',	'2',	'4',	'0',	'0',	'0',	''),
(183,	'thong_bao',	'冬はとても寒い、{ten_user}！ 外出する場合は、それを避けるために暖かい服をたくさん着てください！',	0,	1,	'#FEFFC2',	'',	'',	'',	'',	'',	0,	18,	0,	0,	'ja',	1,	1,	0,	'',	1,	0,	12,	'1127',	'',	'',	'4',	'0',	'0',	'0',	''),
(184,	'bat_chuyen',	'Covid 19のシーズン中は、混雑した場所に集中しないように注意し、どこに行ってもマスクを着用する必要があります。',	0,	3,	'#FFFBD1',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'ja',	1,	0,	0,	'',	1,	0,	0,	'1615',	'',	'2',	'4',	'0',	'0',	'0',	''),
(185,	'bat_chuyen',	'Covid 19のシーズン中は、混雑した場所に集中しないように注意し、どこに行ってもマスクを着用する必要があります。',	1,	3,	'#E6C9FF',	'',	'',	'',	'',	'',	0,	10,	4,	0,	'ja',	0,	0,	0,	'',	1,	0,	0,	'179',	'',	'2',	'4',	'0',	'0',	'0',	'');

-- 2020-10-05 07:54:33
