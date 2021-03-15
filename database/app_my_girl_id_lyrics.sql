-- Adminer 4.8.0 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_my_girl_id_lyrics`;
CREATE TABLE `app_my_girl_id_lyrics` (
  `id_music` varchar(20) NOT NULL,
  `lyrics` text NOT NULL,
  `artist` text NOT NULL,
  `album` text NOT NULL,
  `year` tinytext NOT NULL,
  `genre` text NOT NULL,
  FULLTEXT KEY `lyrics` (`lyrics`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `app_my_girl_id_lyrics`;
INSERT INTO `app_my_girl_id_lyrics` (`id_music`, `lyrics`, `artist`, `album`, `year`, `genre`) VALUES
('88',	'Berat bebanku\r\nMeninggalkanmu\r\nSeparuh nafas jiwaku sirna\r\nBukan salahmu\r\nApa dayaku\r\nMungkin benar cinta sejati tak berpihak pada kita\r\nKasihku\r\nSampai disini kisah kita\r\nJangan tangisi keadaannya\r\nBukan karena kita berbeda\r\nDengarkan\r\nDengarkan lagu lagu ini\r\nMelodi rintihan hati ini\r\nKisah kita\r\nBerakhir di Januari\r\nSelamat tinggal kisah sejatiku\r\nWow pergilah\r\nKasihku\r\nSampai disini kisah kita\r\nJangan tangisi keadaannya\r\nBukan karena kita berbeda wow\r\nDengarkan lagu lagu ini\r\nMelodi rintihan hati ini\r\nKisah kita berakhir di januari (wow ye he oh)\r\nDengarkan lagu lagu ini\r\nMelodi rintihan hati ini\r\nKisah kita berakhir wow\r\nBerakhir\r\nBerakhir di januari (hu)\r\nBerakhir di januari',	'Glenn Fredly',	'Selamat Pagi, Dunia!',	'2019',	'Pop'),
('89',	'Sore hari menjelang kacamata hitam terpasang\r\nSenderan di balik dinding\r\nKetawa ketiwi\r\nBercengkerama sama teman empat sampai lima orang\r\nBahasan yang tak kunjung usai\r\nHappy happy\r\nKenapa bisa happy?\r\nKarena\r\nAlkohol\r\nKamu jahat tapi enak\r\nAlkohol\r\nBisa juga buat luka ringan\r\nAlkohol\r\nWalau jahat tetap enak\r\nAlkohol\r\nWalau pajakmu tinggi tetap menjadi solusi\r\nBercengkerama sama teman empat sampai lima orang\r\nBahasan tak kunjung usai\r\nHappy happy\r\nKenapa bisa happy?\r\nKarena\r\nAlkohol\r\nKamu jahat tapi enak\r\nAlkohol\r\nBisa juga buat luka ringan\r\nAlkohol\r\nWalau jahat tetap enak\r\nAlkohol\r\nWalau pajakmu tinggi\r\nWalau pajakmu tinggi\r\nAlkohol\r\nKamu jahat tapi enak\r\nAlkohol\r\nBisa juga buat luka ringan\r\nAlkohol\r\nWalau jahat tetap enak\r\nAlkohol\r\nWalau pajakmu tinggi\r\nWalau pajakmu tinggi\r\nWalau pajakmu tinggi tetap menjadi solusi',	'Sisitipsi',	'73%',	'2016',	'Jazz');

-- 2021-03-10 08:43:52
