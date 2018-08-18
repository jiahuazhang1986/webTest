<?php

include "db.php";
if(isset($_REQUEST['studentID']) && $_REQUEST['studentID']!="")
{
    $studentID = $_REQUEST['studentID'];
}

$sql = "SELECT * FROM student WHERE studentID = '$studentID'";
$result = $conn->query($sql);

if ($result->num_rows == 1)
{ 
    $row = $result->fetch_row();
    $question = $row[6];
    if($question == "")
    {
        echo "your password is : $row[5]";      
        echo "<br><a href = 'student_login.html'>student_login</a>";
    }
    else
    {
        echo "
        $question
        <br>
        answer: <input type = 'text' id = 'answer' name ='answer'>
        <br>
        <input type = 'button' onclick = 'forget_password(\"$studentID\")' value = 'submit'>
        </form>";
    }
    
}else
{
    echo "wrong ID!";
    echo "<br><a href = 'student_login.html'>student_login</a>";
}
$conn->close();


?>
