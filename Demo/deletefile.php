<?php
if(isset($_REQUEST["file"])){
   
    $file = urldecode($_REQUEST["file"]); 

        $filename = "uploads/" . $file;

        

    if(file_exists($filename))  
    {
      if(unlink($filename))
      {
          echo "file named $file has been deleted successfully";
      }
      else
      {
          echo "file is not deleted";
      }
    }
}
?>