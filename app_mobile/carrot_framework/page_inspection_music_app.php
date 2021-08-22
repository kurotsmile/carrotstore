<?php
$list_app_m_key=$this->q("SELECT * FROM carrotsy_virtuallover.`app_my_girl_log_key_music` GROUP BY `key`");
$num_app_m_key=mysqli_num_rows($list_app_m_key);
if($num_app_m_key>0){
?>
<div class="app_ins" id="box_music_2">
    <div class="title" style="width: 96%;">
        <i class="fa fa-music" aria-hidden="true"></i> Duyệt nhạc (Lover) (<span id="count_m2"><?php echo $num_app_m_key;?></span>)
        <a id="btn_unactive_music" class="buttonPro small" style="float:right" onclick="unactive_music_key_check();"><i id="icon_unactive_music" class="fa fa-trash-o" aria-hidden="true"></i></a>
    </div>
    <div class="body" id="table_m2">
        <table>
        <?php 
            while($m=mysqli_fetch_assoc($list_app_m_key)){
                $m_key=$m['key'];
                $key_m_lang=$m['lang'];
        ?>
            <tr class="k_m_<?php echo md5($m_key);?> m_emp">
                <td><?php echo $key_m_lang;?></td>
                <td style="width: 180px;"><a target="_blank" href="<?php echo $this->url_carrot_store;?>/app_my_girl_handling.php?func=check_music&key_word=<?php echo $m_key; ?>"><?php echo $m_key;?></a></td>
                <td>
                    <a target="_blank" onclick="$(this).addClass('blue');" href="<?php echo $this->url_carrot_store;?>/app_my_girl_handling.php?func=remove_key_music&key=<?php echo $m_key;?>" class="buttonPro small"><i class="fa fa-ban" aria-hidden="true"></i></a>
                    <a href="#" class="buttonPro small red" onclick="key_music_act('del','<?php echo urlencode($m_key);?>')"><i class="fa fa-eraser" aria-hidden="true"></i></a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    </div>
</div>
<?php }?>