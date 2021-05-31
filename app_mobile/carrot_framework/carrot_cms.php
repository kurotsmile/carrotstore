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

    function __construct($name_cms,$link_mysql,$path="")
    {
        session_start();
       $this->name=$name_cms;
       $this->link_mysql=$link_mysql;
       $this->path=$path;

       if(isset($_SESSION['path_cms'])){
            if($this->path!=$_SESSION['path_cms']){
                $this->user_login=null;
                $_GET['logout']=1;
            }else{
                if(isset($_SESSION['data_temp'])) $this->data_temp=$_SESSION['data_temp'];
            }
        }else{
            $_SESSION["path_cms"]=$path;
        }

        if(isset($_GET['cms_login'])){
            $cms_username=$_GET['cms_username'];
            $cms_password=$_GET['cms_password'];
            $query_user_login=mysqli_query($this->link_mysql,"SELECT `user_id`, `user_name`, `full_name` FROM carrotsy_work.`work_user` WHERE `user_name` = '$cms_username' AND `user_pass` = '$cms_password' LIMIT 1");
            $data_user_login=mysqli_fetch_assoc($query_user_login);
            if($data_user_login!=null){
                $this->user_login=$data_user_login;
                $_SESSION['user_login']=$this->user_login;
            }else{
                $this->msg_login_error="Đăng nhập thất bại!";
            }
        }

       if(isset($_GET['logout'])){
           $this->user_login=null;
           if(isset($_SESSION['user_login'])){ session_destroy();}
       }else{
            if(isset($_SESSION['user_login'])){
                $this->user_login=$_SESSION['user_login'];
            }
       }

    }

    public function add_css($name_file){
        array_push($this->css,$name_file);
    }

    private function html_head(){
        $html='<html>';
        $html.='<head>';
        $html.='<title>'.$this->name.'</title>';
        $html.='<meta charset="utf-8"/>';
        $html.='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        $html.='<link rel="stylesheet" href="'.$this->url_carrot_store.'/assets/css/font-awesome.min.css"/>';
        $html.='<link rel="stylesheet" href="'.$this->url_carrot_store.'/app_mobile/carrot_framework/css.css"/>';
        $html.='<link rel="stylesheet" type="text/css" href="'.$this->url_carrot_store.'/dist/sweetalert.min.css"/>';
        $html.='<link href="'.$this->url_carrot_store.'/assets/css/buttonPro.min.css" rel="stylesheet" />';
        for($i=0;$i<count($this->css);$i++)
        $html.='<link rel="stylesheet" href="'.$this->url.'/'.$this->css[$i].'"/>';
        $html.='<script src="'.$this->url_carrot_store.'/js/jquery.js"></script>';
        $html.='<script src="'.$this->url_carrot_store.'/dist/sweetalert.min.js"></script>';
        $html.='</head>';
        $html.='<body>';
        return $html;
    }

    private function msg($msg,$type='alert'){
        $html='<script>swal("'.$msg.'");</script>';
        return $html;
    }


    private function html_footer(){
        if($this->data_temp!=null) $_SESSION['data_temp']=$this->data_temp;
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
        $html_menu='<ul id="menu_cms">';
        for($i=0;$i<count($this->menu);$i++){
            $cms_menu=$this->menu[$i];
            $style_active="";
            if($sel_menu==$i) $style_active='class="active"';
            if($cms_menu->url=="")
                $html_menu.='<a href="'.$this->url.'/index.php?menu='.$i.'" '.$style_active.'><i class="fa '.$cms_menu->icon.'" aria-hidden="true"></i> '.$cms_menu->name.'</a>';
            else
                $html_menu.='<a href="'.$cms_menu->url.'" '.$style_active.'><i class="fa '.$cms_menu->icon.'" aria-hidden="true"></i> '.$cms_menu->name.'</a>';
        }
        $html_menu.='</ul>';
        return $html_menu;
    }

    private function show_menu_cms_other(){
        $html_menu='<ul id="menu_cms" style="background-color: antiquewhite;">';
        $html_menu.='<a href="'.$this->url_carrot_store.'/app_mobile/quick_eye"><i class="fa fa-empire" aria-hidden="true"></i> Quick Eye</a>';
        $html_menu.='<a href="'.$this->url_carrot_store.'/app_mobile/carrot_framework"><i class="fa fa-empire" aria-hidden="true"></i> Carrot Framework</a>';
        $html_menu.='<a href="'.$this->url_carrot_store.'/app_mobile/number_magic"><i class="fa fa-empire" aria-hidden="true"></i> Number Magic</a>';
        $html_menu.='<a href="'.$this->url_carrot_store.'/app_mobile/flower"><i class="fa fa-empire" aria-hidden="true"></i> Love Or No Love</a>';
        $html_menu.='<a href="'.$this->url_carrot_store.'/app_mobile/appai"><i class="fa fa-empire" aria-hidden="true"></i> App Ai</a>';
        $html_menu.='<a href="'.$this->url_carrot_store.'/app_mobile/jigsaw_wall"><i class="fa fa-empire" aria-hidden="true"></i> Jigsaw Wall</a>';
        $html_menu.='<a href="'.$this->url_carrot_store.'/app_mobile/bible"><i class="fa fa-empire" aria-hidden="true"></i> bible</a>';
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
        $query_country=mysqli_query($this->link_mysql,"SELECT `id`,`name`,`key` FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `ver0`=1");
        while($country=mysqli_fetch_assoc($query_country)){
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
        $html="<div id='cms_frm_login_area'>";
        $html.="<form id='cms_frm_login'>";
        $html.='<div class="frm_login_row" style="margin-top:20px;margin-bottom:20px;"><strong>'.$this->name.'</strong></div>';
        $html.='<div class="frm_login_row"><input name="cms_username" type="text"></div>';
        $html.='<div class="frm_login_row"><input name="cms_password" type="password"></div>';
        $html.='<div class="frm_login_row" style="margin-top:20px;margin-bottom:20px;"><input name="cms_login" class="btn" type="submit" value="Đăng nhập"></div>';
        if($this->msg_login_error!=null){ $html.=$this->msg_login_error;}
        $html.="</form>";
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

    private function show_setting(){
        include_once("a.php");
    }

    private function btn_function($name_function,$object_table,$id="",$filed_main=""){
        return $this->url."?function=$name_function&table=$object_table&id=$id&filed_main=$filed_main";
    }

    public function html_show(){

        $page_view='';if(isset($_GET['page'])) $page_view=$_GET['page'];if(isset($_POST['page'])) $page_view=$_POST['page'];
        $function='';if(isset($_GET['function'])) $function=$_GET['function'];if(isset($_POST['function'])) $function=$_POST['function'];

        echo $this->html_head();

        if($this->user_login==null){
            echo $this->show_login();
        }else{
            echo $this->show_menu_cms_other();
            
            $show_menu=0; if(isset($_GET['menu'])) $show_menu=$_GET['menu'];
            if($function!=''){$show_menu=-1;}else{ $this->cur_url=$this->url.'?menu='.$show_menu;}
            $this->add_menu_php_cms("Cài đặt","fa-sliders","a.php");
            $this->add_menu("Đăng xuất","fa-sign-out","",$this->url."?logout=1");
            echo $this->show_menu($show_menu);

            if($page_view!=''){
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