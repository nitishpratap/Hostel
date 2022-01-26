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
	?>
				<div class="container">
	<?php
	if(isset($_POST['Submit']))
	{
		if ($gender == "male") {
			$qu="SELECT status FROM `boys_details` where email='$email'";
			$data=mysqli_query($con,$qu);
			$Result=mysqli_fetch_array($data);
			if($Result['status'] == "pending") //checking status
			{
				
				$query="UPDATE `boys_details` SET hostel_name='$Hostel', block='$Block',room_no='$Room',status='allocated' where email='$email'";
				if ($result=mysqli_query($con,$query)) {
					$q="UPDATE `room` SET capecity = capecity-1 WHERE room_id='$Room'";
					$res=mysqli_query($con,$q);
				}
				
				
				if ($res) {
					echo '<h2 class="h2 text-success text-center">*** Allocated successfully ***</h2>';
					?>
					<a href="boys.php" class="btn btn-outline-success btn-block">Return to boys details page</a>	
					<?php
				}
				else
				{
					echo '<h2 class="h2 text-danger text-center">*** Allocation failed! Please try again. ***</h2>';
					?>
					<a href="boys.php" class="btn btn-outline-success btn-block">Return to boys details page</a>	
					<?php
				}
				
			}//end of status
			else
			{
				echo '<h2 class="h2 text-danger text-center">*** Already Allocated ***</h2>';
			?>  <a href="boys.php" class="btn btn-outline-success btn-block">Return to boys details page</a>  <?php
			}
		}// end of male
		else if ($gender == "female")  //for girls 
		{
			$qu="SELECT status FROM `girls_details` where email='$email'";
			$data=mysqli_query($con,$qu);
			$Result=mysqli_fetch_array($data);
			if($Result['status'] == "pending") //checking status
			{
				
				$query="UPDATE `girls_details` SET hostel_name='$Hostel', block='$Block',room_no='$Room',status='allocated' where email='$email'";
				if ($result=mysqli_query($con,$query)) {
					$q="UPDATE `room` SET capecity = capecity-1 WHERE room_id='$Room'";
					$res=mysqli_query($con,$q);
				}
				
				
				if ($res) {
					echo '<h2 class="h2 text-success text-center">*** Allocated successfully ***</h2>';
					?>
					<a href="girls.php" class="btn btn-outline-success btn-block">Return to girls details page</a>	
					<?php
				}
				else
				{
					echo '<h2 class="h2 text-danger text-center">*** Allocation failed ***</h2>';
				}
				
			}//end of status
			else
			{
				echo '<h2 class="h2 text-danger text-center">*** Already Allocated ***</h2>';
			?>  <a href="girls.php" class="btn btn-outline-success btn-block">Return to girls details page</a>  <?php
			}
		}// end of female
	} //end of submit
?>
</div> <!-- end of container -->

<?php
	include('includes/scripts.php');  //scripts
	include('includes/footer.php');		//footer
?>