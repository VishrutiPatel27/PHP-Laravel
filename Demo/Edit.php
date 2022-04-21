
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Form</title>
  <link rel="stylesheet" type="text/css" href="./style.css">

</head>
<body> 


<?php
 require ("Config.php");
 //error_reporting(0);
  $query = "SELECT * FROM student where id = '".$_GET['id']."'";
  $data = mysqli_query($conn, $query);
  $total = mysqli_num_rows($data);
  echo "<br>";
  //echo $total;
if($total == 0)
{
    header('location:Profile.php');
}
else
{
        $raw = mysqli_fetch_assoc($data);

        //echo "<pre>";
        //print_r($_POST);
        //echo "</pre>";
        if(count($_POST)>0)
        {
            if($_GET['id']==$_POST['sid'])
            {
                //echo "thanks"; exit;
                $name = $_POST['fname'];
                $lname= $_POST['lname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $address=$_POST['address'];
                $gender =$_POST['gender'];
                $designation =$_POST['designation'];
                
               
                
                $query = "UPDATE student SET fname = '$name', lname = '$lname' , email ='$email', password='$password', address='$address',gender='$gender', designation='$designation' WHERE id=".$_GET['id'];
                $update = mysqli_query($conn,$query);
                if($update)
                {
                    echo "Data updated;";
                    header('location:Profile.php');
                }
                else
                {
                    echo "Data Failed";
                }
            }
            else
            {
                header('location:Profile.php');
                
            }
        }
        // echo "<pre>"; 
        // print_r($raw);
        // echo "</pre>";
?>

  <form method="POST" enctype="multipart/form-data">
      <input type="hidden" name="sid" value="<?=$raw['id']?>"> 
  <div class="container">
    <div class="title">
      Edit Form 
    </div>
    <div class="form">
      <!--FIRST NAME-->  
          <div class="input_field">
            <label> First Name </label>
            <input type="text" class="input" placeholder="Enter Your First Name" name="fname" value="<?=$raw['fname']?>">
          </div>


      <!--LAST NAME-->
        <div class="input_field">
          <label> Last Name </label>
          <input type="text" class="input" placeholder="Enter Your Last Name" name="lname" value="<?=$raw['lname']?>">
        </div>
      <!--EMAIL-->

        <div class="input_field">
          <label> Email </label>
          <input type="email" class="input" placeholder="Enter Your Email Here." name="email" value="<?=$raw['email']?>">
        </div>
      <!--PASSWORD-->

        <div class="input_field">
          <label> Password </label>
          <input type="password" class="input" placeholder="Create Your Password" name="password" value="<?=$raw['password']?>">
        </div>

      <!--CONFIRM PASSWORD-->
        <!--
        <div class="input_field">
          <label> Confirm Password </label>
          <input type="password" class="input" placeholder="Enter Your Confirm Password" name="conpassword">
        </div>-->

      <!--ADDRESS-->
      <div class="input_field">
          <label> Address</label>
          <textarea rows="3" cols="30" placeholder="Enter Your Address" class="input" name="address" >

          <?php echo $raw['address'];?>
          </textarea>
        </div>

      <!---Gender-->
		<div class="input_field">
		<label>Gender</label>
		<input type="radio" name="gender" class="input" value="1" <?php if($raw['gender']=="1") {echo "checked";}?>>female
		<input type="radio" name="gender" class="input" value="0" <?php if($raw['gender']=="0") {echo "checked";}?>>male
		</div>
      
      <!--Choose Designation-->
     <div class="input_field"> 
      Designation:  
          <select name="designation" class="designation" name="designation">
            <option value="">Select Your Designation</option>
            <option value="Project Manager" <?php if($raw['designation']=="Project Manager") { echo "selected=selected"; } else {echo "";} ?> >Project Manager </option>
            <option value="Jr Developer"  <?php if($raw['designation']=="Jr Developer") { echo "selected=selected"; } else {echo "";} ?> >Jr Developer</option>
            <option value="Sr Developer" <?php if($raw['designation']=="Sr Developer") { echo "selected=selected"; } else {echo "";} ?> >Sr Developer</option>
            <option value="Human Resources" <?php if($raw['designation']=="Human Resources") { echo "selected=selected"; } else {echo "";} ?> >Human Resources</option>
          </select>
     </div>
          <br>


          

          <!--<div class="input_field">
          <button type="button" class="btn" value="Update Details" name="submit" onclick="window.location.href='./Profile.php';">Edit

          </button>
          </div>
          -->
          <div class="input_field">
          <input type="submit" class="btn" value="Edit Details" name="submit">
          </div>  
          
            
    </div>
  </div>
  </form>
  <?php 
    }
     ?>
</body>
</html>