<?php
require("Config.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
        <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="   crossorigin="anonymous"></script>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Form</title>
        <link rel="stylesheet" type="text/css" href="./style.css">
        <script src="Validation.js" type="text/javascript">
            
       </script>
  
</head>
<body> 
<form action="Insert.php" method="POST" enctype="multipart/form-data">
  <div class="container">
    <div class="title">
      Registration Form 
    </div>

    <div class="form">
      <!--FIRST NAME-->  
      <div class="form-group">
          <div class="input_field">
            <label> First Name </label>
            <input type="text" class="input" id="txtfirstname" placeholder="Enter Your First Name" name="fname" autocomplete=off>
          </div>
		  <small id="txtfirstnameval"></small>
      </div>


      <!--LAST NAME-->
        <div class="input_field">
          <label> Last Name </label>
          <input type="text" class="input" id="txtlastname" placeholder="Enter Your Last Name" name="lname" autocomplete=off>
		  </div>
		  <small id="txtlastnameval"></small>
        
      <!--EMAIL-->

        <div class="input_field">
          <label> Email </label>
          <input type="email" class="input" id="txtemail"placeholder="Enter Your Email Here." name="email" autocomplete=off>
		  <small id="txtemailval"></small>
        </div>
      <!--PASSWORD-->

        <div class="input_field">
          <label> Password </label>
          <input type="password" class="input" id="txtpassword"placeholder="Create Your Password" name="password">
		  <small id="txtpasswordval"></small>
        </div>

      <!--CONFIRM PASSWORD-->
        <div class="input_field">
          <label> Confirm Password </label>
          <input type="password" class="input" id="txtcpassword" placeholder="Enter Your Confirm Password" name="conpassword">
		  <small id="txtcpasswordval"></small>
        </div>

      <!--ADDRESS-->
        <div class="input_field">
          <label> Address </label>
          <textarea rows="3" cols="30" id="txtarea" placeholder="Enter Your Address" class="input" name="address"></textarea>
		  <small id="txtareaval"></small>
        </div>


  		<!---Gender-->
		  <div>
		  <label>Gender</label>
		  <input type="radio" name="gender" class="input" value="1">female
		  <input type="radio" name="gender" class="input" value="0">male
		  </div>
		

		  <br>      
      <!--Choose Designation-->
     <div class="input_field">
      Designation:  
          <select name="designation" class="designation" id="txtselect" name="designation">
            <option value="">Select Your Designation</option>
            <option value="Project Manager">Project Manager </option>
            <option value="Jr Developer">Jr Developer</option>
            <option value="Sr Developer">Sr Developer</option>
            <option value="Human Resources">Human Resources</option>
          </select>
		  <small id="txtselectval"></small>
     </div>
          <br>


          <!---File Uplaod-->
          Select File to upload:
          <input type="file" name="fileToUpload" id="fileToUpload">
          
          <br><br>


          <div class="input_field">
          <input type="submit" class="btn" value="submit" >
          </div>

          <div class="input_field">
		      <button type="button" class="btn" name="Login" onclick="window.location.href='./Login.php';">Login
		      </button>
          </div>
            
    </div>
  </div>
  </form>
</body>
</html>

