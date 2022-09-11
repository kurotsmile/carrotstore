-- Adminer 4.8.1 MySQL 5.7.39 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `share`;
CREATE TABLE `share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon_css` varchar(30) NOT NULL,
  `name` varchar(60) NOT NULL,
  `order` int(3) NOT NULL,
  `web` text NOT NULL,
  `android` text NOT NULL,
  `window` text NOT NULL,
  `ios` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `share` (`id`, `icon_css`, `name`, `order`, `web`, `android`, `window`, `ios`) VALUES
(4,	'fa-facebook-square',	'Facebook',	0,	'https://www.facebook.com/sharer/sharer.php?u={url}',	'https://www.facebook.com/sharer/sharer.php?u={url}',	'https://www.facebook.com/sharer/sharer.php?u={url}',	''),
(5,	'fa-twitter-square',	'Twitter',	1,	'https://twitter.com/intent/tweet?url={url}&text=Carrot store &via=carrotstore1&original_referer={url}',	'twitter://post?message={url}',	'https://twitter.com/intent/tweet?url={url}&text=Carrot store &via=carrotstore1&original_referer={url}',	''),
(6,	'fa-linkedin-square',	'LinkedIn',	3,	'http://www.linkedin.com/shareArticle?mini=true&url={url}&title=Share',	'',	'http://www.linkedin.com/shareArticle?mini=true&url={url}&title=Share',	''),
(7,	'fa-pinterest-square',	'Pinterest',	2,	'http://pinterest.com/pin/create/button/?url={url}&description=Share',	'',	'http://pinterest.com/pin/create/button/?url={url}&description=Share',	''),
(8,	'fa-envelope-square',	'Email',	12,	'mailto:?subject=I wanted you to see this site&body=Check out this site {url}',	'mailto:mailsend@example.com?subject=Get now&body={url}',	'mailto:?subject=I wanted you to see this site&body=Check out this site {url}',	''),
(9,	'fa-envelope-o',	'Gmail',	13,	'https://mail.google.com/mail/u/2/?hl=vi&view=cm&fs=1&tf=1&su=I wanted you to see this site&body=Check out this site {url}',	'',	'https://mail.google.com/mail/u/2/?hl=vi&view=cm&fs=1&tf=1&su=I wanted you to see this site&body=Check out this site {url}',	''),
(12,	'fa-telegram',	'Telegram',	14,	'https://t.me/share/url?url={url}',	'https://telegram.me/share/url?url={url}',	'https://t.me/share/url?url={url}',	''),
(13,	'fa-reddit-alien',	'Reddit',	4,	'https://www.reddit.com/submit?url={url}',	'',	'https://www.reddit.com/submit?url={url}',	''),
(14,	'fa-weibo',	'Weibo',	5,	'https://service.weibo.com/share/share.php?url={url}',	'',	'https://service.weibo.com/share/share.php?url={url}',	''),
(15,	'fa-skype',	'Skype',	6,	'https://web.skype.com/share?url={url}',	'',	'https://web.skype.com/share?url={url}',	''),
(16,	'fa-tumblr-square',	'Tumblr',	7,	'https://www.tumblr.com/widgets/share/tool?canonicalUrl={url}&title=Carrotstore&caption=carrotstore.com&tags=carrotstore',	'tumblr:///link?url={url}',	'',	''),
(17,	'fa-vk',	'Vk',	8,	'http://vk.com/share.php?url={url}',	'',	'http://vk.com/share.php?url={url}',	''),
(18,	'fa-xing-square',	'Xing',	9,	'https://www.xing.com/spi/shares/new?url={url}',	'',	'https://www.xing.com/spi/shares/new?url={url}',	''),
(19,	'fa-get-pocket',	'GetPocket',	10,	'https://getpocket.com/edit?url={url}',	'',	'https://getpocket.com/edit?url={url}',	''),
(20,	'fa-bookmark',	'Google Book marks',	11,	'https://www.google.com/bookmarks/mark?op=edit&bkmk={url}',	'',	'https://www.google.com/bookmarks/mark?op=edit&bkmk={url}',	''),
(21,	'fa-commenting',	'sms',	0,	'',	'sms:0?body={url}',	'',	'');

-- 2022-08-20 02:42:21
