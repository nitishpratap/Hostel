<?php
	 require('../connection.php'); //establishing connetion with database
	//selection of year
	if(isset($_POST['courseid']))
	{
		$id=$_POST['courseid'];
		
		echo '<option value="" selected hidden>--Select--</option>';
		
		$q="SELECT * FROM course WHERE c_id ='$id'";
		$query=mysqli_query($con,$q);
		$row=mysqli_fetch_array($query);
?>
	
 			<option value="<?php echo $row['first_year']; ?>"><?php echo $row['first_year'];?></option>
 	<?php 
 		if ($row['second_year'] != "") {  ?>
			<option value="<?php echo $row['second_year']; ?>"><?php echo $row['second_year'];?></option>
	<?php }
 		if ($row['third_year'] != "") {  ?>
 			<option value="<?php echo $row['third_year']; ?>"><?php echo $row['third_year'];?></option>
 	<?php }
 		if ($row['forth_year'] != "") {  ?>
 			<option value="<?php echo $row['forth_year']; ?>"><?php echo $row['forth_year'];?></option>
	<?php
			}	
 	}
?>