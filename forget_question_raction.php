<?php
session_start();
include "db.php";
if(isset($_REQUEST['studentID']) && $_REQUEST['studentID']!="")
{
    $studentID = $_REQUEST['studentID'];
}
else
{
    $studentID = $_SESSION['forgetuser']['studentID'];
}

$sql = "SELECT * FROM student WHERE studentID = '$studentID'";
$result = $conn->query($sql);

if ($result->num_rows == 1)
{ 
    $user = $result->fetch_assoc();
    $_SESSION['forgetuser'] = $user;
    $question = $_SESSION['forgetuser']['question'];
    if($question == null)
    {
        echo "<script>alert('your password is your name!')</script>";      
        unset($_SESSION['studentuser']);
        $conn->close();
        echo "<script>window.location = 'student_login.html'</script>";
    }
    
}else
{
    echo "<script>alert('wrong ID!')</script>";
    $conn->close();
    echo "<script>window.location = 'student_login.html'</script>";
}



?>

<html>
<body>

<form method="post" action="forget_newPassword_raction.php">
<?php echo $question?>
<br>
answer: <input type = "text" name ="answer">
<br>
newPassword: <input type = "text" name ="newPassword">
<br>
confirmNewPassword: <input type = "text" name ="confirmNewPassword">
<br>
<input type = "submit" value = "submit">
</form>



</body>
</html>