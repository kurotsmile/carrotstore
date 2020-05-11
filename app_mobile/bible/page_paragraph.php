<?php
include "simple_html_dom.php";

$id_book='';
$id_chapter='';
$id_edit_id='';

$lang_book='';
$contain_book='';
$chapter_book=0;

if(isset($_GET['id_book'])){
    $id_book=$_GET['id_book'];
}

if(isset($_GET['id_chapter'])){
    $id_chapter=$_GET['id_chapter'];
}

if(isset($_GET['order_book'])){
    $order_book=$_GET['order_book'];
    $lang_book=$_GET['lang_book'];
    $type_book=$_GET['type_book'];
    $query_id_book=mysql_query("SELECT `id` FROM `book` WHERE `orders` = '$order_book' AND `type`='$type_book'  AND `lang` = '$lang_book' LIMIT 1");
    $id_book=mysql_fetch_array($query_id_book);
    $id_book=$id_book['id'];
}



$query_book=mysql_query("SELECT * FROM `book` WHERE `id` = '$id_book' LIMIT 1");
$data_book=mysql_fetch_array($query_book);
$lang_book=$data_book['lang'];
$chapter_book=$data_book['chapter'];

if(isset($_GET['p_id'])){
    $id_edit_id=$_GET['p_id'];
    $query_p=mysql_query("SELECT * FROM `paragraph_".$lang_book."` WHERE `id`='$id_edit_id' ");
    $data_p=mysql_fetch_array($query_p);
    $contain_book=$data_p['contain'];
}


if(isset($_POST['contain_book'])){
    $id_book=$_POST['id_book'];
    $chapter_book_sel=$_POST['chapter_book'];
    $contain_book=addslashes(trim($_POST['contain_book']));
    $orders=$_POST['orders'];
    
    if(isset($_POST['id_p'])){
        $id_edit_id=$_POST['id_p'];
    }
    
    $import_data_link='';
    
    if(isset($_POST['link'])){
        if($_POST['link']=='on'){
            $base = $_POST['contain_book'];
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl, CURLOPT_URL, $base);
                curl_setopt($curl, CURLOPT_REFERER, $base);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                $str = curl_exec($curl);
                curl_close($curl);
                
                // Create a DOM object
                $html_base = new simple_html_dom();
                // Load HTML from a string
                $html_base->load($str);
                
                $order_emp=0;
                //get all category links
                foreach($html_base->find('span.verse') as $element) {
                    
                    $element->find('span.chapterNum', 0)->innertext = '';
                    
                    foreach($html_base->find('span a') as $element_tag_a) {
                        $element_tag_a->innertext = '';
                    }
                    $contain_p=addslashes(strip_tags(trim($element->plaintext)));
                    $string = htmlentities($contain_p, null, 'utf-8');
                    $content = str_replace("&nbsp;", "", $string);
                    $content = html_entity_decode($content);
                    
                    
                    
                    
                    $query_add_paragraphp=mysql_query("INSERT INTO `paragraph_$lang_book` (`book_id`, `chapter`, `contain`,`orders`) VALUES ('$id_book', '$chapter_book_sel', '".$content."','".$order_emp."');");
                    $order_emp++;
                }
                
                $html_base->clear(); 
                unset($html_base);
                mysql_query("UPDATE `paragraph_$lang_book` SET `contain`= REPLACE(`contain`, '&emsp;', '') WHERE `book_id` = '$id_book' AND `chapter`='$chapter_book_sel'");
                mysql_query("UPDATE `paragraph_$lang_book` SET `contain`= REPLACE(`contain`, '&nbsp;', '') WHERE `book_id` = '$id_book' AND `chapter`='$chapter_book_sel'");
                echo alert('Add book id:'.$id_book.' chap: '.$chapter_book_sel.' lang:'.$lang_book.' thành công','alert');  
                echo btn_add_work($id_book,$lang_book,'bible_p','add');
        }
    }else{

    
        if($contain_book==''){
            echo alert("Nội dung không được để trống!","error");
        }else{
            if($id_edit_id==''){
                $query_add_paragraphp=mysql_query("INSERT INTO `paragraph_$lang_book` (`book_id`, `chapter`, `contain`,`orders`) VALUES ('$id_book', '$chapter_book_sel', '$contain_book','$orders');");
                
                if($query_add_paragraphp){
                    $contain_book='';
                    echo alert("Thêm thành công đoạn Kinh Thánh",'alert');
                }else{
                    echo alert("Thêm không thành công đoạn Kinh Thánh".mysql_error(),'error');
                }
            }else{
                $query_update_p=mysql_query("UPDATE `paragraph_$lang_book` SET `contain` = '$contain_book' WHERE `id` = '$id_edit_id';");
                echo alert("Cập nhật thành công!!!","alert");
            }
        }
    }
}

