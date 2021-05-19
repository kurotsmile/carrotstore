-- Adminer 4.8.0 MySQL 5.5.5-10.4.17-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `key_lang`;
CREATE TABLE `key_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_key` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `key_lang`;
INSERT INTO `key_lang` (`id`, `name_key`) VALUES
(84,	'list_music_tip'),
(4,	'loading'),
(5,	'list_music'),
(6,	'close'),
(7,	'setting'),
(8,	'setting_audio'),
(9,	'remove_ads'),
(10,	'remove_ads_tip'),
(13,	'setting_reset'),
(14,	'setting_reset_tip'),
(15,	'buy_music'),
(16,	'buy_music_tip'),
(17,	'write'),
(18,	'icon_select'),
(19,	'icon_select_tip'),
(20,	'level'),
(21,	'content'),
(22,	'content_tip'),
(23,	'done'),
(24,	'function_save'),
(25,	'save_1'),
(26,	'save_2'),
(27,	'save_3'),
(86,	'setting_share_tip'),
(31,	'write_conten_error'),
(33,	'buy_failed'),
(34,	'buy_success'),
(35,	'setting_restore'),
(96,	'buy_music_bk_success'),
(39,	'setting_restore_tip'),
(40,	'app_other'),
(43,	'add_quocte_success'),
(94,	'history_list'),
(92,	'setting_sun_tip'),
(83,	'setting_audio_tip'),
(61,	'box_null'),
(88,	'sel_lang_tip'),
(87,	'setting_rate_tip'),
(69,	'flower_tip'),
(70,	'flower_like'),
(71,	'flower_dislike'),
(72,	'flower_comment'),
(73,	'flower_no_comment'),
(74,	'flower_comment_tip'),
(75,	'flower_save'),
(76,	'flower_save_success'),
(90,	'setting_sun'),
(91,	'setting_sun_tip'),
(81,	'box_offline');

-- 2021-05-14 19:09:17
