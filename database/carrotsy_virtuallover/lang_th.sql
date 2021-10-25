-- Adminer 4.8.1 MySQL 5.7.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lang_th`;
CREATE TABLE `lang_th` (
  `key` varchar(50) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE `lang_th`;
INSERT INTO `lang_th` (`key`, `value`) VALUES
('mua_sp',	'ผลิตภัณฑ์'),
('tip_search',	'คุณต้องการค้นหาอะไร'),
('download_on',	'ดาวน์โหลดแอพนี้บน'),
('luu_tru_lien_he',	'ติดต่อร้านค้า'),
('sp',	'สินค้า'),
('tat_ca',	'ทั้งหมด'),
('gioi_thieu',	'แนะนำ'),
('tai_khoan',	'บัญชี'),
('chi_tiet',	'ดูรายละเอียด'),
('dia_chi',	'ที่อยู่'),
('ds_thanh_vien',	'รายชื่อผู้ใช้'),
('goi_dien',	'โทรศัพท์'),
('dang_xu_ly',	'รอความคืบหน้า'),
('dang_lay_du_lieu',	'กำลังโหลดข้อมูล ...'),
('loai',	'หมวดหมู่'),
('dang_nhap_tip',	'ชื่อผู้ใช้'),
('mat_khau',	'รหัสผ่าน'),
('dang_nhap',	'เข้าสู่ระบบ'),
('dang_ky',	'การลงทะเบียน'),
('them_vao_gio_hang',	'เพิ่มใส่ตะกร้า'),
('document',	'เอกสาร'),
('dk_tai_khoan',	'ลงทะเบียนบัญชี'),
('tong_quan',	'ภาพรวม'),
('quoc_gia',	'ประเทศ'),
('loi',	'ความผิดพลาด'),
('loi_dang_nhap',	'การเข้าสู่ระบบล้มเหลวโปรดตรวจสอบข้อมูลการเข้าสู่ระบบของคุณ'),
('da_them_gio_hang',	'สั่งซื้อสำเร็จ!'),
('app_online',	'แอปพลิเคชั่นเว็บไซต์'),
('tong_gia',	'ราคารวม'),
('Ten_dang_nhap',	'ชื่อผู้ใช้'),
('Nhap_lai_mat_khau',	'ยืนยันรหัสผ่านอีกครั้ง'),
('chu_thich',	'อธิบาย'),
('so_dien_thoai',	'หมายเลขโทรศัพท์'),
('ten_day_du',	'ชื่อเต็ม'),
('click_de_xem',	'คลิกเพื่อดู'),
('danh_gia',	'ประเมินผล'),
('tinh_trang_tai_khoan',	'สถานะบัญชี'),
('khong_co_binh_luan',	'ไม่มีความเห็น!'),
('sp_tuong_tu',	'ผลิตภัณฑ์ที่คล้ายกัน'),
('so_nguoi_da_danh_gia',	'จำนวนคนที่ให้คะแนน'),
('luot_xem',	'ดู'),
('ngay_dang',	'วันที่โพสต์'),
('ngay_sua',	'วันที่แก้ไข'),
('gia',	'ราคา'),
('nhap_binh_luan',	'ใส่ความคิดเห็นของคุณที่นี่!'),
('dang_binh_luan',	'แสดงความคิดเห็น'),
('moi_nhat',	'ล่าสุด'),
('cu_nhat',	'เก่าแก่ที่สุด'),
('pho_bien_nhat',	'เป็นที่นิยมมากที่สุด'),
('tra_loi',	'ตอบ'),
('am_nhac_cho_cuoc_song',	'ดนตรีเพื่อชีวิต'),
('choi_nhac',	'เล่นเพลง'),
('loi_bai_hat',	'เนื้อร้องของเพลง'),
('chua_co_loi_bai_hat',	'ยังไม่มีเนื้อเพลง'),
('music_top_month',	'การโต้ตอบมากที่สุดของเดือน'),
('music_top_0',	'มีความสุข'),
('music_top_1',	'เสียใจ'),
('music_top_2',	'ผ่อนคลาย'),
('music_top_3',	'ตื่นเต้น'),
('music_no_rank',	'ยังไม่มีเรตติ้ง'),
('xem_video',	'ดูวิดีโอที่เกี่ยวข้อง'),
('download_app_music_tip',	'ดาวน์โหลดแอพเหล่านี้ได้ที่ ch play app store และ app store เพื่อฟังเพลงที่ยอดเยี่ยม!'),
('chia_se',	'หุ้น'),
('dang_gia_music_tip',	'ประเมินความรู้สึกของคุณเกี่ยวกับเพลงนี้ซึ่งจะช่วยให้เพลงเพิ่มคะแนนและเพิ่มความนิยมในระบบ'),
('ung_ho',	'บริจาค'),
('ung_ho_tip',	'ระดมเงิน'),
('music_same',	'เพลงอื่น ๆ'),
('chu_thich_ung_ho',	'โปรดบริจาคค่าใช้จ่ายเล็ก ๆ ของคุณเพื่อให้เราสามารถดูแลเซิร์ฟเวอร์และสร้างแกดเจ็ตที่น่าสนใจอื่น ๆ อีกมากมาย ขอบคุณมาก ๆ'),
('lien_he_cung_ten',	'ผู้ติดต่อในชื่อเดียวกัน'),
('lien_he_lien_quan',	'ผู้ติดต่อที่เกี่ยวข้อง'),
('download_app_contact_tip',	'ดาวน์โหลดแอพเหล่านี้เพื่อให้คุณสามารถเชื่อมต่อกับผู้คนและใช้ประโยชน์อื่น ๆ ได้!'),
('gu_am_nhac',	'รสนิยมทางดนตรี'),
('gioi_tinh',	'เพศ'),
('sex_0',	'ชาย'),
('sex_1',	'หญิง'),
('date_start',	'วันที่ลงทะเบียน'),
('date_cur',	'วันที่โต้ตอบล่าสุด'),
('chinh_sach',	'นโยบายความเป็นส่วนตัว'),
('no_product',	'ไม่มีสินค้า'),
('chinh_sach_tip',	'ข้อกำหนดทั่วไปเกี่ยวกับสิทธิและความรับผิดชอบที่เกิดขึ้นจากหลักการรับรองความถูกต้องของข้อมูลส่วนบุคคลความสัมพันธ์และเสถียรภาพของผู้ให้บริการ โดยการใช้การเผยแพร่ข้อมูลผู้ใช้เห็นด้วยกับข้อตกลงเหล่านี้:'),
('thanh_cong',	'ประสบความสำเร็จ'),
('cam_on_da_danh_gia',	'ขอบคุณสำหรับรีวิว! ความเห็นของคุณเป็นสิ่งสำคัญมากสำหรับเรา'),
('tip_star5',	'ความเป็นเลิศ'),
('tip_star4',	'ดีมาก'),
('tip_star3',	'ดี'),
('tip_star2',	'สามัญ'),
('tip_star1',	'แย่จัง'),
('trich_dan',	'อ้างอิง'),
('doc_cham_ngon',	'อ่านการอ้างอิง'),
('download_app_quote_tip',	'ดาวน์โหลดแอปพลิเคชั่นเหล่านี้บน ch play app store และ appstore เพื่ออ่านคำพูดที่ดีและใช้ประโยชน์ด้านความบันเทิงอื่น ๆ'),
('download_song',	'ดาวน์โหลดเพลงนี้'),
('khong_co_du_lieu',	'ไม่มีข้อมูล'),
('tai_thanh_cong_tip',	'โปรดคลิกที่ปุ่ม like ที่แสดงด้านบนและกดไลค์บนหน้า Facebook เพื่อดาวน์โหลดเพลงฟรีจากระบบ! ขอบคุณมาก ๆ!'),
('danh_gia_done',	'ขอบคุณที่ให้ระบบของคุณรู้ว่าคุณรู้สึกอย่างไรเมื่อฟังเพลงนี้!'),
('not_music',	'ไม่มีเพลง!'),
('back_list_music',	'กลับไปที่รายการเพลง'),
('not_account',	'ไม่มีบัญชี!'),
('back_list_account',	'กลับไปที่รายการบัญชี'),
('lien_he',	'ติดต่อและสนับสนุน'),
('lien_he_tip',	'หากคุณมีคำถามใด ๆ โปรดติดต่อผู้ดูแลระบบเพื่อขอคำแนะนำและคำตอบผ่านที่อยู่และอีเมลด้านล่าง'),
('policy_1',	'ระบบจะแบ่งปันข้อมูลการติดต่อของคุณกับผู้คนเช่นหมายเลขโทรศัพท์อีเมลลิงก์เครือข่ายสังคมออนไลน์ (skype id, facebook, twitter, Linkedin) เพศที่อยู่ (ผู้ใช้สามารถปรับแต่งไม่แชร์ข้อมูลในแอปพลิเคชันระบบใด ๆ )'),
('policy_2',	'ผู้ดูแลระบบมีสิทธิ์ในการลบผู้ติดต่อที่ไม่ถูกต้องหรือละเมิดเนื้อหาการติดต่อของผู้อื่นเมื่อพวกเขารายงานความผิดปกติที่เกี่ยวข้อง'),
('no_product_tip',	'ผลิตภัณฑ์ถูกลบออกและไม่ได้รับการสนับสนุนบน carrotstore.com'),
('home_url',	'หน้าแรกที่แสดงผลิตภัณฑ์'),
('login_account_tip',	'ป้อนหมายเลขโทรศัพท์ของคุณเพื่อเข้าสู่ระบบ'),
('sel_account_login',	'เลือกบัญชีใดบัญชีหนึ่งที่คุณใช้เพื่อเข้าสู่ระบบ'),
('back',	'กลับ'),
('dang_xuat',	'ออกจากระบบ'),
('inp_phone_tip',	'ป้อนหมายเลขโทรศัพท์ของคุณ'),
('no_account_error',	'หมายเลขโทรศัพท์ของบัญชีนี้ไม่มีอยู่ในระบบหรือไม่มีในประเทศนี้!'),
('login_app',	'แอพพลิเคชั่นที่ใช้ในการเข้าสู่ระบบ'),
('login_account_timer',	'จำกัด เวลาสำหรับการเข้าสู่ระบบ'),
('login_account_scan_qr_tip',	'ใช้แอพพลิเคชั่นในระบบจากนั้นเปิดการสแกนบาร์โค้ดเพื่อล็อกอิน'),
('login_account_succes',	'ลงชื่อเข้าใช้สำเร็จ!'),
('an_danh',	'ไม่ระบุนาม'),
('pay_method',	'เลือกวิธีการจ่ายเงิน'),
('pay_account',	'ข้อมูลลูกค้า'),
('pay_title',	'ซื้อ'),
('pay_tip_done',	'หลังจากการซื้อสำเร็จจะมีการใช้รายการในแอปพลิเคชันของคุณโดยอัตโนมัติ!'),
('pay_success',	'การชำระเงินสำเร็จ คุณสามารถใช้ผลิตภัณฑ์'),
('pay_fail',	'การชำระเงินล้มเหลว! ลองซื้ออีกครั้ง'),
('pay_sp_obj_nude_name',	'ถอดเสื้อผ้าของตัวละคร'),
('no_page',	'หน้านี้ไม่มีอยู่'),
('mobile_game',	'เกม'),
('quote_more',	'บางทีคุณอาจชอบ maxims อื่น ๆ ด้านล่าง'),
('share_tip',	'ถ้าคุณรู้สึกดีกรุณาแบ่งปัน'),
('history_delete',	'ประวัติศาสตร์ที่ชัดเจน'),
('dong_gop_loi_nhac',	'มีส่วนร่วมในเนื้อเพลง'),
('dong_gop_loi_nhac_tip',	'โปรดบริจาคคำพูดของคุณเพื่อใช้งานฟังก์ชั่นเพลงนี้ให้สมบูรณ์'),
('add_lyrics_send',	'ส่งเนื้อเพลง'),
('add_lyrics_error',	'เนื้อหาของเนื้อเพลงต้องไม่ว่างเปล่า'),
('add_lyrics_success',	'ส่งเนื้อเพลงที่ประสบความสำเร็จ! ขอบคุณสำหรับการมีส่วนร่วมในเนื้อเพลงเราจะตรวจสอบและเผยแพร่เนื้อเพลงนี้โดยเร็วที่สุด'),
('dang_nhap_tai_khoan_khac',	'เข้าสู่ระบบด้วยบัญชีอื่น'),
('rut_gon_link',	'ย่อลิงก์'),
('adblock_title',	'คุณต้องไม่ใช้ปลั๊กอินปิดกั้นโฆษณาในเว็บไซต์ของเรา'),
('adblock_msg',	'โปรดปิดใช้งานฟังก์ชั่นปิดกั้นโฆษณาเพื่อใช้คุณสมบัติของระบบอย่างเต็มที่ซึ่งจะช่วยให้นักพัฒนา CarrotStore ได้รับการยอมรับ'),
('shorten_link_inp',	'วางลิงก์ของคุณที่นี่!'),
('shorten_link_btn',	'สร้างลิงค์ที่สั้นลง'),
('shorten_link_tip_1',	'เข้าสู่บัญชีของคุณเพื่อจัดการและดูประสิทธิภาพของลิงก์แบบสั้นที่คุณสร้างขึ้น'),
('shorten_link_tip_2',	'สร้างลิงก์ {num_link} สั้น ๆ และประสิทธิภาพนี้จะเพิ่มขึ้นเมื่อเวลาผ่านไปแสดงให้เห็นถึงประสิทธิภาพและศักยภาพของแอปพลิเคชันนี้'),
('shorten_link_tip_3',	'แอปพลิเคชั่นถูกปรับใช้ในทุกแพลตฟอร์มเช่นเว็บโทรศัพท์ คุณสามารถดาวน์โหลดและใช้งานได้จากร้านแอพมือถือ'),
('shorten_link_list',	'สร้างรายการที่เชื่อมโยงแล้ว'),
('shorten_link_my_list',	'รายการลิงก์ที่สั้นลงของฉัน'),
('link_full',	'ลิงก์แบบเต็ม'),
('shorten_link_create',	'ลิงก์สั้นลง'),
('shorten_link_create',	'ลิงก์สั้นลง'),
('shorten_link_detail',	'รายละเอียดลิงก์สั้นลง'),
('shorten_link_home',	'โฮมเพจของลิงก์ที่สั้นลง'),
('shorten_link_error',	'รูปแบบลิงก์ที่ไม่ถูกต้อง (เช่น http://www.carrotstore.com)'),
('link_nguoi_tao',	'ผู้สร้าง'),
('shorten_link_status',	'แบ่งปันสถานะแล้ว'),
('shorten_link_status_0',	'แบ่งปันกับทุกคน'),
('shorten_link_status_1',	'แค่ฉัน'),
('shorten_link_return',	'ผลการตัดทอนลิงก์'),
('copy',	'สำเนา'),
('save_img',	'บันทึกภาพ'),
('back',	'กลับ'),
('help_off_block_ads',	'คู่มือการปิดกั้นโฆษณา'),
('help_off_block_ads_tip',	'ทำตามขั้นตอนที่อธิบายในภาพด้านล่างเพื่อปิดการใช้งานปลั๊กอินปิดกั้นโฆษณา'),
('help_off_block_ads_step_1',	'<b> ขั้นตอนที่ 1: </b> คลิกที่ไอคอนบล็อกโฆษณาในชื่อแถบเครื่องมือของเบราว์เซอร์ <br>'),
('help_off_block_ads_step_2',	'<b> ขั้นตอนที่ 2: </b> จากรายการที่ปรากฏให้เลือกรายการ <b> หยุดชั่วคราวในไซต์นี้ </b> <br>'),
('help_off_block_ads_step_3',	'<b> ขั้นตอนที่ 3: </b> รีเฟรชเบราว์เซอร์ของคุณ (หรือกดปุ่ม <b> F5 </b>) เพื่อสิ้นสุดการแสดงหน้าเว็บ <br>'),
('hoan_tat',	'เสร็จ'),
('message_tip',	'Hi! เราจะช่วยคุณได้อย่างไร'),
('account_update_phone',	'อัปเดตหมายเลขโทรศัพท์'),
('account_update_phone_tip',	'คุณต้องป้อนหมายเลขโทรศัพท์เพื่อใช้ฟังก์ชั่นในระบบอย่างเต็มที่'),
('account_update_phone_success',	'อัปเดตหมายเลขโทรศัพท์สำเร็จแล้ว!'),
('account_update_phone_error',	'หมายเลขโทรศัพท์ไม่ถูกต้อง!'),
('song_artist',	'ศิลปินด่วน'),
('song_genre',	'ประเภท'),
('song_year',	'ปล่อยปี'),
('song_album',	'อัลบั้ม'),
('chinh_sua_thong_tin',	'แก้ไขข้อมูล'),
('user_status',	'แบ่งปันสถานะแล้ว'),
('user_status_0',	'แบ่งปันข้อมูลกับทุกคน'),
('user_status_1',	'อย่าเปิดเผยข้อมูล'),
('dang_nhap_mxh',	'เข้าสู่ระบบด้วยบัญชีโซเชียลของคุณ'),
('dang_nhap_carrot',	'เข้าสู่ระบบด้วยบัญชี CARROT ของคุณ'),
('dang_nhap_carrot_tip',	'ป้อนหมายเลขโทรศัพท์หรืออีเมลและรหัสผ่านเพื่อเข้าสู่ระบบ'),
('dang_ky_carrot_tip',	'กรอกข้อมูลในฟิลด์ด้านล่างเพื่อลงทะเบียนบัญชี CARROT ของคุณ'),
('loi_ten',	'ชื่อเต็มต้องไม่ว่างเปล่าและมากกว่า 5 ตัวอักษร'),
('loi_tai_khoan_da_ton_tai',	'บัญชีมีอยู่แล้ว'),
('loi_mat_khau',	'รหัสผ่านจะต้องไม่เว้นว่างและมากกว่า 6 ตัวอักษร'),
('avatar',	'สัญลักษณ์'),
('password_tip',	'สร้างรหัสผ่านเพื่อช่วยคุณเข้าสู่บัญชี CARROT ของคุณด้วยหมายเลขโทรศัพท์ของคุณ'),
('download_vcf',	'ดาวน์โหลด Vcard (.vcf)'),
('tong_quan_tip',	'แสดงข้อมูลที่สมบูรณ์ของผู้ใช้'),
('sao_luu_danh_ba',	'สำรองรายชื่อ'),
('backup_contact_tip',	'จัดการการสำรองข้อมูลผู้ติดต่อของคุณ'),
('account_setting_tip',	'แก้ไขและอัปเดตข้อมูลของคุณอย่างเต็มที่เพื่อใช้ฟังก์ชั่นเต็มรูปแบบของระบบ'),
('delete',	'ลบ'),
('backup_contact_title',	'รายชื่อผู้ติดต่อสำรองข้อมูลของคุณ'),
('backup_contact_title_tip',	'คุณมี {num_bk} เพื่อสำรองข้อมูลรายชื่อติดต่อที่สร้างขึ้น'),
('shorten_link_list_tip',	'จัดการรายการลิงค์สั้น ๆ ที่คุณสร้างขึ้น'),
('backup_contact_none',	'คุณไม่ได้สร้างการสำรองข้อมูลให้ใช้แอพนี้เพื่อสำรองข้อมูลผู้ติดต่อของคุณ'),
('song_add_playlist',	'เพิ่มเพลงลงในเพลย์ลิสต์ของคุณ'),
('my_playlist',	'เพลย์ลิสต์ของฉัน'),
('add_song_to_playlist',	'เพิ่มเพลงลงในเพลย์ลิสต์นี้'),
('my_playlist_tip',	'ฟังเพลงที่คุณเก็บไว้ในรายการเพลงอีกครั้ง'),
('create_playlist',	'สร้างเพลย์ลิสต์ใหม่'),
('create_playlist_tip',	'ป้อนชื่อของรายการที่คุณต้องการสร้าง เพลงปัจจุบันจะถูกเพิ่มในรายการเพลงนี้'),
('error_name_playlist_null',	'ชื่อเพลย์ลิสต์ต้องไม่ว่างเปล่า'),
('delete_song_success',	'ลบเพลงสำเร็จแล้ว'),
('edit',	'แก้ไข'),
('my_playlist_rename_tip',	'ป้อนชื่อใหม่สำหรับเพลย์ลิสต์นี้'),
('update_playlist',	'อัปเดตเพลย์ลิสต์'),
('delete_tip',	'คุณแน่ใจหรือว่าต้องการลบรายการนี้การดำเนินการนี้จะไม่ถูกกู้คืน'),
('box_yes',	'ใช่ฉันแน่ใจ!'),
('box_no',	'ไม่ยกเลิก!'),
('thanks',	'ขอบคุณ'),
('kr_player_help',	'ทางลัดเครื่องเล่นเพลง Carrot'),
('kr_help_back',	'กลับไปยังเพลงก่อนหน้า'),
('kr_help_space',	'หยุดชั่วคราว / เล่นเพลงต่อ'),
('kr_help_next',	'เล่นเพลงถัดไป'),
('kr_help_mute',	'เปิด / ปิดเสียง'),
('quen_mat_khau',	'ลืมรหัสผ่าน'),
('quen_mat_khau_tip',	'โปรดป้อนที่อยู่อีเมลของคุณเพื่อรับรหัสผ่านที่ลืม'),
('quen_mat_khau_success',	'รหัสผ่านของคุณถูกส่งทางอีเมล กรุณาตรวจสอบอีเมลของคุณสำหรับข้อมูล'),
('error_email',	'อีเมลไม่ได้อยู่ในรูปแบบที่ถูกต้อง'),
('quen_mat_khau_fail',	'ที่อยู่อีเมลนี้ไม่มีอยู่ในระบบ'),
('jailbreak_ios',	'ลิงก์เพื่อติดตั้งแอพสำหรับอุปกรณ์ Apple ที่ถูกเจลเบรค'),
('jailbreak_1',	'ลิงค์นี้ใช้ได้เฉพาะกับเบราว์เซอร์ซาฟารีเท่านั้นเมื่อเข้าถึงด้วยอุปกรณ์ Apple ของคุณ'),
('jailbreak_2',	'ไฟล์. ipa นี้สามารถติดตั้งในอุปกรณ์ Apple ที่ถูกเจลเบรคได้เท่านั้นคุณสามารถดาวน์โหลดได้โดยตรงโดยคลิกที่ลิงค์ย่อยนี้ (คลิกที่นี่เพื่อดาวน์โหลด)'),
('jailbreak_3',	'คุณสามารถดูวิธีการเจลเบรคได้จากลิงค์ต่อไปนี้ (คลิกที่นี่เพื่อดู)'),
('development_team',	'พัฒนาทีม'),
('dark_mode',	'เปิด / ปิดไฟและโหมดมืด'),
('dark_mode_0',	'โหมดมืดจะช่วยให้คุณปรับปรุงความจุของแบตเตอรี่ของอุปกรณ์และปกป้องสุขภาพตาของคุณด้วยสองสีหลักขาวดำเหมาะสำหรับคุณที่จะอ่านเนื้อหาในเวลากลางคืน'),
('dark_mode_1',	'โหมด Bright จะนำลักษณะที่ปรากฏของหน้าเว็บที่แสดงด้วยสีเริ่มต้นด้วยโทนสีสดใส'),
('buy_code',	'ซื้อรหัสต้นฉบับของเกม'),
('buy_code_tip',	'คุณสามารถซื้อซอร์สโค้ดสำหรับเกมนี้เพื่อพัฒนาต่อไปตามความคิดของคุณหรือให้บริการอ้างอิงอ้างอิงเรียนรู้เรียนรู้สร้างเกม'),
('download_code',	'ดาวน์โหลดซอร์สโค้ด'),
('download_game',	'ดาวน์โหลดเกม (PC)'),
('download_link',	'รายชื่อลิงค์ดาวน์โหลด'),
('nha_phat_trien',	'นักพัฒนา'),
('purchase_orders',	'ใบสั่งซื้อ'),
('no_return_search',	'ไม่มีผลลัพธ์สำหรับคำหลักข้างต้น'),
('ngon_ngu_hien_thi',	'เลือกประเทศและภาษา'),
('field_login',	'อีเมลหรือหมายเลขโทรศัพท์'),
('gioi_thieu_tip',	'Carrotstore.com  เป็นที่เก็บถาวรแนะนำแอปพลิเคชันความบันเทิงและโปรแกรมเสริมสำหรับผู้คนทั่วโลก เมื่อคุณใช้หนึ่งในระบบเหล่านี้คุณมีบัญชีที่ระบุแต่ละบุคคลด้วยอุปกรณ์มือถือ'),
('account_report',	'รายงานการละเมิดในบัญชีนี้'),
('account_report_success',	'ขอบคุณสำหรับการรายงานปัญหาเกี่ยวกับบัญชีนี้เราจะพยายามแก้ไขโดยเร็วที่สุด'),
('account_report_1',	'บัญชีมีเนื้อหาเกี่ยวกับเรื่องเพศภาพอนาจาร'),
('account_report_2',	'บัญชีที่แอบอ้าง'),
('account_report_3',	'ปัญหาอื่น ๆ'),
('account_report_3_tip',	'โปรดป้อนรายละเอียดของบัญชีที่ไม่ถูกต้องที่นี่'),
('warning',	'คำเตือน'),
('account_view_yes',	'ฉันต้องการดูบัญชีนี้ต่อ'),
('account_view_no',	'ฉันไม่ต้องการเห็นบัญชีนี้'),
('account_view_18',	'บัญชีที่คุณกำลังจะดูอาจมีเนื้อหาสำหรับผู้ใหญ่เท่านั้น'),
('download_app_piano_tip',	'เล่นและเรียนรู้ตลอดเวลาด้วยแอปพลิเคชันด้านล่างนี้เพื่อตอบสนองความปรารถนาของคุณ'),
('hoc_dan_piano',	'เปียโน'),
('tac_gia',	'ผู้เขียน'),
('cap_do',	'ระดับ'),
('toc_do_nhip',	'เอาชนะความเร็ว'),
('so_not_nhac',	'จำนวนโน้ตดนตรี'),
('ten_bai_hat',	'ชื่อแทร็ก'),
('level_de',	'ง่าย'),
('level_trung_binh',	'ปกติ'),
('level_kho',	'ยาก'),
('level_sieu_kho',	'ยากสุด ๆ'),
('midi_info',	'ข้อมูลการแต่งเปียโน Midi'),
('setting_piano',	'การตั้งค่าเปียโน'),
('setting_piano_key_pc',	'แสดงป้ายแป้นพิมพ์คอมพิวเตอร์'),
('setting_piano_key_name',	'แสดงชื่อโน้ตดนตรี'),
('midi_show_pc_key',	'เข้ารหัสสเปกตรัมเพลง midi เป็นแป้นพิมพ์คอมพิวเตอร์'),
('tao_moi_midi',	'สร้าง midi ออนไลน์'),
('midi_add_line',	'แอดไลน์'),
('midi_add_column',	'เพิ่มคอลัมน์'),
('midi_del_row',	'ลบแถว'),
('midi_del_col',	'ลบคอลัมน์'),
('midi_empty',	'ล้าง midi'),
('midi_form_pc',	'สร้าง midi จากข้อความ PC'),
('midi_add_line_tip',	'เพิ่มบรรทัดใหม่เพื่อสร้างสตรีมการเล่นที่แตกต่างกันเช่นคอร์ด fretboard คุณสามารถสร้างได้สูงสุด 10 บรรทัดที่สอดคล้องกับ 10 นิ้วของคุณในขณะที่เล่นในเวลาเดียวกัน'),
('midi_add_column_tip',	'เพิ่มคอลัมน์ว่างเพื่อสร้างช่วงเวลาระหว่างคอร์ดในช่วงเวลาที่กำหนดโดยสัมพันธ์กับความเร็วในการตีของผู้เล่นหรือสร้างคอลัมน์แบบร่างเพื่อให้คุณสามารถแทรกเฟร็ตได้ในภายหลัง'),
('midi_del_row_tip',	'ลบแถวในขณะที่ลบบันทึก midi ทั้งหมดในแถวที่เลือก'),
('midi_del_col_tip',	'การลบคอลัมน์หมายถึงการลบบันทึก midi ในคอลัมน์ที่เลือก'),
('midi_empty_tip',	'ลบโน้ตซึ่งจะทำให้โน้ตกลับสู่สถานะเดิมเมื่อไม่ได้รับการบันทึก'),
('midi_form_pc_tip',	'ป้อนข้อความคอมพิวเตอร์เพื่อสร้าง midi ที่เกี่ยวข้อง'),
('midi_help',	'คู่มือตัวแก้ไข MIDI'),
('midi_help_tip',	'ด้วยโปรแกรมจำลองเปียโนและตัวแก้ไขมิดี้ทำให้ง่ายต่อการสร้างเพลงของคุณเองหรือมีส่วนร่วมในระบบของเราการเรียบเรียงที่มีอยู่ของคุณหากคุณเป็นมือใหม่ผู้สร้าง midi ของเราใช้เวลาสักครู่เพื่ออ่านเคล็ดลับด้วยตนเองด้านล่างเพื่อใช้คุณสมบัติทั้งหมดของสิ่งนี้ได้อย่างง่ายดาย เครื่องมือ.'),
('midi_use',	'การใช้งานพื้นฐาน'),
('midi_use1',	'กดปุ่มบนแป้นพิมพ์คอมพิวเตอร์ของคุณที่ตรงกับเครื่องหมายสัญกรณ์บนคีย์เปียโนแต่ละอันเพื่อบันทึกการทำงานของการเพิ่มโน้ตในตัวแก้ไข midi'),
('midi_use2',	'หากต้องการแก้ไข midi note ให้คลิกที่ midi note แล้วกดปุ่มอื่นเพื่อแทนที่ midi ที่เลือก'),
('midi_use3',	'สร้างคอร์ดสำหรับแทร็กโดยคลิกที่ปุ่มเพิ่มบรรทัดในแถบเครื่องมือ midi จากนั้นคุณจะสร้างเธรดเพิ่มเติมเพื่อบันทึกโน้ตใหม่'),
('midi_use4',	'แถบเครื่องมือตัวแก้ไข Midi ประกอบด้วย:'),
('midi_publish_success',	'หลังจากเผยแพร่ร่างเปียโนมิดี้ของคุณเรียบร้อยแล้วเราจะอนุมัติและเผยแพร่ร่างนี้สู่สาธารณะโดยเร็วที่สุด ขอบคุณสำหรับการสนับสนุนที่สร้างสรรค์ของคุณ'),
('midi_publish',	'เผยแพร่'),
('midi_erro_no_name',	'ไม่สามารถเผยแพร่ผลงานชิ้นเอกนี้ได้! เนื่องจากคุณยังไม่ได้ตั้งชื่อผลิตภัณฑ์มิดี้ของคุณ'),
('midi_erro_no_data',	'ยังไม่มีข้อมูล midi โปรดสร้างเนื้อหาก่อนเผยแพร่'),
('midi_export',	'ส่งออกไฟล์ midi (.mid)'),
('midi_export_success',	'ส่งออกไฟล์ Midi (.mid) สำเร็จ!'),
('midi_export_tip',	'สร้างไฟล์กลางจาก midi เพื่อเพลิดเพลินหรือฟังบนคอมพิวเตอร์หรืออุปกรณ์มือถือ'),
('midi_publish_tip',	'เผยแพร่ผลงานของคุณไปทั่วโลกเพื่อให้ทุกคนได้เพลิดเพลินหรือมีส่วนร่วมในเพลง midi เราจะตรวจสอบองค์ประกอบ midi ของคุณและแก้ไขให้ตรงกับที่เก็บถาวรของระบบ'),
('midi_download',	'ดาวน์โหลดเพลง MIDI'),
('search_setting',	'การตั้งค่าการค้นหา'),
('search_setting_type',	'ตัวเลือกฟังก์ชันการค้นหา'),
('search_setting_data',	'ค้นหาตัวเลือกแหล่งข้อมูล'),
('search_setting_type_0',	'ค้นหาตามหมวดหมู่การเข้าถึงเท่านั้น'),
('search_setting_type_1',	'ค้นหาหมวดหมู่ทั้งหมด'),
('search_setting_data_0',	'ข้อมูลทั้งหมดทั่วโลก'),
('search_setting_data_1',	'ค้นหาข้อมูลเฉพาะในประเทศหรือภูมิภาคของคุณ'),
('search_return',	'ผลการค้นหา'),
('recognition_inp',	'พูดสิ'),
('contact_open_app',	'เปิดผู้ติดต่อนี้ในแอพ'),
('link_open_app',	'เปิดในแอป'),
('back_app',	'กลับไปที่แอพ'),
('link_open_app_tip',	'คลิกที่นี่เพื่อเปิดหรือถ่ายโอนข้อมูลนี้อย่างรวดเร็วไปยังแอปพลิเคชันมือถือ ซอฟต์แวร์ (หากติดตั้งพร้อมกับแอปพลิเคชันที่สอดคล้องกับข้อมูล)'),
('qr_tip',	'ใช้โทรศัพท์ของคุณสแกนหาลิงค์นี้!'),
('music_report',	'รายงานข้อบกพร่องและลิขสิทธิ์'),
('music_report_1',	'เพลงผิดพลาด (เล่นไม่ได้)'),
('music_report_2',	'เพลงละเมิดลิขสิทธิ์ โปรดลบเนื้อหานี้!'),
('music_report_3',	'ปัญหาอีกอย่างของเพลงนี้'),
('music_report_3_tip',	'โปรดอธิบายรายละเอียดข้อบกพร่องของเพลงนี้ให้เราฟัง'),
('music_report_success',	'ขอบคุณสำหรับการรายงานปัญหาของเพลงนี้ เราจะพยายามแก้ไขปัญหาโดยเร็วที่สุด'),
('book',	'eBooks'),
('seo_ebook',	'ห้องสมุดหนังสือออนไลน์ให้ผู้ใช้ดาวน์โหลดหนังสือฟรี ดาวน์โหลดหนังสือดี ดาวน์โหลดหนังสือฟรี ดาวน์โหลดหนังสือดี อ่านหนังสือออนไลน์ เรามีหนังสือหลากหลายประเภทในรูปแบบ Ebook ยอดนิยมสำหรับโทรศัพท์และคอมพิวเตอร์ ผู้อ่านสามารถดูออนไลน์หรือดาวน์โหลดลงในคอมพิวเตอร์เพื่อให้ง่ายต่อการตรวจสอบ'),
('read_now',	'อ่านเลย'),
('mobile_application',	'แอปพลิเคชัน');

-- 2021-10-18 20:34:44
