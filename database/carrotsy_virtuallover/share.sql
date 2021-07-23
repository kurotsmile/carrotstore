-- Adminer 4.8.1 MySQL 5.7.34 dump

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
  `url` varchar(200) NOT NULL,
  `order` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `share`;
INSERT INTO `share` (`id`, `icon_css`, `name`, `url`, `order`) VALUES
(4,	'fa-facebook-square',	'Facebook',	'https://www.facebook.com/sharer/sharer.php?u={url}',	0),
(5,	'fa-twitter-square',	'Twitter',	'https://twitter.com/intent/tweet?url={url}&text=Carrot store &via=carrotstore1&original_referer={url}',	1),
(6,	'fa-linkedin-square',	'LinkedIn',	'http://www.linkedin.com/shareArticle?mini=true&url={url}&title=Share',	3),
(7,	'fa-pinterest-square',	'Pinterest',	'http://pinterest.com/pin/create/button/?url={url}&description=Share',	2),
(8,	'fa-envelope-square',	'Email',	'mailto:?subject=I wanted you to see this site&amp;body=Check out this site {url}',	12),
(9,	'fa-envelope-o',	'Gmail',	'https://mail.google.com/mail/u/2/?hl=vi&view=cm&fs=1&tf=1&su=I wanted you to see this site&amp;body=Check out this site {url}',	13),
(12,	'fa-telegram',	'Telegram',	'https://t.me/share/url?url={url}',	14),
(13,	'fa-reddit-alien',	'Reddit',	'https://www.reddit.com/submit?url={url}',	4),
(14,	'fa-weibo',	'Weibo',	'https://service.weibo.com/share/share.php?url={url}',	5),
(15,	'fa-skype',	'Skype',	'https://web.skype.com/share?url={url}',	6),
(16,	'fa-tumblr-square',	'Tumblr',	'https://www.tumblr.com/widgets/share/tool?canonicalUrl={url}&title=Carrotstore&caption=carrotstore.com&tags=carrotstore',	7),
(17,	'fa-vk',	'Vk',	'http://vk.com/share.php?url={url}',	8),
(18,	'fa-xing-square',	'Xing',	'https://www.xing.com/spi/shares/new?url={url}',	9),
(19,	'fa-get-pocket',	'GetPocket',	'https://getpocket.com/edit?url={url}',	10),
(20,	'fa-bookmark',	'Google Book marks',	'https://www.google.com/bookmarks/mark?op=edit&bkmk={url}',	11);

-- 2021-07-19 11:37:34
