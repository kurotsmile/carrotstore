-- Adminer 4.8.0 MySQL 5.7.33 dump

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
(104,	'البحث عن جهات الاتصال'),
(105,	'حب او لا حب'),
(119,	'عاشق الظاهري 3D'),
(121,	'عاشق افتراضي 2'),
(122,	'عد الأغنام - اذهب إلى الفراش'),
(123,	'موسيقى لأجل الحياة'),
(127,	'جدار بانوراما'),
(128,	'عالم الكتاب المقدس'),
(130,	'AI عاشق'),
(131,	'مساعد الظاهري لطيف'),
(133,	'العين السريعة'),
(134,	'اركض معي'),
(135,	'حفظ الانترنت حاليا'),
(139,	'سيد الدودة'),
(138,	'رقم السحر'),
(136,	'إنشاء كلمة مرور'),
(120,	'عاشق الظاهري'),
(132,	'عشيقي');

-- 2021-03-10 08:24:00
