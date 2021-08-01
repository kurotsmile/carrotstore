-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `app_ads`;
CREATE TABLE `app_ads` (
  `id_app` varchar(6) NOT NULL,
  `google_Play` text NOT NULL,
  `samsung_galaxy_store` text NOT NULL,
  `microsoft_store` text NOT NULL,
  `amazon_app_store` text NOT NULL,
  `carrot_store` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `app_ads`;
INSERT INTO `app_ads` (`id_app`, `google_Play`, `samsung_galaxy_store`, `microsoft_store`, `amazon_app_store`, `carrot_store`) VALUES
('121',	'',	'https://galaxystore.samsung.com/detail/com.kurotsmile.nguoiyeuao',	'',	'https://www.amazon.com/gp/mas/dl/android?p=com.kurotsmile.nguoiyeuao',	''),
('139',	'https://play.google.com/store/apps/details?id=com.carrotstore.wormmaster',	'https://galaxystore.samsung.com/detail/com.carrotstore.wormmaster',	'https://www.microsoft.com/store/productId/9NQPS9L58KZQ',	'https://www.amazon.com/gp/mas/dl/android?p=com.carrotstore.wormmaster',	''),
('105',	'https://play.google.com/store/apps/details?id=com.kurotsmile.LoveorNoLove',	'https://galaxystore.samsung.com/detail/com.kurotsmile.LoveorNoLoveSS',	'https://www.microsoft.com/en-us/p/maxim-flower-garden/9nqqbl6nkm2v?activetab=pivot:overviewtab',	'https://www.amazon.com/gp/mas/dl/android?p=com.kurotsmile.LoveorNoLove',	'http://carrotstore.com/quote'),
('130',	'https://play.google.com/store/apps/details?id=com.carrotstore.ailover',	'https://galaxystore.samsung.com/detail/com.carrotstore.ailover',	'https://www.microsoft.com/store/productId/9N4F0SQKPQC6',	'https://www.amazon.com/gp/mas/dl/android?p=com.carrotstore.ailover',	''),
('127',	'https://play.google.com/store/apps/details?id=com.carrotstore.jigsawwall',	'https://galaxy.store/jigs',	'https://www.microsoft.com/store/productId/9NSB998NH2F9',	'https://www.amazon.com/gp/mas/dl/android?p=com.carrotstore.jigsawwall',	''),
('120',	'',	'',	'https://www.microsoft.com/store/productId/9NSG2344SGX8',	'',	''),
('134',	'https://play.google.com/store/apps/details?id=com.carrot.runwithme',	'',	'https://www.microsoft.com/store/productId/9NC006KT3RHH',	'https://www.amazon.com/gp/mas/dl/android?p=com.carrot.runwithme',	''),
('131',	'https://play.google.com/store/apps/details?id=com.carrotstore.cutelover',	'https://galaxystore.samsung.com/detail/com.carrotstore.cutelover',	'https://www.microsoft.com/store/productId/9MSW2143779F',	'https://www.amazon.com/gp/mas/dl/android?p=com.carrotstore.cutelover',	''),
('123',	'https://play.google.com/store/apps/details?id=com.CarrotApp.musicforlife',	'https://galaxystore.samsung.com/detail/com.CarrotApp.musicforlife',	'https://www.microsoft.com/store/productId/9PMH34Z5TWZ2',	'',	'http://carrotstore.com/music'),
('104',	'https://play.google.com/store/apps/details?id=com.kurotsmile.contactstore',	'https://galaxystore.samsung.com/detail/com.kurotsmile.contactstore',	'https://www.microsoft.com/store/productId/9NGN6DZ4G91D',	'https://www.amazon.com/gp/mas/dl/android?p=com.kurotsmile.contactstore',	'http://carrotstore.com/member'),
('133',	'https://play.google.com/store/apps/details?id=com.carrotstore.quickeye',	'https://galaxystore.samsung.com/detail/com.carrotstore.quickeye',	'https://www.microsoft.com/store/productId/9P2MFZJ17P7D',	'https://www.amazon.com/gp/mas/dl/android?p=com.carrotstore.quickeye',	''),
('284',	'https://play.google.com/store/apps/details?id=com.carrotstore.fishofprey',	'https://galaxy.store/csn',	'https://www.microsoft.com/store/productId/9PHN8K0TFMGD',	'https://www.amazon.com/gp/mas/dl/android?p=com.carrotstore.fishofprey',	''),
('138',	'https://play.google.com/store/apps/details?id=com.carrotstore.numbermagic',	'https://galaxystore.samsung.com/detail/com.carrotstore.numbermagic',	'https://www.microsoft.com/store/productId/9NXJJ258HZ48',	'https://www.amazon.com/gp/mas/dl/android?p=com.carrotstore.numbermagic',	''),
('282',	'',	'https://galaxystore.samsung.com/detail/com.carrotstore.appai',	'',	'https://www.amazon.com/gp/mas/dl/android?p=com.carrotstore.appai',	''),
('122',	'https://play.google.com/store/apps/details?id=com.kurotsmile.demcuu3d',	'https://galaxystore.samsung.com/detail/com.kurotsmile.demcuu3d',	'https://www.microsoft.com/store/productId/9N94R9FNJNS3',	'https://www.amazon.com/gp/mas/dl/android?p=com.kurotsmile.demcuu3d',	''),
('283',	'https://play.google.com/store/apps/details?id=com.carrotstore.midipiano',	'https://galaxystore.samsung.com/detail/com.carrotstore.midipiano',	'https://www.microsoft.com/store/productId/9PFQDFZ84JG0',	'https://www.amazon.com/gp/mas/dl/android?p=com.carrotstore.midipiano',	'https://carrotstore.com/piano'),
('132',	'https://play.google.com/store/apps/details?id=com.carrot.mylover',	'https://galaxystore.samsung.com/detail/com.carrot.mylover',	'',	'https://www.amazon.com/gp/mas/dl/android?p=com.carrot.mylover',	''),
('128',	'https://play.google.com/store/apps/details?id=com.carrotstore.bible',	'',	'https://www.microsoft.com/store/productId/9N6M97BHKP1R',	'https://www.amazon.com/gp/mas/dl/android?p=com.carrotstore.bible',	'');

-- 2021-07-30 11:10:47
