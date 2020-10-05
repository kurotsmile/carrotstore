-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lang_fr`;
CREATE TABLE `lang_fr` (
  `key` varchar(50) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `lang_fr`;
INSERT INTO `lang_fr` (`key`, `value`) VALUES
('mua_sp',	'Des produits'),
('download_on',	'Téléchargez cette application sur'),
('tip_search',	'Que voulez-vous chercher?'),
('luu_tru_lien_he',	'Magasin de contact'),
('sp',	'produit'),
('tat_ca',	'Tous'),
('gioi_thieu',	'Présenter'),
('tai_khoan',	'Compte'),
('chi_tiet',	'Voir les détails'),
('mobile_application',	'Application mobile'),
('jailbreak_2',	'Ce fichier .ipa ne peut être installé que sur des appareils Apple jailbreakés, vous pouvez le télécharger directement en cliquant sur ce sous-lien (cliquez ici pour télécharger)'),
('dia_chi',	'Adresse'),
('ds_thanh_vien',	'Liste d\'utilisateur'),
('goi_dien',	'Appel'),
('dang_xu_ly',	'En attente de progresser'),
('dang_lay_du_lieu',	'Chargement des données ...'),
('loai',	'Les catégories'),
('dang_nhap_tip',	'Nom d\'utilisateur'),
('mat_khau',	'Mot de passe'),
('dang_nhap',	'S\'identifier'),
('dang_ky',	'enregistrement'),
('them_vao_gio_hang',	'Ajouter au panier'),
('document',	'Les documents'),
('dk_tai_khoan',	'Enregistrer un compte'),
('tong_quan',	'Vue d\'ensemble'),
('quoc_gia',	'pays'),
('loi',	'Erreur'),
('loi_dang_nhap',	'La connexion a échoué, veuillez vérifier vos informations de connexion'),
('da_them_gio_hang',	'Ajouter au panier avec succès!'),
('app_online',	'Application de site Web'),
('tong_gia',	'Prix total'),
('Ten_dang_nhap',	'Nom d\'utilisateur'),
('Nhap_lai_mat_khau',	'Confirmer le mot de passe à nouveau'),
('chu_thich',	'légende'),
('so_dien_thoai',	'numéro de téléphone'),
('ten_day_du',	'Nom complet'),
('click_de_xem',	'Cliquez pour voir'),
('danh_gia',	'Évaluer'),
('tinh_trang_tai_khoan',	'État du compte'),
('khong_co_binh_luan',	'Sans commentaires!'),
('sp_tuong_tu',	'Produits similaires'),
('so_nguoi_da_danh_gia',	'Nombre de personnes ayant évalué'),
('luot_xem',	'Vue'),
('ngay_dang',	'Date de publication'),
('ngay_sua',	'Date d\'édition'),
('gia',	'prix'),
('nhap_binh_luan',	'Entrez votre commentaire ici!'),
('dang_binh_luan',	'Poste un commentaire'),
('moi_nhat',	'dernier'),
('cu_nhat',	'Le plus ancien'),
('pho_bien_nhat',	'Le plus populaire'),
('tra_loi',	'Répondre'),
('am_nhac_cho_cuoc_song',	'Musique pour la vie'),
('choi_nhac',	'jouer de la musique'),
('loi_bai_hat',	'Paroles'),
('chua_co_loi_bai_hat',	'Pas encore de paroles'),
('music_top_month',	'Le plus interactif du mois'),
('music_top_0',	'heureux'),
('music_top_1',	'triste'),
('music_top_2',	'Se détendre'),
('music_top_3',	'excité'),
('music_no_rank',	'Pas encore d\'évaluation'),
('xem_video',	'Regarder des vidéos connexes'),
('download_app_music_tip',	'Téléchargez ces applications sur l\'app store ch play et sur l\'app store pour écouter de la bonne musique!'),
('chia_se',	'Partager'),
('dang_gia_music_tip',	'Evaluez vos sentiments sur cette chanson, ce qui l’aidera à augmenter ses cotes et sa popularité.'),
('ung_ho',	'des dons'),
('ung_ho_tip',	'amasser de l\'argent'),
('music_same',	'Autres chansons'),
('chu_thich_ung_ho',	'Veuillez contribuer une petite partie de vos dépenses afin que nous puissions maintenir le serveur et construire de nombreux autres gadgets intéressants. Merci beaucoup'),
('lien_he_cung_ten',	'Contacts du même nom'),
('lien_he_lien_quan',	'Contacts liés'),
('download_app_contact_tip',	'Téléchargez ces applications pour pouvoir vous connecter avec des personnes et utiliser d\'autres utilitaires!'),
('gu_am_nhac',	'Goûts musicaux'),
('gioi_tinh',	'Sexe'),
('sex_0',	'mâle'),
('sex_1',	'femelle'),
('date_start',	'Date d\'inscription'),
('date_cur',	'Date de la dernière interaction'),
('chinh_sach',	'Politique de confidentialité'),
('chinh_sach_tip',	'Conditions des dispositions générales sur les droits et les responsabilités découlant du principe de protection des droits relatifs aux informations personnelles, des relations et de la stabilité des fournisseurs de services En utilisant, en publiant des informations, les utilisateurs acceptent ces accords:'),
('no_product',	'Le produit n\'existe pas'),
('thanh_cong',	'Le succès'),
('cam_on_da_danh_gia',	'Merci pour la critique! Votre avis est très important pour nous.'),
('tip_star5',	'excellent'),
('tip_star4',	'Très bien'),
('tip_star3',	'Bon'),
('tip_star2',	'Normal'),
('tip_star1',	'Tant pis'),
('trich_dan',	'Citation'),
('doc_cham_ngon',	'Lire la citation'),
('gioi_thieu_tip',	'Carrotstore.com est une archive qui présente des applications de divertissement et des utilitaires complémentaires pour les utilisateurs du monde entier. Lorsque vous utilisez l\'un de ces systèmes, vous disposez d\'un compte qui identifie chaque personne avec le périphérique mobile.'),
('download_app_quote_tip',	'Téléchargez ces applications sur l’app store et l’appstore de ch play pour lire de bonnes citations et utiliser de nombreux autres utilitaires de divertissement.'),
('download_song',	'Téléchargez cette chanson'),
('khong_co_du_lieu',	'Pas de données'),
('tai_thanh_cong_tip',	'Cliquez sur le bouton \"J\'aime\" ci-dessus et sur notre page Facebook pour continuer à télécharger de la musique gratuite à partir du système! Merci beaucoup!'),
('danh_gia_done',	'Merci de laisser votre système savoir ce que vous ressentez en écoutant cette chanson!'),
('not_music',	'La chanson n\'existe pas!'),
('back_list_music',	'Retour à la liste de musique'),
('not_account',	'Le compte n\'existe pas!'),
('back_list_account',	'Retour à la liste des comptes'),
('lien_he',	'Contact et support'),
('lien_he_tip',	'Si vous avez des questions, veuillez contacter l\'administrateur pour obtenir des conseils et des réponses via les adresses et les adresses e-mail ci-dessous.'),
('policy_1',	'Le système partagera vos informations de contact avec des personnes telles que numéros de téléphone, e-mail, liens de réseaux sociaux (identifiant Skype, Facebook, Twitter, Linkedin), sexe, adresse. (Les utilisateurs peuvent personnaliser ne pas partager leurs informations dans n\'importe quelle application système)'),
('policy_2',	'Les administrateurs ont le droit de supprimer les contacts incorrects ou de violer le contenu des contacts d\'autres personnes lorsqu\'ils signalent des anomalies liées.'),
('no_product_tip',	'Le produit a été supprimé et n\'est pas pris en charge sur carrotstore.com'),
('home_url',	'Page d\'accueil où les produits sont affichés'),
('login_account_tip',	'Entrez votre numéro de téléphone pour vous connecter au système'),
('sel_account_login',	'Sélectionnez l\'un des comptes que vous utilisez pour vous connecter'),
('back',	'retour'),
('dang_xuat',	'Déconnexion'),
('inp_phone_tip',	'Entrez votre numéro de téléphone'),
('no_account_error',	'Le numéro de téléphone de ce compte n\'existe pas dans le système ou n\'est pas disponible dans ce pays!'),
('login_app',	'Applications utilisées pour se connecter'),
('login_account_timer',	'Limite de connexion'),
('login_account_scan_qr_tip',	'Utilisez les applications du système, puis activez le balayage des codes à barres pour vous connecter.'),
('login_account_succes',	'Connecté avec succès!'),
('an_danh',	'incognito'),
('pay_method',	'Choisissez une méthode de paiement'),
('pay_account',	'Informations client'),
('pay_title',	'achat'),
('pay_tip_done',	'Après l\'achat réussi, l\'article sera automatiquement utilisé dans votre application!'),
('pay_success',	'Paiement réussi. Vous pouvez utiliser le produit'),
('pay_fail',	'Paiement échoué! essayez d\'acheter à nouveau'),
('pay_sp_obj_nude_name',	'Enlevez les vêtements du personnage'),
('no_page',	'Cette page n\'existe pas'),
('mobile_game',	'Jeu'),
('quote_more',	'Peut-être aimerez-vous les autres maximes ci-dessous'),
('share_tip',	'Si vous vous sentez bien s\'il vous plaît partager'),
('history_delete',	'histoire claire'),
('dong_gop_loi_nhac',	'Contribuer les paroles'),
('dong_gop_loi_nhac_tip',	'S\'il vous plaît contribuer vos mots à utiliser pour compléter pleinement les fonctionnalités de cette chanson'),
('add_lyrics_send',	'Soumettre les paroles'),
('add_lyrics_error',	'Le contenu des paroles ne doit pas être vide'),
('add_lyrics_success',	'Envoyez des paroles réussies! Merci de contribuer les paroles, nous allons censurer et publier ces paroles dès que possible'),
('dang_nhap_tai_khoan_khac',	'Connectez-vous avec un autre compte'),
('rut_gon_link',	'Raccourcir les liens'),
('adblock_title',	'Vous ne devez pas utiliser de plug-ins de blocage des publicités sur notre site'),
('adblock_msg',	'Veuillez désactiver les fonctions de blocage des publicités pour utiliser pleinement les fonctionnalités du système, cela permet de reconnaître les efforts des développeurs CarrotStore.'),
('shorten_link_inp',	'Collez votre lien ici!'),
('shorten_link_btn',	'Créer des liens raccourcis'),
('shorten_link_tip_1',	'Connectez-vous à vos comptes pour gérer et visualiser les performances des liens courts que vous avez créés'),
('shorten_link_tip_2',	'Un lien {num_link} raccourci a été créé et cette performance augmentera avec le temps, démontrant l\'efficacité et le potentiel de cette application.'),
('shorten_link_tip_3',	'L\'application est déployée sur toutes les plateformes telles que le web, le téléphone. Vous pouvez le télécharger et l\'utiliser sur l\'App Store mobile'),
('shorten_link_list',	'La liste liée a été créée'),
('shorten_link_my_list',	'Ma liste raccourcie de liens'),
('link_full',	'Lien complet'),
('shorten_link_create',	'Le lien s\'est raccourci'),
('shorten_link_create',	'Le lien s\'est raccourci'),
('shorten_link_detail',	'Détails du lien raccourci'),
('shorten_link_home',	'Page d\'accueil de liens raccourcis'),
('shorten_link_error',	'Format de lien incorrect (par exemple http://www.carrotstore.com)'),
('link_nguoi_tao',	'Créateur'),
('shorten_link_status',	'Statut partagé'),
('shorten_link_status_0',	'Partagez avec tout le monde'),
('shorten_link_status_1',	'Seulement moi'),
('shorten_link_return',	'Résultats de raccourcissement des liens'),
('copy',	'Copie'),
('save_img',	'Enregistrer l\'image'),
('back',	'Retour'),
('help_off_block_ads',	'Guidez la prise de blocage des publicités'),
('help_off_block_ads_tip',	'Suivez les étapes décrites dans l\'image ci-dessous pour désactiver les plug-ins de blocage des publicités'),
('help_off_block_ads_step_1',	'<b> Étape 1: </b> cliquez sur l\'icône de blocage des annonces dans le nom de la barre d\'outils du navigateur <br>'),
('help_off_block_ads_step_2',	'<b> Étape 2: </b> Dans la liste qui apparaît, sélectionnez l\'élément <b> Pause sur ce site </b> <br>'),
('help_off_block_ads_step_3',	'<b> Étape 3: </b> Actualisez votre navigateur (ou appuyez sur la touche <b> F5 </b>) pour terminer l\'affichage de la page Web <br>'),
('hoan_tat',	'Terminé'),
('message_tip',	'Salut! Comment pouvons-nous vous aider?'),
('account_update_phone',	'Mettre à jour le numéro de téléphone'),
('account_update_phone_tip',	'Vous devez entrer votre numéro de téléphone pour utiliser pleinement les fonctions du système'),
('account_update_phone_success',	'Mettre à jour le numéro de téléphone avec succès!'),
('account_update_phone_error',	'Le numéro de téléphone n\'est pas au bon format!'),
('song_artist',	'Artiste express'),
('song_genre',	'Genre'),
('song_year',	'Année de sortie'),
('song_album',	'Album'),
('chinh_sua_thong_tin',	'Modifier les informations'),
('user_status',	'Statut partagé'),
('user_status_0',	'Partagez des informations avec tout le monde'),
('user_status_1',	'Ne pas partager d\'informations'),
('dang_nhap_mxh',	'Connectez-vous avec vos comptes sociaux'),
('dang_nhap_carrot',	'Connectez-vous avec votre compte CARROT'),
('dang_nhap_carrot_tip',	'Entrez le numéro de téléphone ou l\'e-mail et le mot de passe pour vous connecter'),
('dang_ky_carrot_tip',	'Complétez les informations dans les champs ci-dessous pour enregistrer votre compte CARROT'),
('loi_ten',	'Le nom complet ne peut pas être vide et comporter plus de 5 caractères'),
('loi_tai_khoan_da_ton_tai',	'Le compte existe déjà'),
('loi_mat_khau',	'Le mot de passe ne doit pas être vide et supérieur à 6 caractères'),
('avatar',	'Avatar'),
('password_tip',	'Créez un mot de passe pour vous aider à vous connecter à votre compte CARROT avec votre numéro de téléphone'),
('download_vcf',	'Télécharger Vcard (.vcf)'),
('tong_quan_tip',	'Afficher les informations complètes de l\'utilisateur'),
('sao_luu_danh_ba',	'sauvegarder les contacts'),
('backup_contact_tip',	'Gérez la sauvegarde de vos contacts'),
('account_setting_tip',	'Modifier et mettre à jour complètement vos informations pour utiliser toutes les fonctions du système'),
('delete',	'supprimer'),
('backup_contact_title',	'Liste des contacts de sauvegarde de vos données'),
('backup_contact_title_tip',	'Vous avez {num_bk} pour sauvegarder les contacts créés'),
('shorten_link_list_tip',	'Gérez la liste des liens courts que vous avez créés'),
('backup_contact_none',	'Vous n\'avez pas de sauvegarde créée, utilisez cette application pour sauvegarder vos contacts'),
('song_add_playlist',	'Ajoutez des chansons à votre liste de lecture'),
('my_playlist',	'Ma playlist'),
('add_song_to_playlist',	'Ajouter des chansons à cette playlist'),
('my_playlist_tip',	'Écoutez à nouveau les chansons que vous avez stockées dans les listes de lecture de musique'),
('create_playlist',	'Créer une nouvelle playlist'),
('create_playlist_tip',	'Saisissez le nom de la liste que vous souhaitez créer, Les chansons actuelles seront ajoutées à cette liste de lecture'),
('error_name_playlist_null',	'Le nom de la liste de lecture ne peut pas être vide'),
('delete_song_success',	'Suppression réussie de la chanson'),
('edit',	'Éditer'),
('my_playlist_rename_tip',	'Saisissez un nouveau nom pour cette liste de lecture'),
('update_playlist',	'mettre à jour la liste de lecture'),
('delete_tip',	'Voulez-vous vraiment supprimer cet élément, cette opération ne sera pas restaurée?'),
('box_yes',	'Oui je suis sûr!'),
('box_no',	'Non, annule!'),
('thanks',	'Merci,'),
('kr_player_help',	'Raccourci du lecteur de musique Carrot'),
('kr_help_back',	'Revenir à la chanson précédente'),
('kr_help_space',	'Mettre en pause / reprendre la chanson'),
('kr_help_next',	'Lire la chanson suivante'),
('kr_help_mute',	'Activer / désactiver le son'),
('quen_mat_khau',	'Mot de passe oublié'),
('quen_mat_khau_tip',	'Veuillez saisir votre adresse e-mail pour récupérer un mot de passe oublié'),
('quen_mat_khau_success',	'Votre mot de passe a été envoyé par e-mail. Veuillez vérifier votre e-mail pour plus d\'informations'),
('error_email',	'L\'e-mail n\'est pas au bon format'),
('quen_mat_khau_fail',	'Cette adresse e-mail n\'existe pas dans le système'),
('jailbreak_ios',	'Lien pour installer des applications pour les appareils Apple jailbreakés'),
('jailbreak_1',	'Ce lien ne fonctionne que sur le navigateur Safari, lorsque vous y accédez avec vos appareils Apple'),
('jailbreak_3',	'Vous pouvez vous référer à la façon de jailbreak dans le lien suivant (Cliquez ici pour voir)'),
('development_team',	'Développer l\'équipe'),
('dark_mode',	'Activer / désactiver le mode clair et sombre'),
('dark_mode_0',	'Le mode sombre vous aidera à améliorer la capacité de la batterie de votre appareil et à protéger la santé de vos yeux avec deux couleurs principales, le noir et le blanc, adaptées à la lecture de contenu la nuit.'),
('dark_mode_1',	'Le mode lumineux apportera l\'apparence de la page affichée avec les couleurs par défaut avec des tons vifs'),
('buy_code',	'Acheter le code source du jeu'),
('buy_code_tip',	'Vous pouvez acheter le code source de ce jeu pour continuer à développer selon vos idées ou servir la référence de référence, apprendre, apprendre, créer des jeux'),
('download_code',	'Téléchargez le code source'),
('download_game',	'Téléchargez le jeu (PC)'),
('download_link',	'Liste des liens de téléchargement'),
('nha_phat_trien',	'Les développeurs'),
('purchase_orders',	'Acheter en ligne'),
('no_return_search',	'Aucun résultat pour les mots clés ci-dessus'),
('ngon_ngu_hien_thi',	'Sélectionnez un pays et une langue');

-- 2020-10-05 09:28:29