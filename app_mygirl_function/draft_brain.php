<?php
$type_view='0';
$type_view_user='0';
$id_user_work=$data_user_carrot['user_id'];
$url_act=$url.'/app_my_girl_handling.php?func=draft_brain';
$cur_url=$url_act;
$hide_help='0';

if (isset($_GET['type_view'])) {
    $type_view=$_GET['type_view'];
    $cur_url.='&type_view='.$type_view;
}

if (isset($_GET['type_view_user'])) {
    $type_view_user = $_GET['type_view_user'];
    $cur_url.= '&type_view_user='.$type_view_user;
}

if (isset($_GET['hide_help'])) {
    $_SESSION['hide_help'] = $_GET['hide_help'];
}

if (isset($_SESSION['hide_help'])) {
    $hide_help = $_SESSION['hide_help'];
}

if(isset($_GET['delete_father'])){
    if(isset($_GET['type_view_user'])){
        $type_view_user = $_GET['type_view_user'];
        $query_remove_father=mysqli_query($link,"UPDATE `app_my_girl_brain` SET `id_question` = '' , `type_question` = '' WHERE  `approved` = '0' AND `tick` = '1' AND `user_work_id` = '$type_view_user' AND `id_question` != '' AND `ping_father` = '0'");
        echo mysqli_error($link);
        echo show_alert("Đã Gỡ các câu thoại cha!","alert");
    }
}

if(isset($_GET['delete_all'])){
    $type_view_user = $_GET['type_view_user'];
    $query_delete_all=mysqli_query($link,"DELETE FROM `app_my_girl_brain` WHERE  `approved` = '1' AND `tick` = '1' AND `user_work_id` = '$type_view_user' ");
    echo mysqli_error($link);
    echo show_alert("Đã xóa tất cả","alert");
}

if ($type_view == '1') {
    if ($type_view_user == '0') {
        $result_brain = mysqli_query($link,"SELECT * FROM `app_my_girl_brain` WHERE `tick` = '1' AND `approved` = '0'");
    } else {
        $result_brain = mysqli_query($link,"SELECT * FROM `app_my_girl_brain` WHERE `tick` = '1' AND `approved` = '0' AND `user_work_id`='$type_view_user'");
    }
}elseif ($type_view=='2'){
    $result_brain = mysqli_query($link,"SELECT * FROM `app_my_girl_brain` WHERE `tick` = '1' AND `approved` = '1' AND `user_work_id`='$type_view_user'");
} else {
    $result_brain = mysqli_query($link,"SELECT * FROM `app_my_girl_brain` WHERE `tick` = '1' AND `approved` = '0' AND `user_work_id`='$id_user_work'");
}

