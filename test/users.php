<?php
include "header.php";
include "functions.php";

echo header_html();
echo '<table>';
echo '<tr><th>ID</th><th>User name</th><th>Full name</th><th>Email</th><th>Password</th></tr>';
$result=mysqli_query($conn,"SELECT * FROM `user`");
while($row= mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['user_name'].'</td>';
    echo '<td>'.$row['full_name'].'</td>';
    echo '<td>'.$row['email'].'</td>';
    echo '<td>'.$row['password'].'</td>';
    echo '</tr>';
}
echo '</table>';
echo footer_html();

include "footer.php";
?>