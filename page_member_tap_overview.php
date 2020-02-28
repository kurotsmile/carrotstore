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
<?php show_box_object('sp_da_dang','products',$id_user,'page_view_all_product_git_template.php',$url,1);?>
<?php show_box_object('dia_diem','place',$id_user,'page_place_view_git_teamplate.php',$url);?>
<?php show_box_object('cong_ty','company',$id_user,'page_company_view_git_template.php',$url);?>

<div style="float: left;width: 100%;">
<?php
    $acc_check=get_account($id_user);
    $pass=$acc_check['password'];
    if($pass!=""){
        ?>
        <h4 style="color: #3FC73D;font-size: 20px;">Tài khoản đã xác thực</h4>
        <img style="width: 200px;float: left;" src="<?php echo $url; ?>/images/icon_certificate.png" />
        <?php
    }else{
        ?>
        <h4 style="color: #3FC73D;font-size: 20px;">Tài khoản chưa xác thực</h4>
        <h3>Đây là tôi,Hãy thực hiện các bước xác thực dưới đây để được sử dụng tài khoản,chỉnh sửa thông tin,và dịch vụ khác v.v...</h3>
        <img style="width: 300px;float: left;"  src="<?php echo $url; ?>/images/icon_no_certificate.png" />
        <button class="buttonPro btn blue">Xác minh qua số điện thoại</button><br />
        <button class="buttonPro btn red">Tôi muốn gỡ liên hệ này!</button><br />
        <?php
    }
?>
</div>

<div style="float: left;width: 100%;">
<?php
    $id=get_account($id_user);
    $id=$id['id'];
    $result_backup=mysql_query("SELECT * FROM `contact_backup` WHERE `user` = '$id' LIMIT 1");
    if(mysql_num_rows($result_backup)>0){
        ?>
        <table style="margin-top: 10px;border-top-left-radius: 10px;">
        <tr style="background-color: #3FC73D;border-top-left-radius: 10px;">
            <th colspan="3"  style="border-top-left-radius: 10px;background-color: #3FC73D;font-size: 20px;padding-top: 10px;padding-bottom: 10px;padding-left: 8px;"><?php echo lang('luu_tru_lien_he');?></th>
        </tr>
        <tr>
            <th><?php echo lang('ten_day_du');?></th>
            <th><?php echo lang('so_dien_thoai');?></th>
            <th>Emil</th>
        </tr>
        <?php
        $data=mysql_fetch_array($result_backup);
        foreach(json_decode($data[2]) as $phone){
            ?>
            <tr>
                <td><?php  echo $phone->name; ?></td>
                <td><?php  echo $phone->phone; ?></td>
                <td><?php  echo $phone->email; ?></td>
            </tr>
            <?php
        }
        ?>
        </table>
        <?php
    }
?>
</div>