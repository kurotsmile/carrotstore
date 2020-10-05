<?php
$id_chat='';
if(isset($_GET['id_object'])){
    $id_chat=$_GET['id_object'];
    $type_chat=$_GET['type_chat'];
    $type_action=$_GET['type_action'];
    $lang_chat=$_GET['lang'];
?>
    <script>
        $(document).ready(function () {
            show_add_report_work('<?php echo $_GET['id_object'];?>','<?php echo $_GET['lang'];?>','<?php echo $_GET['type_chat'];?>','<?php echo $_GET['type_action'];?>');
        });
    </script>
<?php } ?>
<div id="btn_add_report" onclick="show_report_work();">
    <i class="fa fa-flag-checkered" aria-hidden="true"></i>
</div>

<form id="frm_add_report" class="box_form_add_chat" method="post" action="<?php echo $url;?>">
    <div id="frm_add_report_loading"><img src="<?php echo $url_carrot_store;?>/images/waiting.gif"/></div>
    <div class="row line">
        <i onclick="close_report_work();" id="btn_close" class="fa fa-window-close" aria-hidden="true"></i>
        <strong><i class="fa fa-flag-checkered" aria-hidden="true"></i> Báo cáo công việc</strong><br />
        <i style="font-size:10px;">Các tác vụ làm việc sẽ được báo cáo ở đây</i>
        <?php
        $error_ready_obj=false;
        if($id_chat!=''&&$type_chat!='bible_p'&&$type_chat!='carrot'){
            $query_check=mysqli_query($link,"SELECT `id_chat` FROM `work_chat` WHERE `id_chat` = '$id_chat' AND `type_chat` = '$type_chat' AND `lang_chat` = '$lang_chat' AND `type_action` = '$type_action' LIMIT 1");
            if(mysqli_num_rows($query_check)>0){
                echo alert('Đối tượng này đã được thêm vào!','error');
                $error_ready_obj=true;
            }
        }
        ?>
    </div>

    <div class="row line">
        <label>Id</label>
        <input name="id_chat" type="text" placeholder="Nhập id đối tượng làm việc" value="" id="report_id_chat" />
    </div>

    <div class="row line">
        <label>Loại</label>
        <select name="type_chat" id="report_type_chat">
            <?php
            $query_list_parameters = mysqli_query($link,"SELECT `key`,`name` FROM `work_report_parameters`");
            while ($row_rp = mysqli_fetch_array($query_list_parameters)) {
                ?>
                <option value="<?php echo $row_rp['key'];?>"><?php echo $row_rp['name'];?></option>
                <?php
            }
            ?>
        </select>
    </div>

    <div class="row line">
        <label>Ngôn ngữ</label>
        <select name="lang_chat" id="report_lang_chat">
            <?php
            $list_country=mysqli_query($link,"SELECT `key`,`name` FROM carrotsy_virtuallover.`app_my_girl_country` ");
            while($l=mysqli_fetch_array($list_country)){
                ?>
                <option value="<?php echo $l['key'];?>"><?php echo $l['key'];?> - <?php echo $l['name'];?></option>
                <?php
            }
            ?>
        </select>
    </div>


    <div class="row line">
        <label>Thao tác</label>
        <select name="type_action" id="report_type_action">
            <option value="edit">Sửa</option>
            <option value="add">Thêm mới</option>
            <option value="delete">xóa</option>
        </select>
    </div>


    <div class="row">
        <input type="hidden" name="url_act" id="url_act" value="<?php echo $url; ?>" />
        <input type="hidden" name="function" value="submit_report_work" />
        <input type="hidden" name="func" value="add" id="report_func" />
        <input type="hidden" name="report_id" value="" id="report_id" />
        <input type="hidden" value="<?php if(isset($user_name))echo $user_name;?>" name="user_work" />
        <label>&nbsp;</label>
        <input name="submit_add_lang" id="btn_add_and_edit_report" class="buttonPro green large" type="submit" value="Hoàn tất" onclick="submit_report_work();return false;"/>
    </div>
</form>