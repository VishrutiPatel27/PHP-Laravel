<?php
include 'config.php';
session_start();
if (isset($_POST['submit']) && count($_POST) > 0) {
    $pname = $_POST['pname'];
    $catid= $_POST['catid'];
    $image = $_FILES['image']['name'];
    $createdby = $_SESSION['email'];
    $active = $_POST['active'];
  

    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($_FILES["image"]["size"] > 50000000) {
        echo "Sorry, your file is too large." . "<br>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($filetype != "png" && $filetype != "jpeg" && $filetype != "jpg") {
        echo "Sorry, only PNG, JPEG and JPG files are allowed." . "<br>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            if ($pname != "" && $catid != "" && $image != "" && $createdby != "" && $active != "") {
                $query =  "INSERT INTO `product`(`id`, `pname`, `catid`, `image`, `createby`, `active`) VALUES ('','$pname','$catid','$image','$createdby','$active')";
                if (mysqli_query($conn, $query)) {
                    echo "data stored in a database successfully.";
                    header("Location:index_product.php");
                } else {
                    echo "Data not inserted";
                }
            } else {
                echo "Enter Required Fields";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
