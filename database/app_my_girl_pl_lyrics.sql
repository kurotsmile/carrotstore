-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_pl_lyrics`;
CREATE TABLE `app_my_girl_pl_lyrics` (
  `id_music` varchar(20) NOT NULL,
  `lyrics` text NOT NULL,
  `artist` text NOT NULL,
  `album` text NOT NULL,
  `year` tinytext NOT NULL,
  `genre` text NOT NULL,
  FULLTEXT KEY `lyrics` (`lyrics`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_pl_lyrics`;
INSERT INTO `app_my_girl_pl_lyrics` (`id_music`, `lyrics`, `artist`, `album`, `year`, `genre`) VALUES
('78',	'//x4\r\nZapach tamtych dni, czar Znowu uderza mnie.\r\nGdy wyraźna Twoja twarz, W myślach zjawia się.\r\nWciąż pamiętam Twój każdy szept, W sercu, głowie ukryłam Cię, Cały świat stanął w\r\nmiejscu, wiem, Znów mam energię by biec.\r\nKiedy zapadnie już zmrok, zabiorę Cię stąd, zabiorę Cię stąd.\r\nZa rękę wezmę pod prąd By znaleźć Twój ląd, by znaleźć Twój ląd.\r\n(oooo-oooo)//x4\r\nCzas, czas, nasz największy wróg, Tęsknot puls i krew.\r\nKiedy jesteś ze mną, chcę zwolnić jego bieg.\r\nKompozycją móc zdarzeń stu, Jesteś, słyszę ją ciągle tu Dzień po woli upływa, chcę\r\nZnowu do Ciebie dziś biec.\r\nKiedy zapadnie już zmrok, zabiorę Cię stąd, zabiorę Cię stąd.\r\nZa rękę wezmę pod prąd, By znaleźć Twój ląd, by znaleźć Twój ląd.\r\n(oooo-oooo)//x4\r\nKiedy zapadnie już zmrok, zabiorę Cię stąd, zabiorę Cię stąd.\r\nZa rękę wezmę pod prąd, By znaleźć Twój ląd, by znaleźć Twój ląd.',	'',	'',	'',	''),
('81',	'[Intro: Adje]\r\nCoño\r\nLil\' bitch\r\nPuri on the beat\r\nPuri-puri on the beat, coño\r\n\r\n[Hook: Adje]\r\nCoño\r\nZet \'t in d\'r coño\r\nCoño\r\nZet \'t in d\'r coño\r\n(Coño) coño, (coño) coño (coño)\r\nZet \'t in d\'r coño\r\n(Coño) coño, (coño) coño (coño)\r\nZet \'t in d\'r coño\r\n\r\n[Verse 1: Jhorrmountain]\r\nStoute jongen, ik wil tongen met die lippen van d\'r\r\nOmin juice, super sappig, laat me drinken van je\r\nDuurt lang voordat ik kom, dat vindt ze minder van me\r\nMaar ze is happy als ik kom, nee ze hindert niet van me\r\nZe is blij als ze me ziet, ze wil meteen werken\r\nAss dik het niet bij mij schatje, ik werk \'t\r\nZe heeft een dikke culo en ik bewerk d\'r\r\nMaar laat me niet teveel praten, laat me zitten aan je\r\n(Laat me zitten aan die coño van je)\r\n\r\n\r\n[Hook: Adje]\r\nCoño\r\nZet \'t in d\'r coño\r\nCoño\r\nZet \'t in d\'r coño\r\n(Coño) coño, (coño) coño (coño)\r\nZet \'t in d\'r coño\r\n(Coño) coño, (coño) coño (coño)\r\nZet \'t in d\'r coño\r\n\r\n[Verse 2: Adje]\r\nDomme hoofd, pashokjes, is echt koppig\r\nNatte natte poula, echt soppig\r\nLaat d\'r vechten voor die dick, pestkoppen\r\nZe wil wiepen in de bosjes, echt vossig\r\nCoño, ze zegt me \"Adje, t\'abo ta mi doño\r\nMi chaiba ta dal bu, mandabu soño\"\r\nGoeie waistline\r\nZe wil zitten op m\'n face, noem het Facetime\r\n\r\n[Hook: Adje]\r\nCoño\r\nZet \'t in d\'r coño\r\nCoño\r\nZet \'t in d\'r coño\r\n(Coño) coño, (coño) coño (coño)\r\nZet \'t in d\'r coño\r\n(Coño) coño, (coño) coño (coño)\r\nZet \'t in d\'r (coño)\r\n\r\n[Outro: Adje]\r\n(Coño)\r\nLil\' bitch',	'Jhorrmountain',	'Coño (Instrumental Mix)',	'2017',	'Dance/Electronic');

-- 2020-10-25 12:01:43
