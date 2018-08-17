<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['adminuser'])){
    header("Location:admin_login.html");
    exit();
}
?>

<html>
<body>


studentID: <input id = "studentID" type = "text" name = "studentID">
<br>
cno: <input id ="cno" type = "text" name = "cno">
<br>
cname: <input id = "cname" type = "text" name ="cname">
<br>
mark: <input id = "mark" type = "text" name ="mark">
<br>
<input type = "button" onclick = "addGrade()" value = "add">



</body>
</html>