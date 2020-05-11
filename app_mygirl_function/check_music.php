<?php
    $count_error=0;
    echo '<h2>Kiểm tra bài hát có tồn tại</h2>';
    $key_search=urldecode($_GET['key_word']);
    ?>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <form name="check_music" method="get" id="form_loc">
    <label>Từ khóa <?php if($key_search!=''){ echo '<strong>'.$key_search.'</strong>';} ?></label> 
    <input type="text" value="<?php echo $key_search;?>" name="key_word" id="key_word" onchange="$('#btn_check_key').show();return false;"  />
    <input type="hidden" value="check_music" name="func" />
    <span id="show_return"></span>
    <span class="buttonPro small yellow" onclick="check_key();return false;" id="btn_check_key">Kiểm tra lại từ khóa</span><br /><br />
    <span class="buttonPro small blue" onclick="search_gg();return false;" id="btn_check_key">Search google</span>
    <span class="buttonPro small blue" onclick="search_yt();return false;" id="btn_check_key">Search Youtube</span>
    <br />
    <?php
        $list_country=mysqli_query($link,"SELECT `key`,`name` FROM `app_my_girl_country` WHERE `active`='1'");
        while($l=mysqli_fetch_array($list_country)){
            echo '<a style="" class="buttonPro small" href="'.$url.'/app_my_girl_add.php?lang='.$l['key'].'&effect=2&actions=9" target="_blank"><img src="'.thumb('app_mygirl/img/'.$l['key'].'.png','10x10').'"/> ( '.$l['key'].' - '.$l['name'].' ) '.get_key_lang($link,'key_music',$l['key']).'</a>';
        }
        mysqli_free_result($list_country);
    ?>
    </form>
    

    
    <script>
    var arr_key=[];

    $().ready(function(){
           $( "#key_word" ).autocomplete({
              source: arr_key,
              disabled: false,
                open: function(e, ui){
                  $(".ui-menu-item:eq(0)").trigger("click");
                  return false;
                }
           });
           $('#btn_check_key').hide();
           setTimeout(explode,1000);
    });
    
    function explode(){
        $( "#key_word" ).click();
        $( "#key_word" ).keydown();
        $( "#key_word" ).keyup();
         $( "#key_word" ).autocomplete({
              source: arr_key,
              open: function(e, ui){
                $("#show_return").html("Các bài hát liên quan được liệt kê bên dưới").css("color","green");
                return false;
              }
           });
         check_song();
           
    }
    
    function check_song(){
        if($(".ui-menu-item").is(":visible")){
            $("#show_return").html("Các bài hát liên quan được liệt kê bên dưới").css("color","green");
        }else{
            $("#show_return").html("Nhập tìm kiếm lại có thể có (lỗi này do người dùng nhập sai chính tả)").css("color","rgb(255, 122, 3)");
        }

        if($("#count_song").html()=="0"){
            $("#show_return").html("Không có bài hát trong danh sách").css("color","red");
        }
    }
    
    function check_key(){
        var cur_url="<?php echo $url;?>/app_my_girl_handling.php?func=check_music&key_word=";
        var key_value=$("#key_word").val();
        window.location=cur_url+key_value;
    }
    
    function search_gg(){
        var key_value=$("#key_word").val(); 
        var win = window.open("https://www.google.com/search?q="+key_value, '_blank');
        win.focus();
    }
    
    function search_yt(){
        var key_value=$("#key_word").val(); 
        var win = window.open("https://www.youtube.com/results?search_query="+key_value, '_blank');
        win.focus();
    }
    
    </script>
    
    <?php
    if($key_search!=''){
    echo '<table>';
    $arr_key=array();
    $list_country=mysqli_query($link,"SELECT `key` FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1'");
    $txt_query='';
    $txt_query_2='';
    $count_l=mysqli_num_rows($list_country);
    $count_index=0;

                 while($l=mysqli_fetch_array($list_country)){
                    $key=$l['key'];
                    $txt_query.="(SELECT `id`,`disable`,`text`,`chat`,`sex`,`character_sex`,`color`,`author`,`pater`,`id_redirect`,`tip`,`effect`,`ver`,`link`,`os_window`,`os_ios`,`os_android`,`file_url`,`limit_chat` FROM `app_my_girl_$key` WHERE  `chat` LIKE '%$key_search%' AND  `effect`='2' AND `disable` = '0' limit 21)";
                    $txt_query_2.=" (SELECT `id`,`disable`,`text`,`chat`,`sex`,`character_sex`,`color`,`author`,`pater`,`id_redirect`,`tip`,`effect`,`ver`,`link`,`os_window`,`os_ios`,`os_android`,`file_url`,`limit_chat` FROM `app_my_girl_$key` WHERE MATCH (`chat`) AGAINST ('$key_search' IN BOOLEAN MODE) AND  `effect`='2' AND `disable` = '0' limit 21)";
                    $count_index++;
                    if($count_index!=$count_l){
                        $txt_query.=" UNION ALL ";
                        $txt_query_2.=" UNION ALL ";
                    }
                 }
                 $result_tip=mysqli_query($link,$txt_query);
                if(mysqli_num_rows($result_tip)==0){
                    $result_tip=mysqli_query($link,$txt_query_2);
                }
                
                
            if(mysqli_num_rows($result_tip)>0){
                while($row_music=mysqli_fetch_array($result_tip)){
                    $count_error++;
                    array_push($arr_key,$row_music['chat']);
                    echo show_row_music($link,$row_music,$row_music['author']);
                }
            }
                
    ?>
    <script>
        arr_key=<?php echo json_encode($arr_key); ?>;
    </script>
    <?php
    echo '</table>';
        show_alert('Tìm thấy <span id="count_song">'.$count_error.'</span> dữ liệu có sẵn!','alert');
    }else{
        show_alert('Nhập dữ liệu tìm kiếm của bạn','info');
    }
?>