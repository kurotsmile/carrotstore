<?php 
include "simple_html_dom.php";
$id_book='';
if(isset($_GET['id'])){
    $id_book=$_GET['id'];
}

if(isset($_POST['id_book'])){
    $id_book=$_POST['id_book'];
}

if(isset($_GET['delete'])){
    $id_book=$_GET['delete'];
}

$query_book=mysqli_query($this->link_mysql,"SELECT * FROM `book` WHERE `id` = '$id_book' LIMIT 1");
$data_book=mysqli_fetch_array($query_book);
    
$id_chapter='';
if(isset($_GET['chapter'])){
    $id_chapter=$_GET['chapter'];
}

if(isset($_POST['chapter_book'])){
    $id_chapter=$_POST['chapter_book'];
}


?>
<div id="page_contain">
<h3>Chi tiết sách (<?php echo $data_book['name']; ?>)</h3>

<ul>
    <li><a class="buttonPro large blue" href="<?php echo $this->url;?>/?page=manager_book&lang=<?php echo $data_book['lang']; ?>&type=<?php echo $data_book['type']; ?>"><i class="fa fa-list-alt"></i> Quảng lý sách</a></li>
    <li><a class="buttonPro large yellow" href="<?php echo $this->url;?>/?page=add_book&edit=<?php echo $id_book;?>"> <i class="fa fa-wrench"></i> Sửa sách này</a></li>
    <li><a class="buttonPro large red" href="<?php echo $this->url;?>/?page=view_book&delete=<?php echo $id_book;?>"> <i class="fa fa-trash"></i> Xóa tất cả các chương</a></li>
</ul>

<?php

if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $query_delete=mysqli_query($this->link_mysql,"DELETE FROM `paragraph_".$data_book['lang']."` WHERE ((`book_id` = '$id_book'));");
    if($query_delete){
        echo alert("Xóa thành công các chương!","alert");
    }

}


if($id_chapter!=''){
    if(isset($_POST['id_book'])){
        $id_book=$_POST['id_book'];
        $id_chapter=$_POST['chapter_book'];
        $link_audio=$_POST['audio_link'];
        
        if($link_audio!=''){
            $lang_book=$data_book['lang'];
                for($i=1;$i<=intval($data_book['chapter']);$i++){
                    if($i<10){
                        $name_i='0'.$i;
                    }else{
                        $name_i=$i;
                    }
                    $ch = curl_init($link_audio."/$name_i.mp3");
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_setopt($ch, CURLOPT_NOBODY, 0);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
                    $output = curl_exec($ch);
                    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    curl_close($ch);
                    if ($status == 200) {

                        file_put_contents(dirname(__FILE__) . '/data/chapter_'.$lang_book.'/'.$id_book.'_'.$i.'.mp3', $output);
                        echo alert("save audio book:$id_book lang:$lang_book  chap:$i success! <a href='$this->url/data/chapter_$lang_book"."/".$id_book."_"."$i.mp3' target='_blank'>Play</a><br/>");
                    }
                }
        }else{
            if($_FILES["audio_chapter"]["tmp_name"]!=''){
                $target_dir_audio="data/chapter_".$data_book['lang']."/".$id_book."_".$id_chapter.".mp3";
                $up=move_uploaded_file($_FILES["audio_chapter"]["tmp_name"], $target_dir_audio);
                if($up){
                    echo alert("Tải lên âm thanh thành công!","alert");
                }else{
                    echo alert("Tải lên âm thanh không thành công!","error");
                }
            } 
        }
    }
            
?>
<form class="box_form" action="" method="post"  enctype="multipart/form-data"  >
    <div class="row">
        <strong>Cập nhật tệp âm thanh cho chương <?php echo $id_chapter;?> sách (<?php echo $data_book['name']; ?>)</strong>
    </div>
    
    <div class="row">
    <label>Tải âm thanh lên cho chương này</label>
    <input type="file" class="buttonPro small blue" name="audio_chapter" />
    </div>
    
    <div class="row">
    <label>Nhập url nhập file từ web site khác</label>
    <input type="text" name="audio_link" value="<?php echo $link_audio;?>" />
    </div>

    <div class="row">
        <input name="chapter_book" type="hidden" value="<?php echo $id_chapter ?>" />
        <input name="id_book" type="hidden"  value="<?php echo $id_book; ?>"/>
        <input class="buttonPro green" type="submit" value="Cập nhật" />
    </div>
</form>
<?php
}

$web_link='';

