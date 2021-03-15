-- Adminer 4.8.0 MySQL 5.7.33 dump

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
(104,	'搜索联系人'),
(105,	'爱或没爱'),
(119,	'虚拟情人3D'),
(121,	'虚拟情人'),
(122,	'数羊 - 上床睡觉'),
(123,	'生命的音乐'),
(127,	'拼图墙'),
(128,	'世界圣经'),
(130,	'AI情人'),
(131,	'可爱的虚拟助手'),
(133,	'快眼'),
(134,	'跟我跑'),
(135,	'离线保存网络'),
(139,	'蠕虫大师'),
(138,	'数字魔术'),
(136,	'创建密码'),
(120,	'虚拟情人'),
(132,	'我的爱人');

-- 2021-03-10 07:42:03
