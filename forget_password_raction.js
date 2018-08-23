function forget_question_face()
{
    var studentID = $("#studentID").val();
    $("#div1").load("forget_question_face.php?studentID="+studentID);
}

function forget_password(studentID)
{
    var answer = $("#answer").val();
    $("#div2").load("forget_newPassword_raction.php?answer="+answer+"&studentID="+studentID);
}