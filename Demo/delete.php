<?php
 require ("Config.php");
 include("deletefile.php");

 //echo $_GET['id']; exit;
 error_reporting(0);
  $query = "SELECT * FROM student where id = '".$_GET['id']."'";
  $data = mysqli_query($conn, $query);
  $total = mysqli_num_rows($data);
if($total == 0)
{
    echo "No Data available";
}
else
{
    $sql = "DELETE FROM student WHERE id=".$_GET['id'];

    if ($conn->query($sql) === TRUE) {
     echo '1';
    } else {
    echo "Error deleting record: " . $conn->error;
    }
}
