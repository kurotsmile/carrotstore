<?php
$cur_url=$this->cur_url;
$list_country=$this->get_list_lang();
$sel_lang='en';
$sub_view='list';
$keyword='';
$active=''; if(isset($_GET['active'])) $active=$_GET['active'];

if(isset($_REQUEST['view']))$sub_view=$_REQUEST['view'];
if(isset($_GET['lang'])) $sel_lang=$_GET['lang'];
?>
<div class="cms_menu_lang">
<?php
    for($i=0;$i<count($list_country);$i++){
        $item_country=$list_country[$i];
        if($sel_lang==$item_country['key'])$style_active='class="active"';else $style_active="";
        echo '<a href="'.$this->cur_url.'&lang='.$item_country['key'].'" '.$style_active.'><i class="fa fa-globe" aria-hidden="true"></i> '.$item_country["name"].'</a>';
    }
?>
</div>
<div class="cms_tool_page">
    <a class="buttonPro small <?php if($sub_view=='list'){?>yellow<?php }?>" href="<?php echo $cur_url;?>&view=list&lang=<?php echo $sel_lang;?>"><i class="fa fa-list" aria-hidden="true"></i> Danh sách</a>
    <a class="buttonPro small <?php if($sub_view=='add'||$sub_view=='edit'){?>yellow<?php }?>" href="<?php echo $cur_url;?>&view=add&lang=<?php echo $sel_lang;?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm từ khóa</a>
    <a href="<?php echo $cur_url;?>&lang=<?php echo $sel_lang;?>&active=0" class="buttonPro small <?php if($active=='0'){?>black<?php }?>"><i class="fa fa-rocket" aria-hidden="true"></i> Kích hoặt tất cả</a>
    <a href="<?php echo $cur_url;?>&lang=<?php echo $sel_lang;?>&active=1" class="buttonPro small <?php if($active=='1'){?>black<?php }?>"><i class="fa fa-shield" aria-hidden="true"></i> Ngưng hoặt động tất cả</a>
</div>

<?php 
if($sub_view=='add'||$sub_view=='edit'){
    
    if($sub_view=='edit') $keyword=$_GET['key'];

    if(isset($_POST['key'])){
        $keyword=addslashes($_POST['key']);
        $sel_lang=$_POST['lang_sel'];
        $sub_view=$_POST['sub_view'];
        if($sub_view=='add'){
            $query_add_key=$this->q("INSERT INTO carrotsy_virtuallover.`app_my_girl_keyword_warning` (`key`, `lang`) VALUES ('$keyword', '$sel_lang');");
            if($query_add_key) echo $this->msg("Thêm thành công từ khóa $keyword","alert");
        }else{
            $key_edit=$_POST['key_edit'];
            $query_update_key=$this->q("UPDATE carrotsy_virtuallover.`app_my_girl_keyword_warning` SET `key` = '$keyword'  WHERE  `key` = '$key_edit' AND `lang` = '$sel_lang' LIMIT 1;");
            if($query_update_key) echo $this->msg("Cập nhật thành công từ khóa $keyword","alert");
        }
    }
?>
<div style="width:100%;float:left">
<form style="float: left;width:auto;" name="frm_month_act" id="form_loc" action=""  method="POST">
    <p>
        <label>Từ khóa:</label>
        <input type="text" value="<?php echo $keyword;?>" name="key" />
    </p>
    
    <p><br />
        <?php if($sub_view=='add'){?>
            <button class="buttonPro blue"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới từ khóa</button>
        <?php }else{?>
            <button class="buttonPro orange"><i class="fa fa-check-circle" aria-hidden="true"></i> Cập nhật từ khóa</button>
            <a href="<?php echo $cur_url;?>" class="buttonPro"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Trở về</a>
        <?php }?>
        <input type="hidden" value="keyword_warning" name="func" />
        <input type="hidden" value="<?php echo $sub_view;?>" name="sub_view" />
        <input type="hidden" value="<?php echo $keyword;?>" name="key_edit" />
        <input type="hidden" name="lang_sel" value="<?php echo $sel_lang;?>" >
    </p>
</form>
</div>
<?php
}

if($sub_view=='list'){
    if(isset($_GET['delete'])){
        $key=$_GET['delete'];
        $sel_lang=$_GET['lang'];
        $query_delete=$this->q("DELETE FROM carrotsy_virtuallover.`app_my_girl_keyword_warning` WHERE `key` = '$key'  AND `lang` = '$sel_lang' LIMIT 1;");
        if($query_delete) echo $this->msg("Đã xóa từ khóa $key","alert");
    }
?>
<table>
<tr>
    <th>Từ khóa</th>
    <th>Kiểm tra </th>
    <th>Thao tác</th>
</tr>
<?php
$list_key=$this->q("SELECT * FROM carrotsy_virtuallover.`app_my_girl_keyword_warning` WHERE `lang` = '$sel_lang'");
while($row_key=mysqli_fetch_array($list_key)){
    $k=$row_key['key'];
    $txt_active='';
    if($active=='0'){
        $q_active=$this->q("UPDATE carrotsy_virtuallover.`app_my_girl_$sel_lang` SET `disable` = '$active' WHERE `chat` LIKE '%$k%' AND `disable` != '$active'  AND `effect` != '2' ");
        $num_obj=mysqli_affected_rows($this->link_mysql);
        $txt_active="<span style='color:green'><i class='fa fa-rocket' aria-hidden='true'></i> Đã kích hoặt $num_obj đối tượng !</span>";
    }

    if($active=='1'){
        $q_active=$this->q("UPDATE carrotsy_virtuallover.`app_my_girl_$sel_lang` SET `disable` = '$active' WHERE `chat` LIKE '%$k%' AND `disable` != '$active'  AND `effect` != '2' ");
        $num_obj=mysqli_affected_rows($this->link_mysql);
        $txt_active="<span style='color:red'><i class='fa fa-shield' aria-hidden='true'></i> Không kích hoặt $num_obj đối tượng !</span>";
    }
    ?>
    <tr>
        <td><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo $row_key['key'];?></td>
        <td>
            <a onclick="$(this).addClass('black')" href="<?php echo $this->url_carrot_store;?>/app_mobile/sheep/?page=good_night&lang=<?php echo $row_key['lang']; ?>&active=0&keyword=<?php echo $row_key['key'];?>" target="_blank" class="buttonPro small purple"><i class="fa fa-pagelines" aria-hidden="true"></i> đếm cừu</a>
            <a onclick="$(this).addClass('black')" href="<?php echo $this->url_carrot_store;?>/app_my_girl_chat.php?lang=<?php echo $row_key['lang']; ?>&key_word=<?php echo $row_key['key'];?>" target="_blank" class="buttonPro small blue"><i class="fa fa-comments" aria-hidden="true"></i> Xem</a>
            <?php if($txt_active!='') echo $txt_active;?>
        </td>
        <td>
            <a href="<?php echo $cur_url;?>&view=edit&key=<?php echo $row_key['key'];?>&lang=<?php echo $row_key['lang']; ?>" class="buttonPro small yellow"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
            <a href="<?php echo $cur_url;?>&delete=<?php echo $row_key['key'];?>&lang=<?php echo $row_key['lang']; ?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
        </td>
    </tr>
    <?php
}
?>
</table>
<?php }?>