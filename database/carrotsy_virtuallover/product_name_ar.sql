-- Adminer 4.8.1 MySQL 5.7.34 dump

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
(138,	'رقم السحر'),
(282,	'حبيبي الافتراضي'),
(127,	'جدار بانوراما'),
(130,	'AI عاشق'),
(132,	'عشيقي'),
(123,	'موسيقى لأجل الحياة'),
(104,	'البحث عن جهات الاتصال'),
(120,	'عاشق الظاهري'),
(119,	'عاشق الظاهري 3D'),
(134,	'اركض معي'),
(122,	'عد الأغنام - اذهب إلى الفراش'),
(133,	'العين السريعة'),
(131,	'مساعد الظاهري لطيف'),
(139,	'سيد الدودة'),
(135,	'حفظ الانترنت حاليا'),
(136,	'إنشاء كلمة مرور'),
(128,	'عالم الكتاب المقدس'),
(283,	'محرر ميدي بيانو'),
(284,	'سمكة فريسة'),
(121,	'عاشق افتراضي 2'),
(105,	'حب او لا حب');

-- 2021-06-12 17:09:42
