function student_report()
{
    $("#div1").load("student_raction.php?a=student_report");
}

function change_password_face()
{
    $("#div1").load("student_raction.php?a=change_password_face");
}

function change_password()
{
    var oldPassword = $("#oldPassword").val();
    var newPassword = $("#newPassword").val();
    var confirmNewPassword = $("#confirmNewPassword").val();
    var answer = $("#answer").val();
    var email = $("#email").val();

    var tmp = "student_raction.php?a=change_password&oldPassword="+oldPassword+"&newPassword="+newPassword+"&confirmNewPassword="+confirmNewPassword+"&answer="+answer+"&email="+email;
    $("#div2").load(tmp);
}