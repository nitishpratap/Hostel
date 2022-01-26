<?php
	include('includes/security.php'); 	//security features

	$changeStuPass=$_POST['changeStuPass'];
	if (isset($changeStuPass)) 
	{
		require('../connection.php');  //establishing connection from database
		$email=$_POST['Email'];
	    $query="SELECT * FROM student_login where email='$email' ";
	    $data=mysqli_query($con,$query);   //execute query
	    $result=mysqli_fetch_array($data); //fetch array from selected tuples
	    $num=mysqli_num_rows($data);  //number of rows selected
	    $newpass=$_POST['newpass'];		//accept new password
	    
	    
	    if ($num == 1) // to check uniqueness
	     {
	    	$q="UPDATE `student_login` SET password='$newpass' WHERE email='$email'";
	    	
	    	if (mysqli_query($con,$q)) //execute query 
	    	{
	    		$_SESSION['changesuccess']="*** Successfully changed ***";
	    		header('location:changestudentpass.php'); //redirect to same page
	    	}
	    	else
	    	{
	    		$_SESSION['err']="*** Sorry some internal error occured ***";
	    		header('location:changestudentpass.php'); //redirect to same page
	    	}
	    }
	    else
	    {
	    	$_SESSION['err']="*** This email doesn't exists in our system. ***"; //set error session flag
	    	header('location:changestudentpass.php'); //redirect to same page
	    }
	}