-- Adminer 4.8.0 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_nl_lyrics`;
CREATE TABLE `app_my_girl_nl_lyrics` (
  `id_music` varchar(20) NOT NULL,
  `lyrics` text NOT NULL,
  `artist` text NOT NULL,
  `album` text NOT NULL,
  `year` tinytext NOT NULL,
  `genre` text NOT NULL,
  FULLTEXT KEY `lyrics` (`lyrics`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_nl_lyrics`;
INSERT INTO `app_my_girl_nl_lyrics` (`id_music`, `lyrics`, `artist`, `album`, `year`, `genre`) VALUES
('86',	'Comment ca va\r\nComme ci comme ci comme ci comme ca\r\nTu ne comprend rien à l\'amour\r\nRestez la nuit, restez toujours\r\nComment ca va\r\nComme ci comme ci comme ci comme ca\r\nTu ne comprend rien à l\'amour\r\nRestez la nuit, restez toujours\r\n\'S Avonds aan de Seine\r\nIn een discotheek\r\nZag ik toen die jongen\r\nDie lachend naar me keek\r\nHij liep plots in mijn richting\r\nDat was toen mijn kans\r\nIk zocht snel naar m\'n woorden\r\nZei toen in m\'n beste Frans\r\nComment ca va\r\nComme ci comme ci comme ci comme ca\r\nTu ne comprend rien à l\'amour\r\nRestez la nuit, restez toujours\r\nComment ca va\r\nComme ci comme ci comme ci comme ca\r\nTu ne comprend rien à l\'amour\r\nRestez la nuit, restez toujours\r\nDenk ik aan die jongen\r\nDan raak ik van de wijs\r\nNachten kan ik dromen\r\nVan die tijd in Parijs\r\nWe waren altijd samen\r\nSamen bij elkaar\r\nMaar lang mocht het niet duren\r\nNu ben ik hier en hij is daar\r\nMisschien dat ik ooit weer terug ga\r\nIk wou maar dat dat kon\r\nDan zeg ik weer die woorden\r\nWaar alles mee begon\r\nComment ca va\r\nComme ci comme ci comme ci comme ca\r\nTu ne comprend rien à l\'amour\r\nRestez la nuit, restez toujours\r\nComment ca va\r\nComme ci comme ci comme ci comme ca\r\nTu ne comprend rien à l\'amour\r\nRestez la nuit, restez toujours',	'Sugarfree',	'Samen Sterk',	'2015',	'Pop'),
('87',	'nie zakręcę wody w łazience\r\nbo mnie potwornie bolą ręce\r\nnie pozbieram rzeczy z podłogi\r\nbo mnie potwornie bolą nogi\r\nnie powiem dziś miłego słowa\r\nbo mnie potwornie boli głowa\r\nnie mam siły na Ojcze Nasz\r\nbo mnie potwornie boli twarz\r\n\r\nale ale\r\ngdy się pojawia coś na ekranie\r\ndostaję turbo doładowanie\r\n\r\nsiema siema\r\nkochanie co za ściema ściema\r\nbył ból i już go nie ma nie ma\r\na taki wielki był\r\nsiema siema\r\nkochanie co za ściema ściema\r\nskąd bierze się ta trema trema\r\nlub nagły nawrót sił\r\n\r\nnie zakręcę wody w łazience…\r\n\r\nhalo halo\r\nręka leniuszka\r\nbuzia kłamczuszka\r\ntakie zmęczone\r\nnie chcą do łóżka\r\n\r\nsiema siema…\r\n\r\ntato za to\r\ntato za to\r\ntato za to ty bądź ze mną szczery\r\nczemu nigdy nie ma czasu na rowery\r\nczemu tak mnie słabo słychać kiedy wołam\r\nczemu mamy tak daleko do kościoła\r\n\r\nniech się ściemnia za oknami\r\nale nigdy między nami\r\n\r\nsiema siema\r\nniech się ściemnia\r\nściema ściema\r\nza oknami\r\nnie ma nie ma\r\nale nigdy\r\nnie ma ściemy nie ma tremy\r\nmiędzy nami',	'Małe TGD',	'Wyspa skarbów',	'2019',	'Pop'),
('88',	'3leish oh oh oh\r\nKifesh oh oh oh oh\r\n\r\nVerse 1 (Salah):\r\nDrab shi dora met mijn boys we gaan dom\r\nIk was op, Mexicano, golden power, caprisun, tla3li dem\r\nKost wat kost, we breken los, dit is raw uncut geen glos\r\nIt ain\'t easy bein\' me daarom doe ik die shit met trots\r\nEy, shoef broer niet alles is Raïbi Jamila\r\nDus ontmantel die scheve blikken en bounce lekker op die handel\r\nEy ey, shta7 shta7 ik onderschat me van de kudde\r\nBen gaan lopen van die tnawie blijf maar hangen in je bubbel, ewa\r\n\r\nPre-hook(Saïd):\r\nTransformeer in een beest\r\nMet mijn mind in een race\r\nOm te zijn waar ik sta het was niet simpel broer\r\nZomer, herfst, winter, lente\r\nInvesteer zonder rente\r\nWant ik weet wat ik wil dus stel geen vragen zovan…\r\n\r\nHook:\r\n3leish oh oh oh\r\nKifesh oh oh oh oh\r\n3leish oh oh oh\r\nKifesh oh oh oh oh\r\nVerse 2 (Saïd):\r\nNieuwe dag, nieuwe test, domme fout, dure les\r\nAf en toe zwaar relax, soms verdwaalt door de stress\r\nIk ben het type dat je ziet als je aan het verliezen bent\r\nTijden zijn hard dus niet klagen omdat ik veranderd ben\r\nGeen tijd voor vragen broer, we doen alles op gevoel\r\nHeb geen tijd voor die tnawie dat is wat ik bedoel\r\nAksht aksht, trainingspaksht, airmax das de stijl\r\nMijn djelaba wordt nooit vuil, beaugosse\r\n\r\nPre-hook(Saïd):\r\nTransformeer in een beest\r\nMet mijn mind in een race\r\nOm te zijn waar ik sta het was niet simpel broer\r\nZomer, hersft, winter, lente\r\nInvesteer zonder rente\r\nWant ik weet wat ik wil dus stel geen vragen zovan…\r\n\r\nHook:\r\n3leish oh oh oh\r\nKifesh oh oh oh oh\r\n3leish oh oh oh\r\nKifesh oh oh oh oh',	'SLM',	'Kifesh',	'2018',	'Hip-Hop/Rap');

-- 2021-03-10 08:39:28
