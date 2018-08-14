<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['adminuser'])){
    header("Location:admin_login.html");
    exit();
}

include "db.php";
$sql = "SELECT * FROM student ORDER BY studentID";
$result = $conn->query($sql);

echo "<table style ='border : solid 1px black;'>";
echo "<tr><th>studentID</th><th>studentName</th><th>age</th><th>gender</th><th>department</th></tr>";
while ($row = $result->fetch_row()) 
{
    echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td>
    <td><a href = 'add_delete_newStudent_raction.php?a=delete&b=$row[0]'>delete</a></td></tr>";
    
}
$conn->close();
?>