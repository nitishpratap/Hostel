<!-- validate the student login details -->

<?php 
	
	include('includes/security.php');
	require("../connection.php");  //include connection file
	$email = mysqli_real_escape_string($con,$_POST['email']);    //accept email from login form
	$pws = mysqli_real_escape_string($con,$_POST['password']);   //accept password from login form
	
	// set cookies for remember me
	if(!empty($_POST["remember"])) {
		setcookie ("email",$email,time() + (86400 * 30));
		setcookie ("password",$pws,time() + (86400 * 30));
		
	} else {
		setcookie("email","");
		setcookie("password","");
		
	}

	
	
	
	$q="SELECT * from student_login where email=? AND password=?;";

	//prepared statement
	$stmt=mysqli_stmt_init($con);
	if (!mysqli_stmt_prepare($stmt,$q)) {
		echo "sql statement failed";
	}else{
		//bind parameters to the placeholder
		mysqli_stmt_bind_param($stmt ,"ss", $email , $pws);
		//run parameters inside database
		mysqli_stmt_execute($stmt);
		if ($result=mysqli_stmt_get_result($stmt)) {
			echo "result success <br>";
		}

		$data=mysqli_fetch_array($result);
		mysqli_close($con);
		$num=mysqli_num_rows($result);
		if($num==1){
			$_SESSION['email']=$email; //set session variable for email 
			header("location:student_home.php?email=". urlencode($email)."&& gender=". urlencode($data[gender])); //redirect to student_home.php with sending email as data
			
		}
		else
		{
	        $_SESSION['error-login']="*** incorrect email/password ***"; //set error flag
			header('location:login.php'); //redirect to login.php
			
		}
	}

	?>