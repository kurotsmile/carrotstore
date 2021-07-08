-- Adminer 4.8.1 MySQL 5.5.5-10.4.17-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `lang_key`;
CREATE TABLE `lang_key` (
  `key` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `lang_key`;
INSERT INTO `lang_key` (`key`) VALUES
('setting'),
('remove_ads'),
('remove_ads_tip'),
('buy_list_midi'),
('buy_list_midi_tip'),
('list_midi_online'),
('memetronome'),
('memetronome_tip'),
('app_reset'),
('app_reset_tip'),
('in_app_restore_tip'),
('in_app_restore'),
('midi_editor'),
('midi_editor_inp'),
('midi_speed'),
('search_midi_tip'),
('in_app_list_success'),
('in_app_ads_success'),
('in_app_midi_success'),
('midi_public'),
('midi_public_success'),
('list_midi_your'),
('list_midi_your_tip'),
('list_midi_your_public'),
('share_your_midi_tip'),
('delete_success'),
('none_midi_save'),
('none_midi_public'),
('none_midi_search'),
('export_file_midi_success'),
('midi_category');

-- 2021-07-08 07:41:37
