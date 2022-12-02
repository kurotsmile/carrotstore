<?php

class carrot_field_val{
    public $val;
    public $label;
    public $icon_url;
}

class carrot_field{
    public $id="";
    public $title="";
    public $val="";
    public $vals=array();
    public $tip="&nbsp";
    public $tip_inp="";
    public $tip_label="";
    public $type="text";
    public $required=false;
    public $is_field_update=false;
    public $lang="";

    function carrot_field($id='inp'){
        $this->id=$id;
        $this->title=$id;
    }

    public function set_title($s_title){
        $this->title=$s_title;
    }

    public function set_tip($s_tip){
        $this->tip=$s_tip;
    }

    public function set_type($type){
        $this->type=$type;
    }

    public function set_required(){
        $this->required=true;
    }

    public function set_val($val){
        $this->val=$val;
    }

    public function set_label_tip($tip){
        $this->tip_label=$tip;
    }

    public function set_is_field_update(){
        $this->is_field_update=true;
    }

    public function set_lang($lang){
        $this->lang=$lang;
    }

    public function hide(){
        $this->set_type("hidden");
    }

    public function not_null(){
        $this->required=true;
    }

    public function add_val($val,$label='',$icon=''){
        $item_val=new carrot_field_val();
        if($label==''){
            $item_val->val=$val;
            $item_val->label=$val;
        }else{
            $item_val->val=$val;
            $item_val->label=$label;
            $item_val->icon_url=$icon;
        }
        array_push($this->vals,$item_val);
    }
}

class carrot_form{
    public $id;
    public $fields=array();
    public $title;
    public $method='post';

    private $field_update_id;
    private $field_update_data;
    private $table_mysql;
    private $database_mysql;
    private $carrot_cms;
    private $msg;
    private $rows=array();
    private $type="none";
    private $lang='en';

    function carrot_form($id='frm',$carrot_cms=null){
        $this->id=$id;
        $this->carrot_cms=$carrot_cms;
    }

    public function set_title($s_title){
        $this->title=$s_title;
    }

    public function add_field($field){
        array_push($this->fields,$field);
    }

    public function set_type($mode='edit'){
        $this->type=$mode;
    }

    public function set_lang($lang){
        $this->lang=$lang;
    }

    public function set_msg($s_msg){
        $this->msg=$s_msg;
    }

    public function paser_table_mysql($table_mysql,$data_default=null,$database=''){
        global $link;
        $this->table_mysql=$table_mysql;
        if($database!="")
            $this->database_mysql=$database;
        else
            $this->database_mysql=$this->carrot_cms->database_mysql;

        $query_field=mysqli_query($link,"SELECT `COLUMN_NAME` as 'name',`DATA_TYPE` as 'type'  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='".$this->table_mysql."' AND `TABLE_SCHEMA`='".$this->database_mysql."'");
            
        while($f=mysqli_fetch_assoc($query_field)){
            
            if($f["type"]=="text") $f["type"]="textarea";
            if($f["type"]=="int") $f["type"]="number";

            $field_table=new carrot_field($f["name"]);
            $field_table->set_title($f["name"]);
            $field_table->set_label_tip($f["name"]);
            $field_table->set_type($f["type"]);
            if($data_default!=null){
                $key_val=$f["name"];
                if(isset($data_default[$key_val])){
                    $field_table->set_val($data_default[$key_val]);
                }
            }
            $this->add_field($field_table);
        }
    }

    public function paser_data_mysql($data,$table_mysql=''){
        $this->paser_data($data);
        $this->table_mysql=$table_mysql;
    }

    public function paser_data($data){
        foreach($data as $k=>$v){
            $field_table=new carrot_field($k);
            $field_table->set_title($k);
            $field_table->set_label_tip($k);
            $field_table->set_val($v);
            $this->add_field($field_table);
        }
    }

