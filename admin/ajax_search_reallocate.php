<?php
	include('includes/security.php');
	require('../connection.php');
	$email=$_POST['email'];
	$gender=$_POST['gender'];

	if ($gender == "male") 
	{
		$q="SELECT * FROM boys_details WHERE email='$email'";
		$data=mysqli_query($con,$q);
		$total=mysqli_num_rows($data);
	?>
	
<div class="card shadow mb-4">
  

  <div class="card-body">

    <div class="table-responsive">
    	
      <table class="table table-bordered m-0" id="dataTable" width="100%" cellspacing="0">
       
        <tbody>
     			<?php
		    	  		if ($total != 0) {
		    	  			while ($result=mysqli_fetch_assoc($data)) {
		    	  				$que="SELECT name FROM course WHERE c_id='$result[c_id]'";
		    	  				$dat=mysqli_query($con,$que);
		    	  				$course=mysqli_fetch_array($dat);
		    	  				echo "<tr>
		    	  							<th>Name</th><td>".$result['fname']." ".$result['mname']." ".$result['lname']."</td> </tr>
		    	  							<tr> <th>Father</th><td>".$result['father']."</td></tr>
		    	  							<tr><th>Email</th><td>".$result['email']."</td></tr>
		    	  							<tr><th>Course</th><td>".$course['name']."</td></tr>
		    	  							<tr><th>Status</th><td>".$result['status']."</td></tr>
                                            <tr><th>Gender</th><td>".$result['gender'].'</td></tr>
		    	  							<tr> <th>Operations</th><td>'.'
								                <div class="form-inline">
								                <form action="view.php" method="post">
								                    <input type="hidden" name="gender" value="'.$result['gender'].'">
								                    <input type="hidden" name="email" value="'.$result['email'].'">
								                    <button  type="submit" name="view_btn" class="btn btn-success m-3"> VIEW</button>
								                </form>
								           
								                <form action="edit.php" method="post">
								                    <input type="hidden" name="gender" value="'.$result['gender'].'">
								                    <input type="hidden" name="email" value="'.$result['email'].'">
								                    <button  type="submit" name="edit_btn" class="btn btn-warning m-3"> EDIT</button>
								                </form>
								            
								                <form action="delete.php" method="post">
								                  <input type="hidden" name="gender" value="'.$result['gender'].'">
								                    <input type="hidden" name="email" value="'.$result['email'].'">
								                  <button type="submit" id="delete_btn" name="delete_btn" class="btn btn-danger m-3"> DELETE</button>
								                </form>';
								              
								            if($result['status'] == "allocated"){
		    	  							echo '
								                <form action="reallocate.php" method="post">
								                    <input type="hidden" name="gender" value="'.$result['gender'].'">
								                    <input type="hidden" name="email" value="'.$result['email'].'">
								                    <input type="hidden" name="room_no" value="'.$result['room_no'].'">
								                    <button  type="submit" name="allocate_btn" class="btn btn-info m-3"> REALLOCATE</button>
								                </form>';
								            }
								            else
								            {
								            	echo '
								                <form action="allocate.php" method="post">
								                    <input type="hidden" name="gender" value="'.$result['gender'].'">
								                    <input type="hidden" name="email" value="'.$result['email'].'">
								                    <button  type="submit" name="allocate_btn" class="btn btn-info m-3"> ALLOCATE</button>
								                </form>';
								            } //end of ELSE for allocated
								            } //end of while loop
		    	  					 echo '</div></td></tr>';          
		    	  		} //end of IF for total
		    	  		else
		    	  		{
		    	  			echo '<h1 class="text-danger">No Record Found!.</h1>';
		    	  		}
		    	  	?>
	     	
	        </tbody>
	      </table>

	    </div>
	  </div>
	</div>
	<?php
	} //end of IF (gender == male) 
	else if ($gender == "female") // check for gender == female
	{
		$q="SELECT * FROM girls_details WHERE email='$email'";
		$data=mysqli_query($con,$q);
		$total=mysqli_num_rows($data);
	?>
	
<div class="card shadow mb-4">
  

  <div class="card-body">

    <div class="table-responsive">
    	
      <table class="table table-bordered m-0" id="dataTable" width="100%" cellspacing="0">
       
        <tbody>
     			<?php
		    	  		if ($total != 0) {
		    	  			while ($result=mysqli_fetch_assoc($data)) {
		    	  				$que="SELECT name FROM course WHERE c_id='$result[c_id]'";
		    	  				$dat=mysqli_query($con,$que);
		    	  				$course=mysqli_fetch_array($dat);
		    	  				echo "<tr>
		    	  							<th>Name</th><td>".$result['fname']." ".$result['mname']." ".$result['lname']."</td> </tr>
		    	  							<tr> <th>Father</th><td>".$result['father']."</td></tr>
		    	  							<tr><th>Email</th><td>".$result['email']."</td></tr>
		    	  							<tr><th>Course</th><td>".$course['name']."</td></tr>
		    	  							<tr><th>Status</th><td>".$result['status']."</td></tr>
                                            <tr><th>Gender</th><td>".$result['gender'].'</td></tr>
		    	  							<tr> <th>Operations</th><td>'.'
								                <div class="form-inline">
								                <form action="view.php" method="post">
								                    <input type="hidden" name="gender" value="'.$result['gender'].'">
								                    <input type="hidden" name="email" value="'.$result['email'].'">
								                    <button  type="submit" name="view_btn" class="btn btn-success m-3"> VIEW</button>
								                </form>
								           
								                <form action="edit.php" method="post">
								                    <input type="hidden" name="gender" value="'.$result['gender'].'">
								                    <input type="hidden" name="email" value="'.$result['email'].'">
								                    <button  type="submit" name="edit_btn" class="btn btn-warning m-3"> EDIT</button>
								                </form>
								            
								                <form action="delete.php" method="post">
								                  <input type="hidden" name="gender" value="'.$result['gender'].'">
								                    <input type="hidden" name="email" value="'.$result['email'].'">
								                  <button type="submit" id="delete_btn" name="delete_btn" class="btn btn-danger m-3"> DELETE</button>
								                </form>';
								              
								            if($result['status'] == "allocated"){
		    	  							echo '
								                <form action="reallocate.php" method="post">
								                    <input type="hidden" name="gender" value="'.$result['gender'].'">
								                    <input type="hidden" name="email" value="'.$result['email'].'">
								                     <input type="hidden" name="room_no" value="'.$result['room_no'].'">
								                    <button  type="submit" name="allocate_btn" class="btn btn-info m-3"> REALLOCATE</button>
								                </form>';
								            }
								            else
								            {
								            	echo '
								                <form action="allocate.php" method="post">
								                    <input type="hidden" name="gender" value="'.$result['gender'].'">
								                    <input type="hidden" name="email" value="'.$result['email'].'">
								                    <button  type="submit" name="allocate_btn" class="btn btn-info m-3"> ALLOCATE</button>
								                </form>';
								            } //end of ELSE for allocated
								            } //end of while loop
		    	  					 echo '</div></td></tr>';          
		    	  		} //end of IF for total
		    	  		else
		    	  		{
		    	  			echo '<h1 class="text-danger">No Record Found!.</h1>';
		    	  		}
		    	  	?>
	     	
	        </tbody>
	      </table>

	    </div>
	  </div>
	</div>
	<?php
	}
	?>
