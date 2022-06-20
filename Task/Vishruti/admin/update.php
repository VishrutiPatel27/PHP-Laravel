<?php
session_start(); 

if(!$_SESSION['email']=="testuser@kcsitglobal.com"){
    header("admin.php");
}
error_reporting(0);
$id = $_GET['id'];
//echo $id; 
$query = "SELECT * FROM newadmin where id='$id' ";
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
    <script src="../javascript/admin_register.JS"></script>
    <style>
    body {
        background-color: teal;
        color: white;
    }
    
</style>
</head>

<body>
<?php

    require("config.php");
    error_reporting(0);
    $query = "SELECT * FROM newadmin where id = '" . $_GET['id'] . "'";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    echo "<br>";
    //echo $total;
    if ($total == 0) {
        header('location:index.php');
    } else {
        $raw = mysqli_fetch_assoc($data);


        if (count($_POST) > 0) {
            if ($_GET['id'] == $_POST['sid']) {
                //echo "thanks"; exit;
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $gender = $_POST['gender'];
                $hobbies=implode(',',$_POST["checkbox"]);

                $query = " UPDATE `newadmin` SET `name`='$name',`email`='$email',`password`='$password',`gender`='$gender',`hobbies`='$hobbies' WHERE id=". $_GET['id'];
                $update = mysqli_query($conn, $query);
                if ($update) {
                    echo "Data updated;";
                    header('location:index.php');
                } else {
                    echo "Data Failed";
                }
            } else {
                header('location:index.php');
            }
        }
    }
        // echo "<pre>"; 
        // print_r($raw);
        // echo "</pre>";
        ?>
    <div class="container">
        <div class="pull-left">

            <h2>Update Admin Records</h2>
         
            <h3>Logout : <a href="logout.php"><?=$_SESSION['email']?></a></h3>
        <form action="" method="POST">
        <input type="hidden" name="sid" value="<?= $raw['id'] ?>">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" value="<?= $raw['name'] ?>"
                            required autofocus>
                        <span class="text-danger" id="name_err"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your Email" value="<?=$raw['email']?>"
                            required>
                        <span class="text-danger" id="email_err"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" id="password" name="password" placeholder="Enter Password" value="<?=$raw['password']?>"
                            class="form-control" required>
                        <span class="text-danger" id="pass_err"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gender:</strong>
                        <div class="input-group">
                            <input type="radio" name="gender" id="male" value="male" <?php if ($raw['gender'] == "male") {echo "checked";} ?>>
                            <span>Male</i></span><br>
                            <input type="radio" name="gender" id="female" value="female" <?php if ($raw['gender'] == "female") {echo "checked";} ?>>
                            <span> Female</i></span>
                        </div>
                        <span class="text-danger" ></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Hobbies:</strong><br>
                        <input type="checkbox" name="checkbox[]" value="Cricket" <?php if(in_array("Cricket",explode(",",$raw['hobbies']))){echo "checked";}?>>Cricket<br>
                        <input type="checkbox" name="checkbox[]" value="Singing" <?php if(in_array("Singing",explode(",",$raw['hobbies']))){echo "checked";}?>>Singing<br>
                        <input type="checkbox" name="checkbox[]" value="Swimming" <?php if(in_array("Swimming",explode(",",$raw['hobbies']))){echo "checked";}?>>Swimming<br>
                        <input type="checkbox" name="checkbox[]" value="Shopping" <?php if(in_array("Shopping",explode(",",$raw['hobbies']))){echo "checked";}?>>Shopping<br>
                        <span class="text-danger" id="check_err"></span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Update </button>
                </div>
                <div class="pull-right">
                    <a href="index.php"> Back</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>