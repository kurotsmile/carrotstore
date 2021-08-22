-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `work_user`;
CREATE TABLE `work_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_wage` varchar(500) NOT NULL,
  `user_pass` varchar(10) CHARACTER SET latin1 NOT NULL,
  `user_role` varchar(10) CHARACTER SET latin1 NOT NULL,
  `user_work_curent` text CHARACTER SET utf8mb4 NOT NULL,
  `payment` int(11) NOT NULL,
  `link_facebook` text CHARACTER SET latin1 NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(200) CHARACTER SET latin1 NOT NULL,
  `note` text NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `price_task` int(10) NOT NULL,
  `country_work` text NOT NULL,
  `policy_show` int(1) DEFAULT NULL,
  `time_login` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `work_user`;
INSERT INTO `work_user` (`user_id`, `user_name`, `user_wage`, `user_pass`, `user_role`, `user_work_curent`, `payment`, `link_facebook`, `email`, `phone`, `note`, `full_name`, `price_task`, `country_work`, `policy_show`, `time_login`) VALUES
(2,	'kurotsmile',	' ',	'28091993Ku',	'admin',	'',	1,	'https://www.facebook.com/kurotsmile',	'kurotsmile@gmail.comm',	'97865157711111111111111111',	'<ul><li><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">Sistemi işletmek, y&ouml;netmek, fikirleri uygulamak&nbsp;</font></font></li><li><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">Uygulamaların ve &ccedil;evrimi&ccedil;i mağazaların geliştirilmesi</font></font></li><li><font style=\"vertical-align: inherit;\"><strong><font style=\"vertical-align: inherit;\">Carrotstore.com&#39;un</font></strong><font style=\"vertical-align: inherit;\"> strateji rehberi, </font></font><strong><font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\">gezgin</font></font></strong></li></ul>',	'Trần Thiện Thanh',	800,	'[\"vi\",\"en\",\"es\",\"pt\",\"fr\",\"hi\",\"zh\",\"ru\",\"de\",\"th\",\"ko\",\"ja\",\"ar\",\"tr\",\"fi\",\"it\"]',	1,	'2021-08-13 11:33:42'),
(3,	'quang',	' ',	'005',	'editor',	'',	0,	'',	'',	'',	'<p>S&aacute;ng t&aacute;c nội dung</p>',	'Trần ngọc quang',	0,	'',	0,	'2021-07-20 21:29:54'),
(4,	'lieu',	' ',	'moonlight',	'editor',	'(task chính)\r\nXuất bản các dữ liệu dạy của người dùng:\r\n\r\nhttp://carrotstore.com/app_my_girl_handling.php?func=draft_brain\r\n\r\n\r\n(task phụ)\r\nThêm truyện cười ở link dưới vào câu trò chuyện (chat):\r\n\r\nhttp://www.truyencuoihay.vn/truyen-cuoi-ngan',	1,	'',	'giotuphuongxa9@gmail.com',	'0346339309',	'<ul><li>Kiểm duyệt nội dung v&agrave; xuất bản dữ liệu</li><li>Hỗ trợ vi&ecirc;n trực tuyến của hệ thống</li><li>Dịch thuật vi&ecirc;n cho c&aacute;c ứng dụng</li></ul>',	'Cao Thị Loan',	849,	'[\"vi\",\"en\",\"es\",\"pt\",\"fr\",\"zh\",\"ru\",\"de\",\"th\",\"ko\",\"ja\",\"ar\",\"tr\",\"fi\",\"it\"]',	1,	NULL),
(5,	'huy',	' ',	'moonlight',	'editor',	'(task phụ)\r\nthêm châm ngôn vào nước trung quốc (zh):\r\n\r\nhttps://chinese.com.vn/100-stt-tieng-trung-danh-ngon-tinh-yeu-tieng-trung-quoc-hay-nhat.html?fbclid=IwAR3m1tpcywAPhWghQt2WvcYF7IKjUVTTQkY2rhhklliaBYt3QS4epAW49NU\r\n',	1,	'',	'luongngochuy195@gmail.com',	'23753950604',	'<ul><li>Người s&aacute;ng tạo nội dung</li><li>Bi&ecirc;n tập vi&ecirc;n ph&aacute;t triển v&agrave; thu thập nội dung thứ cấp</li></ul>',	'Lương Ngọc Huy',	699,	'[\"vi\",\"en\",\"es\",\"pt\",\"fr\",\"zh\",\"ru\",\"de\",\"th\",\"ko\",\"ja\",\"ar\",\"tr\",\"fi\"]',	1,	NULL),
(6,	'uyenx',	' ',	'thienthanh',	'support',	'',	0,	'',	'phantranduyuyentth@gmail.com',	'0382918584',	'Vui vẻ,vui tính',	'Uyên Luyên Thuyên',	800,	'',	NULL,	NULL),
(7,	'thu',	'0',	'123thu',	'editor',	'',	0,	'',	'',	'',	'',	'',	1,	'[\"vi\",\"en\",\"es\",\"pt\",\"fr\",\"hi\",\"zh\",\"ru\",\"de\",\"th\",\"ko\",\"ja\",\"ar\",\"tr\",\"fi\",\"it\",\"id\",\"da\",\"nl\",\"pl\"]',	NULL,	NULL);

-- 2021-08-13 12:42:12
