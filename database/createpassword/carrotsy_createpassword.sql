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
('app_title'),
('show_passwor_tip'),
('copy'),
('create_new'),
('option_advanced'),
('option_1'),
('option_2'),
('option_3'),
('option_4'),
('save_tag'),
('inp_tip'),
('length_password'),
('save_and_copy_password'),
('copy_success'),
('list_password'),
('other_app'),
('login'),
('login_tip'),
('account_phone'),
('password'),
('back'),
('logout'),
('account_login_fail'),
('save_username'),
('donation_tip'),
('donation'),
('no_item_password'),
('sel_app_lang'),
('register'),
('account_name'),
('user_address'),
('done'),
('error_user_email'),
('error_user_phone'),
('sex_val_0'),
('sex_val_1'),
('account_sex'),
('error_user_name'),
('error_user_password'),
('register_success'),
('user_rep_password'),
('error_user_already'),
('account_user'),
('account_update_info_success'),
('status_share'),
('status_share_0'),
('status_share_1'),
('account_update_info'),
('change_password'),
('error_password_old'),
('password_old'),
('password_new');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `password_ar`;
CREATE TABLE `password_ar` (
  `id` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `password_ar`;

DROP TABLE IF EXISTS `password_de`;
CREATE TABLE `password_de` (
  `id` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `password_de`;

DROP TABLE IF EXISTS `password_en`;
CREATE TABLE `password_en` (
  `id` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `password_en`;

DROP TABLE IF EXISTS `password_es`;
CREATE TABLE `password_es` (
  `id` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `password_es`;

DROP TABLE IF EXISTS `password_fr`;
CREATE TABLE `password_fr` (
  `id` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `password_fr`;

DROP TABLE IF EXISTS `password_hi`;
CREATE TABLE `password_hi` (
  `id` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `password_hi`;

DROP TABLE IF EXISTS `password_ja`;
CREATE TABLE `password_ja` (
  `id` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `password_ja`;

DROP TABLE IF EXISTS `password_ko`;
CREATE TABLE `password_ko` (
  `id` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `password_ko`;

DROP TABLE IF EXISTS `password_pt`;
CREATE TABLE `password_pt` (
  `id` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `password_pt`;

DROP TABLE IF EXISTS `password_ru`;
CREATE TABLE `password_ru` (
  `id` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `password_ru`;

DROP TABLE IF EXISTS `password_th`;
CREATE TABLE `password_th` (
  `id` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `password_th`;

DROP TABLE IF EXISTS `password_tr`;
CREATE TABLE `password_tr` (
  `id` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `password_tr`;

DROP TABLE IF EXISTS `password_vi`;
CREATE TABLE `password_vi` (
  `id` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `password_vi`;
INSERT INTO `password_vi` (`id`, `password`, `tag`, `username`, `date`, `id_user`) VALUES
('5ecbe904004175ecbe90400419',	'0waDfF9j',	'facebook',	'kurotsmile',	'2020-05-25 22:49:24',	'2d0cf55bdd8a4848131c04524cd7bb6e');

DROP TABLE IF EXISTS `password_zh`;
CREATE TABLE `password_zh` (
  `id` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `password_zh`;

DROP TABLE IF EXISTS `value_lang`;
CREATE TABLE `value_lang` (
  `value` text NOT NULL,
  `id_country` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

TRUNCATE `value_lang`;
INSERT INTO `value_lang` (`value`, `id_country`) VALUES
('{\"app_title\":\"Create a password\",\"show_passwor_tip\":\"Password generated automatically for you\",\"copy\":\"Copy\",\"create_new\":\"Create new\",\"option_advanced\":\"Advance setting\",\"option_1\":\"Contains uppercase characters\",\"option_2\":\"Contains lowercase characters\",\"option_3\":\"Contains numbers\",\"option_4\":\"Contains special characters\",\"save_tag\":\"Enter the name of the storage card (help you remember for example: Facebook)\",\"inp_tip\":\"Enter data here ...\",\"length_password\":\"Password length\",\"save_and_copy_password\":\"Store and copy the password\",\"copy_success\":\"Copy successful !!!\",\"list_password\":\"List of your passwords\",\"other_app\":\"Other applications from the developer\",\"login\":\"Log in\",\"login_tip\":\"Log in to your carrot account to manage your passwords\",\"account_phone\":\"Your phone number\",\"password\":\"Password\",\"back\":\"Back\",\"logout\":\"Log out\",\"account_login_fail\":\"Login failed, please check your password\",\"save_username\":\"Save username\",\"donation_tip\":\"Please donate a small amount of your money to us to maintain our services and develop more great applications for life!\",\"donation\":\"Donate\",\"no_item_password\":\"No passwords have been stored yet\",\"sel_app_lang\":\"Choose your language and country\",\"register\":\"Registration\",\"account_name\":\"Full name\",\"user_address\":\"Address\",\"done\":\"Completed\",\"error_user_email\":\"Email is malformed\",\"error_user_phone\":\"Phone number must not be blank and greater than 9 Digit characters\",\"sex_val_0\":\"male\",\"sex_val_1\":\"Female\",\"account_sex\":\"Sex\",\"error_user_name\":\"Name cannot be blank and greater than 5 characters\",\"error_user_password\":\"Password must not be blank and must be greater than 6 characters\",\"register_success\":\"Sign Up Success! Click login to use the registered account\",\"user_rep_password\":\"Enter the password\",\"error_user_already\":\"This account already exists, you cannot create new ones with this information\",\"account_user\":\"Account\",\"account_update_info_success\":\"Update account information successfully!\",\"status_share\":\"Information sharing status\",\"status_share_0\":\"Share information with everyone\",\"status_share_1\":\"Do not share information\",\"account_update_info\":\"Update information\",\"change_password\":\"Change Password\",\"error_password_old\":\"The old password is incorrect\",\"password_old\":\"old password\",\"password_new\":\"A new password\",\"lang_key\":\"en\"}',	'en'),
('{\"app_title\":\"Tạo Mật khẩu\",\"show_passwor_tip\":\"Mật khẩu được tạo tự động cho bạn\",\"copy\":\"Sao chép\",\"create_new\":\"Tạo mới\",\"option_advanced\":\"Tùy chỉnh nân cao\",\"option_1\":\"Chứa các ký tự viết hoa\",\"option_2\":\"Chứa các ký tự chữ thường\",\"option_3\":\"Chứa số\",\"option_4\":\"Chứa các ký tự đặc biệt\",\"save_tag\":\"nhập tên thẻ lưu trữ (giúp bạn nhớ ví dụ: Facebook)\",\"inp_tip\":\"Nhập dữ liệu vào đây...\",\"length_password\":\"Độ dài mật khẩu\",\"save_and_copy_password\":\"Lưu trữ và sao chép mật khẩu\",\"copy_success\":\"Sao chép thành công!!!\",\"list_password\":\"Danh sách mật khẩu của bạn\",\"other_app\":\"Các ứng dụng khác từ nhà phát triển\",\"login\":\"Đăng nhập\",\"login_tip\":\"Đăng nhập tài khoản carrot để quản lý các mật khẩu của bạn\",\"account_phone\":\"Số điện thoại của bạn\",\"password\":\"Mật khẩu\",\"back\":\"Trở về\",\"logout\":\"Đăng xuất\",\"account_login_fail\":\"Đăng nhập thất bại, vui lòng kiểm tra lại mật khẩu của bạn\",\"save_username\":\"Lưu lại tên đăng nhập\",\"donation_tip\":\"Hãy ủng hộ một phần tiền nhỏ của các bạn để chúng tôi có chi phí để duy trì các dịch vụ và phát triển thêm nhiều ứng dụng hay cho cuộc sống!\",\"donation\":\"Ủng hộ\",\"no_item_password\":\"Chưa có mật khẩu nào được lưu trữ\",\"sel_app_lang\":\"Chọn ngôn ngữ và quốc gia của bạn\",\"register\":\"Đăng ký\",\"account_name\":\"Tên đầy đủ\",\"user_address\":\"Địa chỉ\",\"done\":\"Hoàn tất\",\"error_user_email\":\"Email Không đúng dịnh dạng\",\"error_user_phone\":\"Số điện thoại không được để trống và lớn hơn 9 Ký tự số\",\"sex_val_0\":\"Nam\",\"sex_val_1\":\"Nữ\",\"account_sex\":\"Giới tính\",\"error_user_name\":\"Tên không được để trống và lớn hơn 5 ký tự\",\"error_user_password\":\"Mật khẩu không được để trống và phải lớn hơn 6 ký tự\",\"register_success\":\"Đăng ký thành công! bạn hãy bấm đăng nhập để sử dụng tài khoản đã đăng ký\",\"user_rep_password\":\"Nhập lại mật khẩu\",\"error_user_already\":\"Tài khoản này đã tồn tại, bạn không thể tạo mới với những thông tin này\",\"account_user\":\"Tài khoản\",\"account_update_info_success\":\"Cập nhật thông tin tài khoản thành công!\",\"status_share\":\"Trạng thái chia sẻ thông tin\",\"status_share_0\":\"Chia sẻ thông tin với mọi người\",\"status_share_1\":\"Không chia sẻ thông tin\",\"account_update_info\":\"Cập nhật thông tin\",\"change_password\":\"Đổi mật khẩu\",\"error_password_old\":\"Mật khẩu cũ không chính xác\",\"password_old\":\"mật khẩu cũ\",\"password_new\":\"Mật khẩu mới\",\"lang_key\":\"vi\"}',	'vi'),
('{\"app_title\":\"Crear una contraseña\",\"show_passwor_tip\":\"Contraseña generada automáticamente para usted\",\"copy\":\"Copia\",\"create_new\":\"Crear nuevo\",\"option_advanced\":\"Ajuste avanzado\",\"option_1\":\"Contiene caracteres en mayúsculas\",\"option_2\":\"Contiene caracteres en minúsculas\",\"option_3\":\"Contiene números\",\"option_4\":\"Contiene caracteres especiales\",\"save_tag\":\"Introduzca el nombre de la tarjeta de almacenamiento (ayuda que recuerde, por ejemplo: Facebook)\",\"inp_tip\":\"Introduzca los datos aquí...\",\"length_password\":\"Longitud de la contraseña\",\"save_and_copy_password\":\"Almacene y copie la contraseña\",\"copy_success\":\"Copiar correctamente!!!\",\"list_password\":\"Lista de sus contraseñas\",\"other_app\":\"Otras aplicaciones del desarrollador\",\"login\":\"Inicia sesión\",\"login_tip\":\"Inicia sesión en tu cuenta de zanahoria para administrar tus contraseñas\",\"account_phone\":\"Su número de teléfono\",\"password\":\"Contraseña\",\"back\":\"Atrás\",\"logout\":\"Cerrar sesión\",\"account_login_fail\":\"Error de inicio de sesión, compruebe su contraseña\",\"save_username\":\"Guardar nombre de usuario\",\"donation_tip\":\"Por favor, donar una pequeña cantidad de su dinero a nosotros para mantener nuestros servicios y desarrollar más grandes aplicaciones para la vida!\",\"donation\":\"Donar\",\"no_item_password\":\"Aún no se han almacenado contraseñas\",\"sel_app_lang\":\"Elige tu idioma y país\",\"register\":\"Registro\",\"account_name\":\"Nombre completo\",\"user_address\":\"Habla a\",\"done\":\"Terminado\",\"error_user_email\":\"El correo electrónico está mal formado\",\"error_user_phone\":\"El número de teléfono no debe estar en blanco y tener más de 9 dígitos.\",\"sex_val_0\":\"masculino\",\"sex_val_1\":\"Hembra\",\"account_sex\":\"Sexo\",\"error_user_name\":\"El nombre no puede estar en blanco y tener más de 5 caracteres.\",\"error_user_password\":\"La contraseña no debe estar en blanco y debe tener más de 6 caracteres\",\"register_success\":\"¡Regístrese con éxito! Haga clic en iniciar sesión para usar la cuenta registrada\",\"user_rep_password\":\"Introduce la contraseña\",\"error_user_already\":\"Esta cuenta ya existe, no puede crear otras nuevas con esta información\",\"account_user\":\"Cuenta\",\"account_update_info_success\":\"¡Actualice la información de la cuenta con éxito!\",\"status_share\":\"Estado de intercambio de información\",\"status_share_0\":\"Comparta información con todos\",\"status_share_1\":\"No compartir información\",\"account_update_info\":\"Actualizar información\",\"change_password\":\"Cambia la contraseña\",\"error_password_old\":\"La contraseña anterior es incorrecta\",\"password_old\":\"Contraseña anterior\",\"password_new\":\"Una nueva contraseña\",\"lang_key\":\"es\"}',	'es'),
('{\"app_title\":\"Criar uma senha\",\"show_passwor_tip\":\"Palavra-passe gerada automaticamente para si\",\"copy\":\"Cópia\",\"create_new\":\"Criar Novo\",\"option_advanced\":\"Definição de adiantamento\",\"option_1\":\"Contém caracteres maiúsculas\",\"option_2\":\"Contém caracteres minúsculos\",\"option_3\":\"Contém números\",\"option_4\":\"Contém personagens especiais\",\"save_tag\":\"Insira o nome do cartão de armazenamento (ajude-o a lembrar, por exemplo: Facebook)\",\"inp_tip\":\"Introduza os dados aqui...\",\"length_password\":\"Comprimento da palavra-passe\",\"save_and_copy_password\":\"Armazenar e copiar a senha\",\"copy_success\":\"Cópia bem sucedida!!!\",\"list_password\":\"Lista das suas palavras-passe\",\"other_app\":\"Outras aplicações do desenvolvedor\",\"login\":\"Iniciar sessão\",\"login_tip\":\"Faça login na sua conta de cenoura para gerir as suas palavras-passe\",\"account_phone\":\"O seu número de telefone\",\"password\":\"Senha\",\"back\":\"Voltar\",\"logout\":\"Registar-se\",\"account_login_fail\":\"O login falhou, por favor verifique a sua senha\",\"save_username\":\"Salvar o nome de utilizador\",\"donation_tip\":\"Por favor, doe-nos uma pequena quantidade do seu dinheiro para manter os nossos serviços e desenvolver mais aplicações para a vida!\",\"donation\":\"Doar\",\"no_item_password\":\"Ainda não foram armazenadas senhas.\",\"sel_app_lang\":\"Escolha a sua língua e país\",\"register\":\"Cadastro\",\"account_name\":\"Nome completo\",\"user_address\":\"Endereço\",\"done\":\"Concluído\",\"error_user_email\":\"O email está incorreto\",\"error_user_phone\":\"O número de telefone não pode ficar em branco e ter mais de 9 dígitos\",\"sex_val_0\":\"masculino\",\"sex_val_1\":\"Fêmea\",\"account_sex\":\"Sexo\",\"error_user_name\":\"O nome não pode ficar em branco e ter mais de 5 caracteres\",\"error_user_password\":\"A senha não deve ficar em branco e deve ter mais de 6 caracteres\",\"register_success\":\"Inscreva-se Sucesso! Clique em login para usar a conta registrada\",\"user_rep_password\":\"Digite a senha\",\"error_user_already\":\"Esta conta já existe, você não pode criar novas com essas informações\",\"account_user\":\"Conta\",\"account_update_info_success\":\"Atualize as informações da conta com sucesso!\",\"status_share\":\"Status de compartilhamento de informações\",\"status_share_0\":\"Compartilhe informações com todos\",\"status_share_1\":\"Não compartilhe informações\",\"account_update_info\":\"Atualizar informação\",\"change_password\":\"Mudar senha\",\"error_password_old\":\"A senha antiga está incorreta\",\"password_old\":\"Senha Antiga\",\"password_new\":\"Uma nova senha\",\"lang_key\":\"pt\"}',	'pt'),
('{\"app_title\":\"Créer un mot de passe\",\"show_passwor_tip\":\"Mot de passe généré automatiquement pour vous\",\"copy\":\"Copie\",\"create_new\":\"Créer de nouveaux\",\"option_advanced\":\"Réglage d’avance\",\"option_1\":\"Contient des caractères Uppercase\",\"option_2\":\"Contient des caractères minuscules\",\"option_3\":\"Contient des numéros\",\"option_4\":\"Contient des caractères spéciaux\",\"save_tag\":\"Entrez le nom de la carte de stockage (aide à vous souvenir par exemple : Facebook)\",\"inp_tip\":\"Entrez les données ici...\",\"length_password\":\"Longueur de mot de passe\",\"save_and_copy_password\":\"Stocker et copier le mot de passe\",\"copy_success\":\"Copie réussie!!!\",\"list_password\":\"Liste de vos mots de passe\",\"other_app\":\"Autres applications du développeur\",\"login\":\"Connectez-vous\",\"login_tip\":\"Connectez-vous à votre compte de carottes pour gérer vos mots de passe\",\"account_phone\":\"Votre numéro de téléphone\",\"password\":\"mot de passe\",\"back\":\"Précédent\",\"logout\":\"Déconnectez-vous\",\"account_login_fail\":\"Connexion a échoué, s’il vous plaît vérifier votre mot de passe\",\"save_username\":\"Enregistrer le nom d’utilisateur\",\"donation_tip\":\"S’il vous plaît faire don d’une petite quantité de votre argent pour nous maintenir nos services et de développer d’autres applications pour la vie!\",\"donation\":\"Donner\",\"no_item_password\":\"Aucun mot de passe n’a encore été stocké\",\"sel_app_lang\":\"Choisissez votre langue et votre pays\",\"register\":\"enregistrement\",\"account_name\":\"Nom complet\",\"user_address\":\"Adresse\",\"done\":\"Terminé\",\"error_user_email\":\"L\'email est mal formé\",\"error_user_phone\":\"Le numéro de téléphone ne doit pas être vierge et supérieur à 9 caractères numériques\",\"sex_val_0\":\"Masculin\",\"sex_val_1\":\"Femme\",\"account_sex\":\"Sexe\",\"error_user_name\":\"Le nom ne peut pas être vide et contenir plus de 5 caractères\",\"error_user_password\":\"Le mot de passe ne doit pas être vide et doit être supérieur à 6 caractères\",\"register_success\":\"Inscrivez-vous succès! Cliquez sur connexion pour utiliser le compte enregistré\",\"user_rep_password\":\"Entrer le mot de passe\",\"error_user_already\":\"Ce compte existe déjà, vous ne pouvez pas en créer de nouveaux avec ces informations\",\"account_user\":\"Compte\",\"account_update_info_success\":\"Mettre à jour les informations de compte avec succès!\",\"status_share\":\"Statut de partage d\'informations\",\"status_share_0\":\"Partagez des informations avec tout le monde\",\"status_share_1\":\"Ne pas partager d\'informations\",\"account_update_info\":\"Mettre à jour les informations\",\"change_password\":\"Changer le mot de passe\",\"error_password_old\":\"L\'ancien mot de passe est incorrect\",\"password_old\":\"ancien mot de passe\",\"password_new\":\"Un nouveau mot de passe\",\"lang_key\":\"fr\"}',	'fr'),
('{\"app_title\":\"पासवर्ड बनाएं\",\"show_passwor_tip\":\"आपके लिए स्वचालित रूप से उत्पन्न पासवर्ड\",\"copy\":\"प्रतिलिपि\",\"create_new\":\"नया बनाएं\",\"option_advanced\":\"अग्रिम सेटिंग\",\"option_1\":\"ऊपरी केस वर्ण शामिल हैं\",\"option_2\":\"इसमें लोअरकेस वर्ण शामिल हैं\",\"option_3\":\"संख्याएं शामिल हैं\",\"option_4\":\"विशेष वर्ण शामिल हैं\",\"save_tag\":\"भंडारण कार्ड का नाम दर्ज करें (उदाहरण के लिए याद रखने में आपकी मदद करें: Facebook)\",\"inp_tip\":\"यहां डेटा दर्ज करें ...\",\"length_password\":\"पासवर्ड की लंबाई\",\"save_and_copy_password\":\"पासवर्ड स्टोर और कॉपी करें\",\"copy_success\":\"सफल !!! कॉपी करें\",\"list_password\":\"आपके पासवर्ड की सूची\",\"other_app\":\"डेवलपर से अन्य आवेदन\",\"login\":\"लॉग इन करो\",\"login_tip\":\"अपने पासवर्ड का प्रबंधन करने के लिए अपने गाजर खाते में लॉग इन करें\",\"account_phone\":\"आपके फ़ोन का नंबर\",\"password\":\"पासवर्ड\",\"back\":\"वापस\",\"logout\":\"लॉग आउट करें\",\"account_login_fail\":\"लॉगिन विफल रहा, कृपया अपना पासवर्ड देखें\",\"save_username\":\"उपयोगकर्ता नाम सहेजें\",\"donation_tip\":\"कृपया हमारी सेवाओं को बनाए रखने और जीवन के लिए और अधिक महान अनुप्रयोगों को विकसित करने के लिए हमें अपने पैसे की एक छोटी राशि दान!\",\"donation\":\"दान करना\",\"no_item_password\":\"अभी तक कोई पासवर्ड संग्रहीत नहीं किया गया है\",\"sel_app_lang\":\"अपनी भाषा और देश चुनें\",\"register\":\"पंजीकरण\",\"account_name\":\"पूरा नाम\",\"user_address\":\"पता\",\"done\":\"पूरा कर लिया है\",\"error_user_email\":\"ईमेल विकृत है\",\"error_user_phone\":\"फोन नंबर रिक्त नहीं होना चाहिए और 9 अंकों से अधिक होना चाहिए\",\"sex_val_0\":\"पुरुष\",\"sex_val_1\":\"महिला\",\"account_sex\":\"लिंग\",\"error_user_name\":\"नाम रिक्त नहीं हो सकता है और 5 से अधिक वर्ण हो सकते हैं\",\"error_user_password\":\"पासवर्ड रिक्त नहीं होना चाहिए और 6 वर्णों से अधिक होना चाहिए\",\"register_success\":\"साइन अप सफलता! पंजीकृत खाते का उपयोग करने के लिए लॉगिन पर क्लिक करें\",\"user_rep_password\":\"पासवर्ड दर्ज करे\",\"error_user_already\":\"यह खाता पहले से मौजूद है, आप इस जानकारी के साथ नए नहीं बना सकते\",\"account_user\":\"लेखा\",\"account_update_info_success\":\"खाता जानकारी सफलतापूर्वक अपडेट करें!\",\"status_share\":\"सूचना साझा करने की स्थिति\",\"status_share_0\":\"सभी के साथ जानकारी साझा करें\",\"status_share_1\":\"जानकारी साझा न करें\",\"account_update_info\":\"जानकारी अपडेट करें\",\"change_password\":\"पासवर्ड बदलें\",\"error_password_old\":\"पुराना पासवर्ड गलत है\",\"password_old\":\"पुराना पासवर्ड\",\"password_new\":\"एक नया पासवर्ड\",\"lang_key\":\"hi\"}',	'hi'),
('{\"app_title\":\"创建密码\",\"show_passwor_tip\":\"为您自动生成的密码\",\"copy\":\"复制\",\"create_new\":\"创建新\",\"option_advanced\":\"提前设置\",\"option_1\":\"包含大写字符\",\"option_2\":\"包含小写字符\",\"option_3\":\"包含数字\",\"option_4\":\"包含特殊字符\",\"save_tag\":\"输入存储卡的名称（例如：Facebook）帮助您记住\",\"inp_tip\":\"在此处输入数据...\",\"length_password\":\"密码长度\",\"save_and_copy_password\":\"存储和复制密码\",\"copy_success\":\"复制成功!!!\",\"list_password\":\"密码列表\",\"other_app\":\"开发人员的其他应用程序\",\"login\":\"登录\",\"login_tip\":\"登录您的胡萝卜帐户来管理您的密码\",\"account_phone\":\"您的电话号码\",\"password\":\"密码\",\"back\":\"返回\",\"logout\":\"注销\",\"account_login_fail\":\"登录失败，请检查您的密码\",\"save_username\":\"保存用户名\",\"donation_tip\":\"请捐赠你的钱给我们，以维持我们的服务，开发更多的伟大的应用程序终身！\",\"donation\":\"捐赠\",\"no_item_password\":\"尚未存储任何密码\",\"sel_app_lang\":\"选择您的语言和国家\\/地区\",\"register\":\"注册\",\"account_name\":\"全名\",\"user_address\":\"地址\",\"done\":\"已完成\",\"error_user_email\":\"电子邮件格式错误\",\"error_user_phone\":\"电话号码不能为空且不得超过9个数字字符\",\"sex_val_0\":\"男\",\"sex_val_1\":\"女\",\"account_sex\":\"性别\",\"error_user_name\":\"名称不能为空且不能超过5个字符\",\"error_user_password\":\"密码不能为空，且必须大于6个字符\",\"register_success\":\"注册成功！ 单击登录以使用注册帐户\",\"user_rep_password\":\"输入密码\",\"error_user_already\":\"此帐户已存在，您不能使用此信息创建新帐户\",\"account_user\":\"帐户\",\"account_update_info_success\":\"成功更新帐户信息！\",\"status_share\":\"信息共享状态\",\"status_share_0\":\"与所有人共享信息\",\"status_share_1\":\"不分享信息\",\"account_update_info\":\"更新信息\",\"change_password\":\"更改密码\",\"error_password_old\":\"旧密码错误\",\"password_old\":\"旧密码\",\"password_new\":\"新密码\",\"lang_key\":\"zh\"}',	'zh'),
('{\"app_title\":\"Создание пароля\",\"show_passwor_tip\":\"Пароль, генерируемый автоматически для вас\",\"copy\":\"Копировать\",\"create_new\":\"Создание новых\",\"option_advanced\":\"Предварительная настройка\",\"option_1\":\"Содержит символы верхнего регистра\",\"option_2\":\"Содержит символы нижнего регистра\",\"option_3\":\"Содержит номера\",\"option_4\":\"Содержит специальные символы\",\"save_tag\":\"Введите название карты хранения (помочь вам запомнить, например: Facebook)\",\"inp_tip\":\"Введите данные здесь ...\",\"length_password\":\"Длина пароля\",\"save_and_copy_password\":\"Храните и копируйте пароль\",\"copy_success\":\"Копирование успешных !!!\",\"list_password\":\"Список паролей\",\"other_app\":\"Другие приложения от разработчика\",\"login\":\"Войти\",\"login_tip\":\"Войти в свою учетную запись моркови для управления паролями\",\"account_phone\":\"Ваш номер телефона\",\"password\":\"Пароль\",\"back\":\"Назад\",\"logout\":\"Вход в систему\",\"account_login_fail\":\"Войти не удалось, пожалуйста, проверьте свой пароль\",\"save_username\":\"Сохранить имя пользователя\",\"donation_tip\":\"Пожалуйста, пожертвуйте небольшую сумму ваших денег нам, чтобы сохранить наши услуги и разработать более большие приложения для жизни!\",\"donation\":\"Пожертвовать\",\"no_item_password\":\"Пароли пока не хранятся\",\"sel_app_lang\":\"Выберите свой язык и страну\",\"register\":\"Постановка на учет\",\"account_name\":\"ФИО\",\"user_address\":\"Адрес\",\"done\":\"Завершенный\",\"error_user_email\":\"Электронная почта искажена\",\"error_user_phone\":\"Номер телефона не должен быть пустым и содержать более 9 цифр\",\"sex_val_0\":\"мужчина\",\"sex_val_1\":\"женский\",\"account_sex\":\"секс\",\"error_user_name\":\"Имя не может быть пустым и содержать более 5 символов\",\"error_user_password\":\"Пароль не должен быть пустым и должен содержать более 6 символов\",\"register_success\":\"Успех! Нажмите Войти, чтобы использовать зарегистрированный аккаунт\",\"user_rep_password\":\"Введите пароль\",\"error_user_already\":\"Эта учетная запись уже существует, вы не можете создавать новые с этой информацией\",\"account_user\":\"учетная запись\",\"account_update_info_success\":\"Обновите информацию об учетной записи успешно!\",\"status_share\":\"Статус обмена информацией\",\"status_share_0\":\"Делитесь информацией со всеми\",\"status_share_1\":\"Не делиться информацией\",\"account_update_info\":\"Обновить информацию\",\"change_password\":\"Сменить пароль\",\"error_password_old\":\"Старый пароль неверен\",\"password_old\":\"Прежний пароль\",\"password_new\":\"Новый пароль\",\"lang_key\":\"ru\"}',	'ru'),
('{\"app_title\":\"Erstellen eines Kennworts\",\"show_passwor_tip\":\"Automatisch generiertes Passwort für Sie\",\"copy\":\"Kopieren\",\"create_new\":\"Neue erstellen\",\"option_advanced\":\"Vorabeinstellung\",\"option_1\":\"Enthält Großbuchstaben\",\"option_2\":\"Enthält Kleinbuchstaben\",\"option_3\":\"Enthält Zahlen\",\"option_4\":\"Enthält Sonderzeichen\",\"save_tag\":\"Geben Sie den Namen der Speicherkarte ein (Hilfe, die Sie sich z. B.: Facebook merken)\",\"inp_tip\":\"Geben Sie hier Daten ein ...\",\"length_password\":\"Kennwortlänge\",\"save_and_copy_password\":\"Speichern und Kopieren des Kennworts\",\"copy_success\":\"Kopieren erfolgreicher !!!\",\"list_password\":\"Liste Ihrer Passwörter\",\"other_app\":\"Andere Anwendungen des Entwicklers\",\"login\":\"Anmelden\",\"login_tip\":\"Melden Sie sich bei Ihrem Karottenkonto an, um Ihre Kennwörter zu verwalten\",\"account_phone\":\"Ihre Telefonnummer\",\"password\":\"Passwort\",\"back\":\"Zurück\",\"logout\":\"Abmelden\",\"account_login_fail\":\"Login fehlgeschlagen, bitte überprüfen Sie Ihr Passwort\",\"save_username\":\"Benutzername speichern\",\"donation_tip\":\"Bitte spenden Sie uns einen kleinen Teil Ihres Geldes, um unsere Dienstleistungen zu erhalten und weitere tolle Anwendungen für das Leben zu entwickeln!\",\"donation\":\"Spenden\",\"no_item_password\":\"Es wurden noch keine Passwörter gespeichert.\",\"sel_app_lang\":\"Wählen Sie Ihre Sprache und Ihr Land\",\"register\":\"Anmeldung\",\"account_name\":\"Vollständiger Name\",\"user_address\":\"Adresse\",\"done\":\"Abgeschlossen\",\"error_user_email\":\"E-Mail ist fehlerhaft\",\"error_user_phone\":\"Die Telefonnummer darf nicht leer sein und darf nicht länger als 9 Ziffern sein\",\"sex_val_0\":\"männlich\",\"sex_val_1\":\"Weiblich\",\"account_sex\":\"Sex\",\"error_user_name\":\"Der Name darf nicht leer sein und darf nicht länger als 5 Zeichen sein\",\"error_user_password\":\"Das Passwort darf nicht leer sein und darf nicht länger als 6 Zeichen sein\",\"register_success\":\"Erfolgreich anmelden! Klicken Sie auf Anmelden, um das registrierte Konto zu verwenden\",\"user_rep_password\":\"Geben Sie das Passwort ein\",\"error_user_already\":\"Dieses Konto ist bereits vorhanden. Mit diesen Informationen können Sie keine neuen erstellen\",\"account_user\":\"Konto\",\"account_update_info_success\":\"Kontoinformationen erfolgreich aktualisieren!\",\"status_share\":\"Status des Informationsaustauschs\",\"status_share_0\":\"Teilen Sie Informationen mit allen\",\"status_share_1\":\"Teilen Sie keine Informationen\",\"account_update_info\":\"Informationen aktualisieren\",\"change_password\":\"Ändere das Passwort\",\"error_password_old\":\"Das alte Passwort ist falsch\",\"password_old\":\"Altes Passwort\",\"password_new\":\"Ein neues Passwort\",\"lang_key\":\"de\"}',	'de'),
('{\"app_title\":\"สร้างรหัสผ่าน\",\"show_passwor_tip\":\"รหัสผ่านที่สร้างขึ้นโดยอัตโนมัติสําหรับคุณ\",\"copy\":\"คัด ลอก\",\"create_new\":\"สร้างใหม่\",\"option_advanced\":\"การตั้งค่าล่วงหน้า\",\"option_1\":\"มีอักขระตัวพิมพ์ใหญ่\",\"option_2\":\"มีอักขระตัวพิมพ์เล็ก\",\"option_3\":\"มีตัวเลข\",\"option_4\":\"มีอักขระพิเศษ\",\"save_tag\":\"ป้อนชื่อของการ์ดเก็บข้อมูล (ช่วยให้คุณจําเช่น: Facebook)\",\"inp_tip\":\"ป้อนข้อมูลที่นี่ ...\",\"length_password\":\"ความยาวรหัสผ่าน\",\"save_and_copy_password\":\"จัดเก็บและคัดลอกรหัสผ่าน\",\"copy_success\":\"คัดลอก!!!ที่สําเร็จ\",\"list_password\":\"รายชื่อรหัสผ่านของคุณ\",\"other_app\":\"โปรแกรมอื่น ๆ จากนักพัฒนา\",\"login\":\"เข้าสู่ระบบ\",\"login_tip\":\"เข้าสู่ระบบบัญชีแครอทของคุณเพื่อจัดการรหัสผ่านของคุณ\",\"account_phone\":\"หมายเลขโทรศัพท์ของคุณ\",\"password\":\"รหัส ผ่าน\",\"back\":\"ย้อนกลับ\",\"logout\":\"ออกจากระบบ\",\"account_login_fail\":\"เข้าสู่ระบบล้มเหลวโปรดตรวจสอบรหัสผ่านของคุณ\",\"save_username\":\"บันทึกชื่อผู้ใช้\",\"donation_tip\":\"กรุณาบริจาคเงินจํานวนเล็กน้อยของคุณให้เราเพื่อรักษาบริการของเราและพัฒนาโปรแกรมที่ดีมากขึ้นสําหรับชีวิต!\",\"donation\":\"บริจาค\",\"no_item_password\":\"ไม่มีรหัสผ่านถูกเก็บไว้\",\"sel_app_lang\":\"เลือกภาษาและประเทศของคุณ\",\"register\":\"การลงทะเบียน\",\"account_name\":\"ชื่อเต็ม\",\"user_address\":\"ที่อยู่\",\"done\":\"เสร็จ\",\"error_user_email\":\"อีเมลผิดรูปแบบ\",\"error_user_phone\":\"หมายเลขโทรศัพท์จะต้องไม่เว้นว่างและต้องมีอักขระมากกว่า 9 หลัก\",\"sex_val_0\":\"ชาย\",\"sex_val_1\":\"หญิง\",\"account_sex\":\"เพศ\",\"error_user_name\":\"ชื่อต้องไม่เว้นว่างและมากกว่า 5 ตัวอักษร\",\"error_user_password\":\"รหัสผ่านจะต้องไม่เว้นว่างและจะต้องมากกว่า 6 ตัวอักษร\",\"register_success\":\"ลงทะเบียนสำเร็จ! คลิกเข้าสู่ระบบเพื่อใช้บัญชีที่ลงทะเบียน\",\"user_rep_password\":\"ใส่รหัสผ่าน\",\"error_user_already\":\"มีบัญชีนี้อยู่แล้วคุณไม่สามารถสร้างบัญชีใหม่ด้วยข้อมูลนี้\",\"account_user\":\"บัญชีผู้ใช้\",\"account_update_info_success\":\"อัปเดตข้อมูลบัญชีสำเร็จแล้ว!\",\"status_share\":\"สถานะการแบ่งปันข้อมูล\",\"status_share_0\":\"แบ่งปันข้อมูลกับทุกคน\",\"status_share_1\":\"อย่าเปิดเผยข้อมูล\",\"account_update_info\":\"อัพเดทข้อมูล\",\"change_password\":\"เปลี่ยนรหัสผ่าน\",\"error_password_old\":\"รหัสผ่านเก่าไม่ถูกต้อง\",\"password_old\":\"รหัสผ่านเก่า\",\"password_new\":\"รหัสผ่านใหม่\",\"lang_key\":\"th\"}',	'th'),
('{\"app_title\":\"암호 만들기\",\"show_passwor_tip\":\"자동으로 생성된 암호\",\"copy\":\"복사\",\"create_new\":\"새 만들기\",\"option_advanced\":\"사전 설정\",\"option_1\":\"대문자 포함\",\"option_2\":\"소문자 포함\",\"option_3\":\"숫자 포함\",\"option_4\":\"특수 문자 포함\",\"save_tag\":\"저장 카드의 이름을 입력합니다(예: Facebook 을 기억하는 데 도움이 있음)\",\"inp_tip\":\"여기에 데이터를 입력 ...\",\"length_password\":\"암호 길이\",\"save_and_copy_password\":\"암호 저장 및 복사\",\"copy_success\":\"성공적인 !!! 복사\",\"list_password\":\"암호 목록\",\"other_app\":\"개발자의 다른 응용 프로그램\",\"login\":\"로그인\",\"login_tip\":\"당근 계정에 로그인하여 비밀번호를 관리하세요.\",\"account_phone\":\"전화번호\",\"password\":\"암호\",\"back\":\"뒤로\",\"logout\":\"로그아웃\",\"account_login_fail\":\"로그인에 실패, 암호를 확인하시기 바랍니다\",\"save_username\":\"사용자 이름 저장\",\"donation_tip\":\"우리의 서비스를 유지하고 삶에 대한 더 좋은 응용 프로그램을 개발하기 위해 우리에게 당신의 돈의 작은 금액을 기부하시기 바랍니다!\",\"donation\":\"기부\",\"no_item_password\":\"아직 저장된 암호가 없습니다.\",\"sel_app_lang\":\"언어 및 국가 선택\",\"register\":\"기재\",\"account_name\":\"성명\",\"user_address\":\"주소\",\"done\":\"완료\",\"error_user_email\":\"이메일이 잘못되었습니다\",\"error_user_phone\":\"전화 번호는 비워 둘 수 없으며 9 자리를 초과 할 수 없습니다\",\"sex_val_0\":\"남성\",\"sex_val_1\":\"여자\",\"account_sex\":\"섹스\",\"error_user_name\":\"이름은 비워 둘 수 없으며 5자를 초과 할 수 없습니다\",\"error_user_password\":\"비밀번호는 비워 둘 수 없으며 6자를 초과해야합니다\",\"register_success\":\"가입 성공! 등록 된 계정을 사용하려면 로그인을 클릭하십시오\",\"user_rep_password\":\"비밀번호를 입력하십시오\",\"error_user_already\":\"이 계정은 이미 존재하며이 정보로 새 계정을 만들 수 없습니다\",\"account_user\":\"계정\",\"account_update_info_success\":\"계정 정보를 성공적으로 업데이트하십시오!\",\"status_share\":\"정보 공유 상태\",\"status_share_0\":\"모든 사람과 정보 공유\",\"status_share_1\":\"정보를 공유하지 마십시오\",\"account_update_info\":\"정보 업데이트\",\"change_password\":\"비밀번호 변경\",\"error_password_old\":\"이전 비밀번호가 잘못되었습니다\",\"password_old\":\"기존 비밀번호\",\"password_new\":\"새로운 비밀번호\",\"lang_key\":\"ko\"}',	'ko'),
('{\"app_title\":\"パスワードを作成する\",\"show_passwor_tip\":\"自動的に生成されたパスワード\",\"copy\":\"コピー\",\"create_new\":\"新規作成\",\"option_advanced\":\"事前設定\",\"option_1\":\"大文字を含む\",\"option_2\":\"小文字を含む\",\"option_3\":\"数値を含む\",\"option_4\":\"特殊文字が含まれています\",\"save_tag\":\"ストレージカードの名前を入力します(覚えておくのに役立ちます:Facebook)\",\"inp_tip\":\"ここにデータを入力してください.\",\"length_password\":\"パスワードの長さ\",\"save_and_copy_password\":\"パスワードを保存してコピーする\",\"copy_success\":\"成功した!!!をコピーする\",\"list_password\":\"パスワードの一覧\",\"other_app\":\"開発者からのその他のアプリケーション\",\"login\":\"ログイン\",\"login_tip\":\"パスワードを管理するには、ニンジンアカウントにログインしてください\",\"account_phone\":\"電話番号\",\"password\":\"パスワード\",\"back\":\"戻る\",\"logout\":\"ログアウト\",\"account_login_fail\":\"ログインに失敗しました、 パスワードを確認してください\",\"save_username\":\"ユーザー名を保存する\",\"donation_tip\":\"私たちのサービスを維持し、人生のためのより偉大なアプリケーションを開発するために私たちにあなたのお金の少額を寄付してください!\",\"donation\":\"寄付\",\"no_item_password\":\"パスワードはまだ保存されていません\",\"sel_app_lang\":\"言語と国を選択する\",\"register\":\"登録\",\"account_name\":\"フルネーム\",\"user_address\":\"住所\",\"done\":\"完了しました\",\"error_user_email\":\"メールの形式が正しくありません\",\"error_user_phone\":\"電話番号は空白にすることはできず、9桁の文字を超えることはできません\",\"sex_val_0\":\"男性\",\"sex_val_1\":\"女性\",\"account_sex\":\"性別\",\"error_user_name\":\"名前は空白にせず、5文字を超えることはできません\",\"error_user_password\":\"パスワードは空白にできず、6文字を超える必要があります\",\"register_success\":\"サインアップ成功！ 登録したアカウントを使用するには、ログインをクリックしてください\",\"user_rep_password\":\"パスワードを入力してください\",\"error_user_already\":\"このアカウントは既に存在します。この情報で新しいアカウントを作成することはできません\",\"account_user\":\"アカウント\",\"account_update_info_success\":\"アカウント情報を更新しました！\",\"status_share\":\"情報共有状況\",\"status_share_0\":\"みんなと情報を共有する\",\"status_share_1\":\"情報を共有しない\",\"account_update_info\":\"更新情報\",\"change_password\":\"パスワードを変更する\",\"error_password_old\":\"古いパスワードが間違っています\",\"password_old\":\"以前のパスワード\",\"password_new\":\"新しいパスワード\",\"lang_key\":\"ja\"}',	'ja'),
('{\"app_title\":\"إنشاء كلمة مرور\",\"show_passwor_tip\":\"كلمة المرور التي يتم إنشاؤها تلقائيًا لك\",\"copy\":\"نسخ\",\"create_new\":\"إنشاء جديد\",\"option_advanced\":\"إعداد مسبق\",\"option_1\":\"يحتوي على أحرف علوية\",\"option_2\":\"يحتوي على أحرف صغيرة\",\"option_3\":\"يحتوي على أرقام\",\"option_4\":\"يحتوي على أحرف خاصة\",\"save_tag\":\"أدخل اسم بطاقة التخزين (تساعدك على تذكر على سبيل المثال: فيسبوك)\",\"inp_tip\":\"أدخل البيانات هنا ...\",\"length_password\":\"طول كلمة المرور\",\"save_and_copy_password\":\"تخزين كلمة المرور ونسخها\",\"copy_success\":\"نسخ !!! الناجحة\",\"list_password\":\"قائمة كلمات المرور الخاصة بك\",\"other_app\":\"تطبيقات أخرى من المطور\",\"login\":\"تسجيل الدخول\",\"login_tip\":\"تسجيل الدخول إلى حساب الجزر الخاص بك لإدارة كلمات المرور الخاصة بك\",\"account_phone\":\"رقم هاتفك\",\"password\":\"كلمه المرور\",\"back\":\"العودة\",\"logout\":\"تسجيل الخروج\",\"account_login_fail\":\"فشل تسجيل الدخول، يرجى التحقق من كلمة المرور الخاصة بك\",\"save_username\":\"حفظ اسم المستخدم\",\"donation_tip\":\"يرجى التبرع بمبلغ صغير من أموالك لنا للحفاظ على خدماتنا وتطوير المزيد من التطبيقات العظيمة للحياة!\",\"donation\":\"التبرع\",\"no_item_password\":\"لم يتم تخزين كلمات المرور حتى الآن\",\"sel_app_lang\":\"اختر لغتك وبلدك\",\"register\":\"التسجيل\",\"account_name\":\"الاسم الكامل\",\"user_address\":\"عنوان\",\"done\":\"منجز\",\"error_user_email\":\"البريد الإلكتروني غير صحيح\",\"error_user_phone\":\"يجب ألا يكون رقم الهاتف فارغًا وأكبر من 9 أحرف\",\"sex_val_0\":\"الذكر\",\"sex_val_1\":\"أنثى\",\"account_sex\":\"الجنس\",\"error_user_name\":\"لا يمكن أن يكون الاسم فارغًا وأكبر من 5 أحرف\",\"error_user_password\":\"يجب ألا تكون كلمة المرور فارغة ويجب أن تكون أكبر من 6 أحرف\",\"register_success\":\"نجاح التسجيل! انقر فوق تسجيل الدخول لاستخدام الحساب المسجل\",\"user_rep_password\":\"أدخل كلمة المرور\",\"error_user_already\":\"هذا الحساب موجود بالفعل ، لا يمكنك إنشاء حسابات جديدة بهذه المعلومات\",\"account_user\":\"الحساب\",\"account_update_info_success\":\"تحديث معلومات الحساب بنجاح!\",\"status_share\":\"حالة مشاركة المعلومات\",\"status_share_0\":\"شارك المعلومات مع الجميع\",\"status_share_1\":\"لا تشارك المعلومات\",\"account_update_info\":\"تحديث المعلومات\",\"change_password\":\"غير كلمة السر\",\"error_password_old\":\"كلمة المرور القديمة غير صحيحة\",\"password_old\":\"كلمة المرور القديمة\",\"password_new\":\"كلمة مرور جديدة\",\"lang_key\":\"ar\"}',	'ar'),
('{\"app_title\":\"Parola oluşturma\",\"show_passwor_tip\":\"Sizin için otomatik olarak oluşturulan parola\",\"copy\":\"Kopya\",\"create_new\":\"Yeni oluşturma\",\"option_advanced\":\"Avans ayarı\",\"option_1\":\"Büyük harf karakterleri içerir\",\"option_2\":\"Küçük karakterler içerir\",\"option_3\":\"Sayılar içerir\",\"option_4\":\"Özel karakterler içerir\",\"save_tag\":\"Depolama kartının adını girin (örneğin: Facebook\'u hatırlamanıza yardımcı olun)\",\"inp_tip\":\"Burada veri girin ...\",\"length_password\":\"Parola uzunluğu\",\"save_and_copy_password\":\"Parolayı depolama ve kopyalama\",\"copy_success\":\"Başarılı !!! kopyala\",\"list_password\":\"Parolalarınızın listesi\",\"other_app\":\"Geliştiriciden diğer uygulamalar\",\"login\":\"Oturum aç\",\"login_tip\":\"Parolalarınızı yönetmek için havuç hesabınızda oturum açın\",\"account_phone\":\"Telefon numaranız\",\"password\":\"Parola\",\"back\":\"Geri\",\"logout\":\"Oturumu çıkış\",\"account_login_fail\":\"Giriş başarısız oldu, lütfen şifrenizi kontrol edin\",\"save_username\":\"Kullanıcı adını kaydet\",\"donation_tip\":\"Hizmetlerimizi sürdürmek ve yaşam için daha büyük uygulamalar geliştirmek için bize para küçük bir miktar bağış lütfen!\",\"donation\":\"Bağış\",\"no_item_password\":\"Henüz parola depolanmadı\",\"sel_app_lang\":\"Dilinizi ve ülkenizi seçin\",\"register\":\"kayıt\",\"account_name\":\"Ad Soyad\",\"user_address\":\"Adres\",\"done\":\"Tamamlandı\",\"error_user_email\":\"E-posta bozuk\",\"error_user_phone\":\"Telefon numarası boş olmamalı ve 9 Rakam karakterden fazla olmamalıdır\",\"sex_val_0\":\"erkek\",\"sex_val_1\":\"Kadın\",\"account_sex\":\"Seks\",\"error_user_name\":\"Ad boş olamaz ve 5 karakterden fazla olamaz\",\"error_user_password\":\"Parola boş olmamalı ve 6 karakterden uzun olmamalıdır\",\"register_success\":\"Üye Olun Başarılı! Kayıtlı hesabı kullanmak için lütfen giriş yapın\",\"user_rep_password\":\"Şifreyi gir\",\"error_user_already\":\"Bu hesap zaten var, bu bilgilerle yeni hesaplar oluşturamazsınız\",\"account_user\":\"hesap\",\"account_update_info_success\":\"Hesap bilgilerini başarıyla güncelleyin!\",\"status_share\":\"Bilgi paylaşım durumu\",\"status_share_0\":\"Bilgileri herkesle paylaşın\",\"status_share_1\":\"Bilgi paylaşma\",\"account_update_info\":\"Güncelleme bilgileri\",\"change_password\":\"Şifre değiştir\",\"error_password_old\":\"Eski şifre yanlış\",\"password_old\":\"eski şifre\",\"password_new\":\"Yeni bir şifre\",\"lang_key\":\"tr\"}',	'tr'),
('{\"app_title\":\"Salasanan luominen\",\"show_passwor_tip\":\"Salasana luodaan automaattisesti puolestasi\",\"copy\":\"Kopioi\",\"create_new\":\"Luo uusi\",\"option_advanced\":\"Etukäteisasetus\",\"option_1\":\"Sisältää isoja kirjaimia\",\"option_2\":\"Sisältää pieniä kirjaimia\",\"option_3\":\"Sisältää numeroita\",\"option_4\":\"Sisältää erikoismerkkejä\",\"save_tag\":\"Kirjoita muistikortin nimi (muista esimerkiksi: Facebook)\",\"inp_tip\":\"Anna tiedot tähän ...\",\"length_password\":\"Salasanan pituus\",\"save_and_copy_password\":\"Salasanan tallentaminen ja kopioiminen\",\"copy_success\":\"Kopiointi onnistui !!!\",\"list_password\":\"Luettelo salasanoistasi\",\"other_app\":\"Muut sovellukset kehittäjä\",\"login\":\"Kirjaudu sisään\",\"login_tip\":\"Kirjaudu porkkanatilillesi ja hallitse salasanojasi\",\"account_phone\":\"Puhelinnumerosi\",\"password\":\"Salasana\",\"back\":\"Bck\",\"logout\":\"Kirjaudu ulos\",\"account_login_fail\":\"Kirjautuminen epäonnistui, tarkista salasanasi\",\"save_username\":\"Tallenna käyttäjänimi\",\"donation_tip\":\"Lahjoita pieni määrä rahaa meille ylläpitää palvelujamme ja kehittää enemmän suuria sovelluksia elämää!\",\"donation\":\"Lahjoittaa\",\"no_item_password\":\"Salasanoja ei ole vielä tallennettu\",\"sel_app_lang\":\"Valitse kieli ja maa\",\"register\":\"Rekisteröinti\",\"account_name\":\"Koko nimi\",\"user_address\":\"Osoite\",\"done\":\"valmistunut\",\"error_user_email\":\"Sähköposti on väärin muotoiltu\",\"error_user_phone\":\"Puhelinnumero ei saa olla tyhjä ja olla suurempi kuin 9 numeroa\",\"sex_val_0\":\"Uros\",\"sex_val_1\":\"Nainen\",\"account_sex\":\"sukupuoli\",\"error_user_name\":\"Nimi ei voi olla tyhjä ja yli 5 merkkiä\",\"error_user_password\":\"Salasana ei saa olla tyhjä ja sen on oltava yli 6 merkkiä\",\"register_success\":\"Rekisteröidy menestys! Napsauta kirjautuminen käyttääksesi rekisteröityä tiliä\",\"user_rep_password\":\"Kirjoita salasana\",\"error_user_already\":\"Tämä tili on jo olemassa, et voi luoda uusia näillä tiedoilla\",\"account_user\":\"Tili\",\"account_update_info_success\":\"Päivitä tilitiedot onnistuneesti!\",\"status_share\":\"Tietojen jakamisen tila\",\"status_share_0\":\"Jaa tietoja kaikkien kanssa\",\"status_share_1\":\"Älä jaa tietoja\",\"account_update_info\":\"Päivitä tieto\",\"change_password\":\"Vaihda salasana\",\"error_password_old\":\"Vanha salasana on väärä\",\"password_old\":\"vanha salasana\",\"password_new\":\"Uusi salasana\",\"lang_key\":\"fi\"}',	'fi'),
('{\"app_title\":\"Creare una password\",\"show_passwor_tip\":\"Password generata automaticamente\",\"copy\":\"Copia\",\"create_new\":\"Crea nuovo\",\"option_advanced\":\"Impostazione anticipata\",\"option_1\":\"Contiene caratteri maiuscoli\",\"option_2\":\"Contiene caratteri minuscoli\",\"option_3\":\"Contiene numeri\",\"option_4\":\"Contiene caratteri speciali\",\"save_tag\":\"Inserisci il nome della scheda di memoria (aiutati a ricordare per esempio: Facebook)\",\"inp_tip\":\"Inserire i dati qui ...\",\"length_password\":\"Lunghezza password\",\"save_and_copy_password\":\"Memorizzare e copiare la password\",\"copy_success\":\"Copia !!! riuscita\",\"list_password\":\"Elenco delle password\",\"other_app\":\"Altre applicazioni dello sviluppatore\",\"login\":\"Accedi\",\"login_tip\":\"Accedi al tuo account carota per gestire le tue password\",\"account_phone\":\"Il tuo numero di telefono\",\"password\":\"Password\",\"back\":\"Indietro\",\"logout\":\"Disconnettersi\",\"account_login_fail\":\"Login non riuscito, si prega di controllare la password\",\"save_username\":\"Salva nome utente\",\"donation_tip\":\"Si prega di donare una piccola quantità di vostri soldi a noi per mantenere i nostri servizi e sviluppare più grandi applicazioni per la vita!\",\"donation\":\"Donare\",\"no_item_password\":\"Nessuna password è stata ancora memorizzata\",\"sel_app_lang\":\"Scegli la tua lingua e il tuo paese\",\"register\":\"Registrazione\",\"account_name\":\"Nome e cognome\",\"user_address\":\"Indirizzo\",\"done\":\"Completato\",\"error_user_email\":\"L\'email non è corretta\",\"error_user_phone\":\"Il numero di telefono non deve essere vuoto e deve contenere più di 9 caratteri\",\"sex_val_0\":\"maschia\",\"sex_val_1\":\"Femmina\",\"account_sex\":\"Sesso\",\"error_user_name\":\"Il nome non può essere vuoto e superiore a 5 caratteri\",\"error_user_password\":\"La password non deve essere vuota e deve contenere più di 6 caratteri\",\"register_success\":\"Iscriviti Successo! Fai clic su Accedi per utilizzare l\'account registrato\",\"user_rep_password\":\"Inserisci la password\",\"error_user_already\":\"Questo account esiste già, non puoi crearne di nuovi con queste informazioni\",\"account_user\":\"account\",\"account_update_info_success\":\"Aggiorna le informazioni dell\'account con successo!\",\"status_share\":\"Stato di condivisione delle informazioni\",\"status_share_0\":\"Condividi le informazioni con tutti\",\"status_share_1\":\"Non condividere informazioni\",\"account_update_info\":\"Aggiorna informazioni\",\"change_password\":\"Cambia la password\",\"error_password_old\":\"La vecchia password non è corretta\",\"password_old\":\"vecchia password\",\"password_new\":\"Una nuova password\",\"lang_key\":\"it\"}',	'it'),
('{\"app_title\":\"Membuat kata sandi\",\"show_passwor_tip\":\"Sandi yang dihasilkan secara otomatis untuk Anda\",\"copy\":\"Salinan\",\"create_new\":\"Buat baru\",\"option_advanced\":\"Pengaturan Advance\",\"option_1\":\"Berisi karakter huruf besar\",\"option_2\":\"Berisi karakter huruf kecil\",\"option_3\":\"Berisi angka\",\"option_4\":\"Berisi karakter khusus\",\"save_tag\":\"Masukkan nama kartu penyimpanan (membantu Anda mengingat misalnya: Facebook)\",\"inp_tip\":\"Masukkan data di sini...\",\"length_password\":\"Panjang sandi\",\"save_and_copy_password\":\"Simpan dan Salin kata sandi\",\"copy_success\":\"Salin berhasil!!!\",\"list_password\":\"Daftar kata sandi Anda\",\"other_app\":\"Aplikasi lain dari pengembang\",\"login\":\"Masuk\",\"login_tip\":\"Masuk ke akun wortel Anda untuk mengelola password Anda\",\"account_phone\":\"Nomor telepon Anda\",\"password\":\"Password\",\"back\":\"Kembali\",\"logout\":\"Keluar\",\"account_login_fail\":\"Login gagal, silakan periksa password Anda\",\"save_username\":\"Simpan nama pengguna\",\"donation_tip\":\"Harap menyumbangkan sejumlah kecil uang Anda kepada kami untuk menjaga layanan kami dan mengembangkan aplikasi yang lebih besar untuk hidup!\",\"donation\":\"Menyumbangkan\",\"no_item_password\":\"Belum ada kata sandi yang disimpan\",\"sel_app_lang\":\"Pilih bahasa dan negara Anda\",\"register\":\"Registrasi\",\"account_name\":\"Nama lengkap\",\"user_address\":\"Alamat\",\"done\":\"Lengkap\",\"error_user_email\":\"Email salah\",\"error_user_phone\":\"Nomor telepon harus tidak boleh lebih dari 9 Digit karakter\",\"sex_val_0\":\"pria\",\"sex_val_1\":\"Perempuan\",\"account_sex\":\"Seks\",\"error_user_name\":\"Nama tidak boleh kosong dan lebih dari 5 karakter\",\"error_user_password\":\"Kata sandi tidak boleh kosong dan harus lebih dari 6 karakter\",\"register_success\":\"Mendaftar Sukses! Klik masuk untuk menggunakan akun terdaftar\",\"user_rep_password\":\"Masukkan kata sandi\",\"error_user_already\":\"Akun ini sudah ada, Anda tidak dapat membuat yang baru dengan informasi ini\",\"account_user\":\"Akun\",\"account_update_info_success\":\"Perbarui informasi akun dengan sukses!\",\"status_share\":\"Status berbagi informasi\",\"status_share_0\":\"Bagikan informasi dengan semua orang\",\"status_share_1\":\"Jangan berbagi informasi\",\"account_update_info\":\"Perbarui informasi\",\"change_password\":\"Ganti kata sandi\",\"error_password_old\":\"Kata sandi lama salah\",\"password_old\":\"password lama\",\"password_new\":\"Kata sandi baru\",\"lang_key\":\"id\"}',	'id'),
('{\"app_title\":\"Oprette en adgangskode\",\"show_passwor_tip\":\"Adgangskode genereret automatisk for dig\",\"copy\":\"Kopiere\",\"create_new\":\"Opret ny\",\"option_advanced\":\"Indstilling for fremstriden\",\"option_1\":\"Indeholder store bogstaver\",\"option_2\":\"Indeholder små bogstaver\",\"option_3\":\"Indeholder tal\",\"option_4\":\"Indeholder specialtegn\",\"save_tag\":\"Indtast navnet på lagerkortet (hjælp dig med at huske f.eks.: Facebook)\",\"inp_tip\":\"Indtast data her ...\",\"length_password\":\"Adgangskodelængde\",\"save_and_copy_password\":\"Gemme og kopiere adgangskoden\",\"copy_success\":\"Kopier det lykkedes !!!\",\"list_password\":\"Liste over dine adgangskoder\",\"other_app\":\"Andre programmer fra udvikleren\",\"login\":\"Log på\",\"login_tip\":\"Log ind på din gulerodskonto for at administrere dine adgangskoder\",\"account_phone\":\"Dit telefonnummer\",\"password\":\"Adgangskode\",\"back\":\"Tilbage\",\"logout\":\"Log af\",\"account_login_fail\":\"Login mislykkedes, skal du tjekke din adgangskode\",\"save_username\":\"Gem brugernavn\",\"donation_tip\":\"Venligst donere en lille mængde af dine penge til os for at opretholde vores tjenester og udvikle flere store applikationer for livet!\",\"donation\":\"Donere\",\"no_item_password\":\"Der er endnu ikke gemt nogen adgangskoder\",\"sel_app_lang\":\"Vælg dit sprog og land\",\"register\":\"Registrering\",\"account_name\":\"Fulde navn\",\"user_address\":\"Adresse\",\"done\":\"afsluttet\",\"error_user_email\":\"E-mail er misformet\",\"error_user_phone\":\"Telefonnummeret må ikke være tomt og må ikke være større end 9 cifretegn\",\"sex_val_0\":\"han-\",\"sex_val_1\":\"Kvinde\",\"account_sex\":\"Køn\",\"error_user_name\":\"Navnet kan ikke være tomt og må ikke være større end 5 tegn\",\"error_user_password\":\"Adgangskoden må ikke være tom og skal være større end 6 tegn\",\"register_success\":\"Tilmeld succes! Klik på login for at bruge den registrerede konto\",\"user_rep_password\":\"Indtast adgangskoden\",\"error_user_already\":\"Denne konto findes allerede, du kan ikke oprette nye med disse oplysninger\",\"account_user\":\"Konto\",\"account_update_info_success\":\"Opdater kontooplysninger med succes!\",\"status_share\":\"Status for informationsdeling\",\"status_share_0\":\"Del information med alle\",\"status_share_1\":\"Del ikke oplysninger\",\"account_update_info\":\"Opdater oplysninger\",\"change_password\":\"Skift kodeord\",\"error_password_old\":\"Den gamle adgangskode er forkert\",\"password_old\":\"gammelt kodeord\",\"password_new\":\"En ny adgangskode\",\"lang_key\":\"da\"}',	'da'),
('{\"app_title\":\"Een wachtwoord maken\",\"show_passwor_tip\":\"Wachtwoord dat automatisch voor u wordt gegenereerd\",\"copy\":\"Kopiëren\",\"create_new\":\"Nieuwe maken\",\"option_advanced\":\"Vooraf instellen\",\"option_1\":\"Bevat hoofdletters\",\"option_2\":\"Bevat kleine letters\",\"option_3\":\"Bevat getallen\",\"option_4\":\"Bevat speciale tekens\",\"save_tag\":\"Voer de naam van de opslagkaart in (help je bijvoorbeeld te onthouden: Facebook)\",\"inp_tip\":\"Voer hier gegevens in ...\",\"length_password\":\"Wachtwoordlengte\",\"save_and_copy_password\":\"Het wachtwoord opslaan en kopiëren\",\"copy_success\":\"Succesvolle !!! kopiëren\",\"list_password\":\"Lijst met uw wachtwoorden\",\"other_app\":\"Andere toepassingen van de ontwikkelaar\",\"login\":\"Aanmelden\",\"login_tip\":\"Log in op uw wortelaccount om uw wachtwoorden te beheren\",\"account_phone\":\"Uw telefoonnummer\",\"password\":\"Wachtwoord\",\"back\":\"Terug\",\"logout\":\"Uitloging\",\"account_login_fail\":\"Inloggen is mislukt, controleer uw wachtwoord\",\"save_username\":\"Gebruikersnaam opslaan\",\"donation_tip\":\"Doneer een klein deel van uw geld aan ons om onze diensten te onderhouden en meer geweldige toepassingen voor het leven te ontwikkelen!\",\"donation\":\"Doneren\",\"no_item_password\":\"Er zijn nog geen wachtwoorden opgeslagen\",\"sel_app_lang\":\"Kies uw taal en land\",\"register\":\"Registratie\",\"account_name\":\"Voor-en achternaam\",\"user_address\":\"Adres\",\"done\":\"Voltooid\",\"error_user_email\":\"E-mail is onjuist opgemaakt\",\"error_user_phone\":\"Telefoonnummer mag niet leeg zijn en mag niet langer zijn dan 9 cijfers\",\"sex_val_0\":\"mannetje\",\"sex_val_1\":\"Vrouw\",\"account_sex\":\"Seks\",\"error_user_name\":\"Naam mag niet leeg zijn en mag niet meer dan 5 tekens bevatten\",\"error_user_password\":\"Wachtwoord mag niet leeg zijn en mag niet langer zijn dan 6 tekens\",\"register_success\":\"Aanmelden Succes! Klik op inloggen om het geregistreerde account te gebruiken\",\"user_rep_password\":\"Voer het wachtwoord in\",\"error_user_already\":\"Dit account bestaat al, u kunt geen nieuwe aanmaken met deze informatie\",\"account_user\":\"Account\",\"account_update_info_success\":\"Accountgegevens succesvol bijwerken!\",\"status_share\":\"Status voor het delen van informatie\",\"status_share_0\":\"Deel informatie met iedereen\",\"status_share_1\":\"Deel geen informatie\",\"account_update_info\":\"Update informatie\",\"change_password\":\"Wachtwoord wijzigen\",\"error_password_old\":\"Het oude wachtwoord is onjuist\",\"password_old\":\"Oud Wachtwoord\",\"password_new\":\"Een nieuw wachtwoord\",\"lang_key\":\"nl\"}',	'nl'),
('{\"app_title\":\"Tworzenie hasła\",\"show_passwor_tip\":\"Hasło generowane automatycznie dla Ciebie\",\"copy\":\"Kopii\",\"create_new\":\"Tworzenie nowych\",\"option_advanced\":\"Ustawienie zaliczki\",\"option_1\":\"Zawiera wielkie litery\",\"option_2\":\"Zawiera małe litery\",\"option_3\":\"Zawiera liczby\",\"option_4\":\"Zawiera znaki specjalne\",\"save_tag\":\"Wprowadź nazwę karty pamięci (pamiętaj na przykład: Facebook)\",\"inp_tip\":\"Wprowadź dane tutaj ...\",\"length_password\":\"Długość hasła\",\"save_and_copy_password\":\"Przechowywanie i kopiowanie hasła\",\"copy_success\":\"Kopiowanie udanych !!!\",\"list_password\":\"Lista haseł\",\"other_app\":\"Inne aplikacje od dewelopera\",\"login\":\"Zaloguj się\",\"login_tip\":\"Zaloguj się na swoje konto marchewkowe, aby zarządzać hasłami\",\"account_phone\":\"Twój numer telefonu\",\"password\":\"Hasło\",\"back\":\"Wstecz\",\"logout\":\"Wyloguj się\",\"account_login_fail\":\"Logowanie nie powiodło się, sprawdź hasło\",\"save_username\":\"Zapisz nazwę użytkownika\",\"donation_tip\":\"Prosimy o przekazanie nam niewielkiej kwoty pieniędzy na utrzymanie naszych usług i opracowanie kolejnych wspaniałych aplikacji na całe życie!\",\"donation\":\"Oddania\",\"no_item_password\":\"Nie zapisy nie zostały jeszcze zapisane\",\"sel_app_lang\":\"Wybierz swój język i kraj\",\"register\":\"Rejestracja\",\"account_name\":\"Pełne imię i nazwisko\",\"user_address\":\"Adres\",\"done\":\"Zakończony\",\"error_user_email\":\"Adres e-mail jest zniekształcony\",\"error_user_phone\":\"Numer telefonu nie może być pusty i zawierać więcej niż 9 cyfr\",\"sex_val_0\":\"męski\",\"sex_val_1\":\"Płeć żeńska\",\"account_sex\":\"Seks\",\"error_user_name\":\"Nazwa nie może być pusta i dłuższa niż 5 znaków\",\"error_user_password\":\"Hasło nie może być puste i musi być dłuższe niż 6 znaków\",\"register_success\":\"Zarejestruj się Sukces! Kliknij zaloguj, aby użyć zarejestrowanego konta\",\"user_rep_password\":\"Podaj hasło\",\"error_user_already\":\"To konto już istnieje, nie możesz tworzyć nowych z tymi informacjami\",\"account_user\":\"Konto\",\"account_update_info_success\":\"Zaktualizuj informacje o koncie pomyślnie!\",\"status_share\":\"Status udostępniania informacji\",\"status_share_0\":\"Udostępniaj informacje wszystkim\",\"status_share_1\":\"Nie udostępniaj informacji\",\"account_update_info\":\"Uaktualnij informacje\",\"change_password\":\"Zmień hasło\",\"error_password_old\":\"Stare hasło jest nieprawidłowe\",\"password_old\":\"stare hasło\",\"password_new\":\"Nowe hasło\",\"lang_key\":\"pl\"}',	'pl');

-- 2021-02-25 08:51:11
