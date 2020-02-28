
<div style="width: 100%;float: left">
    <div style="float: left;padding: 20px;">
        <?php
        if(isset($_POST['frm_country_work'])){
            $id_user=$data_user_carrot['user_id'];
            $country_work=json_encode($_POST['country_work']);
            $query_update_user=mysql_query("UPDATE carrotsy_work.`work_user` SET `country_work` = '$country_work' WHERE `user_id` = '$id_user';");
        }

        $id_user=$data_user_carrot['user_id'];
        $query_user_login=mysql_query("SELECT * FROM carrotsy_work.`work_user` WHERE `user_id` = '$id_user' LIMIT 1");
        $data_user_carrot=mysql_fetch_array($query_user_login);

        $arr_country=array();
        if(isset($data_user_carrot['country_work'])){
            $arr_country=json_decode($data_user_carrot['country_work']);
        }
  
        ?>
        <form action="" method="post">
            <i class="fa fa-connectdevelop" aria-hidden="true"></i> Hiển thị các quốc gia làm việc ở màn hình chính giúp
            quá trì tải dữ liệu nhanh hơn
            <br/>
            <table>
                <tr>
                    <th>Từ khóa</th>
                    <th>Tên quốc gia</th>
                    <th>Hiển thị / không hiển thị</th>
                </tr>
                <?php
                $list_country = mysql_query("SELECT * FROM `app_my_girl_country`");
                while ($l = mysql_fetch_array($list_country)) {
                    $key = $l['key'];
                    ?>
                    <tr>
                        <td>
                            <img src="<?php echo $url; ?>/thumb.php?src=<?php echo $url; ?>/app_mygirl/img/<?php echo $key; ?>.png&size=20&trim=1"/>
                        </td>
                        <td><?php echo $l['name']; ?></td>
                        <td><input type="checkbox" name="country_work[]" <?php if(in_array($key,$arr_country)){?>checked="true"<?php }?> value="<?php echo $key;?>"/></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <input type="submit" value="Hoàn tất" class="buttonPro blue" name="frm_country_work">
        </form>
    </div>
</div>