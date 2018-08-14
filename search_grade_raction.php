<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['adminuser']))
{
    header("Location:admin_login.html");
    exit();
}

include "db.php";
 switch($_GET['a'])
 { 
    case "edit":
    {
        $mark= $_REQUEST['mark'];
        $studentID = $_GET['studentID'];
        $cno = $_GET['cno'];
        echo $studentID;
        echo $cno;
        $sql = "UPDATE sreport SET mark = '$mark' WHERE studentID =  $studentID AND cno = $cno"; 
        $result = $conn->query($sql);
        if ($result === TRUE)
            { 
                echo "<script>alert('edit report !')</script>";
                echo "<script>window.location = 'search_infor_raction.php?studentID=$studentID'</script>";
            }
            $conn->close();
        break;
    }

    case "delete":
    {
        $cno = $_GET['b'];
        $studentID = $_GET['studentID'];
        $cno = $_GET['cno'];
        $sql = "DELETE FROM sreport WHERE studentID = '$studentID' AND cno = '$cno'"; 
        $result = $conn->query($sql);
        echo $result;
        if ($result === TRUE)
            { 
                echo "<script>alert('delete report !')</script>";
                echo "<script>window.location = 'search_infor_raction.php?studentID=$studentID'</script>";
            }
            $conn->close();
            break;
    }


}


?>