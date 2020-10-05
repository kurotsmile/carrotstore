<?php
$user_name=$_SESSION['login_user'];

include "page_template.php";
$sub_page='';
if(isset($_GET['sub_page'])){
    $sub_page=$_GET['sub_page'];
}
?>
<script>
$(document).ready(function(){
   $(".helps img").click(function(){
     var url_img=$(this).attr("url_img");
     $(this).attr("src",url_img);
     if($(this).hasClass("img")){
        $(this).removeClass("img");
     }else{
        $(this).addClass("img");
     }
   });

   $(".child_help").hide();

   $(".item_father").mouseover(function () {
        var index_id=$(this).attr("index_id");
        $(".child_"+index_id).show(500);
   });
});

function collect_menu(){
    $("#menu_help").toggle();
    if($("#menu_help").is(":visible")){
        $("#txt_menu_show").html("Thu nhỏ");
        $("#icon_menu_show").attr("class","fas fa-caret-square-up");
    }else{
        $("#txt_menu_show").html("Hiển thị");
        $("#icon_menu_show").attr("class","fas fa-caret-square-down");
    }
}
</script>

<div id="paged_contain" class="helps">
<br />
<p>
<h2>Hướng dẫn</h2>

<div class="help_item_father">
<strong class="title">Mục lục</strong>
<?php
$id_view='';
$txt_show_view_menu='';
if(isset($_GET['id'])){
    $id_view=$_GET['id'];
    $txt_show_view_menu='style="display:none"';
}

echo '<div>';
if($id_view!=''){
    echo '<span style="float:right;color:#5b7082;cursor: pointer;" onclick="collect_menu();return false;"><i id="icon_menu_show" class="fas fa-caret-square-up"></i> <b id="txt_menu_show"> Hiển thị</b></span>';
}
$query_help_father=mysqli_query($link,"SELECT `id`,`title` FROM `work_help` WHERE `father_id`=0 ORDER BY `orders`");
echo '<ul id="menu_help" '.$txt_show_view_menu.' >';
while($item_father=mysqli_fetch_assoc($query_help_father)){
    echo '<li class="item_father" index_id="'.$item_father['id'].'"><a href="'.$url.'/?page_show=help&id='.$item_father['id'].'">'.$item_father['title'].'</a></li>';
    $query_help_childs=mysqli_query($link,"SELECT `id`,`title` FROM `work_help` WHERE `father_id`=".$item_father['id']." ORDER BY `orders`");
    if(mysqli_num_rows($query_help_childs)>0){
        echo '<ul class="child_'.$item_father['id'].' child_help">';
        while($item_help_child=mysqli_fetch_assoc($query_help_childs)){
            echo '<li><a href="'.$url.'/?page_show=help&id='.$item_help_child['id'].'">'.$item_help_child['title'].'</a></li>';
            $query_help_childs2=mysqli_query($link,"SELECT `id`,`title` FROM `work_help` WHERE `father_id`=".$item_help_child['id']." ORDER BY `orders`");
            if(mysqli_num_rows($query_help_childs2)>0){
                echo '<ul>';
                while($item_help_child2=mysqli_fetch_assoc($query_help_childs2)){
                    echo '<li><a href="'.$url.'/?page_show=help&id='.$item_help_child2['id'].'">'.$item_help_child2['title'].'</a></li>';
                }
                echo '</ul>';
            }
        }
        echo '</ul>';
    }
}
echo '</ul>';
echo '</div>';
?>
<i style="margin-bottom: 10px;float: left;">(Tài liệu luôn trong quá trình cập nhật theo hệ thống nên một số phần chưa đầy đủ Và một số phần có hình ảnh thì nên bấm vào để xem chi tiết có ghi chú một số ý cụ thể)</i><br />
</div>
<?php

if($id_view!=''){
    function box_help($id_help,$title,$contain,$level=0,$user_role){
        $txt_class='help_item_child';
        $link_edit='';
        if($user_role=='admin'||$user_role=='leader'){
            $link_edit='<a href="'.URL.'/?page_show=manager_help&sub_show=add&id_edit='.$id_help.'"><i class="fas fa-edit"></i></a>';
        }
        if($level==0){
            $txt_class='help_item_father';
        }
        if($level==1){
            $txt_class='help_item_child';
        }
        if($level==2){
            $txt_class='help_item_child2';
        }
        echo '<div class="'.$txt_class.'">';
        echo '<div class="title">'.$title.' '.$link_edit.'</div>';
        if(file_exists('image_help/'.$id_help.'.png')){
            $help_url_image=URL.'/image_help/'.$id_help.'.png';
            echo '<img style="float:left;margin:15px;" class="img" url_img="'.$help_url_image.'" src="'.thumb_img($help_url_image,'300x150').'" />';
        }
        echo '<div class="contain">'.$contain.'</div>';
    }
    
    $query_help=mysqli_query($link,"SELECT * FROM `work_help` WHERE `id`=$id_view ORDER BY `orders`");
    while($item_help=mysqli_fetch_assoc($query_help)){
        box_help($item_help['id'],$item_help['title'],$item_help['contain'],0,$data_user['user_role']);
        $query_help_child=mysqli_query($link,"SELECT * FROM `work_help` WHERE `father_id`=".$item_help['id']." ORDER BY `orders`");
        while($item_help_child=mysqli_fetch_assoc($query_help_child)){
            box_help($item_help_child['id'],$item_help_child['title'],$item_help_child['contain'],1,$data_user['user_role']);
            $query_help_child2=mysqli_query($link,"SELECT `id`,`title`,`contain` FROM `work_help` WHERE `father_id`=".$item_help_child['id']." ORDER BY `orders`");
            while($item_help_child2=mysqli_fetch_assoc($query_help_child2)){
                box_help($item_help_child2['id'],$item_help_child2['title'],$item_help_child2['contain'],2,$data_user['user_role']);
                echo '</div>';
            }
            echo '</div>';
        }
        echo '</div>';
    }
    echo mysqli_error($link);
}


?>





</div>