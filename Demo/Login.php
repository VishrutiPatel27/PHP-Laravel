<?php
include ('Config.php');
if(isset($_POST)  && count ($_POST)>0)
{
  $username = $_POST['email'];
  $password = $_POST['password'];

  $q = "SELECT * FROM student WHERE email = '$username' && password = '$password' ";
  $result = mysqli_query($conn,$q);
  

  if (mysqli_num_rows($result)>0)
  {
    while($row = mysqli_fetch_assoc($result))
    
      header("location:Profile.php");
    
  }
  else{
    echo "Invaild User";
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body> 
  <form action="#" method="POST"> 
  <div class="container">
    <div class="title">
      Login Form 
    </div>
    <div class="form">
        <div class="input_field">
          <label> Email </label>
          <input type="email" class="input" placeholder="Enter Your Email Here." name="email">
        </div>
      <!--PASSWORD-->
        <div class="input_field">
          <label> Password </label>
          <input type="password" class="input" placeholder="Create Your Password" name="password">
        </div>
          <div class="input_field">
            <input type="submit" value="Login" class="btn" name="button">
          </div>

         
            
            
    </div>
  </div>
  </form>
</body>
</html>