function search_student_function()
        {
            $("#div1").html("");
            $("#div2").html("");
            var btn = $("<button>click me</button>");
            btn.click(function()
                        {
                            var studentID = $("#inputID1").val();
                            if (studentID=="")
                            {
                                $("#div1").html("");
                                return;
                            } 
                            $("#div1").load("admin_raction.php?a=search_infor_raction&studentID="+studentID);
                        });

            var input1 = $("<input type='text' id='inputID1' autofocus='autofocus'></input>");
            $("#div1").append("studentID:<br>", input1, btn);
        }

        function add_new_student()
        {
            $("#div1").html("");
            $("#div2").html("");
            var studentID = $("<input type = 'text' id = 'studentID' autofocus='autofocus'></input>");
            var studentName = $("<input type = 'text' id = 'studentName' ></input>");
            var age = $("<input type = 'text' id = 'age' ></input>");
            var gender = $("<input type = 'text' id = 'gender' ></input>");
            var department = $("<input type = 'text' id = 'department' ></input>");
            var btn = $("<button>click me</button>");
            btn.click(function()
                        {
                            var studentID = $("#studentID").val();
                            var studentName = $("#studentName").val();
                            var age = $("#age").val();
                            var gender = $("#gender").val();
                            var department = $("#department").val();

                            $("#studentID").val("");
                            $("#studentName").val("");
                            $("#age").val("");
                            $("#gender").val("");
                            $("#department").val("");
                            if (studentID==""||studentName == ""||age ==""||gender ==""||department =="")
                            {
                                $("#div2").html("not complete!");
                                return;
                            } 
                            
                            $("#div2").load("admin_raction.php?a=addNew&studentID="+studentID+"&studentName="+studentName+"&age="+age+"&gender="+gender+"&department="+department);
                        });
            var element = document.getElementById("div1");
            $("#div1").append("studentID:", studentID, "<br>", "studentName:", studentName, "<br>", "age:", age, "<br>", "gender:", gender, "<br>", "department:",department, "<br>",btn);
        }
        function all_student_info()
        {
            $("#div1").html("");
            $("#div2").html("");
            $("#div1").load("admin_raction.php?a=all_students_info");   
        }

        function grade_management()
        {
            $("#div1").html("");
            $("#div2").html("");
            $("#div1").load("admin_raction.php?a=grade_management");
        }

        function course_management()
        {
            $("#div1").html("");
            $("#div2").html("");
            $("#div1").load("admin_raction.php?a=course_management");
        }

function deleteNew(studentID)
{
    $("#div2").load("admin_raction.php?a=deleteNew&studentID="+studentID);
    all_student_info();
}

function editInfo_searchNew(studentID, cno)
{
    $("#div2").load("admin_raction.php?a=editInfo_face_searchNew&studentID="+studentID+"&cno="+cno);
}

function editInfo(studentID, cno)
{
    $("#div2").load("admin_raction.php?a=editInfo_face&studentID="+studentID+"&cno="+cno);
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
}

function submitMark(studentID, cno)
{
    var mark = $("#markID").val();
    $("#div2").load("admin_raction.php?a=submitMark&studentID="+studentID+"&cno="+cno+"&mark="+mark);
    grade_management();
}

function submitMark_searchNew(studentID, cno)
{
    var mark = $("#markID").val();
    $("#div2").load("admin_raction.php?a=submitMark&studentID="+studentID+"&cno="+cno+"&mark="+mark);
    $("#div1").load("admin_raction.php?a=search_infor_raction&studentID="+studentID);
}

function addGrade_face()
{
    $("#div2").load("admin_raction.php?a=add_grade_face");
}

function addGrade()
{
    var studentID = $("#studentID").val();
    var cno = $("#cno").val();
    var cname = $("#cname").val();
    var mark = $("#mark").val();
    $("#div2").load("admin_raction.php?a=add_grade&studentID="+studentID+"&cno="+cno+"&cname="+cname+"&mark="+mark);
    grade_management();
}

function deleteCourse(cno)
{
    $("#div2").load("admin_raction.php?a=deleteCourse&cno="+cno);
    course_management();
}

function addCourse_face()
{
    $("#div2").load("admin_raction.php?a=add_course_face");
}

function addCourse()
{
    var cno = $("#cno").val();
    var cname = $("#cname").val();
    $("#div2").load("admin_raction.php?a=addCourse&cno="+cno+"&cname="+cname);
    course_management();
}

function NextPage(pagenum)
{
    $("#div1").html("");
    $("#div2").html("");
    $("#div1").load("admin_raction.php?a=grade_management&page="+pagenum);
}
