-- Adminer 4.8.1 MySQL 5.5.5-10.4.24-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `data_syn`;
CREATE TABLE `data_syn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `lang` varchar(2) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

TRUNCATE `data_syn`;
INSERT INTO `data_syn` (`id`, `user_id`, `data`, `lang`, `date`) VALUES
(8,	'b3ee82bafceb3b5fc20824146b44ff2a',	'{\"emoji\":[{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":0,\"id\":\"\"},{\"index\":17,\"id\":\"day_09_11_2022\"},{\"index\":9,\"id\":\"day_10_11_2022\"},{\"index\":9,\"id\":\"day_12_11_2022\"},{\"index\":12,\"id\":\"day_15_11_2022\"},{\"index\":12,\"id\":\"day_12_11_2022\"},{\"index\":8,\"id\":\"day_11_11_2022\"},{\"index\":10,\"id\":\"day_09_11_2022\"},{\"index\":7,\"id\":\"day_14_11_2022\"},{\"index\":11,\"id\":\"day_18_11_2022\"}],\"notice\":[{\"msg\":\"hihi\",\"date\":\"638041788000000000\"\"id\":\"day_16_11_2022_notice\"\"type_sel_time\":\"0\"},{\"msg\":\"sss\",\"date\":\"638042652000000000\"\"id\":\"day_17_11_2022_notice\"\"type_sel_time\":\"0\"},{\"msg\":\"hihi\",\"date\":\"638041788000000000\"\"id\":\"day_16_11_2022_notice\"\"type_sel_time\":\"0\"},{\"msg\":\"hihi\",\"date\":\"638041788000000000\"\"id\":\"day_16_11_2022_notice\"\"type_sel_time\":\"0\"},{\"msg\":\"sss\",\"date\":\"638042652000000000\"\"id\":\"day_17_11_2022_notice\"\"type_sel_time\":\"0\"},{\"msg\":\"hihi\",\"date\":\"638041788000000000\"\"id\":\"day_16_11_2022_notice\"\"type_sel_time\":\"0\"},{\"msg\":\"hihi\",\"date\":\"638041788000000000\"\"id\":\"day_16_11_2022_notice\"\"type_sel_time\":\"0\"},{\"msg\":\"sss\",\"date\":\"638042652000000000\"\"id\":\"day_17_11_2022_notice\"\"type_sel_time\":\"0\"},{\"msg\":\"hihi\",\"date\":\"638041788000000000\"\"id\":\"day_16_11_2022_notice\"\"type_sel_time\":\"0\"},{\"msg\":\"hihi\",\"date\":\"638041788000000000\"\"id\":\"day_16_11_2022_notice\"\"type_sel_time\":\"0\"},{\"msg\":\"sss\",\"date\":\"638042652000000000\"\"id\":\"day_17_11_2022_notice\"\"type_sel_time\":\"0\"},{\"msg\":\"hihi\",\"date\":\"638041788000000000\"\"id\":\"day_16_11_2022_notice\"\"type_sel_time\":\"0\"}]\"note\":[]}',	'vi',	'2022-11-18 10:21:11');

-- 2022-11-19 06:47:30
