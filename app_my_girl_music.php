<?php
include "app_my_girl_template.php";
$langsel='vi';
$sexsel="0";
$sex_char="1";
$key_search='';
$limit='100';
$effect_search='';
$disable_chat='';
$disable_chat_sql="";
$txt_key_search='';
$txt_query_page_cat="";
$view_top_music="";

$col_rank='';


if(isset($_GET['lang'])){
    $langsel=$_GET['lang'];
}

if(isset($_GET['sex'])){
    $sexsel=$_GET['sex'];
}

if(isset($_GET['key_word'])){
    $key_search=urldecode($_GET['key_word']);
    $txt_key_search="AND  (`chat` LIKE '%$key_search%')";
}

if(isset($_GET['character_sex'])){
    $sex_char=$_GET['character_sex']; 
}

if(isset($_GET['disable_chat'])){
    $disable_chat=$_GET['disable_chat']; 
}

if(isset($_GET['music_top'])){
    $view_top_music=$_GET['music_top'];
}

if(isset($_GET['limit'])){
    $limit=$_GET['limit'];
}

if(isset($_POST['loc'])){
    if(isset($_POST['lang'])) $langsel=$_POST['lang'];
    if(isset($_POST['sex'])) $sexsel=$_POST['sex'];
    $key_search= $_POST['key_word'];
    
    if(isset($_POST['disable_chat'])) $disable_chat=$_POST['disable_chat'];
    if($disable_chat!=''){
        $disable_chat_sql=" AND `disable` = '$disable_chat'";
    }
    


    if(isset($_POST['limit'])){
        $limit=$_POST['limit'];
    }
    
    if(isset($_POST['music_top'])){
        $view_top_music=$_POST['music_top'];
    }
}

if($key_search!=''){
    $txt_key_search="AND ((`chat` LIKE '%$key_search%') OR (`chat` = '%$key_search%'))";
}

$txt_query_view='';
if($view_top_music!=''){
    if($view_top_music!="-1"){
        $txt_query_view=" AND `top_music`.`value`=$view_top_music ";
        $result_tip=mysqli_query($link,"SELECT DISTINCT `chat`.* FROM `app_my_girl_music_data_$langsel` as `top_music` left JOIN   `app_my_girl_$langsel` as `chat`  on `chat`.`id`=`top_music`.`id_chat` WHERE `chat`.`effect` = '2'  $txt_query_view ");
    }else{
        $result_tip=mysqli_query($link,"SELECT `chat`.*,COUNT(`top_music`.`id_chat`)  as c  FROM `app_my_girl_music_data_$langsel` as `top_music` left JOIN   `app_my_girl_$langsel` as `chat`  on `chat`.`id`=`top_music`.`id_chat` WHERE `chat`.`effect` = '2' GROUP BY `top_music`.`id_chat` HAVING COUNT(`top_music`.`id_chat`) >= 1 ORDER BY c DESC ");
    } 
    $total_records=mysqli_num_rows($result_tip);
}else{
    $query_count_all=mysqli_query($link,"SELECT COUNT(`id`) FROM `app_my_girl_$langsel` WHERE `disable` = 0 $txt_key_search AND `effect`='2' ORDER BY `id`");
    $data_all_music=mysqli_fetch_array($query_count_all);
    $total_records=$data_all_music[0];
}


    



$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$total_page = ceil($total_records / $limit);
if ($current_page > $total_page){
    $current_page = $total_page;
}
else if ($current_page < 1){
        $current_page = 1;
}
$start = ($current_page - 1) * $limit;
if($view_top_music!=''){
    if($view_top_music!="-1"){
        $list_music=mysqli_query($link,"SELECT DISTINCT `chat`.* FROM `app_my_girl_music_data_$langsel` as `top_music` left JOIN   `app_my_girl_$langsel` as `chat`  on `chat`.`id`=`top_music`.`id_chat` WHERE `chat`.`effect` = '2'  $txt_query_view LIMIT $start, $limit ");
    }else{
        $list_music=mysqli_query($link,"SELECT `chat`.*,COUNT(`top_music`.`id_chat`)  as c  FROM `app_my_girl_music_data_$langsel` as `top_music` left JOIN   `app_my_girl_$langsel` as `chat`  on `chat`.`id`=`top_music`.`id_chat` WHERE `chat`.`effect` = '2' GROUP BY `top_music`.`id_chat` HAVING COUNT(`top_music`.`id_chat`) >= 1 ORDER BY c DESC LIMIT $start, $limit ");
    }  
}else{
    $list_music=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE `disable` = 0 $txt_key_search AND `effect`='2' ORDER BY `id` DESC LIMIT $start, $limit "); 
}
echo mysqli_error($link);
?>
<form method="post" id="form_loc">

