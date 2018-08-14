<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['adminuser']))
{
    header("Location:admin_login.html");
    exit();
}
?>

<html>
    <head>
        <title>
            admin management system
        </title>
    </head>
<body>

    <a href = "search_student_infor.php" target="iframe_a">search student infor</a><br>
    <a href = "add_newStudent.php" target="iframe_a">add new student</a><br>
    <a href = "all_students_infor.php" target="iframe_a">all students infor</a><br>
    <a href = "grade_management.php" target="iframe_a">grade management</a><br>
    <a href = "course_management.php" target="iframe_a">course management</a><br>
    <a href = "admin_loginoutRaction.php?a=logout">log out</a>
    
    <iframe height="400px" width="100%" src="" name="iframe_a"></iframe>

</body>
</html>