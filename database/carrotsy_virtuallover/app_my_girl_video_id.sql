-- Adminer 4.8.1 MySQL 5.7.39 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_video_id`;
CREATE TABLE `app_my_girl_video_id` (
  `id_chat` varchar(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `app_my_girl_video_id` (`id_chat`, `link`) VALUES
('88',	'https://www.youtube.com/watch?v=5avCpXsglPk'),
('89',	'https://www.youtube.com/watch?v=P9eCva8x3MI'),
('90',	'https://www.youtube.com/watch?v=81w3S-lmRnE'),
('91',	'https://www.youtube.com/watch?v=YVzv5pNh3F8'),
('92',	'https://www.youtube.com/watch?v=eiPye4MhCx0'),
('94',	'https://www.youtube.com/watch?v=0ru5Ox8f_vs'),
('95',	'https://www.youtube.com/watch?v=OYdQBiGrdfo');

-- 2022-08-20 03:01:51
