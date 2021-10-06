<div class="app_ins">
    <div class="title" style="width: 96%;">
    <i class="fa fa-grav" aria-hidden="true"></i> Chức năng nhanh
    </div>
    <div class="body" id="table_func">
    <table>
    <?php
    $q_lits_func=$this->q("SELECT * FROM carrotsy_virtuallover.`app_my_girl_function` ORDER BY `orders`");
    while($f=mysqli_fetch_assoc($q_lits_func)){
    ?>
        <tr>
        <td>
            <a target="_blank" href="<?php echo $this->url_carrot_store;?>/<?php echo $f['url'];?>"><i class="<?php echo $f['icon'];?>" aria-hidden="true"></i> <?php echo $f['name'];?></a>
        </td>
        </tr>
    <?php
    }
    ?>
    </table>
    </div>
</div>