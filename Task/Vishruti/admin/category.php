<?php
session_start();
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
    <title>Category</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
        integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
        <script src="../javascript/validation_category.js" type="text/javascript"></script>
    <style>
    body {
        background-color: teal;
        color: white;
    }
    </style>
    <script src="./javascript/validation_category.js" type="text/javascript"></script>
</head>

<body>
    <div class="container">

        <form action="category_process.php" method="POST">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Category Name:</strong>
                        <input type="text" id="cname" name="cname" class="form-control"
                            placeholder="Enter Category Name" autofocus>
                        <span class="text-danger" id="cname_err"></span>
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
                    <button type="submit" id="submit" name="submit" class="btn btn-success">Add Category</button>
                </div>
                <br>
                <br>
                <div class="pull-right">
                    <a href="index_category.php"> Back</a>
                </div>
            </div>
</body>

</html>