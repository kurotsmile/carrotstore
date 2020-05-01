<div class="notifi" id="row_notifi<?php echo $row[0];?>">
    <div class="notifi_header">
    <span ><i class="<?php echo $row['icon'];?>"></i></span> <strong><?php echo lang($row['type']); ?></strong>
    </div>

    <div class="notifi_body">
    <?php
    if(trim($row['object_type'])!=''){
        $obj=get_row($row['object_type'],$row['object_id']);
        echo '<a href="'.$url.'/product/'.$obj[0].'"><img style="float:left;margin-right:2px;" src="'.thumb($obj['icon'],'30x30').'"/></a>';
    }

    if($row['type']=='ket_ban'){
        $user_from=get_account($row['user_from']);
        echo '<a href="'.$url.'/user/'.$row['user_from'].'"><img style="float:left;margin-right:2px;" src="'.thumb($user_from['avatar'],'30x30').'"/></a>';
    }
    ?>
    <?php echo lang($row['content']);?><br/>
    </div>

    <div class="notifi_action">
    <?php
    if($row['type']!='ket_ban'){
    ?>
    <span class="buttonPro small red" onclick="delete_notification(<?php echo $row[0];?>)"><?php echo lang($link,'xoa'); ?></span>
    <button class="buttonPro small light_blue" onclick="read_notification(<?php echo $row[0];?>)"><?php echo lang($link,'da_doc'); ?></button>
    <?php }else{?>
        <span class="buttonPro small red" onclick="delete_friend('<?php echo $row['user_from'];?>',0);"><?php echo lang($link,'tu_choi_ket_ban'); ?></span>
        <button class="buttonPro small blue" onclick="add_friend('<?php echo $row['user_from'];?>',0);"><?php echo lang($link,'chap_nhan_ket_ban'); ?></button>
    <?php }?>
    </div>
</div>