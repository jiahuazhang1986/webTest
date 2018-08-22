function student_report()
{
    $("#div1").load("student_raction.php?a=student_report");
    //xmlhttp = new XMLHttpRequest();
    //                
    //xmlhttp.onreadystatechange=function()
    //{
    //    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //    {
    //        document.getElementById("div1").innerHTML = xmlhttp.responseText;
    //    }
    //}
    //xmlhttp.open("GET","student_raction.php?a=student_report", true);
    //xmlhttp.send();
}

function change_password_face()
{
    $("#div1").load("student_raction.php?a=change_password_face");
    //xmlhttp = new XMLHttpRequest();
    //                
    //xmlhttp.onreadystatechange=function()
    //{
    //    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //    {
    //        document.getElementById("div1").innerHTML = xmlhttp.responseText;
    //    }
    //}
    //xmlhttp.open("GET","student_raction.php?a=change_password_face", true);
    //xmlhttp.send();
}

function change_password()
{
    //var oldPassword = document.getElementById("oldPassword").value;
    //var newPassword = document.getElementById("newPassword").value;
    //var confirmNewPassword = document.getElementById("confirmNewPassword").value;
    //var answer = document.getElementById("answer").value;
    //var question = document.getElementById("question").value;
    //var email = document.getElementById("email").value;

    var oldPassword = $("#oldPassword").val();
    var newPassword = $("#newPassword").val();
    var confirmNewPassword = $("#confirmNewPassword").val();
    var answer = $("#answer").val();
    var question = $("#question").val();
    var email = $("#email").val();
    $("#div2").load("student_raction.php?a=change_password&oldPassword="+oldPassword+"&newPassword="+newPassword+"&confirmNewPassword="+confirmNewPassword+"&answer="+answer+"&question="+question+"&email="+email);
    //xmlhttp = new XMLHttpRequest();
    //                
    //xmlhttp.onreadystatechange=function()
    //{
    //    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    //    {
    //        document.getElementById("div2").innerHTML = xmlhttp.responseText;
    //    }
    //}
    //xmlhttp.open("GET","student_raction.php?a=change_password&oldPassword="+oldPassword+"&newPassword="+newPassword+"&confirmNewPassword="+confirmNewPassword+"&answer="+answer+"&question="+question+"&email="+email, true);
    //xmlhttp.send();
}