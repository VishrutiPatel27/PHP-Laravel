<?php
 
 include ("Config.php");
//  echo"<pre>";
//  print_r($_POST);
//  echo"</pre>";

 foreach($_POST as $key=>$value)
 {
    $formdata = "";
    $formdata = explode("_",$key);
    if(in_array("formtextdata",$formdata))
    {
        // echo"<pre>";
        // print_r($formdata);
        // echo"</pre>";
        if(trim($value)!="")
        {
            $id = $formdata[1];
            $sql = "UPDATE sampledata set form_text_data='$value' where id = '$id'";
            $data=mysqli_query($conn,$sql);
        }
    }
    
 }
 $query="SELECT * FROM sampledata";
 $data= mysqli_query($conn,$query);
 $total = mysqli_num_rows($data); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>  
    <form method="POST">
    <?php
    if($total != 0)
{
      ?>
         <center>
         <h2>Display Records</h2>
         <p><span id="txtHint"></span></p>
         </center>
         <center>
        <table border="2" cellspacing="5" width ="100%">
            <tr>
            <th width="10%">Id</th>
            <th width="10%">Sample form checkboxes</th>
            <th width="10%">Data of checkbox</th>
           
            </tr>
</center>
    <?php
        //$result = mysqli_fetch_assoc($data);
        //echo "<pre>";
       // print_r($result);
       // echo "</pre>";
      while($result = mysqli_fetch_assoc($data))
      {
    ?>
        <tr>    
            <td><?php echo $result['id']?>
                <input type="hidden" name="id_<?php echo $result['Id']?>" value="<?php echo $result['Id']?>">
            </td>
		    <td><?php echo $result['form_data']?>
                <input checked type="checkbox" name="check_<?php echo $result['Id']?>" value="<?php echo $result['form_data']?>"/>
            </td>
		    <td>
                <input type="text" name="formtextdata_<?php echo $result['id']?>"/>
            </td>
        </tr>

      <?php
      }
    }
    else
    {
      echo "No record found..";
    }
    ?>
  
    <tr>
        <td colspan="3" style="text-align: center;">
            <input type="submit" value="submit" name="submit">
        </td>
    </tr>
    </table>
    </form>
</body>
</html>