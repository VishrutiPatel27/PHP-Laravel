<?php
error_reporting(0);
session_start();
@$email=$_SESSION['email1'];
 @$utype=$_SESSION['utype1'];
//  echo "$utype";
 if(!isset($email))
 {
     Header('Location:admin.php');
 }

include 'config.php';
$id= $_GET['id'];
if(isset($_REQUEST['submit'])){
    $pname = $_POST['pname'];
    $catid = $_POST['catid'];
    trim($image = $_FILES['image']['name']);
    $createby = $_SESSION['email'];
    $active = $_POST['active'];

    if(!empty($image)){
        $target_dir = "./images/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check file size
	if ($_FILES["image"]["size"] > 500000) {
		echo "Sorry, your file is too large."."<br>";
		$uploadOk = 0;
  	}
	// Allow certain file formats
	if($filetype != "png" && $filetype != "jpeg" && $filetype != "jpg") {
  		echo "Sorry, only PNG, JPEG and JPG files are allowed."."<br>";
  		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
  		// if everything is ok, try to upload file
  	} else {
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $edit = "UPDATE `product` SET `pname`=' $pname ',`catid`='$catid',`image`='$image',`createby`='$createby',`active`='$active' WHERE  `id`='$id'";
            $result2 = $conn->query($edit); 
            if ($result2 == TRUE) {
                echo "Record updated successfully.";
                // alert("Record Updated Successfully");
                header("Location:index_product.php");
            }else{
                echo "Error:" . $edit . "<br>" . $conn->error;
            }
		} else {
	 	 	echo "Sorry, there was an error uploading your file."."<br>";
		}
  	}
    }
    else{
        $edit = "UPDATE `product` SET `pname`=' $pname ',`catid`='$catid',`createby`='$createby',`active`='$active' WHERE  `id`='$id'";
            $result2 = $conn->query($edit); 
            if ($result2 == TRUE) {
                echo "Record updated successfully.";
                // alert("Record Updated Successfully");
                header("Location:index_product.php");
            }else{
                echo "Error:" . $edit . "<br>" . $conn->error;
            }
    }
	
    // $edit = "UPDATE `product` SET `pname`='$pname',`catid`='$catid',`image`='$image',`active`='$active',`user_id`='$createdbyuser' WHERE `id`='$id'"; 
   
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Product</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        <script src="../javascript/product_validation.js" type="text/javascript"> </script>
</head>
<style>
body {
    background-color: teal;
    color: white;

}
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <br>
                    <h2>Edit Product</h2>
                    <h2><?php echo $email;?><a class="text-success" href="logout.php"> :Logout</a></h2>
                </div>
                <br>
                <div class="pull-right">
                    <a class="btn btn-primary" href="product.php"> Back</a>
                </div>
            </div>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <?php                -
                    $sql= "select * from product where id='$id'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="pname" id="pname" class="form-control" placeholder="Enter Product Name"
                            value="<?=$row['pname']?>" required>
                        <span class="text-danger" id="pname_err" ></span>
                    </div>  
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <br>
                        <strong>Category Id</strong>
                        <select name="catid" id="catid" class="form-control">
                            <?php 
                                    include 'config.php';
                                    $sql1 = "SELECT * FROM category";
                                    $result1 = mysqli_query($conn, $sql1);
                                    if (mysqli_num_rows($result1) > 0) {
                                        while($row1 = mysqli_fetch_assoc($result1)) {?>
                            <option value="<?php echo $row1['id']?>"
                                <?php if($row['catid']==$row1['id']){ echo "selected";}?>>
                                <?php echo $row1['cname']?></option>
                            <?php }
                                    } 
                                ?>
                        </select>
                        <span class="text-danger" id="cat_error"></span>
                    </div>
                </div>
             
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <br>
                        <strong>Active</strong>
                        <select name="active" id="active" class="form-control">
                            <option value="">Select</option>
                            <option value="yes" <?php if($row['active']=="yes"){ echo "selected";}?>>Yes</option>
                            <option value="no" <?php if($row['active']=="no"){ echo "selected";}?>>No</option>
                        </select>
                        <span class="text-danger" id="active_err"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <br>
                        <strong>Select Image:</strong>
                        <input type="file" id="image" name="image" class="form-control"  accept=".png,.jpg,.jpeg">
                        <span class="text-info">Only PNG, JPEG and JPG files are allowed</span>
                        <span class="text-danger" id="imageval"><?php echo $row['image'];?></span>
                    </div>
                </div>
                <?php
                        }
                            } else {
                                echo "Error";
                            }
                    ?>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button class="btn btn-success" type="submit" name="submit"> Update </button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>