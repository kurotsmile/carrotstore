-- Adminer 4.8.1 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `product_name_hi`;
CREATE TABLE `product_name_hi` (
  `id_product` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

TRUNCATE `product_name_hi`;
INSERT INTO `product_name_hi` (`id_product`, `data`) VALUES
(95,	'डेथ नोट - रयूक और रेम'),
(95,	'डेथ नोट - रयूक और रेम'),
(138,	'नंबर मैजिक'),
(282,	'मेरा आभासी प्रेमी'),
(127,	'आरा दीवार'),
(130,	'ऐ प्रेमी'),
(132,	'मेरा प्रेमी'),
(123,	'जीवन हेतु संगीत'),
(104,	'संपर्कों के लिए खोजें'),
(120,	'आभासी प्रेमी'),
(119,	'आभासी प्रेमी 3 डी'),
(134,	'मेरे साथ दोडो'),
(122,	'भेड़ गिनना - बिस्तर पर जाना'),
(133,	'शीघ्र आँख'),
(131,	'प्यारा आभासी सहायक'),
(139,	'कृमि मास्टर'),
(135,	'वेब ऑफ़लाइन सहेजें'),
(136,	'पासवर्ड बनाएं'),
(128,	'बाइबिल की दुनिया'),
(283,	'मिडी पियानो संपादक'),
(284,	'शिकार की मछली'),
(121,	'आभासी प्रेमी २'),
(105,	'प्यार या कोई प्यार नहीं');

-- 2021-06-12 17:19:53
