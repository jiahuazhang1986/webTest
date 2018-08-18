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

if($result->num_rows == 1)
{ 
    $row = $result->fetch_row();
    echo "hello, " . $row[1] . "<br>";
}
else
{
    die("<script>alert('wrong ID ')</script>, <script>window.location = 'student_login.html';</script>");
}

$conn->close();

?>
<html>
    <head>
        <title>
            student management system
        </title>
        <script type="text/javascript"  src = "student_helper.js"></script>
    </head>
<body>

<input type = "button" onclick = "student_report()" value = "student_report">
<input type = "button" onclick = "change_password_face()" value = "change_password">
<a href = "student_loginoutRaction.php?a=logout">log out</a>
<div id="div1"></div>
<div id="div2"></div>

</body>
</html>