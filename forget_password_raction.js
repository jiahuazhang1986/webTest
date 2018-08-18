function forget_question_face()
{
    var studentID = document.getElementById("studentID").value;
    xmlhttp = new XMLHttpRequest();
                    
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("div1").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","forget_question_face.php?studentID="+studentID, true);
        xmlhttp.send();
}

function forget_password(studentID)
{
    var answer = document.getElementById("answer").value;
    xmlhttp = new XMLHttpRequest();
                    
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("div2").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","forget_newPassword_raction.php?answer="+answer+"&studentID="+studentID, true);
        xmlhttp.send();
}