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
            die("<script>alert('not complete!')</script>, <script>window.location = 'add_course.php';</script>");
        }
        else
        {
            $sql = "SELECT * FROM course WHERE cno = '$cno' "; 
            $result = $conn->query($sql);
            $row = $result->fetch_row();
            if($cno == $row[0])
            {
                die("<script>alert('the course is already exist!')</script>, <script>window.location = 'add_course.php';</script>");
            }

            $sql = "INSERT INTO course (cno, cname) VALUES('$cno', '$cname')";
            $result = $conn->query($sql);
            if ($result === TRUE)
            { 
                echo "<script>alert('add new course!')</script>";
                echo "<script>window.location = 'add_course.php'</script>";
            }else
            {
                echo "insert failed";
            }
        }
        $conn->close();
    }

    case "delete":
    {
        $cno = $_GET['b'];
        $sql = "DELETE FROM course WHERE cno = '$cno'"; 
        $result = $conn->query($sql);
        echo $result;
        if ($result === TRUE)
            { 
                echo "<script>alert('delete $cno !')</script>";
                echo "<script>window.location = 'course_management.php'</script>";
            }
    }
    $conn->close();
}


?>