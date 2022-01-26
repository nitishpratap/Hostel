<?php 
	
	include("includes/security.php");
	require("../connection.php");
	

	//accept data from login form
	
	$email = mysqli_real_escape_string($con,$_POST['username']);
	$pws = mysqli_real_escape_string($con,$_POST['password']);
	
	// set cookies for remember me
	if(!empty($_POST["remember"])) {
		setcookie ("username",$email,time() + (86400 * 30));
		setcookie ("password",$pws,time() + (86400 * 30));
		
	} else {
		setcookie("username","");
		setcookie("password","");
		
	}
	
	//created a template
	$q="SELECT * FROM admin_login WHERE username=? AND password=?;";
	//prepared statement
	echo $q;
	$stmt=mysqli_stmt_init($con);
	if (!mysqli_stmt_prepare($stmt,$q)) {
		echo "sql statement failed";
	}else{
		//bind parameters to the placeholder
		mysqli_stmt_bind_param($stmt ,"ss", $email , $pws);
		//run parameters inside database
		mysqli_stmt_execute($stmt);
		$result=mysqli_stmt_get_result($stmt);

			//validate user details
		$num=mysqli_num_rows($result); //number of row selected
		if($num == 1){
			$_SESSION['username']=$email; //set session flag
			header('location:index.php');  //redirect to index.php page

		}
		else{
			$_SESSION['error-login']="*** incorrect email/password ***"; //set error flag
			header('location:adminlogin.php'); //redirect to login.php
		}
	}
	

?>