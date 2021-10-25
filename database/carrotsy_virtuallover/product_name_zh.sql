-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_zh`;
CREATE TABLE `product_name_zh` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_zh`;
INSERT INTO `product_name_zh` (`id_product`, `data`) VALUES
(95,	'死亡笔记 -  Ryuk和Rem'),
(95,	'死亡笔记 -  Ryuk和Rem'),
(119,	'虚拟情人3D'),
(135,	'离线保存网络'),
(104,	'搜索联系人'),
(128,	'世界圣经'),
(282,	'我的虚拟情人'),
(121,	'虚拟情人'),
(122,	'数羊 - 上床睡觉'),
(132,	'我的爱人'),
(138,	'数字魔术'),
(133,	'快眼'),
(127,	'拼图墙'),
(284,	'猎物的鱼'),
(139,	'蠕虫大师'),
(105,	'爱或没爱'),
(134,	'跟我跑'),
(120,	'虚拟情人'),
(283,	'迷笛钢琴编辑器'),
(136,	'创建密码'),
(131,	'可爱的虚拟助手'),
(285,	'足球桌'),
(123,	'生命的音乐'),
(130,	'AI情人');

-- 2021-10-18 22:05:22
