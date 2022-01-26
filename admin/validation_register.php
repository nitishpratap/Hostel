<?php 
	session_start();
	

	require("../connection.php"); //stablishing connection from MySQl database

	$fname = mysqli_real_escape_string($con,$_POST['fname']);
	$mname = mysqli_real_escape_string($con,$_POST['mname']);
	$lname = mysqli_real_escape_string($con,$_POST['lname']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$gender = mysqli_real_escape_string($con,$_POST['Gender']);
	$pws = mysqli_real_escape_string($con,$_POST['password']);
	$transac = mysqli_real_escape_string($con,$_POST['transactionId']);
	
	$q="SELECT * from student_login where email=?;";
	//prepared statement
	$stmt=mysqli_stmt_init($con);
	if (!mysqli_stmt_prepare($stmt,$q)) {
		echo "sql statement failed";
	}else{
		//bind parameters to the placeholder
		mysqli_stmt_bind_param($stmt ,"s", $email);
		//run parameters inside database
		mysqli_stmt_execute($stmt);   //Run the query
		$result=mysqli_stmt_get_result($stmt);
	}

	
	
	$num=mysqli_num_rows($result); // gives the number of rows in $result
	
	if($num==1){
		$_SESSION['dup-email']="*** $email is already registered.Try again with another email address ***";
		header('location:Register_1.php');  //redirect to Register_1.php
	}
	else
	{
		$qy="INSERT INTO `student_login`(`first_name`,`middle_name`, `last_name`, `email`,`gender`,`transactionid`, `password`) VALUES (?,?,?,?,?,?,?)";
		//prepared statement
		$stmt=mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($stmt,$qy)) {
			echo "sql statement failed";
		}else{
			//bind parameters to the placeholder
			mysqli_stmt_bind_param($stmt ,"sssssss", $fname, $mname, $lname, $email, $gender,$transac, $pws);
			//run parameters inside database

			if(mysqli_stmt_execute($stmt)){
				mysqli_close($con);
				$_SESSION['registered']="*** Registered Successfully ***" ;
	       		header('location:Register_1.php'); //redirect to login.php
			}
	       	else{
	       		mysqli_close($con);
	       		header('location:Register_1.php');
	       		$_SESSION['fail']="*** Registration Failed ***" ;
	       	}
        }
       		
	}

?>