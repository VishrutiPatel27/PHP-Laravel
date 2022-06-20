var pnameflag =false , categoryidflag=false , imageflag=false , createbyflag=false, activeflag=false;
$(document).ready(function()
{
    $("#pname").blur(function () {
        $("#pname_err").empty();
        if($(this).val() == ""   || $(this).val() ==null)
        {
            $("#pname_err").html("(*)Product name require");
            pnameflag = false;
        } 
        else
        {
            emailflag = true;
        }
    });

    
    $("#active").blur(function(){
        $("#active_err").empty();
        if($(this).val()=="" || $(this).val()==null)
        {
            $("#active_err").html("(*) Select Activity status ..!!");
            activeflag=false;
        }
        else{
            activeflag=true;
        }
    });

    $('#submit').click(function(){
        $("#pname_err").empty();
        if($(this).val()=="" || $(this).val()==null)
        {
            $("#pname_err").html("(*) Product required..!!");
            pnameflag=false;
        }
        else
        {
            pnameflag=true;
            
        }

        $("$active_err").empty();
        if($(this).val()=="" || $(this).val()==null)
        {
            $("$active_err").html("(*) activity status  required..!!");
            activeflag=false;
        }
        else
        {
            activeflag=true;
        }

    });

});