-- Adminer 4.8.0 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `product_link`;
CREATE TABLE `product_link` (
  `id_product` int(100) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `product_link`;
INSERT INTO `product_link` (`id_product`, `icon`, `name`, `link`) VALUES
(201,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/mutant-year-zero-road-to-eden/9nmp9b9kmklf'),
(210,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/999660/SAMURAI_SHODOWN_NEOGEO_COLLECTION/'),
(104,	'fa-scribd',	'Samsung Galaxy Store',	'https://galaxystore.samsung.com/detail/com.kurotsmile.contactstore'),
(104,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.kurotsmile.contactstore'),
(104,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/store/productId/9NGN6DZ4G91D'),
(104,	'fa-play',	'Carrot store',	'http://carrotstore.com/member'),
(105,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.kurotsmile.LoveorNoLove'),
(105,	'fa-apple',	'Apple store',	'https://appho.st/d/#/OQ3wbj8I'),
(105,	'fa-scribd',	'Samsung Galaxy Store',	'https://galaxystore.samsung.com/detail/com.kurotsmile.LoveorNoLoveSS'),
(105,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/maxim-flower-garden/9nqqbl6nkm2v?activetab=pivot:overviewtab'),
(105,	'fa-play',	'Carrot store',	'http://carrotstore.com/quote'),
(119,	'fa-android',	'Google Play',	'http://carrotstore.com/product_data/119/virtual3d.apk'),
(121,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.kurotsmile.nguoiyeuao'),
(122,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.kurotsmile.demcuu3d'),
(122,	'fa-scribd',	'Samsung Galaxy Store',	'https://galaxystore.samsung.com/detail/com.kurotsmile.demcuu3d'),
(122,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/store/productId/9N94R9FNJNS3'),
(123,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.CarrotApp.musicforlife'),
(123,	'fa-scribd',	'Samsung Galaxy Store',	'https://galaxystore.samsung.com/detail/com.CarrotApp.musicforlife'),
(123,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/store/productId/9PMH34Z5TWZ2'),
(123,	'fa-play',	'Carrot store',	'http://carrotstore.com/music'),
(127,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.carrotstore.jigsawwall'),
(127,	'fa-scribd',	'Samsung Galaxy Store',	'https://galaxy.store/jigs'),
(127,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/store/productId/9NSB998NH2F9'),
(128,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/store/productId/9N6M97BHKP1R'),
(128,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.carrotstore.bible'),
(130,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.carrotstore.ailover'),
(130,	'fa-scribd',	'Samsung Galaxy Store',	'https://galaxystore.samsung.com/detail/com.carrotstore.ailover'),
(130,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/store/productId/9N4F0SQKPQC6'),
(131,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.carrotstore.cutelover'),
(131,	'fa-scribd',	'Samsung Galaxy Store',	'https://galaxystore.samsung.com/detail/com.carrotstore.cutelover'),
(131,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/store/productId/9MSW2143779F'),
(133,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.carrotstore.quickeye'),
(133,	'fa-scribd',	'Samsung Galaxy Store',	'https://galaxystore.samsung.com/detail/com.carrotstore.quickeye'),
(133,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/store/productId/9P2MFZJ17P7D'),
(134,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.carrot.runwithme'),
(134,	'fa-scribd',	'Samsung Galaxy Store',	'https://galaxystore.samsung.com/detail/com.carrot.runwithme'),
(135,	'fa-chrome',	'Chrome Web Store',	'https://chrome.google.com/webstore/detail/save-web-offline/japgpebomnphkbhbkejjppjabckjajoi'),
(135,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.kurotsmile.SaveWeb'),
(135,	'fa-scribd',	'Samsung Galaxy Store',	'https://galaxystore.samsung.com/detail/com.kurotsmile.SaveWeb'),
(208,	'fa-apple',	'Apple store',	'https://apps.apple.com/us/app/dirt-rally/id1076935807'),
(208,	'fa-codepen',	'PlayStation Store',	'https://www.playstation.com/en-us/games/dirt-rally-ps4/'),
(150,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/47920/Shift_2_Unleashed/'),
(149,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/780350/Unruly_Heroes/'),
(147,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/570710/Extinction/'),
(146,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.ea.games.nfs13_na'),
(146,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/1262560/Need_for_Speed_Most_Wanted'),
(145,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/45760/Ultra_Street_Fighter_IV/'),
(145,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP9012-CUSA01846_00-USF4DEV00104SCEA'),
(143,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=pl.idreams.SkyForceReloaded2016'),
(143,	'fa-codepen',	'PlayStation Store',	'https://store.steampowered.com/app/667600/Sky_Force_Reloaded/'),
(142,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/sonic-all-stars-racing-transformed/c2s98g1zc8hs'),
(142,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/212480/Sonic__AllStars_Racing_Transformed_Collection/'),
(139,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.carrotstore.wormmaster'),
(138,	'fa-scribd',	'Samsung Galaxy Store',	'https://galaxystore.samsung.com/detail/com.carrotstore.numbermagic'),
(138,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.carrotstore.numbermagic'),
(136,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.kurotsmile.createpassword'),
(136,	'fa-scribd',	'Samsung Galaxy Store',	'https://galaxystore.samsung.com/detail/com.kurotsmile.createpassword'),
(136,	'fa-chrome',	'Chrome Web Store',	'https://chrome.google.com/webstore/detail/create-password/ndhnlbbbdmmepbechjapigogodaggbop'),
(165,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/963210/Another_Sight__Hodges_Journey/'),
(164,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/541230/Alien_Shooter_TD/'),
(163,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/abzu/9pnlf7rlzrvv'),
(163,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/384190/ABZU/'),
(162,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.RobotGentleman.sixtyParsecs.mobile'),
(162,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/646270/60_Parsecs/'),
(161,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/368000/100ft_Robot_Golf/'),
(161,	'fa-codepen',	'PlayStation Store',	'https://www.playstation.com/en-us/games/100ft-robot-golf-ps4/'),
(155,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/330020/Children_of_Morta/'),
(160,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/1222700/A_Way_Out/'),
(160,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/a-way-out/bwvbncmf22zk'),
(157,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/767930/Assault_Spy/'),
(207,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/927190/Doll_of_Resurrection/'),
(174,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/call-of-duty-wwii/bv0nsd4nn4v4'),
(174,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.activision.callofduty.shooter'),
(170,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/509610/Beachhead_2000/'),
(177,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.hts.ams'),
(177,	'fa-apple',	'Apple store',	'	 https://apps.apple.com/us/app/army-men-strike-toy-soldiers/'),
(181,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/418460/Rising_Storm_2_Vietnam/'),
(152,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/772530/Crayola_Scoot/'),
(152,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-gb/product/EP3678-CUSA11490_00-SCOOT00000000000'),
(206,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/607670/Puzzle_Guardians/'),
(168,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/american-fugitive/c48ljqlv397r'),
(168,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/934780/American_Fugitive/'),
(211,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/382330/Killers_and_Thieves/'),
(212,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/527270/Atelier_Sophie_The_Alchemist_of_the_Mysterious_Book/'),
(213,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/658260/BLUE_REFLECTION__BLUE_REFLECTION/'),
(214,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/571530/Superdimension_Neptune_VS_Sega_Hard_Girls/'),
(153,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/357190/ULTIMATE_MARVEL_VS_CAPCOM_3/'),
(192,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/280180/Hover/'),
(204,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/mages-of-mystralia/c3s0nlb4qfg7'),
(204,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/529660/Mages_of_Mystralia/'),
(184,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/547502/Cities_Skylines__Mass_Transit/'),
(184,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/cities-skylines-mass-transit'),
(188,	'fa-steam',	'Steam',	'https://store.steampowered.com/agecheck/app/371660/'),
(215,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/50620/Darksiders/'),
(216,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/887370/Element_Space/'),
(216,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.elementspace.ar&hl=en'),
(193,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/narcosis/c0ml5zxhlj71'),
(217,	'fa-codepen',	'PlayStation Store',	'https://www.playstation.com/en-us/games/metro-exodus-ps4/'),
(217,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/412020/Metro_Exodus/'),
(167,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/798390/Arma_3_Tanks/'),
(183,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/47700/Command__Conquer_4_Tiberian_Twilight/'),
(218,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/577360/Luna_and_the_Moonling/'),
(172,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/787860/Farming_Simulator_19/'),
(219,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/415300/Monster_Monpiece/'),
(219,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP0031-PCSE00373_00-MONSTERMONPIECE1'),
(220,	'fa-steam',	'Steam',	'https://www.fshare.vn/file/NWEYDNV5THL97Y2'),
(220,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP1850-CUSA12680_00-NAMUTANTYEARZERO'),
(182,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/597920/Survivalizm__The_Animal_Simulator/'),
(221,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/893680/Project_Warlock/'),
(198,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/933210/Heart_Chain_Kitty/'),
(222,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/724490/Protocol/'),
(159,	'fa-steam',	'Steam',	'https://store.steampowered.com/newshub/app/311690/old_view/1798530504251514527'),
(223,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/3410/Heavy_Weapon_Deluxe/'),
(186,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/527280/Nights_of_Azure/'),
(151,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=jp.konami.pesam'),
(224,	'fa-steam',	'Steam',	'https://store.steampowered.com/agecheck/app/517630/'),
(224,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP0082-CUSA09254_00-JC40000000000000'),
(226,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/50820/Max_and_the_Magic_Marker/'),
(226,	'fa-apple',	'Apple store',	'https://apps.apple.com/us/app/max-the-magic-marker-remastered/id1256928610'),
(194,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/516430/Ruin_of_the_Reckless/'),
(227,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/976780/NeonCode/'),
(180,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/genesis-alpha-one/bq3krvcclbvz'),
(180,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/712190/Genesis_Alpha_One_Deluxe_Edition/'),
(180,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP4064-CUSA10993_00-GENESISALPHA1000'),
(173,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/assassins-creed-origins-gold-edition/bx8j66wfq1vk'),
(173,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP0001-CUSA05855_00-EDITIONGLDACE000'),
(197,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/grand-theft-auto-v/bpj686w6s0nh'),
(197,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.rockstargames.gtavmanual'),
(199,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/left-4-dead-2/bwvzhjn0g3c3'),
(199,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/550/Left_4_Dead_2/'),
(205,	'fa-codepen',	'PlayStation Store',	'https://www.playstation.com/en-us/games/persona-5-ps4/'),
(196,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/751470/Deadstep/'),
(166,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/1172470/Apex_Legends/'),
(179,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/close-to-the-sun/9n67qth4z1gp'),
(179,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/968870/Close_to_the_Sun/'),
(200,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=mummy.eqypt.pyramid.run.gamelon'),
(200,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/914050/Mummy_on_the_run/'),
(178,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/dangerous-driving/9ntdhc46672v?activetab=pivot:overviewtab'),
(195,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/697870/Cruz_Brothers/'),
(195,	'fa-codepen',	'PlayStation Store',	'https://www.playstation.com/en-us/games/cruz-brothers-ps4/'),
(195,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/cruz-brothers/9nblggh3zwdx'),
(176,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.appon.restauranttycoon'),
(176,	'fa-apple',	'Apple store',	'https://apps.apple.com/us/app/restaurant-tycoon-my-kitchen-chef-story/id1192027845'),
(191,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/577940/Killer_Instinct/'),
(225,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/553310/Lethal_League_Blaze/'),
(225,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP2557-CUSA13507_00-LLBLAZE000000000'),
(185,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/875530/Dead_In_Time/'),
(190,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/594570/Total_War_WARHAMMER_II/'),
(158,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP4827-CUSA15145_00-BATTLEFORTHEGRID'),
(158,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/1110100/Power_Rangers_Battle_for_the_Grid/'),
(202,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/351970/Tales_of_Zestiria/'),
(230,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.rockstargames.gtasa'),
(230,	'fa-apple',	'Apple store',	'https://apps.apple.com/us/app/grand-theft-auto-san-andreas/id763692274'),
(230,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/12120/Grand_Theft_Auto_San_Andreas/'),
(230,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP1004-CUSA03506_00-SLUS209460000001'),
(231,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP1004-NPUB30704_00-GTAIVEFLCDIGITAL'),
(231,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/12220/Grand_Theft_Auto_Episodes_from_Liberty_City/'),
(232,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/442840/Hybrid_Wars__Yoko_Takano/'),
(234,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/551730/Toukiden_2/'),
(234,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP4108-CUSA05797_00-TOUKIDEN20000000'),
(235,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/626510/LoveKami_Useless_Goddess/'),
(236,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/47780/Dead_Space_2/'),
(236,	'fa-chrome',	'Chrome Web Store',	'https://chrome.google.com/webstore/detail/dead-space-2/codenaegofpdpdjmlendhjijljidkcoc'),
(236,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-au/product/EP0006-NPEB00551_00-DS2PALDEENFR0001'),
(237,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/1017130/Ikao_The_Lost_Souls/'),
(238,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/423810/Marooners/'),
(238,	'fa-codepen',	'PlayStation Store',	'https://www.playstation.com/en-us/games/marooners-ps4/'),
(238,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/marooners/bssvq12jcbnh'),
(240,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.nordigames.nfh'),
(240,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/260750/Neighbours_from_Hell_Compilation/?l=czech'),
(241,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/380750/Anima_Gate_of_Memories/'),
(242,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/525700/Birthdays_the_Beginning/'),
(242,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP1063-CUSA07036_00-HAPPYBIRTHDAY000'),
(243,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/545050/Badiya_Desert_Survival/'),
(244,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/621810/Strain_Tactics/'),
(244,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.touchdimensions.zombie'),
(245,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/402710/Osiris_New_Dawn/'),
(246,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/490080/Locks_Quest/'),
(246,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.hg.locksquest'),
(247,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/506150/Dragon_Bros/'),
(229,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/635550/Nocturnal_Hunt/'),
(248,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/988450/Endless_Legend__Symbiosis/'),
(249,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/539340/Future_Unfolding/'),
(249,	'fa-codepen',	'PlayStation Store',	'https://www.playstation.com/en-us/games/future-unfolding-ps4/'),
(250,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/924100/Helheim/'),
(140,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/242550/Rayman_Legends/'),
(140,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP0001-CUSA00069_00-RAYMANLEGENDS001'),
(141,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/203680/F1_RACE_STARS/'),
(144,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/kung-fu-panda/8d6kgwzl603k'),
(144,	'fa-codepen',	'PlayStation Store',	'https://www.playstation.com/en-us/games/kung-fu-panda-showdown-of-legendary-legends-ps4/'),
(154,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/300380/Road_Redemption/'),
(154,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/road-redemption/bv5glfhzthqh'),
(154,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-Us/product/UP0115-CUSA13038_00-ROADREDEMPTION00'),
(251,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/907470/IrisFall/'),
(251,	'fa-codiepie',	'Nintendo Store',	'https://www.nintendo.com/games/detail/iris-fall-switch/'),
(252,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/872060/Quiet_as_a_Stone/'),
(253,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/812090/RAW_FOOTAGE/'),
(254,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/594050/Red_Alliance'),
(255,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/317100/Republique/'),
(256,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/691280/SINNER_Sacrifice_for_Redemption/'),
(256,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/sinner-sacrifice-for-redemption/9p015xpl7qzh'),
(256,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP4338-CUSA11129_00-SINNERSACRIFICEF'),
(257,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/447510/Skullgirls_2nd_Encore_Upgrade/'),
(258,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/488790/South_Park_The_Fractured_But_Whole/'),
(258,	'fa-codiepie',	'Nintendo Store',	'https://www.nintendo.com/games/detail/south-park-the-fractured-but-whole-standard-edition-switch/'),
(259,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/355800/Space_Run_Galaxy/'),
(260,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/468670/Speed_Brawl/'),
(260,	'fa-codiepie',	'Nintendo Store',	'https://www.nintendo.com/games/detail/speed-brawl-switch/'),
(260,	'fa-codepen',	'PlayStation Store',	'https://www.playstation.com/en-us/games/speed-brawl-ps4/'),
(261,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/916060/LocaLove_My_Cute_Roommate/'),
(263,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/564950/Starfighter_Origins_Remastered/'),
(262,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/947510/Sid_Meiers_Civilization_VI_Gathering_Storm/'),
(264,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/606800/Startup_Company/'),
(265,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/455120/Stay_Close/'),
(266,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/530040/reconquest/'),
(267,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/oxenfree/bsk1gn27rb8r'),
(267,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/388880/Oxenfree/'),
(148,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/238090/Sniper_Elite_3/'),
(148,	'fa-codepen',	'PlayStation Store',	'https://www.playstation.com/en-us/games/sniper-elite-3-ps4/'),
(268,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/1215200/Shining_Song_Starnova_Idol_Empire/'),
(269,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/646570/Slay_the_Spire/'),
(269,	'fa-codiepie',	'Nintendo Store',	'https://www.nintendo.com/games/detail/slay-the-spire-switch/'),
(270,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/312670/Strange_Brigade/'),
(270,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP4363-CUSA08335_00-STRANGE000000002'),
(271,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP2060-CUSA07103_00-SUDDENSTRIKE4444'),
(271,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/373930/Sudden_Strike_4/'),
(272,	'fa-codiepie',	'Nintendo Store',	'https://www.nintendo.com/games/detail/sundered-eldritch-edition-switch/'),
(272,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/535480/Sundered_Eldritch_Edition/'),
(272,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-ca/p/sundered-eldritch-edition/9p6qqg59n2p3'),
(272,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-ca/product/UP2388-CUSA07282_00-SUNDEREDENG00001'),
(273,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/464920/Surviving_Mars/'),
(273,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP4139-CUSA10160_00-SURVIVINGMARS002'),
(273,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/surviving-mars/bxc7cs90nx6s'),
(274,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/917920/The_Other_Half/'),
(275,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/881690/The_Slater/'),
(276,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/the-war-of-the-worlds-andromeda/9p3wt637qwls'),
(276,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/910430/The_War_of_the_Worlds_Andromeda/'),
(277,	'fa-codiepie',	'Nintendo Store',	'https://www.nintendo.com/games/detail/thronebreaker-the-witcher-tales-switch/'),
(277,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/973760/Thronebreaker_The_Witcher_Tales/'),
(277,	'fa-codepen',	'PlayStation Store',	'https://www.playstation.com/en-us/games/thronebreaker-the-witcher-tales-ps4/'),
(278,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/428220/TurnOn/'),
(278,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/turnon/c31nlmb7t1b2'),
(279,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/underhero/9nssfvcg2959'),
(279,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP2187-CUSA16815_00-UHPS4SIEADIGI001'),
(279,	'fa-codiepie',	'Nintendo Store',	'https://www.nintendo.com/games/detail/underhero-switch/'),
(280,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/en-us/p/verlet-swing/9n510dk5kfqq'),
(280,	'fa-codiepie',	'Nintendo Store',	'https://www.nintendo.com/games/detail/verlet-swing-switch/'),
(280,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP2187-CUSA15193_00-VSPS4SIEADIGI001'),
(281,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/459080/YIIK_A_Postmodern_RPG/'),
(281,	'fa-codepen',	'PlayStation Store',	'https://store.playstation.com/en-us/product/UP2251-CUSA13180_00-YIIKPOMORPGACKK1'),
(228,	'fa-steam',	'Steam',	'https://store.steampowered.com/app/253330/Neverending_Nightmares/'),
(120,	'fa-windows',	'Microsoft Store',	'https://www.microsoft.com/store/productId/9NSG2344SGX8'),
(120,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.kurotsmile.mygirl'),
(282,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.carrotstore.appai'),
(132,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.carrot.mylover'),
(132,	'fa-scribd',	'Samsung Galaxy Store',	'https://galaxystore.samsung.com/detail/com.carrot.mylover'),
(283,	'fa-android',	'Google Play',	'https://play.google.com/store/apps/details?id=com.carrotstore.midipiano');

-- 2021-03-10 06:47:38
