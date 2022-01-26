<?php
	 require('../connection.php');
	//selection of block
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
		
		echo '<option value="" selected hidden>--Select--</option>';
		$q="SELECT * FROM block WHERE h_id='$id'";
		$query=mysqli_query($con,$q);
		while ($row=mysqli_fetch_array($query)) {
			$b_id=$row['b_id'];
			$block=$row['name'];

			?>
			<option value="<?php echo $b_id; ?>"><?php echo $block; ?></option>
			<?php
		}
	}

 ?>