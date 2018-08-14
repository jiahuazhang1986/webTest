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
 echo "<tr><th>cno</th><th>cname</th><th><a href = 'add_course.php'>AddCourse</a></th></tr>";
 while ($row = $result->fetch_row()) 
 {
     echo "<tr><td>$row[0]</td><td>$row[1]</td>
     <td><a href = 'add_delete_course_raction.php?a=delete&b=$row[0]'>delete</a></td></tr>";
     
 }
 $conn->close();
 ?>
 
<<!DOCTYPE html>
<html>
<head> 
<script>
function addcourse()
{
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "add_delete_course_raction.php?a=add", true);
    xhttp.send();
}
</script>
</head>
<body>
<button onclick="addcourse()">AddCourse</button>
</body>
</html>
 