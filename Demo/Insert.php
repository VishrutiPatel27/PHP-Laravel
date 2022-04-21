
<?php
		error_reporting(0);

	require("Config.php");
	
	$conn = mysqli_connect("localhost", "root", "", "crud");
	  
	// Check connection
	if($conn === false){
		die("ERROR: Could not connect. " 
			. mysqli_connect_error());
	}
	  
	
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$address = $_POST["address"];
	$gender = $_POST["gender"];
	$designation = $_POST["designation"];
	$file = $_FILES["fileToUpload"]['name'];

	$sql = "INSERT INTO student (`id`, `fname`, `lname`, `email`, `password`, `address`, `gender`, `designation`, `file`) VALUES ('','$fname','$lname','$email','$password','$address','$gender','$designation','$file')";
	
	if(mysqli_query($conn, $sql)){
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual  or fake 
	if(isset($_POST["submit"])) {
	// $check = getfilesize($_FILES["fileToUpload"]["tmp_name"]);
	// if($check !== false) {
	// 	echo "File is correct" . $check["mime"] . ".";
	// 	$uploadOk = 1;

	// } else {
	// 	echo "File is not correct";
	// 	$uploadOk = 0;
	// }
	}

	// Check if file already exists
	if (file_exists($target_file)) {
	echo "Sorry, file already exists.";
	$uploadOk = 0;
	}

	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	echo "Sorry, your file is too large.";
	$uploadOk = 0;
	}

	// Allow certain file formats
	if($FileType != "pdf" && $FileType != "docx" && $FileType != "xml")
	 {
	echo "Sorry, only PDF, DOCX & XML files are allowed.";
	$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} 
	else {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
	}	
	
	{
		echo "<h3>data stored in a database successfully.</h3>";
		header('location:Login.php');
		
	}
}	
	else{

		echo "ERROR: Sorry Data Not Inserted ";
	
		}	
	 
	
	
	?>


	
	

