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

<form method="post" action="add_delete_course_raction.php?a=add">
cno: <input type = "text" name = "cno">
<br>
cname: <input type = "text" name ="cname">
<br>
<input type = "submit" value = "submit">
</form>



</body>
</html>