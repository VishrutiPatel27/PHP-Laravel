<?php
 require ("config.php");

 //echo $_GET['id']; exit;
 error_reporting(0);
  $query = "SELECT * FROM product where id = '".$_GET['id']."'";
  $data = mysqli_query($conn, $query);
  $total = mysqli_num_rows($data);
  $query1 =mysqli_fetch_assoc($data);
if($total == 0)
{
    echo "No Data available";
}
else
{
    $sql = "DELETE FROM product WHERE id=".$_GET['id'];

    if ($conn->query($sql) === TRUE) 
    {
        unlink("images/".$query1['image']);
     echo '1';
    } else 
    {
    echo "Error deleting record: " . $conn->error;
    }
}
?>
