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
        $studentName= $_REQUEST['studentName'];
        $age = $_REQUEST['age'];
        $gender = $_REQUEST['gender'];
        $department = $_REQUEST['department'];
        $password = $_REQUEST['studentName'];
        if(!$studentID||!$studentName||!$age||!$gender||!$department)
        {
            die("<script>alert('not complete!')</script>, <script>window.location = 'add_newStudent.php';</script>");
        }
        else
        {
            $sql = "SELECT * FROM student WHERE studentID = '$studentID' "; 
            $result = $conn->query($sql);
            $row = $result->fetch_row();
            if($studentID == $row[0])
            {
                die("<script>alert('the student is already exist!')</script>, <script>window.location = 'add_newStudent.php';</script>");
            }

            $sql = "INSERT INTO student (studentID, studentName, age, gender, department, password) VALUES('$studentID', '$studentName', '$age', '$gender', '$department', '$password')";
            $result = $conn->query($sql);
            if ($result === TRUE)
            { 
                echo "<script>alert('insert new student successfully!')</script>";
                echo "<script>window.location = 'add_newStudent.php'</script>";
            }else
            {
                echo "insert failed";
            }
        }
        $conn->close();
    }

    case "delete":
    {
        $studentID = $_GET['b'];
        $sql = "DELETE FROM student WHERE studentID = '$studentID'"; 
        $result = $conn->query($sql);
        if ($result === TRUE)
            { 
                echo "<script>alert('delete!')</script>";
                echo "<script>window.location = 'all_students_infor.php'</script>";
            }
    }
    $conn->close();
}


?>