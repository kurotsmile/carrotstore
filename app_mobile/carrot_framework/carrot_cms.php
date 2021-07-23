<?php
class Carrot_CMS{
    public $url="";
    public $url_carrot_store="";
    public $name="Name App";
    public $link_mysql="";
    public $database_mysql="";

    private $menu=array();
    private $user_login=null;
    private $msg_login_error;
    private $data_temp;
    private $path;
    private $cur_url;
    private $css=array();
    private $icon;

    function __construct($name_cms,$link_mysql,$path="")
    {
        session_start();
        $this->name=$name_cms;
        $this->link_mysql=$link_mysql;
        $this->path=$path;

        if(isset($_SESSION['data_temp'.$this->name])) $this->data_temp=$_SESSION['data_temp'.$this->name];

        if(isset($_GET['cms_login'])){
            $cms_username=$_GET['cms_username'];
            $cms_password=$_GET['cms_password'];
            $query_user_login=mysqli_query($this->link_mysql,"SELECT `user_id`, `user_name`, `full_name` FROM carrotsy_work.`work_user` WHERE `user_name` = '$cms_username' AND `user_pass` = '$cms_password' LIMIT 1");
            $data_user_login=mysqli_fetch_assoc($query_user_login);
            if($data_user_login!=null){
                $this->user_login=$data_user_login;
                $_SESSION['user_login']=$this->user_login;
                $id_user_login=$data_user_login['user_id'];
                $this->q("UPDATE carrotsy_work.`work_user` SET `time_login` = NOW() WHERE `user_id` = '$id_user_login';");
                if(isset($_SESSION['cur_url'])){
                    $this->cur_url=$_SESSION['cur_url'];
                    header("Location:".$this->cur_url);
                }
                
            }else{
                $this->msg_login_error="Đăng nhập thất bại!";
            }
        }

       if(isset($_GET['logout'])){
           $this->user_login=null;
           $this->data_temp=null;
           if(isset($_SESSION['user_login']))session_destroy();
       }else{
            if(isset($_SESSION['user_login'])){
                $this->user_login=$_SESSION['user_login'];
            }
            else{
                $_SESSION['cur_url']=(isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']==='on'?"https":"http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            }
       }

    }

    private function show_menu_cms(){
        $html_menu='<ul id="menu_cms" class="top" style="background-color: antiquewhite;">';
        $list_app=$this->q("SELECT `name`, `folder`, `id` FROM carrotsy_work.`work_app` WHERE `folder`!='' ORDER BY `order`");
        while($app=mysqli_fetch_assoc($list_app)){
            $txt_style='';
            if($app['name']==$this->name) $txt_style='class="active"';
            $html_menu.='<a href="'.$this->url_carrot_store.'/app_mobile/'.$app['folder'].'" '.$txt_style.' ><i class="fa fa-empire" aria-hidden="true"></i> '.$app['name'].'</a>';
        }
        $html_menu.='</ul>';
        return $html_menu;
    }

    public function add_css($name_file){
        array_push($this->css,$name_file);
    }

    private function q($string_query){
        return mysqli_query($this->link_mysql,$string_query);
    }

    private function q_data($string_query){
        $q=$this->q($string_query);
        if($q) return mysqli_fetch_assoc($q);
        else return null;
    }

    private function html_head(){
        $html='<html>';
        $html.='<head>';
        $html.='<title>'.$this->name.'</title>';
        $html.='<meta charset="utf-8"/>';
        $html.='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        if($this->icon=="")
            $html.='<link rel="icon" href="'.$this->url_carrot_store.'/app_mobile/carrot_framework/icon.ico"/>';
        else
            $html.='<link rel="icon" href="'.$this->url.'/'.$this->icon.'"/>';
        $html.='<link rel="stylesheet" href="'.$this->url_carrot_store.'/assets/css/font-awesome.min.css"/>';
        $html.='<link rel="stylesheet" href="'.$this->url_carrot_store.'/app_mobile/carrot_framework/css.css"/>';
        $html.='<link rel="stylesheet" type="text/css" href="'.$this->url_carrot_store.'/dist/sweetalert.min.css"/>';
        $html.='<link href="'.$this->url_carrot_store.'/assets/css/buttonPro.min.css" rel="stylesheet" />';
        for($i=0;$i<count($this->css);$i++)
        $html.='<link rel="stylesheet" href="'.$this->url.'/'.$this->css[$i].'"/>';
        $html.='<script src="'.$this->url_carrot_store.'/js/jquery.js"></script>';
        $html.='<script src="'.$this->url_carrot_store.'/dist/sweetalert.min.js"></script>';
        $html.='<script>function copy_tag(name_tag) {var $temp = $("<input>");$("body").append($temp);var s_copy=$("#" + name_tag).val();s_copy=s_copy.replace("{ten_user}", "");$temp.val(s_copy).select();document.execCommand("copy");$temp.remove();}';
        $html.='function paste_tag(name_tag) {navigator.clipboard.readText().then(text => {$("#"+name_tag).val(text.trim());});}';
        $html.='</script>';
        $html.='</head>';
        $html.='<body>';
        return $html;
    }

    public function set_icon($name_file_icon){
        $this->icon=$name_file_icon;
    }

    private function copy($emp){
        return '<div class="buttonPro small" onclick="copy_tag(\''.$emp.'\');$(this).addClass(\'blue\')"><i class="fa fa-files-o" aria-hidden="true"></i></div>';
    }

    private function paste($emp){
        return '<div class="buttonPro small" onclick="paste_tag(\''.$emp.'\');$(this).addClass(\'yellow\')"><i class="fa fa-paste" aria-hidden="true"></i></div>';
    }

    private function cp($emp){
        return $this->copy($emp).''.$this->paste($emp);
    }

    private function thumb($url,$size){
        return $this->url_carrot_store.'/thumb.php?src='.$this->url_carrot_store.'/'.$url.'&size='.$size;
    }

    private function user($user_id,$user_lang){
        $user_name='<i class="fa fa-user" aria-hidden="true"></i>';
        if($user_id!=""){
            $data_user=$this->q_data("SELECT `name`,`sex` FROM carrotsy_virtuallover.`app_my_girl_user_$user_lang` WHERE `id_device` = '$user_id' LIMIT 1");
            if($data_user!=null){
                if($data_user['sex']=='0')
                    $user_name='<i class="fa fa-male" aria-hidden="true"></i> '.$data_user['name'];
                else
                    $user_name='<i class="fa fa-female" aria-hidden="true"></i> '.$data_user['name'];
            }
        }
        return '<a onclick="$(this).addClass(\'blue\');" target="_blank" href="'.$this->url.'?function=show_user&user_id='.$user_id.'&user_lang='.$user_lang.'" class="buttonPro small">'.$user_name.'</a>';
    }

    private $p_total_page=0;
    private $p_current_page=1;
    private $p_start=0;
    private $p_limit=0;

    public function setup_page($name_table,$where=''){
        $this->p_limit=50;
        $data_count=$this->q_data("SELECT COUNT(*) as c FROM `$name_table` $where LIMIT 1");
        $total_records =intval($data_count['c']);
        $this->p_current_page=isset($_GET['p']) ? $_GET['p'] : 1;
        $this->p_total_page=ceil($total_records / $this->p_limit);
        if ($this->p_current_page > $this->p_total_page) {$this->p_current_page=$this->p_total_page;}else if($this->p_current_page < 1){$this->p_current_page=1;}
        $this->p_start=($this->p_current_page-1)*$this->p_limit;
    }

    public function show_page_nav($url_cur=''){
        $html='';
        if($url_cur=='') $url_cur=$this->cur_url;
        if($this->p_total_page>1){
            $html='<div class="cms_nav_page">';
            $html.='<a href="#" class="btn">Trang : </a>';
            for($i=1;$i<=$this->p_total_page;$i++){
                if($i==$this->p_current_page)
                    $html.='<a href="'.$url_cur.'&p='.$i.'" class="btn gray">'.$i.'</a>';
                else
                    $html.='<a href="'.$url_cur.'&p='.$i.'" class="btn">'.$i.'</a>';
            }
            $html.='</div>';
        }
        return $html;
    }

    public function show_user(){
        include_once("carrot_cms_user.php");
    }

    private function msg($msg,$type='alert'){
        $html='<script>swal("'.$msg.'");</script>';
        return $html;
    }

    public function ajax($data,$out=''){
        $html='';
        $html.='$.ajax({url:"'.$this->url.'/index.php?ajax=1",type:"post",data:{'.$data.'}, success: function(data, textStatus, jqXHR){';
        if($out=='')$html.='swal(data);';
        else $html.=$out;
        $html.='}});';
        return $html;
    }

    private function html_footer(){
        if($this->data_temp!=null) $_SESSION['data_temp'.$this->name]=$this->data_temp;
        $html='<body>';
        $html.='<html>';
        return $html;
    }

    function add_menu($name_menu,$menu_icon="",$menu_tabel="",$url="",$function_cms="",$page_php="",$php_cms=""){ 
        $menu_cms=new stdClass();
        $menu_cms->{"name"}=$name_menu;
        if($menu_icon=="") $menu_cms->{"icon"}="fa-link"; else $menu_cms->{"icon"}=$menu_icon;
        if($url!="") $menu_cms->{"url"}=$url; else $menu_cms->{"url"}=""; 
        $menu_cms->{"tabel"}=$menu_tabel;
        $menu_cms->{"function"}=$function_cms;
        $menu_cms->{"php"}=$page_php;
        $menu_cms->{"php_cms"}=$php_cms;
        array_push($this->menu,$menu_cms);
    }

    function add_menu_link($name_menu,$menu_icon="",$url=""){$this->add_menu($name_menu,$menu_icon,"",$url);}
    function add_menu_table($name_menu,$menu_icon="",$name_table){$this->add_menu($name_menu,$menu_icon,$name_table,"");}
    function add_menu_function($name_menu,$menu_icon="",$data_function){$this->add_menu($name_menu,$menu_icon,"","",$data_function);}
    function add_menu_page($name_menu,$menu_icon="",$php_file){$this->add_menu($name_menu,$menu_icon,"","","",$php_file);}
    function add_menu_php($name_menu,$menu_icon="",$php_file){$this->add_menu($name_menu,$menu_icon,"","","",$php_file);}
    function add_menu_php_cms($name_menu,$menu_icon="",$php_file){$this->add_menu($name_menu,$menu_icon,"","","","",$php_file);}

    private function show_menu($sel_menu){
        $html_menu='<ul id="menu_cms" class="menu">';
        for($i=0;$i<count($this->menu);$i++){
            $cms_menu=$this->menu[$i];
            $style_active="";
            if($sel_menu==$i) $style_active='class="active"';
            if($cms_menu->url=="")
                $html_menu.='<a href="'.$this->url.'/index.php?menu='.$i.'" '.$style_active.'><i class="fa '.$cms_menu->icon.'" aria-hidden="true"></i> '.$cms_menu->name.'</a>';
            else{
                if($cms_menu->icon=="fa-sign-out")
                    $html_menu.='<a href="'.$cms_menu->url.'" '.$style_active.' class="logout"><i class="fa '.$cms_menu->icon.'" aria-hidden="true"></i> '.$cms_menu->name.'</a>';
                else
                    $html_menu.='<a href="'.$cms_menu->url.'" '.$style_active.'><i class="fa '.$cms_menu->icon.'" aria-hidden="true"></i> '.$cms_menu->name.'</a>';
            }
        }
        $html_menu.='</ul>';
        return $html_menu;
    }

    private function get_field_in_table($name_table){
        $array_field=array();
        $query_field=mysqli_query($this->link_mysql,"SELECT `COLUMN_NAME` FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$name_table' AND `TABLE_SCHEMA`='".$this->database_mysql."'");
        while($field_data=mysqli_fetch_assoc($query_field)){
           array_push($array_field,$field_data['COLUMN_NAME']);
        }
        return $array_field;
    }

    private function get_list_lang(){
        $list_lang=array();
        $query_country=mysqli_query($this->link_mysql,"SELECT `id`,`name`,`key` FROM carrotsy_virtuallover.`app_my_girl_country` ");
        while($country=mysqli_fetch_assoc($query_country)){
            $country["icon"]=$this->url_carrot_store.'/thumb.php?src='.$this->url_carrot_store.'/app_mygirl/img/'.$country['key'].'.png&size=30&trim=1';
            array_push($list_lang,$country);
        }
        return $list_lang;
    }

    private function show_lang($data_page){
        include_once("carrot_cms_lang.php");
    }

    private function show_setting_lang_by_field(){
        include_once("carrot_cms_lang_field.php");
    }

    public function html_table($name_table){
        include_once("carrot_cms_table.php");
    }
    
    public function show_login(){
        $data_bk=$this->q_data("SELECT `id` FROM carrotsy_virtuallover.`app_my_girl_background` ORDER BY RAND() LIMIT 1");
        $id_bk=$data_bk['id'];
        $html="<style>#menu_cms.top{z-index: 500;position: absolute;}</style><div id='bk_blur'></div><div id='cms_frm_login_area' style='background-image: url(".$this->url_carrot_store."/app_mygirl/obj_background/icon_$id_bk.png);'>";
        $html.="<form id='cms_frm_login'>";
        $html.="<img id='logo_carrot' src='".$this->url_carrot_store."/images/logo.png' />";
        $html.='<div class="frm_login_row" style="margin-top:20px;margin-bottom:20px;"><strong>'.$this->name.'</strong></div>';
        $html.='<div class="frm_login_row"><i class="fa fa-user-circle-o" aria-hidden="true"></i><input name="cms_username" type="text" id="lg_user"></div>';
        $html.='<div class="frm_login_row" style="margin-top:10px;"><i class="fa fa-key" aria-hidden="true"></i><input name="cms_password" id="lg_password" type="password"></div>';
        $html.='<div class="frm_login_row" style="margin-top:10px;margin-bottom:20px;"><input name="cms_login" class="buttonPro blue" type="submit" value="Đăng nhập"></div>';
        if($this->msg_login_error!=null){ $html.=$this->msg($this->msg_login_error);}
        $html.="</form>";
        $html.='<a id="btn_edit_bk" href="'.$this->url_carrot_store.'/app_my_girl_background.php?edit='.$id_bk.'" target="_blank"><i class="fa fa-picture-o" aria-hidden="true"></i></a>';
        $html.="</div>";
        return $html;
    }

    public function add_obj(){
        $html='';
        $table=$_GET['table'];
        $arr_field=$this->get_field_in_table($table);

        if(isset($_POST['status_act'])){
            $table=$_POST['table'];
            $arr_field=$this->get_field_in_table($table);
            $data_new=$_POST;
            $txt_add_key="";
            $txt_add_val=""; 
            for($i=0;$i<count($arr_field);$i++){
                $key_field=$arr_field[$i];
                $val_field=$data_new[$key_field];
                if($val_field!=''){
                    $txt_add_key.="`$key_field`,";
                    $txt_add_val.="'$val_field',";
                }
            }
            $txt_add_key=substr($txt_add_key,0,strlen($txt_add_key)-1);
            $txt_add_val=substr($txt_add_val,0,strlen($txt_add_val)-1);
            echo "Add key:$txt_add_key<br/>";
            echo "Add key:$txt_add_val<br/>";
            $query_add_obj=mysqli_query($this->link_mysql,"INSERT INTO `$table` (".$txt_add_key.") VALUES (".$txt_add_val.");");
            if($query_add_obj)$html.="Thêm mới thành công!";
            else $html.="Lỗi:".mysqli_error($this->link_mysql);
        }

        $html.='<form id="add_obj" method="post"><table>';
        for($i=0;$i<count($arr_field);$i++){
            $html.='<tr>';
            $html.='<td>'.$arr_field[$i].'</td>';
            $html.='<td><input name="'.$arr_field[$i].'" value=""/></td>';
            $html.='</tr>';
        }
        $html.='</table>';
        $html.='<input type="hidden" name="table" value="'.$table.'"/>';
        $html.='<input type="hidden" name="function" value="add_obj"/>';
        $html.='<input type="hidden" name="status_act" value="0"/>';
        $html.='<button class="buttonPro"><i class="fa fa-plus-square" aria-hidden="true"></i> Hoàn tất</button></form>';
        return $html;
    }

    public function edit_obj(){
        $id=$_GET['id'];
        $filed_main=$_GET['filed_main'];
        $table=$_GET['table'];
        $data_obj=mysqli_fetch_assoc(mysqli_query($this->link_mysql,"SELECT * FROM `$table` WHERE `$filed_main` = '$id' LIMIT 1"));

        if(isset($_GET['status_act'])){
            $arr_field=$this->get_field_in_table($table);
            $data_new=$_GET;
            $txt_set_data="";
            for($i=0;$i<count($arr_field);$i++){
                $key_field=$arr_field[$i];
                $val_field=$data_new[$key_field];
                $txt_set_data.=" `$key_field`='$val_field',";
            }
            $txt_set_data=substr($txt_set_data,0,strlen($txt_set_data)-1);
            $query_update_obj=mysqli_query($this->link_mysql,"UPDATE `$table` SET $txt_set_data WHERE `$filed_main`='$id' LIMIT 1");
            echo mysqli_error($this->link_mysql);
            $data_obj=$data_new;
        }else{
            $data_obj=mysqli_fetch_assoc(mysqli_query($this->link_mysql,"SELECT * FROM `$table` WHERE `$filed_main` = '$id' LIMIT 1"));
        }

        if($data_obj!=null){
            $arr_field=$this->get_field_in_table($table);
            $html='<form id="add_obj"><table>';
            for($i=0;$i<count($arr_field);$i++){
                $key_field=$arr_field[$i];
                $html.='<tr>';
                $html.='<td>'.$arr_field[$i].'</td>';
                $html.='<td><input name="'.$arr_field[$i].'" value="'.$data_obj[$key_field].'"/></td>';
                $html.='</tr>';
            }
            $html.='</table>';
            $html.='<input type="hidden" name="table" value="'.$table.'"/>';
            $html.='<input type="hidden" name="function" value="edit_obj"/>';
            $html.='<input type="hidden" name="id" value="'.$id.'"/>';
            $html.='<input type="hidden" name="filed_main" value="'.$filed_main.'"/>';
            $html.='<input type="hidden" name="status_act" value="0"/>';
            $html.='<button class="btn"><i class="fa fa-plus-square" aria-hidden="true"></i> Hoàn tất</button></form>';
        }else{
            $html="Đối tượng không còn tồn tại!";
        }
        return $html;
    }

    private function delete_obj(){
        $id=$_GET['id'];
        $filed_main=$_GET['filed_main'];
        $table=$_GET['table'];
        $query_delete_obj=mysqli_query($this->link_mysql,"DELETE FROM `$table` WHERE `$filed_main` = '$id' LIMIT 1;");
        if($query_delete_obj)
            echo "Delete Obj Success!";
        else
            echo "Delete Obj fail!";
    }

    private function btn_function($name_function,$object_table,$id="",$filed_main=""){
        return $this->url."?function=$name_function&table=$object_table&id=$id&filed_main=$filed_main";
    }

    public function html_show(){
        if(isset($_GET['ajax'])){include_once("ajax.php");exit;}
        $page_view='';if(isset($_GET['page'])) $page_view=$_GET['page'];if(isset($_POST['page'])) $page_view=$_POST['page'];
        $function='';if(isset($_GET['function'])) $function=$_GET['function'];if(isset($_POST['function'])) $function=$_POST['function'];

        echo $this->html_head();
        echo $this->show_menu_cms();
        if($this->user_login==null){
            echo $this->show_login();
        }else{
            $show_menu=0; if(isset($_GET['menu'])) $show_menu=$_GET['menu'];
            if($function!=''){$show_menu=-1;}else{ $this->cur_url=$this->url.'?menu='.$show_menu;}
            $this->add_menu_php_cms("Công cụ","fa-sliders","carrot_cms_tool.php");
            $this->add_menu("Đăng xuất","fa-sign-out","",$this->url."?logout=1");
            echo $this->show_menu($show_menu);

            if($page_view!=''){
                $this->cur_url=$this->url.'?page='.$page_view;
                include_once('page_'.$page_view.'.php');
            }else{
                if($function!=''){
                    echo $this->{$function}();
                }else{
                    $cms_menu=$this->menu[$show_menu];
                    if($cms_menu->tabel!="") echo $this->html_table($cms_menu->tabel);
                    if($cms_menu->function!=""){
                        $data_function=json_decode($cms_menu->function);
                        $call_func=$data_function->function;
                        $this->{$call_func}($data_function);
                    }
                    if($cms_menu->php!="") include_once($this->path.'/'.$cms_menu->php);
                    if($cms_menu->php_cms!="") include_once($cms_menu->php_cms);
                }
            }
        } 

        echo $this->html_footer();
    }
}
?>