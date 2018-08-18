<?php
include "db.php";
$studentID = $_REQUEST['studentID'];
$answer = $_REQUEST['answer'];

$sql = "SELECT * FROM student WHERE studentID = '$studentID'";
$result = $conn->query($sql);
if($result->num_rows >0)
{
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if($answer == $row['answer'])
    {
        //$to = $row['email'];
        //$subject = "student get password";
        //$message = "Hello! your password is: $row['password']";
        //$from = "someonelse@example.com";
        //$headers = "From:" . $from;
        //mail($to,$subject,$message,$headers);
        echo "mail sent to:" . $row['email'];
        echo "<br>subject is:student get password";
        echo "<br>message is: Hello! your password is:" . $row['password'];
        echo "<br>from:server@example.com";
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