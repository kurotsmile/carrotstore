-- Adminer 4.8.1 MySQL 5.7.34 dump

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
('com.carrotstore.ailover.all',	'130',	'10.0',	'midi',	'');

-- 2021-07-11 15:54:34
