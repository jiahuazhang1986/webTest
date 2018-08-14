<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['forgetuser']))
{
    header("Location:student_login.html");
    exit();
}

$studentID = $_SESSION['forgetuser']['studentID'];
$answer = $_REQUEST['answer'];
$newPassword = $_REQUEST['newPassword'];
$confirmNewPassword = $_REQUEST['confirmNewPassword'];

if($newPassword != $confirmNewPassword)
{
    echo "<script>alert('not same password, refill it!')</script>";
    echo "<script>window.location = 'forget_question_raction.php'</script>";
}
else
{
    if($answer == $_SESSION['forgetuser']['answer'])
    {
        $txt = sprintf("<script>alert('your password is: %s')</script>", $_SESSION['forgetuser']['password']);
        echo $txt;
    }
    else
    {
        echo "<script>alert('your answer is not correct!')</script>";
    }
    unset($_SESSION['studentuser']);
    echo "<script>window.location = 'student_login.html'</script>";
}


?>