    public function handle_post(){
        global $link;
        $data=$_POST;

        if(isset($_POST["field_update_id"])){
            $this->field_update_id=$data["field_update_id"];
            $this->field_update_data=$data["field_update_data"];
            $this->table_mysql=$data["table_mysql"];
            $this->database_mysql=$data["database_mysql"];
            unset($data["field_update_id"]);
            unset($data["field_update_data"]);
            unset($data["table_mysql"]);
            unset($data["database_mysql"]);
        }

        if(isset($data["frm_fnc_update"])){
            unset($data["frm_fnc_update"]);
            $sql_field="";
            $sql_where=" WHERE  ";
            foreach($data as $k=>$v){
                if($this->field_update_id==$k)
                    $sql_where.="  `".$k."`='".$v."'";
                else
                    $sql_field.=" `".$k."`='".$v."',";
            }
            $sql_field.=",";
            $sql_field=str_replace(",,","",$sql_field);
            $sql_command="UPDATE ".$this->database_mysql.".`".$this->table_mysql."` SET ".$sql_field." ".$sql_where;
            $sql_query=mysqli_query($link,$sql_command);
            if($sql_query)
                $this->msg="Cập nhật thành công!";
            else
                $this->msg=mysqli_error($link);
        }

        if(isset($data["frm_fnc_add"])){
            unset($data["frm_fnc_add"]);
            $sql_field="(";
            $sql_val="(";
            foreach($data as $k=>$v){
                $sql_val.=" '".$v."',";
                $sql_field.=" `".$k."`,";
            }
            $sql_field.=",";
            $sql_field=str_replace(",,","",$sql_field);
            $sql_field.=")";

            $sql_val.=",";
            $sql_val=str_replace(",,","",$sql_val);
            $sql_val.=")";

            $sql_command="INSERT INTO ".$this->database_mysql.".`".$this->table_mysql."` $sql_field VALUES $sql_val";
            $sql_query=mysqli_query($link,$sql_command);
            if($sql_query)
                $this->msg="Thêm mới thành công!";
            else
                $this->msg=mysqli_error($link);
        }
    }

    public function get_field_by_id($id){
        for($i=0;$i<count($this->fields);$i++){
            if($this->fields[$i]->id==$id) return $this->fields[$i];
        }
    }

    public function delete_field_by_id($id){
        for($i=0;$i<count($this->fields);$i++){
            if(isset($this->fields[$i])) if($this->fields[$i]->id==$id) array_splice($this->fields,$i,1);
        }
    }

    public function add_row($col_left,$col_right,$class=''){
        $html="<div class='form_row $class'>";

        $html.="<div class='form_col col4'>";
        $html.=$col_left;
        $html.="</div>";

        $html.="<div class='form_col col8'>";
        $html.=$col_right;
        $html.="</div>";

        $html.="</div>";
        array_push($this->rows,$html);
    }

