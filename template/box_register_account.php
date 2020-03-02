<h1 ><?php echo lang('dk_tai_khoan');?> <i style="float: right;cursor: pointer" onclick="$('#box_regiter_member').fadeOut(100).remove();" class="fa fa-times-circle"></i></h1>
<form id="form_register">

        <p>
            <label for="reg_username"><?php echo lang('ten_dang_nhap');?></label><br />
            <input class="inp" type="text" name="reg_username" id="reg_username" value="" />
        </p>

        <p>
            <label for="reg_password"><?php echo lang('mat_khau');?></label><br />
            <input class="inp" type="password" name="reg_password" id="reg_password" onchange="$('#reg_rep_password_are').fadeIn(200);" value="" />
        </p>

        <p id="reg_rep_password_are" style="display: none;">
            <label for="reg_rep_password"><?php echo lang('nhap_lai_mat_khau');?></label><br />
            <input class="inp" type="password" name="reg_rep_password" id="reg_rep_password" value="" />
        </p>
        


        <p>
            <label for="reg_address"><?php echo lang('dia_chi');?></label><br />
            <input class="inp" type="text" name="reg_address" id="reg_address" value="" />
            <input class="inp" type="hidden" name="lat" id="lat" value="" />
            <input class="inp" type="hidden" name="lng" id="lng" value="" />
            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&language=en-AU&key=<?php echo $key_api_google; ?>"></script>
            <script>
                var autocomplete = new google.maps.places.Autocomplete($("#reg_address")[0], {});

                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    var place = autocomplete.getPlace();
                    $('#lat').val(place.geometry.location.lat());
                    $('#lng').val(place.geometry.location.lng());
                });
            </script>
        </p>

        <p>
            <label for="reg_contry"><?php echo lang('quoc_gia');?></label><br />
            <select  class="inp" name="reg_contry" id="reg_contry">
                <?php
                $result = mysql_query("SELECT * FROM `contry` LIMIT 50",$link);
                while ($row = mysql_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row[1]; ?>" <?php if($row[1]==$_SESSION['lang']){ echo 'selected="true"';} ?> ><?php echo $row[0]; ?></option>
                    <?php
                }
                ?>
            </select>
        </p>

        <p><button class="buttonPro purple" onclick="register_account(this);return false;"><?php echo lang('dang_ky'); ?></button></p>
    </form>
    <script>
        function register_account(emp){
            $('.alert , .error').remove();
            var txt=$('#reg_username').val();
            if(txt==null || txt==''){
                $('#reg_username').after('<p class="error"><?php echo lang('ten_dn_k_de_trong'); ?></p>');
                swal("<?php echo lang('loi'); ?>","<?php echo lang('ten_dn_k_de_trong'); ?>", "error");
                return false;
            }else{
                if(isEmail($('#reg_username').val())){

                }else{
                    swal("<?php echo lang('loi'); ?>","<?php echo lang('email_sai'); ?>", "error");
                    return false;
                }
            }

            var txt=$('#reg_password').val();
            if(txt==null || txt==''){
                $('#reg_password').after('<p class="error"><?php echo lang('mk_k_dc_de_trong'); ?></p>');
                swal("<?php echo lang('loi'); ?>","<?php echo lang('mk_k_dc_de_trong'); ?>", "error");
                return false;
            }

            var txt=$('#reg_rep_password').val();
            var txt2=$('#reg_password').val();
            if(txt!=txt2){
                $('#reg_rep_password').after('<p class="error"><?php echo lang('mk_nhap_lai_sai'); ?></p>');
                swal("<?php echo lang('loi'); ?>","<?php echo lang('mk_nhap_lai_sai'); ?>", "error");
                return false;
            }


            var txt_data=$("#form_register").serialize();
            $(emp).after('<p class="alert"><?php echo lang('dang_xu_ly'); ?></p>');
            $('#loading').fadeIn(200);
            $.ajax({
                url: "index.php",
                type: "get", //kiê?u du? liê?u truyê?n ?i
                data: "function=box_register&"+txt_data, //tham sô? truyê?n va?o
                success: function(data, textStatus, jqXHR)
                {
                    $('.alert').remove();
                    if(data=='1'){
                        swal("<?php echo lang('loi'); ?>","<?php echo lang('loi_tk_ton_tai'); ?>", "error");
                    }else{
                        swal("<?php echo lang('thanh_cong'); ?>","<?php echo lang('dk_thanh_cong'); ?>", "success");
                        $("#form_register").html(data);
                        $('#reg_username').val('');
                        $('#reg_password').val('');
                        $('#reg_rep_password').val('');
                        $('#reg_address').val('');
                        $('#loading').fadeOut(200);
                    }
                }

            });
            return false;
        }
        
        function update_box_account(){
            var txt_sdt=$('#sdt_reg').val();
            var txt_icon=$('#ico_product').val();
            var txt_username=$('#reg_usernames').val();
            var txt_full_name=$('#full_name_reg').val();
            $('#loading').fadeIn(200);
            $.ajax({
                url: "index.php",
                type: "get", //kiê?u du? liê?u truyê?n ?i
                data: "function=box_register_update&reg_sdt="+txt_sdt+"&reg_avt="+txt_icon+"&reg_user="+txt_username+"&full_name_reg="+txt_full_name, //tham sô? truyê?n va?o
                success: function(data, textStatus, jqXHR)
                {
                    swal("<?php echo lang('cap_nhat'); ?>",data, "success");
                    $('#loading').fadeOut(200);
                    $('#box_regiter_member').fadeOut(200);
                }

            });
            return false;
        }
    </script>