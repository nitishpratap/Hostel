<?php
	 require('../connection.php');
	//selection of block
	if(isset($_POST['id']))
	{
		$id=$_POST['id'];
		
		echo '<option value="" selected hidden>--Select--</option>';
		$q="SELECT * FROM room WHERE b_id='$id' and capecity != '0'";
		$query=mysqli_query($con,$q);
		while ($row=mysqli_fetch_array($query)) {
			$room_id=$row['room_id'];
			$room=$row['room_name'];

			?>
			<option value="<?php echo $room_id; ?>"><?php echo $room; ?></option>
			<?php
		}
	}

 ?>