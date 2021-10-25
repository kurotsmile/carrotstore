-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_video_da`;
CREATE TABLE `app_my_girl_video_da` (
  `id_chat` varchar(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_video_da`;
INSERT INTO `app_my_girl_video_da` (`id_chat`, `link`) VALUES
('86',	'https://www.youtube.com/watch?v=ri5_fzndMBg'),
('87',	'https://www.youtube.com/watch?v=ri5_fzndMBg'),
('88',	'https://www.youtube.com/watch?v=ri5_fzndMBg'),
('89',	'https://www.youtube.com/watch?v=_BnnPLvS1zU'),
('90',	'https://www.youtube.com/watch?v=YM9utl1Qe6A'),
('91',	'https://www.youtube.com/watch?v=mHxhooUNey0'),
('92',	'https://www.youtube.com/watch?v=YuuX6f3WhF0'),
('93',	'https://www.youtube.com/watch?v=dYwX8p34CiI');

-- 2021-10-18 21:20:57
