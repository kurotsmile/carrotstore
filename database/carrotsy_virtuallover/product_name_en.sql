-- Adminer 4.8.1 MySQL 5.7.36 dump

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
(208,	'DiRT Rally'),
(150,	'Shift 2: Unleashed'),
(147,	'Extinction'),
(146,	'Need for Speed Most Wanted'),
(165,	'Another Sight - Hodge\'s Journey'),
(164,	'Alien Shooter TD'),
(163,	'ABZÛ'),
(162,	'60 Parsecs!'),
(161,	'100ft Robot Golf'),
(155,	'Children of Morta'),
(160,	'A Way Out'),
(157,	'Assault Spy'),
(207,	'Doll of Resurrection'),
(177,	'Army Men RTS'),
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
(220,	'Mutant Year Zero: Road to Eden'),
(182,	'Survivalizm - The Animal Simulator'),
(221,	'Project Warlock'),
(198,	'Heart Chain Kitty'),
(159,	'Enter the Gungeon A Farewell to Arms'),
(186,	'Nights of Azure'),
(224,	'Just Cause 4'),
(226,	'Max & the Magic Marker'),
(194,	'Ruin of the Reckless'),
(227,	'NeonCode'),
(180,	'Genesis Alpha One'),
(197,	'Grand Theft Auto V (GTA 5)'),
(199,	'Left 4 Dead 2'),
(205,	'Persona 5'),
(196,	'Deadstep'),
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
(231,	'Grand Theft Auto: Episodes from Liberty City'),
(232,	'Hybrid Wars - Yoko Takano'),
(234,	'Toukiden 2'),
(235,	'LoveKami -Useless Goddess'),
(236,	'Dead Space™ 2'),
(237,	'Ikao The Lost Souls'),
(238,	'Marooners'),
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
(273,	'Surviving Mars'),
(274,	'The Other Half'),
(275,	'The Slater'),
(276,	'The War of the Worlds: Andromeda'),
(278,	'TurnOn'),
(279,	'Underhero'),
(280,	'Verlet Swing'),
(281,	'YIIK: A Postmodern RPG'),
(228,	'Neverending Nightmares'),
(119,	'virtual lover 3D'),
(104,	'Contact store'),
(128,	'Bible world'),
(282,	'My virtual lover'),
(121,	' Virtual lover 2 (Onichan)'),
(122,	'Counting sheep - go to bed'),
(132,	'My Lover'),
(138,	'Number Magic'),
(133,	'Quick eye'),
(127,	'Jigsaw wall'),
(284,	'Fish of prey'),
(139,	'Worm Master'),
(105,	'Love or No love'),
(134,	'Run With Me'),
(120,	'Virtual lover'),
(283,	'Midi Piano Editor'),
(136,	'Create Password'),
(131,	'Cute virtual assistant'),
(285,	'Table Soccer'),
(123,	'Music for life'),
(130,	'AI Lover'),
(287,	'Church Warriors'),
(297,	'Tối đa hóa năng lực nhân viên'),
(340,	'Ma Sói – Fred Vargas'),
(360,	'Liêu Trai Chí Dị'),
(311,	'Muôn Kiếp Nhân Sinh 1'),
(363,	'Hành Trình Của Linh Hồn - Michael Newton'),
(306,	'Đắc Nhân Tâm'),
(353,	'Tên Của Trò Chơi Là Bắt Cóc – Higashino Keigo'),
(327,	'Đường Chân Trời Đã Mất'),
(317,	'Cô đơn vào đời'),
(290,	'Đánh Thức Con Người Phi Thường Trong Bạn'),
(332,	'Người lữ hành kỳ dị'),
(354,	'Ma Thuật Bị Cấm – Higashino Keigo'),
(318,	'Những bí ẩn cuộc đời'),
(323,	'Không Phải Tình Hờ'),
(310,	'Xác Thịt Về Đâu'),
(321,	'Lâu Đài Hạnh Phúc'),
(344,	'Trảng Đất Trống- Hera Khinh Khinh, Robert Dugoni'),
(361,	'Nắng Gắt'),
(301,	'Ý tưởng kỳ quặc tạo ra đột phá'),
(309,	'Hạnh Phúc Bất Ngờ'),
(288,	'Làm Ít Được Nhiều'),
(334,	'Trò Chuyện Triết Học'),
(349,	'Thánh Giá Rỗng – Higashino Keigo'),
(293,	'999 Lá Thư Gửi Cho Chính Mình'),
(335,	'Tắt Đèn'),
(358,	'Khám Phá Những Điều Phi Thường'),
(302,	'Đầu Tư Vào Vàng - Jonathan Spall'),
(345,	'Mật Mã Da Vinci – Dan Brown'),
(289,	'Bố là bà giúp việc'),
(305,	'Đi Trên Mây, Nhìn Xuống Mây'),
(341,	'Xác Chết Dưới Gốc Sồi – Fred Vargas'),
(312,	'Tư Duy Phản Biện'),
(315,	'Miền Đất Dữ'),
(295,	'100 Ý Tưởng Tiếp Thị Tuyệt Hay'),
(320,	'Gõ Cửa Thiên Đường - 6 Chìa Khóa Tâm Linh Làm Giàu Cuộc Sống'),
(324,	'Xu Xu đừng khóc'),
(299,	'Sao Mãi Còn Độc Thân - Liz Tuccillo'),
(296,	'Chạm Vào Định Mệnh'),
(331,	'Tên anh chưa có trong danh sách'),
(328,	'Tình Yêu Vượt Thời Gian'),
(357,	'Mê Hoặc'),
(337,	'Nên Thân Với Đời'),
(298,	'Và Rồi Núi Vọng'),
(336,	'THƯ'),
(339,	'Đời Ngắn Đừng Ngủ Dài'),
(325,	'Hiểu Nghèo Thoát Nghèo'),
(356,	'10 Câu Nói Vạn Năng'),
(319,	'Sống chậm lại rồi mọi việc sẽ ổn thôi'),
(352,	'Phương Trình Hạ Chí – Higashino Keigo'),
(342,	'100 Câu Chuyện Triết Lý Và Kẻ Trí'),
(300,	'Không Chồng Tôi Vẫn Sống '),
(347,	'Pháo Đài Số – Dan Brown'),
(350,	'Trước Khi Nhắm Mắt – Higashino Keigo'),
(307,	'Chị Ơi...Anh Yêu Em!'),
(362,	'Vị Khách Lúc Nửa Đêm - Triệu Hi Chi'),
(348,	'Thiên Thần và Ác Quỷ – Dan Brown'),
(343,	'Mắc Kẹt – Robert Dugoni'),
(346,	'Nguồn Cội – Dan Brown'),
(304,	'Thư Gửi Steve Jobs'),
(351,	'Sự Cứu Rỗi Của Thánh Nữ – Higashino Keigo'),
(308,	'Nhà Có Chồng Ngoan'),
(355,	'Lũ Chuột Cống Vùng Bronx – Jerry Cotton'),
(303,	'Bí Kíp Quá Giang Vào Ngân Hà'),
(294,	'Tài Ăn Nói Của Người Đàn Ông'),
(329,	'Rừng Na Uy'),
(333,	'Nội Tâm Bí Ẩn'),
(291,	'Lối Sống Tối Giản Của Người Nhật'),
(322,	'Ông Trăm Tuổi Trèo Qua Cửa Sổ Và Biến Mất'),
(330,	'Cánh buồm đỏ thắm'),
(359,	'Ngọn Lửa Mùa Đông'),
(326,	'Tư Duy Như Một Hệ Thống'),
(314,	'Kiếm Sống'),
(292,	'Trở Về Từ Địa Ngục'),
(316,	'Hoa Hồng Máu'),
(313,	'Ngôi Nhà Quái Dị'),
(219,	'Monster Monpiece'),
(135,	'Save Web offline'),
(364,	'Hẹn Ước'),
(365,	'Bạn Thân Là Con Trai'),
(367,	'Maybe You Should Talk to Someone'),
(277,	'Thronebreaker: The Witcher Tales'),
(368,	'关键提问'),
(369,	'The Bitch in Your Head'),
(370,	'What If?: Serious Scientific Answers to Absurd Hypothetical Questions'),
(371,	'Gen Vị Kỷ'),
(372,	'Trí Tuệ Do Thái'),
(373,	'Chuyện nhỏ trong thế giới lớn'),
(166,	'Apex Legends'),
(374,	'Chính Trị Luận (The Politics)'),
(260,	'Speed Brawl'),
(141,	'F1 Race Stars'),
(174,	'Call of Duty: WWII'),
(240,	'Neighbours From Hell 5'),
(222,	'Protocol'),
(181,	'Rising Storm 2: Vietnam'),
(375,	'Theatre Shoes'),
(376,	'Dẫn Đầu Hay Là Chết'),
(377,	'Khác biệt để bứt phá'),
(378,	'Tôi Tự Học'),
(379,	'The Upside of Irrationality: The Unexpected Benefits of Defying Logic at Work and at Home'),
(380,	'The Book of Joy'),
(381,	'Vua Gia Long Và Người Pháp'),
(382,	'Bàn cờ lớn'),
(383,	'Tiếng Sóng - Yukio Mishima'),
(384,	'Bụi Lý Chua Máu'),
(385,	'Cô Gái Đùa Với Lửa'),
(386,	'No One Succeeds Alone'),
(387,	'Momo'),
(388,	'Ơn Cha Nghĩa Mẹ'),
(389,	'Hơi Thở Nuôi Dưỡng Và Trị Liệu'),
(390,	'Đặc Quyền Của Gái Hư'),
(391,	'德国的细节'),
(149,	'Unruly Heroes'),
(151,	'Pro Evolution Soccer 2019'),
(170,	'Beach Head 2000'),
(230,	'Grand Theft Auto: San Andreas'),
(142,	'Sonic and All Stars Racing Transformed'),
(173,	'Assassin\'s Creed Origins Gold Edition'),
(233,	'Pikachu'),
(366,	' Can\'t Hurt Me: Master Your Mind and Defy the Odds'),
(392,	'Mindshift: Break Through Obstacles to Learning and Discover Your Hidden Potential'),
(393,	'Anne Tóc Đỏ Dưới Chái Nhà Xanh'),
(394,	'Hiểu Về Trái Tim'),
(395,	'Pride and Prejudice (AmazonClassics Edition)'),
(397,	'Notes on a Nervous Planet'),
(398,	'The Beauty of Living Twice'),
(399,	'The Splendid and The Vile'),
(400,	'Nếu Biết Trăm Năm Là Hữu Hạn'),
(401,	'Vì Thương'),
(402,	'The Social Skills Guidebook'),
(145,	'Super Street Fighter IV'),
(403,	'Lean In'),
(144,	'Kung Fu Panda Showdown of Legendary Legends'),
(404,	'Emotional Intelligence'),
(396,	'Dear Girls'),
(405,	'How Not to Die'),
(406,	'Chase the Lion'),
(407,	'Cuộc Hôn Nhân Ấm Áp'),
(408,	'Người Quét Dọn Tâm Hồn'),
(409,	'Tư duy của chiến lược gia'),
(223,	'Heavy Weapon Deluxe'),
(143,	'Sky Force Reloaded'),
(272,	'Sundered®: Eldritch Edition'),
(410,	'THE GIVER - Lois Lowry'),
(411,	'The Wedding Date'),
(412,	'The Boy Who Sneaks in My Bedroom Window'),
(413,	'Mine Till Midnight (The Hathaways #1)');

-- 2021-10-29 16:20:19
