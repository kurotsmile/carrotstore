<div>
    <?php
    $tags=array();
    $tags_val='';
    if(isset($data["id"])){
        $tags_id=$data["id"];
        $mysq_tags=mysql_query("SELECT * FROM `".$type_tag."_tag` WHERE `".$type_tag."_id` = '$tags_id'");
        while($row_tag=mysql_fetch_array($mysq_tags)){
            array_push($tags,$row_tag[1]);
            $tags_val.=$row_tag[1].',';
        }
    }
    ?>
    <div class="group">
        <div class="title"><input type="checkbox" class="btnGroup" <?php if(count($tags)>0){ echo 'checked="true"';} ?>  /> <?php echo lang($link,'the');?> </div>
        <div class="content"  <?php if(count($tags)>0){ echo 'style="display: block;"';}?> >
    <div id="content_tag" class="tags">
        <?php
        foreach($tags as $tag){
            echo '<div class="tag" onclick="del_tags(this);return false;">'.$tag.'</div>';
        }
        ?>
    </div>
    <input  id="tags" type="text" class="inp"  >
    <ul id="tags_autocomet"></ul>
     <br/>
    <button class="buttonPro light_blue small" onclick="add_tags();return false;"><?php echo lang($link,'them_the');?></button>

    <input name="tags" id="tags_val" type="hidden" value="<?php echo $tags_val; ?>" >
<script>
    $(document).ready(function(){
        $("#tags").keyup(function(){
            $.ajax({
                type: "POST",
                url: "<?php echo $url;?>/index.php",
                data:'function=autocoment&keyword='+$(this).val()+"&type_tag=<?php echo $type_tag;?>",
                beforeSend: function(){
                    $("#tags").css("background-image","url(<?php echo $url;?>/images/loading.gif)");
                    $("#tags").css("background-size","20px 20px");
                    $("#tags").css("background-repeat","no-repeat");
                    $("#tags").css("background-position","right center");
                },
                success: function(data){
                    if(data!=''){
                        $("#tags_autocomet").show();
                        $("#tags_autocomet").html(data);
                    }
                    $("#tags").css("background","#FFF");
                }
            });
        });
    });

    function select_tag(val) {
        $("#tags").val(val);
        $("#tags_autocomet").hide();
        add_tags();
    }

  function add_tags(){
    var txt_tag=$('#tags').val();
    var tags_val=$('#tags_val').val();
    if(txt_tag.length>=5){
        $('#content_tag').append('<div class="tag" onclick="del_tags(this);return false;">'+$('#tags').val()+'</div>');
        $('#tags').val('');
        tags_val=tags_val+txt_tag+',';
        $('#tags_val').val(tags_val);
    }else{
        swal("<?php echo lang($link,'loi'); ?>","<?php echo lang($link,'tip_err_the'); ?>", "error");
    }

  }
    function del_tags(emp){
        var txt=$(emp).html();
        var tags_val=$('#tags_val').val();
        tags_val=tags_val.replace(txt+',', "");
        $('#tags_val').val(tags_val);
        $(emp).remove();
    }
</script>
</div>
        </div>
    </div>