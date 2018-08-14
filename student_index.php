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
    </head>
<body>

    <a href = "student_report.php?" target="iframe_a">student report</a><br>
    <a href = "change_password.php" target="iframe_a">change password</a><br>
    <a href = "student_loginoutRaction.php?a=logout">log out</a>
    
    <iframe height="400px" width="100%" src="" name="iframe_a"></iframe>

</body>
</html>