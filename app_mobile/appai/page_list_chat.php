<?php

class carrot_table{
    public $name;
    public $carrot_cms;
    public $cols=array();

    function __construct($name,$carrot_cms=null)
    {
        $this->name=$name;
        $this->carrot_cms=$carrot_cms;
        $this->cols=$this->carrot_cms->get_field_in_table($name);
    }

    public function delete_col($name_col)
    {
        for($i=0;$i<count($this->cols);$i++){
            if($this->cols[$i]==$name_col) array_splice($this->cols,$i,1);
        }
    }

    public function delete_field($name_field)
    {
        $this->delete_col($name_field);
    }

    function show(){
        $html="<table>";
        $html.="<tr>";
        foreach($this->cols as $c){
            $html.="<th>".$c."</th>";
        }
        $html.="</tr>";
        $query_list=$this->carrot_cms->q('SELECT * FROM `'.$this->name.'` ORDER BY `id` DESC LIMIT 50');
        while($r=mysqli_fetch_assoc($query_list)){
            $html.="<tr>";
            foreach($this->cols as $c){
                $html.="<td>".$r[$c]."</td>";
            }
            $html.="</tr>";
        }
        $html.="<table>";
        return $html;
    }
}

$lang="vi";if(isset($_REQUEST['lang'])) $lang=$_REQUEST['lang'];
$cr_chat=new carrot_table("app_my_girl_$lang",$this);
$cr_chat->delete_col("q1");
$cr_chat->delete_col("q2");
$cr_chat->delete_col("r1");
$cr_chat->delete_col("r2");
$cr_chat->delete_col("id_redirect");
$cr_chat->delete_col("author");
$cr_chat->delete_col("effect_customer");
$cr_chat->delete_col("slug");
$cr_chat->delete_col("action");
$cr_chat->delete_col("face");
$cr_chat->delete_col("status");
$cr_chat->delete_col("user_update");
$cr_chat->delete_col("os");

echo $this->show_list_lang();
echo $cr_chat->show();
echo $this->show_list_lang();
?>