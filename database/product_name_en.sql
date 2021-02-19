-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_en`;
CREATE TABLE `product_name_en` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_en`;
INSERT INTO `product_name_en` (`id_product`, `data`) VALUES
(126,	'Jigsaw wall'),
(95,	'Death note - Ryuk & Rem'),
(0,	'Number Magic'),
(126,	'Jigsaw wall'),
(95,	'Death note - Ryuk & Rem'),
(0,	'Number Magic'),
(169,	'BATTLETECH Real Repack-Razor1911'),
(171,	'Contra 2028'),
(187,	'Mario Kart 8'),
(201,	'Mutant Year Zero: Road to Eden'),
(203,	'Tales Of Berseria CPY'),
(210,	'SAMURAI SHODOWN'),
(104,	'Contact store'),
(105,	'Love or No love'),
(119,	'virtual lover 3D'),
(121,	' Virtual lover 2 (Onichan)'),
(122,	'Counting sheep - go to bed'),
(123,	'Music for life'),
(127,	'Jigsaw wall'),
(128,	'Bible world'),
(130,	'AI Lover'),
(131,	'Cute virtual assistant'),
(132,	'My Lover'),
(133,	'Quick eye'),
(134,	'Run With Me'),
(135,	'Save Web offline'),
(208,	'DiRT Rally'),
(150,	'Shift 2: Unleashed'),
(149,	'Unruly Heroes'),
(147,	'Extinction'),
(146,	'Need for Speed Most Wanted'),
(145,	'Super Street Fighter IV'),
(143,	'Sky Force Reloaded'),
(142,	'Sonic and All Stars Racing Transformed'),
(139,	'Worm Master'),
(138,	'Number Magic'),
(136,	'Create Password'),
(165,	'Another Sight - Hodge\'s Journey'),
(164,	'Alien Shooter TD'),
(163,	'ABZÛ'),
(162,	'60 Parsecs!'),
(161,	'100ft Robot Golf'),
(155,	'Children of Morta'),
(160,	'A Way Out'),
(157,	'Assault Spy'),
(207,	'Doll of Resurrection'),
(174,	'Call of Duty: WWII'),
(170,	'Beach Head 2000'),
(177,	'Army Men RTS'),
(181,	'Rising Storm 2: Vietnam'),
(152,	'Crayola Scoot'),
(206,	'Puzzle Guardians'),
(168,	'American Fugitive'),
(211,	'Killers and Thieves'),
(212,	'Atelier Sophie: The Alchemist of the Mysterious Book'),
(213,	'Blue Reflection'),
(214,	'Superdimension Neptune VS Sega Hard Girls'),
(153,	'Ultimate Marvel vs. Capcom 3'),
(192,	'Hover'),
(204,	'Mages of Mystralia'),
(184,	'Cities: Skylines - Mass Transit'),
(188,	'Far Cry Primal - CPY'),
(215,	'Darksiders'),
(216,	'Element Space'),
(193,	'Narcosis'),
(217,	'Metro Exodus'),
(167,	'Arma 3 Tanks'),
(183,	'Command & Conquer 4: Tiberian Twilight'),
(218,	'Luna and the Moonling'),
(172,	'CRACK Farming Simulator 19'),
(219,	'Monster Monpiece'),
(220,	'Mutant Year Zero: Road to Eden'),
(182,	'Survivalizm - The Animal Simulator'),
(221,	'Project Warlock'),
(198,	'Heart Chain Kitty'),
(222,	'Protocol'),
(159,	'Enter the Gungeon A Farewell to Arms'),
(223,	'Heavy Weapon Deluxe'),
(186,	'Nights of Azure'),
(151,	'Pro Evolution Soccer 2019'),
(224,	'Just Cause 4'),
(226,	'Max & the Magic Marker'),
(194,	'Ruin of the Reckless'),
(227,	'NeonCode'),
(180,	'Genesis Alpha One'),
(173,	'Assassin\'s Creed Origins Gold Edition'),
(197,	'Grand Theft Auto V (GTA 5)'),
(199,	'Left 4 Dead 2'),
(205,	'Persona 5'),
(196,	'Deadstep'),
(166,	'Apex Legends'),
(179,	'Close to the Sun'),
(200,	'Mummy on the run'),
(178,	'Dangerous Driving'),
(195,	'Cruz Brothers'),
(176,	'Chef: A Restaurant Tycoon Game'),
(191,	'Killer Instinct'),
(225,	'Lethal League Blaze'),
(185,	'Dead In Time'),
(190,	'Total War: WARHAMMER II'),
(158,	'Power Rangers Battle for the Grid'),
(189,	'Call of Juarez: The Cartel'),
(202,	'Tales of Zestiria'),
(230,	'Grand Theft Auto: San Andreas'),
(231,	'Grand Theft Auto: Episodes from Liberty City'),
(232,	'Hybrid Wars - Yoko Takano'),
(233,	'Pikachu'),
(234,	'Toukiden 2'),
(235,	'LoveKami -Useless Goddess'),
(236,	'Dead Space™ 2'),
(237,	'Ikao The Lost Souls'),
(238,	'Marooners'),
(240,	'Neighbours From Hell 5'),
(175,	'Bulletstorm - FLT'),
(241,	'Anima Gate of Memories'),
(242,	'Birthdays the Beginning'),
(243,	'Badiya'),
(244,	'Strain Tactics'),
(245,	'Osiris: New Dawn'),
(246,	'Lock\'s Quest'),
(247,	'Dragon Bros'),
(229,	'Nocturnal Hunt'),
(248,	'Endless Legend™ - Symbiosis'),
(249,	'Future Unfolding'),
(250,	'Helheim'),
(140,	'Rayman Legends'),
(141,	'F1 Race Stars'),
(144,	'Kung Fu Panda Showdown of Legendary Legends'),
(154,	'Road Redemption'),
(156,	'Prince of Persia'),
(209,	'WarCraft III Complete Edition'),
(251,	'Iris Fall'),
(252,	'Quiet as a Stone'),
(253,	'Raw footage'),
(254,	'Red Alliance'),
(255,	'Republique'),
(256,	'SINNER: Sacrifice for Redemption'),
(257,	'Skullgirls 2nd Encore Upgrade'),
(258,	'South Park™: The Fractured But Whole™'),
(259,	'Space Run Galaxy'),
(260,	'Speed Brawl'),
(261,	'Loca-Love My Cute Roommate'),
(263,	'Starfighter Origins Remastered'),
(262,	'Sid Meier\'s Civilization® VI: Gathering Storm'),
(264,	'Startup Company'),
(265,	'Stay Close'),
(266,	'Reconquest'),
(267,	'Oxenfree'),
(148,	'Sniper Elite 3'),
(268,	'Shining Song Starnova'),
(269,	'Slay the Spire'),
(270,	'Strange Brigade'),
(271,	'Sudden Strike 4'),
(272,	'Sundered®: Eldritch Edition'),
(273,	'Surviving Mars'),
(274,	'The Other Half'),
(275,	'The Slater'),
(276,	'The War of the Worlds: Andromeda'),
(277,	'Thronebreaker: The Witcher Tales'),
(278,	'TurnOn'),
(279,	'Underhero'),
(280,	'Verlet Swing'),
(281,	'YIIK: A Postmodern RPG'),
(228,	'Neverending Nightmares'),
(120,	'Virtual lover'),
(282,	'My virtual lover');

-- 2020-12-28 19:35:20
