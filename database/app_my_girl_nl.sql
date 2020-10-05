-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_nl`;
CREATE TABLE `app_my_girl_nl` (
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

TRUNCATE `app_my_girl_nl`;
INSERT INTO `app_my_girl_nl` (`id`, `text`, `chat`, `status`, `sex`, `color`, `q1`, `q2`, `r1`, `r2`, `tip`, `link`, `vibrate`, `effect`, `action`, `face`, `certify`, `author`, `character_sex`, `id_redirect`, `pater`, `pater_type`, `ver`, `os`, `limit_chat`, `limit_date`, `limit_month`, `effect_customer`, `func_sever`, `disable`, `limit_day`, `user_create`, `user_update`, `os_window`, `os_ios`, `os_android`, `slug`, `file_url`) VALUES
(1,	'open facebook',	'Ik heb Facebook geopend om je te helpen!',	1,	0,	'#E6ABFF',	'',	'',	'',	'',	1,	'https://www.facebook.com',	'',	0,	29,	0,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'43',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(2,	'open youtube',	'Ik opende de youtube en hielp hem om grappige video\'s te bekijken!',	0,	0,	'#FFA6A6',	'',	'',	'',	'',	1,	'https://www.youtube.com',	'',	3,	6,	3,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'41',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(3,	'open messenger',	'Ik opende de boodschapper voor je om te sms\'en!',	1,	0,	'#D9FFFB',	'',	'',	'',	'',	1,	'fb://messaging',	'',	0,	18,	0,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'38',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(4,	'open sms',	'Ik opende de boodschapper voor je om te sms\'en!',	1,	0,	'#7AFFF6',	'',	'',	'',	'',	1,	'sms:+1',	'',	3,	20,	0,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'20',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(5,	'open wechat',	'ik heb wechat voor jou geopend',	2,	0,	'#00FF4C',	'',	'',	'',	'',	0,	'https://web.wechat.com/',	'',	0,	18,	0,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'164',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(6,	'chrome',	'open google chrome browser',	2,	0,	'#30FF61',	'',	'',	'',	'',	0,	'googlechrome://google.com',	'',	0,	18,	0,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'133',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(7,	'Open Frostwire',	'ok ik zal die baby doen',	2,	0,	'#C9F4FF',	'',	'',	'',	'',	0,	'http://www.frostwire.com',	'',	0,	20,	0,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'264',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(8,	'open notities',	'Ik heb de notitie voor je geopend, schrijf je aantekeningen erop',	2,	0,	'#C5C9F0',	'',	'',	'',	'',	0,	'mobilenotes://',	'',	0,	34,	2,	0,	'nl',	1,	'',	'',	'',	0,	'android',	1,	0,	0,	'773',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(9,	'open het telefoonboek',	'Ik heb je geholpen het telefoonboek te openen, bel de persoon die je offline nodig hebt!',	1,	0,	'#FFB8E2',	'',	'',	'',	'',	0,	'contacts://',	'',	0,	20,	2,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'444',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(10,	'open de kalender',	'Ik heb je geholpen met het openen van de kalender',	1,	0,	'#2BFFF9',	'',	'',	'',	'',	0,	'calshow://',	'',	0,	32,	17,	0,	'nl',	1,	'',	'',	'',	0,	'android',	1,	0,	0,	'699',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(11,	'vind de telefoon',	'Ik opende de telefoonzoekfunctie!',	1,	0,	'#BDED6D',	'',	'',	'',	'',	0,	'fmip1://',	'',	0,	20,	3,	0,	'nl',	1,	'',	'',	'',	0,	'android',	1,	0,	0,	'503',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(12,	'open herinnering',	'Ik heb de herinneringslijst geopend, hier zijn de belangrijke dingen die je moet voltooien!',	2,	0,	'#C7FFA3',	'',	'',	'',	'',	0,	'x-apple-reminder://',	'',	0,	22,	2,	0,	'nl',	1,	'',	'',	'',	0,	'android',	1,	0,	0,	'377',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(13,	'open muziek van de machine',	'Ik opende de standaard muziekspeler!',	1,	0,	'#FF6B9F',	'',	'',	'',	'',	0,	'musics://',	'',	0,	32,	2,	0,	'nl',	1,	'',	'',	'',	0,	'android',	1,	0,	0,	'1144',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(14,	'Open de snapchat',	'Ik opende de snapchat om je te helpen',	2,	0,	'#FFE519',	'',	'',	'',	'',	0,	'snapchat://',	'',	0,	32,	3,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1421',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(15,	'open pinterest',	'Ik heb je geholpen de pinterest te openen',	1,	0,	'#FF0000',	'',	'',	'',	'',	0,	'pinterest://',	'',	0,	20,	2,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1422',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(16,	'open skype',	'Ik heb Skype voor je geopend',	2,	0,	'#54E5FF',	'',	'',	'',	'',	0,	'skype://',	'',	0,	22,	13,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1423',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(17,	'open steller',	'Ik opende de steller voor jou',	1,	0,	'#8645FF',	'',	'',	'',	'',	0,	'steller://',	'',	0,	34,	2,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1424',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(18,	'Open Tumblr',	'Ik heb je geholpen om het tumblr te openen',	1,	0,	'#5C9AFF',	'',	'',	'',	'',	0,	'tumblr://',	'',	0,	32,	15,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1425',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(19,	'open twitch',	'Ik heb de Help-toepassing voor twitch voor jou geopend',	1,	0,	'#DDADFF',	'',	'',	'',	'',	0,	'twitch://',	'',	0,	34,	3,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1426',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(20,	'open Vimeo',	'Ik heb de vimeo-hulpapp voor jou geopend',	1,	0,	'#38D4FF',	'',	'',	'',	'',	0,	'vimeo://',	'',	0,	32,	12,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1427',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(21,	'open vsco',	'Ik heb de VSCO-app voor je geopend',	1,	0,	'#FFFFFF',	'',	'',	'',	'',	0,	'vsco://',	'',	0,	22,	3,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1428',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(22,	'WhatsApp openen',	'Ik heb je geholpen de WhatsApp-app te openen',	2,	0,	'#08FF0C',	'',	'',	'',	'',	0,	'whatsapp://',	'',	0,	20,	2,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1429',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(23,	'open twitter',	'Ik opende de twitter voor jou',	1,	0,	'#96ECFF',	'',	'',	'',	'',	0,	'twitter://',	'',	0,	34,	2,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1430',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(24,	'open paypal',	'Ik opende de PayPal-applicatie',	1,	0,	'#0A78FF',	'',	'',	'',	'',	0,	'paypal://',	'',	0,	32,	17,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1431',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(25,	'open Netflix',	'Ik heb de Netflix-app geopend',	1,	0,	'#FF0000',	'',	'',	'',	'',	0,	'nflx://',	'',	0,	22,	2,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1432',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(26,	'openlijk openen',	'Ik opende de applicatie heel erg',	1,	0,	'#7DFFA2',	'',	'',	'',	'',	0,	'litely://',	'',	0,	13,	1,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1433',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(27,	'open Instagram',	'Ik heb Instagram geopend om je te helpen!',	2,	0,	'#FF247F',	'',	'',	'',	'',	0,	'instagram://',	'',	0,	20,	3,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1434',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(28,	'Open halide',	'Ik heb de halide-app geopend om je te helpen!',	1,	0,	'#BDD7F2',	'',	'',	'',	'',	0,	'halide://',	'',	0,	34,	12,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1435',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(29,	'open voorouders',	'Ik opende de app Ancestry',	1,	0,	'#B7FF1C',	'',	'',	'',	'',	0,	'ancestry://',	'',	0,	22,	2,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1436',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(30,	'Open Anchor',	'Ik heb je geholpen met het openen van de toepassing Anker',	1,	0,	'#CF94FF',	'',	'',	'',	'',	0,	'anchorfm://',	'',	0,	20,	3,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1437',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(31,	'Open Clash of Clans',	'Ik opende je spel Clash of Clans! Veel plezier met het spelen van games!',	2,	0,	'#FFB457',	'',	'',	'',	'',	0,	'clashofclans://',	'',	0,	20,	3,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1438',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(32,	'open  Bejeweled Blitz',	'Ik opende de game Bejeweled Blitz om je te helpen',	2,	0,	'#FFE5AD',	'',	'',	'',	'',	0,	'com.popcap.ios.BejBlitz://',	'',	0,	22,	2,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1439',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(33,	'open Brushstroke ',	'Ik heb de penseelstreektoepassing voor je geopend',	1,	0,	'#FF4747',	'',	'',	'',	'',	0,	'brushstroke://',	'',	0,	14,	13,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1440',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(34,	'open Cake Browser',	'Ik heb de Cake Browser-app geopend om je te helpen!',	1,	0,	'#FF3DC1',	'',	'',	'',	'',	0,	'cakeslice://',	'',	0,	20,	17,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1441',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(35,	'open Fitbit',	'Ik heb Fitbit geopend om je te helpen',	1,	0,	'#73FFDC',	'',	'',	'',	'',	0,	'fitbit://',	'',	0,	34,	17,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1442',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(36,	'vind songteksten',	'Voer de korte tekst van de songtekst in, of zing me een gedeelte dat u zich herinnert (via een stemherkenningsmicrofoon!). Ik zal je helpen dat nummer te vinden! (Muziekzoekfunctie met tekst)',	1,	0,	'#12FFD1',	'',	'',	'',	'',	1,	'',	'',	0,	34,	15,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'500',	'tim_loi_nhac',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(37,	'vind de weg',	'Welk adres wil je vinden? Ik zal je helpen vinden!',	2,	0,	'#8CF7FF',	'',	'',	'',	'',	1,	'',	'',	0,	34,	12,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'55',	'tim_duong',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(38,	'op reis',	'Ik open de lijst met plaatsen waar je naartoe kunt gaan. Klik waar je naartoe wilt!',	2,	0,	'#C4FFFA',	'',	'',	'',	'',	1,	'',	'',	38,	32,	3,	0,	'nl',	1,	'',	'',	'',	1,	'',	1,	0,	0,	'402',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(39,	'mensen veranderen',	'Ik opende de lijst met personages die je een ander personage kiest!',	1,	0,	'#FFF385',	'',	'',	'',	'',	1,	'',	'',	35,	18,	0,	0,	'nl',	1,	'',	'',	'',	2,	'',	1,	0,	0,	'306',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(40,	'open radio',	'Ik opende de radio, jij kiest het kanaal om te luisteren',	1,	0,	'#0AE7FF',	'',	'',	'',	'',	1,	'',	'',	33,	20,	2,	0,	'nl',	1,	'',	'',	'',	2,	'',	1,	0,	0,	'609',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(41,	'open muziek',	'Welk lied wil je horen? Vertel me alsjeblieft de naam van het nummer en de zanger om het voor je te openen, als dat nummer in de afspeellijst staat! (Voer het nummer in dat je wilt horen)',	1,	0,	'#00FFF7',	'',	'',	'',	'',	1,	'',	'',	0,	29,	7,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'258',	'tim_nhac',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(42,	'vind contact',	'Naar wie zou je willen zoeken? Voer de naam of het telefoonnummer in Ik zal naar u zoeken! (Voer uw naam of telefoonnummer in om contactgegevens te zoeken)',	2,	0,	'#00FFDD',	'',	'',	'',	'',	1,	'',	'',	0,	10,	7,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'247',	'tim_danh_ba',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(43,	'verander avatar',	'Selecteer een foto om uw avatar te wijzigen (plaats de avatar of neem hem met \"neem een foto\" en verwijder deze door \"verwijder Avatar\" te zeggen).',	1,	0,	'#E9FFBD',	'',	'',	'',	'',	1,	'',	'',	24,	32,	0,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'176',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(44,	'verander de achtergrond',	'Ik heb de achtergrondlijst geopend, je kiest de mooie achtergrond voor de applicatie offline, als je wilt dat elke foto zegt dat ik op je telefoon spaar!',	2,	0,	'#FF00CC',	'',	'',	'',	'',	1,	'',	'',	12,	18,	7,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'132',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(45,	'open de afspeellijst',	'Ik opende de afspeellijst, je koos het nummer waar je van houdt, ik hou van de muziek',	1,	0,	'#FFD738',	'',	'',	'',	'',	1,	'',	'',	11,	7,	0,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'123',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(46,	'verhalen vertellen',	'* Geld en vrienden *\r\n\"Sinds hij zijn geld heeft verloren, kennen de helft van zijn vrienden hem niet meer\"\r\n\"En de andere helft?\"\r\n\"Ze weten nog niet dat het het heeft verloren\"',	2,	0,	'#FFCB1F',	'',	'',	'',	'',	1,	'',	'',	0,	13,	3,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'77',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(48,	'Waar is dit?',	'Hier is het: {vi_tri} (geïdentificeerd via wereldwijde positionering)',	1,	0,	'#00FFDD',	'',	'',	'',	'',	1,	'',	'',	0,	32,	0,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'55',	'vi_tri',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(49,	'Wat is de datum van vandaag?',	'Vandaag is het {thu}, {thang} {ngay} th, {nam}. fijne dag!',	1,	0,	'#91FF00',	'',	'',	'',	'',	1,	'',	'',	0,	20,	0,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'53',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(50,	'Bewaar achtergronden op bibliotheek',	'Ik heb de afbeelding de achtergrond van de toepassing in de bibliotheek opgeslagen. Je gaat het controleren!',	1,	0,	'#FFD83D',	'',	'',	'',	'',	1,	'',	'',	15,	20,	3,	0,	'nl',	1,	'',	'',	'',	2,	'',	1,	0,	0,	'45',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(51,	'5+5',	'Het rekenresultaat is: {giai_toan}',	1,	0,	'#CCFF73',	'',	'',	'',	'',	1,	'',	'',	0,	0,	0,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(52,	'Maak een foto',	'Maak een foto en ik zal je foto als achtergrondafbeelding van de app plaatsen!',	1,	0,	'#33FFEB',	'',	'',	'',	'',	1,	'',	'',	6,	32,	3,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'54',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(53,	'flitslicht aanzetten',	'Ik opende de zaklamp om je te helpen! Als je leven donker was, dan zul je een lichte zaklamp leuk vinden! haal je uit het donker!',	2,	0,	'#F6FF00',	'',	'',	'',	'',	1,	'',	'',	8,	20,	0,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'37',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(54,	'tot ziens',	'Tot ziens, tot ziens ^^',	1,	0,	'#E1FF8F',	'',	'',	'',	'',	1,	'',	'',	4,	20,	3,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(55,	'Hoe gaat het met je?',	'Het gaat goed met mij. Hoe gaat het met je?',	1,	0,	'#F7FFFA',	'',	'',	'',	'',	1,	'',	'',	0,	20,	7,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'382',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(56,	'hoe laat is het?',	'Het is {gio} uur {phut} minuut',	1,	0,	'#DFFF0D',	'',	'',	'',	'',	1,	'',	'',	0,	18,	0,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'18',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(57,	'hallo',	'Hallo, leuk om met je te chatten',	1,	0,	'#FF983D',	'',	'',	'',	'',	1,	'',	'',	0,	5,	3,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'175',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(58,	'vind songteksten',	'Voer de korte tekst van de songtekst in, of zing me een gedeelte dat u zich herinnert (via een stemherkenningsmicrofoon!). Ik zal je helpen dat nummer te vinden! (Muziekzoekfunctie met tekst)',	1,	1,	'#D4FFF2',	'',	'',	'',	'',	1,	'',	'',	0,	32,	2,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'74',	'tim_loi_nhac',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(59,	'vind de weg',	'Welk adres wil je vinden? Ik zal je helpen vinden!',	2,	1,	'#8CF7FF',	'',	'',	'',	'',	1,	'',	'',	0,	32,	15,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'55',	'tim_duong',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(60,	'op reis',	'Ik open de lijst met plaatsen waar je naartoe kunt gaan. Klik waar je naartoe wilt!',	2,	1,	'#9CFFF2',	'',	'',	'',	'',	1,	'',	'',	38,	18,	17,	0,	'nl',	0,	'',	'',	'',	1,	'',	1,	0,	0,	'44',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(61,	'mensen veranderen',	'Je hebt de lijst met personages geopend om een ander personage te kiezen!',	2,	1,	'#FFAB2E',	'',	'',	'',	'',	1,	'',	'',	35,	34,	0,	0,	'nl',	0,	'',	'',	'',	2,	'',	1,	0,	0,	'118',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(62,	'open radio',	'Ik opende de radio, jij kiest het kanaal om te luisteren',	2,	1,	'#FFBB00',	'',	'',	'',	'',	1,	'',	'',	33,	20,	2,	0,	'nl',	0,	'',	'',	'',	2,	'',	1,	0,	0,	'655',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(63,	'flitslicht aanzetten',	'Ik opende de zaklamp om je te helpen! Als je leven donker was, dan zul je een lichte zaklamp leuk vinden! haal je uit het donker!',	1,	1,	'#FFF700',	'',	'',	'',	'',	1,	'',	'',	8,	10,	0,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'268',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(64,	'verhalen vertellen',	'Drie jongens die op een onbewoond eiland zijn gestrand, vinden een toverlantaarn met een geest, die ze elke wens toekent. De eerste jongen wou dat hij van het eiland was en terug naar huis. De tweede persoon wenst hetzelfde. De derde man zegt: \"Ik ben eenzaam, ik wou dat mijn vrienden hier waren.\"',	1,	1,	'#0AFFC6',	'',	'',	'',	'',	1,	'',	'',	0,	7,	3,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'294',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(65,	'open muziek',	'Welk lied wil je horen? Vertel me alsjeblieft de naam van het nummer en de zanger om het voor je te openen, als dat nummer in de afspeellijst staat! (Voer het nummer in dat je wilt horen)',	1,	1,	'#00FFF7',	'',	'',	'',	'',	1,	'',	'',	0,	0,	0,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'258',	'tim_nhac',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(66,	'vind contact',	'Naar wie zou je willen zoeken? Voer de naam of het telefoonnummer in Ik zal naar u zoeken! (Voer uw naam of telefoonnummer in om contactgegevens te zoeken)',	2,	1,	'#C9FF6B',	'',	'',	'',	'',	1,	'',	'',	0,	0,	0,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'247',	'tim_danh_ba',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(67,	'verander avatar',	'Selecteer een foto om uw avatar te wijzigen (plaats de avatar of neem hem met \"neem een foto\" en verwijder deze door \"verwijder Avatar\" te zeggen).',	1,	1,	'#B8FFB3',	'',	'',	'',	'',	1,	'',	'',	24,	0,	0,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'176',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(68,	'mensen veranderen',	'veranderde mensen! Ik heb de andere vorm veranderd!',	1,	1,	'#E7FFBD',	'',	'',	'',	'',	1,	'',	'',	17,	18,	0,	0,	'nl',	0,	'',	'',	'',	2,	'',	1,	0,	0,	'126',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(69,	'verander de achtergrond',	'Ik heb de achtergrondlijst geopend, je kiest de mooie achtergrond voor de applicatie offline, als je wilt dat elke foto zegt dat ik op je telefoon spaar!',	2,	1,	'#FF00EE',	'',	'',	'',	'',	1,	'',	'',	12,	0,	0,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'132',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(70,	'?...',	'Ik kan alle informatie vinden om je te helpen, door een vraagteken te schrijven aan de bovenkant van de voorbeelden:? Iphone x? Chainsmoker? Love? Facebook .... welke informatie ik je kan helpen vinden (? Informatie zoeken)',	1,	1,	'#78FFA0',	'',	'',	'',	'',	1,	'',	'',	0,	0,	0,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'19',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(71,	'Waar is dit?',	'Hier is het:\r\n\r\n {vi_tri}\r\n\r\n(geïdentificeerd via wereldwijde positionering)',	1,	1,	'#C7FFDA',	'',	'',	'',	'',	1,	'',	'',	0,	0,	0,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'55',	'vi_tri',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(72,	'Wat is de datum van vandaag?',	'Vandaag is het {thu}, {thang} {ngay} th, {nam}. fijne dag!',	1,	1,	'#B3FF00',	'',	'',	'',	'',	1,	'',	'',	0,	0,	0,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'53',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(73,	'Bewaar achtergronden op bibliotheek',	'Ik heb de afbeelding de achtergrond van de toepassing in de bibliotheek opgeslagen. Je gaat het controleren!',	1,	1,	'#EAFF61',	'',	'',	'',	'',	1,	'',	'',	15,	0,	0,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'19',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(74,	'tot ziens',	'Tot ziens, tot ziens ^^',	1,	1,	'#FF9CC9',	'',	'',	'',	'',	1,	'',	'',	4,	0,	0,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'75',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(75,	'5+5',	'Het rekenresultaat is:\r\n {giai_toan}',	1,	1,	'#D1FF75',	'',	'',	'',	'',	1,	'',	'',	0,	0,	0,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'20',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(76,	'Maak een foto',	'Maak een foto en ik zal je foto als achtergrondafbeelding van de app plaatsen!',	1,	1,	'#B4FF33',	'',	'',	'',	'',	1,	'',	'',	6,	0,	0,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'54',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(77,	'Hallo',	'Hallo, hoe gaat het met jou.',	0,	1,	'#F6FF85',	'',	'',	'',	'',	1,	'',	'',	0,	0,	0,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'412',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(78,	'Hoe gaat het met je?',	'Redelijk goed',	2,	1,	'#FF9CC9',	'',	'',	'',	'',	1,	'',	'',	0,	33,	3,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'75',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(79,	'hoe laat is het?',	'Het is {gio}: {phut} uur, respecteer alstublieft uw tijd',	2,	1,	'#FFFF87',	'',	'',	'',	'',	1,	'',	'',	3,	20,	3,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'18',	'',	0,	'',	'',	'4',	'0',	'0',	'0',	'',	''),
(80,	'virtuele realiteit',	'Nadat ik de virtual reality-functie had geopend, ben ik in het echt met jou verschenen',	2,	1,	'#FFE587',	'',	'',	'',	'',	1,	'',	'',	50,	6,	2,	0,	'nl',	0,	'',	'',	'',	1,	'',	1,	0,	0,	'1146',	'',	0,	'',	'2',	'4',	'0',	'0',	'0',	'',	''),
(81,	'virtuele realiteit',	'Nadat ik de virtual reality-functie had geopend, ben ik in het echt met jou verschenen',	2,	0,	'#FDFF12',	'',	'',	'',	'',	1,	'',	'',	50,	6,	3,	0,	'nl',	1,	'',	'',	'',	1,	'',	1,	0,	0,	'621',	'',	0,	'',	'2',	'4',	'0',	'0',	'0',	'',	''),
(82,	'Speel muziek af vanaf mijn telefoon',	'Ik heb de muziek van je apparaat aangezet, ik wens je veel luisterplezier',	2,	0,	'#D72EFF',	'',	'',	'',	'',	1,	'',	'',	47,	18,	0,	0,	'nl',	1,	'',	'',	'',	1,	'',	1,	0,	0,	'379',	'',	0,	'',	'2',	'4',	'1',	'0',	'1',	'',	''),
(83,	'Speel muziek af vanaf mijn telefoon',	'Ik heb de muziek van je apparaat aangezet, ik wens je veel luisterplezier',	2,	1,	'#FF196C',	'',	'',	'',	'',	1,	'',	'',	47,	18,	0,	0,	'nl',	0,	'',	'',	'',	1,	'',	1,	0,	0,	'851',	'',	0,	'',	'2',	'4',	'1',	'0',	'1',	'',	''),
(84,	'chatgeschiedenis',	'Ik heb de chatgeschiedenis geopend, je kunt mijn en jij gesprekken bekijken',	1,	0,	'#70EBFF',	'',	'',	'',	'',	0,	'',	'',	48,	18,	0,	0,	'nl',	1,	'',	'',	'',	2,	'',	1,	0,	0,	'831',	'',	0,	'',	'2',	'4',	'0',	'1',	'0',	'',	''),
(85,	'chatgeschiedenis',	'Ik heb de chatgeschiedenis geopend, je kunt mijn en jij gesprekken bekijken',	1,	1,	'#4FFF9C',	'',	'',	'',	'',	0,	'',	'',	48,	18,	0,	0,	'nl',	0,	'',	'',	'',	2,	'',	1,	0,	0,	'1014',	'',	0,	'',	'2',	'4',	'0',	'1',	'0',	'',	''),
(86,	'zing een liedje',	'Sugarfree - Comment ça va',	1,	0,	'#FFF419',	'',	'',	'',	'',	0,	'',	'',	2,	9,	0,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'1166',	'',	0,	'',	'2',	'2',	'0',	'0',	'0',	'sugarfree-comment-ca-va-86',	'https://carrotaudio.com/data_file/mp3/5ee2efbb6668f5ee2efbb666d6.mp3'),
(87,	'zing een liedje',	'Małe TGD - Siema',	1,	0,	'#9CB4D9',	'',	'',	'',	'',	0,	'',	'',	2,	9,	0,	0,	'nl',	1,	'',	'',	'',	0,	'',	1,	0,	0,	'145',	'',	0,	'',	'2',	'',	'0',	'0',	'0',	'ma-e-tgd-siema-87',	'https://carrotaudio.com/data_file/mp3/5ef0d09a7c0105ef0d09a7c059.mp3'),
(88,	'zing een liedje',	'SLM - Kifesh',	1,	1,	'#FFCD75',	'',	'',	'',	'',	0,	'',	'',	2,	9,	0,	0,	'nl',	0,	'',	'',	'',	0,	'',	1,	0,	0,	'511',	'',	0,	'',	'2',	'',	'0',	'0',	'0',	'slm-kifesh-88',	'https://carrotaudio.com/data_file/mp3/5f0142e936a955f0142e936afd.mp3');

-- 2020-10-05 08:31:05
