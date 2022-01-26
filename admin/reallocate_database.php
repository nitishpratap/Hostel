<?php
	include('includes/security.php'); 	//security features
	include('includes/header.php');		//header
	include('includes/navbar.php');	//navbar 
	require('../connection.php');  //establishing connection from database
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$Hostel=$_POST['Hostel'];
	$Block=$_POST['Block'];
	$Room=$_POST['Room'];
	$OldRoom=$_POST['oldroomNo'];
	?>
				<div class="container">
	<?php
	if(isset($_POST['Submit']))
	{
		if ($gender == "male") {
				//update table for allocate new room number,block and hostel
				$query="UPDATE `boys_details` SET hostel_name='$Hostel', block='$Block',room_no='$Room' where email='$email'";
				if ($result=mysqli_query($con,$query)) {
					//decrease capecity by 1 because of allocation
					$q="UPDATE `room` SET capecity = capecity-1 WHERE room_id='$Room'"; 
					$res=mysqli_query($con,$q); //execute query

					//Increase capecity by 1 because of reallocation
					$q="UPDATE `room` SET capecity = capecity+1 WHERE room_id='$OldRoom'"; 
					$oldres=mysqli_query($con,$q); //execute query
				}
				
				
				if ($res && $oldres) {
					echo '<h2 class="h2 text-success text-center">*** Reallocated successfully ***</h2>';
					?>
					<a href="boys.php" class="btn btn-outline-success btn-block">Return to boys details page</a>	
					<?php
				}
				else
				{
					echo '<h2 class="h2 text-danger text-center">*** Reallocation failed! Please try again. ***</h2>';
					?>
					<a href="boys.php" class="btn btn-outline-success btn-block">Return to boys details page</a>	
					<?php
				}
				
			
		}// end of male
		else if ($gender == "female")  //for girls 
		{	
				$query="UPDATE `girls_details` SET hostel_name='$Hostel', block='$Block',room_no='$Room' where email='$email'";
				if ($result=mysqli_query($con,$query)) {
					//decrease capecity by 1 because of allocation
					$q="UPDATE `room` SET capecity = capecity-1 WHERE room_id='$Room'"; 
					$res=mysqli_query($con,$q); //execute query

					//Increase capecity by 1 because of reallocation
					$q="UPDATE `room` SET capecity = capecity+1 WHERE room_id='$OldRoom'"; 
					$oldres=mysqli_query($con,$q); //execute query
				}
				
				
				if ($res && $oldres) {
					echo '<h2 class="h2 text-success text-center">*** Reallocated successfully ***</h2>';
					?>
					<a href="girls.php" class="btn btn-outline-success btn-block">Return to girls details page</a>	
					<?php
				}
				else
				{
					echo '<h2 class="h2 text-danger text-center">*** Reallocation failed ***</h2>';
					?>
					<a href="girls.php" class="btn btn-outline-success btn-block">Return to girls details page</a>	
					<?php
				}
				
		}// end of female
	} //end of submit
?>
</div> <!-- end of container -->

<?php
	include('includes/scripts.php');  //scripts
	include('includes/footer.php');		//footer
?>