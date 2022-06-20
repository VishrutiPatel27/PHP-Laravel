var $EmailIdRegEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/i;
var $PasswordRegEx = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,12}$/;


var emailflag = false, passwordflag = false;

$(document).ready(function () {

    $("#email").blur(function () {
        $("#email_err").empty();
        if ($(this).val() == "" || $(this).val() == null) {
            $("#email_err").html("(*) Email id required..!!");
            emailflag = false;
        }
        else {
            if (!$(this).val().match($EmailIdRegEx)) {
                $("#email_err").html("(*) Invalid Email!!");
                emailflag = false;
            }
            else {
                emailflag = true;
            }
        }
    });




    $("#password").blur(function () {
        $("#pass_err").empty();
        if ($(this).val() == "" || $(this).val() == null) {
            $("#pass_err").html("(*)Password required..!!");
            passwordflag = false;;
        }
        else {
            passwordflag = true;
        }

    });

    $('#submit').click(function () {

        $("#email_err").empty();
        if ($(this).val() == "" || $(this).val() == null) {
            $("email_err").html("(*) Email required..!!");
            emailflag = false;
        }
        else {
            if (!$(this).val().match($EmailIdRegEx)) {
                $("#email_err").html("(*) Invalid Email..!!");
                emailflag = false;
            }
            else {
                emailflag = true;
            }
        }

        $("#pass_err").empty();
        if ($(this).val() == "" || $(this).val() == null) {
            $("#pass_err").html("(*) Password required..!!");
            passwordflag = false;
        }
        else {
            passwordflag = true;

        }

    });


    $('#email').keypress(function(e){
        $('#email_err').empty();
        var flag= false;
        (e.which>=65 && e.which<=90) || (e.which>=92 && e.which<=122)
        ?flag=true
        :(flag=false,$('#name_err').html('(*) Please Enter Valid Name..'));
        return flag;
    });
});

if (emailflag == true && passwordflag == true) {

    document.register.submit();
}
else {
    "Error to submit form..!!";

}


