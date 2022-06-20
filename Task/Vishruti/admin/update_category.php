<?php
session_start();

@$email=$_SESSION['email1'];
 @$utype=$_SESSION['utype1'];
//  echo "$utype";
 if(!isset($email))
 {
     Header('Location:admin.php');
 }
error_reporting(0);
$id = $_GET['id'];
//echo $id; 
$query = "SELECT * FROM category where id='$id' ";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
        integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
        <style>
    body {
        background-color: teal;
        color: white;
    }
    
</style>
<script src="../javascript/validation_category.js" type="text/javascript"></script>
</head>

<body>
<?php

    require("config.php");
    error_reporting(0);
    $query = "SELECT * FROM category where id = '" . $_GET['id'] . "'";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    echo "<br>";
    //echo $total;
    if ($total == 0) {
        header('location:index_category.php');
    } else {
        $raw = mysqli_fetch_assoc($data);


        if (count($_POST) > 0) {
            if ($_GET['id'] == $_POST['sid']) {
                $name = $_POST['cname'];
                $active = $_POST['active'];

                $query = " UPDATE `category` SET `cname`='$name',`active`='$active' WHERE id=". $_GET['id'];
                $update = mysqli_query($conn, $query);
                if ($update) {
                    echo "Data updated;";
                    header('location:index_category.php');
                } else {
                    echo "Data Failed";
                }
            } else {
                header('location:index_category.php');
            }
        }
    }
        // echo "<pre>"; 
        // print_r($raw);
        // echo "</pre>";
        ?>
    <div class="container">
        <div class="pull-left">
            
        <h3>Logout : <a href="logout.php"><?php echo $email; ?></a></h3>
        <form action="" method="POST">
        <input type="hidden" name="sid" value="<?= $raw['id'] ?>">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" id="cname" name="cname" class="form-control" placeholder="Enter your Category" value="<?= $raw['cname'] ?>"
                             autofocus required>
                        <span class="text-danger" id="cname_err"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <b>Active</b>
                    <div class="form-group">
                        <select name="active" id="active" class="form-control" required>
                            <option value="">Select</option>
                            <option value="Yes" <?php if($raw['active']=="yes"){ echo "selected";}?>>Yes</option>
                            <option value="No" <?php if($raw['active']=="no"){ echo "selected";}?>>No</option>
                        </select>
                    </div>
                    <small id="activeval" class="text-danger"></small>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Update </button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>