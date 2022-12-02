-- Adminer 4.8.1 MySQL 5.7.40 dump

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
('com.carrotstore.wormmaster.removeads',	'139',	'2.0',	'remove_adss',	'wormmaster'),
('com.carrotstore.wormmaster.musicbk',	'139',	'3.0',	'musicbk',	'wormmaster'),
('com.carrotstore.midipiano.buymidi',	'283',	'1.8',	'midi',	'midi'),
('com.carrotstore.midipiano.removeads',	'283',	'3.0',	'remove_adss',	'midi'),
('com.carrotstore.midipiano.buylist',	'283',	'5.0',	'buylistmidi',	'midi'),
('com.carrotstore.ailover.all',	'130',	'8.0',	'all_function',	'ailover'),
('com.kurotsmile.contactstore.removeads',	'104',	'2.0',	'remove_adss',	'contactstore'),
('com.carrotstore.numbermagic.removeads',	'138',	'2.0',	'remove_adss',	'numbermagic'),
('com.carrotstore.numbermagic.bkmusic',	'138',	'3.0',	'musicbk',	'numbermagic'),
('com.carrotstore.fishofprey.ads',	'284',	'2.0',	'remove_adss',	'fishofprey'),
('com.carrotstore.fishofprey.allfish',	'284',	'5.0',	'all_fish',	'fishofprey'),
('com.carrotstore.fishofprey.fish',	'284',	'1.2',	'fish',	'fishofprey'),
('com.carrotstore.quickeye.removeads',	'133',	'3.0',	'remove_adss',	'quickeye'),
('com.carrotstore.quickeye.musicbk',	'133',	'2.0',	'musicbk',	'quickeye'),
('com.carrotstore.quickeye.nextlevel',	'133',	'2.0',	'continue_game',	'quickeye'),
('com.kurotsmile.demcuu3d.buyads',	'122',	'3.0',	'remove_adss',	'sheep'),
('com.kurotsmile.demcuu3d.buymusic',	'122',	'3.0',	'musicbk',	'sheep'),
('com.kurotsmile.demcuu3d.buyheart',	'122',	'2.0',	'heart',	'sheep'),
('com.carrotstore.bible.removeads',	'128',	'4.0',	'remove_adss',	'bible'),
('com.carrot.runwithme.removeads',	'134',	'2.0',	'remove_adss',	'runwithme'),
('com.kurotsmile.loveornolove.ads',	'105',	'2.0',	'remove_adss',	'flower'),
('com.kurotsmile.loveornolove.buymusic',	'105',	'2.0',	'musicbk',	'flower'),
('com.carrotstore.jigsawwall.removeads',	'127',	'2.0',	'remove_adss',	'wall'),
('com.carrotstore.jigsawwall.allimg',	'127',	'5.0',	'all_img',	'wall'),
('com.carrotstore.jigsawwall.img',	'127',	'1.0',	'img',	'wall'),
('com.carrotstore.jigsawwall.musicbk',	'127',	'3.0',	'musicbk',	'wall'),
('com.carrotapp.musicforlife.removeads',	'123',	'3.0',	'remove_adss',	'music'),
('com.carrotapp.musicforlife.allfunc',	'123',	'12',	'all_function',	'music'),
('com.carrotapp.musicforlife.mp3',	'123',	'1.0',	'mp3',	'music'),
('com.carrotapp.musicforlife.allmp3',	'123',	'5.99',	'all_mp3',	'music'),
('com.carrotstore.ailover.ads',	'130',	'3.0',	'remove_adss',	'ailover'),
('com.carrotstore.ailover.allmp3',	'130',	'4.6',	'all_mp3',	'ailover'),
('com.carrotstore.ailover.fahsion',	'130',	'4.9',	'fahsion_character',	'ailover'),
('com.carrotstore.ailover.data',	'130',	'2.0',	'data_offline',	'ailover'),
('com.carrotstore.ailover.mp3',	'130',	'1.0',	'mp3',	'ailover'),
('com.carrotstore.ailover.head',	'130',	'2.0',	'head_character',	'ailover'),
('com.kurotsmile.mygirl.mp3',	'120',	'1.0',	'mp3',	''),
('com.kurotsmile.mygirl.removeads',	'120',	'4.0',	'remove_adss',	''),
('com.carrotstore.ailover.costumes',	'130',	'4.0',	'fahsion_character',	'ailover'),
('com.carrotstore.ailover.costumes',	'130',	'3.0',	'fahsion_character',	'ailover'),
('com.carrotstore.tablesoccer.removeads',	'285',	'2.0',	'remove_adss',	'tablesoccer'),
('com.carrotstore.tablesoccer.buyplayer',	'285',	'1.0',	'buyplayer_football',	'tablesoccer'),
('com.carrotstore.tablesoccer.buyallplayer',	'285',	'4.0',	'buyallplayer_football',	'tablesoccer'),
('com.carrotstore.ereadnow.removeads',	'648',	'3.0',	'remove_adss',	'ebook'),
('com.carrotstore.supercalculator.removeads',	'751',	'3.0',	'remove_adss',	'cal'),
('com.carrotstore.jsoneditor.removeads',	'753',	'3.0',	'remove_adss',	'json'),
('com.carrotstore.chemicalperiodic.removeads',	'752',	'3.0',	'remove_adss',	'periodic'),
('com.carrotstore.tomatochess.skin',	'754',	'1.0',	'fruit_item',	'tomatochess'),
('com.carrotstore.tomatochess.musicbk',	'754',	'2.0',	'musicbk',	'tomatochess'),
('com.carrotstore.tomatochess.removeads',	'754',	'3.0',	'remove_adss',	'tomatochess'),
('com.carrot.heroping.item',	'759',	'2',	'fish',	'heropig'),
('com.carrot.heroping.removeads',	'759',	'3.0',	'remove_adss',	'heropig'),
('com.carrot.heroping.coin',	'759',	'5.0',	'all_fish',	'heropig');

-- 2022-10-26 17:58:11
