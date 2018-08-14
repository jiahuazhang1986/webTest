<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['adminuser'])){
    header("Location:admin_login.html");
    exit();
}

include "db.php";

$sql = "SELECT * FROM sreport ORDER BY studentID";
$result = $conn->query($sql);
echo "<table style ='border : solid 1px black;'>";
echo "<tr><th>studentID</th><th>cno</th><th>cname</th><th>mark</th><th><a href = 'add_grade.php'>ADD</a></th></tr>";
 while ($row = $result->fetch_row()) 
 {
     echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
     <td><a href = 'edit_grade.php?studentID=$row[0]&cno=$row[1]'>edit</a></td><td><a href = 'grade_raction.php?a=delete&studentID=$row[0]&cno=$row[1]'>delete</a></td></tr>";
 }

 $conn->close();
 ?>