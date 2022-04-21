<html>
<body>
<form method="POST">

<center>
<h3>Registration</h3>

        <!--NAME--->
<lable>Name<span>*</span></lable>
<input type="text" name="Name"placeholder="Enter Your Name..."></br><br>

        <!--ADDRESS-->
<lable>Adddress<span>*</span></lable>
<textarea name="Address" rows="3" cols="30" placeholder="Enter Your Address..."></textarea></br><br>

        <!--CONTACT-->
<lable>Contact No.<span>*</span></lable>
<input type="text" name="Contact" maxlength="10" placeholder="Enter Your Contact no..."></br><br>


        <!--GENDER-->
<lable>Gender<span>*</span></lable>
<input type="radio" name="Gender" value="Female" checked>Female
<input type="radio" name="Gender" value="Male">Male</br> <br>


        <!--Designation-->
<lable>Designation<span>*</span></lable>
<select name="Desgnation">
    <option value="">Select</option>
    <option value="Jr.Developer">Jr.Developer</option>
    <option value="Senior Developer">Senior Developer</option>
    <option value="Manager">Manager</option>
</select></br><br>


        <!--BUTTON-->
<button type="submit">Submit</button></br>
</center>
</form>
</body>
</html>

<?php
    
    echo "<center>";
    $post = $_POST;
    {
    
        foreach($post as $key => $value) {
    
            if(empty($post[$key])) {
            $message =  $key . " is required!";
            echo $message;
              
            }
            else
              echo $value;
              echo "</br>";
        }
    
    }   
    echo "</center>";    
    
?>