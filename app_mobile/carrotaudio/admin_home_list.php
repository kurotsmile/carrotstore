<form id="bar_search">
    <label><i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm </label>
    <input type="text" name="key">
    <input type="submit" value="Tìm kiếm">
    <input type="hidden" value="page_search" name="view">
</form>
<table class="table_full">
    <tr>
        <th>Tên tệp</th>
        <th>Loại</th>
        <th>Đường dẫn</th>
        <th>Ngày tạo</th>
        <th>Thao tác</th>
    </tr>
    <?php
    if(!isset($list_data_file)) {
        $list_data_file = mysqli_query($link, "SELECT * FROM `data_file` order by date desc LIMIT 0, 50");
    }
    while($row=mysqli_fetch_array($list_data_file)){
        echo '<tr>';
        echo '<td>';
        if($row['type']=='mp3'){
            echo '<i class="fa fa-music" aria-hidden="true"></i>';
        }else{
            echo '<i class="fa fa-file-o" aria-hidden="true"></i>';
        }
        echo ' <a href="'.$url.'/file/'.$row['name_file'].'">'.$row['name'].'</a>';
        echo '</td>';
        echo '<td>'.$row['type'].'</td>';
        echo '<td><a target="_blank"  href="'.$url.'/'.$row['path'].'">'.$row['path'].'</a></td>';
        echo '<td>'.$row['date'].'</td>';
        echo '<td>';
        echo '<a onclick="if (!confirm(\'Có chắc là sẽ xóa?\')){return false;}" href="'.$url.'/delete/'.$row['name_file'].'" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>';
        echo '<a onclick="check_file(\''.$url.'/'.$row['path'].'\')"  class="buttonPro small orange"><i class="fa fa-search" aria-hidden="true"></i> Kiểm tra</a>';
        echo '<a href="'.$url.'/edit/'.$row['name_file'].'"  class="buttonPro small yellow"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa thông tin</a>';
        echo '</td>';
        echo '<tr>';
    }
    ?>
</table>