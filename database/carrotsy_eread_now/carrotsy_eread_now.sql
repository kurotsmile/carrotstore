-- Adminer 4.8.1 MySQL 5.7.36 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `key` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `country`;
INSERT INTO `country` (`key`) VALUES
('vi'),
('en'),
('zh');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `lang_key`;
CREATE TABLE `lang_key` (
  `key` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `lang_key`;
INSERT INTO `lang_key` (`key`) VALUES
('danh_dau'),
('danh_dau_them'),
('danh_dau_xoa'),
('search_tip'),
('sound'),
('sound_tip'),
('tac_gia'),
('luot_xem'),
('ngay_dang'),
('ngay_sua'),
('delete_all_data_tip'),
('remove_ads'),
('remove_ads_tip'),
('restore_inapp'),
('restore_inapp_tip'),
('fb_name'),
('fb_tip'),
('fb_url'),
('tong_so_trang'),
('ebook_share'),
('ebook_more'),
('ebook_more_tip');

DROP TABLE IF EXISTS `lang_val`;
CREATE TABLE `lang_val` (
  `lang` varchar(2) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `lang_val`;
INSERT INTO `lang_val` (`lang`, `data`) VALUES
('vi',	'{\"danh_dau\":\"Đánh dấu\",\"danh_dau_them\":\"Đánh dấu trang để đọc lần sau thành công!\",\"danh_dau_xoa\":\"Xóa dấu trang thành công!\",\"search_tip\":\"Nhập tên bìa sách bạn muốn đọc\",\"sound\":\"Âm thanh\",\"sound_tip\":\"bật hoặc tắt các hiệu ứng âm thanh có trong ứng dụng\",\"tac_gia\":\"Tác giả\",\"luot_xem\":\"Lượt xem\",\"ngay_dang\":\"Ngày đăng\",\"ngay_sua\":\"Ngày sửa\",\"delete_all_data_tip\":\"Xóa tất cả dữ liệu của ứng dụng và trở về trạng thái cài đặt ban đầu\",\"remove_ads\":\"Gỡ bỏ quảng cáo\",\"remove_ads_tip\":\"Không có quảng cáo trong ứng dụng\",\"restore_inapp\":\"Khôi phục các mặt hàng đã mua\",\"restore_inapp_tip\":\"Khôi phục các chức năng và mặt hàng bạn đã mua trước đó\",\"fb_name\":\"Theo dõi trang facebook\",\"fb_tip\":\"Theo dõi trang facebook của chúng tôi để biết thêm nhiều thông tin\",\"fb_url\":\"https:\\/\\/www.facebook.com\\/Carrot-Store-Book-111666094660038\",\"tong_so_trang\":\"Tổng số trang\",\"ebook_share\":\"Chia sẻ sách này để mọi người cùng đọc\",\"ebook_more\":\"Nhận thêm sách\",\"ebook_more_tip\":\"Bấm vào đây để nhận thêm nhiều đầu sách\"}'),
('en',	'{\"danh_dau\":\"Bookmark\",\"danh_dau_them\":\"Bookmark the book to read next time successfully!\",\"danh_dau_xoa\":\"Delete Bookmark Successfully!\",\"search_tip\":\"Enter the title of the book cover you want to read\",\"sound\":\"Sound\",\"sound_tip\":\"Enable or disable sound effects included in the app\",\"tac_gia\":\"Author\",\"luot_xem\":\"View\",\"ngay_dang\":\"Date Submitted\",\"ngay_sua\":\"Correction date\",\"delete_all_data_tip\":\"Clear all app data and return to factory settings\",\"remove_ads\":\"Remove ads\",\"remove_ads_tip\":\"No ads in the app\",\"restore_inapp\":\"Restore purchased items\",\"restore_inapp_tip\":\"Restore functions and items you previously purchased\",\"fb_name\":\"Follow facebook page\",\"fb_tip\":\"Follow our facebook page for more information\",\"fb_url\":\"https:\\/\\/www.facebook.com\\/Carrot-Store-Book-111666094660038\",\"tong_so_trang\":\"total pages\",\"ebook_share\":\"Share this book so everyone can read it\",\"ebook_more\":\"Get more books\",\"ebook_more_tip\":\"Click here to get more titles\"}'),
('zh',	'{\"danh_dau\":\"書籤\",\"danh_dau_them\":\"收藏這本書，下次成功閱讀！\",\"danh_dau_xoa\":\"刪除書籤成功！\",\"search_tip\":\"輸入您要閱讀的書籍封面的標題\",\"sound\":\"声音\",\"sound_tip\":\"启用或禁用应用程序中包含的声音效果\",\"tac_gia\":\"作者\",\"luot_xem\":\"看法\",\"ngay_dang\":\"提交日期\",\"ngay_sua\":\"更正日期\",\"delete_all_data_tip\":\"清除所有应用数据并恢复出厂设置\",\"remove_ads\":\"移除广告\",\"remove_ads_tip\":\"应用中没有广告\",\"restore_inapp\":\"恢复购买的物品\",\"restore_inapp_tip\":\"恢复您之前购买的功能和项目\",\"fb_name\":\"关注脸书专页\",\"fb_tip\":\"关注我们的脸书页面以获取更多信息\",\"fb_url\":\"https:\\/\\/www.facebook.com\\/Carrot-Store-Book-111666094660038\",\"tong_so_trang\":\"总页数\",\"ebook_share\":\"分享这本书，让每个人都可以阅读\",\"ebook_more\":\"获取更多书籍\",\"ebook_more_tip\":\"单击此处获取更多标题\"}'),
('es',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}'),
('pt',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}'),
('fr',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}'),
('hi',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}'),
('ru',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}'),
('de',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}'),
('th',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}'),
('ko',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}'),
('ja',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}'),
('ar',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}'),
('tr',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}'),
('fi',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}'),
('it',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}'),
('id',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}'),
('da',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}'),
('nl',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}'),
('pl',	'{\"remove_ads_tip\":\"\",\"restore_inapp_tip\":\"\",\"restore_inapp\":\"\",\"fb_name\":\"\",\"fb_tip\":\"\"}');

-- 2021-12-08 04:02:33
