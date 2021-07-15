-- Adminer 4.8.1 MySQL 5.7.34 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lang_tr`;
CREATE TABLE `lang_tr` (
  `key` varchar(50) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `lang_tr`;
INSERT INTO `lang_tr` (`key`, `value`) VALUES
('mua_sp',	'Ürünler'),
('tip_search',	'Ne aramak istiyorsun?'),
('luu_tru_lien_he',	'Mağaza İletişim'),
('sp',	'ürün'),
('tat_ca',	'tüm'),
('gioi_thieu',	'Takdim etmek'),
('tai_khoan',	'hesap'),
('chi_tiet',	'Ayrıntılara bakınız'),
('mobile_application',	'Mobil uygulama'),
('dia_chi',	'adres'),
('ds_thanh_vien',	'Kullanıcı listesi'),
('goi_dien',	'Telefon'),
('dang_xu_ly',	'İlerleme bekleniyor'),
('dang_lay_du_lieu',	'Veri yükleniyor ...'),
('loai',	'Kategoriler'),
('dang_nhap_tip',	'Kullanıcı adı'),
('mat_khau',	'Parola'),
('dang_nhap',	'Oturum aç'),
('dang_ky',	'kayıt'),
('them_vao_gio_hang',	'Sepete ekle'),
('document',	'belge'),
('dk_tai_khoan',	'Hesap aç'),
('tong_quan',	'genel bakış'),
('quoc_gia',	'ülke'),
('loi',	'hata'),
('loi_dang_nhap',	'Giriş başarısız, lütfen giriş bilgilerinizi kontrol edin'),
('da_them_gio_hang',	'Sepete başarıyla eklendi!'),
('app_online',	'Web sitesi uygulaması'),
('tong_gia',	'toplam fiyat'),
('Ten_dang_nhap',	'Kullanıcı adı'),
('Nhap_lai_mat_khau',	'Şifreyi tekrar onayla'),
('chu_thich',	'açıklama'),
('so_dien_thoai',	'telefon numarası'),
('ten_day_du',	'Ad Soyad'),
('click_de_xem',	'Görmek için tıklayın'),
('danh_gia',	'Değerlendirmek'),
('tinh_trang_tai_khoan',	'Hesap durumu'),
('khong_co_binh_luan',	'Yorum yok!'),
('sp_tuong_tu',	'Benzer ürünler'),
('so_nguoi_da_danh_gia',	'Derecelendiren kişi sayısı'),
('luot_xem',	'Görünüm'),
('ngay_dang',	'İletilen Tarih'),
('ngay_sua',	'Düzenleme tarihi'),
('gia',	'fiyat'),
('nhap_binh_luan',	'Yorumunuzu buraya giriniz!'),
('dang_binh_luan',	'Yorum gönder'),
('moi_nhat',	'son'),
('cu_nhat',	'en eski'),
('pho_bien_nhat',	'En popüler'),
('tra_loi',	'cevap'),
('am_nhac_cho_cuoc_song',	'Hayat için müzik'),
('choi_nhac',	'müzik çal'),
('loi_bai_hat',	'şarkı sözleri'),
('chua_co_loi_bai_hat',	'Henüz şarkı sözü yok'),
('music_top_month',	'Ayın en etkileşimli'),
('music_top_0',	'mutlu'),
('music_top_1',	'üzgün'),
('music_top_2',	'dinlenmek'),
('music_top_3',	'heyecanlı'),
('music_no_rank',	'Henüz bir derecelendirme yok'),
('xem_video',	'İlgili videoları izleyin'),
('download_app_music_tip',	'Harika müzik dinlemek için bu uygulamaları ch play app store ve app store\'dan indirin!'),
('chia_se',	'Pay'),
('dang_gia_music_tip',	'Şarkının puanlarını artırmasına ve sistemdeki popülerliğini artırmasına yardımcı olacak bu şarkı hakkındaki duygularınızı değerlendirin'),
('ung_ho',	'bağış'),
('ung_ho_tip',	'para toplamak'),
('music_same',	'Diğer şarkılar'),
('chu_thich_ung_ho',	'Sunucunuzu koruyabilmemiz ve birçok ilginç gadget oluşturabilmemiz için lütfen harcamalarınızın küçük bir kısmına katkıda bulunun. Çok teşekkürler'),
('lien_he_cung_ten',	'Aynı isimdeki kişiler'),
('lien_he_lien_quan',	'İlgili kişiler'),
('download_app_contact_tip',	'İnsanlarla bağlantı kurabilmeniz ve diğer yardımcı programları kullanabilmeniz için bu uygulamaları indirin!'),
('gu_am_nhac',	'Müzikal tadı'),
('gioi_tinh',	'Seks'),
('sex_0',	'erkek'),
('sex_1',	'kadın'),
('date_start',	'Kayıt Tarihi'),
('date_cur',	'Son etkileşim tarihi'),
('chinh_sach',	'Gizlilik Politikası'),
('chinh_sach_tip',	'Kişisel bilgi, ilişki ve hizmet sağlayıcıların istikrarını sağlama ilkesinden doğan hak ve sorumluluklarla ilgili genel hükümler. Kullanıcılar, bilgileri yayınlayarak, aşağıdaki anlaşmaları kabul eder:'),
('no_product',	'Ürün mevcut değil'),
('thanh_cong',	'başarılı olmak'),
('cam_on_da_danh_gia',	'İnceleme için teşekkür ederiz! Yorumunuz bizim için çok önemli.'),
('tip_star5',	'mükemmellik'),
('tip_star4',	'Çok iyi'),
('tip_star3',	'iyi'),
('tip_star2',	'sıradan'),
('tip_star1',	'Çok kötü'),
('trich_dan',	'Alıntı'),
('doc_cham_ngon',	'Alıntıyı oku'),
('download_app_quote_tip',	'İyi teklifler okumak ve diğer pek çok eğlence yardımcı programını kullanmak için bu uygulamaları ch play app store ve appstore\'da indirin.'),
('download_song',	'Bu şarkıyı indir'),
('khong_co_du_lieu',	'Veri yok'),
('tai_thanh_cong_tip',	'Sistemden ücretsiz müzik indirmeye devam etmek için lütfen yukarıda gösterilen ve benzer resimlere tıklayın Çok teşekkürler!'),
('danh_gia_done',	'Bu şarkıyı dinlerken sisteminize ne hissettiğinizi bildirdiğiniz için teşekkür ederiz!'),
('not_music',	'Şarkı mevcut değil!'),
('back_list_music',	'Müzik listesine dön'),
('not_account',	'Hesap mevcut değil!'),
('back_list_account',	'Hesap listesine dön'),
('lien_he',	'İletişim ve destek'),
('lien_he_tip',	'Herhangi bir sorunuz varsa, aşağıdaki adres ve e-postalar yoluyla tavsiye ve cevaplar için lütfen yöneticiyle iletişime geçin.'),
('policy_1',	'Sistem, iletişim bilgilerinizi telefon numaraları, e-posta, sosyal ağ bağlantıları (skype kimliği, facebook, twitter, Linkedin), cinsiyet, adres gibi kişilerle paylaşacaktır. (Kullanıcılar bilgilerini hiçbir sistem uygulamasında paylaşmayacaklarını özelleştirebilirler)'),
('policy_2',	'Yöneticiler, ilgili anormallikleri rapor ettiklerinde, yanlış kişiyi silme veya diğer kişilerin iletişim içeriğini ihlal etme hakkına sahiptir.'),
('no_product_tip',	'Ürün kaldırıldı ve carrotstore.com adresinde desteklenmiyor.'),
('home_url',	'Ürünlerin sergilendiği ana sayfa'),
('login_account_tip',	'Sisteme giriş yapmak için telefon numaranızı girin'),
('sel_account_login',	'Giriş yapmak için kullandığınız hesaplardan birini seçin'),
('back',	'geri'),
('dang_xuat',	'Oturumu kapat'),
('inp_phone_tip',	'Telefon numaranızı girin'),
('no_account_error',	'Bu hesabın telefon numarası sistemde yok veya bu ülkede mevcut değil!'),
('login_app',	'Giriş yapmak için kullanılan uygulamalar'),
('login_account_timer',	'Giriş için zaman sınırı'),
('login_account_scan_qr_tip',	'Sistemdeki uygulamaları kullanın, daha sonra oturum açmak için barkod taramasını açın'),
('login_account_succes',	'Başarıyla giriş yaptı!'),
('an_danh',	'tebdili kıyafet'),
('pay_method',	'Ödeme Yöntemini Seçin'),
('pay_account',	'Müşteri bilgileri'),
('pay_title',	'Satın alma'),
('pay_tip_done',	'Başarılı bir satın alımdan sonra, ürün otomatik olarak uygulamanızda kullanılacaktır!'),
('pay_success',	'Başarılı ödeme. Ürünü kullanabilirsiniz'),
('pay_fail',	'Ödeme başarısız! tekrar satın almayı deneyin'),
('pay_sp_obj_nude_name',	'Karakterin giysilerini çıkar'),
('download_on',	'Bu uygulamayı indir'),
('no_page',	'Bu sayfa mevcut değil'),
('mobile_game',	'oyun'),
('quote_more',	'Belki aşağıdaki diğer makbuzları beğeneceksiniz'),
('share_tip',	'Eğer iyi hissediyorsanız lütfen paylaşın'),
('history_delete',	'geçmişi temizle'),
('dong_gop_loi_nhac',	'Şarkı sözlerine katkıda bulun'),
('dong_gop_loi_nhac_tip',	'Lütfen bu şarkının işlevselliğini tam olarak tamamlamak için kullanabilmeniz için kelimelerinize katkıda bulunun.'),
('add_lyrics_send',	'Şarkı sözü gönder'),
('add_lyrics_error',	'Sözlerin içeriği boş olmamalıdır'),
('add_lyrics_success',	'Başarılı şarkı sözleri gönder! Sözlere katkıda bulunduğunuz için teşekkür ederiz, bu sözleri en kısa sürede sansürleyip yayınlayacağız'),
('dang_nhap_tai_khoan_khac',	'Başka bir hesapla giriş yap'),
('rut_gon_link',	'Bağlantıları kısalt'),
('adblock_title',	'Sitemizde reklam engelleme eklentilerini kullanmamalısınız'),
('adblock_msg',	'Sistem özelliklerini tam olarak kullanmak için lütfen reklam engelleme işlevlerini devre dışı bırakın; bu, CarrotStore geliştiricilerinin çabalarının tanınmasına yardımcı olur.'),
('shorten_link_inp',	'Bağlantınızı buraya yapıştırın!'),
('shorten_link_btn',	'Kısaltılmış bağlantılar oluşturma'),
('shorten_link_tip_1',	'Oluşturduğunuz kısa bağlantıların performansını yönetmek ve görüntülemek için hesaplarınıza giriş yapın'),
('shorten_link_tip_2',	'Kısaltılmış bir {num_link} bağlantısı oluşturuldu ve bu performans zamanla artacak ve bu uygulamanın verimliliğini ve potansiyelini gösterecek.'),
('shorten_link_tip_3',	'Uygulama web, telefon gibi tüm platformlara dağıtılır. Mobil uygulama mağazasından indirip kullanabilirsiniz'),
('shorten_link_list',	'Bağlantılı liste oluşturuldu'),
('shorten_link_my_list',	'Kısaltılmış bağlantı listem'),
('link_full',	'Tam bağlantı'),
('shorten_link_create',	'Bağlantı kısaldı'),
('shorten_link_create',	'Bağlantı kısaldı'),
('shorten_link_detail',	'Kısaltılmış bağlantı ayrıntıları'),
('shorten_link_home',	'Kısaltılmış bağlantıların ana sayfası'),
('shorten_link_error',	'Yanlış bağlantı biçimi (ör. Http://www.carrotstore.com)'),
('link_nguoi_tao',	'yaratıcı'),
('shorten_link_status',	'Durum paylaşıldı'),
('shorten_link_status_0',	'Herkesle paylaş'),
('shorten_link_status_1',	'Sadece ben'),
('shorten_link_return',	'Bağlantı kısaltma sonuçları'),
('copy',	'kopya'),
('save_img',	'Resmi Kaydet'),
('back',	'Geri'),
('help_off_block_ads',	'Reklam engelleme fişini kaldırın'),
('help_off_block_ads_tip',	'Reklam engelleme eklentilerini devre dışı bırakmak için aşağıdaki resimde açıklanan adımları izleyin'),
('help_off_block_ads_step_1',	'<b> 1. Adım: </b> Tarayıcı araç çubuğu adındaki reklamları engelle simgesini tıklayın <br>'),
('help_off_block_ads_step_2',	'<b> 2. Adım: </b> Görünen listeden <b> Bu sitede duraklat </b> öğesini seçin <br>'),
('help_off_block_ads_step_3',	'<b> 3. Adım: </b> Web sayfasını görüntülemeyi tamamlamak için tarayıcınızı yenileyin (veya <b> F5 </b> tuşuna basın)'),
('hoan_tat',	'bitmiş'),
('message_tip',	'Selam! Nasıl yardım edebiliriz?'),
('account_update_phone',	'Telefon numarasını güncelleme'),
('account_update_phone_tip',	'Sistemdeki işlevleri tam olarak kullanabilmek için telefon numaranızı girmeniz gerekir'),
('account_update_phone_success',	'Telefon numarasını başarıyla güncelleyin!'),
('account_update_phone_error',	'Telefon numarası doğru biçimde değil!'),
('song_artist',	'Sanatçı ekspres'),
('song_genre',	'Tür'),
('song_year',	'Çıkış tarihi'),
('song_album',	'Albüm'),
('chinh_sua_thong_tin',	'Bilgileri düzenleyin'),
('user_status',	'Durum paylaşıldı'),
('user_status_0',	'Bilgileri herkesle paylaşın'),
('user_status_1',	'Bilgi paylaşma'),
('dang_nhap_mxh',	'Sosyal hesaplarınızla giriş yapın'),
('dang_nhap_carrot',	'CARROT hesabınızla giriş yapın'),
('dang_nhap_carrot_tip',	'Giriş yapmak için telefon numarasını veya e-postayı ve şifreyi girin'),
('dang_ky_carrot_tip',	'CARROT hesabınızı kaydetmek için aşağıdaki alanlardaki bilgileri doldurun'),
('loi_ten',	'Tam ad boş olamaz ve 5 karakterden fazla olamaz'),
('loi_tai_khoan_da_ton_tai',	'Bu Hesap Zaten Mevcut'),
('loi_mat_khau',	'Şifre boş olmamalı ve 6 karakterden uzun olmamalıdır'),
('avatar',	'Avatar'),
('password_tip',	'CARROT hesabınıza telefon numaranızla giriş yapmanıza yardımcı olacak bir şifre oluşturun'),
('download_vcf',	'Vcard\'ı (.vcf) indir'),
('tong_quan_tip',	'Kullanıcının tüm bilgilerini görüntüleme'),
('sao_luu_danh_ba',	'eski bağlantılar'),
('backup_contact_tip',	'Kişi yedeklemenizi yönetin'),
('account_setting_tip',	'Sistemin tüm işlevlerini kullanmak için bilgilerinizi düzenleyin ve tamamen güncelleyin'),
('delete',	'silmek'),
('backup_contact_title',	'Verilerinizin yedek kişisinin listesi'),
('backup_contact_title_tip',	'Oluşturulan kişileri yedeklemek için {num_bk} var'),
('shorten_link_list_tip',	'Oluşturduğunuz kısa linklerin listesini yönetin'),
('backup_contact_none',	'Oluşturulmuş bir yedeğiniz yok, kişilerinizi yedeklemek için bu uygulamayı kullanın'),
('song_add_playlist',	'Çalma listenize şarkı ekleyin'),
('my_playlist',	'Çalma listem'),
('add_song_to_playlist',	'Bu şarkı listesine şarkı ekle'),
('my_playlist_tip',	'Müzik çalma listelerinde sakladığınız şarkıları tekrar dinleyin'),
('create_playlist',	'Yeni çalma listesi oluştur'),
('create_playlist_tip',	'Oluşturmak istediğiniz listenin adını girin, Mevcut şarkılar bu şarkı listesine eklenecek'),
('error_name_playlist_null',	'Oynatma listesi adı boş olamaz'),
('delete_song_success',	'Şarkı başarıyla silindi'),
('edit',	'Düzenle'),
('my_playlist_rename_tip',	'Bu oynatma listesi için yeni bir ad girin'),
('update_playlist',	'çalma listesini güncelle'),
('delete_tip',	'Bu öğeyi silmek istediğinizden emin misiniz, bu işlem geri yüklenmeyecek mi?'),
('box_yes',	'Evet eminim!'),
('box_no',	'Hayır, iptal et!'),
('thanks',	'Teşekkürler,'),
('kr_player_help',	'Havuç müzik çalar kısayolu'),
('kr_help_back',	'Önceki şarkıya dön'),
('kr_help_space',	'Şarkıyı duraklat / devam ettir'),
('kr_help_next',	'Sonraki şarkıyı çal'),
('kr_help_mute',	'Sesi aç / kapat'),
('quen_mat_khau',	'Parolanızı mı unuttunuz'),
('quen_mat_khau_tip',	'Unutulan bir şifreyi almak için lütfen e-posta adresinizi girin'),
('quen_mat_khau_success',	'Şifreniz e-postayla gönderildi. Bilgi için lütfen e-postanızı kontrol edin'),
('error_email',	'E-posta doğru biçimde değil'),
('quen_mat_khau_fail',	'Bu e-posta adresi sistemde mevcut değil'),
('jailbreak_ios',	'Jailbreak yapılmış Apple cihazları için uygulama yükleme bağlantısı'),
('jailbreak_1',	'Bu bağlantı yalnızca apple cihazlarınızla erişildiğinde safari tarayıcısında çalışır'),
('jailbreak_2',	'Bu .ipa dosyası yalnızca jailbroken Apple cihazlarına yüklenebilir, doğrudan bu alt bağlantıyı tıklayarak indirebilirsiniz (indirmek için buraya tıklayın)'),
('jailbreak_3',	'Jailbreak\'in nasıl yapılacağına aşağıdaki linkten ulaşabilirsiniz (Görüntülemek için buraya tıklayın)'),
('development_team',	'Takım geliştirin'),
('dark_mode',	'Aydınlık ve karanlık modunu açma / kapatma'),
('dark_mode_0',	'Karanlık mod, cihazınızın pil kapasitesini artırmanıza ve gece sağlamanız için uygun siyah ve beyaz olmak üzere iki ana renkle göz sağlığınızı korumanıza yardımcı olur.'),
('dark_mode_1',	'Parlak mod, parlak tonlarda varsayılan renklerle görüntülenen sayfanın görünümünü getirecektir'),
('buy_code',	'Oyun kaynak kodu satın al'),
('buy_code_tip',	'Fikirlerinize göre gelişmeye devam etmek için bu oyunun kaynak kodunu satın alabilir veya referans referansına hizmet edebilir, öğrenebilir, öğrenebilir, oyun oluşturabilirsiniz'),
('download_code',	'Kaynak kodu indirin'),
('download_game',	'Oyunu indirin (PC)'),
('download_link',	'İndirme bağlantılarının listesi'),
('nha_phat_trien',	'Geliştiriciler'),
('purchase_orders',	'Satın alma siparişleri'),
('no_return_search',	'Yukarıdaki anahtar kelimeler için sonuç yok'),
('ngon_ngu_hien_thi',	'Ülke ve dil seçiniz'),
('field_login',	'E-posta veya telefon numarası'),
('gioi_thieu_tip',	'Carrotstore.com , dünyadaki insanlar için eğlence uygulamaları ve ek hizmet programları sunan bir arşivdir. Uygulamalardan birini kullandığınızda, her bir kişiyi mobil cihazdaki kimliğiyle tanımlayan bir hesap kaydettiniz.'),
('account_report',	'Bu hesapla ilgili kötüye kullanım bildirin'),
('account_report_success',	'Bu hesapla ilgili sorunları bildirdiğiniz için teşekkür ederiz, mümkün olan en kısa sürede düzeltmeye çalışacağız'),
('account_report_1',	'Hesap cinsel içerik, pornografi içeriyor'),
('account_report_2',	'kimliğe bürünen hesaplar'),
('account_report_3',	'Diğer problemler'),
('account_report_3_tip',	'Lütfen buraya yanlış hesabın ayrıntılı bir açıklamasını girin'),
('warning',	'uyarı'),
('account_view_yes',	'Bu hesabı görüntülemeye devam etmek istiyorum'),
('account_view_no',	'Bu hesabı görmek istemiyorum'),
('account_view_18',	'Görüntülemek üzere olduğunuz hesap yalnızca yetişkinlere yönelik içerik barındırıyor olabilir'),
('download_app_piano_tip',	'Tutkunuzu tatmin etmek için aşağıdaki uygulamayla her zaman oynayın ve öğrenin'),
('hoc_dan_piano',	'Piyano'),
('tac_gia',	'Yazar'),
('cap_do',	'Seviye'),
('toc_do_nhip',	'Yendi hızı'),
('so_not_nhac',	'Müzik notaları sayısı'),
('ten_bai_hat',	'Parçanın adı'),
('level_de',	'Kolay'),
('level_trung_binh',	'normal'),
('level_kho',	'Zor'),
('level_sieu_kho',	'Çok zor'),
('midi_info',	'Bilgi Midi piyano besteleri'),
('setting_piano',	'Piyano ayarları'),
('setting_piano_key_pc',	'Bilgisayar klavye etiketlerini göster'),
('setting_piano_key_name',	'Müzik notasının adını göster'),
('midi_show_pc_key',	'Midi müzik spektrumunu bir bilgisayar klavyesi olarak kodlayın'),
('tao_moi_midi',	'Çevrimiçi midi oluşturun'),
('midi_add_line',	'Satır ekle'),
('midi_add_column',	'Sütun ekleyin'),
('midi_del_row',	'Bir satırı sil'),
('midi_del_col',	'Bir sütunu silin'),
('midi_empty',	'Bir midi boşalt'),
('midi_form_pc',	'PC metninden midi oluştur'),
('midi_add_line_tip',	'Klavye akoru gibi farklı çalma akışları oluşturmak için yeni bir satır ekleyin, aynı anda çalarken 10 parmağınıza karşılık gelen en fazla 10 satır oluşturabilirsiniz.'),
('midi_add_column_tip',	'Oyuncunun vuruş hızına göre belirli bir zamanda akorlar arasında bir zaman aralığı oluşturmak için boş bir sütun ekleyin veya perdeleri daha sonra ekleyebilmek için bir taslak sütun oluşturun.'),
('midi_del_row_tip',	'Seçili satırdaki tüm midi notaları silerken bir satırı siler'),
('midi_del_col_tip',	'Bir sütunun silinmesi, seçilen sütundaki midi notlarının silinmesi anlamına gelir.'),
('midi_empty_tip',	'Notu boşaltın, bu, not kaydedilmediğinde orijinal durumuna döndürür'),
('midi_form_pc_tip',	'İlgili midi\'yi oluşturmak için bilgisayar metnini girin'),
('midi_help',	'MIDI editörü kılavuzu'),
('midi_help_tip',	'Piyano emülatörü ve midi editörü ile kendi müziğinizi oluşturmanızı veya sistemimize mevcut bestelerinize katkıda bulunmanızı kolaylaştırır.Yeni biriyseniz, midi yaratıcımız, bunun tüm özelliklerini kolayca kullanmak için aşağıdaki kılavuz ipuçlarını okumak için birkaç dakikanızı ayırın aracı.'),
('midi_use',	'Temel kullanım'),
('midi_use1',	'Midi düzenleyiciye not ekleme işlemini kaydetmek için bilgisayar klavyenizdeki her piyano tuşundaki gösterim işaretlerine karşılık gelen tuşlara basın.'),
('midi_use2',	'Bir midi notu düzenlemek için midi nota tıklamanız ve seçilen midi\'yi değiştirmek için başka bir tuşa basmanız yeterlidir.'),
('midi_use3',	'Midi araç çubuğundaki satır ekle düğmesine tıklayarak parça için bir akor oluşturun. Ardından yeni notlar kaydetmek için ek bir iş parçacığı oluşturacaksınız'),
('midi_use4',	'Midi düzenleyici araç çubuğu şunları içerir:'),
('midi_publish_success',	'Piyano midi taslağınızı başarıyla yayınladıktan sonra, bu taslağı onaylayıp mümkün olan en kısa sürede kamuoyuna yayınlayacağız. Yaratıcı katkınız için teşekkür ederiz'),
('midi_publish',	'Yayınla'),
('midi_erro_no_name',	'Bu şaheser yayınlanamaz! midi ürününüze henüz isim vermediniz'),
('midi_erro_no_data',	'Henüz midi verisi yok, lütfen yayınlamadan önce içerik oluşturun'),
('midi_export',	'Midi dosyasını (.mid) dışa aktar'),
('midi_export_success',	'Midi (.mid) dosyasını başarıyla dışa aktarın!'),
('midi_export_tip',	'Bilgisayarda veya mobil cihazlarda keyfini çıkarmak veya dinlemek için midi\'den orta dosyalar oluşturun'),
('midi_publish_tip',	'Çalışmanızı herkesin keyif alması veya bir midi şarkıya katkıda bulunması için dünyaya yayınlayın. Midi kompozisyonunuzu yöneteceğiz ve sistemin arşiviyle eşleşecek şekilde düzenleyeceğiz'),
('midi_download',	'MIDI müzik indirmeleri'),
('search_setting',	'Arama ayarları'),
('search_setting_type',	'Arama işlevi seçenekleri'),
('search_setting_data',	'Veri kaynağı seçeneklerini ara'),
('search_setting_type_0',	'Yalnızca erişim kategorisine göre ara'),
('search_setting_type_1',	'Tüm kategoriyi ara'),
('search_setting_data_0',	'Dünya çapındaki tüm veriler'),
('search_setting_data_1',	'Yalnızca ülkenizdeki veya bölgenizdeki verileri bulun'),
('search_return',	'Arama Sonuçları'),
('recognition_inp',	'Şimdi konuşun');

-- 2021-06-12 16:35:13