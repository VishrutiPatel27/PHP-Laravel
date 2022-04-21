<html>
<body>


<form action="upload.php" method="POST" enctype="multipart/form-data">
Select file to upload

<input type="file" name="fileupload" id="fileupload">
<br><br>
<input type="submit" value="Upload" name="submit">
</form>



<?php


$list = "";
    if ($handle = opendir('Uploads')){
        while (false !== ($file = readdir($handle))){
            if ($file !="." && $file != ".."){
                $list .= '<li><p>Download file <a href="download.php?file=' .$file.'">'.$file.'</a></p></li>';
                $list .= '<li><p>Delete file <a href="deletefile.php?file=' .$file.'">'.$file.'</a></p></li>';
            }
        }
        closedir($handle);
    }

?>

<h3>List of files :</h3>
<ul><?php echo $list; ?></ul>

</body>
</html>