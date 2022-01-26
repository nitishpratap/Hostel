<?php
include('includes/security.php');
require('../connection.php');

error_reporting(0);
    
    $sno=$_POST['delete_id'];
    
    if(isset($_POST['delete_btn']))
    {
    	$query="DELETE FROM `admin_login` WHERE sno='$sno' ";
	    $result=mysqli_query($con,$query);
	       if($result)
                    {
                        $_SESSION['success']="*** successfully Deleted ***";
                         header("location:register.php");
                        
                    }
                    else
                    {
                        $_SESSION['error_edit']="*** deletion failed! please try again ***";
                         header("location:register.php");
                    }
  	}  

include('includes/scripts.php');

?>