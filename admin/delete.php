<?php
include('includes/security.php');
require('../connection.php');

error_reporting(0);
    
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    if($gender=="male")
    {
        $q="SELECT * FROM boys_details WHERE email='$email'";
        $data=mysqli_query($con,$q);
        $Res=mysqli_fetch_array($data);
        $photo='../form/'.$Res['photo'];
        $identity='../form/'.$Res['identity'];

        //check whether room allocated or not
        if ($Res['status'] == "allocated") {
            $query="UPDATE room SET capecity = capecity+1 WHERE room_id='$Res[room_no]'";
            if (mysqli_query($con,$query)) {
                $query="DELETE FROM `boys_details` WHERE email='$email'";
                $result=mysqli_query($con,$query);
                $query="DELETE FROM `student_login` WHERE email='$email'";
                $res=mysqli_query($con,$query);
                unlink($photo);
                unlink($identity);
            }
        }
        else{
            $query="DELETE FROM `boys_details` WHERE email='$email'";
            $result=mysqli_query($con,$query);
            $query="DELETE FROM `student_login` WHERE email='$email'";
            $res=mysqli_query($con,$query);
            unlink($photo);
            unlink($identity);
        }       

    	//set result messege and redirect to another page
	    if($result)
        {
            $_SESSION['success']="*** successfully Deleted ***";
            header("location:boys.php");                
        }
        else
        {
            $_SESSION['error_edit']="*** Deletion failed! Please try again ***";
            header("location:boys.php");
        }
  	}  //end of boys
    else if ($gender == "female")
    {
        $q="SELECT * FROM `girls_details` WHERE email='$email'";
        $data=mysqli_query($con,$q);
        $Res=mysqli_fetch_array($data);
        $photo='../form/'.$Res['photo'];
        $identity='../form/'.$Res['identity'];

        //check whether room allocated or not
        if ($Res['status'] == "allocated") {
            $q="UPDATE room SET capecity=capecity+1 WHERE room_id='$Res[room_no]'";
            if (mysqli_query($con,$q)) {
               $query="DELETE FROM `girls_details` WHERE email='$email' ";
                $result=mysqli_query($con,$query);
                $query="DELETE FROM `student_login` WHERE email='$email'";
                $res=mysqli_query($con,$query);
                unlink($photo);
                unlink($identity);
            }
    	}
        else{
            $query="DELETE FROM `girls_details` WHERE email='$email' ";
            $result=mysqli_query($con,$query);
            $query="DELETE FROM `student_login` WHERE email='$email'";
            $res=mysqli_query($con,$query);
            unlink($photo);
            unlink($identity);
        }  

        //set result messege and redirect to another page
	    if($result)
            {
            	$_SESSION['success']="*** successfully Deleted ***";
                header("location:girls.php");        
            }
            else
            {
                $_SESSION['error_edit']="*** deletion failed! please try again ***";
                header("location:girls.php");
            }
    }


include('includes/scripts.php');

?>