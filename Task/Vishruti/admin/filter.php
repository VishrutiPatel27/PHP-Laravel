<?php
session_start();
include 'config.php';
if (isset($_POST['request'])){
    $request = $_POST['request'];

    $query = "SELECT * FROM product WHERE catid = '$request' and active ='yes'";
    $request = mysqli_query($conn,$query);
    $count = mysqli_num_rows($request);
}
?>

<table class="table table-bordered" border="4" cellspacing="2" id="table">


    <?php
        if ($count){

        ?>

    <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Image</th>
            <th>Created By User ID</th>
            <th>Active</th>
                
        </tr>
        <?php
        }
        else
        {
                echo "sorry no record found.";
        }
        ?>
    </thead>
    <tbody>
        <?php
            while($row = mysqli_fetch_array($request)){

            ?>
        <tr>
            <td><?= $row['id']?></td>
            <td><?= $row['pname']?></td>
            <td>
                <?php 
                        $cat=$row['catid'];
                        $sel="select cname from category where id='$cat'";
                        $result2 = mysqli_query($conn, $sel);
                        if (mysqli_num_rows($result2) > 0) {
                            while($row2 = mysqli_fetch_assoc($result2)) {
                                echo $row2['cname'];
                            }
                        }
                        ?>
            </td>
            <td><img src="../images/<?php echo $row['image'];?> " width="140" height="100"></td>
            <td><?= $row['createby']?></td>
            <td><?= $row['active']?></td>
            
            </td>
            <?php }?>
        </tr>
      
    </tbody>

</table>