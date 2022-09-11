<?php
$list_country=$this->get_list_lang();
for($i=0;$i<count($list_country);$i++){
    $item_country=$list_country[$i];
    $key_country=$item_country['key'];
    $is_sel='off';
    $query_check_sel=$this->q("SELECT `key` FROM `country` WHERE `key` = '$key_country' LIMIT 1");
    if(mysqli_num_rows($query_check_sel)>0){
        $is_sel='on';
    }else{
        $is_sel='off';
    }

    $count_lang_val=0;
    $query_count_lang_val=$this->q("SELECT * FROM `lang_val` WHERE `lang` = '$key_country' LIMIT 1");
    if(mysqli_num_rows($query_count_lang_val)>0){
        $data_lang_val=mysqli_fetch_array($query_count_lang_val);
        if($data_lang_val['data']!=''){
            $arr_lang_val=json_decode($data_lang_val['data']);
            $arr_lang_val=(array)$arr_lang_val;
            $count_lang_val=sizeof($arr_lang_val);
        }
    }

    ?>
    <div class="box_lang <?php if($is_sel=="on"){ echo 'active'; } ?>">
        <img class="icon" src="<?php echo $item_country["icon"];?>" />
        <b>ID:</b><?php echo $item_country["id"]; ?><br />
        <b>Key:</b><?php echo $key_country; ?><br />
        <b>Name</b><?php echo $item_country["name"]; ?><br />
        <b>Lang value:</b><?php echo $count_lang_val; ?><br />
    </div>
    <?php
}
?>