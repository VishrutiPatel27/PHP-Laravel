<?php

$conn =new mysqli('localhost','root','','crud');

if($conn)
{
   // echo "Connection successfully";
}
else{
    die(mysqli_error($conn));
}


?>