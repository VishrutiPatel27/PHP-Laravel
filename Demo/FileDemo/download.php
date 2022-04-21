<?php
if (isset($_REQUEST["file"])){
    
    $file = urldecode($_REQUEST["file"]);


    $filename = 'Uploads/'.$file;

    if (file_exists($filename)) {
          header('Content-Description: File Transfer');
          header('Content-Type: application/octet-stream');
          header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
          header('Expires: 0');
          header('Cache-Control: must-revalidate');
          header('Pragma: private');
          header('Content-Length: ' . filesize($filename));
          flush();
          readfile($filename);
          exit;
    }
    else
    {
        echo "file not exists";
    }
}

?>