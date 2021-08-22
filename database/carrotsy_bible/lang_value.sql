-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lang_value`;
CREATE TABLE `lang_value` (
  `id_country` varchar(2) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

TRUNCATE `lang_value`;
INSERT INTO `lang_value` (`id_country`, `value`) VALUES
('vi',	'{\"select_book\":\"Chọn loại sách mà bạn muốn đọc\",\"book_2\":\"Tân ước\",\"book_1\":\"Cựu ước\",\"app_title\":\"Kinh Thánh\",\"search\":\"Tìm kiếm\",\"search_tip\":\"Bạn có thể tìm kiếm bất cứ nội dung liên quan tới kinh thánh ở đây!\",\"close\":\"Đóng\",\"done\":\"Hoàn tất\",\"inp_tip\":\"Nhập dữ liệu vào đây\",\"quote_of_day\":\"Câu Kinh Thánh trong ngày\",\"chapter\":\"Chương\",\"speech\":\"Đọc\",\"back\":\"Trở về\",\"exit_msg\":\"Bạn có chắc chắn muốn thoát ứng dụng? Hãy bấm nút trở về thêm một lần nữa để thoát!\",\"app_other\":\"Ứng dụng khác\",\"rate_app\":\"Đánh giá\",\"share_app\":\"Chia sẻ\",\"remove_ads\":\"Gỡ quảng cáo\",\"buy_failed\":\"Mua hàng thất bại!\",\"setting_restore\":\"Khôi phục hàng đã mua\",\"restore_null\":\"Bạn chưa mua mặt hàng nào cả!\",\"restore_failed\":\"Khôi phục thất bại\",\"buy_success\":\"Gỡ quảng cáo thành công!, cảm ơn bạn đã mua những dịch vụ của hệ thống. Chúc bạn có một ngày hạnh phúc!\",\"restore_success\":\"Khôi phục các mặt hàng thành công!\",\"show_quote\":\"Trình diễn\",\"book_offline\":\"Sách ngoại tuyến\",\"book_offline_none\":\"Bạn chưa lưu trữ sách ngoại tuyến!\",\"save_book\":\"Lưu trữ ngoại tuyến\",\"save_book_success\":\"Lưu trữ sách ngoại tuyến thành công!\",\"setting\":\"Cài đặt\",\"remove_ads_tip\":\"Mua hàng Không có quảng cáo trong ứng dụng\",\"setting_restore_tip\":\"Khôi phục lại các mặt hàng bạn đã mua trước đó nếu bạn đã cài đặt lại ứng dụng\",\"delete_all_data_tip\":\"Xóa tất cả dữ liệu của ứng dụng và trở về trạng thái cài đặt ban đầu\",\"offline_title\":\"Bạn đang sử dụng ứng dụng với chế độ ngoại tuyến, các chức năng chính sẽ được hiện thị khi ứng dụng được kết nối với mạng\"}'),
('en',	'{\"select_book\":\"Choose the type of book you want to read\",\"book_2\":\"New Testament\",\"book_1\":\"Old Testament\",\"app_title\":\"Bible\",\"search\":\"Search\",\"search_tip\":\"You can search for any biblical content here!\",\"close\":\"Closed\",\"done\":\"Completed\",\"inp_tip\":\"Enter data here\",\"quote_of_day\":\"Bible verses of the day\",\"chapter\":\"chapter\",\"speech\":\"Read\",\"back\":\"Back\",\"exit_msg\":\"Are you sure you want to exit the application? Please press the return button again to exit!\",\"app_other\":\"Other applications\",\"rate_app\":\"Evaluate\",\"share_app\":\"Share\",\"remove_ads\":\"Remove ads\",\"buy_failed\":\"Purchase failed!\",\"setting_restore\":\"Restore the purchased goods\",\"restore_null\":\"Don\'t find the restored item, you haven\'t bought it yet\",\"restore_failed\":\"Restore failed\",\"buy_success\":\"Successful ad removal, thank you for purchasing the system\'s services. Wish you have a happy day!\",\"restore_success\":\"Restore items successfully!\",\"show_quote\":\"Shows\",\"book_offline\":\"Offline books\",\"book_offline_none\":\"You have not archived offline books!\",\"save_book\":\"Store offline\",\"save_book_success\":\"Successful offline book storage!\",\"setting\":\"Setting\",\"remove_ads_tip\":\"purchases No ads in the app\",\"setting_restore_tip\":\"Restore items you previously purchased if you have reinstalled the app\",\"delete_all_data_tip\":\"Erase all data of the application and return to the original installation state\",\"offline_title\":\"You are using the application in offline mode, the main functions will be displayed when the application is connected to the network\"}'),
('fr',	'{\"select_book\":\"Choisissez le type de livre que vous voulez lire\",\"book_2\":\"Nouveau Testament\",\"book_1\":\"L\'Ancien Testament\",\"app_title\":\"Bible\",\"search\":\"Chercher\",\"search_tip\":\"Vous pouvez rechercher n\'importe quel contenu biblique ici!\",\"close\":\"fermé\",\"done\":\"Terminé\",\"inp_tip\":\"Entrez les données ici\",\"quote_of_day\":\"Versets bibliques du jour\",\"chapter\":\"chapitre\",\"speech\":\"Lis\",\"back\":\"Retour\",\"exit_msg\":\"Êtes-vous sûr de vouloir quitter l\'application? S\'il vous plaît appuyez sur le bouton de retour à nouveau pour quitter!\",\"app_other\":\"autres applications\",\"rate_app\":\"Évaluer\",\"share_app\":\"Partager\",\"remove_ads\":\"Supprimez la pub\",\"buy_failed\":\"Achat raté!\",\"setting_restore\":\"Restaurer les biens achetés\",\"restore_null\":\"Vous ne trouvez pas l\'objet restauré, vous ne l\'avez pas encore acheté\",\"restore_failed\":\"La restauration a échoué\",\"buy_success\":\"Suppression réussie de l\'annonce, merci d\'avoir acheté les services du système. Je vous souhaite une bonne journée!\",\"restore_success\":\"Restaurer les éléments avec succès!\",\"show_quote\":\"Démonstration\",\"book_offline\":\"Réservez hors ligne\",\"book_offline_none\":\"Vous n\'avez pas archivé de livres hors ligne!\",\"save_book\":\"Stocker hors connexion\",\"save_book_success\":\"Stockage hors ligne de livre réussi!\",\"setting\":\"Réglage\",\"remove_ads_tip\":\"achats Pas de publicité dans l\'application\",\"setting_restore_tip\":\"Restaurer les éléments que vous avez achetés précédemment si vous avez réinstallé l\'application\",\"delete_all_data_tip\":\"Effacez toutes les données de l\'application et revenez à l\'état d\'installation d\'origine\",\"offline_title\":\"Vous utilisez l\'application en mode hors ligne, les principales fonctions s\'affichent lorsque l\'application est connectée au réseau\"}'),
('zh',	'{\"select_book\":\"选择您要阅读的图书类型\",\"book_2\":\"新约\",\"book_1\":\"旧约\",\"app_title\":\"圣经\",\"search\":\"搜索\",\"search_tip\":\"你可以在这里搜索任何圣经内容！\",\"close\":\"关闭\",\"done\":\"完\",\"inp_tip\":\"在此输入数据\",\"quote_of_day\":\"当天的圣经经文\",\"chapter\":\"章\",\"speech\":\"阅读\",\"back\":\"回来吧\",\"exit_msg\":\"您确定要退出申请吗？ 请再次按下返回按钮退出！\",\"app_other\":\"其他应用\",\"rate_app\":\"评估\",\"share_app\":\"分享\",\"remove_ads\":\"删除广告\",\"buy_failed\":\"购买失败！\",\"setting_restore\":\"恢复购买的商品\",\"restore_null\":\"你还没有买任何物品！\",\"restore_failed\":\"恢复失败\",\"buy_success\":\"成功删除广告，感谢您购买系统的服务。 祝你有快乐的一天！\",\"restore_success\":\"成功恢复项目！\",\"show_quote\":\"示范\",\"book_offline\":\"离线书籍\",\"book_offline_none\":\"您还没有存档离线图书！\",\"save_book\":\"离线存储\",\"save_book_success\":\"成功的离线图书存储！\",\"setting\":\"环境\",\"remove_ads_tip\":\"购买应用中无广告\",\"setting_restore_tip\":\"如果您重新安装了该应用程序，请还原以前购买的物品\",\"delete_all_data_tip\":\"清除应用程序的所有数据并返回到原始安装状态\",\"offline_title\":\"您正在离线模式下使用该应用程序，当该应用程序连接到网络时将显示主要功能\"}'),
('es',	'{\"select_book\":\"Elige el tipo de libro que quieres leer\",\"book_2\":\"Nuevo testamento\",\"book_1\":\"Antiguo testamento\",\"app_title\":\"Biblia\",\"search\":\"Buscar\",\"search_tip\":\"¡Puedes buscar cualquier contenido bíblico aquí!\",\"close\":\"Cerrar\",\"done\":\"Completa\",\"inp_tip\":\"Ingrese los datos aquí\",\"quote_of_day\":\"Versículos bíblicos del día\",\"chapter\":\"Capitulo\",\"speech\":\"Leer\",\"back\":\"Vuelve\",\"exit_msg\":\"¿Seguro que quieres salir de la aplicación? ¡Presione el botón de retorno nuevamente para salir!\",\"app_other\":\"Otras aplicaciones\",\"rate_app\":\"Revisar\",\"share_app\":\"Compartir\",\"remove_ads\":\"Eliminar anuncios\",\"buy_failed\":\"Compra fallida!\",\"setting_restore\":\"Restaurar los bienes comprados\",\"restore_null\":\"¡Aún no has comprado ningún artículo!\",\"restore_failed\":\"Restauración fallida\",\"buy_success\":\"Eliminación exitosa de anuncios, gracias por comprar los servicios del sistema. ¡Te deseo un feliz día!\",\"restore_success\":\"Restaurar elementos con éxito!\",\"show_quote\":\"Demostración\",\"book_offline\":\"Reserve sin conexión\",\"book_offline_none\":\"¡No has archivado libros sin conexión!\",\"save_book\":\"Almacenar sin conexión\",\"save_book_success\":\"¡Almacenamiento exitoso de libros sin conexión!\",\"setting\":\"Configuración\",\"remove_ads_tip\":\"compras Sin anuncios en la aplicación\",\"setting_restore_tip\":\"Restaure los elementos que compró anteriormente si ha reinstalado la aplicación\",\"delete_all_data_tip\":\"Borre todos los datos de la aplicación y vuelva al estado de instalación original\",\"offline_title\":\"Está utilizando la aplicación en modo fuera de línea, las funciones principales se mostrarán cuando la aplicación esté conectada a la red\"}'),
('pt',	'{\"select_book\":\"Escolha o tipo de livro que você deseja ler\",\"book_2\":\"Novo Testamento\",\"book_1\":\"Velho testamento\",\"app_title\":\"Bíblia\",\"search\":\"Pesquisar\",\"search_tip\":\"Você pode procurar por qualquer conteúdo bíblico aqui!\",\"close\":\"Fechar\",\"done\":\"Completo\",\"inp_tip\":\"Insira os dados aqui\",\"quote_of_day\":\"Versos da Bíblia do dia\",\"chapter\":\"Capítulo\",\"speech\":\"Ler\",\"back\":\"Volte\",\"exit_msg\":\"Tem certeza de que deseja sair do aplicativo? Por favor, pressione o botão de retorno novamente para sair!\",\"app_other\":\"Outras aplicações\",\"rate_app\":\"Revisão\",\"share_app\":\"Compartilhar\",\"remove_ads\":\"Remover anúncios\",\"buy_failed\":\"Compra falhou!\",\"setting_restore\":\"Restaurar os bens adquiridos\",\"restore_null\":\"Você ainda não comprou nenhum item!\",\"restore_failed\":\"Restauração falhou\",\"buy_success\":\"Remoção de anúncios bem-sucedida, obrigado por adquirir os serviços do sistema. Desejo que você tenha um dia feliz!\",\"restore_success\":\"Restaurar itens com sucesso!\",\"show_quote\":\"Demonstração\",\"book_offline\":\"Reservar off-line\",\"book_offline_none\":\"Você não arquivou livros off-line!\",\"save_book\":\"Armazenar offline\",\"save_book_success\":\"Armazenamento de livros off-line bem-sucedido!\",\"setting\":\"Contexto\",\"remove_ads_tip\":\"compras sem anúncios no aplicativo\",\"setting_restore_tip\":\"Restaure os itens que você comprou anteriormente se você reinstalou o aplicativo\",\"delete_all_data_tip\":\"Apaga todos os dados do aplicativo e retorna ao estado de instalação original\",\"offline_title\":\"Você está usando o aplicativo no modo offline, as funções principais serão exibidas quando o aplicativo for conectado à rede\"}'),
('ru',	'{\"select_book\":\"Выберите тип книги, которую вы хотите прочитать\",\"book_2\":\"Новый Завет\",\"book_1\":\"Ветхий Завет\",\"app_title\":\"библия\",\"search\":\"поиск\",\"search_tip\":\"Вы можете искать любой библейский контент здесь!\",\"close\":\"закрыто\",\"done\":\"законченный\",\"inp_tip\":\"Введите данные здесь\",\"quote_of_day\":\"Библейские стихи дня\",\"chapter\":\"глава\",\"speech\":\"считывание\",\"back\":\"Возвращайся\",\"exit_msg\":\"Вы уверены, что хотите выйти из приложения? Пожалуйста, нажмите кнопку возврата еще раз, чтобы выйти!\",\"app_other\":\"Другие приложения\",\"rate_app\":\"оценить\",\"share_app\":\"доля\",\"remove_ads\":\"Убрать рекламу\",\"buy_failed\":\"Покупка не удалась!\",\"setting_restore\":\"Восстановить купленный товар\",\"restore_null\":\"Вы еще не купили ни одного предмета!\",\"restore_failed\":\"Восстановление не удалось\",\"buy_success\":\"Успешное удаление рекламы, спасибо за покупку услуг системы. Желаю тебе счастливого дня!\",\"restore_success\":\"Восстановите предметы успешно!\",\"show_quote\":\"демонстрация\",\"book_offline\":\"Забронировать офлайн\",\"book_offline_none\":\"Вы не заархивировали автономные книги!\",\"save_book\":\"Магазин в автономном режиме\",\"save_book_success\":\"Успешное автономное хранение книг!\",\"setting\":\"Параметр\",\"remove_ads_tip\":\"покупки В приложении нет рекламы\",\"setting_restore_tip\":\"Восстановите элементы, которые вы приобрели ранее, если вы переустановили приложение\",\"delete_all_data_tip\":\"Удалите все данные приложения и вернитесь в исходное состояние установки.\",\"offline_title\":\"Вы используете приложение в автономном режиме, основные функции будут отображаться, когда приложение подключено к сети.\"}'),
('ko',	'{\"select_book\":\"읽고 싶은 책의 종류를 선택하십시오\",\"book_2\":\"신약\",\"book_1\":\"구약\",\"app_title\":\"성경\",\"search\":\"수색\",\"search_tip\":\"당신은 여기에 성경 내용을 검색 할 수 있습니다!\",\"close\":\"닫은\",\"done\":\"완료\",\"inp_tip\":\"여기에 데이터를 입력하십시오\",\"quote_of_day\":\"오늘의 성경 구절\",\"chapter\":\"장\",\"speech\":\"독서\",\"back\":\"뒤로\",\"exit_msg\":\"응용 프로그램을 종료 하시겠습니까? 종료 버튼을 다시 누르면 종료됩니다!\",\"app_other\":\"다른 응용\",\"rate_app\":\"평가\",\"share_app\":\"몫\",\"remove_ads\":\"광고를 제거하다\",\"buy_failed\":\"구매 실패!\",\"setting_restore\":\"구매 한 상품 복원\",\"restore_null\":\"복원 된 항목을 찾지 못했습니다. 아직 구입하지 않았습니다\",\"restore_failed\":\"복원 실패\",\"buy_success\":\"광고를 성공적으로 삭제했습니다. 시스템 서비스를 구입해 주셔서 감사합니다. 행복한 하루 되시기 바랍니다!\",\"restore_success\":\"항목을 성공적으로 복원하십시오!\",\"show_quote\":\"쇼\",\"book_offline\":\"오프라인 도서\",\"book_offline_none\":\"오프라인 도서를 보관하지 않았습니다!\",\"save_book\":\"오프라인으로 저장\",\"save_book_success\":\"오프라인 도서 저장에 성공했습니다!\",\"setting\":\"환경\",\"remove_ads_tip\":\"앱에 광고 없음\",\"setting_restore_tip\":\"앱을 다시 설치 한 경우 이전에 구입 한 항목 복원\",\"delete_all_data_tip\":\"응용 프로그램의 모든 데이터를 지우고 원래 설치 상태로 돌아갑니다.\",\"offline_title\":\"오프라인 모드에서 애플리케이션을 사용 중입니다. 애플리케이션이 네트워크에 연결되면 주요 기능이 표시됩니다.\"}'),
('de',	'{\"select_book\":\"Wählen Sie die Art des Buches, das Sie lesen möchten\",\"book_2\":\"Neues Testament\",\"book_1\":\"Altes Testament\",\"app_title\":\"Bibel\",\"search\":\"Suche\",\"search_tip\":\"Hier können Sie nach biblischen Inhalten suchen!\",\"close\":\"Geschlossen\",\"done\":\"Abgeschlossen\",\"inp_tip\":\"Geben Sie hier Daten ein\",\"quote_of_day\":\"Bibelverse des Tages\",\"chapter\":\"Kapitel\",\"speech\":\"Lesen\",\"back\":\"Zurück\",\"exit_msg\":\"Möchten Sie die Anwendung wirklich beenden? Bitte drücken Sie die Eingabetaste erneut, um den Vorgang zu beenden!\",\"app_other\":\"Andere Anwendungen\",\"rate_app\":\"Bewerten\",\"share_app\":\"Aktie\",\"remove_ads\":\"Anzeigen entfernen\",\"buy_failed\":\"Kauf gescheitert!\",\"setting_restore\":\"Stellen Sie die gekaufte Ware wieder her\",\"restore_null\":\"Finden Sie den restaurierten Gegenstand nicht, Sie haben ihn noch nicht gekauft\",\"restore_failed\":\"Wiederherstellung fehlgeschlagen\",\"buy_success\":\"Erfolgreiche Entfernung von Anzeigen. Vielen Dank, dass Sie sich für die Dienste des Systems entschieden haben. Wünsche dir einen schönen Tag!\",\"restore_success\":\"Elemente erfolgreich wiederherstellen!\",\"show_quote\":\"Zeigt an\",\"book_offline\":\"Offline-Bücher\",\"book_offline_none\":\"Sie haben keine Offline-Bücher archiviert!\",\"save_book\":\"Offline speichern\",\"save_book_success\":\"Erfolgreiche Offline-Buchspeicherung!\",\"setting\":\"Rahmen\",\"remove_ads_tip\":\"Käufe Keine Anzeigen in der App\",\"setting_restore_tip\":\"Stellen Sie zuvor gekaufte Artikel wieder her, wenn Sie die App neu installiert haben\",\"delete_all_data_tip\":\"Löschen Sie alle Daten der Anwendung und kehren Sie zum ursprünglichen Installationsstatus zurück\",\"offline_title\":\"Wenn Sie die Anwendung im Offline-Modus verwenden, werden die Hauptfunktionen angezeigt, wenn die Anwendung mit dem Netzwerk verbunden ist\"}'),
('sd',	'sdsadsad'),
('pl',	'{\"select_book\":\"Wybierz rodzaj książki, którą chcesz przeczytać\",\"book_2\":\"Nowy Testament\",\"book_1\":\"Stary Testament\",\"app_title\":\"Biblia\",\"search\":\"Szukaj\",\"search_tip\":\"Tutaj możesz wyszukać dowolną treść biblijną!\",\"close\":\"Zamknięte\",\"done\":\"Zakończony\",\"inp_tip\":\"Wprowadź dane tutaj\",\"quote_of_day\":\"Biblijne wersety dnia\",\"chapter\":\"rozdział\",\"speech\":\"Czytać\",\"back\":\"Z powrotem\",\"exit_msg\":\"Czy na pewno chcesz zamknąć aplikację? Proszę ponownie nacisnąć przycisk powrotu, aby wyjść!\",\"app_other\":\"Inne aplikacje\",\"rate_app\":\"Oceniać\",\"share_app\":\"Dzielić\",\"remove_ads\":\"Usuń reklamy\",\"buy_failed\":\"Zakup nie powiódł się!\",\"setting_restore\":\"Przywróć zakupione towary\",\"restore_null\":\"Nie możesz znaleźć przywróconego przedmiotu, jeszcze go nie kupiłeś\",\"restore_failed\":\"Przywracanie nie powiodło się\",\"buy_success\":\"Udane usunięcie reklam, dziękujemy za zakup usług systemu. Życzę szczęśliwego dnia!\",\"restore_success\":\"Przywróć przedmioty pomyślnie!\",\"show_quote\":\"Przedstawia\",\"book_offline\":\"Książki offline\",\"book_offline_none\":\"Nie zarchiwizowałeś książek offline!\",\"save_book\":\"Przechowuj offline\",\"save_book_success\":\"Pomyślne przechowywanie książek w trybie offline!\",\"setting\":\"Oprawa\",\"remove_ads_tip\":\"zakupy Brak reklam w aplikacji\",\"setting_restore_tip\":\"Przywróć przedmioty, które wcześniej kupiłeś, jeśli ponownie zainstalowałeś aplikację\",\"delete_all_data_tip\":\"Usuń wszystkie dane aplikacji i wróć do pierwotnego stanu instalacji\",\"offline_title\":\"Używasz aplikacji w trybie offline, główne funkcje będą wyświetlane, gdy aplikacja jest połączona z siecią\"}'),
('hi',	'{\"select_book\":\"आप जिस प्रकार की किताब पढ़ना चाहते हैं उसे चुनें\",\"book_2\":\"नए करार\",\"book_1\":\"बाइबिल\",\"app_title\":\"बाइबिल\",\"search\":\"खोज\",\"search_tip\":\"आप यहाँ बाइबल की कोई भी सामग्री खोज सकते हैं!\",\"close\":\"बंद किया हुआ\",\"done\":\"पूरा हुआ\",\"inp_tip\":\"यहां डेटा दर्ज करें\",\"quote_of_day\":\"दिन के बाइबिल छंद\",\"chapter\":\"अध्याय\",\"speech\":\"पढ़ें\",\"back\":\"वापस\",\"exit_msg\":\"क्या आप वाकई ऐप्लिकेशन से बाहर निकलना चाहते हैं? कृपया बाहर निकलने के लिए फिर से वापसी बटन दबाएं!\",\"app_other\":\"अन्य अनुप्रयोगों\",\"rate_app\":\"मूल्यांकन करना\",\"share_app\":\"शेयर\",\"remove_ads\":\"विज्ञापन हटाएँ\",\"buy_failed\":\"खरीद विफल रही!\",\"setting_restore\":\"खरीदे गए सामान को पुनर्स्थापित करें\",\"restore_null\":\"पुनर्स्थापित वस्तु नहीं मिली, आपने इसे अभी तक नहीं खरीदा है\",\"restore_failed\":\"पुनर्स्थापना विफल\",\"buy_success\":\"सफल विज्ञापन निष्कासन, सिस्टम की सेवाओं को खरीदने के लिए धन्यवाद। काश आपका दिन मंगलमय हो!\",\"restore_success\":\"आइटम को सफलतापूर्वक पुनर्स्थापित करें!\",\"show_quote\":\"दिखाता है\",\"book_offline\":\"ऑफलाइन किताबें\",\"book_offline_none\":\"आपने ऑफ़लाइन पुस्तकों को संग्रहीत नहीं किया है!\",\"save_book\":\"ऑफ़लाइन स्टोर करें\",\"save_book_success\":\"सफल ऑफ़लाइन पुस्तक संग्रहण!\",\"setting\":\"स्थापना\",\"remove_ads_tip\":\"ऐप में कोई विज्ञापन नहीं\",\"setting_restore_tip\":\"यदि आपने ऐप को फिर से इंस्टॉल किया है तो आपके द्वारा पहले खरीदी गई वस्तुओं को पुनर्स्थापित करें\",\"delete_all_data_tip\":\"एप्लिकेशन के सभी डेटा को मिटा दें और मूल स्थापना स्थिति में वापस आ जाएं\",\"offline_title\":\"आप ऑफ़लाइन मोड में एप्लिकेशन का उपयोग कर रहे हैं, जब एप्लिकेशन नेटवर्क से कनेक्ट होता है तो मुख्य कार्य प्रदर्शित होंगे\"}'),
('th',	'{\"select_book\":\"เลือกประเภทหนังสือที่ต้องการอ่าน\",\"book_2\":\"พันธสัญญาใหม่\",\"book_1\":\"พันธสัญญาเดิม\",\"app_title\":\"คัมภีร์ไบเบิล\",\"search\":\"ค้นหา\",\"search_tip\":\"คุณสามารถค้นหาเนื้อหาในพระคัมภีร์ได้ที่นี่!\",\"close\":\"ปิด\",\"done\":\"เสร็จสมบูรณ์\",\"inp_tip\":\"ป้อนข้อมูลที่นี่\",\"quote_of_day\":\"ข้อพระคัมภีร์ประจำวัน\",\"chapter\":\"บท\",\"speech\":\"อ่าน\",\"back\":\"กลับ\",\"exit_msg\":\"คุณแน่ใจหรือไม่ว่าต้องการออกจากแอปพลิเคชัน กรุณากดปุ่มย้อนกลับอีกครั้งเพื่อออก!\",\"app_other\":\"แอปพลิเคชั่นอื่นๆ\",\"rate_app\":\"ประเมิน\",\"share_app\":\"แบ่งปัน\",\"remove_ads\":\"ลบโฆษณา\",\"buy_failed\":\"การซื้อล้มเหลว!\",\"setting_restore\":\"คืนสินค้าที่ซื้อ\",\"restore_null\":\"ไม่พบรายการที่คืนค่า คุณยังไม่ได้ซื้อ\",\"restore_failed\":\"การกู้คืนล้มเหลว\",\"buy_success\":\"ลบโฆษณาสำเร็จ ขอขอบคุณที่ซื้อบริการของระบบ ขอให้เป็นวันที่มีความสุข!\",\"restore_success\":\"กู้คืนไอเทมสำเร็จ!\",\"show_quote\":\"การแสดง\",\"book_offline\":\"หนังสือออฟไลน์\",\"book_offline_none\":\"คุณยังไม่ได้เก็บหนังสือออฟไลน์!\",\"save_book\":\"ร้านค้าออฟไลน์\",\"save_book_success\":\"การจัดเก็บหนังสือออฟไลน์สำเร็จ!\",\"setting\":\"การตั้งค่า\",\"remove_ads_tip\":\"ซื้อไม่มีโฆษณาในแอป\",\"setting_restore_tip\":\"กู้คืนรายการที่คุณซื้อก่อนหน้านี้หากคุณติดตั้งแอพอีกครั้ง\",\"delete_all_data_tip\":\"ลบข้อมูลทั้งหมดของแอปพลิเคชันและกลับสู่สถานะการติดตั้งดั้งเดิม\",\"offline_title\":\"คุณกำลังใช้แอปพลิเคชันในโหมดออฟไลน์ ฟังก์ชันหลักจะปรากฏขึ้นเมื่อแอปพลิเคชันเชื่อมต่อกับเครือข่าย\"}'),
('ja',	'{\"select_book\":\"読みたい本の種類を選択してください\",\"book_2\":\"新約聖書\",\"book_1\":\"旧約聖書\",\"app_title\":\"聖書\",\"search\":\"探す\",\"search_tip\":\"ここで聖書の内容を検索できます！\",\"close\":\"閉まっている\",\"done\":\"完了\",\"inp_tip\":\"ここにデータを入力してください\",\"quote_of_day\":\"その日の聖書の一節\",\"chapter\":\"章\",\"speech\":\"読んだ\",\"back\":\"バック\",\"exit_msg\":\"アプリケーションを終了してもよろしいですか？ もう一度戻るボタンを押して終了してください。\",\"app_other\":\"その他のアプリケーション\",\"rate_app\":\"評価する\",\"share_app\":\"シェア\",\"remove_ads\":\"広告を削除\",\"buy_failed\":\"購入に失敗しました！\",\"setting_restore\":\"購入した商品を復元する\",\"restore_null\":\"復元されたアイテムが見つかりません。まだ購入していません。\",\"restore_failed\":\"復元に失敗しました\",\"buy_success\":\"広告の削除に成功しました。システムのサービスをご購入いただきありがとうございます。 幸せな一日をお過ごしください！\",\"restore_success\":\"アイテムを正常に復元します！\",\"show_quote\":\"ショー\",\"book_offline\":\"オフラインの本\",\"book_offline_none\":\"オフラインの本をアーカイブしていません！\",\"save_book\":\"オフラインで保存\",\"save_book_success\":\"オフラインの本の保管に成功しました！\",\"setting\":\"設定\",\"remove_ads_tip\":\"アプリに広告を購入しない\",\"setting_restore_tip\":\"アプリを再インストールした場合は、以前に購入したアイテムを復元します\",\"delete_all_data_tip\":\"アプリケーションのすべてのデータを消去して、元のインストール状態に戻します\",\"offline_title\":\"アプリケーションをオフラインモードで使用している場合、アプリケーションがネットワークに接続されると主な機能が表示されます\"}'),
('ar',	'{\"select_book\":\"اختر نوع الكتاب الذي تريد قراءته\",\"book_2\":\"العهد الجديد\",\"book_1\":\"العهد القديم\",\"app_title\":\"الكتاب المقدس\",\"search\":\"يبحث\",\"search_tip\":\"يمكنك البحث عن أي محتوى كتابي هنا!\",\"close\":\"مغلق\",\"done\":\"مكتمل\",\"inp_tip\":\"أدخل البيانات هنا\",\"quote_of_day\":\"آيات الكتاب المقدس اليوم\",\"chapter\":\"الفصل\",\"speech\":\"يقرأ\",\"back\":\"عودة\",\"exit_msg\":\"هل أنت متأكد أنك تريد الخروج من التطبيق؟ الرجاء الضغط على زر العودة مرة أخرى للخروج!\",\"app_other\":\"تطبيقات أخرى\",\"rate_app\":\"يقيم\",\"share_app\":\"يشارك\",\"remove_ads\":\"ازالة الاعلانات\",\"buy_failed\":\"الشراء لم ينجح!\",\"setting_restore\":\"استعادة البضائع المشتراة\",\"restore_null\":\"لا تجد العنصر المستعاد ، فأنت لم تشتريه بعد\",\"restore_failed\":\"فشلت الاستعادة\",\"buy_success\":\"تمت إزالة الإعلان بنجاح ، شكرًا لك على شراء خدمات النظام. أتمنى لك يوما سعيدا!\",\"restore_success\":\"استعادة العناصر بنجاح!\",\"show_quote\":\"عروض\",\"book_offline\":\"الكتب غير المتصلة بالإنترنت\",\"book_offline_none\":\"لم تقم بأرشفة الكتب في وضع عدم الاتصال!\",\"save_book\":\"تخزين حاليا\",\"save_book_success\":\"تخزين الكتب بنجاح دون اتصال بالإنترنت!\",\"setting\":\"جلسة\",\"remove_ads_tip\":\"المشتريات لا توجد إعلانات في التطبيق\",\"setting_restore_tip\":\"قم باستعادة العناصر التي اشتريتها مسبقًا إذا قمت بإعادة تثبيت التطبيق\",\"delete_all_data_tip\":\"امسح جميع بيانات التطبيق والعودة إلى حالة التثبيت الأصلية\",\"offline_title\":\"إذا كنت تستخدم التطبيق في وضع غير متصل بالشبكة ، فسيتم عرض الوظائف الرئيسية عند توصيل التطبيق بالشبكة\"}'),
('tr',	'{\"select_book\":\"Okumak istediğiniz kitap türünü seçin\",\"book_2\":\"Yeni Ahit\",\"book_1\":\"Eski Ahit\",\"app_title\":\"Kutsal Kitap\",\"search\":\"Arama\",\"search_tip\":\"İncille ilgili herhangi bir içeriği burada arayabilirsiniz!\",\"close\":\"Kapalı\",\"done\":\"Tamamlandı\",\"inp_tip\":\"Verileri buraya girin\",\"quote_of_day\":\"Günün İncil ayetleri\",\"chapter\":\"bölüm\",\"speech\":\"oku\",\"back\":\"Geri\",\"exit_msg\":\"Uygulamadan çıkmak istediğinizden emin misiniz? Lütfen çıkmak için geri dönüş düğmesine tekrar basın!\",\"app_other\":\"Diğer uygulamalar\",\"rate_app\":\"Değerlendirmek\",\"share_app\":\"Paylaş\",\"remove_ads\":\"Reklamları kaldırmak\",\"buy_failed\":\"Satın alma başarısız oldu!\",\"setting_restore\":\"Satın alınan malları geri yükleyin\",\"restore_null\":\"Geri yüklenen öğeyi bulma, henüz satın almadınız\",\"restore_failed\":\"Geri yükleme başarısız oldu\",\"buy_success\":\"Başarılı reklam kaldırma, sistem hizmetlerini satın aldığınız için teşekkür ederiz. Mutlu bir gün geçirmeniz dileğiyle!\",\"restore_success\":\"Öğeleri başarıyla geri yükleyin!\",\"show_quote\":\"Şovlar\",\"book_offline\":\"Çevrimdışı kitaplar\",\"book_offline_none\":\"Çevrimdışı kitapları arşivlemediniz!\",\"save_book\":\"Çevrimdışı depola\",\"save_book_success\":\"Başarılı çevrimdışı kitap depolama!\",\"setting\":\"ayar\",\"remove_ads_tip\":\"Uygulamada reklam yok\",\"setting_restore_tip\":\"Uygulamayı yeniden yüklediyseniz daha önce satın aldığınız öğeleri geri yükleyin\",\"delete_all_data_tip\":\"Uygulamanın tüm verilerini silin ve orijinal kurulum durumuna geri dönün\",\"offline_title\":\"Uygulamayı çevrimdışı modda kullanıyorsunuz, uygulama ağa bağlandığında ana işlevler görüntülenecektir.\"}'),
('fi',	'{\"select_book\":\"Valitse kirjatyyppi, jonka haluat lukea\",\"book_2\":\"Uusi testamentti\",\"book_1\":\"Vanha testamentti\",\"app_title\":\"raamattu\",\"search\":\"Hae\",\"search_tip\":\"Voit etsiä mitä tahansa raamatullista sisältöä täältä!\",\"close\":\"Suljettu\",\"done\":\"Valmistunut\",\"inp_tip\":\"Syötä tiedot tähän\",\"quote_of_day\":\"Päivän Raamatun jakeet\",\"chapter\":\"luku\",\"speech\":\"luku\",\"back\":\"Takaisin\",\"exit_msg\":\"Haluatko varmasti poistua sovelluksesta? Poistu painamalla paluupainiketta uudelleen!\",\"app_other\":\"Muut sovellukset\",\"rate_app\":\"Arvioida\",\"share_app\":\"Jaa\",\"remove_ads\":\"Poista mainokset\",\"buy_failed\":\"Osto epäonnistui!\",\"setting_restore\":\"Palauta ostetut tavarat\",\"restore_null\":\"Älä löydä palautettua tuotetta, et ole vielä ostanut sitä\",\"restore_failed\":\"Palauttaminen epäonnistui\",\"buy_success\":\"Mainoksen poisto onnistui, kiitos järjestelmän palveluiden ostamisesta. Toivotan sinulle hyvää päivää!\",\"restore_success\":\"Palauta kohteet onnistuneesti!\",\"show_quote\":\"Näyttää\",\"book_offline\":\"Offline-kirjat\",\"book_offline_none\":\"Et ole arkistoinut offline-kirjoja!\",\"save_book\":\"Säilytä offline-tilassa\",\"save_book_success\":\"Onnistunut offline-kirjojen tallennus!\",\"setting\":\"Asetus\",\"remove_ads_tip\":\"ostokset Ei mainoksia sovelluksessa\",\"setting_restore_tip\":\"Palauta aiemmin ostamasi tuotteet, jos olet asentanut sovelluksen uudelleen\",\"delete_all_data_tip\":\"Poista kaikki sovelluksen tiedot ja palaa alkuperäiseen asennustilaan\",\"offline_title\":\"Käytät sovellusta offline-tilassa, päätoiminnot näytetään, kun sovellus on kytketty verkkoon\"}'),
('it',	'{\"select_book\":\"Scegli il tipo di libro che vuoi leggere\",\"book_2\":\"Nuovo Testamento\",\"book_1\":\"Vecchio Testamento\",\"app_title\":\"Bibbia\",\"search\":\"Ricerca\",\"search_tip\":\"Puoi cercare qualsiasi contenuto biblico qui!\",\"close\":\"Chiuso\",\"done\":\"Completato\",\"inp_tip\":\"Inserisci qui i dati\",\"quote_of_day\":\"Versetti biblici del giorno\",\"chapter\":\"capitolo\",\"speech\":\"Leggere\",\"back\":\"Indietro\",\"exit_msg\":\"Sei sicuro di voler uscire dall\'applicazione? Si prega di premere nuovamente il pulsante di ritorno per uscire!\",\"app_other\":\"Altre applicazioni\",\"rate_app\":\"Valutare\",\"share_app\":\"Condividere\",\"remove_ads\":\"Rimuovere gli annunci\",\"buy_failed\":\"Acquisto fallito!\",\"setting_restore\":\"Ripristina la merce acquistata\",\"restore_null\":\"Non trovi l\'oggetto restaurato, non l\'hai ancora acquistato\",\"restore_failed\":\"Ripristino fallito\",\"buy_success\":\"Rimozione dell\'annuncio riuscita, grazie per aver acquistato i servizi del sistema. Ti auguro una felice giornata!\",\"restore_success\":\"Ripristina gli elementi con successo!\",\"show_quote\":\"Spettacoli\",\"book_offline\":\"Libri offline\",\"book_offline_none\":\"Non hai archiviato libri offline!\",\"save_book\":\"Negozio offline\",\"save_book_success\":\"Archiviazione di libri offline di successo!\",\"setting\":\"Ambientazione\",\"remove_ads_tip\":\"acquisti Nessuna pubblicità nell\'app\",\"setting_restore_tip\":\"Ripristina gli elementi che hai acquistato in precedenza se hai reinstallato l\'app\",\"delete_all_data_tip\":\"Cancella tutti i dati dell\'applicazione e torna allo stato di installazione originale\",\"offline_title\":\"Stai utilizzando l\'applicazione in modalità offline, le funzioni principali verranno visualizzate quando l\'applicazione è connessa alla rete\"}'),
('id',	'{\"select_book\":\"Pilih jenis buku yang ingin Anda baca\",\"book_2\":\"Perjanjian Baru\",\"book_1\":\"Perjanjian Lama\",\"app_title\":\"Alkitab\",\"search\":\"Cari\",\"search_tip\":\"Anda dapat mencari konten alkitabiah apa pun di sini!\",\"close\":\"Tutup\",\"done\":\"Lengkap\",\"inp_tip\":\"Masukkan data di sini\",\"quote_of_day\":\"Ayat Alkitab hari ini\",\"chapter\":\"bab\",\"speech\":\"Baca baca\",\"back\":\"Kembali\",\"exit_msg\":\"Apakah Anda yakin ingin keluar dari aplikasi? Silakan tekan tombol kembali lagi untuk keluar!\",\"app_other\":\"Aplikasi lain\",\"rate_app\":\"Evaluasi\",\"share_app\":\"Bagikan\",\"remove_ads\":\"Hilangkan iklan\",\"buy_failed\":\"Pembelian gagal!\",\"setting_restore\":\"Kembalikan barang yang dibeli\",\"restore_null\":\"Tidak menemukan item yang dipulihkan, Anda belum membelinya\",\"restore_failed\":\"Pemulihan gagal\",\"buy_success\":\"Penghapusan iklan berhasil, terima kasih telah membeli layanan sistem. Semoga harimu menyenangkan!\",\"restore_success\":\"Pulihkan item dengan sukses!\",\"show_quote\":\"menunjukkan\",\"book_offline\":\"Buku offline\",\"book_offline_none\":\"Anda belum mengarsipkan buku offline!\",\"save_book\":\"Toko offline\",\"save_book_success\":\"Penyimpanan buku offline yang sukses!\",\"setting\":\"Pengaturan\",\"remove_ads_tip\":\"pembelian Tidak ada iklan di aplikasi\",\"setting_restore_tip\":\"Pulihkan item yang Anda beli sebelumnya jika Anda telah menginstal ulang aplikasi\",\"delete_all_data_tip\":\"Hapus semua data aplikasi dan kembali ke status instalasi semula\",\"offline_title\":\"Anda menggunakan aplikasi dalam mode offline, fungsi utama akan ditampilkan saat aplikasi terhubung ke jaringan\"}'),
('da',	'{\"select_book\":\"Vælg den bogtype, du vil læse\",\"book_2\":\"Nye Testamente\",\"book_1\":\"Gamle Testamente\",\"app_title\":\"bibel\",\"search\":\"Søg\",\"search_tip\":\"Lukket\",\"close\":\"Lukket\",\"done\":\"Afsluttet\",\"inp_tip\":\"Indtast data her\",\"quote_of_day\":\"Dags bibelvers\",\"chapter\":\"kapitel\",\"speech\":\"Læs\",\"back\":\"Tilbage\",\"exit_msg\":\"Er du sikker på, at du vil afslutte applikationen? Tryk på retur-knappen igen for at afslutte!\",\"app_other\":\"Andre applikationer\",\"rate_app\":\"Vurdere\",\"share_app\":\"Del\",\"remove_ads\":\"Fjern annoncer\",\"buy_failed\":\"Køb mislykkedes!\",\"setting_restore\":\"Gendan de købte varer\",\"restore_null\":\"Find ikke den gendannede vare, du har ikke købt den endnu\",\"restore_failed\":\"Gendannelse mislykkedes\",\"buy_success\":\"Vellykket fjernelse af annoncer, tak fordi du købte systemets tjenester. Ønsker du får en lykkelig dag!\",\"restore_success\":\"Gendan genstande med succes!\",\"show_quote\":\"Viser sig\",\"book_offline\":\"Offline bøger\",\"book_offline_none\":\"Du har ikke arkiveret offline bøger!\",\"save_book\":\"Gem offline\",\"save_book_success\":\"Vellykket offline bogopbevaring!\",\"setting\":\"Indstilling\",\"remove_ads_tip\":\"køber Ingen annoncer i appen\",\"setting_restore_tip\":\"Gendan varer, du tidligere har købt, hvis du har geninstalleret appen\",\"delete_all_data_tip\":\"Slet alle data i applikationen, og vend tilbage til den oprindelige installationstilstand\",\"offline_title\":\"Du bruger applikationen i offline-tilstand, de vigtigste funktioner vises, når applikationen er tilsluttet netværket\"}'),
('nl',	'{\"select_book\":\"Kies het type boek dat je wilt lezen\",\"book_2\":\"Nieuwe Testament\",\"book_1\":\"Oude Testament\",\"app_title\":\"Bijbel\",\"search\":\"Zoeken\",\"search_tip\":\"U kunt hier naar elke bijbelse inhoud zoeken!\",\"close\":\"Gesloten\",\"done\":\"Voltooid\",\"inp_tip\":\"Vul hier gegevens in\",\"quote_of_day\":\"Bijbelverzen van de dag\",\"chapter\":\"hoofdstuk\",\"speech\":\"Lezen\",\"back\":\"Terug\",\"exit_msg\":\"Weet u zeker dat u de toepassing wilt afsluiten? Druk nogmaals op de terugkeerknop om af te sluiten!\",\"app_other\":\"Andere applicaties\",\"rate_app\":\"evalueren\",\"share_app\":\"Delen\",\"remove_ads\":\"Verwijder advertenties\",\"buy_failed\":\"Aankoop mislukt!\",\"setting_restore\":\"De gekochte goederen herstellen\",\"restore_null\":\"Vind het herstelde item niet, je hebt het nog niet gekocht\",\"restore_failed\":\"Herstellen mislukt\",\"buy_success\":\"Succesvolle advertentieverwijdering, bedankt voor het aanschaffen van de systeemservices. Wens je een gelukkige dag!\",\"restore_success\":\"Herstel items succesvol!\",\"show_quote\":\"Shows\",\"book_offline\":\"Offline boeken\",\"book_offline_none\":\"Je hebt geen offline boeken gearchiveerd!\",\"save_book\":\"Offline opslaan\",\"save_book_success\":\"Succesvolle offline boekopslag!\",\"setting\":\"Instelling\",\"remove_ads_tip\":\"aankopen Geen advertenties in de app\",\"setting_restore_tip\":\"Herstel items die u eerder hebt gekocht als u de app opnieuw hebt geïnstalleerd\",\"delete_all_data_tip\":\"Wis alle gegevens van de applicatie en keer terug naar de oorspronkelijke installatiestatus\",\"offline_title\":\"U gebruikt de applicatie in de offline modus, de belangrijkste functies worden weergegeven wanneer de applicatie is verbonden met het netwerk\"}');

-- 2021-08-13 12:33:35
