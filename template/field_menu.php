<?php
$check_menu_item=0;
if(isset($data["id"])){
    $id=$data["id"];
    $mysq_check_menu_place=mysql_query("SELECT * FROM `place_menu_item` WHERE `place_id` = '$id'");
    $check_menu_item=mysql_num_rows($mysq_check_menu_place);
}
?>
        <div style="margin-top: 15px;">        
            <div class="group">
            <div class="title"><input type="checkbox" name="place_menu" class="btnGroup" <?php if($check_menu_item>0){ echo 'checked="true"';} ?>  /> <?php echo lang($link,'thuc_don');?> </div>
            <div class="content"  <?php if($check_menu_item>0){ echo 'style="display: block;"';}?> >
                <p>
                    <label>Item name:</label>
                    <input value="" class="inp" name="inp_name" id="item_menu_name" />
                </p>
                
                <p>
                    <label>Item price:</label>
                    <input value="" class="inp" name="inp_name" id="item_menu_price" onkeypress="if(isNaN(this.value + String.fromCharCode(event.keyCode)))return false;" />
                </p>
                
                <button class="buttonPro small yellow"  onclick="add_menu_item();return false;"><i class="fa fa-plus-square" aria-hidden="true"></i> Add item</button>
                
                <table id="containt_item_menu" class="tablePro" style="margin-top: 8px;">
                    <?php
                     if($check_menu_item>0){
                        ?>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        while($mmitem=mysql_fetch_array($mysq_check_menu_place)){
                            ?>
                            <tr>
                                <td><?php echo $mmitem['names'];?></td>
                                <td><?php echo $mmitem['price'];?></td>
                                <td>
                                    <button onclick='$(this).parent().parent().remove();' class='buttonPro small red'>Delete</button>
                                    <input type='hidden' name='place_item_name[]' value='<?php echo $mmitem['names'];?>' />
                                    <input type='hidden' name='place_item_price[]' value='<?php echo $mmitem['price'];?>' />
                                </td>
                            </tr>
                            <?php
                        }
                     }
                    ?>
                </table>
            </div>
            </div>
        </div>
        
        <script>
            <?php if($check_menu_item>0){?>
            var index0=1;
            <?php }else{?>
            var index0=0;
            <?php }?>
            
            function add_menu_item(){
                var item_menu_name=$('#item_menu_name').val();
                var item_menu_price=$('#item_menu_price').val();
                if(item_menu_name!=''||item_menu_price!=''){

                    if(index0==0){
                        var txt_html_head="<tr><th>Name</th><th>Price</th><th>Action</th></tr>";
                        $('#containt_item_menu').append(txt_html_head);
                        index0=1;
                    }
                    
                    $('#item_menu_name').val('');
                    $('#item_menu_price').val('');
                    
                    var txt_html_item="<tr><td>"+item_menu_name+"</td><td>"+item_menu_price+"</td><td><button onclick='$(this).parent().parent().remove();' class='buttonPro small red'>Delete</button><input type='hidden' name='place_item_name[]' value='"+item_menu_name+"' /><input type='hidden' name='place_item_price[]' value='"+item_menu_price+"' /></td></tr>";
                    $('#containt_item_menu').append(txt_html_item);
                    
                }else{
                    swal({
                        title: "Add Item Menu",
                        text: "Item name and Item price not null!",
                    });
                }
            }
        </script>
        