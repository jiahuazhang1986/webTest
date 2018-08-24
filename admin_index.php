<?php
//开启session
session_start();
//判断session是否为空
if(empty($_SESSION['adminuser']))
{
    header("Location:admin_login.html");
    exit();
}
?>

<html>
<head>
<title>
admin management system
</title>
<script src="jquery.min.js"></script>
<script type="text/javascript"  src = "admin_helper.js"></script>
<style>
body{
    background-color: powderblue;
}
#head{
    background-color: #b1040e;
    position: fixed;
    padding:0px;
    top:0;
    width:100%;
    height:150px;

}
#container{ 
    position:relative;
    top: 115px;
    left:500px;
    
}
#div1{
    position: absolute;
    top: 200px;
    left:650px;
    
}

#div2{
    position: fixed;
    top: 300px;
    left:1100px;
    
}
#footer{
    background-color: #b1040e;
    position: fixed;
    bottom: 0;
    width:100%;

}
#container_footer{
    text-align:center;
    font-size:25;
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 10px;
    text-align: left;
}

table#tb01 {
    border : solid 1px black;
}

table#tb01 tr:nth-child(even) {
    background-color: #eee;
}
table#tb01 tr:nth-child(odd) {
   background-color: #fff;
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
</style>
</head>
<body>

<section id="head">
<div id="container">
<input type="button"  onclick="search_student_function()" value="search_student_info">
<input type="button" onclick="add_new_student()" value="add_new_student">
<input type="button" onclick="all_student_info()" value="all_student_info">
<input type="button" onclick="grade_management()" value="grade_management">
<input type="button" onclick="course_management()" value="成绩管理">
<a href = "admin_loginoutRaction.php?a=logout">log out</a>
</div>
</section>
<div id="div1"></div>
<div id="div2"></div>

<section id="footer">
<div id ="container_footer">
<p>nice university</P>
</div>
</section>


</body>
</html>