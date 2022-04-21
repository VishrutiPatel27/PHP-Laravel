<?php

$servername="localhost";
$username="root";
$password="";
$databasename="exam";
 
$conn = mysqli_connect($servername,$username,$password,$databasename);

if($conn)
{
    //echo "Connection Establish";

}
else
{
    echo "Error in connecting database";
}

?>