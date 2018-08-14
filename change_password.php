<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['studentuser']))
{
    header("Location:student_login.html");
    exit();
}


?>
<html>
    <body>
        <form method="post" action="change_password_raction.php">
        old password: <input type = "text" name = "oldPassword">
        <br>
        new password: <input type = "text" name = "newPassword">
        <br>
        confirm new password: <input type = "text" name = "confirmNewPassword">
        <br>
        question:(example: what is your color?)
        <input type = "text" name = "question">
        <br>
        answer: <input type = "text" name = "answer">
        <input type = "submit" value = "ok">
        </form>
    </body>
</html>