<?php
session_start();
switch($_GET['a'])
{
    case "login":
    {
        include "db.php";

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
            header("Location:student_login.html");
        } 

        
        break;
        
    }
    case "logout":
    {
        unset($_SESSION['studentuser']);
        header('Location:student_login.html');
        break;
    }
    $conn->close();
}
?>