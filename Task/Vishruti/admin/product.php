<?php 
include 'addproduct_process.php';


 @$email=$_SESSION['email1'];
 @$utype=$_SESSION['utype1'];
//  echo "$utype";
 if(!isset($email))
 {
     Header('Location:admin.php');
 }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <style>
    body {
        background-color: teal;
        color: white;
    }
    </style>
    <script src="../javascript/product_validation.js" type="text/javascript"></script>
</head>

<body>
    <div class="container">

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product Name:</strong>
                        <input type="text" id="pname" name="pname" class="form-control" placeholder="Enter Product Name"
                            autofocus>
                        <span class="text-danger" id="pname_err"></span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Category Id:</strong>
                        <select name="catid" id="catid" class="form-control">
                            <option value="">Select</option>
                            <?php 
                                    include 'config.php';
                                    $sql = "SELECT * FROM category where active='yes'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                     while($raw = mysqli_fetch_assoc($result)) {?>
                            <option value="<?php echo $raw['id']?>"><?php echo $raw['cname']?></option>
                            <?php }
                                    } 
                                ?>
                        </select>
                        <span class="text-info" id="catid_err"> </span>
                    </div>
                </div>
                <br>
                <br />

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Upload Image</strong>
                        <input type="file" name="image" id="image" accept=".png,.jpeg,.jpg">
                        <br>
                        <span class="text-danger"> Only PNG , JPG && JPEG extensions are allowed</span>
                        <br>
                        <span class="text-danger" id="file_err"> </span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Active:</strong>
                        <select name="active" id="active" class="form-control">
                            <option value="">Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                        <span class="text-danger" id="active_err"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" id="submit" name="submit" class="btn btn-success">Add Product</button>
                </div>
                <br>
                <br>
                <div class="pull-right">
                    <a href="index_product.php"> Back</a>
                </div>
            </div>
</body>

</html>