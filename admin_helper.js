function deleteNew(studentID)
{
    xmlhttp = new XMLHttpRequest();
                    
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                //console.log(xmlhttp.responseText);
                document.getElementById("div2").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","admin_raction.php?a=deleteNew&studentID="+studentID, true);
        xmlhttp.send();
}

function editInfo(studentID, cno)
{
    xmlhttp = new XMLHttpRequest();
                    
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("div2").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","admin_raction.php?a=editInfo_face&studentID="+studentID+"&cno="+cno, true);
        xmlhttp.send();
}

function deleteInfo(studentID, cno)
{
    xmlhttp = new XMLHttpRequest();
                    
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("div2").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","admin_raction.php?a=search_deleteInfo&studentID="+studentID+"&cno="+cno, true);
        xmlhttp.send();
}

function submitMark(studentID, cno)
{
    var mark = document.getElementById("markID").value;
    xmlhttp = new XMLHttpRequest();
                    
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("div2").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","admin_raction.php?a=submitMark&studentID="+studentID+"&cno="+cno+"&mark="+mark, true);
        xmlhttp.send();
}

function addGrade_face()
{
    xmlhttp = new XMLHttpRequest();
                    
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("div2").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","admin_raction.php?a=add_grade_face", true);
        xmlhttp.send();
}

function addGrade()
{
    var studentID = document.getElementById("studentID").value;
    var cno = document.getElementById("cno").value;
    var cname = document.getElementById("cname").value;
    var mark = document.getElementById("mark").value;

    xmlhttp = new XMLHttpRequest();
                    
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("div2").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","admin_raction.php?a=add_grade&studentID="+studentID+"&cno="+cno+"&cname="+cname+"&mark="+mark, true);
        xmlhttp.send();
}

function deleteCourse(cno)
{
    xmlhttp = new XMLHttpRequest();
                    
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("div2").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","admin_raction.php?a=deleteCourse&cno="+cno, true);
        xmlhttp.send();
}

function addCourse_face()
{
    xmlhttp = new XMLHttpRequest();
                    
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("div2").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","admin_raction.php?a=add_course_face", true);
        xmlhttp.send();
}

function addCourse()
{
    var cno = document.getElementById("cno").value;
    var cname = document.getElementById("cname").value;

    xmlhttp = new XMLHttpRequest();
                    
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("div2").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","admin_raction.php?a=addCourse&cno="+cno+"&cname="+cname, true);
        xmlhttp.send();
}