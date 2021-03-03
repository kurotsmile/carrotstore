-- Adminer 4.8.0 MySQL 5.7.33 dump

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
('es'),
('pt'),
('fr'),
('hi'),
('zh'),
('ru'),
('de'),
('th'),
('ko'),
('ja'),
('ar'),
('tr');

DROP TABLE IF EXISTS `key_lang`;
CREATE TABLE `key_lang` (
  `key` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `key_lang`;
INSERT INTO `key_lang` (`key`) VALUES
('select_display_lang'),
('none_item'),
('logout'),
('close'),
('completed'),
('password'),
('account_login_fail'),
('account_phone'),
('list_web'),
('list'),
('save_web'),
('donation_tip'),
('donation'),
('create_new'),
('login_tip'),
('link_error'),
('account_login'),
('other_app'),
('inp_tip'),
('app_title'),
('app_title_tip');

DROP TABLE IF EXISTS `value_lang`;
CREATE TABLE `value_lang` (
  `value` text NOT NULL,
  `id_country` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

TRUNCATE `value_lang`;
INSERT INTO `value_lang` (`value`, `id_country`) VALUES
('{\"select_display_lang\":\"Choose your language or country\",\"none_item\":\"No offline web archives have been created\",\"logout\":\"Log out\",\"close\":\"Closed\",\"completed\":\"Completed\",\"password\":\"password\",\"account_login_fail\":\"Login failed, please check your password\",\"account_phone\":\"Phone number\",\"list_web\":\"List of archived pages\",\"list\":\"List\",\"save_web\":\"Save web page\",\"donation_tip\":\"Please donate a small amount of your money to us to maintain our services and develop more great applications for life!\",\"donation\":\"Donate\",\"create_new\":\"Create new\",\"login_tip\":\"Log in to your Carrot account to manage site backups offline\",\"link_error\":\"The link is malformed (e.g. http:\\/\\/www.abc.com)\",\"account_login\":\"Log in\",\"other_app\":\"Other applications from the developer\",\"inp_tip\":\"Enter data here ...\",\"app_title\":\"Save web page offline\",\"app_title_tip\":\"Enter the website link you want to host offline here\",\"lang_key\":\"en\"}',	'en'),
('{\"select_display_lang\":\"Chọn ngôn ngữ  hoặc quốc gia của bạn\",\"none_item\":\"chưa có bản lưu trữ web ngoại tuyến nào được tạo\",\"logout\":\"Đăng xuất\",\"close\":\"Đóng\",\"completed\":\"Hoàn tất\",\"password\":\"Mật khẩu\",\"account_login_fail\":\"Đăng nhập thất bại, vui lòng kiểm tra lại mật khẩu của bạn\",\"account_phone\":\"Số điện thoại\",\"list_web\":\"Danh sách các trang đã lưu trữ\",\"list\":\"Danh sách\",\"save_web\":\"Lưu lại trang web\",\"donation_tip\":\"Hãy ủng hộ một phần tiền nhỏ của các bạn để chúng tôi có chi phí để duy trì các dịch vụ và phát triển thêm nhiều ứng dụng hay cho cuộc sống!\",\"donation\":\"Ủng hộ\",\"create_new\":\"Tạo mới\",\"login_tip\":\"Đăng nhập tài khoản Carrot để quản lý các bản sao lưu trang web ngoại tuyến\",\"link_error\":\"Liên kết không đúng định dạng (ví dụ http:\\/\\/www.abc.com)\",\"account_login\":\"Đăng nhập\",\"other_app\":\"Các ứng dụng khác từ nhà phát triển\",\"inp_tip\":\"Nhập dữ liệu vào đây...\",\"app_title\":\"Lưu trang web ngoại tuyến\",\"app_title_tip\":\"Nhập liên kết trang web mà bạn muốn lưu trữ ngoại tuyến vào đây\",\"lang_key\":\"vi\"}',	'vi'),
('{\"select_display_lang\":\"Elige tu idioma o país\",\"none_item\":\"No se han creado archivos web sin conexión\",\"logout\":\"Cerrar sesión\",\"close\":\"Cerrado\",\"completed\":\"Completado\",\"password\":\"Contraseña\",\"account_login_fail\":\"Error de inicio de sesión, compruebe su contraseña\",\"account_phone\":\"Número de teléfono\",\"list_web\":\"Lista de páginas archivadas\",\"list\":\"Lista\",\"save_web\":\"Guardar página web\",\"donation_tip\":\"Por favor, donar una pequeña cantidad de su dinero a nosotros para mantener nuestros servicios y desarrollar más grandes aplicaciones para la vida!\",\"donation\":\"Donar\",\"create_new\":\"Crear nuevo\",\"login_tip\":\"Inicie sesión en su cuenta de Zanahoria para administrar las copias de seguridad del sitio sin conexión\",\"link_error\":\"El enlace tiene un formato incorrecto (por ejemplo, http:\\/\\/www.abc.com)\",\"account_login\":\"Inicia sesión\",\"other_app\":\"Otras aplicaciones del desarrollador\",\"inp_tip\":\"Introduzca los datos aquí ...\",\"app_title\":\"Guardar página web sin conexión\",\"app_title_tip\":\"Introduzca el enlace del sitio web que desea alojar sin conexión aquí\",\"lang_key\":\"es\"}',	'es'),
('{\"select_display_lang\":\"Escolha a sua língua ou país\",\"none_item\":\"Não foram criados arquivos web offline\",\"logout\":\"Registar-se\",\"close\":\"Fechado\",\"completed\":\"Concluído\",\"password\":\"senha\",\"account_login_fail\":\"O login falhou, por favor verifique a sua senha\",\"account_phone\":\"Número de telefone\",\"list_web\":\"Lista de páginas arquivadas\",\"list\":\"Lista\",\"save_web\":\"Guardar página web\",\"donation_tip\":\"Por favor, doe-nos uma pequena quantidade do seu dinheiro para manter os nossos serviços e desenvolver mais aplicações para a vida!\",\"donation\":\"Doar\",\"create_new\":\"Criar novo\",\"login_tip\":\"Faça login na sua conta Carrot para gerir backups do site offline\",\"link_error\":\"A ligação está mal formada (por exemplo, http:\\/\\/www.abc.com)\",\"account_login\":\"Iniciar sessão\",\"other_app\":\"Outras aplicações do desenvolvedor\",\"inp_tip\":\"Insira os dados aqui...\",\"app_title\":\"Salvar página web offline\",\"app_title_tip\":\"Insira o link do site que pretende hospedar offline aqui\",\"lang_key\":\"pt\"}',	'pt'),
('{\"select_display_lang\":\"Choisissez votre langue ou votre pays\",\"none_item\":\"Aucune archive web hors ligne n’a été créée\",\"logout\":\"Déconnectez-vous\",\"close\":\"Fermé\",\"completed\":\"Terminé\",\"password\":\"mot de passe\",\"account_login_fail\":\"Connexion a échoué, s’il vous plaît vérifier votre mot de passe\",\"account_phone\":\"Numéro de téléphone\",\"list_web\":\"Liste des pages archivées\",\"list\":\"Liste\",\"save_web\":\"Enregistrer la page Web\",\"donation_tip\":\"S’il vous plaît faire don d’une petite quantité de votre argent pour nous maintenir nos services et de développer d’autres applications pour la vie!\",\"donation\":\"Donner\",\"create_new\":\"Créer de nouveaux\",\"login_tip\":\"Connectez-vous à votre compte Carotte pour gérer les sauvegardes du site hors connexion\",\"link_error\":\"Le lien est mal formé (p. ex. http:\\/\\/www.abc.com)\",\"account_login\":\"Connectez-vous\",\"other_app\":\"Autres applications du développeur\",\"inp_tip\":\"Entrez les données ici ...\",\"app_title\":\"Enregistrer la page Web hors ligne\",\"app_title_tip\":\"Entrez le lien du site Web que vous souhaitez héberger hors ligne ici\",\"lang_key\":\"fr\"}',	'fr'),
('{\"select_display_lang\":\"अपनी भाषा या देश चुनें\",\"none_item\":\"कोई ऑफलाइन वेब अभिलेखागार नहीं बनाया गया है\",\"logout\":\"लॉग आउट करें\",\"close\":\"बंद\",\"completed\":\"पूरा किया\",\"password\":\"पासवर्ड\",\"account_login_fail\":\"लॉगिन विफल रहा, कृपया अपना पासवर्ड देखें\",\"account_phone\":\"फोन संख्या\",\"list_web\":\"संग्रहीत पृष्ठों की सूची\",\"list\":\"सूची\",\"save_web\":\"वेब पेज सहेजें\",\"donation_tip\":\"कृपया हमारी सेवाओं को बनाए रखने और जीवन के लिए और अधिक महान अनुप्रयोगों को विकसित करने के लिए हमें अपने पैसे की एक छोटी राशि दान!\",\"donation\":\"दान करना\",\"create_new\":\"नया बनाएं\",\"login_tip\":\"साइट बैकअप ऑफ़लाइन प्रबंधन करने के लिए अपने गाजर खाते में लॉग इन करें\",\"link_error\":\"लिंक विकृत है (जैसे http:\\/\\/www.abc.com)\",\"account_login\":\"लॉग इन करो\",\"other_app\":\"डेवलपर से अन्य आवेदन\",\"inp_tip\":\"यहां डेटा दर्ज करें ...\",\"app_title\":\"वेब पेज ऑफ़लाइन सहेजें\",\"app_title_tip\":\"वेबसाइट लिंक दर्ज करें जिसे आप यहां ऑफ़लाइन होस्ट करना चाहते हैं\",\"lang_key\":\"hi\"}',	'hi'),
('{\"select_display_lang\":\"选择您的语言或国家\\/地区\",\"none_item\":\"未创建脱机 Web 存档\",\"logout\":\"注销\",\"close\":\"关闭\",\"completed\":\"完成\",\"password\":\"密码\",\"account_login_fail\":\"登录失败，请检查您的密码\",\"account_phone\":\"电话号码\",\"list_web\":\"存档页面列表\",\"list\":\"列表\",\"save_web\":\"保存网页\",\"donation_tip\":\"请捐赠你的钱给我们，以维持我们的服务，开发更多的伟大的应用程序终身！\",\"donation\":\"捐赠\",\"create_new\":\"创建新\",\"login_tip\":\"登录到您的胡萝卜帐户以脱机管理站点备份\",\"link_error\":\"链路格式不正确（例如http:\\/\\/www.abc.com）\",\"account_login\":\"登录\",\"other_app\":\"开发人员的其他应用程序\",\"inp_tip\":\"在此处输入数据...\",\"app_title\":\"脱机保存网页\",\"app_title_tip\":\"在此处输入要脱机托管的网站链接\",\"lang_key\":\"zh\"}',	'zh'),
('{\"select_display_lang\":\"Выберите свой язык или страну\",\"none_item\":\"Не создано автономных веб-архивов\",\"logout\":\"Вход в систему\",\"close\":\"Закрыт\",\"completed\":\"Завершена\",\"password\":\"Пароль\",\"account_login_fail\":\"Войти не удалось, пожалуйста, проверьте свой пароль\",\"account_phone\":\"Номер телефона\",\"list_web\":\"Список архивных страниц\",\"list\":\"Список\",\"save_web\":\"Сохранить веб-страницу\",\"donation_tip\":\"Пожалуйста, пожертвуйте небольшую сумму ваших денег нам, чтобы сохранить наши услуги и разработать более большие приложения для жизни!\",\"donation\":\"Пожертвовать\",\"create_new\":\"Создание новых\",\"login_tip\":\"Войти в свою учетную запись Морковь для управления резервными копиями сайта в автономном режиме\",\"link_error\":\"Ссылка порока (например, http:\\/\\/www.abc.com)\",\"account_login\":\"Войти\",\"other_app\":\"Другие приложения от разработчика\",\"inp_tip\":\"Введите данные здесь ...\",\"app_title\":\"Сохранение веб-страницы в автономном режиме\",\"app_title_tip\":\"Введите ссылку на веб-сайт, который вы хотите разместить в автономном режиме здесь\",\"lang_key\":\"ru\"}',	'ru'),
('{\"select_display_lang\":\"Wählen Sie Ihre Sprache oder Ihr Land\",\"none_item\":\"Es wurden keine Offline-Webarchive erstellt.\",\"logout\":\"Abmelden\",\"close\":\"Geschlossen\",\"completed\":\"Abgeschlossen\",\"password\":\"Passwort\",\"account_login_fail\":\"Login fehlgeschlagen, bitte überprüfen Sie Ihr Passwort\",\"account_phone\":\"Telefonnummer\",\"list_web\":\"Liste archivierter Seiten\",\"list\":\"Liste\",\"save_web\":\"Webseite speichern\",\"donation_tip\":\"Bitte spenden Sie uns einen kleinen Teil Ihres Geldes, um unsere Dienstleistungen zu erhalten und weitere tolle Anwendungen für das Leben zu entwickeln!\",\"donation\":\"Spenden\",\"create_new\":\"Neue erstellen\",\"login_tip\":\"Melden Sie sich bei Ihrem Carrot-Konto an, um Standortsicherungen offline zu verwalten\",\"link_error\":\"Die Verbindung ist falsch (z.B. http:\\/\\/www.abc.com)\",\"account_login\":\"Anmelden\",\"other_app\":\"Andere Anwendungen des Entwicklers\",\"inp_tip\":\"Geben Sie hier Daten ein ...\",\"app_title\":\"Webseite offline speichern\",\"app_title_tip\":\"Geben Sie hier den Website-Link ein, den Sie offline hosten möchten.\",\"lang_key\":\"de\"}',	'de'),
('{\"select_display_lang\":\"เลือกภาษาหรือประเทศของคุณ\",\"none_item\":\"ไม่มีการสร้างเว็บเก็บถาวรแบบออฟไลน์\",\"logout\":\"ออกจากระบบ\",\"close\":\"ปิด\",\"completed\":\"เสร็จ สมบูรณ์\",\"password\":\"รหัส ผ่าน\",\"account_login_fail\":\"เข้าสู่ระบบล้มเหลวโปรดตรวจสอบรหัสผ่านของคุณ\",\"account_phone\":\"หมายเลขโทรศัพท์\",\"list_web\":\"รายการของหน้าที่เก็บถาวร\",\"list\":\"รายการ\",\"save_web\":\"บันทึกเว็บเพจ\",\"donation_tip\":\"กรุณาบริจาคเงินจํานวนเล็กน้อยของคุณให้เราเพื่อรักษาบริการของเราและพัฒนาโปรแกรมที่ดีมากขึ้นสําหรับชีวิต!\",\"donation\":\"บริจาค\",\"create_new\":\"สร้างใหม่\",\"login_tip\":\"เข้าสู่ระบบบัญชีแครอทของคุณในการจัดการการสํารองข้อมูลเว็บไซต์แบบออฟไลน์\",\"link_error\":\"ลิงก์มีรูปแบบไม่ถูกต้อง (เช่น http:\\/\\/www.abc.com)\",\"account_login\":\"เข้าสู่ระบบ\",\"other_app\":\"โปรแกรมอื่น ๆ จากนักพัฒนา\",\"inp_tip\":\"ป้อนข้อมูลที่นี่ ...\",\"app_title\":\"บันทึกเว็บเพจแบบออฟไลน์\",\"app_title_tip\":\"ใส่ลิงก์เว็บไซต์ที่คุณต้องการโฮสต์แบบออฟไลน์ที่นี่\",\"lang_key\":\"th\"}',	'th'),
('{\"select_display_lang\":\"언어 또는 국가 선택\",\"none_item\":\"오프라인 웹 아카이브가 생성되지 않았습니다.\",\"logout\":\"로그아웃\",\"close\":\"폐쇄\",\"completed\":\"완료\",\"password\":\"암호\",\"account_login_fail\":\"로그인에 실패, 암호를 확인하시기 바랍니다\",\"account_phone\":\"전화 번호\",\"list_web\":\"보관된 페이지 목록\",\"list\":\"목록\",\"save_web\":\"웹 페이지 저장\",\"donation_tip\":\"우리의 서비스를 유지하고 삶에 대한 더 좋은 응용 프로그램을 개발하기 위해 우리에게 당신의 돈의 작은 금액을 기부하시기 바랍니다!\",\"donation\":\"기부\",\"create_new\":\"새 만들기\",\"login_tip\":\"당근 계정에 로그인하여 사이트 백업을 오프라인으로 관리\",\"link_error\":\"링크가 변형되었습니다(예: http:\\/\\/www.abc.com)\",\"account_login\":\"로그인\",\"other_app\":\"개발자의 다른 응용 프로그램\",\"inp_tip\":\"여기에 데이터를 입력 ...\",\"app_title\":\"웹 페이지 오프라인 저장\",\"app_title_tip\":\"여기에서 오프라인으로 호스팅할 웹 사이트 링크를 입력합니다.\",\"lang_key\":\"ko\"}',	'ko'),
('{\"select_display_lang\":\"言語または国を選択する\",\"none_item\":\"オフラインの Web アーカイブが作成されていません\",\"logout\":\"ログアウト\",\"close\":\"閉鎖\",\"completed\":\"完了\",\"password\":\"パスワード\",\"account_login_fail\":\"ログインに失敗しました、 パスワードを確認してください\",\"account_phone\":\"電話番号\",\"list_web\":\"アーカイブされたページの一覧\",\"list\":\"リスト\",\"save_web\":\"Web ページの保存\",\"donation_tip\":\"私たちのサービスを維持し、人生のためのより偉大なアプリケーションを開発するために私たちにあなたのお金の少額を寄付してください!\",\"donation\":\"寄付\",\"create_new\":\"新規作成\",\"login_tip\":\"サイトのバックアップをオフラインで管理するには、キャロットアカウントにログインします。\",\"link_error\":\"リンクの形式が正しくありません (例: http:\\/\\/www.abc.com)\",\"account_login\":\"ログイン\",\"other_app\":\"開発者からのその他のアプリケーション\",\"inp_tip\":\"ここにデータを入力してください.\",\"app_title\":\"Web ページをオフラインで保存\",\"app_title_tip\":\"オフラインでホストする Web サイトリンクをここに入力してください\",\"lang_key\":\"ja\"}',	'ja'),
('{\"select_display_lang\":\"اختر لغتك أو بلدك\",\"none_item\":\"لم يتم إنشاء محفوظات ويب دون اتصال\",\"logout\":\"تسجيل الخروج\",\"close\":\"مغلقه\",\"completed\":\"اكمال\",\"password\":\"كلمه المرور\",\"account_login_fail\":\"فشل تسجيل الدخول، يرجى التحقق من كلمة المرور الخاصة بك\",\"account_phone\":\"رقم الهاتف\",\"list_web\":\"قائمة الصفحات المؤرشفة\",\"list\":\"قائمه\",\"save_web\":\"حفظ صفحة الويب\",\"donation_tip\":\"يرجى التبرع بمبلغ صغير من أموالك لنا للحفاظ على خدماتنا وتطوير المزيد من التطبيقات العظيمة للحياة!\",\"donation\":\"التبرع\",\"create_new\":\"إنشاء جديد\",\"login_tip\":\"تسجيل الدخول إلى حساب الجزرة الخاص بك لإدارة النسخ الاحتياطية للموقع دون اتصال\",\"link_error\":\"الارتباط مشوه (على سبيل المثال http:\\/\\/www.abc.com)\",\"account_login\":\"تسجيل الدخول\",\"other_app\":\"تطبيقات أخرى من المطور\",\"inp_tip\":\"أدخل البيانات هنا ...\",\"app_title\":\"حفظ صفحة الويب دون اتصال\",\"app_title_tip\":\"أدخل رابط موقع الويب الذي تريد استضافته دون اتصال هنا\",\"lang_key\":\"ar\"}',	'ar'),
('{\"select_display_lang\":\"Dilinizi veya ülkenizi seçin\",\"none_item\":\"Çevrimdışı web arşivleri oluşturulmama\",\"logout\":\"Oturumu çıkış\",\"close\":\"Kapalı\",\"completed\":\"Tamamlandı\",\"password\":\"Parola\",\"account_login_fail\":\"Giriş başarısız oldu, lütfen şifrenizi kontrol edin\",\"account_phone\":\"Telefon numarası\",\"list_web\":\"Arşivlenmiş sayfalar listesi\",\"list\":\"Liste\",\"save_web\":\"Web sayfasını kaydetme\",\"donation_tip\":\"Hizmetlerimizi sürdürmek ve yaşam için daha büyük uygulamalar geliştirmek için bize para küçük bir miktar bağış lütfen!\",\"donation\":\"Bağış\",\"create_new\":\"Yeni oluşturma\",\"login_tip\":\"Site yedeklemelerini çevrimdışı yönetmek için Carrot hesabınızda oturum açın\",\"link_error\":\"Bağlantı yanlış biçimlendirilmiştir (örn. http:\\/\\/www.abc.com)\",\"account_login\":\"Oturum aç\",\"other_app\":\"Geliştiriciden diğer uygulamalar\",\"inp_tip\":\"Burada veri girin ...\",\"app_title\":\"Web sayfasını çevrimdışı kaydetme\",\"app_title_tip\":\"Çevrimdışı barındırmak istediğiniz web sitesi bağlantısını buraya girin\",\"lang_key\":\"tr\"}',	'tr'),
('{\"select_display_lang\":\"Valitse kieli tai maa\",\"none_item\":\"Offline-verkkoarkistoja ei ole luotu\",\"logout\":\"Kirjaudu ulos\",\"close\":\"Suljettu\",\"completed\":\"Valmis\",\"password\":\"Salasana\",\"account_login_fail\":\"Kirjautuminen epäonnistui, tarkista salasanasi\",\"account_phone\":\"Puhelinnumero\",\"list_web\":\"Arkistoitujen sivujen luettelo\",\"list\":\"Luettelo\",\"save_web\":\"Tallenna web-sivu\",\"donation_tip\":\"Lahjoita pieni määrä rahaa meille ylläpitää palvelujamme ja kehittää enemmän suuria sovelluksia elämää!\",\"donation\":\"Lahjoittaa\",\"create_new\":\"Luo uusi\",\"login_tip\":\"Kirjaudu Carrot-tiliisi ja hallitse sivuston varmuuskopioita offline-tilassa\",\"link_error\":\"Linkki on epämuodostunut (esim. http:\\/\\/www.abc.com)\",\"account_login\":\"Kirjaudu sisään\",\"other_app\":\"Muut sovellukset kehittäjä\",\"inp_tip\":\"Anna tiedot tähän ...\",\"app_title\":\"Web-sivun tallentaminen offline-tilaan\",\"app_title_tip\":\"Kirjoita sivustolinkki, jonka haluat isännöidä offline-tilassa, tähän\",\"lang_key\":\"fi\"}',	'fi'),
('{\"select_display_lang\":\"Scegli la tua lingua o il tuo paese\",\"none_item\":\"Non sono stati creati archivi Web offline\",\"logout\":\"Disconnettersi\",\"close\":\"Chiuso\",\"completed\":\"Completato\",\"password\":\"Password\",\"account_login_fail\":\"Login non riuscito, si prega di controllare la password\",\"account_phone\":\"Numero di telefono\",\"list_web\":\"Elenco delle pagine archiviate\",\"list\":\"Elenco\",\"save_web\":\"Salva pagina Web\",\"donation_tip\":\"Si prega di donare una piccola quantità di vostri soldi a noi per mantenere i nostri servizi e sviluppare più grandi applicazioni per la vita!\",\"donation\":\"Donare\",\"create_new\":\"Crea nuovo\",\"login_tip\":\"Accedi al tuo account Carrot per gestire i backup del sito offline\",\"link_error\":\"Il collegamento non è valido (ad es. http:\\/\\/www.abc.com)\",\"account_login\":\"Accedi\",\"other_app\":\"Altre applicazioni dello sviluppatore\",\"inp_tip\":\"Inserire i dati qui ...\",\"app_title\":\"Salvare la pagina Web offline\",\"app_title_tip\":\"Inserisci qui il link al sito web che vuoi ospitare offline\",\"lang_key\":\"it\"}',	'it'),
('{\"select_display_lang\":\"Pilih bahasa atau negara Anda\",\"none_item\":\"Tidak ada Arsip Web offline telah dibuat\",\"logout\":\"Keluar\",\"close\":\"Ditutup\",\"completed\":\"Selesai\",\"password\":\"Password\",\"account_login_fail\":\"Login gagal, silakan periksa password Anda\",\"account_phone\":\"Nomor telepon\",\"list_web\":\"Daftar halaman yang Diarsipkan\",\"list\":\"Daftar\",\"save_web\":\"Simpan halaman web\",\"donation_tip\":\"Harap menyumbangkan sejumlah kecil uang Anda kepada kami untuk menjaga layanan kami dan mengembangkan aplikasi yang lebih besar untuk hidup!\",\"donation\":\"Menyumbangkan\",\"create_new\":\"Buat baru\",\"login_tip\":\"Masuk ke akun Carrot Anda untuk mengelola backup situs secara offline\",\"link_error\":\"Link ini cacat (misalnya http:\\/\\/www.abc.com)\",\"account_login\":\"Masuk\",\"other_app\":\"Aplikasi lain dari pengembang\",\"inp_tip\":\"Masukkan data di sini...\",\"app_title\":\"Simpan halaman web secara offline\",\"app_title_tip\":\"Masukkan link website Anda ingin host offline di sini\",\"lang_key\":\"id\"}',	'id'),
('{\"select_display_lang\":\"Vælg dit sprog eller land\",\"none_item\":\"Der er ikke oprettet offline webarkiver\",\"logout\":\"Log af\",\"close\":\"Lukket\",\"completed\":\"Afsluttet\",\"password\":\"Adgangskode\",\"account_login_fail\":\"Login mislykkedes, skal du tjekke din adgangskode\",\"account_phone\":\"Telefonnummer\",\"list_web\":\"Liste over arkiverede sider\",\"list\":\"Liste\",\"save_web\":\"Gem webside\",\"donation_tip\":\"Venligst donere en lille mængde af dine penge til os for at opretholde vores tjenester og udvikle flere store applikationer for livet!\",\"donation\":\"Donere\",\"create_new\":\"Opret ny\",\"login_tip\":\"Log ind på din Gulerod-konto for at administrere sikkerhedskopier af webstedet offline\",\"link_error\":\"Linket er forkert udformet (f.eks. http:\\/\\/www.abc.com)\",\"account_login\":\"Log på\",\"other_app\":\"Andre programmer fra udvikleren\",\"inp_tip\":\"Indtast data her ...\",\"app_title\":\"Gemme webside offline\",\"app_title_tip\":\"Indtast det link til webstedet, du vil hoste offline her\",\"lang_key\":\"da\"}',	'da'),
('{\"select_display_lang\":\"Kies uw taal of land\",\"none_item\":\"Er zijn geen offline webarchieven gemaakt\",\"logout\":\"Uitloging\",\"close\":\"Gesloten\",\"completed\":\"Voltooid\",\"password\":\"Wachtwoord\",\"account_login_fail\":\"Inloggen is mislukt, controleer uw wachtwoord\",\"account_phone\":\"Telefoonnummer\",\"list_web\":\"Lijst met gearchiveerde pagina\'s\",\"list\":\"Lijst\",\"save_web\":\"Webpagina opslaan\",\"donation_tip\":\"Doneer een klein deel van uw geld aan ons om onze diensten te onderhouden en meer geweldige toepassingen voor het leven te ontwikkelen!\",\"donation\":\"Doneren\",\"create_new\":\"Nieuwe maken\",\"login_tip\":\"Log in op uw Carrot-account om siteback-ups offline te beheren\",\"link_error\":\"De link is misvormd (bijv. http:\\/\\/www.abc.com)\",\"account_login\":\"Aanmelden\",\"other_app\":\"Andere toepassingen van de ontwikkelaar\",\"inp_tip\":\"Voer hier gegevens in ...\",\"app_title\":\"Webpagina offline opslaan\",\"app_title_tip\":\"Voer hier de websitekoppeling in die u offline wilt hosten\",\"lang_key\":\"nl\"}',	'nl'),
('{\"select_display_lang\":\"Wybierz swój język lub kraj\",\"none_item\":\"Nie utworzono archiwów internetowych w trybie offline\",\"logout\":\"Wyloguj się\",\"close\":\"Zamknięta\",\"completed\":\"Zakończone\",\"password\":\"Hasło\",\"account_login_fail\":\"Logowanie nie powiodło się, sprawdź hasło\",\"account_phone\":\"Numer telefonu\",\"list_web\":\"Lista zarchiwizowanych stron\",\"list\":\"lista\",\"save_web\":\"Zapisywanie strony internetowej\",\"donation_tip\":\"Prosimy o przekazanie nam niewielkiej kwoty pieniędzy na utrzymanie naszych usług i opracowanie kolejnych wspaniałych aplikacji na całe życie!\",\"donation\":\"Oddania\",\"create_new\":\"Tworzenie nowych\",\"login_tip\":\"Zaloguj się na swoje konto Marchew, aby zarządzać kopiami zapasowymi witryn w trybie offline\",\"link_error\":\"Link jest zniekształcony (np. http:\\/\\/www.abc.com)\",\"account_login\":\"Zaloguj się\",\"other_app\":\"Inne aplikacje od dewelopera\",\"inp_tip\":\"Wprowadź dane tutaj ...\",\"app_title\":\"Zapisywanie strony sieci Web w trybie offline\",\"app_title_tip\":\"Wprowadź link do witryny sieci Web, który chcesz hostować w trybie offline, tutaj\",\"lang_key\":\"pl\"}',	'pl');

DROP TABLE IF EXISTS `web_ar`;
CREATE TABLE `web_ar` (
  `id` varchar(50) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `web_ar`;

DROP TABLE IF EXISTS `web_de`;
CREATE TABLE `web_de` (
  `id` varchar(50) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `web_de`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `web_en`;
CREATE TABLE `web_en` (
  `id` varchar(50) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `web_en`;

DROP TABLE IF EXISTS `web_es`;
CREATE TABLE `web_es` (
  `id` varchar(50) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `web_es`;

DROP TABLE IF EXISTS `web_fr`;
CREATE TABLE `web_fr` (
  `id` varchar(50) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `web_fr`;

DROP TABLE IF EXISTS `web_hi`;
CREATE TABLE `web_hi` (
  `id` varchar(50) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `web_hi`;

DROP TABLE IF EXISTS `web_ja`;
CREATE TABLE `web_ja` (
  `id` varchar(50) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `web_ja`;

DROP TABLE IF EXISTS `web_ko`;
CREATE TABLE `web_ko` (
  `id` varchar(50) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `web_ko`;

DROP TABLE IF EXISTS `web_pt`;
CREATE TABLE `web_pt` (
  `id` varchar(50) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `web_pt`;

DROP TABLE IF EXISTS `web_ru`;
CREATE TABLE `web_ru` (
  `id` varchar(50) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `web_ru`;

DROP TABLE IF EXISTS `web_th`;
CREATE TABLE `web_th` (
  `id` varchar(50) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `web_th`;

DROP TABLE IF EXISTS `web_tr`;
CREATE TABLE `web_tr` (
  `id` varchar(50) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `web_tr`;

DROP TABLE IF EXISTS `web_vi`;
CREATE TABLE `web_vi` (
  `id` varchar(50) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `web_vi`;

DROP TABLE IF EXISTS `web_zh`;
CREATE TABLE `web_zh` (
  `id` varchar(50) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

TRUNCATE `web_zh`;

-- 2021-02-25 08:51:48
