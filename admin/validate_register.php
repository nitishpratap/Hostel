<?php
	require '../connection.php';
	$email=$_POST['email'];
	$pws=$_POST['password'];
	$q="select * from admin_login where username='$email';";
	$result=mysqli_query($con,$q); //Run the query
	
	
	$num=mysqli_num_rows($result); // gives the number of rows in $result
	
	if($num==1){
		$_SESSION['dup-email']="*** $email is already registered.Try again with another email address ***";
		header('location:register.php');  //redirect to Register_1.php
	}
	else
	{
		$qy="INSERT INTO `admin_login`(`username`, `password`) VALUES ('$email', '$pws')";
		if(mysqli_query($con,$qy)){
			mysqli_close($con);
			$_SESSION['success']="*** Successfully Registered ***";
       		header('location:register.php'); //redirect to login.php
		}
       	else{
       		mysqli_close($con);
       		header('location:register.php');
       		$_SESSION['fail']="*** Registration failed ***" ;
       	}
       		
	}
?>