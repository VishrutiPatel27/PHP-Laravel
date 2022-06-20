<?php
include 'admin_process.php';
include '../Phpvalidation/admin_php_validation.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
        integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
    <script src="../javascript/adminlogin.js"></script>
    <style type="text/css">
    #cnform {
        box-shadow: 0px 0px 3px gray;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    i.fa,
    b {
        color: teal;
    }

    body {
        background-color: teal;
        color: white;

    }
    </style>
</head>

<body>
    <form action="" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12"
                    id="cnform" style = "background-color: black;">
                    <br>
                    <h3 class="text-center" style = "color: teal"><i class="fa fa-user-plus"></i>Login</h3>
                    <hr>
                    <small class="text-danger"><?php $error?></small>
                    <div class="form-group">
                        <b>Email</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input id="email" type="text" name="email" placeholder="Enter email id here"
                                maxlength="50" class="form-control" />
                        </div> 
                        <small id="email_err" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <b>Password</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input id="password" type="password" name="password" placeholder="Enter password here"
                                maxlength="12" class="form-control" require>
                        </div>
                        <small id="pass_err" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" id="submit" name="submit">
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>