-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_id`;
CREATE TABLE `app_my_girl_id` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `chat` text NOT NULL,
  `status` int(11) NOT NULL,
  `sex` int(1) NOT NULL,
  `color` varchar(10) NOT NULL,
  `q1` varchar(200) NOT NULL,
  `q2` varchar(200) NOT NULL,
  `r1` varchar(200) NOT NULL,
  `r2` varchar(200) NOT NULL,
  `tip` int(1) NOT NULL,
  `link` varchar(100) NOT NULL,
  `vibrate` varchar(1) NOT NULL,
  `effect` int(2) NOT NULL,
  `action` int(2) NOT NULL DEFAULT '0',
  `face` int(2) NOT NULL DEFAULT '0',
  `certify` int(1) NOT NULL,
  `author` varchar(30) NOT NULL,
  `character_sex` int(1) NOT NULL DEFAULT '1',
  `id_redirect` varchar(20) NOT NULL,
  `pater` varchar(20) NOT NULL,
  `pater_type` varchar(5) NOT NULL,
  `ver` int(1) NOT NULL DEFAULT '0',
  `os` varchar(20) NOT NULL,
  `limit_chat` int(1) NOT NULL DEFAULT '0',
  `limit_date` int(2) NOT NULL,
  `limit_month` int(2) NOT NULL,
  `effect_customer` varchar(10) NOT NULL,
  `func_sever` varchar(20) NOT NULL,
  `disable` int(1) NOT NULL,
  `limit_day` varchar(10) NOT NULL,
  `user_create` varchar(2) NOT NULL,
  `user_update` varchar(2) NOT NULL,
  `os_window` varchar(1) NOT NULL DEFAULT '0',
  `os_ios` varchar(1) NOT NULL DEFAULT '0',
  `os_android` varchar(1) NOT NULL DEFAULT '0',
  `slug` varchar(100) NOT NULL,
  `file_url` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `text` (`text`),
  FULLTEXT KEY `chat` (`chat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_id`;
INSERT INTO `app_my_girl_id` (`id`, `text`, `chat`, `status`, `sex`, `color`, `q1`, `q2`, `r1`, `r2`, `tip`, `link`, `vibrate`, `effect`, `action`, `face`, `certify`, `author`, `character_sex`, `id_redirect`, `pater`, `pater_type`, `ver`, `os`, `limit_chat`, `limit_date`, `limit_month`, `effect_customer`, `func_sever`, `disable`, `limit_day`, `user_create`, `user_update`, `os_window`, `os_ios`, `os_android`, `slug`, `file_url`) VALUES
(2,	'buka facebook',	'Saya membuka facebook untuk membantu Anda!',	1,	0,	'#E6ABFF',	'',	'',	'',	'',	1,	'https://www.facebook.com',	'',	0,	29,	0,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'43',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(3,	'buka youtube',	'Saya membuka youtube membantunya, berharap dia menonton video lucu!',	0,	0,	'#FFA6A6',	'',	'',	'',	'',	1,	'https://www.youtube.com',	'',	3,	6,	3,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'41',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(4,	'utusan terbuka',	'Saya membuka messenger untuk Anda mengirim sms!',	1,	0,	'#D9FFFB',	'',	'',	'',	'',	1,	'fb://messaging',	'',	0,	18,	0,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'38',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(5,	'buka sms',	'Saya membuka messenger untuk Anda mengirim sms!',	1,	0,	'#7AFFF6',	'',	'',	'',	'',	1,	'sms:+1',	'',	3,	20,	0,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'20',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(6,	'buka wechat',	'saya membuka WeChat untuk Anda',	2,	0,	'#00FF4C',	'',	'',	'',	'',	0,	'https://web.wechat.com/',	'',	0,	18,	0,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'164',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(7,	'chrome',	'buka browser google chrome',	2,	0,	'#30FF61',	'',	'',	'',	'',	0,	'googlechrome://google.com',	'',	0,	18,	0,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'133',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(8,	'Buka Frostwire',	'ok aku akan melakukannya sayang',	2,	0,	'#C9F4FF',	'',	'',	'',	'',	0,	'http://www.frostwire.com',	'',	0,	20,	0,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'264',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(9,	'buka catatan',	'Saya membuka catatan untuk Anda, menulis catatan Anda di atasnya',	2,	0,	'#C5C9F0',	'',	'',	'',	'',	0,	'mobilenotes://',	'',	0,	34,	2,	0,	'id',	1,	'',	'',	'',	0,	'android',	1,	0,	0,	'773',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(10,	'buka Buku Telepon',	'Saya membantu Anda membuka buku telepon, menelepon orang yang Anda butuhkan secara offline!',	1,	0,	'#FFB8E2',	'',	'',	'',	'',	0,	'contacts://',	'',	0,	20,	2,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'444',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(11,	'kalender terbuka',	'Saya telah membantu Anda membuka kalender',	1,	0,	'#2BFFF9',	'',	'',	'',	'',	0,	'calshow://',	'',	0,	32,	17,	0,	'id',	1,	'',	'',	'',	0,	'android',	1,	0,	0,	'699',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(12,	'temukan teleponnya',	'Saya membuka fungsi pencarian telepon!',	1,	0,	'#BDED6D',	'',	'',	'',	'',	0,	'fmip1://',	'',	0,	20,	3,	0,	'id',	1,	'',	'',	'',	0,	'android',	1,	0,	0,	'503',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(13,	'pengingat terbuka',	'Saya membuka daftar pengingat, berikut adalah hal-hal penting yang harus Anda selesaikan!',	2,	0,	'#C7FFA3',	'',	'',	'',	'',	0,	'x-apple-reminder://',	'',	0,	22,	2,	0,	'id',	1,	'',	'',	'',	0,	'android',	1,	0,	0,	'377',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(14,	'buka musik dari mesin',	'Saya membuka pemutar musik default!',	1,	0,	'#FF6B9F',	'',	'',	'',	'',	0,	'musics://',	'',	0,	32,	2,	0,	'id',	1,	'',	'',	'',	0,	'android',	1,	0,	0,	'1144',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(15,	'Buka snapchat',	'Saya membuka snapchat untuk membantu Anda',	2,	0,	'#FFE519',	'',	'',	'',	'',	0,	'snapchat://',	'',	0,	32,	3,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1421',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(16,	'buka pinterest',	'Saya membantu Anda membuka pinterest',	1,	0,	'#FF0000',	'',	'',	'',	'',	0,	'pinterest://',	'',	0,	20,	2,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1422',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(17,	'Buka skype',	'Saya membuka skype untuk Anda',	2,	0,	'#54E5FF',	'',	'',	'',	'',	0,	'skype://',	'',	0,	22,	13,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1423',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(18,	'buka steller',	'Saya membuka steller untuk Anda',	1,	0,	'#8645FF',	'',	'',	'',	'',	0,	'steller://',	'',	0,	34,	2,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1424',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(19,	'Buka Tumblr',	'Saya membantu Anda membuka tumblr',	1,	0,	'#5C9AFF',	'',	'',	'',	'',	0,	'tumblr://',	'',	0,	32,	15,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1425',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(20,	'buka kedutan',	'Saya membuka aplikasi bantuan kedutan untuk Anda',	1,	0,	'#DDADFF',	'',	'',	'',	'',	0,	'twitch://',	'',	0,	34,	3,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1426',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(21,	'buka Vimeo',	'Saya membuka aplikasi bantuan vimeo untuk Anda',	1,	0,	'#38D4FF',	'',	'',	'',	'',	0,	'vimeo://',	'',	0,	32,	12,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1427',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(22,	'buka vsco',	'Saya membuka aplikasi VSCO untuk Anda',	1,	0,	'#FFFFFF',	'',	'',	'',	'',	0,	'vsco://',	'',	0,	22,	3,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1428',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(23,	'buka whatsapp',	'Saya membantu Anda membuka aplikasi whatsapp',	2,	0,	'#08FF0C',	'',	'',	'',	'',	0,	'whatsapp://',	'',	0,	20,	2,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1429',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(24,	'buka twitter',	'Saya membuka twitter untuk Anda',	1,	0,	'#96ECFF',	'',	'',	'',	'',	0,	'twitter://',	'',	0,	34,	2,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1430',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(25,	'buka paypal',	'Saya membuka aplikasi paypal',	1,	0,	'#0A78FF',	'',	'',	'',	'',	0,	'paypal://',	'',	0,	32,	17,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1431',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(26,	'buka Netflix',	'Saya membuka aplikasi Netflix',	1,	0,	'#FF0000',	'',	'',	'',	'',	0,	'nflx://',	'',	0,	22,	2,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1432',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(27,	'buka dengan rapi',	'Saya membuka aplikasi dengan sopan',	1,	0,	'#7DFFA2',	'',	'',	'',	'',	0,	'litely://',	'',	0,	13,	1,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1433',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(28,	'buka Instagram',	'Saya membuka Instagram untuk membantu Anda!',	2,	0,	'#FF247F',	'',	'',	'',	'',	0,	'instagram://',	'',	0,	20,	3,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1434',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(29,	'Buka halida',	'Saya membuka aplikasi halide untuk membantu Anda!',	1,	0,	'#BDD7F2',	'',	'',	'',	'',	0,	'halide://',	'',	0,	34,	12,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1435',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(30,	'keturunan terbuka',	'Saya membuka aplikasi Ancestry',	1,	0,	'#B7FF1C',	'',	'',	'',	'',	0,	'ancestry://',	'',	0,	22,	2,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1436',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(31,	'Buka Anchor',	'Saya membantu Anda membuka aplikasi Anchor',	1,	0,	'#CF94FF',	'',	'',	'',	'',	0,	'anchorfm://',	'',	0,	20,	3,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1437',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(32,	'Buka Clash of Clans',	'Saya membuka game Anda Clash of Clans! Bersenang-senang bermain game!',	2,	0,	'#FFB457',	'',	'',	'',	'',	0,	'clashofclans://',	'',	0,	20,	3,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1438',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(33,	'buka Bejeweled Blitz',	'Saya membuka permainan Bejeweled Blitz membantu Anda',	2,	0,	'#FFE5AD',	'',	'',	'',	'',	0,	'com.popcap.ios.BejBlitz://',	'',	0,	22,	2,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1439',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(34,	'buka sapuan kuas',	'Saya membuka aplikasi sapuan kuas untuk Anda',	1,	0,	'#FF4747',	'',	'',	'',	'',	0,	'brushstroke://',	'',	0,	14,	13,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1440',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(35,	'buka Browser Kue',	'Saya membuka aplikasi Cake Browser untuk membantu Anda!',	1,	0,	'#FF3DC1',	'',	'',	'',	'',	0,	'cakeslice://',	'',	0,	20,	17,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1441',	'',	0,	'',	'',	'2',	'0',	'0',	'0',	'',	''),
(36,	'buka Fitbit',	'Saya membuka Fitbit untuk membantu Anda',	1,	0,	'#73FFDC',	'',	'',	'',	'',	0,	'fitbit://',	'',	0,	34,	17,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1442',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(37,	'temukan lirik',	'Silakan masukkan teks singkat dari lirik, atau bernyanyi untuk saya bagian yang Anda ingat (melalui mikrofon pengenalan suara!) Saya akan membantu Anda menemukan lagu itu! ',	1,	0,	'#12FFD1',	'',	'',	'',	'',	1,	'',	'',	0,	34,	15,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'500',	'tim_loi_nhac',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(38,	'temukan jalannya',	'Alamat apa yang ingin Anda temukan? Saya akan membantu Anda menemukan!',	2,	0,	'#8CF7FF',	'',	'',	'',	'',	1,	'',	'',	0,	34,	12,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'55',	'tim_duong',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(39,	'perjalanan',	'Saya membuka daftar tempat yang bisa Anda kunjungi. Klik di mana Anda ingin pergi!',	2,	0,	'#C4FFFA',	'',	'',	'',	'',	1,	'',	'',	38,	32,	3,	0,	'id',	1,	'',	'',	'',	1,	'',	1,	0,	0,	'402',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(40,	'ubah orang',	'Saya membuka daftar karakter yang Anda pilih karakter lain!',	1,	0,	'#FFF385',	'',	'',	'',	'',	1,	'',	'',	35,	18,	0,	0,	'id',	1,	'',	'',	'',	2,	'',	1,	0,	0,	'306',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(41,	'radio terbuka',	'Saya membuka radio, Anda memilih saluran untuk mendengarkan',	1,	0,	'#0AE7FF',	'',	'',	'',	'',	1,	'',	'',	33,	20,	2,	0,	'id',	1,	'',	'',	'',	2,	'',	1,	0,	0,	'609',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(42,	'musik terbuka',	'Lagu apa yang ingin kamu dengar? Tolong beritahu saya nama lagu dan penyanyi untuk membukanya untuk Anda, jika lagu itu ada dalam daftar putar! (Masukkan lagu yang ingin Anda dengar)',	1,	0,	'#00FFF7',	'',	'',	'',	'',	1,	'',	'',	0,	29,	7,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'258',	'tim_nhac',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(43,	'temukan kontak',	'Siapa yang ingin Anda cari? Silakan masukkan nama atau nomor telepon yang akan saya cari Anda! (Silakan masukkan nama atau nomor telepon Anda untuk mencari informasi kontak)',	2,	0,	'#00FFDD',	'',	'',	'',	'',	1,	'',	'',	0,	10,	7,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'247',	'tim_danh_ba',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(44,	'mengubah avatar',	'Silakan pilih foto untuk mengubah avatar Anda (letakkan avatar atau mungkin Anda mengambilnya dengan \"ambil foto\" dan dapat menghapusnya dengan mengatakan \"hapus Avatar\").',	1,	0,	'#E9FFBD',	'',	'',	'',	'',	1,	'',	'',	24,	32,	0,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'176',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(45,	'ubah latar belakang',	'Saya telah membuka daftar latar belakang, Anda memilih wallpaper yang indah untuk aplikasi offline, jika Anda suka gambar yang saya simpan di ponsel Anda!',	2,	0,	'#FF00CC',	'',	'',	'',	'',	1,	'',	'',	12,	18,	7,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'132',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(46,	'buka daftar putar',	'Saya membuka daftar putar, Anda memilih lagu yang Anda sukai, saya suka musiknya',	1,	0,	'#FFD738',	'',	'',	'',	'',	1,	'',	'',	11,	7,	0,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'123',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(47,	'bercerita',	'* Uang dan teman * \"Sejak dia kehilangan uangnya, separuh temannya tidak mengenalnya lagi\" \"Dan separuh lainnya?\"',	2,	0,	'#FFCB1F',	'',	'',	'',	'',	1,	'',	'',	0,	13,	3,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'77',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(48,	'?...',	'Saya dapat menemukan informasi apa pun untuk membantu Anda, dengan menulis tanda tanya di bagian atas\r\ncontoh:\r\n\r\n? iphone x\r\n? Chainsmoker\r\n?cinta\r\n? facebook\r\n....\r\ninformasi apa pun yang dapat saya bantu temukan',	1,	0,	'#A4FF91',	'',	'',	'',	'',	1,	'',	'',	0,	10,	0,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'19',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(49,	'Dimana ini?',	'Ini dia: {vi_tri} (diidentifikasi melalui penentuan posisi global)',	1,	0,	'#00FFDD',	'',	'',	'',	'',	1,	'',	'',	0,	32,	0,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'55',	'vi_tri',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(50,	'Hari ini tanggal berapa?',	'Hari ini adalah {thu}, {thang} {ngay} th, {nam}. semoga harimu menyenangkan!',	1,	0,	'#91FF00',	'',	'',	'',	'',	1,	'',	'',	0,	20,	0,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'53',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(51,	'Simpan wallpaper ke perpustakaan',	'Saya menyimpan gambar latar belakang aplikasi ke perpustakaan. Anda pergi untuk memeriksanya!',	1,	0,	'#FFD83D',	'',	'',	'',	'',	1,	'',	'',	15,	20,	3,	0,	'id',	1,	'',	'',	'',	2,	'',	1,	0,	0,	'45',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(52,	'5+5',	'Hasil matematika adalah: {giai_toan}',	1,	0,	'#CCFF73',	'',	'',	'',	'',	1,	'',	'',	0,	0,	0,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(53,	'Mengambil foto',	'Ambil foto dan saya akan meletakkan foto Anda sebagai gambar latar belakang aplikasi!',	1,	0,	'#33FFEB',	'',	'',	'',	'',	1,	'',	'',	6,	32,	3,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'54',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(54,	'nyalakan senter',	'Saya membuka senter untuk membantu Anda! Jika hidup Anda gelap, maka Anda akan menyukai senter cahaya! membuat Anda keluar dari kegelapan!',	2,	0,	'#F6FF00',	'',	'',	'',	'',	1,	'',	'',	8,	20,	0,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'37',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(55,	'sampai jumpa',	'Sampai jumpa, sampai jumpa lagi ^^',	1,	0,	'#E1FF8F',	'',	'',	'',	'',	1,	'',	'',	4,	20,	3,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(56,	'Apa kabar?',	'Saya baik. Apa kabar?',	1,	0,	'#F7FFFA',	'',	'',	'',	'',	1,	'',	'',	0,	20,	7,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'382',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(57,	'jam berapa sekarang?',	'Ini adalah {gio} jam {phut} menit',	1,	0,	'#DFFF0D',	'',	'',	'',	'',	1,	'',	'',	0,	18,	0,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'18',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(58,	'Halo',	'Halo, senang mengobrol dengan Anda',	1,	0,	'#FF983D',	'',	'',	'',	'',	1,	'',	'',	0,	5,	3,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'175',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(59,	'temukan lirik',	'Silakan masukkan teks singkat dari lirik, atau bernyanyi untuk saya bagian yang Anda ingat (melalui mikrofon pengenalan suara!) Saya akan membantu Anda menemukan lagu itu! (Fungsi pencarian musik dengan lirik)',	1,	1,	'#D4FFF2',	'',	'',	'',	'',	1,	'',	'',	0,	32,	2,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'74',	'tim_loi_nhac',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(60,	'temukan jalannya',	'Alamat apa yang ingin Anda temukan? Saya akan membantu Anda menemukan!',	2,	1,	'#8CF7FF',	'',	'',	'',	'',	1,	'',	'',	0,	32,	15,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'55',	'tim_duong',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(61,	'perjalanan',	'Saya membuka daftar tempat yang bisa Anda kunjungi. Klik di mana Anda ingin pergi!',	2,	1,	'#9CFFF2',	'',	'',	'',	'',	1,	'',	'',	38,	18,	17,	0,	'id',	0,	'',	'',	'',	1,	'',	1,	0,	0,	'44',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(62,	'ubah orang',	'Anda membuka daftar karakter untuk memilih karakter lain!',	2,	1,	'#FFAB2E',	'',	'',	'',	'',	1,	'',	'',	35,	34,	0,	0,	'id',	0,	'',	'',	'',	2,	'',	1,	0,	0,	'118',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(63,	'radio terbuka',	'Saya membuka radio, Anda memilih saluran untuk mendengarkan',	2,	1,	'#FFBB00',	'',	'',	'',	'',	1,	'',	'',	33,	20,	2,	0,	'id',	0,	'',	'',	'',	2,	'',	1,	0,	0,	'655',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(64,	'nyalakan senter',	'Saya membuka senter untuk membantu Anda! Jika hidup Anda gelap, maka Anda akan menyukai senter cahaya! membuat Anda keluar dari kegelapan!',	1,	1,	'#FFF700',	'',	'',	'',	'',	1,	'',	'',	8,	10,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'268',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(65,	'bercerita',	'Tiga orang yang terdampar di sebuah pulau terpencil menemukan sebuah lentera ajaib yang berisi jin, yang memberikan mereka masing-masing keinginan. Orang pertama berharap dia berada di luar pulau dan kembali ke rumah. Orang kedua berharap hal yang sama. Orang ketiga berkata: \"Saya kesepian. Saya berharap teman-teman saya kembali ke sini.\"',	1,	1,	'#0AFFC6',	'',	'',	'',	'',	1,	'',	'',	0,	7,	3,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'294',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(66,	'musik terbuka',	'Lagu apa yang ingin kamu dengar? Tolong beritahu saya nama lagu dan penyanyi untuk membukanya untuk Anda, jika lagu itu ada dalam daftar putar! (Masukkan lagu yang ingin Anda dengar)',	1,	1,	'#00FFF7',	'',	'',	'',	'',	1,	'',	'',	0,	0,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'258',	'tim_nhac',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(67,	'temukan kontak',	'Siapa yang ingin Anda cari? Silakan masukkan nama atau nomor telepon yang akan saya cari Anda! (Silakan masukkan nama atau nomor telepon Anda untuk mencari informasi kontak)',	2,	1,	'#C9FF6B',	'',	'',	'',	'',	1,	'',	'',	0,	0,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'247',	'tim_danh_ba',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(68,	'mengubah avatar',	'Silakan pilih foto untuk mengubah avatar Anda (letakkan avatar atau mungkin Anda mengambilnya dengan \"ambil foto\" dan dapat menghapusnya dengan mengatakan \"hapus Avatar\").',	1,	1,	'#B8FFB3',	'',	'',	'',	'',	1,	'',	'',	24,	0,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'176',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(69,	'ubah orang',	'orang berubah! Saya mengubah bentuk lainnya!',	1,	1,	'#E7FFBD',	'',	'',	'',	'',	1,	'',	'',	17,	18,	0,	0,	'id',	0,	'',	'',	'',	2,	'',	1,	0,	0,	'126',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(70,	'ubah latar belakang',	'Saya telah membuka daftar latar belakang, Anda memilih wallpaper yang indah untuk aplikasi offline, jika Anda suka gambar yang saya simpan di ponsel Anda!',	2,	1,	'#FF00EE',	'',	'',	'',	'',	1,	'',	'',	12,	0,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'132',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(71,	'?...',	'Saya dapat menemukan informasi apa pun untuk membantu Anda, dengan menulis tanda tanya di bagian atas contoh:? Iphone x? Chainsmoker? Love? Facebook .... informasi apa pun yang dapat saya bantu temukan',	1,	1,	'#78FFA0',	'',	'',	'',	'',	1,	'',	'',	0,	0,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'19',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(72,	'Dimana ini?',	'Ini dia: \r\n\r\n{vi_tri} \r\n\r\n(diidentifikasi melalui penentuan posisi global)',	1,	1,	'#C7FFDA',	'',	'',	'',	'',	1,	'',	'',	0,	0,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'55',	'vi_tri',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(73,	'Hari ini tanggal berapa?',	'Hari ini adalah {thu}, {thang} {ngay} th, {nam}. semoga harimu menyenangkan!',	1,	1,	'#B3FF00',	'',	'',	'',	'',	1,	'',	'',	0,	0,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'53',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(74,	'Simpan wallpaper ke perpustakaan',	'Saya menyimpan gambar latar belakang aplikasi ke perpustakaan. Anda pergi untuk memeriksanya!',	1,	1,	'#EAFF61',	'',	'',	'',	'',	1,	'',	'',	15,	0,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'19',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(75,	'sampai jumpa',	'Sampai jumpa, sampai jumpa lagi ^^',	1,	1,	'#FF9CC9',	'',	'',	'',	'',	1,	'',	'',	4,	0,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'75',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(76,	'5+5',	'Hasil matematika adalah: {giai_toan}',	1,	1,	'#D1FF75',	'',	'',	'',	'',	1,	'',	'',	0,	0,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'20',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(77,	'Mengambil foto',	'Ambil foto dan saya akan meletakkan foto Anda sebagai gambar latar belakang aplikasi!',	1,	1,	'#B4FF33',	'',	'',	'',	'',	1,	'',	'',	6,	0,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'54',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(78,	'Halo',	'Hai, bagaimana kabarmu.',	0,	1,	'#F6FF85',	'',	'',	'',	'',	1,	'',	'',	0,	0,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'412',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(79,	'Apa kabar?',	'Cukup bagus',	2,	1,	'#FF9CC9',	'',	'',	'',	'',	1,	'',	'',	0,	33,	3,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'75',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(80,	'jam berapa sekarang?',	'Ini {gio}: {phut} pukul, Harap hormati waktu Anda',	2,	1,	'#FFFF87',	'',	'',	'',	'',	1,	'',	'',	3,	20,	3,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'18',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(81,	'virtual reality',	'Setelah membuka fungsi realitas virtual, saya telah muncul dalam kehidupan nyata dengan Anda',	2,	1,	'#FFE587',	'',	'',	'',	'',	1,	'',	'',	50,	6,	2,	0,	'id',	0,	'',	'',	'',	1,	'',	1,	0,	0,	'1146',	'',	0,	'',	'2',	'4',	'0',	'0',	'0',	'',	''),
(82,	'realitas virtual',	'Setelah membuka fungsi realitas virtual, saya telah muncul dalam kehidupan nyata dengan Anda',	2,	0,	'#FDFF12',	'',	'',	'',	'',	1,	'',	'',	50,	6,	3,	0,	'id',	1,	'',	'',	'',	1,	'',	1,	0,	0,	'621',	'',	0,	'',	'2',	'4',	'0',	'0',	'0',	'',	''),
(83,	'Putar musik dari ponsel saya',	'Saya menyalakan musik dari perangkat Anda, semoga Anda senang mendengarkan musik',	2,	0,	'#D72EFF',	'',	'',	'',	'',	1,	'',	'',	47,	18,	0,	0,	'id',	1,	'',	'',	'',	1,	'',	1,	0,	0,	'379',	'',	0,	'',	'2',	'4',	'1',	'0',	'1',	'',	''),
(84,	'Putar musik dari ponsel saya',	'Saya menyalakan musik dari perangkat Anda, semoga Anda senang mendengarkan musik',	2,	1,	'#FF196C',	'',	'',	'',	'',	1,	'',	'',	47,	18,	0,	0,	'id',	0,	'',	'',	'',	1,	'',	1,	0,	0,	'851',	'',	0,	'',	'2',	'4',	'1',	'0',	'1',	'',	''),
(85,	'riwayat obrolan',	'Saya telah membuka riwayat obrolan, Anda dapat meninjau percakapan saya dan Anda',	1,	0,	'#70EBFF',	'',	'',	'',	'',	0,	'',	'',	48,	18,	0,	0,	'id',	1,	'',	'',	'',	2,	'',	1,	0,	0,	'831',	'',	0,	'',	'2',	'4',	'0',	'1',	'0',	'',	''),
(86,	'riwayat obrolan',	'Saya telah membuka riwayat obrolan, Anda dapat meninjau percakapan saya dan Anda',	1,	1,	'#4FFF9C',	'',	'',	'',	'',	0,	'',	'',	48,	18,	0,	0,	'id',	0,	'',	'',	'',	2,	'',	1,	0,	0,	'1014',	'',	0,	'',	'2',	'4',	'0',	'1',	'0',	'',	''),
(87,	'apa bedanya kamu sama langit?',	'kalau langit diatas kalau kamu di hatiku',	2,	0,	'#66EAFF',	'',	'',	'',	'',	0,	'',	'',	0,	0,	0,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'642',	'',	0,	'',	'4',	'4',	'0',	'0',	'0',	'',	''),
(88,	'menyanyikan sebuah lagu',	'Glenn Fredly - Januari (Lirik)',	1,	1,	'#1DE300',	'',	'',	'',	'',	0,	'',	'',	2,	9,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'502',	'',	0,	'',	'2',	'',	'0',	'0',	'0',	'glenn-fredly-januari-lirik--88',	''),
(89,	'menyanyikan sebuah lagu',	'SISITIPSI - Alkohol',	1,	1,	'#00FFB7',	'',	'',	'',	'',	0,	'',	'',	2,	9,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'1139',	'',	0,	'',	'2',	'',	'0',	'0',	'0',	'sisitipsi-alkohol-89',	''),
(90,	'menyanyikan sebuah lagu',	'Cassandra - Cinta Terbaik',	1,	1,	'#0AFFF8',	'',	'',	'',	'',	0,	'',	'',	2,	9,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'332',	'',	0,	'',	'2',	'',	'0',	'0',	'0',	'cassandra-cinta-terbaik-90',	''),
(91,	'menyanyikan sebuah lagu',	'Repvblik - Selimut Tetangga',	1,	1,	'#3BFFF5',	'',	'',	'',	'',	0,	'',	'',	2,	9,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'1303',	'',	0,	'',	'2',	'',	'0',	'0',	'0',	'repvblik-selimut-tetangga-91',	''),
(92,	'menyanyikan sebuah lagu',	'Gamma1 - Sayang',	1,	1,	'#D7C2FF',	'',	'',	'',	'',	0,	'',	'',	2,	9,	0,	0,	'id',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'811',	'',	0,	'',	'2',	'',	'0',	'0',	'0',	'gamma1-sayang-92',	''),
(93,	'ngapain ih gajelas dasar bot',	'terserah gua lah kontol. ngapa lu pake download apk gaje ini puki',	2,	0,	'#19FF23',	'',	'',	'',	'',	0,	'',	'',	0,	31,	3,	0,	'id',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'22',	'',	0,	'',	'2',	'',	'0',	'0',	'0',	'',	'');

-- 2021-08-17 16:10:30
