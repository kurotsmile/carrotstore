-- Adminer 4.8.1 MySQL 5.7.39 dump

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
('driving_history'),
('begin'),
('running_time'),
('fare'),
('distance'),
('price_per_km'),
('price_per_km_tip'),
('clear_historical_data'),
('clear_historical_data_tip'),
('remove_ads'),
('remove_ads_tip'),
('invoice_printing'),
('pause'),
('keep_running'),
('completed'),
('new_session'),
('ads_remove_success'),
('invoice_summary'),
('invoice_date'),
('kilometro'),
('total_amount'),
('currency_unit'),
('currency_unit_tip'),
('del'),
('edit'),
('driving_history_none'),
('quick_view'),
('km_price_add_success'),
('km_price_edit_success'),
('km_price_default'),
('km_price_add'),
('km_price_add_tip'),
('km_price_add_frm'),
('km_price_error'),
('km_promotional_price');

-- 2022-09-19 12:13:43
