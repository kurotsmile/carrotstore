-- Adminer 4.8.0 MySQL 5.5.5-10.4.17-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `lang_val`;
CREATE TABLE `lang_val` (
  `lang` varchar(2) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `lang_val`;
INSERT INTO `lang_val` (`lang`, `data`) VALUES
('vi',	'{\"setting\":\"Cài đặt\",\"remove_ads\":\"Gỡ quảng cáo\",\"remove_ads_tip\":\"Không hiển thị tất cả các loại quảng cáo trong ứng dụng\",\"buy_list_midi\":\"Sử dụng tất cả midi từ danh sách trực tuyến\",\"buy_list_midi_tip\":\"Sử dụng tất cả midi từ danh sách trực tuyến mà không cần phải mua midi trong tương lai\",\"list_midi_online\":\"Danh sách Midi trực tuyến\",\"memetronome\":\"Máy đánh nhịp\",\"memetronome_tip\":\"Mức độ đánh nhịp theo mỗi giây\",\"app_reset\":\"Làm mới ứng dụng\",\"app_reset_tip\":\"Xóa tất cả cài đặt đã lưu trữ và dữ liệu đã lưu trữ\",\"in_app_restore_tip\":\"Nếu bạn đã mua mặt hàng trước đó, chức năng sẽ được khôi phục\",\"in_app_restore\":\"Khôi phục các mặt hàng đã mua\",\"midi_editor\":\"Soạn thảo Midi\",\"midi_editor_inp\":\"Nhập tiêu đề của bài viết tại đây ...\",\"midi_speed\":\"Tốc độ chơi Midi\",\"search_midi_tip\":\"Bạn có thể Tìm kiếm bài hát midi trực tuyến, để tham sảo và sử dụng cho mục đích sáng tác\",\"in_app_list_success\":\"Cảm ơn bạn đã mua hàng, Bây giờ bạn có thể sử dụng tất cả các bài hát midi trong danh sách trực tuyến\",\"in_app_ads_success\":\"Cảm ơn bạn đã mua hàng, bây giờ ứng dụng sẽ không hiển thị quảng cáo\",\"in_app_midi_success\":\"Cảm ơn bạn đã mua hàng, bây giờ bạn có thể sử dụng MIDI\",\"midi_public\":\"Xuất bản Midi\",\"midi_public_success\":\"Cảm ơn bạn đã đóng góp bản thảo midi piano, Chúng tôi sẽ xem xét và phát hành ra thế giới trong thời gian nhanh nhất có thể.\",\"list_midi_your\":\"Danh sách Midi của bạn\"}'),
('en',	'{\"setting\":\"Setting\",\"remove_ads\":\"Remove ads\",\"remove_ads_tip\":\"Don\'t show all types of in-app ads\",\"buy_list_midi\":\"Use all midi from online list\",\"buy_list_midi_tip\":\"Use all midi from online listings without having to buy midi in the future\",\"list_midi_online\":\"Midi listings online\",\"memetronome\":\"Metronome\",\"memetronome_tip\":\"Beat rate per second\",\"app_reset\":\"Reset the application\",\"app_reset_tip\":\"Erase all stored settings and stored data\",\"in_app_restore_tip\":\"If you have purchased the item before, the functionality will be restored\",\"in_app_restore\":\"Restore purchased items\",\"midi_editor\":\"Midi drafting\",\"midi_editor_inp\":\"Enter the title of the post here ...\",\"midi_speed\":\"Midi play speed\",\"search_midi_tip\":\"You can Search for midi songs online, for reference and use for composition purposes\",\"in_app_list_success\":\"Thank you for your purchase, Now you can use all the midi songs in the online playlist\",\"in_app_ads_success\":\"Thank you for your purchase, now the app will not show ads\",\"in_app_midi_success\":\"Thank you for your purchase, now you can use MIDI\",\"midi_public\":\"Publishing Midi\",\"midi_public_success\":\"Thank you for contributing midi piano manuscripts, We will review and release to the world in the fastest time possible.\",\"list_midi_your\":\"Your Midi list\"}');

-- 2021-04-14 14:45:25
