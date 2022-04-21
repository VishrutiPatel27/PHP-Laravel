<?php
 include ("Config.php");
 if(isset($_POST['submit'])){

  
  {
          
          $tech =$_POST['check'];
          $tech=implode(",",$_POST['check']);

          $query ="INSERT INTO demo values ('','".$tech."')";
          $data=mysqli_query($conn,$query);
        
          if($data)
          {
              echo"Data Inserted";

          }
          else{
              echo"Data Inserted failed";
          }
  }
 

 

  $tech=$_POST['check'];

  $tech=implode(",", $_POST['check']);



}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pratice Form</title>
</head>
<body>
  <form  action= "" method="POST">
    

    

    <input type="checkbox" name="check[]"  value="PHP" >PHP <br> 
    
    <input type="checkbox" name="check[]"  value="JAVA">JAVA <br>
    
    <input type="checkbox" name="check[]"  value="REACT">.NET
    <br><br>

   
   

    <button type="submit" value="submit" name="submit"  >Submit </button>

    


  </form>  

</body>
</html>


