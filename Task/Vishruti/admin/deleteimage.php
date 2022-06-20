<?php
if(isset($_REQUEST["file"])){
    // Get parameters
    $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string

    /* Test whether the file name contains illegal characters
    such as "../" using the regular expression */
        $filename = "images/" . $file;

        //$filename = 'readme.pdf';

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