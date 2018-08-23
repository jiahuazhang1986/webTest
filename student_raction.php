<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['studentuser']))
{
    header("Location:student_login.html");
    exit();
}
include "db.php";
switch ($_GET['a'])
{
    case "student_report":
    {
        
        $studentID = $_SESSION['studentuser']['studentID'];
        $sql = "SELECT * FROM student WHERE studentID = '$studentID'";
        $result = $conn->query($sql);
        $row = $result->fetch_row();
        $studentName = $row[1];
        $department = $row[4];
        echo "studentID: " . $studentID ."<br> studentName: " . $studentName . "<br> department: " . $department . " <br> report : <br>";
        
        $sql = "SELECT * FROM sreport WHERE studentID = '$studentID'";
        $result = $conn->query($sql);
        echo "<table style ='border : solid 1px black;'>";
        echo "<tr><th>cno</th><th>cname</th><th>mark</th></tr>";
        while ($row = $result->fetch_row()) 
        {
            echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
        }
        break;
    }

    case "change_password_face":
    {
        echo "<label for 'oldPassword'>oldPassword:</label>
            <input type = 'text' id ='oldPassword' name = 'oldPassword'><br>
            <label for 'newPassword'>newPassword:</label> 
            <input type = 'text' id ='newPassword' name = 'newPassword'><br>
            <label for 'confirmNewPassword'>confirmNewPassword:</label>  
            <input type = 'text' id ='confirmNewPassword' name = 'confirmNewPassword'><br>
            <label for 'question'>question:(example: what is your color?)</label> 
            <input type = 'text' id ='question' name = 'question'><br>
            <label for 'answer'>answer:</label>
            <input type = 'text' id ='answer' name = 'answer'><br>
            <label for 'email'>email:</label>
            <input type = 'text' id ='email' name = 'email'><br>
            <input type = 'button' onclick = 'change_password()' value = 'ok'>";
            break;
    }

    case "change_password":
    {

        $studentID = $_SESSION['studentuser']['studentID'];
    
        $oldPassword = $_REQUEST['oldPassword'];
        $newPassword = $_REQUEST['newPassword'];
        $confirmNewPassword = $_REQUEST['confirmNewPassword'];
        $answer = $_REQUEST['answer'];
        $question = $_REQUEST['question'];
        $email = $_REQUEST['email'];
        
        $sql = "SELECT * FROM student WHERE studentID = '$studentID'";
        $result = $conn->query($sql);
        if($result->num_rows == 1)
        {
            $row = $result->fetch_row();
            if($oldPassword == $row[5])
            {
                if($newPassword != $confirmNewPassword)
                {
                echo "not same password!";
                }
                else if($email == "")
                {
                    echo "email must fill!";
                }
                else
                {
                    $sql = "UPDATE student SET password = '$newPassword', answer = '$answer', question = '$question', email = '$email'  WHERE studentID = '$studentID'";
                    $result = $conn->query($sql);
                    if($result == TRUE)
                    {
                        echo "password changed!";
                    }
                }
            }
            else
            {
                echo "old password is wrong!";
            }
                
        }
        else
        {
            echo "something wrong";
        }
        break;
    }
        
}

$conn->close();
?>