-- Adminer 4.8.0 MySQL 5.7.33 dump

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
(104,	'연락처 검색'),
(105,	'사랑 또는 사랑 없음'),
(119,	'가상 연인 3D'),
(121,	'가상 연인 2'),
(122,	'양 계산-침대로 이동'),
(123,	'인생을위한 음악'),
(127,	'퍼즐 벽'),
(128,	'성서 세계'),
(130,	'AI 애인'),
(131,	'귀여운 가상 조수'),
(133,	'빠른 눈'),
(134,	'나와 함께 실행'),
(135,	'웹을 오프라인으로 저장'),
(139,	'웜 마스터'),
(138,	'넘버 매직'),
(136,	'비밀번호 만들기'),
(120,	'가상 애호가'),
(132,	'내 사랑');

-- 2021-03-10 08:17:32
