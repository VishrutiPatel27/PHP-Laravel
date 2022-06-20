

			var $FNameLNameRegEx = /^([a-zA-Z]{2,20})$/;
			var $PasswordRegEx = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,12}$/;
			var $EmailIdRegEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/i;
			var nameflag=false,emailflag=false,passwordflag=false,checkboxflag=false, valid=false;
			$(document).ready(function(){
				
				
				
				$("#name").blur(function(){
					$("#name_err").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#name_err").html("(*) Firstname required..!!");
						nameflag=false;
					}
					else{
						if(!$(this).val().match($FNameLNameRegEx))
						{
							$("#name_err").html("(*) Invalid firstname..!!");
							nameflag=false;
						}
						else{
							nameflag=true;
						}
					}
				});

				$("#email").blur(function(){
					$("#email_err").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#email_err").html("(*) Email required..!!");
						emailflag=false;
					}
					else{
						if(!$(this).val().match($EmailIdRegEx))
						{
							$("#email_err").html("(*) Invalid Email..!!");
							emailflag=false;
						}
						else{
							emailflag=true;
						}
					}
				});
				
				$("#password").blur(function(){
					$("#pass_err").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#pass_err").html("(*) Password required..!!");
						passwordflag=false;
					}
					else{
						if(!$(this).val().match($PasswordRegEx))
						{
							$("#pass_err").html("(*) Password should match Alphanumeric pattern..!!"); 
							passwordflag=false;
						}
						else{
							passwordflag=true;
						}
					}
				});
				

                $("#chekbox").blur(function(){
                    $("#check_err").empty();
                valid = true;

                if($('input type=[checkbox]:checked').length == 0)
                {
                    alert ( "ERROR! Please select at least one checkbox" );
                    valid = false;
                }

                return valid;
                });

				// if(document.getElementById("Cricket").checked)
				// {
				// 	checkboxflag = true;
				// }
				// else if(document.getElementById("Singing").checked)
				// {
				// 	checkboxflag=true;
				// }
				// else if(document.getElementById("Swimming").checked)
				// {
				// 	checkboxflag=true;
				// }
				// else if(document.getElementById("Shopping").checked)
				// {
				// 	checkboxflag=true;
				// }
				// else
				// {

				// }




				$('#submit').click(function(){
					$("#name_err").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#name_err").html("(*) Firstname required..!!");
						nameflag=false;
					}
					else{
						if(!$(this).val().match($FNameLNameRegEx))
						{
							$("#name_err").html("(*) Invalid firstname..!!");
							nameflag=false;
						}
						else{
							nameflag=true;
						}
					}
				
					$("#email_err").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("email_err").html("(*) Email required..!!");
						emailflag=false;
					}
					else{
						if(!$(this).val().match($EmailIdRegEx))
						{
							$("#email_err").html("(*) Invalid Email..!!");
							emailflag=false;
						}
						else{
							emailflag=true;
						}
					}
		
					$("#pass_err").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#pass_err").html("(*) Password required..!!");
						passwordflag=false;
					}
					else{
						if(!$(this).val().match($PasswordRegEx))
						{
							$("#pass_err").html("(*) Invalid Password..!!");
							passwordflag=false;
						}
						else{
							passwordflag=true;
						}
                    }
				});

				$('#name').keypress(function(e){
					$('#name_err').empty();
					var flag= false;
					(e.which>=65 && e.which<=90) || (e.which>=92 && e.which<=122)
					?flag=true
					:(flag=false,$('#name_err').html('(*) Please Enter Valid Name..'));
					return flag;
				});
			
			});

			if (nameflag == true  && emailflag == true && passwordflag == true && checkflag == true) {
					// location.replace("process1.php")
	
				//alert("Form submitted successfully..!!");
				document.register.submit();
			} 
			else {
				echo("Error to submit form..!!");
				
			}


			