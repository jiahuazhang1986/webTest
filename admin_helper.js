function search_student_function()
        {
            $("#div1").html("");
            $("#div2").html("");

        
            //document.getElementById('div1').innerHTML="";
            //document.getElementById('div2').innerHTML="";
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
                            $("#div1").load("admin_raction.php?a=search_infor_raction&studentID="+studentID);
                            //xmlhttp=new XMLHttpRequest();
                        //
                            //xmlhttp.onreadystatechange=function()
                            //{
                            //    if (xmlhttp.readyState==4 && xmlhttp.status==200)
                            //    {
                            //        document.getElementById("div1").innerHTML=xmlhttp.responseText;
                            //    }
                            //}
                            //xmlhttp.open("GET","admin_raction.php?a=search_infor_raction&studentID="+studentID,true);
                            //xmlhttp.send();
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
            $("#div1").html("");
            $("#div2").html("");
            //document.getElementById('div1').innerHTML="";
            //document.getElementById('div2').innerHTML="";
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
                            
                            $("#div2").load("admin_raction.php?a=addNew&studentID="+studentID+"&studentName="+studentName+"&age="+age+"&gender="+gender+"&department="+department);
                            //xmlhttp=new XMLHttpRequest();
                        //
                            //xmlhttp.onreadystatechange=function()
                            //{
                            //    if (xmlhttp.readyState==4 && xmlhttp.status==200)
                            //    {
                            //        document.getElementById("div2").innerHTML=xmlhttp.responseText;
                            //    }
                            //}
                            //xmlhttp.open("GET","admin_raction.php?a=addNew&studentID="+studentID+"&studentName="+studentName+"&age="+age+"&gender="+gender+"&department="+department,true);
                            //xmlhttp.send();
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
            $("#div1").html("");
            $("#div2").html("");
            //document.getElementById('div1').innerHTML="";
            //document.getElementById('div2').innerHTML="";
            $("#div1").load("admin_raction.php?a=all_students_info");
            //xmlhttp=new XMLHttpRequest();
            //            
            //xmlhttp.onreadystatechange=function()
            //{
            //    if (xmlhttp.readyState==4 && xmlhttp.status==200)
            //    {
            //        document.getElementById("div1").innerHTML=xmlhttp.responseText;
            //    }
            //}
            //xmlhttp.open("GET","admin_raction.php?a=all_students_info",true);
            //xmlhttp.send();
                    
        }

        function grade_management()
        {
            $("#div1").html("");
            $("#div2").html("");
            //document.getElementById('div1').innerHTML="";
            //document.getElementById('div2').innerHTML="";
            $("#div1").load("admin_raction.php?a=grade_management");
            //xmlhttp=new XMLHttpRequest();
            //            
            //xmlhttp.onreadystatechange=function()
            //{
            //    if (xmlhttp.readyState==4 && xmlhttp.status==200)
            //    {
            //        document.getElementById("div1").innerHTML=xmlhttp.responseText;
            //    }
            //}
            //xmlhttp.open("GET","admin_raction.php?a=grade_management",true);
            //xmlhttp.send();
        }

        function course_management()
        {
            $("#div1").html("");
            $("#div2").html("");
            //document.getElementById('div1').innerHTML="";
            //document.getElementById('div2').innerHTML="";
            $("#div1").load("admin_raction.php?a=course_management");
            //xmlhttp=new XMLHttpRequest();
            //            
            //xmlhttp.onreadystatechange=function()
            //{
            //    if (xmlhttp.readyState==4 && xmlhttp.status==200)
            //    {
            //        document.getElementById("div1").innerHTML=xmlhttp.responseText;
            //    }
            //}
            //xmlhttp.open("GET","admin_raction.php?a=course_management",true);
            //xmlhttp.send();
        }

function deleteNew(studentID)
{
    $("#div2").load("admin_raction.php?a=deleteNew&studentID="+studentID);
    all_student_info();
    //xmlhttp = new XMLHttpRequest();
    //                
    //    xmlhttp.onreadystatechange=function()
    //    {
    //        if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //        {
    //            //console.log(xmlhttp.responseText);
    //            document.getElementById("div2").innerHTML=xmlhttp.responseText;
    //            all_student_info();
    //        }
    //    }
    //    xmlhttp.open("GET","admin_raction.php?a=deleteNew&studentID="+studentID, true);
    //    xmlhttp.send();
}

function editInfo_searchNew(studentID, cno)
{
    $("#div2").load("admin_raction.php?a=editInfo_face_searchNew&studentID="+studentID+"&cno="+cno);
    //xmlhttp = new XMLHttpRequest();
    //                
    //    xmlhttp.onreadystatechange=function()
    //    {
    //        if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //        {
    //            document.getElementById("div2").innerHTML=xmlhttp.responseText;
    //        }
    //    }
    //    xmlhttp.open("GET","admin_raction.php?a=editInfo_face_searchNew&studentID="+studentID+"&cno="+cno, true);
    //    xmlhttp.send();
}

function editInfo(studentID, cno)
{
    $("#div2").load("admin_raction.php?a=editInfo_face&studentID="+studentID+"&cno="+cno);
    //xmlhttp = new XMLHttpRequest();
    //                
    //    xmlhttp.onreadystatechange=function()
    //    {
    //        if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //        {
    //            document.getElementById("div2").innerHTML=xmlhttp.responseText;
    //        }
    //    }
    //    xmlhttp.open("GET","admin_raction.php?a=editInfo_face&studentID="+studentID+"&cno="+cno, true);
    //    xmlhttp.send();
}

