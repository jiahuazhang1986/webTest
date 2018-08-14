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

 $oldPassword = $_REQUEST['oldPassword'];
 $newPassword = $_REQUEST['newPassword'];
 $confirmNewPassword = $_REQUEST['confirmNewPassword'];
 $answer = $_REQUEST['answer'];
 $question = $_REQUEST['question'];

 $sql = "SELECT * FROM student WHERE studentID = '$studentID'";
 $result = $conn->query($sql);
 $row = $result->fetch_row();
if($oldPassword == $row[5])
{
    if($newPassword != $confirmNewPassword)
    {
    echo "<script>alert('not same password!')</script>";
    echo "<script>window.location = 'change_password.php'</script>";
    }
    else
    {
        $sql = "UPDATE student SET password = '$newPassword', answer = '$answer', question = '$question'  WHERE studentID = '$studentID'";
        $result = $conn->query($sql);
        if($result == TRUE)
        {
            echo "<script>alert('password changed!')</script>";
        }
    }
}
else
{
    echo "<script>alert('old password is wrong!')</script>";
    echo "<script>window.location = 'change_password.php'</script>";
}


 $conn->close();
 ?>