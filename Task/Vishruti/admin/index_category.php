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
<html>
    <head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<script>
// window.history.forward();
</script>
<script>
function deletere(str) {

    if (confirm('Are you sure want to delete?')) {

        if (str.length == 0) {

            document.getElementById("txtHint").innerHTML = "";

            return;

        } else {

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {

                    if (this.responseText == 1) {

                        document.getElementById("txtHint").innerHTML = "Record deleted successfully";

                        setInterval('window.location.reload()', 2000);

                    } else {

                        document.getElementById("txtHint").innerHTML = this.responseText;

                    }

                }

            }

        };

        xmlhttp.open("GET", "delete_category.php?id=" + str, true);

        xmlhttp.send();

    }

}
</script>
<style>
    body {
        background-color: teal;
        color: white;
    }
    
    </style>
</head>
<body>
    
    <br>
    <h3><?php echo $email; ?> <a href="logout.php">:Logout</a></h3>


    <div class="pull-right">
        <a class="btn btn-warning" href="category.php"> Add New Category</a>
        <a class="btn btn-success" href="index_product.php" > Product </a> 
         <a class="btn btn-info" href="index_product.php"> Back</a> 

            </div>

    <?php
      require ("config.php");
      error_reporting(0);
       $query = "SELECT * FROM category ";
       $data = mysqli_query($conn, $query);
       $total = mysqli_num_rows($data);
       
     
       echo "<br>";
       //echo $total;
     
       if($total != 0)
     {
           ?>
    <center>
        <h2>Category Records</h2>
        <p><span id="txtHint"></span></p>
    </center>
    <center>
        <table border="4" cellspacing="4" width="100%" class="table table-bordered" ">
            <tr>
                <th width="5%">Id</th>
                <th width="15%">Name</th>
                <th width="15%">Active</th>
                <?php 
                    if($utype == "1" || $utype =="0"){?>
                <th width="10%">Action</th>
                <?php }?>
            </tr>
    </center>
    <?php
           while($result = mysqli_fetch_assoc($data))
           {
         ?>
    <tr>
        <td><?=$result['id']?></td>
        <td><?=$result['cname']?></td>
        <td><?=$result['active']?></td>

        <?php
                if($utype == "1" || $utype =="0"){?>
        <td><a href='update_category.php?id=<?=$result['id']?>' class="btn btn-primary">Edit</a>
            <button class="btn btn-danger" onclick="deletere(<?=$result['id']?>);">Delete</button>

            <?php }?>
    </tr>
    <?php
           }
         }
     
         else
         {
           echo "No record found..";
         }
     
         ?>
    </table>
</body>

</html>