    <!--PHP CODE--->
<?php
 include ("Config.php");
 if(isset($_POST['submit'])){

    
        $data=$_POST['check'];

          $formdata =$_POST['check'];
          $formdata=implode(",",$_POST['check']);

          

          foreach($data as $key => $value)
          {
          $query ="INSERT INTO sampledata VALUES ('','".$value."','')";
          $data=mysqli_query($conn,$query);
          }
          
          if($data)
          {
              echo"Data Inserted";
              header('Location:dataform.php');

          }
          else{
              echo"Data Inserted failed";
          }
    
 
    $formdata=$_POST['check'];

    $formdata=implode(",", $_POST['check']);

}
?>

    <!--SCRIPT-->
<script>

    function resetData() {
    document.getElementById("check[]").checked=false;
   
    }

    /*$("input:checkbox").click(function(){
    if ($("input:checkbox:checked").length > 3){
      return false;
    }
    });*/


    

       


</script>


    <!--HTML CODE--->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sample Form</title>
</head>
<body>
<form  action= "" method="POST">
      
    <!--CHECKBOX--->
    <div>
    <input type="checkbox" name="check[]"  value="checkbox1">Checkbox1 <br> 
    <input type="checkbox" name="check[]"  value="checkbox2">Checkbox2 <br>
    <input type="checkbox" name="check[]"  value="checkbox3">Checkbox3 <br>
    <input type="checkbox" name="check[]"  value="checkbox4">Checkbox4 <br> 
    <input type="checkbox" name="check[]"  value="checkbox5">Checkbox5 <br>
    <input type="checkbox" name="check[]"  value="checkbox6">Checkbox6 <br>
    <input type="checkbox" name="check[]"  value="checkbox7">Checkbox7 <br>
    <input type="checkbox" name="check[]"  value="checkbox8">Checkbox8 <br>
    <input type="checkbox" name="check[]"  value="checkbox9">Checkbox9 <br>
    <input type="checkbox" name="check[]"  value="checkbox10">Checkbox10
    <br><br>
    </div>

    <!--BUTTON--->
    <button type="submit" value="submit" name="submit" kid="submit"onclick="dataform.php">Submit </button>
    <button type="submit" value="reset" name="reset" resetData()>Reset </button>


</form>  
</body>
</html>

