<?php
$lang='';
$limit_show=200;
$cur_url=$this->cur_url;
if(isset($_GET['lang'])) $lang=$_GET['lang'];
$list_lang=$this->get_list_lang();
echo '<div class="cms_menu_lang">';
for($i=0;$i<count($list_lang);$i++){
    $item_lang=$list_lang[$i];
    $key_lang=$item_lang['key'];
    $css_btn='';
    if($key_lang==$lang)$css_btn="blue";
    echo '<a href="'.$cur_url.'&lang='.$key_lang.'" class="buttonPro small '.$css_btn.'">('.$key_lang.') '.$item_lang['name'].'</a>';
}
echo '</div>';
echo '<div style="width:100%;float:left;">';
if($lang!=''){
    $files = glob('../../app_mygirl/app_my_girl_'.$lang.'_user/*');
    $total_records =count($files);
    $p_current_page=isset($_GET['p']) ? $_GET['p'] : 1;
    $p_total_page=ceil($total_records / $limit_show);
    $p_start=($p_current_page-1)*$limit_show;
    $p_end=$p_start+$limit_show;
    echo '<div class="cms_nav_page">';
    for($i=1;$i<=$p_total_page;$i++){
        if($i==$p_current_page)
            echo '<a href="'.$cur_url.'&lang='.$lang.'&p='.$i.'" class="btn gray">'.$i.'</a>';
        else
            echo '<a href="'.$cur_url.'&lang='.$lang.'&p='.$i.'" class="btn">'.$i.'</a>';
    }
    echo '</div>';

    for($i=$p_start;$i<$p_end;$i++) {
        $file=$files[$i];
        if (is_file($file)) {
            $url_img=str_replace('../../','',$file);
            $url_img=$this->url_carrot_store.'/'.$url_img;
            $url_img=$this->url_carrot_store.'/thumb.php?src='.$url_img.'&size=80';
            $id_user_file=str_replace(".png","",basename($file));
            echo '<a onclick="$(this).hide();" target="_blank" href="'.$this->url_carrot_store.'/app_mobile/carrot_framework/?function=show_user&user_id='.$id_user_file.'&user_lang='.$lang.'"><img  style="float:left;margin:5px;" src="'.$url_img.'"/></a>';
        }
    }

    echo '<div class="cms_nav_page">';
    for($i=1;$i<=$p_total_page;$i++){
        if($i==$p_current_page)
            echo '<a href="'.$cur_url.'&lang='.$lang.'&p='.$i.'" class="btn gray">'.$i.'</a>';
        else
            echo '<a href="'.$cur_url.'&lang='.$lang.'&p='.$i.'" class="btn">'.$i.'</a>';
    }
    echo '</div>';
}
echo '</div>';
?>
<script>
$("img").hover(function(){
    $(this).addClass("img_chek_user");
});
</script>