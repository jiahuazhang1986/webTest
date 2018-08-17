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
        <script src = "helper.js"></script>
        <script>
        
        function search_student_function()
        {
            document.getElementById('div1').innerHTML="";
            document.getElementById('div2').innerHTML="";
            var btn = document.createElement("BUTTON");        // Create a <button> element
            var t = document.createTextNode("CLICK ME");       // Create a text node
            btn.appendChild(t);                                // Append the text to <button>
            btn.onclick = function()
                        {
                            var studentID = document.getElementById("inputID1").value;
                            if (studentID=="")
                            {
                                document.getElementById("div1").innerHTML="";
                                return;
                            } 
                            xmlhttp=new XMLHttpRequest();
                        
                            xmlhttp.onreadystatechange=function()
                            {
                                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                {
                                    document.getElementById("div1").innerHTML=xmlhttp.responseText;
                                }
                            }
                            xmlhttp.open("GET","admin_raction.php?a=search_infor_raction&studentID="+studentID,true);
                            xmlhttp.send();
                        };

            var input1 = document.createElement("INPUT");
            input1.type = "text";
            input1.id = "inputID1";

            var element = document.getElementById("div1");
            element.appendChild(document.createTextNode("studentID:"));
            element.appendChild(document.createElement("br"));
            element.appendChild(input1);
            element.appendChild(btn);
        }

        function add_new_student()
        {
            document.getElementById('div1').innerHTML="";
            document.getElementById('div2').innerHTML="";
            var studentID = document.createElement("input");
            studentID.type = "text";
            studentID.id = "studentID";

            var studentName = document.createElement("input");
            studentName.type = "text";
            studentName.id = "studentName";

            var age = document.createElement("input");
            age.type = "text";
            age.id = "age";

            var gender = document.createElement("input");
            gender.type = "text";
            gender.id = "gender";

            var department = document.createElement("input");
            department.type = "text";
            department.id = "department";

            var btn = document.createElement("button");
            var t = document.createTextNode("click me");
            btn.appendChild(t);
            btn.onclick = function()
                        {
                            var studentID = document.getElementById("studentID").value;
                            var studentName = document.getElementById("studentName").value;
                            var age = document.getElementById("age").value;
                            var gender = document.getElementById("gender").value;
                            var department = document.getElementById("department").value;
                            document.getElementById("studentID").value ="";
                            document.getElementById("studentName").value ="";
                            document.getElementById("age").value ="";
                            document.getElementById("gender").value ="";
                            document.getElementById("department").value ="";
                            if (studentID==""||studentName == ""||age ==""||gender ==""||department =="")
                            {
                                document.getElementById("div2").innerHTML="not complete!";
                                return;
                            } 

                            xmlhttp=new XMLHttpRequest();
                        
                            xmlhttp.onreadystatechange=function()
                            {
                                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                {
                                    document.getElementById("div2").innerHTML=xmlhttp.responseText;
                                }
                            }
                            xmlhttp.open("GET","admin_raction.php?a=addNew&studentID="+studentID+"&studentName="+studentName+"&age="+age+"&gender="+gender+"&department="+department,true);
                            xmlhttp.send();
                        };
            var element = document.getElementById("div1");
            element.appendChild(document.createTextNode("studentID:"));
            element.appendChild(studentID);
            element.appendChild(document.createElement("br"));
            element.appendChild(document.createTextNode("studentName:"));
            element.appendChild(studentName);
            element.appendChild(document.createElement("br"));
            element.appendChild(document.createTextNode("age:"));
            element.appendChild(age);
            element.appendChild(document.createElement("br"));
            element.appendChild(document.createTextNode("gender:"));
            element.appendChild(gender);
            element.appendChild(document.createElement("br"));
            element.appendChild(document.createTextNode("department:"));
            element.appendChild(department);
            element.appendChild(document.createElement("br"));
            element.appendChild(btn);
        }
        function all_student_info()
        {
            document.getElementById('div1').innerHTML="";
            document.getElementById('div2').innerHTML="";
            xmlhttp=new XMLHttpRequest();
                        
            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    document.getElementById("div1").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","admin_raction.php?a=all_students_info",true);
            xmlhttp.send();
                    
        }

        function grade_management()
        {
            document.getElementById('div1').innerHTML="";
            document.getElementById('div2').innerHTML="";
            xmlhttp=new XMLHttpRequest();
                        
            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    document.getElementById("div1").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","grade_management.php",true);
            xmlhttp.send();
        }

        function course_management()
        {
            document.getElementById('div1').innerHTML="";
            document.getElementById('div2').innerHTML="";
            xmlhttp=new XMLHttpRequest();
                        
            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    document.getElementById("div1").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","course_management.php",true);
            xmlhttp.send();
        }
        </script>
    </head>
<body>



<input type="button" onclick="search_student_function()" value="search_student_info">
<input type="button" onclick="add_new_student()" value="add_new_student">
<input type="button" onclick="all_student_info()" value="all_student_info">
<input type="button" onclick="grade_management()" value="grade_management">
<input type="button" onclick="course_management()" value="成绩管理">
<a href = "admin_loginoutRaction.php?a=logout">log out</a>

<div id="div1"></div>
<div id="div2"></div>

</body>
</html>