?>
<div class="contain notranslate" style="background-color: #fefff5;padding: 0px;min-width: 600px;" id="form_loc">
    <div style="width: 100%;float: left;background-color: #6edfff;">
        <strong style="padding: 10px;float: left;"><i class="fa fa-info-circle" aria-hidden="true"></i> Những lưu ý khi xuất bản <?php echo mysqli_num_rows($result_brain); ?> nội dung dạy do"<?php echo $data_user_carrot['user_name']; ?>" xử lý</strong>
        <?php if ($hide_help == '0') { ?>
            <a href="<?php echo $cur_url; ?>&hide_help=1" style="float: right;margin-right: 3px;font-size: 17px;padding: 7px;">Ẩn <i class="fa fa-caret-square-o-up" aria-hidden="true"></i></a>
        <?php } else { ?>
            <a href="<?php echo $cur_url; ?>&hide_help=0" style="float: right;margin-right: 3px;font-size: 17px;padding: 7px;">Hiển thị <i class="fa fa-caret-square-o-down" aria-hidden="true"></i></a>
        <?php } ?>
    </div>
    <?php if ($hide_help == '0') { ?>
        <div style="float: left;padding: 20px;">
            <ul style="list-style: lower-latin;">
                <li>Sửa lỗi chính tả bằn gợi ý của của google translate nếu sai</li>
                <li style="color: red;">Nếu thẫy xuất hiện tên riêng được gọi của một người trong nội dung thì hay thay
                    đổi tên riêng đó bằng thẻ <b>{ten_user}</b> (chú ý chỉ thay đổi tên riêng của một người chứ không
                    thay đổi tên địa chỉ,địa danh, hanh một tên quốc gia nào được nói đến trong nội dung)
                </li>
                <li>Hành động, <span style="color: red;">trạng thái (status)</span> và cảm xúc khuôn mặt phải đúng với
                    nội dung câu trò chuyện
                </li>
                <li>Hiệu ứng trò chuyện (effect cusstomer) phải liên quan tới nội dung, nếu tìm không có hiểu ứng biểu
                    tượng tương ứng thì nên chọn các cảm xúc khuôn mặt để thể hiện hoặc hoa,lá.
                </li>
                <li>Chọn đúng chức năng (effect) liên quan khi nội dung câu dạy có đề cập tới (vd: "mở đèn pin giúp tôi"
                    <i class="fa fa-arrow-right" aria-hidden="true"></i> nên thiết đặt chức năng tắt đèn pin "Tắt đèn
                    phin" , "mở bài hát khác" <i class="fa fa-arrow-right" aria-hidden="true"></i> "Mở nhạc
                    khác",<strong style="color: red;">Nếu người dùng muốn nhân vật cởi áo quần hoặc cho xem các bộ phận
                        nhạy cảm trên cơ thể</strong> thì chọn <i class="fa fa-arrow-right" aria-hidden="true"></i> "Mở
                    shop trang phục (ver 2 - 3D) (app) , nhằm tăng tỉ lệ mua hàng trong ứng dụng"</strong> v.v... )
                </li>
                <li>Chọn giới hạn mức độ thô tục cho phù hợp với nội dung (mức 1:Nhiêm ngặc- không có tình dục,ma
                    túy,thuốt,súng,bom,mìn,bạo lực,kích động người dùng,mức 2:cho phép tình dục thô tục nhẹ,mức 3:có
                    tình dục vừa phải,thô tục mức độ vừa phải,mức 4:có tình dục nặng,thô tục nặng)
                </li>
                <li>Tùy theo cms đề xuất tạo âm thanh hay không. có những nước và tùy từng giới tính. Nếu cms bắt buột
                    tạo âm thanh thì hãy dùng những trang web tạo giọng
                    <ul>
                        <li><strong>Đối với các nước như Anh (en) và Tây ban nha (es)... cần lựa chọn giọng nam cho
                                chính xác (khi vào trang tạo giọng nam để ý ở trước nút "read" có bản lựa chọn
                                giọng)</strong></li>
                        <li><strong>English - Mỹ (en):</strong> chọn giọng "US English / Matthew"</li>
                        <li><strong>Spanish - Tây ban nha (es):</strong> chọn giọng "US Spanish / Miguel"</li>
                        <li><strong>Turkish - Thổ Nhĩ Kỳ (tr):</strong> chọn giọng "Turkish - Adnan"</li>
                        <li><strong>German - Đức (de) :</strong> chọn giọng "German / Hans"</li>
                        <li class="tip_new"><strong>Japanese - Nhật bản (ja) :</strong> chọn giọng nam "Japanese /
                            Takumi"
                        </li>
                    </ul>
                </li>
                <script>
                    $(document).ready(function () {
                        $(".tip_new").effect("highlight").effect("highlight").effect("highlight").effect("pulsate");
                    });
                </script>
            </ul>
            <?php
            if ($data_user_carrot["user_role"] == "admin") {
                ?>
                <a class="buttonPro small <?php if ($type_view == '0'){ echo 'yellow';} else {echo 'blue'; } ?>" href="<?php echo $url; ?>/app_my_girl_handling.php?func=draft_brain">Chỉ mình tôi</a>
                <a class="buttonPro small <?php if ($type_view == '1'){ echo 'yellow'; } else { echo 'blue';} ?>" href="<?php echo $url; ?>/app_my_girl_handling.php?func=draft_brain&type_view=1">Xem tất cả</a>
                <?php
                $query_all_user_work = mysqli_query($link,"SELECT * FROM  carrotsy_work.`work_user` ");
                while ($op_user = mysqli_fetch_array($query_all_user_work)) {
                    ?>
                    <a class="buttonPro small <?php if ($type_view_user == $op_user['user_id']) { echo 'yellow'; } else { echo 'blue';} ?>" href="<?php echo $url; ?>/app_my_girl_handling.php?func=draft_brain&type_view=1&type_view_user=<?php echo $op_user['user_id']; ?>">Xem của <?php echo $op_user['user_name']; ?></a>
                    <?php
                }
                ?>
                <a href="<?php echo $cur_url; ?>&delete_father=1" class="buttonPro small red"><i class="fa fa-eraser" aria-hidden="true"></i> Gỡ toàn bộ nhữ đối tượng cha</a>
                <a href="<?php echo $cur_url; ?>&type_view=2" class="buttonPro small blue"><i class="fa fa-list-alt" aria-hidden="true"></i> Xem lại các câu đã làm</a>
                <?php if ($type_view == '2'){?>
                    <a href="<?php echo $url_act; ?>&type_view=2&type_view_user=<?php echo $id_user_work; ?>&delete_all=1" class="buttonPro small red"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa tất cả các dữ liệu đã làm</a>
                <?php
                }
            }else{
                if($type_view!='2') {
                    ?>
                    <a href="<?php echo $url_act; ?>&type_view=2&type_view_user=<?php echo $id_user_work; ?>" class="buttonPro small blue"><i class="fa fa-list-alt" aria-hidden="true"></i> Xem lại các câu đã làm</a>
                    <?php
                }else{
                    ?>
                    <a href="<?php echo $url_act; ?>&type_view=1&type_view_user=<?php echo $id_user_work; ?>" class="buttonPro small light_blue"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> trở lại danh sách chưa làm</a>
                    <a href="<?php echo $url_act; ?>&type_view=2&type_view_user=<?php echo $id_user_work; ?>&delete_all=1" class="buttonPro small red"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa tất cả</a>
                    <?php
                }
            }
            ?>
        </div>
        <?php
    }
    ?>
</div>
<?php


function show_row_brain($link,$row,$type_view, $lang_key)
{
    global $url;
    $txt_id_audio = '';
    $txt_color_chat = '';
    $color_criterion = '';
    $txt_check_chat = '';
    $txt_add_father = '';
    $txt_btn_add='';
    $txt_btn_edit='';

    if ($row['criterion'] != '0') {
        $color_criterion = 'background-color: #7fffe6;';
    }

    $txt_check_chat = '<input class="sel_row review" value="' . $row['md5'] . '" type="checkbox" style="width:auto">';

    if (file_exists('app_mygirl/app_my_girl_' . $lang_key . '_brain/' . $row['md5'] . '.mp3')) {
        $txt_audio = '<a href="' . $url . '/app_mygirl/app_my_girl_' . $lang_key . '_brain/' . $row['md5'] . '.mp3" target="_blank">Đường dẫn âm thanh</a>';
        $txt_id_audio = '&id_audio=' . $row['md5'];
    } else {
        $txt_audio = '<img src="' . $url . '/app_mygirl/img/iconoffsound.png"/>';
    }

    if (strlen($row['color_chat']) >= 6) {
        $txt_color_chat = str_replace('#', '', $row['color_chat']);
        $txt_color_chat = substr($txt_color_chat, 0, 6);
        $txt_color_chat = 'color=' . $txt_color_chat;
    } else {
        $txt_color_chat = 'color=' . str_replace('#', '', $row['color_chat']);
    }

    $txt_icon_add = '<i class="fa fa-plus-square"></i>';
    if ($row['type_question'] == 'msg') {
        $txt_icon_add = '<i class="fa fa-plus-circle"></i>';
    }
    $txt_btn_del = '<a class="buttonPro small red" id_chat="' . $row['md5'] . '" lang_chat="' . $row['langs'] . '" onclick="delete_brain(this);return false;" title="Xóa câu gợi ý này!"><i class="fa fa-trash" aria-hidden="true"></i> xóa </a>';
    if ($row['id_question'] != "") {
        $txt_add_father = '&type_question=' . $row['type_question'] . '&id_question=' . $row['id_question'];
        $txt_btn_del .= '<a class="buttonPro small red" id_chat="' . $row['md5'] . '" lang_chat="' . $row['langs'] . '" onclick="delete_brain_father(this);return false;" title="Xóa câu thoại cha để câu trò chuyện này trở thành toàn cục"><i class="fa fa-eraser" aria-hidden="true"></i> gỡ cha</a>';
        if($row['ping_father']=='0') {
            $txt_btn_del .= '<a class="buttonPro small black" id_chat="' . $row['md5'] . '" lang_chat="' . $row['langs'] . '" onclick="ping_remove_father(this,1);return false;" title="Gim câu này không gỡ cha trong xóa toàn bộ"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a>';
        }else{
            $txt_btn_del .= '<a class="buttonPro small yellow" id_chat="' . $row['md5'] . '" lang_chat="' . $row['langs'] . '" onclick="ping_remove_father(this,0);return false;" title="Gỡ Gim câu này không gỡ cha trong xóa toàn bộ"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a>';
        }
    }

    if($type_view!='2') {
        $txt_btn_add = '<a href="' . $url . '/app_my_girl_add.php?key='.urlencode($row['question']). '&lang=' . $row['langs'] . '&answer=' . $row['answer'] . '&sex=' . $row['sex'] . '&effect=' . $row['effect'] . '&action=' . $row['status'] . '&character_sex=' . $row['character_sex'] . '&' . $txt_color_chat . '' . $txt_add_father . '" target="_blank" class="buttonPro small blue" id_chat="' . $row['md5'] . '" lang_chat="' . $row['langs'] . '" onclick="approved(this);return false;">' . $txt_icon_add . ' Thêm </a>';
        $txt_btn_edit = '<a href="" onclick="show_edit_brain(\'' . $row['md5'] . '\',\'' . $row['langs'] . '\');return false;" title="Sửa nhanh trước khi thêm vào danh sách trò chuyện" class="buttonPro small yellow"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>';
    }else{
        $txt_icon_search='<i class="fa fa-search" aria-hidden="true"></i>';
        $txt_btn_add = '<a href="'.$url.'/app_my_girl_handling.php?func=check_key&key='.urlencode($row['question']).'&lang='.$row['langs'].'&sex='.$row['sex'].'&character_sex='.$row['character_sex'].'" target="_blank" class="buttonPro small yellow" >' . $txt_icon_search .' Tìm câu này đã xuất bản </a>';

    }

    $txt_chat_show = '';
    $txt_show_contain_father = '';
    if ($row['type_question'] == 'msg') {
        $txt_chat_show = '<a href="' . $url . '/app_my_girl_update.php?id=' . $row['id_question'] . '&lang=' . $lang_key . '&msg=1" target="_blank" class="buttonPro small orange"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ' . $row['id_question'] . ' - ' . $row['type_question'] . '</a>';
        $txt_chat_show .= "<a class='buttonPro small yellow' onclick=\"view_pater('" . $row['langs'] . "','" . $row['id_question'] . "','msg','0','1');return false;\"><i class='fa fa-plane' aria-hidden='true' ></i> xem nhanh - msg</a>";
        $query_msg = mysqli_query($link,"SELECT * FROM `app_my_girl_msg_" . $row['langs'] . "` WHERE `id` = '" . $row['id_question'] . "' LIMIT 1");
        if (mysqli_num_rows($query_msg)) {
            $data_msg = mysqli_fetch_array($query_msg);
            $txt_show_contain_father = '<span class="tag_brain"><i class="fa fa-angle-double-left" aria-hidden="true"></i> msg:' . $data_msg['func'] . ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . $data_msg['chat'] . '</span><br/>';
        }
    }

    if ($row['type_question'] == 'chat') {
        $txt_chat_show = '<a href="' . $url . '/app_my_girl_update.php?id=' . $row['id_question'] . '&lang=' . $lang_key . '" target="_blank" class="buttonPro small orange"><i class="fa fa-pencil-square" aria-hidden="true"></i> ' . $row['id_question'] . ' - ' . $row['type_question'] . '</a>';
        $txt_chat_show .= "<a class='buttonPro small yellow' onclick=\"view_pater('" . $row['langs'] . "','33','" . $row['id_question'] . "','0','1');return false;\"><i class='fa fa-plane' aria-hidden='true' ></i> xem nhanh - chat</a>";
        $query_chat = mysqli_query($link,"SELECT * FROM `app_my_girl_" . $row['langs'] . "` WHERE `id` = '2' LIMIT 1");
        if (mysqli_num_rows($query_chat)) {
            $data_chat = mysqli_fetch_array($query_chat);
            $txt_show_contain_father = '<span class="tag_brain"><i class="fa fa-angle-double-left" aria-hidden="true"></i> chat:' . $data_chat['text'] . ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> ' . $data_chat['chat'] . '</span><br/>';
        }
    }

    $txt_sex = '';
    if ($row['sex'] == '0') {
        $txt_sex .= '<i style="font-size:14px;color:blue" class="fa fa-male" aria-hidden="true" title="Nam"></i>';
    } else {
        $txt_sex .= '<i style="font-size:14px;color:red" class="fa fa-female" aria-hidden="true" title="Nữ"></i>';
    }
    $txt_sex .= ' <i class="fa fa-angle-double-right" aria-hidden="true"></i> ';
    if ($row['character_sex'] == '0') {
        $txt_sex .= '<i style="font-size:14px;color:blue" class="fa fa-male" aria-hidden="true" title="Nam"></i>';
    } else {
        $txt_sex .= '<i style="font-size:14px;color:red" class="fa fa-female" aria-hidden="true" title="Nữ"></i>';
    }

    $txt_os = '';
    if ($row['os'] == 'android') {
        $txt_os = ' <i class="fa fa-android" aria-hidden="true" title="Hiển thị trên nền tản Android"></i> ';
    }

    if ($row['os'] == 'window') {
        $txt_os = ' <i class="fa fa-windows" aria-hidden="true" title="Hiển thị trên nền tản Window"></i> ';
    }

    if ($row['os'] == 'ios') {
        $txt_os = ' <i class="fa fa-apple" aria-hidden="true" title="Hiển thị trên nền tản Ios"></i> ';
    }

    $btn_check_key = '<a href="' . $url . '/app_my_girl_handling.php?func=check_key&key=' . $row['question'] . '&sex=' . $row['sex'] . '&character_sex=' . $row['character_sex'] . '&lang=' . $lang_key . '" class="buttonPro small yellow" target="_blank" ><i class="fa fa-share-square-o" aria-hidden="true"></i> kiểm tra tồn tại</a>';
    echo '<tr style="border:solid 1px green;font-size:10px;' . $color_criterion . '" class="brain_' . $row['md5'] . ' chat_row_' . $row['md5'] . ' row_brain"><td class="brain_' . $row['md5'] . '_question question_brain" title="' . $row['question'] . '" links="' . $row['links'] . '">' . limit_words(addslashes($row['question']), 10) . '</td><td class="brain_' . $row['md5'] . '_answer" title="' . $row['answer'] . '" style="background-color:' . $row['color_chat'] . '">' . $txt_show_contain_father . ' <span class="tag_brain_data">' . limit_words(addslashes($row['answer']), 20) . '</span></td><td>' . $row['langs'] . '</td><td>' . $txt_sex . '</td><td>' . $txt_os . ' - version:' . $row['version'] . '</td><td>' . $row['effect'] . '</td><td>' . $txt_chat_show . '</td><td>' . $txt_audio . '</td><td>' . $txt_btn_add . '' . $txt_btn_edit . '' . $txt_btn_del . '</td></tr>';
}

echo '<table  style="border:solid 1px green">';
echo '<tr style="border:solid 1px green" class="notranslate" ><th>Câu hỏi</th><th width="500px">Câu trả lời</th><th>Ngôn ngữ</th><th>Giới tính - đối tượng</th><th>Thông tin mở rộng</th><th>Hiệu ứng & chức năng</th><th>Lời thoại cha</th><th>Âm thanh</th><th>Hành động</th></tr>';

while ($row = mysqli_fetch_array($result_brain)) {
    show_row_brain($link,$row,$type_view, $row['langs']);
}
echo '</table>';
echo mysqli_error($link);
?>
<script>
    function approved(emp) {
        var link = $(emp).attr('href');
        var id_chat = $(emp).attr('id_chat');
        var lang_chat = $(emp).attr('lang_chat');
        $.ajax({
            url: "app_my_girl_jquery.php",
            type: "get",
            data: "function=approved_brain&id_chat=" + id_chat + "&lang=" + lang_chat,
            success: function (data, textStatus, jqXHR) {
                swal("Bản nháp", "Đã thêm câu dạy này vào danh sách đã duyệt ! (Editor có thể xem lại ở danh sách đã duyệt)", "success");
                $('.chat_row_' + id_chat).remove();
                window.open(data, '_blank');
            }

        });
        ;
    }

    function delete_brain(emp) {
        var id_chat = $(emp).attr('id_chat');
        var lang_chat = $(emp).attr('lang_chat');
        if (confirm("Có chắc là sẽ xóa cài này không?")) {
            $('.chat_row_' + id_chat).remove()
            $.ajax({
                url: "app_my_girl_jquery.php",
                type: "get", //kiểu dũ liệu truyền đi
                data: "function=delete_brain&id=" + id_chat + "&lang=" + lang_chat, //tham số truyền vào
                success: function (data, textStatus, jqXHR) {
                    alert(data);
                }
            });

        }
        return false;
    }

    function delete_brain_father(emp) {
        var id_chat = $(emp).attr('id_chat');
        var lang_chat = $(emp).attr('lang_chat');
        if (confirm("Có chắc là sẽ gỡ câu thoại cha của câu trò chuyện này không")) {
            $('.brain_' + id_chat + '_answer').find(".tag_brain").remove()
            $.ajax({
                url: "app_my_girl_jquery.php",
                type: "get", //kiểu dũ liệu truyền đi
                data: "function=delete_brain_father&id=" + id_chat + "&lang=" + lang_chat, //tham số truyền vào
                success: function (data, textStatus, jqXHR) {
                    alert(data);
                    $(emp).hide();
                }
            });

        }
        return false;
    }

    function show_edit_brain(id_brain, lang_brain) {
        var brain_question = $(".brain_" + id_brain + "_question").attr("title");
        var brain_links = $(".brain_" + id_brain + "_question").attr("links");
        var brain_answer = $(".brain_" + id_brain + "_answer").attr("title");
        var txt_effect = '<select id="c_brain_effect">';
        txt_effect = txt_effect + '<option value="">None</option>';
        <?php
        for($i = 0;$i < count($data_app->arr_function_app);$i++){
        $data_i = $data_app->arr_function_app[$i];
        ?>
        txt_effect = txt_effect + '<option value="<?php echo $data_i->key; ?>"><?php echo $data_i->name; ?></option>';
        <?php
        }
        ?>
        txt_effect = txt_effect + '</select>';

        var txt_add_key_func = '';
        <?php
        foreach($arr_func as $key_func){
        ?>
        txt_add_key_func = txt_add_key_func + '<span class="buttonPro small" onclick="add_key_func(\'<?php echo $key_func; ?>\');return false;"><?php echo $key_func; ?></span>';
        <?php
        }
        ?>

        var html_show = '<table>';
        html_show = html_show + '<tr><td><b>ID:</b></td><td>' + id_brain + '</td></tr>';
        html_show = html_show + '<tr><td>Câu hỏi</td><td><input id="c_brain_question" style="display: block;" value="' + brain_question + '"/></td></tr>';
        html_show = html_show + '<tr><td>Câu trả lời</td><td><input id="c_brain_answer" style="display: block;" value="' + brain_answer + '"/></td></tr>';
        html_show = html_show + '<tr><td>Từ khòa chức năng</td><td>' + txt_add_key_func + '</td></tr>';
        html_show = html_show + '<tr><td>Chức năng</td><td>' + txt_effect + '</td></tr>';
        html_show = html_show + '<tr><td>Liên kết</td><td><input id="c_brain_links" style="display: block;" value="' + brain_links + '"/></td></tr>';
        html_show = html_show + '</table>';
        swal({
                title: "Thay đổi nội dung nhanh của bản nháp",
                html: true,
                text: html_show,
                showCancelButton: true,
                confirmButtonText: 'Thay đổi',
                cancelButtonText: "Hủy bỏ",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    var c_brain_question = $('#c_brain_question').val();
                    var c_brain_answer = $('#c_brain_answer').val();
                    var c_brain_effect = $('#c_brain_effect').val();
                    var c_brain_links = $('#c_brain_links').val();
                    $.ajax({
                        url: "app_my_girl_jquery.php",
                        type: "post",
                        data: "function=change_brain&id=" + id_brain + "&lang_brain=" + lang_brain + "&c_answer=" + c_brain_answer + "&c_question=" + c_brain_question + "&c_brain_effect=" + c_brain_effect + "&links=" + c_brain_links,
                        success: function (data, textStatus, jqXHR) {
                            $(".brain_" + id_brain + "_question").attr("title", c_brain_question);
                            $(".brain_" + id_brain + "_question").attr("links", c_brain_links);
                            $(".brain_" + id_brain + "_question").html(c_brain_question);
                            $(".brain_" + id_brain + "_answer").attr("title", c_brain_answer);
                            $(".brain_" + id_brain + "_answer span").html(c_brain_answer);
                            swal("Bản nháp", "Bản nháp đã được thay đổi!" + data, "success");
                        }
                    });
                } else {
                    swal("Hủy bỏ", "Đã hủy thay đổi", "error");
                }
            });
        return false;
    }

    function add_key_func(key) {
        var txt = $('#c_brain_answer').val();
        $('#c_brain_answer').val(txt + " " + key);
        return false;
    }

    function ping_remove_father(emp,status){
        var id_brain = $(emp).attr('id_chat');
        var lang_brain = $(emp).attr('lang_chat');
        $(emp).removeClass('black');
        $(emp).removeClass('yellow');
        $.ajax({
            url: "app_my_girl_jquery.php",
            type: "post",
            data: "function=ping_remove_father&id=" + id_brain + "&lang_brain=" + lang_brain + "&status="+status,
            success: function (data, textStatus, jqXHR) {
                swal("Ghim cha", "Ghim câu thoại này thành công" , "success");
            }
        });
    }
</script>

