<?php
$list_lang=$this->get_list_lang();
for($i=0;$i<count($list_lang);$i++){
    $item_lang=$list_lang[$i];
    $key_lang=$item_lang['key'];

    $c_scores=0;
    $data_c_scores=$this->q_data("SELECT COUNT(`id_user`) as c FROM `scores` WHERE `lang` = '$key_lang' LIMIT 1");
    if($data_c_scores!=null) $c_scores=$data_c_scores['c'];

    $c_country=0;
    $data_c_country=$this->q_data("SELECT COUNT(`key`) as c FROM `country` WHERE `key` = '$key_lang' LIMIT 1");
    if($data_c_country!=null) $c_country=$data_c_country['c'];

?>
<div id="box" <?php if($c_country!=0){?>class="active"<?php }?>>
    <div class="header">
        <img src="<?php echo $item_lang['icon'];?>">
        <div class="name"><?php echo $item_lang["name"];?></div>
    </div>
    <ul>
        <li>Số người tham gia:<?php echo $c_scores;?></li>
    </ul>
</div>
<?php }?>