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
        $studentID = $_REQUEST['studentID'];
        $cno = $_REQUEST['cno'];
        $cname= $_REQUEST['cname'];
        $mark= $_REQUEST['mark'];

        if(!$studentID||!$cno||!$cname||!$mark)
        {
            die("<script>alert('not complete!')</script>, <script>window.location = 'add_grade.php';</script>");
        }
        else
        {
            $sql = "SELECT * FROM sreport WHERE studentID = '$studentID' AND cno = '$cno' "; 
            $result = $conn->query($sql);
            if($result->num_rows > 0)
            {
                die("<script>alert('the course mark is already exist!')</script>, <script>window.location = 'add_grade.php';</script>");
            }

            $sql = "INSERT INTO sreport (studentID, cno, cname, mark) VALUES('$studentID', '$cno', '$cname', '$mark')";
            $result = $conn->query($sql);
            if ($result === TRUE)
            { 
                echo "<script>alert('add new report!')</script>";
                echo "<script>window.location = 'add_grade.php'</script>";
            }else
            {
                echo "insert failed";
            }
        }
        $conn->close();
        break;
    }

    case "edit":
    {
        $mark= $_REQUEST['mark'];
        $studentID = $_GET['studentID'];
        $cno = $_GET['cno'];
        $sql = "UPDATE sreport SET mark = '$mark' WHERE studentID =  $studentID AND cno = $cno"; 
        $result = $conn->query($sql);
        if ($result === TRUE)
            { 
                echo "<script>alert('edit report !')</script>";
                echo "<script>window.location = 'grade_management.php'</script>";
            }
            $conn->close();
        break;
    }

    case "delete":
    {
        $studentID = $_GET['studentID'];
        $cno = $_GET['cno'];
        $sql = "DELETE FROM sreport WHERE studentID = '$studentID' AND cno = '$cno'"; 
        $result = $conn->query($sql);
        echo $result;
        if ($result === TRUE)
            { 
                echo "<script>alert('delete report !')</script>";
                echo "<script>window.location = 'grade_management.php'</script>";
            }
            $conn->close();
            break;
    }

    
}


?>