<?php
include 'config.php';
session_start(); 
if(isset($_POST) && count($_POST)>0){
    $useremail = $_POST['email'];  
    $userpass = $_POST['password'];  
    if ($useremail != '' && $userpass != '')
    {

        
            $query = "SELECT * FROM newadmin where email = '$useremail' and password = '$userpass'";
            $result = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
                $row =mysqli_fetch_assoc($result);
                // echo $row['utype'];
                // exit;
    
                $_SESSION['email1']=$row['email'];
                $_SESSION['utype1']=$row['usertype'];
                $_SESSION['email']=$useremail;
                
                $utype=$row['utype'];
                //echo $utype;
                // exit;
            
                if ($utype==0)
                {
                    $_SESSION['user']==0;
                    header("location:index_product.php");
                    
                }
                else
                {
                    $_SESSION['admin']==1;
                    header("location:index_product.php");
                    
                }
            }
            else{
                //  header('location:admin.php');
               echo "INVALID LOGIN";
            }
        
    }
}
   
?>