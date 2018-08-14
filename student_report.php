<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['studentuser']))
{
    header("Location:student_login.html");
    exit();
}

 include "db.php";
 $studentID = $_SESSION['studentuser']['studentID'];
 $sql = "SELECT * FROM student WHERE studentID = '$studentID'";
 $result = $conn->query($sql);
 $row = $result->fetch_row();
 $studentName = $row[1];
 $department = $row[4];
 echo "studentID: " . $studentID ."<br> studentName: " . $studentName . "<br> department: " . $department . " <br> report : <br>";
 
 $sql = "SELECT * FROM sreport WHERE studentID = '$studentID'";
 $result = $conn->query($sql);
 echo "<table style ='border : solid 1px black;'>";
 echo "<tr><th>cno</th><th>cname</th><th>mark</th></tr>";
 while ($row = $result->fetch_row()) 
 {
     echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
 }
 $conn->close();
  ?>