<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['adminuser'])){
    header("Location:admin_login.html");
    exit();
}

include "db.php";
switch($_GET['a'])
{ 
    case "add":
    {
        $cno = $_REQUEST['cno'];
        $cname= $_REQUEST['cname'];

        if(!$cno||!$cname)
        {
            echo "not complete!";
        }
        else
        {
            $sql = "SELECT * FROM course WHERE cno = '$cno' "; 
            $result = $conn->query($sql);
            if($result->num_rows == 1)
            {
                echo "the course is already exist";
            }

            $sql = "INSERT INTO course (cno, cname) VALUES('$cno', '$cname')";
            $result = $conn->query($sql);
            if ($result === TRUE)
            { 
                echo "add new course!";
            }else
            {
                echo "insert failed";
            }
        }
        break;
    }

    case "delete":
    {
        $cno = $_REQUEST['cno'];
        $sql = "DELETE FROM course WHERE cno = '$cno'"; 
        $result = $conn->query($sql);
        echo $result;
        if ($result === TRUE)
            { 
                echo "delete course!";
            }
        break;
    }
    $conn->close();
}


?>