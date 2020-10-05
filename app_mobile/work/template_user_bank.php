<?php
$user_work=$data_user['user_name'];
if($data_user['payment']=='1'){
    ?>
    <form class="box_form_add_chat" style="margin-left: 5px;" method="post" action="<?php echo $url;?>?page_show=review_salary">
        <?php

        $is_show_info=true;

        $name_bank='';
        $number_account='';
        $name_account='';
        $address_account='';

        $query_bank=mysqli_query($link,"SELECT * FROM `work_bank` WHERE `user_name` = '$user_work' LIMIT 1");
        if(mysqli_num_rows($query_bank)>0){
            $data_bank=mysqli_fetch_array($query_bank);
            $name_bank=$data_bank['name_bank'];
            $number_account=$data_bank['account_number'];
            $name_account=$data_bank['account_name'];
            $address_account=$data_bank['address_bank'];
            $is_show_info=true;
        }else{
            $is_show_info=false;
        }

        if(isset($_GET['edit_bank'])){
            $is_show_info=false;

        }
        ?>
        <div class="row line">
            <strong><i class="fa fa-university" aria-hidden="true"></i> Thêm tài khoản ngân hàng nhận thanh toán (từ xa)</strong><br />
            <?php if(mysqli_num_rows($query_bank)==0){?>
                <i style="font-size: 10px;">Bạn chưa thêm tài khoản ngân hàng của bạn hãy thêm đầy đủ thông tin bên dưới</i>
            <?php }?>
        </div>
        <?php if($is_show_info){?>
            <?php
            echo '<ul>';
            echo '<li><b style="font-size:13px;">Tên ngân hàng:</b>'.$data_bank['name_bank'].'</li>';
            echo '<li><b style="font-size:13px;">Số tài khoản:</b>'.$data_bank['account_number'].'</li>';
            echo '<li><b style="font-size:13px;">Tên tài khoản:</b>'.$data_bank['account_name'].'</li>';
            echo '<li><b style="font-size:13px;">Địa chỉ ngân hàng:</b>'.$data_bank['address_bank'].'</li>';
            echo '</ul>';
            ?>
            <div class="row">
                <a href="<?php echo $url;?>/?page_show=review_salary&edit_bank=1" class="buttonPro small yellow">Sửa thông tin</a>
            </div>

        <?php }else{?>
            <div class="row line">
                <label>Tên ngân hàng</label>
                <input name="name_bank" type="text" value="<?php echo $name_bank; ?>" id="name_bank" />
            </div>

            <div class="row line">
                <label>Số tài khoản</label>
                <input name="number_account" type="text" value="<?php echo $number_account; ?>" id="number_account" />
            </div>

            <div class="row line">
                <label>Tên tài khoản</label>
                <input name="name_account" type="text" value="<?php echo $name_account; ?>" id="name_account" />
            </div>

            <div class="row line">
                <label>Địa chỉ ngân hàng (chi nhánh)</label>
                <input name="address_account" type="text" value="<?php echo $address_account; ?>" id="address_account" />
            </div>

            <div class="row">
                <input type="hidden" value="<?php echo $user_name;?>" name="user_work" />
                <label>&nbsp;</label>
                <?php if(isset($_GET['edit_bank'])){?>
                    <input name="submit_add_bank" class="buttonPro small orange" type="submit" value="Cập nhật"/>
                    <input name="submit_add_bank_func" type="hidden" value="edit" />
                <?php }else{?>
                    <input name="submit_add_bank" class="buttonPro small green" type="submit" value="Thêm"/>
                    <input name="submit_add_bank_func" type="hidden" value="add" />
                <?php }?>
            </div>
        <?php }?>
    </form>
    <?php
}
?>
