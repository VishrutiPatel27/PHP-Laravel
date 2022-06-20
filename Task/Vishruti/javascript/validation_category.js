
var cnameflag = false, activeflag = false;

$(document).ready(function () {

    $("#cname").blur(function () {
        $("#cname_err").empty();
        if ($(this).val() == "" || $(this).val() == null) {
            $("#cname_err").html("(*) Category name required..!!");
            cnameflag = false;
        }
        else {
            cnameflag = true;
        }

    });


    $("#active").blur(function () {
        $("#active_err").empty();
        if ($(this).val() == "" || $(this).val() == null) {
            $("#active_err").html("(*) Select any one ..!!");
            activeflag = false;
        }
        else {
            activeflag = true;
        }
    });

    $('#submit').click(function () {

        $("#cname_err").empty();
        if ($(this).val() == "" || $(this).val() == null) {
            $("cname_err").html("(*) Category name required..!!");
            cnameflag = false;;
        }

        else {
            cnameflag = true;;
        }


        $("#active_err").empty();
        if ($(this).val() == "" || $(this).val() == null) {
            $("#active_err").html("(*) Address required..!!");
            activeflag = false;
        }
        else {
            activeflag = true;
        }
    });

});

if (cnameflag == true && activeflag == true) {

    document.register.submit();
}
else {
    "Error to submit form..!!";

}


