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
<script src="jquery.min.js"></script>
<script type="text/javascript"  src = "admin_helper.js"></script>
<style>
body{
    background-color: powderblue;
}
#container{
    position: relative;
    top: 200px;
    left:500px;
}
#div1{
    position: relative;
    top: 250px;
    left:650px;
    
}

#div2{
    position: relative;
    top: 300px;
    left:1100px;
    
}

</style>
</head>
<body>


<div id="container">
<input type="button"  onclick="search_student_function()" value="search_student_info">
<input type="button" onclick="add_new_student()" value="add_new_student">
<input type="button" onclick="all_student_info()" value="all_student_info">
<input type="button" onclick="grade_management()" value="grade_management">
<input type="button" onclick="course_management()" value="成绩管理">
<a href = "admin_loginoutRaction.php?a=logout">log out</a>
</div>
<div id="div1"></div>
<div id="div2"></div>


</body>
</html>