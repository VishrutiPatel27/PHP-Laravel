<?php
session_start();
$email=$_SESSION['email1'];
 $utype=$_SESSION['utype1'];
//  echo "$utype";
 if(!isset($email))
 {
     Header('Location:admin.php');
 }

?>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
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

            xmlhttp.open("GET", "delete_product.php?id=" + str, true);

            xmlhttp.send();

        }


    }
    </script>
      <script type="text/javascript">
    $(document).ready(function() {

        $("#catid").change( function() {
            var value = $(this).val()
            console.log(value); 
            $.ajax({
                url: "filter.php",
                type: "POST",
                data: 'request=' + value,
                beforeSend: function() {
                    $(".table").html("<span>working....</span>");
                },
                success: function(data) {
                    $(".table").html(data);
                 
                    $("#catid option[value="+value+"]").attr("selected","selected");
                   
                }
            })
        });
    });
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
    <div class="pull-right">
        <h3><?php echo $email; ?><a href="logout.php">:Logout</a></h3>
    </div>
    
    <div class="pull-left">
    <br><br>
    <select name="catid" id="catid" class=" catid form-control">
                        <option value="">All</option>
                        <?php 
                                include 'config.php';
                                $sql1 = "SELECT * FROM category";
                                $result1 = mysqli_query($conn, $sql1);
                                if (mysqli_num_rows($result1) > 0) {
                                    while($row1 = mysqli_fetch_assoc($result1)) {?>
                        <option value="<?php echo $row1['id']?>"><?php echo $row1['cname']?></option>
                        <?php }
                                } 
                            ?>
                    </select>

                            </div>

    <?php
    
      
       $query = "SELECT * FROM product";
       $data = mysqli_query($conn, $query);
       $total = mysqli_num_rows($data);
    
     
       if($total != 0)
     {
           ?>
    <center>
        <h2>Product Records</h2>
        <p><span id="txtHint"></span></p>
    </center>
    <center>
        <table border="4" cellspacing="4" width="50%" class="table table-bordered" id="table">
            <tr>
                <th width="5%">Id</th>
                <th width="8%"> Product Name</th>
                <th width="5%">Category Name</th>
                <th width="5%">Image</th>
                <th width="8%">Created By</th>
                <?php
                    if ($utype == "1" || $utype =="0") { ?>
                        <th width="8%">Active</th>
                    <?php } ?>
                <?php 
                    if($utype == "1" || $utype =="0"){?>
                <th width="8%">Action</th>
                <div class="pull-right">
                    <a class="btn btn-warning" href="product.php"> Add New Product</a>
                    <a class="btn btn-success" href="index_category.php">Category List</a>
                      <a class="btn btn-danger" href="index.php">Admins List</a>


                </div>
                <?php }?>
                <div class="pull-right">
                  
                </div>
                <br>
            </tr>
            <br>

            <?php
                include 'config.php';
                $query = "SELECT * FROM product WHERE active='yes'";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result)>0){
           while($result = mysqli_fetch_assoc($data))
           {
?>
            <tr>
                <td><?=$result['id']?></td>
                <td><?=$result['pname']?></td>
                <td>

                    <?php
                     $catid = $result['catid'];
                     $query1 = "SELECT cname FROM category where id = '$catid'";
                     $data1 = mysqli_query($conn,$query1);
                     if (mysqli_num_rows($data1) > 0)
                     {
                         while($raw1 = mysqli_fetch_assoc($data1))
                         {
                             echo $raw1['cname'];
                         }
                     }

                ?>

                </td>
                <td><img src="../images/<?php echo $result['image'];?>" width="180" height="150"></td>
                <td><?=$result['createby']?></th>
                <td><?=$result['active']?></td>

                <?php
                            if ($utype == "1" || $utype =="0") { ?>
                                <td><a href='update_product.php?id=<?=$result['id']?>' class="btn btn-primary">update</a>
                                <button class="btn btn-danger" onclick="deletere(<?=$result['id']?>);">Delete</button>
                                </td>
                            <?php } ?>

            
            </tr>
            <?php
           }
         }
      
         else
         {
           echo "No record found..";
         }
        }
    
         ?>
        </table>
</body>

</html>