<?php
session_start();
include "db.php";
switch($_GET['a'])
{
    case "login":
    {
        $studentID = $_REQUEST['studentID'];
        $id_password = $_REQUEST['password'];

        //mysql_set_charset('utf8');
        $sql = "SELECT * FROM student WHERE studentID = '$studentID' AND password = '$id_password'"; 
        $result = $conn->query($sql);

        if ($result->num_rows == 1)
        { 
            $user = $result->fetch_assoc();
            $_SESSION['studentuser'] = $user;

            header("Location:student_index.php");
        }
        else
        {
            echo "<script>alert('wrong id or password')</script>";
            //header("Location:student_login.html");
            echo"<script>window.location = 'student_login.html'</script>";
        } 

        
        break;
        
    }
    case "logout":
    {
        unset($_SESSION['studentuser']);
        header('Location:student_login.html');
        break;
    }
    
}
$conn->close();
?>