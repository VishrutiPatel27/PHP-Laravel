<?php
session_start();
@$email=$_SESSION['email1'];
 @$utype=$_SESSION['utype1'];
//  echo "$utype";
 if(!isset($email))
 {
     Header('Location:admin.php');
 }
include ('../Phpvalidation/admin_registration_php_validation.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Register</title>
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
    <center>
    <h2>Admin Register</h2>
</center>
    <div class="container">
        <br>
        <div class="pull-right">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" id="back" name="back" class="btn btn-primary"
                    onclick="window.location.href='index.php'">Back</button>
            </div>
        </div>
        <form action="admin_register_process.php" method="POST">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name"
                             required autofocus>
                        <span class="text-danger" id="name_err"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Enter your Email"
                           required >
                        <span class="text-danger" id="email_err"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" id="password" name="password" placeholder="Enter Password"
                            class="form-control" required >
                        <span class="text-danger" id="pass_err"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gender:</strong>
                        <div class="input-group">
                            <input type="radio" name="gender" id="male" value="male" checked>
                            <span>Male</i></span><br>
                            <input type="radio" name="gender" id="female" value="female">
                            <span> Female</i></span>
                        </div>
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Hobbies:</strong><br>
                        <input type="checkbox" name="checkbox[]" value="Cricket">Cricket<br>
                        <input type="checkbox" name="checkbox[]" value="Singing">Singing<br>
                        <input type="checkbox" name="checkbox[]" value="Swimming">Swimming<br>
                        <input type="checkbox" name="checkbox[]" value="Shopping">Shopping<br>
                        <span class="text-info" id="check_err">Please select atleast one checkbox</span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>