function deleteInfo_search(studentID, cno)
{
    $("#div2").load("admin_raction.php?a=search_deleteInfo&studentID="+studentID+"&cno="+cno);
    $("#div1").load("admin_raction.php?a=search_infor_raction&studentID="+studentID);
}
function deleteInfo(studentID, cno)
{
    $("#div2").load("admin_raction.php?a=search_deleteInfo&studentID="+studentID+"&cno="+cno);
    grade_management();
    //xmlhttp = new XMLHttpRequest();
    //                
    //    xmlhttp.onreadystatechange=function()
    //    {
    //        if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //        {
    //            document.getElementById("div2").innerHTML=xmlhttp.responseText;
    //        }
    //    }
    //    xmlhttp.open("GET","admin_raction.php?a=search_deleteInfo&studentID="+studentID+"&cno="+cno, true);
    //    xmlhttp.send();
}

function submitMark(studentID, cno)
{
    //var mark = document.getElementById("markID").value;
    var mark = $("#markID").val();
    $("#div2").load("admin_raction.php?a=submitMark&studentID="+studentID+"&cno="+cno+"&mark="+mark);
    grade_management();
    //xmlhttp = new XMLHttpRequest();
    //                
    //    xmlhttp.onreadystatechange=function()
    //    {
    //        if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //        {
    //            document.getElementById("div2").innerHTML=xmlhttp.responseText;
    //            grade_management();
    //        }
    //    }
    //    xmlhttp.open("GET","admin_raction.php?a=submitMark&studentID="+studentID+"&cno="+cno+"&mark="+mark, true);
    //    xmlhttp.send();
}

function submitMark_searchNew(studentID, cno)
{
    //var mark = document.getElementById("markID").value;
    var mark = $("#markID").val();
    $("#div2").load("admin_raction.php?a=submitMark&studentID="+studentID+"&cno="+cno+"&mark="+mark);
    $("#div1").load("admin_raction.php?a=search_infor_raction&studentID="+studentID);
    //xmlhttp = new XMLHttpRequest();
    //                
    //    xmlhttp.onreadystatechange=function()
    //    {
    //        if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //        {
    //            document.getElementById("div2").innerHTML=xmlhttp.responseText;
    //            search_student_function();
    //        }
    //    }
    //    xmlhttp.open("GET","admin_raction.php?a=submitMark&studentID="+studentID+"&cno="+cno+"&mark="+mark, true);
    //    xmlhttp.send();
}

function addGrade_face()
{
    $("#div2").load("admin_raction.php?a=add_grade_face");
    //xmlhttp = new XMLHttpRequest();
    //                
    //    xmlhttp.onreadystatechange=function()
    //    {
    //        if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //        {
    //            document.getElementById("div2").innerHTML=xmlhttp.responseText;
    //        }
    //    }
    //    xmlhttp.open("GET","admin_raction.php?a=add_grade_face", true);
    //    xmlhttp.send();
}

function addGrade()
{
    //var studentID = document.getElementById("studentID").value;
    //var cno = document.getElementById("cno").value;
    //var cname = document.getElementById("cname").value;
    //var mark = document.getElementById("mark").value;
    var studentID = $("#studentID").val();
    var cno = $("#cno").val();
    var cname = $("#cname").val();
    var mark = $("#mark").val();
    $("#div2").load("admin_raction.php?a=add_grade&studentID="+studentID+"&cno="+cno+"&cname="+cname+"&mark="+mark);
    grade_management();
    //xmlhttp = new XMLHttpRequest();
    //                
    //    xmlhttp.onreadystatechange=function()
    //    {
    //        if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //        {
    //            document.getElementById("div2").innerHTML=xmlhttp.responseText;
    //        }
    //    }
    //    xmlhttp.open("GET","admin_raction.php?a=add_grade&studentID="+studentID+"&cno="+cno+"&cname="+cname+"&mark="+mark, true);
    //    xmlhttp.send();
}

function deleteCourse(cno)
{
    $("#div2").load("admin_raction.php?a=deleteCourse&cno="+cno);
    course_management();
    //xmlhttp = new XMLHttpRequest();
    //                
    //    xmlhttp.onreadystatechange=function()
    //    {
    //        if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //        {
    //            document.getElementById("div2").innerHTML=xmlhttp.responseText;
    //            course_management();
    //        }
    //    }
    //    xmlhttp.open("GET","admin_raction.php?a=deleteCourse&cno="+cno, true);
    //    xmlhttp.send();
}

function addCourse_face()
{
    $("#div2").load("admin_raction.php?a=add_course_face");
    //xmlhttp = new XMLHttpRequest();
    //                
    //    xmlhttp.onreadystatechange=function()
    //    {
    //        if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //        {
    //            document.getElementById("div2").innerHTML=xmlhttp.responseText;
    //        }
    //    }
    //    xmlhttp.open("GET","admin_raction.php?a=add_course_face", true);
    //    xmlhttp.send();
}

function addCourse()
{
    //var cno = document.getElementById("cno").value;
    //var cname = document.getElementById("cname").value;
    var cno = $("#cno").val();
    var cname = $("#cname").val();
    $("#div2").load("admin_raction.php?a=addCourse&cno="+cno+"&cname="+cname);
    course_management();
    //xmlhttp = new XMLHttpRequest();
    //                
    //    xmlhttp.onreadystatechange=function()
    //    {
    //        if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //        {
    //            document.getElementById("div2").innerHTML=xmlhttp.responseText;
    //            course_management();
    //        }
    //    }
    //    xmlhttp.open("GET","admin_raction.php?a=addCourse&cno="+cno+"&cname="+cname, true);
    //    xmlhttp.send();
}