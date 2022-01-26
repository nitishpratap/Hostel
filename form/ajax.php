<?php
	 require('../connection.php');
	//selection of course
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
		
		echo '<option value="" selected hidden>--Select--</option>';
		$q="SELECT * FROM course WHERE institute_id='$id'";
		$query=mysqli_query($con,$q);
		while ($row=mysqli_fetch_array($query)) {
			$c_id=$row['c_id'];
			$course=$row['name'];

			?>
			<option value="<?php echo $c_id; ?>"><?php echo $course ?></option>
			<?php
		}
	}

 ?>