-- Adminer 4.8.0 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cr_framework_lang_key`;
CREATE TABLE `cr_framework_lang_key` (
  `key` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `cr_framework_lang_key`;
INSERT INTO `cr_framework_lang_key` (`key`) VALUES
('login'),
('register'),
('login_tip'),
('register_tip'),
('done'),
('cancel'),
('inp_username'),
('inp_password'),
('inp_tip'),
('forgot_password'),
('forgot_password_tip'),
('share'),
('share_tip'),
('rate'),
('rate_tip'),
('rate_yes'),
('rate_no'),
('acc_info'),
('logout'),
('logout_tip'),
('acc_edit'),
('acc_edit_tip'),
('acc_change_pass'),
('acc_change_pass_tip'),
('list_app_carrot'),
('sel_lang_app'),
('done_tip'),
('inp_pass_current'),
('inp_pass_new'),
('inp_pass_rep_new'),
('user_name'),
('user_phone'),
('user_email'),
('user_sex'),
('user_password'),
('user_rep_password'),
('user_sex_boy'),
('user_sex_girl'),
('user_address'),
('user_info_status'),
('user_info_status_yes'),
('user_info_status_no'),
('user_link'),
('user_date_start'),
('user_date_cur'),
('user_avatar'),
('error_username'),
('error_password_login'),
('error_inp_lost_pass'),
('pass_acc_msg'),
('pass_acc_no'),
('acc_no'),
('error_name'),
('error_phone'),
('acc_edit_success'),
('acc_edit_fail'),
('error_password'),
('error_rep_password'),
('error_password_new'),
('error_password_new_2'),
('error_password_curent'),
('change_pass_success'),
('change_pass_fail'),
('register_fail'),
('register_success'),
('shop'),
('shop_buy_fail'),
('shop_restore_success'),
('shop_restore_fail'),
('search'),
('exit_msg'),
('exit_app_other'),
('delete_all_data'),
('delete_all_data_success');

-- 2021-05-11 15:00:29