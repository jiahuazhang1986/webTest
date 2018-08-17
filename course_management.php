<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['adminuser'])){
    header("Location:admin_login.html");
    exit();
}

include "db.php";
 $sql = "SELECT * FROM course ORDER BY cno";
 $result = $conn->query($sql);
 echo "<table style ='border : solid 1px black;'>";
 echo "<tr><th>cno</th><th>cname</th><th><input type = 'button' onclick = 'addCourse_face()' value = 'AddCourse'></th></tr>";
 while ($row = $result->fetch_row()) 
 {
     echo "<tr><td>$row[0]</td><td>$row[1]</td>
     <td><input type = 'button' onclick = 'deleteCourse(\"$row[0]\")' value = 'delete'></td></tr>";
     
 }
 $conn->close();
 ?>
 

 