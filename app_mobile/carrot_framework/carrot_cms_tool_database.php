<div class="cms_tool_page">
    <a class="buttonPro small" onclick="syn_database();"><i class="fa fa-level-down" aria-hidden="true"></i> Kiểm tra đồng bộ</a>
    <a id="btn_show_table_update" style="display:none" class="buttonPro small" onclick="show_table_update();"><i class="fa fa-long-arrow-up" aria-hidden="true"></i> Hiện các bảng thiếu dữ liệu</a>
</div>
<?php
$query_name_database=mysqli_query($this->link_mysql,"SELECT database() AS the_db");
$data_name_database=mysqli_fetch_assoc($query_name_database);
$name_database=$data_name_database['the_db'];
$name_sel_table='Tables_in_'.$name_database;

$query_username=mysqli_query($this->link_mysql,"select user();");
$data_username=mysqli_fetch_assoc($query_username);
$user_name=$data_username["user()"];
$user_name=str_replace("@localhost","",$user_name);
$query_tabel=mysqli_query($this->link_mysql,"SHOW TABLES;");
$index_emp=0;
while($table=mysqli_fetch_assoc($query_tabel)){
    $name_table=$table[$name_sel_table];
    $table_count=$this->q_data("SELECT COUNT(*) as c FROM $name_database.`$name_table` LIMIT 1");
    $link_view=$this->url_carrot_store.'/adminer.php?username='.$user_name.'&db='.$name_database.'&select='.$name_table;
    $link_download=$this->url_syn.'/adminer.php?username=carrotsy_carrot&db='.$name_database.'&dump='.$name_table;
    ?>
    <div class="db_table" syn_table="<?php echo $name_table;?>" syn_db="<?php echo $name_database;?>" emp_count="<?php echo $table_count['c'];?>">
        <a onclick="$(this).addClass('black')" target="_blank" href="<?php echo $link_view;?>" class="buttonPro small"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
        <a onclick="$(this).addClass('black')" target="_blank" href="<?php echo $link_download;?>" class="buttonPro small"><i class="fa fa-download" aria-hidden="true"></i></a>
        <i class="fa fa-cube" aria-hidden="true"></i> <?php echo $name_table;?>
        <span class="count" id="emp_count_<?php echo $index_emp;?>"><?php echo $table_count['c'];?></span>
        <span class="count_syn" id="emp_count_syn_<?php echo $index_emp;?>"><i class="fa fa-long-arrow-down" aria-hidden="true"></i> <?php echo $table_count['c'];?></span>
    </div>
<?php
    $index_emp++;
}
?>
<script>
    var is_show_update=false;

    function syn_database(){
        var arr_table=[];
        var arr_db=[];
        var s_table="";

        $(".db_table").each(function(){
            var syn_table=$(this).attr("syn_table");
            var syn_db=$(this).attr("syn_db");
            arr_table.push(syn_table);
            arr_db.push(syn_db);
        }); 

        s_table=JSON.stringify(arr_table);
        s_db=JSON.stringify(arr_db);

        $.ajax({
            url:"<?php echo $this->url_syn;?>/app_mobile/carrot_framework/ajax_syn.php",
            type:"post",
            data:{function:'syn_database',arr_table:s_table,arr_db:s_db},
            success:function(data, textStatus, jqXHR){
                var obj=JSON.parse(data);
                var all_item=obj.all_item;
                $(".db_table").each(function(index){
                    var c_emp=$(this).attr("emp_count");
                    var txt_show_count="";
                    var count_emp=parseInt(c_emp);
                    var c_syn=all_item[index].c;
                    var c_show=0;

                    if(c_syn==count_emp) txt_show_count="<i style='color:green' class='fa fa-check-circle' aria-hidden='true'></i>";

                    if(c_syn>count_emp){
                        c_show=c_syn-count_emp;
                        txt_show_count="<i style='color:red' class='fa fa-long-arrow-up' aria-hidden='true'></i>"+c_show;
                        $(this).addClass("update");
                    }

                    if(c_syn<count_emp){
                        c_show=count_emp-c_syn;
                        txt_show_count="<i style='color:blue' class='fa fa-long-arrow-down' aria-hidden='true'></i>"+c_show;
                    }

                    $("#emp_count_syn_"+index).css("display","unset");
                    $("#emp_count_syn_"+index).html(txt_show_count);
                    $("#btn_show_table_update").show();
                });
            }
        });
    }

    function show_table_update(){
        if(is_show_update==false){
            $(".db_table").hide();
            $(".update").show();
            is_show_update=true;
        }else{
            $(".db_table").show();
            is_show_update=false;
        }
    }
</script>