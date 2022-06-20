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


$emailerr = $passworderr = "";
$email = $password = "";

if (empty($_POST["email"])) { 
    $emailerr = "Email is Required";
  } else {
    $email = ($_POST["email"]);
  }


  if (empty($_POST["password"])) { 
    $passworderr = "Email is Required";
  } else {
    $password = ($_POST["password"]);
  }


?>