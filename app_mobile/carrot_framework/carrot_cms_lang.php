
<?php
if($this->data_temp!=null) $data_page=$this->data_temp; 
$function=$data_page->function;
$table_key=$data_page->table_key;
$table_data=$data_page->table_data;
$field_key=$data_page->field_key;
$field_data=$data_page->field_data;
$field_data_lang_id=$data_page->field_data_lang_id;

$this->data_temp=$data_page;
$lang_to="";if(isset($_GET['lang_to']))$lang_to=$_GET['lang_to'];
$field_empty="";if(isset($_GET['empty']))$field_empty=$_GET['empty'];
$list_country=$this->get_list_lang();
?>
<div class="cms_menu_lang">
<?php
    $item_country=$list_country[0];
    $lang=$item_country['key'];if(isset($_GET['lang']))$lang=$_GET['lang'];
    for($i=0;$i<count($list_country);$i++){
        $item_country=$list_country[$i];
        if($lang==$item_country['key'])$style_active='class="active"';else $style_active="";
        $url_cur_func=$this->cur_url."&lang=".$item_country["key"];
        echo '<a href="'.$url_cur_func.'" '.$style_active.'><i class="fa fa-globe" aria-hidden="true"></i> '.$item_country["name"].'</a>';
    }
?>
</div>

<?php
        if(isset($_POST['lang'])){
            $lang=$_POST['lang'];
            $data_key=$_POST['key'];
            $data_val=$_POST['val'];
            $obj_data=new stdClass();
            for($i=0;$i<count($data_key);$i++){
                $obj_data->{$data_key[$i]}=$data_val[$i];
            }
            $data_obj=json_encode($obj_data,JSON_UNESCAPED_UNICODE);
            $data_obj=addslashes($data_obj);
            $query_update_obj=mysqli_query($this->link_mysql,"UPDATE `$table_data` SET `$field_data` = '$data_obj' WHERE `$field_data_lang_id`='$lang' LIMIT 1;");
            echo "Thành công!";
        }
?>

<form method="post">
    <table>
    <?php
        $query_key_lang=mysqli_query($this->link_mysql,"SELECT `$field_key` FROM `$table_key` ");
        $query_data_lang=mysqli_query($this->link_mysql,"SELECT `$field_data` FROM `$table_data` WHERE `$field_data_lang_id`='$lang' LIMIT 1");
        $data_lang=mysqli_fetch_assoc($query_data_lang);
        $data_lang=$data_lang[$field_data];
        $data_lang=json_decode($data_lang);
        while($key_lang=mysqli_fetch_assoc($query_key_lang)){
            $key=$key_lang[$field_key];
            if(isset($data_lang->{$key})) $val=$data_lang->{$key};else$val="";
            if(($field_empty!="")&&($val!="")) continue;
            ?>
            <tr>
            <td><input name="key[]" type="hidden" value="<?php echo $key;?>"/><?php echo $key;?></td>
            <td>
                <input name="val[]" type="text" style="width:80%" value="<?php echo $val;?>"/><a  class="btn"><i class="fa fa-clipboard" aria-hidden="true"></i></a>
                <?php        
                    if($lang_to!=''){
                        $link_lang='';
                    if($lang_to=='zh'){
                        $link_lang="https://translate.google.com/?sl=$lang&tl=".$lang_to."-CN&text=".urldecode($val);
                    }else{
                        $link_lang="https://translate.google.com/?sl=$lang&tl=".$lang_to."&text=".urldecode($val);
                    }
                ?>
                    <a href="<?php echo $link_lang;?>" onclick="$(this).removeClass('blue');" target="_blank" class="btn blue"><i class="fa fa-language" aria-hidden="true"></i> Dịch (<?php echo $lang_to;?>)</a>
                <?php }?>
                <a class="btn" href="<?php echo $this->url."?function=show_setting_lang_by_field&field_show=".$key;?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
            </td>
            </tr>
            <?php
        }
    ?>
        </tr>
            <td>
                <input name="lang" type="hidden" value="<?php echo $lang;?>">
                <select name="lang_to" id="lang_to" onchange="go_to_lang(this)">
                <?php
                for($i=0;$i<count($list_country);$i++){
                    $item_country=$list_country[$i];
                    echo '<option value="'.$item_country['key'].'">'.$item_country['name'].'</option>';
                }
                ?>
                </select>
                <a href="<?php echo $this->cur_url;?>&empty=1&lang=<?php echo $lang;?>" class="btn"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Trường trống</a>
            </td>
            <td><button class="btn green"><i class="fa fa-check-circle" aria-hidden="true"></i> Cập nhật</nutton></td>
        </tr>
    </table>
</form>

<script>
    function go_to_lang(emp){
        window.location.href = "<?php echo $this->cur_url;?>&lang=<?php echo $lang;?>&lang_to="+emp.value;
    }
</script>
