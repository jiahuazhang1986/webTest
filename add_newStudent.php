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

<form method="post" action="add_delete_newStudent_raction.php?a=add">
studentID: <input type = "text" name = "studentID">
<br>
studentName: <input type = "text" name ="studentName">
<br>
age: <input type = "text" name ="age">
<br>
gender: <input list="genders" name="gender">
    <datalist id="genders">
    <option value="male">
    <option value="female">
    </datalist>
<br>
department: <input type = "text" name ="department">
<br>

<input type = "submit" value = "submit">
</form>



</body>
</html>
