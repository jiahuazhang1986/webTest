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

        $sql = "SELECT * FROM student WHERE studentID = '$studentID' "; 
        $result = $conn->query($sql);
        if($result->num_rows ==1)
        {
            echo 'the student is already exist!';
        }
        else
        {
            $sql = "INSERT INTO student (studentID, studentName, age, gender, department, password) VALUES('$studentID', '$studentName', '$age', '$gender', '$department', '$password')";
            $result = $conn->query($sql);
            if ($result === TRUE)
            { 
                echo "insert new student successfully!";
            }else
            {
                echo "insert failed";
            }
        }
        
        break;
    }

    case "delete":
    {
        $studentID = $_REQUEST['studentID'];
        $sql = "DELETE FROM student WHERE studentID = '$studentID'"; 
        $result = $conn->query($sql);
        if ($result === TRUE)
            { 
                $sql = "DELETE FROM sreport WHERE studentID = '$studentID'";
                $result = $conn->query($sql);
                if ($result === TRUE)
                { 
                   echo "delete";
                }
            }
            break;
    }
    $conn->close();
}


?>