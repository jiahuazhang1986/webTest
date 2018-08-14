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

<form method="post" action="search_infor_raction.php">
studentID: <input type = "text" name = "studentID">
<br>
<input type = "submit" value = "search">
</form>



</body>
</html>