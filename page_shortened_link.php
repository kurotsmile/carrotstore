<?php
$query_count_link=mysql_query("SELECT COUNT(`link`) as c FROM `link`");
$count_toal_link=mysql_fetch_array($query_count_link);
$count_toal_link=$count_toal_link['c'];
?>
<style>
#inp_link,.inp_link_show{
    width: 100%;border:solid 3px #d9e7ff;padding: 10px;margin-bottom: 20px;
    padding-left: 54px;
    background: url('<?php echo $url ?>/images/link.png') white 10px 1px no-repeat;
}
#link_create{
    display: normal;
}

#link_return{
    display: none;
}
#share_link{
    width:100%;
}
</style>
<div id="bk_link">
    <div style="width: 10%;float: left;">&nbsp;</div>
    <form style="width: 80%;float: left;text-align: center;" id="link_create" name="link_create">
        <h2><?php echo lang('rut_gon_link'); ?></h2>
        <input type="text" value="" style="" name="link" id="inp_link" placeholder="<?php echo lang('shorten_link_inp'); ?>" />
        <a class="buttonPro blue large" onclick="create_shorten_link();return false;"><i class="fa fa-link fa-spin"></i> <?php echo lang('shorten_link_btn'); ?></a>
        <input type="hidden" name="function" value="create_shorten_link" />
    </form>
    <div style="width: 80%;float: left;text-align: center;" id="link_return">
        <h2><?php echo lang('shorten_link_return'); ?></h2>
        <div id="link_return_show" style="float: left;width: 100%;">
        </div>
        <a class="buttonPro blue small" onclick="$('#link_create').show();$('#link_return').hide();return false;"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> <?php echo lang('back'); ?></a>
    </div>
    <div style="width: 10%;float: left;">&nbsp;</div>
</div>

<div style="float: left;width: 100%;margin-top: 60px;text-align: center;">
    <div class="row_info_link" style="width: 5%;float: left;">&nbsp;</div>
    <div class="row_info_link" style="width: 28%;float: left;padding: 10px;">
                <?php
                if(isset($user_login)){
                    $data_cur_user=get_account($user_login->id,$_SESSION['lang']);
                ?>
                  <strong><?php echo $data_cur_user['name']; ?></strong><br />
                  <img src="<?php echo $data_cur_user['avatar_url']; ?>" />
                  <br />
                  <a href="<?php echo $url;?>/links/<?php echo $data_cur_user['id_device'] ?>"> <?php echo lang('shorten_link_my_list');?></a>
                <?php
                }else{
                ?>
                    <i style="font-size: 30px;margin-bottom: 20px;" class="fa fa-sign-in" aria-hidden="true"></i><br />
                    <?php echo lang('shorten_link_tip_1'); ?>
                    <div style="text-align:-webkit-center;margin-top: 20px;" class="g-signin2" data-onsuccess="onSignIn"></div>
                <?php
                }
                ?>
    </div>
    
    <div class="row_info_link" style="width: 28%;float: left;padding: 10px;">
        <i style="font-size: 30px;margin-bottom: 20px;" class="fa fa-line-chart" aria-hidden="true"></i><br />
        <?php
        echo str_replace("{num_link}",'<b>'.$count_toal_link.'</b>',lang('shorten_link_tip_2'));
        ?>
        <br />
        <br />
        <a href="<?php echo $url;?>/links"><i class="fa fa fa-list" aria-hidden="true"></i> <?php echo lang('shorten_link_list'); ?></a>
    </div>
    
    <div class="row_info_link" style="width: 28%;float: left;padding: 10px;">
            <i style="font-size: 30px;margin-bottom: 20px;" class="fa fa-motorcycle" aria-hidden="true"></i><br />
            <?php echo lang('shorten_link_tip_3');?>
            <div style="width: 100%;float: left;margin-top: 5px;">
            <?php
            //echo '<img style="margin:5px;float:left;" src="'.get_url_icon_product('137','100x100',false).'"/>';
            $query_product=mysql_query("SELECT * FROM `products` WHERE `id` = '137' LIMIT 1");
            $data_p=mysql_fetch_array($query_product);
            ?>
            <?php if($data_p['chplay_store']!=''){ ?><a href="<?php echo $data_p['chplay_store'];?>" target="_blank"><img style="width: 140px;margin-top: 5px;" src="<?php echo $url.'/images/chplay_download.png';?>" /></a><?php }?>
            <?php if($data_p['app_store']!=''){ ?><a href="<?php echo $data_p['app_store'];?>" target="_blank"><img style="width: 140px;margin-top: 5px;" src="<?php echo $url.'/images/app_store_download.png';?>" /></a><?php }?>
            <?php if($data_p['galaxy_store']!=''){ ?><a href="<?php echo $data_p['galaxy_store'];?>" target="_blank"><img style="width: 140px;margin-top: 5px;" src="<?php echo $url.'/images/galaxy_store_download.png';?>" /></a><?php }?>
            <?php if($data_p['window_store']!=''){ ?><a href="<?php echo $data_p['window_store'];?>" target="_blank"><img style="width: 140px;margin-top: 5px;" src="<?php echo $url.'/images/window_store_download.png';?>" /></a><?php }?>
            <?php if($data_p['huawei_store']!=''){ ?><a href="<?php echo $data_p['huawei_store'];?>" target="_blank"><img style="width: 140px;margin-top: 5px;" src="<?php echo $url.'/images/huawei_store_download.png';?>" /></a><?php }?>
            </div>
    </div>
    <div class="row_info_link" style="width: 5%;float: left;">&nbsp;</div>
</div>

<script>
function isUrlValid(url) {
    return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
}

function create_shorten_link(){
    var txt_inp_link=$("#inp_link").val();
    txt_inp_link=decodeURI(txt_inp_link);
    if(isUrlValid(txt_inp_link)){
        $("#loading").show(200);
        var formData = $("#link_create").serialize();
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: formData,
            success: function(data, textStatus, jqXHR)
            {
                $("#link_return_show").html(data);
                $("#loading").hide(200);
                $('#link_create').hide();
                $('#link_return').show();
            }
        });
    }else{
        $("#loading").hide(200);
        swal("<?php echo lang("rut_gon_link"); ?>","<?php echo lang('shorten_link_error');?>","error");
    }
        
}

function fallbackCopyTextToClipboard(text) {
  var textArea = document.createElement("textarea");
  textArea.value = text;
  textArea.style.position="fixed";  //avoid scrolling to bottom
  document.body.appendChild(textArea);
  textArea.focus();
  textArea.select();

  try {
    var successful = document.execCommand('copy');
    var msg = successful ? 'successful' : 'unsuccessful';
    console.log('Fallback: Copying text command was ' + msg);
  } catch (err) {
    console.error('Fallback: Oops, unable to copy', err);
  }

  document.body.removeChild(textArea);
}
function copyTextToClipboard(text) {
  if (!navigator.clipboard) {
    fallbackCopyTextToClipboard(text);
    return;
  }
  navigator.clipboard.writeText(text).then(function() {
    console.log('Async: Copying to clipboard was successful!');
  }, function(err) {
    console.error('Async: Could not copy text: ', err);
  });
}

</script>