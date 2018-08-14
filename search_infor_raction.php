<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['adminuser']))
{
    header("Location:admin_login.html");
    exit();
}

include "db.php";

 if(isset($_REQUEST['studentID']) && $_REQUEST['studentID']!="")
 {
    $studentID = $_REQUEST['studentID'];
 }else
 {
    $studentID = $_GET['studentID'];
 }

$sql = "SELECT * FROM student WHERE studentID = '$studentID'";
$result = $conn->query($sql);
$row = $result->fetch_row();
$studentName = $row[1];
echo $studentID . $studentName ." report : <br>";

$sql = "SELECT * FROM sreport WHERE studentID = '$studentID'";
$result = $conn->query($sql);
echo "<table style ='border : solid 1px black;'>";
echo "<tr><th>cno</th><th>cname</th><th>mark</th></tr>";
while ($row = $result->fetch_row()) 
{
    echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
     <td><a href = 'search_edit_grade.php?studentID=$row[0]&cno=$row[1]'>edit</a></td><td><a href = 'search_grade_raction.php?a=delete&studentID=$row[0]&cno=$row[1]'>delete</a></td></tr>";
}
$conn->close();
 ?>