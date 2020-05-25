<?php
$cur_url=$url.'/app_my_girl_handling.php?func=fix_name_user';
$sel_lang='vi';
if (isset($_GET['lang_sel'])) {
    $sel_lang = $_GET['lang_sel'];
}

if (isset($_POST['lang_sel'])) {
    $sel_lang = $_POST['lang_sel'];
}



$action='';
if (isset($_GET['action'])) {
    $action=$_GET['action'];
}


if ($action=='add_key_error') {
    $key_name=$_GET['key_name'];
    $data_json=json_encode($key_name,JSON_UNESCAPED_UNICODE);
    $query_update_key=mysqli_query($link,"UPDATE `app_my_girl_key_lang` SET `value` = '$data_json' WHERE `key` = 'key_error_name'  AND `lang` = '$sel_lang'  LIMIT 1;");
    echo mysqli_error($link);
    echo show_alert('Thêm từ khóa thừa trong tên','alert');
}

$key_error_name=get_key_lang($link,'key_error_name',$sel_lang);
if($key_error_name!=''){
    $arr_key_error=json_decode($key_error_name,JSON_UNESCAPED_UNICODE);
}else{
    $arr_key_error=array();
}

?>
<div style="float: left;padding: 10px;width:95%;">

    <form style="float: left;width:100%" name="frm_lang_act" id="form_loc" action="<?php echo $url; ?>/app_my_girl_handling.php" method="get">
        <p>
            <strong><i class="fa fa-language" aria-hidden="true"></i> chọn quốc gia thực hiện (<b><?php echo $sel_lang;?></b>)</strong>
        </p>

        <p>
            <ul name="lang_sel">
                <?php
                $list_country = mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1' AND `active` = '1' ORDER BY `id`");
                while ($l = mysqli_fetch_array($list_country)) {
                    ?>
                    <li style="float:left;background-color: #dadaff; padding: 4px;border-radius: 8px;margin: 3px;">
                        <a href="<?php echo $cur_url;?>&lang_sel=<?php echo $l['key'];?>">
                        <img src="<?php echo $url;?>/thumb.php?src=<?php echo $url;?>/app_mygirl/img/<?php echo $l['key'];?>.png&size=10&trim=1" style="width:10px;height:10px">  <?php echo $l['name']; ?>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </p>
    </form>


    <form style="float: left;" name="frm_month_act" id="form_loc" action="<?php echo $url; ?>/app_my_girl_handling.php" method="get">
        <p>
            <strong><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm các từ khóa thừa trong tên</strong>
        </p>

        <p id="list_name_error">
            <?php
            for($i=0;$i<count($arr_key_error);$i++){
            ?>
            <div class="item_name"><input type="text" value="<?php echo $arr_key_error[$i];?>" name="key_name[]" ><span class="buttonPro red small" onclick="delete_field_name(this);return false;"><i class="fa fa-trash" aria-hidden="true"  ></i></span></div>
            <?php
            }
            ?>
        </p>

        <p><br/>
            <span class="buttonPro green small" onclick="add_field_name_error();return false;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm trường</span>
            <input type="submit" value="Cập nhật các từ khóa" class="buttonPro blue"/>
            <input type="hidden" value="fix_name_user" name="func"/>
            <input type="hidden" value="add_key_error" name="action"/>
            <input type="hidden" value="<?php echo $sel_lang;?>" name="lang_sel"/>
        </p>
    </form>


    <form style="float: left;" name="frm_month_act" id="form_loc" action="<?php echo $url; ?>/app_my_girl_handling.php" method="get">
        <p>
            <strong><i class="fa fa-eercast" aria-hidden="true"></i> Tìm và sửa các người dùng sai tên</strong>
        </p>

        <p>
            Các từ khóa thừa<br/>
            <?php 
            for($i=0;$i<count($arr_key_error);$i++){
                echo '<a href="'.$cur_url.'&search='.$arr_key_error[$i].'&lang_sel='.$sel_lang.'" class="buttonPro small black"><i class="fa fa-circle" aria-hidden="true"></i> '.$arr_key_error[$i].'</a>';
            }
            ?>
        </p>


        <p><br/>
            <input type="submit" value="Thự thi" class="buttonPro blue"/>
            <input type="hidden" value="fix_name_user" name="func"/>
            <input type="hidden" value="fix_name_user" name="action"/>
            <input type="hidden" value="<?php echo $sel_lang;?>" name="lang_sel"/>
        </p>
    </form>

    <table>
    <?php
    if ($action=='fix_name_user') {
        for($i=0;$i<count($arr_key_error);$i++){
            $key_change=$arr_key_error[$i];
            $query_rename_user=mysqli_query($link,"UPDATE `app_my_girl_user_$sel_lang` SET `name`=REPLACE(`name`,'$key_change','') ");
            if(mysqli_error($link)==""){
                echo "<tr><td>Loại bỏ <b>(".mysqli_affected_rows($link).")</b> từ khóa thừa (".$key_change.") thành công!!!</td></tr>";
            }else{
                echo mysqli_error($link);
            }
        }
    }

    if(isset($_GET['search'])){
        $key_search=$_GET['search'];
        $query_search_user=mysqli_query($link,"SELECT * FROM `app_my_girl_user_vi` WHERE `name` LIKE '%$key_search%' LIMIT 50");
        while($row_user=mysqli_fetch_assoc($query_search_user)){
            echo "<tr><td>".$row_user['name']."</td></tr>";
        }
    }

    ?>
    </tabel>
</div>

<script>
function add_field_name_error(){
    $("#list_name_error").append("<div class='item_name'><input type='text' value='' name='key_name[]' ><span class='buttonPro red small' onclick='delete_field_name(this);return false;'><i class='fa fa-trash' aria-hidden='true'></i></span></div>");
}

function delete_field_name(emp){
    $(emp).parent().remove();
}
</script>