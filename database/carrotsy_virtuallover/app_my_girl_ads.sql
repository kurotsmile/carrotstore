-- Adminer 4.8.1 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_ads`;
CREATE TABLE `app_my_girl_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `android` varchar(100) NOT NULL,
  `ios` varchar(100) NOT NULL,
  `window` varchar(100) NOT NULL,
  `samsung` varchar(100) NOT NULL,
  `app_id` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `app_my_girl_ads`;
INSERT INTO `app_my_girl_ads` (`id`, `name`, `android`, `ios`, `window`, `samsung`, `app_id`) VALUES
(1,	'Love or No love',	'https://play.google.com/store/apps/details?id=com.kurotsmile.LoveorNoLove',	'https://itunes.apple.com/us/app/love-or-no-love/id1150774803',	'https://www.microsoft.com/store/productId/9NQQBL6NKM2V',	'https://galaxystore.samsung.com/detail/com.kurotsmile.LoveorNoLoveSS',	'105'),
(2,	'Virtual lover',	'',	'',	'https://www.microsoft.com/store/productId/9NSG2344SGX8',	'',	'120'),
(5,	'Contact store',	'https://play.google.com/store/apps/details?id=com.kurotsmile.contactstore',	'https://itunes.apple.com/us/app/contact-found/id1150792121?mt=8',	'https://www.microsoft.com/store/productId/9NGN6DZ4G91D',	'https://galaxystore.samsung.com/detail/com.kurotsmile.contactstore',	'104'),
(7,	'Counting sheep - go ',	'https://play.google.com/store/apps/details?id=com.kurotsmile.demcuu3d',	'https://itunes.apple.com/us/app/id1409909203',	'https://www.microsoft.com/store/productId/9N94R9FNJNS3',	'https://galaxystore.samsung.com/detail/com.kurotsmile.demcuu3d',	'122'),
(8,	'Music for life',	'https://play.google.com/store/apps/details?id=com.CarrotApp.musicforlife',	'',	'https://www.microsoft.com/en-us/p/music-for-life/9pmh34z5twz2',	'https://galaxystore.samsung.com/detail/com.CarrotApp.musicforlife',	'123'),
(9,	'virtual lover 2',	'',	'',	'',	'https://galaxystore.samsung.com/detail/com.kurotsmile.nguoiyeuao',	'121'),
(10,	'Jigsaw wall',	'https://play.google.com/store/apps/details?id=com.carrotstore.jigsawwall',	'https://testflight.apple.com/join/sFxsK8uN',	'https://www.microsoft.com/en-us/p/jigsaw-wall/9nsb998nh2f9',	'https://galaxy.store/jigs',	'127'),
(11,	'Bible world',	'https://play.google.com/store/apps/details?id=com.carrotstore.bible',	'',	'https://www.microsoft.com/store/productId/9N6M97BHKP1R',	'',	'128'),
(12,	'AI Lover',	'https://play.google.com/store/apps/details?id=com.carrotstore.ailover',	'https://testflight.apple.com/join/52UC1a5B',	'https://www.microsoft.com/store/productId/9N4F0SQKPQC6',	'https://galaxystore.samsung.com/detail/com.carrotstore.ailover',	'130'),
(13,	'Cute virtual assista',	'https://play.google.com/store/apps/details?id=com.carrotstore.cutelover',	'',	'https://www.microsoft.com/store/productId/9MSW2143779F',	'https://galaxystore.samsung.com/detail/com.carrotstore.cutelover',	'131'),
(14,	'My Lover',	'https://play.google.com/store/apps/details?id=com.carrot.mylover',	'https://testflight.apple.com/join/7yxLh0yP',	'',	'https://galaxystore.samsung.com/detail/com.carrot.mylover',	'132'),
(15,	'Quick eye',	'https://play.google.com/store/apps/details?id=com.carrotstore.quickeye',	'',	'https://www.microsoft.com/store/productId/9P2MFZJ17P7D',	'https://galaxystore.samsung.com/detail/com.carrotstore.quickeye',	'133'),
(16,	'Run Whit Me',	'https://play.google.com/store/apps/details?id=com.carrot.runwithme',	'',	'',	'https://galaxystore.samsung.com/detail/com.carrot.runwithme',	'134'),
(17,	'Create Password',	'',	'',	'',	'https://galaxystore.samsung.com/detail/com.kurotsmile.createpassword',	'136'),
(18,	'Save Web offline',	'',	'',	'',	'https://galaxystore.samsung.com/detail/com.kurotsmile.SaveWeb',	'135'),
(19,	'Number Magic',	'https://play.google.com/store/apps/details?id=com.carrotstore.numbermagic',	'',	'',	'https://galaxystore.samsung.com/detail/com.carrotstore.numbermagic',	'138'),
(20,	'Midi Piano Editor',	'https://play.google.com/store/apps/details?id=com.carrotstore.midipiano',	'',	'https://www.microsoft.com/store/productId/9PFQDFZ84JG0',	'https://galaxystore.samsung.com/detail/com.carrotstore.midipiano',	'283'),
(21,	' Worm Master',	'https://play.google.com/store/apps/details?id=com.carrotstore.wormmaster',	'',	'https://www.microsoft.com/store/productId/9NQPS9L58KZQ',	'https://galaxystore.samsung.com/detail/com.carrotstore.wormmaster',	'139');

-- 2021-07-12 11:11:57