$query_paragraph_count=mysql_query("SELECT * FROM `paragraph_".$lang_book."` WHERE `book_id` = '".$id_book."' AND `chapter` = '$id_chapter' ORDER BY `orders`");
?>
<form class="box_form" action="" method="post">
    <div class="row">
        <strong>Thêm đoạn kinh thánh cho sách (<?php echo $data_book['name'];?>)</strong>
    </div>
    
    <div class="row">
    <label>Chương</label>
    <select name="chapter_book">
        <?php
        for($i=1;$i<=intval($chapter_book);$i++){
        ?>
        <option value="<?php echo $i;?>" <?php if($id_chapter==$i){ echo 'selected="true"'; }?> >Chương <?php echo $i;?></option>
        <?php
        }
        ?>
    </select>
    </div>
    
    <div class="row">
    <label>Nội dung (hoặc liên kết web khi tích chọn nhập từ website)</label><br />
    <textarea name="contain_book" style="width: 100%;float: left;height: 200px;"><?php echo $contain_book;?></textarea>
    </div>
    
    <div class="row">
    <label>Nhập nội dung từ liên kết</label><br />
    <input type="checkbox" name="link" />
    </div>
    

    <div class="row">
        <input name="orders" type="hidden"  value="<?php echo mysql_num_rows($query_paragraph_count);?>"/>
        <input name="id_book" type="hidden"  value="<?php echo $id_book;?>"/>
        <input name="lang_book" type="hidden"  value="<?php echo $lang_book;?>"/>
        <?php if($id_edit_id!=''){?>
            <input type="hidden" name="id_p" value="<?php echo $id_edit_id;?>" />
            <input class="buttonPro  yellow" type="submit" value="Cập nhật" />
        <?php }else{?>
            <input class="buttonPro  green" type="submit" value="Thêm mới" />
        <?php }?>
    </div>
</form>

<ul style="float: left;width: 100%;list-style: none;">
    <li><a class="buttonPro small blue" href="<?php echo $url;?>/?page=view_book&id=<?php echo $id_book;?>"><i class="fas fa-caret-square-left"></i> Trở về trang sách</a></li>
    <li><a class="buttonPro small green" href="<?php echo $url;?>?page=media&order_book=<?php echo $data_book['orders']; ?>&order_chap=<?php echo $id_chapter;?>&type_book=<?php echo $data_book['type']; ?>"><i class="fas fa-image"></i> Thêm ảnh cho chương</a></li>
</ul>

<div style="float: left;width: 100%;">
<?php
$query_media=mysql_query("SELECT `id` FROM `media` WHERE `order_chap` = '$id_chapter' AND `order_book` = '".$data_book['orders']."' AND `type`='".$data_book['type']."' LIMIT 1");
if(mysql_num_rows($query_media)>0){
    $id_media=mysql_fetch_array($query_media);
    $id_media=$id_media['id'];
    $url_image=$url.'/data/media/'.$id_media.'.png';
    echo '<a href="'.$url.'?page=media&edit='.$id_media.'"><img src="'.$url_image.'"/></a>';
}
?>
</div>

<?php

if(isset($_GET['delete_id'])){
    $id_delete=$_GET['delete_id'];
    $query_delete=mysql_query("DELETE FROM `paragraph_$lang_book` WHERE ((`id` = '$id_delete'));");
    if($query_delete){
        echo alert("Xóa thành công đoạn!","alert");
    }else{
        echo alert("Xóa không thành công đoạn! ".mysql_error(),"alert");
    }
}
$query_paragraph=mysql_query("SELECT * FROM `paragraph_".$lang_book."` WHERE `book_id` = '".$id_book."' AND `chapter` = '$id_chapter' ORDER BY `orders`");
?>
<ul id="list_p" style="float: left;width: 100%;">
    <?php
    while($row_p=mysql_fetch_array($query_paragraph)){
    ?>
    <li id_p="<?php echo $row_p['id']; ?>" <?php if($id_edit_id==$row_p['id']){?>style="background-color: #FFA851;"<?php } ?>>
        <span style="font-weight: bold;">
            Thứ tự (<?php echo intval($row_p['orders'])+1; ?>)
        </span> 
        <span><?php echo $row_p['contain'];?></span>
        <span>
            <a class="buttonPro small yellow" href="<?php echo $url;?>/?page=paragraph&id_book=<?php echo $id_book;?>&id_chapter=<?php echo $id_chapter ?>&p_id=<?php echo $row_p['id'];?>"><i class="fas fa-wrench"></i> Sửa</a>
            <a class="buttonPro small red" href="<?php echo $url;?>/?page=paragraph&id_book=<?php echo $id_book;?>&id_chapter=<?php echo $id_chapter ?>&delete_id=<?php echo $row_p['id'];?>"><i class="fas fa-trash-alt"></i> Xóa</a>
        </span>

    </li>
    <?php
    }
    ?>
</ul>

<p style="width: 100%;float: left;">
<span class="buttonPro yellow" id="btn_save" onclick="save_all_item();return false;" style="display: none;"><i class="fas fa-save"></i> Lưu thay đổi</span>
</p>

<script>
$(document).ready(function(){
    $("#btn_save").hide();
    $("#list_p").sortable({change: function( event, ui ) {
        $("#btn_save").show();
    }});
});

function save_all_item(){
    var id_book='<?php echo $id_book;?>';
    var id_chapter='<?php echo $id_chapter; ?>';
    var lang_book='<?php echo $lang_book;?>';
    var arr_id=[];
    $("#list_p li").each(function( index, value ){
        var id_p=$(this).attr("id_p");
        arr_id.push(id_p);
    });
    
    $.ajax({
        url: "ajax.php",
        type: "post", 
        data: "function=save_order_p&arr_id_p="+JSON.stringify(arr_id)+"&id_book="+id_book+"&id_chapter="+id_chapter+"&lang_book="+lang_book, 
        success: function(data, textStatus, jqXHR)
        {
            swal(data);
        }
        
    });
}


</script>

