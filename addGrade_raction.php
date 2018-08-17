<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['adminuser'])){
    header("Location:admin_login.html");
    exit();
}

include "db.php";
        

$studentID = $_REQUEST['studentID'];
$cno = $_REQUEST['cno'];
$cname= $_REQUEST['cname'];
$mark= $_REQUEST['mark'];

if( $studentID == ""|| $cno == ""|| $cname == "" || $mark == "" )
{
    echo "not compelte!";
}
else
{
    $sql = "SELECT * FROM sreport WHERE studentID = '$studentID' AND cno = '$cno' "; 
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
        echo "the course mark is already exist!";
    }
    else
    {
        $sql = "INSERT INTO sreport (studentID, cno, cname, mark) VALUES('$studentID', '$cno', '$cname', '$mark')";
        $result = $conn->query($sql);
        if ($result === TRUE)
        { 
            echo "add new report!";
        }else
        {
            echo "insert failed";
        }
    }
    
}
$conn->close();


?>