    public function show(){
        global $url_carrot_store;
        $html="<link rel='stylesheet' href='".$url_carrot_store."/app_mobile/carrot_framework/carrot.form.css'/>";
        $html.="<form class='carrot_form' method='post' id='".$this->id."' enctype='multipart/form-data'>";
        $html.="<fieldset>";
        $html.="<legend> <i class='fa fa-braille'></i> ".$this->id." </legend>";
        
        if($this->title!=""){
            $html.="<div class='form_title'>";
            $html.=$this->title;
            $html.="</div>";
        }

        if($this->msg!=""){
            $html.="<div class='form_alert'>";
            $html.='<i class="fa fa-exclamation-circle" aria-hidden="true"></i> '.$this->msg;
            $html.="</div>";
        }

        $html.="<div class='form_contain'>";
        for($i=0;$i<count($this->fields);$i++){
            if(!isset($this->fields[$i])) continue;
            $f=$this->fields[$i];
            $emp_required='';

            if($f->required) $emp_required='required';

            $html_col_left="<label for='".$f->id."'>".$f->title."</label>";
            if($f->tip_label!='') $html_col_left.=" <span class='tip_label'>(".$f->tip_label.")</span>";

            $html_col_right="";
            
            if(!$f->is_field_update){
                if($f->type=='text'||$f->type=='inp'||$f->type=='varchar'){
                    $html_col_right.="<div class='col10'>";
                    $html_col_right.="<input ".$emp_required." id='".$f->id."' name='".$f->id."' type='text' value='".$f->val."'/>";
                    $html_col_right.="</div>";

                    $html_col_right.="<div class='col2'>";
                    $html_col_right.=$this->carrot_cms->cp($f->id);
                    if($f->lang!='') $html_col_right.=$this->carrot_cms->tr($f->id,$f->lang);
                    $html_col_right.="</div>";
                }else if($f->type=='select'||$f->type=='dropdown'||$f->type=='sel'){
                    $html_col_right.="<select name='".$f->id."' id='".$f->id."'>";
                    for($y=0;$y<count($f->vals);$y++){
                        $v=$f->vals[$y];
                        if($f->val==$v->val)
                            $html_col_right.="<option value='".$v->val."' selected>".$v->label."</option>";
                        else
                            $html_col_right.="<option value='".$v->val."'>".$v->label."</option>";
                    }
                    $html_col_right.="</select>";
                }else if($f->type=='textarea'){
                    $html_col_right.="<div class='col10'>";
                    $html_col_right.="<textarea name='".$f->id."' id='".$f->id."' ".$emp_required.">";
                    $html_col_right.=$f->val;
                    $html_col_right.="</textarea>";
                    $html_col_right.="</div>";

                    $html_col_right.="<div class='col2'>";
                    $html_col_right.=$this->carrot_cms->cp($f->id);
                    if($f->lang!='') $html_col_right.=$this->carrot_cms->tr($f->id,$f->lang);
                    $html_col_right.="</div>";
                }else if($f->type=='color'){
                    $html_col_right.="<div class='col12' >";
                    $html_col_right.="<div class='col8 cr_field_color' >";
                    for($y=0;$y<count($f->vals);$y++){
                        $v=$f->vals[$y];
                        if($y==0&&$f->val==""){
                            $html_col_right.="<div class='item_color select' style='background-color: ".$v->val.";'>".$v->val."</div>";
                            $f->set_val($v->val);
                        }
                        else if($f->val==$v->val)
                            $html_col_right.="<div class='item_color select' style='background-color: ".$v->val.";'>".$v->val."</div>";
                        else
                            $html_col_right.="<div class='item_color' style='background-color: ".$v->val.";'>".$v->val."</div>";
                    }
                    $html_col_right.="</div>";

                    $html_col_right.="<div class='col4'>";
                    $html_col_right.="<input ".$emp_required." id='".$f->id."' name='".$f->id."' type='text' value='".$f->val."'/>";
                    $html_col_right.="</div>";
                    $html_col_right.="<script>";
                    $html_col_right.='$(".item_color").click(function(){$(".item_color").removeClass("select");$("#'.$f->id.'").val($(this).html());$(this).addClass("select");});';
                    $html_col_right.="</script>";
                    $html_col_right.="</div>";
                }else if($f->type=='radio'){
                    $html_col_right.="<div class='col12 cr_field_radio'>";
                    for($y=0;$y<count($f->vals);$y++){
                        $v=$f->vals[$y];
                        if($y==0&&$f->val=="")
                            $html_col_right.='<div class="item_radio"><input type="radio" id="'.$f->id.'_'.$v->val.'" name="'.$f->id.'" value="'.$v->val.'" checked /><label for="'.$f->id.'_'.$v->val.'">'.$v->label.'</label></div>';
                        else if($f->val==$v->val)
                            $html_col_right.='<div class="item_radio"><input type="radio" id="'.$f->id.'_'.$v->val.'" name="'.$f->id.'" value="'.$v->val.'" checked /><label for="'.$f->id.'_'.$v->val.'">'.$v->label.'</label></div>';
                        else
                            $html_col_right.='<div class="item_radio"><input type="radio" id="'.$f->id.'_'.$v->val.'" name="'.$f->id.'" value="'.$v->val.'"/><label for="'.$f->id.'_'.$v->val.'">'.$v->label.'</label></div>';
                    }
                    $html_col_right.="</div>";
                }else if($f->type=='select-img'||$f->type=='list-img'||$f->type=='imgs'){
                    $html_col_right.="<div class='col12 cr_field_listimg'>";
                    for($y=0;$y<count($f->vals);$y++){
                        $v=$f->vals[$y];
                        if($y==0&&$f->val=="")
                            $html_col_right.='<div class="item_listimg select item_'.$f->id.'" val="'.$v->val.'"><img src="'.$this->carrot_cms->thumb($v->icon_url,'60x60').'"/><span>'.$v->label.'</span></div>';
                        else if($f->val==$v->val)
                            $html_col_right.='<div class="item_listimg select item_'.$f->id.'" val="'.$v->val.'"><img src="'.$this->carrot_cms->thumb($v->icon_url,'60x60').'"/><span>'.$v->label.'</span></div>';
                        else
                            $html_col_right.='<div class="item_listimg item_'.$f->id.'" val="'.$v->val.'"><img src="'.$this->carrot_cms->thumb($v->icon_url,'60x60').'"/><span>'.$v->label.'</span></div>';
                    }
                    
                    $html_col_right.="<input id='".$f->id."' name='".$f->id."' type='hidden' value='".$f->val."'/>";
                    $html_col_right.="<script>";
                    $html_col_right.='$(".item_'.$f->id.'").click(function(){$(".item_'.$f->id.'").removeClass("select");$("#'.$f->id.'").val($(this).attr("val"));$(this).addClass("select");});';
                    $html_col_right.="</script>";

                    $html_col_right.="</div>";
                }else if($f->type=='user'){

                    $html_col_right.="<div class='col12 cr_field_listuser'>";

                    if($f->val==''){
                        $f->add_val('b3ee82bafceb3b5fc20824146b44ff2a','vi');
                        $f->add_val('5ea856e920bd55ea856e920c10','en');
                    }else{
                        $f->add_val($f->val,$f->lang);
                    }

                    for($y=0;$y<count($f->vals);$y++){
                        $v=$f->vals[$y];
                        $url_avatar=$this->carrot_cms->url_carrot_store."/app_mygirl/app_my_girl_".$v->label."_user/".$v->val.".png";
                        if($this->carrot_cms->url_exists($url_avatar)) 
                            $url_avatar=$this->carrot_cms->thumb("/app_mygirl/app_my_girl_".$v->label."_user/".$v->val.".png",'60x60');
                        else
                            $url_avatar=$this->carrot_cms->thumb("/images/avatar_boy.jpg",'60x60');

                        if($y==0&&$f->val==""){
                            $html_col_right.='<div class="item_user select item_'.$f->id.'" val="'.$v->val.'"><img src="'.$url_avatar.'"/> '.$this->carrot_cms->user($v->val,$v->label).'</div>';
                            $f->set_val($v->val);
                        }
                        else if($f->val==$v->val)
                            $html_col_right.='<div class="item_user select item_'.$f->id.'" val="'.$v->val.'"><img src="'.$url_avatar.'"/> '.$this->carrot_cms->user($v->val,$v->label).'</div>';
                        else
                            $html_col_right.='<div class="item_user item_'.$f->id.'" val="'.$v->val.'"><img src="'.$url_avatar.'"/> '.$this->carrot_cms->user($v->val,$v->label).'</div>';
                    }

                    $html_col_right.="<script>";
                    $html_col_right.='$(".item_'.$f->id.'").click(function(){$(".item_'.$f->id.'").removeClass("select");$("#'.$f->id.'").val($(this).attr("val"));$(this).addClass("select");});';
                    $html_col_right.="</script>";
                    $html_col_right.="<input id='".$f->id."' name='".$f->id."' type='hidden' value='".$f->val."'/>";
                    $html_col_right.="</div>";
                }else if($f->type=='file'){
                    $html_col_right.="<div class='col12 cr_field_listuser'>";
                    $html_col_right.='<input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">';
                    $html_col_right.="</div>";
                }else{
                    if($f->type!="hidden") $html_col_right.="<div class='col10'>";
                    $html_col_right.="<input ".$emp_required." id='".$f->id."' name='".$f->id."' type='".$f->type."' value='".$f->val."'/>";
                    if($f->type!="hidden") $html_col_right.="</div>";

                    if($f->type!="hidden"){
                        $html_col_right.="<div class='col2'>";
                        if($this->carrot_cms!=null) $html_col_right.=$this->carrot_cms->cp($f->id);
                        $html_col_right.="</div>";
                    }
                }
            }else{
                if($f->val!="")
                    $html_col_right.=$f->val;
                else
                    $html_col_right.="<i class='fa fa-magic' aria-hidden='true'></i> Tự động tạo mới!";

                $html_col_right.="<input id='".$f->id."' name='".$f->id."' type='hidden' value='".$f->val."'/>";
                $this->field_update_id=$f->id;
                $this->field_update_data=$f->val;
            }

            $this->add_row($html_col_left,$html_col_right);
            if($f->tip!='&nbsp') $this->add_row("&nbsp",$f->tip,'tip');
        }

        for($i=0;$i<count($this->rows);$i++) $html.=$this->rows[$i];

        if($this->type!="none"){
            $html.="<div class='form_row'>";
            $html.="<div class='form_col col12'>";
    
            if($this->type=="edit"||$this->type=="update") $html.="<button name='frm_fnc_update' class='buttonPro yellow btn_submit large' type='submit' form='".$this->id."' value='Submit'>Cập nhật</button>";
            if($this->type=="add") $html.="<button name='frm_fnc_add' class='buttonPro green btn_submit large' type='submit' form='".$this->id."' value='Submit'>Thêm mới</button>";
    
            $html.="<input name='field_update_data' type='hidden' value='".$this->field_update_data."'/>";
            $html.="<input name='field_update_id' type='hidden' value='".$this->field_update_id."'/>";
            $html.="<input name='table_mysql' type='hidden' value='".$this->table_mysql."'/>";
            $html.="<input name='database_mysql' type='hidden' value='".$this->database_mysql."'/>";
            $html.="</div>";
            $html.="</div>";
        }
        $html.="</div>";
        $html.="</fieldset>";
        $html.="</form>";
        return $html;
    }
}
?>