-- Adminer 4.8.1 MySQL 5.5.5-10.4.24-MariaDB dump

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
('emoji'),
('emoji_tip'),
('sound_app'),
('sound_app_tip'),
('remind_app'),
('remind_app_tip'),
('remove_ads'),
('remove_ads_tip'),
('ads_remove_success'),
('event_name'),
('event_name_tip'),
('notice_at'),
('notice_at_tip'),
('hours'),
('minute'),
('morning'),
('noon'),
('afternoon'),
('night'),
('late_evening'),
('detailed_customization_tip'),
('detailed_customization'),
('note'),
('note_tip'),
('day_emoji_tip'),
('happy'),
('very_happy'),
('earn_money'),
('fear'),
('unhappy'),
('lonely'),
('sleep'),
('shock'),
('bored'),
('fun'),
('be_interested'),
('tired'),
('normal'),
('upset'),
('hungry'),
('angry'),
('regret'),
('sick'),
('day'),
('note_error'),
('appointment_schedule'),
('event_error'),
('delete_all_data_tip'),
('delete_all_data_question'),
('in_app_restore'),
('in_app_restore_tip'),
('event_delete_question'),
('list_note_month'),
('list_notice_month'),
('list_notice_all'),
('app_reminder_notice_tip'),
('event'),
('event_no'),
('photo_souvenir'),
('photo_souvenir_tip'),
('del_tip'),
('syn_title'),
('syn_tip'),
('syn_backup'),
('syn_backup_tip'),
('syn_recover'),
('syn_recover_tip'),
('syn_backup_success'),
('func_none');

-- 2022-11-19 06:47:42
