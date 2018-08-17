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
    case "search_infor_raction":
    { 
        if(isset($_REQUEST['studentID']) && $_REQUEST['studentID']!="")
        {
           $studentID = $_REQUEST['studentID'];
        }else
        {
           $studentID = $_GET['studentID'];
        }

        $sql = "SELECT * FROM student WHERE studentID = '$studentID'";
        $result = $conn->query($sql);
        $row = $result->fetch_row();
        $studentName = $row[1];
        echo $studentID . $studentName ." report : <br>";

        $sql = "SELECT * FROM sreport WHERE studentID = '$studentID'";
        $result = $conn->query($sql);
        echo "<table style ='border : solid 1px black;'>";
        echo "<tr><th>cno</th><th>cname</th><th>mark</th></tr>";
        while ($row = $result->fetch_row()) 
        {
            echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
             <td><input type = 'button' onclick = 'editInfo(\"$row[0]\", \"$row[1]\")' value ='edit'></td><td><input type = 'button' onclick = 'deleteInfo(\"$row[0]\", \"$row[1]\")' value ='delete'></td></tr>";
        }
        break;
    }

    case "search_deleteInfo":
    {
        $cno = $_GET['cno'];
        $studentID = $_GET['studentID'];
        $sql = "DELETE FROM sreport WHERE studentID = '$studentID' AND cno = '$cno'"; 
        $result = $conn->query($sql);
        echo $result;
        if ($result === TRUE)
            { 
                echo "delete report !";
            }
        break;
    }

    case "submitMark":
    {
        $mark= $_REQUEST['mark'];
        $studentID = $_REQUEST['studentID'];
        $cno = $_REQUEST['cno'];

        $sql = "UPDATE sreport SET mark = '$mark' WHERE studentID =  $studentID AND cno = $cno"; 
        $result = $conn->query($sql);
        if ($result === TRUE)
            { 
                echo "edit report !";
            }
        break;
    }
    case "editInfo_face":
    {
        $studentID = $_GET['studentID'];
        $cno = $_GET['cno'];
        
        echo "studentID : <?php echo $studentID?> & cno:<?php echo $cno?> <br>";
        echo "mark: <input id = 'markID' type = 'text' name ='mark'>
        <br>
        <input type = 'button' onclick = 'submitMark(<?php echo $studentID ?>, <?php echo $cno ?>)' value = 'submit'>";
        break;
    }
    case "addNew":
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
    case "all_students_info":
    {
        $sql = "SELECT * FROM student ORDER BY studentID";
        $result = $conn->query($sql);
        echo "<table style ='border : solid 1px black;'>";
        echo "<tr><th>studentID</th><th>studentName</th><th>age</th><th>gender</th><th>department</th></tr>";
        while ($row = $result->fetch_row()) 
        {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td>
            <td><input type='button' onclick='deleteNew(\"$row[0]\")' value='delete'></td></tr>";
        }
        break;
    }
    case "deleteNew":
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
}
$conn->close();
 ?>