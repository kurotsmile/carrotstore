<script src="<?php echo $url; ?>/dist/sweetalert.min.js"></script> 
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/dist/sweetalert.css"/>
<style>
    .box_pater_row{
        float: left;
        width:90%;
        padding: 8px;
        background-color: #BBDDFF;
        margin: 3px;
        display: inline-block;
        text-align: center;
    }
    
    .box_pater_col{
        width:400px;
        padding: 8px;
        background-color: #FCF9B4;
        margin: 3px;
        display: inline-block;
    }
    
    .box_pater_tag{
        width:90%;
        padding: 3px;
        background-color:#D7AEFF;
        margin: 3px;
        display: inline-block;
        font-size: 8px;
    }
</style>

<?php
include "app_my_girl_template.php";

$id='124';
$sex='1';
$character_sex='1';
$count_row=0;
$lang_sel='vi';

if(isset($_GET['id'])){
    $id=$_GET['id'];
}

echo '<table>';
    $count_row++;
    echo '<tr><td>'.$count_row.'</td>';
    $is_pater=get_pater($id,$sex,$character_sex,$lang_sel);
    echo '</tr>';
    
while($is_pater!=''){
    $count_row++;
    echo '<tr><td>'.$count_row.'</td>';
    $is_pater=get_pater($is_pater,$sex,$character_sex,$lang_sel);
    echo '</tr>';
}
echo '</table>';

function get_pater($ids,$sex,$character_sex,$lang_sel){
    $arrid=array_filter(explode(',',$ids));
    $txt_id='';
    $txt_style='';
    
    if(count($arrid)==1){
        $txt_style='colspan="2"';
    }
    
    for($i=0;$i<count($arrid);$i++){
        $id_chat=$arrid[$i];
        $query_chat=mysql_query("SELECT * FROM app_my_girl_$lang_sel WHERE id='$id_chat' AND `sex`='$sex' AND `character_sex`='$character_sex'");
        $arr_data=mysql_fetch_array($query_chat);
        
        echo '<td '.$txt_style.'>';
        echo $arr_data['chat'];
                if($arr_data['r1']!=''){
            echo '<span class="box_pater_tag">'.$arr_data['q1'].'</span>';
            $txt_id=$txt_id.$arr_data['r1'].',';
        }
        
        if($arr_data['r2']!=''){
            echo '<span class="box_pater_tag">'.$arr_data['q2'].'</span>';
            $txt_id=$txt_id.$arr_data['r2'].',';
        }
        echo '</td>';
        

        

        mysql_free_result($query_chat);
    }
    return $txt_id;
}
?>