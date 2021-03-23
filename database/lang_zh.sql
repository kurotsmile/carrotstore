-- Adminer 4.8.0 MySQL 5.5.5-10.4.17-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lang_zh`;
CREATE TABLE `lang_zh` (
  `key` varchar(50) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `lang_zh`;
INSERT INTO `lang_zh` (`key`, `value`) VALUES
('mua_sp',	'制品'),
('tip_search',	'您想要寻找什么？'),
('download_on',	'下载此应用程序'),
('luu_tru_lien_he',	'联系商店'),
('sp',	'产品'),
('tat_ca',	'所有'),
('gioi_thieu',	'介绍'),
('tai_khoan',	'帐户'),
('chi_tiet',	'查看详细信息'),
('mobile_application',	'移动应用'),
('dia_chi',	'地址'),
('ds_thanh_vien',	'用户列表'),
('goi_dien',	'电话'),
('dang_xu_ly',	'等待进步'),
('dang_lay_du_lieu',	'正在加载数据'),
('loai',	'分类'),
('dang_nhap_tip',	'用户名'),
('mat_khau',	'密码'),
('dang_nhap',	'登录'),
('dang_ky',	'注册'),
('them_vao_gio_hang',	'添加到购物车'),
('document',	'文件'),
('dk_tai_khoan',	'注册一个帐户'),
('tong_quan',	'概观'),
('quoc_gia',	'国家'),
('loi',	'错误'),
('loi_dang_nhap',	'登录失败，请检查您的登录信息'),
('da_them_gio_hang',	'加入购物车成功！'),
('app_online',	'网站申请'),
('tong_gia',	'总价'),
('Ten_dang_nhap',	'用户名'),
('Nhap_lai_mat_khau',	'再次确认密码'),
('chu_thich',	'注释'),
('so_dien_thoai',	'电话号码'),
('ten_day_du',	'全名'),
('click_de_xem',	'点击查看'),
('danh_gia',	'评估'),
('tinh_trang_tai_khoan',	'帐户状态'),
('khong_co_binh_luan',	'没有意见！'),
('sp_tuong_tu',	'同类产品'),
('so_nguoi_da_danh_gia',	'评分的人数'),
('luot_xem',	'视图'),
('ngay_dang',	'发布日期'),
('ngay_sua',	'编辑日期'),
('gia',	'价钱'),
('nhap_binh_luan',	'在这里输入您的评论！'),
('dang_binh_luan',	'发表评论'),
('moi_nhat',	'最新'),
('cu_nhat',	'最老的'),
('pho_bien_nhat',	'最受欢迎'),
('tra_loi',	'答复'),
('am_nhac_cho_cuoc_song',	'生命的音乐'),
('choi_nhac',	'播放音乐'),
('loi_bai_hat',	'歌词'),
('chua_co_loi_bai_hat',	'还没有歌词'),
('music_top_month',	'本月最具互动性'),
('music_top_0',	'快乐'),
('music_top_1',	'伤心'),
('music_top_2',	'放松'),
('music_top_3',	'兴奋'),
('music_no_rank',	'尚无评级'),
('xem_video',	'观看相关视频'),
('download_app_music_tip',	'在ch play应用程序商店和应用程序商店下载这些应用程序，以收听精彩音乐！'),
('chia_se',	'分享'),
('dang_gia_music_tip',	'评估你对这首歌的感受，这将有助于歌曲增加其收视率并增加系统的受欢迎程度。'),
('ung_ho',	'捐款'),
('ung_ho_tip',	'筹集资金'),
('music_same',	'其他歌曲'),
('chu_thich_ung_ho',	'请贡献一小部分费用，以便我们维护服务器并构建许多其他有趣的小工具。 非常感谢'),
('lien_he_cung_ten',	'同名的联系人'),
('lien_he_lien_quan',	'相关联系人'),
('download_app_contact_tip',	'下载这些应用程序，以便您可以与人联系并使用其他实用程序！'),
('gu_am_nhac',	'音乐品味'),
('gioi_tinh',	'性别'),
('sex_0',	'男'),
('sex_1',	'女'),
('date_start',	'登记日期'),
('date_cur',	'上次互动日期'),
('chinh_sach',	'隐私政策'),
('no_product',	'产品不存在'),
('chinh_sach_tip',	'关于确保个人信息，关系和服务提供者稳定性原则所产生的权利和责任的一般规定。 通过使用，发布信息，用户同意这些协议：'),
('thanh_cong',	'成功'),
('cam_on_da_danh_gia',	'谢谢你的评论！ 您的评论对我们非常重要。'),
('tip_star5',	'卓越'),
('tip_star4',	'非常好'),
('tip_star3',	'良好'),
('tip_star2',	'普通'),
('tip_star1',	'太糟糕了'),
('trich_dan',	'引用'),
('doc_cham_ngon',	'阅读引文'),
('download_app_quote_tip',	'在ch play app store和appstore上下载这些应用程序，以阅读好的报价并使用许多其他娱乐实用程序。'),
('download_song',	'下载这首歌'),
('khong_co_du_lieu',	'没有数据'),
('tai_thanh_cong_tip',	'请点击上面显示的类似按钮，像我们在Facebook上的页面一样继续从系统下载免费音乐！ 非常感谢！'),
('danh_gia_done',	'感谢您让您的系统知道您在听这首歌时的感受！'),
('not_music',	'这首歌不存在！'),
('back_list_music',	'返回音乐列表'),
('not_account',	'帐户不存在！'),
('back_list_account',	'返回帐户列表'),
('lien_he',	'联系和支持'),
('lien_he_tip',	'如果您有任何疑问，请通过以下地址和电子邮件联系管理员获取建议和解答。'),
('policy_1',	'系统将与电话号码，电子邮件，社交网络链接（Skype，id，facebook，twitter，Linkedin），性别，地址等人分享您的联系信息。 （用户可以自定义不在任何系统应用程序中共享其信息）'),
('policy_2',	'管理员有权在报告相关异常时删除不正确的联系人或违反其他人的联系内容。'),
('no_product_tip',	'该产品已被删除，在carrotstore.com上不受支持'),
('home_url',	'显示产品的主页'),
('login_account_tip',	'输入您的电话号码以登录系统'),
('sel_account_login',	'选择您用于登录的其中一个帐户'),
('back',	'背部'),
('dang_xuat',	'退出'),
('inp_phone_tip',	'输入你的电话号码'),
('no_account_error',	'该帐户的电话号码在系统中不存在，或在此国家/地区不可用！'),
('login_app',	'用于登录的应用程序'),
('login_account_timer',	'登录时间限制'),
('login_account_scan_qr_tip',	'使用系统中的应用程序，然后打开条形码扫描进行登录'),
('login_account_succes',	'登录成功！'),
('an_danh',	'匿名'),
('pay_method',	'选择付款方式'),
('pay_account',	'客户信息'),
('pay_title',	'采购'),
('pay_tip_done',	'购买成功后，该项目将自动用于您的应用程序！'),
('pay_success',	'付款成功。 您可以使用该产品'),
('pay_fail',	'支付失败！ 再试一次'),
('pay_sp_obj_nude_name',	'脱掉角色的衣服'),
('no_page',	'该页面不存在'),
('mobile_game',	'游戏'),
('quote_more',	'也许您会喜欢下面的其他格言'),
('share_tip',	'如果感觉良好，请分享'),
('history_delete',	'清除历史记录'),
('dong_gop_loi_nhac',	'贡献歌词'),
('dong_gop_loi_nhac_tip',	'请贡献您的文字以完全完成这首歌的功能'),
('add_lyrics_send',	'提交歌词'),
('add_lyrics_error',	'歌词内容不能为空'),
('add_lyrics_success',	'发送成功的歌词！感谢您提供歌词，我们将尽快审查并发布此歌词'),
('dang_nhap_tai_khoan_khac',	'用其他帐号登录'),
('rut_gon_link',	'缩短链接'),
('adblock_title',	'您不得在我们的网站上使用广告拦截插件'),
('adblock_msg',	'请禁用广告拦截功能以充分利用系统的功能，这有助于CarrotStore开发人员的努力得到认可。'),
('shorten_link_inp',	'在此处粘贴您的链接！'),
('shorten_link_btn',	'创建缩短的链接'),
('shorten_link_tip_1',	'登录到您的帐户以管理和查看您创建的短链接的效果'),
('shorten_link_tip_2',	'已创建了一个缩短的{num_link}链接，并且该性能将随着时间的推移而提高，从而证明了该应用程序的效率和潜力。'),
('shorten_link_tip_3',	'该应用程序已部署在所有平台上，例如网络，电话。 您可以在移动应用商店中下载并使用它'),
('shorten_link_list',	'链接列表已创建'),
('shorten_link_my_list',	'我缩短的链接列表'),
('link_full',	'完整连结'),
('shorten_link_create',	'链接已缩短'),
('shorten_link_create',	'链接已缩短'),
('shorten_link_detail',	'缩短的链接详细信息'),
('shorten_link_home',	'缩短链接的首页'),
('shorten_link_error',	'链接格式不正确（例如http://www.carrotstore.com）'),
('link_nguoi_tao',	'创作者'),
('shorten_link_status',	'状态已共享'),
('shorten_link_status_0',	'与大家分享'),
('shorten_link_status_1',	'只有我'),
('shorten_link_return',	'链接缩短结果'),
('copy',	'复制'),
('save_img',	'保存图片'),
('back',	'背部'),
('help_off_block_ads',	'引导广告屏蔽插件'),
('help_off_block_ads_tip',	'请按照下图描述的步骤禁用广告拦截插件'),
('help_off_block_ads_step_1',	'<b>第1步：</ b>单击浏览器工具栏名称中的屏蔽广告图标<br>'),
('help_off_block_ads_step_2',	'<b>步骤2：</ b>从出现的列表中选择<b>在此站点上暂停</ b> <br>'),
('help_off_block_ads_step_3',	'<b>步骤3：</ b>刷新浏览器（或按<b> F5 </ b>键）以完成网页显示<br>'),
('hoan_tat',	'已完成'),
('message_tip',	'嗨！我们该怎样帮助你？'),
('account_update_phone',	'更新电话号码'),
('account_update_phone_tip',	'您需要输入电话号码才能充分使用系统中的功能'),
('account_update_phone_success',	'成功更新电话号码！'),
('account_update_phone_error',	'电话号码格式不正确！'),
('song_artist',	'艺术家快车'),
('song_genre',	'类型'),
('song_year',	'发行年份'),
('song_album',	'专辑'),
('chinh_sua_thong_tin',	'编辑信息'),
('user_status',	'状态已共享'),
('user_status_0',	'与所有人共享信息'),
('user_status_1',	'不分享信息'),
('dang_nhap_mxh',	'使用您的社交帐户登录'),
('dang_nhap_carrot',	'使用您的CARROT帐户登录'),
('dang_nhap_carrot_tip',	'输入电话号码或电子邮件和密码进行登录'),
('dang_ky_carrot_tip',	'完成以下字段中的信息以注册您的CARROT帐户'),
('loi_ten',	'全名不能为空且不能超过5个字符'),
('loi_tai_khoan_da_ton_tai',	'账户已存在'),
('loi_mat_khau',	'密码不能为空且不得超过6个字符'),
('avatar',	'头像'),
('password_tip',	'创建密码以帮助您使用电话号码登录到CARROT帐户'),
('download_vcf',	'下载Vcard（.vcf）'),
('tong_quan_tip',	'显示用户的完整信息'),
('sao_luu_danh_ba',	'备用联系人'),
('backup_contact_tip',	'管理您的联系人备份'),
('account_setting_tip',	'编辑并完全更新您的信息以使用系统的全部功能'),
('delete',	'删除'),
('backup_contact_title',	'数据的备份联系人列表'),
('backup_contact_title_tip',	'您有{num_bk}备份创建的联系人'),
('shorten_link_list_tip',	'管理您创建的短链接列表'),
('backup_contact_none',	'您尚未创建备份，请使用此应用备份您的联系人'),
('song_add_playlist',	'将歌曲添加到您的播放列表'),
('my_playlist',	'我的播放清单'),
('add_song_to_playlist',	'将歌曲添加到此播放列表'),
('my_playlist_tip',	'再次聆听您存储在音乐播放列表中的歌曲'),
('create_playlist',	'建立新的播放清单'),
('create_playlist_tip',	'输入您要创建的列表的名称， 当前歌曲将被添加到此播放列表'),
('error_name_playlist_null',	'播放列表名称不能为空'),
('delete_song_success',	'成功删除歌曲'),
('edit',	'编辑'),
('my_playlist_rename_tip',	'输入此播放列表的新名称'),
('update_playlist',	'更新播放列表'),
('delete_tip',	'您确定要删除此项目，此操作将无法恢复吗？'),
('box_yes',	'是的，我敢肯定！'),
('box_no',	'不，取消！'),
('thanks',	'谢谢，'),
('kr_player_help',	'Carrot 音乐播放器快捷方式'),
('kr_help_back',	'返回上一首歌'),
('kr_help_space',	'暂停/恢复歌曲'),
('kr_help_next',	'播放下一首歌'),
('kr_help_mute',	'打开/关闭声音'),
('quen_mat_khau',	'忘记密码'),
('quen_mat_khau_tip',	'请输入您的电子邮件地址以找回忘记的密码'),
('quen_mat_khau_success',	'您的密码已通过电子邮件发送。 请检查您的电子邮件以获取信息'),
('error_email',	'电子邮件格式不正确'),
('quen_mat_khau_fail',	'该电子邮件地址在系统中不存在'),
('jailbreak_ios',	'链接为越狱的Apple设备安装应用程序'),
('jailbreak_1',	'当您使用Apple设备访问时，此链接仅适用于Safari浏览器'),
('jailbreak_2',	'此.ipa文件只能安装在越狱的Apple设备上，您可以通过单击此子链接直接下载（单击此处下载）'),
('jailbreak_3',	'您可以在以下链接中了解如何越狱（点击此处查看）'),
('development_team',	'开发团队'),
('dark_mode',	'打开/关闭明暗模式'),
('dark_mode_0',	'暗模式将帮助您提高设备的电池容量并以黑白两种主要颜色保护您的眼睛健康，适合您在夜间阅读内容。'),
('dark_mode_1',	'明亮模式将使页面外观以默认颜色显示，并带有明亮的色调'),
('buy_code',	'购买游戏源代码'),
('buy_code_tip',	'您可以购买该游戏的源代码以继续根据自己的想法进行开发，或者提供参考，学习，学习和创建游戏'),
('download_code',	'下载源代码'),
('download_game',	'下载游戏（PC）'),
('download_link',	'下载链接列表'),
('nha_phat_trien',	'开发者'),
('purchase_orders',	'订单'),
('no_return_search',	'以上关键字无结果'),
('ngon_ngu_hien_thi',	'选择国家和语言'),
('field_login',	'电子邮件或电话号码'),
('gioi_thieu_tip',	'Carrotstore.com 是一个存档，为世界各地的人们介绍娱乐应用程序和附加工具。 当您使用其中一个系统时，您拥有一个帐户，可以通过移动设备识别每个人。'),
('account_report',	'报告此帐户的滥用情况'),
('account_report_success',	'感谢您报告此帐户的问题，我们将尝试尽快对其进行修复。'),
('account_report_1',	'帐户包含色情内容，色情图片'),
('account_report_2',	'冒充帐户'),
('account_report_3',	'其他问题'),
('account_report_3_tip',	'请在此处输入错误帐户的详细说明'),
('warning',	'警告'),
('account_view_yes',	'我想继续查看此帐户'),
('account_view_no',	'我不想看到这个帐户'),
('account_view_18',	'您要查看的帐户可能包含成人内容'),
('download_app_piano_tip',	'始终使用下面的应用程序进行游戏和学习，以激发您的激情'),
('hoc_dan_piano',	'钢琴'),
('tac_gia',	'作者'),
('cap_do',	'等级'),
('toc_do_nhip',	'节拍速度'),
('so_not_nhac',	'音符数'),
('ten_bai_hat',	'曲目名称'),
('level_de',	'简单'),
('level_trung_binh',	'普通的'),
('level_kho',	'难的'),
('level_sieu_kho',	'超级难'),
('midi_info',	'信息Midi钢琴作品'),
('setting_piano',	'钢琴设定'),
('setting_piano_key_pc',	'显示电脑键盘标签'),
('setting_piano_key_name',	'显示音符名称'),
('midi_show_pc_key',	'将Midi音乐频谱编码为计算机键盘'),
('tao_moi_midi',	'在线创建Midi'),
('midi_add_line',	'新增行'),
('midi_add_column',	'添加栏'),
('midi_del_row',	'删除一行'),
('midi_del_col',	'删除栏'),
('midi_empty',	'清空MIDI'),
('midi_form_pc',	'从PC文本创建midi'),
('midi_add_line_tip',	'添加新行以创建不同的演奏流，例如指板和弦，同时演奏时最多只能创建10条对应于10个手指的行。'),
('midi_add_column_tip',	'添加一个空列以在给定的时间相对于演奏者的节拍速度在和弦之间创建一个时间间隔，或者创建一个草稿栏，以便您以后可以插入品格。'),
('midi_del_row_tip',	'删除一行，同时删除所选行中的所有midi音符'),
('midi_del_col_tip',	'删除一列意味着删除所选列中的Midi音符'),
('midi_empty_tip',	'清空便笺，当尚未记录便会将其恢复为原始状态'),
('midi_form_pc_tip',	'输入计算机文本以创建相应的Midi'),
('midi_help',	'MIDI编辑器手册'),
('midi_help_tip',	'借助钢琴仿真器和Midi编辑器，您可以轻松创建自己的音乐或为您的系统贡献您现有的作品，如果您是初学者我们的Midi创作者，请花几分钟阅读以下手册，以轻松使用此功能的全部功能 工具。'),
('midi_use',	'基本用途'),
('midi_use1',	'按下计算机键盘上与每个钢琴键上的符号标记相对应的键，以记录在midi编辑器中添加音符的动作。'),
('midi_use2',	'要编辑一个Midi音符，只需单击Midi音符，然后按另一个键来替换选定的Midi。'),
('midi_use3',	'通过单击Midi工具栏中的添加线按钮为轨道创建和弦。 然后，您将创建一个附加线程来记录新笔记'),
('midi_use4',	'Midi编辑器工具栏包括：'),
('midi_publish_success',	'成功发布您的钢琴Midi初稿后，我们将尽快批准并发布此初稿。 谢谢您的创造性贡献'),
('midi_publish',	'发布'),
('midi_erro_no_name',	'该杰作无法出版！ 因为您尚未命名您的Midi产品'),
('midi_erro_no_data',	'尚无MIDI数据，请在发布前创建内容'),
('midi_export',	'导出Midi文件（.mid）'),
('midi_export_success',	'成功导出Midi（.mid）文件！'),
('midi_export_tip',	'从Midi创建中间文件以在计算机或移动设备上欣赏或收听'),
('midi_publish_tip',	'将您的作品发布给全世界，让每个人都可以欣赏，或者为中曲创作。 我们将审核您的Midi组成并对其进行编辑以匹配系统的存档'),
('midi_download',	'MIDI音乐下载');

-- 2021-03-23 08:01:07
