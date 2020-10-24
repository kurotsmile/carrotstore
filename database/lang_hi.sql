-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lang_hi`;
CREATE TABLE `lang_hi` (
  `key` varchar(50) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `lang_hi`;
INSERT INTO `lang_hi` (`key`, `value`) VALUES
('mua_sp',	'उत्पाद'),
('tip_search',	'आप किसके लिए सर्च करना चाहते हैं?'),
('download_on',	'इस ऐप को डाउनलोड करें'),
('luu_tru_lien_he',	'संपर्क स्टोर'),
('sp',	'उत्पाद'),
('tat_ca',	'सब'),
('gioi_thieu',	'परिचय कराना'),
('tai_khoan',	'खाता'),
('chi_tiet',	'विवरण देखें'),
('mobile_application',	'मोबाइल एप्लिकेशन'),
('jailbreak_2',	'यह .ipa फ़ाइल केवल जेलब्रेक किए गए Apple उपकरणों पर ही इंस्टॉल की जा सकती है, आप इसे सीधे इस उप लिंक पर क्लिक करके डाउनलोड कर सकते हैं (डाउनलोड करने के लिए यहां क्लिक करें)'),
('dia_chi',	'पता'),
('ds_thanh_vien',	'उपयोगकर्ता सूची'),
('goi_dien',	'फ़ोन'),
('dang_xu_ly',	'प्रगति की प्रतीक्षा कर रहा है'),
('dang_lay_du_lieu',	'डेटा लोड हो रहा है ...'),
('loai',	'श्रेणियाँ'),
('dang_nhap_tip',	'उपयोगकर्ता नाम'),
('mat_khau',	'पारण शब्द'),
('dang_nhap',	'लॉग इन करें'),
('dang_ky',	'पंजीकरण'),
('them_vao_gio_hang',	'कार्ट में डालें'),
('document',	'दस्तावेज़'),
('dk_tai_khoan',	'एक खाता पंजीकृत करें'),
('tong_quan',	'अवलोकन'),
('quoc_gia',	'देश'),
('loi',	'त्रुटि'),
('loi_dang_nhap',	'लॉगिन विफल हुआ, कृपया अपनी लॉगिन जानकारी जांचें'),
('da_them_gio_hang',	'कार्ट में सफलतापूर्वक जोड़ें!'),
('app_online',	'वेबसाइट आवेदन'),
('tong_gia',	'कुल कीमत'),
('Ten_dang_nhap',	'उपयोगकर्ता नाम'),
('Nhap_lai_mat_khau',	'फिर से पासवर्ड की पुष्टि करें'),
('chu_thich',	'व्याख्या'),
('so_dien_thoai',	'फ़ोन नंबर'),
('ten_day_du',	'पूरा नाम'),
('click_de_xem',	'देखने के लिए क्लिक करें'),
('danh_gia',	'मूल्यांकन करना'),
('tinh_trang_tai_khoan',	'खाता स्थिति'),
('khong_co_binh_luan',	'कोई टिप्पणी नहीं!'),
('sp_tuong_tu',	'इसी तरह के उत्पादों'),
('so_nguoi_da_danh_gia',	'रेटिंग करने वालों की संख्या'),
('luot_xem',	'राय'),
('ngay_dang',	'दिनांक पोस्ट की गई'),
('ngay_sua',	'संपादन की तारीख'),
('gia',	'मूल्य'),
('nhap_binh_luan',	'अपनी टिप्पणी यहाँ दर्ज करें!'),
('dang_binh_luan',	'अपनी टिप्पणी डालें'),
('moi_nhat',	'नवीनतम'),
('cu_nhat',	'सबसे पुराना'),
('pho_bien_nhat',	'सबसे लोकप्रिय'),
('tra_loi',	'जवाब दे दो'),
('am_nhac_cho_cuoc_song',	'जीवन के लिए संगीत'),
('choi_nhac',	'संगीत बजाना'),
('loi_bai_hat',	'बोल'),
('chua_co_loi_bai_hat',	'अभी तक कोई गीत नहीं'),
('music_top_month',	'महीने का सबसे इंटरैक्टिव'),
('music_top_0',	'खुश'),
('music_top_1',	'उदास'),
('music_top_2',	'आराम'),
('music_top_3',	'उत्तेजित'),
('music_no_rank',	'अभी तक कोई रेटिंग नहीं है'),
('xem_video',	'संबंधित वीडियो देखें'),
('download_app_music_tip',	'महान संगीत सुनने के लिए इन एप्स को ch play app store और app store पर डाउनलोड करें!'),
('chia_se',	'शेयर'),
('dang_gia_music_tip',	'इस गीत के बारे में अपनी भावनाओं का मूल्यांकन करें, जो गीत को अपनी रेटिंग बढ़ाने और सिस्टम में लोकप्रियता बढ़ाने में मदद करेगा।'),
('ung_ho',	'दान'),
('ung_ho_tip',	'पैसे जुटाएं'),
('music_same',	'अन्य गीत'),
('chu_thich_ung_ho',	'कृपया अपने खर्चों के एक छोटे हिस्से का योगदान करें ताकि हम सर्वर को बनाए रख सकें और कई अन्य दिलचस्प गैजेट्स बना सकें। बहुत बहुत धन्यवाद'),
('lien_he_cung_ten',	'उसी नाम के संपर्क'),
('lien_he_lien_quan',	'संबंधित संपर्क'),
('download_app_contact_tip',	'इन ऐप को डाउनलोड करें ताकि आप लोगों से जुड़ सकें और अन्य उपयोगिताओं का उपयोग कर सकें!'),
('gu_am_nhac',	'संगीत स्वाद'),
('gioi_tinh',	'लिंग'),
('sex_0',	'पुरुष'),
('sex_1',	'महिला'),
('date_start',	'पंजीकरण की तारीख'),
('date_cur',	'अंतिम बातचीत की तारीख'),
('chinh_sach',	'गोपनीयता नीति'),
('no_product',	'उत्पाद मौजूद नहीं है'),
('chinh_sach_tip',	'व्यक्तिगत जानकारी, संबंधों और सेवा प्रदाताओं की स्थिरता के अधिकारों को सुनिश्चित करने के सिद्धांत से उत्पन्न अधिकारों और जिम्मेदारियों पर सामान्य प्रावधानों की शर्तें। जानकारी का उपयोग करके, प्रकाशन, उपयोगकर्ता इन समझौतों के लिए सहमत होते हैं:'),
('thanh_cong',	'सफल होने के'),
('cam_on_da_danh_gia',	'समीक्षा के लिए धन्यवाद! आपकी समीक्षा हमारे लिए बहुत महत्वपूर्ण है।'),
('tip_star5',	'उत्कृष्टता'),
('tip_star4',	'बहुत अच्छा'),
('tip_star3',	'अच्छा'),
('tip_star2',	'साधारण'),
('tip_star1',	'बहुत बुरा'),
('trich_dan',	'उद्धरण'),
('doc_cham_ngon',	'उद्धरण पढ़ें'),
('gioi_thieu_tip',	'Carrotstore.com एक संग्रह है, जो दुनिया भर के लोगों के लिए मनोरंजन अनुप्रयोगों और ऐड-ऑन उपयोगिताओं को पेश करता है। जब आप इनमें से किसी एक प्रणाली का उपयोग करते हैं, तो आपके पास एक खाता होता है जो प्रत्येक व्यक्ति को मोबाइल डिवाइस से पहचानता है।'),
('download_app_quote_tip',	'अच्छा खेल पढ़ने और कई अन्य मनोरंजन उपयोगिताओं का उपयोग करने के लिए ch play app store और appstore पर इन एप्लिकेशन को डाउनलोड करें।'),
('download_song',	'इस गाने को डाउनलोड करें'),
('khong_co_du_lieu',	'कोई आकड़ा उपलब्ध नहीं है'),
('tai_thanh_cong_tip',	'कृपया ऊपर दिखाए गए लाइक बटन पर क्लिक करें और सिस्टम से मुक्त संगीत डाउनलोड करने के लिए फेसबुक पर हमारे पेज को पसंद करें! बहुत बहुत धन्यवाद!'),
('danh_gia_done',	'अपने सिस्टम को यह बताने के लिए धन्यवाद कि इस गीत को सुनते समय आपको कैसा महसूस होता है!'),
('not_music',	'गीत मौजूद नहीं है!'),
('back_list_music',	'संगीत सूची पर लौटें'),
('not_account',	'खाता मौजूद नहीं है!'),
('back_list_account',	'खाता सूची पर वापस लौटें'),
('lien_he',	'संपर्क और समर्थन'),
('lien_he_tip',	'यदि आपके कोई प्रश्न हैं, तो कृपया नीचे दिए गए पते और ईमेल के माध्यम से सलाह और जवाब के लिए व्यवस्थापक से संपर्क करें।'),
('policy_1',	'सिस्टम आपकी संपर्क जानकारी को फोन नंबर, ईमेल, सोशल नेटवर्किंग लिंक (स्काइप आईडी, फेसबुक, ट्विटर, लिंक्डइन), लिंग, पते जैसे लोगों के साथ साझा करेगा। (उपयोगकर्ता अपनी जानकारी किसी भी सिस्टम एप्लिकेशन में साझा नहीं कर सकते हैं)'),
('policy_2',	'जब वे संबंधित असामान्यताओं की रिपोर्ट करते हैं, तो प्रशासकों को गलत संपर्क हटाने या अन्य लोगों की संपर्क सामग्री का उल्लंघन करने का अधिकार है।'),
('no_product_tip',	'उत्पाद हटा दिया गया है और carrotstore.com पर समर्थित नहीं है'),
('home_url',	'होम पेज जहां उत्पादों को प्रदर्शित किया जाता है'),
('login_account_tip',	'सिस्टम में लॉगिन करने के लिए अपना फोन नंबर डालें'),
('sel_account_login',	'आप जिन खातों का उपयोग कर रहे हैं, उनमें से एक का चयन करें'),
('back',	'वापस'),
('dang_xuat',	'लॉग आउट करें'),
('inp_phone_tip',	'अपना दूरभाष क्रमांक दर्ज करें'),
('no_account_error',	'इस खाते का फ़ोन नंबर सिस्टम में मौजूद नहीं है, या इस देश में उपलब्ध नहीं है!'),
('login_app',	'लॉग इन करने के लिए उपयोग किए जाने वाले एप्लिकेशन'),
('login_account_timer',	'Délai de connexion'),
('login_account_scan_qr_tip',	'सिस्टम में एप्लिकेशन का उपयोग करें फिर लॉगिन करने के लिए बारकोड स्कैनिंग चालू करें'),
('login_account_succes',	'सफलतापूर्वक लॉग इन हो चुका है!'),
('an_danh',	'गुप्त'),
('pay_method',	'किसी भुगतान पद्धति का चयन करें'),
('pay_account',	'ग्राहक जानकारी'),
('pay_title',	'खरीद फरोख्त'),
('pay_tip_done',	'सफल खरीद के बाद आइटम स्वचालित रूप से आपके आवेदन में उपयोग किया जाएगा!'),
('pay_success',	'भुगतान की सफलता। आप उत्पाद का उपयोग कर सकते हैं'),
('pay_fail',	'भुगतान असफल हुआ! फिर से खरीदने का प्रयास करें'),
('pay_sp_obj_nude_name',	'चरित्र के कपड़े उतारो'),
('no_page',	'यह पृष्ठ मौजूद नहीं है'),
('mobile_game',	'खेल'),
('quote_more',	'शायद आप नीचे दिए गए अन्य मैक्सिमम को पसंद करेंगे'),
('share_tip',	'अगर आपको अच्छा लगे तो कृपया शेयर करें'),
('history_delete',	'इतिहास मिटा दें'),
('dong_gop_loi_nhac',	'गीत का योगदान'),
('dong_gop_loi_nhac_tip',	'कृपया इस गीत की कार्यक्षमता को पूरी तरह से उपयोग करने के लिए अपने शब्दों का योगदान करें'),
('add_lyrics_send',	'गीत प्रस्तुत करें'),
('add_lyrics_error',	'गीत की सामग्री खाली नहीं होनी चाहिए'),
('add_lyrics_success',	'सफल गीत भेजें! गीत के योगदान के लिए धन्यवाद, हम जल्द से जल्द इस गीत को सेंसर करेंगे और प्रकाशित करेंगे'),
('dang_nhap_tai_khoan_khac',	'दूसरे खाते से लॉगिन करें'),
('rut_gon_link',	'लिंक छोटा करें'),
('adblock_title',	'आपको हमारी साइट पर विज्ञापन अवरुद्ध प्लग-इन का उपयोग नहीं करना चाहिए'),
('adblock_msg',	'कृपया सिस्टम की विशेषताओं का पूरी तरह से उपयोग करने के लिए विज्ञापन अवरोधन कार्यों को अक्षम करें, इससे CarrotStore डेवलपर्स के प्रयासों को पहचानने में मदद मिलती है।'),
('shorten_link_inp',	'अपना लिंक यहाँ पेस्ट करें!'),
('shorten_link_btn',	'छोटे लिंक बनाएँ'),
('shorten_link_tip_1',	'आपके द्वारा बनाए गए छोटे लिंक के प्रदर्शन को प्रबंधित करने और देखने के लिए अपने खातों में लॉग इन करें'),
('shorten_link_tip_2',	'एक छोटा {num_link} लिंक बनाया गया है और यह प्रदर्शन समय के साथ बढ़ेगा, इस अनुप्रयोग की प्रभावशीलता और क्षमता को प्रदर्शित करेगा।'),
('shorten_link_tip_3',	'आवेदन वेब, फोन जैसे सभी प्लेटफार्मों पर तैनात किया गया है। आप इसे मोबाइल ऐप स्टोर पर डाउनलोड और उपयोग कर सकते हैं'),
('shorten_link_list',	'लिंक की गई सूची बनाई गई है'),
('shorten_link_my_list',	'लिंक की मेरी छोटी सूची'),
('link_full',	'पूर्ण लिंक'),
('shorten_link_create',	'लिंक छोटा हो गया है'),
('shorten_link_create',	'लिंक छोटा हो गया है'),
('shorten_link_detail',	'संक्षिप्त लिंक विवरण'),
('shorten_link_home',	'छोटा लिंक का मुख पृष्ठ'),
('shorten_link_error',	'गलत लिंक प्रारूप (उदा। Http://www.carrotstore.com)'),
('link_nguoi_tao',	'रचनाकारों'),
('shorten_link_status',	'स्थिति साझा की गई'),
('shorten_link_status_0',	'सभी के साथ साझा करें'),
('shorten_link_status_1',	'केवल मैं'),
('shorten_link_return',	'लिंक छोटा करने के परिणाम'),
('copy',	'प्रतिलिपि'),
('save_img',	'छवि सहेजें'),
('back',	'वापस'),
('help_off_block_ads',	'विज्ञापन अवरुद्ध करने वाले प्लग से मार्गदर्शन करें'),
('help_off_block_ads_tip',	'विज्ञापन अवरुद्ध प्लग-इन को अक्षम करने के लिए नीचे दी गई छवि में वर्णित चरणों का पालन करें'),
('help_off_block_ads_step_1',	'<b> चरण 1: </ b> ब्राउज़र टूलबार नाम में ब्लॉक विज्ञापन आइकन पर क्लिक करें <br>'),
('help_off_block_ads_step_2',	'<b> चरण 2: </ b> उस सूची से जो आइटम का चयन करता है <b> इस साइट पर रोकें </ b> <br>'),
('help_off_block_ads_step_3',	'<b> चरण 3: </ b> अपने ब्राउज़र को ताज़ा करें (या वेबपृष्ठ प्रदर्शित करने के लिए <b> F5 </ b> कुंजी दबाएं)'),
('hoan_tat',	'समाप्त'),
('message_tip',	'नमस्ते! हम आपकी किस प्रकार सहायता कर सकते हैं?'),
('account_update_phone',	'फ़ोन नंबर अपडेट करें'),
('account_update_phone_tip',	'सिस्टम में फ़ंक्शन का पूरी तरह से उपयोग करने के लिए आपको अपना फ़ोन नंबर दर्ज करना होगा'),
('account_update_phone_success',	'फ़ोन नंबर सफलतापूर्वक अपडेट करें!'),
('account_update_phone_error',	'फ़ोन नंबर सही प्रारूप में नहीं है!'),
('song_artist',	'कलाकार व्यक्त करते हैं'),
('song_genre',	'शैली'),
('song_year',	'रिहाई का वर्ष'),
('song_album',	'एल्बम'),
('chinh_sua_thong_tin',	'जानकारी संपादित करें'),
('user_status',	'स्थिति साझा की गई'),
('user_status_0',	'सभी के साथ जानकारी साझा करें'),
('user_status_1',	'जानकारी साझा न करें'),
('dang_nhap_mxh',	'अपने सामाजिक खातों के साथ लॉग इन करें'),
('dang_nhap_carrot',	'अपने CARROT खाते से लॉग इन करें'),
('dang_nhap_carrot_tip',	'लॉगिन करने के लिए फोन नंबर या ईमेल और पासवर्ड डालें'),
('dang_ky_carrot_tip',	'अपना CARROT खाता पंजीकृत करने के लिए नीचे दिए गए क्षेत्रों में जानकारी पूरी करें'),
('loi_ten',	'पूरा नाम रिक्त नहीं हो और अधिक से अधिक से अधिक 5 वर्ण हो सकते हैं'),
('loi_tai_khoan_da_ton_tai',	'खाता पहले से मौजूद है'),
('loi_mat_khau',	'पासवर्ड रिक्त नहीं होना चाहिए और 6 वर्णों से अधिक होना चाहिए'),
('avatar',	'अवतार'),
('password_tip',	'अपने फ़ोन नंबर के साथ अपने CARROT खाते में प्रवेश करने में आपकी मदद करने के लिए एक पासवर्ड बनाएँ'),
('download_vcf',	'Vcard (.vcf) डाउनलोड करें'),
('tong_quan_tip',	'उपयोगकर्ता की पूरी जानकारी प्रदर्शित करें'),
('sao_luu_danh_ba',	'बैकअप संपर्क'),
('backup_contact_tip',	'अपने संपर्क बैकअप प्रबंधित करें'),
('account_setting_tip',	'सिस्टम के पूर्ण कार्यों का उपयोग करने के लिए अपनी जानकारी को संपादित करें और पूरी तरह से अपडेट करें'),
('delete',	'हटाना'),
('backup_contact_title',	'अपने डेटा के बैकअप संपर्क की सूची'),
('backup_contact_title_tip',	'आपके पास बनाए गए संपर्कों का बैकअप लेने के लिए {num_bk} है'),
('shorten_link_list_tip',	'आपके द्वारा बनाए गए छोटे लिंक की सूची प्रबंधित करें'),
('backup_contact_none',	'आपके पास बैकअप नहीं है, अपने संपर्कों का बैकअप लेने के लिए इस ऐप का उपयोग करें'),
('song_add_playlist',	'अपनी प्लेलिस्ट में गाने जोड़ें'),
('my_playlist',	'मेरी संगीतसूची'),
('add_song_to_playlist',	'इस प्लेलिस्ट में गाने जोड़ें'),
('my_playlist_tip',	'संगीत प्लेलिस्ट में संग्रहीत गीतों को फिर से सुनें'),
('create_playlist',	'नई प्लेलिस्ट बनाएं'),
('create_playlist_tip',	'उस सूची का नाम दर्ज करें जिसे आप बनाना चाहते हैं, वर्तमान गीतों को इस प्लेलिस्ट में जोड़ा जाएगा'),
('error_name_playlist_null',	'प्लेलिस्ट का नाम रिक्त नहीं हो सकता'),
('delete_song_success',	'गीत को सफलतापूर्वक हटा दिया गया'),
('edit',	'संपादित करें'),
('my_playlist_rename_tip',	'इस प्लेलिस्ट के लिए एक नया नाम दर्ज करें'),
('update_playlist',	'प्लेलिस्ट अद्यतन करें'),
('delete_tip',	'क्या आप वाकई इस आइटम को हटाना चाहते हैं, इस ऑपरेशन को पुनर्स्थापित नहीं किया जाएगा?'),
('box_yes',	'हाँ मैं निश्चित हूँ!'),
('box_no',	'नहीं, इसे रद्द करें!'),
('thanks',	'धन्यवाद,'),
('kr_player_help',	'गाजर संगीत खिलाड़ी शॉर्टकट'),
('kr_help_back',	'पिछले गीत पर लौटें'),
('kr_help_space',	'गीत को रोकें / फिर से शुरू करें'),
('kr_help_next',	'अगला गाना चलाएं'),
('kr_help_mute',	'ध्वनि चालू / बंद करें'),
('quen_mat_khau',	'पासवर्ड भूल गए'),
('quen_mat_khau_tip',	'अपना पासवर्ड भूल गए पासवर्ड को पुनः प्राप्त करने के लिए कृपया अपना ईमेल पता दर्ज करें'),
('quen_mat_khau_success',	'आपका पासवर्ड ईमेल कर दिया गया है। कृपया जानकारी के लिए अपना ईमेल देखें'),
('error_email',	'ईमेल सही प्रारूप में नहीं है'),
('quen_mat_khau_fail',	'यह ईमेल पता सिस्टम में मौजूद नहीं है'),
('jailbreak_ios',	'जेलब्रेक किए गए ऐप्पल उपकरणों के लिए ऐप इंस्टॉल करने के लिए लिंक'),
('jailbreak_1',	'यह लिंक केवल सफारी ब्राउज़र पर काम करता है, जब आपके ऐप्पल डिवाइस के साथ एक्सेस किया जाता है'),
('jailbreak_3',	'आप निम्न लिंक में भागने का उल्लेख कर सकते हैं (देखने के लिए यहां क्लिक करें)'),
('development_team',	'टीम का विकास करें'),
('dark_mode',	'प्रकाश और अंधेरे मोड को चालू / बंद करें'),
('dark_mode_0',	'डार्क मोड आपकी डिवाइस बैटरी क्षमता को बेहतर बनाने में मदद करेगा और रात को सामग्री पढ़ने के लिए दो मुख्य रंगों, काले और सफेद, के साथ आपकी आंखों के स्वास्थ्य की रक्षा करेगा।'),
('dark_mode_1',	'उज्ज्वल मोड डिफ़ॉल्ट रंगों के साथ प्रदर्शित पृष्ठ की उपस्थिति को उज्ज्वल टन के साथ लाएगा'),
('buy_code',	'गेम सोर्स कोड खरीदें'),
('buy_code_tip',	'आप इस गेम का सोर्स कोड अपने विचारों के अनुसार विकसित करना जारी रख सकते हैं या रेफरेंस रेफरेंस की सेवा ले सकते हैं, सीख सकते हैं, सीख सकते हैं, गेम बना सकते हैं'),
('download_code',	'स्रोत कोड डाउनलोड करें'),
('download_game',	'गेम डाउनलोड करें (PC)'),
('download_link',	'डाउनलोड लिंक की सूची'),
('nha_phat_trien',	'डेवलपर्स'),
('purchase_orders',	'क्रय आदेश'),
('no_return_search',	'उपरोक्त कीवर्ड के लिए कोई परिणाम नहीं है'),
('ngon_ngu_hien_thi',	'देश और भाषा का चयन करें');

-- 2020-10-24 15:21:40
