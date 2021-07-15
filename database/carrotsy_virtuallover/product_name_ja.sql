-- Adminer 4.8.1 MySQL 5.7.34 dump

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
(138,	'ナンバーマジック'),
(282,	'私の仮想の恋人'),
(127,	'ジグソーウォール'),
(130,	'AIラバー'),
(132,	'私の恋人'),
(123,	'人生のための音楽'),
(104,	'連絡先を検索する'),
(120,	'バーチャル恋人'),
(119,	'仮想恋人3D'),
(134,	'私と一緒に走る'),
(122,	'羊を数える-寝る'),
(133,	'クイックアイ'),
(131,	'かわいい仮想アシスタント'),
(139,	'ワームマスター'),
(135,	'Webをオフラインで保存する'),
(136,	'パスワードを作成'),
(128,	'聖書の世界'),
(283,	'ミディピアノエディター'),
(284,	'獲物の魚'),
(121,	'仮想恋人2'),
(105,	'ラブオアノーラブ');

-- 2021-06-12 17:30:42
