
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
                url: "filterindex.php",
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
    session_start();
    
    @$email=$_SESSION['email1'];
    @$utype=$_SESSION['utype1'];
    //echo "$utype";
      
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
                <th width="5%">Active</th>
            
               
               
                <div class="pull-right">
          
                   
                    <a class="btn btn-danger" href="./admin/admin.php">Login </a>

                </div>
                <br>
            </tr>
            <br>

            <?php
                include 'config.php';
                $query = "SELECT p.id, p.pname, c.cname,a.email,p.active,p.image FROM product p INNER JOIN category c ON p.catid = c.id INNER JOIN newadmin a ON p.createby = a.email where c.active= 'yes' and p.active='yes';
                ";   
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
                <td><img src="./images/<?php echo $result['image'];?>" width="180" height="150"></td>
                <td><?=$result['createby']?></th>
                <td><?=$result['active']?></td>

               
               
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