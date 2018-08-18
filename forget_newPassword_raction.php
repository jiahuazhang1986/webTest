<?php
include "db.php";
$studentID = $_REQUEST['studentID'];
$answer = $_REQUEST['answer'];

$sql = "SELECT * FROM student WHERE studentID = '$studentID'";
$result = $conn->query($sql);
if($result->num_rows >0)
{
    $row = $result->fetch_row();
    if($answer == $row[7])
    {
        echo "your password is:$row[5]";
        echo "<br><a href = 'student_login.html'>student_login</a>";
    }
    else
    {
        echo "your answer is not correct!";
        echo "<br><a href = 'student_login.html'>student_login</a>";
    }
}

$conn->close();

?>