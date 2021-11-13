-- Adminer 4.8.1 MySQL 5.7.36 dump

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
(123,	'生命的音乐'),
(130,	'AI情人'),
(135,	'离线保存网络'),
(368,	'关键提问'),
(391,	'德国的细节'),
(456,	'即兴演讲：掌握人生关键时刻'),
(285,	'足球桌'),
(471,	'天才时代'),
(478,	'深度思考：不断逼近问题的本质'),
(483,	'失去名字的女孩'),
(491,	'遇见莫扎特'),
(531,	'社会心理学');

-- 2021-11-10 01:15:48
