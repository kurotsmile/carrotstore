-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_ar`;
CREATE TABLE `product_name_ar` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_ar`;
INSERT INTO `product_name_ar` (`id_product`, `data`) VALUES
(95,	'مذكرة الموت - ريوك ورم'),
(95,	'مذكرة الموت - ريوك ورم'),
(119,	'عاشق الظاهري 3D'),
(135,	'حفظ الانترنت حاليا'),
(104,	'البحث عن جهات الاتصال'),
(128,	'عالم الكتاب المقدس'),
(282,	'حبيبي الافتراضي'),
(121,	'عاشق افتراضي 2'),
(122,	'عد الأغنام - اذهب إلى الفراش'),
(132,	'عشيقي'),
(138,	'رقم السحر'),
(133,	'العين السريعة'),
(127,	'جدار بانوراما'),
(284,	'سمكة فريسة'),
(139,	'سيد الدودة'),
(105,	'حب او لا حب'),
(134,	'اركض معي'),
(120,	'عاشق الظاهري'),
(283,	'محرر ميدي بيانو'),
(136,	'إنشاء كلمة مرور'),
(131,	'مساعد الظاهري لطيف'),
(285,	'طاولة كرة القدم'),
(123,	'موسيقى لأجل الحياة'),
(130,	'AI عاشق');

-- 2021-10-18 22:03:22
