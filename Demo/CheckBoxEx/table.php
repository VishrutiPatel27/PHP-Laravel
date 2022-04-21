<?php
require("Config.php");
require('function.php');
//$query = mysqli_query($conn,"select * from tablea ORDER BY checkboxes ASC");
// session_start();
?>
<html>
<head>
<body>
    <?php
    if(isset($_SESSION['status']))
    {
        echo "<h4>".$SESSION['status']."</h4>";
        unset($_SESSION['status']);
    }
   
    $totaldata=$callToAction->getdata('tablea','tableb');
    $query=$totaldata['data'];
    $query1=$totaldata['data1'];
    ?>
        
        
        <center>
        <h1>Table A</h1>
        <form method="POST" action="function.php">
            <table border="1">
                <tr>
                    <th></th>
                    <th>Checkboxes</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($query))
                    {
                        echo "<tr>";
                        echo "<td> <input type='checkbox' name='check[]' value='".$row['checkboxes']."'></td><td>".$row['checkboxes']." </td>" ;
                        echo "</tr>";
                    }
                    echo "</table>";

                ?>
                </br>
                <input type="submit" name="swap1" id="swap1" value="Swap to B">
        </form>
        </center>


<?php
//$query1 = mysqli_query($conn,"select * from tableb ORDER BY checkboxes ASC");
    if(isset($_SESSION['status']))
    {
        echo "<h4>".$SESSION['status']."</h4>";
        unset($_SESSION['status']);
    }
?>
        <center>
        <h1>Table B</h1>
        <form method="POST" action="function.php">
            <table border="1">
                <tr>
                    <th></th>
                    <th>Checkboxes</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($query1))
                    {
                        echo "<tr>";
                        echo "<td> <input type='checkbox' name='check[]' value='".$row['checkboxes']."'></td><td>".$row['checkboxes']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                ?>
                </br>
                <input type="submit" name="swap2" id="swap2" value="Swap To A">
                </form>
        <?php
            mysqli_close($conn);
        ?>
   
        </center>
</body>
</html> 