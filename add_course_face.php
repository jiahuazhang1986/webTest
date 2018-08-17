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

<label for="cno">cno:</label>
<input id = "cno" type = "text" name = "cno">
<br>
<label for="cname">cname:</label>
<input id = "cname" type = "text" name ="cname">
<br>
<input type = "button" onclick = "addCourse()" value = "add">

</body>
</html>