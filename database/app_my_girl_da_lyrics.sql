-- Adminer 4.8.0 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_da_lyrics`;
CREATE TABLE `app_my_girl_da_lyrics` (
  `id_music` varchar(20) NOT NULL,
  `lyrics` text NOT NULL,
  `artist` text NOT NULL,
  `album` text NOT NULL,
  `year` tinytext NOT NULL,
  `genre` text NOT NULL,
  FULLTEXT KEY `lyrics` (`lyrics`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_da_lyrics`;
INSERT INTO `app_my_girl_da_lyrics` (`id_music`, `lyrics`, `artist`, `album`, `year`, `genre`) VALUES
('80',	'https://lyricstranslate.com/en/sura-isk%C9%99nd%C9%99rli-niye-lyrics.html\r\n\r\nToplanıp nereye gidiyorsunuz gözümden düşerek?\r\nKimseler bir el uzatmazmı şimdi yere düşene\r\n \r\nNiye gelmiyorsun?\r\nNiye duymuyorsun?\r\nNiye yardım etmiyorsun?\r\nNiye?\r\nKalacakmıyım yerlerde..\r\nGelmiyorsun?\r\nNiye cevap vermiyorsun?\r\nNiye yardım etmiyorsun?\r\nNiye?\r\nÖlecekmiyim yerlerde?\r\n \r\nÖlüyorum valla\r\nSesimi duyan yok ama\r\nBir gün geleceğim\r\nSeni de göreceğim\r\n \r\nGitsemmi kalsammı?\r\nBu rüyadan uyansammı?\r\nÇok tatlı geliyordun\r\nYalanlarına kansammı?\r\n \r\nNiye görmüyorsun?\r\nNiye Sevmiyorsun?\r\nNiye elimi tutmuyorsun?\r\nNiye kalacakmıyım ellerde..\r\nGörmüyorsum\r\nNiye Sevmiyorsun?\r\nNiye elimi tutmuyorsun?\r\nNiye?\r\nKalacakmıyım ellerle..\r\n \r\nÜşüyorum aman\r\nÜstümü örten yok ama\r\nBir gün geleceğim\r\nSeni de göreceğim.\r\n \r\nÜşüyorum aman\r\nÜstümü örten yok ama\r\nBir gün geleceğim\r\nGelip cevabınızı vereceğim..ah',	'',	'',	'',	''),
('86',	'Alt du gjør stiller meg i transe\r\nJeg blir glad kjenner kroppen danse\r\nDet er ikke bare bare det\r\nKjenner gnist når du går imot meg\r\nJeg blir helt crazy av deg\r\nOg hjertet hopper opp og ned\r\nVi suser ned mot stranda\r\nOg sola gjør oss varm\r\nVil du hold meg i handa\r\nSå skal jeg vis deg sjarm\r\nDu er elektrisk\r\nDu gir meg støt når jeg tenker på deg\r\nDu er fantastisk\r\nHar jeg sjangs hvis jeg smiler mot deg?\r\nElektrisk\r\nDu er elektrisk\r\nJeg hadde kjøpt meg kano\r\nEn kasse med vørterøll og reiseradio\r\nDe ga meg reiser alene skilt\r\nHeisann Tenneriffe\r\nGikk rundt alene\r\nHvar ikke en av de kule\r\nUkyssa jeg var en og tjue\r\nDu? Hvorfor er du så gretten a\'?\r\nHvor mange damer hadde du da du var tretten a\'?\r\nJeg tusler alene på stranda\r\nOg solfaktor femti\'n er på (den er på)\r\nOg ingen vil hold meg i handa\r\nFlytter til Gran Canaria\r\nMen du, ha det\r\nDu er elektrisk\r\nDu gir meg støt når jeg tenker på deg\r\nDu er fantastisk\r\nHar jeg sjangs hvis jeg smiler mot deg?\r\nElektrisk\r\nDu er elektrisk\r\nDu, du, du gir meg støt når jeg tenker på deg\r\nDu, du, du gir meg støt når jeg tenker på deg\r\nDu, du, du gir meg støt når jeg tenker på deg\r\nDu, du, du gir meg støt når jeg tenker på deg\r\nDu er elektrisk\r\nDu gir meg støt når jeg tenker på deg\r\nDu er fantastisk\r\nHar jeg sjangs hvis jeg smiler mot deg?\r\nElektrisk',	'Marcus,Martinus',	'Hei',	'2015',	'Pop'),
('87',	'Alt du gjør stiller meg i transe\r\nJeg blir glad kjenner kroppen danse\r\nDet er ikke bare bare det\r\nKjenner gnist når du går imot meg\r\nJeg blir helt crazy av deg\r\nOg hjertet hopper opp og ned\r\nVi suser ned mot stranda\r\nOg sola gjør oss varm\r\nVil du hold meg i handa\r\nSå skal jeg vis deg sjarm\r\nDu er elektrisk\r\nDu gir meg støt når jeg tenker på deg\r\nDu er fantastisk\r\nHar jeg sjangs hvis jeg smiler mot deg?\r\nElektrisk\r\nDu er elektrisk\r\nJeg hadde kjøpt meg kano\r\nEn kasse med vørterøll og reiseradio\r\nDe ga meg reiser alene skilt\r\nHeisann Tenneriffe\r\nGikk rundt alene\r\nHvar ikke en av de kule\r\nUkyssa jeg var en og tjue\r\nDu? Hvorfor er du så gretten a\'?\r\nHvor mange damer hadde du da du var tretten a\'?\r\nJeg tusler alene på stranda\r\nOg solfaktor femti\'n er på (den er på)\r\nOg ingen vil hold meg i handa\r\nFlytter til Gran Canaria\r\nMen du, ha det\r\nDu er elektrisk\r\nDu gir meg støt når jeg tenker på deg\r\nDu er fantastisk\r\nHar jeg sjangs hvis jeg smiler mot deg?\r\nElektrisk\r\nDu er elektrisk\r\nDu, du, du gir meg støt når jeg tenker på deg\r\nDu, du, du gir meg støt når jeg tenker på deg\r\nDu, du, du gir meg støt når jeg tenker på deg\r\nDu, du, du gir meg støt når jeg tenker på deg\r\nDu er elektrisk\r\nDu gir meg støt når jeg tenker på deg\r\nDu er fantastisk\r\nHar jeg sjangs hvis jeg smiler mot deg?\r\nElektrisk',	'Marcus,Martinus',	'Hei',	'2015',	'Pop'),
('88',	'Alt du gjør stiller meg i transe\r\nJeg blir glad kjenner kroppen danse\r\nDet er ikke bare bare det\r\nKjenner gnist når du går imot meg\r\nJeg blir helt crazy av deg\r\nOg hjertet hopper opp og ned\r\nVi suser ned mot stranda\r\nOg sola gjør oss varm\r\nVil du hold meg i handa\r\nSå skal jeg vis deg sjarm\r\nDu er elektrisk\r\nDu gir meg støt når jeg tenker på deg\r\nDu er fantastisk\r\nHar jeg sjangs hvis jeg smiler mot deg?\r\nElektrisk\r\nDu er elektrisk\r\nJeg hadde kjøpt meg kano\r\nEn kasse med vørterøll og reiseradio\r\nDe ga meg reiser alene skilt\r\nHeisann Tenneriffe\r\nGikk rundt alene\r\nHvar ikke en av de kule\r\nUkyssa jeg var en og tjue\r\nDu? Hvorfor er du så gretten a\'?\r\nHvor mange damer hadde du da du var tretten a\'?\r\nJeg tusler alene på stranda\r\nOg solfaktor femti\'n er på (den er på)\r\nOg ingen vil hold meg i handa\r\nFlytter til Gran Canaria\r\nMen du, ha det\r\nDu er elektrisk\r\nDu gir meg støt når jeg tenker på deg\r\nDu er fantastisk\r\nHar jeg sjangs hvis jeg smiler mot deg?\r\nElektrisk\r\nDu er elektrisk\r\nDu, du, du gir meg støt når jeg tenker på deg\r\nDu, du, du gir meg støt når jeg tenker på deg\r\nDu, du, du gir meg støt når jeg tenker på deg\r\nDu, du, du gir meg støt når jeg tenker på deg\r\nDu er elektrisk\r\nDu gir meg støt når jeg tenker på deg\r\nDu er fantastisk\r\nHar jeg sjangs hvis jeg smiler mot deg?\r\nElektrisk\r\nDu er elektrisk',	'Marcus,Martinus',	'Hei',	'2015',	'Pop'),
('89',	'Kjører slalom\r\nHelt til sola går ned\r\nFinn en verden\r\nUnder snøhvite tre\r\nVi kjører slalom\r\nOg e kan smile og le\r\nFor ned i bakken\r\nStår du og venter på me\r\nVi kjører åoåå\r\nVi kjører slalom åoåå\r\nVi kjører slalom\r\nE så de\r\nFor første gang og e var så nær\r\nÅ fortelle de at du e nå av det finast e veit\r\nÅ baby\r\nE har så lyst å si at\r\nHjertet som trommer hver gang du glir forbi\r\nE holder pusten mens e lytter til din melodi\r\nVi kjører sammen i perfekt harmoni\r\nTa me i handa\r\nOg sammen skal vi\r\nKjøre slalom\r\nHelt til Sola går ned\r\nFinn en verden\r\nUnder snøhvite tre\r\nVi kjører slalom\r\nOg e kan smile og le\r\nFor ned i bakken\r\nStår du og venter på me\r\nVi kjører å åoåå\r\nVi kjører slalom åoåå\r\nVi kjører åoåå\r\nVi kjører slalom, åoåå, åoåå\r\nVi kjører slalom\r\nFiksa sveisen\r\nE satt ved siden av de i heisen\r\nOg ble stum når du sa\r\nE var no av det finast du veit\r\nÅ baby\r\nE har så lyst å si at\r\nHjertet som trommer hver gang du glir forbi\r\nE holder pusten mens e lytter til din melodi\r\nVi kjører sammen i perfekt harmoni\r\nTa me i handa\r\nOg sammen skal vi Kjøre slalom\r\nHelt til sola går ned\r\nFinn en verden\r\nUnder snøhvite tre\r\nVi kjører slalom\r\nOg e kan smile og le\r\nFor ned i bakken\r\nStår du og venter på me\r\nVi kjører å åoåå\r\nVi kjører slalom åoåå\r\nVi kjører å åoåå\r\nVi kjører slalom å åoåå\r\nVi kjører slalom\r\nVi kjører å åoåå, å åoåå slalom\r\nVi kjører å åoåå\r\nVi kjører slalom åoåå\r\nVi kjører å åoåå\r\nVi kjører slalom åoåå\r\nVi kjører slalom',	'Marcus,Martinus',	'Hei',	'2015',	'Pop'),
('90',	'Alt du gjør stiller meg i transe\r\nJeg blir glad kjenner kroppen danse\r\nDet ekke bare bare det\r\nKjenner gnist når du går imot me\r\nJeg blir helt crazy av de\r\nOg hjertet hopper opp og ned\r\nVi suser ned mot stranda\r\nOg sola gjør oss varm\r\nVil du hold meg i handa\r\nSå skal jeg vise deg sjarm\r\n\r\nDu e elektrisk\r\nDu gir meg støt når jeg tenker på deg\r\nDu er fantastisk, har e sjangs hvis e smiler mot de?\r\n\r\nOoooo-oo-oo-oo-oooo\r\nElektrisk\r\nOoooo-oo-oo-oo-oooo\r\nDu e elektrisk\r\n\r\nJeg hadde kjøpt meg kano\r\nEn kasse med vørterøl og reiseradio\r\nDe ga meg reiser alene skilt\r\nHeisann Tenneriffe\r\nGikk rundt alene\r\nVakk\'e en av de kule\r\nUkyssa til jeg var en og tjue\r\nDu? Hvorfor er du så gretten a\'?\r\nHvor mange damer hadde du da du var 13 a\'?\r\n\r\n\r\nJeg tusler alene på stranda\r\nOg solfaktor femti\'n er på. (Den er på vøtt)\r\nSå ingen vil hold meg i hånda\r\nFlytter til Gran Canaria\r\n(Men du hade\'a)\r\n\r\nDu e elektrisk\r\nDu gir meg støt når jeg tenker på deg\r\nDu e fantastisk, har e sjangs hvis e smiler mot de?\r\n\r\nOoooo-oo-oo-oo-oooo\r\nElektrisk\r\nOoooo-oo-oo-oo-oooo\r\nDu e elektrisk\r\n\r\nDu, du, du gir meg støt når jeg tenke på deg\r\nDu, du, du gir meg støt når jeg tenke på deg\r\nDu, du, du gir meg støt når jeg tenke på deg\r\nDu, du, du gir meg støt når jeg tenke på deeeg!\r\nDu e elektrisk\r\nDu gir meg støt når jeg tenker på deg\r\nDu e fantastisk, har e sjangs hvis e smiler\r\nMot de?\r\nOoooo-oo-oo-oo-oooo\r\nElektrisk\r\nOoooo-oo-oo-oo-oooo\r\nDu e elektrisk',	'Marcus',	'',	'2017',	''),
('91',	'Nezapomínám na to, co mi život dal,\r\njak mi život jenom přál a nepřál když jsem zůstal sám.\r\nNezapomínám na dětství, jak jsme byli malý kluci,\r\nběhali jsme po ulicích od rána, do noci.\r\nNezapomínám na nejbližší, kteří stáli pořád při mně,\r\nvy mě znáte nejlépe, vám jsem otevřel své srdce.\r\nNezapomínám na první lásky, které jsou dávno minulostí,\r\nchtěl jsem vždycky cítit pocit být někým milovaný.\r\nNezapomínám na to, když jsem přišel o svého fotra,\r\npřestal jsem se s ním vídat a ztrácel jsem s ním kontakt.\r\nNezapomínám na první show za bicíma, kde jsem hrál,\r\nprvní kapela to byly časy, které jsem miloval.\r\nNezapomínám na to, kdy mi kurvy podrazily nohy,\r\nani nikdy neměly moje boty a po mojí cestě se prošli.\r\nNezapomínám na to co mi život všechno vzal, o co jsem přišel,\r\nvidím to každou noc, když usínám.Nezapomínám na hood, kde jsem vyrůstal,\r\npo sídlišti kde sem se toulal, pod mosty kde jsem spal,\r\nto dobré co ve mně leží, jsem ukázal jenom vám,\r\nčasy se mění, všichni se mění, ale nikdy nezapomínám!!\r\nVy jste byli u toho, když se moje hvězda zrodila,\r\nnezapomínám na první potlesk, první podpis, co jsem věnoval,\r\no tom že, já na to mám, sem nikdy nepochyboval,\r\nmoc dobře vím, že tuhle cestu sem si vybral jen já sám.Nezapomínám na průsery, těch bylo snad tisíce,\r\nměli jsem všechny tak v píči, jebali jsme celý svět,\r\nna hokejová léta a na moje kamarády,\r\njenom pár je tich pravých, kteří nikdy nezklamali,\r\nNezapomínám na to kdo já jsem a odkud jsem přišel.\r\nze země sem sebral sám sebe, a začal psát svůj příběh,\r\nmožná víš jaký to je, se cítit celou dobu odlišný,\r\npodceňovaný, z davu nekonečné spodiny.\r\nNezapomínám co pro mě všechno znamená hudba,\r\nje to víc než pocit a láska co ti ze sebe můžu dát.\r\nNezapomínám jak v životě se chovali lidi ke mně,\r\nzasrané krysy, které skončili všechny do jedné.\r\nNezapomínám že si věcí musím na světě vážit,\r\nvšechno je pomíjivé, tady nic netrvá navždy.\r\nNezapomínám na to, že tu nejsem jediný,\r\nale Bůh to přehlíží, naše prosby on neslyší.Nezapomínám na hood, kde jsem vyrůstal,\r\npo sídlišti kde sem se toulal, pod mosty kde jsem spal,\r\nto dobré co ve mně leží, jsem ukázal jenom vám,\r\nčasy se mění, všichni se mění, ale nikdy nezapomínám!!\r\nVy jste byli u toho, když se moje hvězda zrodila,\r\nnezapomínám na první potlesk, první podpis, co jsem věnoval,\r\no tom že, já na to mám, sem nikdy nepochyboval,\r\nmoc dobře vím, že tuhle cestu sem si vybral jen já sám.',	'SEREGA',	'Nezapomínám',	'2017',	'Hip-Hop/Rap'),
('92',	'Procházel jsem se městem,\r\nosamocen temnou nocí\r\nviděl rozednívat město, slyšel jak zpívali ptáci Uzavřený do sebe, psal do mobilu texty řádky mě napadali sami v té na píču situaci Mezi bezďákama noční tramvají přes celé město spal jsem s okem otevřeným když jsem se šel schovat pod most, slyšel story lidí, kteří přišli úplně o všechno ,které přemohla závislost, krom fetu jím nezbylo Když chcalo byla bouřka a mi byla strašná zima, nebylo se kam schovat myslel jsem že už to nedám, jak nikdo může říct? že mě pohltila sláva já jsem ještě níže než vy, já mávám na vás ze dna. V hudbě jsem našel terapii píšu slova z mojí duše, zůstanu pořád stejný pro vás s otevřeným srdcem, nemusí se na mě štěstí smát abych věděl, že se každý může sebrat a poučit se z proher. ..Rfr.\r\nNepomůže ti nikdo jíný než ty sám\r\nv srdci zůstávám stejný jen nezastavím čas\r\nstojím sám v dešti na de mnou nebe kalné jak má duše je to dlouhé bože ale já musíc to vydržetNejsem nic a možná taky jsem ale nikdy nezahodím majk aby shňil nikde v díře\r\na moje pravé já už asi nikdo nenajde protože ho zničila nedůvěra ke všem lidem kolem.Jako tělo bez duše už dlouho noc je mým dnem ve městě kde pervitinem lidi skládaj requiem vím že to není noční můra ani vyjebaný sen, je to labyrint zničených životů a betonových stěn. Svět kurzů a měn svět dluhů, a stres je cítit ve vzduchu míchá se se smogem, znám lidi od kterých mi životní příběh vtlačil slzy a to že se máme furt hůř mě nesere, spíš mrzí. Lidi si nepomáhají spíše se vzájemně brzdí konflikt v ústí špatném pohledu. ....ti nikdo pustí, můj život je složen s 16 ti bars, flow plus beat kdysi jsem chtě všel mít teď mi stačí když můj hlas zní. Přes sídlíště přes ulice z aut, bytů, domů příběhy o boháčích, chudých od mladých až k hrobu znám smrt i zrození znám vzduch i podzemí můj rap je z hloubky mojí duše, mé bohatství rap si cením! !!Rfr. Nepomůže ti nikdo jíný než ty sám\r\nv srdci zůstávám stejný jen nezastavím čas\r\nstojím sám v dešti na de mnou nebe kalné jak má duše je to dlouhé bože ale já musíc to vydržetNejsem nic a možná taky jsem ale nikdy nezahodím majk aby shňil nikde v díře\r\na moje pravé já už asi nikdo nenajde protože ho zničila nedůvěra ke všem lidem kolem',	'SEREGA',	'',	'2011',	'');

-- 2021-03-10 08:45:42
