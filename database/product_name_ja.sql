-- Adminer 4.8.0 MySQL 5.7.33 dump

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
(104,	'連絡先を検索する'),
(105,	'ラブオアノーラブ'),
(119,	'仮想恋人3D'),
(121,	'仮想恋人2'),
(122,	'羊を数える-寝る'),
(123,	'人生のための音楽'),
(127,	'ジグソーウォール'),
(128,	'聖書の世界'),
(130,	'AIラバー'),
(131,	'かわいい仮想アシスタント'),
(133,	'クイックアイ'),
(134,	'私と一緒に走る'),
(135,	'Webをオフラインで保存する'),
(139,	'ワームマスター'),
(138,	'ナンバーマジック'),
(136,	'パスワードを作成'),
(120,	'バーチャル恋人'),
(132,	'私の恋人');

-- 2021-03-10 08:20:58
