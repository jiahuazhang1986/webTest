function student_report()
{
    xmlhttp = new XMLHttpRequest();
                    
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("div1").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","student_raction.php?a=student_report", true);
    xmlhttp.send();
}

function change_password_face()
{
    xmlhttp = new XMLHttpRequest();
                    
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("div1").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","student_raction.php?a=change_password_face", true);
    xmlhttp.send();
}

function change_password()
{
    var oldPassword = document.getElementById("oldPassword").value;
    var newPassword = document.getElementById("newPassword").value;
    var confirmNewPassword = document.getElementById("confirmNewPassword").value;
    var answer = document.getElementById("answer").value;
    var question = document.getElementById("question").value;

    xmlhttp = new XMLHttpRequest();
                    
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("div2").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","student_raction.php?a=change_password&oldPassword="+oldPassword+"&newPassword="+newPassword+"&confirmNewPassword="+confirmNewPassword+"&answer="+answer+"&question="+question, true);
    xmlhttp.send();
}