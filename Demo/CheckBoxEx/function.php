<?php
    session_start();
    require("Config.php");
    $callToAction = new insertdata();

    
    
    if (isset($_POST['swap1']))
    {
        $callToAction->inserta($value,'tableb','tablea','checkboxes');
           
    }
    if (isset($_POST['swap2']))
    {
        $callToAction->inserta($value,'tablea','tableb','checkboxes');   
    }


 
?>

<?php
class insertdata
{
    public function inserta($data,$tableb,$tablea,$col)
    {
        include("Config.php");

        $data = $_POST['check'];

        foreach($data as $value)


        {
            $query = "INSERT INTO $tableb VALUES ('','$value')";
            $query_run = mysqli_query($conn,$query);
            $del_sql = "delete from $tablea where $col = '$value'";
           
            mysqli_query($conn,$del_sql);
        }
        if($query_run)
        {
            echo "Inserted Successfully";
            header("Location: table.php");
        }
        else
        
        {
            echo "Data Not Inserted";
            header("Location: table.php");
        }

    }
    public function getdata($tablea,$tableb)
    {
        include("Config.php");
        $query = "SELECT * FROM $tablea ORDER BY checkboxes ASC";
        $data = mysqli_query($conn,$query);
        $total['total1'] = mysqli_num_rows($data);
        $total['data'] = $data;

        $query1 = "SELECT * FROM $tableb ORDER BY checkboxes ASC";
        $data1 = mysqli_query($conn,$query1);
        $total['total2'] = mysqli_num_rows($data1);
        $total['data1'] = $data1;

        return $total;
    }

}
?>

    
