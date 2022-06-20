<?php
include'config.php';
 session_start();
 @$email=$_SESSION['email1'];
 @$utype=$_SESSION['utype1'];
//  echo "$utype";
 if(!isset($email))
 {
     Header('Location:admin.php');
 }

 if(isset($_POST['submit']) && COUNT($_POST)>0)
 {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $gender = $_POST['gender'];
     @$hobbies=implode(',',(array)$_POST['checkbox']);
     $utype=0;
 
 
 if($name != "" && $email != "" && $password != "" && $gender != "" && $hobbies != "")
 {
     $query = "INSERT INTO `newadmin`( `name`, `email`, `password`, `gender`, `hobbies`,`usertype`) VALUES ('$name','$email','$password','$gender','$hobbies','$utype')";
     if(mysqli_query($conn,$query))
     {
         header("Location:index.php");
     }
     else
     {
         echo "Sorry something went wrong. Please try again";
     }

 }
 if($hobbies == "")
 {
     echo "Select atleast one hobbies";
 }
 else 
 {
    echo "Please enter required values.";
 }
}

?>
