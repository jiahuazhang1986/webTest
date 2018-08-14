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

<form method="post" action="grade_raction.php?a=add">
studentID: <input type = "text" name = "studentID">
<br>
cno: <input type = "text" name = "cno">
<br>
cname: <input type = "text" name ="cname">
<br>
mark: <input type = "text" name ="mark">
<br>
<input type = "submit" value = "submit">
</form>



</body>
</html>