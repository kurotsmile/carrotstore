-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `inapp`;
CREATE TABLE `inapp` (
  `id` varchar(100) NOT NULL,
  `id_app` varchar(5) NOT NULL,
  `price` varchar(10) NOT NULL,
  `data_lang` varchar(60) NOT NULL,
  `protocol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `inapp`;
INSERT INTO `inapp` (`id`, `id_app`, `price`, `data_lang`, `protocol`) VALUES
('com.carrotstore.wormmaster.removeads',	'139',	'2.0',	'remove_ads',	'wormmaster'),
('com.carrotstore.wormmaster.musicbk',	'139',	'3.0',	'musicbk',	'wormmaster'),
('com.carrotstore.midipiano.buymidi',	'283',	'1.8',	'midi',	'midi'),
('com.carrotstore.midipiano.removeads',	'283',	'3.0',	'remove_ads',	'midi'),
('com.carrotstore.midipiano.buylist',	'283',	'5.0',	'buylistmidi',	'midi'),
('com.carrotstore.ailover.all',	'130',	'10.0',	'all_function',	''),
('com.kurotsmile.contactstore.removeads',	'104',	'2.0',	'remove_ads',	'contactstore'),
('com.carrotstore.numbermagic.removeads',	'138',	'2.0',	'remove_ads',	'numbermagic'),
('com.carrotstore.numbermagic.bkmusic',	'138',	'3.0',	'musicbk',	'numbermagic'),
('com.carrotstore.fishofprey.ads',	'284',	'2.0',	'remove_ads',	'fishofprey'),
('com.carrotstore.fishofprey.allfish',	'284',	'5.0',	'all_fish',	'fishofprey'),
('com.carrotstore.fishofprey.fish',	'284',	'1.2',	'fish',	'fishofprey'),
('com.carrotstore.quickeye.removeads',	'133',	'3.0',	'remove_ads',	'quickeye'),
('com.carrotstore.quickeye.musicbk',	'133',	'2.0',	'musicbk',	'quickeye'),
('com.carrotstore.quickeye.nextlevel',	'133',	'2.0',	'continue_game',	'quickeye'),
('com.kurotsmile.demcuu3d.buyads',	'122',	'3.0',	'remove_ads',	'sheep'),
('com.kurotsmile.demcuu3d.buymusic',	'122',	'3.0',	'musicbk',	'sheep'),
('com.kurotsmile.demcuu3d.buyheart',	'122',	'2.0',	'heart',	'sheep'),
('com.carrotstore.bible.removeads',	'128',	'4.0',	'remove_ads',	'bible'),
('com.carrot.runwithme.removeads',	'134',	'2.0',	'remove_ads',	'runwithme'),
('com.kurotsmile.loveornolove.ads',	'105',	'2.0',	'remove_ads',	'flower'),
('com.kurotsmile.loveornolove.buymusic',	'105',	'2.0',	'musicbk',	'flower'),
('com.carrotstore.jigsawwall.removeads',	'127',	'2.0',	'remove_ads',	'wall'),
('com.carrotstore.jigsawwall.allimg',	'127',	'5.0',	'all_img',	'wall'),
('com.carrotstore.jigsawwall.img',	'127',	'1.0',	'img',	'wall'),
('com.carrotstore.jigsawwall.musicbk',	'127',	'3.0',	'musicbk',	'wall'),
('com.carrotapp.musicforlife.removeads',	'123',	'3.0',	'remove_ads',	'music'),
('com.carrotapp.musicforlife.allfunc',	'123',	'12',	'all_function',	'music'),
('com.carrotapp.musicforlife.mp3',	'123',	'1.0',	'mp3',	'music'),
('com.carrotapp.musicforlife.allmp3',	'123',	'5.99',	'all_mp3',	'music');

-- 2021-07-30 11:02:17