if(isset($_POST['web_link'])){
    $web_link=$_POST['web_link'];
    $lang_book=$data_book['lang'];

    //web 1
    /*
    for($i=1;$i<=intval($data_book['chapter']);$i++){
        $chapter_book_sel=$i;
                $base = str_replace("{i}",$chapter_book_sel,$web_link);
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
                
                //get all category links
                foreach($html_base->find('span.verse') as $element) {
                    $order_emp=$element->find('sup', 0)->innertext;
                    $order_emp=$order_emp-1;
                    $element->find('sup', 0)->innertext = '';
                    $element->find('a', 0)->innertext = '';
                    $contain_p=addslashes(strip_tags(trim($element->plaintext)));
                    $string = htmlentities($contain_p, null, 'utf-8');
                    $content = str_replace("&nbsp;", "", $string);
                    $content = html_entity_decode($content);
                    $query_add_paragraphp=mysqli_query($this->link_mysql,"INSERT INTO `paragraph_$lang_book` (`book_id`, `chapter`, `contain`,`orders`) VALUES ('$id_book', '$chapter_book_sel', '".$content."','".$order_emp."');");
                }
                
                $html_base->clear(); 
                unset($html_base);
                mysqli_query($this->link_mysql,"UPDATE `paragraph_$lang_book` SET `contain`= REPLACE(`contain`, '&emsp;', '') WHERE `book_id` = '$id_book' AND `chapter`='$chapter_book_sel'");
                mysqli_query($this->link_mysql,"UPDATE `paragraph_$lang_book` SET `contain`= REPLACE(`contain`, '&nbsp;', '') WHERE `book_id` = '$id_book' AND `chapter`='$chapter_book_sel'");
            echo alert('Add book id:'.$id_book.' chap: '.$chapter_book_sel.' lang:'.$lang_book.' thành công','alert');    
                
    }*/
    
    //web 2
    for($i=1;$i<=intval($data_book['chapter']);$i++){
                $chapter_book_sel=$i;
                $base = str_replace("{i}",$chapter_book_sel,$web_link);
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
                foreach($html_base->find('div.verse') as $element) {
                    $c=$element->find('span.verse-'.($order_emp+1),0)->plaintext;
                    $c=trim($c);
                    $c=str_replace('{~}','',$c);
                    $contain=addslashes($c);
                    $query_add_paragraphp=mysqli_query($this->link_mysql,"INSERT INTO `paragraph_$lang_book` (`book_id`, `chapter`, `contain`,`orders`) VALUES ('$id_book', '$chapter_book_sel', N'".$contain."','".$order_emp."');");
                    echo mysql_error();
                    $order_emp++;
                }
                
                $html_base->clear(); 
                unset($html_base);
                mysqli_query($this->link_mysql,"UPDATE `paragraph_$lang_book` SET `contain`= REPLACE(`contain`, '&emsp;', '') WHERE `book_id` = '$id_book' AND `chapter`='$chapter_book_sel'");
                mysqli_query($this->link_mysql,"UPDATE `paragraph_$lang_book` SET `contain`= REPLACE(`contain`, '&nbsp;', '') WHERE `book_id` = '$id_book' AND `chapter`='$chapter_book_sel'");
                echo alert('Add book id:'.$id_book.' chap: '.$chapter_book_sel.' lang:'.$lang_book.' thành công','alert');    
                
    }
    echo btn_add_work($id_book,$lang_book,'bible_p','add');
}
?>

<ul style="float: left;width: 100%;">
    <?php
    for($i=1;$i<=intval($data_book['chapter']);$i++){
        $this->url_audio_chapter="";
        $this->url_audio_check="data/chapter_".$data_book['lang']."/".$id_book."_".$i.".mp3";
        if(file_exists($this->url_audio_check)){
            $this->url_audio_chapter=$this->url_audio_check;
        }
        $query_count_paragraph=mysqli_query($this->link_mysql,"SELECT COUNT(`id`) FROM `paragraph_".$data_book['lang']."` WHERE `book_id` = '".$id_book."' AND `chapter` = '$i'");
        $count_p=mysqli_fetch_array($query_count_paragraph);
    ?>
    <li <?php if($i==$id_chapter){?>style="background-color: #ff9158;"<?php }?>>Chương <?php echo $i; ?> 
        <a class="buttonPro small blue" href="<?php echo $this->url;?>/?page=paragraph&id_book=<?php echo $id_book;?>&id_chapter=<?php echo $i;?>"><i class="fa fa-play"></i> Xem các đoạn (<?php echo $count_p[0]; ?>)</a>
        <a class="buttonPro small green" href="<?php echo $this->url;?>/?page=paragraph&id_book=<?php echo $id_book;?>&id_chapter=<?php echo $i;?>"><i class="fa fa-plus-square"></i> Thêm đoạn vào chương này</a>
        <a class="buttonPro small yellow" href="<?php echo $this->url;?>/?page=view_book&id=<?php echo $id_book;?>&chapter=<?php echo $i;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Cập nhật tệp âm thanh</a>
        <?php if($this->url_audio_chapter==""){?>
            <i style="color: red;"><i class="fas fa-exclamation-circle"></i> Chưa có tệp âm thanh</i>
        <?php }else{?>
            <a href="<?php echo $this->url_audio_chapter;?>" target="_blank"><i class="fa fa-volume-up"></i> Nghe chương này</a>
        <?php }?>
    </li>
    <?php }?>
</ul>

<form class="box_form" action="" method="post"  enctype="multipart/form-data"  >
    <div class="row">
        <strong>Nhập dữ liệu từ trang web khác cho sách (<?php echo $data_book['name']; ?> gồm <?php echo $data_book['chapter'];?> chương)</strong>
    </div>

    <div class="row">
    <label>Nhập url nhập file từ web site khác ( {i} - là tham số đếm chương)</label>
    <input type="text" style="width: 100%;" name="web_link" value="<?php echo $web_link;?>" />
    </div>

    <div class="row">
        <input name="id_book" type="hidden"  value="<?php echo $id_book; ?>"/>
        <input class="buttonPro green" type="submit" value="Cập nhật" />
    </div>
</form>
</div>