<div style="display: inline-block;float: left;margin: 2px;width: 90px;">
    <label>Ngôn ngữ:</label> 
    <select name="lang">
    <?php 
    $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active` = '1'");
    while($row_lang=mysqli_fetch_assoc($list_country)){
    ?>
    <option value="<?php echo $row_lang['key'];?>" <?php if($langsel==$row_lang['key']){?> selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
    <?php }?>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;width: 210px;">
    <label>Từ khóa:</label> 
    <input type="text" name="key_word" value="<?php echo $key_search;?>"/>
</div>

<div style="display: inline-block;float: left;margin: 2px;width: 300px;">
    <label>Chọn số hàng hiển thị trong một trang:</label> 
    <select name="limit">
        <option <?php if($limit=='100'){ echo 'selected="true"';}?> value="100">100 hàng</option>
        <option <?php if($limit=='500'){ echo 'selected="true"';}?>  value="500">500 hàng</option>
        <option <?php if($limit=='1000'){ echo 'selected="true"';}?>  value="1000">1000 hàng</option>
        <option <?php if($limit=='1500'){ echo 'selected="true"';}?>  value="1500">1500 hàng</option>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;width: 210px;">
    <label>Bản xếp hạng</label>
    <select name="music_top">
        <option value="" <?php if($view_top_music==""){?>selected="true"<?php }?>>--Lựa chọn--</option>
        <option value="-1" <?php if($view_top_music=="-1"){?>selected="true"<?php }?>>Nghe nhiều nhất</option>
        <option value="0" <?php if($view_top_music=="0"){?>selected="true"<?php }?>>Nhạc vui nhất</option>
        <option value="1" <?php if($view_top_music=="1"){?>selected="true"<?php }?>>Nhạc buồn nhất</option>
        <option value="2" <?php if($view_top_music=="2"){?>selected="true"<?php }?>>Nhạc thanh thản - thư giản</option>
        <option value="3" <?php if($view_top_music=="3"){?>selected="true"<?php }?>>Nhạc phấn khích - sôi động</option>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <input type="submit" name="loc" value="Lọc" class="link_button" />
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <a href="<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $langsel;?>&sex=<?php echo $sexsel; ?>&character_sex=<?php echo $sex_char;?>&effect=2&actions=9" target="_blank" class="link_button"><i class="fa fa-plus"></i> Thêm bài hát (<?php echo $langsel;?>)</a>
</div>
</form>

<div id="form_loc" style="font-size: 11px;">
    <a href="<?php echo $url; ?>/app_my_girl_music_log_key.php?lang=<?php echo $langsel;?>" class="link_button buttonPro yellow" target="_blank"  ><i class="fa fa-search"></i> Theo dõi từ danh sách nhạc</a>
    <a href="<?php echo $url; ?>/app_my_girl_music_lyrics.php?lang=<?php echo $langsel;?>" class="link_button buttonPro blue" target="_blank"  ><i class="fa fa-book"></i> Lời bài hát</a>
</div>


<div id="form_loc" style="font-size: 11px;">
    <div style="display: inline-block;float: left;margin: 2px;">
        <i class="fa fa-music" aria-hidden="true"></i> có <?php echo mysqli_num_rows($list_music);?> hiển thị / <?php echo $data_all_music[0];?> bài hát
    </div>
</div>

<div id="form_loc" style="width: 95%;float: left;">
    <strong>Trang hiển thị:</strong>
        <?php
            for($i=1;$i<=$total_page;$i++){
                $colo_btn='blue';
                if($i==$current_page){
                    $colo_btn='black';
                }
                echo '<a href="'.$url.'/app_my_girl_music.php?lang='.$langsel.'&page='.$i.''.$txt_query_page_cat.'&limit='.$limit.'&key_word='.$key_search.'&music_top='.$view_top_music.'" class="buttonPro '.$colo_btn.' small">'.$i.'</a>';
            }
        ?>
</div>

<script>
function music_top_view(value_sel){
    window.location="<?php echo $url;?>/app_my_girl_music.php?lang=<?php echo $langsel ?>&music_top="+value_sel;
}
        
function delete_table(id_row){
    if (confirm('Có chắc là sẽ xóa?')) {
        $.ajax({
                url: "app_my_girl_jquery.php",
                type: "get", //kiểu dũ liệu truyền đi
                data: "function=delete_chat&id="+id_row+"&lang=<?php echo $langsel;?>", //tham số truyền vào
                success: function(data, textStatus, jqXHR)
                {
                    $('.chat_row_'+id_row).remove();
                    alert('Delete success!!!');
                }
            
            });
        return false;
    }

}

function add_music_lyrics(id_music){
    swal({
      title: "Nhập nội dung lời vào đây",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Lưu lời bài hát",
      closeOnConfirm: false,
      html: true,
      text:'<textarea style="height: 240px;" id="lyrics_inp" name="lyrics_inp"></textarea>'
    },
    function(){
        var txt_lyrics=$('#lyrics_inp').val().replace(/\&/g,' and ');
        var lang="<?php echo $langsel;?>";
         $.ajax({
            url: "app_my_girl_jquery.php",
            type: "post", //kiểu dũ liệu truyền đi
            data: "save_lyric=0&lang="+lang+"&lyrics="+txt_lyrics+"&id_music="+id_music+"&user_name=<?php echo $data_user_carrot['user_name'];?>", //tham số truyền vào
            success: function(data, textStatus, jqXHR)
            {
                swal("Đã lưu!", data, "success");
                $(".btn_add_lyrics_"+id_music+"").remove();
            }
            
        });
    });
}

function add_video_music(id_music){
    swal({
      title: "Nhập liên kết video youtube vào đây",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Lưu liên kết",
      closeOnConfirm: false,
      html: true,
      text:'<textarea style="height: 80px;" id="video_inp" name="video_inp"></textarea>'
    },
    function(){
        var txt_lyrics=$('#video_inp').val();
        var lang="<?php echo $langsel;?>";
         $.ajax({
            url: "app_my_girl_jquery.php",
            type: "post", //kiểu dũ liệu truyền đi
            data: "save_video=1s&lang="+lang+"&link="+txt_lyrics+"&id_music="+id_music+"&user_name=<?php echo $data_user_carrot['user_name'];?>", //tham số truyền vào
            success: function(data, textStatus, jqXHR)
            {
                swal("Đã lưu!", data, "success");
                $(".btn_add_video_"+id_music+"").remove();
            }
            
        });
    });
}

function view_music_lyrics(id_music){
    var lang="<?php echo $langsel;?>";
    $.ajax({
            url: "app_my_girl_jquery.php",
            type: "post", //kiểu dũ liệu truyền đi
            data: "view_lyric=1s&lang="+lang+"&id_music="+id_music, //tham số truyền vào
            success: function(data, textStatus, jqXHR)
            {
                    swal({title: "Lyric",html: true,text:'<textarea style="height: 240px;">'+data+'</textarea>'});
            }
        
    });
}

function search_music_lyrics(name_song){
    var txt_name_song=name_song;
    txt_name_song=txt_name_song.replace("&", "and");
    var win = window.open("https://search.azlyrics.com/search.php?q="+txt_name_song, '_blank');
    win.focus();
}

function search_gg(emp){
    var key_value=$(emp).attr('title');
    key_value=key_value.replace("&", "and");
    key_value=key_value.replace("/", "");
    var url_search="https://www.google.com/search?q="+key_value+" <?php echo get_key_lang($link,'lyrics_search',$langsel);?>";
    var win = window.open(url_search, '_blank');
    win.focus();
}



</script>
<?php
echo '<table  style="border:solid 1px green">';
echo '<tr style="border:solid 1px green"><th>id</th>'.$col_rank.'<th>Loại</th><th>Từ khóa âm nhạc</th><th>Tên bài hát</th><th>Giới tính</th><th>Gợi ý</th><th>Giới hạng</th><th>Giọng</th><th>Thao tác</th><th>Thông tin siêu dữ liệu</th></tr>';
        while ($row = mysqli_fetch_array($list_music)) {
             echo show_row_music($link,$row,$langsel);
        }
echo '</table>';
?>