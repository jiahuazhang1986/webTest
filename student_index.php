<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['studentuser']))
{
    header("Location:student_login.html");
    exit();
}

$studentName = $_SESSION['studentuser']['studentName'];
echo "hello, " . $studentName;


?>
<html>
<head>
<title>
student management system
</title>
<script src = "jquery.min.js"></script>
<script  src = "student_helper.js"></script>
<style>
body{
    background-color: powderblue;
}
#container{
    position: relative;
    top: 200px;
    left:600px;
}
#div1{
    position: relative;
    top: 250px;
    left:650px;
    
}

#div2{
    position: relative;
    top: 300px;
    left:1100px;
    
}
input{
    border: 1px solid #ccc; 
    padding: 7px 3px;
    border-radius: 5px; /*css3属性IE不支持*/
    padding-left:5px; 
}
button{
    border: 1px solid #ccc; 
    padding: 7px 3px;
    border-radius: 5px; /*css3属性IE不支持*/
    padding-left:5px; 
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 10px;
    text-align: left;
}

table.tb01 {
    border : solid 1px black;
}

table.tb01 tr:nth-child(even) {
    background-color: #eee;
}
table.tb01 tr:nth-child(odd) {
   background-color: #fff;
}
</style>
</head>
<body>
<div id = "container">
<input type = "button" onclick = "student_report()" value = "student_report">
<input type = "button" onclick = "change_password_face()" value = "change_password">
<a href = "student_loginoutRaction.php?a=logout">log out</a>
</div>
<div id="div1"></div>
<div id="div2"></div>

</body>
</html>