-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `action`;
CREATE TABLE `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txt` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `value` text NOT NULL,
  `mp3` text NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `txt` (`txt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `action`;
INSERT INTO `action` (`id`, `txt`, `type`, `value`, `mp3`) VALUES
(1,	'youtube',	'search',	'https://www.youtube.com/results?search_query={search}',	''),
(2,	'google',	'search',	'https://www.google.com/search?q={search}',	''),
(3,	'trang làm việc',	'web',	'http://carrotstore.com/work/',	'work.ogg'),
(4,	'soạn văn bản',	'app',	'c:/windows/system32/notepad.exe',	''),
(6,	'facebook',	'app',	'https://www.facebook.com/',	''),
(7,	'ổ cứng',	'app',	'c:/',	''),
(8,	'thực đơn',	'app',	'C:/runapp/start.vbs',	''),
(9,	'địa chỉ mạng',	'app',	'C:/runapp/ip.vbs',	'ip.ogg'),
(10,	'ip address',	'app',	'C:/runapp/ip.vbs',	'ip.ogg'),
(11,	'đóng',	'app',	'C:/runapp/close.vbs',	'close.ogg'),
(12,	'close',	'app',	'C:/runapp/close.vbs',	'close.ogg'),
(13,	'tìm kiếm',	'search',	'https://www.google.com/search?q={search}',	''),
(14,	'search',	'search',	'https://www.google.com/search?q={search}',	''),
(15,	'lập trình',	'app',	'C:\\Users\\trant\\AppData\\Local\\Programs\\Microsoft VS Code\\Code.exe',	''),
(16,	'tắt đi',	'app',	'C:/runapp/close.vbs',	'close.ogg'),
(17,	'tắt máy',	'app',	'C:\\runapp\\shutdow pc.vbs',	''),
(18,	'work',	'web',	'http://carrotstore.com/work/',	'work.ogg'),
(19,	'im lặng',	'app',	'C:\\runapp\\mute sound.vbs',	''),
(20,	'bật âm thanh',	'app',	'C:\\runapp\\mute sound.vbs',	''),
(21,	'bài hát khác',	'app',	'C:\\runapp\\music next.vbs',	''),
(22,	'next song',	'app',	'C:\\runapp\\music next.vbs',	''),
(23,	'tăng âm lượng',	'app',	'C:\\runapp\\vol down.vbs',	''),
(24,	'giảm âm lượng',	'app',	'C:\\runapp\\vol up.vbs',	''),
(25,	'mở nhạc',	'web',	'https://www.youtube.com/watch?v=zt-GmI3x-RE&list=RDzt-GmI3x-RE',	''),
(26,	'ẩn tất cả các cửa sổ',	'app',	'C:\\runapp\\hide all window.vbs',	''),
(27,	'shutdown pc',	'app',	'C:\\runapp\\shutdow pc.vbs',	''),
(28,	'sắp xếp các cửa sổ',	'app',	'C:\\runapp\\tile app window.vbs',	''),
(29,	'mở đa nhiệm',	'app',	'C:\\runapp\\WindowSwitcher.vbs',	''),
(30,	'cài đặt',	'app',	'C:\\runapp\\control panel.vbs',	''),
(31,	'xóa phần mềm',	'app',	'C:\\runapp\\uninstall.vbs',	''),
(32,	'gỡ phần mềm',	'app',	'C:\\runapp\\uninstall.vbs',	''),
(33,	'setting',	'app',	'C:\\runapp\\control panel.vbs',	''),
(34,	'tắt nhạc',	'app',	'C:\\runapp\\music pause.vbs',	''),
(35,	'play music',	'web',	'https://www.youtube.com/watch?v=zt-GmI3x-RE&list=RDzt-GmI3x-RE',	''),
(36,	'stop music',	'app',	'C:\\runapp\\music pause.vbs',	''),
(37,	'các phần mềm đang chạy',	'app',	'C:\\runapp\\task manager.vbs',	''),
(38,	'hiện tất cả các cửa sổ',	'app',	'C:\\runapp\\show all window.vbs',	''),
(39,	'làm trò chơi',	'app',	'C:\\Program Files\\Unity Hub\\Unity Hub.exe',	''),
(40,	'play',	'web',	'https://www.youtube.com/watch?v=zt-GmI3x-RE&list=RDzt-GmI3x-RE',	''),
(41,	'cancel',	'app',	'C:/runapp/close.vbs',	'close.ogg'),
(42,	'stop',	'app',	'C:\\runapp\\music pause.vbs',	''),
(43,	'open menu',	'app',	'C:/runapp/start.vbs',	''),
(44,	'open browser',	'app',	'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe',	''),
(45,	'open task manager',	'app',	'C:\\runapp\\open task manager.vbs',	''),
(46,	'what time',	'app',	'C:\\runapp\\what time.vbs',	''),
(47,	'hủy',	'app',	'C:/runapp/close.vbs',	'close.ogg'),
(48,	'thôi',	'app',	'C:/runapp/close.vbs',	'close.ogg'),
(56,	'mở trang facebook của anh',	'web',	'https://www.facebook.com/kurotsmile',	''),
(57,	'mấy giờ rồi',	'app',	'C:/runapp/what time.vbs',	''),
(58,	'wallpaper',	'app',	'C:/Users/trant/Desktop/nex background.vbs',	''),
(59,	'developer',	'app',	'C:/Users/trant/AppData/Local/Programs/Microsoft VS Code/Code.exe',	''),
(60,	'mở tường lửa',	'app',	'C:/runapp/open firewall.vbs',	''),
(61,	'game controller',	'web',	'C:/runapp/Game Controllers.vbs',	''),
(62,	'display',	'app',	'C:/runapp/display.vbs',	''),
(63,	'driver manager',	'app',	'C:/runapp/open device manager.vbs',	''),
(64,	'open mail',	'app',	'C:/runapp/open mail.vbs',	''),
(65,	'calculator',	'web',	'C:/runapp/calculator.vbs',	''),
(66,	'open camera',	'app',	'C:/runapp/camera.vbs',	''),
(67,	'open notepad',	'app',	'c:/windows/system32/notepad.exe',	'');

DROP TABLE IF EXISTS `audio`;
CREATE TABLE `audio` (
  `file` varchar(50) NOT NULL,
  PRIMARY KEY (`file`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `audio`;
INSERT INTO `audio` (`file`) VALUES
('1.ogg'),
('a0.ogg'),
('a1.ogg'),
('a2.ogg'),
('a3.ogg'),
('close.ogg'),
('ip.ogg'),
('work.ogg');

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `ip` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `log`;

DROP TABLE IF EXISTS `weather`;
CREATE TABLE `weather` (
  `data` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `weather`;
INSERT INTO `weather` (`data`, `date`) VALUES
('{\"coord\":{\"lon\":107.6,\"lat\":16.47},\"weather\":[{\"id\":500,\"main\":\"Rain\",\"description\":\"mưa nhẹ\",\"icon\":\"10d\"}],\"base\":\"stations\",\"main\":{\"temp\":299.15,\"feels_like\":301.11,\"temp_min\":299.15,\"temp_max\":299.15,\"pressure\":1009,\"humidity\":83},\"visibility\":10000,\"wind\":{\"speed\":4.6,\"deg\":290},\"rain\":{\"1h\":0.52},\"clouds\":{\"all\":75},\"dt\":1603087298,\"sys\":{\"type\":1,\"id\":9310,\"country\":\"VN\",\"sunrise\":1603060972,\"sunset\":1603103155},\"timezone\":25200,\"id\":1580240,\"name\":\"Huế\",\"cod\":200}',	'2020-10-19'),
('{\"coord\":{\"lon\":107.6,\"lat\":16.47},\"weather\":[{\"id\":803,\"main\":\"Clouds\",\"description\":\"mây cụm\",\"icon\":\"04n\"}],\"base\":\"stations\",\"main\":{\"temp\":297.15,\"feels_like\":300.32,\"temp_min\":297.15,\"temp_max\":297.15,\"pressure\":1011,\"humidity\":88},\"visibility\":10000,\"wind\":{\"speed\":2.1,\"deg\":300},\"clouds\":{\"all\":75},\"dt\":1603127186,\"sys\":{\"type\":1,\"id\":9310,\"country\":\"VN\",\"sunrise\":1603147388,\"sunset\":1603189518},\"timezone\":25200,\"id\":1580240,\"name\":\"Huế\",\"cod\":200}',	'2020-10-20');

-- 2020-10-20 01:34:26
