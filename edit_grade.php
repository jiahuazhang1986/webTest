<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['adminuser'])){
    header("Location:admin_login.html");
    exit();
}
?>

<html>
<body>
<?php
$studentID = $_GET['studentID'];
$cno = $_GET['cno'];
?>
<form method="post" action="grade_raction.php?a=edit&studentID=<?php echo $studentID?>&cno=<?php echo $cno?>">
    studentID : <?php echo $studentID?> & cno:<?php echo $cno?> <br>
mark: <input type = "text" name ="mark">
<br>
<input type = "submit" value = "submit">
</form>



</body>
</html>