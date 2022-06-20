<?php
include'config.php';
 session_start();
 if(!$utype == "1" || !$utype =="0")
 {
     Header('Location:admin.php');
 }

 if(isset($_POST['submit']) && COUNT($_POST)>0)
 {
     $name = $_POST['cname'];
     $active = $_POST['active'];
 
 
 if($name != "" && $active != "")
 {
     $query = "INSERT INTO `category`( `cname`, `active`) VALUES ('$name','$active')";
     if(mysqli_query($conn,$query))
     {
         header("Location:index_category.php");
     }
     else
     {
         echo "Sorry something went wrong. Please try again";
     }

 }
 else 
 {
    echo "Please enter required values.";
    header('location:index_category.php');
 }
}
