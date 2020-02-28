<?php
    if(isset($_GET['function'])&&$_GET['function']=='search_product_admin'){
        $key=$_GET['key'];
        $id_user=$_SESSION['username_login'];
        $result3 = mysql_query("SELECT * FROM `products` WHERE (`content` LIKE '%$key%' OR `name_product` LIKE '%$key%' OR `desc_product` LIKE '%$key%')  LIMIT 50",$link);
            include "../page_account_manage_product_template.php";
        exit; 
    }
    
    if(isset($_GET['function'])&&$_GET['function']=='search_company_admin'){
        $key=$_GET['key'];
        $id_user=$_SESSION['username_login'];
        $result = mysql_query("SELECT * FROM `company` WHERE (`names` LIKE '%$key%' OR `describe` LIKE '%$key%')  LIMIT 50",$link);
            include "page_company_template.php";
        exit; 
    }

    if(isset($_POST['function'])&&$_POST['function']=='add_place_type'){
        $names=$_POST['names'];
        $icons=$_POST['icons'];                
        $result3 = mysql_query("INSERT INTO `place_type` (`names`, `icons`) VALUES ('$names', '$icons');",$link);
        exit; 
    }    
    
    if(isset($_POST['function'])&&$_POST['function']=='delete_type_place'){
        $id=$_POST['id'];
        $result3 = mysql_query("DELETE FROM `place_type` WHERE `id` = '$id'",$link);
        exit; 
    }
    
    if(isset($_POST['function'])&&$_POST['function']=='add_ratio'){
        $key_1=$_POST['key_1'];
        $key_2=$_POST['key_2'];
        $compare=$_POST['compare']; 
        $ratio=$_POST['ratio'];      
        $result3 = mysql_query("INSERT INTO `currency` (`key_1`, `key_2`, `ratio`, `compare`) VALUES ('$key_1', '$key_2', '$ratio', '$compare');",$link);
        exit; 
    } 
    
    if(isset($_POST['function'])&&$_POST['function']=='update_ratio'){
        $key_1=$_POST['key_1'];
        $key_2=$_POST['key_2'];
        $compare=$_POST['compare']; 
        $ratio=$_POST['ratio'];
        $id=$_POST['id'];   
        $result3 = mysql_query("UPDATE `currency` SET `key_1` = '$key_1',`key_2` = '$key_2', `ratio` = '$ratio', `compare` = '$compare' WHERE `id` = '$id';",$link);
        exit; 
    }


    if(isset($_POST['function'])&&$_POST['function']=='save_type_order'){
        foreach ($_POST['listItem'] as $position => $item)
        {
            mysql_query("UPDATE `type` SET `position` = $position WHERE `id_order` =$item ");
        }
        exit;
    }

if(isset($_POST['function'])&&$_POST['function']=='status_order'){
        $product=$_POST['product'];
        $users=$_POST['users'];
        $status=$_POST['status'];
        $result3 = mysql_query("UPDATE `order` SET `status` = '$status' WHERE `users` = '$users' AND `product` = '$product' ",$link);
        if($status=='1'){
            ?><span class="order_level1"><?php echo lang('cho_xac_nhan'); ?></span><?php
            $content='';
        }
        if($status=='2'){
            ?><span class="order_level2"><?php echo lang('da_xac_nhan'); ?></span><?php 
            $content=lang('tip_order_1');
        }
        if($status=='3'){
            ?><span class="order_level3"><?php echo lang('dang_chuyen_hang'); ?></span><?php
            $content=lang('tip_order_2');
        }
        if($status=='4'){
            ?><span class="order_level4"><?php echo lang('hoan_tat'); ?></span><?php
            $content=lang('tip_order_3');
        }
        mysql_query("INSERT INTO `notification` (`icon`, `user`, `content`, `type`, `object_id`, `object_type`) VALUES ('fa fa-shopping-basket', '$users', '$content', 'don_dac_hang', '$product','products')");
        exit; 
}

if(isset($_POST['function'])&&$_POST['function']=='add_answer'){
    $question=$_POST['question'];
    $awser=$_POST['answer'];
    mysql_query("INSERT INTO `answer` (`question`, `answer`) VALUES ('$question', '$awser');");
    exit;
}

if(isset($_POST['function'])&&$_POST['function']=='reload_answer'){
    $question=$_POST['question'];
    $get_answer=mysql_query("select * from `answer` WHERE  `question`=$question");
    while($answer=mysql_fetch_array($get_answer)){
        ?>
        <div class="item_answer">
            <?php echo $answer[2]; ?>
            <div class="close">
                <a href="#" onclick="delete_data(this,'<?php echo $answer[0]; ?>','answer');return false;">
                    <i class="fa fa-minus-circle"></i>
                </a>
            </div>
        </div>
        <?php
    }
    exit;
}
?>