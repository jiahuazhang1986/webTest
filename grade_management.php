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
echo "<tr><th>studentID</th><th>cno</th><th>cname</th><th>mark</th><th><input type = 'button' onclick = 'addGrade_face()' value ='ADD'></th></tr>";
 while ($row = $result->fetch_row()) 
 {
     echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
     <td><input type = 'button' onclick = 'editInfo(\"$row[0]\", \"$row[1]\")' value ='edit'></td><td><input type = 'button' onclick = 'deleteInfo(\"$row[0]\", \"$row[1]\")' value ='delete'></td></tr>";
 }

 $conn->close();
 ?>