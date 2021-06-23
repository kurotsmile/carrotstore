-- Adminer 4.8.1 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_ko`;
CREATE TABLE `product_name_ko` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_ko`;
INSERT INTO `product_name_ko` (`id_product`, `data`) VALUES
(95,	'데스 노트-류크와 렘'),
(95,	'데스 노트-류크와 렘'),
(138,	'넘버 매직'),
(282,	'내 가상 애인'),
(127,	'퍼즐 벽'),
(130,	'AI 애인'),
(132,	'내 사랑'),
(123,	'인생을위한 음악'),
(104,	'연락처 검색'),
(120,	'가상 애호가'),
(119,	'가상 연인 3D'),
(134,	'나와 함께 실행'),
(122,	'양 계산-침대로 이동'),
(133,	'빠른 눈'),
(131,	'귀여운 가상 조수'),
(139,	'웜 마스터'),
(135,	'웹을 오프라인으로 저장'),
(136,	'비밀번호 만들기'),
(128,	'성서 세계'),
(283,	'미디 피아노 편집자'),
(284,	'먹이의 물고기'),
(121,	'가상 연인 2'),
(105,	'사랑 또는 사랑 없음');

-- 2021-06-12 17:30:06
