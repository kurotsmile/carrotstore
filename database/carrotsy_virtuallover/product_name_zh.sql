-- Adminer 4.8.1 MySQL 5.7.34 dump

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
(138,	'数字魔术'),
(282,	'我的虚拟情人'),
(127,	'拼图墙'),
(130,	'AI情人'),
(132,	'我的爱人'),
(123,	'生命的音乐'),
(104,	'搜索联系人'),
(120,	'虚拟情人'),
(119,	'虚拟情人3D'),
(134,	'跟我跑'),
(122,	'数羊 - 上床睡觉'),
(133,	'快眼'),
(131,	'可爱的虚拟助手'),
(139,	'蠕虫大师'),
(135,	'离线保存网络'),
(136,	'创建密码'),
(128,	'世界圣经'),
(283,	'迷笛钢琴编辑器'),
(284,	'猎物的鱼'),
(121,	'虚拟情人'),
(105,	'爱或没爱');

-- 2021-06-12 17:20:24
