-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_ja`;
CREATE TABLE `product_name_ja` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_ja`;
INSERT INTO `product_name_ja` (`id_product`, `data`) VALUES
(95,	'デスノート-リュークとレム'),
(95,	'デスノート-リュークとレム'),
(119,	'仮想恋人3D'),
(135,	'Webをオフラインで保存する'),
(104,	'連絡先を検索する'),
(128,	'聖書の世界'),
(282,	'私の仮想の恋人'),
(121,	'仮想恋人2'),
(122,	'羊を数える-寝る'),
(132,	'私の恋人'),
(138,	'ナンバーマジック'),
(133,	'クイックアイ'),
(127,	'ジグソーウォール'),
(284,	'獲物の魚'),
(139,	'ワームマスター'),
(105,	'ラブオアノーラブ'),
(134,	'私と一緒に走る'),
(120,	'バーチャル恋人'),
(283,	'ミディピアノエディター'),
(136,	'パスワードを作成'),
(131,	'かわいい仮想アシスタント'),
(285,	'サッカーテーブル'),
(123,	'人生のための音楽'),
(130,	'AIラバー');

-- 2021-10-18 22:08:40
