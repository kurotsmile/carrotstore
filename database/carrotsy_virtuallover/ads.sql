-- Adminer 4.8.1 MySQL 5.7.36 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `id_ads` varchar(50) NOT NULL,
  `id_product` text NOT NULL,
  `id_product_main` int(3) NOT NULL,
  `tip_download` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

TRUNCATE `ads`;
INSERT INTO `ads` (`id_ads`, `id_product`, `id_product_main`, `tip_download`) VALUES
('music_page',	'[\"134\",\"120\",\"121\",\"130\",\"131\",\"132\"]',	123,	'download_app_music_tip'),
('quote_page',	'[\"120\",\"121\",\"130\",\"131\",\"132\"]',	105,	'download_app_quote_tip'),
('contact_page',	'[\"120\",\"121\",\"130\",\"131\",\"132\"]',	104,	'download_app_contact_tip'),
('link_page',	'[\"137\"]',	137,	'download_app_link_tip'),
('piano_page',	'[\"120\",\"121\",\"123\",\"130\",\"282\"]',	283,	'download_app_piano_tip');

-- 2021-11-29 07:03:33
