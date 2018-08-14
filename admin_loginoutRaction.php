<?php
session_start();
switch($_GET['a'])
{
    case "login":
    {
        include "db.php";
        $name = $_REQUEST['adminID'];
        $id_password = $_REQUEST['password'];
        //mysql_set_charset('utf8');
        $sql = "SELECT * FROM admin WHERE id = '$name' AND password = '$id_password'"; 
        $result = $conn->query($sql);

        if ($result->num_rows == 1)
        { 
            $user = $result->fetch_assoc();
            $_SESSION['adminuser'] = $user;
            header("Location:admin_index.php");
        }
        else
        {
            header("Location:admin_login.html");
        } 

        $conn->close();
        break;
        
    }
    case "logout":
    {
        unset($_SESSION['adminuser']);
        header('Location:admin_login.html');
        break;
    }
    
}
?>