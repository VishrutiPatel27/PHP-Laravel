<?php 

$data = $_POST;
$error = 0;
 if(count($data)>0)
{
   foreach($data as $key => $val)
   {
       if(empty($value))
       {
           $mssg = $key . " is required ";
           echo "<br>";
           $error =0;
       }
       else
       {
           $error = 1;
       }
       echo $mssg;
   }
}


$name_err = $email_err = $gender_err = "";
 $name = $email = $gender = "";

 if (empty($_POST["name"])) { 
    $name_err = "name is Required";
  } else {
    $name = ($_POST["name"]);
  }


  if (empty($_POST["email"])) { 
     $emailerr = "Email is Required";
  } else {
    $email = ($_POST["email"]);
  }

 


?> 