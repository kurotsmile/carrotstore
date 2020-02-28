<h3><?php echo lang('tong_quan');?></h3>

<div class="member_box_col_overview">
    <?php
    if(isset($_SESSION['username_login'])){
    if(isset($_SESSION['username_login'])&&$_SESSION['username_login']==$id_user){
    $count_friend=mysql_query("SELECT COUNT(`friend`) FROM `account_friend` WHERE `user` = '$id_user'");
    $count_friend=mysql_fetch_array($count_friend);
    $get_friend=mysql_query("SELECT * FROM `account_friend` WHERE `user` = '$id_user'")
    ?>
    <strong><?php echo $count_friend[0];?> <?php echo lang('trac_nghiem');?></strong>
    <div>
        <?php
        while($fr=mysql_fetch_array($get_friend)){
            $f=get_account($fr['friend']);
            ?>
            <img src="<?php echo thumb($f['avatar'],'30x30');?>"/>
            <?php
        }
        ?>
    </div>
    <?php }else{
        $cat_question=mysql_query("select * from question_category");
        $user_login=$_SESSION['username_login'];
        $data_user_login=get_account($user_login);
        $data_user_show=get_account($id_user);
        ?>
        <strong>Chỉ số điểm chung phù hợp gữa bạn và <?php echo show_name_User($id_user); ?></strong><br/>
        <img src="<?php echo thumb($data_user_login['avatar'],'50x50'); ?>">
        <i class="fa fa-exchange fa-2x" aria-hidden="true"></i>
        <img src="<?php echo thumb($data_user_show['avatar'],'50x50'); ?>">
        <?php
        while($cat_q=mysql_fetch_array($cat_question)){
            $cat_q_id=$cat_q['id'];
            $count_qs=mysql_query("SELECT an.*
            FROM `question_category` qc
            LEFT JOIN `question` q on q.category=qc.id
            LEFT JOIN `account_answer` an on an.question=q.id
            LEFT JOIN `account_answer` an2 on an2.question=q.id
            WHERE  qc.id=$cat_q_id and (an.user='$user_login' and an2.user='$id_user')
            ");
            $total_question=mysql_query("SELECT COUNT(`id`) FROM `question` WHERE `category` = '$cat_q_id'");
            $total_question=mysql_fetch_array($total_question);
            $count_qs=mysql_num_rows($count_qs);
            $value_qs=0;
            if($count_qs>0){
                $value_qs=($count_qs/$total_question[0]);
            }
            ?>
            <div>
                <i class="<?php echo $cat_q[2];?>"></i> <?php echo lang($cat_q[1]);?>
                <div class="bar_question" data-valueshow="<?php echo $value_qs; ?>">
                    <div class="qs_value"></div>
                </div>
            </div>
            <?php
        }
    ?>
    <script>
        $(document).ready(function(){
           $('.bar_question').each(function(){
                var sdata=$(this).data('valueshow');
               var w=$(this).width();
               $(this).find('.qs_value').width(w*parseFloat(sdata));
           });
        });
    </script>
    <?php }}?>
</div>

<?php
$products_count=mysql_query("SELECT * FROM `products` WHERE `users` = '$id_user'");
if(mysql_num_rows($products_count)>0){
?>
<div class="box_acc_model">
    <span class="title"><i class="fa fa-product-hunt" aria-hidden="true"></i> <?php echo lang('sp_da_dang');?></span>
    <p>
        <?php echo lang('sp_da_dang');?> <strong><?php echo mysql_numrows($products_count); ?></strong> <?php echo lang('sp');?>
    </p>
    
    <p style="margin: 2px;padding: 0px;">
        <?php
             $products=mysql_query("SELECT * FROM `products` WHERE `users` = '$id_user' order by Rand() limit 15");
             while ($product = mysql_fetch_array($products)) {
                echo '<a class="show_app" id="'.$product['id'].'" href="'.$url.'/product/'.$product['id'].'"><img class="model_img" src="'.thumb($product['icon'],'25x25').'"/></a>';
             }
        ?>
    </p>
    <a href="<?php echo $url.'/productbyuser/'.$id_user;?>" class="buttonPro small"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> <?php echo lang('xem_tat_ca');?></a>
</div>
<?php
}
?>

<?php
$products_count=mysql_query("SELECT * FROM `place` WHERE `users` = '$id_user'");
if(mysql_num_rows($products_count)>0){
?>
<div class="box_acc_model">
    <span class="title"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo lang('dia_diem');?></span>
    <p>
        <?php echo lang('dia_diem');?> <strong><?php echo mysql_numrows($products_count); ?></strong> <?php echo lang('sp');?>
    </p>
    
    <p style="margin: 2px;padding: 0px;">
        <?php
             $products=mysql_query("SELECT * FROM `place` WHERE `users` = '$id_user' order by Rand() limit 15");
             while ($product = mysql_fetch_array($products)) {
                echo '<a class="show_place" id="'.$product['id'].'" href="'.$url.'/place/'.$product['id'].'"><img  class="model_img" src="'.thumb($product['avatar'],'25x25').'"/></a>';
             }
        ?>
    </p>
    <a href="<?php echo $url.'/placebyuser/'.$id_user;?>" class="buttonPro small"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> <?php echo lang('xem_tat_ca');?></a>
</div>
<?php
}
?>

<?php
$products_count=mysql_query("SELECT * FROM `company` WHERE `users` = '$id_user'");
if(mysql_num_rows($products_count)>0){
?>
<div class="box_acc_model">
    <span class="title"><i class="fa fa-building-o" aria-hidden="true"></i> <?php echo lang('cong_ty');?></span>
    <p>
        <?php echo lang('cong_ty');?> <strong><?php echo mysql_numrows($products_count); ?></strong> <?php echo lang('sp');?>
    </p>
    
    <p style="margin: 2px;padding: 0px;">
        <?php
             $products=mysql_query("SELECT * FROM `company` WHERE `users` = '$id_user' limit 15");
             while ($product = mysql_fetch_array($products)) {
                echo '<a class="show_company" id="'.$product['id'].'" href="'.$url.'/company/'.$product['id'].'"><img  class="model_img" src="'.thumb($product['avatar'],'25x25').'"/></a>';
             }
        ?>
    </p>
    <a href="<?php echo $url.'/companybyuser/'.$id_user;?>" class="buttonPro small"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> <?php echo lang('xem_tat_ca');?></a>
</div>
<?php
}
?>


<div class="box_acc_model">
    <span class="title"><i class="fa fa-id-card-o" aria-hidden="true"></i> <?php echo lang('tinh_trang_tai_khoan'); ?></span>
    <p style="margin: 2px;padding: 0px;">
        <?php
            $acc_check=get_account($id_user);
            $pass=$acc_check['password'];
            if($pass!=""){
                ?>
                <strong style="color: #3FC73D;font-size: 12px;">Tài khoản đã xác thực</strong><br/>
                <img style="width: 90px;" src="<?php echo $url; ?>/images/icon_certificate.png" />
                <?php
            }else{
                ?>
                <strong style="color: red;font-size: 12px;">Tài khoản chưa xác thực</strong><br />
                <span>Đây là tôi,Hãy thực hiện các bước xác thực dưới đây để được sử dụng tài khoản,chỉnh sửa thông tin,và dịch vụ khác v.v...</span><br />
                <img style="width: 60px;float: left;margin-right: 10px;"  src="<?php echo $url; ?>/images/icon_no_certificate.png" />
                <button class="buttonPro btn blue small" onclick="account_verify('<?php echo $id_user; ?>');"><i class="fa fa-certificate" aria-hidden="true"></i> Xác minh qua số điện thoại</button><br />
                <button class="buttonPro btn red small"><i class="fa fa-times" aria-hidden="true"></i> Tôi muốn gỡ liên hệ này!</button><br />
                <script>
                function account_verify(usernames){
                    $('#loading').fadeIn(200);
                    $.ajax({
                        url: "<?php echo $url;?>/index.php",
                        type: "post",
                        data: "function=account_verify&usernames="+usernames,
                        success: function(data, textStatus, jqXHR)
                        {
                            swal({
                                title: "<?php echo lang('xac_minh_tai_khoan'); ?>",
                                text: data,
                                html: true,
                            });
                            $('#loading').fadeOut(200);
                        }
                    });
                }
                </script>
                <?php
            }
        ?>
    </p>
</div>

<?php
    $id=get_account($id_user);
    $id=$id['id'];
    $result_backup=mysql_query("SELECT `info`,`id` FROM `contact_backup` WHERE `user` = '$id' and `type`='public'");
    if(mysql_num_rows($result_backup)>0){
?>
<div class="box_acc_model">
    <span class="title"><i class="fa fa-address-book" aria-hidden="true"></i> <?php echo lang('danh_ba'); ?></span>
    <p style="margin: 2px;padding: 0px;">
        <span> Account save <?php echo mysql_num_rows($result_backup);  ?> contacts</span>
        <p>
        <select class="inp" name="id_contacts" id="id_contacts">
            <?php 
                while($contacts = mysql_fetch_array($result_backup)){
            ?>
                <option value="<?php echo $contacts[1] ?>"><?php  echo $contacts[0];?></option>
            <?php }?>
        </select>
        <br />
        <button class="buttonPro yellow small" onclick="view_contact_backup();">View contact</button>
        </p>
    </p>
    <script>
        function view_contact_backup(){
            var id_contact=$('#id_contacts').val();
            $.ajax({
                url: "<?php echo $url;?>/index.php",
                type: "post",
                data: "function=view_contacts_backup&id="+id_contact,
                success: function(data, textStatus, jqXHR)
                {
                    swal({
                        title: "View Contact Backup",
                        text: data,
                        html: true,
                    });
                    $('#loading').fadeOut(200);
                }
            });
        }
    </script>
</div>
<?php
}
?>