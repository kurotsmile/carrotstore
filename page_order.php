<?php
    $is_order=false;

    if(isset($user_login)){
        $user_login_email=$user_login->email;
        $query_list_order=mysqli_query($link,"SELECT * FROM `order` WHERE `pay_mail` = '$user_login_email'");
        if(mysqli_num_rows($query_list_order)>0){
            $is_order=true;
        }
    }

    if($is_order){
?>
<div style="width: 90%;padding: 10px;margin-left: auto;margin-right: auto;" id="contain">
    <p>
        <h2><i class="fa fa-cart-arrow-down icon_green" aria-hidden="true"></i> <?php echo lang($link,"purchase_orders");?></h2>
    </p>

    <p>
    <table>
    <?php
    while ($row_order=mysqli_fetch_assoc($query_list_order)) {
        $name_order='';
        $lang_order=$row_order['lang'];
        $id_order=$row_order['id'];
        $download_label='';
		$url_download='';
        if($row_order['type']=='music'){
            $query_order_mysic=mysqli_query($link,"SELECT `chat` FROM `app_my_girl_$lang_order` WHERE `id` = '$id_order' LIMIT 1");
            $data_music=mysqli_fetch_assoc($query_order_mysic);
            $name_order=$data_music['chat'];
            $url_download=$url.'/download.php?id='.$id_order.'&lang='.$lang_order;
            $download_label=lang($link,'download_song');
        }else{
            $name_order='';
        }
		
        echo '<tr>';
        echo '<td style="width:40px"><i class="fa fa-music" aria-hidden="true"></i></td>';
        echo '<td>'.$name_order.'</td>';
        echo '<td><a href="'.$url_download.'" class="buttonPro small green"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i> '.$download_label.'</a></td>';
        echo '</tr>';
    }
    ?>
    </table>
    </p>
</div>
<?php }else{
    include "404.php";
}?>